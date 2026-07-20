<?php

namespace App\Controllers;

/**
 * 사업영역 (BUSINESS) 서브페이지
 * 뷰: app/Views/business/index.php  (공통 레이아웃: inc/layout)
 *
 * 의약품 / 의료기기 / 스킨케어 세 영역을 한 페이지에서 앵커로 연결합니다.
 */
class Business extends BaseController
{
    public function index()
    {
        return view('business/index', [
            'sectionKey'      => 'business',
            'pageKey'         => '',
            'pageTitle'       => '사업영역',
            'pageDesc'        => '알레르기 환자의 하루를 따라 사업 포트폴리오를 설계합니다.',
            'metaTitle'       => '사업영역 | 신영로파마',
            'metaDescription' => '신영로파마의 사업은 알레르기 환자의 여정을 따라 구성됩니다. 진단과 치료를 지원하는 의약품, 증상 관리와 생활 편의를 돕는 의료기기, 일상 피부 케어를 제안하는 스킨케어까지.',
        ]);
    }
}
