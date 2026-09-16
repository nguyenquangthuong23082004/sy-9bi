<?php

namespace App\Controllers;

class Home extends BaseController
{
    private function checkAndSeed($bbsModel, $configModel)
    {
        // 1. FAQ Config
        if (!$configModel->getConfig('faq')) {
            $configModel->insert([
                'board_name' => '자주 묻는 질문(FAQ)',
                'board_code' => 'faq',
                'is_category' => 'N',
                'is_secure' => 'N',
                'is_right' => 'N',
                'is_reply' => 'N',
                'is_comment' => 'N',
                'is_recomm' => 'N',
                'is_notice' => 'N',
                'skin' => 'faq'
            ]);
        }

        // 2. Cleanup old autostyle test FAQ if any
        $bbsModel->where('code', 'faq')
            ->groupStart()
                ->like('contents', '오토스타일')
                ->orLike('contents', '장기렌터카')
                ->orLike('contents', '파at너')
                ->orLike('contents', 'of 공제')
            ->groupEnd()
            ->delete();

        // 3. Policy Config
        $existingConfig = $configModel->getConfig('policy');
        if ($existingConfig) {
            // Normalize board name to Korean and ensure skin is faq to hide metadata
            if ($existingConfig['board_name'] !== '약관/방침' || $existingConfig['skin'] !== 'faq') {
                $configModel->update($existingConfig['tbc_idx'], [
                    'board_name' => '약관/방침',
                    'skin' => 'faq'
                ]);
            }
        } else {
            $configModel->insert([
                'board_name' => '약관/방침',
                'board_code' => 'policy',
                'is_category' => 'N',
                'is_secure' => 'N',
                'is_right' => 'N',
                'is_reply' => 'N',
                'is_comment' => 'N',
                'is_recomm' => 'N',
                'is_notice' => 'N',
                'skin' => 'faq' // Use faq skin to simplify admin list/form fields
            ]);
        }

        // 4. Policy List Seeding
        $policyCount = $bbsModel->where('code', 'policy')->countAllResults();
        if ($policyCount == 0) {
            $bbsModel->insert([
                'code' => 'policy',
                'subject' => '이용약관',
                'writer' => '관리자',
                'contents' => '<p><strong>제1조 (목적)</strong><br>이 약관은 오토스타일(이하 "회사"라 함)이 제공하는 서비스의 이용조건 및 절차, 회사와 회원 간의 권리, 의무 및 책임사항 등을 규정함을 목적으로 합니다.</p>',
                'r_date' => date('Y-m-d H:i:s'),
                'b_ref' => 1,
                'b_step' => 0,
                'b_level' => 0,
                'hit' => 0,
                'onum' => 2
            ]);
            $bbsModel->insert([
                'code' => 'policy',
                'subject' => '개인정보처리방침',
                'writer' => '관리자',
                'contents' => '<p><strong>1. 개인정보의 처리 목적</strong><br>회사는 회원가입, 세일즈 파트너 신청 및 상담 지원 등을 위해 최소한의 개인정보를 처리하고 있습니다.</p>',
                'r_date' => date('Y-m-d H:i:s'),
                'b_ref' => 2,
                'b_step' => 0,
                'b_level' => 0,
                'hit' => 0,
                'onum' => 1
            ]);
        }
    }

    public function index()
    {
        $bbsModel = new \App\Models\BbsModel();
        $configModel = new \App\Models\BbsConfigModel();

        $this->checkAndSeed($bbsModel, $configModel);

        $faqs = $bbsModel->where('code', 'faq')
                         ->orderBy('onum', 'DESC')
                         ->orderBy('r_date', 'DESC')
                         ->limit(4)
                         ->findAll();

        $mainBanners = $bbsModel->where('code', 'banner')
                                ->where('notice_yn', 'Y')
                                ->groupStart()
                                    ->where('b_category', 'main')
                                    ->orWhere('b_category IS NULL')
                                    ->orWhere('b_category', '')
                                ->groupEnd()
                                ->orderBy('onum', 'DESC')
                                ->orderBy('bbs_idx', 'DESC')
                                ->findAll();

        return view('home', [
            'faqs'        => $faqs,
            'mainBanners' => $mainBanners,
        ]);
    }

    public function terms()
    {
        $bbsModel = new \App\Models\BbsModel();
        $configModel = new \App\Models\BbsConfigModel();

        $this->checkAndSeed($bbsModel, $configModel);

        $policy = $bbsModel->where('code', 'policy')
                           ->where('subject', '이용약관')
                           ->first();

        return view('policy', [
            'metaTitle' => '이용약관 | 신영로파마',
            'metaDescription' => '신영로파마 홈페이지 이용약관 안내입니다.',
            'pageTitle' => '이용약관',
            'content' => $policy['contents'] ?? '이용약관 준비 중입니다.'
        ]);
    }

    public function privacy()
    {
        $bbsModel = new \App\Models\BbsModel();
        $configModel = new \App\Models\BbsConfigModel();

        $this->checkAndSeed($bbsModel, $configModel);

        $policy = $bbsModel->where('code', 'policy')
                           ->where('subject', '개인정보처리방침')
                           ->first();

        return view('policy', [
            'metaTitle' => '개인정보처리방침 | 신영로파마',
            'metaDescription' => '신영로파마 개인정보처리방침 안내입니다.',
            'pageTitle' => '개인정보처리방침',
            'content' => $policy['contents'] ?? '개인정보처리방침 준비 중입니다.'
        ]);
    }

