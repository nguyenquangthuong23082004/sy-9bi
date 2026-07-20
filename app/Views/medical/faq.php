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
} else {
	$syFaqList = [
		[
			'q' => '라이스정 관련 자료는 어디서 확인할 수 있나요?',
			'a' => '<p>라이스정은 전문의약품으로, 상세 제품 자료는 보건의료전문가를 대상으로 제공됩니다.
					<a href="' . base_url('medical/support?req=lais') . '">샘플·MR 방문 신청</a> 양식에 소속과 성함을 남겨주시면
					담당자가 확인 후 안내드립니다.</p>
					<p>설하면역치료의 개념과 치료 단계 등 일반 정보는
					<a href="' . base_url('product/lais') . '">라이스정 제품 페이지</a>에서 확인하실 수 있습니다.</p>',
		],
		[
			'q' => '피부단자시험 시약 항원 리스트는 어떻게 받나요?',
			'a' => '<p>공급 가능 항원 리스트는 수급 상황에 따라 변동될 수 있어 요청 시점 기준으로 안내드리고 있습니다.
					<a href="' . base_url('medical/support?req=skin-test') . '">자료 요청 양식</a>을 통해 신청해 주시면
					최신 리스트와 유효기간 정보를 함께 보내드립니다.</p>',
		],
		[
			'q' => '신규 거래 개설 절차가 궁금합니다.',
			'a' => '<p>신규 거래는 담당자 상담 후 진행됩니다. 병원명, 진료과, 담당자 연락처를 남겨주시면
					담당 MR이 연락드려 필요한 서류와 절차를 안내드립니다.</p>
					<p>대표 전화 <a href="tel:02-900-0436">02-900-0436</a> 또는
					<a href="mailto:lofarma@lofarma.kr">lofarma@lofarma.kr</a> 으로도 문의하실 수 있습니다.</p>',
		],
		[
			'q' => 'EARVENT 및 ibion 문의는 어디로 접수하나요?',
			'a' => '<p>의료기기 제품 문의는 <a href="' . base_url('medical/support?req=earvent') . '">샘플·MR 방문 신청</a> 양식에서
					요청 사항을 선택해 접수하실 수 있습니다.</p>
					<p>EARVENT의 용도와 사용 방법은
					<a href="' . base_url('product/earvent') . '">제품 페이지</a>에서 확인하실 수 있습니다.</p>',
		],
	];
}
?>

<section class="sy-company-section" aria-labelledby="sy-faq-title">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">FAQ</span>
		<h2 id="sy-faq-title" class="sy-company-h2">자주 묻는 질문</h2>

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
