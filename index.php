<?php
$page_title = "HOME";
include __DIR__ . "/components/header.php";
?>

<style>
/* ===== HEADER ===== */
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

/* ===== SLIDER ===== */
.index-wrap{
  width:100%;
  display:flex;
  justify-content:center;
}
.index-1920{
  width:100%;
  max-width:1920px;
}
.hero{height:960px;background:#d9d9d9;position:relative;overflow:hidden;}
.hero__bg{position:absolute;inset:0;background:linear-gradient(rgba(0,0,0,0.15),rgba(0,0,0,0.15));}
.hero__inner{position:relative;height:960px;display:flex;align-items:center;justify-content:center;text-align:center;color:#fff;}
.hero__title{font-size:48px;letter-spacing:0.2em;font-weight:600;}
.hero__lead{margin-top:18px;font-size:14px;line-height:1.8;letter-spacing:0.12em;opacity:0.95;}
.hero__btn{display:inline-block;margin-top:22px;padding:12px 22px;border:1px solid rgba(255,255,255,0.85);color:#fff;text-decoration:none;font-size:12px;letter-spacing:0.2em;}

/* ===== CONCEPT上 ===== */
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

/* ===== CONCEPT下 ===== */
.concept-lower{
  height:960px;
  background:#fff;
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

/* ===== WORK ===== */
.work-grid{height:960px;background:#fff;}
.work-grid__inner{display:grid;grid-template-columns:repeat(4,1fr);grid-template-rows:repeat(2,1fr);height:960px;}
.work-grid__cell{border:1px solid #eee;display:flex;justify-content:center;align-items:center;background:#f7f7f7;font-size:48px;}

/* ===== FOOTER ===== */
.index-footer{height:960px;background:#eaeaea;}
.index-footer__inner{height:960px;display:flex;align-items:center;justify-content:center;font-size:28px;letter-spacing:0.2em;color:#666;}
/* ===== WORK：リンク土台（画像なし） ===== */
.work-grid__cell a{width:100%;height:100%;display:flex;align-items:center;justify-content:center;text-decoration:none;color:#333;}
.work-grid__cell a:hover{background:rgba(0,0,0,0.04);}
.work-grid__cell a:focus{outline:2px solid rgba(0,0,0,0.25);outline-offset:-2px;}

/* ===== CONCEPT LOWER：リンク土台 ===== */
.concept-lower__box a{width:100%;height:100%;display:flex;align-items:center;justify-content:center;text-decoration:none;color:#333;}
.concept-lower__box a:hover{background:rgba(0,0,0,0.04);}
.concept-lower__box a:focus{outline:2px solid rgba(0,0,0,0.25);outline-offset:-2px;}

</style>

<div class="index-section s-100">HEADER</div>

<section class="hero" aria-label="Slider"><div class="hero__bg"></div><div class="index-wrap"><div class="index-1920"><div class="hero__inner"><div><div class="hero__title">幹細胞点鼻タイプ</div><div class="hero__lead">再生医療の可能性を日常へ。
医療機関向け幹細胞由来製品の情報を掲載しています。</div><a class="hero__btn" href="./concept.php">CONCEPT</a></div></div></div></div></section>

<!-- CONCEPT 上（精密化） -->
<section class="concept-upper">
  <div class="index-wrap">
    <div class="index-1920">
      <div class="concept-upper__grid">
        <div class="concept-upper__box">
          <div>製品コンセプト<br><small>Concept</small></div>
          <div>480 × 960</div>
        </div>
        <div class="concept-upper__box">
          <div>製品コンセプト<br><small>Concept</small></div>
          <div>480 × 960</div>
        </div>
        <div class="concept-upper__box big">
          <div>製品コンセプト<br><small>Concept</small></div>
          <div>960 × 960</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ここから下は骨組みのまま -->
<section class="concept-lower"><div class="index-wrap"><div class="index-1920"><div class="concept-lower__grid"><div class="concept-lower__box big">安全性とエビデンス
960 × 960</div><div class="concept-lower__box">導入メリット
480 × 960</div><div class="concept-lower__box">導入メリット
480 × 960</div></div></div></div></section>
<section class="work-grid"><div class="index-wrap"><div class="index-1920"><div class="work-grid__inner"><div class="work-grid__cell"><a href="./work01.php">WORK 1</a></div><div class="work-grid__cell"><a href="./work02.php">WORK 2</a></div><div class="work-grid__cell"><a href="./work03.php">WORK 3</a></div><div class="work-grid__cell"><a href="./work04.php">WORK 4</a></div><div class="work-grid__cell"><a href="./work05.php">WORK 5</a></div><div class="work-grid__cell"><a href="./work06.php">WORK 6</a></div><div class="work-grid__cell"><a href="./work07.php">WORK 7</a></div><div class="work-grid__cell"><a href="./work08.php">WORK 8</a></div></div></div></div></section>
<section class="index-footer"><div class="index-wrap"><div class="index-1920"><div class="index-footer__inner">FOOTER</div></div></div></section>

<?php include __DIR__ . "/components/footer.php"; ?>
<?php /* UNUSED CSS CLASSES (index.php): .s-960, .s-960.alt */ ?>