    public function submitInquiry()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'userName' => 'required',
            'userPhone' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'ERROR',
                'message' => '이름과 휴대전화번호는 필수 입력 항목입니다.'
            ]);
        }

        $userName = $this->request->getPost('userName');
        $userPhone = $this->request->getPost('userPhone');
        $userJob = $this->request->getPost('userJob');
        $experience = $this->request->getPost('experience');
        $partnerType = $this->request->getPost('partnerType');

        $inquiryModel = new \App\Models\InquiryModel();
        
        $data = [
            'manager'  => $userName,
            'tel'      => $userPhone,
            'company'  => $userJob,
            'location' => $experience,
            'content'  => $partnerType
        ];

        $result = $inquiryModel->saveInquiry($data);

        if ($result) {
            return $this->response->setJSON([
                'status' => 'OK',
                'message' => '제휴 파트너 신청이 성공적으로 접수되었습니다!',
                'idx'     => $result
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'ERROR',
                'message' => '서버 오류로 인해 신청을 처리할 수 없습니다. 잠시 후 다시 시도해 주세요.'
            ]);
        }
    }

    public function sendEmailNotification($idx)
    {
        $inquiryModel = new \App\Models\InquiryModel();
        $inquiry = $inquiryModel->find($idx);

        if (!$inquiry) {
            return $this->response->setJSON([
                'status' => 'ERROR',
                'message' => 'Inquiry not found'
            ]);
        }

        try {
            $settingModel = new \App\Models\Setting();
            $setting = $settingModel->getSettings();

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

                    $subject = "[{$siteName}] 새로운 문의/신청이 접수되었습니다.";

                    // Parse English values to Korean
                    $userName = $inquiry['manager'] ?? '';
                    $userPhone = $inquiry['tel'] ?? '';
                    $userJob = $inquiry['company'] ?? '';
                    $experienceRaw = $inquiry['location'] ?? '';
                    $partnerTypeRaw = $inquiry['content'] ?? '';

                    $experience = $experienceRaw === 'yes' ? '경험 있음' : '경험 없음';
                    $partnerType = $partnerTypeRaw === 'corporate' ? '법인 제휴' : '개인 제휴';

                    // Primary Blue HTML Table for Admin Notification
                    $htmlContent = "
                    <div style='max-width: 650px; margin: 20px auto; font-family: Pretendard, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Noto Sans KR\", sans-serif; color: #1e293b; line-height: 1.6; border: 1px solid #dbe8ff; border-radius: 14px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 70, 255, 0.08); background-color: #ffffff;'>
                        <!-- Header -->
                        <div style='background: linear-gradient(135deg, #0046ff 0%, #0a8cff 100%); padding: 36px 28px; text-align: center;'>
                            <h1 style='color: #ffffff; margin: 0; font-size: 24px; font-weight: 800; letter-spacing: -0.5px;'>새로운 문의 / 신청 알림</h1>
                            <p style='color: rgba(255, 255, 255, 0.92); margin: 8px 0 0 0; font-size: 14px;'>{$siteName} 웹사이트에서 새로운 문의가 접수되었습니다.</p>
                        </div>
                        
                        <!-- Content Body -->
                        <div style='padding: 32px 28px;'>
                            <div style='border-bottom: 2px solid #0046ff; padding-bottom: 10px; margin-bottom: 20px;'>
                                <h2 style='font-size: 17px; font-weight: 800; color: #0046ff; margin: 0;'>📋 접수 내역</h2>
                            </div>
                            
                            <table style='width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 15px; margin-bottom: 25px; border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden;'>
                                    <tr>
                                        <th style='width: 30%; text-align: left; padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>이름 / 담당자</th>
                                        <td style='padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; font-weight: bold; color: #0f172a;'>{$userName}</td>
                                    </tr>
                                    <tr>
                                        <th style='text-align: left; padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>휴대전화번호</th>
                                        <td style='padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; font-weight: bold; color: #0046ff;'>{$userPhone}</td>
                                    </tr>
                                    <tr>
                                        <th style='text-align: left; padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>회사 / 소속</th>
                                        <td style='padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #334155;'>{$userJob}</td>
                                    </tr>
                                    <tr>
                                        <th style='text-align: left; padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>내용</th>
                                        <td style='padding: 14px 16px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #334155;'>{$partnerType}</td>
                                    </tr>
                                    <tr>
                                        <th style='text-align: left; padding: 14px 16px; font-size: 14px; color: #0046ff; font-weight: bold; background-color: #f0f5ff;'>신청 일시</th>
                                        <td style='padding: 14px 16px; font-size: 14px; color: #64748b;'>{$inquiry['regdate']}</td>
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
            log_message('error', 'Email notification failed: ' . $e->getMessage());
        }

        return $this->response->setJSON([
            'status' => 'OK'
        ]);
    }
}
