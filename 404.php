<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ページが見つかりません｜ALGO LAB</title>
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
            max-width: 640px;
            text-align: center;
        }

        .error-code {
            font-size: 80px;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: rgba(255, 255, 255, 0.15);
            margin-bottom: 16px;
        }

        .error-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .error-message {
            font-size: 15px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 48px;
            line-height: 1.8;
        }

        .buttons {
            display: flex;
            gap: 20px;
            width: 100%;
            justify-content: center;
        }

        .btn {
            display: inline-block;
            padding: 16px 32px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        }

        .btn--primary {
            background: #fff;
            color: #0A1628;
        }

        .btn--secondary {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.3);
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
            .buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 280px;
            }

            .error-code {
                font-size: 56px;
            }

            .error-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-code">404</div>
        <h1 class="error-title">ページが見つかりません</h1>
        <p class="error-message">お探しのページは存在しないか、移動した可能性があります。</p>

        <div class="buttons">
            <a href="/consult/" class="btn btn--primary">個人の方 TOPへ</a>
            <a href="/clinic/" class="btn btn--secondary">医療機関の方 TOPへ</a>
        </div>
    </div>

    <div class="disclaimer">当サイトは医療機関ではありません。</div>
</body>
</html>
