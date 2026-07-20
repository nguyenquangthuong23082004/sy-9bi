<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<!-- ===== 대표 인사말 ===== -->
<section class="sy-company-section" aria-labelledby="sy-greeting-heading">
	<div class="sy-company-inner">
		<h2 id="sy-greeting-heading" class="blind">대표 인사말</h2>

		<div class="sy-company-greeting-grid">

			<!-- 대표/기업 이미지 영역 -->
			<figure class="sy-company-figure sy-company-greeting-visual">
				<?php
				/**
				 * [이미지 교체 위치 1]
				 * 대표이사 또는 기업 이미지.
				 * public/images/company/greeting_ceo.jpg 파일을 추가하면 자동으로 노출됩니다.
				 */
				$syGreetingImage = 'images/company/greeting_ceo.jpg';
				$syGreetingImagePath = FCPATH . $syGreetingImage;
				?>
				<?php if (is_file($syGreetingImagePath)): ?>
					<img src="<?= base_url($syGreetingImage) ?>" alt="신영로파마 대표이사 이주봉">
				<?php else: ?>
					<div class="sy-company-placeholder" role="img" aria-label="대표이사 사진 준비 중">
						<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
							<circle cx="12" cy="8" r="4" />
							<path d="M4 21c0-4 3.6-6.5 8-6.5s8 2.5 8 6.5" stroke-linecap="round" />
						</svg>
						<span>대표이사 사진 영역<br>(images/company/greeting_ceo.jpg)</span>
					</div>
				<?php endif; ?>
			</figure>

			<!-- 인사말 본문 -->
			<article class="sy-company-text">
				<p class="sy-company-lead">
					알레르기 환자의 더 나은 일상을 위해<br>
					신영로파마는 한 분야에 집중해 왔습니다.
				</p>

				<p>신영로파마를 찾아주셔서 감사합니다.</p>

				<p>신영로파마는 2011년 설립 이후 알레르기 한 분야에 집중해 왔습니다.</p>

				<p>저희는 국내 진료 현장에서 필요한 알레르기 진단 시약과 면역치료제를 안정적으로 공급하는 것에서 출발했습니다.
					이후 의료진과 환자의 실제 니즈를 가까이에서 접하며, 알레르기 관리는 치료만으로 끝나지 않는다는 점을 더욱 분명히 확인했습니다.</p>

				<p>그래서 신영로파마는 오늘, 진단과 치료를 넘어 증상 관리와 일상 케어까지 사업 영역을 확장하고 있습니다.
					의약품, 의료기기, 스킨케어 각 영역에서 알레르기 환자의 삶에 실질적으로 도움이 되는 제품과 정보를 제공하는 기업이 되고자 합니다.</p>

				<p>앞으로도 신영로파마는 축적된 전문성과 책임감을 바탕으로 의료진에게는 신뢰할 수 있는 파트너로,
					환자에게는 더 나은 일상을 돕는 브랜드로 함께하겠습니다.</p>

				<p>변화하는 의료 환경 속에서도 제품의 품질과 안정적인 공급이라는 기본을 지키며,
					알레르기 관리의 새로운 가능성을 꾸준히 만들어가겠습니다.</p>

				<p>감사합니다.</p>

				<div class="sy-company-sign">
					<p class="sy-company-sign-company">주식회사 신영로파마</p>
					<p class="sy-company-sign-name">대표이사 이주봉 <span>드림</span></p>

					<?php
					/**
					 * [이미지 교체 위치 2]
					 * 대표 서명 이미지. 없으면 위 텍스트 서명만 노출됩니다.
					 * public/images/company/greeting_sign.png
					 */
					$sySignImage = 'images/company/greeting_sign.png';
					?>
					<?php if (is_file(FCPATH . $sySignImage)): ?>
						<img src="<?= base_url($sySignImage) ?>" alt="대표이사 이주봉 서명" class="sy-company-sign-img">
					<?php endif; ?>
				</div>
			</article>

		</div>
	</div>
</section>

<!-- ===== 핵심 가치 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-greeting-values">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">OUR VALUES</span>
		<h2 id="sy-greeting-values" class="sy-company-h2">신영로파마가 중요하게 생각하는 가치</h2>

		<ul class="sy-company-values">
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M12 3l7 3v5.5c0 4.2-2.9 7.6-7 9.5-4.1-1.9-7-5.3-7-9.5V6l7-3z" stroke-linejoin="round" />
					<path d="M9.5 12l1.8 1.8L15 10" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<h3 class="sy-company-h3">전문성</h3>
				<p>알레르기 한 분야에 집중하며 축적해온 경험과 지식으로 진료 현장에 필요한 답을 찾습니다.</p>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M4 10h16M6 10V7a6 6 0 0112 0v3" stroke-linecap="round" />
					<rect x="4" y="10" width="16" height="10" rx="2" />
				</svg>
				<h3 class="sy-company-h3">신뢰</h3>
				<p>제품의 품질과 안정적인 공급이라는 기본을 지키며 의료진의 신뢰할 수 있는 파트너가 되겠습니다.</p>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M12 20s-7-4.4-7-9a4 4 0 017-2.6A4 4 0 0119 11c0 4.6-7 9-7 9z" stroke-linejoin="round" />
				</svg>
				<h3 class="sy-company-h3">환자 중심</h3>
				<p>환자의 실제 일상에서 출발해, 체감할 수 있는 제품과 정보를 제공합니다.</p>
			</li>
		</ul>
	</div>
</section>

<?= $this->endSection() ?>
