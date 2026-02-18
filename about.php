<?php
$page_title   = 'ABOUT';
$page_eyebrow = 'ABOUT US';
$page_lead    = '株式会社アルゴの企業情報をご紹介します。';
$page_prev    = ['url' => './evidence.php', 'label' => 'EVIDENCE'];
$page_next    = null;

ob_start(); ?>

<h2>企業理念</h2>
<p>
  私たちは、再生医療の研究成果を医療現場へ届けることを使命としています。
  幹細胞科学の可能性を追求し、安全性と品質を最優先に、
  医療機関の皆さまに信頼いただける製品の提供を目指しています。
</p>

<h2>事業内容</h2>
<ul>
  <li>幹細胞由来製品の研究・開発</li>
  <li>医療機関向け製品の製造・販売</li>
  <li>再生医療に関するコンサルティング</li>
  <li>美容・ヘルスケア分野への技術応用</li>
</ul>

<h2>会社概要</h2>
<table>
  <tr><th>会社名</th><td>株式会社アルゴ（ALGO Inc.）</td></tr>
  <tr><th>所在地</th><td>〒150-0011 東京都渋谷区東2-29-7-201</td></tr>
  <tr><th>アクセス</th><td>恵比寿駅より徒歩5分</td></tr>
  <tr><th>事業内容</th><td>幹細胞由来製品の研究開発・製造販売</td></tr>
</table>

<?php $page_content = ob_get_clean(); ?>
<?php include __DIR__ . '/components/page-template.php'; ?>
