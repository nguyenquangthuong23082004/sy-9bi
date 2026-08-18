<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<!-- ===== 히어로 카피 ===== -->
<section class="sy-company-section" aria-labelledby="sy-skin-hero">
	<div class="sy-company-inner sy-product-hero">
		<div class="sy-product-hero-body">
			<span class="sy-company-eyebrow"><?= esc($contents['hero_eyebrow'] ?? '') ?></span>
			<h2 id="sy-skin-hero" class="sy-company-lead">
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
				<img src="<?= base_url($contents['hero_image']) ?>" alt="피부단자시험 시약 이미지">
			<?php endif; ?>
		</figure>
	</div>
</section>

<!-- ===== 1) 피부단자시험이란 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-skin-what">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow"><?= esc($contents['about_eyebrow'] ?? '') ?></span>
		<h2 id="sy-skin-what" class="sy-company-h2"><?= esc($contents['about_title'] ?? '') ?></h2>

		<article class="sy-company-text sy-company-narrow">
			<?= $contents['about_desc'] ?? '' ?>
		</article>

		<ul class="sy-company-cols sy-product-cols--2">
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<circle cx="11" cy="11" r="7" />
					<path d="M16 16l5 5" stroke-linecap="round" />
				</svg>
				<span class="sy-company-cols-en"><?= esc($contents['about_col1_en'] ?? '') ?></span>
				<h3 class="sy-company-h3"><?= esc($contents['about_col1_title'] ?? '') ?></h3>
				<p><?= esc($contents['about_col1_desc'] ?? '') ?></p>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<circle cx="12" cy="12" r="9" />
					<path d="M12 7v5l3 2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<span class="sy-company-cols-en"><?= esc($contents['about_col2_en'] ?? '') ?></span>
				<h3 class="sy-company-h3"><?= esc($contents['about_col2_title'] ?? '') ?></h3>
				<p><?= esc($contents['about_col2_desc'] ?? '') ?></p>
			</li>
		</ul>
	</div>
</section>

<!-- ===== 2) 항원 라인업 ===== -->
<section class="sy-company-section" aria-labelledby="sy-skin-lineup">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow"><?= esc($contents['lineup_eyebrow'] ?? '') ?></span>
		<h2 id="sy-skin-lineup" class="sy-company-h2"><?= esc($contents['lineup_title'] ?? '') ?></h2>

		<article class="sy-company-text sy-company-narrow">
			<?= $contents['lineup_desc'] ?? '' ?>
		</article>

		<?php
		$keypointLines = !empty($contents['lineup_keypoints']) ? array_filter(array_map('trim', explode("\n", $contents['lineup_keypoints']))) : [];
		$keypoints = [];
		foreach ($keypointLines as $line) {
			$parts = explode('|', $line, 2);
			$keypoints[] = [
				$parts[0] ?? '',
				$parts[1] ?? ''
			];
		}
		?>
		<ul class="sy-company-keypoints sy-product-keypoints--4">
			<?php foreach ($keypoints as $kp): ?>
				<li>
					<strong><?= esc($kp[0]) ?></strong>
					<span><?= esc($kp[1]) ?></span>
				</li>
			<?php endforeach; ?>
		</ul>

		<p class="sy-company-linkrow">
			<a href="<?= base_url('#medical') ?>"><?= esc($contents['lineup_link_text'] ?? '') ?></a>
		</p>
	</div>
</section>

<!-- ===== 3) 발주 및 문의 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-skin-order">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow"><?= esc($contents['order_eyebrow'] ?? '') ?></span>
		<h2 id="sy-skin-order" class="sy-company-h2"><?= esc($contents['order_title'] ?? '') ?></h2>

		<article class="sy-company-text sy-company-narrow">
			<?= $contents['order_desc'] ?? '' ?>
		</article>

		<?php
		$infoLines = !empty($contents['order_info']) ? array_filter(array_map('trim', explode("\n", $contents['order_info']))) : [];
		$infoItems = [];
		foreach ($infoLines as $line) {
			$parts = explode('|', $line, 2);
			$infoItems[] = [
				$parts[0] ?? '',
				$parts[1] ?? ''
			];
		}
		?>
		<dl class="sy-product-info">
			<?php foreach ($infoItems as $item): ?>
				<div>
					<dt><?= esc($item[0]) ?></dt>
					<dd><?= $item[1] ?></dd>
				</div>
			<?php endforeach; ?>
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
