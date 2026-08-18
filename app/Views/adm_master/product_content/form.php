<?= $this->extend('adm_master/layout/main') ?>

<?= $this->section('header_buttons') ?>
    <div class="d-flex gap-2">
        <button type="button" onclick="send_it();" class="btn btn-primary px-4">
            <i class="bi bi-save me-1"></i> 전체 저장
        </button>
    </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div id="ajax-alert" class="alert alert-success alert-dismissible fade show shadow-sm mb-4 d-none" role="alert">
    <i class="bi bi-check-circle-fill me-2"></i> <span id="ajax-alert-message">성공적으로 저장되었습니다.</span>
    <button type="button" class="btn-close" onclick="$('#ajax-alert').addClass('d-none');" aria-label="Close"></button>
</div>

<!-- 제품 선택 탭 -->
<ul class="nav nav-pills mb-4 gap-2">
    <?php foreach ($products as $code => $name): ?>
        <li class="nav-item">
            <a class="nav-link <?= $productCode == $code ? 'active btn-primary text-white' : 'bg-white border text-dark' ?> fw-semibold px-4 shadow-sm" href="<?= base_url('AdmMaster/product/' . $code) ?>">
                <?= esc($name) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<form name="frm" id="frm" method="post" action="<?= base_url('AdmMaster/product/save/' . $productCode) ?>" enctype="multipart/form-data">
    
    <!-- 1) 히어로 영역 (공통) -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
            <h5 class="card-title fw-bold mb-0 text-primary"><i class="bi bi-star me-2"></i> 히어로 영역 (Hero Section)</h5>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">아이브로우 (Eyebrow)</label>
                    <input type="text" name="hero_eyebrow" class="form-control" value="<?= esc($contents['hero_eyebrow'] ?? '') ?>" />
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">태그 목록 (쉼표로 구분)</label>
                    <input type="text" name="hero_tags" class="form-control" value="<?= esc($contents['hero_tags'] ?? '') ?>" placeholder="예: 전문의약품, 설하면역치료 (SLIT)" />
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">메인 타이틀 (Title - 줄바꿈 가능)</label>
                    <textarea name="hero_title" class="form-control" rows="2"><?= esc($contents['hero_title'] ?? '') ?></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">설명 문구 (Description)</label>
                    <textarea name="hero_desc" class="summernote"><?= esc($contents['hero_desc'] ?? '') ?></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">히어로 이미지 (Hero Image - 자동 resize & webp 변환)</label>
                    <input type="file" name="hero_image" class="form-control mb-2" accept="image/*" />
                    <?php if (!empty($contents['hero_image'])): ?>
                        <div class="mt-2">
                            <span class="text-muted d-block mb-1 small">현재 등록된 이미지:</span>
                            <img src="<?= base_url($contents['hero_image']) ?>" alt="Hero Image" class="img-thumbnail" style="max-height: 200px; width: auto;" />
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- 2) ABOUT 영역 (공통) -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
            <h5 class="card-title fw-bold mb-0 text-primary"><i class="bi bi-info-circle me-2"></i> 소개 영역 (About Section)</h5>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">소개 아이브로우 (ABOUT Eyebrow)</label>
                    <input type="text" name="about_eyebrow" class="form-control" value="<?= esc($contents['about_eyebrow'] ?? '') ?>" />
                </div>
                <div class="col-md-8">
                    <label class="form-label fw-semibold">소개 타이틀 (ABOUT Title)</label>
                    <input type="text" name="about_title" class="form-control" value="<?= esc($contents['about_title'] ?? '') ?>" />
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">소개 본문 설명</label>
                    <textarea name="about_desc" class="summernote"><?= esc($contents['about_desc'] ?? '') ?></textarea>
                </div>
            </div>

            <?php if (isset($contents['about_col1_title'])): ?>
                <hr class="my-4" />
                <h6 class="fw-bold mb-3 text-secondary"><i class="bi bi-columns-gap me-2"></i> 2열 특징 정보 (Grid Columns)</h6>
                <div class="row g-3">
                    <!-- Column 1 -->
                    <div class="col-md-6 border-end">
                        <div class="p-2">
                            <span class="badge bg-secondary mb-2">첫 번째 열 (Column 1)</span>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">영문 소제목 (English Title)</label>
                                <input type="text" name="about_col1_en" class="form-control form-control-sm" value="<?= esc($contents['about_col1_en'] ?? '') ?>" />
                            </div>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">한글 대제목 (Korean Title)</label>
                                <input type="text" name="about_col1_title" class="form-control form-control-sm" value="<?= esc($contents['about_col1_title'] ?? '') ?>" />
                            </div>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">설명 문구 (Description)</label>
                                <textarea name="about_col1_desc" class="form-control form-control-sm" rows="3"><?= esc($contents['about_col1_desc'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Column 2 -->
                    <div class="col-md-6">
                        <div class="p-2">
                            <span class="badge bg-secondary mb-2">두 번째 열 (Column 2)</span>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">영문 소제목 (English Title)</label>
                                <input type="text" name="about_col2_en" class="form-control form-control-sm" value="<?= esc($contents['about_col2_en'] ?? '') ?>" />
                            </div>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">한글 대제목 (Korean Title)</label>
                                <input type="text" name="about_col2_title" class="form-control form-control-sm" value="<?= esc($contents['about_col2_title'] ?? '') ?>" />
                            </div>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">설명 문구 (Description)</label>
                                <textarea name="about_col2_desc" class="form-control form-control-sm" rows="3"><?= esc($contents['about_col2_desc'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- 3) 라이스정 (lais) 전용 섹션 -->
    <?php if ($productCode === 'lais'): ?>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h5 class="card-title fw-bold mb-0 text-primary"><i class="bi bi-clock-history me-2"></i> 치료 단계 & 안내 문구 (TREATMENT & NOTICE)</h5>
            </div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">치료단계 아이브로우 (TREATMENT Eyebrow)</label>
                        <input type="text" name="treatment_eyebrow" class="form-control" value="<?= esc($contents['treatment_eyebrow'] ?? '') ?>" />
                    </div>
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">치료단계 타이틀 (TREATMENT Title)</label>
                        <input type="text" name="treatment_title" class="form-control" value="<?= esc($contents['treatment_title'] ?? '') ?>" />
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">치료단계 메인 설명</label>
                        <textarea name="treatment_desc" class="form-control" rows="2"><?= esc($contents['treatment_desc'] ?? '') ?></textarea>
                    </div>
                </div>

                <hr class="my-4" />
                <h6 class="fw-bold mb-3 text-secondary"><i class="bi bi-123 me-2"></i> 단계별 설명 (Steps)</h6>
                <div class="row g-3">
                    <!-- Step 1 -->
                    <div class="col-md-6 border-end">
                        <div class="p-2">
                            <span class="badge bg-info text-dark mb-2">초기치료 단계 (Step 1)</span>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">단계 라벨 (Step Label)</label>
                                <input type="text" name="treatment_step1_num" class="form-control form-control-sm" value="<?= esc($contents['treatment_step1_num'] ?? '') ?>" />
                            </div>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">단계 제목 (Step Title)</label>
                                <input type="text" name="treatment_step1_title" class="form-control form-control-sm" value="<?= esc($contents['treatment_step1_title'] ?? '') ?>" />
                            </div>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">단계 설명 (Step Description)</label>
                                <textarea name="treatment_step1_desc" class="form-control form-control-sm" rows="3"><?= esc($contents['treatment_step1_desc'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Step 2 -->
                    <div class="col-md-6">
                        <div class="p-2">
                            <span class="badge bg-info text-dark mb-2">유지치료 단계 (Step 2)</span>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">단계 라벨 (Step Label)</label>
                                <input type="text" name="treatment_step2_num" class="form-control form-control-sm" value="<?= esc($contents['treatment_step2_num'] ?? '') ?>" />
                            </div>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">단계 제목 (Step Title)</label>
                                <input type="text" name="treatment_step2_title" class="form-control form-control-sm" value="<?= esc($contents['treatment_step2_title'] ?? '') ?>" />
                            </div>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">단계 설명 (Step Description)</label>
                                <textarea name="treatment_step2_desc" class="form-control form-control-sm" rows="3"><?= esc($contents['treatment_step2_desc'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4" />
                <h6 class="fw-bold mb-3 text-secondary"><i class="bi bi-exclamation-triangle me-2"></i> 하단 안내 문구 (Notice)</h6>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-semibold">안내 영역 타이틀 (Notice Title)</label>
                        <input type="text" name="notice_title" class="form-control" value="<?= esc($contents['notice_title'] ?? '') ?>" />
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">안내 영역 내용 설명 (Notice Description)</label>
                        <textarea name="notice_desc" class="summernote"><?= esc($contents['notice_desc'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- 4) 피부단자시험 (skin-test) 전용 섹션 -->
    <?php if ($productCode === 'skin-test'): ?>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h5 class="card-title fw-bold mb-0 text-primary"><i class="bi bi-list-check me-2"></i> 항원 라인업 & 발주 문의 (LINE-UP & ORDER)</h5>
            </div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">라인업 아이브로우 (LINE-UP Eyebrow)</label>
                        <input type="text" name="lineup_eyebrow" class="form-control" value="<?= esc($contents['lineup_eyebrow'] ?? '') ?>" />
                    </div>
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">라인업 타이틀 (LINE-UP Title)</label>
                        <input type="text" name="lineup_title" class="form-control" value="<?= esc($contents['lineup_title'] ?? '') ?>" />
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">라인업 메인 설명</label>
                        <textarea name="lineup_desc" class="form-control" rows="2"><?= esc($contents['lineup_desc'] ?? '') ?></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">항원 핵심 요약 리스트 (형식: 타이틀|설명, 줄바꿈으로 구분)</label>
                        <textarea name="lineup_keypoints" class="form-control font-monospace" rows="5" placeholder="집먼지진드기|대표적인 실내 흡입 항원&#10;꽃가루|수목 · 잡초 · 화분류"><?= esc($contents['lineup_keypoints'] ?? '') ?></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">자료실 링크 텍스트</label>
                        <input type="text" name="lineup_link_text" class="form-control" value="<?= esc($contents['lineup_link_text'] ?? '') ?>" />
                    </div>
                </div>

                <hr class="my-4" />
                <h6 class="fw-bold mb-3 text-secondary"><i class="bi bi-telephone me-2"></i> 발주 및 문의 관리 (Order Info)</h6>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">발주 아이브로우 (ORDER Eyebrow)</label>
                        <input type="text" name="order_eyebrow" class="form-control" value="<?= esc($contents['order_eyebrow'] ?? '') ?>" />
                    </div>
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">발주 타이틀 (ORDER Title)</label>
                        <input type="text" name="order_title" class="form-control" value="<?= esc($contents['order_title'] ?? '') ?>" />
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">발주 메인 설명</label>
                        <textarea name="order_desc" class="form-control" rows="2"><?= esc($contents['order_desc'] ?? '') ?></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">발주 정보 상세 항목 (형식: 항목명|내용, 줄바꿈으로 구분 - HTML 태그 허용)</label>
                        <textarea name="order_info" class="form-control font-monospace" rows="5" placeholder="대표 전화|&lt;a href=&quot;tel:02-900-0436&quot;&gt;02-900-0436&lt;/a&gt;"><?= esc($contents['order_info'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- 5) EARVENT (earvent) 전용 섹션 -->
    <?php if ($productCode === 'earvent'): ?>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h5 class="card-title fw-bold mb-0 text-primary"><i class="bi bi-balloon me-2"></i> 용도, 사용방법 & 안내문구</h5>
            </div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">용도 아이브로우 (INDICATION Eyebrow)</label>
                        <input type="text" name="use_eyebrow" class="form-control" value="<?= esc($contents['use_eyebrow'] ?? '') ?>" />
                    </div>
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">용도 타이틀 (INDICATION Title)</label>
                        <input type="text" name="use_title" class="form-control" value="<?= esc($contents['use_title'] ?? '') ?>" />
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">용도 상세 본문 설명</label>
                        <textarea name="use_desc" class="summernote"><?= esc($contents['use_desc'] ?? '') ?></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">적용 대상 소제목 (Subhead)</label>
                        <input type="text" name="use_subhead" class="form-control" value="<?= esc($contents['use_subhead'] ?? '') ?>" />
                    </div>
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">적용 대상 목록 (쉼표로 구분)</label>
                        <input type="text" name="use_target_list" class="form-control" value="<?= esc($contents['use_target_list'] ?? '') ?>" placeholder="예: 삼출성 중이염, 만성 중이염, 이충만감" />
                    </div>
                </div>

                <hr class="my-4" />
                <h6 class="fw-bold mb-3 text-secondary"><i class="bi bi-columns-gap me-2"></i> 용도 추가 열 특징 (Grid Columns)</h6>
                <div class="row g-3">
                    <!-- Column 1 -->
                    <div class="col-md-6 border-end">
                        <div class="p-2">
                            <span class="badge bg-secondary mb-2">첫 번째 열 (Column 1)</span>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">영문 소제목 (English Title)</label>
                                <input type="text" name="use_col1_en" class="form-control form-control-sm" value="<?= esc($contents['use_col1_en'] ?? '') ?>" />
                            </div>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">한글 대제목 (Korean Title)</label>
                                <input type="text" name="use_col1_title" class="form-control form-control-sm" value="<?= esc($contents['use_col1_title'] ?? '') ?>" />
                            </div>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">설명 문구 (Description)</label>
                                <textarea name="use_col1_desc" class="form-control form-control-sm" rows="3"><?= esc($contents['use_col1_desc'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Column 2 -->
                    <div class="col-md-6">
                        <div class="p-2">
                            <span class="badge bg-secondary mb-2">두 번째 열 (Column 2)</span>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">영문 소제목 (English Title)</label>
                                <input type="text" name="use_col2_en" class="form-control form-control-sm" value="<?= esc($contents['use_col2_en'] ?? '') ?>" />
                            </div>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">한글 대제목 (Korean Title)</label>
                                <input type="text" name="use_col2_title" class="form-control form-control-sm" value="<?= esc($contents['use_col2_title'] ?? '') ?>" />
                            </div>
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">설명 문구 (Description)</label>
                                <textarea name="use_col2_desc" class="form-control form-control-sm" rows="3"><?= esc($contents['use_col2_desc'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4" />
                <h6 class="fw-bold mb-3 text-secondary"><i class="bi bi-123 me-2"></i> 사용 방법 단계별 목록 (How To Use - 형식: 단계 라벨|단계 제목|단계 설명, 줄바꿈으로 구분)</h6>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">방법 아이브로우 (HOW TO USE Eyebrow)</label>
                        <input type="text" name="how_eyebrow" class="form-control" value="<?= esc($contents['how_eyebrow'] ?? '') ?>" />
                    </div>
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">방법 타이틀 (HOW TO USE Title)</label>
                        <input type="text" name="how_title" class="form-control" value="<?= esc($contents['how_title'] ?? '') ?>" />
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">단계별 설명 리스트 (줄바꿈으로 구분)</label>
                        <textarea name="how_steps" class="form-control font-monospace" rows="5" placeholder="STEP 01|풍선 끼우기|플라스틱 대롱에 풍선을 끼웁니다."><?= esc($contents['how_steps'] ?? '') ?></textarea>
                    </div>
                </div>

                <hr class="my-4" />
                <h6 class="fw-bold mb-3 text-secondary"><i class="bi bi-exclamation-triangle me-2"></i> 하단 안내 문구 (Notice)</h6>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-semibold">안내 영역 타이틀 (Notice Title)</label>
                        <input type="text" name="notice_title" class="form-control" value="<?= esc($contents['notice_title'] ?? '') ?>" />
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">안내 영역 내용 설명 (Notice Description)</label>
                        <textarea name="notice_desc" class="summernote"><?= esc($contents['notice_desc'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- 하단 저장 버튼 -->
    <div class="d-flex justify-content-center my-4 pb-5">
        <button type="button" onclick="send_it();" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm">
            <i class="bi bi-save me-2"></i> 설정 저장하기
        </button>
    </div>
</form>

<script>
$(function() {
    // Summernote Init
    $('.summernote').summernote({
        height: 350,
        lang: 'ko-KR',
        placeholder: '내용을 입력해주세요.',
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '36', '48', '72']
    });

    // AJAX Form Init
    $("#frm").ajaxForm({
        dataType: 'json',
        success: function(response) {
            if (response.status === 'OK') {
                $('#ajax-alert-message').text(response.message);
                $('#ajax-alert').removeClass('d-none');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                alert(response.message || '저장 중 오류가 발생했습니다.');
            }
        },
        error: function() {
            alert('통신 중 오류가 발생했습니다.');
        }
    });
});

function send_it() {
    $('#frm').submit();
}
</script>

<?= $this->endSection() ?>
