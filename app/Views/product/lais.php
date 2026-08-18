<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<!-- ===== 히어로 카피 ===== -->
<section class="sy-company-section" aria-labelledby="sy-lais-hero">
	<div class="sy-company-inner sy-product-hero">
		<div class="sy-product-hero-body">
			<span class="sy-company-eyebrow"><?= esc($contents['hero_eyebrow'] ?? '') ?></span>
			<h2 id="sy-lais-hero" class="sy-company-lead">
				<?= nl2br(esc($contents['hero_title'] ?? '')) ?>
			</h2>

			<div class="sy-company-text">
				<?= $contents['hero_desc'] ?? '' ?>
			</div>

			<?php
			$heroTags = !empty($contents['hero_tags']) ? array_map('trim', explode(',', $contents['hero_tags'])) : [];
			?>
			<ul class="sy-product-tags">
				<?php foreach ($heroTags as $tag): ?>
					<li><?= esc($tag) ?></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<figure class="sy-company-figure sy-product-hero-visual">
			<img src="<?= base_url($contents['hero_image'] ?? '') ?>" alt="라이스정 제품 이미지">
		</figure>
	</div>
</section>

<!-- ===== 1) 설하면역치료란 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-lais-what">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow"><?= esc($contents['about_eyebrow'] ?? '') ?></span>
		<h2 id="sy-lais-what" class="sy-company-h2"><?= esc($contents['about_title'] ?? '') ?></h2>

		<article class="sy-company-text sy-company-narrow">
			<?= $contents['about_desc'] ?? '' ?>
		</article>

		<ul class="sy-company-cols sy-product-cols--2">
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M12 3l7 3v5.5c0 4.2-2.9 7.6-7 9.5-4.1-1.9-7-5.3-7-9.5V6l7-3z" stroke-linejoin="round" />
				</svg>
				<span class="sy-company-cols-en"><?= esc($contents['about_col1_en'] ?? '') ?></span>
				<h3 class="sy-company-h3"><?= esc($contents['about_col1_title'] ?? '') ?></h3>
				<p><?= esc($contents['about_col1_desc'] ?? '') ?></p>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M4 12h16" stroke-linecap="round" />
					<path d="M8 8l-4 4 4 4" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<span class="sy-company-cols-en"><?= esc($contents['about_col2_en'] ?? '') ?></span>
				<h3 class="sy-company-h3"><?= esc($contents['about_col2_title'] ?? '') ?></h3>
				<p><?= esc($contents['about_col2_desc'] ?? '') ?></p>
			</li>
		</ul>
	</div>
</section>

<!-- ===== 2) 치료 단계 안내 ===== -->
<section class="sy-company-section" aria-labelledby="sy-lais-step">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow"><?= esc($contents['treatment_eyebrow'] ?? '') ?></span>
		<h2 id="sy-lais-step" class="sy-company-h2"><?= esc($contents['treatment_title'] ?? '') ?></h2>

		<article class="sy-company-text sy-company-narrow">
			<p><?= esc($contents['treatment_desc'] ?? '') ?></p>
		</article>

		<ol class="sy-company-steps sy-product-steps--2">
			<li>
				<span class="sy-company-steps-num"><?= esc($contents['treatment_step1_num'] ?? '') ?></span>
				<h3 class="sy-company-h3"><?= esc($contents['treatment_step1_title'] ?? '') ?></h3>
				<p><?= esc($contents['treatment_step1_desc'] ?? '') ?></p>
			</li>
			<li>
				<span class="sy-company-steps-num"><?= esc($contents['treatment_step2_num'] ?? '') ?></span>
				<h3 class="sy-company-h3"><?= esc($contents['treatment_step2_title'] ?? '') ?></h3>
				<p><?= esc($contents['treatment_step2_desc'] ?? '') ?></p>
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
				<?= esc($contents['notice_title'] ?? '') ?>
			</h2>
			<?= $contents['notice_desc'] ?? '' ?>
		</div>
	</div>
</section>

<!-- ===== CTA ===== -->
<section class="sy-product-cta" aria-labelledby="sy-lais-cta">
	<div class="sy-company-inner">
		<h2 id="sy-lais-cta" class="sy-product-cta-title">더 자세한 정보가 필요하신가요?</h2>
		<div class="sy-product-cta-row">
			<a class="sy-product-btn" href="<?= base_url('#medical') ?>">의료진용 상세 정보 보기</a>
		</div>
	</div>
</section>

<?= $this->endSection() ?>