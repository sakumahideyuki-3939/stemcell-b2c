<?php
$page_title = "HOME";
$page_description = "ALGO Inc. — 幹細胞点鼻タイプ。再生医療の可能性を日常へ。医療機関向け幹細胞由来製品の情報サイトです。";

// Load work data
$work_json = file_get_contents(__DIR__ . '/data/work.json');
$works = json_decode($work_json, true);
if (!is_array($works)) { $works = []; }
ksort($works, SORT_NATURAL);
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/design-system.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="./assets/css/main.css?v=<?php echo time(); ?>">
  <title><?php echo $page_title; ?></title>
  <?php include __DIR__ . '/components/head-meta.php'; ?>
</head>
<body>

<?php include __DIR__ . "/components/header.php"; ?>

<style>
/* ===== HERO SLIDER ===== */
.hero-slider{
  position:relative;
  width:100%;
  max-width:1920px;
  margin:0 auto;
  overflow:hidden;
}
.hero-slider__track{
  position:relative;
  height:768px; /* 480 × 1.6 LiftKit ratio */
}
.hero-slider__slide{
  position:absolute;
  inset:0;
  display:flex;
  align-items:center;
  justify-content:center;
  opacity:0;
  transition:opacity 800ms var(--ease-out-expo);
  pointer-events:none;
}
.hero-slider__slide.is-active{
  opacity:1;
  pointer-events:auto;
}
/* Slide text fade-up */
.hero-slider__slide > .l-container{
  opacity:0;
  transform:translateY(30px);
  transition:opacity 600ms var(--ease-out-expo),
             transform 600ms var(--ease-out-expo);
  transition-delay:0ms;
}
.hero-slider__slide.is-active > .l-container{
  opacity:1;
  transform:translateY(0);
  transition-delay:200ms;
}
.hero-slider__dots{
  position:absolute;
  bottom:var(--sp-7);
  left:50%;
  transform:translateX(-50%);
  display:flex;
  gap:var(--sp-3);
  z-index:2;
}
.hero-slider__dot{
  width:10px;
  height:10px;
  border-radius:var(--radius-full);
  border:none;
  background:var(--border-heavy);
  cursor:pointer;
  transition:background var(--duration-fast),transform var(--duration-fast);
}
.hero-slider__dot.is-active{
  background:var(--text-primary);
  transform:scale(1.3);
}
.hero-slider__slide--bg-2{
  background:url('./assets/img/hero-slide-2.jpg') center/cover no-repeat;
}
.hero-slider__slide--bg-2::after{
  content:'';
  position:absolute;
  inset:0;
  background:rgba(245,245,247,0.75);
}
.hero-slider__slide--bg-2 > .l-container{
  position:relative;
  z-index:1;
}
@media(max-width:768px){
  .hero-slider__track{ height:560px; }
  .hero-slider .t-body-lg br{ display:none; }
}
</style>

<main>

<!-- T1: Hero Slider -->
<section class="hero-slider" aria-label="Hero">
  <div class="hero-slider__track">
    <div class="hero-slider__slide is-active" style="background-color:var(--surface-recessed);">
      <div class="l-container t-center">
        <p class="t-micro">STEMCELL NASAL TYPE</p>
        <h1 class="t-hero" style="margin-top:var(--sp-4);">迷いを減らす、幹細胞治療の入口。</h1>
        <p class="t-body-lg t-secondary" style="margin-top:var(--sp-5);max-width:600px;margin-inline:auto;">幹細胞治療に興味はある。でも情報が多すぎて、何を信じていいか分からない。<br>このページでは、期待値を上げすぎずに「選び方」と「相談の流れ」を整理し、あなたに合う受診先へつなげます。</p>
        <div style="margin-top:var(--sp-7);">
          <a href="./concept.php" class="c-btn c-btn--primary c-btn--lg">相談の流れを見る</a>
        </div>
      </div>
    </div>
    <div class="hero-slider__slide hero-slider__slide--bg-2">
      <div class="l-container t-center">
        <p class="t-micro">BEYOND SUPERNATANT</p>
        <h2 class="t-hero" style="margin-top:var(--sp-4);">上清だけでは届かない領域へ。</h2>
        <p class="t-body-lg t-secondary" style="margin-top:var(--sp-5);max-width:600px;margin-inline:auto;">"分泌された成分だけ"ではなく、細胞内に眠るタンパク質や情報分子まで視野に入れたアプローチが注目されています。<br>大切なのは、言葉の強さではなく「説明の透明性」。納得して選ぶための基準を、ここで整えます。</p>
        <div style="margin-top:var(--sp-7);">
          <a href="./evidence.php" class="c-btn c-btn--primary c-btn--lg">詳しく見る</a>
        </div>
      </div>
    </div>
    <div class="hero-slider__slide" style="background-color:var(--surface-recessed);">
      <div class="l-container t-center">
        <p class="t-micro">GETTING STARTED</p>
        <h2 class="t-hero" style="margin-top:var(--sp-4);">あなたに合う進み方を、先に決める。</h2>
        <p class="t-body-lg t-secondary" style="margin-top:var(--sp-5);max-width:600px;margin-inline:auto;">この領域は、調べるほど情報が増えて迷いやすいです。<br>だからこそ、最初に「何を目的に」「何が不安で」「どこで判断するか」を決めると、検討が一気にラクになります。</p>
        <div style="margin-top:var(--sp-7);">
          <a href="./contact.php" class="c-btn c-btn--primary c-btn--lg">目的別ナビへ</a>
        </div>
      </div>
    </div>
  </div>
  <div class="hero-slider__dots">
    <button class="hero-slider__dot is-active" data-slide="0" aria-label="Slide 1"></button>
    <button class="hero-slider__dot" data-slide="1" aria-label="Slide 2"></button>
    <button class="hero-slider__dot" data-slide="2" aria-label="Slide 3"></button>
  </div>
