<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * Front-end language file [Swedish]
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
	'CBP_DEFAULT_FILENAME'			=> 'kod',
	'CBP_LINES'						=> array(
		1 => '%d rad',
		2 => '%d rader',
	),
	'CBP_TOOLBAR'					=> 'Kodverktyg',
	'CBP_COPY'						=> 'Kopiera',
	'CBP_COPIED'						=> 'Kopierat!',
	'CBP_COPY_FAILED'				=> 'Kopieringen misslyckades',
	'CBP_SELECT_ALL'					=> 'Markera allt',
	'CBP_WRAP'						=> 'Radbrytning',
	'CBP_LINE_NUMBERS'				=> 'Visa/dölj radnummer',
	'CBP_FULLSCREEN'					=> 'Helskärm',
	'CBP_EXIT_FULLSCREEN'			=> 'Avsluta helskärm (Esc)',
	'CBP_DOWNLOAD'					=> 'Ladda ner',
	'CBP_CODE_OF'					=> '%s-kod',
	'CBP_SHOW_ALL'					=> array(
		1 => 'Visa hela koden (%d rad)',
		2 => 'Visa hela koden (%d rader)',
	),
	'CBP_SHOW_LESS'					=> 'Visa mindre',
	'CBP_PICKER_TITLE'				=> 'Infoga en kodruta',
	'CBP_CLOSE'						=> 'Stäng',
	'CBP_PICKER_SEARCH'				=> 'Sök ett språk',
	'CBP_PICKER_SEARCH_PLACEHOLDER'	=> 't.ex. php, python, sql, js...',
	'CBP_PICKER_FAVORITES'			=> 'Populära',
	'CBP_PICKER_ALL'					=> 'Alla språk',
	'CBP_PICKER_NO_RESULTS'			=> 'Inget språk hittades',
	'CBP_PICKER_FILE'				=> 'Filnamn (valfritt, används vid nerladdning)',
	'CBP_PICKER_FILE_PLACEHOLDER'	=> 't.ex. index.php',
	'CBP_PICKER_INSERT'				=> 'Infoga',
	'CBP_EDITOR_BUTTON_TITLE'		=> 'Infoga kod med syntaxmarkering (Codebox Plus)',
	'CBP_EDITOR_BUTTON_SHORT'		=> 'Kod',
	'CBP_DOWNLOAD_TITLE'				=> 'Nerladdning av kod',
	'CBP_FROM_POST'					=> 'Från inlägget',
	'CBP_CONFIRM'					=> 'Bekräftelse krävs',
	'CBP_CONFIRM_EXPLAIN'			=> 'För att skydda forumet mot automatiska nerladdningar, slutför kontrollen nedan.',
	'CBP_CONFIRM_SOLVED'				=> 'Kontrollen är klar: nerladdningen startar automatiskt. Om den inte gör det, använd knappen nedan.',
	'CBP_DOWNLOAD_NOW'				=> 'Ladda ner nu',
	'CBP_BACK_TO_POST'				=> 'Tillbaka till inlägget',
	'CBP_ATTEMPTS_LEFT'				=> array(
		1 => '%d försök kvar.',
		2 => '%d försök kvar.',
	),
	'CBP_ERR_DOWNLOAD_DISABLED'		=> 'Nerladdning av kod har inaktiverats av administratören.',
	'CBP_ERR_BOTS'					=> 'Sökmotorer och botar får inte ladda ner kod.',
	'CBP_ERR_LOGIN_REQUIRED'			=> 'Du måste vara inloggad för att ladda ner koden.',
	'CBP_ERR_POST_NOT_FOUND'			=> 'Det begärda inlägget finns inte eller är inte tillgängligt.',
	'CBP_ERR_NO_PERMISSION'			=> 'Du har inte behörighet att ladda ner den här koden.',
	'CBP_ERR_CODE_NOT_FOUND'			=> 'Den begärda koden hittades inte i inlägget. Den kan ha redigerats under tiden: ladda om ämnet och försök igen.',
	'CBP_ERR_FILE_EMPTY'				=> 'Den här kodrutan är tom.',
	'CBP_ERR_CONFIRM'				=> 'Du har överskridit det maximala antalet bekräftelseförsök för denna session. Försök igen senare.',
	'CBP_ERR_GROUP'					=> 'Din användargrupp får inte ladda ner koden.',
	'CBP_CREDITS_ORIGINAL'			=> 'Ursprungliga Codebox Plus &copy; 2014 %s',
	'CBP_CREDITS_AUTHOR'				=> 'Version för phpBB 3.3 &copy; 2026 %s',
	'CBP_CREDITS_REPO'				=> 'GitHub-arkiv',

	// Credits at the bottom of the code boxes: names and addresses (you can change them)
	// Crediti in fondo ai riquadri: nomi e indirizzi (puoi modificarli)
	'CBP_CREDITS_ORIGINAL_NAME'		=> 'o0johntam0o (Huynh Buu Tam)',
	'CBP_CREDITS_ORIGINAL_URL'		=> 'https://github.com/o0johntam0o/phpBB-Extension-Codebox-Plus',
	'CBP_CREDITS_AUTHOR_NAME'		=> 'Salvo Cortesiano',
	'CBP_CREDITS_AUTHOR_URL'			=> 'https://www.netshadows.de/ombra/',
	'CBP_CREDITS_REPO_URL'			=> 'https://github.com/TakeOwer/phpBB-Codebox-Plus-v.4.0.2',
	'CBP_WIN_FOLD'					=> 'Fäll ihop rutan (visa bara namnlisten)',
	'CBP_WIN_UNFOLD'					=> 'Återställ rutan',
	'CBP_WIN_MORE'					=> 'Visa hela koden / visa mindre',
	'CBP_WIN_MORE_NA'				=> 'Hela koden visas redan',
	'CBP_TOOL_SEARCH'				=> 'Sök',
	'CBP_TOOL_MENU'					=> 'Fler alternativ',
	'CBP_FIND_PLACEHOLDER'			=> 'Sök',
	'CBP_FIND_CASE'					=> 'Matcha versaler',
	'CBP_FIND_WORD'					=> 'Hela ord',
	'CBP_FIND_REGEX'					=> 'Använd reguljärt uttryck',
	'CBP_FIND_PREV'					=> 'Föregående träff (Skift+Enter)',
	'CBP_FIND_NEXT'					=> 'Nästa träff (Enter)',
	'CBP_FIND_CLOSE'					=> 'Stäng (Esc)',
	'CBP_FIND_COUNT'					=> '%1$d av %2$d',
	'CBP_FIND_NONE'					=> 'Inga resultat',
	'CBP_FIND_BAD_REGEX'				=> 'Ogiltigt reguljärt uttryck',
	'CBP_STATUS_POS'					=> 'Rad %1$d, kol %2$d',
	'CBP_STATUS_SEL'					=> '(%d markerade)',
	'CBP_DL_COUNT_0'					=> 'Aldrig nedladdad',
	'CBP_DL_COUNT_1'					=> 'Nedladdad %d gång',
	'CBP_DL_COUNT_N'					=> 'Nedladdad %d gånger',
	'CBP_DL_PROGRESS'				=> 'Laddar ner… %d%%',
	'CBP_DL_DONE'					=> 'Nedladdningen är klar',
	'CBP_DL_ERROR'					=> 'Nedladdningen misslyckades',
	'CBP_MENU_FONT'					=> 'Teckenstorlek',
	'CBP_MENU_FONT_DOWN'				=> 'Mindre',
	'CBP_MENU_FONT_UP'				=> 'Större',
	'CBP_MENU_FONT_RESET'			=> 'Återställ',
	'CBP_MENU_GOTO'					=> 'Gå till rad',
	'CBP_MENU_GOTO_BTN'				=> 'Gå',
	'CBP_MENU_CLEAR_MARKS'			=> 'Ta bort alla markeringar',
	'CBP_MENU_SHORTCUTS'				=> 'Kortkommandon',
	'CBP_SHORTCUTS_LIST'				=> 'Ctrl+F: sök i koden
Enter / Skift+Enter, F3: nästa / föregående träff
Ctrl+G: gå till rad
Esc: stäng sökningen eller helskärm
Klick på ett radnummer: markera raden (Skift+klick: intervall)
Högerklick på en rad: radmeny
Dubbelklick på ett ord: visa förekomster',
	'CBP_CTX_LINE'					=> 'Rad %d',
	'CBP_CTX_MARK'					=> 'Markera rad',
	'CBP_CTX_ADDED'					=> 'Markera som tillagd',
	'CBP_CTX_REMOVED'				=> 'Markera som borttagen',
	'CBP_CTX_STRIKE'					=> 'Stryk över raden',
	'CBP_CTX_COPY_LINE'				=> 'Kopiera raden',
	'CBP_CTX_COPY_LINK'				=> 'Kopiera länk till raden',
	'CBP_CTX_FIND_SEL'				=> 'Sök markerad text',
	'CBP_CTX_CLEAR'					=> 'Ta bort radens markeringar',
	'CBP_LINK_COPIED'				=> 'Länken kopierad!',
	'CBP_OCC_COUNT'					=> '%1$d förekomster av ”%2$s”',
));
