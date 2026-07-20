<!DOCTYPE html>
<html lang="ko">
<head>
<?= view('inc/head', [
	'metaTitle'       => '신영로파마 | 알레르기 전문 기업',
	'metaDescription' => '신영로파마는 알레르기의 진단, 치료, 증상 관리, 일상 케어까지 환자의 여정 전체를 함께하는 알레르기 전문 기업입니다.',
	'ogImage'         => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=85',
	'preconnect'      => ['https://images.unsplash.com', 'https://videos.pexels.com'],
	'usePretendard'   => false,
	'cssFiles'        => ['main.css'],
]) ?>
  <!-- 사용 이미지: Unsplash / Source Unsplash 무료 이미지 링크 기반, 의료·알레르기·의약품·스킨케어 내용에 맞춰 재배치 -->
</head>
<body>

<style>
/* ==========================================================================
   main.css
   정리 기준:
   - 인라인 <style> 제거
   - 섹션별 CSS 가독성 정리
   - 기존 동작 유지
   - R&D sticky 스타일은 하단 최종 선언 기준
   ========================================================================== */

:root{
  --primary:#0046ff;
  --primary2:#0a8cff;
  --green:#18b67a;
  --dark:#07111f;
  --gray:#6f7785;
  --light:#f5f7fb;
  --line:#e5e8ef;
  --container:1440px;
  --radius:28px;
  --ease:cubic-bezier(.22,.61,.36,1)
}
*{
  box-sizing:border-box
}
html{
  scroll-behavior:smooth
}
body{
  margin:0;
  font-family:Pretendard,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Noto Sans KR",Arial,sans-serif;
  color:var(--dark);
  background:#fff;
  line-height:1.55;
  overflow-x:hidden
}
a{
  color:inherit;
  text-decoration:none
}
img,video{
  max-width:100%;
  display:block
}
button,input{
  font:inherit
}
.blind{
  position:absolute;
  overflow:hidden;
  clip:rect(0,0,0,0);
  width:1px;
  height:1px;
  margin:-1px
}
.only-mo{
  display:none!important
}
.container{
  width:min(var(--container),calc(100% - 80px));
  margin:0 auto
}
.skip{
  position:absolute;
  z-index:9999;
  list-style:none;
  margin:0;
  padding:0
}
.skip a{
  position:absolute;
  left:10px;
  top:-50px;
  background:#000;
  color:#fff;
  padding:12px
}
.skip a:focus{
  top:10px
}
.wrap{
  min-height:100vh
}
.section{
  position:relative;
  padding:120px 0
}
.section-box{
  display:grid;
  grid-template-columns:.8fr 1.2fr;
  gap:80px;
  align-items:start
}
.main-title-area .sub-title{
  display:block;
  font-size:16px;
  color:var(--primary);
  font-weight:800;
  letter-spacing:.06em;
  margin-bottom:18px
}
.main-title-area .title{
  font-size:clamp(38px,5vw,54px);
  line-height:1.05;
  letter-spacing:-.06em;
  margin:0 0 34px;
  font-weight:850
}
.main-title-area .title .text{
  display:block
}
.main-title-area .desc{
  font-size:22px;
  color:#4a5362;
  letter-spacing:-.04em
}
.link-animate-box{
  margin-top:28px
}
.link-animate-text{
  display:inline-flex;
  align-items:center;
  gap:12px;
  font-weight:800;
  border-bottom:2px solid currentColor;
  padding-bottom:8px
}
.link-animate-text:after{
  content:"→";
  transition:.3s
}
.link-animate-text:hover:after{
  transform:translateX(6px)
}
/* header */
.header{
  position:fixed;
  top:0;
  left:0;
  right:0;
  z-index:50;
  color:#fff;
  transition:.35s var(--ease)
}
.header.is-scrolled,.header.is-open{
  background:#fff;
  color:var(--dark);
  box-shadow:0 8px 30px rgba(0,0,0,.08)
}
.header-mask{
  position:absolute;
  inset:0;
  background:#fff;
  opacity:0;
  pointer-events:none;
  transition:.35s
}
.header.is-open .header-mask{
  opacity:1
}
.header-top{
  height:38px;
  display:flex;
  justify-content:flex-end;
  align-items:center;
  padding:0 56px;
  border-bottom:1px solid rgba(255,255,255,.15)
}
.header.is-scrolled .header-top,.header.is-open .header-top{
  border-bottom-color:var(--line)
}
.header-utility-list{
  display:flex;
  gap:24px;
  list-style:none;
  margin:0;
  padding:0;
  font-size:13px
}
.header-bottom{
  height:82px;
  height:87px;
  display:flex;
  align-items:center;
  padding:0 56px;
  position:relative
}
.logo{
  margin:0;
  min-width:190px
}
.logo-link{
  display:inline-flex;
  align-items:center;
  gap:10px;
  font-size:24px;
  font-weight:900;
  letter-spacing:-.04em
}
.logo-mark{
  width:38px;
  height:38px;
  border-radius:11px;
  background:linear-gradient(135deg,var(--primary),var(--green));
  display:inline-flex;
  align-items:center;
  justify-content:center;
  color:#fff;
}
.header-bottom-center{
  flex:1;
  display:flex;
  justify-content:center
}
.gnb-list{
  list-style:none;
  margin:0;
  padding:0;
  display:flex
}
.gnb-item{
  position:static
}
.gnb-link{
  display:flex;
  align-items:center;
  height:82px;
  padding:0 25px;
  font-size:18px;
  font-weight:750px;  
  color:#222;
}
.gnb-depth{
  position:absolute;
  left:0;
  right:0;
  top:82px;
  background:#fff;
  color:var(--dark);
  border-top:1px solid var(--line);
  box-shadow:0 1px 0px rgba(0,0,0,.1);
  opacity:0;
  visibility:hidden;
  transform:translateY(-10px);
  transition:.25s
}
.gnb-item:hover .gnb-depth{
  opacity:1;
  visibility:visible;
  transform:translateY(0)
}
.gnb-depth-wrap{
  width:min(1440px,calc(100% - 110px));
  margin:0 auto
}
.gnb-depth-inner{
  display:grid;
  grid-template-columns:290px repeat(5,1fr);
  gap:34px;
  padding:44px 0 48px
}
.depth-intro-title{
  font-size:34px;
  font-weight:750;
  display:block;
  margin-bottom:16px
}
.depth-intro-desc{
  font-size:17px;
  color:#616b7b;
}
.depth-intro-link{
  display:inline-flex;
  margin-top:24px;
  color:var(--primary);
  font-weight:800px;
}
.gnb-depth-list{
  list-style:none;
  margin:0;
  padding:0
}
.gnb-depth-item{
  margin-bottom:18px
}
.gnb-depth-link{
  font-size:16px;
  font-weight:700
}
.gnb-depth2-list,.gnb-depth2-col-list{
  list-style:none;
  margin:12px 0 0;
  padding:0
}
.gnb-depth2-item,.gnb-depth2-col-item{
  margin:8px 0;
  color:#687282;
  font-size:15px
}
.gnb-brand-list{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:8px;
  list-style:none;
  padding:0;
  margin-top:14px
}
.gnb-brand-item a{
  display:flex;
  align-items:center;
  justify-content:center;
  min-height:48px;
  background:#f7f8fb;
  border-radius:12px;
  font-weight:800;
  font-size:12px
}
.header-bottom-right{
  display:flex;
  align-items:center;
  gap:12px;
  min-width:250px;
  justify-content:flex-end
}
.header-form-search{
  height:44px;
  width:170px;
  border:1px solid rgba(255,255,255,.4);
  border-radius:999px;
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding:0 15px;
  cursor:pointer
}
.header.is-scrolled .header-form-search,.header.is-open .header-form-search{
  border-color:var(--line);
  background:#f8fafc
}
.suggestion-text{
  height:20px;
  overflow:hidden
}
.suggestion-track{
  display:block;
  animation:suggestion 10s infinite
}
.suggestion-track span{
  display:block;
  height:20px;
  font-size:14px;
  color:inherit
}
@keyframes suggestion{
  0%,12%{
    transform:translateY(0)
  }
  18%,30%{
    transform:translateY(-20px)
  }
  36%,48%{
    transform:translateY(-40px)
  }
  54%,66%{
    transform:translateY(-60px)
  }
  72%,84%{
    transform:translateY(-80px)
  }
  90%,100%{
    transform:translateY(-100px)
  }
}
.btn{
  border:0;
  background:none;
  cursor:pointer
}
.btn-language,.btn-gnb,.btn-search{
  width:44px;
  height:44px;
  border-radius:50%;
  display:inline-flex;
  align-items:center;
  justify-content:center;
  color:inherit
}
.btn-gnb{
  border:1px solid rgba(255,255,255,.45)
}
.header.is-scrolled .btn-gnb,.header.is-open .btn-gnb{
  border-color:var(--line)
}
.icon-hamburger,.icon-hamburger:before,.icon-hamburger:after{
  width:20px;
  height:2px;
  background:currentColor;
  display:block;
  content:"";
  transition:.25s
}
.icon-hamburger:before{
  transform:translateY(-7px)
}
.icon-hamburger:after{
  transform:translateY(5px)
}
/* key visual */
.key-visual{
  padding:0;
  height:100vh;
  min-height:760px;
  background:#000
}
.key-visual-inner,.swiper-key-visual,.kv-wrapper,.kv-slide{
  height:100%
}
.kv-wrapper{
  position:relative
}
.kv-slide{
  position:absolute;
  inset:0;
  opacity:0;
  visibility:hidden;
  transition:opacity .8s var(--ease),visibility .8s
}
.kv-slide.is-active{
  opacity:1;
  visibility:visible
}
.key-visual-img,.key-visual-video{
  position:absolute;
  inset:0;
  width:100%;
  height:100%;
  object-fit:cover
}
.kv-slide:after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(90deg,rgba(0,0,0,.28),rgba(255,255,255,.18),rgba(0,0,0,.18))
}
.kv-slide.is-black:after{
  background: linear-gradient(90deg, rgba(0,0,0,.22), rgba(255,255,255,.38), rgba(0,0,0,.18));
}
.key-visual-content{
  position:absolute;
  z-index:2;
  left:7vw;
  top:50%;
  transform:translateY(-50%);
  max-width:680px
}
.kv-slide.is-black .key-visual-content{
  color:#222;
}
.kv-slide.is-right .key-visual-content{
  left:auto;
  right:7vw;
  text-align:right
}
.kv-slide.is-bottom .key-visual-content{
  top:auto;
  bottom:13vh;
  transform:none
}
.kv-slide.is-top .key-visual-content{
  top:22vh;
  transform:none
}
.key-visual-content .sub-title{
  display:block;
  font-size:22px;
  font-weight:800;
  margin-bottom:22px;
  letter-spacing:-.04em
}
.key-visual-content .title{
  display:block;
  font-size:clamp(54px,7vw,92px);
  line-height:.96;
  font-weight:700;
  letter-spacing:-.075em
}
.key-visual-content .desc{
  margin-top:26px;
  font-size:20px;
  opacity:.85
}
.group-btn{
  position:absolute;
  z-index:4;
  right:60px;
  top:50%;
  display:flex;
  gap:12px
}
.btn-key-visual,.btn-intro-lab{
  width:56px;
  height:56px;
  border-radius:50%;
  border:1px solid rgba(255,255,255,.55);
  background:rgba(255,255,255,.12);
  color:#fff;
  cursor:pointer
}
.btn-key-visual:before,.btn-intro-lab:before{
  content:"→";
  font-size:24px
}
.btn-key-visual-prev:before,.btn-intro-lab-prev:before{
  content:"←"
}
.key-visual-function{
  position:absolute;
  z-index:5;
  left:7vw;
  bottom:60px;
  display:flex;
  align-items:center;
  gap:20px;
  color:#fff
}
.key-visual-progress{
  display:flex;
  align-items:center;
  gap:14px;
  font-weight:800
}
.line-progress{
  position:relative;
  width:180px;
  height:3px;
  background:rgba(255,255,255,.35);
  overflow:hidden
}
.line-progress-current{
  position:absolute;
  left:0;
  top:0;
  height:100%;
  width:0;
  background:#fff
}
.btn-control{
  width:42px;
  height:42px;
  border-radius:50%;
  border:1px solid rgba(255,255,255,.55);
  background:rgba(255,255,255,.1);
  color:#fff;
  position:relative
}
.btn-control:before{
  content:"Ⅱ";
  font-weight:900
}
.btn-control.is-play:before{
  content:"▶";
  font-size:13px
}
.scroll-down{
  position:absolute;
  right:60px;
  bottom:54px;
  z-index:5;
  color:#fff;
  font-size:12px;
  letter-spacing:.18em;
  writing-mode:vertical-rl
}
.scroll-down:after{
  content:"";
  display:block;
  width:1px;
  height:70px;
  background:#fff;
  margin:14px auto 0;
  animation:scrollLine 1.6s infinite
}
@keyframes scrollLine{
  0%{
    transform:scaleY(0);
    transform-origin:top
  }
  50%{
    transform:scaleY(1);
    transform-origin:top
  }
  51%{
    transform-origin:bottom
  }
  100%{
    transform:scaleY(0);
    transform-origin:bottom
  }
}
/* key info */
.section-key-info{
  background:#fff
}
.key-info-desc{
  font-size:22px;
  color:#414b5b;
  margin:20px 0 70px;
  letter-spacing:-.045em
}
.statistic-list{
  list-style:none;
  margin:0;
  padding:0;
  display:grid;
  grid-template-columns:repeat(2,1fr);
  gap:38px 70px
}
.statistic-title{
  display:block;
  color:#727b8a;
  font-weight:700;
  margin-bottom:10px
}
.statistic-detail{
  font-size:58px;
  line-height:1;
  font-weight:900;
  letter-spacing:-.06em
}
.statistic-detail .unit{
  font-size:24px;
  margin-left:5px;
  color:#202838
}
/* lab */
.section-lab{
  background:#f4f7fb;
  overflow:hidden
}
.lab-list{
  list-style:none;
  margin:0;
  padding:0;
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:24px
}
.lab-item-full{
  grid-column:span 2
}
.lab-link{
  position:relative;
  display:block;
  min-height:320px;
  border-radius:34px;
  overflow:hidden;
  background:#fff;
  box-shadow:0 20px 44px rgba(20,35,65,.08)
}
.lab-image{
  position:absolute;
  inset:0
}
.lab-image img{
  width:100%;
  height:100%;
  object-fit:cover;
  transition:.6s var(--ease)
}
.lab-link:after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(180deg,rgba(0,0,0,0),rgba(0,0,0,.58))
}
.lab-info{
  position:absolute;
  left:30px;
  right:30px;
  bottom:28px;
  z-index:2;
  color:#fff
}
.info-title{
  display:block;
  font-size:25px;
  font-weight:850;
  letter-spacing:-.05em
}
.info-desc{
  display:block;
  margin-top:4px;
  opacity:.9
}
.lab-info-hover{
  position:absolute;
  inset:0;
  z-index:3;
  background:linear-gradient(135deg,rgba(0,70,255,.92),rgba(24,182,122,.92));
  color:#fff;
  display:flex;
  align-items:center;
  justify-content:center;
  text-align:center;
  padding:30px;
  opacity:0;
  transition:.35s
}
.lab-link:hover .lab-info-hover{
  opacity:1
}
.lab-link:hover .lab-image img{
  transform:scale(1.08)
}
.lab-info-hover .icon{
  font-size:42px;
  display:block;
  margin-bottom:16px
}
.lab-info-hover .info-desc{
  font-size:17px;
  line-height:1.6
}
/* intro lab */
.section-intro-lab{
  background:#07111f;
  color:#fff;
  overflow:hidden
}
.section-intro-lab .main-title-area{
  display:flex;
  align-items:end;
  justify-content:space-between;
  margin-bottom:70px
}
.intro-lab-box-slide{
  position:relative;
  display:grid;
  grid-template-columns:420px 1fr;
  gap:70px;
  align-items:center
}
.swiper-intro-lab-text{
  position:relative;
  min-height:220px
}
.intro-text-slide{
  position:absolute;
  inset:0;
  opacity:0;
  transform:translateY(20px);
  transition:.5s
}
.intro-text-slide.is-active{
  opacity:1;
  transform:translateY(0)
}
.intro-lab-content .title{
  font-size:38px;
  font-weight:850
}
.intro-lab-content .desc{
  font-size:21px;
  color:#b7c2d3
}
.swiper-intro-lab-box{
  position:relative;
  min-height:560px;
  border-radius:44px;
  overflow:hidden
}
.intro-img-slide{
  position:absolute;
  inset:0;
  opacity:0;
  transition:.6s
}
.intro-img-slide.is-active{
  opacity:1
}
.intro-lab-image img{
  width:100%;
  height:560px;
  object-fit:cover
}
.swiper-intro-lab-box:after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(90deg,rgba(7,17,31,.35),rgba(7,17,31,0))
}
.swiper-intro-lab-box .group-btn{
  top:auto;
  right:34px;
  bottom:34px
}
.btn-intro-lab{
  background:rgba(255,255,255,.16)
}
/* brand */
.section-main-brand{
  background:#fff;
  overflow:hidden
}
.brand-wrap{
  width:min(1560px,calc(100% - 80px));
  margin:0 auto
}
.section-main-brand .main-title-area{
  text-align:center;
  margin-bottom:60px
}
.brand-area{
  position:relative
}
.brand-viewport{
  overflow:hidden
}
.brand-track{
  display:flex;
  gap:26px;
  transition:transform .5s var(--ease);
  will-change:transform
}
.brand-slide{
  flex:0 0 calc((100% - 78px)/4);
  min-height:420px;
  background:#f6f8fb;
  border-radius:34px;
  padding: 0 0 30px;
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:center;
  position:relative;
  overflow:hidden
}
.brand-slide:before{
  content:attr(data-num);
  position:absolute;
  left:24px;
  top:18px;
  color:#c5ccd8;
  font-weight:900;
  font-size:34px
}
.brand-img-product{
  width:72%;
  width:100%;
  height:250px;
  height:300px;
  display:flex;
  align-items:center;
  justify-content:center
}
.brand-img-product img{
  height:100%;
  width: 100%;
  object-fit: cover;
  
}
.brand-img-logo{
  font-size:30px;
  font-weight:900;
  letter-spacing:-.04em;
  margin-top:18px;
  padding: 0 30px;
}
.brand-category{
  font-size:14px;
  color:#748092;
  margin-top:8px;
  padding: 0 30px;
}
.brand-controls{
  display:flex;
  justify-content:center;
  gap:12px;
  margin-top:28px
}
.brand-btn{
  width:48px;
  height:48px;
  border-radius:50%;
  border:1px solid var(--line);
  background:#fff;
  cursor:pointer
}
.brand-btn:hover{
  background:var(--dark);
  color:#fff
}
.brand-progress{
  height:3px;
  background:#edf0f5;
  margin-top:28px
}
.brand-progress span{
  display:block;
  height:100%;
  width:0;
  background:var(--primary);
  transition:.4s
}
/* philosophy */
.section-business-philosophy{
  background:#f5f7fb
}
.philosophy-card{
  position:relative;
  min-height:560px;
  border-radius:44px;
  overflow:hidden;
  color:#fff;
  padding:70px;
  display:flex;
  align-items:end;
  background:#000
}
.philosophy-card img{
  position:absolute;
  inset:0;
  width:100%;
  height:100%;
  object-fit:cover;
  opacity:.72
}
.philosophy-card:after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(90deg,rgba(0,0,0,.72),rgba(0,0,0,.1))
}
.philosophy-content{
  position:relative;
  z-index:2;
  max-width:620px
}
.philosophy-content .eyebrow{
  font-size:17px;
  font-weight:800;
  color:#83ffd0
}
.philosophy-content h2{
  font-size:54px;
  line-height:1.05;
  letter-spacing:-.06em;
  margin:16px 0 22px
}
.philosophy-content p{
  font-size:21px;
  color:#dce5ef
}
.philosophy-list{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:18px;
  margin-top:24px
}
.philosophy-item{
  background:#fff;
  border-radius:22px;
  padding:26px;
  border:1px solid var(--line)
}
.philosophy-item strong{
  display:block;
  font-size:22px;
  margin-bottom:8px
}
.philosophy-item p{
  margin:0;
  color:#687282
}
/* news */
.section-news{
  background:#fff
}
.news-head{
  display:flex;
  justify-content:space-between;
  align-items:end;
  margin-bottom:48px
}
.news-list{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:26px
}
.news-card{
  border:1px solid var(--line);
  border-radius:30px;
  overflow:hidden;
  background:#fff;
  transition:.3s
}
.news-card:hover{
  transform:translateY(-8px);
  box-shadow:0 22px 50px rgba(20,35,65,.12)
}
.news-thumb{
  height:220px;
  overflow:hidden;
  background:#eef2f7
}
.news-thumb img{
  width:100%;
  height:100%;
  object-fit:cover;
  transition:.6s
}
.news-card:hover .news-thumb img{
  transform:scale(1.07)
}
.news-body{
  padding:28px
}
.news-type{
  display:inline-flex;
  color:var(--primary);
  font-weight:900;
  margin-bottom:12px
}
.news-title{
  font-size:24px;
  line-height:1.35;
  letter-spacing:-.04em;
  margin:0 0 18px
}
.news-date{
  color:#8a93a3;
  font-weight:700
}
/* message */
.section-message{
  background:linear-gradient(135deg,#0046ff,#09a7ff);
  color:#fff
}
.section-message .section-box{
  align-items:center
}
.message-title{
  font-size:62px;
  line-height:1.08;
  letter-spacing:-.06em;
  margin:0
}
.message-desc{
  font-size:22px;
  color:#e8f1ff
}
.message-links{
  display:flex;
  gap:14px;
  flex-wrap:wrap;
  margin-top:30px
}
.message-link{
  display:inline-flex;
  padding:16px 24px;
  border:1px solid rgba(255,255,255,.45);
  border-radius:999px;
  font-weight:800
}
.message-link:hover{
  background:#fff;
  color:var(--primary)
}
/* footer */
.footer{
  background:#07111f;
  color:#c6d0dc;
  padding:54px 0
}
.footer-inner{
  width:min(1440px,calc(100% - 80px));
  margin:0 auto
}
.footer-top{
  display:flex;
  justify-content:space-between;
  gap:40px;
  border-bottom:1px solid rgba(255,255,255,.12);
  padding-bottom:36px
}
.footer-logo{
  font-size:26px;
  font-weight:900;
  color:#fff
}
.footer-menu{
  display:flex;
  gap:22px;
  flex-wrap:wrap
}
.footer-menu a{
  color:#e8eef6;
  font-weight:750
}
.footer-bottom{
  display:flex;
  justify-content:space-between;
  gap:30px;
  padding-top:34px;
  color:#94a3b8
}
.family{
  position:relative
}
.family select{
  background:#111d2e;
  color:#fff;
  border:1px solid rgba(255,255,255,.2);
  border-radius:999px;
  padding:12px 44px 12px 18px
}
/* layer search */
.layer-search{
  position:fixed;
  inset:0;
  background:rgba(7,17,31,.88);
  z-index:100;
  display:none;
  align-items:center;
  justify-content:center;
  padding:30px
}
.layer-search.is-open{
  display:flex
}
.layer-panel{
  width:min(780px,100%);
  background:#fff;
  border-radius:34px;
  padding:44px
}
.layer-panel h2{
  font-size:38px;
  margin:0 0 22px
}
.search-row{
  display:flex;
  border-bottom:3px solid var(--dark)
}
.search-row input{
  flex:1;
  border:0;
  outline:0;
  font-size:24px;
  padding:18px 4px
}
.search-row button{
  border:0;
  background:var(--dark);
  color:#fff;
  border-radius:16px;
  padding:0 24px
}
.keyword-list{
  display:flex;
  gap:10px;
  flex-wrap:wrap;
  margin-top:24px
}
.keyword-list a{
  padding:10px 16px;
  background:#f2f5f9;
  border-radius:999px;
  font-weight:750
}
.layer-close{
  position:absolute;
  right:30px;
  top:30px;
  width:50px;
  height:50px;
  border-radius:50%;
  border:1px solid rgba(255,255,255,.35);
  color:#fff;
  background:transparent;
  font-size:24px
}
/* animation */
[data-animate]{
  opacity:0;
  transform:translateY(34px);
  transition:opacity .75s var(--ease),transform .75s var(--ease);
  transition-delay:calc(var(--i,0) * .06s)
}
.is-visible [data-animate], [data-animate].is-visible{
  opacity:1;
  transform:none
}
@media(max-width:1180px){
  .only-pc{
    display:none!important
  }
  .only-mo{
    display:block!important
  }
  .container,.brand-wrap,.footer-inner{
    width:calc(100% - 40px)
  }
  .header-top{
    display:none
  }
  .header-bottom{
    height:70px;
    padding:0 20px
  }
  .logo{
    min-width:150px;
	
  }
  .logo-link {
  display: inline-flex;
  align-items: center;
  }

  .logo-img {
    display: block;
    height: 42px;
    width: auto;
	margin-top:10px;
  }
  
  .header-bottom-center{
    position:fixed;
    inset:70px 0 0;
    background:#fff;
    color:var(--dark);
    display:none;
    overflow:auto
  }
  .header.is-open .header-bottom-center{
    display:block
  }
  .gnb-list{
    display:block;
    padding:20px
  }
  .gnb-link{
    height:auto;
    padding:20px 0;
    font-size:24px;
    border-bottom:1px solid var(--line)
  }
  .gnb-depth{
    position:static;
    opacity:1;
    visibility:visible;
    transform:none;
    box-shadow:none;
    border:0;
    display:none
  }
  .gnb-item.is-active .gnb-depth{
    display:block
  }
  .gnb-depth-wrap{
    width:100%
  }
  .gnb-depth-inner{
    display:block;
    padding:18px 0 28px
  }
  .gnb-depth-list{
    margin-bottom:22px
  }
  .header-bottom-right{
    min-width:auto
  }
  .key-visual{
    height:820px;
    min-height:640px
  }
  .key-visual-content,.kv-slide.is-right .key-visual-content{
    left:24px;
    right:24px;
    text-align:left
  }
  .key-visual-content .title{
    font-size:58px
  }
  .group-btn{
    right:20px
  }
  .key-visual-function{
    left:24px;
    bottom:34px
  }
  .scroll-down{
    display:none
  }
  .section{
    padding:82px 0
  }
  .section-box,.intro-lab-box-slide{
    grid-template-columns:1fr;
    gap:46px
  }
  .statistic-list{
    grid-template-columns:1fr;
    gap:28px
  }
  .statistic-detail{
    font-size:48px
  }
  .lab-list{
    grid-template-columns:1fr
  }
  .lab-item-full{
    grid-column:auto
  }
  .section-intro-lab .main-title-area{
    display:block
  }
  .swiper-intro-lab-box{
    min-height:420px
  }
  .intro-lab-image img{
    height:420px
  }
  .brand-slide{
    flex-basis:calc((100% - 26px)/2)
  }
  .philosophy-list,.news-list{
    grid-template-columns:1fr 1fr
  }
  .footer-top,.footer-bottom{
    display:block
  }
  .footer-menu{
    margin-top:20px
  }
  .family{
    margin-top:24px
  }
}
@media(max-width:680px){
  .header-form-search,.btn-language{
    display:none
  }
  .section{
    padding:66px 0
  }
  .main-title-area .title{
    font-size:38px
  }
  .key-visual-content .sub-title{
    font-size:17px
  }
  .key-visual-content .title{
    font-size:44px
  }
  .line-progress{
    width:110px
  }
  .key-info-desc{
    font-size:18px;
    margin-bottom:36px
  }
  .lab-link{
    min-height:280px
  }
  .brand-slide{
    flex-basis:100%;
    min-height:360px
  }
  .brand-img-product{
    height:245px;
  }
  .philosophy-card{
    min-height:520px;
    padding:36px 24px;
    border-radius:28px
  }
  .philosophy-content h2,.message-title{
    font-size:40px
  }
  .philosophy-list,.news-list{
    grid-template-columns:1fr
  }
  .news-head{
    display:block
  }
  .section-message .section-box{
    gap:26px
  }
  .footer{
    padding:38px 0
  }
  .footer-menu{
    display:block
  }
  .footer-menu a{
    display:block;
    margin:10px 0
  }
}
/* R&D section rebuilt: left text sticky, right cards scroll upward like reference */
.section-lab{
  background:#fff;
  overflow:visible;
  padding:0 0 160px;
  min-height:1850px;
}
.section-lab .container{
  width:min(1228px,calc(100% - 80px));
}
.section-lab .section-box{
  display:grid;
  grid-template-columns:290px 1fr;
  gap:56px;
  align-items:start;
  min-height:1380px;
}
.section-lab .section-col-left{
  position:sticky;
  top:170px;
  height:max-content;
  padding-top:120px;
  z-index:5;
}
.section-lab .main-title-area .sub-title{
  color:#0078ff;
  font-size:18px;
  letter-spacing:.22em;
  font-weight:900;
  margin-bottom:26px;
}
.section-lab .main-title-area .title{
  font-size:44px;
  line-height:1.08;
  font-weight:900;
  letter-spacing:-.08em;
  color:#202020;
  margin-bottom:40px;
}
.section-lab .main-title-area .desc{
  font-size:23px;
  line-height:1.75;
  font-weight:800;
  color:#2b2b2b;
  letter-spacing:-.05em;
  margin-bottom:28px;
}
.section-lab .link-animate-text{
  color:#222;
  border-bottom:2px solid #222;
  padding-bottom:8px;
  font-size:16px;
  font-weight:700;
}
.section-lab .section-col-right{
  position:relative;
  min-height:1380px;
}
.section-lab .lab-list{
  position:relative;
  display:block;
  height:1380px;
  margin:0;
  padding:0;
  list-style:none;
  margin-top:100px;
}
.section-lab .lab-item{
  position:absolute;
  display:block;
  width:386px;
  height:628px;
  grid-column:auto;
}
.section-lab .lab-item-full{
  grid-column:auto;
}
.section-lab .lab-link{
  display:block;
  width:100%;
  height:100%;
  min-height:0;
  border-radius:0;
  background:#f5f7fb;
  overflow:hidden;
  box-shadow:none;
}
.section-lab .lab-image{
  position:absolute;
  inset:0;
  display:block;
}
.section-lab .lab-image img{
  width:100%;
  height:100%;
  object-fit:cover;
  filter:saturate(.9);
  transition:transform .9s var(--ease),filter .5s var(--ease);
}
.section-lab .lab-link:after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(180deg,rgba(255,255,255,.18) 0%,rgba(255,255,255,.18) 45%,rgba(0,0,0,.38) 100%);
  z-index:1;
}
.section-lab .lab-info{
  position:absolute;
  left:40px;
  right:40px;
  bottom:36px;
  z-index:2;
  color:#fff;
  text-shadow:0 3px 14px rgba(0,0,0,.18);
}
.section-lab .lab-info .info-title{
  font-size:22px;
  font-weight:900;
  letter-spacing:-.05em;
}
.section-lab .lab-info .info-desc{
  font-size:17px;
  margin-top:8px;
  font-weight:500;
  opacity:.95;
}
.section-lab .lab-info-hover{
  display:none!important;
}
.section-lab .lab-link:hover .lab-image img{
  transform:scale(1.045);
  filter:saturate(1.02);
}
.section-lab .lab-item:nth-child(1){
  left:0;
  top:-110px;
}
.section-lab .lab-item:nth-child(2){
  right:0;
  top:170px;
  width:386px;
  height:468px;
}
.section-lab .lab-item:nth-child(3){
  left:120px;
  top:650px;
  width:520px;
  height:360px;
}
.section-lab .lab-item:nth-child(4){
  right:70px;
  top:830px;
  width:330px;
  height:420px;
}
.section-lab .lab-item:nth-child(5){
  left:0;
  top:1120px;
  width:360px;
  height:430px;
}
.section-lab .lab-item:nth-child(6){
  right:0;
  top:1280px;
  width:390px;
  height:390px;
}
@media(max-width:1180px){
  .section-lab{
    padding:80px 0;
    min-height:auto;
    overflow:hidden;
  }
  .section-lab .container{
    width:calc(100% - 40px);
  }
  .section-lab .section-box{
    display:block;
    min-height:auto;
  }
  .section-lab .section-col-left{
    position:relative;
    top:auto;
    padding-top:0;
    margin-bottom:44px;
  }
  .section-lab .main-title-area .title{
    font-size:42px;
  }
  .section-lab .main-title-area .desc{
    font-size:19px;
  }
  .section-lab .section-col-right{
    min-height:auto;
  }
  .section-lab .lab-list{
    display:grid;
    grid-template-columns:1fr;
    gap:18px;
    height:auto;
  }
  .section-lab .lab-item,.section-lab .lab-item:nth-child(n){
    position:relative;
    left:auto;
    right:auto;
    top:auto;
    width:100%;
    height:320px;
  }
}


