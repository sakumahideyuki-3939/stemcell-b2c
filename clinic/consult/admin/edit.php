<?php
$id = isset($_GET['id']) ? (string)$_GET['id'] : '1';
if (!preg_match('/^[1-9][0-9]*$/', $id)) {
  $id = '1';
}

$data_file = dirname(__DIR__) . '/data/work.json';
$data = [];

if (is_file($data_file)) {
  $json = file_get_contents($data_file);
  $decoded = json_decode((string)$json, true);
  if (is_array($decoded)) {
    $data = $decoded;
  }
}

if (!isset($data[$id]) || !is_array($data[$id])) {
  http_response_code(404);
  echo 'ID not found';
  exit;
}

$title = (string)($data[$id]['title'] ?? '');
$text = (string)($data[$id]['text'] ?? '');
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WORK #<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?> 編集</title>
</head>
<body>
  <h1>WORK #<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?> 編集</h1>
  <form method="post" action="save.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>">

    <div>
      <label for="title">タイトル</label><br>
      <input id="title" name="title" type="text" value="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" style="width: 480px; max-width: 100%;">
    </div>

    <div style="margin-top: 12px;">
      <label for="text">本文</label><br>
      <textarea id="text" name="text" rows="10" style="width: 720px; max-width: 100%;"><?php echo htmlspecialchars($text, ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <div style="margin-top: 12px;">
      <button type="submit">保存</button>
      <a href="index.php">一覧へ戻る</a>
      <a href="../work.php?id=<?php echo rawurlencode($id); ?>" target="_blank" rel="noopener">公開ページを表示</a>
    </div>
  </form>
</body>
</html>
