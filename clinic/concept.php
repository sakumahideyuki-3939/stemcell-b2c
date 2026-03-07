<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <!-- ✅ PRODUCTSと同じ viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONCEPT｜培養上清液との違い・生搾り濾液の仕組み | ALGO Inc.</title>
    <meta name="description" content="幹細胞生搾り濾液（Lysate）と培養上清液の違いを解説。物理的破砕により細胞内成分（HSP47/70・AnnexinA6・HMGB1）を高濃度抽出。Cell-nucleus Free技術の仕組み。">
    <meta property="og:title" content="CONCEPT｜培養上清液との違い・生搾り濾液の仕組み">
    <meta property="og:description" content="幹細胞生搾り濾液と培養上清液の違いを解説。物理的破砕による細胞内成分の高濃度抽出技術。">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://cells.algo-cosme.com/cells/concept.php">
    <meta property="og:site_name" content="ALGO Inc. | 幹細胞生搾り">
    <link rel="canonical" href="https://cells.algo-cosme.com/cells/concept.php">

    <!-- ✅ PRODUCTSと同じ共通CSS -->
    <link rel="stylesheet" href="./assets/css/main.css?v=<?php echo time(); ?>">

    <style>
        /* ベーススタイル：既存のALGOトーンを継承 */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #fff; color: #333; font-family: "Hiragino Mincho ProN", serif; -webkit-font-smoothing: antialiased; }

        /* ✅ 1920固定をやめてmax-widthに（ヘッダーと整合） */
        .site-wrapper { max-width: 1920px; margin: 0 auto; }

        /* HERO：より先進的な印象に */
        .hero-section {
            width: 100%;
            height: 560px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: radial-gradient(circle at center, #ffffff 0%, #f4f4f4 100%);
            border-bottom: 1px solid #eee;
        }
        .hero-section h1 { font-size: 56px; letter-spacing: 0.5em; font-weight: 200; color: #1a1a1a; }
        .hero-section p { font-size: 14px; letter-spacing: 0.4em; color: #888; margin-top: 25px; }

        /* ✅ 余白を少し入れてスマホでも破綻しづらく */
        .container { max-width: 1200px; margin: 0 auto; padding: 120px 20px; }

        /* セクション見出し */
        .section-label { font-size: 12px; letter-spacing: 0.4em; color: #bca88e; margin-bottom: 20px; display: block; text-align: center; }
        .section-title { font-size: 36px; line-height: 1.6; text-align: center; margin-bottom: 60px; font-weight: 400; }

        /* 1. イントロダクション */
        .intro-box { display: flex; align-items: center; gap: 80px; margin-bottom: 120px; }
        .intro-text { flex: 1; font-size: 16px; line-height: 2.8; color: #444; text-align: justify; }
        .intro-visual { width: 500px; height: 500px; background: #f9f9f9; overflow: hidden; }
        .intro-visual img { width: 100%; height: 100%; object-fit: cover; }

        /* 2. 比較表スタイル */
        .comparison-table { width: 100%; border-collapse: collapse; margin-top: 40px; }
        .comparison-table th { background: #fcfcfc; font-weight: 400; padding: 30px; border-bottom: 1px solid #eee; }
        .comparison-table td { padding: 40px; border-bottom: 1px solid #eee; vertical-align: top; width: 50%; }
        .comp-label { display: block; font-size: 12px; color: #999; margin-bottom: 10px; }
        .comp-title { font-size: 20px; color: #333; margin-bottom: 15px; display: block; }
        .comp-desc { font-size: 15px; line-height: 2; color: #666; }
        .highlight { color: #bca88e; font-weight: 600; }

        /* 3. 成分カード */
        .ingredient-grid { display: flex; justify-content: space-between; gap: 30px; margin-top: 60px; }
        .ing-card { flex: 1; padding: 40px; background: #fbfbfb; border: 1px solid #f0f0f0; }
        .ing-name { font-size: 20px; margin-bottom: 20px; color: #1a1a1a; border-bottom: 1px solid #ddd; padding-bottom: 15px; }
        .ing-desc { font-size: 14px; line-height: 2.2; color: #555; }

        /* 4. 安全性セクション */
        .safety-section { background: #1a1a1a; color: #fff; padding: 120px 0; }
        .safety-section .section-title { color: #fff; }
        .safety-grid { display: flex; gap: 60px; margin-top: 60px; }
        .safety-item { flex: 1; border-left: 1px solid #444; padding-left: 30px; }
        .safety-num { font-size: 12px; color: #bca88e; margin-bottom: 10px; display: block; }
        .safety-item h4 { font-size: 20px; margin-bottom: 20px; font-weight: 300; }
        .safety-item p { font-size: 15px; line-height: 2.2; color: #ccc; }

        /* ✅ 念のため：狭い幅で崩れない最低限 */
        @media (max-width: 980px) {
            .hero-section h1 { font-size: 36px; letter-spacing: 0.3em; }
            .intro-box { flex-direction: column; gap: 40px; }
            .intro-visual { width: 100%; max-width: 560px; height: 320px; }
            .ingredient-grid { flex-direction: column; }
            .comparison-table td { display: block; width: 100%; }
            .safety-grid { flex-direction: column; }
        }
    </style>
</head>

<body class="page-concept">

<div class="algo-site">
    <!-- ✅ PRODUCTSと同じヘッダー -->
    <?php include(__DIR__ . '/components/header.php'); ?>

    <div class="site-wrapper">

        <section class="hero-section">
            <p>TECHNOLOGY & PHILOSOPHY</p>
            <h1>CONCEPT</h1>
            <p>「細胞破壊」という逆転の発想が、再生医療を更新する。</p>
        </section>

        <div class="container">
            <span class="section-label">01 / ORIGIN</span>
            <h2 class="section-title">培養上清の、その先へ。<br>「幹細胞生搾り」という到達点。</h2>

            <div class="intro-box">
                <div class="intro-text">
                    <p>再生医療の現場で広く使われてきた「幹細胞培養上清液」。それは、細胞を培養する過程で外へ分泌した成分のみを利用するものでした。しかし、細胞が持つ本来のポテンシャルは、分泌されるものだけではありません。</p>
                    <p>私たちがたどり着いたのは、<strong>「幹細胞そのものを物理的に破砕し、中身を丸ごと抽出する」</strong>という、まったく新しいアプローチです。これを私たちは『幹細胞生搾り（Stem Cell Lysate / FADRCL）』と名付けました。</p>
                    <p>従来の手法では捨てられていた「細胞の内側」にある数千種類の生理活性物質。それらを余すことなく取り出し、かつリスクとなる細胞核をフィルターで完全に取り除く。それが、私たちの独自技術による新しい抽出アプローチです。</p>
                </div>
                <div class="intro-visual" style="display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #f9f9f9 0%, #f0ede8 100%);">
                    <div style="text-align: center; padding: 40px;">
                        <p style="font-size: 48px; color: #ddd; letter-spacing: 0.3em; font-weight: 200;">LYSATE</p>
                        <p style="font-size: 11px; color: #aaa; letter-spacing: 0.2em; margin-top: 15px;">Stem Cell Lysate Technology</p>
                    </div>
                </div>
            </div>

            <span class="section-label">02 / COMPARISON</span>
            <h2 class="section-title">従来の上清液との決定的な違い</h2>

            <table class="comparison-table">
                <tr>
                    <td>
                        <span class="comp-label">TRADITIONAL</span>
                        <span class="comp-title">従来の「培養上清液」</span>
                        <p class="comp-desc">
                            製法：幹細胞を培養した後の「上澄み」を回収。<br>
                            成分：細胞が外へ分泌したサイトカインのみ。<br>
                            特徴：細胞内部の成分（HSP等）は含まれていません。
                        </p>
                    </td>

                    <td style="background: #f9f6f2;">
                        <span class="comp-label highlight">INNOVATION</span>
                        <span class="comp-title highlight">私たちの「生搾り（濾液）」</span>
                        <p class="comp-desc">
                            製法：幹細胞を凍結融解や超音波で物理的に破壊し、精密濾過を行う独自の抽出技術。<br>
                            成分：分泌物に加え、<span class="highlight">細胞質・細胞内小器官の有用タンパク質</span>も高濃度に含有。<br>
                            特徴：創傷治癒や組織再生に関する基礎研究データが報告されています。
                        </p>
                    </td>
                </tr>
            </table>

            <!-- 項目別比較表 -->
            <table class="comparison-table" style="margin-top: 60px;">
                <tr>
                    <th style="width: 25%; font-size: 12px; letter-spacing: 0.1em; color: #999;">比較項目</th>
                    <th style="width: 37.5%; font-size: 12px; letter-spacing: 0.1em; color: #999;">培養上清液</th>
                    <th style="width: 37.5%; font-size: 12px; letter-spacing: 0.1em; color: #999; background: #f9f6f2;">幹細胞生搾り（Lysate）</th>
                </tr>
                <tr>
                    <td style="font-size: 13px; font-weight: bold; color: #555;">含有成分</td>
                    <td style="font-size: 13px; color: #666;">分泌物（サイトカイン等）のみ</td>
                    <td style="font-size: 13px; color: #555; background: #f9f6f2;"><span class="highlight">細胞内成分まで含む</span>（分泌物＋細胞質タンパク質）</td>
                </tr>
                <tr>
                    <td style="font-size: 13px; font-weight: bold; color: #555;">HSP47 / HSP70</td>
                    <td style="font-size: 13px; color: #666;">ほぼ含まない</td>
                    <td style="font-size: 13px; color: #555; background: #f9f6f2;"><span class="highlight">高濃度含有</span></td>
                </tr>
                <tr>
                    <td style="font-size: 13px; font-weight: bold; color: #555;">がん化リスク対策</td>
                    <td style="font-size: 13px; color: #666;">核混入リスクあり（製法による）</td>
                    <td style="font-size: 13px; color: #555; background: #f9f6f2;"><span class="highlight">Cell-nucleus Free</span>（0.2μm濾過で核除去）</td>
                </tr>
                <tr>
                    <td style="font-size: 13px; font-weight: bold; color: #555;">特許</td>
                    <td style="font-size: 13px; color: #666;">一般的な製法のため特許なし（多数）</td>
                    <td style="font-size: 13px; color: #555; background: #f9f6f2;"><span class="highlight">4領域で特許取得済み</span></td>
                </tr>
                <tr>
                    <td style="font-size: 13px; font-weight: bold; color: #555;">製品位置づけ</td>
                    <td style="font-size: 13px; color: #666;">各社により異なる</td>
                    <td style="font-size: 13px; color: #555; background: #f9f6f2;">研究用試薬</td>
                </tr>
            </table>
        </div>

        <div style="background: #fcfcfc; padding: 120px 0;">
            <div class="container">
                <span class="section-label">03 / COMPONENTS</span>
                <h2 class="section-title">物理的破砕がもたらす「細胞内成分」のチカラ</h2>

                <div class="ingredient-grid">
                    <div class="ing-card">
                        <h3 class="ing-name">HSP 47 / 70</h3>
                        <p class="ing-desc">シャペロンタンパク質の一種。コラーゲン産生との関連が基礎研究で報告されています。培養上清液（分泌液）には通常含まれない、細胞内に存在するタンパク質です。</p>
                    </div>

                    <div class="ing-card">
                        <h3 class="ing-name">Annexin A6</h3>
                        <p class="ing-desc">細胞膜の修復や抗炎症作用に関わるタンパク質。過剰な炎症反応を抑え、組織の安定化を促す働きが期待されています。</p>
                    </div>

                    <div class="ing-card">
                        <h3 class="ing-name">HMGB1</h3>
                        <p class="ing-desc">組織修復に関与するとされる核内タンパク質。細胞間のシグナル伝達への関わりが基礎研究で報告されています。</p>
                    </div>
                </div>
            </div>
        </div>

        <section class="safety-section">
            <div class="container">
                <span class="section-label">04 / SAFETY</span>
                <h2 class="section-title">「Cell-nucleus Free」という安全基準</h2>

                <div class="safety-grid">
                    <div class="safety-item">
                        <span class="safety-num">01.</span>
                        <h4>細胞核の除去</h4>
                        <p>0.2μmの特殊フィルターにより、細胞核（DNA）を物理的に除去。細胞核を含まないことにより、腫瘍形成リスクの低減が理論上期待されます。</p>
                    </div>

                    <div class="safety-item">
                        <span class="safety-num">02.</span>
                        <h4>高純度な含有成分</h4>
                        <p>細胞の破片（デブリ）やミトコンドリアを除去し、含有成分の濾液のみを製品化。研究用試薬として提供しています。</p>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- /.site-wrapper -->

    <section style="width: 100%; padding: 60px 20px; text-align: center; background: #fff;">
        <p style="font-size: 13px; color: #666; line-height: 2; margin-bottom: 20px;">
            生搾り濾液の技術資料・成分データについて、<br>詳しい情報をご提供いたします。
        </p>
        <a href="./contact.php?category=資料請求" style="display: inline-block; border: 1px solid #2f2f2f; color: #2f2f2f; padding: 12px 30px; font-size: 12px; letter-spacing: 0.15em; text-decoration: none;">技術資料をご請求ください</a>
    </section>

    <!-- ✅ PRODUCTSと同じフッター -->
    <?php include(__DIR__ . '/components/footer.php'); ?>
</div><!-- /.algo-site -->

</body>
</html>
