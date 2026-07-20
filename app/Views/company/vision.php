<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<!-- ===== 비전 메시지 ===== -->
<section class="sy-company-section" aria-labelledby="sy-vision-main">
	<div class="sy-company-inner sy-vision-hero">

		<!-- 좌: 비전 메시지 -->
		<div class="sy-vision-hero-body">
			<span class="sy-company-eyebrow">VISION</span>
			<h2 id="sy-vision-main" class="sy-vision-title">
				알레르기 환자의 여정 전체를<br>
				설계하는 회사
			</h2>

			<p class="sy-vision-keyline">정확한 진단, 원인 치료, 증상 관리, 일상 케어.</p>

			<article class="sy-company-text">
				<p>신영로파마는 알레르기를 하나의 증상이나 단일 치료 과정으로 바라보지 않습니다.
					환자가 알레르기의 원인을 확인하는 순간부터 적절한 치료를 선택하고, 반복되는 증상을 관리하며,
					보다 편안한 일상을 이어가기까지 모든 과정을 하나의 여정으로 생각합니다.</p>

				<p>신영로파마는 의약품, 의료기기, 스킨케어 분야의 전문성을 유기적으로 연결하여
					진료실 안과 밖을 잇는 알레르기 전문 기업으로 성장하겠습니다.</p>

				<p>의료진에게는 신뢰할 수 있는 제품과 전문 정보를 제공하고,
					환자에게는 일상 속에서 체감할 수 있는 실질적인 해결책을 제안하겠습니다.</p>
			</article>
		</div>

		<!-- 우: 사업영역 순환 다이어그램 -->
		<div class="sy-vision-diagram">
			<!-- 순환 흐름 (장식용) : 의료기기 → 의약품 → 스킨케어 → 의료기기 -->
			<svg class="sy-vision-diagram-ring" viewBox="0 0 480 480" aria-hidden="true" focusable="false">
				<defs>
					<marker id="syVisionArrow" viewBox="0 0 10 10" refX="8" refY="5"
						markerWidth="7" markerHeight="7" orient="auto-start-reverse">
						<path d="M0 1l8 4-8 4z" fill="#8fb4e8" />
					</marker>
				</defs>

				<circle cx="240" cy="240" r="178" fill="none" stroke="#cfe0f5" stroke-width="1.4" stroke-dasharray="3 9" />

				<g fill="none" stroke="#8fb4e8" stroke-width="1.6" stroke-dasharray="3 9" marker-end="url(#syVisionArrow)">
					<path d="M62.7 255.5 A178 178 0 0 1 164.8 78.7" />
					<path d="M315.2 78.7 A178 178 0 0 1 417.3 255.5" />
					<path d="M342.1 385.8 A178 178 0 0 1 137.9 385.8" />
				</g>

				<!-- 흐름 위 작은 점 (장식) -->
				<g fill="#ffffff" stroke="#cfe0f5" stroke-width="1.4">
					<circle cx="164.8" cy="78.7" r="4.5" />
					<circle cx="417.3" cy="255.5" r="4.5" />
					<circle cx="137.9" cy="385.8" r="4.5" />
				</g>
			</svg>

			<!-- 중앙: 환자 중심 -->
			<div class="sy-vision-core">
				<svg class="sy-vision-core-icon" viewBox="0 0 64 64" aria-hidden="true" focusable="false">
					<path d="M40 56v-8c0-3 1.5-4.5 4-6 3-1.8 4.5-4.5 4.5-8.5 0-1.5 1.5-1.8 2.5-2.4 1-.6 1.2-1.6.6-2.6l-4.2-7.2C45 14 38.5 9 30.5 9 21 9 13.5 16.5 13.5 26c0 5 2 8 4.5 11 1.6 1.9 2.4 3.4 2.4 6v13" />
				</svg>
				<strong>환자 중심</strong>
				<span>여정 전체를 설계합니다</span>
			</div>

			<!-- 의약품 -->
			<div class="sy-vision-node sy-vision-node--medicine">
				<span class="sy-vision-node-icon">
					<svg viewBox="0 0 48 48" aria-hidden="true" focusable="false">
						<path d="M14 18h12v20a4 4 0 01-4 4h-4a4 4 0 01-4-4z" />
						<path d="M12 12h16v6H12z" stroke-linejoin="round" />
						<path d="M14 26h12" />
						<rect x="28" y="24" width="16" height="10" rx="5" transform="rotate(-30 28 24)" />
					</svg>
				</span>
				<strong>의약품</strong>
			</div>

			<!-- 의료기기 -->
			<div class="sy-vision-node sy-vision-node--device">
				<span class="sy-vision-node-icon">
					<svg viewBox="0 0 48 48" aria-hidden="true" focusable="false">
						<rect x="8" y="10" width="32" height="26" rx="3" />
						<path d="M14 25h5l3-6 4 12 3-6h5" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M18 41h12" stroke-linecap="round" />
					</svg>
				</span>
				<strong>의료기기</strong>
			</div>

			<!-- 스킨케어 -->
			<div class="sy-vision-node sy-vision-node--skincare">
				<span class="sy-vision-node-icon">
					<svg viewBox="0 0 48 48" aria-hidden="true" focusable="false">
						<path d="M24 8s12 13 12 20a12 12 0 01-24 0c0-7 12-20 12-20z" stroke-linejoin="round" />
						<path d="M18 28a6 6 0 006 6" stroke-linecap="round" />
						<path d="M35 10l1.5 3.5L40 15l-3.5 1.5L35 20l-1.5-3.5L30 15l3.5-1.5z" stroke-linejoin="round" />
					</svg>
				</span>
				<strong>스킨케어</strong>
			</div>
		</div>

	</div>