</section>

<!-- T2: Mosaic -->
<section class="l-section">
  <div class="l-container">
    <div class="t-center" style="margin-bottom:var(--sp-9);">
      <p class="t-micro">CONCEPT</p>
      <h2 class="t-h1" style="margin-top:var(--sp-3);">選ぶ前に、整える。</h2>
    </div>
    <div class="l-grid-3 reveal-stagger">
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__eyebrow">CONCEPT 01</div>
          <div class="c-card__title">選ぶ前に、仕組みを知る。</div>
          <p class="c-card__text">幹細胞関連のケアにはいくつかの系統があります。その中で「生搾り（Lysate）」は、幹細胞を物理的に処理して、内部成分まで含む"濾液"として設計された考え方です。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__eyebrow">CONCEPT 02</div>
          <div class="c-card__title">根拠は、言い切りではなく提示。</div>
          <p class="c-card__text">どんな医療でも、重要なのは「すごい」ではなく「何が分かっていて、何が分かっていないか」。研究・特許・学会発表などの情報は、万能な保証ではありませんが、説明の土台になります。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__eyebrow">CONCEPT 03</div>
          <div class="c-card__title">"期待しすぎない"が、後悔を減らす。</div>
          <p class="c-card__text">大切なのは、あなたの目的に対して、どんな説明が必要かを整理すること。このページは、受診の判断を急がせるためではなく、「納得して選ぶ」ための下準備を整える場所です。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__eyebrow">CONCERNS</div>
          <div class="c-card__title">不安の中心は、いつも同じ。</div>
          <p class="c-card__text">相談で多い不安は、だいたい3つに集約されます。安全性、費用、自分に合うか。当サイトは、これらを「短時間で整理」し、受診先で聞くべき質問リストまで落とし込みます。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__eyebrow">VOICES</div>
          <div class="c-card__title">相談者の声</div>
          <p class="c-card__text">「情報が整理できて、何を確認すべきかが分かった」「売り込みではなく、判断基準を一緒に作ってもらえた」まずは"焦らずに整える"。そこからで十分間に合います。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__eyebrow">CONSULT</div>
          <div class="c-card__title">相談→紹介まで、ここで完結。</div>
          <p class="c-card__text">無料相談では、あなたの目的・地域・希望時期をもとに、候補となる医療機関の情報を整理してご案内します。押し売りのない相談窓口としてご利用ください。</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Work Cards -->
<section class="l-section l-section--sunken">
  <div class="l-container l-container--wide">
    <div class="t-center" style="margin-bottom:var(--sp-9);">
      <p class="t-micro">WORKS</p>
      <h2 class="t-h1" style="margin-top:var(--sp-3);">コンテンツ一覧</h2>
    </div>
    <div class="l-grid-4 reveal-stagger">
      <?php foreach ($works as $id => $w): ?>
      <a href="./work<?php echo sprintf('%02d', (int)$id); ?>.php" class="c-card c-card--compact reveal" style="text-decoration:none;color:inherit;">
        <img class="c-card__image" src="./assets/img/work/work-<?php echo (int)$id; ?>.jpg" alt="<?php echo htmlspecialchars($w['title'], ENT_QUOTES, 'UTF-8'); ?>">
        <div class="c-card__body">
          <div class="c-card__eyebrow"><?php echo htmlspecialchars(isset($w['cat']) ? $w['cat'] : 'WORK ' . sprintf('%02d', (int)$id), ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="c-card__title"><?php echo htmlspecialchars($w['title'], ENT_QUOTES, 'UTF-8'); ?></div>
          <p class="c-card__text"><?php echo htmlspecialchars($w['text'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA Band -->
<section class="l-section l-section--dark">
  <div class="l-container t-center">
    <h2 class="t-h2" style="color:var(--text-inverse);">導入をご検討の医療機関さまへ</h2>
    <p class="t-body-lg" style="color:var(--text-inverse);opacity:0.72;margin-top:var(--sp-4);max-width:600px;margin-inline:auto;">製品の詳細やお見積もりなど、お気軽にお問い合わせください。</p>
    <div style="margin-top:var(--sp-7);display:flex;gap:var(--sp-4);justify-content:center;flex-wrap:wrap;">
      <a href="./contact.php" class="c-btn c-btn--primary c-btn--lg">お問い合わせ</a>
      <a href="./concept.php" class="c-btn c-btn--secondary c-btn--lg" style="color:#fff;box-shadow:inset 0 0 0 1.5px rgba(255,255,255,0.6);">コンセプトを見る</a>
    </div>
  </div>
</section>

</main>

<?php include __DIR__ . "/components/footer.php"; ?>
<!-- auto-deploy smoke test -->
