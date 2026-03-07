<?php
$page_title = "幹細胞治療の無料相談・情報整理サイト";
$page_description = "幹細胞治療の情報を整理し、あなたに合う医療機関への無料相談をサポート。売り込みなし・匿名可・営業電話なし。研究が進む再生医療分野の判断材料を提供します。";

// Load work data
$work_json = file_get_contents(__DIR__ . '/data/work.json');
$works = json_decode($work_json, true);
if (!is_array($works)) { $works = []; }
ksort($works, SORT_NATURAL);
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
  <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>

<?php include __DIR__ . "/components/header.php"; ?>

<main>

<!-- T1: Hero Slider -->
<section class="hero-slider" aria-label="Hero">
  <div class="hero-slider__track">
    <div class="hero-slider__slide hero-slider__slide--bg-1 is-active">
      <div class="l-container t-center">
        <h1 class="t-hero" style="margin-top:var(--sp-4);">幹細胞治療、調べすぎて<br>分からなくなっていませんか？</h1>
        <p class="t-body-lg t-secondary" style="margin-top:var(--sp-5);max-width:600px;margin-inline:auto;">売り込みません。一緒に、整理します。<br>幹細胞治療の情報整理と、あなたに合う医療機関への無料相談。</p>
        <div style="margin-top:var(--sp-7);">
          <a href="./contact.php" class="c-btn c-btn--primary c-btn--lg">まずは情報を整理してみる（無料・約2分）</a>
        </div>
      </div>
    </div>
    <div class="hero-slider__slide hero-slider__slide--bg-2">
      <div class="l-container t-center">
        <p class="t-micro">BEYOND SUPERNATANT</p>
        <h2 class="t-hero" style="margin-top:var(--sp-4);">上清だけでは届かない領域へ。</h2>
        <p class="t-body-lg t-secondary" style="margin-top:var(--sp-5);max-width:600px;margin-inline:auto;">"分泌された成分だけ"ではなく、細胞内に眠るタンパク質や情報分子まで視野に入れたアプローチが注目されています。<br>大切なのは、言葉の強さではなく「説明の透明性」。納得して選ぶための基準を、ここで整えます。</p>
        <div style="margin-top:var(--sp-7);">
          <a href="./contact.php" class="c-btn c-btn--primary c-btn--lg">まずは情報を整理してみる（無料・約2分）</a>
        </div>
      </div>
    </div>
    <div class="hero-slider__slide hero-slider__slide--bg-3">
      <div class="l-container t-center">
        <p class="t-micro">GETTING STARTED</p>
        <h2 class="t-hero" style="margin-top:var(--sp-4);">あなたに合う進み方を、先に決める。</h2>
        <p class="t-body-lg t-secondary" style="margin-top:var(--sp-5);max-width:600px;margin-inline:auto;">この領域は、調べるほど情報が増えて迷いやすいです。<br>だからこそ、最初に「何を目的に」「何が不安で」「どこで判断するか」を決めると、検討が一気にラクになります。</p>
        <div style="margin-top:var(--sp-7);">
          <a href="./contact.php" class="c-btn c-btn--primary c-btn--lg">まずは情報を整理してみる（無料・約2分）</a>
        </div>
      </div>
    </div>
  </div>
  <div class="hero-slider__dots">
    <button class="hero-slider__dot is-active" data-slide="0" aria-label="Slide 1"></button>
    <button class="hero-slider__dot" data-slide="1" aria-label="Slide 2"></button>
    <button class="hero-slider__dot" data-slide="2" aria-label="Slide 3"></button>
  </div>
</section>

<!-- CTA: FV直下 -->
<section class="l-section cta-section">
  <div class="l-container t-center">
    <a href="./contact.php" class="c-btn c-btn--primary c-btn--lg">まずは情報を整理してみる（無料・約2分）</a>
    <div class="cta-microcopy">
      <span>相談＝契約ではありません</span>
      <span>匿名でのご相談も可能です</span>
      <span>営業電話は一切いたしません</span>
    </div>
  </div>
