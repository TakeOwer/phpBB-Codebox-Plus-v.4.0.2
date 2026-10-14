# Codebox Plus 4.0.6 for phpBB 3.3

Responsive code boxes with **syntax highlighting for 259 languages**, a utility toolbar (copy, select, word wrap, line numbers, fullscreen, download), light/dark themes, and **secure code downloading** as a file.

![Version](https://img.shields.io/badge/version-4.0.6-105080)
![phpBB](https://img.shields.io/badge/phpBB-3.3.x-377a33)
![PHP](https://img.shields.io/badge/PHP-%3E%3D7.4-377a33)
![License](https://img.shields.io/badge/license-GPL--2.0--only-7f7f7f)

- **Original Author:** Huynh Buu Tam ([o0johntam0o](https://github.com/o0johntam0o)) – Codebox Plus 2.0.0 (2014)
- **Rewrite for phpBB 3.3 & New Features:** Salvo Cortesiano – [Le Ombre della Rete 360°](https://www.netshadows.de/ombra/)
- **Highlighting Engine:** [GeSHi](https://github.com/GeSHi/geshi-1.0) by Nigel McNie and Benny Baumann
- **License:** GNU GPL 2.0 (`license.txt`)

---

## Table of Contents

1. [Requirements](#1-requirements)
2. [What's New Compared to the Original Extension](#2-whats-new-compared-to-the-original-extension)
3. [Installation](#3-installation)
4. [Upgrading from the Original o0johntam0o/codeboxplus Extension](#4-upgrading-from-the-original-o0johntam0ocodeboxplus-extension)
5. [Usage in Posts](#5-usage-in-posts)
6. [The Code Box Toolbar](#6-the-code-box-toolbar)
7. [Code Downloading and Security](#7-code-downloading-and-security)
8. [Administration Control Panel (ACP)](#8-administration-control-panel-acp)
9. [Check-up](#9-check-up)
10. [ForumUS Style and Other Styles](#10-forumus-style-and-other-styles)
11. [Languages](#11-languages)
12. [Troubleshooting](#12-troubleshooting)
13. [File Structure](#13-file-structure)
14. [Changelog](#14-changelog)

---

## 1. Requirements

| Component | Version |
|---|---|
| phpBB | 3.3.0 or later (tested on **3.3.19**) |
| PHP | 7.2 or later (tested on PHP 8.2 / 8.3) |
| PHP Modules | `dom`, `libxml`, `mbstring` (present in all standard installations) |
| Styles | prosilver, **ForumUS**, "Subway" and any derived style (files are in `styles/all`) |

## 2. What's New Compared to the Original Extension

The original extension (2014) no longer works on phpBB 3.3 and PHP 8: the BBCode used the regular expression `/e` modifier (removed in PHP 7), the `routing.yml` file was invalid, the controller initialized the session within the constructor, the download bypassed the template system, and code recognition relied on fragile regular expressions. It has therefore been **rewritten from scratch**, while maintaining full backward compatibility with existing posts.

### Fixes and Modernization

- BBCode registered directly into phpBB 3.3's s9e text formatter (no more manual tweaking in the unalterable BBCode table).
- Box content is no longer altered: no BBCode, smilies, auto-links, or `<br>` tags inside the code block.
- Posts written with the old extension (`[Codebox=php file=x.php]...[/Codebox]`) continue to render and download correctly, even those still containing smilies or BBCodes saved inside them.
- GeSHi updated to the latest version (1.0.9.1 master 2024), featuring PHP 8 fixes (zero warnings or deprecations across all 259 languages, tested one by one).
- 35 new languages: Rust, Kotlin, Swift, Dart, Julia, Nginx, Sass, Twig, VBScript, Windows Batch, Nim, Racket, PostScript, Standard ML, SSH config, and more, plus **JSON** and **TypeScript**.
- Convenient aliases: `js`, `ts`, `html`, `py`, `sh`, `yml`, `cs`, `kt`, `rs`, `golang`, `bat`, `ps1`, `txt`, `md`… (see §5).
- Code ready for phpBB EPV validation: **0 errors, 0 warnings, 0 notices**.

### New Features

- Modern editor-style responsive code box featuring language name, file name, and line numbers.
- One-click clipboard copy (line numbers are never copied).
- Select All, word wrap, show/hide line numbers, **fullscreen mode** (Press `Esc` to exit).
- Fixed line numbers during horizontal scrolling; click a line number to highlight that line.
- Long code blocks collapsed to a configurable max height with a "Show all code" toggle bar.
- **6 themes**: Automatic (light/dark based on device settings), Light, Dark, Monokai, Dracula, Nord.
- **Editor button** (posts, quick reply, private messages) opening a modal with language search, frequently used languages, file name input, and BBCode preview.
- Secure downloading: forum permission checks, unapproved post filters, bot blocking, force login, "Can download files" permission, CAPTCHA with attempt limits, and a **code fingerprint** system preventing the download of hidden code (e.g., inside `[hide]` tags).
- Highlighting cache and size limits to prevent server overhead.
- ACP with info panels, live preview, maintenance tasks with AJAX confirmation, and a dedicated **Check-up** tab.
- Download counter.
- Full translations in Italian, English, German, Spanish, Swedish, Estonian, and Vietnamese.

## 3. Installation

1. Extract the zip archive: you will obtain the `salvocortesiano/codeboxplus` folder.
2. Upload the folder via FTP to your forum's `ext/` directory, resulting in `ext/salvocortesiano/codeboxplus/composer.json`.
3. Go to ACP → **Customize** → **Extension Management** → *Codebox Plus* → **Enable**.
4. Purge the cache (ACP → General → Purge the cache).
5. Go to ACP → **Extensions** → **Codebox Plus** → **Check-up** and verify everything is green.

> Via Command Line (SSH):
> ```bash
> /opt/alt/php82/usr/bin/php bin/phpbbcli.php extension:enable salvocortesiano/codeboxplus
> /opt/alt/php82/usr/bin/php bin/phpbbcli.php cache:purge
> ```

### Upgrading to a Newer Version

Disable the extension (without deleting data), replace files via FTP, purge the cache, re-enable the extension, and purge both the cache and the `cache/production/twig` folder again.

### Uninstallation

ACP → Extension Management → **Disable**, then **Delete Data**. Posts remain in the database: the BBCode will revert to displaying as plain text.

## 4. Upgrading from the Original o0johntam0o/codeboxplus Extension

The new version is named `salvocortesiano/codeboxplus` and **cannot run simultaneously with the original** (they share the same BBCode; activation is blocked with a notice if the old one is active).

1. ACP → Extension Management → *Codebox Plus* (original) → **Disable**.
2. *(Optional)* **Delete Data** for the old extension. This does not affect your posts.
3. Delete the `ext/o0johntam0o/codeboxplus` folder from your server.
4. Install the new version as described in §3.

During installation, the new version automatically:

- **imports settings** from the old version (highlighting, expanded state, download, force login, bot blocking, max attempts);
- **removes the `[Codebox=]` row** from the BBCode table (which would otherwise conflict);
- removes old `codebox_plus_*` settings if the old extension is no longer installed.

Existing posts **do not need modification**: they are recognized automatically. If your forum comes from phpBB 3.0/3.1 and the Check-up flags posts "in the old format", run once:

```bash
/opt/alt/php82/usr/bin/php bin/phpbbcli.php reparser:reparse post_text
```

## 5. Usage in Posts

```text
[codebox=php file=index.php]
<?php
echo "Hello World";
[/codebox]
```

| Syntax | Result |
|---|---|
| `[codebox=php file=index.php]...[/codebox]` | PHP, with file name (also used for downloading) |
| `[codebox=python]...[/codebox]` | Python, automatic file name (`codice.py`) |
| `[codebox]...[/codebox]` | Plain text |
| `[Codebox=cpp file=test.cpp]...[/codebox]` | Old extension syntax: still fully supported |

- The file name can contain letters, numbers, spaces, and `- + . , _`. If the extension is missing, it is added automatically.
- The language identifier corresponds to a GeSHi identifier (`php`, `javascript`, `html5`, `css`, `sql`, `mysql`, `bash`, `cpp`, `csharp`, `java`, `python`, `ruby`, `go`, `rust`, `kotlin`, `json`, `yaml`, `xml`, `ini`, `apache`, `nginx`, `diff`, …). The complete list is available inside the editor button modal.
- **Accepted aliases:** `js`→javascript, `ts`→typescript, `html`/`htm`→html5, `xhtml`/`svg`→xml, `py`/`python3`→python, `sh`/`shell`/`zsh`→bash, `yml`→yaml, `cs`→csharp, `kt`→kotlin, `rs`→rust, `golang`→go, `vbs`→vbscript, `bat`/`cmd`→batch, `ps1`→powershell, `c++`→cpp, `htaccess`→apache, `mariadb`→mysql, `scss`/`less`→css, `patch`→diff, `rb`→ruby, `pl`→perl, `txt`/`plain`/`md`/`markdown`→plain text.
- An unknown language defaults to plain text without throwing errors.
- Inside the box, BBCodes, smilies, and links are **not** parsed: the code remains exactly as written.
- Code blocks can contain nested `[codebox]` and `[/codebox]` tags (for example, phpBB extension source code or a string like `'[/codebox]'`): the extension automatically appends a suffix to the outer box (`[codebox:101=php]...[/codebox:101]`), ensuring it always closes correctly. If you see this when editing a post, it is completely normal: do not remove it.
- If you have multiple code boxes in the same post and one of them contains an unclosed `[codebox]`, you can manually specify the suffix: `[codebox:1=php]...[/codebox:1]`.

### The Editor Button

The editor toolbar (and quick reply area) features the **`</>`** button. Clicking it opens a modal providing:

- Instant search by name, identifier, or extension (`py`, `sql`, …);
- Frequently used languages (configurable in ACP) pinned at the top;
- Complete list of all 259 supported languages;
- Optional file name field;
- Live preview of the generated BBCode.

Selected text in the editor is automatically wrapped inside the box; without a selection, the cursor is placed inside the empty box. Press `Enter` to insert, `Esc` to close, or double-click a language to insert immediately. The last used language is remembered.

## 6. The Code Box Toolbar

| Button | Function |
|---|---|
| **Show all code (N lines)** | Appears on the left side of the toolbar only when code exceeds max height; clicking it toggles to **Show less** (Font Awesome icon ⇣/⇡) |
| **Copy** | Copies code to clipboard (excluding line numbers). Displays "Copied!" |
| Select All | Selects the code content |
| Word Wrap | Wraps long lines / toggles horizontal scrolling |
| Line Numbers | Shows/hides line numbers |
| Fullscreen | Expands the code box to fullscreen (`Esc` to exit) |
| **Download** | Downloads the code as a file with the specified name |

At the bottom of the box, **credits** are displayed (can be disabled in ACP): original author copyright with a link to their repository, phpBB 3.3 version copyright with a link to Salvo Cortesiano's website, and a link to the GitHub repository.

Additional features: click any line number to highlight that line, fixed line numbers during horizontal scrolling, and clean print layout (without buttons or height limits).

On mobile devices, the header wraps to two lines, and toolbar buttons switch to larger icons; container queries ensure the same responsive behavior in narrow containers (quotes, side columns).

## 7. Code Downloading and Security

- **In topics** (and topic review during reply), files are served by the forum via `app.php/codeboxplus/download/{post id}/{fingerprint}` after passing these checks:
  1. Downloads enabled;
  2. Bot blocking (if enabled);
  3. Force login (if enabled) → redirects to phpBB login page;
  4. **Authorized groups** (if selected in ACP): other registered users do not see the download button and receive "Your user group is not authorized"; guests are prompted to log in;
  5. Post exists and is approved (moderators with `m_approve` can also download pending posts);
  6. **Forum read permission** and, if required, **"Can download files"** permission;
  7. Anti-spambot CAPTCHA (if enabled), with session attempt limits; once solved, it remains valid for 30 minutes;
  8. The code's **fingerprint** (SHA-256) must match a code box within the post.
- The fingerprint is calculated on the code **actually displayed** to the user: code hidden behind BBCode tags like `[hide]`, `[hhide]`, or `[ghide]` cannot be downloaded by users who cannot view it.
- In **previews** and **private messages**, files are generated directly by the browser (zero server requests).
- Files are sent as `text/plain; charset=UTF-8`, with `nosniff`, `no-store`, and `noindex` headers.
- Each forum download increments the counter displayed in the ACP.

## 8. Administration Control Panel (ACP)

ACP → **Extensions** → **Codebox Plus**. At the top: summary boxes displaying extension version, PHP, phpBB, GeSHi, language count, downloads, and license. At the bottom: credits.

### Display Settings

| Option | Default | Description |
|---|---|---|
| Syntax highlighting | Yes | Colors code using GeSHi |
| Color theme | Automatic | Automatic, Light, Dark, Monokai, Dracula, Nord |
| Line numbers | Yes | Initial state (users can toggle) |
| Word wrap | No | Initial state (users can toggle) |
| Always expanded | No | If *No*, long code blocks are collapsed to max height |
| Maximum height | 420 px | 120 – 3000 |
| Tab width | 4 | 1 – 8 |
| Editor button | Yes | `</>` button in editor, quick reply, and PMs |
| Most used languages | php, javascript, html5, … | Comma-separated identifiers; invalid ones are flagged |

### Download Settings

| Option | Default | Description |
|---|---|---|
| Enable downloads | Yes | Displays the *Download* button |
| Force login | No | Guests must log in |
| **Authorized download groups** | none = all | Multi-select user groups (Ctrl/Cmd + click). Only members of selected groups can download; "Deselect all" reverts to "all groups" |
| Block bots | Yes | Bots cannot see the button or download |
| Require "Can download files" permission | No | Uses forum attachment permissions |
| Anti-spambot confirmation | No | Uses CAPTCHA configured in *Anti-spambot countermeasures* |
| Confirmation for guests only | Yes | Registered users bypass CAPTCHA |
| Maximum attempts | 3 | Allowed errors per session |

### Credits Settings

| Option | Default | Description |
|---|---|---|
| Show credits | Yes | Credit line at the bottom of each code box |
| GitHub repository URL | empty | Your repository; if empty, `CBP_CREDITS_REPO_URL` from language files is used |

Credit names and URLs are located in `language/xx/common.php` at the bottom under the comment *“Credits at the bottom of the boxes”*:

```php
'CBP_CREDITS_ORIGINAL_NAME' => 'o0johntam0o (Huynh Buu Tam)',
'CBP_CREDITS_ORIGINAL_URL'  => 'https://github.com/o0johntam0o/phpBB-Extension-Codebox-Plus',
'CBP_CREDITS_AUTHOR_NAME'   => 'Salvo Cortesiano',
'CBP_CREDITS_AUTHOR_URL'    => 'https://www.netshadows.de/ombra/',
'CBP_CREDITS_REPO_URL'      => 'https://github.com/YOUR-GITHUB-USERNAME/phpbb-codeboxplus', // placeholder: replace this
```

### Performance Settings

| Option | Default | Description |
|---|---|---|
| Highlighting limit | 256 KiB | Code exceeding this size renders without syntax colors |
| Highlighting cache | 86400 s | 0 = disabled |

### Live Preview & Maintenance

- The **live preview** on the right updates instantly as you change themes, line numbers, word wrap, height, and tab width.
- **Purge highlighting cache**, **Reset counter**, and **Restore default settings** require confirmation via phpBB's AJAX modal and are logged in the administrator log.

## 9. Check-up

The **Check-up** tab runs 18 diagnostic tests, displaying results as *OK*, *Warning*, *Error*, or *Info*:

1. PHP version;
2. phpBB version;
3. PHP modules (`dom`, `libxml`, `mbstring`);
4. Presence of all GeSHi language definition files;
5. Actual syntax highlighting test using sample PHP code;
6. Registration of the `[codebox]` BBCode in the text formatter;
7. Code box generation with toolbar and line numbers;
8. Fingerprint consistency between displayed code and saved code (download links);
9. Download URL generation;
10. Presence of legacy `[Codebox=]` BBCode in the database BBCode table (with **Remove it now** button);
11. Original extension still active or folder still present;
12. Cache read/write permissions;
13. Authorized download groups configuration;
14. CAPTCHA plugin availability (if confirmation is enabled);
15. Language files for installed forum languages;
16. Style files (CSS, JavaScript, template);
17. Number of posts containing code boxes;
18. Posts still saved in legacy phpBB 3.0/3.1 format.

## 10. ForumUS Style and Other Styles

- All graphic assets are located in `styles/all`, ensuring compatibility with **ForumUS**, prosilver, and any other style without needing duplicate file copies.
- CSS uses custom classes prefixed with `cbp-` and specific selectors, preventing ForumUS rules on `pre`, `code`, `button`, `ol`, and `li` from breaking the layout.
- The editor button is inserted into the standard toolbar (`posting_editor_buttons_custom_tags_before`). If a style or extension (e.g., ABBC3) replaces or hides that bar, the script automatically appends a **Code** button above the text area.
- The **Automatic** theme follows the device's light/dark mode preference. If using a dark variant of ForumUS, select the **Dark**, **Monokai**, **Dracula**, or **Nord** theme in the ACP.

## 11. Languages

| Language | Interface | ACP | Language Names |
|---|---|---|---|
| Italian | ✔ | ✔ | ✔ |
| English | ✔ | ✔ | ✔ |
| German | ✔ | ✔ | ✔ |
| Spanish | ✔ | ✔ | ✔ |
| Swedish | ✔ | ✔ | ✔ |
| Estonian | ✔ | ✔ | ✔ |
| Vietnamese | ✔ | ✔ | ✔ |

All text strings reside in `language/xx/`: `common.php` (box, editor, download), `syntax.php` (names of the 259 languages), `info_acp_codeboxplus.php` (modules and logs), and `acp_codeboxplus.php` (panel).

## 12. Troubleshooting

| Issue | Solution |
|---|---|
| BBCode appears as plain text `[codebox=...]` | Purge forum cache; check Check-up (item 6) |
| "There are no registered paths for namespace salvocortesiano_codeboxplus" after disabling extension | Purge cache and delete `cache/production/twig` |
| A post written with version 4.0.0 containing `[codebox]` inside code is still broken | Edit and re-save the post, or run `bin/phpbbcli.php reparser:reparse post_text` |
| Download returns "code not found" | The post was edited after the page was loaded: reload the topic |
| Colors do not update after changing theme | Hard-refresh the page with Ctrl+F5 (browser cache) |
| Massive code block loads slowly | Lower the *Highlighting limit* or keep cache enabled |
| Copy button does not work | On insecure HTTP connections, some browsers block clipboard access: an fallback method is used; "Select All" remains available |
| CAPTCHA does not appear | Check *Anti-spambot countermeasures* and Check-up (item 13) |

## 13. File Structure

```text
salvocortesiano/codeboxplus/
├── composer.json            metadata, version, authors
├── ext.php                  requirements and block if original extension is active
├── license.txt              GPL 2.0
├── README.md                this guide
├── CHANGELOG.md
├── acp/                     ACP module (Settings, Check-up)
├── adm/style/               ACP template, CSS, and JS
├── config/                  services.yml, routing.yml
├── controller/
│   ├── acp_controller.php   settings, maintenance, check-up
│   └── download.php         secure download (permissions, bots, CAPTCHA)
├── core/
│   ├── access.php           download permissions (bots, login, groups)
│   ├── catalog.php          259 languages, aliases, file extensions
│   ├── highlighter.php      GeSHi + cache
│   ├── box_renderer.php     box and toolbar generator
│   └── code_helper.php      normalization, post extraction, fingerprint
├── event/main_listener.php  BBCode, rendering, download links, editor
├── includes/geshi/          GeSHi 1.0.9.1 adapted for PHP 8
├── language/{it,en,de,es,sv,et,vi}/
├── migrations/v400_install.php
└── styles/all/
    ├── template/            events, download page, js/codeboxplus.js
    └── theme/codeboxplus.css
```

## 14. Changelog

# Changelog – Codebox Plus

4.0.4 (2026-10-14) – Salvo Cortesiano
Fixed: in the list of groups authorized to download, the special group AI_CRAWLERS (added in phpBB 3.3.15) displayed its technical name when the forum's language pack was not updated. The extension now includes its own fallback translation for special groups.

4.0.3 (2026-10-14) – Salvo Cortesiano
Dark styles: the Automatic theme now follows the forum style's colors (previously it only followed the device settings). With a dark style (e.g., Subway Dark), both the panels and the language selection window are dark; it also adapts to styles with a light/dark toggle.

Functional window buttons: red = minimize/restore panel, yellow = show all / show less, green = fullscreen. Symbols on hover, descriptions in tooltips. New ACP option to hide them.

Fixed: with certain styles (e.g., Subway), the language buttons in the selection window were getting squished.

## 4.0.2 (2026-10-14) – Salvo Cortesiano

- **New:** ACP option to choose **authorized download groups** (no groups = all users). Unauthorized users do not see the *Download* button and direct downloads are rejected; guests are prompted to log in.
- **New:** The **Show all code / Show less** button is now located in the top toolbar with a Font Awesome icon in a neutral color.
- **New:** Clickable **credits** at the bottom of each code box: original author (repository), phpBB 3.3 version (website), and GitHub repository. Can be disabled in ACP; repository URL configurable in ACP or via language files (`CBP_CREDITS_*`).
- Check-up: added check for authorized download groups.

## 4.0.1 (2026-10-13) – Salvo Cortesiano

- **Fixed:** Code blocks containing nested `[codebox]` / `[/codebox]` tags (e.g., source code of this extension, a custom BBCode, or a string like `'[/codebox]'`) were previously split into multiple boxes and plain text. Now, the outer box always closes at the correct tag and code remains intact, even when editing or quoting posts.

## 4.0.0 (2026-10-13) – Salvo Cortesiano

Complete rewrite for phpBB 3.3.x (tested on 3.3.19) and PHP 7.2 – 8.3.

### Fixes
- BBCode registered in phpBB 3.3's s9e formatter (the legacy version used the `/e` modifier, removed in PHP 7).
- Replaced invalid `config/routing.yml` (fatal YAML error).
- Controller no longer initializes sessions in the constructor and sends files via proper HTTP responses.
- Box content is no longer altered by BBCode, smilies, auto-links, and `<br>` tags.
- Fixed GeSHi PHP 8 warnings (`thinbasic` and `usd` languages) and removed direct `echo` output.
- CAPTCHA now correctly submits required hidden fields (Q&A, reCAPTCHA) and properly tracks attempts.
- SQL queries strictly cast integer values; no direct access to `$_GET`/`$_POST`.

### New Features
- Responsive box layout: header displaying language, file name, and line count; toolbar with Copy, Select, Word Wrap, Line Numbers, Fullscreen, Download.
- Fixed line numbers during horizontal scrolling, never copied; one-click line highlighting.
- Long code blocks collapsed with a "Show all code" bar; configurable height.
- 6 themes: Automatic, Light, Dark, Monokai, Dracula, Nord.
- Container queries: box adapts smoothly even in narrow containers (quotes, columns).
- `</>` button in the editor, quick reply, and private messages opening a modal for language selection, search, most used languages, file name, and preview.
- Updated GeSHi (2024 master): 259 languages, 35 new ones (Rust, Kotlin, Swift, Dart, Julia, Nginx, Sass, Twig, JSON, TypeScript…), common aliases (`js`, `py`, `sh`, `yml`…).
- Secure downloads protected by SHA-256 fingerprints (hidden code is non-downloadable), approval checks, optional "Can download files" permission, guest-only CAPTCHA, 30-minute validity window.
- Client-side browser downloading for previews and private messages.
- Highlighting cache and size limits.
- ACP with info cards, live preview, AJAX-confirmed maintenance tasks, and Check-up tab (17 checks).
- Download counter.
- Automatic migration from original extension settings and legacy BBCode cleanup.
- Full translations: Italian, English, German, Spanish, Swedish, Estonian, Vietnamese.
- EPV validation: 0 errors, 0 warnings, 0 notices.

## 3.0.0 (2014) – o0johntam0o
- Original version for phpBB 3.1/3.2: GeSHi highlighting, expand/collapse, code downloading.

---

**Codebox Plus** – developed by Huynh Buu Tam (o0johntam0o) · rewritten and enhanced for phpBB 3.3 by Salvo Cortesiano · GeSHi syntax highlighting engine by Nigel McNie & Benny Baumann.
