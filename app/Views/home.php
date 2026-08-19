<!DOCTYPE html>
<!DOCTYPE html>
<html lang="ko">

<head>
	<?= view('inc/head', [
		'metaTitle' => '신영로파마 | 알레르기 전문 기업',
		'metaDescription' => '신영로파마는 알레르기의 진단, 치료, 증상 관리, 일상 케어까지 환자의 여정 전체를 함께하는 알레르기 전문 기업입니다.',
		'ogImage' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=85',
		'preconnect' => ['https://images.unsplash.com', 'https://videos.pexels.com'],
		'usePretendard' => false,
		'cssFiles' => ['css/home.css'],
		'headExtra' => ''
	]) ?>
</head>

<body>
	<div class="wrap">
		<?= view('inc/header', ['isHome' => true]) ?>
		<main id="content" class="content page-home js-page-home">
			<div class="main-content">
				<div class="section key-visual">
					<div class="key-visual-inner">
						<div class="swiper swiper-key-visual">
							<div class="kv-wrapper">
								<?php if (!empty($mainBanners) && is_array($mainBanners)): ?>
									<?php foreach ($mainBanners as $idx => $mb): ?>
										<?php
										$mbImgPc = !empty($mb['ufile6']) ? base_url('data/bbs/' . $mb['ufile6']) : (!empty($mb['ufile5']) ? base_url('data/bbs/' . $mb['ufile5']) : '');
										$mbImgMob = !empty($mb['ufile5']) ? base_url('data/bbs/' . $mb['ufile5']) : (!empty($mb['ufile6']) ? base_url('data/bbs/' . $mb['ufile6']) : '');
										$mbSub = !empty($mb['sub_title']) ? str_replace(['&lt;br&gt;', '&lt;br/&gt;', '&lt;br &gt;', '&lt;br /&gt;'], '<br>', esc($mb['sub_title'])) : '';
										$mbTitle = !empty($mb['subject']) ? nl2br(str_replace(['&lt;br&gt;', '&lt;br/&gt;', '&lt;br &gt;', '&lt;br /&gt;'], '<br>', esc($mb['subject']))) : '';
										$mbDesc = !empty($mb['contents']) ? nl2br(str_replace(['&lt;br&gt;', '&lt;br/&gt;', '&lt;br &gt;', '&lt;br /&gt;'], '<br>', esc($mb['contents']))) : '';
										$mbUrl = !empty($mb['url']) ? esc($mb['url'], 'attr') : '';
										$mbHasImg = !empty($mbImgPc) || !empty($mbImgMob);
										?>
										<?php if (!$mbHasImg)
											continue; ?>
										<div class="kv-slide<?= $idx === 0 ? ' is-active' : '' ?>">
											<?php if ($mbUrl): ?>
												<a href="<?= $mbUrl ?>" class="kv-slide-link"
													style="position:absolute;inset:0;z-index:2;display:block;"
													aria-label="<?= esc($mb['subject'] ?? '배너 링크') ?>"></a>
											<?php endif; ?>
											<?php if ($mbHasImg): ?>
												<picture style="display:block; width:100%; height:100%;">
													<?php if ($mbImgMob): ?>
														<source media="(max-width: 767px)" srcset="<?= $mbImgMob ?>">
													<?php endif; ?>
													<img src="<?= $mbImgPc ?: $mbImgMob ?>" alt="<?= esc($mb['subject'] ?? '') ?>"
														class="key-visual-img">
												</picture>
											<?php endif; ?>
											<div class="key-visual-content">
												<?php if (!empty($mbSub)): ?>
													<span class="sub-title"><span class="text"><?= $mbSub ?></span></span>
												<?php endif; ?>
												<?php if (!empty($mbTitle)): ?>
													<span class="title"><span class="text"><?= $mbTitle ?></span></span>
												<?php endif; ?>
												<?php if (!empty($mbDesc)): ?>
													<p class="desc"><?= $mbDesc ?></p>
												<?php endif; ?>
												<div class="kv-content-buttons" style="position: relative; z-index: 10;">
													<a href="<?= !empty($mbUrl) ? $mbUrl : base_url('product') ?>" class="btn-kv-action">
														<?= !empty($mb['btn_text']) ? esc($mb['btn_text']) : '제품 소개 보기' ?>
													</a>
													<a href="<?= base_url('medical/support') ?>" class="btn-kv-action btn-kv-secondary">
														의료진 자료 요청
													</a>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<div class="group-btn"><button type="button" class="btn-key-visual btn-key-visual-prev"
									aria-label="이전 슬라이드"></button><button type="button"
									class="btn-key-visual btn-key-visual-next" aria-label="다음 슬라이드"></button></div>
							<div class="key-visual-function">
								<div class="key-visual-progress"><span class="current">01</span><span
										class="line-progress"><span class="line-progress-current"></span></span><span
										class="total">04</span></div><button type="button"
									class="btn-control is-pause js-btn-control-kv" aria-label="Pause"><span
										class="blind">pause</span></button>
							</div>
							<span class="scroll-down">SCROLL</span>
						</div>
					</div>
				</div>

				<!-- 2. 주요 현황 (OUR EXPERTISE) -->
				<section id="info" class="section section-stats blob-section">
					<div class="container">
						<div class="stats-layout">
							<!-- Left Side Title -->
							<div class="stats-left">
								<span class="eyebrow-tag" data-animate>
									<span class="ko">주요현황</span>
									<span class="en">OUR EXPERTISE</span>
								</span>
								<h2 class="section-title" data-animate style="--i: 1">
									알레르기 한 분야에<br><span class="gradient-text">축적해온 전문성</span>
								</h2>
								<p class="section-desc" data-animate style="--i: 2">
									신영로파마는 이탈리아 알레르기 전문기업 Lofarma S.p.A와의 협력을 바탕으로 국내 의료진에게 알레르기 진단 및 면역치료 관련 제품과 정보를
									제공해 왔습니다.
								</p>
								<div class="stats-action" data-animate style="--i: 3; margin-top: 32px;">
									<a href="<?= base_url('medical/support') ?>" class="btn btn-primary">
										의료진 지원 바로가기
										<svg class="btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<line x1="5" y1="12" x2="19" y2="12"></line>
											<polyline points="12 5 19 12 12 19"></polyline>
										</svg>
									</a>
								</div>
							</div>

							<!-- Right Side Stats Grid -->
							<div class="stats-right">
								<div class="stats-grid">
									<div class="stat-card" data-animate style="--i: 3">
										<span class="stat-label">Lofarma S.p.A 창립</span>
										<strong class="stat-value">
											<span class="count" data-count="1945">0</span><span class="unit">년</span>
										</strong>
									</div>

									<div class="stat-card" data-animate style="--i: 4">
										<span class="stat-label">신영로파마 설립</span>
										<strong class="stat-value">
											<span class="count" data-count="2011">0</span><span class="unit">년</span>
										</strong>
									</div>

									<div class="stat-card" data-animate style="--i: 5">
										<span class="stat-label">전국 협력 의원·클리닉</span>
										<strong class="stat-value">
											<span class="count" data-count="3000">0</span><span class="unit">+</span>
										</strong>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<!-- 3. 사업영역 (Business Areas) -->
				<section id="business" class="section section-business blob-section">
					<div class="container">
						<!-- Section Header -->
						<div class="section-header-center">
							<span class="eyebrow-tag" data-animate>
								<span class="ko">사업영역</span>
								<span class="en">ONE EXPERTISE, COMPLETE CARE</span>
							</span>
							<h2 class="section-title" data-animate style="--i: 1">진단부터 치료와 <span
									class="gradient-text">일상 관리까지</span></h2>
							<p class="section-desc" data-animate style="--i: 2">
								알레르기와 반복되는 증상은 원인을 찾고, 치료하고, 일상에서 관리하는 과정이 모두 필요합니다.<br>
								신영로파마는 알레르기 진단과 면역치료에서 시작해 의료기기와 피부 증상별 케어까지 사업영역을 확장하고 있습니다.
							</p>
						</div>

						<!-- 4 Columns Grid -->
						<div class="business-grid">
							<!-- Diagnosis -->
							<div class="business-card" data-animate style="--i: 3">
								<div class="business-icon icon-blue">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
										stroke-linecap="round" stroke-linejoin="round">
										<circle cx="11" cy="11" r="8"></circle>
										<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
									</svg>
								</div>
								<div class="business-tag text-blue">DIAGNOSIS</div>
								<h3 class="business-card-title">증상을 일으키는 원인을 찾습니다</h3>
								<p class="business-card-desc">
									피부 반응을 확인해 알레르기를 일으키는 원인 물질을 찾아냅니다.
								</p>
							</div>

							<!-- Treatment -->
							<div class="business-card" data-animate style="--i: 4">
								<div class="business-icon icon-green">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
										stroke-linecap="round" stroke-linejoin="round">
										<path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
									</svg>
								</div>
								<div class="business-tag text-green">TREATMENT</div>
								<h3 class="business-card-title">반복되는 알레르기 반응을 원인부터 관리합니다</h3>
								<p class="business-card-desc">
									알레르기 원인 물질에 대한 과민반응을 낮춰 장기적인 증상 개선을 목표로 합니다.
								</p>
							</div>

							<!-- Symptom Management -->
							<div class="business-card" data-animate style="--i: 5">
								<div class="business-icon icon-light-blue">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
										stroke-linecap="round" stroke-linejoin="round">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
								</div>
								<div class="business-tag text-light-blue">SYMPTOM MANAGEMENT</div>
								<h3 class="business-card-title">불편한 증상을 일상에서 꾸준히 관리합니다</h3>
								<p class="business-card-desc">
									EARVENT와 ibion은 반복되는 증상을 간편하게 관리할 수 있는 의료기기입니다.
								</p>
							</div>

							<!-- Skin Symptom Care -->
							<div class="business-card" data-animate style="--i: 6">
								<div class="business-icon icon-orange">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
										stroke-linecap="round" stroke-linejoin="round">
										<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
									</svg>
								</div>
								<div class="business-tag text-orange">SKIN SYMPTOM CARE</div>
								<h3 class="business-card-title">피부 증상에 맞는 기능을 선택합니다</h3>
								<p class="business-card-desc">
									루베어는 열감, 건조, 피부장벽 저하, 붉은기, 마찰 등 피부 증상별 케어 제품을 개발합니다.
								</p>
							</div>
						</div>

						<!-- CTA button -->
						<div class="center-btn-container" data-animate style="--i: 7">
							<a href="<?= base_url('product') ?>" class="btn btn-secondary">
								전체 제품 보기
								<svg class="btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
									stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<line x1="5" y1="12" x2="19" y2="12"></line>
									<polyline points="12 5 19 12 12 19"></polyline>
								</svg>
							</a>
						</div>
					</div>
				</section>

				<!-- 4. 제품 소개 (OUR PRODUCTS) -->
				<section id="products" class="section section-products blob-section">
					<div class="container">
						<!-- Section Header -->
						<div class="section-header-center">
							<span class="eyebrow-tag" data-animate>
								<span class="ko">제품소개</span>
								<span class="en">OUR PRODUCTS</span>
							</span>
							<h2 class="section-title" data-animate style="--i: 1">어떤 문제를 해결하는 <span
									class="gradient-text">제품인지 한눈에</span></h2>
							<p class="section-desc" data-animate style="--i: 2">
								알레르기의 원인을 찾는 진단시약부터 면역치료제, 증상 관리용 의료기기, 피부 증상별 케어 제품까지 소개합니다.
							</p>
						</div>

						<!-- Products Grid (5 Columns on Desktop) -->
						<div class="products-grid">
							<!-- 1. 라이스정 -->
							<div class="product-card" data-animate style="--i: 3">
								<div class="product-image-container">
									<img class="product-image"
										src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80"
										alt="라이스정" />
								</div>
								<div class="product-card-body">
									<div class="product-badge-wrap">
										<span class="product-badge badge-blue">설하면역치료제</span>
									</div>
									<h3 class="product-title">라이스정</h3>
									<div class="product-highlight highlight-blue">반복되는 알레르기 증상을 원인부터 관리</div>
									<p class="product-desc">
										알레르기 원인 물질에 대한 과민반응을 낮춰 장기적인 증상 개선을 목표로 하는 설하면역치료제입니다.
									</p>
									<div class="product-action">
										<a href="<?= base_url('product/lais') ?>" class="btn btn-primary btn-full">
											제품 자세히 보기
										</a>
									</div>
								</div>
							</div>

							<!-- 2. 알레르기 피부단자시험 시약 -->
							<div class="product-card" data-animate style="--i: 4">
								<div class="product-image-container">
									<img class="product-image"
										src="https://images.unsplash.com/photo-1576086213369-97a306d36557?auto=format&fit=crop&w=600&q=80"
										alt="알레르기 피부단자시험 시약" />
								</div>
								<div class="product-card-body">
									<div class="product-badge-wrap">
										<span class="product-badge badge-green">진단시약</span>
									</div>
									<h3 class="product-title">피부단자시험 시약</h3>
									<div class="product-highlight highlight-green">내 알레르기의 원인을 정확하게 확인</div>
									<p class="product-desc">
										피부 반응을 확인해 증상을 일으키는 원인을 찾아내는 진단시약입니다.
									</p>
									<div class="product-action">
										<a href="<?= base_url('product/skin-test') ?>" class="btn btn-success btn-full">
											항원 리스트 확인
										</a>
									</div>
								</div>
							</div>

							<!-- 3. EARVENT -->
							<div class="product-card" data-animate style="--i: 5">
								<div class="product-image-container">
									<img class="product-image" src="<?= base_url('images/earvent.webp') ?>"
										alt="EARVENT"
										onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1582719471384-894fbb16e074?auto=format&fit=crop&w=600&q=80';" />
								</div>
								<div class="product-card-body">
									<div class="product-badge-wrap">
										<span class="product-badge badge-blue-outline">의료기기</span>
									</div>
									<h3 class="product-title">EARVENT</h3>
									<div class="product-highlight highlight-blue">귀의 압력 균형과 중이 환기 관리</div>
									<p class="product-desc">
										코로 풍선을 부는 간단한 방법으로 이관 기능 훈련을 돕는 의료기기입니다.
									</p>
									<div class="product-action">
										<a href="<?= base_url('product/earvent') ?>" class="btn btn-info btn-full">
											제품 자세히 보기
										</a>
									</div>
								</div>
							</div>

							<!-- 4. ibion -->
							<div class="product-card" data-animate style="--i: 6">
								<div class="product-image-container">
									<img class="product-image" src="<?= base_url('images/ibion.jpg') ?>" alt="ibion"
										onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1584017911766-d451b3d0e843?auto=format&fit=crop&w=600&q=80';" />
								</div>
								<div class="product-card-body">
									<div class="product-badge-wrap">
										<span class="product-badge badge-blue-outline">의료기기 브랜드</span>
									</div>
									<h3 class="product-title">ibion</h3>
									<div class="product-highlight highlight-light-blue">반복되는 증상을 일상에서 관리</div>
									<p class="product-desc">
										사용자가 다양한 증상을 보다 쉽고 지속적으로 관리할 수 있는 의료기기 브랜드입니다.
									</p>
									<div class="product-action">
										<a href="<?= base_url('business#device') ?>" class="btn btn-info btn-full">
											브랜드 보기
										</a>
									</div>
								</div>
							</div>

							<!-- 5. ruvair -->
							<div class="product-card" data-animate style="--i: 7">
								<div class="product-image-container">
									<img class="product-image" src="<?= base_url('images/ruvair.jpg') ?>" alt="ruvair"
										onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1556228720-195a672e8a03?auto=format&fit=crop&w=600&q=80';" />
								</div>
								<div class="product-card-body">
									<div class="product-badge-wrap">
										<span class="product-badge badge-orange-light">스킨케어</span>
									</div>
									<h3 class="product-title">ruvair</h3>
									<div class="product-highlight highlight-orange">피부 증상에 맞춘 케어</div>
									<p class="product-desc">
										열감, 건조, 피부장벽 저하, 붉은기, 마찰 등 피부가 겪는 구체적인 증상에 맞춰 제품을 개발합니다.
									</p>
									<div class="product-action">
										<a href="<?= base_url('business#skincare') ?>" class="btn btn-warning btn-full">
											브랜드 보기
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<!-- 5. Lofarma 파트너십 (LOFARMA S.P.A PARTNERSHIP) -->
				<section id="lofarma" class="section section-lofarma blob-section">
					<div class="container">
						<div class="split-layout">
							<!-- Left Side Image -->
							<div class="split-image-wrap" data-animate>
								<div class="double-shadow-container">
									<img src="<?= base_url('images/s6_img1.webp') ?>" alt="Lofarma S.p.A Partnership"
										class="split-image"
										onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=80';" />
								</div>
							</div>

							<!-- Right Side Text Content -->
							<div class="split-text-wrap">
								<span class="eyebrow-tag" data-animate style="--i: 1">
									<span class="ko">파트너십</span>
									<span class="en">LOFARMA S.P.A PARTNERSHIP</span>
								</span>
								<h2 class="section-title" data-animate style="--i: 2">
									1945년부터 이어온<br><span class="gradient-text">알레르기 전문성</span>과 함께합니다
								</h2>
								<p class="split-desc-main" data-animate style="--i: 3">
									Lofarma S.p.A는 알레르기 진단과 면역치료 분야에 집중해온 이탈리아의 알레르기 전문기업입니다.
								</p>
								<p class="split-desc-sub" data-animate style="--i: 4">
									신영로파마는 Lofarma S.p.A와의 협력을 바탕으로 국내 진료 환경에 필요한 알레르기 진단시약과 면역치료제를 안정적으로 공급하고, 의료진에게 관련
									제품 및 학술 정보를 제공하고 있습니다.
								</p>
								<div class="split-action" data-animate style="--i: 5">
									<a href="<?= base_url('company/lofarma') ?>" class="btn btn-primary">
										파트너십 자세히 보기
										<svg class="btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<line x1="5" y1="12" x2="19" y2="12"></line>
											<polyline points="12 5 19 12 12 19"></polyline>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</section>

				<!-- 6. 회사 소개 (ABOUT SHINYOUNG LOFARMA) -->
				<section id="company" class="section section-company blob-section">
					<div class="container">
						<div class="split-layout reverse-desktop">
							<!-- Left Side Text Content -->
							<div class="split-text-wrap">
								<span class="eyebrow-tag" data-animate style="--i: 1">
									<span class="ko">회사소개</span>
									<span class="en">ABOUT SHINYOUNG LOFARMA</span>
								</span>
								<h2 class="section-title" data-animate style="--i: 2">
									의료진이 신뢰할 수 있는<br><span class="gradient-text">알레르기 전문 파트너</span>
								</h2>
								<p class="split-desc-main" data-animate style="--i: 3">
									신영로파마는 국내 진료 현장에 필요한 알레르기 진단시약과 면역치료제를 안정적으로 공급하는 것에서 출발했습니다.
								</p>
								<p class="split-desc-sub" data-animate style="--i: 4">
									앞으로도 알레르기 한 분야에 대한 전문성을 바탕으로 의료진에게는 신뢰할 수 있는 파트너가 되고, 환자에게는 더 나은 일상을 제공하는 기업으로
									성장하겠습니다.
								</p>
								<div class="split-action" data-animate style="--i: 5">
									<a href="<?= base_url('company/greeting') ?>" class="btn btn-primary">
										회사 소개 보기
										<svg class="btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<line x1="5" y1="12" x2="19" y2="12"></line>
											<polyline points="12 5 19 12 12 19"></polyline>
										</svg>
									</a>
								</div>
							</div>

							<!-- Right Side Image -->
							<div class="split-image-wrap" data-animate>
								<div class="double-shadow-container">
									<img src="<?= base_url('images/s4_img1.webp') ?>" alt="회사소개 이미지" class="split-image"
										onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?auto=format&fit=crop&w=1200&q=80';" />
								</div>
							</div>
						</div>
					</div>
				</section>

				<!-- 7. 의료진 지원 (PROFESSIONAL SUPPORT) -->
				<section id="medical" class="section section-support blob-section">
					<div class="container">
						<!-- Section Header -->
						<div class="section-header-center">
							<span class="eyebrow-tag" data-animate>
								<span class="ko">의료진 지원</span>
								<span class="en">PROFESSIONAL SUPPORT</span>
							</span>
							<h2 class="section-title" data-animate style="--i: 1">제품 공급을 넘어 <span
									class="gradient-text">알레르기 진료 현장을 지원합니다</span></h2>
							<p class="section-desc" data-animate style="--i: 2">
								제품 자료와 항원 리스트, 샘플 신청, MR 방문 상담까지 의료진에게 필요한 서비스를 한 곳에서 제공합니다.
							</p>
						</div>

						<!-- 3 Columns Grid -->
						<div class="support-grid">
							<!-- Card 1 -->
							<div class="support-card" data-animate style="--i: 3">
								<div class="support-card-icon">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
										stroke-linecap="round" stroke-linejoin="round">
										<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
										<polyline points="14 2 14 8 20 8"></polyline>
										<line x1="16" y1="13" x2="8" y2="13"></line>
										<line x1="16" y1="17" x2="8" y2="17"></line>
										<polyline points="10 9 9 9 8 9"></polyline>
									</svg>
								</div>
								<h3 class="support-card-title">제품 및 학술자료</h3>
								<p class="support-card-desc">
									라이스정, 피부단자시험 시약 및 의료기기 관련 자료를 확인할 수 있습니다.
								</p>
								<div class="support-card-action">
									<a href="<?= base_url('medical/support?req=lais') ?>" class="support-card-btn">
										자료 요청하기
										<svg class="btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<line x1="5" y1="12" x2="19" y2="12"></line>
											<polyline points="12 5 19 12 12 19"></polyline>
										</svg>
									</a>
								</div>
							</div>

							<!-- Card 2 -->
							<div class="support-card" data-animate style="--i: 4">
								<div class="support-card-icon">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
										stroke-linecap="round" stroke-linejoin="round">
										<line x1="8" y1="6" x2="21" y2="6"></line>
										<line x1="8" y1="12" x2="21" y2="12"></line>
										<line x1="8" y1="18" x2="21" y2="18"></line>
										<line x1="3" y1="6" x2="3.01" y2="6"></line>
										<line x1="3" y1="12" x2="3.01" y2="12"></line>
										<line x1="3" y1="18" x2="3.01" y2="18"></line>
									</svg>
								</div>
								<h3 class="support-card-title">항원 리스트</h3>
								<p class="support-card-desc">
									공급 가능한 흡입 항원과 식품 항원 정보를 확인할 수 있습니다.
								</p>
								<div class="support-card-action">
									<a href="<?= base_url('medical/support?req=skin-test') ?>" class="support-card-btn">
										항원 문의하기
										<svg class="btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<line x1="5" y1="12" x2="19" y2="12"></line>
											<polyline points="12 5 19 12 12 19"></polyline>
										</svg>
									</a>
								</div>
							</div>

							<!-- Card 3 -->
							<div class="support-card" data-animate style="--i: 5">
								<div class="support-card-icon">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
										stroke-linecap="round" stroke-linejoin="round">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
								</div>
								<h3 class="support-card-title">샘플·MR 방문 신청</h3>
								<p class="support-card-desc">
									병원과 진료과에 필요한 제품 상담 및 방문 요청을 접수합니다.
								</p>
								<div class="support-card-action">
									<a href="<?= base_url('medical/support') ?>" class="support-card-btn">
										방문 신청하기
										<svg class="btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<line x1="5" y1="12" x2="19" y2="12"></line>
											<polyline points="12 5 19 12 12 19"></polyline>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</section>

				<!-- 8. 병원전문 쇼핑몰 (HOSPITAL PROFESSIONAL MALL) -->
				<section id="mall" class="section section-mall">
					<div class="mall-pattern-overlay"></div>
					<div class="container">
						<div class="mall-content-wrap">
							<span class="eyebrow-tag border-white" data-animate>
								<span class="ko">병원전문 쇼핑몰</span>
								<span class="en">HOSPITAL PROFESSIONAL MALL</span>
							</span>
							<h2 class="section-title text-white" data-animate style="--i: 1">
								의료기관 전용 제품을<br><span class="gradient-text-orange">편리하게 확인하고 주문하세요</span>
							</h2>
							<p class="mall-desc" data-animate style="--i: 2">
								병원과 의료진을 위한 전용 제품 및 소모품을 병원전문 쇼핑몰에서 확인할 수 있습니다.
							</p>
							<div class="mall-action" data-animate style="--i: 3">
								<a href="https://lofarmashop.co.kr/login/login.php" target="_blank"
									class="btn btn-success btn-large">
									병원전문 쇼핑몰 바로가기
									<svg class="btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
										stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
										<line x1="7" y1="17" x2="17" y2="7"></line>
										<polyline points="7 7 17 7 17 17"></polyline>
									</svg>
								</a>
							</div>
						</div>
					</div>
				</section>

				<!-- 9. 최종 문의 영역 (Contact) -->
				<section id="support" class="section section-contact">
					<div class="container">
						<div class="contact-box" data-animate>
							<div class="contact-layout">
								<!-- Left Side Content -->
								<div class="contact-left">
									<span class="eyebrow-tag" data-animate style="--i: 1">
										<span class="ko">고객지원</span>
										<span class="en">QUICK INQUIRY</span>
									</span>
									<h2 class="contact-title" data-animate style="--i: 2">
										알레르기 진료에 필요한<br><span class="gradient-text">제품과 정보를 빠르게</span> 연결해드립니다
									</h2>
									<p class="contact-desc" data-animate style="--i: 3">
										제품 문의, 의료진 자료 요청, 샘플 신청 및 MR 방문 상담이 필요한 경우 신영로파마로 문의해 주세요.
									</p>

									<!-- Contact Info Details -->
									<?php
									$syCustomPhone = sy_site_setting('custom_phone', '02-900-0436');
									$sySiteEmail = sy_site_setting('email', 'lofarma@lofarma.kr');
									$syPhoneHref = trim(explode('~', $syCustomPhone)[0]);
									?>
									<div class="contact-info-list" data-animate style="--i: 4">
										<div class="contact-info-item">
											<div class="contact-info-icon">
												<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
													stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
													<path
														d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
													</path>
												</svg>
											</div>
											<div class="contact-info-text">
												<span class="contact-info-label">대표전화</span>
												<strong class="contact-info-value"><a
														href="tel:<?= esc($syPhoneHref) ?>"><?= esc($syCustomPhone) ?></a></strong>
											</div>
										</div>

										<div class="contact-info-item">
											<div class="contact-info-icon">
												<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
													stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
													<path
														d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
													</path>
													<polyline points="22,6 12,13 2,6"></polyline>
												</svg>
											</div>
											<div class="contact-info-text">
												<span class="contact-info-label">이메일</span>
												<strong class="contact-info-value"><a
														href="mailto:<?= esc($sySiteEmail) ?>"><?= esc($sySiteEmail) ?></a></strong>
											</div>
										</div>
									</div>
								</div>

								<!-- Right Side Buttons -->
								<div class="contact-right" data-animate style="--i: 5">
									<div class="contact-buttons">
										<a href="<?= base_url('medical/support') ?>"
											class="btn btn-primary btn-large btn-full">
											제품 문의하기
										</a>
										<a href="<?= base_url('medical/support') ?>"
											class="btn btn-secondary btn-large btn-full">
											샘플 · 방문 신청
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</main>
		<!-- //[D] CONTENTS -->

		<?= view('inc/footer') ?>
	</div>

	<div id="js-layer-search" class="layer-search" aria-hidden="true"><button type="button"
			class="layer-close js-close-layer">×</button>
		<div class="layer-panel">
			<h2>제품 통합 검색</h2>
			<div class="search-row"><input type="search" placeholder="검색어를 입력하세요"><button type="button">검색</button>
			</div>
			<div class="keyword-list"><a href="#">라이스정</a><a href="#">피부단자시험</a><a href="#">EARVENT</a><a
					href="#">ibion</a><a href="#">ruvair</a></div>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const header = document.querySelector('.header');
			const gnbBtn = document.querySelector('.js-btn-gnb');
			const gnbLinks = document.querySelectorAll('.gnb-link.no-link');
			const searchBtns = document.querySelectorAll('.js-open-layer-search');
			const layer = document.getElementById('js-layer-search');
			const closeLayer = document.querySelector('.js-close-layer');
			const formatNum = (n) => String(n).padStart(2, '0');

			function onScroll() { header.classList.toggle('is-scrolled', window.scrollY > 30); }
			window.addEventListener('scroll', onScroll); onScroll();
			gnbBtn.addEventListener('click', () => header.classList.toggle('is-open'));
			gnbLinks.forEach(a => a.addEventListener('click', function (e) { if (innerWidth <= 1180) { e.preventDefault(); this.closest('.gnb-item').classList.toggle('is-active') } }));
			searchBtns.forEach(btn => btn.addEventListener('click', () => { layer.classList.add('is-open'); layer.setAttribute('aria-hidden', 'false'); }));
			closeLayer.addEventListener('click', () => { layer.classList.remove('is-open'); layer.setAttribute('aria-hidden', 'true'); });
			layer.addEventListener('click', e => { if (e.target === layer) closeLayer.click(); });

			// Main visual slider: auto, progress, pause/play, prev/next, video background support
			const slides = [...document.querySelectorAll('.kv-slide')];
			const current = document.querySelector('.key-visual-progress .current');
			const total = document.querySelector('.key-visual-progress .total');
			const bar = document.querySelector('.line-progress-current');
			const prev = document.querySelector('.btn-key-visual-prev');
			const next = document.querySelector('.btn-key-visual-next');
			const control = document.querySelector('.js-btn-control-kv');
			let kvIndex = 0, kvStart = Date.now(), paused = false, duration = 5500;
			total.textContent = formatNum(slides.length);
			function showKv(i) { slides[kvIndex].classList.remove('is-active'); kvIndex = (i + slides.length) % slides.length; slides[kvIndex].classList.add('is-active'); current.textContent = formatNum(kvIndex + 1); kvStart = Date.now(); bar.style.width = '0%'; }
			function tick() { if (!paused) { const p = Math.min((Date.now() - kvStart) / duration, 1); bar.style.width = (p * 100) + '%'; if (p >= 1) showKv(kvIndex + 1); } requestAnimationFrame(tick); }
			prev.addEventListener('click', () => showKv(kvIndex - 1)); next.addEventListener('click', () => showKv(kvIndex + 1));
			control.addEventListener('click', () => { paused = !paused; control.classList.toggle('is-play', paused); control.setAttribute('aria-label', paused ? 'Play' : 'Pause'); if (!paused) kvStart = Date.now() - parseFloat(bar.style.width || 0) / 100 * duration; });
			tick();

			// Reveal animation and number count
			const counted = new WeakSet();
			function countUp(el) { const target = parseFloat(el.dataset.count); const decimal = String(el.dataset.count).includes('.'); let start = null; function step(ts) { if (!start) start = ts; const p = Math.min((ts - start) / 1200, 1); const val = target * p; el.textContent = decimal ? val.toFixed(1) : Math.floor(val).toLocaleString('ko-KR'); if (p < 1) requestAnimationFrame(step); } requestAnimationFrame(step) }
			const io = new IntersectionObserver(entries => {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						entry.target.classList.add('is-visible');
						if (entry.target.querySelectorAll) {
							entry.target.querySelectorAll('[data-animate]').forEach(x => x.classList.add('is-visible'));
							entry.target.querySelectorAll('.count').forEach(c => { if (!counted.has(c)) { counted.add(c); countUp(c); } });
						}
					}
				});
			}, { threshold: 0.05, rootMargin: '0px 0px -30px 0px' });
			document.querySelectorAll('.section, [data-animate]').forEach(el => io.observe(el));

			// Immediate initial viewport check so elements never stay invisible
			setTimeout(() => {
				document.querySelectorAll('.section, [data-animate]').forEach(el => {
					const rect = el.getBoundingClientRect();
					if (rect.top < window.innerHeight && rect.bottom > 0) {
						el.classList.add('is-visible');
						if (el.querySelectorAll) {
							el.querySelectorAll('[data-animate]').forEach(x => x.classList.add('is-visible'));
						}
					}
				});
			}, 50);
		});
	</script>

	<?= view('inc/floating_buttons', ['isHome' => true]) ?>
	<?= view('inc/popup') ?>
</body>

</html>