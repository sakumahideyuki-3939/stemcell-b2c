<?php
$page_title = "トップ";
require __DIR__ . "/config.php";
include __DIR__ . "/components/header.php";
include __DIR__ . "/components/page_nav.php";
?>
<main class="container">
  <h1>トップページ</h1>
  <?php include __DIR__ . "/pages/slides/slide-1.php"; ?>
  <?php include __DIR__ . "/pages/blocks/block-1.php"; ?>
</main>
<?php include __DIR__ . "/components/footer.php"; ?>
