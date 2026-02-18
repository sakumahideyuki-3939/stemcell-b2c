<?php
// components/head-meta.php
// Expects: $page_title, $page_description (optional)
$_meta_title = isset($page_title) ? $page_title . ' | ALGO Inc.' : 'ALGO Inc.';
$_meta_desc  = isset($page_description) ? $page_description : 'ALGO Inc. — 幹細胞点鼻タイプ。再生医療の可能性を日常へ。';
$_meta_url   = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost') . (isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/');
$_meta_image = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost') . '/assets/img/ogp.jpg';
?>
  <meta name="description" content="<?php echo htmlspecialchars($_meta_desc, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($_meta_title, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($_meta_desc, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo htmlspecialchars($_meta_url, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars($_meta_image, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:site_name" content="ALGO Inc.">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo htmlspecialchars($_meta_title, ENT_QUOTES, 'UTF-8'); ?>">
  <meta name="twitter:description" content="<?php echo htmlspecialchars($_meta_desc, ENT_QUOTES, 'UTF-8'); ?>">
  <link rel="icon" href="./assets/img/favicon.svg" type="image/svg+xml">
