<?php
/**
 * CONTACT（個人向け無料相談フォーム）
 * - 3ステップフォーム（基本情報 → 相談内容 → 自由記入）
 * - 管理者通知メール + ユーザー自動返信メール
 * - CSRF対策 / レート制限 / ハニーポット
 */

session_start();

/* ====== 設定 ====== */
$ADMIN_NOTIFY_EMAIL = 'celllab@algo-cosme.com';
$ADMIN_FROM_EMAIL   = 'celllab@algo-cosme.com';
$SITE_NAME          = 'ALGO LAB';
$SUBJECT_ADMIN      = '【個人相談】無料相談フォーム受信';
$SUBJECT_USER       = '【受付完了】無料相談を承りました（ALGO LAB）';

/* レート制限 */
$RATE_LIMIT_WINDOW_SEC = 60;
$RATE_LIMIT_MAX        = 3;

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

/* ====== form state ====== */
$errors  = [];
$success = false;

$form = [
  'name'          => '',
  'email'         => '',
  'age_range'     => '',
  'region'        => '',
  'timing'        => '',
  'budget'        => '',
  'message'       => '',
  'institution'   => '',
  'privacy_agree' => '',
  'website'       => '', // honeypot
];
$posted_purposes = [];

/* GETパラメータからpurposeをプリセレクト */
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['purpose'])) {
  $posted_purposes = [normalize_str($_GET['purpose'])];
}

