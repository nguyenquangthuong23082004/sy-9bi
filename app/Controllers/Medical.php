<?php

namespace App\Controllers;

/**
 * 의료진 지원 (MEDICAL) 서브페이지
 * 뷰: app/Views/medical/*.php  (공통 레이아웃: inc/layout)
 */
class Medical extends BaseController
{
    /** 의료진 지원 인트로 */
    public function index()
    {
        return view('medical/index', [
            'sectionKey'      => 'medical',
            'pageKey'         => '',
            'pageTitle'       => '의료진 지원',
            'pageDesc'        => '진료에 필요한 자료와 상담을 한 곳에서 연결합니다.',
            'metaTitle'       => '의료진 지원 | 신영로파마',
            'metaDescription' => '라이스정 자료, 진단시약 정보, 의료기기 자료, 임상연구 현황, 샘플 및 상담 요청까지. 신영로파마는 전국의 알레르기 진료 현장을 가까이에서 지원합니다.',
        ]);
    }

    /** 샘플·MR 방문 신청 */
    public function support()
    {
        return view('medical/support', [
            'sectionKey'      => 'medical',
            'pageKey'         => 'support',
            'pageTitle'       => '샘플·MR 방문 신청',
            'pageDesc'        => '제품 상담, 자료 요청, 샘플 문의를 남겨주시면 담당자가 확인 후 안내드립니다.',
            'metaTitle'       => '샘플·MR 방문 신청 | 신영로파마',
            'metaDescription' => '신영로파마 제품 상담, 자료 요청, 샘플 문의 및 MR 방문 신청 양식입니다. 병원명과 연락처를 남겨주시면 담당자가 확인 후 안내드립니다.',
        ]);
    }

    /** FAQ */
    public function faq()
    {
        $bbsModel = new \App\Models\BbsModel();
        $faqs = $bbsModel->where('code', 'faq')
                         ->orderBy('onum', 'DESC')
                         ->orderBy('r_date', 'DESC')
                         ->findAll();

        return view('medical/faq', [
            'sectionKey'      => 'medical',
            'pageKey'         => 'faq',
            'pageTitle'       => 'FAQ',
            'pageDesc'        => '의료진께서 자주 문의하시는 내용을 정리했습니다.',
            'metaTitle'       => 'FAQ | 신영로파마',
            'metaDescription' => '라이스정 자료 확인, 피부단자시험 시약 항원 리스트 요청, 신규 거래 개설 절차, EARVENT·ibion 문의 접수 등 의료진 자주 묻는 질문을 안내합니다.',
            'faqs'            => $faqs,
        ]);
    }

