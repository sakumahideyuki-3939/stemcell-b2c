<?php
$page_title   = '会社概要';
$page_eyebrow = 'COMPANY';
$page_lead    = '株式会社アルゴの会社情報です。';
$page_prev    = null;
$page_next    = null;

ob_start(); ?>

<h2>代表挨拶</h2>
<p>
  再生医療の発展により、これまで治療が難しかった領域にも新たな選択肢が生まれつつあります。
  私たちは、幹細胞由来製品を通じて医療の可能性を広げ、
  一人でも多くの方に貢献できる企業でありたいと考えています。
</p>

<h2>会社概要</h2>
<table>
  <tr><th>会社名</th><td>株式会社アルゴ（ALGO Inc.）</td></tr>
  <tr><th>所在地</th><td>〒150-0011 東京都渋谷区東2-29-7-201</td></tr>
  <tr><th>アクセス</th><td>恵比寿駅より徒歩5分</td></tr>
  <tr><th>事業内容</th><td>幹細胞由来製品の研究開発・製造販売</td></tr>
</table>

<h2>アクセス</h2>
<p>
  JR・東京メトロ 恵比寿駅 西口より徒歩約5分。<br>
  お越しの際は事前にご連絡をいただけますと幸いです。
</p>

<?php $page_content = ob_get_clean(); ?>
<?php include __DIR__ . '/components/page-template.php'; ?>
