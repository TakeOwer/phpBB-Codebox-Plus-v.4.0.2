<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * ACP language file [English]
 *
 * @copyright (c) 2014 o0johntam0o (Huynh Buu Tam) - original author
 * @copyright (c) 2026 Salvo Cortesiano - phpBB 3.3 rewrite
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 *
 */

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACP_CBP_EXPLAIN'					=> 'Responsive code boxes with syntax highlighting for more than 250 languages, copy, selection, line wrapping, line numbers, full screen and protected download of the code. Usage in posts: <code>[codebox=php file=index.php]...[/codebox]</code>.',
	'CBP_BADGE_EXT'					=> 'Extension',
	'CBP_BADGE_LANGUAGES'				=> 'Languages',
	'CBP_BADGE_DOWNLOADS'				=> 'Downloads',
	'CBP_BADGE_LICENSE'				=> 'License',
	'CBP_LEGEND_DISPLAY'				=> 'Display',
	'CBP_HIGHLIGHT'					=> 'Syntax highlighting',
	'CBP_HIGHLIGHT_EXPLAIN'			=> 'Colour the code according to the chosen language (GeSHi). When disabled the code is shown as plain text.',
	'CBP_THEME'						=> 'Colour theme',
	'CBP_THEME_EXPLAIN'				=> '“Automatic” follows the forum style: light boxes on light styles, dark boxes on dark styles (also when the style has a light/dark switch). Without JavaScript it follows the device setting.',
	'CBP_THEME_AUTO'					=> 'Automatic (follows the forum style)',
	'CBP_THEME_LIGHT'					=> 'Light',
	'CBP_THEME_DARK'					=> 'Dark',
	'CBP_THEME_MONOKAI'				=> 'Monokai',
	'CBP_THEME_DRACULA'				=> 'Dracula',
	'CBP_THEME_NORD'					=> 'Nord',
	'CBP_LINE_NUMBERS_OPT'				=> 'Line numbers',
	'CBP_LINE_NUMBERS_OPT_EXPLAIN'		=> 'Show the line numbers by default (users can still hide them). Line numbers are never copied together with the code.',
	'CBP_WRAP_OPT'						=> 'Wrap long lines',
	'CBP_WRAP_OPT_EXPLAIN'				=> 'Wrap long lines by default instead of scrolling horizontally (users can still change it).',
	'CBP_EXPANDED'						=> 'Always expanded',
	'CBP_EXPANDED_EXPLAIN'				=> 'Show the whole code. If disabled, long code is limited to the maximum height below and a “Show the whole code” bar is displayed.',
	'CBP_MAX_HEIGHT'					=> 'Maximum height',
	'CBP_MAX_HEIGHT_EXPLAIN'			=> 'Height of a collapsed code box (120 - 3000).',
	'CBP_PIXEL'						=> 'pixel',
	'CBP_TAB_SIZE'						=> 'Tab width',
	'CBP_TAB_SIZE_EXPLAIN'				=> 'Number of spaces used to display a tab character (1 - 8).',
	'CBP_EDITOR_BUTTON'				=> 'Editor button',
	'CBP_EDITOR_BUTTON_EXPLAIN'		=> 'Add to the posting editor, to the quick reply and to the private messages a button that opens the language picker.',
	'CBP_FAVORITES'					=> 'Popular languages',
	'CBP_FAVORITES_EXPLAIN'			=> 'Identifiers of the languages shown on top of the picker, separated by commas (e.g. <code>php,javascript,python</code>).',
	'CBP_LEGEND_DOWNLOAD'				=> 'Download',
	'CBP_ENABLE_DOWNLOAD'				=> 'Enable the download',
	'CBP_ENABLE_DOWNLOAD_EXPLAIN'		=> 'Show the “Download” button that saves the code as a file. In topics the file is served by the forum after checking permissions; in previews and private messages it is created by the browser.',
	'CBP_LOGIN_REQUIRED'				=> 'Login required',
	'CBP_LOGIN_REQUIRED_EXPLAIN'		=> 'Guests are asked to log in before downloading.',
	'CBP_PREVENT_BOTS'					=> 'Block bots',
	'CBP_PREVENT_BOTS_EXPLAIN'			=> 'Search engines and bots cannot download the code and do not see the button.',
	'CBP_REQUIRE_FDOWNLOAD'			=> 'Require the “Can download files” permission',
	'CBP_REQUIRE_FDOWNLOAD_EXPLAIN'	=> 'Besides the permission to read the forum, the user must have the forum permission to download attachments.',
	'CBP_CAPTCHA'						=> 'Anti-spambot confirmation',
	'CBP_CAPTCHA_EXPLAIN'				=> 'Ask to solve the CAPTCHA configured in “Spambot countermeasures” before downloading. Once solved, it is valid for 30 minutes.',
	'CBP_CAPTCHA_GUESTS_ONLY'			=> 'Confirmation for guests only',
	'CBP_CAPTCHA_GUESTS_ONLY_EXPLAIN'	=> 'Registered users download without confirmation.',
	'CBP_MAX_ATTEMPTS'					=> 'Maximum attempts',
	'CBP_MAX_ATTEMPTS_EXPLAIN'			=> 'Number of wrong confirmations allowed in a session before the download is blocked (1 - 50).',
	'CBP_LEGEND_PERFORMANCE'			=> 'Performance',
	'CBP_MAX_HIGHLIGHT_KB'				=> 'Highlighting limit',
	'CBP_MAX_HIGHLIGHT_KB_EXPLAIN'		=> 'Code bigger than this size is shown without colours to save resources (8 - 4096).',
	'CBP_CACHE_TTL'					=> 'Highlighting cache',
	'CBP_CACHE_TTL_EXPLAIN'			=> 'How long highlighted code is kept in the cache. 0 disables the cache (0 - 2592000; 86400 = one day).',
	'CBP_SECONDS'						=> 'seconds',
	'CBP_PREVIEW'						=> 'Live preview',
	'CBP_PREVIEW_EXPLAIN'				=> 'Theme, line numbers, wrapping, height and tab width are updated while you change them. Save to apply them to the forum.',
	'CBP_USAGE'						=> 'How to use it',
	'CBP_USAGE_EXPLAIN'				=> 'Use the “Code” button of the editor or write the BBCode by hand. The language and the file name are optional.',
	'CBP_MAINTENANCE'					=> 'Maintenance',
	'CBP_PURGE_CACHE'					=> 'Purge the highlighting cache',
	'CBP_PURGE_CACHE_EXPLAIN'			=> 'Highlighted code is generated again on the next view.',
	'CBP_RESET_COUNTER'				=> 'Reset the download counter',
	'CBP_RESET_COUNTER_EXPLAIN'		=> array(
		1 => 'Currently %d download.',
		2 => 'Currently %d downloads.',
	),
	'CBP_RESET_SETTINGS'				=> 'Restore the default settings',
	'CBP_RESET_SETTINGS_EXPLAIN'		=> 'Every option of this page goes back to its default value.',
	'CBP_SETTINGS_SAVED'				=> 'Codebox Plus settings have been saved.',
	'CBP_ERR_RANGE'					=> '“%1$s” must be between %2$d and %3$d.',
	'CBP_ERR_FAVORITES'				=> 'Unknown languages in the popular list: %s',
	'CBP_ERR_NO_CAPTCHA'				=> 'No CAPTCHA plugin is configured: set one in “Spambot countermeasures” first.',
	'CBP_CONFIRM_PURGE'				=> 'Do you really want to purge the highlighting cache?',
	'CBP_CONFIRM_RESET_COUNTER'		=> 'Do you really want to reset the download counter?',
	'CBP_CONFIRM_RESET_SETTINGS'		=> 'Do you really want to restore the default settings of Codebox Plus?',
	'CBP_CONFIRM_REMOVE_OLD_BBCODE'	=> 'Do you really want to remove the old [Codebox=] BBCode from the BBCodes table? Existing posts are not modified.',
	'CBP_CACHE_PURGED'					=> 'The highlighting cache has been purged.',
	'CBP_COUNTER_RESET'				=> 'The download counter has been reset.',
	'CBP_SETTINGS_RESET'				=> 'The default settings have been restored.',
	'CBP_OLD_BBCODE_REMOVED'			=> 'The old BBCode has been removed.',
	'CBP_CHECKUP_ALL_OK'				=> 'Everything works correctly',
	'CBP_CHECKUP_HAS_ERRORS'			=> 'Some problems need your attention',
	'CBP_CHECKUP_HAS_WARNINGS'			=> 'It works, with some warnings',
	'CBP_CHECKUP_OK'					=> array(
		1 => '%d passed',
		2 => '%d passed',
	),
	'CBP_CHECKUP_WARNINGS'				=> array(
		1 => '%d warning',
		2 => '%d warnings',
	),
	'CBP_CHECKUP_ERRORS'				=> array(
		1 => '%d error',
		2 => '%d errors',
	),
	'CBP_CHECKUP_INFOS'				=> array(
		1 => '%d information',
		2 => '%d information',
	),
	'CBP_CHECKUP_RUN_AT'				=> 'Run on %s',
	'CBP_CHECKUP_RERUN'				=> 'Run again',
	'CBP_CHECKUP_STATUS'				=> 'Status',
	'CBP_CHECKUP_TEST'					=> 'Test',
	'CBP_CHECKUP_RESULT'				=> 'Result',
	'CBP_STATUS_OK'					=> 'OK',
	'CBP_STATUS_WARNING'				=> 'Warning',
	'CBP_STATUS_ERROR'					=> 'Error',
	'CBP_STATUS_INFO'					=> 'Info',
	'CBP_CHK_PHP'						=> 'PHP version',
	'CBP_CHK_PHP_DETAIL'				=> 'PHP %s (7.2 or newer required).',
	'CBP_CHK_PHPBB'					=> 'phpBB version',
	'CBP_CHK_PHPBB_DETAIL'				=> 'phpBB %s (3.3.0 or newer required).',
	'CBP_CHK_PHP_EXT'					=> 'PHP modules',
	'CBP_CHK_PHP_EXT_OK'				=> 'dom, libxml and mbstring are available.',
	'CBP_CHK_PHP_EXT_MISSING'			=> 'Missing PHP modules: %s',
	'CBP_CHK_GESHI'					=> 'GeSHi highlighting engine',
	'CBP_CHK_GESHI_OK'					=> 'GeSHi %1$s with all the %2$d language files.',
	'CBP_CHK_GESHI_MISSING'			=> 'Missing language files: %s. Upload the extension again.',
	'CBP_CHK_HIGHLIGHT'				=> 'Highlighting test',
	'CBP_CHK_HIGHLIGHT_OFF'			=> 'Syntax highlighting is disabled in the settings.',
	'CBP_CHK_HIGHLIGHT_OK'				=> 'A sample PHP code of %d lines has been highlighted correctly.',
	'CBP_CHK_HIGHLIGHT_FAIL'			=> 'Highlighting failed: %s',
	'CBP_CHK_PARSER'					=> '[codebox] BBCode',
	'CBP_CHK_PARSER_OK'				=> 'The BBCode is registered and recognised by the text formatter.',
	'CBP_CHK_PARSER_FAIL'				=> 'The BBCode is not recognised: purge the cache of the board (General → Purge the cache) and try again.',
	'CBP_CHK_RENDER'					=> 'Display of the code box',
	'CBP_CHK_RENDER_OK'				=> 'The code box with toolbar and line numbers is generated correctly.',
	'CBP_CHK_RENDER_FAIL'				=> 'The code box is not generated: purge the cache of the board and check that no other extension uses the same BBCode.',
	'CBP_CHK_ROUNDTRIP'				=> 'Download links',
	'CBP_CHK_ROUNDTRIP_OK'				=> 'The fingerprint of the displayed code matches the stored code: downloads work and hidden code cannot be downloaded.',
	'CBP_CHK_ROUNDTRIP_FAIL'			=> 'The fingerprint of the displayed code does not match the stored code: downloads from topics would fail.',
	'CBP_CHK_ROUTE'					=> 'Download page',
	'CBP_CHK_ROUTE_OK'					=> 'The download address is generated correctly.',
	'CBP_CHK_ROUTE_OFF'				=> 'The download is disabled in the settings.',
	'CBP_CHK_ROUTE_FAIL'				=> 'The download address cannot be generated: %s',
	'CBP_CHK_OLD_BBCODE'				=> 'Old [Codebox=] BBCode',
	'CBP_CHK_OLD_BBCODE_OK'			=> 'No conflicting BBCode in the BBCodes table.',
	'CBP_CHK_OLD_BBCODE_FOUND'			=> 'The BBCodes table still contains the [Codebox=] BBCode of the original extension. It is ignored, but it is better to remove it.',
	'CBP_FIX_REMOVE_OLD_BBCODE'		=> 'Remove it now',
	'CBP_CHK_OLD_EXT'					=> 'Original extension',
	'CBP_CHK_OLD_EXT_OK'				=> 'The original extension o0johntam0o/codeboxplus is not installed.',
	'CBP_CHK_OLD_EXT_ENABLED'			=> 'The original extension o0johntam0o/codeboxplus is enabled: disable it from “Manage extensions”.',
	'CBP_CHK_OLD_EXT_FILES'			=> 'The folder ext/o0johntam0o/codeboxplus is still on the server: after disabling it and deleting its data you can remove it.',
	'CBP_CHK_CACHE'					=> 'Cache',
	'CBP_CHK_CACHE_OK'					=> 'The cache works (%s).',
	'CBP_CHK_CACHE_FAIL'				=> 'The cache cannot be written: check the permissions of the cache/ folder.',
	'CBP_CACHE_ON'						=> 'highlighting cache active, %d seconds',
	'CBP_CACHE_OFF'					=> 'highlighting cache disabled',
	'CBP_CHK_CAPTCHA'					=> 'Anti-spambot confirmation',
	'CBP_CHK_CAPTCHA_OK'				=> 'CAPTCHA plugin “%s” available.',
	'CBP_CHK_CAPTCHA_FAIL'				=> 'The CAPTCHA plugin “%s” is not available: check “Spambot countermeasures”.',
	'CBP_CHK_CAPTCHA_OFF'				=> 'Not enabled for the download.',
	'CBP_CHK_LANG'						=> 'Language files',
	'CBP_CHK_LANG_OK'					=> 'Complete translation for the installed languages: %s.',
	'CBP_CHK_LANG_FALLBACK'			=> 'Languages without translation (English is used): %s.',
	'CBP_CHK_ASSETS'					=> 'Style files',
	'CBP_CHK_ASSETS_OK'				=> 'CSS, JavaScript and templates are present (styles/all: valid for prosilver, ForumUS and every other style).',
	'CBP_CHK_ASSETS_MISSING'			=> 'Missing files: %s',
	'CBP_CHK_POSTS'					=> 'Posts with code',
	'CBP_CHK_POSTS_DETAIL'				=> array(
		0 => 'No post contains code boxes yet.',
		1 => '%d post contains code boxes.',
		2 => '%d posts contain code boxes.',
	),
	'CBP_CHK_LEGACY'					=> 'Posts in the old format',
	'CBP_CHK_LEGACY_OK'				=> 'No post stored in the old (phpBB 3.0/3.1) format.',
	'CBP_CHK_LEGACY_FOUND'				=> array(
		1 => '%d post is still stored in the old format: run <code>php bin/phpbbcli.php reparser:reparse post_text</code> to convert it.',
		2 => '%d posts are still stored in the old format: run <code>php bin/phpbbcli.php reparser:reparse post_text</code> to convert them.',
	),
	'CBP_CREDITS'						=> 'Codebox Plus &middot; developed by <a href="https://github.com/o0johntam0o" target="_blank" rel="noopener">Huynh Buu Tam (o0johntam0o)</a> &middot; rewritten and enhanced for phpBB 3.3 by <a href="https://www.netshadows.de/ombra/" target="_blank" rel="noopener">Salvo Cortesiano</a> &middot; highlighting engine <a href="https://github.com/GeSHi/geshi-1.0" target="_blank" rel="noopener">GeSHi</a> by Nigel McNie &amp; Benny Baumann',
	'CBP_DOWNLOAD_GROUPS'				=> 'Groups allowed to download',
	'CBP_DOWNLOAD_GROUPS_EXPLAIN'		=> 'Only members of the selected groups can download the code (Ctrl/Cmd + click to select more groups). With no group selected, everyone can download. Guests who are not allowed are asked to log in.',
	'CBP_DOWNLOAD_GROUPS_ALL'			=> 'No group selected: every group can download.',
	'CBP_DOWNLOAD_GROUPS_SOME'			=> 'Only the selected groups can download.',
	'CBP_DOWNLOAD_GROUPS_CLEAR'		=> 'Deselect all (every group)',
	'CBP_LEGEND_CREDITS'				=> 'Credits',
	'CBP_SHOW_CREDITS'					=> 'Show the credits',
	'CBP_SHOW_CREDITS_EXPLAIN'			=> 'Show at the bottom of every code box the copyright of the original author and of the phpBB 3.3 version, with links to their repositories and web site. The names and addresses are in the language files (CBP_CREDITS_*).',
	'CBP_REPO_URL'						=> 'GitHub repository address',
	'CBP_REPO_URL_EXPLAIN'				=> 'Address of your repository shown in the credits. Leave it empty to use the one in the language files (CBP_CREDITS_REPO_URL).',
	'CBP_ERR_REPO_URL'					=> 'The repository address must be a valid http:// or https:// address (max 255 characters).',
	'CBP_CHK_GROUPS'					=> 'Groups allowed to download',
	'CBP_CHK_GROUPS_ALL'				=> 'Every group can download.',
	'CBP_CHK_GROUPS_LIST'				=> 'Only these groups can download: %s.',
	'CBP_WINDOW_BUTTONS'				=> 'Window buttons',
	'CBP_WINDOW_BUTTONS_EXPLAIN'		=> 'The three coloured dots of the title bar work like the buttons of a window: red folds the box to the title bar only, yellow shows the whole code / less, green opens the full screen. Select “No” to hide them.',
	'CBP_GROUP_AI_CRAWLERS'			=> 'AI crawlers',
	'CBP_SHOW_DL_COUNT'				=> 'Show download counter',
	'CBP_SHOW_DL_COUNT_EXPLAIN'		=> 'Shows in the header of each box how many times its file has been downloaded. The count is kept per post and per code block.',
	'CBP_EDITOR_TOOLS'					=> 'Editor tools',
	'CBP_EDITOR_TOOLS_EXPLAIN'			=> 'Adds search (Ctrl+F), go to line, font size, line highlighting, added/removed/struck-through marks, links to lines, the cursor position and the occurrences of a word, like a code editor. The marks are saved in the browser of each user.',
	'CBP_CHK_COUNTER'					=> 'Download counter',
	'CBP_CHK_COUNTER_OK'				=> 'Table OK: %1$d code blocks downloaded, %2$d downloads in total.',
	'CBP_CHK_COUNTER_FAIL'				=> 'The download counter table is missing: disable and enable the extension again to run the migrations.',
));
