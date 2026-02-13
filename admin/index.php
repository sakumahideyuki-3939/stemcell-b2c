<?php
$data_file = dirname(__DIR__) . '/data/work.json';
$data = [];

if (is_file($data_file)) {
  $json = file_get_contents($data_file);
  $decoded = json_decode((string)$json, true);
  if (is_array($decoded)) {
    $data = $decoded;
  }
}

ksort($data, SORT_NATURAL);
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WORK Admin</title>
</head>
<body>
  <h1>WORK Admin</h1>
  <p><a href="../work.php?id=1" target="_blank" rel="noopener">公開ページを確認</a></p>
  <ul>
    <?php foreach ($data as $id => $item): ?>
      <li>
        #<?php echo htmlspecialchars((string)$id, ENT_QUOTES, 'UTF-8'); ?>
        : <?php echo htmlspecialchars((string)($item['title'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
        [<a href="edit.php?id=<?php echo rawurlencode((string)$id); ?>">編集</a>]
        [<a href="../work.php?id=<?php echo rawurlencode((string)$id); ?>" target="_blank" rel="noopener">表示</a>]
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
