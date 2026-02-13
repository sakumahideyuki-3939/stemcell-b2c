<?php
$page_title = "HOME";
include __DIR__ . "/components/header.php";
?>

<style>
/* ===== index skeleton only ===== */
.index-section{
  width:100%;
  display:flex;
  justify-content:center;
  align-items:center;
  font-size:28px;
  letter-spacing:0.2em;
}

.s-100{ height:100px; background:#f5f5f5; }
.s-960{ height:960px; background:#eaeaea; }
.s-960.alt{ background:#dedede; }

/* ===== CONCEPT 上：480 / 480 / 960（合計1920） ===== */
.index-wrap{
  width:100%;
  display:flex;
  justify-content:center;
}
.index-1920{
  width:100%;
  max-width:1920px;
}
.concept-upper{
  height:960px;
  background:#fff;
}
.concept-upper__grid{
  display:grid;
  grid-template-columns:1fr 1fr 2fr;
  height:960px;
}
.concept-upper__box{
  border:1px solid #eee;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  background:#f7f7f7;
}
.concept-upper__box.big{
  background:#efefef;
}
/* ===== CONCEPT 下：2fr / 1fr / 1fr ===== */
.concept-lower{height:960px;background:#fff;}
.concept-lower__grid{display:grid;grid-template-columns:2fr 1fr 1fr;height:960px;}
.concept-lower__box{border:1px solid #eee;display:flex;flex-direction:column;justify-content:center;align-items:center;background:#f7f7f7;}
.concept-lower__box.big{background:#efefef;}

</style>

<div class="index-section s-100">HEADER</div>

<div class="index-section s-960">SLIDER</div>

<!-- CONCEPT 上（精密化） -->
<section class="concept-upper">
  <div class="index-wrap">
    <div class="index-1920">
      <div class="concept-upper__grid">
        <div class="concept-upper__box">
          <div>CONCEPT UPPER</div>
          <div>480 × 960</div>
        </div>
        <div class="concept-upper__box">
          <div>CONCEPT UPPER</div>
          <div>480 × 960</div>
        </div>
        <div class="concept-upper__box big">
          <div>CONCEPT UPPER</div>
          <div>960 × 960</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ここから下は骨組みのまま -->
<section class="concept-lower"><div class="index-wrap"><div class="index-1920"><div class="concept-lower__grid"><div class="concept-lower__box big">CONCEPT LOWER
960 × 960</div><div class="concept-lower__box">CONCEPT LOWER
480 × 960</div><div class="concept-lower__box">CONCEPT LOWER
480 × 960</div></div></div></div></section>
<div class="index-section s-960.alt">WORK</div>
<div class="index-section s-960">FOOTER</div>

<?php include __DIR__ . "/components/footer.php"; ?>

<style>
/* ===== CONCEPT 下：2fr / 1fr / 1fr ===== */
.concept-lower{
  height:960px;
}
.concept-lower__grid{
  display:grid;
  grid-template-columns:2fr 1fr 1fr;
  height:960px;
}
.concept-lower__box{
  border:1px solid #eee;
  display:flex;
  justify-content:center;
  align-items:center;
  background:#f2f2f2;
}
.concept-lower__box.big{
  background:#e6e6e6;
}
</style>
