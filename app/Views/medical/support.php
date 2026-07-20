<?= $this->extend('inc/layout') ?>

<?= $this->section('content') ?>

<?php
// 빠른 메뉴에서 넘어온 요청 유형(?req=) 을 기본 선택합니다.
$syReq = (string) (service('request')->getGet('req') ?? '');
$syOld = static fn (string $key, string $default = ''): string => (string) (old($key) ?? $default);
?>

<section class="sy-company-section" aria-labelledby="sy-support-title">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">REQUEST</span>
		<h2 id="sy-support-title" class="sy-company-lead" style="margin-bottom: 14px;">
			제품 상담, 자료 요청, 샘플 문의가<br>
			필요하신가요?
		</h2>
		<p class="sy-medical-intro-text">아래 양식을 남겨주시면 담당자가 확인 후 안내드립니다.</p>

		<?php if (session()->getFlashdata('success')): ?>
			<script>
				alert(<?= json_encode(session()->getFlashdata('success')) ?>);
			</script>
			<p class="sy-medical-alert sy-medical-alert--ok" role="status"><?= esc(session()->getFlashdata('success')) ?></p>
		<?php endif; ?>
		<?php if (session()->getFlashdata('error')): ?>
			<script>
				alert(<?= json_encode(session()->getFlashdata('error')) ?>);
			</script>
			<p class="sy-medical-alert sy-medical-alert--error" role="alert"><?= esc(session()->getFlashdata('error')) ?></p>
		<?php endif; ?>

		<form class="sy-medical-form" method="post" action="<?= base_url('medical/support/submit') ?>">
			<?= csrf_field() ?>

			<div class="sy-medical-form-grid">
				<div class="sy-medical-field">
					<label for="hospital">병원명 <span class="sy-medical-req" aria-hidden="true">*</span><span class="blind">필수</span></label>
					<input type="text" id="hospital" name="hospital" required value="<?= esc($syOld('hospital'), 'attr') ?>" autocomplete="organization">
				</div>

				<div class="sy-medical-field">
					<label for="department">진료과</label>
					<input type="text" id="department" name="department" value="<?= esc($syOld('department'), 'attr') ?>" placeholder="예) 이비인후과, 소아청소년과">
				</div>

				<div class="sy-medical-field">
					<label for="manager">성함 <span class="sy-medical-req" aria-hidden="true">*</span><span class="blind">필수</span></label>
					<input type="text" id="manager" name="manager" required value="<?= esc($syOld('manager'), 'attr') ?>" autocomplete="name">
				</div>

				<div class="sy-medical-field">
					<label for="tel">연락처 <span class="sy-medical-req" aria-hidden="true">*</span><span class="blind">필수</span></label>
					<input type="tel" id="tel" name="tel" required value="<?= esc($syOld('tel'), 'attr') ?>" placeholder="02-000-0000 또는 010-0000-0000" autocomplete="tel">
				</div>

				<div class="sy-medical-field sy-medical-field--full">
					<label for="email">이메일</label>
					<input type="email" id="email" name="email" value="<?= esc($syOld('email'), 'attr') ?>" placeholder="name@hospital.co.kr" autocomplete="email">
				</div>
			</div>

			<fieldset class="sy-medical-fieldset">
				<legend>요청 사항</legend>
				<div class="sy-medical-radios">
					<?php
					$syRequestTypes = [
						'lais'      => '라이스정 상담',
						'skin-test' => '진단시약 상담',
						'earvent'   => 'EARVENT 문의',
						'ibion'     => 'ibion 문의',
						'etc'       => '기타',
					];
					$syCheckedReq = $syOld('requestType', $syReq);
					?>
					<?php foreach ($syRequestTypes as $syKey => $syLabel): ?>
						<label class="sy-medical-choice">
							<input type="radio" name="requestType" value="<?= esc($syLabel, 'attr') ?>"<?= $syCheckedReq === $syKey || $syCheckedReq === $syLabel ? ' checked' : '' ?>>
							<span><?= esc($syLabel) ?></span>
						</label>
					<?php endforeach; ?>
				</div>
			</fieldset>

			<fieldset class="sy-medical-fieldset">
				<legend>방문 희망 여부</legend>
				<div class="sy-medical-radios">
					<?php $syVisit = $syOld('visit'); ?>
					<?php foreach (['방문 희망', '유선 상담 희망', '자료만 요청'] as $syOption): ?>
						<label class="sy-medical-choice">
							<input type="radio" name="visit" value="<?= esc($syOption, 'attr') ?>"<?= $syVisit === $syOption ? ' checked' : '' ?>>
							<span><?= esc($syOption) ?></span>
						</label>
					<?php endforeach; ?>
				</div>
			</fieldset>

			<div class="sy-medical-field">
				<label for="message">상세 내용</label>
				<textarea id="message" name="message" rows="6" placeholder="필요하신 자료나 문의 내용을 남겨주세요."><?= esc($syOld('message')) ?></textarea>
			</div>

			<p class="sy-medical-form-note">
				입력하신 정보는 문의 응대 목적으로만 이용되며, 자세한 내용은 <strong>개인정보처리방침</strong>을 확인해 주세요.
			</p>

			<div class="sy-medical-privacy-agree">
				<label class="sy-medical-agree-label">
					<input type="checkbox" name="privacy_agree" id="privacy_agree" value="Y" required>
					<span>개인정보 수집 및 이용 동의 (필수)</span>
				</label>
				<button type="button" class="btn-privacy-popup-link" onclick="openPrivacyModal()">[내용보기]</button>
			</div>

			<div class="sy-medical-form-submit">
				<button type="submit" class="sy-medical-btn sy-medical-btn--primary">신청하기</button>
			</div>
		</form>
	</div>
