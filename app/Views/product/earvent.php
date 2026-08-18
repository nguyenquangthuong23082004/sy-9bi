<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<!-- ===== 히어로 카피 ===== -->
<section class="sy-company-section" aria-labelledby="sy-earvent-hero">
	<div class="sy-company-inner sy-product-hero">
		<div class="sy-product-hero-body">
			<span class="sy-company-eyebrow"><?= esc($contents['hero_eyebrow'] ?? '') ?></span>
			<h2 id="sy-earvent-hero" class="sy-company-lead">
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
			<?php if (!empty($contents['hero_image'])): ?>
				<img src="<?= base_url($contents['hero_image']) ?>" alt="EARVENT 제품 이미지">
			<?php endif; ?>
		</figure>
	</div>
</section>

<!-- ===== 1) EARVENT란 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-earvent-what">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow"><?= esc($contents['about_eyebrow'] ?? '') ?></span>
		<h2 id="sy-earvent-what" class="sy-company-h2"><?= esc($contents['about_title'] ?? '') ?></h2>

		<article class="sy-company-text sy-company-narrow">
			<?= $contents['about_desc'] ?? '' ?>
		</article>
	</div>
</section>

<!-- ===== 2) 용도 ===== -->
<section class="sy-company-section" aria-labelledby="sy-earvent-use">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow"><?= esc($contents['use_eyebrow'] ?? '') ?></span>
		<h2 id="sy-earvent-use" class="sy-company-h2"><?= esc($contents['use_title'] ?? '') ?></h2>

		<article class="sy-company-text sy-company-narrow">
			<?= $contents['use_desc'] ?? '' ?>
		</article>

		<h3 class="sy-company-h3 sy-product-subhead"><?= esc($contents['use_subhead'] ?? '') ?></h3>
		<?php
		$targetTags = !empty($contents['use_target_list']) ? array_map('trim', explode(',', $contents['use_target_list'])) : [];
		?>
		<ul class="sy-product-taglist sy-product-target-list">
			<?php foreach ($targetTags as $t): ?>
				<li><?= esc($t) ?></li>
			<?php endforeach; ?>
		</ul>

		<ul class="sy-company-cols sy-product-cols--2">
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M4 14c4 0 4-4 8-4s4 4 8 4" stroke-linecap="round" />
					<path d="M4 18c4 0 4-4 8-4s4 4 8 4" stroke-linecap="round" />
				</svg>
				<span class="sy-company-cols-en"><?= esc($contents['use_col1_en'] ?? '') ?></span>
				<h3 class="sy-company-h3"><?= esc($contents['use_col1_title'] ?? '') ?></h3>
				<p><?= esc($contents['use_col1_desc'] ?? '') ?></p>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M6 12a6 6 0 0112 0" stroke-linecap="round" />
					<path d="M3 12h3M18 12h3" stroke-linecap="round" />
					<circle cx="12" cy="16" r="3" />
				</svg>
				<span class="sy-company-cols-en"><?= esc($contents['use_col2_en'] ?? '') ?></span>
				<h3 class="sy-company-h3"><?= esc($contents['use_col2_title'] ?? '') ?></h3>
				<p><?= esc($contents['use_col2_desc'] ?? '') ?></p>
			</li>
		</ul>
	</div>
</section>

<!-- ===== 3) 사용 방법 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-earvent-how">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow"><?= esc($contents['how_eyebrow'] ?? '') ?></span>
		<h2 id="sy-earvent-how" class="sy-company-h2"><?= esc($contents['how_title'] ?? '') ?></h2>

		<?php
		$howLines = !empty($contents['how_steps']) ? array_filter(array_map('trim', explode("\n", $contents['how_steps']))) : [];
		$howSteps = [];
		foreach ($howLines as $line) {
			$parts = explode('|', $line, 3);
			$howSteps[] = [
				$parts[0] ?? '',
				$parts[1] ?? '',
				$parts[2] ?? ''
			];
		}
		?>
		<ol class="sy-company-steps">
			<?php foreach ($howSteps as $step): ?>
				<li>
					<span class="sy-company-steps-num"><?= esc($step[0]) ?></span>
					<h3 class="sy-company-h3"><?= esc($step[1]) ?></h3>
					<p><?= esc($step[2]) ?></p>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>

<!-- ===== 4) 안내 문구 ===== -->
<section class="sy-company-section sy-company-section--tight" aria-labelledby="sy-earvent-notice">
	<div class="sy-company-inner">
		<div class="sy-product-notice">
			<h2 id="sy-earvent-notice" class="sy-product-notice-title">
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
<section class="sy-product-cta" aria-labelledby="sy-earvent-cta">
	<div class="sy-company-inner">
		<h2 id="sy-earvent-cta" class="sy-product-cta-title">제품에 대해 문의하시겠습니까?</h2>
		<div class="sy-product-cta-row">
			<a class="sy-product-btn sy-product-btn--primary" href="<?= base_url('#support') ?>">제품 문의하기</a>
			<a class="sy-product-btn" href="<?= base_url('#medical') ?>">의료진 지원 바로가기</a>
		</div>
	</div>
</section>

<?= $this->endSection() ?>

