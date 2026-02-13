<?php
include __DIR__ . "/components/header.php";
?>

<style>
.work-hero{
  height:960px;
  background:#e5e5e5;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:32px;
  letter-spacing:0.2em;
}

.work-content{
  height:960px;
  background:#f7f7f7;
  display:grid;
  grid-template-columns:1fr 1fr;
}

.work-content__left,
.work-content__right{
  display:flex;
  align-items:center;
  justify-content:center;
  border:1px solid #eee;
}

.work-content__left{ background:#ffffff; }
.work-content__right{ background:#dddddd; }
</style>

<section class="work-hero">
  <?php echo $work_title; ?>
</section>

<section class="work-content">
  <div class="work-content__left">
    <?php echo $work_text; ?>
  </div>
  <div class="work-content__right">
    IMAGE AREA
  </div>
</section>

<?php include __DIR__ . "/components/cta-work.php"; ?>
<?php include __DIR__ . "/components/footer.php"; ?>
