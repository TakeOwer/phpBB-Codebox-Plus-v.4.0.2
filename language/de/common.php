<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * Front-end language file [German]
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
		1 => '%d Zeile',
		2 => '%d Zeilen',
	),
	'CBP_TOOLBAR'					=> 'Code-Werkzeuge',
	'CBP_COPY'						=> 'Kopieren',
	'CBP_COPIED'						=> 'Kopiert!',
	'CBP_COPY_FAILED'				=> 'Kopieren fehlgeschlagen',
	'CBP_SELECT_ALL'					=> 'Alles auswählen',
	'CBP_WRAP'						=> 'Zeilenumbruch',
	'CBP_LINE_NUMBERS'				=> 'Zeilennummern ein-/ausblenden',
	'CBP_FULLSCREEN'					=> 'Vollbild',
	'CBP_EXIT_FULLSCREEN'			=> 'Vollbild beenden (Esc)',
	'CBP_DOWNLOAD'					=> 'Herunterladen',
	'CBP_CODE_OF'					=> '%s-Code',
	'CBP_SHOW_ALL'					=> array(
		1 => 'Gesamten Code anzeigen (%d Zeile)',
		2 => 'Gesamten Code anzeigen (%d Zeilen)',
	),
	'CBP_SHOW_LESS'					=> 'Weniger anzeigen',
	'CBP_PICKER_TITLE'				=> 'Code-Box einfügen',
	'CBP_CLOSE'						=> 'Schließen',
	'CBP_PICKER_SEARCH'				=> 'Sprache suchen',
	'CBP_PICKER_SEARCH_PLACEHOLDER'	=> 'z. B. php, python, sql, js...',
	'CBP_PICKER_FAVORITES'			=> 'Beliebt',
	'CBP_PICKER_ALL'					=> 'Alle Sprachen',
	'CBP_PICKER_NO_RESULTS'			=> 'Keine Sprache gefunden',
	'CBP_PICKER_FILE'				=> 'Dateiname (optional, für den Download)',
	'CBP_PICKER_FILE_PLACEHOLDER'	=> 'z. B. index.php',
	'CBP_PICKER_INSERT'				=> 'Einfügen',
	'CBP_EDITOR_BUTTON_TITLE'		=> 'Code mit Syntaxhervorhebung einfügen (Codebox Plus)',
	'CBP_EDITOR_BUTTON_SHORT'		=> 'Code',
	'CBP_DOWNLOAD_TITLE'				=> 'Code herunterladen',
	'CBP_FROM_POST'					=> 'Aus dem Beitrag',
	'CBP_CONFIRM'					=> 'Bestätigung erforderlich',
	'CBP_CONFIRM_EXPLAIN'			=> 'Um das Forum vor automatischen Downloads zu schützen, löse bitte die folgende Prüfung.',
	'CBP_CONFIRM_SOLVED'				=> 'Prüfung abgeschlossen: Der Download startet automatisch. Falls nicht, benutze die Schaltfläche unten.',
	'CBP_DOWNLOAD_NOW'				=> 'Jetzt herunterladen',
	'CBP_BACK_TO_POST'				=> 'Zurück zum Beitrag',
	'CBP_ATTEMPTS_LEFT'				=> array(
		1 => 'Noch %d Versuch.',
		2 => 'Noch %d Versuche.',
	),
	'CBP_ERR_DOWNLOAD_DISABLED'		=> 'Der Code-Download wurde vom Administrator deaktiviert.',
	'CBP_ERR_BOTS'					=> 'Suchmaschinen und Bots dürfen keinen Code herunterladen.',
	'CBP_ERR_LOGIN_REQUIRED'			=> 'Du musst angemeldet sein, um den Code herunterzuladen.',
	'CBP_ERR_POST_NOT_FOUND'			=> 'Der angeforderte Beitrag existiert nicht oder ist nicht verfügbar.',
	'CBP_ERR_NO_PERMISSION'			=> 'Du hast nicht die nötigen Berechtigungen, um diesen Code herunterzuladen.',
	'CBP_ERR_CODE_NOT_FOUND'			=> 'Der angeforderte Code wurde im Beitrag nicht gefunden. Möglicherweise wurde er inzwischen bearbeitet: Lade das Thema neu und versuche es erneut.',
	'CBP_ERR_FILE_EMPTY'				=> 'Diese Code-Box ist leer.',
	'CBP_ERR_CONFIRM'				=> 'Du hast die maximale Anzahl an Bestätigungsversuchen für diese Sitzung überschritten. Bitte versuche es später erneut.',
	'CBP_ERR_GROUP'					=> 'Deine Benutzergruppe darf den Code nicht herunterladen.',
	'CBP_CREDITS_ORIGINAL'			=> 'Original-Codebox Plus &copy; 2014 %s',
	'CBP_CREDITS_AUTHOR'				=> 'Version für phpBB 3.3 &copy; 2026 %s',
	'CBP_CREDITS_REPO'				=> 'GitHub-Repository',

	// Credits at the bottom of the code boxes: names and addresses (you can change them)
	// Crediti in fondo ai riquadri: nomi e indirizzi (puoi modificarli)
	'CBP_CREDITS_ORIGINAL_NAME'		=> 'o0johntam0o (Huynh Buu Tam)',
	'CBP_CREDITS_ORIGINAL_URL'		=> 'https://github.com/o0johntam0o/phpBB-Extension-Codebox-Plus',
	'CBP_CREDITS_AUTHOR_NAME'		=> 'Salvo Cortesiano',
	'CBP_CREDITS_AUTHOR_URL'			=> 'https://www.netshadows.de/ombra/',
	'CBP_CREDITS_REPO_URL'			=> 'https://github.com/TakeOwer/phpBB-Codebox-Plus-v.4.0.2',
	'CBP_WIN_FOLD'					=> 'Box einklappen (nur Titelleiste anzeigen)',
	'CBP_WIN_UNFOLD'					=> 'Box wiederherstellen',
	'CBP_WIN_MORE'					=> 'Gesamten Code anzeigen / weniger anzeigen',
	'CBP_WIN_MORE_NA'				=> 'Der gesamte Code ist bereits sichtbar',
));
