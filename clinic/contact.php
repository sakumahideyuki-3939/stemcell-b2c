<?php
/**
 * CONTACT（法人のみフォーム化 + 960×1440（左右）に収める版）
 * - 上：CONTACT 見出し（480）
 * - 下：2カラム（左960 / 右960）高さ1440固定
 *   - 左：上480（一般+メディア）／下960（法人フォーム：中だけスクロール）
 *   - 右：1440（メッセージ）
 *
 * ✅ 方針
 * - main.cssは極力触らない
 * - 高さ指定はレイアウト部のみ inline style で固定
 * - フォームは「箱の中だけスクロール」＝はみ出しゼロ
 */

session_start();

/* ====== 設定（ここだけ調整） ====== */
$ADMIN_NOTIFY_EMAIL = 'lab@algo-cosme.com';          // 運営側の受信先（法人問い合わせ）
$ADMIN_FROM_EMAIL   = 'lab@algo-cosme.com';     // 送信元（あなたのドメイン推奨）
$SITE_NAME          = 'ALGO Inc.';
$SUBJECT_ADMIN      = '【法人問い合わせ】コンタクトフォーム受信';
$SUBJECT_USER       = '【受付完了】法人お問い合わせを承りました（ALGO Inc.）';

/* レート制限 */
$RATE_LIMIT_WINDOW_SEC = 60;  // 60秒
$RATE_LIMIT_MAX        = 3;   // 60秒内3回まで

/* ====== util ====== */
function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function normalize_str($s){
  $s = trim((string)$s);
  $s = str_replace(["\r\n","\r"], "\n", $s);
  return $s;
}
function valid_email($email){ return (bool)filter_var($email, FILTER_VALIDATE_EMAIL); }
function get_client_ip(){ return $_SERVER['REMOTE_ADDR'] ?? 'unknown'; }

function rate_limited($windowSec, $max){
  $ip = get_client_ip();
  $key = 'rate_' . md5($ip);
  if (!isset($_SESSION[$key])) $_SESSION[$key] = [];

  $now = time();
  $_SESSION[$key] = array_values(array_filter($_SESSION[$key], function($t) use ($now, $windowSec){
    return ($now - $t) < $windowSec;
  }));

  if (count($_SESSION[$key]) >= $max) return true;

  $_SESSION[$key][] = $now;
  return false;
}

/* ====== CSRF ====== */
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

/* ====== form state: 法人お問い合わせ ====== */
$errors  = [];
$success = false;

$form = [
  'company'    => '',
  'name'       => '',
  'title'      => '',
  'email'      => '',
  'tel'        => '',
  'prefecture' => '',
  'category'   => '',
  'timeline'   => '',
  'message'    => '',
  'privacy'    => '',
  'website'    => '', // honeypot
];

/* ====== form state: サンプル請求 ====== */
$sample_errors  = [];
$sample_success = false;

$sample_form = [
  'sample_clinic'  => '',
  'sample_doctor'  => '',
  'sample_email'   => '',
  'sample_tel'     => '',
  'sample_qty'     => '',
  'sample_current' => '',
  'sample_message' => '',
  'sample_privacy' => '',
  'sample_hp'      => '', // honeypot
];

