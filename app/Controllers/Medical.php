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
        return view('medical/faq', [
            'sectionKey'      => 'medical',
            'pageKey'         => 'faq',
            'pageTitle'       => 'FAQ',
            'pageDesc'        => '의료진께서 자주 문의하시는 내용을 정리했습니다.',
            'metaTitle'       => 'FAQ | 신영로파마',
            'metaDescription' => '라이스정 자료 확인, 피부단자시험 시약 항원 리스트 요청, 신규 거래 개설 절차, EARVENT·ibion 문의 접수 등 의료진 자주 묻는 질문을 안내합니다.',
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

        // 요청 사항 / 방문 희망 여부 등은 하나의 본문으로 정리해 저장합니다.
        $summary = [
            '진료과: '        . ($request->getPost('department') ?: '-'),
            '요청 사항: '     . ($request->getPost('requestType') ?: '-'),
            '방문 희망 여부: ' . ($request->getPost('visit') ?: '-'),
            '',
            '상세 내용:',
            $request->getPost('message') ?: '-',
        ];

        $inquiryModel = new \App\Models\InquiryModel();

        $result = $inquiryModel->saveInquiry([
            'company' => $request->getPost('hospital'),
            'manager' => $request->getPost('manager'),
            'tel'     => $request->getPost('tel'),
            'email'   => $request->getPost('email'),
            'content' => implode("\n", $summary),
        ]);

        if (! $result) {
            return redirect()->back()->withInput()
                ->with('error', '서버 오류로 접수하지 못했습니다. 잠시 후 다시 시도해 주세요.');
        }

        return redirect()->to(base_url('medical/support'))
            ->with('success', '신청이 접수되었습니다. 담당자가 확인 후 연락드리겠습니다.');
    }
}
