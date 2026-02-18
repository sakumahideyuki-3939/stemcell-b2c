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
@media(max-width:768px){
  .hero-slider__track{ height:560px; }
}
</style>

<main>

<!-- T1: Hero Slider -->
<section class="hero-slider" aria-label="Hero">
  <div class="hero-slider__track">
    <div class="hero-slider__slide is-active" style="background-color:var(--surface-recessed);">
      <div class="l-container t-center">
        <p class="t-micro">STEMCELL NASAL TYPE</p>
        <h1 class="t-hero" style="margin-top:var(--sp-4);">幹細胞点鼻タイプ</h1>
        <p class="t-body-lg t-secondary" style="margin-top:var(--sp-5);max-width:600px;margin-inline:auto;">再生医療の可能性を日常へ。<br>医療機関向け幹細胞由来製品の情報を掲載しています。</p>
        <div style="margin-top:var(--sp-7);">
          <a href="./concept.php" class="c-btn c-btn--primary c-btn--lg">CONCEPT</a>
        </div>
      </div>
    </div>
    <div class="hero-slider__slide" style="background-color:var(--surface-sunken);">
      <div class="l-container t-center">
        <p class="t-micro">EVIDENCE &amp; SAFETY</p>
        <h2 class="t-hero" style="margin-top:var(--sp-4);">安全性とエビデンス</h2>
        <p class="t-body-lg t-secondary" style="margin-top:var(--sp-5);max-width:600px;margin-inline:auto;">臨床データに基づく高い安全性。<br>がん化リスクを抑えた無細胞療法。</p>
        <div style="margin-top:var(--sp-7);">
          <a href="./evidence.php" class="c-btn c-btn--primary c-btn--lg">EVIDENCE</a>
        </div>
      </div>
    </div>
    <div class="hero-slider__slide" style="background-color:var(--surface-recessed);">
      <div class="l-container t-center">
        <p class="t-micro">FOR MEDICAL INSTITUTIONS</p>
        <h2 class="t-hero" style="margin-top:var(--sp-4);">医療機関の皆さまへ</h2>
        <p class="t-body-lg t-secondary" style="margin-top:var(--sp-5);max-width:600px;margin-inline:auto;">導入から運用まで、トータルサポート。<br>お気軽にご相談ください。</p>
        <div style="margin-top:var(--sp-7);">
          <a href="./contact.php" class="c-btn c-btn--primary c-btn--lg">CONTACT</a>
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
      <h2 class="t-h1" style="margin-top:var(--sp-3);">製品コンセプト</h2>
    </div>
    <div class="l-grid-3 reveal-stagger">
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__eyebrow">CONCEPT 01</div>
          <div class="c-card__title">無細胞療法</div>
          <p class="c-card__text">細胞そのものを投与しないため、がん化リスクを抑えた安全な治療法です。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__eyebrow">CONCEPT 02</div>
          <div class="c-card__title">高度濾過技術</div>
          <p class="c-card__text">脂肪組織・骨髄由来の幹細胞を高度に濾過した「濾液」を活用します。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__eyebrow">CONCEPT 03</div>
          <div class="c-card__title">簡便な投与</div>
          <p class="c-card__text">点鼻タイプにより、手軽に投与できる新しい治療選択肢を提供します。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__eyebrow">EVIDENCE</div>
          <div class="c-card__title">臨床エビデンス</div>
          <p class="c-card__text">臨床データに基づく高い安全性と有効性を実証しています。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__eyebrow">BEAUTY</div>
          <div class="c-card__title">美容への応用</div>
          <p class="c-card__text">再生医療技術を美容分野にも展開し、新たな可能性を開きます。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__eyebrow">SUPPORT</div>
          <div class="c-card__title">導入サポート</div>
          <p class="c-card__text">医療機関への導入から運用まで、トータルでサポートいたします。</p>
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
      <h2 class="t-h1" style="margin-top:var(--sp-3);">導入実績</h2>
    </div>
    <div class="l-grid-4 reveal-stagger">
      <?php foreach ($works as $id => $w): ?>
      <a href="./work<?php echo sprintf('%02d', (int)$id); ?>.php" class="c-card c-card--compact reveal" style="text-decoration:none;color:inherit;">
        <img class="c-card__image" src="./assets/img/work/work-<?php echo (int)$id; ?>.jpg" alt="<?php echo htmlspecialchars($w['title'], ENT_QUOTES, 'UTF-8'); ?>">
        <div class="c-card__body">
          <div class="c-card__eyebrow">WORK <?php echo sprintf('%02d', (int)$id); ?></div>
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
