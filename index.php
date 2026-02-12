<?php
// index.php（トップ）
// 6セクション固定：HEADER / SLIDER / CONCEPT上 / CONCEPT下 / WORK / FOOTER
// 1920/480グリッドで「枠」を先に確定（中身は後で差し替え）

$page_title = "TOP";
$page_body_class = "page-index"; // layout_open 側で拾えるなら拾う（拾えなくても害なし）

// layout_open / layout_close の場所が環境で揺れても迷子にならないように自動検出
$layout_open_candidates = [
  __DIR__ . "/components/layout_open.php",
  __DIR__ . "/layout_open.php",
];

$layout_close_candidates = [
  __DIR__ . "/components/layout_close.php",
  __DIR__ . "/layout_close.php",
];

$layout_open = null;
foreach ($layout_open_candidates as $p) {
  if (is_file($p)) { $layout_open = $p; break; }
}

$layout_close = null;
foreach ($layout_close_candidates as $p) {
  if (is_file($p)) { $layout_close = $p; break; }
}

// layout_open が見つからない場合は最小フォールバック（通常ここには来ない想定）
if ($layout_open) {
  include $layout_open;
} else {
  ?><!doctype html>
  <html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/main.css?v=<?php echo time(); ?>">
    <title><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?></title>
  </head>
  <body class="<?php echo htmlspecialchars($page_body_class, ENT_QUOTES, 'UTF-8'); ?>">
  <?php
}

// header.php（通常は各ページで include する運用）
$header_candidates = [
  __DIR__ . "/components/header.php",
  __DIR__ . "/header.php",
];
foreach ($header_candidates as $p) {
  if (is_file($p)) { include $p; break; }
}
?>

<main class="page-index">

  <!-- 2) SLIDER：1920×960 -->
  <section class="index-wrap">
    <div class="index-1920 h-960">
      <div class="fill">
        <p style="padding:20px;">SLIDER 1920×960（仮）</p>
      </div>
    </div>
  </section>

  <!-- 3) CONCEPT［上］：1920×960（左480×960 / 中480×960 / 右960×960） -->
  <section class="index-wrap">
    <div class="index-1920 h-960 grid-1920">
      <div class="col-1 row-2 fill">
        <p style="padding:20px;">CONCEPT 上：左 480×960（仮）</p>
      </div>
      <div class="col-1 row-2 fill">
        <p style="padding:20px;">CONCEPT 上：中 480×960（仮）</p>
      </div>
      <div class="col-2 row-2 fill">
        <p style="padding:20px;">CONCEPT 上：右 960×960（仮）</p>
      </div>
    </div>
  </section>

  <!-- 4) CONCEPT［下］：1920×960（左960×960 / 中480×960 / 右480×960） -->
  <section class="index-wrap">
    <div class="index-1920 h-960 grid-1920">
      <div class="col-2 row-2 fill">
        <p style="padding:20px;">CONCEPT 下：左 960×960（仮）</p>
      </div>
      <div class="col-1 row-2 fill">
        <p style="padding:20px;">CONCEPT 下：中 480×960（仮）</p>
      </div>
      <div class="col-1 row-2 fill">
        <p style="padding:20px;">CONCEPT 下：右 480×960（仮）</p>
      </div>
    </div>
  </section>

  <!-- 5) WORK：1920×960（480×480 ×8＝4列×2段） -->
  <section class="index-wrap">
    <div class="index-1920 h-960 grid-1920">
      <?php for ($i = 1; $i <= 8; $i++): ?>
        <div class="col-1 row-1 fill">
          <p style="padding:20px;">WORK <?php echo $i; ?>（480×480 仮）</p>
        </div>
      <?php endfor; ?>
    </div>
  </section>

  <!-- 6) FOOTER：1920×960 -->
  <section class="index-wrap">
    <div class="index-1920 h-960">
      <div class="fill">
        <p style="padding:20px;">FOOTER 1920×960（仮）</p>
      </div>
    </div>
  </section>

</main>

<?php
if ($layout_close) {
  include $layout_close;
} else {
  ?></body></html><?php
}
?>