</section>

<!-- ===== 비전 단계 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-vision-steps">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">OUR JOURNEY</span>
		<h2 id="sy-vision-steps" class="sy-company-h2">진단에서 일상 케어까지</h2>

		<ol class="sy-company-steps">
			<li>
				<span class="sy-company-steps-num">01</span>
				<h3 class="sy-company-h3">정확한 진단</h3>
				<p>알레르기 원인을 확인하고 적절한 관리의 출발점을 마련합니다.</p>
			</li>
			<li>
				<span class="sy-company-steps-num">02</span>
				<h3 class="sy-company-h3">원인 치료</h3>
				<p>알레르기의 원인에 접근하는 치료 선택을 지원합니다.</p>
			</li>
			<li>
				<span class="sy-company-steps-num">03</span>
				<h3 class="sy-company-h3">증상 관리</h3>
				<p>반복되는 증상을 보다 효과적으로 관리할 수 있도록 돕습니다.</p>
			</li>
			<li>
				<span class="sy-company-steps-num">04</span>
				<h3 class="sy-company-h3">일상 케어</h3>
				<p>환자가 일상에서도 편안함과 삶의 질을 유지할 수 있도록 지원합니다.</p>
			</li>
		</ol>
	</div>
</section>

<!-- ===== 핵심 가치 ===== -->
<section class="sy-company-section" aria-labelledby="sy-vision-values">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">CORE VALUES</span>
		<h2 id="sy-vision-values" class="sy-company-h2">핵심 가치</h2>

		<ul class="sy-company-valuelist">
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M12 3l7 3v5.5c0 4.2-2.9 7.6-7 9.5-4.1-1.9-7-5.3-7-9.5V6l7-3z" stroke-linejoin="round" />
				</svg>
				<dl>
					<dt>전문성</dt>
					<dd>알레르기 한 분야에 집중하며 축적한 경험</dd>
				</dl>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M4 10h16M6 10V7a6 6 0 0112 0v3" stroke-linecap="round" />
					<rect x="4" y="10" width="16" height="10" rx="2" />
				</svg>
				<dl>
					<dt>신뢰</dt>
					<dd>품질과 안정적인 공급을 바탕으로 한 책임</dd>
				</dl>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M10 14a4 4 0 005.7 0l3-3a4 4 0 10-5.7-5.7L11.5 6.8" stroke-linecap="round" />
					<path d="M14 10a4 4 0 00-5.7 0l-3 3A4 4 0 1011 18.7l1.5-1.5" stroke-linecap="round" />
				</svg>
				<dl>
					<dt>연결</dt>
					<dd>진단 · 치료 · 관리 · 케어를 잇는 통합적 관점</dd>
				</dl>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M12 20s-7-4.4-7-9a4 4 0 017-2.6A4 4 0 0119 11c0 4.6-7 9-7 9z" stroke-linejoin="round" />
				</svg>
				<dl>
					<dt>환자 중심</dt>
					<dd>의료진과 환자의 실제 필요에서 출발하는 제품과 서비스</dd>
				</dl>
			</li>
		</ul>
	</div>
</section>

<!-- ===== 브랜드 선언 ===== -->
<section class="sy-company-declare" aria-labelledby="sy-vision-declare">
	<div class="sy-company-inner">
		<h2 id="sy-vision-declare">
			<span class="sy-company-declare-en">From Diagnosis to Daily Care</span>
		</h2>
		<p>진단에서 일상 케어까지, 신영로파마가 함께합니다.</p>
	</div>
</section>

<?= $this->endSection() ?>
