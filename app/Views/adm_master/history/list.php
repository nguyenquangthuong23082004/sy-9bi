<?= $this->extend('adm_master/layout/main') ?>

<?= $this->section('header_buttons') ?>
    <div class="d-flex gap-2">
        <a href="<?= base_url('AdmMaster/bbs/history/form') ?>" class="btn btn-primary px-4">
            <i class="bi bi-plus-circle me-1"></i> 연혁 등록
        </a>
    </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-journal-text me-2 text-primary"></i>회사 연혁 목록</h5>
        <span class="badge bg-primary rounded-pill px-3 py-2">총 <?= count($historyList) ?>건</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center py-3" style="width: 80px;">번호</th>
                        <th class="text-center py-3" style="width: 140px;">연도</th>
                        <th class="py-3">연혁 내용 (행 단위 구분)</th>
                        <th class="text-center py-3" style="width: 180px;">등록일</th>
                        <th class="text-center py-3" style="width: 160px;">관리</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($historyList)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                등록된 연혁 항목이 없습니다.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($historyList as $index => $row): ?>
                            <tr>
                                <td class="text-center text-secondary fw-semibold"><?= count($historyList) - $index ?></td>
                                <td class="text-center">
                                    <span class="badge bg-primary-subtle text-primary fs-6 px-3 py-2 fw-bold">
                                        <?= esc($row['year']) ?>년 ~
                                    </span>
                                </td>
                                <td>
                                    <?php 
                                    $itemList = explode("\n", $row['items']);
                                    foreach ($itemList as $item):
                                        $trimmed = trim($item);
                                        if ($trimmed !== ''):
                                    ?>
                                        <div class="py-1">
                                            <i class="bi bi-dot me-1 text-primary"></i><?= esc($trimmed) ?>
                                        </div>
                                    <?php 
                                        endif;
                                    endforeach; 
                                    ?>
                                </td>
                                <td class="text-center text-muted small">
                                    <?= esc($row['r_date'] ?? '-') ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= base_url('AdmMaster/bbs/history/form/' . $row['idx']) ?>" class="btn btn-outline-secondary px-3" title="수정">
                                            <i class="bi bi-pencil me-1"></i>수정
                                        </a>
                                        <a href="<?= base_url('AdmMaster/bbs/history/delete/' . $row['idx']) ?>" 
                                           class="btn btn-outline-danger px-3" 
                                           onclick="return confirm('정말 <?= esc($row['year']) ?>년 연혁을 삭제하시겠습니까?');" title="삭제">
                                            <i class="bi bi-trash me-1"></i>삭제
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
