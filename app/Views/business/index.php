<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<?php
/**
 * ruvair(루베어) 브랜드 사이트 주소.
 * 주소가 확정되면 아래 값만 채우면 CTA 가 외부 링크로 활성화됩니다.
 * (비워두면 '준비 중' 상태로 표시됩니다)
 */
$syRuvairUrl = '';
?>

<!-- ===== 페이지 인트로 ===== -->
<section class="sy-company-section" aria-labelledby="sy-business-intro">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">BUSINESS</span>
		<h2 id="sy-business-intro" class="sy-company-lead">
			알레르기 환자의 하루를 따라<br>
			설계했습니다
		</h2>

		<article class="sy-company-text sy-company-narrow">
			<p>알레르기는 진료실에서 끝나지 않습니다.
				진단과 치료, 일상 속 불편 관리, 피부 케어까지 이어집니다.</p>

			<p>그래서 신영로파마의 사업은 환자의 여정을 따라 구성됩니다.</p>
		</article>

		<!-- 영역 요약 -->
		<ol class="sy-business-map">
			<li>
				<a href="#medicine">
					<span class="sy-business-map-num">A</span>
					<strong>의약품</strong>
					<span class="sy-business-map-desc">진단과 치료</span>
				</a>
			</li>
			<li>
				<a href="#device">
					<span class="sy-business-map-num">B</span>
					<strong>의료기기</strong>
					<span class="sy-business-map-desc">증상 관리와 생활 편의</span>
				</a>
			</li>
			<li>
				<a href="#skincare">
					<span class="sy-business-map-num">C</span>
					<strong>스킨케어</strong>
					<span class="sy-business-map-desc">일상 속 피부 케어</span>
				</a>
			</li>
		</ol>
	</div>
</section>

<!-- ===== A. 의약품 ===== -->
<section id="medicine" class="sy-company-section sy-company-section--light" aria-labelledby="sy-business-medicine">
	<div class="sy-company-inner sy-business-row">
		<div class="sy-business-row-body">
			<span class="sy-business-tag">A. PHARMACEUTICALS</span>
			<h2 id="sy-business-medicine" class="sy-company-h2">의약품</h2>

			<div class="sy-company-text">
				<p>신영로파마는 알레르기 피부단자시험 시약과 라이스정을 통해,
					알레르기 진단과 치료를 지원합니다. 정확한 원인 확인과 의료진의 치료 판단을 돕는 것이
					의약품 영역의 핵심 역할입니다.</p>
			</div>

			<ul class="sy-business-brands">
				<li>
					<a href="<?= base_url('product/skin-test') ?>">
						<strong>알레르기 피부단자시험 시약</strong>
						<span>알레르기 원인 확인을 위한 진단시약</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('product/lais') ?>">
						<strong>라이스정</strong>
						<span>설하면역치료에 사용되는 전문의약품</span>
					</a>
				</li>
			</ul>

			<p class="sy-company-linkrow">
				<a href="<?= base_url('product/lais') ?>">제품 보기 <span aria-hidden="true">&rarr;</span></a>
			</p>
		</div>

		<figure class="sy-company-figure sy-business-row-visual">
			<div class="sy-company-placeholder">
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<rect x="3" y="8" width="18" height="8" rx="4" />
					<path d="M12 8v8" />
				</svg>
				<span>의약품 이미지<br>(교체 예정)</span>
			</div>
		</figure>
	</div>
</section>

