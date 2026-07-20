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
$syFaviconName = sy_site_setting('favico');
$syFaviconSrc  = (!empty($syFaviconName) && file_exists(FCPATH . 'uploads/setting/' . $syFaviconName))
	? base_url('uploads/setting/' . $syFaviconName)
	: null;

$syOgImgName = sy_site_setting('og_img');
$syDefaultOg = (!empty($syOgImgName) && file_exists(FCPATH . 'uploads/setting/' . $syOgImgName))
	? base_url('uploads/setting/' . $syOgImgName)
	: null;
$syOgImage    = $ogImage ?? $syDefaultOg;

$sySiteName  = sy_site_setting('site_name');
$syTitle     = sy_site_setting('browser_title') ?: ($metaTitle ?? $sySiteName);
$syDesc      = sy_site_setting('og_des') ?: sy_site_setting('meta_tag') ?: $metaDescription;
$syKeywords  = sy_site_setting('meta_keyword') ?: $metaKeywords;

$syOgTitle   = sy_site_setting('og_title') ?: ($ogTitle ?? $syTitle);
$syOgDesc    = sy_site_setting('og_des')   ?: ($ogDescription ?? $syDesc);
$syOgUrl     = sy_site_setting('og_url')   ?: ($ogUrl ?? current_url());
$syOgSite    = sy_site_setting('og_site')  ?: ($ogSite ?? $sySiteName);
$sySchemaJson= sy_site_setting('schema_jsonld');

$syBaseCss    = [
	'css/common.css',
	'css/header.css',
	'css/footer.css',
];
$syCss        = array_merge($syBaseCss, $cssFiles ?? []);
$syPretendard = $usePretendard ?? true;
$syPreconnect = $preconnect    ?? [];
$syAssetVer   = $assetVersion  ?? '1.0.0';
?>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="format-detection" content="telephone=no" />

<?php if (!empty($syTitle)): ?>
	<title><?= esc($syTitle) ?></title>
<?php endif; ?>
<?php if (!empty($syDesc)): ?>
	<meta name="description" content="<?= esc($syDesc) ?>" />
<?php endif; ?>
<?php if (!empty($syKeywords)): ?>
	<meta name="keywords" content="<?= esc($syKeywords) ?>" />
<?php endif; ?>

<?php if ($syFaviconSrc): ?>
	<link rel="shortcut icon" href="<?= esc($syFaviconSrc, 'attr') ?>" type="image/x-icon" />
	<link rel="icon" href="<?= esc($syFaviconSrc, 'attr') ?>" type="image/x-icon" />
<?php endif; ?>

<?php if (!empty($syOgTitle)): ?>
	<meta property="og:title" content="<?= esc($syOgTitle) ?>" />
<?php endif; ?>
<?php if (!empty($syOgDesc)): ?>
	<meta property="og:description" content="<?= esc($syOgDesc) ?>" />
<?php endif; ?>
<meta property="og:type" content="website" />
<?php if (!empty($syOgUrl)): ?>
	<meta property="og:url" content="<?= esc($syOgUrl, 'attr') ?>" />
<?php endif; ?>
<?php if (!empty($syOgSite)): ?>
	<meta property="og:site_name" content="<?= esc($syOgSite) ?>" />
<?php endif; ?>
<?php if (!empty($syOgImage)): ?>
	<meta property="og:image" content="<?= esc($syOgImage, 'attr') ?>" />
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
<?php elseif (!empty($sySchemaJson)): ?>
	<script type="application/ld+json">
	<?= $sySchemaJson ?>
	</script>
<?php endif; ?>

<?= $headExtra ?? '' ?>
