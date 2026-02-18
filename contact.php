<?php $page_title = 'CONTACT'; ?>
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
  <title>CONTACT | ALGO Inc.</title>
</head>
<body>

<?php include __DIR__ . "/components/header.php"; ?>

<main>

<!-- Breadcrumb -->
<nav class="page-breadcrumb l-container" aria-label="Breadcrumb">
  <a href="./index.php">HOME</a>
  <span aria-hidden="true">&gt;</span>
  <span>CONTACT</span>
</nav>

<!-- Page Hero -->
<section class="page-hero l-section--sunken">
  <div class="l-container t-center">
    <p class="t-micro">CONTACT</p>
    <h1 class="t-h1" style="margin-top:var(--sp-3);">お問い合わせ</h1>
    <p class="t-body-lg t-secondary" style="margin-top:var(--sp-4);max-width:640px;margin-inline:auto;">製品の詳細や導入に関するご質問など、下記フォームよりお気軽にお問い合わせください。</p>
  </div>
</section>

<!-- Form -->
<section class="l-section">
  <div class="l-container l-container--narrow">
    <form action="#" method="post">
      <div class="form-group">
        <label class="form-label" for="name">お名前 <span style="color:var(--danger);">*</span></label>
        <input class="form-input" type="text" id="name" name="name" required placeholder="山田 太郎">
      </div>
      <div class="form-group">
        <label class="form-label" for="email">メールアドレス <span style="color:var(--danger);">*</span></label>
        <input class="form-input" type="email" id="email" name="email" required placeholder="info@example.com">
      </div>
      <div class="form-group">
        <label class="form-label" for="institution">医療機関名（任意）</label>
        <input class="form-input" type="text" id="institution" name="institution" placeholder="〇〇クリニック">
      </div>
      <div class="form-group">
        <label class="form-label" for="message">お問い合わせ内容 <span style="color:var(--danger);">*</span></label>
        <textarea class="form-textarea" id="message" name="message" rows="6" required placeholder="お問い合わせ内容をご記入ください。"></textarea>
      </div>
      <div style="margin-top:var(--sp-7);text-align:center;">
        <button type="submit" class="c-btn c-btn--primary c-btn--lg">送信する</button>
      </div>
    </form>
  </div>
</section>

</main>

<?php include __DIR__ . "/components/footer.php"; ?>
