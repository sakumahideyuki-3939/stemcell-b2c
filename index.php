<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALGO LAB | 幹細胞治療の情報整理</title>
    <meta name="description" content="幹細胞治療に関する情報整理プラットフォーム。個人の方への無料相談、医療機関向け製品情報・導入相談を提供します。">

    <!-- OGP Meta Tags -->
    <meta property="og:title" content="ALGO LAB | 幹細胞治療の情報整理">
    <meta property="og:description" content="幹細胞治療に関する情報整理プラットフォーム。個人の方への無料相談、医療機関向け製品情報・導入相談を提供します。">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://lab.algo-cosme.com/">
    <meta property="og:site_name" content="ALGO LAB">
    <meta property="og:locale" content="ja_JP">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="ALGO LAB | 幹細胞治療の情報整理">
    <meta name="twitter:description" content="幹細胞治療に関する情報整理プラットフォーム。個人の方への無料相談、医療機関向け製品情報・導入相談を提供します。">
    <link rel="canonical" href="https://lab.algo-cosme.com/">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/ga4.php'; ?>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Noto Sans JP', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0A1628 0%, #1A2A4A 100%);
            color: #fff;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            width: 100%;
            max-width: 860px;
        }

        .logo {
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.3em;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 32px;
            text-transform: uppercase;
        }

        .site-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            text-align: center;
            letter-spacing: 0.02em;
        }

        .site-subtitle {
            font-size: 15px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 48px;
            text-align: center;
        }

        .cards {
            display: flex;
            gap: 28px;
            width: 100%;
            justify-content: center;
        }

        .card {
            background: #fff;
            border-radius: 16px;
            padding: 40px 32px;
            flex: 1;
            max-width: 380px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.15);
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
        }

        .card-icon {
            width: 56px;
            height: 56px;
            margin-bottom: 24px;
            color: #1A2A4A;
        }

        .card-icon svg {
            width: 100%;
            height: 100%;
        }

        .card-title {
            font-size: 20px;
            font-weight: 700;
            color: #0A1628;
            margin-bottom: 12px;
        }

        .card-description {
            font-size: 14px;
            font-weight: 400;
            color: #666;
            line-height: 1.7;
        }

        .footer-note {
            margin-top: 36px;
            font-size: 13px;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.45);
        }

        .disclaimer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 11px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.3);
            padding: 16px 20px;
            line-height: 1.6;
        }

        @media (max-width: 640px) {
            .cards {
                flex-direction: column;
                align-items: center;
            }

            .card {
                max-width: 100%;
                width: 100%;
            }

            .site-title {
                font-size: 22px;
            }

            .site-subtitle {
                font-size: 13px;
                margin-bottom: 36px;
            }

            .container {
                padding: 32px 20px 80px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">ALGO LAB</div>
        <h1 class="site-title">幹細胞治療の情報整理</h1>
        <p class="site-subtitle">あなたに合ったご案内を選択してください</p>

        <div class="cards">
            <!-- Individual Card -->
            <div class="card" onclick="selectType('individual')" role="button" tabindex="0">
                <div class="card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <div class="card-title">個人の方</div>
                <div class="card-description">幹細胞治療の情報整理と無料相談</div>
            </div>

            <!-- Clinic Card -->
            <div class="card" onclick="selectType('clinic')" role="button" tabindex="0">
                <div class="card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4.8 2.62A2 2 0 0 1 6.54 2h.5a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-.5a2 2 0 0 1-1.74-1"/>
                        <path d="M8 15a6 6 0 0 0 12 0v-3"/>
                        <circle cx="20" cy="10" r="2"/>
                        <path d="M6 12V2"/>
                        <path d="M6 7h1"/>
                    </svg>
                </div>
                <div class="card-title">医療機関の方</div>
                <div class="card-description">医療機関向け製品情報・導入相談</div>
            </div>
        </div>

        <p class="footer-note">※ いつでも切り替え可能です</p>
    </div>

    <div class="disclaimer">当サイトは医療機関ではありません。掲載情報は参考情報であり、診断・治療を目的とするものではありません。</div>

    <script>
        function selectType(type) {
            if (type === 'individual') {
                window.location.href = '/clinic/consult/';
            } else if (type === 'clinic') {
                window.location.href = '/clinic/';
            }
        }

        // Allow keyboard activation on cards
        document.querySelectorAll('.card').forEach(function(card) {
            card.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    card.click();
                }
            });
        });
    </script>
</body>
</html>
