<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo 'Method Not Allowed';
  exit;
}

$id = isset($_POST['id']) ? (string)$_POST['id'] : '';
if (!preg_match('/^[1-9][0-9]*$/', $id)) {
  http_response_code(400);
  echo 'Invalid id';
  exit;
}

$title = isset($_POST['title']) ? trim((string)$_POST['title']) : '';
$text = isset($_POST['text']) ? trim((string)$_POST['text']) : '';

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

$data[$id]['title'] = $title;
$data[$id]['text'] = $text;
ksort($data, SORT_NATURAL);

$encoded = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
if ($encoded === false) {
  http_response_code(500);
  echo 'Failed to encode JSON';
  exit;
}

$bytes = file_put_contents($data_file, $encoded . "\n", LOCK_EX);
if ($bytes === false) {
  http_response_code(500);
  echo 'Failed to write file';
  exit;
}

header('Location: edit.php?id=' . rawurlencode($id) . '&saved=1');
exit;
