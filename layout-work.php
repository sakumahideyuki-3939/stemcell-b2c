<?php
include __DIR__ . "/components/layout_open.php";
?>
<?php
$page_body_class = "page-work";
include __DIR__ . "/components/header.php";
?>


<section class="work-hero"><div class="work-hero__inner"><div class="work-hero__title"><?php echo $work_title; ?></div></div></section>

<section class="work-content"><div class="work-content__inner"><div class="work-content__left"><?php echo $work_text; ?></div><div class="work-content__right">IMAGE AREA</div></div></section>

<?php include __DIR__ . "/components/cta-work.php"; ?>
<?php include __DIR__ . "/components/footer.php"; ?>

include __DIR__ . "/components/layout_close.php";
