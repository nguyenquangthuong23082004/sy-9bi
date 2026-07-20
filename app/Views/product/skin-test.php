<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<!-- ===== 히어로 카피 ===== -->
<section class="sy-company-section" aria-labelledby="sy-skin-hero">
	<div class="sy-company-inner sy-product-hero">
		<div class="sy-product-hero-body">
			<span class="sy-company-eyebrow">SKIN PRICK TEST</span>
			<h2 id="sy-skin-hero" class="sy-company-lead">
				정확한 치료는<br>
				정확한 진단에서 시작됩니다
			</h2>

			<div class="sy-company-text">
				<p>다양한 항원 라인업으로 집먼지진드기부터 꽃가루, 식품까지
					폭넓은 알레르기 원인 검사를 지원합니다.</p>
			</div>

			<ul class="sy-product-tags">
				<li>진단시약</li>
				<li>흡입 항원</li>
				<li>식품 항원</li>
			</ul>
		</div>

		<figure class="sy-company-figure sy-product-hero-visual">
			<div class="sy-company-placeholder">
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M14 3l7 7-9 9H5v-7l9-9z" stroke-linejoin="round" />
					<path d="M11 6l7 7" />
				</svg>
				<span>피부단자시험 시약 이미지<br>(교체 예정)</span>
			</div>
		</figure>
	</div>
</section>

<!-- ===== 1) 피부단자시험이란 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-skin-what">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">01. ABOUT</span>
		<h2 id="sy-skin-what" class="sy-company-h2">피부단자시험이란</h2>

		<article class="sy-company-text sy-company-narrow">
			<p>피부단자시험은 의심되는 알레르겐을 피부에 소량 노출시켜 반응을 확인하는 검사입니다.
				빠르고 간편하게 알레르기 원인을 파악하는 데 널리 활용됩니다.</p>
		</article>

		<ul class="sy-company-cols sy-product-cols--2">
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<circle cx="11" cy="11" r="7" />
					<path d="M16 16l5 5" stroke-linecap="round" />
				</svg>
				<span class="sy-company-cols-en">PRINCIPLE</span>
				<h3 class="sy-company-h3">소량 노출 후 반응 확인</h3>
				<p>의심되는 알레르겐을 피부에 소량 노출시켜 나타나는 반응을 확인하는 방식의 검사입니다.</p>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<circle cx="12" cy="12" r="9" />
					<path d="M12 7v5l3 2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<span class="sy-company-cols-en">ADVANTAGE</span>
				<h3 class="sy-company-h3">빠르고 간편한 확인</h3>
				<p>알레르기 원인을 파악하는 데 빠르고 간편한 방법으로 진료 현장에서 널리 활용됩니다.</p>
			</li>
		</ul>
	</div>
</section>

<!-- ===== 2) 항원 라인업 ===== -->
<section class="sy-company-section" aria-labelledby="sy-skin-lineup">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">02. LINE-UP</span>
		<h2 id="sy-skin-lineup" class="sy-company-h2">항원 라인업</h2>

		<article class="sy-company-text sy-company-narrow">
			<p>신영로파마는 다양한 흡입 항원 및 식품 항원 라인업을 통해 의료진의 진단을 지원합니다.
				공급 가능 항원 리스트는 자료실에서 확인할 수 있습니다.</p>
		</article>

		<ul class="sy-company-keypoints sy-product-keypoints--4">
			<li>
				<strong>집먼지진드기</strong>
				<span>대표적인 실내 흡입 항원</span>
			</li>
			<li>
				<strong>꽃가루</strong>
				<span>수목 · 잡초 · 화분류</span>
			</li>
			<li>
				<strong>동물 · 곰팡이</strong>
				<span>생활 환경 유래 항원</span>
			</li>
			<li>
				<strong>식품</strong>
				<span>식품 알레르겐 라인업</span>
			</li>
		</ul>

		<p class="sy-company-linkrow">
			<a href="<?= base_url('#medical') ?>">공급 가능 항원 리스트 보기</a>
		</p>
	</div>
</section>

<!-- ===== 3) 발주 및 문의 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-skin-order">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">03. ORDER</span>
		<h2 id="sy-skin-order" class="sy-company-h2">발주 및 문의</h2>

		<article class="sy-company-text sy-company-narrow">
			<p>항원 리스트, 유효기간, 발주 절차 관련 문의는 의료진 지원 페이지 또는 담당 연락처를 통해 가능합니다.</p>
		</article>

		<dl class="sy-product-info">
			<div>
				<dt>문의 항목</dt>
				<dd>항원 리스트 · 유효기간 · 발주 절차</dd>
			</div>
			<div>
				<dt>문의 경로</dt>
				<dd>의료진 지원 페이지 또는 담당 연락처</dd>
			</div>
			<div>
				<dt>대표 전화</dt>
				<dd><a href="tel:02-900-0436">02-900-0436</a></dd>
			</div>
			<div>
				<dt>이메일</dt>
				<dd><a href="mailto:lofarma@lofarma.kr">lofarma@lofarma.kr</a></dd>
			</div>
		</dl>
	</div>
</section>

<!-- ===== CTA ===== -->
<section class="sy-product-cta" aria-labelledby="sy-skin-cta">
	<div class="sy-company-inner">
		<h2 id="sy-skin-cta" class="sy-product-cta-title">진단에 필요한 자료를 확인하세요</h2>
		<div class="sy-product-cta-row">
			<a class="sy-product-btn sy-product-btn--primary" href="<?= base_url('#medical') ?>">공급 가능 항원 리스트 보기</a>
			<a class="sy-product-btn" href="<?= base_url('#medical') ?>">의료진 지원 바로가기</a>
		</div>
	</div>
</section>

<?= $this->endSection() ?>
