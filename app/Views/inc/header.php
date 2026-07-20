<?php
/**
 * 공용 헤더 - 전 페이지 공용 (메인 / 회사소개 / 제품 / 정책)
 *
 * 이 파일 하나가 다음을 모두 담당합니다.
 *  1) GNB 메뉴 데이터 (sy_site_nav)  ← 메뉴 수정은 이 배열만 고치면 전 페이지 반영
 *  2) GNB 마크업
 *  3) 헤더 마크업 (로고 / GNB / 언어·햄버거 버튼)
 *
 * 파라미터
 *  - $isHome      : true 이면 메인 (투명 헤더 + 로고 h1 + 1depth 는 토글 역할)
 *  - $gnbCurrent  : 현재 1depth 키 (company | product | business | medical | mall)
 *  - $depthCurrent: 현재 2depth 키 (greeting, lais ...) — aria-current 표시용
 */

if (! function_exists('sy_site_nav')) {
	/**
	 * 전역 내비게이션(GNB) 데이터 단일 소스.
	 *
	 * 1depth: label / url / minHeight / intro / groups
	 * 2depth: label / url / key(현재 페이지 판정) / sub(3depth) / subCol(3depth 컬럼형)
	 * url 이 '#' 로 시작하면 해시, null 이면 링크 없는 라벨입니다.
	 */
	function sy_site_nav(): array
	{
		return [

			'company' => [
				'label'     => '회사소개',
				'url'       => 'company/greeting',
				'minHeight' => 270,
				'intro'     => [
					'title' => '회사소개',
					'desc'  => '알레르기 한 분야에 집중해온<br>신영로파마의 여정을 소개합니다.',
				],
				'groups' => [
					[
						['label' => '대표 인사말',      'url' => 'company/greeting', 'key' => 'greeting'],
						['label' => '회사 스토리·연혁', 'url' => 'company/history',  'key' => 'history'],
						['label' => 'Lofarma 파트너십', 'url' => 'company/lofarma',  'key' => 'lofarma'],
						['label' => '비전',             'url' => 'company/vision',   'key' => 'vision'],
					],
					[
						['label' => '오시는 길', 'url' => '#support', 'sub' => ['서울시 도봉구', '문의 02-900-0436']],
					],
				],
			],

			'product' => [
				'label'     => '제품',
				'url'       => 'product/lais',
				'minHeight' => 270,
				'intro'     => [
					'title' => '제품',
					'desc'  => '알레르기 진료와 관리 전반을<br>지원하는 제품을 소개합니다.',
				],
				'groups' => [
					[
						['label' => '라이스정',                   'url' => 'product/lais',      'key' => 'lais'],
						['label' => '알레르기 피부단자시험 시약', 'url' => 'product/skin-test', 'key' => 'skin-test'],
						['label' => 'EARVENT',                    'url' => 'product/earvent',   'key' => 'earvent'],
					],
					[
						['label' => '분류', 'url' => null, 'subCol' => true, 'sub' => ['설하면역치료', '진단시약', '의료기기', '일상 케어']],
					],
				],
			],

			'business' => [
				'label'     => '사업영역',
				'url'       => 'business',
				'minHeight' => 250,
				'intro'     => [
					'title' => '사업영역',
					'desc'  => '알레르기 환자의 하루를 따라<br>사업 포트폴리오를 설계합니다.',
				],
				'groups' => [
					[
						['label' => '의약품',   'url' => 'business#medicine'],
						['label' => '의료기기', 'url' => 'business#device'],
						['label' => '스킨케어', 'url' => 'business#skincare'],
					],
					[
						['label' => '브랜드', 'url' => null, 'subCol' => true, 'sub' => ['EARVENT', 'ibion (이비온)', 'ruvair (루베어)']],
					],
				],
			],

			'medical' => [
				'label'     => '의료진 지원',
				'url'       => 'medical',
				'minHeight' => 300,
				'intro'     => [
					'title' => '의료진 지원',
					'desc'  => '진료에 필요한 자료와 상담을<br>한 곳에서 연결합니다.',
				],
				'groups' => [
					[
						['label' => '샘플·MR 방문 신청', 'url' => 'medical/support', 'key' => 'support'],
						['label' => 'FAQ',               'url' => 'medical/faq',     'key' => 'faq'],
					],
					[
						['label' => '의료진 문의', 'url' => 'medical/support', 'sub' => ['02-900-0436', 'lofarma@lofarma.kr']],
					],
				],
			],

			'mall' => [
				'label' => '병원전문 쇼핑몰',
				'url'   => '#mall',
			],
		];
	}
}

