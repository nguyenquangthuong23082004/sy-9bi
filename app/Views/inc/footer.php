<?php
/**
 * 회사소개 서브페이지 공통 푸터
 * - 메인(app/Views/home.php)의 푸터 마크업/클래스를 그대로 재사용
 */
?>
<footer class="footer">
	<div class="footer-inner">
		<div class="footer-top">
			<div>
				<div class="footer-logo">신영로파마</div>
				<p>알레르기 환자의 여정을 함께 설계합니다 — 신영로파마</p>
			</div>
			<nav class="footer-menu" aria-label="푸터 메뉴">
				<a href="<?= base_url('company/greeting') ?>">회사소개</a>
				<a href="<?= base_url('product/lais') ?>">제품</a>
				<a href="<?= base_url('business') ?>">사업영역</a>
				<a href="<?= base_url('medical') ?>">의료진 지원</a>
				<a href="<?= base_url('#mall') ?>">병원전문 쇼핑몰</a>
				<a href="<?= base_url('#support') ?>">고객지원</a>
			</nav>
		</div>
		<div class="footer-bottom">
			<div>
				<p>서울시 도봉구 도봉로 156길 17-5 | 대표번호 02-900-0436 | 이메일 lofarma@lofarma.kr</p>
				<p>Copyright &copy; Shinyoung Lofarma. All Rights Reserved.</p>
				<p><a href="<?= base_url('privacy') ?>">개인정보처리방침</a></p>
			</div>
			<div class="family">
				<label for="familySite" class="blind">Family Site</label>
				<select id="familySite" aria-label="Family Site">
					<option>Family Site</option>
					<option>병원전문쇼핑몰</option>
					<option>이비온</option>
					<option>루베어</option>
				</select>
			</div>
		</div>
	</div>
</footer>
