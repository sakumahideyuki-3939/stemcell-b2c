# CLAUDE.md

## プロジェクト概要

ALGO Inc.の幹細胞治療（stem cell therapy）B2C情報サイト。消費者が後悔のない判断をできるよう、仕組み・安全性・費用・根拠などを8つのコンテンツで整理する日本語サイト。フレームワークなし・ビルドツールなしの素のPHP構成。

## リポジトリ・サーバー情報

| 項目 | 値 |
|------|-----|
| GitHub | stemcell-b2c（Private） |
| 本番URL | https://cells.algo-cosme.com/ |
| ローカルパス | ~/stemcell-b2c/ |
| デプロイ方法 | GitHub Actions → FTP（mainへpush時に自動） |
| 本番サーバー | さくらサーバー（FTP） |
| デプロイパス | GitHub Secrets `DEPLOY_PATH` で管理 |

### deploy.yml の注意点（`.github/workflows/deploy.yml`）

- **アクション**: `sand4rt/ftp-deployer@v1.8`（FTP、port 21、パッシブモード）
- **トリガー**: `main` ブランチへの push のみ
- **`cleanup: true`**: ローカルで削除したファイルはサーバーからも消える。意図しないファイル削除に注意
- **Secrets**: `FTP_SERVER`, `FTP_USERNAME`, `FTP_PASSWORD`, `DEPLOY_PATH`（すべてGitHub Secretsで管理）
- **`local_folder: ./`**: リポジトリルート全体をアップロードする。`.gitignore` は無関係にFTPされるため、不要ファイルはリポジトリから除外すること
- **バリデーションステップなし**: PHP lintやテストは自動実行されない。pushする前に手元で `php -l` で確認すること

### ローカル開発

```bash
# サーバー起動（ビルド不要）
php -S localhost:8000

# PHP構文チェック（push前に実行推奨）
for f in **/*.php; do php -l "$f"; done
```

## フォルダ構造

```
stemcell-b2c/
├── index.php              # ルーティングモーダル（Cookie分岐 → /consult/ or /clinic/）
├── sitemap.xml             # 統合サイトマップ
├── robots.txt              # クロール設定
├── consult/               # B2C — 個人向け相談サイト
│   ├── index.php              # TOPページ（ヒーロースライダー + WORK一覧）
│   ├── about.php〜contact.php # 下層ページ群
│   ├── work01.php〜work08.php # WORK詳細8ページ
│   ├── components/            # B2C共通PHPパーツ
│   │   ├── header.php         # グローバルナビ + サイト切り替えバー
│   │   ├── footer.php         # フッター + 医療機関リンク
│   │   ├── head-meta.php      # OGP / metaタグ
│   │   ├── page-template.php  # 下層ページテンプレート
│   │   ├── work-detail-template.php # WORK詳細テンプレート
│   │   └── faq_full.php       # FAQ 15問 + JSON-LD
│   ├── assets/css/            # design-system.css / page.css / main.css
│   ├── assets/img/            # ヒーロー画像・favicon等
│   ├── assets/js/main.js      # スライダー・FAQ・ステップフォーム
│   ├── data/work.json         # WORKデータ
│   └── admin/                 # 管理画面（CRUD）
├── clinic/                # B2B — 医療機関向けサイト
│   ├── index.php              # TOPページ（UNIQUE Grid System）
│   ├── concept.php〜contact.php # 下層ページ群
│   ├── products.php           # 製品情報
│   ├── components/            # B2B共通PHPパーツ
│   ├── assets/css/            # main.css / reset.css
│   ├── assets/images/         # B2B用画像
│   └── assets/js/script.js    # B2Bスクリプト
├── common/                # 共有ページ
│   ├── privacy.php            # プライバシーポリシー
│   └── tokusho.php            # 特商法表記
└── .github/workflows/
    └── deploy.yml             # FTPデプロイ設定
```

## 技術仕様・データ仕様

### ページ構成パターン

- **TOPページ** (`index.php`): 独自に `<head>` を管理し、`header.php` / `footer.php` を直接include
- **下層ページ**: `page-template.php` を使用。変数 `$page_title`, `$page_eyebrow`, `$page_lead`, `$page_content`（`ob_start()`/`ob_get_clean()`で渡す）, `$page_prev`, `$page_next`
- **WORK詳細**: `work-detail-template.php` を使用。変数 `$work_page_title`, `$work_lead`, `$work_content`。カテゴリは `work.json` の `cat` フィールドから取得

### CSS 3層構造（Apple風デザインシステム）

