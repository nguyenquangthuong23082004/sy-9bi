<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<!-- ===== 회사 스토리 ===== -->
<section class="sy-company-section" aria-labelledby="sy-history-story">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">OUR STORY</span>
		<h2 id="sy-history-story" class="sy-company-lead">
			한 분야를 향한 꾸준한 집중이<br>
			신영로파마의 전문성을 만들었습니다.
		</h2>

		<article class="sy-company-text">
			<p>신영로파마는 2011년 설립 이래 알레르기 분야에 집중해온 알레르기 전문 기업입니다.</p>

			<p>설립 초기부터 이탈리아 Lofarma S.p.A와의 협력을 바탕으로 알레르기 진단 시약과 설하면역치료제를 국내 진료 현장에 공급해 왔습니다.
				의료진과 환자의 목소리를 가까이에서 들으며 국내 알레르기 진료 환경에 필요한 제품과 정보를 제공하기 위해 꾸준히 노력해 왔습니다.</p>

			<p>현재 신영로파마는 의약품 중심의 사업을 넘어 의료기기와 스킨케어 영역까지 사업을 확장하고 있습니다.
				진단에서 치료로, 증상 관리에서 일상 케어로 이어지는 알레르기 환자의 여정 전반을 보다 세심하게 지원하는 것이 신영로파마가 나아가는 방향입니다.</p>

			<p>신영로파마는 앞으로도 알레르기 분야에서 쌓아온 경험을 바탕으로 의료진과 환자 모두가 신뢰할 수 있는 제품과 솔루션을 제공하겠습니다.</p>
		</article>
	</div>
</section>

<!-- ===== 핵심 메시지 ===== -->
<section class="sy-company-section sy-company-section--tight sy-company-section--light" aria-labelledby="sy-history-keypoints">
	<div class="sy-company-inner">
		<h2 id="sy-history-keypoints" class="blind">신영로파마 핵심 메시지</h2>
		<ul class="sy-company-keypoints">
			<li>
				<strong>2011년 설립</strong>
				<span>알레르기 전문 기업으로 출발</span>
			</li>
			<li>
				<strong>알레르기 분야 집중</strong>
				<span>한 분야에 집중해온 전문성</span>
			</li>
			<li>
				<strong>글로벌 전문기업 협력</strong>
				<span>이탈리아 Lofarma S.p.A와의 파트너십</span>
			</li>
			<li>
				<strong>사업 영역 확장</strong>
				<span>의약품 · 의료기기 · 스킨케어</span>
			</li>
		</ul>
	</div>
</section>

<!-- ===== 연혁 ===== -->
<section class="sy-company-section" aria-labelledby="sy-history-timeline">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">HISTORY</span>
		<h2 id="sy-history-timeline" class="sy-company-h2">연혁</h2>

		<ol class="sy-company-timeline">
			<?php foreach ($syHistory as $syRow): ?>
				<?php 
				$itemsList = is_array($syRow['items']) ? $syRow['items'] : explode("\n", $syRow['items']);
				?>
				<li>
					<h3 class="sy-company-timeline-year"><span><?= esc($syRow['year']) ?>년 ~</span></h3>
					<div class="sy-company-timeline-body">
						<ul>
							<?php foreach ($itemsList as $syItem): ?>
								<?php if (trim($syItem) !== ''): ?>
									<li><?= esc(trim($syItem)) ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>

<?= $this->endSection() ?>
