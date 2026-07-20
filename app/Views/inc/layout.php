<?php
/**
 * 서브페이지 공통 레이아웃 - 회사소개 / 제품 / 정책 공용
 *
 * 컨트롤러에서 전달하는 변수
 *  - $sectionKey      : company | product | '' (섹션 없음: 정책 등 단독 페이지)
 *  - $pageKey         : 섹션 내 현재 페이지 키 (greeting, lais ...)
 *  - $pageTitle       : 페이지 한글 제목 (h1)
 *  - $pageDesc        : 서브 비주얼 짧은 설명 (선택)
 *  - $metaTitle       : <title> (선택)
 *  - $metaDescription : meta description (선택)
 *  - $metaKeywords    : meta keywords (선택)
 *  - $cssFiles        : 추가 CSS (선택, 미지정 시 섹션에 맞게 자동 선택)
 *  - $jsonLd          : JSON-LD (선택)
 *
 * 서브 비주얼 / 로컬 내비 / 본문 타이포는 `sy-company-` 클래스를 공용으로 사용하고,
 * 제품 전용 컴포넌트만 `sy-product-` 접두사를 사용합니다. (product.css 가 company.css 를 import)
 */
$sectionKey = $sectionKey ?? '';
$pageKey    = $pageKey    ?? '';

// 헤더를 먼저 렌더링합니다. (이 시점에 sy_site_nav() 가 정의됩니다)
$syHeaderHtml = view('inc/header', [
	'isHome'       => false,
	'gnbCurrent'   => $sectionKey,
	'depthCurrent' => $pageKey,
]);

$syNavAll   = sy_site_nav();
$sySection  = $syNavAll[$sectionKey] ?? null;
// 로컬 내비게이션 = 해당 섹션 드롭다운의 첫 번째 컬럼 (실제 하위 페이지 목록)
$syLocalNav = $sySection['groups'][0] ?? [];

$syMetaTitle = $metaTitle ?? (($pageTitle ?? '신영로파마') . ' | 신영로파마');
$syMetaDesc  = $metaDescription ?? '신영로파마는 알레르기 한 분야에 집중해온 알레르기 전문 기업입니다.';
// 섹션별 전용 CSS (모두 company.css 를 import 하므로 한 개만 로드하면 됩니다)
$syCssMap = [
	'product'  => 'css/product/product.css',
	'medical'  => 'css/medical/medical.css',
	'business' => 'css/business/business.css',
];
$syCss = $cssFiles ?? [$syCssMap[$sectionKey] ?? 'css/company/company.css'];

// JSON-LD 미지정 시 회사 정보(Organization)를 기본값으로 사용합니다.
$syJsonLd = $jsonLd ?? [
	'@context'      => 'https://schema.org',
	'@type'         => 'Organization',
	'name'          => '주식회사 신영로파마',
	'alternateName' => 'Shinyoung Lofarma',
	'url'           => base_url(),
	'foundingDate'  => '2011',
	'telephone'     => '+82-2-900-0436',
	'email'         => 'lofarma@lofarma.kr',
	'address'       => [
		'@type'           => 'PostalAddress',
		'streetAddress'   => '도봉로 156길 17-5',
		'addressLocality' => '도봉구',
		'addressRegion'   => '서울',
		'addressCountry'  => 'KR',
	],
];

/** 현재 페이지의 로컬 내비 라벨 (브레드크럼 마지막 항목) */
$syCurrentLabel = $pageTitle ?? '';
foreach ($syLocalNav as $syItem) {
	if (($syItem['key'] ?? null) === $pageKey) {
		$syCurrentLabel = $syItem['label'];
		break;
	}
}
?>
<!DOCTYPE html>
<html lang="ko">

<head>
<?= view('inc/head', [
	'metaTitle'       => $syMetaTitle,
	'metaDescription' => $syMetaDesc,
	'metaKeywords'    => $metaKeywords ?? null,
	'cssFiles'        => $syCss,
	'jsonLd'          => $syJsonLd,
]) ?>
</head>