</section>

<!-- 개인정보처리방침 팝업 모달 (Admin /AdmMaster/bbs/policy 동적 매핑) -->
<?php
$syBbsModel = new \App\Models\BbsModel();
$syPrivacyDb = $syBbsModel->where('code', 'policy')->where('subject', '개인정보처리방침')->first();
$syPrivacyHtml = !empty($syPrivacyDb['contents']) ? $syPrivacyDb['contents'] : null;
?>
<div id="syPrivacyModal" class="sy-privacy-modal-overlay" onclick="if(event.target===this) closePrivacyModal();">
	<div class="sy-privacy-modal-card">
		<div class="sy-privacy-modal-head">
			<h3>개인정보처리방침</h3>
			<button type="button" class="sy-privacy-modal-close" onclick="closePrivacyModal()" aria-label="닫기">&times;</button>
		</div>
		<div class="sy-privacy-modal-body">
			<?php if ($syPrivacyHtml): ?>
				<?= $syPrivacyHtml ?>
			<?php else: ?>
				<p><strong>1. 개인정보의 수집 및 이용 목적</strong><br>
				(주)신영로파마는 의료진 지원 서비스 제공, 문의사항 답변 및 심층 상담 안내를 위해 개인정보를 수집하고 이용합니다.</p>
				
				<p><strong>2. 수집하는 개인정보 항목</strong><br>
				- 필수항목: 성함, 이메일, 연락처, 소속 병원/기관명, 방문/상담 희망여부<br>
				- 선택항목: 상세 문의 내용 및 첨부파일</p>

				<p><strong>3. 개인정보의 보유 및 이용 기간</strong><br>
				수집된 개인정보는 원칙적으로 개인정보의 수집 및 이용목적이 달성되면 지체 없이 파기합니다.<br>
				단, 관계법령의 규정에 의하여 보존할 필요가 있는 경우 관련 법령에서 정한 일정한 기간 동안 회원정보를 보관합니다.</p>
			<?php endif; ?>
		</div>
		<div class="sy-privacy-modal-foot">
			<button type="button" class="sy-medical-btn sy-medical-btn--primary" onclick="closePrivacyModal()" style="min-width: 140px; height: 44px;">확인</button>
		</div>
	</div>
</div>

<script>
function openPrivacyModal() {
	document.getElementById('syPrivacyModal').classList.add('is-open');
	document.body.style.overflow = 'hidden';
}
function closePrivacyModal() {
	document.getElementById('syPrivacyModal').classList.remove('is-open');
	document.body.style.overflow = '';
}
</script>

<!-- ===== 담당 연락처 ===== -->
<section class="sy-company-section sy-company-section--light" aria-labelledby="sy-support-contact">
	<div class="sy-company-inner">
		<span class="sy-company-eyebrow">CONTACT</span>
		<h2 id="sy-support-contact" class="sy-company-h2">담당 연락처</h2>

		<?php
		$syContactPhone = sy_site_setting('custom_phone', '02-900-0436');
		$syContactEmail = sy_site_setting('email', 'lofarma@lofarma.kr');
		$syContactAddr  = trim(sy_site_setting('addr1', '서울시 도봉구 도봉로 156길 17-5') . ' ' . sy_site_setting('addr2', ''));
		?>
		<dl class="sy-medical-info">
			<div>
				<dt>대표 전화</dt>
				<dd><a href="tel:<?= esc($syContactPhone, 'attr') ?>"><?= esc($syContactPhone) ?></a></dd>
			</div>
			<div>
				<dt>이메일</dt>
				<dd><a href="mailto:<?= esc($syContactEmail, 'attr') ?>"><?= esc($syContactEmail) ?></a></dd>
			</div>
			<div>
				<dt>주소</dt>
				<dd><?= esc($syContactAddr) ?></dd>
			</div>
		</dl>
	</div>
</section>

<?= $this->endSection() ?>
