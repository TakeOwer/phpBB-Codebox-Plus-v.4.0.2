<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * Front-end language file [English]
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
	'CBP_DEFAULT_FILENAME'			=> 'code',
	'CBP_LINES'						=> array(
		1 => '%d line',
		2 => '%d lines',
	),
	'CBP_TOOLBAR'					=> 'Code tools',
	'CBP_COPY'						=> 'Copy',
	'CBP_COPIED'						=> 'Copied!',
	'CBP_COPY_FAILED'				=> 'Copy failed',
	'CBP_SELECT_ALL'					=> 'Select all',
	'CBP_WRAP'						=> 'Wrap long lines',
	'CBP_LINE_NUMBERS'				=> 'Show/hide line numbers',
	'CBP_FULLSCREEN'					=> 'Full screen',
	'CBP_EXIT_FULLSCREEN'			=> 'Exit full screen (Esc)',
	'CBP_DOWNLOAD'					=> 'Download',
	'CBP_CODE_OF'					=> '%s code',
	'CBP_SHOW_ALL'					=> array(
		1 => 'Show the whole code (%d line)',
		2 => 'Show the whole code (%d lines)',
	),
	'CBP_SHOW_LESS'					=> 'Show less',
	'CBP_PICKER_TITLE'				=> 'Insert a code box',
	'CBP_CLOSE'						=> 'Close',
	'CBP_PICKER_SEARCH'				=> 'Search a language',
	'CBP_PICKER_SEARCH_PLACEHOLDER'	=> 'e.g. php, python, sql, js...',
	'CBP_PICKER_FAVORITES'			=> 'Popular',
	'CBP_PICKER_ALL'					=> 'All languages',
	'CBP_PICKER_NO_RESULTS'			=> 'No language found',
	'CBP_PICKER_FILE'				=> 'File name (optional, used for the download)',
	'CBP_PICKER_FILE_PLACEHOLDER'	=> 'e.g. index.php',
	'CBP_PICKER_INSERT'				=> 'Insert',
	'CBP_EDITOR_BUTTON_TITLE'		=> 'Insert code with syntax highlighting (Codebox Plus)',
	'CBP_EDITOR_BUTTON_SHORT'		=> 'Code',
	'CBP_DOWNLOAD_TITLE'				=> 'Code download',
	'CBP_FROM_POST'					=> 'From the post',
	'CBP_CONFIRM'					=> 'Confirmation required',
	'CBP_CONFIRM_EXPLAIN'			=> 'To protect the forum from automatic downloads, please complete the check below.',
	'CBP_CONFIRM_SOLVED'				=> 'Check completed: the download starts automatically. If it does not, use the button below.',
	'CBP_DOWNLOAD_NOW'				=> 'Download now',
	'CBP_BACK_TO_POST'				=> 'Back to the post',
	'CBP_ATTEMPTS_LEFT'				=> array(
		1 => '%d attempt left.',
		2 => '%d attempts left.',
	),
	'CBP_ERR_DOWNLOAD_DISABLED'		=> 'The code download has been disabled by the administrator.',
	'CBP_ERR_BOTS'					=> 'Search engines and bots are not allowed to download code.',
	'CBP_ERR_LOGIN_REQUIRED'			=> 'You must be logged in to download the code.',
	'CBP_ERR_POST_NOT_FOUND'			=> 'The requested post does not exist or is not available.',
	'CBP_ERR_NO_PERMISSION'			=> 'You do not have the permissions required to download this code.',
	'CBP_ERR_CODE_NOT_FOUND'			=> 'The requested code was not found in the post. It may have been edited in the meantime: reload the topic and try again.',
	'CBP_ERR_FILE_EMPTY'				=> 'This code box is empty.',
	'CBP_ERR_CONFIRM'				=> 'You have exceeded the maximum number of confirmation attempts for this session. Please try again later.',
	'CBP_ERR_GROUP'					=> 'Your user group is not allowed to download the code.',
	'CBP_CREDITS_ORIGINAL'			=> 'Original Codebox Plus &copy; 2014 %s',
	'CBP_CREDITS_AUTHOR'				=> 'phpBB 3.3 version &copy; 2026 %s',
	'CBP_CREDITS_REPO'				=> 'GitHub repository',

	// Credits at the bottom of the code boxes: names and addresses (you can change them)
	// Crediti in fondo ai riquadri: nomi e indirizzi (puoi modificarli)
	'CBP_CREDITS_ORIGINAL_NAME'		=> 'o0johntam0o (Huynh Buu Tam)',
	'CBP_CREDITS_ORIGINAL_URL'		=> 'https://github.com/o0johntam0o/phpBB-Extension-Codebox-Plus',
	'CBP_CREDITS_AUTHOR_NAME'		=> 'Salvo Cortesiano',
	'CBP_CREDITS_AUTHOR_URL'			=> 'https://www.netshadows.de/ombra/',
	'CBP_CREDITS_REPO_URL'			=> 'https://github.com/TakeOwer/phpBB-Codebox-Plus-v.4.0.2',
	'CBP_WIN_FOLD'					=> 'Fold the box (show only the title bar)',
	'CBP_WIN_UNFOLD'					=> 'Restore the box',
	'CBP_WIN_MORE'					=> 'Show the whole code / show less',
	'CBP_WIN_MORE_NA'				=> 'The whole code is already visible',
	'CBP_TOOL_SEARCH'				=> 'Find',
	'CBP_TOOL_MENU'					=> 'More options',
	'CBP_FIND_PLACEHOLDER'			=> 'Find',
	'CBP_FIND_CASE'					=> 'Match case',
	'CBP_FIND_WORD'					=> 'Match whole word',
	'CBP_FIND_REGEX'					=> 'Use regular expression',
	'CBP_FIND_PREV'					=> 'Previous match (Shift+Enter)',
	'CBP_FIND_NEXT'					=> 'Next match (Enter)',
	'CBP_FIND_CLOSE'					=> 'Close (Esc)',
	'CBP_FIND_COUNT'					=> '%1$d of %2$d',
	'CBP_FIND_NONE'					=> 'No results',
	'CBP_FIND_BAD_REGEX'				=> 'Invalid regular expression',
	'CBP_STATUS_POS'					=> 'Ln %1$d, Col %2$d',
	'CBP_STATUS_SEL'					=> '(%d selected)',
	'CBP_DL_COUNT_0'					=> 'Never downloaded',
	'CBP_DL_COUNT_1'					=> 'Downloaded %d time',
	'CBP_DL_COUNT_N'					=> 'Downloaded %d times',
	'CBP_DL_PROGRESS'				=> 'Downloading… %d%%',
	'CBP_DL_DONE'					=> 'Download completed',
	'CBP_DL_ERROR'					=> 'Download failed',
	'CBP_MENU_FONT'					=> 'Font size',
	'CBP_MENU_FONT_DOWN'				=> 'Smaller',
	'CBP_MENU_FONT_UP'				=> 'Bigger',
	'CBP_MENU_FONT_RESET'			=> 'Reset',
	'CBP_MENU_GOTO'					=> 'Go to line',
	'CBP_MENU_GOTO_BTN'				=> 'Go',
	'CBP_MENU_CLEAR_MARKS'			=> 'Remove all marks',
	'CBP_MENU_SHORTCUTS'				=> 'Keyboard shortcuts',
	'CBP_SHORTCUTS_LIST'				=> 'Ctrl+F: find in the code
Enter / Shift+Enter, F3: next / previous match
Ctrl+G: go to line
Esc: close the search or full screen
Click on a line number: highlight it (Shift+click: range)
Right click on a line: line menu
Double click on a word: show its occurrences',
	'CBP_CTX_LINE'					=> 'Line %d',
	'CBP_CTX_MARK'					=> 'Highlight line',
	'CBP_CTX_ADDED'					=> 'Mark as added',
	'CBP_CTX_REMOVED'				=> 'Mark as removed',
	'CBP_CTX_STRIKE'					=> 'Strike through line',
	'CBP_CTX_COPY_LINE'				=> 'Copy line',
	'CBP_CTX_COPY_LINK'				=> 'Copy link to line',
	'CBP_CTX_FIND_SEL'				=> 'Find selected text',
	'CBP_CTX_CLEAR'					=> 'Remove marks from line',
	'CBP_LINK_COPIED'				=> 'Link copied!',
	'CBP_OCC_COUNT'					=> '%1$d occurrences of “%2$s”',
));
