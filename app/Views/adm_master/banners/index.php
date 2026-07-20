<?= $this->extend('adm_master/layout/main') ?>

<?= $this->section('header_buttons') ?>
    <div class="d-flex gap-2">
        <a href="javascript:CheckAll(document.getElementsByName('bbs_idx[]'), true)" class="btn btn-success">전체선택</a>
        <a href="javascript:CheckAll(document.getElementsByName('bbs_idx[]'), false)" class="btn btn-success">선택해체</a>
        <a href="javascript:SELECT_DELETE()" class="btn btn-danger">선택삭제</a>
        <button type="button" onclick="saveOrder()" class="btn btn-warning ms-2">
            <i class="bi bi-sort-numeric-up"></i> 순위 저장
        </button>
        <a href="<?= base_url('AdmMaster/bbs/banner/new') ?>" class="btn btn-primary ms-2">
            <i class="bi bi-pencil-square"></i> 배너 등록
        </a>
    </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card mb-4 shadow-sm">
    <div class="card-body bg-light">
        <form name="frmSearch" method="get" action="<?= base_url('AdmMaster/banners') ?>" class="row g-3 align-items-center">
            <div class="col-auto">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="search_mode" id="search_mode_all" value="" <?= empty($search_mode) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="search_mode_all">전체</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="search_mode" id="search_mode_subject" value="subject" <?= $search_mode == 'subject' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="search_mode_subject">제목</label>
                </div>
            </div>
            <div class="col-auto flex-grow-1" style="max-width: 400px;">
                <div class="input-group">
                    <input type="text" name="search_word" value="<?= esc($search_word ?? '') ?>" class="form-control" placeholder="검색어 입력">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i> 검색하기
                    </button>
                </div>
            </div>
            <div class="col-auto ms-auto">
                <span class="text-muted small">■ 총 <strong><?= $totalCount ?></strong>개의 목록이 있습니다.</span>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="table-responsive">
        <form name="lfrm" id="lfrm">
            <table class="table table-bordered table-hover align-middle mb-0 text-center" style="font-size: 0.9rem;">
                <thead class="table-light">
                    <tr>
                        <th style="width: 1%; white-space: nowrap;">선택</th>
                        <th style="width: 1%; white-space: nowrap;">번호</th>
                        <th style="width: 1%; white-space: nowrap;">구분</th>
                        <th style="width: 1%; white-space: nowrap;">미리보기</th>
                        <th class="text-start">제목 / 링크</th>
                        <th style="width: 1%; white-space: nowrap;">노출여부</th>
                        <th style="width: 1%; white-space: nowrap;">등록일</th>
                        <th style="width: 68px; white-space: nowrap;">순위</th>
                        <th style="width: 1%; white-space: nowrap;">관리</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($list)): ?>
                        <tr>
                            <td colspan="8" class="py-5 text-muted text-center">검색된 결과가 없습니다.</td>
                        </tr>
                    <?php else: ?>
                        <?php 
                        $num = $totalCount - (($pg - 1) * 20);
                        foreach($list as $row): 
                        ?>
                        <tr>
                            <td>
                                <div class="form-check d-flex justify-content-center">
                                    <input type="checkbox" name="bbs_idx[]" value="<?= $row['bbs_idx'] ?>" class="form-check-input bbs_idx" />
                                </div>
                            </td>
                            <td><?= $num-- ?></td>
                            <td>
                                <?php 
                                $catMap = [
                                    'main' => '메인배너',
                                    'company' => '회사소개배너',
                                    'product' => '제품배너',
                                    'business' => '사업영역 배너',
                                    'medical' => '의료진 지원 배너',
                                ];
                                $catVal = $row['b_category'] ?? '';
                                $catLabel = !empty($catVal) && isset($catMap[$catVal]) ? $catMap[$catVal] : (!empty($row['category_name']) ? $row['category_name'] : '-');
                                ?>
                                <span class="badge <?= !empty($catLabel) && $catLabel !== '-' ? 'bg-primary' : 'bg-secondary' ?> px-2 py-1 fs-6"><?= esc($catLabel) ?></span>
                            </td>
                            <td>
                                <?php
                                $previewImg = $row['ufile6'] ? base_url('data/bbs/'.$row['ufile6']) : ($row['ufile5'] ? base_url('data/bbs/'.$row['ufile5']) : '');
                                ?>
                                <?php if($previewImg): ?>
                                    <img src="<?= $previewImg ?>" class="img-thumbnail banner-preview-thumb" style="max-height: 70px; max-width: 140px; cursor:zoom-in; object-fit:cover;" onclick="openPreview('<?= $previewImg ?>')" title="클릭하여 크게 보기">
                                <?php else: ?>
                                    <span class="text-muted small">-</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-start">
                                <a href="<?= base_url('AdmMaster/bbs/banner/edit/'.$row['bbs_idx']) ?>" class="text-decoration-none fw-bold text-dark">
                                    <?= esc($row['subject']) ?>
                                </a>
                                <div class="small text-muted text-truncate" style="max-width: 300px;"><?= esc($row['url']) ?></div>
                            </td>
                            <td>
                                <button type="button" onclick="toggle_notice('<?= $row['bbs_idx'] ?>', this)" class="btn btn-sm <?= ($row['notice_yn'] ?? 'N') == 'Y' ? 'btn-primary' : 'btn-danger' ?> py-0 px-2 fw-bold" style="font-size: 0.825rem;" title="클릭하여 노출/숨김 전환">
                                    <?= ($row['notice_yn'] ?? 'N') == 'Y' ? '노출' : '숨김' ?>
                                </button>
                            </td>
                            <td class="small text-muted"><?= date('Y.m.d', strtotime($row['r_date'])) ?></td>
                            <td>
                                <input type="number" class="form-control form-control-sm text-center onum-input"
                                    data-id="<?= $row['bbs_idx'] ?>"
                                    value="<?= (int)($row['onum'] ?? 0) ?>"
                                    style="width:62px; min-width:62px;"
                                    title="숫자가 높을수록 먼저 표시">
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= base_url('AdmMaster/bbs/banner/edit/'.$row['bbs_idx']) ?>" class="btn btn-secondary" title="수정">
                                        <i class="bi bi-gear"></i>
                                    </a>
                                    <button type="button" onclick="del_chk('<?= $row['bbs_idx'] ?>')" class="btn btn-danger" title="삭제">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </form>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-sm shadow-sm">
            <?php for($i=1; $i<=$totalPages; $i++): ?>
                <li class="page-item <?= $pg == $i ? 'active' : '' ?>">
                    <a class="page-link" href="?pg=<?= $i ?>&search_mode=<?= $search_mode ?>&search_word=<?= $search_word ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<script>
