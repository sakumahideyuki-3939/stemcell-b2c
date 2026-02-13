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

/* ===== WORK：4列×2段（8個） ===== */
.work-grid{height:960px;background:#fff;}
.work-grid__inner{display:grid;grid-template-columns:repeat(4,1fr);grid-template-rows:repeat(2,1fr);height:960px;}
.work-grid__cell{border:1px solid #eee;display:flex;justify-content:center;align-items:center;background:#f7f7f7;font-size:48px;}

/* ===== SLIDER（1920×960 本番構造） ===== */
.hero{height:960px;background:#d9d9d9;position:relative;overflow:hidden;}
.hero__bg{position:absolute;inset:0;background:linear-gradient(rgba(0,0,0,0.15),rgba(0,0,0,0.15));}
.hero__inner{position:relative;height:960px;display:flex;align-items:center;justify-content:center;text-align:center;color:#fff;}
.hero__title{font-size:48px;letter-spacing:0.2em;font-weight:600;}
.hero__lead{margin-top:18px;font-size:14px;line-height:1.8;letter-spacing:0.12em;opacity:0.95;}
.hero__btn{display:inline-block;margin-top:22px;padding:12px 22px;border:1px solid rgba(255,255,255,0.85);color:#fff;text-decoration:none;font-size:12px;letter-spacing:0.2em;}

</style>

<div class="index-section s-100">HEADER</div>

<section class="hero" aria-label="Slider"><div class="hero__bg"></div><div class="index-wrap"><div class="index-1920"><div class="hero__inner"><div><div class="hero__title">STEMCELL B2C</div><div class="hero__lead">幹細胞培養上清を用いた美容医療向け専用商材<br>導入をご検討の方向けに情報をまとめています</div><a class="hero__btn" href="./concept.php">CONCEPT</a></div></div></div></div></section>

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
<section class="work-grid"><div class="index-wrap"><div class="index-1920"><div class="work-grid__inner"><div class="work-grid__cell">1</div><div class="work-grid__cell">2</div><div class="work-grid__cell">3</div><div class="work-grid__cell">4</div><div class="work-grid__cell">5</div><div class="work-grid__cell">6</div><div class="work-grid__cell">7</div><div class="work-grid__cell">8</div></div></div></div></section>
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
