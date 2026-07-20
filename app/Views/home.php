<!DOCTYPE html>
<html lang="ko">
<head>
<?= view('inc/head', [
	'metaTitle'       => '신영로파마 | 알레르기 전문 기업',
	'metaDescription' => '신영로파마는 알레르기의 진단, 치료, 증상 관리, 일상 케어까지 환자의 여정 전체를 함께하는 알레르기 전문 기업입니다.',
	'ogImage'         => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=85',
	'preconnect'      => ['https://images.unsplash.com', 'https://videos.pexels.com'],
	'usePretendard'   => false,
	'cssFiles'        => ['css/home.css'],
]) ?>
  <!-- 사용 이미지: Unsplash / Source Unsplash 무료 이미지 링크 기반, 의료·알레르기·의약품·스킨케어 내용에 맞춰 재배치 -->
</head>
<body>



  <div class="wrap">
    <!-- [D] HEADER -->
    <?= view('inc/header', ['isHome' => true]) ?>
    <!-- //[D] HEADER -->

    <!-- [D] CONTENTS -->
    <main id="content" class="content page-home js-page-home">
      <div class="main-content">
        <div class="section key-visual">
          <div class="key-visual-inner">
            <div class="swiper swiper-key-visual">
              <div class="kv-wrapper">
                <?php if (!empty($mainBanners) && is_array($mainBanners)): ?>
                  <?php foreach ($mainBanners as $idx => $mb): ?>
                    <?php
                    $mbImgPc   = !empty($mb['ufile6']) ? base_url('data/bbs/' . $mb['ufile6']) : (!empty($mb['ufile5']) ? base_url('data/bbs/' . $mb['ufile5']) : '');
                    $mbImgMob  = !empty($mb['ufile5']) ? base_url('data/bbs/' . $mb['ufile5']) : (!empty($mb['ufile6']) ? base_url('data/bbs/' . $mb['ufile6']) : '');
                    $mbSub     = esc($mb['sub_title'] ?? '');
                    $mbTitle   = !empty($mb['subject']) ? nl2br(esc($mb['subject'])) : '';
                    $mbDesc    = !empty($mb['contents']) ? nl2br(esc($mb['contents'])) : '';
                    $mbUrl     = !empty($mb['url']) ? esc($mb['url'], 'attr') : '';
                    $mbHasImg  = !empty($mbImgPc) || !empty($mbImgMob);
                    ?>
                    <?php if (!$mbHasImg) continue; ?>
                    <div class="kv-slide<?= $idx === 0 ? ' is-active' : '' ?>">
                      <?php if ($mbUrl): ?>
                        <a href="<?= $mbUrl ?>" class="kv-slide-link" style="position:absolute;inset:0;z-index:2;display:block;" aria-label="<?= esc($mb['subject'] ?? '배너 링크') ?>"></a>
                      <?php endif; ?>
                      <?php if ($mbHasImg): ?>
                        <picture style="display:block; width:100%; height:100%;">
                          <?php if ($mbImgMob): ?>
                            <source media="(max-width: 767px)" srcset="<?= $mbImgMob ?>">
                          <?php endif; ?>
                          <img src="<?= $mbImgPc ?: $mbImgMob ?>" alt="<?= esc($mb['subject'] ?? '') ?>" class="key-visual-img" style="width:100%; height:100%; object-fit:cover;">
                        </picture>
                      <?php endif; ?>
                      <?php if (!empty($mbSub) || !empty($mbTitle) || !empty($mbDesc)): ?>
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
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <div class="group-btn"><button type="button" class="btn-key-visual btn-key-visual-prev" aria-label="이전 슬라이드"></button><button type="button" class="btn-key-visual btn-key-visual-next" aria-label="다음 슬라이드"></button></div>
              <div class="key-visual-function"><div class="key-visual-progress"><span class="current">01</span><span class="line-progress"><span class="line-progress-current"></span></span><span class="total">04</span></div><button type="button" class="btn-control is-pause js-btn-control-kv" aria-label="Pause"><span class="blind">pause</span></button></div>
              <span class="scroll-down">SCROLL</span>
            </div>
          </div>
        </div>

        
		<!-- 주요현황 -->
		<section id="info" class="section section-key-info">
		  <div class="container">
			<div class="section-box">

			  <div class="main-title-area">
				<strong class="sub-title">
				  <span class="text" data-animate="slideInUp">주요현황</span>
				</strong>

				<h2 class="title">
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:1">알레르기 환자의</span>
				  </span>
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:2">여정 전체를</span>
				  </span>
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:3">함께합니다.</span>
				  </span>
				</h2>

				<div class="link-animate-box" data-animate="fadeInUp" style="--i:4">
				  <a class="link-animate-text" href="#medical">의료진 지원</a>
				</div>
			  </div>

			  <div class="section-col-right">
				<p class="key-info-desc" data-animate="fadeInUp" style="--i:2.5">
				  신영로파마는 2011년 설립 이후 알레르기 한 분야에 집중해온 전문 기업입니다.<br class="only_web">
				  진단과 치료를 넘어 증상 관리와 일상 케어까지 이어지는 제품과 정보를 제공합니다.
				</p>

				<ul class="statistic-list">
				  <li class="statistic-item" data-animate="fadeInUp" style="--i:5">
					<span class="statistic-title">Lofarma S.p.A 창립</span>
					<strong class="statistic-detail">
					  <span class="count" data-count="1945">0</span>
					  <span class="unit">년</span>
					</strong>
				  </li>

				  <li class="statistic-item" data-animate="fadeInUp" style="--i:5">
					<span class="statistic-title">신영로파마 설립</span>
					<strong class="statistic-detail">
					  <span class="count" data-count="2011">0</span>
					  <span class="unit">년</span>
					</strong>
				  </li>

				  <li class="statistic-item" data-animate="fadeInUp" style="--i:6">
					<span class="statistic-title">전국 협력 의원·클리닉</span>
					<strong class="statistic-detail">
					  <span class="count" data-count="2000">0</span>
					  <span class="unit">+</span>
					</strong>
				  </li>

				  <li class="statistic-item" data-animate="fadeInUp" style="--i:6">
					<span class="statistic-title">알레르기 진단 항원 라인업</span>
					<strong class="statistic-detail">
					  <span class="count" data-count="100">0</span>
					  <span class="unit">+</span>
					</strong>
				  </li>

				 
				</ul>
			  </div>

			</div>
		  </div>
		</section>


		<!-- 제품소개 -->
		<section id="products" class="section section-lab js-section-lab">
		  <div class="container">
			<div class="section-box">

			  <div class="section-col-left">
				<div class="main-title-area">
				  <strong class="sub-title">
					<span class="text" data-animate="slideInUp">제품소개</span>
				  </strong>

				  <h2 class="title">
					<span class="text">
					  <span class="text" data-animate="slideInUp" style="--i:1">알레르기 진료와</span>
					</span>
					<span class="text">
					  <span class="text" data-animate="slideInUp" style="--i:2">관리 전반을 지원합니다</span>
					</span>
				  </h2>

				  <p class="desc" data-animate="fadeInUp" style="--i:2">
					라이스정, 알레르기 피부단자시험 시약, EARVENT를 중심으로<br class="only_web">
					진단·치료·생활 관리를 연결합니다.
				  </p>

				  <div class="link-animate-box" data-animate="fadeInUp" style="--i:3">
					<a class="link-animate-text" href="#medical">자료 요청하기</a>
				  </div>
				</div>
			  </div>

			  <div class="section-col-right">
				<ul class="lab-list">

				  <li class="lab-item js-lab-item">
					<a class="lab-link" href="#products">
					  <span class="lab-image">
						<img
						  src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=900&q=85"
						  alt="라이스정"
						>
					  </span>

					  <div class="lab-info">
						<strong class="info-title">라이스정</strong>
						<span class="info-desc">설하면역치료 기반 치료 옵션</span>
					  </div>

					  <div class="lab-info-hover only-pc">
						<div class="info">
						  <i class="icon">◎</i>
						  <strong class="info-title">라이스정</strong>
						  <p class="info-desc">
							초기치료부터 유지치료까지 의료진의 판단에 따른 치료 여정을 지원합니다.
						  </p>
						</div>
					  </div>
					</a>
				  </li>

				  <li class="lab-item js-lab-item">
					<a class="lab-link" href="#products">
					  <span class="lab-image">
						<img
						  src="https://images.unsplash.com/photo-1576086213369-97a306d36557?auto=format&fit=crop&w=900&q=85"
						  alt="알레르기 피부단자시험 시약"
						>
					  </span>

					  <div class="lab-info">
						<strong class="info-title">피부단자시험 시약</strong>
						<span class="info-desc">Allergy Skin Prick Test</span>
					  </div>

					  <div class="lab-info-hover only-pc">
						<div class="info">
						  <i class="icon">✦</i>
						  <strong class="info-title">정확한 진단 지원</strong>
						  <p class="info-desc">
							다양한 항원 라인업으로 폭넓은 알레르기 원인 검사를 지원합니다.
						  </p>
						</div>
					  </div>
					</a>
				  </li>

				  <li class="lab-item lab-item-full js-lab-item">
					<a class="lab-link" href="#products">
					  <span class="lab-image">
						<img src="/images/earvent.webp" alt="EARVENT">
					  </span>

					  <div class="lab-info">
						<strong class="info-title">EARVENT</strong>
						<span class="info-desc">이관 기능 개선 의료용 고무풍선</span>
					  </div>

					  <div class="lab-info-hover only-pc">
						<div class="info">
						  <i class="icon">◆</i>
						  <strong class="info-title">EARVENT</strong>
						  <p class="info-desc">
							중이 환기와 이관 기능 훈련에 사용되는 관리 솔루션입니다.
						  </p>
						</div>
					  </div>
					</a>
				  </li>

				  <li class="lab-item js-lab-item">
					<a class="lab-link" href="#business">
					  <span class="lab-image">
						<img src="/images/ibion.jpg" alt="ibion">
					  </span>

					  <div class="lab-info">
						<strong class="info-title">ibion</strong>
						<span class="info-desc">의료기기 브랜드</span>
					  </div>

					  <div class="lab-info-hover only-pc">
						<div class="info">
						  <i class="icon">◇</i>
						  <strong class="info-title">이비온</strong>
						  <p class="info-desc">
							알레르기 환자의 증상 관리와 생활 편의를 돕는 의료기기 브랜드입니다.
						  </p>
						</div>
					  </div>
					</a>
				  </li>

				  <li class="lab-item js-lab-item">
					<a class="lab-link" href="#business">
					  <span class="lab-image">
						<img
						  src="/images/ruvair.jpg"
						  alt="ruvair"
						>
					  </span>

					  <div class="lab-info">
						<strong class="info-title">ruvair</strong>
						<span class="info-desc">민감 피부 일상 케어</span>
					  </div>

					  <div class="lab-info-hover only-pc">
						<div class="info">
						  <i class="icon">●</i>
						  <strong class="info-title">루베어</strong>
						  <p class="info-desc">
							알레르기와 민감 피부에 대한 이해를 바탕으로 일상 속 피부 케어를 제안합니다.
						  </p>
						</div>
					  </div>
					</a>
				  </li>

				  <li class="lab-item js-lab-item">
					<a class="lab-link" href="#medical">
					  <span class="lab-image">
						<img
						  src="/images/data.webp" alt="의료진 자료"
						>
					  </span>

					  <div class="lab-info">
						<strong class="info-title">의료진 자료</strong>
						<span class="info-desc">자료실 · 샘플 · 방문 신청</span>
					  </div>

					  <div class="lab-info-hover only-pc">
						<div class="info">
						  <i class="icon">♧</i>
						  <strong class="info-title">진료 지원</strong>
						  <p class="info-desc">
							처방 정보, 항원 리스트, 학술자료, 상담 요청을 연결합니다.
						  </p>
						</div>
					  </div>
					</a>
				  </li>

				</ul>
			  </div>

			</div>
		  </div>
		</section>


		<!-- 회사소개 -->
		<section id="company" class="section section-intro-lab">
		  <div class="container">

			<div class="main-title-area">
			  <div>
				<strong class="sub-title">
				  <span class="text" data-animate="slideInUp">회사소개</span>
				</strong>

				<h2 class="title">
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:1">알레르기 한 분야에</span>
				  </span>
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:2">집중해온 전문 기업</span>
				  </span>
				</h2>
			  </div>

			  <div class="link-animate-box" data-animate="fadeInUp" style="--i:3">
				<a class="link-animate-text" href="#support">문의하기</a>
			  </div>
			</div>

			<div class="intro-lab-box-slide">

			  <div class="swiper-intro-lab-text">
				<div class="intro-text-slide is-active">
				  <div class="intro-lab-content">
					<strong class="title">대표 인사말</strong>
					<p class="desc">
					  신영로파마는 국내 진료 현장에 필요한 알레르기 진단 시약과 면역치료제를 안정적으로
					  공급하는 것에서 출발했습니다. 앞으로도 의료진에게는 신뢰할 수 있는 파트너로,
					  환자에게는 더 나은 일상을 돕는 브랜드로 남겠습니다.
					</p>
				  </div>
				</div>

				<div class="intro-text-slide">
				  <div class="intro-lab-content">
					<strong class="title">회사 스토리</strong>
					<p class="desc">
					  2011년 설립 이래 이탈리아 Lofarma S.p.A와의 협력을 바탕으로
					  알레르기 진단 시약과 설하면역치료제를 국내 진료 현장에 공급해 왔습니다.
					</p>
				  </div>
				</div>

				<div class="intro-text-slide">
				  <div class="intro-lab-content">
					<strong class="title">비전</strong>
					<p class="desc">
					  정확한 진단, 원인 치료, 증상 관리, 일상 케어.
					  신영로파마는 진료실 안과 밖을 잇는 알레르기 전문 기업으로 성장하겠습니다.
					</p>
				  </div>
				</div>
			  </div>

			  <div class="swiper-intro-lab-box">
				<div class="intro-img-slide is-active">
				  <span class="intro-lab-image">
					<img
					  src="/images/s4_img1.webp"
					  alt="대표 인사말"
					>
				  </span>
				</div>

				<div class="intro-img-slide">
				  <span class="intro-lab-image">
					<img
					  src="/images/s4_img2.webp"
					  alt="회사 스토리"
					>
				  </span>
				</div>

				<div class="intro-img-slide">
				  <span class="intro-lab-image">
					<img
					  src="/images/s4_img3.webp"
					  alt="비전"
					>
				  </span>
				</div>

				<div class="group-btn">
				  <button class="btn-intro-lab btn-intro-lab-prev" type="button" aria-label="이전"></button>
				  <button class="btn-intro-lab btn-intro-lab-next" type="button" aria-label="다음"></button>
				</div>
			  </div>

			</div>
		  </div>
		</section>


		<!-- 사업영역 -->
		<section id="business" class="section section-main-brand js-section-main-brand">
		  <div class="brand-wrap">

			<div class="main-title-area">
			  <strong class="sub-title">
				<span class="text" data-animate="slideInUp">사업영역</span>
			  </strong>

			  <h2 class="title">
				<span class="text">
				  <span class="text" data-animate="slideInUp" style="--i:1">하나의 전문성,</span>
				</span>
				<span class="text">
				  <span class="text" data-animate="slideInUp" style="--i:2">세 가지 영역</span>
				</span>
			  </h2>

			  <p class="desc" data-animate="fadeInUp" style="--i:3">
				알레르기 환자의 하루는 진료실에서 끝나지 않습니다. 신영로파마는 의약품, 의료기기, <br class="only_web">
				스킨케어를 통해 환자의 삶 전반을 고려한 포트폴리오를 운영합니다.
			  </p>

			  <div class="link-animate-box" data-animate="fadeInUp" style="--i:4">
				<a href="#products" class="link-animate-text">제품 보기</a>
			  </div>
			</div>

			<div class="brand-area">
			  <div class="brand-viewport">
				<div class="brand-track">

				  <div class="brand-slide" data-num="01">
					<div class="brand-img-product">
					  <img
						src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=85"
						alt="의약품"
					  >
					</div>
					<div class="brand-img-logo">의약품</div>
					<div class="brand-category">라이스정 · 피부단자시험 시약</div>
				  </div>

				  <div class="brand-slide" data-num="02">
					<div class="brand-img-product">
					  <img
						src="https://images.unsplash.com/photo-1582719471384-894fbb16e074?auto=format&fit=crop&w=600&q=85"
						alt="진단과 치료"
					  >
					</div>
					<div class="brand-img-logo">진단과 치료</div>
					<div class="brand-category">알레르기 원인 확인과 치료 판단 지원</div>
				  </div>

				  <div class="brand-slide" data-num="03">
					<div class="brand-img-product">
					  <img
						src="https://source.unsplash.com/600x600/?clinic,medical-device"
						alt="의료기기" onerror="this.onerror=null; this.src='/images/no-image.png';"
					  >
					</div>
					<div class="brand-img-logo">의료기기</div>
					<div class="brand-category">EARVENT · ibion</div>
				  </div>

				  <div class="brand-slide" data-num="04">
					<div class="brand-img-product">
					  <img
						src="https://images.unsplash.com/photo-1556228720-195a672e8a03?auto=format&fit=crop&w=600&q=85"
						alt="스킨케어"
					  >
					</div>
					<div class="brand-img-logo">스킨케어</div>
					<div class="brand-category">ruvair 민감 피부 케어</div>
				  </div>

				  <div class="brand-slide" data-num="05">
					<div class="brand-img-product">
					  <img
						src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=600&q=85"
						alt="환자 여정"
					  >
					</div>
					<div class="brand-img-logo">환자 여정</div>
					<div class="brand-category">진료실 안과 밖을 잇는 케어</div>
				  </div>

				  <div class="brand-slide" data-num="06">
					<div class="brand-img-product">
					  <img
						src="https://images.unsplash.com/photo-1511174511562-5f97f4f4e799?auto=format&fit=crop&w=600&q=85"
						alt="의료진 지원" onerror="this.onerror=null; this.src='/images/no-image.png';"
					  >
					</div>
					<div class="brand-img-logo">의료진 지원</div>
					<div class="brand-category">자료실 · 샘플 · MR 방문 신청</div>
				  </div>

				</div>
			  </div>

			  <div class="brand-controls">
				<button class="brand-btn brand-prev" type="button" aria-label="이전">←</button>
				<button class="brand-btn brand-next" type="button" aria-label="다음">→</button>
			  </div>

			  <div class="brand-progress">
				<span></span>
			  </div>
			</div>

		  </div>
		</section>


		<!-- Lofarma 파트너십 -->
		<section id="lofarma" class="section section-business-philosophy">
		  <div class="container">

			<div class="philosophy-card">
			  <img
				src="/images/s6_img1.webp" alt="Lofarma 파트너십 이미지">

			  <div class="philosophy-content">
				<span class="eyebrow">Lofarma S.p.A Partnership</span>
				<h2>
				  1945년부터 이어온<br>
				  알레르기 전문성
				</h2>
				<p>
				  Lofarma S.p.A는 알레르기 진단과 면역치료 분야에 집중해온
				  이탈리아의 알레르기 전문 기업입니다. 신영로파마는 Lofarma S.p.A와의
				  협력을 바탕으로 국내 진료 현장에 필요한 제품과 정보를 제공합니다.
				</p>
				<a href="#medical" class="link-animate-text">의료진 지원</a>
			  </div>
			</div>

			<div class="philosophy-list">
			  <div class="philosophy-item">
				<strong>2011</strong>
				<p>주식회사 신영로파마 설립</p>
			  </div>

			  <div class="philosophy-item">
				<strong>Lofarma</strong>
				<p>이탈리아 알레르기 전문 기업과 파트너십</p>
			  </div>

			  <div class="philosophy-item">
				<strong>라이스정</strong>
				<p>설하면역치료 기반 치료 옵션 공급</p>
			  </div>

			  <div class="philosophy-item">
				<strong>확장</strong>
				<p>의료기기와 스킨케어까지 포트폴리오 확대</p>
			  </div>
			</div>

		  </div>
		</section>


		<!-- 의료진 지원 -->
		<section id="medical" class="section section-news">
		  <div class="container">

			<div class="news-head">
			  <div class="main-title-area">
				<strong class="sub-title">
				  <span class="text" data-animate="slideInUp">의료진 지원</span>
				</strong>

				<h2 class="title">
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:1">진료에 필요한 자료를</span>
				  </span>
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:2">한 곳에 모았습니다</span>
				  </span>
				</h2>

				<p class="desc" data-animate="fadeInUp" style="--i:3">
				  라이스정 관련 자료, 진단시약 정보, 의료기기 자료, 임상연구 현황,
				  샘플 및 상담 요청까지 신영로파마는 전국의 알레르기 진료 현장을 가까이에서 지원합니다.
				</p>
			  </div>

			  <a href="#support" class="link-animate-text">상담 요청</a>
			</div>

			<div class="news-list">

			  <article class="news-card">
				<a href="#medical">
				  <div class="news-thumb">
					<img
					  src="/images/s7_img1.webp"
					  alt="라이스정 자료"
					>
				  </div>

				  <div class="news-body">
					<span class="news-type">자료실</span>
					<h3 class="news-title">라이스정 자료 및 의료진용 상세 정보</h3>
					<span class="news-date">전문의약품 자료는 의료진 인증 구조 검토 권장</span>
				  </div>
				</a>
			  </article>

			  <article class="news-card">
				<a href="#medical">
				  <div class="news-thumb">
					<img
					  src="https://images.unsplash.com/photo-1576086213369-97a306d36557?auto=format&fit=crop&w=800&q=85"
					  alt="진단시약 자료"
					>
				  </div>

				  <div class="news-body">
					<span class="news-type">항원 리스트</span>
					<h3 class="news-title">피부단자시험 시약 공급 가능 항원 리스트</h3>
					<span class="news-date">흡입 항원 · 식품 항원 문의</span>
				  </div>
				</a>
			  </article>

			  <article class="news-card">
				<a href="#medical">
				  <div class="news-thumb">
					<img
					  src="https://images.unsplash.com/photo-1573497491208-6b1acb260507?auto=format&fit=crop&w=800&q=85"
					  alt="샘플 MR 방문 신청"
					>
				  </div>

				  <div class="news-body">
					<span class="news-type">신청</span>
					<h3 class="news-title">샘플·MR 방문 신청 및 제품 상담 접수</h3>
					<span class="news-date">병원명 · 진료과 · 요청사항 입력</span>
				  </div>
				</a>
			  </article>

			</div>

		  </div>
		</section>


        <section id="mall" class="section section-business-philosophy">
          <div class="container"><div class="philosophy-card"><img src="/images/mall.webp" alt="병원전문 쇼핑몰"><div class="philosophy-content"><span class="eyebrow">Hospital Professional Mall</span><h2>병원전문 쇼핑몰은<br>기존 구조 그대로 유지합니다</h2><p>의료진과 병원 고객을 위한 전용 구매·문의 동선을 별도 메뉴로 유지하여 기존 이용자의 접근성을 보호합니다.</p><a href="#support" class="link-animate-text">쇼핑몰 문의</a></div></div></div>
        </section>
		
		<section id="support" class="section section-message">
		  <div class="container">
			<div class="section-box message-center">
			  <div>
				<h2 class="message-title">
				  알레르기 환자의 여정을<br>
				  함께 설계합니다.
				</h2>
			  </div>

			  <div>
				<p class="message-desc">
				  제품 문의, 의료진 자료 요청, 샘플·MR 방문 신청, 패밀리 사이트 문의를 빠르게 연결해드립니다.
				</p>

				<div class="message-links">
				  <a href="mailto:lofarma@lofarma.kr" class="message-link">이메일 문의</a>
				  <a href="tel:02-900-0436" class="message-link">02-900-0436</a>
				  <a href="#products" class="message-link">제품 보기</a>
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

  <div id="js-layer-search" class="layer-search" aria-hidden="true"><button type="button" class="layer-close js-close-layer">×</button><div class="layer-panel"><h2>제품 통합 검색</h2><div class="search-row"><input type="search" placeholder="검색어를 입력하세요"><button type="button">검색</button></div><div class="keyword-list"><a href="#">라이스정</a><a href="#">피부단자시험</a><a href="#">EARVENT</a><a href="#">ibion</a><a href="#">ruvair</a></div></div></div>

  <script>
    document.addEventListener('DOMContentLoaded', function(){
      const header=document.querySelector('.header');
      const gnbBtn=document.querySelector('.js-btn-gnb');
      const gnbLinks=document.querySelectorAll('.gnb-link.no-link');
      const searchBtns=document.querySelectorAll('.js-open-layer-search');
      const layer=document.getElementById('js-layer-search');
      const closeLayer=document.querySelector('.js-close-layer');
      const formatNum=(n)=>String(n).padStart(2,'0');

      function onScroll(){ header.classList.toggle('is-scrolled', window.scrollY>30); }
      window.addEventListener('scroll',onScroll); onScroll();
      gnbBtn.addEventListener('click',()=>header.classList.toggle('is-open'));
      gnbLinks.forEach(a=>a.addEventListener('click',function(e){ if(innerWidth<=1180){e.preventDefault();this.closest('.gnb-item').classList.toggle('is-active')}}));
      searchBtns.forEach(btn=>btn.addEventListener('click',()=>{layer.classList.add('is-open');layer.setAttribute('aria-hidden','false');}));
      closeLayer.addEventListener('click',()=>{layer.classList.remove('is-open');layer.setAttribute('aria-hidden','true');});
      layer.addEventListener('click',e=>{if(e.target===layer) closeLayer.click();});

      // Main visual slider: auto, progress, pause/play, prev/next, video background support
      const slides=[...document.querySelectorAll('.kv-slide')];
      const current=document.querySelector('.key-visual-progress .current');
      const total=document.querySelector('.key-visual-progress .total');
      const bar=document.querySelector('.line-progress-current');
      const prev=document.querySelector('.btn-key-visual-prev');
      const next=document.querySelector('.btn-key-visual-next');
      const control=document.querySelector('.js-btn-control-kv');
      let kvIndex=0, kvStart=Date.now(), paused=false, duration=5500;
      total.textContent=formatNum(slides.length);
      function showKv(i){slides[kvIndex].classList.remove('is-active');kvIndex=(i+slides.length)%slides.length;slides[kvIndex].classList.add('is-active');current.textContent=formatNum(kvIndex+1);kvStart=Date.now();bar.style.width='0%';}
      function tick(){ if(!paused){ const p=Math.min((Date.now()-kvStart)/duration,1); bar.style.width=(p*100)+'%'; if(p>=1) showKv(kvIndex+1);} requestAnimationFrame(tick); }
      prev.addEventListener('click',()=>showKv(kvIndex-1)); next.addEventListener('click',()=>showKv(kvIndex+1));
      control.addEventListener('click',()=>{paused=!paused;control.classList.toggle('is-play',paused);control.setAttribute('aria-label',paused?'Play':'Pause'); if(!paused) kvStart=Date.now()-parseFloat(bar.style.width||0)/100*duration;});
      tick();

      // Intro lab linked text/image slider
      const introTexts=[...document.querySelectorAll('.intro-text-slide')];
      const introImgs=[...document.querySelectorAll('.intro-img-slide')];
      let introIndex=0;
      function showIntro(i){introTexts[introIndex].classList.remove('is-active');introImgs[introIndex].classList.remove('is-active');introIndex=(i+introTexts.length)%introTexts.length;introTexts[introIndex].classList.add('is-active');introImgs[introIndex].classList.add('is-active');}
      document.querySelector('.btn-intro-lab-prev').addEventListener('click',()=>showIntro(introIndex-1));
      document.querySelector('.btn-intro-lab-next').addEventListener('click',()=>showIntro(introIndex+1));
      setInterval(()=>showIntro(introIndex+1),4500);

      // Brand carousel
      const track=document.querySelector('.brand-track');
      const brandSlides=[...document.querySelectorAll('.brand-slide')];
      const brandProgress=document.querySelector('.brand-progress span');
      let brandIndex=0;
      function perView(){return innerWidth<=680?1:innerWidth<=1180?2:4}
      function updateBrand(){const pv=perView();const max=Math.max(brandSlides.length-pv,0);brandIndex=Math.min(Math.max(brandIndex,0),max);const slideW=brandSlides[0].getBoundingClientRect().width+26;track.style.transform=`translateX(${-brandIndex*slideW}px)`;brandProgress.style.width=((brandIndex+pv)/brandSlides.length*100)+'%';}
      document.querySelector('.brand-prev').addEventListener('click',()=>{brandIndex--;updateBrand();});
      document.querySelector('.brand-next').addEventListener('click',()=>{brandIndex++; if(brandIndex>brandSlides.length-perView()) brandIndex=0; updateBrand();});
      window.addEventListener('resize',updateBrand); updateBrand(); setInterval(()=>{brandIndex++; if(brandIndex>brandSlides.length-perView()) brandIndex=0; updateBrand();},3500);
	//   window.addEventListener('resize',updateBrand); updateBrand();

      // Reveal animation and number count
      const counted=new WeakSet();
      function countUp(el){const target=parseFloat(el.dataset.count);const decimal=String(el.dataset.count).includes('.');let start=null;function step(ts){if(!start)start=ts;const p=Math.min((ts-start)/1200,1);const val=target*p;el.textContent=decimal?val.toFixed(1):Math.floor(val).toLocaleString('ko-KR');if(p<1)requestAnimationFrame(step);}requestAnimationFrame(step)}
      const io=new IntersectionObserver(entries=>{entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add('is-visible');entry.target.querySelectorAll('[data-animate]').forEach(x=>x.classList.add('is-visible'));entry.target.querySelectorAll('.count').forEach(c=>{if(!counted.has(c)){counted.add(c);countUp(c)}})}})},{threshold:.18});
      document.querySelectorAll('.section,.statistic-list').forEach(el=>io.observe(el));
    });
  </script>

  <?= view('inc/popup') ?>
</body>
</html>