if (! function_exists('sy_nav_url')) {
	/** 해시(#support)는 메인에서는 그대로, 서브에서는 메인 URL + 해시로 변환합니다. */
	function sy_nav_url(?string $url, bool $isHome = false): string
	{
		if ($url === null || $url === '') {
			return '#none';
		}

		if ($url[0] === '#') {
			return $isHome ? $url : base_url() . $url;
		}

		return base_url($url);
	}
}

$isHome       = $isHome       ?? false;
$gnbCurrent   = $gnbCurrent   ?? '';
$depthCurrent = $depthCurrent ?? '';

$syNav      = sy_site_nav();
$syLogoTag  = $isHome ? 'h1' : 'p';
$syLogoHref = $isHome ? '#content' : base_url();
?>
<header id="header" class="header<?= $isHome ? ' is-transparent header-home' : '' ?>">
	<div class="header-mask"></div>

	<div class="header-bottom">
		<!-- 서브페이지의 h1 은 페이지 제목이므로 로고는 p 로 마크업합니다. -->
		<<?= $syLogoTag ?> class="logo">
			<a href="<?= $syLogoHref ?>" class="logo-link">
				<img src="<?= base_url('images/logo_h.webp') ?>" alt="신영로파마<?= $isHome ? '' : ' 홈으로 이동' ?>" class="logo-img">
			</a>
		</<?= $syLogoTag ?>>

		<div class="header-bottom-center" id="header-nav">
			<nav class="gnb" aria-label="주 메뉴">
				<ul class="gnb-list">
					<?php foreach ($syNav as $navKey => $nav): ?>
						<?php
						$hasDepth  = ! empty($nav['groups']);
						$isCurrent = $navKey === $gnbCurrent;
						// 메인에서는 1depth 를 하위메뉴 토글로만 사용합니다.
						$topIsLink = ! ($isHome && $hasDepth);
						?>
						<li class="gnb-item<?= $isCurrent ? ' is-current' : '' ?>"<?= ! empty($nav['minHeight']) ? ' data-min-height="' . (int) $nav['minHeight'] . '"' : '' ?>>
							<a href="<?= $topIsLink ? sy_nav_url($nav['url'], $isHome) : '#none' ?>" class="gnb-link<?= $topIsLink ? '' : ' no-link' ?>"><?= esc($nav['label']) ?></a>

							<?php if ($hasDepth): ?>
								<div class="gnb-depth">
									<div class="gnb-depth-wrap">
										<div class="gnb-depth-inner">

											<?php if (! empty($nav['intro'])): ?>
												<div class="gnb-depth-intro only-pc">
													<strong class="depth-intro-title"><?= esc($nav['intro']['title']) ?></strong>
													<span class="depth-intro-desc"><?= $nav['intro']['desc'] ?></span>
												</div>
											<?php endif; ?>

											<?php foreach ($nav['groups'] as $group): ?>
												<ul class="gnb-depth-list">
													<?php foreach ($group as $item): ?>
														<li class="gnb-depth-item">
															<?php if (empty($item['url'])): ?>
																<span class="gnb-depth-link no-link"><?= esc($item['label']) ?></span>
															<?php else: ?>
																<a href="<?= sy_nav_url($item['url'], $isHome) ?>" class="gnb-depth-link"<?= ($isCurrent && ! empty($item['key']) && $item['key'] === $depthCurrent) ? ' aria-current="page"' : '' ?>><?= esc($item['label']) ?></a>
															<?php endif; ?>

															<?php if (! empty($item['sub'])): ?>
																<ul class="<?= ! empty($item['subCol']) ? 'gnb-depth2-col-list' : 'gnb-depth2-list' ?>">
																	<?php foreach ($item['sub'] as $sub): ?>
																		<li class="<?= ! empty($item['subCol']) ? 'gnb-depth2-col-item' : 'gnb-depth2-item' ?>"><?= esc($sub) ?></li>
																	<?php endforeach; ?>
																</ul>
															<?php endif; ?>
														</li>
													<?php endforeach; ?>
												</ul>
											<?php endforeach; ?>

										</div>
									</div>
								</div>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</div>

		<div class="header-bottom-right">
			<a href="<?= base_url() ?>" class="btn btn-language<?= $isHome ? '' : ' only-pc' ?>" aria-label="Change language to English">EN</a>
			<button type="button" class="btn btn-gnb js-btn-gnb" aria-label="메뉴 열기/닫기" aria-expanded="false" aria-controls="header-nav">
				<i class="icon-hamburger" aria-hidden="true"></i>
			</button>
		</div>
	</div>
</header>
