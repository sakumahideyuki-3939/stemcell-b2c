<?php
// components/faq_full.php — FAQ 15問アコーディオン + JSON-LD構造化データ
$faq_items = [
  [
    'q' => '無料相談で営業されたり、契約を迫られたりしませんか？',
    'a' => '当サイトのコンセプトは「売り込まない・整理する」です。無料相談は情報整理の場であり、契約の勧誘は行いません。「やらない」という結論も正しい判断のひとつです。',
  ],
  [
    'q' => '相談は本当に無料ですか？',
    'a' => 'はい、完全無料です。当サイトは提携クリニックからの紹介料で運営しており、相談者から費用をいただくことはありません。',
  ],
  [
    'q' => '相談したら必ずクリニックに行かないといけませんか？',
    'a' => 'いいえ。相談は情報整理の場です。クリニック紹介後も、受診するかどうかはご自身のご判断です。',
  ],
  [
    'q' => '家族が代理で相談できますか？',
    'a' => 'はい、歓迎しています。特に脳梗塞後遺症等ではご家族からのご相談も多くいただいています。',
  ],
  [
    'q' => 'このサイトはクリニックですか？仲介業者ですか？',
    'a' => '医療機関ではありません。幹細胞治療の情報を整理し、ご相談者に合った提携クリニックを紹介するサービスです。ビジネスモデルを透明に開示しています。',
  ],
  [
    'q' => '幹細胞治療は本当に効果があるのですか？',
    'a' => '現在も研究が進んでいる分野であり、すべての方に同じ結果が得られるとは申し上げられません。「効く・効かない」の二択ではなく、「自分の目的に合うかどうか」を一緒に整理します。',
  ],
  [
    'q' => 'Lysate（生搾り）と培養上清液は何が違うのですか？',
    'a' => '培養上清液は培養液から細胞を除いたもの。Lysateは幹細胞そのものを破砕し、細胞内部の成分も回収したものです。回収範囲が異なるため含まれる成分にも違いがあります。',
  ],
  [
    'q' => '点鼻で体内に届くのですか？',
    'a' => '鼻腔粘膜は血液脳関門を介さずに成分を届けられる経路として研究が進んでいます。目的に応じて投与経路は異なります。',
  ],
  [
    'q' => '副作用やリスクはありますか？',
    'a' => '重篤な副作用の報告は限定的ですが、リスクがゼロとは申し上げられません。品質管理・製造工程・医療機関の管理体制によって異なります。',
  ],
  [
    'q' => '1回で効果が出ますか？何回必要ですか？',
    'a' => '個人差が大きく断言できません。回数・頻度の目安は、提携クリニックの医師が症状を伺ったうえでご説明します。',
  ],
  [
    'q' => '費用はどれくらいかかりますか？',
    'a' => '施術内容・回数・医療機関により異なります。費用の目安は無料相談の中でお伝えしています。「相談＝契約」ではありません。',
  ],
  [
    'q' => '保険は適用されますか？',
    'a' => '現時点では基本的に自由診療（保険適用外）です。費用の詳細は提携クリニックにてご説明します。',
  ],
  [
    'q' => '提携クリニックはどのような基準で選ばれていますか？',
    'a' => '再生医療等安全性確保法に基づく届出、品質管理体制、費用の透明性、セカンドオピニオンへの姿勢などを基準としています。',
  ],
  [
    'q' => '他院で治療中ですが、セカンドオピニオンとして相談できますか？',
    'a' => 'はい、可能です。現在の治療内容を整理し、他の選択肢と比較検討するお手伝いをします。',
  ],
  [
    'q' => '特許や論文があれば安心してよいですか？',
    'a' => '特許は技術の独自性であり効果の証明ではありません。論文も特定条件下の報告です。当サイトではエビデンスの「限界」も含めてお伝えします。',
  ],
];
?>

<section class="faq-section l-section" id="faq">
  <div class="l-container l-container--narrow">
    <p class="t-micro t-center">FAQ</p>
    <h2 class="t-h2 t-center" style="margin-top:var(--sp-3);">よくある質問</h2>
    <div class="faq-list" style="margin-top:var(--sp-8);">
      <?php foreach ($faq_items as $i => $item): ?>
      <div class="faq-item">
        <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq-answer-<?php echo $i + 1; ?>">
          <span class="faq-question__text"><?php echo htmlspecialchars($item['q'], ENT_QUOTES, 'UTF-8'); ?></span>
          <span class="faq-question__icon" aria-hidden="true"></span>
        </button>
        <div class="faq-answer" id="faq-answer-<?php echo $i + 1; ?>" role="region" hidden>
          <p><?php echo htmlspecialchars($item['a'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    <?php foreach ($faq_items as $i => $item): ?>
    {
      "@type": "Question",
      "name": <?php echo json_encode($item['q'], JSON_UNESCAPED_UNICODE); ?>,
      "acceptedAnswer": {
        "@type": "Answer",
        "text": <?php echo json_encode($item['a'], JSON_UNESCAPED_UNICODE); ?>
      }
    }<?php echo $i < count($faq_items) - 1 ? ',' : ''; ?>
    <?php endforeach; ?>
  ]
}
</script>