<!-- ===== B. 의료기기 ===== -->
<section id="device" class="sy-company-section" aria-labelledby="sy-business-device">
	<div class="sy-company-inner sy-business-row sy-business-row--reverse">
		<div class="sy-business-row-body">
			<span class="sy-business-tag">B. MEDICAL DEVICES</span>
			<h2 id="sy-business-device" class="sy-company-h2">의료기기</h2>

			<div class="sy-company-text">
				<p>치료 이후에도 환자의 일상 불편은 계속될 수 있습니다.
					신영로파마는 기존 제품 EARVENT와 의료기기 브랜드 ibion (이비온)을 통해,
					알레르기 환자의 증상 관리와 생활 편의를 돕는 포트폴리오를 전개합니다.</p>
			</div>

			<ul class="sy-business-brands">
				<li>
					<a href="<?= base_url('product/earvent') ?>">
						<strong>EARVENT</strong>
						<span>기존 운영 제품 — 이관 기능 개선을 위한 의료용 고무풍선</span>
					</a>
				</li>
				<li>
					<div class="sy-business-brands-static">
						<strong>ibion <span>(이비온)</span></strong>
						<span>의료기기 브랜드</span>
					</div>
				</li>
			</ul>

			<p class="sy-company-linkrow">
				<a href="<?= base_url('product/earvent') ?>">의료기기 보기 <span aria-hidden="true">&rarr;</span></a>
			</p>
		</div>

		<figure class="sy-company-figure sy-business-row-visual">
			<div class="sy-company-placeholder">
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M9 20c0-3-3-4-3-9a6 6 0 1112 0c0 4-3 4-4 7" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M12 11a2 2 0 100-4 2 2 0 000 4z" />
				</svg>
				<span>의료기기 이미지<br>(교체 예정)</span>
			</div>
		</figure>
	</div>
</section>

<!-- ===== C. 스킨케어 ===== -->
<section id="skincare" class="sy-company-section sy-company-section--light" aria-labelledby="sy-business-skincare">
	<div class="sy-company-inner sy-business-row">
		<div class="sy-business-row-body">
			<span class="sy-business-tag">C. SKINCARE</span>
			<h2 id="sy-business-skincare" class="sy-company-h2">스킨케어</h2>

			<div class="sy-company-text">
				<p>ruvair (루베어)는 알레르기와 민감 피부에 대한 이해를 바탕으로
					일상 속 피부 케어를 제안하는 브랜드입니다.
					단순한 저자극 이미지를 넘어, 실제 생활 속 피부 불편에 맞춘 케어 경험을 지향합니다.</p>
			</div>

			<ul class="sy-business-brands">
				<li>
					<div class="sy-business-brands-static">
						<strong>ruvair <span>(루베어)</span></strong>
						<span>알레르기·민감 피부를 위한 스킨케어 브랜드</span>
					</div>
				</li>
			</ul>

			<p class="sy-company-linkrow">
				<?php if ($syRuvairUrl !== ''): ?>
					<a href="<?= esc($syRuvairUrl, 'attr') ?>" target="_blank" rel="noopener noreferrer">
						ruvair 바로가기 <span aria-hidden="true">&#8599;</span>
						<span class="blind">새 창에서 열림</span>
					</a>
				<?php else: ?>
					<span class="sy-business-linkrow-off" aria-disabled="true">ruvair 바로가기 <em>준비 중</em></span>
				<?php endif; ?>
			</p>
		</div>

		<figure class="sy-company-figure sy-business-row-visual">
			<div class="sy-company-placeholder">
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M12 20s-7-4.4-7-9a4 4 0 017-2.6A4 4 0 0119 11c0 4.6-7 9-7 9z" stroke-linejoin="round" />
				</svg>
				<span>스킨케어 이미지<br>(교체 예정)</span>
			</div>
		</figure>
	</div>
</section>

<!-- ===== 페이지 클로징 ===== -->
<section class="sy-business-closing" aria-labelledby="sy-business-closing">
	<div class="sy-company-inner">
		<h2 id="sy-business-closing" class="sy-business-closing-lead">
			세 가지 사업영역은 서로 다른 제품군을 다루지만,<br>
			하나의 질문에 답합니다.
		</h2>

		<blockquote class="sy-business-quote">
			<p>알레르기 환자의 삶을<br>
				어떻게 더 편안하게 만들 것인가.</p>
		</blockquote>
	</div>
</section>

<?= $this->endSection() ?>