/* support section 가운데 정렬 */
.section-message .message-center {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

  text-align: center;
  gap: 28px;
}

.section-message .message-title {
  text-align: center;
}

.section-message .message-desc {
  max-width: 720px;
  margin: 0 auto;
  text-align: center;
}

.section-message .message-links {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;

  gap: 12px;
  margin-top: 28px;
}

/* 모바일 */
@media (max-width: 768px) {
  .section-message .message-center {
    gap: 20px;
  }

  .section-message .message-links {
    flex-direction: column;
    width: 100%;
  }

  .section-message .message-link {
    width: 100%;
    max-width: 320px;
    text-align: center;
  }
}

</style>

  <div class="wrap">
    <!-- [D] HEADER -->
    <?= view('inc/header', ['isHome' => true]) ?>
    <!-- //[D] HEADER -->

    <!-- [D] CONTENTS -->
    <main id="content" class="content page-home js-page-home">
      <div class="main-content">
        <div class="section key-visual">
          <div class="key-visual-inner">
            <div class="swiper swiper-key-visual">
              <div class="kv-wrapper">
                <div class="kv-slide is-active">
                  <video class="key-visual-video" autoplay muted loop playsinline poster="/images/v_main1.webp">
				  <source src="https://videos.pexels.com/video-files/5453622/5453622-hd_1920_1080_25fps.mp4" type="video/mp4"></video>
                  <div class="key-visual-content"><span class="sub-title">
					<span class="text">알레르기, 진단부터 치료와 케어까지</span></span>
					<span class="title"><span class="text">Allergy Care<br>Journey Partner</span></span>
					<p class="desc">신영로파마는 알레르기의 진단, 원인 치료, 증상 관리, 일상 케어까지 환자의 여정 전체를 함께합니다.</p>
				  </div>
                </div>
				
                <div class="kv-slide is-black is-top is-right is-text-right">
					<img src="https://images.unsplash.com/photo-1582719471384-894fbb16e074?auto=format&fit=crop&w=1920&q=85" alt="알레르기 연구와 진단 이미지" class="key-visual-img">
					<div class="key-visual-content"><span class="sub-title"><span class="text">정확한 진단에서 시작되는 치료</span></span>
						<span class="title"><span class="text">Diagnosis<br>to Treatment</span></span>
						<p class="desc">라이스정과 피부단자시험 시약으로 의료진의 진료 판단을 지원합니다.</p>
					</div>
				</div>
				
                <div class="kv-slide is-bottom">
					<img src="/images/v_main2.webp" alt="의약품과 의료기기 이미지" class="key-visual-img">
						<div class="key-visual-content"><span class="sub-title">의약품 · 의료기기 · 스킨케어</span><span class="title">One Expertise<br>Three Areas</span>
						<p class="desc">환자의 삶 전반을 고려한 포트폴리오를 운영합니다.</p>
					</div>
				</div>
                <div class="kv-slide is-black"><img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1920&q=85" alt="환자의 일상 케어 이미지" class="key-visual-img"><div class="key-visual-content"><span class="sub-title">진료실 안과 밖을 잇는 전문성</span><span class="title">Care<br>Beyond Clinic</span><p class="desc">의료진에게는 신뢰할 수 있는 파트너로, 환자에게는 더 나은 일상을 돕는 브랜드로 성장합니다.</p></div></div>
              </div>
              <div class="group-btn"><button type="button" class="btn-key-visual btn-key-visual-prev" aria-label="이전 슬라이드"></button><button type="button" class="btn-key-visual btn-key-visual-next" aria-label="다음 슬라이드"></button></div>
              <div class="key-visual-function"><div class="key-visual-progress"><span class="current">01</span><span class="line-progress"><span class="line-progress-current"></span></span><span class="total">04</span></div><button type="button" class="btn-control is-pause js-btn-control-kv" aria-label="Pause"><span class="blind">pause</span></button></div>
              <span class="scroll-down">SCROLL</span>
            </div>
          </div>
        </div>

        
		<!-- 주요현황 -->
		<section id="info" class="section section-key-info">
		  <div class="container">
			<div class="section-box">

			  <div class="main-title-area">
				<strong class="sub-title">
				  <span class="text" data-animate="slideInUp">주요현황</span>
				</strong>

				<h2 class="title">
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:1">알레르기 환자의</span>
				  </span>
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:2">여정 전체를</span>
				  </span>
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:3">함께합니다.</span>
				  </span>
				</h2>

				<div class="link-animate-box" data-animate="fadeInUp" style="--i:4">
				  <a class="link-animate-text" href="#medical">의료진 지원</a>
				</div>
			  </div>

			  <div class="section-col-right">
				<p class="key-info-desc" data-animate="fadeInUp" style="--i:2.5">
				  신영로파마는 2011년 설립 이후 알레르기 한 분야에 집중해온 전문 기업입니다.<br>
				  진단과 치료를 넘어 증상 관리와 일상 케어까지 이어지는 제품과 정보를 제공합니다.
				</p>

				<ul class="statistic-list">
				  <li class="statistic-item" data-animate="fadeInUp" style="--i:5">
					<span class="statistic-title">Lofarma S.p.A 창립</span>
					<strong class="statistic-detail">
					  <span class="count" data-count="1945">0</span>
					  <span class="unit">년</span>
					</strong>
				  </li>

				  <li class="statistic-item" data-animate="fadeInUp" style="--i:5">
					<span class="statistic-title">신영로파마 설립</span>
					<strong class="statistic-detail">
					  <span class="count" data-count="2011">0</span>
					  <span class="unit">년</span>
					</strong>
				  </li>

				  <li class="statistic-item" data-animate="fadeInUp" style="--i:6">
					<span class="statistic-title">전국 협력 의원·클리닉</span>
					<strong class="statistic-detail">
					  <span class="count" data-count="2000">0</span>
					  <span class="unit">+</span>
					</strong>
				  </li>

				  <li class="statistic-item" data-animate="fadeInUp" style="--i:6">
					<span class="statistic-title">알레르기 진단 항원 라인업</span>
					<strong class="statistic-detail">
					  <span class="count" data-count="100">0</span>
					  <span class="unit">+</span>
					</strong>
				  </li>

				 
				</ul>
			  </div>

			</div>
		  </div>
		</section>


		<!-- 제품소개 -->
		<section id="products" class="section section-lab js-section-lab">
		  <div class="container">
			<div class="section-box">

			  <div class="section-col-left">
				<div class="main-title-area">
				  <strong class="sub-title">
					<span class="text" data-animate="slideInUp">제품소개</span>
				  </strong>

				  <h2 class="title">
					<span class="text">
					  <span class="text" data-animate="slideInUp" style="--i:1">알레르기 진료와</span>
					</span>
					<span class="text">
					  <span class="text" data-animate="slideInUp" style="--i:2">관리 전반을 지원합니다</span>
					</span>
				  </h2>

				  <p class="desc" data-animate="fadeInUp" style="--i:2">
					라이스정, 알레르기 피부단자시험 시약, EARVENT를 중심으로<br>
					진단·치료·생활 관리를 연결합니다.
				  </p>

				  <div class="link-animate-box" data-animate="fadeInUp" style="--i:3">
					<a class="link-animate-text" href="#medical">자료 요청하기</a>
				  </div>
				</div>
			  </div>

			  <div class="section-col-right">
				<ul class="lab-list">

				  <li class="lab-item js-lab-item">
					<a class="lab-link" href="#products">
					  <span class="lab-image">
						<img
						  src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=900&q=85"
						  alt="라이스정"
						>
					  </span>

					  <div class="lab-info">
						<strong class="info-title">라이스정</strong>
						<span class="info-desc">설하면역치료 기반 치료 옵션</span>
					  </div>

					  <div class="lab-info-hover only-pc">
						<div class="info">
						  <i class="icon">◎</i>
						  <strong class="info-title">라이스정</strong>
						  <p class="info-desc">
							초기치료부터 유지치료까지 의료진의 판단에 따른 치료 여정을 지원합니다.
						  </p>
						</div>
					  </div>
					</a>
				  </li>

				  <li class="lab-item js-lab-item">
					<a class="lab-link" href="#products">
					  <span class="lab-image">
						<img
						  src="https://images.unsplash.com/photo-1576086213369-97a306d36557?auto=format&fit=crop&w=900&q=85"
						  alt="알레르기 피부단자시험 시약"
						>
					  </span>

					  <div class="lab-info">
						<strong class="info-title">피부단자시험 시약</strong>
						<span class="info-desc">Allergy Skin Prick Test</span>
					  </div>

					  <div class="lab-info-hover only-pc">
						<div class="info">
						  <i class="icon">✦</i>
						  <strong class="info-title">정확한 진단 지원</strong>
						  <p class="info-desc">
							다양한 항원 라인업으로 폭넓은 알레르기 원인 검사를 지원합니다.
						  </p>
						</div>
					  </div>
					</a>
				  </li>

				  <li class="lab-item lab-item-full js-lab-item">
					<a class="lab-link" href="#products">
					  <span class="lab-image">
						<img src="/images/earvent.webp" alt="EARVENT">
					  </span>

					  <div class="lab-info">
						<strong class="info-title">EARVENT</strong>
						<span class="info-desc">이관 기능 개선 의료용 고무풍선</span>
					  </div>

					  <div class="lab-info-hover only-pc">
						<div class="info">
						  <i class="icon">◆</i>
						  <strong class="info-title">EARVENT</strong>
						  <p class="info-desc">
							중이 환기와 이관 기능 훈련에 사용되는 관리 솔루션입니다.
						  </p>
						</div>
					  </div>
					</a>
				  </li>

				  <li class="lab-item js-lab-item">
					<a class="lab-link" href="#business">
					  <span class="lab-image">
						<img src="/images/ibion.jpg" alt="ibion">
					  </span>

					  <div class="lab-info">
						<strong class="info-title">ibion</strong>
						<span class="info-desc">의료기기 브랜드</span>
					  </div>

					  <div class="lab-info-hover only-pc">
						<div class="info">
						  <i class="icon">◇</i>
						  <strong class="info-title">이비온</strong>
						  <p class="info-desc">
							알레르기 환자의 증상 관리와 생활 편의를 돕는 의료기기 브랜드입니다.
						  </p>
						</div>
					  </div>
					</a>
				  </li>

				  <li class="lab-item js-lab-item">
					<a class="lab-link" href="#business">
					  <span class="lab-image">
						<img
						  src="/images/ruvair.jpg"
						  alt="ruvair"
						>
					  </span>

					  <div class="lab-info">
						<strong class="info-title">ruvair</strong>
						<span class="info-desc">민감 피부 일상 케어</span>
					  </div>

					  <div class="lab-info-hover only-pc">
						<div class="info">
						  <i class="icon">●</i>
						  <strong class="info-title">루베어</strong>
						  <p class="info-desc">
							알레르기와 민감 피부에 대한 이해를 바탕으로 일상 속 피부 케어를 제안합니다.
						  </p>
						</div>
					  </div>
					</a>
				  </li>

				  <li class="lab-item js-lab-item">
					<a class="lab-link" href="#medical">
					  <span class="lab-image">
						<img
						  src="/images/data.webp" alt="의료진 자료"
						>
					  </span>

					  <div class="lab-info">
						<strong class="info-title">의료진 자료</strong>
						<span class="info-desc">자료실 · 샘플 · 방문 신청</span>
					  </div>

					  <div class="lab-info-hover only-pc">
						<div class="info">
						  <i class="icon">♧</i>
						  <strong class="info-title">진료 지원</strong>
						  <p class="info-desc">
							처방 정보, 항원 리스트, 학술자료, 상담 요청을 연결합니다.
						  </p>
						</div>
					  </div>
					</a>
				  </li>

				</ul>
			  </div>

			</div>
		  </div>
		</section>


		<!-- 회사소개 -->
		<section id="company" class="section section-intro-lab">
		  <div class="container">

			<div class="main-title-area">
			  <div>
				<strong class="sub-title">
				  <span class="text" data-animate="slideInUp">회사소개</span>
				</strong>

				<h2 class="title">
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:1">알레르기 한 분야에</span>
				  </span>
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:2">집중해온 전문 기업</span>
				  </span>
				</h2>
			  </div>

			  <div class="link-animate-box" data-animate="fadeInUp" style="--i:3">
				<a class="link-animate-text" href="#support">문의하기</a>
			  </div>
			</div>

			<div class="intro-lab-box-slide">

			  <div class="swiper-intro-lab-text">
				<div class="intro-text-slide is-active">
				  <div class="intro-lab-content">
					<strong class="title">대표 인사말</strong>
					<p class="desc">
					  신영로파마는 국내 진료 현장에 필요한 알레르기 진단 시약과 면역치료제를 안정적으로
					  공급하는 것에서 출발했습니다. 앞으로도 의료진에게는 신뢰할 수 있는 파트너로,
					  환자에게는 더 나은 일상을 돕는 브랜드로 남겠습니다.
					</p>
				  </div>
				</div>

				<div class="intro-text-slide">
				  <div class="intro-lab-content">
					<strong class="title">회사 스토리</strong>
					<p class="desc">
					  2011년 설립 이래 이탈리아 Lofarma S.p.A와의 협력을 바탕으로
					  알레르기 진단 시약과 설하면역치료제를 국내 진료 현장에 공급해 왔습니다.
					</p>
				  </div>
				</div>

				<div class="intro-text-slide">
				  <div class="intro-lab-content">
					<strong class="title">비전</strong>
					<p class="desc">
					  정확한 진단, 원인 치료, 증상 관리, 일상 케어.
					  신영로파마는 진료실 안과 밖을 잇는 알레르기 전문 기업으로 성장하겠습니다.
					</p>
				  </div>
				</div>
			  </div>

			  <div class="swiper-intro-lab-box">
				<div class="intro-img-slide is-active">
				  <span class="intro-lab-image">
					<img
					  src="/images/s4_img1.webp"
					  alt="대표 인사말"
					>
				  </span>
				</div>

				<div class="intro-img-slide">
				  <span class="intro-lab-image">
					<img
					  src="/images/s4_img2.webp"
					  alt="회사 스토리"
					>
				  </span>
				</div>

				<div class="intro-img-slide">
				  <span class="intro-lab-image">
					<img
					  src="/images/s4_img3.webp"
					  alt="비전"
					>
				  </span>
				</div>

				<div class="group-btn">
				  <button class="btn-intro-lab btn-intro-lab-prev" type="button" aria-label="이전"></button>
				  <button class="btn-intro-lab btn-intro-lab-next" type="button" aria-label="다음"></button>
				</div>
			  </div>

			</div>
		  </div>
		</section>


		<!-- 사업영역 -->
		<section id="business" class="section section-main-brand js-section-main-brand">
		  <div class="brand-wrap">

			<div class="main-title-area">
			  <strong class="sub-title">
				<span class="text" data-animate="slideInUp">사업영역</span>
			  </strong>

			  <h2 class="title">
				<span class="text">
				  <span class="text" data-animate="slideInUp" style="--i:1">하나의 전문성,</span>
				</span>
				<span class="text">
				  <span class="text" data-animate="slideInUp" style="--i:2">세 가지 영역</span>
				</span>
			  </h2>

			  <p class="desc" data-animate="fadeInUp" style="--i:3">
				알레르기 환자의 하루는 진료실에서 끝나지 않습니다. 신영로파마는 의약품, 의료기기, <br class="only_web">
				스킨케어를 통해 환자의 삶 전반을 고려한 포트폴리오를 운영합니다.
			  </p>

			  <div class="link-animate-box" data-animate="fadeInUp" style="--i:4">
				<a href="#products" class="link-animate-text">제품 보기</a>
			  </div>
			</div>

			<div class="brand-area">
			  <div class="brand-viewport">
				<div class="brand-track">

				  <div class="brand-slide" data-num="01">
					<div class="brand-img-product">
					  <img
						src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=85"
						alt="의약품"
					  >
					</div>
					<div class="brand-img-logo">의약품</div>
					<div class="brand-category">라이스정 · 피부단자시험 시약</div>
				  </div>

				  <div class="brand-slide" data-num="02">
					<div class="brand-img-product">
					  <img
						src="https://images.unsplash.com/photo-1582719471384-894fbb16e074?auto=format&fit=crop&w=600&q=85"
						alt="진단과 치료"
					  >
					</div>
					<div class="brand-img-logo">진단과 치료</div>
					<div class="brand-category">알레르기 원인 확인과 치료 판단 지원</div>
				  </div>

				  <div class="brand-slide" data-num="03">
					<div class="brand-img-product">
					  <img
						src="https://source.unsplash.com/600x600/?clinic,medical-device"
						alt="의료기기" onerror="this.onerror=null; this.src='/images/no-image.png';"
					  >
					</div>
					<div class="brand-img-logo">의료기기</div>
					<div class="brand-category">EARVENT · ibion</div>
				  </div>

				  <div class="brand-slide" data-num="04">
					<div class="brand-img-product">
					  <img
						src="https://images.unsplash.com/photo-1556228720-195a672e8a03?auto=format&fit=crop&w=600&q=85"
						alt="스킨케어"
					  >
					</div>
					<div class="brand-img-logo">스킨케어</div>
					<div class="brand-category">ruvair 민감 피부 케어</div>
				  </div>

				  <div class="brand-slide" data-num="05">
					<div class="brand-img-product">
					  <img
						src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=600&q=85"
						alt="환자 여정"
					  >
					</div>
					<div class="brand-img-logo">환자 여정</div>
					<div class="brand-category">진료실 안과 밖을 잇는 케어</div>
				  </div>

				  <div class="brand-slide" data-num="06">
					<div class="brand-img-product">
					  <img
						src="https://images.unsplash.com/photo-1511174511562-5f97f4f4e799?auto=format&fit=crop&w=600&q=85"
						alt="의료진 지원" onerror="this.onerror=null; this.src='/images/no-image.png';"
					  >
					</div>
					<div class="brand-img-logo">의료진 지원</div>
					<div class="brand-category">자료실 · 샘플 · MR 방문 신청</div>
				  </div>

				</div>
			  </div>

			  <div class="brand-controls">
				<button class="brand-btn brand-prev" type="button" aria-label="이전">←</button>
				<button class="brand-btn brand-next" type="button" aria-label="다음">→</button>
			  </div>

			  <div class="brand-progress">
				<span></span>
			  </div>
			</div>

		  </div>
		</section>


		<!-- Lofarma 파트너십 -->
		<section id="lofarma" class="section section-business-philosophy">
		  <div class="container">

			<div class="philosophy-card">
			  <img
				src="/images/s6_img1.webp" alt="Lofarma 파트너십 이미지">

			  <div class="philosophy-content">
				<span class="eyebrow">Lofarma S.p.A Partnership</span>
				<h2>
				  1945년부터 이어온<br>
				  알레르기 전문성
				</h2>
				<p>
				  Lofarma S.p.A는 알레르기 진단과 면역치료 분야에 집중해온
				  이탈리아의 알레르기 전문 기업입니다. 신영로파마는 Lofarma S.p.A와의
				  협력을 바탕으로 국내 진료 현장에 필요한 제품과 정보를 제공합니다.
				</p>
				<a href="#medical" class="link-animate-text">의료진 지원</a>
			  </div>
			</div>

			<div class="philosophy-list">
			  <div class="philosophy-item">
				<strong>2011</strong>
				<p>주식회사 신영로파마 설립</p>
			  </div>

			  <div class="philosophy-item">
				<strong>Lofarma</strong>
				<p>이탈리아 알레르기 전문 기업과 파트너십</p>
			  </div>

			  <div class="philosophy-item">
				<strong>라이스정</strong>
				<p>설하면역치료 기반 치료 옵션 공급</p>
			  </div>

			  <div class="philosophy-item">
				<strong>확장</strong>
				<p>의료기기와 스킨케어까지 포트폴리오 확대</p>
			  </div>
			</div>

		  </div>
		</section>


		<!-- 의료진 지원 -->
		<section id="medical" class="section section-news">
		  <div class="container">

			<div class="news-head">
			  <div class="main-title-area">
				<strong class="sub-title">
				  <span class="text" data-animate="slideInUp">의료진 지원</span>
				</strong>

				<h2 class="title">
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:1">진료에 필요한 자료를</span>
				  </span>
				  <span class="text">
					<span class="text" data-animate="slideInUp" style="--i:2">한 곳에 모았습니다</span>
				  </span>
				</h2>

				<p class="desc" data-animate="fadeInUp" style="--i:3">
				  라이스정 관련 자료, 진단시약 정보, 의료기기 자료, 임상연구 현황,
				  샘플 및 상담 요청까지 신영로파마는 전국의 알레르기 진료 현장을 가까이에서 지원합니다.
				</p>
			  </div>

			  <a href="#support" class="link-animate-text">상담 요청</a>
			</div>

			<div class="news-list">

			  <article class="news-card">
				<a href="#medical">
				  <div class="news-thumb">
					<img
					  src="/images/s7_img1.webp"
					  alt="라이스정 자료"
					>
				  </div>

				  <div class="news-body">
					<span class="news-type">자료실</span>
					<h3 class="news-title">라이스정 자료 및 의료진용 상세 정보</h3>
					<span class="news-date">전문의약품 자료는 의료진 인증 구조 검토 권장</span>
				  </div>
				</a>
			  </article>

			  <article class="news-card">
				<a href="#medical">
				  <div class="news-thumb">
					<img
					  src="https://images.unsplash.com/photo-1576086213369-97a306d36557?auto=format&fit=crop&w=800&q=85"
					  alt="진단시약 자료"
					>
				  </div>

				  <div class="news-body">
					<span class="news-type">항원 리스트</span>
					<h3 class="news-title">피부단자시험 시약 공급 가능 항원 리스트</h3>
					<span class="news-date">흡입 항원 · 식품 항원 문의</span>
				  </div>
				</a>
			  </article>

			  <article class="news-card">
				<a href="#medical">
				  <div class="news-thumb">
					<img
					  src="https://images.unsplash.com/photo-1573497491208-6b1acb260507?auto=format&fit=crop&w=800&q=85"
					  alt="샘플 MR 방문 신청"
					>
				  </div>

				  <div class="news-body">
					<span class="news-type">신청</span>
					<h3 class="news-title">샘플·MR 방문 신청 및 제품 상담 접수</h3>
					<span class="news-date">병원명 · 진료과 · 요청사항 입력</span>
				  </div>
				</a>
			  </article>

			</div>

		  </div>
		</section>


        <section id="mall" class="section section-business-philosophy">
          <div class="container"><div class="philosophy-card"><img src="/images/mall.webp" alt="병원전문 쇼핑몰"><div class="philosophy-content"><span class="eyebrow">Hospital Professional Mall</span><h2>병원전문 쇼핑몰은<br>기존 구조 그대로 유지합니다</h2><p>의료진과 병원 고객을 위한 전용 구매·문의 동선을 별도 메뉴로 유지하여 기존 이용자의 접근성을 보호합니다.</p><a href="#support" class="link-animate-text">쇼핑몰 문의</a></div></div></div>
        </section>
		
		<section id="support" class="section section-message">
		  <div class="container">
			<div class="section-box message-center">
			  <div>
				<h2 class="message-title">
				  알레르기 환자의 여정을<br>
				  함께 설계합니다.
				</h2>
			  </div>

			  <div>
				<p class="message-desc">
				  제품 문의, 의료진 자료 요청, 샘플·MR 방문 신청, 패밀리 사이트 문의를 빠르게 연결해드립니다.
				</p>

				<div class="message-links">
				  <a href="mailto:lofarma@lofarma.kr" class="message-link">이메일 문의</a>
				  <a href="tel:02-900-0436" class="message-link">02-900-0436</a>
				  <a href="#products" class="message-link">제품 보기</a>
				</div>
			  </div>
			</div>
		  </div>
		</section>

      </div>
    </main>
    <!-- //[D] CONTENTS -->

    <footer class="footer">
      <div class="footer-inner"><div class="footer-top"><div><div class="footer-logo">신영로파마</div><p>알레르기 환자의 여정을 함께 설계합니다 — 신영로파마</p></div><nav class="footer-menu"><a href="#company">회사소개 123</a><a href="#products">제품</a><a href="#business">사업영역</a><a href="#medical">의료진 지원</a><a href="#mall">병원전문 쇼핑몰</a><a href="#support">고객지원</a></nav></div><div class="footer-bottom"><div><p>서울시 도봉구 도봉로 156길 17-5 | 대표번호 02-900-0436 | 이메일 lofarma@lofarma.kr</p><p>Copyright © Shinyoung Lofarma. All Rights Reserved.</p><p><a href="#">개인정보처리방침</a></p></div><div class="family"><select aria-label="Family Site"><option>Family Site</option><option>병원전문쇼핑몰</option><option>이비온</option><option>루베어</option></select></div></div></div>
    </footer>
  </div>

  <div id="js-layer-search" class="layer-search" aria-hidden="true"><button type="button" class="layer-close js-close-layer">×</button><div class="layer-panel"><h2>제품 통합 검색</h2><div class="search-row"><input type="search" placeholder="검색어를 입력하세요"><button type="button">검색</button></div><div class="keyword-list"><a href="#">라이스정</a><a href="#">피부단자시험</a><a href="#">EARVENT</a><a href="#">ibion</a><a href="#">ruvair</a></div></div></div>

  <script>
    document.addEventListener('DOMContentLoaded', function(){
      const header=document.querySelector('.header');
      const gnbBtn=document.querySelector('.js-btn-gnb');
      const gnbLinks=document.querySelectorAll('.gnb-link.no-link');
      const searchBtns=document.querySelectorAll('.js-open-layer-search');
      const layer=document.getElementById('js-layer-search');
      const closeLayer=document.querySelector('.js-close-layer');
      const formatNum=(n)=>String(n).padStart(2,'0');

      function onScroll(){ header.classList.toggle('is-scrolled', window.scrollY>30); }
      window.addEventListener('scroll',onScroll); onScroll();
      gnbBtn.addEventListener('click',()=>header.classList.toggle('is-open'));
      gnbLinks.forEach(a=>a.addEventListener('click',function(e){ if(innerWidth<=1180){e.preventDefault();this.closest('.gnb-item').classList.toggle('is-active')}}));
      searchBtns.forEach(btn=>btn.addEventListener('click',()=>{layer.classList.add('is-open');layer.setAttribute('aria-hidden','false');}));
      closeLayer.addEventListener('click',()=>{layer.classList.remove('is-open');layer.setAttribute('aria-hidden','true');});
      layer.addEventListener('click',e=>{if(e.target===layer) closeLayer.click();});

      // Main visual slider: auto, progress, pause/play, prev/next, video background support
      const slides=[...document.querySelectorAll('.kv-slide')];
      const current=document.querySelector('.key-visual-progress .current');
      const total=document.querySelector('.key-visual-progress .total');
      const bar=document.querySelector('.line-progress-current');
      const prev=document.querySelector('.btn-key-visual-prev');
      const next=document.querySelector('.btn-key-visual-next');
      const control=document.querySelector('.js-btn-control-kv');
      let kvIndex=0, kvStart=Date.now(), paused=false, duration=5500;
      total.textContent=formatNum(slides.length);
      function showKv(i){slides[kvIndex].classList.remove('is-active');kvIndex=(i+slides.length)%slides.length;slides[kvIndex].classList.add('is-active');current.textContent=formatNum(kvIndex+1);kvStart=Date.now();bar.style.width='0%';}
      function tick(){ if(!paused){ const p=Math.min((Date.now()-kvStart)/duration,1); bar.style.width=(p*100)+'%'; if(p>=1) showKv(kvIndex+1);} requestAnimationFrame(tick); }
      prev.addEventListener('click',()=>showKv(kvIndex-1)); next.addEventListener('click',()=>showKv(kvIndex+1));
      control.addEventListener('click',()=>{paused=!paused;control.classList.toggle('is-play',paused);control.setAttribute('aria-label',paused?'Play':'Pause'); if(!paused) kvStart=Date.now()-parseFloat(bar.style.width||0)/100*duration;});
      tick();

      // Intro lab linked text/image slider
      const introTexts=[...document.querySelectorAll('.intro-text-slide')];
      const introImgs=[...document.querySelectorAll('.intro-img-slide')];
      let introIndex=0;
      function showIntro(i){introTexts[introIndex].classList.remove('is-active');introImgs[introIndex].classList.remove('is-active');introIndex=(i+introTexts.length)%introTexts.length;introTexts[introIndex].classList.add('is-active');introImgs[introIndex].classList.add('is-active');}
      document.querySelector('.btn-intro-lab-prev').addEventListener('click',()=>showIntro(introIndex-1));
      document.querySelector('.btn-intro-lab-next').addEventListener('click',()=>showIntro(introIndex+1));
      setInterval(()=>showIntro(introIndex+1),4500);

      // Brand carousel
      const track=document.querySelector('.brand-track');
      const brandSlides=[...document.querySelectorAll('.brand-slide')];
      const brandProgress=document.querySelector('.brand-progress span');
      let brandIndex=0;
      function perView(){return innerWidth<=680?1:innerWidth<=1180?2:4}
      function updateBrand(){const pv=perView();const max=Math.max(brandSlides.length-pv,0);brandIndex=Math.min(Math.max(brandIndex,0),max);const slideW=brandSlides[0].getBoundingClientRect().width+26;track.style.transform=`translateX(${-brandIndex*slideW}px)`;brandProgress.style.width=((brandIndex+pv)/brandSlides.length*100)+'%';}
      document.querySelector('.brand-prev').addEventListener('click',()=>{brandIndex--;updateBrand();});
      document.querySelector('.brand-next').addEventListener('click',()=>{brandIndex++; if(brandIndex>brandSlides.length-perView()) brandIndex=0; updateBrand();});
      window.addEventListener('resize',updateBrand); updateBrand(); setInterval(()=>{brandIndex++; if(brandIndex>brandSlides.length-perView()) brandIndex=0; updateBrand();},3500);
	//   window.addEventListener('resize',updateBrand); updateBrand();

      // Reveal animation and number count
      const counted=new WeakSet();
      function countUp(el){const target=parseFloat(el.dataset.count);const decimal=String(el.dataset.count).includes('.');let start=null;function step(ts){if(!start)start=ts;const p=Math.min((ts-start)/1200,1);const val=target*p;el.textContent=decimal?val.toFixed(1):Math.floor(val).toLocaleString('ko-KR');if(p<1)requestAnimationFrame(step);}requestAnimationFrame(step)}
      const io=new IntersectionObserver(entries=>{entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add('is-visible');entry.target.querySelectorAll('[data-animate]').forEach(x=>x.classList.add('is-visible'));entry.target.querySelectorAll('.count').forEach(c=>{if(!counted.has(c)){counted.add(c);countUp(c)}})}})},{threshold:.18});
      document.querySelectorAll('.section,.statistic-list').forEach(el=>io.observe(el));
    });
  </script>
</body>
</html>
