<?php
$page_title   = '特定商取引法に基づく表記';
$page_eyebrow = 'LEGAL';
$page_lead    = '';
$page_prev    = null;
$page_next    = null;

ob_start(); ?>

<h2>事業者情報</h2>
<div class="prose-table-wrap">
<table>
  <tr><th>事業者名</th><td>株式会社アルゴ（ALGO Inc.）</td></tr>
  <tr><th>代表者</th><td>代表取締役</td></tr>
  <tr><th>所在地</th><td>〒150-0011 東京都渋谷区東2-29-7-201</td></tr>
  <tr><th>連絡先</th><td>お問い合わせは<a href="./contact.php">お問い合わせフォーム</a>よりご連絡ください</td></tr>
  <tr><th>サービス内容</th><td>幹細胞治療に関する情報提供および医療機関の紹介サービス</td></tr>
  <tr><th>料金</th><td>相談者からの費用は一切いただきません（無料）</td></tr>
  <tr><th>運営形態</th><td>提携クリニックからの紹介報酬で運営しています</td></tr>
  <tr><th>返品・キャンセル</th><td>該当なし（無料サービスのため）</td></tr>
</table>
</div>

<?php $page_content = ob_get_clean(); ?>
<?php include __DIR__ . '/components/page-template.php'; ?>