<body class="sy-company-body<?= $sectionKey ? ' sy-' . esc($sectionKey, 'attr') . '-body' : '' ?>">

	<div class="wrap">

		<?= $syHeaderHtml ?>

		<main id="content" class="sy-company-main">

			<!-- 서브 비주얼 -->
			<section class="sy-company-visual" aria-labelledby="sy-page-title">
				<!-- 장식용 라인 그래픽 (의미 없음) -->
				<svg class="sy-company-visual-deco" viewBox="0 0 520 340" aria-hidden="true" focusable="false">
					<g fill="none" stroke="#ffffff" stroke-width="1.2">
						<circle cx="330" cy="170" r="150" />
						<circle cx="330" cy="170" r="104" />
						<circle cx="330" cy="170" r="58" />
						<path d="M0 262h150l26-64 30 128 28-92 24 44h242" stroke-width="1.6" />
						<path d="M330 20v300M180 170h300" stroke-dasharray="4 8" />
					</g>
				</svg>

				<div class="container">
					<?php if ($sectionKey): ?>
						<span class="sy-company-visual-eyebrow"><?= esc(strtoupper($sectionKey)) ?></span>
					<?php endif; ?>
					<h1 id="sy-page-title"><?= esc($pageTitle ?? '') ?></h1>
					<?php if (! empty($pageDesc)): ?>
						<p class="sy-company-visual-desc"><?= esc($pageDesc) ?></p>
					<?php endif; ?>

					<nav class="sy-company-breadcrumb" aria-label="현재 위치">
						<ol>
							<li><a href="<?= base_url() ?>">HOME</a></li>
							<?php if ($sySection): ?>
								<li><a href="<?= base_url($sySection['url']) ?>"><?= esc(strtoupper($sectionKey)) ?></a></li>
							<?php endif; ?>
							<li><span aria-current="page"><?= esc($syCurrentLabel) ?></span></li>
						</ol>
					</nav>
				</div>
			</section>

			<?php if (count($syLocalNav) > 1): ?>
				<!-- 로컬 내비게이션 -->
				<nav class="sy-company-localnav" aria-label="<?= esc($sySection['label']) ?> 하위 메뉴">
					<div class="sy-company-inner">
						<div class="sy-company-localnav-scroll">
							<ul class="sy-company-localnav-list">
								<?php foreach ($syLocalNav as $syItem): ?>
									<li>
										<a href="<?= base_url($syItem['url']) ?>"<?= ($syItem['key'] ?? null) === $pageKey ? ' aria-current="page"' : '' ?>><?= esc($syItem['label']) ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>

						<!-- 모바일: 셀렉트 형태 -->
						<div class="sy-company-localnav-select">
							<label for="syLocalNav" class="blind"><?= esc($sySection['label']) ?> 하위 메뉴 선택</label>
							<select id="syLocalNav" onchange="if(this.value){location.href=this.value;}">
								<?php foreach ($syLocalNav as $syItem): ?>
									<option value="<?= base_url($syItem['url']) ?>"<?= ($syItem['key'] ?? null) === $pageKey ? ' selected' : '' ?>><?= esc($syItem['label']) ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</nav>
			<?php endif; ?>

			<?= $this->renderSection('content') ?>

			<?php if ($sectionKey === 'product'): ?>
				<!-- 다른 제품 보기 -->
				<nav class="sy-product-more" aria-label="다른 제품 보기">
					<div class="sy-company-inner">
						<span class="sy-company-eyebrow">OTHER PRODUCTS</span>
						<ul class="sy-product-more-list">
							<?php foreach ($syLocalNav as $syItem): ?>
								<?php if (($syItem['key'] ?? null) === $pageKey) continue; ?>
								<li>
									<a href="<?= base_url($syItem['url']) ?>">
										<strong><?= esc($syItem['label']) ?></strong>
										<span aria-hidden="true">&rarr;</span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</nav>
			<?php endif; ?>

		</main>

		<?= view('inc/footer') ?>

	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			var header = document.querySelector('.header');
			var gnbBtn = document.querySelector('.js-btn-gnb');

			function onScroll() {
				header.classList.toggle('is-scrolled', window.scrollY > 30);
			}
			window.addEventListener('scroll', onScroll, { passive: true });
			onScroll();

			if (gnbBtn) {
				gnbBtn.addEventListener('click', function () {
					var opened = header.classList.toggle('is-open');
					gnbBtn.setAttribute('aria-expanded', opened ? 'true' : 'false');
				});
			}

			// 모바일에서 1depth 탭 시 하위메뉴 토글
			document.querySelectorAll('.gnb-item > .gnb-link').forEach(function (a) {
				a.addEventListener('click', function (e) {
					var item = this.closest('.gnb-item');
					if (window.innerWidth <= 1180 && item.querySelector('.gnb-depth')) {
						e.preventDefault();
						item.classList.toggle('is-active');
					}
				});
			});
		});
	</script>

</body>

</html>
