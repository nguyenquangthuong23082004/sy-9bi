<?php
/**
 * 공용 <head> - 전 페이지 공용
 *
 * 파라미터 (모두 선택)
 *  - $metaTitle       : <title>
 *  - $metaDescription : meta description
 *  - $metaKeywords    : meta keywords
 *  - $ogImage         : og:image URL
 *  - $cssFiles        : 로드할 CSS 배열 (public 기준 상대경로). 예: ['css/product/product.css']
 *  - $usePretendard   : true 이면 Pretendard 웹폰트 CDN 로드 (기본 true)
 *  - $preconnect      : 추가 preconnect 도메인 배열
 *  - $jsonLd          : JSON-LD 배열 (schema.org)
 *  - $headExtra       : head 마지막에 그대로 출력할 추가 마크업
 */
$syTitle       = $metaTitle       ?? '신영로파마 | 알레르기 전문 기업';
$syDesc        = $metaDescription ?? '신영로파마는 알레르기의 진단, 치료, 증상 관리, 일상 케어까지 환자의 여정 전체를 함께하는 알레르기 전문 기업입니다.';
$syKeywords    = $metaKeywords    ?? '신영로파마, 로파마, Lofarma, 알레르기, 라이스정, 피부단자시험, EARVENT, 이비온, 루베어';
$syCss         = $cssFiles        ?? [];
$syPretendard  = $usePretendard   ?? true;
$syPreconnect  = $preconnect      ?? [];
$syAssetVer    = $assetVersion    ?? '1.0.0';
?>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="format-detection" content="telephone=no" />

<title><?= esc($syTitle) ?></title>
<meta name="description" content="<?= esc($syDesc) ?>" />
<meta name="keywords" content="<?= esc($syKeywords) ?>" />

<meta property="og:title" content="<?= esc($syTitle) ?>" />
<meta property="og:description" content="<?= esc($syDesc) ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?= current_url() ?>" />
<?php if (!empty($ogImage)): ?>
	<meta property="og:image" content="<?= esc($ogImage, 'attr') ?>" />
<?php endif; ?>

<?php foreach ($syPreconnect as $syHost): ?>
	<link rel="preconnect" href="<?= esc($syHost, 'attr') ?>" />
<?php endforeach; ?>

<?php if ($syPretendard): ?>
	<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin />
	<link rel="stylesheet" as="style" crossorigin
		href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/static/pretendard.css" />
<?php endif; ?>

<?php foreach ($syCss as $syCssFile): ?>
	<link rel="stylesheet" href="<?= base_url($syCssFile) ?>?v=<?= esc($syAssetVer, 'attr') ?>" />
<?php endforeach; ?>

<?php if (!empty($jsonLd)): ?>
	<script type="application/ld+json">
	<?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
	</script>
<?php endif; ?>

<?= $headExtra ?? '' ?>
