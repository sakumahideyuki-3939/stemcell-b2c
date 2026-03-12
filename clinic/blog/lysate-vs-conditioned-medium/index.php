<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>培養上清液とLysateの違いとは？次のステップを探す方へ｜ALGO Inc.</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/ga4.php'; ?>
    <meta name="description" content="培養上清液とLysate（幹細胞破砕濾液）の違いを表で比較。培養上清液の次のステップとして注目されるLysateの仕組み・特徴・選び方を解説します。">
    <meta property="og:title" content="培養上清液とLysateの違いとは？次のステップを探す方へ">
    <meta property="og:description" content="培養上清液とLysateの違いを表で比較。培養上清液の次のステップとして注目されるLysateの仕組み・特徴・選び方を解説。">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://lab.algo-cosme.com/clinic/blog/lysate-vs-conditioned-medium/">
    <meta property="og:site_name" content="ALGO Inc. | 幹細胞生搾り">
    <link rel="canonical" href="https://lab.algo-cosme.com/clinic/blog/lysate-vs-conditioned-medium/">
    <link rel="stylesheet" href="../../assets/css/main.css?v=<?php echo time(); ?>">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #fff; color: #333; font-family: "Hiragino Mincho ProN", serif; -webkit-font-smoothing: antialiased; }
        .site-wrapper { max-width: 1920px; margin: 0 auto; }

        /* Blog Hero */
        .blog-hero {
            width: 100%;
            padding: 120px 20px 80px;
            text-align: center;
            background: #fafafa;
            border-bottom: 1px solid #f0f0f0;
        }
        .blog-hero .blog-cat {
            font-size: 10px;
            letter-spacing: 0.2em;
            color: #0071E3;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .blog-hero h1 {
            font-size: clamp(22px, 3vw, 32px);
            line-height: 1.6;
            font-weight: 600;
            letter-spacing: 0.05em;
            max-width: 720px;
            margin: 0 auto;
        }
        .blog-hero .blog-meta {
            font-size: 11px;
            color: #999;
            margin-top: 20px;
            letter-spacing: 0.1em;
        }

        /* Blog Body */
        .blog-body {
            max-width: 720px;
            margin: 0 auto;
            padding: 80px 20px 100px;
        }
        .blog-body h2 {
            font-size: 20px;
            font-weight: 600;
            letter-spacing: 0.08em;
            margin: 60px 0 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #eee;
        }
        .blog-body h2:first-child { margin-top: 0; }
        .blog-body h3 {
            font-size: 16px;
            font-weight: 600;
            margin: 40px 0 14px;
            letter-spacing: 0.05em;
        }
        .blog-body p {
            font-size: 14px;
            line-height: 2.2;
            color: #444;
            margin-bottom: 20px;
        }
        .blog-body ul, .blog-body ol {
            margin: 0 0 20px 20px;
            font-size: 14px;
            line-height: 2.2;
            color: #444;
        }

        /* Comparison Table */
        .comparison-table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0;
            font-size: 13px;
        }
        .comparison-table th,
        .comparison-table td {
            border: 1px solid #e8e8e8;
            padding: 14px 16px;
            text-align: left;
            vertical-align: top;
            line-height: 1.8;
        }
        .comparison-table thead th {
            background: #2f2f2f;
            color: #fff;
            font-weight: 600;
            font-size: 12px;
            letter-spacing: 0.1em;
        }
        .comparison-table tbody th {
            background: #fafafa;
            font-weight: 600;
            width: 25%;
            white-space: nowrap;
        }
        .comparison-table tbody td {
            background: #fff;
        }

        /* Callout */
        .blog-callout {
            background: #f7f7f7;
            border-left: 3px solid #0071E3;
            padding: 24px 28px;
            margin: 30px 0;
            font-size: 13px;
            line-height: 2;
            color: #444;
        }

        /* Blog CTA */
        .blog-cta {
            text-align: center;
            padding: 80px 20px;
            background: #2f2f2f;
            margin-top: 60px;
        }
        .blog-cta p.cta-label {
            font-size: 10px;
            letter-spacing: 0.2em;
            color: #999;
            margin-bottom: 16px;
        }
        .blog-cta h2 {
            font-size: 22px;
            color: #fff;
            letter-spacing: 0.12em;
            margin-bottom: 16px;
            border: none;
            padding: 0;
        }
        .blog-cta p.cta-desc {
            font-size: 13px;
            color: #aaa;
            line-height: 2;
            margin-bottom: 30px;
        }
        .blog-cta .cta-btn {
            display: inline-block;
            border: 1px solid #fff;
            color: #fff;
            padding: 14px 44px;
            font-size: 12px;
            letter-spacing: 0.15em;
            text-decoration: none;
            transition: all 0.3s;
        }
        .blog-cta .cta-btn:hover {
            background: #fff;
            color: #2f2f2f;
        }

        /* Breadcrumb */
        .blog-breadcrumb {
            max-width: 720px;
            margin: 0 auto;
            padding: 20px 20px 0;
            font-size: 11px;
            color: #999;
        }
        .blog-breadcrumb a { color: #777; text-decoration: none; }
        .blog-breadcrumb a:hover { text-decoration: underline; }

        /* Disclaimer */
        .blog-disclaimer {
            max-width: 720px;
            margin: 0 auto;
            padding: 30px 20px 0;
            font-size: 11px;
            color: #999;
            line-height: 1.8;
            border-top: 1px solid #f0f0f0;
        }

        /* Responsive */
        @media screen and (max-width: 480px) {
            .blog-hero { padding: 80px 20px 60px; }
            .blog-body { padding: 50px 20px 60px; }
            .comparison-table { font-size: 11px; }
            .comparison-table th,
            .comparison-table td { padding: 10px 12px; }
            .comparison-table tbody th { white-space: normal; }
        }
    </style>
</head>

<body>
<div class="algo-site">

    <?php include(__DIR__ . '/../../components/header.php'); ?>

    <div class="site-wrapper">

        <!-- Breadcrumb -->
        <nav class="blog-breadcrumb" aria-label="Breadcrumb">
            <a href="../../index.php">HOME</a>
            <span>&gt;</span>
            <a href="../../blog.php">BLOG</a>
            <span>&gt;</span>
            <span>培養上清液とLysateの違い</span>
        </nav>

        <!-- Hero -->
        <section class="blog-hero">
            <p class="blog-cat">KNOWLEDGE</p>
            <h1>培養上清液とLysateの違いとは？<br>次のステップを探す方へ</h1>
            <p class="blog-meta">2026.03.09 &nbsp;|&nbsp; 読了目安 5分</p>
        </section>

        <!-- Body -->
        <article class="blog-body">

            <h2>「培養上清液を試した。次は何がある？」</h2>
            <p>
                美容クリニックやAGA外来で「培養上清液」を用いた施術を受けた方の中に、「次のステップとして何を検討すべきか」と感じている方が増えています。
            </p>
            <p>
                そこで注目されているのが<strong>Lysate（ライセート）</strong>——幹細胞を物理的に破砕・濾過して得られる濾液です。本記事では、培養上清液とLysateの違いを整理し、ご自身に合った選択肢を見つけるための情報をまとめます。
            </p>

            <h2>培養上清液とは（おさらい）</h2>
            <p>
                培養上清液（Conditioned Medium）とは、ヒト由来の幹細胞を培養した際に、細胞が培地中に分泌する成分を回収した液体です。成長因子やサイトカインなどが含まれるとされ、美容分野を中心にクリニックで用いられています。
            </p>
            <ul>
                <li>幹細胞を「培養」し、細胞の外に分泌された成分を回収</li>
                <li>培養条件（培地の種類・培養日数）により成分構成が変動</li>
                <li>多くの美容クリニックで導入されている</li>
            </ul>

            <h2>Lysateとは何か</h2>
            <p>
                Lysate（ライセート）は、幹細胞そのものを物理的に破砕し、0.22μmフィルターで濾過して得る濾液です。細胞の「外に出た成分」ではなく、「細胞の中にある成分」を抽出するため、培養上清液とは含有成分の構成が異なります。
            </p>

            <div class="blog-callout">
                <strong>Lysateの語源</strong><br>
                Lysate（ライセート）は、生物学用語で「細胞を溶解・破砕して得られた液」を意味します。ALGO Inc.では物理的破砕（非化学的）と0.22μm濾過により、細胞核を含まない濾液（Cell-nucleus Free）として提供しています。
            </div>

            <h3>培養上清液 vs Lysate：比較表</h3>
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>比較項目</th>
                        <th>培養上清液</th>
                        <th>Lysate（幹細胞破砕濾液）</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>製法</th>
                        <td>幹細胞を培養し、分泌された成分を回収</td>
                        <td>幹細胞を物理的に破砕し、濾過して回収</td>
                    </tr>
                    <tr>
                        <th>含有成分の由来</th>
                        <td>細胞外に分泌された成分（パラクライン因子）</td>
                        <td>細胞内成分（HSP47/70、AnnexinA6、HMGB1等）</td>
                    </tr>
                    <tr>
                        <th>品質の安定性</th>
                        <td>培養条件により変動しやすい</td>
                        <td>物理的破砕のため比較的安定</td>
                    </tr>
                    <tr>
                        <th>細胞核の有無</th>
                        <td>通常含まない</td>
                        <td>0.22μm濾過により除去（Cell-nucleus Free）</td>
                    </tr>
                    <tr>
                        <th>普及度</th>
                        <td>多くのクリニックで導入済み</td>
                        <td>導入クリニックは限定的</td>
                    </tr>
                    <tr>
                        <th>特許</th>
                        <td>製法により異なる</td>
                        <td>ALGO Inc. 特許取得済み（6件）</td>
                    </tr>
                </tbody>
            </table>

            <h2>どちらが自分に向いているか</h2>
            <p>
                どちらが「優れている」という単純な比較ではなく、ご自身の目的やこれまでの施術経験に応じて選択肢が異なります。
            </p>

            <h3>培養上清液が向いている方</h3>
            <ul>
                <li>幹細胞由来成分を用いた施術を初めて検討している方</li>
                <li>お近くのクリニックで手軽に始めたい方</li>
                <li>まずは広く普及している選択肢から試してみたい方</li>
            </ul>

            <h3>Lysateが向いている方</h3>
            <ul>
                <li>培養上清液を用いた施術を経験し、次のステップを検討している方</li>
                <li>成分の由来や製法について詳しく知りたい方</li>
                <li>特許技術に基づく製品に関心がある方</li>
                <li>品質の安定性を重視する方</li>
            </ul>

            <div class="blog-callout">
                <strong>判断のポイント</strong><br>
                どちらを選ぶ場合でも、受診するクリニックが「成分の由来」「製法」「確認されている範囲と限界」を明確に説明しているかを確認することが重要です。説明の透明性は、クリニック選びの最も信頼できる基準のひとつです。
            </div>

            <h2>Lysateを扱うクリニックの探し方</h2>
            <p>
                Lysateは培養上清液と比べて導入クリニックが限られているため、以下のポイントを確認しながら探すことをおすすめします。
            </p>
            <ol>
                <li><strong>製品の出所を確認する</strong>——「Lysate」と名前がついていても、製法や品質基準はメーカーにより異なります。特許取得の有無、製造プロセスの開示状況を確認してください。</li>
                <li><strong>クリニックの説明姿勢を見る</strong>——施術の限界やリスクも含めて説明しているクリニックは、信頼性の指標になります。</li>
                <li><strong>無理に急がない</strong>——情報を整理してから判断しても遅くはありません。まずは資料請求や問い合わせから始めるのも一つの方法です。</li>
            </ol>

            <!-- Disclaimer -->
            <div class="blog-disclaimer">
                <p>
                    ※ 本記事は情報提供を目的としており、特定の施術を推奨するものではありません。施術に関するご判断は必ず医師にご相談ください。<br>
                    ※ Lysateは研究用試薬として提供されています。掲載内容は基礎研究に基づくものであり、特定の疾患に対する有効性を保証するものではありません。
                </p>
            </div>

        </article>

        <!-- CTA -->
        <section class="blog-cta">
            <p class="cta-label">NEXT STEP</p>
            <h2>Lysateを扱うクリニックを探す</h2>
            <p class="cta-desc">
                ALGO Inc.のLysate（幹細胞破砕濾液）を導入している<br>クリニック・医療機関の情報はこちらからご確認いただけます。
            </p>
            <a href="../../index.php" class="cta-btn">クリニックを探す →</a>
        </section>

    </div>

    <?php include(__DIR__ . '/../../components/footer.php'); ?>

</div>
</body>
</html>
