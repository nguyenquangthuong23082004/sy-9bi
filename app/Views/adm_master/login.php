<!DOCTYPE HTML>
<html lang="ko">
<head>
    <?php 
    $siteName     = sy_site_setting('site_name', '신영로파마');
    $site_title   = sy_site_setting('browser_title') ?: $siteName;
    $metaDesc     = sy_site_setting('og_des') ?: sy_site_setting('meta_tag');
    $metaKeywords = sy_site_setting('meta_keyword');

    $favicoFile   = sy_site_setting('favico');
    $favicon      = (!empty($favicoFile) && file_exists(FCPATH . 'uploads/setting/' . $favicoFile))
        ? base_url('uploads/setting/' . $favicoFile)
        : base_url('favicon.ico');
    ?>
    <title><?= esc($site_title) ?> - 관리자 로그인</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= $favicon ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', 'Pretendard', 'Apple SD Gothic Neo', sans-serif;
            background: #07111f;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated background */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 20% 20%, rgba(0, 82, 163, 0.18) 0%, transparent 60%),
                radial-gradient(ellipse 60% 80% at 80% 80%, rgba(0, 140, 255, 0.10) 0%, transparent 60%),
                radial-gradient(ellipse 50% 50% at 50% 50%, rgba(255,255,255,0.02) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        /* Grid lines */
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
            z-index: 0;
        }

        /* Floating orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.12;
            pointer-events: none;
            z-index: 0;
            animation: float 12s ease-in-out infinite;
        }
        .orb-1 { width: 400px; height: 400px; background: #1a6fd4; top: -100px; left: -100px; animation-delay: 0s; }
        .orb-2 { width: 300px; height: 300px; background: #0099cc; bottom: -80px; right: -80px; animation-delay: -4s; }
        .orb-3 { width: 200px; height: 200px; background: #3b82f6; top: 50%; left: 60%; animation-delay: -8s; }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(20px, -20px) scale(1.05); }
            66% { transform: translate(-15px, 15px) scale(0.97); }
        }

        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            padding: 24px 16px;
        }

        /* Logo area */
        .brand-area {
            text-align: center;
            margin-bottom: 36px;
        }

        .brand-logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #1a6fd4, #0099dd);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: #fff;
            box-shadow: 0 8px 24px rgba(26,111,212,0.4);
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 1.35rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.3px;
        }

        .brand-name span {
            display: block;
            font-size: 0.7rem;
            font-weight: 400;
            color: rgba(255,255,255,0.45);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 2px;
        }

        .brand-area p {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.38);
            letter-spacing: 0.5px;
        }

        /* Card */
        .login-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 40px 40px 36px;
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            box-shadow:
                0 32px 64px rgba(0,0,0,0.4),
                inset 0 1px 0 rgba(255,255,255,0.08);
        }

        .card-heading {
            font-size: 1.05rem;
            font-weight: 600;
            color: rgba(255,255,255,0.9);
            margin-bottom: 28px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-heading::before {
            content: '';
            display: block;
            width: 4px;
            height: 18px;
            background: linear-gradient(180deg, #1a6fd4, #0099dd);
            border-radius: 2px;
        }

        /* Alert */
        .alert-error {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.25);
            border-radius: 10px;
            padding: 12px 16px;
            color: #fca5a5;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        /* Form fields */
        .field-group {
            margin-bottom: 18px;
        }

        .field-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 500;
            color: rgba(255,255,255,0.5);
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .field-wrap {
            position: relative;
        }

        .field-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.3);
            font-size: 1rem;
            pointer-events: none;
            transition: color 0.2s;
        }

        .field-input {
            width: 100%;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 13px 16px 13px 44px;
            color: #fff;
            font-size: 0.92rem;
            font-family: inherit;
            outline: none;
            transition: all 0.25s;
        }

        .field-input::placeholder { color: rgba(255,255,255,0.22); }

        .field-input:focus {
            background: rgba(26,111,212,0.12);
            border-color: rgba(26,111,212,0.6);
            box-shadow: 0 0 0 3px rgba(26,111,212,0.15);
        }

        .field-input:focus + .field-icon,
        .field-wrap:focus-within .field-icon {
            color: #3b82f6;
        }

        /* Checkbox */
        .save-id-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 28px;
            margin-top: 4px;
        }

        .save-id-row input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #1a6fd4;
            cursor: pointer;
            border-radius: 4px;
        }

        .save-id-row label {
            font-size: 0.82rem;
            color: rgba(255,255,255,0.4);
            cursor: pointer;
            user-select: none;
        }

        /* Button */
        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #1a6fd4 0%, #0891b2 100%);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 0.95rem;
            font-weight: 600;
            font-family: inherit;
            letter-spacing: 0.3px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.25s;
            box-shadow: 0 8px 24px rgba(26,111,212,0.35);
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1), transparent);
            opacity: 0;
            transition: opacity 0.25s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(26,111,212,0.45);
        }

        .btn-login:hover::before { opacity: 1; }
        .btn-login:active { transform: translateY(0); }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 28px;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.2);
            letter-spacing: 0.5px;
        }

        /* Loading overlay */
        .loading-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(7,17,31,0.75);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }
        .loading-overlay.active { display: flex; }

        .spinner {
            width: 44px;
            height: 44px;
            border: 3px solid rgba(255,255,255,0.1);
            border-top-color: #1a6fd4;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        @media (max-width: 480px) {
            .login-card { padding: 32px 24px 28px; border-radius: 20px; }
        }
    </style>
