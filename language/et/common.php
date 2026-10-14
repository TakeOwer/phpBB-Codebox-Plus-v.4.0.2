<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * Front-end language file [Estonian]
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
	'CBP_DEFAULT_FILENAME'			=> 'kood',
	'CBP_LINES'						=> array(
		1 => '%d rida',
		2 => '%d rida',
	),
	'CBP_TOOLBAR'					=> 'Koodi tööriistad',
	'CBP_COPY'						=> 'Kopeeri',
	'CBP_COPIED'						=> 'Kopeeritud!',
	'CBP_COPY_FAILED'				=> 'Kopeerimine ebaõnnestus',
	'CBP_SELECT_ALL'					=> 'Vali kõik',
	'CBP_WRAP'						=> 'Reamurdmine',
	'CBP_LINE_NUMBERS'				=> 'Näita/peida reanumbrid',
	'CBP_FULLSCREEN'					=> 'Täisekraan',
	'CBP_EXIT_FULLSCREEN'			=> 'Välju täisekraanist (Esc)',
	'CBP_DOWNLOAD'					=> 'Laadi alla',
	'CBP_CODE_OF'					=> '%s kood',
	'CBP_SHOW_ALL'					=> array(
		1 => 'Näita kogu koodi (%d rida)',
		2 => 'Näita kogu koodi (%d rida)',
	),
	'CBP_SHOW_LESS'					=> 'Näita vähem',
	'CBP_PICKER_TITLE'				=> 'Lisa koodikast',
	'CBP_CLOSE'						=> 'Sulge',
	'CBP_PICKER_SEARCH'				=> 'Otsi keelt',
	'CBP_PICKER_SEARCH_PLACEHOLDER'	=> 'nt php, python, sql, js...',
	'CBP_PICKER_FAVORITES'			=> 'Populaarsed',
	'CBP_PICKER_ALL'					=> 'Kõik keeled',
	'CBP_PICKER_NO_RESULTS'			=> 'Ühtegi keelt ei leitud',
	'CBP_PICKER_FILE'				=> 'Faili nimi (valikuline, kasutatakse allalaadimisel)',
	'CBP_PICKER_FILE_PLACEHOLDER'	=> 'nt index.php',
	'CBP_PICKER_INSERT'				=> 'Lisa',
	'CBP_EDITOR_BUTTON_TITLE'		=> 'Lisa süntaksiesiletusega kood (Codebox Plus)',
	'CBP_EDITOR_BUTTON_SHORT'		=> 'Kood',
	'CBP_DOWNLOAD_TITLE'				=> 'Koodi allalaadimine',
	'CBP_FROM_POST'					=> 'Postitusest',
	'CBP_CONFIRM'					=> 'Kinnitus on vajalik',
	'CBP_CONFIRM_EXPLAIN'			=> 'Foorumi kaitsmiseks automaatsete allalaadimiste eest täida palun allolev kontroll.',
	'CBP_CONFIRM_SOLVED'				=> 'Kontroll on tehtud: allalaadimine algab automaatselt. Kui see ei alga, kasuta allolevat nuppu.',
	'CBP_DOWNLOAD_NOW'				=> 'Laadi kohe alla',
	'CBP_BACK_TO_POST'				=> 'Tagasi postituse juurde',
	'CBP_ATTEMPTS_LEFT'				=> array(
		1 => 'Jäänud on %d katse.',
		2 => 'Jäänud on %d katset.',
	),
	'CBP_ERR_DOWNLOAD_DISABLED'		=> 'Administraator on koodi allalaadimise keelanud.',
	'CBP_ERR_BOTS'					=> 'Otsingumootorid ja botid ei saa koodi alla laadida.',
	'CBP_ERR_LOGIN_REQUIRED'			=> 'Koodi allalaadimiseks pead olema sisse logitud.',
	'CBP_ERR_POST_NOT_FOUND'			=> 'Soovitud postitust ei ole olemas või see pole kättesaadav.',
	'CBP_ERR_NO_PERMISSION'			=> 'Sul ei ole selle koodi allalaadimiseks vajalikke õigusi.',
	'CBP_ERR_CODE_NOT_FOUND'			=> 'Soovitud koodi postitusest ei leitud. Seda võidi vahepeal muuta: laadi teema uuesti ja proovi uuesti.',
	'CBP_ERR_FILE_EMPTY'				=> 'See koodikast on tühi.',
	'CBP_ERR_CONFIRM'				=> 'Sa ületasid selle sessiooni kinnituskatsete maksimaalse arvu. Palun proovi hiljem uuesti.',
	'CBP_ERR_GROUP'					=> 'Sinu kasutajagrupp ei tohi koodi alla laadida.',
	'CBP_CREDITS_ORIGINAL'			=> 'Algne Codebox Plus &copy; 2014 %s',
	'CBP_CREDITS_AUTHOR'				=> 'phpBB 3.3 versioon &copy; 2026 %s',
	'CBP_CREDITS_REPO'				=> 'GitHubi hoidla',

	// Credits at the bottom of the code boxes: names and addresses (you can change them)
	// Crediti in fondo ai riquadri: nomi e indirizzi (puoi modificarli)
	'CBP_CREDITS_ORIGINAL_NAME'		=> 'o0johntam0o (Huynh Buu Tam)',
	'CBP_CREDITS_ORIGINAL_URL'		=> 'https://github.com/o0johntam0o/phpBB-Extension-Codebox-Plus',
	'CBP_CREDITS_AUTHOR_NAME'		=> 'Salvo Cortesiano',
	'CBP_CREDITS_AUTHOR_URL'			=> 'https://www.netshadows.de/ombra/',
	'CBP_CREDITS_REPO_URL'			=> 'https://github.com/TakeOwer/phpBB-Codebox-Plus-v.4.0.2',
	'CBP_WIN_FOLD'					=> 'Ahenda kast (näita ainult tiitliriba)',
	'CBP_WIN_UNFOLD'					=> 'Taasta kast',
	'CBP_WIN_MORE'					=> 'Näita kogu koodi / näita vähem',
	'CBP_WIN_MORE_NA'				=> 'Kogu kood on juba nähtav',
	'CBP_TOOL_SEARCH'				=> 'Otsi',
	'CBP_TOOL_MENU'					=> 'Rohkem valikuid',
	'CBP_FIND_PLACEHOLDER'			=> 'Otsi',
	'CBP_FIND_CASE'					=> 'Tõstutundlik',
	'CBP_FIND_WORD'					=> 'Terve sõna',
	'CBP_FIND_REGEX'					=> 'Kasuta regulaaravaldist',
	'CBP_FIND_PREV'					=> 'Eelmine vaste (Shift+Enter)',
	'CBP_FIND_NEXT'					=> 'Järgmine vaste (Enter)',
	'CBP_FIND_CLOSE'					=> 'Sulge (Esc)',
	'CBP_FIND_COUNT'					=> '%1$d / %2$d',
	'CBP_FIND_NONE'					=> 'Tulemusi pole',
	'CBP_FIND_BAD_REGEX'				=> 'Vigane regulaaravaldis',
	'CBP_STATUS_POS'					=> 'Rida %1$d, veerg %2$d',
	'CBP_STATUS_SEL'					=> '(%d valitud)',
	'CBP_DL_COUNT_0'					=> 'Pole kunagi alla laaditud',
	'CBP_DL_COUNT_1'					=> 'Alla laaditud %d kord',
	'CBP_DL_COUNT_N'					=> 'Alla laaditud %d korda',
	'CBP_DL_PROGRESS'				=> 'Allalaadimine… %d%%',
	'CBP_DL_DONE'					=> 'Allalaadimine lõpetatud',
	'CBP_DL_ERROR'					=> 'Allalaadimine ebaõnnestus',
	'CBP_MENU_FONT'					=> 'Kirja suurus',
	'CBP_MENU_FONT_DOWN'				=> 'Väiksem',
	'CBP_MENU_FONT_UP'				=> 'Suurem',
	'CBP_MENU_FONT_RESET'			=> 'Lähtesta',
	'CBP_MENU_GOTO'					=> 'Mine reale',
	'CBP_MENU_GOTO_BTN'				=> 'Mine',
	'CBP_MENU_CLEAR_MARKS'			=> 'Eemalda kõik märgised',
	'CBP_MENU_SHORTCUTS'				=> 'Kiirklahvid',
	'CBP_SHORTCUTS_LIST'				=> 'Ctrl+F: otsi koodist
Enter / Shift+Enter, F3: järgmine / eelmine vaste
Ctrl+G: mine reale
Esc: sulge otsing või täisekraan
Klõps reanumbril: tõsta rida esile (Shift+klõps: vahemik)
Paremklõps real: rea menüü
Topeltklõps sõnal: näita esinemisi',
	'CBP_CTX_LINE'					=> 'Rida %d',
	'CBP_CTX_MARK'					=> 'Tõsta rida esile',
	'CBP_CTX_ADDED'					=> 'Märgi lisatuks',
	'CBP_CTX_REMOVED'				=> 'Märgi eemaldatuks',
	'CBP_CTX_STRIKE'					=> 'Kriipsuta rida läbi',
	'CBP_CTX_COPY_LINE'				=> 'Kopeeri rida',
	'CBP_CTX_COPY_LINK'				=> 'Kopeeri rea link',
	'CBP_CTX_FIND_SEL'				=> 'Otsi valitud teksti',
	'CBP_CTX_CLEAR'					=> 'Eemalda rea märgised',
	'CBP_LINK_COPIED'				=> 'Link kopeeritud!',
	'CBP_OCC_COUNT'					=> '„%2$s“ esineb %1$d korda',
));