</section>

<!-- T2: Mosaic -->
<section class="l-section">
  <div class="l-container">
    <div class="t-center" style="margin-bottom:var(--sp-9);">
      <p class="t-micro">CONCEPT</p>
      <h2 class="t-h1" style="margin-top:var(--sp-3);">選ぶ前に、整える。</h2>
    </div>
    <div class="l-grid-3 reveal-stagger">
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__icon"><i data-lucide="microscope"></i></div>
          <div class="c-card__eyebrow">CONCEPT 01</div>
          <div class="c-card__title">選ぶ前に、仕組みを知る。</div>
          <p class="c-card__text">幹細胞関連のケアにはいくつかの系統があります。その中で「生搾り（Lysate）」は、幹細胞を物理的に処理して、内部成分まで含む"濾液"として設計された考え方です。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__icon"><i data-lucide="file-check"></i></div>
          <div class="c-card__eyebrow">CONCEPT 02</div>
          <div class="c-card__title">根拠は、言い切りではなく提示。</div>
          <p class="c-card__text">どんな医療でも、重要なのは「すごい」ではなく「何が分かっていて、何が分かっていないか」。研究・特許・学会発表などの情報は、万能な保証ではありませんが、説明の土台になります。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__icon"><i data-lucide="scale"></i></div>
          <div class="c-card__eyebrow">CONCEPT 03</div>
          <div class="c-card__title">"期待しすぎない"が、後悔を減らす。</div>
          <p class="c-card__text">大切なのは、あなたの目的に対して、どんな説明が必要かを整理すること。このページは、受診の判断を急がせるためではなく、「納得して選ぶ」ための下準備を整える場所です。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__icon"><i data-lucide="shield-check"></i></div>
          <div class="c-card__eyebrow">CONCERNS</div>
          <div class="c-card__title">不安の中心は、いつも同じ。</div>
          <p class="c-card__text">相談で多い不安は、だいたい3つに集約されます。安全性、費用、自分に合うか。当サイトは、これらを「短時間で整理」し、受診先で聞くべき質問リストまで落とし込みます。</p>
        </div>
      </div>
      <!-- ビジネスモデル透明開示 -->
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__icon"><i data-lucide="eye"></i></div>
          <div class="c-card__eyebrow">TRANSPARENCY</div>
          <div class="c-card__title">運営の仕組みについて</div>
          <p class="c-card__text">当サイトは提携クリニックからの紹介報酬で運営しています。相談者から費用はいただきません。</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- こんな方がご相談されています -->
<section class="l-section persona-section">
  <div class="l-container">
    <div class="t-center" style="margin-bottom:var(--sp-9);">
      <p class="t-micro">TARGET</p>
      <h2 class="t-h1" style="margin-top:var(--sp-3);">こんな方がご相談されています</h2>
    </div>
    <div class="persona-grid reveal-stagger">
      <div class="persona-card reveal">
        <div class="persona-card__icon"><i data-lucide="heart-pulse"></i></div>
        <div class="persona-card__title">ED（男性機能）でお悩みの方</div>
        <p class="persona-card__text">40〜65歳男性。人に相談しづらいからこそ、匿名で情報整理から始められます。</p>
      </div>
      <div class="persona-card reveal">
        <div class="persona-card__icon"><i data-lucide="activity"></i></div>
        <div class="persona-card__title">慢性的な痛みに向き合っている方</div>
        <p class="persona-card__text">45〜70歳。さまざまな治療を試してきた方へ、選択肢の整理をお手伝いします。</p>
      </div>
      <div class="persona-card reveal">
        <div class="persona-card__icon"><i data-lucide="brain"></i></div>
        <div class="persona-card__title">脳梗塞後遺症のご家族の方</div>
        <p class="persona-card__text">ご家族が代わりに情報収集されるケースも多くあります。一緒に整理しましょう。</p>
      </div>
      <div class="persona-card reveal">
        <div class="persona-card__icon"><i data-lucide="sparkles"></i></div>
        <div class="persona-card__title">AGA（薄毛）で既存治療に限界を感じている方</div>
        <p class="persona-card__text">内服薬・外用薬の次のステップとして、再生医療の選択肢を整理します。</p>
      </div>
      <div class="persona-card reveal">
        <div class="persona-card__icon"><i data-lucide="sun"></i></div>
        <div class="persona-card__title">美容エイジングケアの次を探している方</div>
        <p class="persona-card__text">従来の美容施術とは異なるアプローチとして、情報を整理してお伝えします。</p>
      </div>
    </div>
  </div>
