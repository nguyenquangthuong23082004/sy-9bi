<?php
/**
 * 공통 푸터
 */
$sySiteLogoFooter = sy_site_setting('logos_footer');
$syFooterLogoSrc  = (!empty($sySiteLogoFooter) && file_exists(FCPATH . 'uploads/setting/' . $sySiteLogoFooter))
	? base_url('uploads/setting/' . $sySiteLogoFooter)
	: null;

$sySiteName    = sy_site_setting('site_name', '신영로파마');
$syCustomPhone = sy_site_setting('custom_phone', '02-900-0436');
$sySiteEmail   = sy_site_setting('email', 'lofarma@lofarma.kr');
$syAddr1       = sy_site_setting('addr1', '서울시 도봉구 도봉로 156길 17-5');
$syAddr2       = sy_site_setting('addr2', '');
$syFullAddr    = trim($syAddr1 . ' ' . $syAddr2);
$syCopyright    = sy_site_setting('copyright', 'Copyright &copy; Shinyoung Lofarma. All Rights Reserved.');
$syOgDes        = sy_site_setting('og_des') ?: sy_site_setting('meta_tag');
$syFooterSlogan = !empty($syOgDes) ? $syOgDes : ('알레르기 환자의 여정을 함께 설계합니다 — ' . $sySiteName);
?>
<footer class="footer">
	<div class="footer-inner">
		<div class="footer-top">
			<div>
				<div class="footer-logo">
					<?php if ($syFooterLogoSrc): ?>
						<img src="<?= esc($syFooterLogoSrc, 'attr') ?>" alt="<?= esc($sySiteName, 'attr') ?>" class="footer-logo-img" style="max-height: 48px; width: auto; display: block;">
					<?php else: ?>
						<?= esc($sySiteName) ?>
					<?php endif; ?>
				</div>
				<p><?= esc($syFooterSlogan) ?></p>
			</div>
			<nav class="footer-menu" aria-label="푸터 메뉴">
				<a href="<?= base_url('company/greeting') ?>">회사소개</a>
				<a href="<?= base_url('product/lais') ?>">제품</a>
				<a href="<?= base_url('business') ?>">사업영역</a>
				<a href="<?= base_url('medical/support') ?>">의료진 지원</a>
				<a href="<?= base_url('#mall') ?>">병원전문 쇼핑몰</a>
				<a href="<?= base_url('#support') ?>">고객지원</a>
			</nav>
		</div>
		<div class="footer-bottom" style="align-items: flex-start;">
			<div>
				<p><?= esc($syFullAddr) ?></p>
				<p>대표번호 <?= esc($syCustomPhone) ?> | 이메일 <?= esc($sySiteEmail) ?></p>
				<p><?= $syCopyright ?></p>
			</div>
			<div class="footer-bottom-right" style="display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">
				<a href="<?= base_url('privacy') ?>" class="footer-privacy-link" style="color: #e8eef6; font-weight: 700; font-size: 0.875rem; text-decoration: none; display: inline-flex; align-items: center; height: 40px; line-height: 1;">개인정보처리방침</a>
				<div class="family" style="display: inline-flex; align-items: center;">
					<label for="familySite" class="blind">Family Site</label>
					<select id="familySite" aria-label="Family Site" onchange="if(this.value){location.href=this.value;}">
						<option value="">Family Site</option>
						<option value="<?= base_url('#mall') ?>">병원전문쇼핑몰</option>
						<option value="<?= base_url('business') ?>">이비온</option>
						<option value="<?= base_url('business') ?>">루베어</option>
					</select>
				</div>
			</div>
		</div>
	</div>
</footer>
