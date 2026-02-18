<?php
$work_id = 1;
$work_page_title = 'はじめての方へ。迷いを減らすために、ここで全体像を整理します。';
$work_lead = '幹細胞治療に興味はある。けれど、情報が多すぎて「どこから見ればいいか分からない」。このページは、期待を過度に膨らませるためではなく、あなたが納得して相談・受診に進めるように、判断材料を整えるための入口です。';
ob_start(); ?>

<h2>このサイトの役割</h2>
<p>
  当サイトは、幹細胞治療を検討する方が「納得して選べる状態」に近づくための情報整理サイトです。
  できることと、できないことを最初にお伝えします。
</p>
<h3>できること</h3>
<ul>
  <li>選び方の整理 — 何を基準に比較すればよいかを明確にします</li>
  <li>質問テンプレの作成 — 受診先で確認すべき質問リストをお渡しします</li>
  <li>相談先候補の整理 — 目的・地域・条件に合う医療機関の候補をご案内します</li>
</ul>
<h3>できないこと</h3>
<ul>
  <li>効果の保証 — 個人差があり、断定的な結論は出せません</li>
  <li>診断 — 医療行為は行いません</li>
  <li>断定的な結論 — 「これが最善」とは言い切れません</li>
</ul>

<h2>このページを読んだ後の流れ</h2>
<p>
  以下の4ステップで進めると、迷いが減ります。
</p>
<ul>
  <li><strong>STEP 1：理解する</strong> — 仕組みと違いを把握する（このページ＋生搾りとは）</li>
  <li><strong>STEP 2：不安を整理する</strong> — 安全性・費用・適合性を分類する</li>
  <li><strong>STEP 3：相談する</strong> — 無料相談で条件を整理し、質問リストを作る</li>
  <li><strong>STEP 4：紹介を受ける</strong> — 条件に合う医療機関の候補を案内してもらう</li>
</ul>

<h2>最初に決めるのは、これだけで十分です</h2>
<p>
  検討を始める前に、以下の3つだけ整理しておくと、その後の判断がスムーズになります。
</p>
<ul>
  <li><strong>目的</strong> — 何のために検討しているのか（健康維持、美容、特定の悩みなど）</li>
  <li><strong>現実条件</strong> — 通院可能な範囲、頻度、スケジュール</li>
  <li><strong>予算感</strong> — 1回あたり・総額でどのくらいまで許容できるか</li>
</ul>

<h2>誤解があると、後悔しやすくなります</h2>
<p>
  検討段階でよくある誤解を4つ整理します。
</p>
<ul>
  <li><strong>「1回で効果が出る」</strong> — 多くの場合、複数回の施術を前提とした設計です。1回で劇的な変化を期待すると、判断を誤りやすくなります。</li>
  <li><strong>「高い＝効く」</strong> — 価格は品質の一部を反映しますが、高額であることが効果の保証にはなりません。</li>
  <li><strong>「口コミが良い＝自分にも合う」</strong> — 体験談は参考になりますが、条件や目的が異なれば結果も変わります。</li>
  <li><strong>「有名＝安心」</strong> — 知名度よりも、説明の透明性や対応の丁寧さを確認する方が実用的です。</li>
</ul>

<h2>次に読むべきページ（おすすめ順）</h2>
<p>
  目的に応じて、以下の順で読み進めると効率的です。
</p>
<ul>
  <li><a href="./work02.php">選び方チェックリスト</a> — 受診前に確認すべき項目を整理</li>
  <li><a href="./work04.php">費用の見方</a> — 総額・内訳・継続コストの確認方法</li>
  <li><a href="./work03.php">安全性の考え方</a> — 不安を「確認できる言葉」に変える</li>
  <li><a href="./work07.php">無料相談</a> — 条件整理＋質問リスト作成</li>
</ul>

<div style="margin-top:var(--sp-9);text-align:center;">
  <p class="t-h3" style="margin-bottom:var(--sp-5);">迷ったまま進まないために</p>
  <div style="display:flex;gap:var(--sp-4);justify-content:center;flex-wrap:wrap;">
    <a href="./work07.php" class="c-btn c-btn--primary c-btn--lg">無料相談をする</a>
    <a href="./contact.php" class="c-btn c-btn--secondary c-btn--lg">LINEで相談する</a>
  </div>
</div>

<p style="margin-top:var(--sp-7);font-size:var(--fs-caption);color:var(--text-tertiary);">
  ※当サイトの情報は、医療行為の効果を保証するものではありません。
</p>

<?php $work_content = ob_get_clean(); ?>
<?php include __DIR__ . '/components/work-detail-template.php'; ?>
