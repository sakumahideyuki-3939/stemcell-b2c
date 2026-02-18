# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Japanese-language B2C website for ALGO Inc. (幹細胞点鼻タイプ — stem cell nasal spray products). Traditional server-side PHP with no frameworks, no build tools, and no package managers. All content is in Japanese.

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
- `header.php` — global nav (included at top of every page)
- `footer.php` — global footer (included at bottom)
- `layout_open.php` / `layout_close.php` — HTML boilerplate (`<head>`, Google Fonts, CSS link, `<body>`)

Some pages (like `index.php`) use `header.php`/`footer.php` directly without the `layout_open`/`layout_close` wrappers. This inconsistency is intentional for now.

### Layout system

- 1920px max-width container (`.index-1920`)
- 960px baseline section height
- CSS grid for homepage sections (concept grids, work grid)
- Mobile breakpoint at 959px
- Styles are in `assets/css/main.css` plus per-page `<style>` blocks in PHP files

### Data layer

Work items are stored in `data/work.json` (flat JSON object keyed by string IDs "1"–"8"). The admin panel (`admin/`) reads and writes this file with `file_get_contents`/`file_put_contents` using `LOCK_EX`.

### Key directories

- `components/` — reusable PHP includes (header, footer, layout, CTAs, breadcrumbs)
- `pages/blocks/`, `pages/slides/`, `pages/works/` — sub-templates included by main pages
- `admin/` — simple CRUD for work items (list → edit → save via POST)
- `assets/css/` — single `main.css` stylesheet
- `assets/img/work/` — work portfolio images

## Conventions

- All HTML output uses `htmlspecialchars($val, ENT_QUOTES, 'UTF-8')` for escaping
- URL parameters use `rawurlencode()`
- JSON is written with `JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES`
- CSS cache busting via `?v=<?php echo time(); ?>` query string
- Several pages are stubs showing "準備中" (under preparation): about, concept, evidence
- Backup files (`*.bak_*`, `*.fix_*`) are gitignored

## Project Rules

- 変更は必ず「提案 → 差分提示 → OK後に適用」の順で行う
- 勝手にコマンド実行しない（必要な場合は都度確認）
- git commit は私の許可後
- deploy は私の許可後
- 既存デザイン構造（1920/480グリッド）を崩さない
- LiftKit思想（1:1.6比率）を優先