    /** 샘플·MR 방문 신청 접수 */
    public function submit()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'hospital' => 'required',
            'manager'  => 'required',
            'tel'      => 'required',
        ]);

        if (! $validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()
                ->with('error', '병원명, 성함, 연락처는 필수 입력 항목입니다.');
        }

        $request = $this->request;

        $formData = [
            'hospital'    => $request->getPost('hospital'),
            'department'  => $request->getPost('department'),
            'manager'     => $request->getPost('manager'),
            'tel'         => $request->getPost('tel'),
            'email'       => $request->getPost('email'),
            'requestType' => $request->getPost('requestType'),
            'visit'       => $request->getPost('visit'),
            'message'     => $request->getPost('message'),
        ];

        // 요청 사항 / 방문 희망 여부 등은 하나의 본문으로 정리해 저장합니다.
        $summary = [
            '진료과: '        . ($formData['department'] ?: '-'),
            '요청 사항: '     . ($formData['requestType'] ?: '-'),
            '방문 희망 여부: ' . ($formData['visit'] ?: '-'),
            '',
            '상세 내용:',
            $formData['message'] ?: '-',
        ];

        $inquiryModel = new \App\Models\InquiryModel();

        $result = $inquiryModel->saveInquiry([
            'hospital'     => $formData['hospital'],
            'company'      => $formData['hospital'],
            'department'   => $formData['department'],
            'manager'      => $formData['manager'],
            'tel'          => $formData['tel'],
            'email'        => $formData['email'],
            'request_type' => $formData['requestType'],
            'visit'        => $formData['visit'],
            'location'     => $formData['visit'],
            'message'      => $formData['message'],
            'content'      => implode("\n", $summary),
        ]);

        if (! $result) {
            return redirect()->back()->withInput()
                ->with('error', '서버 오류로 접수하지 못했습니다. 잠시 후 다시 시도해 주세요.');
        }

        // SMTP 관리자 알림 이메일 발송
        $this->sendSupportEmailNotification($formData);

        return redirect()->to(base_url('medical/support'))
            ->with('success', '신청이 접수되었습니다. 담당자가 확인 후 연락드리겠습니다.');
    }

    /** SMTP 관리자 이메일 발송 (파란색 메인 테마 적용) */
    private function sendSupportEmailNotification(array $data)
    {
        try {
            $settingModel = new \App\Models\Setting();
            $setting = $settingModel->getSettings() ?: [];

            $smtpHost       = $setting['smtp_host'] ?? '';
            $smtpId         = $setting['smtp_id'] ?? '';
            $smtpPass       = $setting['smtp_pass'] ?? '';
            $adminEmailList = $setting['admin_email_list'] ?? '';
            $siteName       = !empty($setting['site_name']) ? $setting['site_name'] : '신영로파마';

            if (!empty($smtpHost) && !empty($smtpId) && !empty($smtpPass) && !empty($adminEmailList)) {
                $recipients = preg_split('/[\s,;]+/', trim($adminEmailList));
                $recipients = array_filter($recipients, function($email) {
                    return filter_var($email, FILTER_VALIDATE_EMAIL);
                });

                if (!empty($recipients)) {
                    $emailService = \Config\Services::email();

                    $emailConfig = [
                        'protocol'     => 'smtp',
                        'SMTPHost'     => $smtpHost,
                        'SMTPUser'     => $smtpId,
                        'SMTPPass'     => $smtpPass,
                        'SMTPPort'     => 587,
                        'SMTPCrypto'   => '',
                        'mailType'     => 'html',
                        'charset'      => 'utf-8',
                        'newline'      => "\r\n",
                        'CRLF'         => "\r\n",
                        'SMTPTimeout'  => 10,
                        'wordWrap'     => true
                    ];

                    $emailService->initialize($emailConfig);

                    $subject = "[{$siteName}] 새로운 샘플·MR 방문 및 상담 신청이 접수되었습니다.";

                    $hospital   = esc($data['hospital'] ?: '-');
                    $department = esc($data['department'] ?: '-');
                    $manager    = esc($data['manager'] ?: '-');
                    $tel        = esc($data['tel'] ?: '-');
                    $email      = esc($data['email'] ?: '-');
                    $reqType    = esc($data['requestType'] ?: '-');
                    $visit      = esc($data['visit'] ?: '-');
                    $message    = nl2br(esc($data['message'] ?: '-'));
                    $regdate    = date('Y-m-d H:i:s');

                    // Primary Blue HTML Email Template
                    $htmlContent = "
                    <div style='max-width: 650px; margin: 20px auto; font-family: Pretendard, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Noto Sans KR\", sans-serif; color: #1e293b; line-height: 1.6; border: 1px solid #dbe8ff; border-radius: 14px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 70, 255, 0.08); background-color: #ffffff;'>
                        <!-- Header -->
                        <div style='background: linear-gradient(135deg, #0046ff 0%, #0a8cff 100%); padding: 36px 28px; text-align: center;'>
                            <h1 style='color: #ffffff; margin: 0; font-size: 24px; font-weight: 800; letter-spacing: -0.5px;'>샘플·MR 방문 및 상담 신청</h1>
                            <p style='color: rgba(255, 255, 255, 0.92); margin: 8px 0 0 0; font-size: 14px;'>{$siteName} 웹사이트에서 새로운 문의/신청이 접수되었습니다.</p>
                        </div>
                        
                        <!-- Content Body -->
                        <div style='padding: 32px 28px;'>
                            <div style='border-bottom: 2px solid #0046ff; padding-bottom: 10px; margin-bottom: 20px;'>
                                <h2 style='font-size: 17px; font-weight: 800; color: #0046ff; margin: 0;'>📋 신청 상세 정보</h2>
                            </div>
                            
                            <table style='width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 15px; margin-bottom: 25px; border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden;'>
                                <tr>
                                    <th style='width: 30%; text-align: left; padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>병원명</th>
                                    <td style='padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; font-weight: bold; color: #0f172a;'>{$hospital}</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>진료과</th>
                                    <td style='padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #334155;'>{$department}</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>성함 / 담당자</th>
                                    <td style='padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; font-weight: bold; color: #0f172a;'>{$manager}</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>연락처</th>
                                    <td style='padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; font-weight: bold; color: #0046ff;'>{$tel}</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>이메일</th>
                                    <td style='padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #334155;'>{$email}</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>요청 사항</th>
                                    <td style='padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; font-weight: bold; color: #0284c7;'>{$reqType}</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>방문 희망 여부</th>
                                    <td style='padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #334155;'>{$visit}</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>상세 내용</th>
                                    <td style='padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #334155;'>{$message}</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding: 14px 16px; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>신청 일시</th>
                                    <td style='padding: 14px 16px; font-size: 14px; color: #64748b;'>{$regdate}</td>
                                </tr>
                            </table>
                            
                            <div style='text-align: center; margin-top: 28px;'>
                                <a href='" . base_url('AdmMaster') . "' style='display: inline-block; background: linear-gradient(135deg, #0046ff 0%, #0a8cff 100%); color: #ffffff; padding: 14px 32px; border-radius: 50px; text-decoration: none; font-size: 14px; font-weight: bold; box-shadow: 0 6px 18px rgba(0, 70, 255, 0.3);'>관리자 페이지에서 확인하기</a>
                            </div>
                        </div>
                        
                        <div style='text-align: center; padding: 20px; background-color: #f8fafc; border-top: 1px solid #e2e8f0; font-size: 12px; color: #94a3b8;'>
                            <p style='margin: 0; color: #64748b;'>본 메일은 {$siteName} 웹사이트에서 자동으로 발송된 알림 메일입니다.</p>
                            <p style='margin: 4px 0 0 0;'>© " . date('Y') . " {$siteName}. All rights reserved.</p>
                        </div>
                    </div>
                    ";

                    $emailService->setFrom($smtpId, $siteName);
                    $emailService->setTo($recipients);
                    $emailService->setSubject($subject);
                    $emailService->setMessage($htmlContent);
                    $emailService->send();
                }
            }
        } catch (\Throwable $e) {
            log_message('error', 'Medical support email notification failed: ' . $e->getMessage());
        }
    }
}
