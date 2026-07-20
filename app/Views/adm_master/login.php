<!DOCTYPE HTML>
<html lang="ko">
<head>
    <?php 
    $siteName   = sy_site_setting('site_name', '(주)신영로파마');
    $site_title = sy_site_setting('browser_title') ?: $siteName;
    $favicoFile = sy_site_setting('favico');
    $favicon    = (!empty($favicoFile) && file_exists(FCPATH . 'uploads/setting/' . $favicoFile))
        ? base_url('uploads/setting/' . $favicoFile)
        : base_url('favicon.ico');
    $logoFile   = sy_site_setting('logos');
    $logoSrc    = (!empty($logoFile) && file_exists(FCPATH . 'uploads/setting/' . $logoFile))
        ? base_url('uploads/setting/' . $logoFile)
        : base_url('images/logo_h.webp');
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
            font-family: 'Inter', 'Apple SD Gothic Neo', 'Pretendard', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f4f8;
            position: relative;
            overflow: hidden;
        }

        /* Soft gradient background */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                linear-gradient(135deg, #e8f0fe 0%, #f0f7ff 40%, #e3f2fd 70%, #f5f0ff 100%);
            z-index: 0;
        }

        /* Decorative blobs */
        .blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.35;
            pointer-events: none;
            z-index: 0;
        }
        .blob-1 { width: 500px; height: 500px; background: #bdd7ff; top: -150px; left: -150px; }
        .blob-2 { width: 400px; height: 400px; background: #c8f0e0; bottom: -120px; right: -120px; }
        .blob-3 { width: 300px; height: 300px; background: #d4c8ff; top: 40%; left: 55%; }

        /* Wrapper */
        .login-page {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            padding: 20px 16px;
        }

        /* Card */
        .login-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow:
                0 4px 6px rgba(0,0,0,0.04),
                0 20px 60px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        /* Card top accent strip */
        .card-stripe {
            height: 4px;
            background: linear-gradient(90deg, #1a6fd4 0%, #00b4d8 50%, #0077b6 100%);
        }

        /* Card inner */
        .card-inner {
            padding: 36px 40px 32px;
        }

        /* Brand */
        .brand {
            display: flex;
            justify-content: center;
            margin-bottom: 28px;
            padding-bottom: 24px;
            border-bottom: 1px solid #f0f2f5;
        }

        .brand-logo-img {
            max-height: 48px;
            width: auto;
            display: block;
        }

        /* Heading */
        .login-heading {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1a1f36;
            margin-bottom: 6px;
            letter-spacing: -0.3px;
        }

        .login-desc {
            font-size: 0.83rem;
            color: #8898aa;
            margin-bottom: 28px;
        }

        /* Alert */
        .alert-error {
            background: #fff5f5;
            border: 1px solid #fed7d7;
            border-left: 3px solid #e53e3e;
            border-radius: 10px;
            padding: 11px 14px;
            color: #c53030;
            font-size: 0.83rem;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        /* Fields */
        .field-group { margin-bottom: 16px; }

        .field-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 600;
            color: #525f7f;
            margin-bottom: 7px;
            letter-spacing: 0.3px;
        }

        .field-wrap { position: relative; }

        .field-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            font-size: 0.95rem;
            pointer-events: none;
            transition: color 0.2s;
        }

        .field-input {
            width: 100%;
            border: 1.5px solid #e4e9f0;
            border-radius: 10px;
            background: #fafbfc;
            padding: 11px 14px 11px 40px;
            font-size: 0.9rem;
            font-family: inherit;
            color: #1a1f36;
            outline: none;
            transition: all 0.2s;
        }

        .field-input::placeholder { color: #c0cadd; }

        .field-input:focus {
            border-color: #1a6fd4;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(26,111,212,0.1);
        }

        .field-wrap:focus-within .field-icon { color: #1a6fd4; }

        /* Save ID */
        .save-row {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 22px;
        }

        .save-row input[type="checkbox"] {
            width: 15px;
            height: 15px;
            accent-color: #1a6fd4;
            cursor: pointer;
        }

        .save-row label {
            font-size: 0.81rem;
            color: #8898aa;
            cursor: pointer;
            user-select: none;
        }

        /* Login button */
        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #1a6fd4 0%, #0891b2 100%);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 0.93rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.22s;
            box-shadow: 0 6px 20px rgba(26,111,212,0.3);
            letter-spacing: 0.2px;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 28px rgba(26,111,212,0.38);
        }

        .btn-login:active { transform: translateY(0); }

        /* Footer */
        .card-footer-text {
            text-align: center;
            padding: 16px;
            background: #fafbfc;
            border-top: 1px solid #f0f2f5;
            font-size: 0.73rem;
            color: #b0bec5;
            letter-spacing: 0.3px;
        }

        /* Loading */
        .loading-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(255,255,255,0.7);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }
        .loading-overlay.active { display: flex; }

        .spinner {
            width: 42px; height: 42px;
            border: 3px solid rgba(26,111,212,0.15);
            border-top-color: #1a6fd4;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        @media (max-width: 480px) {
            .card-inner { padding: 28px 24px 24px; }
        }
    </style>
</head>
<body>

<div class="blob blob-1"></div>
<div class="blob blob-2"></div>
<div class="blob blob-3"></div>

<div id="ajax_loader" class="loading-overlay">
    <div class="spinner"></div>
</div>

<div class="login-page">
    <div class="login-card">
        <div class="card-inner">
            <!-- Brand block -->
            <div class="brand">
                <?php if ($logoSrc): ?>
                    <img src="<?= esc($logoSrc, 'attr') ?>" alt="<?= esc($siteName) ?>" class="brand-logo-img">
                <?php endif; ?>
            </div>

            <!-- Heading -->
            <div class="login-heading">관리자 로그인</div>
            <div class="login-desc">관리자 전용 보안 로그인 페이지입니다.</div>

            <!-- Form -->
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
                        <i class="bi bi-person field-icon"></i>
                        <input type="text" name="user_id" id="user_id" class="field-input"
                            placeholder="아이디를 입력하세요" onkeyup="press_it()" autofocus />
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="user_pw">비밀번호</label>
                    <div class="field-wrap">
                        <i class="bi bi-lock field-icon"></i>
                        <input type="password" name="user_pw" id="user_pw" class="field-input"
                            placeholder="비밀번호를 입력하세요" onkeyup="press_it()" />
                    </div>
                </div>

                <div class="save-row">
                    <input type="checkbox" name="saveId" id="saveId" value="Y">
                    <label for="saveId">아이디 저장</label>
                </div>

                <button type="button" onclick="loginSendit()" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> 로그인
                </button>
            </form>
        </div>

        <div class="card-footer-text">
            &copy; <?= date('Y') ?> <?= esc($siteName) ?>. All rights reserved.
        </div>
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
