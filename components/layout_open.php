<?php
// components/layout_open.php
?><!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/assets/css/main.css?v=<?php echo time(); ?>">

  <title><?php echo isset($page_title) ? $page_title : 'ALGO'; ?></title>
</head>
<body class="<?php echo isset($page_body_class) ? $page_body_class : ''; ?>">
<div class="algo-site">
