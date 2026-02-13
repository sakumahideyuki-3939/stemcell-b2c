<?php
include __DIR__ . "/components/header.php";
?>

<style>
.work-hero{
  height:960px;
  background:#e5e5e5;
  display:flex;
  align-items:center;
}
.work-hero__inner{
  max-width:1200px;
  margin:0 auto;
  width:100%;
}
.work-hero__title{
  font-size:42px;
  letter-spacing:0.2em;
  font-weight:600;
}
.work-hero__inner{
  max-width:1200px;
  width:100%;
  text-align:center;
}
.work-hero__title{
  font-size:42px;
  letter-spacing:0.25em;
  font-weight:600;
}

.work-content{
  padding:120px 0;
  background:#f7f7f7;
}
.work-content__inner{
  max-width:1200px;
  margin:0 auto;
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:80px;
}
.work-content__left,
.work-content__right{
  min-height:600px;
  display:flex;
  align-items:center;
  justify-content:center;
}
.work-content__left{ background:#ffffff; }
.work-content__right{ background:#dddddd; }

.work-content__left,
.work-content__right{
  display:flex;
  align-items:center;
  justify-content:center;
  border:1px solid #eee;
}

.work-content__left{ background:#ffffff; }
.work-content__right{ background:#dddddd; }


/* ===== Responsive ===== */
 (max-width: 1024px){
  .work-content__inner{
    grid-template-columns:1fr;
    gap:40px;
  }
  .work-hero{
    height:600px;
  }
  .work-content{
    padding:80px 20px;
  }
  .work-hero__inner{
    padding:0 20px;
  }
}

 (max-width: 600px){
  .work-hero{
    height:480px;
  }
  .work-hero__title{
    font-size:28px;
  }
}

</style>

<section class="work-hero"><div class="work-hero__inner"><div class="work-hero__title"><?php echo $work_title; ?></div></div></section>

<section class="work-content"><div class="work-content__inner"><div class="work-content__left"><?php echo $work_text; ?></div><div class="work-content__right">IMAGE AREA</div></div></section>

<?php include __DIR__ . "/components/cta-work.php"; ?>
<?php include __DIR__ . "/components/footer.php"; ?>
