<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<?php
$sySiteName    = '신영로파마';
$syAddr1       = sy_site_setting('addr1');
if (empty($syAddr1) || strpos($syAddr1, '도봉') !== false || strpos($syAddr1, '구로') !== false) {
	$syAddr1 = '서울특별시 강서구 마곡중앙6로 42 사이언스타 1024호';
}
$syAddr2       = '';
$syFullAddr    = trim($syAddr1 . ($syAddr2 ? ' ' . $syAddr2 : ''));
$syCustomPhone = '02-2272-7678~9 / 02-2103-4070';
$syFax         = '02-2278-9047 / 02-2103-4083';
$sySiteEmail   = sy_site_setting('email', 'lofarma@lofarma.kr');
if (empty($sySiteEmail) || strpos($sySiteEmail, 'auto-style') !== false) {
	$sySiteEmail = 'lofarma@lofarma.kr';
}
$syWorkTime    = '평일 09:00 ~ 18:00 (점심시간 12:00 ~ 13:00 / 토·일·공휴일 휴무)';

$syPhoneClean  = '02-2272-7678';
$syMapQueryAddr = '서울특별시 강서구 마곡중앙6로 42 사이언스타';
$syEncodedAddr  = urlencode($syMapQueryAddr);

$syLat = 37.560195;
$syLng = 126.830635;
?>

<!-- Leaflet Map CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<style>
/* Scoped styles for Directions Page */
.sy-directions-hero {
  margin-bottom: 20px;
}

.sy-directions-title {
  font-size: clamp(26px, 3.4vw, 40px);
  line-height: 1.32;
  letter-spacing: -.045em;
  font-weight: 850;
  color: var(--sy-company-navy, #07111f);
  margin: 0 0 28px;
  word-break: keep-all;
}

.sy-directions-title:after {
  content: "";
  display: block;
  width: 42px;
  height: 3px;
  margin-top: 24px;
  background: var(--sy-company-deep, #0b2a5b);
}

.sy-directions-keyline {
  font-size: clamp(17px, 1.8vw, 21px);
  font-weight: 800;
  color: var(--sy-company-deep, #0b2a5b);
  margin: 0 0 18px;
  word-break: keep-all;
}

/* Transportation Cards Grid */
.sy-transit-cards-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-top: 36px;
}

.sy-transit-card-item {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 18px;
  padding: 28px 24px;
  display: flex;
  flex-direction: column;
  box-shadow: 0 4px 20px rgba(11, 42, 91, 0.04);
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  position: relative;
  overflow: hidden;
}

.sy-transit-card-item:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 32px rgba(11, 42, 91, 0.09);
  border-color: #cbd8ec;
}

.sy-transit-card-top-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
  padding-bottom: 16px;
  border-bottom: 1px solid #f1f5f9;
}

