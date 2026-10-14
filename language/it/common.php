<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * Front-end language file [Italian]
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
	'CBP_DEFAULT_FILENAME'			=> 'codice',
	'CBP_LINES'						=> array(
		1 => '%d riga',
		2 => '%d righe',
	),
	'CBP_TOOLBAR'					=> 'Strumenti del codice',
	'CBP_COPY'						=> 'Copia',
	'CBP_COPIED'						=> 'Copiato!',
	'CBP_COPY_FAILED'				=> 'Copia non riuscita',
	'CBP_SELECT_ALL'					=> 'Seleziona tutto',
	'CBP_WRAP'						=> 'A capo automatico',
	'CBP_LINE_NUMBERS'				=> 'Mostra/nascondi numeri di riga',
	'CBP_FULLSCREEN'					=> 'Schermo intero',
	'CBP_EXIT_FULLSCREEN'			=> 'Esci da schermo intero (Esc)',
	'CBP_DOWNLOAD'					=> 'Scarica',
	'CBP_CODE_OF'					=> 'Codice %s',
	'CBP_SHOW_ALL'					=> array(
		1 => 'Mostra tutto il codice (%d riga)',
		2 => 'Mostra tutto il codice (%d righe)',
	),
	'CBP_SHOW_LESS'					=> 'Mostra meno',
	'CBP_PICKER_TITLE'				=> 'Inserisci un riquadro di codice',
	'CBP_CLOSE'						=> 'Chiudi',
	'CBP_PICKER_SEARCH'				=> 'Cerca un linguaggio',
	'CBP_PICKER_SEARCH_PLACEHOLDER'	=> 'es. php, python, sql, js...',
	'CBP_PICKER_FAVORITES'			=> 'I più usati',
	'CBP_PICKER_ALL'					=> 'Tutti i linguaggi',
	'CBP_PICKER_NO_RESULTS'			=> 'Nessun linguaggio trovato',
	'CBP_PICKER_FILE'				=> 'Nome del file (facoltativo, usato per lo scaricamento)',
	'CBP_PICKER_FILE_PLACEHOLDER'	=> 'es. index.php',
	'CBP_PICKER_INSERT'				=> 'Inserisci',
	'CBP_EDITOR_BUTTON_TITLE'		=> 'Inserisci codice con evidenziazione della sintassi (Codebox Plus)',
	'CBP_EDITOR_BUTTON_SHORT'		=> 'Codice',
	'CBP_DOWNLOAD_TITLE'				=> 'Scaricamento del codice',
	'CBP_FROM_POST'					=> 'Dal messaggio',
	'CBP_CONFIRM'					=> 'Conferma richiesta',
	'CBP_CONFIRM_EXPLAIN'			=> 'Per proteggere il forum dagli scaricamenti automatici, completa la verifica qui sotto.',
	'CBP_CONFIRM_SOLVED'				=> 'Verifica completata: lo scaricamento parte automaticamente. Se non dovesse partire, usa il pulsante qui sotto.',
	'CBP_DOWNLOAD_NOW'				=> 'Scarica ora',
	'CBP_BACK_TO_POST'				=> 'Torna al messaggio',
	'CBP_ATTEMPTS_LEFT'				=> array(
		1 => 'Ti resta %d tentativo.',
		2 => 'Ti restano %d tentativi.',
	),
	'CBP_ERR_DOWNLOAD_DISABLED'		=> 'Lo scaricamento del codice è stato disattivato dall’amministratore.',
	'CBP_ERR_BOTS'					=> 'I motori di ricerca e i bot non possono scaricare il codice.',
	'CBP_ERR_LOGIN_REQUIRED'			=> 'Devi effettuare l’accesso per scaricare il codice.',
	'CBP_ERR_POST_NOT_FOUND'			=> 'Il messaggio richiesto non esiste o non è disponibile.',
	'CBP_ERR_NO_PERMISSION'			=> 'Non hai i permessi necessari per scaricare questo codice.',
	'CBP_ERR_CODE_NOT_FOUND'			=> 'Il codice richiesto non è stato trovato nel messaggio. Potrebbe essere stato modificato nel frattempo: ricarica l’argomento e riprova.',
	'CBP_ERR_FILE_EMPTY'				=> 'Questo riquadro di codice è vuoto.',
	'CBP_ERR_CONFIRM'				=> 'Hai superato il numero massimo di tentativi di conferma per questa sessione. Riprova più tardi.',
	'CBP_ERR_GROUP'					=> 'Il tuo gruppo utenti non è autorizzato a scaricare il codice.',
	'CBP_CREDITS_ORIGINAL'			=> 'Codebox Plus originale &copy; 2014 %s',
	'CBP_CREDITS_AUTHOR'				=> 'Versione phpBB 3.3 &copy; 2026 %s',
	'CBP_CREDITS_REPO'				=> 'Repository su GitHub',

	// Credits at the bottom of the code boxes: names and addresses (you can change them)
	// Crediti in fondo ai riquadri: nomi e indirizzi (puoi modificarli)
	'CBP_CREDITS_ORIGINAL_NAME'		=> 'o0johntam0o (Huynh Buu Tam)',
	'CBP_CREDITS_ORIGINAL_URL'		=> 'https://github.com/o0johntam0o/phpBB-Extension-Codebox-Plus',
	'CBP_CREDITS_AUTHOR_NAME'		=> 'Salvo Cortesiano',
	'CBP_CREDITS_AUTHOR_URL'			=> 'https://www.netshadows.de/ombra/',
	'CBP_CREDITS_REPO_URL'			=> 'https://github.com/TakeOwer/phpBB-Codebox-Plus-v.4.0.2',
	'CBP_WIN_FOLD'					=> 'Riduci il riquadro (mostra solo la barra del titolo)',
	'CBP_WIN_UNFOLD'					=> 'Ripristina il riquadro',
	'CBP_WIN_MORE'					=> 'Mostra tutto il codice / mostra meno',
	'CBP_WIN_MORE_NA'				=> 'Il codice è già visibile per intero',
	'CBP_TOOL_SEARCH'				=> 'Cerca',
	'CBP_TOOL_MENU'					=> 'Altre opzioni',
	'CBP_FIND_PLACEHOLDER'			=> 'Cerca',
	'CBP_FIND_CASE'					=> 'Maiuscole/minuscole',
	'CBP_FIND_WORD'					=> 'Parola intera',
	'CBP_FIND_REGEX'					=> 'Usa espressione regolare',
	'CBP_FIND_PREV'					=> 'Risultato precedente (Maiusc+Invio)',
	'CBP_FIND_NEXT'					=> 'Risultato successivo (Invio)',
	'CBP_FIND_CLOSE'					=> 'Chiudi (Esc)',
	'CBP_FIND_COUNT'					=> '%1$d di %2$d',
	'CBP_FIND_NONE'					=> 'Nessun risultato',
	'CBP_FIND_BAD_REGEX'				=> 'Espressione regolare non valida',
	'CBP_STATUS_POS'					=> 'Riga %1$d, col %2$d',
	'CBP_STATUS_SEL'					=> '(%d selezionati)',
	'CBP_DL_COUNT_0'					=> 'Mai scaricato',
	'CBP_DL_COUNT_1'					=> 'Scaricato %d volta',
	'CBP_DL_COUNT_N'					=> 'Scaricato %d volte',
	'CBP_DL_PROGRESS'				=> 'Scaricamento… %d%%',
	'CBP_DL_DONE'					=> 'Download completato',
	'CBP_DL_ERROR'					=> 'Download non riuscito',
	'CBP_MENU_FONT'					=> 'Dimensione testo',
	'CBP_MENU_FONT_DOWN'				=> 'Più piccolo',
	'CBP_MENU_FONT_UP'				=> 'Più grande',
	'CBP_MENU_FONT_RESET'			=> 'Ripristina',
	'CBP_MENU_GOTO'					=> 'Vai alla riga',
	'CBP_MENU_GOTO_BTN'				=> 'Vai',
	'CBP_MENU_CLEAR_MARKS'			=> 'Rimuovi tutti i segni',
	'CBP_MENU_SHORTCUTS'				=> 'Scorciatoie da tastiera',
	'CBP_SHORTCUTS_LIST'				=> 'Ctrl+F: cerca nel codice
Invio / Maiusc+Invio, F3: risultato successivo / precedente
Ctrl+G: vai alla riga
Esc: chiudi la ricerca o lo schermo intero
Clic sul numero di riga: evidenziala (Maiusc+clic: intervallo)
Clic destro su una riga: menu della riga
Doppio clic su una parola: mostra le occorrenze',
	'CBP_CTX_LINE'					=> 'Riga %d',
	'CBP_CTX_MARK'					=> 'Evidenzia riga',
	'CBP_CTX_ADDED'					=> 'Segna come aggiunta',
	'CBP_CTX_REMOVED'				=> 'Segna come rimossa',
	'CBP_CTX_STRIKE'					=> 'Barra la riga',
	'CBP_CTX_COPY_LINE'				=> 'Copia la riga',
	'CBP_CTX_COPY_LINK'				=> 'Copia il link alla riga',
	'CBP_CTX_FIND_SEL'				=> 'Cerca il testo selezionato',
	'CBP_CTX_CLEAR'					=> 'Rimuovi i segni dalla riga',
	'CBP_LINK_COPIED'				=> 'Link copiato!',
	'CBP_OCC_COUNT'					=> '%1$d occorrenze di “%2$s”',
));
