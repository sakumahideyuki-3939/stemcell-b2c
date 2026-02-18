<?php
// components/work-detail-template.php
// Caller sets: $work_id (int, 1-8)
// Optional: $work_page_title, $work_lead, $work_content

$data_file = __DIR__ . '/../data/work.json';
$works = [];
if (is_file($data_file)) {
  $json = file_get_contents($data_file);
  $decoded = json_decode($json, true);
  if (is_array($decoded)) { $works = $decoded; }
}
ksort($works, SORT_NATURAL);

$id_str = (string)$work_id;
$work = isset($works[$id_str]) ? $works[$id_str] : ['title' => 'WORK ' . sprintf('%02d', $work_id), 'text' => ''];

$ids = array_keys($works);
$pos = array_search($id_str, $ids);
$prev_id = ($pos !== false && $pos > 0) ? $ids[$pos - 1] : null;
$next_id = ($pos !== false && $pos < count($ids) - 1) ? $ids[$pos + 1] : null;

$page_title = isset($work_page_title) ? $work_page_title : $work['title'];
$num = sprintf('%02d', $work_id);
$eyebrow = isset($work['cat']) ? $work['cat'] : 'WORK ' . $num;
$page_description = $page_title . ' — ' . mb_substr($work['text'], 0, 80, 'UTF-8');
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
  <?php include __DIR__ . '/head-meta.php'; ?>
</head>
<body>

<?php include __DIR__ . "/header.php"; ?>

<main>

<!-- Breadcrumb -->
<nav class="page-breadcrumb l-container" aria-label="Breadcrumb">
  <a href="./index.php">HOME</a>
  <span aria-hidden="true">&gt;</span>
  <a href="./work.php">WORKS</a>
  <span aria-hidden="true">&gt;</span>
  <span><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?></span>
</nav>

<!-- Page Hero -->
<section class="page-hero l-section--sunken">
  <div class="l-container t-center">
    <p class="t-micro"><?php echo htmlspecialchars($eyebrow, ENT_QUOTES, 'UTF-8'); ?></p>
    <h1 class="t-h1" style="margin-top:var(--sp-3);"><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?></h1>
    <?php if (!empty($work_lead)): ?>
    <p class="t-body-lg t-secondary" style="margin-top:var(--sp-4);max-width:640px;margin-inline:auto;"><?php echo htmlspecialchars($work_lead, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
  </div>
</section>

<?php if (!isset($work_content)): ?>
<!-- Work Image -->
<section class="l-section">
  <div class="l-container" style="max-width:960px;">
    <img src="./assets/img/work/work-<?php echo $work_id; ?>.jpg" alt="<?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?>" style="width:100%;border-radius:var(--radius-lg);">
  </div>
</section>
<?php endif; ?>

<!-- Work Content -->
<section class="l-section--compact">
  <div class="l-container l-container--narrow">
    <div class="prose">
      <?php if (isset($work_content)): ?>
      <?php echo $work_content; ?>
      <?php else: ?>
      <p><?php echo htmlspecialchars($work['text'], ENT_QUOTES, 'UTF-8'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Prev / Next Nav -->
<nav class="page-nav l-container l-container--narrow" aria-label="Work navigation">
  <div class="page-nav__prev">
    <?php if ($prev_id !== null): ?>
    <a href="./work<?php echo sprintf('%02d', (int)$prev_id); ?>.php" class="c-btn c-btn--ghost">&larr; WORK <?php echo sprintf('%02d', (int)$prev_id); ?></a>
    <?php endif; ?>
  </div>
  <div class="page-nav__next">
    <?php if ($next_id !== null): ?>
    <a href="./work<?php echo sprintf('%02d', (int)$next_id); ?>.php" class="c-btn c-btn--ghost">WORK <?php echo sprintf('%02d', (int)$next_id); ?> &rarr;</a>
    <?php endif; ?>
  </div>
</nav>

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
