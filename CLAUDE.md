# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Japanese-language B2C website for ALGO Inc. — 幹細胞治療（stem cell therapy）の情報整理・教育コンテンツサイト。消費者が後悔のない判断をできるよう、仕組み・安全性・費用・根拠などを8つのコンテンツで整理。Traditional server-side PHP with no frameworks, no build tools, and no package managers. All content is in Japanese.

## Development

**No build step required.** Serve with any PHP-capable local server:

```bash
php -S localhost:8000
```

**PHP syntax check (matches CI):**
```bash
for f in **/*.php; do php -l "$f"; done
```

There are no automated tests. CI runs PHP lint, guardrail pattern checks, and post-deploy HTTP smoke tests only.

## CI/CD (`.github/workflows/deploy.yml`)

- **Validation** (on push & PR to `main`): PHP syntax lint, forbidden pattern guardrails (merge conflict markers, `<style>` tags in CSS files, private keys), image size check (max 800KB).
- **Deploy** (push to `main` only): SSH to Sakura server, `git reset --hard origin/main`, then HTTP 200 checks on 7 key pages.

## Architecture

**No routing framework** — each page is a standalone PHP file at the repo root (`index.php`, `about.php`, `work01.php`–`work08.php`, etc.). URL path maps directly to file name.

### Page composition pattern

Pages include shared components from `components/`:
- `header.php` — global nav (5 items + CTA)
- `footer.php` — global footer with 4-column grid
- `head-meta.php` — OGP / meta tags (included inside `<head>`)
- `page-template.php` — standard 2nd-level page template. Variables: `$page_title`, `$page_eyebrow`, `$page_lead`, `$page_content` (via `ob_start()`/`ob_get_clean()`), `$page_prev`, `$page_next`
- `work-detail-template.php` — work detail page template. Extends page-template with `$work_page_title`, `$work_lead`, `$work_content`. Eyebrow from `work.json` `cat` field. Image section conditionally hidden when `$work_content` is set.

`index.php` manages its own `<head>` and includes `header.php`/`footer.php` directly. Other pages use either `page-template.php` or `work-detail-template.php`.

### CSS architecture (Apple-inspired design system)

Three-layer CSS, no per-page `<style>` blocks:
- `design-system.css` — design tokens as CSS custom properties (`--color-*`, `--fs-*`, `--sp-*`, `--radius-*`). Warm greys, trust blue `#0071E3`.
- `page.css` — 2nd-level page styles (breadcrumb, hero, prose, form, prev/next nav)
- `main.css` — homepage-specific components (slider, mosaic grid, work cards, CTA bands)

### Data layer

Work items are stored in `data/work.json` (flat JSON object keyed by string IDs "1"–"8", each with `cat`, `title`, `text` fields). The admin panel (`admin/`) reads and writes this file with `file_get_contents`/`file_put_contents` using `LOCK_EX`.

### Key directories

- `components/` — reusable PHP includes (header, footer, templates, CTAs, meta)
- `pages/` — legacy sub-templates (blocks, slides, works); homepage still references some
- `admin/` — simple CRUD for work items (list → edit → save via POST)
- `assets/css/` — `design-system.css`, `page.css`, `main.css`
- `assets/img/work/` — work portfolio images

## Conventions

- All HTML output uses `htmlspecialchars($val, ENT_QUOTES, 'UTF-8')` for escaping
- URL parameters use `rawurlencode()`
- JSON is written with `JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES`
- CSS cache busting via `?v=<?php echo time(); ?>` query string
- All pages have finalized Japanese copy (no stubs remain)
- Backup files (`*.bak_*`, `*.fix_*`) are gitignored

## リポジトリ・サーバー情報
| 項目 | 値 |
|------|-----|
| GitHub | stemcell-b2c（Private） |
| 本番URL | https://cells.algo-cosme.com/（※B2Bサイトと同ドメイン、パス未確定） |
| ローカルパス | ~/stemcell-b2c/ |
| デプロイ | GitHub Actions自動（mainへpush → FTP Deploy） |
| サーバー | さくらサーバー（FTP） |

### デプロイの仕組み
- `.github/workflows/deploy.yml` で `sand4rt/ftp-deployer@v1.8` を使用
- mainブランチへのpushがトリガー
- FTP接続情報・デプロイパスはGitHub Secrets（`FTP_SERVER`, `FTP_USERNAME`, `FTP_PASSWORD`, `DEPLOY_PATH`）
- `cleanup: true` で削除されたファイルもサーバーから除去

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
- [ ] バックアップファイル（*.bak_*, *.fix_*）の整理・削除
- [ ] OGP / SEO meta情報の充実
- [ ] CONTACTフォームの実装（現在は情報掲載のみ）

## よくあるトラブル・注意点
- **バックアップファイルが多数残っている**: `*.bak_*`, `*.fix_*` が各所にある。.gitignoreで除外済みだがローカルには存在
- **pages/ は旧構成**: `pages/blocks/`, `pages/slides/`, `pages/works/` はレガシー。index.phpから一部参照されているが、work01〜08.phpが正規版
- **CSSは3層構造を守る**: design-system.css（トークン）→ page.css（下層ページ）→ main.css（TOP専用）。`<style>`タグをPHPに書かない
- **デザイン構造を崩さない**: 1920/480グリッド + LiftKit 1:1.6比率が基本

## Project Rules

Rule Mode: PROPOSE_DIFF_OK_APPLY

- 変更は必ず「提案 → 差分提示 → OK後に適用」の順で行う
- 勝手にコマンド実行しない（必要な場合は都度確認）
- git commit は私の許可後
- deploy は私の許可後
- 既存デザイン構造（1920/480グリッド）を崩さない
- LiftKit思想（1:1.6比率）を優先

## 最終更新
- **日付**: 2026-03-02
- **更新者**: Hide
- **内容**: CLAUDE.md にリポジトリ情報・作業ステータス・注意点・終了時ルールを追記
- **次回やること**: バックアップファイル整理、CONTACTフォーム実装

---

## 終了時ルール
Hideが「終了」「終わり」「おわり」と言ったら、以下を実行すること：
1. 作業ステータスを更新（完了したものに[x]をつける）
2. 最終更新の日付・次回やることを更新
3. ハマったポイントがあれば「よくあるトラブル」に追記
4. git add → commit → push
