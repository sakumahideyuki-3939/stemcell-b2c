<?php
$id = isset($_GET['id']) ? (string)$_GET['id'] : '1';

if (!preg_match('/^[1-9][0-9]*$/', $id)) {
  $id = '1';
}

$data_file = __DIR__ . '/data/work.json';
$data = [];

if (is_file($data_file)) {
  $json = file_get_contents($data_file);
  $decoded = json_decode((string)$json, true);
  if (is_array($decoded)) {
    $data = $decoded;
  }
}

if (!isset($data[$id]) || !is_array($data[$id])) {
  $id = '1';
}

$work_title = isset($data[$id]['title']) ? (string)$data[$id]['title'] : 'WORK';
$work_text = isset($data[$id]['text']) ? (string)$data[$id]['text'] : '';

include __DIR__ . '/layout-work.php';