/* ====== POST処理 ====== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (rate_limited($RATE_LIMIT_WINDOW_SEC, $RATE_LIMIT_MAX)) {
    $errors[] = '送信が集中しています。少し時間をおいて再度お試しください。';
  }

  $posted_token = $_POST['csrf_token'] ?? '';
  if (!hash_equals($_SESSION['csrf_token'], $posted_token)) {
    $errors[] = '不正な送信が検知されました。ページを更新して再度お試しください。';
  }

  foreach ($form as $k => $v) {
    $form[$k] = normalize_str($_POST[$k] ?? '');
  }
  $posted_purposes = array_map('normalize_str', $_POST['purpose'] ?? []);

  // honeypot
  if ($form['website'] !== '') {
    $errors[] = '送信に失敗しました。';
  }

  // バリデーション
  if ($form['name'] === '')    $errors[] = '「お名前」を入力してください。';
  if ($form['email'] === '' || !valid_email($form['email'])) $errors[] = '「メールアドレス」を正しく入力してください。';
  if ($form['region'] === '')  $errors[] = '「地域」を選択してください。';
  if (empty($posted_purposes)) $errors[] = '「相談目的」を1つ以上選択してください。';
  if ($form['privacy_agree'] !== '1') $errors[] = '「プライバシーポリシー」に同意してください。';

  if (mb_strlen($form['message']) > 3000) $errors[] = 'ご相談内容が長すぎます（3000文字以内）。';

  if (!$errors) {
    $purpose_str = implode('、', $posted_purposes);

    $adminBody =
      "【個人相談】無料相談フォームを受信しました。\n\n"
      . "■ お名前\n{$form['name']}\n\n"
      . "■ メールアドレス\n{$form['email']}\n\n"
      . "■ 年代\n" . ($form['age_range'] ?: '未選択') . "\n\n"
      . "■ 地域\n{$form['region']}\n\n"
      . "■ 相談目的\n{$purpose_str}\n\n"
      . "■ 希望時期\n" . ($form['timing'] ?: '未選択') . "\n\n"
      . "■ 予算感\n" . ($form['budget'] ?: '未選択') . "\n\n"
      . "■ ご相談内容\n" . ($form['message'] ?: 'なし') . "\n\n"
      . "■ 通院中の医療機関\n" . ($form['institution'] ?: 'なし') . "\n\n"
      . "----\n"
      . "送信IP: " . get_client_ip() . "\n"
      . "UA: " . ($_SERVER['HTTP_USER_AGENT'] ?? '') . "\n"
      . "日時: " . date('Y-m-d H:i:s') . "\n";

    $userBody =
      "{$form['name']} 様\n\n"
      . "{$SITE_NAME} へ無料相談をお申し込みいただき、ありがとうございます。\n"
      . "以下の内容で受付いたしました。\n\n"
      . "──────────────\n"
      . "【受付内容】\n"
      . "お名前：{$form['name']}\n"
      . "地域：{$form['region']}\n"
      . "相談目的：{$purpose_str}\n"
      . "希望時期：" . ($form['timing'] ?: '未選択') . "\n\n"
      . "ご相談内容：\n" . ($form['message'] ?: 'なし') . "\n"
      . "──────────────\n\n"
      . "原則として、営業日24時間以内にメールにてご連絡いたします（土日祝は翌営業日）。\n"
      . "営業電話は行いません。万が一の場合は celllab@algo-cosme.com までご報告ください。\n\n"
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
      $posted_purposes = [];
    } else {
      $errors[] = '送信に失敗しました。時間をおいて再度お試しください。';
    }
  }
}

$page_title = '無料相談フォーム';
$page_description = '幹細胞由来成分についての無料相談フォーム。匿名での相談も可能で、営業電話はありません。約2分で情報整理を始められます。お気軽にご利用ください。';
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
  <title><?php echo h($page_title); ?>｜ALGO LAB</title>
  <?php include __DIR__ . '/components/head-meta.php'; ?>
  <style>
    .hp-field{ position:absolute; left:-9999px; top:-9999px; height:0; overflow:hidden; }
    .alert { border: 1px solid #e8e8e8; padding: 16px 20px; margin: 0 0 24px; font-size: 13px; line-height: 1.8; border-radius: 6px; }
    .alert-error { background: #fef2f2; color:#9a2f2f; border-color: #fecaca; }
    .alert-ok    { background: #f0fdf4; color:#166534; border-color: #bbf7d0; }
  </style>
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
    <h1 class="t-h1" style="margin-top:var(--sp-3);">無料相談</h1>
    <p class="t-body-lg t-secondary" style="margin-top:var(--sp-4);max-width:640px;margin-inline:auto;">まずは、情報を整理するところから。（所要時間：約2分）</p>
    <p style="font-size:12px;color:#888;margin-top:12px;">※無料相談はALGO LABによる情報提供です。医療費は各医療機関にお問い合わせください。</p>
  </div>
</section>

<!-- Step Form -->
<section class="l-section">
  <div class="l-container l-container--narrow">

    <?php if ($success): ?>
      <div class="alert alert-ok">
        送信が完了しました。受付メールをお送りしましたのでご確認ください。<br>
        原則として、24時間以内にメールにてご連絡いたします。
      </div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
      <div class="alert alert-error">
        <?php foreach ($errors as $e): ?>
          ・<?php echo h($e); ?><br>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if (!$success): ?>
    <div class="step-form">
      <div class="step-indicator">
        <span class="step-dot active" data-step="1">1</span>
        <span class="step-dot" data-step="2">2</span>
        <span class="step-dot" data-step="3">3</span>
      </div>

      <form action="" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo h($csrf_token); ?>">

        <!-- honeypot -->
        <div class="hp-field">
          <label>Website</label>
          <input type="text" name="website" value="">
        </div>

        <!-- Step 1: 基本情報 -->
        <div class="step-panel active" data-step="1">
          <div class="form-group">
            <label class="form-label" for="name">お名前（ニックネーム可） <span style="color:var(--danger);">*</span></label>
            <input class="form-input" type="text" id="name" name="name" required placeholder="例：田中 / タナカ" value="<?php echo h($form['name']); ?>">
          </div>
          <div class="form-group">
            <label class="form-label" for="email">メールアドレス <span style="color:var(--danger);">*</span></label>
            <input class="form-input" type="email" id="email" name="email" required placeholder="例：you@example.com" value="<?php echo h($form['email']); ?>">
          </div>
          <div class="form-group">
            <label class="form-label" for="age_range">年代（任意）</label>
            <select class="form-input" id="age_range" name="age_range">
              <?php
                $ages = [''=>'選択してください','20代'=>'20代','30代'=>'30代','40代'=>'40代','50代'=>'50代','60代'=>'60代','70代以上'=>'70代以上'];
                foreach ($ages as $val => $label):
                  $sel = ($form['age_range'] === $val) ? 'selected' : '';
              ?>
                <option value="<?php echo h($val); ?>" <?php echo $sel; ?>><?php echo h($label); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="region">地域 <span style="color:var(--danger);">*</span></label>
            <select class="form-input" id="region" name="region" required>
              <?php
                $regions = [''=>'選択してください','北海道'=>'北海道','東北'=>'東北','関東'=>'関東','中部'=>'中部','近畿'=>'近畿','中国'=>'中国','四国'=>'四国','九州・沖縄'=>'九州・沖縄'];
                foreach ($regions as $val => $label):
                  $sel = ($form['region'] === $val) ? 'selected' : '';
              ?>
                <option value="<?php echo h($val); ?>" <?php echo $sel; ?>><?php echo h($label); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="step-actions">
            <button type="button" class="step-next c-btn c-btn--primary">次へ</button>
          </div>
        </div>

        <!-- Step 2: ご相談内容 -->
        <div class="step-panel" data-step="2">
          <div class="form-group">
            <label class="form-label">相談目的（複数選択可） <span style="color:var(--danger);">*</span></label>
            <div class="form-checkbox-group">
              <?php
                $purposes = ['毛髪について','皮膚・美容について','更年期について','泌尿器機能について','関節・運動器について','生殖医療について','その他'];
                foreach ($purposes as $p):
                  $chk = in_array($p, $posted_purposes) ? 'checked' : '';
              ?>
                <label class="form-checkbox"><input type="checkbox" name="purpose[]" value="<?php echo h($p); ?>" <?php echo $chk; ?>> <?php echo h($p); ?></label>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="timing">希望時期</label>
            <select class="form-input" id="timing" name="timing">
              <?php
                $timings = [''=>'選択してください','できるだけ早く'=>'できるだけ早く','1ヶ月以内'=>'1ヶ月以内','3ヶ月以内'=>'3ヶ月以内','半年以内'=>'半年以内','情報収集中'=>'情報収集中'];
                foreach ($timings as $val => $label):
                  $sel = ($form['timing'] === $val) ? 'selected' : '';
              ?>
                <option value="<?php echo h($val); ?>" <?php echo $sel; ?>><?php echo h($label); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="budget">予算感</label>
            <select class="form-input" id="budget" name="budget">
              <?php
                $budgets = [''=>'選択してください','〜50万円'=>'〜50万円','50〜100万円'=>'50〜100万円','100〜200万円'=>'100〜200万円','200万円〜'=>'200万円〜','まだわからない'=>'まだわからない'];
                foreach ($budgets as $val => $label):
                  $sel = ($form['budget'] === $val) ? 'selected' : '';
              ?>
                <option value="<?php echo h($val); ?>" <?php echo $sel; ?>><?php echo h($label); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="step-actions">
            <button type="button" class="step-prev c-btn c-btn--secondary">戻る</button>
            <button type="button" class="step-next c-btn c-btn--primary">次へ</button>
          </div>
        </div>

        <!-- Step 3: 自由記入 -->
        <div class="step-panel" data-step="3">
          <div class="form-group">
            <label class="form-label" for="message">ご相談内容・気になっていること（任意）</label>
            <textarea class="form-textarea" id="message" name="message" rows="6" placeholder="気になっていることがあればご記入ください。"><?php echo h($form['message']); ?></textarea>
          </div>
          <div class="form-group">
            <label class="form-label" for="institution">通院中の医療機関（任意）</label>
            <input class="form-input" type="text" id="institution" name="institution" placeholder="例：〇〇クリニック" value="<?php echo h($form['institution']); ?>">
          </div>
          <div class="form-group" style="margin-top:var(--sp-5);">
            <label class="privacy-check">
              <input type="checkbox" name="privacy_agree" value="1" <?php echo ($form['privacy_agree']==='1')?'checked':''; ?> required>
              <a href="../../common/privacy.php" target="_blank" rel="noopener">プライバシーポリシー</a>に同意します
            </label>
          </div>
          <div class="step-actions">
            <button type="button" class="step-prev c-btn c-btn--secondary">戻る</button>
            <button type="submit" class="c-btn c-btn--primary c-btn--lg">無料で相談をはじめる</button>
          </div>
        </div>
      </form>
    </div>
    <?php endif; ?>

    <div class="form-trust-signals">
      <p>当社からの営業電話は行いません（万が一の場合は <a href="mailto:celllab@algo-cosme.com">celllab@algo-cosme.com</a> までご報告ください）</p>
      <p>相談したからといって通院を勧めません</p>
      <p>営業日24時間以内にメール返信（土日祝は翌営業日）</p>
    </div>
  </div>
</section>

</main>

<?php include __DIR__ . "/components/footer.php"; ?>