</section>

<!-- VOICES -->
<section class="l-section l-section--sunken">
  <div class="l-container">
    <div class="t-center" style="margin-bottom:var(--sp-9);">
      <p class="t-micro">VOICES</p>
      <h2 class="t-h1" style="margin-top:var(--sp-3);">相談者の声</h2>
    </div>
    <div class="l-grid-3 reveal-stagger">
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__icon"><i data-lucide="message-circle"></i></div>
          <div class="c-card__eyebrow">VOICES</div>
          <div class="c-card__title">情報が整理できた</div>
          <p class="c-card__text">「情報が整理できて、何を確認すべきかが分かった」「売り込みではなく、判断基準を一緒に作ってもらえた」まずは"焦らずに整える"。そこからで十分間に合います。</p>
        </div>
      </div>
      <div class="c-card c-card--glass reveal">
        <div class="c-card__body t-center">
          <div class="c-card__icon"><i data-lucide="handshake"></i></div>
          <div class="c-card__eyebrow">CONSULT</div>
          <div class="c-card__title">相談から紹介まで、ここで完結。</div>
          <p class="c-card__text">無料相談では、あなたの目的・地域・希望時期をもとに、候補となる医療機関の情報を整理してご案内します。押し売りのない相談窓口としてご利用ください。</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 相談の流れ -->
<section class="l-section flow-section">
  <div class="l-container">
    <div class="t-center" style="margin-bottom:var(--sp-9);">
      <p class="t-micro">FLOW</p>
      <h2 class="t-h1" style="margin-top:var(--sp-3);">相談の流れ</h2>
    </div>
    <div class="flow-steps reveal-stagger">
      <div class="flow-step reveal">
        <div class="flow-step__number">STEP 1</div>
        <div class="flow-step__icon"><i data-lucide="message-square"></i></div>
        <div class="flow-step__title">LINEまたはフォームで相談</div>
        <p class="flow-step__text">匿名でのご相談も可能です。お名前なしでもお気軽にどうぞ。</p>
        <span class="flow-step__safe">ここでやめてもOK</span>
      </div>
      <div class="flow-step reveal">
        <div class="flow-step__number">STEP 2</div>
        <div class="flow-step__icon"><i data-lucide="list-checks"></i></div>
        <div class="flow-step__title">状況を一緒に整理</div>
        <p class="flow-step__text">売り込みは一切ありません。あなたの目的や不安を一緒に整理します。</p>
        <span class="flow-step__safe">ここでやめてもOK</span>
      </div>
      <div class="flow-step reveal">
        <div class="flow-step__number">STEP 3</div>
        <div class="flow-step__icon"><i data-lucide="building-2"></i></div>
        <div class="flow-step__title">合うクリニックを2〜3件提案</div>
        <p class="flow-step__text">地域・目的・ご予算に合わせて、候補となる医療機関をご案内します。</p>
        <span class="flow-step__safe">ここでやめてもOK</span>
      </div>
      <div class="flow-step reveal">
        <div class="flow-step__number">STEP 4</div>
        <div class="flow-step__icon"><i data-lucide="calendar-check"></i></div>
        <div class="flow-step__title">予約・来院サポート</div>
        <p class="flow-step__text">予約の取り方や当日の流れなど、来院までの不安をサポートします。</p>
        <span class="flow-step__safe">ここでやめてもOK</span>
      </div>
      <div class="flow-step reveal">
        <div class="flow-step__number">STEP 5</div>
        <div class="flow-step__icon"><i data-lucide="phone-call"></i></div>
        <div class="flow-step__title">来院後のフォロー</div>
        <p class="flow-step__text">来院後に気になることがあれば、いつでもご相談いただけます。</p>
        <span class="flow-step__safe">ここでやめてもOK</span>
      </div>
    </div>
  </div>