.sy-transit-icon-box {
  width: 46px;
  height: 46px;
  min-width: 46px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sy-transit-icon-box svg {
  width: 22px !important;
  height: 22px !important;
  display: block;
}

.sy-transit-icon--subway { background: #f3e8ff; color: #7e22ce; }
.sy-transit-icon--bus { background: #e0f2fe; color: #0284c7; }
.sy-transit-icon--car { background: #ecfdf5; color: #059669; }
.sy-transit-icon--parking { background: #fef3c7; color: #d97706; }

.sy-transit-num-badge {
  font-size: 13px;
  font-weight: 900;
  color: #94a3b8;
  letter-spacing: 0.05em;
}

.sy-transit-card-title {
  font-size: 18px;
  font-weight: 800;
  color: #07111f;
  margin: 0 0 16px;
  letter-spacing: -0.02em;
}

.sy-transit-sub-list {
  display: flex;
  flex-direction: column;
  gap: 14px;
  margin: 0;
  padding: 0;
  list-style: none;
  font-size: 13.5px;
  color: #334155;
  line-height: 1.55;
}

.sy-transit-sub-item {
  border-left: 2px solid #e2e8f0;
  padding-left: 10px;
  transition: border-color 0.2s;
}

.sy-transit-card-item:hover .sy-transit-sub-item {
  border-left-color: #93c5fd;
}

.sy-subway-pill {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 800;
  color: #fff;
  padding: 2px 7px;
  border-radius: 10px;
  line-height: 1.2;
}

.sy-subway-pill--5 { background: #8936e0; }
.sy-subway-pill--9 { background: #bda06d; }
.sy-subway-pill--airport { background: #0090d2; }

.sy-bus-pill {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: 10.5px;
  font-weight: 800;
  color: #fff;
  padding: 1px 6px;
  border-radius: 4px;
  margin-right: 4px;
}

.sy-bus-pill--blue { background: #2563eb; }
.sy-bus-pill--green { background: #16a34a; }
.sy-bus-pill--red { background: #dc2626; }

@media (max-width: 1200px) {
  .sy-transit-cards-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 640px) {
  .sy-transit-cards-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<!-- ===== 1. 오시는 길 메시지 & 지도 ===== -->
<section class="sy-company-section" aria-labelledby="sy-directions-main">
	<div class="sy-company-inner sy-vision-hero">

		<!-- 좌: 오시는 길 소개 및 연락처 -->
		<div class="sy-vision-hero-body">
			<span class="sy-company-eyebrow">LOCATION</span>
			<h2 id="sy-directions-main" class="sy-vision-title">
				알레르기 진단·치료 전문 기업<br>
				신영로파마 본사
			</h2>

			<p class="sy-vision-keyline"><?= esc($syFullAddr) ?></p>

			<article class="sy-company-text">
				<p>신영로파마는 서울특별시 강서구 마곡지구의 중심인 마곡 사이언스타에 위치하고 있습니다.</p>
				<p>지하철 5호선 마곡역 및 9호선·공항철도 마곡나루역과 인접하여 대중교통을 통해 편리하게 방문하실 수 있으며,
					방문하시는 모든 고객분들께 쾌적한 주차 및 상담 환경을 제공해 드립니다.</p>
			</article>

			<!-- 본사 기본 정보 목록 -->
			<div style="margin-top: 24px; padding: 22px 24px; background: #f8fafc; border-radius: 14px; border: 1px solid #e8eef6;">
				<div style="display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:12px; gap:8px; flex-wrap:wrap;">
					<div>
						<span style="font-size:12px; font-weight:800; color:#7b8a9e; display:block; margin-bottom:2px;">본사 주소</span>
						<strong id="sy-company-address-text" style="font-size:14.5px; color:#07111f;"><?= esc($syFullAddr) ?></strong>
					</div>
					<button type="button" onclick="syCopyAddress()" id="sy-btn-copy-address" style="padding:5px 10px; background:#fff; border:1px solid #cbd5e1; border-radius:6px; font-size:12px; font-weight:700; color:#1e293b; cursor:pointer; display:inline-flex; align-items:center; gap:4px; transition:all 0.2s;">
						<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
							<path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
						</svg>
						<span id="sy-copy-btn-label">주소 복사</span>
					</button>
				</div>
				<div style="display:flex; align-items:center; gap:12px; margin-bottom:10px; font-size:14px; flex-wrap:wrap;">
					<span style="font-size:12px; font-weight:800; color:#7b8a9e; width:60px;">대표전화</span>
					<a href="tel:<?= esc($syPhoneClean, 'attr') ?>" style="color:#1a62cc; font-weight:700; text-decoration:none;"><?= esc($syCustomPhone) ?></a>
				</div>
				<div style="display:flex; align-items:center; gap:12px; margin-bottom:10px; font-size:14px; flex-wrap:wrap;">
					<span style="font-size:12px; font-weight:800; color:#7b8a9e; width:60px;">팩스번호</span>
					<span style="color:#333d4b; font-weight:600;"><?= esc($syFax) ?></span>
				</div>
				<div style="display:flex; align-items:center; gap:12px; margin-bottom:10px; font-size:14px; flex-wrap:wrap;">
					<span style="font-size:12px; font-weight:800; color:#7b8a9e; width:60px;">이메일</span>
					<a href="mailto:<?= esc($sySiteEmail, 'attr') ?>" style="color:#1a62cc; font-weight:700; text-decoration:none;"><?= esc($sySiteEmail) ?></a>
				</div>
				<div style="display:flex; align-items:center; gap:12px; font-size:14px; flex-wrap:wrap;">
					<span style="font-size:12px; font-weight:800; color:#7b8a9e; width:60px;">운영시간</span>
					<span style="color:#333d4b; font-weight:600;"><?= esc($syWorkTime) ?></span>
				</div>
			</div>
		</div>

		<!-- 우: 인터랙티브 지도 컴포넌트 -->
		<div style="position:relative; width:100%; border-radius:20px; overflow:hidden; border:1px solid #e2e8f0; box-shadow:0 10px 30px rgba(11,42,91,0.07); background:#fff;">
			<!-- 지도 헤더 바 -->
			<div style="display:flex; align-items:center; justify-content:space-between; padding:16px 20px; background:#fafcff; border-bottom:1px solid #eaf0f8; flex-wrap:wrap; gap:10px;">
				<div style="display:flex; align-items:center; gap:8px;">
					<span style="width:10px; height:10px; border-radius:50%; background:#10b981; display:inline-block;"></span>
					<strong style="font-size:16px; color:#07111f;">신영로파마 본사</strong>
					<span style="font-size:12.5px; color:#64748b; background:#eef3fa; padding:2px 8px; border-radius:6px;">사이언스타 1024호</span>
				</div>

				<div style="display:flex; align-items:center; gap:6px; flex-wrap:wrap;">
					<a href="https://map.kakao.com/link/search/<?= $syEncodedAddr ?>" target="_blank" rel="noopener noreferrer" style="display:inline-flex; align-items:center; gap:4px; padding:6px 12px; background:#fae100; color:#371d1e; border-radius:6px; font-size:12px; font-weight:800; text-decoration:none; transition:all 0.2s;">
						카카오맵 길찾기
					</a>
					<a href="https://map.naver.com/v5/search/<?= $syEncodedAddr ?>" target="_blank" rel="noopener noreferrer" style="display:inline-flex; align-items:center; gap:4px; padding:6px 12px; background:#03c75a; color:#fff; border-radius:6px; font-size:12px; font-weight:800; text-decoration:none; transition:all 0.2s;">
						네이버지도 길찾기
					</a>
					<a href="https://www.google.com/maps/search/?api=1&query=<?= $syEncodedAddr ?>" target="_blank" rel="noopener noreferrer" style="display:inline-flex; align-items:center; gap:4px; padding:6px 12px; background:#fff; color:#374151; border:1px solid #d1d5db; border-radius:6px; font-size:12px; font-weight:800; text-decoration:none; transition:all 0.2s;">
						Google 지도
					</a>
				</div>
			</div>

			<!-- 지도 본체 -->
			<div id="sy-leaflet-map" style="width:100%; height:420px; background:#eaeff5; z-index:1;"></div>
		</div>

	</div>
</section>

<!-- ===== 2. 대중교통 및 방문 안내 (현대적인 4개 카드 그리드) ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-transit-heading">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">TRANSPORTATION</span>
		<h2 id="sy-transit-heading" class="sy-company-h2">대중교통 및 주차 안내</h2>
		<p style="font-size:15.5px; color:#5c6675; margin:0; line-height:1.6;">
			신영로파마 본사로 편리하게 방문하실 수 있도록 상세한 교통편을 안내해 드립니다.
		</p>

		<div class="sy-transit-cards-grid">
			<!-- 카드 1: 지하철 -->
			<div class="sy-transit-card-item">
				<div class="sy-transit-card-top-bar">
					<div class="sy-transit-icon-box sy-transit-icon--subway">
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<rect x="3" y="3" width="18" height="15" rx="3"></rect>
							<line x1="3" y1="11" x2="21" y2="11"></line>
							<circle cx="7" cy="15" r="1.5"></circle>
							<circle cx="17" cy="15" r="1.5"></circle>
							<path d="M6 18l-2 3"></path>
							<path d="M18 18l2 3"></path>
						</svg>
					</div>
					<span class="sy-transit-num-badge">01</span>
				</div>
				<h3 class="sy-transit-card-title">지하철 이용 시</h3>
				<ul class="sy-transit-sub-list">
					<li class="sy-transit-sub-item">
						<div>
							<span class="sy-subway-pill sy-subway-pill--5">5호선</span>
							<strong style="color:#07111f;">마곡역 6번 출구</strong>
						</div>
						<div style="font-size:12.5px; color:#64748b; margin-top:3px;">마곡중앙6로 방면 도보 5분 (350m)</div>
					</li>
					<li class="sy-transit-sub-item">
						<div>
							<span class="sy-subway-pill sy-subway-pill--9">9호선</span>
							<span class="sy-subway-pill sy-subway-pill--airport">공항</span>
							<strong style="color:#07111f;">마곡나루역 1번 출구</strong>
						</div>
						<div style="font-size:12.5px; color:#64748b; margin-top:3px;">마곡중앙로 방면 도보 8분 (580m)</div>
					</li>
					<li class="sy-transit-sub-item">
						<div>
							<span class="sy-subway-pill sy-subway-pill--5">5호선</span>
							<strong style="color:#07111f;">발산역 9번 출구</strong>
						</div>
						<div style="font-size:12.5px; color:#64748b; margin-top:3px;">마곡동로 방면 도보 약 10분</div>
					</li>
				</ul>
			</div>

			<!-- 카드 2: 버스 -->
			<div class="sy-transit-card-item">
				<div class="sy-transit-card-top-bar">
					<div class="sy-transit-icon-box sy-transit-icon--bus">
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6z"></path>
							<path d="M4 11h16"></path>
							<circle cx="8" cy="15" r="1.5"></circle>
							<circle cx="16" cy="15" r="1.5"></circle>
							<path d="M6 18v2"></path>
							<path d="M18 18v2"></path>
						</svg>
					</div>
					<span class="sy-transit-num-badge">02</span>
				</div>
				<h3 class="sy-transit-card-title">버스 이용 시</h3>
				<div style="margin-bottom:12px;">
					<strong style="font-size:13.5px; color:#07111f; display:block; margin-bottom:4px;">마곡역 / 홈앤쇼핑 정류장 하차</strong>
					<span style="font-size:12px; color:#64748b;">(정류장에서 사이언스타까지 도보 약 4분)</span>
				</div>
				<ul class="sy-transit-sub-list">
					<li class="sy-transit-sub-item">
						<div><span class="sy-bus-pill sy-bus-pill--blue">간선</span> 601, 605, 654, 661</div>
					</li>
					<li class="sy-transit-sub-item">
						<div><span class="sy-bus-pill sy-bus-pill--green">지선</span> 6629, 6630, 6632, 6645, 6648</div>
					</li>
					<li class="sy-transit-sub-item">
						<div><span class="sy-bus-pill sy-bus-pill--red">공항</span> 6003, 6008 (김포공항 방면)</div>
					</li>
				</ul>
			</div>

			<!-- 카드 3: 자가용 -->
			<div class="sy-transit-card-item">
				<div class="sy-transit-card-top-bar">
					<div class="sy-transit-icon-box sy-transit-icon--car">
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 3C2.1 11.2 2 11.6 2 12v4c0 .6.4 1 1 1h2"></path>
							<circle cx="7" cy="17" r="2"></circle>
							<circle cx="17" cy="17" r="2"></circle>
						</svg>
					</div>
					<span class="sy-transit-num-badge">03</span>
				</div>
				<h3 class="sy-transit-card-title">자가용 이용 시</h3>
				<div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:10px; padding:10px 12px; margin-bottom:12px;">
					<span style="font-size:11px; font-weight:800; color:#1a62cc; display:block; margin-bottom:2px;">네비게이션 검색어</span>
					<strong style="font-size:13.5px; color:#07111f;">"사이언스타" 또는 "마곡중앙6로 42"</strong>
				</div>
				<ul class="sy-transit-sub-list">
					<li class="sy-transit-sub-item">
						<strong style="color:#07111f; display:block; margin-bottom:2px;">올림픽대로 방면</strong>
						<span style="font-size:12.5px; color:#64748b;">발산IC 진출 후 마곡중앙로 방면 500m 직진</span>
					</li>
					<li class="sy-transit-sub-item">
						<strong style="color:#07111f; display:block; margin-bottom:2px;">공항대로 방면</strong>
						<span style="font-size:12.5px; color:#64748b;">마곡역 사거리에서 마곡중앙로 진입</span>
					</li>
				</ul>
			</div>

			<!-- 카드 4: 주차 안내 -->
			<div class="sy-transit-card-item">
				<div class="sy-transit-card-top-bar">
					<div class="sy-transit-icon-box sy-transit-icon--parking">
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<rect x="3" y="3" width="18" height="18" rx="4"></rect>
							<path d="M9 17V7h4a3 3 0 0 1 0 6H9"></path>
						</svg>
					</div>
					<span class="sy-transit-num-badge">04</span>
				</div>
				<h3 class="sy-transit-card-title">주차 안내</h3>
				<div style="margin-bottom:12px;">
					<strong style="font-size:14px; color:#07111f; display:block; margin-bottom:4px;">사이언스타 지하 주차장 완비</strong>
					<span style="font-size:12.5px; color:#64748b;">지하 1층 ~ 지하 4층까지 넓고 쾌적한 주차 공간 제공</span>
				</div>
				<div style="background:#ecfdf5; border:1px solid #a7f3d0; border-radius:10px; padding:10px 12px; margin-top:auto;">
					<div style="display:flex; align-items:center; gap:6px; margin-bottom:2px;">
						<span style="font-size:14px;">🅿️</span>
						<strong style="font-size:13px; color:#065f46;">방문객 무료 주차권 지원</strong>
					</div>
					<span style="font-size:11.5px; color:#047857;">1024호 사무실 방문 시 차량 번호를 등록해 주세요.</span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ===== 3. 핵심 연락처 & 상담 안내 ===== -->
<section class="sy-company-section" aria-labelledby="sy-directions-values">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">CONTACT & SUPPORT</span>
		<h2 id="sy-directions-values" class="sy-company-h2">고객 및 의료진 지원</h2>

		<ul class="sy-company-valuelist">
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false" style="width:24px;height:24px;color:#1a62cc;">
					<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
				<dl>
					<dt>전화 상담</dt>
					<dd><?= esc($syCustomPhone) ?> (평일 09:00~18:00)</dd>
				</dl>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false" style="width:24px;height:24px;color:#1a62cc;">
					<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2" fill="none"></path>
					<polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" fill="none"></polyline>
				</svg>
				<dl>
					<dt>이메일 문의</dt>
					<dd><?= esc($sySiteEmail) ?> (24시간 접수)</dd>
				</dl>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false" style="width:24px;height:24px;color:#1a62cc;">
					<path d="M9 11l3 3L22 4" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
					<path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" stroke="currentColor" stroke-width="2" fill="none"></path>
				</svg>
				<dl>
					<dt>온라인 자료 요청</dt>
					<dd><a href="<?= base_url('medical/support') ?>" style="color:#1a62cc; font-weight:700;">의료진 전용 샘플 및 방문 신청 &rarr;</a></dd>
				</dl>
			</li>
			<li>
				<svg class="sy-company-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false" style="width:24px;height:24px;color:#1a62cc;">
					<path d="M12 2a8 8 0 0 0-8 8c0 5.25 8 12 8 12s8-6.75 8-12a8 8 0 0 0-8-8z" stroke="currentColor" stroke-width="2" fill="none"></path>
					<circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2" fill="none"></circle>
				</svg>
				<dl>
					<dt>방문 상담</dt>
					<dd>사전 연락 후 방문 시 원활한 안내가 가능합니다.</dd>
				</dl>
			</li>
		</ul>
	</div>
</section>

<!-- ===== 4. 브랜드 선언 ===== -->
<section class="sy-company-declare" aria-labelledby="sy-directions-declare">
	<div class="sy-company-inner">
		<h2 id="sy-directions-declare">
			<span class="sy-company-declare-en">Always Close to Healthcare & Patients</span>
		</h2>
		<p>진단과 치료, 언제나 신뢰할 수 있는 파트너로 함께하겠습니다.</p>
	</div>
</section>

<!-- Toast notification for copy -->
<div id="sy-copy-toast" style="position:fixed; bottom:40px; left:50%; transform:translateX(-50%) translateY(30px); background:rgba(7,17,31,0.94); color:#fff; padding:12px 22px; border-radius:28px; font-size:13.5px; font-weight:700; display:flex; align-items:center; gap:8px; box-shadow:0 10px 30px rgba(0,0,0,0.25); opacity:0; visibility:hidden; transition:all 0.3s cubic-bezier(0.16,1,0.3,1); z-index:9999;">
	<span style="color:#10b981;">✔</span>
	<span>주소가 클립보드에 복사되었습니다.</span>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
	var lat = <?= $syLat ?>;
	var lng = <?= $syLng ?>;
	var mapContainer = document.getElementById('sy-leaflet-map');
	
	if (mapContainer && typeof L !== 'undefined') {
		var map = L.map('sy-leaflet-map', {
			center: [lat, lng],
			zoom: 16,
			scrollWheelZoom: false
		});

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution: '&copy; OpenStreetMap'
		}).addTo(map);

		var customIcon = L.divIcon({
			className: 'sy-custom-pin',
			html: '<div style="width:36px;height:36px;background:#1a62cc;border:3px solid #fff;border-radius:50% 50% 50% 0;transform:rotate(-45deg);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(0,0,0,0.3);"><div style="width:10px;height:10px;background:#fff;border-radius:50%;"></div></div>',
			iconSize: [36, 36],
			iconAnchor: [18, 36],
			popupAnchor: [0, -36]
		});

		var marker = L.marker([lat, lng], { icon: customIcon }).addTo(map);
		marker.bindPopup('<div style="padding:4px;"><strong style="font-size:14px;color:#0b2a5b;display:block;margin-bottom:4px;">(주)신영로파마 본사</strong><span style="font-size:12px;color:#4b5563;"><?= esc($syFullAddr) ?></span></div>').openPopup();
	}
});

function syCopyAddress() {
	var addrText = document.getElementById('sy-company-address-text').innerText.trim();
	var btnLabel = document.getElementById('sy-copy-btn-label');
	var toast = document.getElementById('sy-copy-toast');

	if (navigator.clipboard && window.isSecureContext) {
		navigator.clipboard.writeText(addrText).then(onSuccess, fallback);
	} else {
		fallback();
	}

	function onSuccess() {
		showToast();
	}

	function fallback() {
		var textArea = document.createElement('textarea');
		textArea.value = addrText;
		textArea.style.position = 'fixed';
		textArea.style.left = '-9999px';
		document.body.appendChild(textArea);
		textArea.focus();
		textArea.select();
		try {
			document.execCommand('copy');
			showToast();
		} catch (err) {
			alert('주소: ' + addrText);
		}
		document.body.removeChild(textArea);
	}

	function showToast() {
		if (btnLabel) {
			btnLabel.textContent = '복사 완료!';
			setTimeout(function() {
				btnLabel.textContent = '주소 복사';
			}, 2000);
		}
		if (toast) {
			toast.style.opacity = '1';
			toast.style.visibility = 'visible';
			toast.style.transform = 'translateX(-50%) translateY(0)';
			setTimeout(function() {
				toast.style.opacity = '0';
				toast.style.visibility = 'hidden';
				toast.style.transform = 'translateX(-50%) translateY(30px)';
			}, 3000);
		}
	}
}
</script>

<?= $this->endSection() ?>
