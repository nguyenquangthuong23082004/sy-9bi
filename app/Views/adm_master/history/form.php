<?= $this->extend('adm_master/layout/main') ?>

<?= $this->section('header_buttons') ?>
    <div class="d-flex gap-2">
        <a href="<?= base_url('AdmMaster/bbs/history') ?>" class="btn btn-outline-secondary px-4">
            <i class="bi bi-arrow-left me-1"></i> 목록으로
        </a>
        <button type="submit" form="historyFrm" class="btn btn-primary px-4">
            <i class="bi bi-save me-1"></i> 저장하기
        </button>
    </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom">
        <h5 class="card-title mb-0 fw-bold">
            <i class="bi bi-pencil-square me-2 text-primary"></i><?= esc($pageTitle) ?>
        </h5>
    </div>
    <div class="card-body p-4">
        <form name="historyFrm" id="historyFrm" method="post" action="<?= base_url('AdmMaster/bbs/history/save') ?>">
            <input type="hidden" name="idx" value="<?= esc($item['idx'] ?? '') ?>" />

            <div class="mb-4">
                <label for="year" class="form-label fw-bold">
                    연도 <span class="text-danger">*</span>
                </label>
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" 
                           class="form-control form-control-lg" 
                           id="year" 
                           name="year" 
                           value="<?= esc($item['year'] ?? date('Y')) ?>" 
                           placeholder="예: 2026" 
                           required />
                    <span class="input-group-text fw-bold">년 ~</span>
                </div>
                <div class="form-text">타임라인에 표시될 연도를 입력하세요. (숫자 4자리)</div>
            </div>

            <div class="mb-4">
                <label for="items" class="form-label fw-bold">
                    연혁 세부 항목 <span class="text-danger">*</span>
                </label>
                <textarea class="form-control" 
                          id="items" 
                          name="items" 
                          rows="6" 
                          placeholder="한 줄에 하나씩 연혁 항목을 입력해 주세요.&#10;예:&#10;ibion 브랜드 전개&#10;신제품 출시" 
                          required><?= esc($item['items'] ?? '') ?></textarea>
                <div class="form-text">
                    <i class="bi bi-info-circle me-1"></i> 여러 항목을 입력할 경우 줄바꿈(Enter)으로 구분해 주세요.
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                <a href="<?= base_url('AdmMaster/bbs/history') ?>" class="btn btn-light px-4">취소</a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-check-lg me-1"></i> <?= isset($item['idx']) ? '수정 완료' : '등록 완료' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
