<?php
/**
 * 공용 팝업 레이어 / 윈도우 - 전 페이지 공용
 * $_popups 에 활성화된 팝업 목록이 전달됩니다.
 */
$popups = $_popups ?? [];
if (empty($popups) || !is_array($popups)) {
    return;
}
?>

<!-- Active Popups Container -->
<style>
.sy-popup-box img,
.sy-popup-html-content img {
    width: 100% !important;
    max-width: 100% !important;
    height: 100% !important;
    min-height: 100% !important;
    display: block !important;
    margin: 0 !important;
    padding: 0 !important;
    object-fit: cover !important;
    float: none !important;
    box-sizing: border-box !important;
}
.sy-popup-html-content p,
.sy-popup-html-content div,
.sy-popup-html-content span,
.sy-popup-html-content figure {
    width: 100% !important;
    height: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
    box-sizing: border-box !important;
}
.sy-popup-html-content {
    width: 100% !important;
    height: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
}
</style>
<div id="sy-popup-container" style="position: fixed; z-index: 99999; top: 0; left: 0; pointer-events: none;">
    <?php foreach ($popups as $popup): ?>
        <?php
        $pIdx     = (int) $popup['idx'];
        $pSubject = esc($popup['P_SUBJECT'] ?? '알림');
        $pFile    = $popup['ufile'] ?? '';
        $pContent = $popup['P_CONTENT'] ?? '';
        $pWidth   = (int) ($popup['P_WIN_WIDTH'] ?: 450);
        $pHeight  = (int) ($popup['P_WIN_HEIGHT'] ?: 380);
        $pLeft    = (int) ($popup['P_WIN_LEFT'] ?: 50);
        $pTop     = (int) ($popup['P_WIN_TOP'] ?: 80);
        ?>
        <div id="sy-popup-<?= $pIdx ?>" class="sy-popup-box" style="display: none; pointer-events: auto; position: fixed; top: <?= $pTop ?>px; left: <?= $pLeft ?>px; width: <?= $pWidth ?>px; height: <?= $pHeight ?>px; max-width: calc(100vw - 20px); max-height: calc(100vh - 20px); background: #ffffff; border-radius: 12px; box-shadow: 0 20px 45px rgba(7, 17, 31, 0.28), 0 0 0 1px rgba(0,0,0,0.08); overflow: hidden; z-index: <?= 99999 + $pIdx ?>; font-family: Pretendard, -apple-system, BlinkMacSystemFont, sans-serif; flex-direction: column;">
            <!-- Header Bar -->
            <div style="flex: 0 0 auto; background: #07111f; color: #ffffff; padding: 12px 18px; display: flex; align-items: center; justify-content: space-between;">
                <h4 style="margin: 0; font-size: 15px; font-weight: 700; color: #ffffff; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 85%;"><?= $pSubject ?></h4>
                <button type="button" onclick="closeSyPopup(<?= $pIdx ?>, false);" aria-label="닫기" style="background: none; border: 0; color: #94a3b8; font-size: 22px; cursor: pointer; padding: 0 4px; line-height: 1; transition: color .2s;">&times;</button>
            </div>

            <!-- Body Area -->
            <div style="flex: 1 1 auto; width: 100%; min-height: 0; overflow: hidden; position: relative; color: #334155; font-size: 15px; line-height: 1.6; display: flex; flex-direction: column;">
                <?php if (!empty($pFile) && file_exists(FCPATH . 'data/popup/' . $pFile)): ?>
                    <div style="width: 100%; height: 100%; flex: 1 1 auto; margin: 0; padding: 0; overflow: hidden;">
                        <img src="<?= base_url('data/popup/' . $pFile) ?>" alt="<?= $pSubject ?>" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($pContent)): ?>
                    <div class="sy-popup-html-content" style="padding: 16px; overflow-y: auto;">
                        <?= $pContent ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Footer Bar (Don't show today / Close) -->
            <div style="flex: 0 0 auto; background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 10px 16px; display: flex; align-items: center; justify-content: space-between; font-size: 13px;">
                <label style="display: inline-flex; align-items: center; gap: 6px; color: #64748b; cursor: pointer; user-select: none;">
                    <input type="checkbox" id="sy-popup-today-<?= $pIdx ?>" style="accent-color: #0046ff; cursor: pointer;">
                    <span>오늘 하루 보지 않기</span>
                </label>
                <button type="button" onclick="closeSyPopupWithCheck(<?= $pIdx ?>);" style="background: #0046ff; color: #ffffff; border: 0; border-radius: 6px; padding: 6px 16px; font-size: 13px; font-weight: 700; cursor: pointer; transition: background .2s;">닫기</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
(function() {
    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        return match ? match[2] : null;
    }

    document.addEventListener('DOMContentLoaded', function() {
        <?php foreach ($popups as $popup): ?>
            var pIdx = <?= (int)$popup['idx'] ?>;
            if (getCookie('sy_popup_closed_' + pIdx) !== 'Y') {
                var el = document.getElementById('sy-popup-' + pIdx);
                if (el) {
                    el.style.display = 'flex';
                    // Adjust position for mobile screens
                    if (window.innerWidth <= 640) {
                        el.style.left = '10px';
                        el.style.top = (20 + (pIdx % 3) * 30) + 'px';
                        el.style.width = 'calc(100vw - 20px)';
                    }
                }
            }
        <?php endforeach; ?>
    });
})();

function closeSyPopup(idx, today) {
    if (today) {
        var date = new Date();
        date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
        document.cookie = "sy_popup_closed_" + idx + "=Y; expires=" + date.toUTCString() + "; path=/";
    }
    var el = document.getElementById("sy-popup-" + idx);
    if (el) {
        el.style.display = "none";
    }
}

function closeSyPopupWithCheck(idx) {
    var chk = document.getElementById("sy-popup-today-" + idx);
    var today = chk && chk.checked;
    closeSyPopup(idx, today);
}
</script>
