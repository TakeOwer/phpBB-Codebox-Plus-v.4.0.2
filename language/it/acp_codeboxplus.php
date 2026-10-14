<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * ACP language file [Italian]
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
	'ACP_CBP_EXPLAIN'					=> 'Riquadri di codice responsive con evidenziazione della sintassi per oltre 250 linguaggi, copia, selezione, a capo automatico, numeri di riga, schermo intero e scaricamento protetto del codice. Uso nei messaggi: <code>[codebox=php file=index.php]...[/codebox]</code>.',
	'CBP_BADGE_EXT'					=> 'Estensione',
	'CBP_BADGE_LANGUAGES'				=> 'Linguaggi',
	'CBP_BADGE_DOWNLOADS'				=> 'Scaricamenti',
	'CBP_BADGE_LICENSE'				=> 'Licenza',
	'CBP_LEGEND_DISPLAY'				=> 'Visualizzazione',
	'CBP_HIGHLIGHT'					=> 'Evidenziazione della sintassi',
	'CBP_HIGHLIGHT_EXPLAIN'			=> 'Colora il codice in base al linguaggio scelto (GeSHi). Se disattivata, il codice viene mostrato come testo semplice.',
	'CBP_THEME'						=> 'Tema dei colori',
	'CBP_THEME_EXPLAIN'				=> '“Automatico” usa il tema chiaro e passa a quello scuro quando il dispositivo dell’utente è in modalità scura.',
	'CBP_THEME_AUTO'					=> 'Automatico (chiaro/scuro)',
	'CBP_THEME_LIGHT'					=> 'Chiaro',
	'CBP_THEME_DARK'					=> 'Scuro',
	'CBP_THEME_MONOKAI'				=> 'Monokai',
	'CBP_THEME_DRACULA'				=> 'Dracula',
	'CBP_THEME_NORD'					=> 'Nord',
	'CBP_LINE_NUMBERS_OPT'				=> 'Numeri di riga',
	'CBP_LINE_NUMBERS_OPT_EXPLAIN'		=> 'Mostra i numeri di riga in modo predefinito (gli utenti possono comunque nasconderli). I numeri di riga non vengono mai copiati insieme al codice.',
	'CBP_WRAP_OPT'						=> 'A capo automatico',
	'CBP_WRAP_OPT_EXPLAIN'				=> 'Manda a capo le righe lunghe in modo predefinito invece di scorrere in orizzontale (gli utenti possono comunque cambiarlo).',
	'CBP_EXPANDED'						=> 'Sempre espanso',
	'CBP_EXPANDED_EXPLAIN'				=> 'Mostra tutto il codice. Se disattivato, il codice lungo è limitato all’altezza massima qui sotto e compare la barra “Mostra tutto il codice”.',
	'CBP_MAX_HEIGHT'					=> 'Altezza massima',
	'CBP_MAX_HEIGHT_EXPLAIN'			=> 'Altezza di un riquadro di codice compresso (120 - 3000).',
	'CBP_PIXEL'						=> 'pixel',
	'CBP_TAB_SIZE'						=> 'Larghezza della tabulazione',
	'CBP_TAB_SIZE_EXPLAIN'				=> 'Numero di spazi usati per mostrare un carattere di tabulazione (1 - 8).',
	'CBP_EDITOR_BUTTON'				=> 'Pulsante nell’editor',
	'CBP_EDITOR_BUTTON_EXPLAIN'		=> 'Aggiunge all’editor dei messaggi, alla risposta rapida e ai messaggi privati un pulsante che apre la scelta del linguaggio.',
	'CBP_FAVORITES'					=> 'Linguaggi più usati',
	'CBP_FAVORITES_EXPLAIN'			=> 'Identificativi dei linguaggi mostrati in cima alla scelta, separati da virgole (es. <code>php,javascript,python</code>).',
	'CBP_LEGEND_DOWNLOAD'				=> 'Scaricamento',
	'CBP_ENABLE_DOWNLOAD'				=> 'Attiva lo scaricamento',
	'CBP_ENABLE_DOWNLOAD_EXPLAIN'		=> 'Mostra il pulsante “Scarica” che salva il codice come file. Negli argomenti il file viene fornito dal forum dopo il controllo dei permessi; nelle anteprime e nei messaggi privati viene creato dal browser.',
	'CBP_LOGIN_REQUIRED'				=> 'Accesso obbligatorio',
	'CBP_LOGIN_REQUIRED_EXPLAIN'		=> 'Agli ospiti viene chiesto di accedere prima di scaricare.',
	'CBP_PREVENT_BOTS'					=> 'Blocca i bot',
	'CBP_PREVENT_BOTS_EXPLAIN'			=> 'I motori di ricerca e i bot non possono scaricare il codice e non vedono il pulsante.',
	'CBP_REQUIRE_FDOWNLOAD'			=> 'Richiedi il permesso “Può scaricare file”',
	'CBP_REQUIRE_FDOWNLOAD_EXPLAIN'	=> 'Oltre al permesso di leggere il forum, l’utente deve avere il permesso del forum per scaricare gli allegati.',
	'CBP_CAPTCHA'						=> 'Conferma anti-spambot',
	'CBP_CAPTCHA_EXPLAIN'				=> 'Chiede di risolvere il CAPTCHA configurato in “Contromisure anti-spambot” prima di scaricare. Una volta risolto vale per 30 minuti.',
	'CBP_CAPTCHA_GUESTS_ONLY'			=> 'Conferma solo per gli ospiti',
	'CBP_CAPTCHA_GUESTS_ONLY_EXPLAIN'	=> 'Gli utenti registrati scaricano senza conferma.',
	'CBP_MAX_ATTEMPTS'					=> 'Tentativi massimi',
	'CBP_MAX_ATTEMPTS_EXPLAIN'			=> 'Numero di conferme errate consentite in una sessione prima che lo scaricamento venga bloccato (1 - 50).',
	'CBP_LEGEND_PERFORMANCE'			=> 'Prestazioni',
	'CBP_MAX_HIGHLIGHT_KB'				=> 'Limite dell’evidenziazione',
	'CBP_MAX_HIGHLIGHT_KB_EXPLAIN'		=> 'Il codice più grande di questa dimensione viene mostrato senza colori per risparmiare risorse (8 - 4096).',
	'CBP_CACHE_TTL'					=> 'Cache dell’evidenziazione',
	'CBP_CACHE_TTL_EXPLAIN'			=> 'Per quanto tempo il codice evidenziato resta in cache. 0 disattiva la cache (0 - 2592000; 86400 = un giorno).',
	'CBP_SECONDS'						=> 'secondi',
	'CBP_PREVIEW'						=> 'Anteprima dal vivo',
	'CBP_PREVIEW_EXPLAIN'				=> 'Tema, numeri di riga, a capo, altezza e tabulazione si aggiornano mentre li modifichi. Salva per applicarli al forum.',
	'CBP_USAGE'						=> 'Come si usa',
	'CBP_USAGE_EXPLAIN'				=> 'Usa il pulsante “Codice” dell’editor oppure scrivi il BBCode a mano. Il linguaggio e il nome del file sono facoltativi.',
	'CBP_MAINTENANCE'					=> 'Manutenzione',
	'CBP_PURGE_CACHE'					=> 'Svuota la cache dell’evidenziazione',
	'CBP_PURGE_CACHE_EXPLAIN'			=> 'Il codice evidenziato viene rigenerato alla visualizzazione successiva.',
	'CBP_RESET_COUNTER'				=> 'Azzera il contatore degli scaricamenti',
	'CBP_RESET_COUNTER_EXPLAIN'		=> array(
		1 => 'Attualmente %d scaricamento.',
		2 => 'Attualmente %d scaricamenti.',
	),
	'CBP_RESET_SETTINGS'				=> 'Ripristina le impostazioni predefinite',
	'CBP_RESET_SETTINGS_EXPLAIN'		=> 'Tutte le opzioni di questa pagina tornano al valore predefinito.',
	'CBP_SETTINGS_SAVED'				=> 'Le impostazioni di Codebox Plus sono state salvate.',
	'CBP_ERR_RANGE'					=> '“%1$s” deve essere compreso tra %2$d e %3$d.',
	'CBP_ERR_FAVORITES'				=> 'Linguaggi sconosciuti nell’elenco dei più usati: %s',
	'CBP_ERR_NO_CAPTCHA'				=> 'Nessun plugin CAPTCHA configurato: impostane uno prima in “Contromisure anti-spambot”.',
	'CBP_CONFIRM_PURGE'				=> 'Vuoi davvero svuotare la cache dell’evidenziazione?',
	'CBP_CONFIRM_RESET_COUNTER'		=> 'Vuoi davvero azzerare il contatore degli scaricamenti?',
	'CBP_CONFIRM_RESET_SETTINGS'		=> 'Vuoi davvero ripristinare le impostazioni predefinite di Codebox Plus?',
	'CBP_CONFIRM_REMOVE_OLD_BBCODE'	=> 'Vuoi davvero rimuovere il vecchio BBCode [Codebox=] dalla tabella dei BBCode? I messaggi esistenti non vengono modificati.',
	'CBP_CACHE_PURGED'					=> 'La cache dell’evidenziazione è stata svuotata.',
	'CBP_COUNTER_RESET'				=> 'Il contatore degli scaricamenti è stato azzerato.',
	'CBP_SETTINGS_RESET'				=> 'Le impostazioni predefinite sono state ripristinate.',
	'CBP_OLD_BBCODE_REMOVED'			=> 'Il vecchio BBCode è stato rimosso.',
	'CBP_CHECKUP_ALL_OK'				=> 'Tutto funziona correttamente',
	'CBP_CHECKUP_HAS_ERRORS'			=> 'Ci sono problemi da risolvere',
	'CBP_CHECKUP_HAS_WARNINGS'			=> 'Funziona, con qualche avviso',
	'CBP_CHECKUP_OK'					=> array(
		1 => '%d superato',
		2 => '%d superati',
	),
	'CBP_CHECKUP_WARNINGS'				=> array(
		1 => '%d avviso',
		2 => '%d avvisi',
	),
	'CBP_CHECKUP_ERRORS'				=> array(
		1 => '%d errore',
		2 => '%d errori',
	),
	'CBP_CHECKUP_INFOS'				=> array(
		1 => '%d informazione',
		2 => '%d informazioni',
	),
	'CBP_CHECKUP_RUN_AT'				=> 'Eseguito il %s',
	'CBP_CHECKUP_RERUN'				=> 'Esegui di nuovo',
	'CBP_CHECKUP_STATUS'				=> 'Stato',
	'CBP_CHECKUP_TEST'					=> 'Test',
	'CBP_CHECKUP_RESULT'				=> 'Risultato',
	'CBP_STATUS_OK'					=> 'OK',
	'CBP_STATUS_WARNING'				=> 'Avviso',
	'CBP_STATUS_ERROR'					=> 'Errore',
	'CBP_STATUS_INFO'					=> 'Info',
	'CBP_CHK_PHP'						=> 'Versione di PHP',
	'CBP_CHK_PHP_DETAIL'				=> 'PHP %s (richiesto 7.2 o successivo).',
	'CBP_CHK_PHPBB'					=> 'Versione di phpBB',
	'CBP_CHK_PHPBB_DETAIL'				=> 'phpBB %s (richiesto 3.3.0 o successivo).',
	'CBP_CHK_PHP_EXT'					=> 'Moduli PHP',
	'CBP_CHK_PHP_EXT_OK'				=> 'dom, libxml e mbstring sono disponibili.',
	'CBP_CHK_PHP_EXT_MISSING'			=> 'Moduli PHP mancanti: %s',
	'CBP_CHK_GESHI'					=> 'Motore di evidenziazione GeSHi',
	'CBP_CHK_GESHI_OK'					=> 'GeSHi %1$s con tutti i %2$d file dei linguaggi.',
	'CBP_CHK_GESHI_MISSING'			=> 'File dei linguaggi mancanti: %s. Carica di nuovo l’estensione.',
	'CBP_CHK_HIGHLIGHT'				=> 'Test dell’evidenziazione',
	'CBP_CHK_HIGHLIGHT_OFF'			=> 'L’evidenziazione della sintassi è disattivata nelle impostazioni.',
	'CBP_CHK_HIGHLIGHT_OK'				=> 'Un codice PHP di prova di %d righe è stato evidenziato correttamente.',
	'CBP_CHK_HIGHLIGHT_FAIL'			=> 'Evidenziazione non riuscita: %s',
	'CBP_CHK_PARSER'					=> 'BBCode [codebox]',
	'CBP_CHK_PARSER_OK'				=> 'Il BBCode è registrato e riconosciuto dal formattatore del testo.',
	'CBP_CHK_PARSER_FAIL'				=> 'Il BBCode non viene riconosciuto: svuota la cache del forum (Generale → Svuota la cache) e riprova.',
	'CBP_CHK_RENDER'					=> 'Visualizzazione del riquadro',
	'CBP_CHK_RENDER_OK'				=> 'Il riquadro del codice con barra degli strumenti e numeri di riga viene generato correttamente.',
	'CBP_CHK_RENDER_FAIL'				=> 'Il riquadro del codice non viene generato: svuota la cache del forum e controlla che nessun’altra estensione usi lo stesso BBCode.',
	'CBP_CHK_ROUNDTRIP'				=> 'Collegamenti di scaricamento',
	'CBP_CHK_ROUNDTRIP_OK'				=> 'L’impronta del codice mostrato corrisponde al codice salvato: lo scaricamento funziona e il codice nascosto non può essere scaricato.',
	'CBP_CHK_ROUNDTRIP_FAIL'			=> 'L’impronta del codice mostrato non corrisponde al codice salvato: gli scaricamenti dagli argomenti non funzionerebbero.',
	'CBP_CHK_ROUTE'					=> 'Pagina di scaricamento',
	'CBP_CHK_ROUTE_OK'					=> 'L’indirizzo di scaricamento viene generato correttamente.',
	'CBP_CHK_ROUTE_OFF'				=> 'Lo scaricamento è disattivato nelle impostazioni.',
	'CBP_CHK_ROUTE_FAIL'				=> 'Impossibile generare l’indirizzo di scaricamento: %s',
	'CBP_CHK_OLD_BBCODE'				=> 'Vecchio BBCode [Codebox=]',
	'CBP_CHK_OLD_BBCODE_OK'			=> 'Nessun BBCode in conflitto nella tabella dei BBCode.',
	'CBP_CHK_OLD_BBCODE_FOUND'			=> 'La tabella dei BBCode contiene ancora il BBCode [Codebox=] dell’estensione originale. Viene ignorato, ma è meglio rimuoverlo.',
	'CBP_FIX_REMOVE_OLD_BBCODE'		=> 'Rimuovilo ora',
	'CBP_CHK_OLD_EXT'					=> 'Estensione originale',
	'CBP_CHK_OLD_EXT_OK'				=> 'L’estensione originale o0johntam0o/codeboxplus non è installata.',
	'CBP_CHK_OLD_EXT_ENABLED'			=> 'L’estensione originale o0johntam0o/codeboxplus è attiva: disattivala da “Gestione estensioni”.',
	'CBP_CHK_OLD_EXT_FILES'			=> 'La cartella ext/o0johntam0o/codeboxplus è ancora sul server: dopo averla disattivata e averne cancellato i dati puoi eliminarla.',
	'CBP_CHK_CACHE'					=> 'Cache',
	'CBP_CHK_CACHE_OK'					=> 'La cache funziona (%s).',
	'CBP_CHK_CACHE_FAIL'				=> 'Impossibile scrivere nella cache: controlla i permessi della cartella cache/.',
	'CBP_CACHE_ON'						=> 'cache dell’evidenziazione attiva, %d secondi',
	'CBP_CACHE_OFF'					=> 'cache dell’evidenziazione disattivata',
	'CBP_CHK_CAPTCHA'					=> 'Conferma anti-spambot',
	'CBP_CHK_CAPTCHA_OK'				=> 'Plugin CAPTCHA “%s” disponibile.',
	'CBP_CHK_CAPTCHA_FAIL'				=> 'Il plugin CAPTCHA “%s” non è disponibile: controlla “Contromisure anti-spambot”.',
	'CBP_CHK_CAPTCHA_OFF'				=> 'Non attiva per lo scaricamento.',
	'CBP_CHK_LANG'						=> 'File di lingua',
	'CBP_CHK_LANG_OK'					=> 'Traduzione completa per le lingue installate: %s.',
	'CBP_CHK_LANG_FALLBACK'			=> 'Lingue senza traduzione (viene usato l’inglese): %s.',
	'CBP_CHK_ASSETS'					=> 'File dello stile',
	'CBP_CHK_ASSETS_OK'				=> 'CSS, JavaScript e template sono presenti (styles/all: validi per prosilver, ForumUS e qualsiasi altro stile).',
	'CBP_CHK_ASSETS_MISSING'			=> 'File mancanti: %s',
	'CBP_CHK_POSTS'					=> 'Messaggi con codice',
	'CBP_CHK_POSTS_DETAIL'				=> array(
		0 => 'Nessun messaggio contiene ancora riquadri di codice.',
		1 => '%d messaggio contiene riquadri di codice.',
		2 => '%d messaggi contengono riquadri di codice.',
	),
	'CBP_CHK_LEGACY'					=> 'Messaggi nel vecchio formato',
	'CBP_CHK_LEGACY_OK'				=> 'Nessun messaggio salvato nel vecchio formato (phpBB 3.0/3.1).',
	'CBP_CHK_LEGACY_FOUND'				=> array(
		1 => '%d messaggio è ancora salvato nel vecchio formato: esegui <code>php bin/phpbbcli.php reparser:reparse post_text</code> per convertirlo.',
		2 => '%d messaggi sono ancora salvati nel vecchio formato: esegui <code>php bin/phpbbcli.php reparser:reparse post_text</code> per convertirli.',
	),
	'CBP_CREDITS'						=> 'Codebox Plus &middot; sviluppata da <a href="https://github.com/o0johntam0o" target="_blank" rel="noopener">Huynh Buu Tam (o0johntam0o)</a> &middot; riscritta e potenziata per phpBB 3.3 da <a href="https://www.netshadows.de/ombra/" target="_blank" rel="noopener">Salvo Cortesiano</a> &middot; motore di evidenziazione <a href="https://github.com/GeSHi/geshi-1.0" target="_blank" rel="noopener">GeSHi</a> di Nigel McNie &amp; Benny Baumann',
	'CBP_DOWNLOAD_GROUPS'				=> 'Gruppi autorizzati a scaricare',
	'CBP_DOWNLOAD_GROUPS_EXPLAIN'		=> 'Solo i membri dei gruppi selezionati possono scaricare il codice (Ctrl/Cmd + clic per selezionarne più di uno). Se non selezioni nessun gruppo, possono scaricare tutti. Agli ospiti non autorizzati viene chiesto di accedere.',
	'CBP_DOWNLOAD_GROUPS_ALL'			=> 'Nessun gruppo selezionato: possono scaricare tutti i gruppi.',
	'CBP_DOWNLOAD_GROUPS_SOME'			=> 'Possono scaricare solo i gruppi selezionati.',
	'CBP_DOWNLOAD_GROUPS_CLEAR'		=> 'Deseleziona tutti (tutti i gruppi)',
	'CBP_LEGEND_CREDITS'				=> 'Crediti',
	'CBP_SHOW_CREDITS'					=> 'Mostra i crediti',
	'CBP_SHOW_CREDITS_EXPLAIN'			=> 'Mostra in fondo a ogni riquadro di codice il copyright dell’autore originale e della versione per phpBB 3.3, con i link ai repository e al sito web. Nomi e indirizzi si trovano nei file di lingua (CBP_CREDITS_*).',
	'CBP_REPO_URL'						=> 'Indirizzo del repository GitHub',
	'CBP_REPO_URL_EXPLAIN'				=> 'Indirizzo del tuo repository mostrato nei crediti. Lascialo vuoto per usare quello dei file di lingua (CBP_CREDITS_REPO_URL).',
	'CBP_ERR_REPO_URL'					=> 'L’indirizzo del repository deve essere un indirizzo http:// o https:// valido (massimo 255 caratteri).',
	'CBP_CHK_GROUPS'					=> 'Gruppi autorizzati a scaricare',
	'CBP_CHK_GROUPS_ALL'				=> 'Possono scaricare tutti i gruppi.',
	'CBP_CHK_GROUPS_LIST'				=> 'Possono scaricare solo questi gruppi: %s.',
));
