<?php
// components/page-template.php
// 呼び出し側で以下を設定してから include:
//   $page_title, $page_eyebrow, $page_lead,
//   $page_content, $page_prev, $page_next
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
  <title><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?> | ALGO Inc.</title>
</head>
<body>

<?php include __DIR__ . "/header.php"; ?>

<main>

<!-- Breadcrumb -->
<nav class="page-breadcrumb l-container" aria-label="Breadcrumb">
  <a href="./index.php">HOME</a>
  <span aria-hidden="true">&gt;</span>
  <span><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?></span>
</nav>

<!-- Page Hero -->
<section class="page-hero l-section--sunken">
  <div class="l-container t-center">
    <p class="t-micro"><?php echo htmlspecialchars($page_eyebrow, ENT_QUOTES, 'UTF-8'); ?></p>
    <h1 class="t-h1" style="margin-top:var(--sp-3);"><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?></h1>
    <?php if (!empty($page_lead)): ?>
    <p class="t-body-lg t-secondary" style="margin-top:var(--sp-4);max-width:640px;margin-inline:auto;"><?php echo htmlspecialchars($page_lead, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
  </div>
</section>

<!-- Content -->
<section class="l-section">
  <div class="l-container l-container--narrow">
    <div class="prose">
      <?php echo $page_content; ?>
    </div>
  </div>
</section>

<!-- Prev / Next Nav -->
<?php if (!empty($page_prev) || !empty($page_next)): ?>
<nav class="page-nav l-container l-container--narrow" aria-label="Page navigation">
  <div class="page-nav__prev">
    <?php if (!empty($page_prev)): ?>
    <a href="<?php echo htmlspecialchars($page_prev['url'], ENT_QUOTES, 'UTF-8'); ?>" class="c-btn c-btn--ghost">&larr; <?php echo htmlspecialchars($page_prev['label'], ENT_QUOTES, 'UTF-8'); ?></a>
    <?php endif; ?>
  </div>
  <div class="page-nav__next">
    <?php if (!empty($page_next)): ?>
    <a href="<?php echo htmlspecialchars($page_next['url'], ENT_QUOTES, 'UTF-8'); ?>" class="c-btn c-btn--ghost"><?php echo htmlspecialchars($page_next['label'], ENT_QUOTES, 'UTF-8'); ?> &rarr;</a>
    <?php endif; ?>
  </div>
</nav>
<?php endif; ?>

<!-- CTA Band -->
<section class="l-section l-section--dark">
  <div class="l-container t-center">
    <h2 class="t-h2" style="color:var(--text-inverse);">お気軽にご相談ください</h2>
    <p class="t-body-lg" style="color:var(--text-inverse);opacity:0.72;margin-top:var(--sp-4);max-width:600px;margin-inline:auto;">製品の詳細や導入に関するご質問など、お問い合わせをお待ちしております。</p>
    <div style="margin-top:var(--sp-7);">
      <a href="./contact.php" class="c-btn c-btn--primary c-btn--lg">お問い合わせ</a>
    </div>
  </div>
</section>

</main>

<?php include __DIR__ . "/footer.php"; ?>