</section>

<!-- CTA: CONCEPT後 -->
<section class="l-section cta-section">
  <div class="l-container t-center">
    <a href="./contact.php" class="c-btn c-btn--primary c-btn--lg">まずは情報を整理してみる（無料・約2分）</a>
    <div class="cta-microcopy">
      <span>相談＝契約ではありません</span>
      <span>匿名でのご相談も可能です</span>
      <span>営業電話は一切いたしません</span>
    </div>
  </div>
</section>

<!-- Work Cards -->
<section class="l-section l-section--sunken">
  <div class="l-container l-container--wide">
    <div class="t-center" style="margin-bottom:var(--sp-9);">
      <p class="t-micro">WORKS</p>
      <h2 class="t-h1" style="margin-top:var(--sp-3);">コンテンツ一覧</h2>
    </div>
    <div class="l-grid-4 reveal-stagger">
      <?php
      $work_icons = [
        '1' => 'compass',
        '2' => 'list-checks',
        '3' => 'shield',
        '4' => 'calculator',
        '5' => 'flask-conical',
        '6' => 'book-open',
        '7' => 'message-square',
        '8' => 'building-2',
      ];
      ?>
      <?php foreach ($works as $id => $w): ?>
      <a href="./work<?php echo sprintf('%02d', (int)$id); ?>.php" class="c-card c-card--compact reveal" style="text-decoration:none;color:inherit;">
        <div class="c-card__thumb">
          <i data-lucide="<?php echo htmlspecialchars($work_icons[$id] ?? 'circle', ENT_QUOTES, 'UTF-8'); ?>"></i>
        </div>
        <div class="c-card__body">
          <div class="c-card__eyebrow"><?php echo htmlspecialchars(isset($w['cat']) ? $w['cat'] : 'WORK ' . sprintf('%02d', (int)$id), ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="c-card__title"><?php echo htmlspecialchars($w['title'], ENT_QUOTES, 'UTF-8'); ?></div>
          <p class="c-card__text"><?php echo htmlspecialchars($w['text'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/components/faq_full.php'; ?>

<!-- CTA Band（ラストCTA） -->
<section class="l-section l-section--dark">
  <div class="l-container t-center">
    <h2 class="t-h2" style="color:var(--text-inverse);">まずは、話すことから。</h2>
    <p class="t-body-lg" style="color:var(--text-inverse);opacity:0.72;margin-top:var(--sp-4);max-width:600px;margin-inline:auto;">決める前に、整理する。押し売りのない相談窓口として、お気軽にご利用ください。</p>
    <div style="margin-top:var(--sp-7);">
      <a href="./contact.php" class="c-btn c-btn--primary c-btn--lg">まずは情報を整理してみる（無料・約2分）</a>
    </div>
    <div class="cta-microcopy cta-microcopy--dark">
      <span>相談＝契約ではありません</span>
      <span>匿名でのご相談も可能です</span>
      <span>営業電話は一切いたしません</span>
    </div>
  </div>
</section>

</main>

<script>lucide.createIcons();</script>
<?php include __DIR__ . "/components/footer.php"; ?>
<!-- auto-deploy smoke test -->
