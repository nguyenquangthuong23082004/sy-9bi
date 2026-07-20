<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<!-- ===== 인트로 카피 ===== -->
<section class="sy-company-section" aria-labelledby="sy-medical-intro">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">MEDICAL SUPPORT</span>
		<h2 id="sy-medical-intro" class="sy-company-lead">
			진료에 필요한 자료를<br>
			한 곳에 모았습니다
		</h2>

		<article class="sy-company-text sy-company-narrow">
			<p>라이스정 관련 자료, 진단시약 정보, 의료기기 자료, 임상연구 현황, 샘플 및 상담 요청까지
				신영로파마는 전국의 알레르기 진료 현장을 가까이에서 지원합니다.</p>
		</article>
	</div>
</section>

<!-- ===== 빠른 메뉴 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-medical-quick">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">QUICK MENU</span>
		<h2 id="sy-medical-quick" class="sy-company-h2">빠른 메뉴</h2>

		<ul class="sy-medical-quick">
			<li>
				<a href="<?= base_url('medical/support?req=lais') ?>">
					<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
						<rect x="3" y="8" width="18" height="8" rx="4" />
						<path d="M12 8v8" />
					</svg>
					<strong>라이스정 자료</strong>
					<span>설하면역치료 관련 자료 요청</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('medical/support?req=skin-test') ?>">
					<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
						<circle cx="11" cy="11" r="7" />
						<path d="M16 16l5 5" stroke-linecap="round" />
					</svg>
					<strong>진단시약 자료</strong>
					<span>피부단자시험 항원 리스트 요청</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('medical/support?req=earvent') ?>">
					<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
						<path d="M9 20c0-3-3-4-3-9a6 6 0 1112 0c0 4-3 4-4 7" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M12 11a2 2 0 100-4 2 2 0 000 4z" />
					</svg>
					<strong>EARVENT / 의료기기 자료</strong>
					<span>의료기기 제품 자료 요청</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('medical/support') ?>">
					<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
						<path d="M4 6h16v12H4z" stroke-linejoin="round" />
						<path d="M4 7l8 6 8-6" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<strong>샘플·방문 신청</strong>
					<span>제품 상담 및 MR 방문 신청</span>
				</a>
			</li>
		</ul>
	</div>
</section>

<!-- ===== 지원 안내 ===== -->
<section class="sy-company-section" aria-labelledby="sy-medical-guide">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">SUPPORT</span>
		<h2 id="sy-medical-guide" class="sy-company-h2">이렇게 지원합니다</h2>

		<ul class="sy-company-cols">
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M6 4h9l5 5v11H6z" stroke-linejoin="round" />
					<path d="M15 4v5h5" stroke-linejoin="round" />
				</svg>
				<span class="sy-company-cols-en">DOCUMENTS</span>
				<h3 class="sy-company-h3">제품 자료 제공</h3>
				<p>라이스정, 진단시약, 의료기기 등 제품별 자료와 임상연구 현황을 안내합니다.</p>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M12 3l7 3v5.5c0 4.2-2.9 7.6-7 9.5-4.1-1.9-7-5.3-7-9.5V6l7-3z" stroke-linejoin="round" />
				</svg>
				<span class="sy-company-cols-en">SAMPLE</span>
				<h3 class="sy-company-h3">샘플·상담 지원</h3>
				<p>제품 샘플 문의와 담당 MR 방문 상담을 신청하실 수 있습니다.</p>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<circle cx="12" cy="12" r="9" />
					<path d="M9.5 9.5a2.5 2.5 0 113 2.5v1.5" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M12 17h.01" stroke-linecap="round" />
				</svg>
				<span class="sy-company-cols-en">FAQ</span>
				<h3 class="sy-company-h3">자주 묻는 질문</h3>
				<p>자료 확인, 항원 리스트 요청, 신규 거래 개설 절차 등을 정리했습니다.</p>
			</li>
		</ul>
	</div>
</section>

<!-- ===== 안내 문구 ===== -->
<section class="sy-company-section sy-company-section--tight" aria-labelledby="sy-medical-notice">
	<div class="sy-company-inner">
		<div class="sy-medical-notice">
			<h2 id="sy-medical-notice" class="sy-medical-notice-title">
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<circle cx="12" cy="12" r="9" />
					<path d="M12 8v5" stroke-linecap="round" />
					<path d="M12 16h.01" stroke-linecap="round" />
				</svg>
				보건의료전문가 대상 안내
			</h2>
			<p>본 페이지의 자료는 <strong>보건의료전문가</strong>를 대상으로 제공됩니다.
				전문의약품 상세 정보는 관련 법령에 따라 제공 범위가 제한될 수 있으며,
				자료 요청 시 소속과 성함을 함께 남겨주시기 바랍니다.</p>
		</div>
	</div>
</section>

<!-- ===== CTA ===== -->
<section class="sy-medical-cta" aria-labelledby="sy-medical-cta">
	<div class="sy-company-inner">
		<h2 id="sy-medical-cta" class="sy-medical-cta-title">필요한 자료가 있으신가요?</h2>
		<div class="sy-medical-cta-row">
			<a class="sy-medical-btn sy-medical-btn--primary" href="<?= base_url('medical/support') ?>">샘플·MR 방문 신청</a>
			<a class="sy-medical-btn" href="<?= base_url('medical/faq') ?>">자주 묻는 질문 보기</a>
		</div>
	</div>
</section>

<?= $this->endSection() ?>