/* ====== POST ====== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $form_type = $_POST['form_type'] ?? '';

  if (rate_limited($RATE_LIMIT_WINDOW_SEC, $RATE_LIMIT_MAX)) {
    if ($form_type === 'sample') {
      $sample_errors[] = '送信が集中しています。少し時間をおいて再度お試しください。';
    } else {
      $errors[] = '送信が集中しています。少し時間をおいて再度お試しください。';
    }
  }

  $posted_token = $_POST['csrf_token'] ?? '';
  if (!hash_equals($_SESSION['csrf_token'], $posted_token)) {
    if ($form_type === 'sample') {
      $sample_errors[] = '不正な送信が検知されました。ページを更新して再度お試しください。';
    } else {
      $errors[] = '不正な送信が検知されました。ページを更新して再度お試しください。';
    }
  }

  /* --- サンプル請求フォーム処理 --- */
  if ($form_type === 'sample') {
    foreach ($sample_form as $k => $v) {
      $sample_form[$k] = normalize_str($_POST[$k] ?? '');
    }

    if ($sample_form['sample_hp'] !== '') {
      $sample_errors[] = '送信に失敗しました。';
    }

    if ($sample_form['sample_clinic'] === '') $sample_errors[] = '「クリニック名」を入力してください。';
    if ($sample_form['sample_doctor'] === '')  $sample_errors[] = '「医師名」を入力してください。';
    if ($sample_form['sample_email'] === '' || !valid_email($sample_form['sample_email'])) $sample_errors[] = '「メールアドレス」を正しく入力してください。';
    if ($sample_form['sample_qty'] === '') $sample_errors[] = '「希望数量」を選択してください。';
    if ($sample_form['sample_privacy'] !== '1') $sample_errors[] = '「個人情報の取り扱い」に同意してください。';

    if (!$sample_errors) {
      $qty_label = $sample_form['sample_qty'] . 'バイアル';

      $adminBody =
        "【サンプル請求】を受信しました。\n\n"
        . "■ クリニック名\n{$sample_form['sample_clinic']}\n\n"
        . "■ 医師名\n{$sample_form['sample_doctor']}\n\n"
        . "■ メールアドレス\n{$sample_form['sample_email']}\n\n"
        . "■ 電話番号\n{$sample_form['sample_tel']}\n\n"
        . "■ 希望数量\n{$qty_label}\n\n"
        . "■ 現在使用中の上清液製品名\n{$sample_form['sample_current']}\n\n"
        . "■ メッセージ\n{$sample_form['sample_message']}\n\n"
        . "----\n"
        . "送信IP: " . get_client_ip() . "\n"
        . "UA: " . ($_SERVER['HTTP_USER_AGENT'] ?? '') . "\n"
        . "日時: " . date('Y-m-d H:i:s') . "\n";

      $userBody =
        "{$sample_form['sample_doctor']} 先生\n\n"
        . "{$SITE_NAME} へサンプル請求をいただき、ありがとうございます。\n"
        . "以下の内容で受付いたしました。\n\n"
        . "──────────────\n"
        . "【受付内容】\n"
        . "クリニック名：{$sample_form['sample_clinic']}\n"
        . "希望数量：{$qty_label}\n"
        . "現在使用中の上清液製品名：{$sample_form['sample_current']}\n\n"
        . "メッセージ：\n{$sample_form['sample_message']}\n"
        . "──────────────\n\n"
        . "原則として、1〜2営業日以内に担当よりご連絡いたします。\n"
        . "お急ぎの場合は本メールへの返信にてご連絡ください。\n\n"
        . "{$SITE_NAME}\n";

      $adminHeaders = [
        "From: {$SITE_NAME} <{$ADMIN_FROM_EMAIL}>",
        "Reply-To: {$sample_form['sample_email']}",
        "Content-Type: text/plain; charset=UTF-8",
      ];
      $userHeaders = [
        "From: {$SITE_NAME} <{$ADMIN_FROM_EMAIL}>",
        "Reply-To: {$ADMIN_NOTIFY_EMAIL}",
        "Content-Type: text/plain; charset=UTF-8",
      ];

      $ok1 = @mail($ADMIN_NOTIFY_EMAIL, '【サンプル請求】幹細胞生搾り濾液', $adminBody, implode("\r\n", $adminHeaders));
      $ok2 = @mail($sample_form['sample_email'], '【受付完了】サンプル請求を承りました（ALGO Inc.）', $userBody, implode("\r\n", $userHeaders));

      if ($ok1 && $ok2) {
        $sample_success = true;
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $csrf_token = $_SESSION['csrf_token'];
        foreach ($sample_form as $k => $v) $sample_form[$k] = '';
      } else {
        $sample_errors[] = '送信に失敗しました。時間をおいて再度お試しください。';
      }
    }

  /* --- 法人お問い合わせフォーム処理 --- */
  } else {
    foreach ($form as $k => $v) {
      $form[$k] = normalize_str($_POST[$k] ?? '');
    }

    if ($form['website'] !== '') {
      $errors[] = '送信に失敗しました。';
    }

    if ($form['company'] === '') $errors[] = '「クリニック名 / 法人名」を入力してください。';
    if ($form['name'] === '')    $errors[] = '「ご担当者名」を入力してください。';
    if ($form['email'] === '' || !valid_email($form['email'])) $errors[] = '「メールアドレス」を正しく入力してください。';
    if ($form['category'] === '') $errors[] = '「お問い合わせ種別」を選択してください。';
    if ($form['message'] === '')  $errors[] = '「お問い合わせ内容」を入力してください。';
    if ($form['privacy'] !== '1') $errors[] = '「個人情報の取り扱い」に同意してください。';

    if (mb_strlen($form['message']) > 3000) $errors[] = 'お問い合わせ内容が長すぎます（3000文字以内）。';

    if (!$errors) {
      $adminBody =
        "法人お問い合わせを受信しました。\n\n"
        . "■ クリニック名 / 法人名\n{$form['company']}\n\n"
        . "■ ご担当者名\n{$form['name']}\n\n"
        . "■ 役職\n{$form['title']}\n\n"
        . "■ メール\n{$form['email']}\n\n"
        . "■ 電話\n{$form['tel']}\n\n"
        . "■ 都道府県\n{$form['prefecture']}\n\n"
        . "■ お問い合わせ種別\n{$form['category']}\n\n"
        . "■ 導入時期\n{$form['timeline']}\n\n"
        . "■ お問い合わせ内容\n{$form['message']}\n\n"
        . "----\n"
        . "送信IP: " . get_client_ip() . "\n"
        . "UA: " . ($_SERVER['HTTP_USER_AGENT'] ?? '') . "\n"
        . "日時: " . date('Y-m-d H:i:s') . "\n";

      $userBody =
        "{$form['name']} 様\n\n"
        . "{$SITE_NAME} へ法人お問い合わせをいただき、ありがとうございます。\n"
        . "以下の内容で受付いたしました。\n\n"
        . "──────────────\n"
        . "【受付内容】\n"
        . "クリニック名 / 法人名：{$form['company']}\n"
        . "お問い合わせ種別：{$form['category']}\n"
        . "導入時期：{$form['timeline']}\n\n"
        . "お問い合わせ内容：\n{$form['message']}\n"
        . "──────────────\n\n"
        . "原則として、1〜2営業日以内に担当よりご連絡いたします。\n"
        . "お急ぎの場合は本メールへの返信にてご連絡ください。\n\n"
        . "{$SITE_NAME}\n";

      $adminHeaders = [
        "From: {$SITE_NAME} <{$ADMIN_FROM_EMAIL}>",
        "Reply-To: {$form['email']}",
        "Content-Type: text/plain; charset=UTF-8",
      ];
      $userHeaders = [
        "From: {$SITE_NAME} <{$ADMIN_FROM_EMAIL}>",
        "Reply-To: {$ADMIN_NOTIFY_EMAIL}",
        "Content-Type: text/plain; charset=UTF-8",
      ];

      $ok1 = @mail($ADMIN_NOTIFY_EMAIL, $SUBJECT_ADMIN, $adminBody, implode("\r\n", $adminHeaders));
      $ok2 = @mail($form['email'], $SUBJECT_USER, $userBody, implode("\r\n", $userHeaders));

      if ($ok1 && $ok2) {
        $success = true;
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $csrf_token = $_SESSION['csrf_token'];
        foreach ($form as $k => $v) $form[$k] = '';
      } else {
        $errors[] = '送信に失敗しました。時間をおいて再度お試しください。';
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT｜導入相談・資料請求・お問い合わせ | ALGO Inc.</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/ga4.php'; ?>
    <meta name="description" content="幹細胞生搾り濾液（Lysate）の導入相談・資料請求・サンプル依頼はこちら。クリニック・法人様向けお問い合わせフォーム。">
    <meta property="og:title" content="CONTACT｜導入相談・資料請求・お問い合わせ">
    <meta property="og:description" content="幹細胞生搾り濾液の導入相談・資料請求・サンプル依頼。クリニック・法人様向け。">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://lab.algo-cosme.com/clinic/contact.php">
    <meta property="og:site_name" content="ALGO Inc. | 幹細胞生搾り">
    <link rel="canonical" href="https://lab.algo-cosme.com/clinic/contact.php">
  <link rel="stylesheet" href="./assets/css/main.css?v=<?php echo time(); ?>">

  <style>
    /* 既存の世界観は維持。フォーム周りのみ最小の追加。 */
    .inner-pad-center { padding: 80px 60px; height: 100%; display: flex; flex-direction: column; justify-content: center; }
    .contact-info-block { margin-bottom: 40px; }
    .contact-info-block h3 { font-size: 14px; letter-spacing: 0.1em; margin-bottom: 10px; color: #2f2f2f; }
    .contact-info-block p  { font-size: 13px; line-height: 1.8; color: #666; }

    /* form */
    .biz-form { margin-top: 18px; border-top: 1px solid #f0f0f0; padding-top: 18px; }
    .biz-form .row { margin-bottom: 12px; }
    .biz-form label { display:block; font-size: 11px; letter-spacing: .12em; color:#666; margin-bottom: 6px; }
    .biz-form input,
    .biz-form select,
    .biz-form textarea{
      width: 100%;
      border: 1px solid #e8e8e8;
      background: #fff;
      padding: 10px 12px;
      font-size: 13px;
      line-height: 1.6;
      outline: none;
    }
    .biz-form textarea{ min-height: 120px; resize: vertical; }
    .biz-form .help { font-size: 11px; color:#888; line-height: 1.6; margin-top: 6px; }
    .biz-form .actions { margin-top: 16px; display:flex; gap: 10px; align-items: center; }
    .biz-form button{
      border: 1px solid #2f2f2f;
      background: #2f2f2f;
      color: #fff;
      padding: 10px 16px;
      font-size: 12px;
      letter-spacing: .12em;
      cursor: pointer;
    }
    .biz-form button:hover{ opacity:.9; }
    .biz-form .privacy { display:flex; gap:8px; align-items:flex-start; margin-top: 10px; }
    .biz-form .privacy input{ width:auto; margin-top: 3px; }
    .biz-form .privacy span{ font-size: 11px; color:#666; line-height: 1.6; }

    .alert { border: 1px solid #e8e8e8; padding: 12px 14px; margin: 12px 0 0; font-size: 12px; line-height: 1.8; }
    .alert-error { background: #fff; color:#9a2f2f; }
    .alert-ok    { background: #fff; color:#2f6b2f; }

    .hp-field{ position:absolute; left:-9999px; top:-9999px; height:0; overflow:hidden; }

    @media (max-width: 768px) {
        .biz-form button { min-height: 44px; padding: 12px 20px; }
        .contact-info-block h3 { font-size: 13px; }
        .contact-info-block p { font-size: 12px; }
    }
  </style>
</head>

<body class="page-contact">
<div class="algo-site">
  <?php include(__DIR__ . '/components/header.php'); ?>

  <!-- 上：CONTACT 見出し（480） -->
  <section class="grid-row" style="height: 480px;">
    <div class="u-4">
      <div class="inner-pad-center" style="align-items: center; text-align: center;">
        <div class="addr-tag">ADDRESS: A1 - D2 / CONTACT</div>
        <h1 style="font-size: 32px; letter-spacing: 0.4em;">CONTACT</h1>
        <p style="margin-top:20px; color:#888; font-size:12px; letter-spacing:0.2em;">お問い合わせ</p>
      </div>
    </div>
  </section>

  <!-- 下：2カラム（左右 960×1440 固定） -->
  <section class="grid-row" style="border-top: 1px solid #f0f0f0; height:1440px;">

    <!-- 左：1440固定（上480 + 下960） -->
    <div class="u-double bg-white" style="height:1440px; display:flex; flex-direction:column;">

      <!-- 左上：480（一般 + メディア） -->
      <div style="height:480px; border-bottom:1px solid #f0f0f0;">
        <div class="inner-pad-center" style="justify-content:flex-start;">
          <div class="addr-tag">ADDRESS: A3 - B4 / CHANNELS</div>

          <div class="contact-info-block">
            <h3>一般のお問い合わせ</h3>
            <p>ALGO Inc. 全般に関するご質問、その他全般的なお問い合わせはこちらから。</p>
            <p>Email: lab@algo-cosme.com / Tel: 03-6805-0781</p>
          </div>

          <div class="contact-info-block" style="margin-bottom:0;">
            <h3>メディア・講演依頼</h3>
            <p>取材・セミナー登壇・社内研修などのご依頼。</p>
            <p>Email: lab@algo-cosme.com</p>
          </div>
        </div>
      </div>

      <!-- 左下：960（法人フォーム：中だけスクロール） -->
      <div style="height:960px;">
        <div class="inner-pad-center" style="justify-content:flex-start; height:100%; overflow:auto;">
          <div class="addr-tag">ADDRESS: A5 - B6 / BUSINESS FORM</div>

          <div class="contact-info-block" style="margin-bottom:16px;">
            <h3>クリニック・法人様（フォーム）</h3>
            <p>美容皮膚科向けEC「ALGO-COSME」、幹細胞・試薬、AI導入支援など。</p>
            <p class="help">※ 原則として 1〜2営業日以内にご返信いたします。</p>
          </div>

          <?php if ($success): ?>
            <div class="alert alert-ok">
              送信が完了しました。受付メールをお送りしましたのでご確認ください。
            </div>
          <?php endif; ?>

          <?php if (!empty($errors)): ?>
            <div class="alert alert-error">
              <?php foreach ($errors as $e): ?>
                ・<?php echo h($e); ?><br>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <form class="biz-form" method="post" action="">
            <input type="hidden" name="csrf_token" value="<?php echo h($csrf_token); ?>">
            <input type="hidden" name="form_type" value="contact">

            <!-- honeypot -->
            <div class="hp-field">
              <label>Website</label>
              <input type="text" name="website" value="">
            </div>

            <div class="row">
              <label for="company">クリニック名 / 法人名 <span style="color:#999;">(必須)</span></label>
              <input id="company" name="company" type="text" value="<?php echo h($form['company']); ?>" required>
            </div>

            <div class="row">
              <label for="name">ご担当者名 <span style="color:#999;">(必須)</span></label>
              <input id="name" name="name" type="text" value="<?php echo h($form['name']); ?>" required>
            </div>

            <div class="row">
              <label for="title">役職</label>
              <input id="title" name="title" type="text" value="<?php echo h($form['title']); ?>">
            </div>

            <div class="row">
              <label for="email">メールアドレス <span style="color:#999;">(必須)</span></label>
              <input id="email" name="email" type="email" value="<?php echo h($form['email']); ?>" required>
            </div>

            <div class="row">
              <label for="tel">電話番号</label>
              <input id="tel" name="tel" type="tel" value="<?php echo h($form['tel']); ?>" placeholder="例：03-xxxx-xxxx">
            </div>

            <div class="row">
              <label for="prefecture">都道府県</label>
              <select id="prefecture" name="prefecture">
                <?php
                  $prefs = ['','北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'];
                  foreach ($prefs as $p):
                    $sel = ($form['prefecture'] === $p) ? 'selected' : '';
                ?>
                  <option value="<?php echo h($p); ?>" <?php echo $sel; ?>>
                    <?php echo $p === '' ? '選択してください' : h($p); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="row">
              <label for="category">お問い合わせ種別 <span style="color:#999;">(必須)</span></label>
              <select id="category" name="category" required>
                <?php
                  $cats = [
                    '' => '選択してください',
                    '資料請求' => '資料請求',
                    'サンプル依頼' => 'サンプル依頼',
                    '導入相談' => '導入相談',
                    '価格確認' => '価格確認',
                    'その他' => 'その他',
                  ];
                  foreach ($cats as $val => $label):
                    $sel = ($form['category'] === $val) ? 'selected' : '';
                ?>
                  <option value="<?php echo h($val); ?>" <?php echo $sel; ?>>
                    <?php echo h($label); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="row">
              <label for="timeline">導入時期</label>
              <select id="timeline" name="timeline">
                <?php
                  $times = [
                    '' => '選択してください',
                    'すぐに検討したい' => 'すぐに検討したい',
                    '1〜3ヶ月以内' => '1〜3ヶ月以内',
                    '3ヶ月以降' => '3ヶ月以降',
                    '未定（情報収集中）' => '未定（情報収集中）',
                  ];
                  foreach ($times as $val => $label):
                    $sel = ($form['timeline'] === $val) ? 'selected' : '';
                ?>
                  <option value="<?php echo h($val); ?>" <?php echo $sel; ?>>
                    <?php echo h($label); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="row">
              <label for="message">お問い合わせ内容 <span style="color:#999;">(必須)</span></label>
              <textarea id="message" name="message" required><?php echo h($form['message']); ?></textarea>
              <div class="help">※ 患者さま等の個人情報（氏名・連絡先・症状詳細など）の記載はお控えください。</div>
            </div>

            <div class="privacy">
              <input id="privacy" name="privacy" type="checkbox" value="1" <?php echo ($form['privacy']==='1')?'checked':''; ?> required>
              <span>
                個人情報の取り扱いに同意します。<br>
                <a href="../common/privacy.php" style="color:#666; text-decoration: underline;">プライバシーポリシー</a> をご確認ください。
              </span>
            </div>

            <div class="actions">
              <button type="submit">SEND</button>
              <span class="help">送信後、受付メールが届きます。</span>
            </div>
          </form>

          <p style="margin-top:14px; font-size:11px; color:#888; line-height:1.6;">
            ※ フォームが利用できない場合は、<br>
            Email: <?php echo h($ADMIN_NOTIFY_EMAIL); ?> へご連絡ください。
          </p>
        </div>
      </div>
    </div>

    <!-- 右：1440固定 -->
    <div class="u-double bg-soft" style="height:1440px;">
      <div class="inner-pad-center" style="align-items:center; text-align:center;">
        <div class="addr-tag">ADDRESS: C3 - D6 / MESSAGE</div>
        <p style="font-size: 16px; line-height: 2.5; letter-spacing: 0.1em;">
          現場の「問い」から、<br>
          新しい価値を共に創り出す。<br><br>
          ご連絡を心よりお待ちしております。
        </p>
      </div>
    </div>

  </section>

  <!-- サンプル請求フォーム -->
  <section id="sample" class="grid-row" style="border-top: 1px solid #f0f0f0;">

    <!-- 左：サンプル請求フォーム -->
    <div class="u-double bg-white" style="min-height:960px; display:flex; flex-direction:column;">
      <div class="inner-pad-center" style="justify-content:flex-start; height:100%; overflow:auto;">
        <div class="addr-tag">SAMPLE REQUEST</div>

        <div class="contact-info-block" style="margin-bottom:16px;">
          <h3>サンプル請求フォーム</h3>
          <p>サンプルは無償配布していません。サンプル価格についてはご相談に応じます。</p>
          <p class="help" style="margin-top:8px;">※ 医療機関様限定。原則1〜2営業日以内にご連絡いたします。</p>
        </div>

        <?php if ($sample_success): ?>
          <div class="alert alert-ok">
            サンプル請求を受付しました。受付メールをお送りしましたのでご確認ください。
          </div>
        <?php endif; ?>

        <?php if (!empty($sample_errors)): ?>
          <div class="alert alert-error">
            <?php foreach ($sample_errors as $e): ?>
              ・<?php echo h($e); ?><br>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <form class="biz-form" method="post" action="#sample">
          <input type="hidden" name="csrf_token" value="<?php echo h($csrf_token); ?>">
          <input type="hidden" name="form_type" value="sample">

          <!-- honeypot -->
          <div class="hp-field">
            <label>Website</label>
            <input type="text" name="sample_hp" value="">
          </div>

          <div class="row">
            <label for="sample_clinic">クリニック名 <span style="color:#999;">(必須)</span></label>
            <input id="sample_clinic" name="sample_clinic" type="text" value="<?php echo h($sample_form['sample_clinic']); ?>" required>
          </div>

          <div class="row">
            <label for="sample_doctor">医師名 <span style="color:#999;">(必須)</span></label>
            <input id="sample_doctor" name="sample_doctor" type="text" value="<?php echo h($sample_form['sample_doctor']); ?>" required>
          </div>

          <div class="row">
            <label for="sample_email">メールアドレス <span style="color:#999;">(必須)</span></label>
            <input id="sample_email" name="sample_email" type="email" value="<?php echo h($sample_form['sample_email']); ?>" required>
          </div>

          <div class="row">
            <label for="sample_tel">電話番号</label>
            <input id="sample_tel" name="sample_tel" type="tel" value="<?php echo h($sample_form['sample_tel']); ?>" placeholder="例：03-xxxx-xxxx">
          </div>

          <div class="row">
            <label for="sample_qty">希望数量 <span style="color:#999;">(必須)</span></label>
            <select id="sample_qty" name="sample_qty" required>
              <?php
                $qtys = ['' => '選択してください', '1' => '1バイアル', '2' => '2バイアル', '3' => '3バイアル'];
                foreach ($qtys as $val => $label):
                  $sel = ($sample_form['sample_qty'] === $val) ? 'selected' : '';
              ?>
                <option value="<?php echo h($val); ?>" <?php echo $sel; ?>>
                  <?php echo h($label); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="row">
            <label for="sample_current">現在使用中の上清液製品名</label>
            <input id="sample_current" name="sample_current" type="text" value="<?php echo h($sample_form['sample_current']); ?>" placeholder="例：○○社 培養上清液">
          </div>

          <div class="row">
            <label for="sample_message">メッセージ</label>
            <textarea id="sample_message" name="sample_message" style="min-height:80px;"><?php echo h($sample_form['sample_message']); ?></textarea>
          </div>

          <div class="privacy">
            <input id="sample_privacy" name="sample_privacy" type="checkbox" value="1" <?php echo ($sample_form['sample_privacy']==='1')?'checked':''; ?> required>
            <span>
              個人情報の取り扱いに同意します。<br>
              <a href="../common/privacy.php" style="color:#666; text-decoration: underline;">プライバシーポリシー</a> をご確認ください。
            </span>
          </div>

          <div class="actions">
            <button type="submit">サンプルを請求する</button>
            <span class="help">送信後、受付メールが届きます。</span>
          </div>
        </form>
      </div>
    </div>

    <!-- 右：サンプル説明 -->
    <div class="u-double bg-light" style="min-height:960px;">
      <div class="inner-pad-center" style="align-items:center; text-align:center;">
        <div class="addr-tag">SAMPLE INFO</div>
        <h2 style="font-size:20px; letter-spacing:0.2em; margin-bottom:30px;">サンプルについて</h2>
        <div style="max-width:480px; text-align:left;">
          <div style="padding:20px 0; border-bottom:1px solid #e8e8e8;">
            <p style="font-size:10px; color:#0071E3; letter-spacing:0.15em; font-weight:600;">STEP 1</p>
            <p style="font-size:13px; font-weight:600; margin-top:4px;">フォームからお申し込み</p>
            <p style="font-size:11px; color:#555; margin-top:4px; line-height:1.7;">左のフォームに必要事項をご記入のうえ、送信してください。</p>
          </div>
          <div style="padding:20px 0; border-bottom:1px solid #e8e8e8;">
            <p style="font-size:10px; color:#0071E3; letter-spacing:0.15em; font-weight:600;">STEP 2</p>
            <p style="font-size:13px; font-weight:600; margin-top:4px;">サンプル発送</p>
            <p style="font-size:11px; color:#555; margin-top:4px; line-height:1.7;">担当よりご連絡のうえ、サンプルと製品資料をお送りします。</p>
          </div>
          <div style="padding:20px 0;">
            <p style="font-size:10px; color:#0071E3; letter-spacing:0.15em; font-weight:600;">STEP 3</p>
            <p style="font-size:13px; font-weight:600; margin-top:4px;">比較・ご評価</p>
            <p style="font-size:11px; color:#555; margin-top:4px; line-height:1.7;">現行の培養上清液と比較施術していただき、導入可否をご判断ください。</p>
          </div>
        </div>
        <p style="font-size:10px; color:#999; margin-top:30px; line-height:1.8;">
          ※ 本製品は研究用試薬です。<br>
          ※ サンプルは医療機関様限定です。
        </p>
      </div>
    </div>

  </section>

  <?php include(__DIR__ . '/components/footer.php'); ?>
</div>
</body>
</html>
