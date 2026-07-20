<?php

namespace App\Controllers;

/**
 * 제품 (PRODUCT) 서브페이지
 * 뷰: app/Views/product/*.php  (공통 레이아웃: inc/layout)
 */
class Product extends BaseController
{
    public function index()
    {
        return redirect()->to(base_url('product/lais'));
    }

    /** A. 라이스정 */
    public function lais()
    {
        return view('product/lais', [
            'sectionKey'      => 'product',
            'pageKey'         => 'lais',
            'pageTitle'       => '라이스정',
            'pageDesc'        => '알레르기 원인에 접근하는 치료 옵션, 설하면역치료에 사용되는 전문의약품입니다.',
            'metaTitle'       => '라이스정 | 신영로파마',
            'metaDescription' => '라이스정은 설하면역치료(SLIT)에 사용되는 전문의약품으로, 의료진의 진단과 처방에 따라 치료 계획이 이루어집니다. 설하면역치료의 개념과 치료 단계를 안내합니다.',
        ]);
    }

    /** B. 알레르기 피부단자시험 시약 */
    public function skinTest()
    {
        return view('product/skin-test', [
            'sectionKey'      => 'product',
            'pageKey'         => 'skin-test',
            'pageTitle'       => '알레르기 피부단자시험 시약',
            'pageDesc'        => '집먼지진드기부터 꽃가루, 식품까지 폭넓은 알레르기 원인 검사를 지원합니다.',
            'metaTitle'       => '알레르기 피부단자시험 시약 | 신영로파마',
            'metaDescription' => '신영로파마는 다양한 흡입 항원 및 식품 항원 라인업으로 피부단자시험(Skin Prick Test)을 지원합니다. 항원 리스트, 유효기간, 발주 절차를 안내합니다.',
        ]);
    }

    /** C. EARVENT */
    public function earvent()
    {
        return view('product/earvent', [
            'sectionKey'      => 'product',
            'pageKey'         => 'earvent',
            'pageTitle'       => 'EARVENT',
            'pageDesc'        => '이관 기능 개선을 위한 의료용 고무풍선입니다.',
            'metaTitle'       => 'EARVENT | 신영로파마',
            'metaDescription' => 'EARVENT는 코를 통해 풍선을 팽창시키는 방식으로 중이 환기와 이관 기능 훈련에 사용되는 의료기기입니다. 용도와 사용 방법을 안내합니다.',
        ]);
    }
}