</head>
<body>

<div class="orb orb-1"></div>
<div class="orb orb-2"></div>
<div class="orb orb-3"></div>

<div id="ajax_loader" class="loading-overlay">
    <div class="spinner"></div>
</div>

<div class="login-wrapper">
    <!-- Brand -->
    <div class="brand-area">
        <div class="brand-logo">
            <div class="brand-icon"><i class="bi bi-shield-check"></i></div>
            <div class="brand-name">
                <?= esc($site_title) ?>
                <span>Admin Console</span>
            </div>
        </div>
        <p>관리자 전용 보안 로그인</p>
    </div>

    <!-- Card -->
    <div class="login-card">
        <div class="card-heading">로그인</div>

        <form action="<?= base_url('AdmMaster/loginProcess') ?>" method="post" name="loginForm" autocomplete="off">
            <?= csrf_field() ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert-error">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="field-group">
                <label class="field-label" for="user_id">아이디</label>
                <div class="field-wrap">
                    <input type="text" name="user_id" id="user_id" class="field-input"
                        placeholder="아이디를 입력하세요" onkeyup="press_it()" autofocus />
                    <i class="bi bi-person field-icon"></i>
                </div>
            </div>

            <div class="field-group">
                <label class="field-label" for="user_pw">비밀번호</label>
                <div class="field-wrap">
                    <input type="password" name="user_pw" id="user_pw" class="field-input"
                        placeholder="비밀번호를 입력하세요" onkeyup="press_it()" />
                    <i class="bi bi-lock field-icon"></i>
                </div>
            </div>

            <div class="save-id-row">
                <input type="checkbox" name="saveId" id="saveId" value="Y">
                <label for="saveId">아이디 저장</label>
            </div>

            <button type="button" onclick="loginSendit()" class="btn-login">
                <i class="bi bi-box-arrow-in-right"></i> 로그인
            </button>
        </form>
    </div>

    <div class="login-footer">
        &copy; <?= date('Y') ?> <?= esc($siteName) ?>. All rights reserved.
    </div>
</div>

<script>
function loginSendit() {
    var form = document.loginForm;
    if (!form.user_id.value.trim()) {
        alert("아이디를 입력해 주십시오.");
        form.user_id.focus();
        return;
    }
    if (!form.user_pw.value.trim()) {
        alert("비밀번호를 입력해 주십시오.");
        form.user_pw.focus();
        return;
    }
    if (form.saveId.checked) {
        saveLogin(form.user_id.value);
    } else {
        saveLogin("");
    }
    document.getElementById('ajax_loader').classList.add('active');
    form.submit();
}

function press_it() {
    if (window.event.keyCode == 13) loginSendit();
}

function setCookie(name, value, expiredays) {
    var today = new Date();
    today.setDate(today.getDate() + expiredays);
    document.cookie = name + "=" + escape(value) + "; path=/; expires=" + today.toGMTString() + ";";
}

function getCookie(key) {
    var cook = document.cookie + ";";
    var idx = cook.indexOf(key, 0);
    var val = "";
    if (idx != -1) {
        cook = cook.substring(idx, cook.length);
        var begin = cook.indexOf("=", 0) + 1;
        var end = cook.indexOf(";", begin);
        val = unescape(cook.substring(begin, end));
    }
    return val;
}

function saveLogin(id) {
    setCookie("user_id", id, id !== "" ? 70 : -1);
}

function getLogin() {
    var form = document.loginForm;
    var id = getCookie("user_id");
    if (id !== "") {
        form.user_id.value = id;
        form.saveId.checked = true;
    }
}

getLogin();
</script>
</body>
</html>
