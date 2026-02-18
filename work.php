<?php
$page_title = 'あなたのペースで、ひとつずつ。';
$page_description = '幹細胞治療を検討するための8つのコンテンツ。知ることから始めましょう。';

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
  <link rel="stylesheet" href="./assets/css/page.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="./assets/css/main.css?v=<?php echo time(); ?>">
  <title><?php echo $page_title; ?> | ALGO Inc.</title>
  <?php include __DIR__ . '/components/head-meta.php'; ?>
</head>
<body>

<?php include __DIR__ . "/components/header.php"; ?>

<main>

<!-- Breadcrumb -->
<nav class="page-breadcrumb l-container" aria-label="Breadcrumb">
  <a href="./index.php">HOME</a>
  <span aria-hidden="true">&gt;</span>
  <span>WORKS</span>
</nav>

<!-- Page Hero -->
<section class="page-hero l-section--sunken">
  <div class="l-container t-center">
    <p class="t-micro">CONTENTS</p>
    <h1 class="t-h1" style="margin-top:var(--sp-3);">あなたのペースで、ひとつずつ。</h1>
    <p class="t-body-lg t-secondary" style="margin-top:var(--sp-4);max-width:640px;margin-inline:auto;">知ることから始まる8つのステップ。気になるところから、自由にお読みください。</p>
  </div>
</section>

<!-- Work Cards Grid -->
<section class="l-section">
  <div class="l-container l-container--wide">
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
    <h2 class="t-h2" style="color:var(--text-inverse);">まずは、話すことから。</h2>
    <p class="t-body-lg" style="color:var(--text-inverse);opacity:0.72;margin-top:var(--sp-4);max-width:600px;margin-inline:auto;">決める前に、整理する。押し売りのない相談窓口として、お気軽にご利用ください。</p>
    <div style="margin-top:var(--sp-7);">
      <a href="./contact.php" class="c-btn c-btn--primary c-btn--lg">無料相談を予約する</a>
    </div>
  </div>
</section>

</main>

<?php include __DIR__ . "/components/footer.php"; ?>
