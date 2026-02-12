<?php
// index.php（トップ）
// 6セクション固定：HEADER / SLIDER / CONCEPT上 / CONCEPT下 / WORK / FOOTER
// 1920/480グリッドで「枠」を先に確定（中身は後で差し替え）
//
// ※いまは「白紙を消して構造を成立させる」ため、SLIDER/CONCEPT/FOOTER に仮表示を入れている。

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

// WORK（8枠）— 画像は仮。存在しない場合はブラウザで壊れて見えるので注意。
$work_items = [
  ["title" => "ABOUT",   "href" => "./about.php",   "img" => "./assets/img/work/work-1.jpg"],
  ["title" => "CONCEPT", "href" => "./concept.php", "img" => "./assets/img/work/work-2.jpg"],
  ["title" => "EVIDENCE","href" => "./evidence.php","img" => "./assets/img/work/work-3.jpg"],
  ["title" => "COMPANY", "href" => "./company.php", "img" => "./assets/img/work/work-4.jpg"],
  ["title" => "CONTACT", "href" => "./contact.php", "img" => "./assets/img/work/work-5.jpg"],
  ["title" => "WORK",    "href" => "./work.php",    "img" => "./assets/img/work/work-6.jpg"],
  ["title" => "WORK 07", "href" => "./work.php",    "img" => "./assets/img/work/work-7.jpg"],
  ["title" => "WORK 08", "href" => "./work.php",    "img" => "./assets/img/work/work-8.jpg"],
];

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
  <section class="grid-1920 h-960 index-slider">
    <div class="index-slider__media">
      <img src="./assets/img/slide-1.jpg" alt="SLIDER" loading="lazy">
    </div>
    <div class="index-slider__overlay">
      <div class="index-slider__text">
        <h1>STEMCELL B2C</h1>
        <p class="lead">幹細胞点鼻タイプ｜医療従事者向け情報提供</p>
        <p class="sub">※画像は後で差し替え。いまはスクロール確認用の仮テキスト。</p>
        <a class="btn" href="#concept-upper">CONCEPTへ</a>
      </div>
      <div class="index-slider__scroll">SCROLL</div>
    </div>
  </section>

  <!-- 3) CONCEPT［上］：1920×960（480/480/960） -->
  <section id="concept-upper" class="grid-1920 h-960" style="display:grid; grid-template-columns:480px 480px 960px;">
    <div class="fill" style="background:#eee; display:flex; align-items:center; justify-content:center;">
      INDEX: CONCEPT UPPER / LEFT
    </div>
    <div class="fill" style="background:#e5e5e5; display:flex; align-items:center; justify-content:center;">
      INDEX: CONCEPT UPPER / CENTER
    </div>
    <div class="fill" style="background:#ddd; display:flex; align-items:center; justify-content:center;">
      INDEX: CONCEPT UPPER / RIGHT
    </div>
  </section>

  <!-- 4) CONCEPT［下］：1920×960（960/480/480） -->
  <section class="grid-1920 h-960" style="display:grid; grid-template-columns:960px 480px 480px;">
    <div class="fill" style="background:#ddd; display:flex; align-items:center; justify-content:center;">
      INDEX: CONCEPT LOWER / LEFT
    </div>
    <div class="fill" style="background:#e5e5e5; display:flex; align-items:center; justify-content:center;">
      INDEX: CONCEPT LOWER / CENTER
    </div>
    <div class="fill" style="background:#eee; display:flex; align-items:center; justify-content:center;">
      INDEX: CONCEPT LOWER / RIGHT
    </div>
  </section>

  <!-- 5) WORK：1920×960（480×480 × 8） -->
  <section class="grid-1920 h-960" style="display:grid; grid-template-columns:repeat(4,480px); grid-template-rows:repeat(2,480px);">
    <div class="fill" style="background:#e85d5d; display:flex; align-items:center; justify-content:center; font-size:60px; font-weight:700;">1</div>
    <div class="fill" style="background:#f0b35a; display:flex; align-items:center; justify-content:center; font-size:60px; font-weight:700;">2</div>
    <div class="fill" style="background:#f1e35c; display:flex; align-items:center; justify-content:center; font-size:60px; font-weight:700;">3</div>
    <div class="fill" style="background:#7cc96f; display:flex; align-items:center; justify-content:center; font-size:60px; font-weight:700;">4</div>
    <div class="fill" style="background:#5fb0d8; display:flex; align-items:center; justify-content:center; font-size:60px; font-weight:700;">5</div>
    <div class="fill" style="background:#6c72d9; display:flex; align-items:center; justify-content:center; font-size:60px; font-weight:700;">6</div>
    <div class="fill" style="background:#a56bd8; display:flex; align-items:center; justify-content:center; font-size:60px; font-weight:700;">7</div>
    <div class="fill" style="background:#d870b4; display:flex; align-items:center; justify-content:center; font-size:60px; font-weight:700;">8</div>
  </section>

  <!-- 6) FOOTER：1920×960 -->
  <section class="grid-1920 h-960">
    <div class="fill" style="background:#222; color:#fff; display:flex; align-items:center; justify-content:center; font-size:30px;">
      INDEX: FOOTER / TEXT OK
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
