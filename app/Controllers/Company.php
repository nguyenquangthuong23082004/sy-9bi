<?php

namespace App\Controllers;

/**
 * 회사소개 (COMPANY) 서브페이지
 * 뷰: app/Views/company/*.php  (공통 레이아웃: inc/layout)
 */
class Company extends BaseController
{
    public function greeting()
    {
        return view('company/greeting', [
            'sectionKey'      => 'company',
            'pageKey'         => 'greeting',
            'pageTitle'       => '대표 인사말',
            'pageDesc'        => '알레르기 환자의 더 나은 일상을 위해 한 분야에 집중해온 신영로파마의 이야기를 전합니다.',
            'metaTitle'       => '대표 인사말 | 신영로파마',
            'metaDescription' => '신영로파마는 2011년 설립 이후 알레르기 한 분야에 집중해 왔습니다. 진단과 치료를 넘어 증상 관리와 일상 케어까지, 대표이사 인사말을 통해 신영로파마의 방향을 소개합니다.',
        ]);
    }

    public function history()
    {
        $historyModel = new \App\Models\HistoryModel();
        $historyList  = $historyModel->getHistoryList();

        return view('company/history', [
            'sectionKey'      => 'company',
            'pageKey'         => 'history',
            'pageTitle'       => '회사 스토리·연혁',
            'pageDesc'        => '2011년 설립 이후 알레르기 분야에 집중해온 신영로파마의 발자취입니다.',
            'metaTitle'       => '회사 스토리·연혁 | 신영로파마',
            'metaDescription' => '2011년 설립 이래 알레르기 분야에 집중해온 신영로파마의 회사 스토리와 연혁을 소개합니다. Lofarma S.p.A 파트너십부터 의약품·의료기기·스킨케어로의 확장까지.',
            'syHistory'       => $historyList,
        ]);
    }

    public function lofarma()
    {
        return view('company/lofarma', [
            'sectionKey'      => 'company',
            'pageKey'         => 'lofarma',
            'pageTitle'       => 'Lofarma 파트너십',
            'pageDesc'        => '이탈리아 Lofarma S.p.A의 알레르기 전문성과 국내 진료 현장을 연결합니다.',
            'metaTitle'       => 'Lofarma 파트너십 | 신영로파마',
            'metaDescription' => '신영로파마는 1945년부터 알레르기 진단과 면역치료에 집중해온 이탈리아 Lofarma S.p.A와 협력하여 국내 의료진에게 알레르기 관련 제품과 전문 정보를 제공합니다.',
        ]);
    }

    public function vision()
    {
        return view('company/vision', [
            'sectionKey'      => 'company',
            'pageKey'         => 'vision',
            'pageTitle'       => '비전',
            'pageDesc'        => '진단에서 일상 케어까지, 알레르기 환자의 여정 전체를 설계합니다.',
            'metaTitle'       => '비전 | 신영로파마',
            'metaDescription' => '신영로파마는 정확한 진단, 원인 치료, 증상 관리, 일상 케어로 이어지는 알레르기 환자의 여정 전체를 설계하는 알레르기 전문 기업을 지향합니다.',
        ]);
    }
}
