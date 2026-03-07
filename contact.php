<?php
$page_title = '無料相談フォーム';
$page_description = '幹細胞治療についての無料相談フォーム。匿名での相談も可能で、営業電話は一切ありません。約2分で情報整理を始められます。お気軽にご利用ください。';
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
  <title><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?>｜ALGO LAB</title>
  <?php include __DIR__ . '/components/head-meta.php'; ?>
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
  </div>
</section>

<!-- Step Form -->
<section class="l-section">
  <div class="l-container l-container--narrow">
    <div class="step-form">
      <div class="step-indicator">
        <span class="step-dot active" data-step="1">1</span>
        <span class="step-dot" data-step="2">2</span>
        <span class="step-dot" data-step="3">3</span>
      </div>

      <form action="#" method="post">
        <!-- Step 1: 基本情報 -->
        <div class="step-panel active" data-step="1">
          <div class="form-group">
            <label class="form-label" for="name">お名前（ニックネーム可） <span style="color:var(--danger);">*</span></label>
            <input class="form-input" type="text" id="name" name="name" required placeholder="例：田中 / タナカ">
          </div>
          <div class="form-group">
            <label class="form-label" for="email">メールアドレス <span style="color:var(--danger);">*</span></label>
            <input class="form-input" type="email" id="email" name="email" required placeholder="info@example.com">
          </div>
          <div class="form-group">
            <label class="form-label" for="age_range">年代（任意）</label>
            <select class="form-input" id="age_range" name="age_range">
              <option value="">選択してください</option>
              <option value="20代">20代</option>
              <option value="30代">30代</option>
              <option value="40代">40代</option>
              <option value="50代">50代</option>
              <option value="60代">60代</option>
              <option value="70代以上">70代以上</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="region">地域 <span style="color:var(--danger);">*</span></label>
            <select class="form-input" id="region" name="region" required>
              <option value="">選択してください</option>
              <option value="北海道">北海道</option>
              <option value="東北">東北</option>
              <option value="関東">関東</option>
              <option value="中部">中部</option>
              <option value="近畿">近畿</option>
              <option value="中国">中国</option>
              <option value="四国">四国</option>
              <option value="九州・沖縄">九州・沖縄</option>
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
              <label class="form-checkbox"><input type="checkbox" name="purpose[]" value="ED"> ED</label>
              <label class="form-checkbox"><input type="checkbox" name="purpose[]" value="慢性痛"> 慢性痛</label>
              <label class="form-checkbox"><input type="checkbox" name="purpose[]" value="脳梗塞後遺症"> 脳梗塞後遺症</label>
              <label class="form-checkbox"><input type="checkbox" name="purpose[]" value="AGA"> AGA</label>
              <label class="form-checkbox"><input type="checkbox" name="purpose[]" value="美容エイジングケア"> 美容エイジングケア</label>
              <label class="form-checkbox"><input type="checkbox" name="purpose[]" value="その他"> その他</label>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="timing">希望時期</label>
            <select class="form-input" id="timing" name="timing">
              <option value="">選択してください</option>
              <option value="できるだけ早く">できるだけ早く</option>
              <option value="1ヶ月以内">1ヶ月以内</option>
              <option value="3ヶ月以内">3ヶ月以内</option>
              <option value="半年以内">半年以内</option>
              <option value="情報収集中">情報収集中</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="budget">予算感</label>
            <select class="form-input" id="budget" name="budget">
              <option value="">選択してください</option>
              <option value="〜50万円">〜50万円</option>
              <option value="50〜100万円">50〜100万円</option>
              <option value="100〜200万円">100〜200万円</option>
              <option value="200万円〜">200万円〜</option>
              <option value="まだわからない">まだわからない</option>
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
            <textarea class="form-textarea" id="message" name="message" rows="6" placeholder="現在の症状や気になっていることがあればご記入ください。"></textarea>
          </div>
          <div class="form-group">
            <label class="form-label" for="institution">通院中の医療機関（任意）</label>
            <input class="form-input" type="text" id="institution" name="institution" placeholder="例：〇〇クリニック">
          </div>
          <div class="step-actions">
            <button type="button" class="step-prev c-btn c-btn--secondary">戻る</button>
            <button type="submit" class="c-btn c-btn--primary c-btn--lg">無料で相談をはじめる</button>
          </div>
        </div>
      </form>
    </div>

    <div class="form-trust-signals">
      <p>営業電話は一切いたしません</p>
      <p>相談したからといって通院を勧めません</p>
      <p>24時間以内にメール返信</p>
    </div>
  </div>
</section>

</main>

<?php include __DIR__ . "/components/footer.php"; ?>