function toggle_notice(idx, btnEl) {
    var formData = new FormData();
    formData.append('bbs_idx', idx);
    formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');

    fetch('<?= base_url('AdmMaster/banners/toggleNotice') ?>', {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(function(res) { return res.json(); })
    .then(function(res) {
        if (res.status === 'OK') {
            if (res.new_status === 'Y') {
                btnEl.classList.remove('btn-danger');
                btnEl.classList.add('btn-primary');
                btnEl.innerText = '노출';
            } else {
                btnEl.classList.remove('btn-primary');
                btnEl.classList.add('btn-danger');
                btnEl.innerText = '숨김';
            }
        } else {
            alert('상태 변경 실패: ' + (res.message || '알 수 없는 오류'));
        }
    })
    .catch(function(err) {
        console.error(err);
        alert('통신 중 오류가 발생했습니다.');
    });
}
function CheckAll(checkBoxes, checked) {
    if (checkBoxes.length) {
        for (var i = 0; i < checkBoxes.length; i++) {
            checkBoxes[i].checked = checked;
        }
    } else {
        checkBoxes.checked = checked;
    }
}

function SELECT_DELETE() {
    if ($(".bbs_idx:checked").length == 0) {
        alert("삭제할 항목을 선택하셔야 합니다.");
        return;
    }
    if (confirm("삭제 하시겠습니까?\n삭제 후에는 복구가 불가능합니다.")) {
        var ids = [];
        $(".bbs_idx:checked").each(function() {
            ids.push($(this).val());
        });
        
        $.ajax({
            url: "<?= base_url('AdmMaster/bbs/banner/bulkDelete') ?>",
            type: "POST",
            data: { ids: ids },
            success: function(response) {
                alert("정상적으로 삭제되었습니다.");
                location.reload();
            }
        });
    }
}

function del_chk(bbs_idx) {
    if (confirm("삭제 하시겠습니까?\n삭제 후에는 복구가 불가능합니다.")) {
        $.ajax({
            url: "<?= base_url('AdmMaster/bbs/banner/bulkDelete') ?>",
            type: "POST",
            data: { ids: [bbs_idx] },
            success: function(response) {
                alert("정상적으로 삭제되었습니다.");
                location.reload();
            }
        });
    }
}
</script>

<!-- 이미지 미리보기 모달 -->
<div id="bannerPreviewModal" style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(0,0,0,0.85); align-items:center; justify-content:center; cursor:zoom-out;" onclick="closePreview()">
    <div style="position:relative; max-width:90vw; max-height:90vh;" onclick="event.stopPropagation()">
        <img id="bannerPreviewImg" src="" style="max-width:90vw; max-height:85vh; border-radius:8px; box-shadow:0 8px 40px rgba(0,0,0,0.5); display:block;">
        <button onclick="closePreview()" style="position:absolute; top:-16px; right:-16px; background:#fff; border:none; border-radius:50%; width:36px; height:36px; font-size:1.2rem; cursor:pointer; box-shadow:0 2px 8px rgba(0,0,0,0.3); line-height:1;">✕</button>
    </div>
</div>

<script>
function openPreview(src) {
    document.getElementById('bannerPreviewImg').src = src;
    var modal = document.getElementById('bannerPreviewModal');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function closePreview() {
    document.getElementById('bannerPreviewModal').style.display = 'none';
    document.body.style.overflow = '';
}
function saveOrder() {
    var orders = {};
    document.querySelectorAll('.onum-input').forEach(function(el) {
        orders[el.dataset.id] = el.value;
    });
    fetch('<?= base_url('AdmMaster/banners/updateOrder') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: Object.entries(orders).map(function([k, v]) {
            return encodeURIComponent('orders[' + k + ']') + '=' + encodeURIComponent(v);
        }).join('&')
    })
    .then(function(r) { return r.json(); })
    .then(function(res) {
        if (res.status === 'OK') {
            alert('순위가 저장되었습니다.');
            location.reload();
        } else {
            alert('저장 실패: ' + (res.message || ''));
        }
    })
    .catch(function() { alert('오류가 발생했습니다.'); });
}
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closePreview();
});
</script>

<?= $this->endSection() ?>