| レイヤー | ファイル | 役割 |
|----------|----------|------|
| トークン | `design-system.css` | CSS変数定義（`--color-*`, `--fs-*`, `--sp-*`, `--radius-*`）。基調色: warm grey + trust blue `#0071E3` |
| 下層ページ | `page.css` | breadcrumb, hero, prose, form, prev/next nav |
| TOP専用 | `main.css` | slider, mosaic grid, work cards, CTA bands |

**ルール**: `<style>` タグをPHPファイルに書かない。必ずCSSファイルに書く。

### デザイン基本ルール

- **グリッド**: 1920px / 480px 基準
- **比率**: LiftKit思想（1:1.6比率）を優先
- 既存デザイン構造を崩さない

### データ（`data/work.json`）

フラットなJSONオブジェクト。キーは文字列 `"1"` 〜 `"8"`。

```json
{ "cat": "START HERE", "title": "はじめての方へ", "text": "説明文..." }
```

- 管理画面（`admin/`）から `file_get_contents` / `file_put_contents`（`LOCK_EX`）で読み書き
- JSON書き出し時: `JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES`

### コーディング規約

- HTML出力は必ず `htmlspecialchars($val, ENT_QUOTES, 'UTF-8')` でエスケープ
- URLパラメータは `rawurlencode()` を使用
- CSSキャッシュバスト: `?v=<?php echo time(); ?>` クエリ文字列
- バックアップファイル（`*.bak_*`, `*.fix_*`）は `.gitignore` で除外済み

## Project Rules

**Rule Mode: PROPOSE_DIFF_OK_APPLY**

- 変更は必ず「提案 → 差分提示 → OK後に適用」の順で行う
- 勝手にコマンド実行しない（必要な場合は都度確認）
- git commit は私の許可後
- deploy は私の許可後

## 作業ステータス

- [x] デザインシステム構築（design-system.css / page.css / main.css 3層CSS）
- [x] 全ページPHP部品化（header / footer / page-template / work-detail-template）
- [x] TOPページ（ヒーロースライダー + モザイクグリッド + WORK一覧）
- [x] ABOUT / CONCEPT / EVIDENCE / COMPANY / CONTACT ページ
- [x] WORK詳細8ページ（work01〜work08）+ work.json データ管理
- [x] 管理画面（admin/）— WORKデータのCRUD
- [x] GitHub Actions FTPデプロイ設定
- [x] LiftKit 1:1.6比率適用
- [x] Lucide SVGアイコン導入
- [x] CLAUDE.md テンプレート再構成
- [x] B2C/B2B統合サイト構築（/consult/ + /clinic/ + /common/ + ルーティングモーダル）
- [x] Cookie分岐ルーティングモーダル（index.php）
- [x] sitemap.xml / robots.txt 統合版作成
- [x] 薬機法NGワードチェック完了
- [x] コンテンツ境界検証（consult/にB2B情報なし、clinic/に個人販売情報なし）
- [ ] バックアップファイル（*.bak_*, *.fix_*）の整理・削除
- [ ] CONTACTフォームのバックエンド実装（現在はフロントのみ）
- [ ] GA4タグ設置

## よくあるトラブル・注意点

- **サイト構造が3層に分かれている**: `/consult/`（個人向けB2C）、`/clinic/`（医療機関向けB2B）、`/common/`（共有ページ）。ルート `index.php` はCookie分岐モーダル
- **Cookie `user_type`**: `individual` → /consult/、`clinic` → /clinic/。`?reset=1` でクリアしてモーダルに戻る。有効期限30日
- **B2CのCSSは3層構造を守る**: `design-system.css`（トークン）→ `page.css`（下層ページ）→ `main.css`（TOP専用）。`<style>` タグをPHPに書かない
- **B2BのCSSは別体系**: `reset.css` + `main.css`（UNIQUE Grid System）。B2Cとは完全に独立
- **コンテンツ境界を守る**: `/consult/` に試薬スペック・価格を載せない。`/clinic/` に個人向け販売・相談を載せない
- **deploy.ymlにlintなし**: CI/CDにPHP構文チェックがないため、push前に手元で `php -l` すること
- **FTP cleanup=true**: リポジトリから消したファイルはサーバーからも消える。旧URLは404になる
- **バックアップファイルが残っている**: `*.bak_*`, `*.fix_*` がローカルにある。`.gitignore` で除外済み

## 最終更新

- **日付**: 2026-03-07
- **更新者**: Hide + Claude
- **内容**: B2C/B2B統合サイト構築（ルーティングモーダル + /consult/ + /clinic/ + /common/）
- **次回やること**: バックアップファイル整理、CONTACTフォームバックエンド実装、GA4タグ設置

---

## 終了時ルール

Hideが「終了」「終わり」「おわり」と言ったら、以下を実行すること：
1. 作業ステータスを更新（完了したものに[x]をつける）
2. 最終更新の日付・次回やることを更新
3. git add → commit → push
