<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<?php
$dbFaqs = $faqs ?? [];
$syFaqList = [];

if (!empty($dbFaqs) && is_array($dbFaqs)) {
	foreach ($dbFaqs as $item) {
		$syFaqList[] = [
			'q' => $item['subject'] ?? $item['title'] ?? '',
			'a' => $item['contents'] ?? $item['content'] ?? '',
		];
	}
}
?>

<section class="sy-company-section" aria-labelledby="sy-faq-title">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">FAQ</span>
		<h2 id="sy-faq-title" class="sy-company-h2">자주 묻는 질문</h2>

		<?php if (!empty($syFaqList)): ?>
			<ul class="sy-medical-faq">
				<?php foreach ($syFaqList as $syIndex => $syFaq): ?>
					<li>
						<details<?= $syIndex === 0 ? ' open' : '' ?>>
							<summary>
								<span class="sy-medical-faq-q" aria-hidden="true">Q</span>
								<span class="sy-medical-faq-title"><?= esc($syFaq['q']) ?></span>
								<span class="sy-medical-faq-icon" aria-hidden="true"></span>
							</summary>
							<div class="sy-medical-faq-body">
								<?= $syFaq['a'] ?>
							</div>
						</details>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php else: ?>
			<div class="sy-medical-faq-empty" style="text-align: center; padding: 60px 20px; color: #888; font-size: 15px;">
				<p>등록된 자주 묻는 질문이 없습니다.</p>
			</div>
		<?php endif; ?>
	</div>
</section>

<!-- ===== 안내 문구 ===== -->
<section class="sy-company-section sy-company-section--tight" aria-labelledby="sy-faq-notice">
	<div class="sy-company-inner">
		<div class="sy-medical-notice">
			<h2 id="sy-faq-notice" class="sy-medical-notice-title">
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<circle cx="12" cy="12" r="9" />
					<path d="M12 8v5" stroke-linecap="round" />
					<path d="M12 16h.01" stroke-linecap="round" />
				</svg>
				보건의료전문가 대상 안내
			</h2>
			<p>전문의약품 상세 자료는 <strong>보건의료전문가</strong>를 대상으로 제공되며,
				관련 법령에 따라 제공 범위가 제한될 수 있습니다.
				자료 요청 시 소속과 성함을 함께 남겨주시기 바랍니다.</p>
		</div>
	</div>
</section>

<!-- ===== CTA ===== -->
<section class="sy-medical-cta" aria-labelledby="sy-faq-cta">
	<div class="sy-company-inner">
		<h2 id="sy-faq-cta" class="sy-medical-cta-title">원하시는 답변을 찾지 못하셨나요?</h2>
		<div class="sy-medical-cta-row">
			<a class="sy-medical-btn sy-medical-btn--primary" href="<?= base_url('medical/support') ?>">샘플·MR 방문 신청</a>
			<a class="sy-medical-btn" href="tel:02-900-0436">전화 문의 02-900-0436</a>
		</div>
	</div>
</section>

<?= $this->endSection() ?>
