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
));
