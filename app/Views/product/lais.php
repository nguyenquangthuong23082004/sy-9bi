<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<!-- ===== 히어로 카피 ===== -->
<section class="sy-company-section" aria-labelledby="sy-lais-hero">
	<div class="sy-company-inner sy-product-hero">
		<div class="sy-product-hero-body">
			<span class="sy-company-eyebrow">SUBLINGUAL IMMUNOTHERAPY</span>
			<h2 id="sy-lais-hero" class="sy-company-lead">
				알레르기 원인에 접근하는<br>
				치료 옵션, 설하면역치료
			</h2>

			<div class="sy-company-text">
				<p>라이스정은 설하면역치료에 사용되는 <strong>전문의약품</strong>으로,
					의료진의 진단과 처방에 따라 치료 계획이 이루어집니다.</p>
			</div>

			<ul class="sy-product-tags">
				<li>전문의약품</li>
				<li>설하면역치료 (SLIT)</li>
				<li>정제(설하 용해)</li>
			</ul>
		</div>

		<figure class="sy-company-figure sy-product-hero-visual">
			<div class="sy-company-placeholder">
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<rect x="3" y="8" width="18" height="8" rx="4" />
					<path d="M12 8v8" />
				</svg>
				<span>라이스정 제품 이미지<br>(교체 예정)</span>
			</div>
		</figure>
	</div>
</section>

<!-- ===== 1) 설하면역치료란 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-lais-what">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">01. ABOUT</span>
		<h2 id="sy-lais-what" class="sy-company-h2">설하면역치료란</h2>

		<article class="sy-company-text sy-company-narrow">
			<p>알레르겐 면역치료는 알레르기 원인 물질에 대한 면역 반응을 조절하는 치료 접근으로 알려져 있습니다.
				그중 설하면역치료는 혀 밑에 정제를 녹여 복용하는 방식으로, 주사 치료와는 다른 방식의 치료 옵션입니다.</p>
		</article>

		<ul class="sy-company-cols sy-product-cols--2">
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M12 3l7 3v5.5c0 4.2-2.9 7.6-7 9.5-4.1-1.9-7-5.3-7-9.5V6l7-3z" stroke-linejoin="round" />
				</svg>
				<span class="sy-company-cols-en">MECHANISM</span>
				<h3 class="sy-company-h3">원인 물질에 대한 접근</h3>
				<p>증상 완화에 그치지 않고, 알레르기 원인 물질에 대한 면역 반응을 조절하는 치료 접근입니다.</p>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M4 12h16" stroke-linecap="round" />
					<path d="M8 8l-4 4 4 4" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<span class="sy-company-cols-en">ADMINISTRATION</span>
				<h3 class="sy-company-h3">혀 밑에 녹여 복용</h3>
				<p>정제를 혀 밑에서 녹여 복용하는 방식으로, 주사 치료와는 다른 방식의 치료 옵션입니다.</p>
			</li>
		</ul>
	</div>
</section>

<!-- ===== 2) 치료 단계 안내 ===== -->
<section class="sy-company-section" aria-labelledby="sy-lais-step">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">02. TREATMENT</span>
		<h2 id="sy-lais-step" class="sy-company-h2">치료 단계 안내</h2>

		<article class="sy-company-text sy-company-narrow">
			<p>라이스정은 치료 단계에 따라 초기치료와 유지치료 개념으로 이해할 수 있으며,
				구체적인 사용 여부와 방법은 환자 상태와 검사 결과에 따라 의료진이 판단합니다.</p>
		</article>

		<ol class="sy-company-steps sy-product-steps--2">
			<li>
				<span class="sy-company-steps-num">STEP 01</span>
				<h3 class="sy-company-h3">초기치료</h3>
				<p>치료를 시작하는 단계입니다. 시작 시점과 방법은 환자 상태와 검사 결과를 바탕으로 의료진이 결정합니다.</p>
			</li>
			<li>
				<span class="sy-company-steps-num">STEP 02</span>
				<h3 class="sy-company-h3">유지치료</h3>
				<p>치료를 이어가는 단계입니다. 유지 기간과 복용 방법 역시 의료진의 판단에 따릅니다.</p>
			</li>
		</ol>
	</div>
</section>

<!-- ===== 3) 안내 문구 ===== -->
<section class="sy-company-section sy-company-section--tight" aria-labelledby="sy-lais-notice">
	<div class="sy-company-inner">
		<div class="sy-product-notice">
			<h2 id="sy-lais-notice" class="sy-product-notice-title">
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<circle cx="12" cy="12" r="9" />
					<path d="M12 8v5" stroke-linecap="round" />
					<path d="M12 16h.01" stroke-linecap="round" />
				</svg>
				안내 문구
			</h2>
			<p>라이스정은 <strong>전문의약품</strong>으로, 의사의 진단과 처방에 따라 사용해야 합니다.
				치료 가능 여부와 치료 기간은 알레르기 검사 결과를 바탕으로 의료진과 상담하시기 바랍니다.</p>
		</div>
	</div>
</section>

<!-- ===== CTA ===== -->
<section class="sy-product-cta" aria-labelledby="sy-lais-cta">
	<div class="sy-company-inner">
		<h2 id="sy-lais-cta" class="sy-product-cta-title">더 자세한 정보가 필요하신가요?</h2>
		<div class="sy-product-cta-row">
			<a class="sy-product-btn sy-product-btn--primary" href="<?= base_url('#support') ?>">가까운 병원 문의</a>
			<a class="sy-product-btn" href="<?= base_url('#medical') ?>">의료진용 상세 정보 보기</a>
		</div>
	</div>
</section>

<?= $this->endSection() ?>
