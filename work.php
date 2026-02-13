<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK | ALGO Inc.</title>
  <link rel="stylesheet" href="./assets/css/main.css?v=<?php echo time(); ?>">
</head>

<body class="page-work">
<div class="algo-site">

  <?php include('components/header.php'); ?>

  <main>
    <!-- =========================
      BLOCK 1 : 1920 × 460
      タイトル＋概略（ABOUTと同じ見せ方）
    ========================= -->
    <section class="work-block-1">
      <div class="work-block-1__inner">
        <div class="addr-tag">WORK</div>
        <h1 style="font-size:32px; letter-spacing:0.4em;">WORK</h1>
        <div style="margin-top:10px; font-size:12px; letter-spacing:0.2em; opacity:0.7;">準備中</div>
      </div>
    </section>

    <!-- =========================
      BLOCK 2 : 1920 × 960（左右余白460想定）
      詳細テキストブロック（ABOUTと同じ読みやすさ）
    ========================= -->
    <section class="work-block-2">
      <div class="work-block-2__inner">
        <p>ここにWORKの詳細説明文を入れます。ABOUTと同様、余白を大きく取り、中央にテキストブロックを配置します。</p>
        <p>プロジェクトの背景、目的、取り組み内容、成果などを記載するエリアです。</p>
      </div>
    </section>
  </main>

  <?php include('components/footer.php'); ?>

</div>
</body>
</html>
