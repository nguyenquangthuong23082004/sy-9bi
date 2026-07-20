<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<?php
/**
 * [외부 링크]
 * Lofarma 공식 사이트 URL이 확인되면 아래 변수에 입력하세요.
 * 값이 비어 있으면 링크 버튼은 노출되지 않습니다.
 */
$syLofarmaSiteUrl = '';

/**
 * [이미지 교체 위치 1]
 * Lofarma S.p.A 로고 이미지. 전달받은 원본 로고 파일만 사용하고,
 * 임의로 상표 로고를 새로 만들지 않습니다. 없으면 텍스트로만 표기됩니다.
 * public/images/company/lofarma_logo.png
 */
$syLofarmaLogo = 'images/company/lofarma_logo.png';
?>

<!-- ===== 파트너십 개요 ===== -->
<section class="sy-company-section" aria-labelledby="sy-lofarma-intro">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">PARTNERSHIP</span>
		<h2 id="sy-lofarma-intro" class="sy-company-lead">
			1945년부터 이어온 알레르기 전문성과<br>
			대한민국 진료 현장을 연결합니다.
		</h2>

		<!-- 양사 파트너십 타이틀 -->
		<div class="sy-company-partner">
			<div class="sy-company-partner-card">
				<div class="sy-company-partner-logo">
					<img src="<?= base_url('images/logo_h.webp') ?>" alt="신영로파마 로고">
				</div>
				<p class="sy-company-partner-name">SHINYOUNG LOFARMA</p>
				<p class="sy-company-partner-meta">주식회사 신영로파마 · 대한민국</p>
			</div>

			<div class="sy-company-partner-x" aria-hidden="true">&times;</div>

			<div class="sy-company-partner-card">
				<div class="sy-company-partner-logo">
					<?php if (is_file(FCPATH . $syLofarmaLogo)): ?>
						<img src="<?= base_url($syLofarmaLogo) ?>" alt="Lofarma S.p.A 로고">
					<?php else: ?>
						<!-- 로고 파일이 준비되면 위 경로에 추가하세요. 임의 로고를 생성하지 않습니다. -->
						<span class="sy-company-partner-name">LOFARMA</span>
					<?php endif; ?>
				</div>
				<p class="sy-company-partner-name">LOFARMA S.p.A</p>
				<p class="sy-company-partner-meta">이탈리아 · 1945년부터 알레르기 분야에 집중</p>
			</div>
		</div>

		<?php if (!empty($syLofarmaSiteUrl)): ?>
			<p class="sy-company-linkrow">
				<a href="<?= esc($syLofarmaSiteUrl, 'attr') ?>" target="_blank" rel="noopener noreferrer">
					Lofarma 공식 사이트 바로가기 (새 창)
				</a>
			</p>
		<?php endif; ?>
	</div>
</section>

<!-- ===== 본문 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-lofarma-about">
	<div class="sy-company-inner">
		<h2 id="sy-lofarma-about" class="sy-company-h2">Lofarma S.p.A와의 협력</h2>

		<article class="sy-company-text">
			<p>Lofarma S.p.A는 1945년부터 알레르기 진단과 알레르기 면역치료 분야에 집중해온 이탈리아의 알레르기 전문 기업입니다.</p>

			<p>신영로파마는 Lofarma S.p.A와의 협력을 바탕으로 국내 의료진이 필요로 하는 알레르기 관련 제품과 전문 정보를 제공하고 있습니다.</p>

			<p>양사는 알레르기 분야에 대한 전문성과 축적된 경험을 공유하며, 국내 진료 환경에 적합한 제품을 안정적으로 공급하기 위해 협력하고 있습니다.
				신영로파마는 단순한 제품 유통을 넘어 의료진이 제품을 보다 정확하게 이해하고 활용할 수 있도록 관련 정보와 지원 체계를 지속적으로 강화해 나가고 있습니다.</p>

			<p>앞으로도 신영로파마는 Lofarma S.p.A와의 긴밀한 파트너십을 통해 알레르기 진단과 치료의 발전에 기여하고,
				국내 환자들의 더 나은 치료 경험을 지원하겠습니다.</p>
		</article>
	</div>
</section>

<!-- ===== 핵심 협력 분야 ===== -->
<section class="sy-company-section" aria-labelledby="sy-lofarma-areas">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">KEY AREAS</span>
		<h2 id="sy-lofarma-areas" class="sy-company-h2">핵심 협력 분야</h2>

		<ul class="sy-company-cols">
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<circle cx="11" cy="11" r="6" />
					<path d="M15.5 15.5L21 21" stroke-linecap="round" />
				</svg>
				<span class="sy-company-cols-en">Allergy Diagnosis</span>
				<h3 class="sy-company-h3">알레르기 진단</h3>
				<p>알레르기 원인을 확인하기 위한 진단 분야입니다.</p>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M4 12h4l2-6 3 12 2.5-6H20" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<span class="sy-company-cols-en">Allergen Immunotherapy</span>
				<h3 class="sy-company-h3">알레르기 면역치료</h3>
				<p>알레르기의 원인에 접근하는 면역치료 분야입니다.</p>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M10 14a4 4 0 005.7 0l3-3a4 4 0 10-5.7-5.7L11.5 6.8" stroke-linecap="round" />
					<path d="M14 10a4 4 0 00-5.7 0l-3 3A4 4 0 1011 18.7l1.5-1.5" stroke-linecap="round" />
				</svg>
				<span class="sy-company-cols-en">Professional Partnership</span>
				<h3 class="sy-company-h3">전문 파트너십</h3>
				<p>국내 의료 현장과 글로벌 전문성을 연결하는 협력입니다.</p>
			</li>
		</ul>
	</div>
</section>

<!-- ===== 이탈리아–대한민국 연결 그래픽 ===== -->
<section class="sy-company-section sy-company-section--tight sy-company-section--light" aria-labelledby="sy-lofarma-bridge">
	<div class="sy-company-inner">
		<h2 id="sy-lofarma-bridge" class="blind">이탈리아와 대한민국을 연결하는 협력</h2>
		<figure class="sy-company-figure">
			<svg viewBox="0 0 1000 160" width="100%" height="160" aria-hidden="true" focusable="false">
				<g fill="none" stroke="#0b2a5b" stroke-width="1.4">
					<circle cx="140" cy="100" r="7" fill="#0b2a5b" />
					<circle cx="860" cy="100" r="7" fill="#0b2a5b" />
					<path d="M140 100C360 -10 640 -10 860 100" stroke-dasharray="6 8" />
				</g>
				<g fill="#07111f" font-size="14" font-weight="700" font-family="Pretendard, sans-serif">
					<text x="140" y="132" text-anchor="middle">ITALY</text>
					<text x="860" y="132" text-anchor="middle">KOREA</text>
				</g>
			</svg>
			<figcaption>이탈리아 Lofarma S.p.A의 전문성과 대한민국 진료 현장을 잇는 협력 구조</figcaption>
		</figure>
	</div>
</section>

<?= $this->endSection() ?>
