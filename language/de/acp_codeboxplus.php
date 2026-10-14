<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * ACP language file [German]
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
	'ACP_CBP_EXPLAIN'					=> 'Responsive Code-Boxen mit Syntaxhervorhebung für über 250 Sprachen, Kopieren, Auswählen, Zeilenumbruch, Zeilennummern, Vollbild und geschütztem Code-Download. Verwendung in Beiträgen: <code>[codebox=php file=index.php]...[/codebox]</code>.',
	'CBP_BADGE_EXT'					=> 'Erweiterung',
	'CBP_BADGE_LANGUAGES'				=> 'Sprachen',
	'CBP_BADGE_DOWNLOADS'				=> 'Downloads',
	'CBP_BADGE_LICENSE'				=> 'Lizenz',
	'CBP_LEGEND_DISPLAY'				=> 'Anzeige',
	'CBP_HIGHLIGHT'					=> 'Syntaxhervorhebung',
	'CBP_HIGHLIGHT_EXPLAIN'			=> 'Färbt den Code entsprechend der gewählten Sprache (GeSHi). Deaktiviert wird der Code als reiner Text angezeigt.',
	'CBP_THEME'						=> 'Farbschema',
	'CBP_THEME_EXPLAIN'				=> '„Automatisch“ folgt dem Forum-Style: helle Boxen bei hellen Styles, dunkle Boxen bei dunklen Styles (auch bei Styles mit Hell/Dunkel-Umschalter). Ohne JavaScript folgt es der Geräteeinstellung.',
	'CBP_THEME_AUTO'					=> 'Automatisch (folgt dem Forum-Style)',
	'CBP_THEME_LIGHT'					=> 'Hell',
	'CBP_THEME_DARK'					=> 'Dunkel',
	'CBP_THEME_MONOKAI'				=> 'Monokai',
	'CBP_THEME_DRACULA'				=> 'Dracula',
	'CBP_THEME_NORD'					=> 'Nord',
	'CBP_LINE_NUMBERS_OPT'				=> 'Zeilennummern',
	'CBP_LINE_NUMBERS_OPT_EXPLAIN'		=> 'Zeilennummern standardmäßig anzeigen (Benutzer können sie ausblenden). Zeilennummern werden nie mitkopiert.',
	'CBP_WRAP_OPT'						=> 'Zeilenumbruch',
	'CBP_WRAP_OPT_EXPLAIN'				=> 'Lange Zeilen standardmäßig umbrechen statt horizontal zu scrollen (Benutzer können es ändern).',
	'CBP_EXPANDED'						=> 'Immer ausgeklappt',
	'CBP_EXPANDED_EXPLAIN'				=> 'Den gesamten Code anzeigen. Wenn deaktiviert, wird langer Code auf die maximale Höhe begrenzt und eine Leiste „Gesamten Code anzeigen“ eingeblendet.',
	'CBP_MAX_HEIGHT'					=> 'Maximale Höhe',
	'CBP_MAX_HEIGHT_EXPLAIN'			=> 'Höhe einer eingeklappten Code-Box (120 - 3000).',
	'CBP_PIXEL'						=> 'Pixel',
	'CBP_TAB_SIZE'						=> 'Tabulatorbreite',
	'CBP_TAB_SIZE_EXPLAIN'				=> 'Anzahl der Leerzeichen für ein Tabulatorzeichen (1 - 8).',
	'CBP_EDITOR_BUTTON'				=> 'Editor-Schaltfläche',
	'CBP_EDITOR_BUTTON_EXPLAIN'		=> 'Fügt dem Beitragseditor, der Schnellantwort und den privaten Nachrichten eine Schaltfläche hinzu, die die Sprachauswahl öffnet.',
	'CBP_FAVORITES'					=> 'Beliebte Sprachen',
	'CBP_FAVORITES_EXPLAIN'			=> 'Kennungen der oben in der Auswahl gezeigten Sprachen, durch Kommas getrennt (z. B. <code>php,javascript,python</code>).',
	'CBP_LEGEND_DOWNLOAD'				=> 'Download',
	'CBP_ENABLE_DOWNLOAD'				=> 'Download aktivieren',
	'CBP_ENABLE_DOWNLOAD_EXPLAIN'		=> 'Zeigt die Schaltfläche „Herunterladen“, die den Code als Datei speichert. In Themen liefert das Forum die Datei nach Prüfung der Berechtigungen; in Vorschauen und privaten Nachrichten erzeugt sie der Browser.',
	'CBP_LOGIN_REQUIRED'				=> 'Anmeldung erforderlich',
	'CBP_LOGIN_REQUIRED_EXPLAIN'		=> 'Gäste werden vor dem Download zur Anmeldung aufgefordert.',
	'CBP_PREVENT_BOTS'					=> 'Bots blockieren',
	'CBP_PREVENT_BOTS_EXPLAIN'			=> 'Suchmaschinen und Bots können den Code nicht herunterladen und sehen die Schaltfläche nicht.',
	'CBP_REQUIRE_FDOWNLOAD'			=> 'Berechtigung „Kann Dateien herunterladen“ verlangen',
	'CBP_REQUIRE_FDOWNLOAD_EXPLAIN'	=> 'Neben der Leseberechtigung des Forums muss der Benutzer die Forenberechtigung zum Herunterladen von Dateianhängen haben.',
	'CBP_CAPTCHA'						=> 'Anti-Spambot-Bestätigung',
	'CBP_CAPTCHA_EXPLAIN'				=> 'Vor dem Download das unter „Spambot-Abwehr“ eingestellte CAPTCHA verlangen. Einmal gelöst, gilt es 30 Minuten.',
	'CBP_CAPTCHA_GUESTS_ONLY'			=> 'Bestätigung nur für Gäste',
	'CBP_CAPTCHA_GUESTS_ONLY_EXPLAIN'	=> 'Registrierte Benutzer laden ohne Bestätigung herunter.',
	'CBP_MAX_ATTEMPTS'					=> 'Maximale Versuche',
	'CBP_MAX_ATTEMPTS_EXPLAIN'			=> 'Anzahl der falschen Bestätigungen pro Sitzung, bevor der Download gesperrt wird (1 - 50).',
	'CBP_LEGEND_PERFORMANCE'			=> 'Leistung',
	'CBP_MAX_HIGHLIGHT_KB'				=> 'Hervorhebungsgrenze',
	'CBP_MAX_HIGHLIGHT_KB_EXPLAIN'		=> 'Größerer Code wird ohne Farben angezeigt, um Ressourcen zu sparen (8 - 4096).',
	'CBP_CACHE_TTL'					=> 'Hervorhebungs-Cache',
	'CBP_CACHE_TTL_EXPLAIN'			=> 'Wie lange hervorgehobener Code im Cache bleibt. 0 deaktiviert den Cache (0 - 2592000; 86400 = ein Tag).',
	'CBP_SECONDS'						=> 'Sekunden',
	'CBP_PREVIEW'						=> 'Live-Vorschau',
	'CBP_PREVIEW_EXPLAIN'				=> 'Schema, Zeilennummern, Umbruch, Höhe und Tabulatorbreite werden beim Ändern aktualisiert. Speichere, um sie im Forum anzuwenden.',
	'CBP_USAGE'						=> 'Verwendung',
	'CBP_USAGE_EXPLAIN'				=> 'Benutze die Schaltfläche „Code“ im Editor oder schreibe den BBCode von Hand. Sprache und Dateiname sind optional.',
	'CBP_MAINTENANCE'					=> 'Wartung',
	'CBP_PURGE_CACHE'					=> 'Hervorhebungs-Cache leeren',
	'CBP_PURGE_CACHE_EXPLAIN'			=> 'Hervorgehobener Code wird beim nächsten Aufruf neu erzeugt.',
	'CBP_RESET_COUNTER'				=> 'Download-Zähler zurücksetzen',
	'CBP_RESET_COUNTER_EXPLAIN'		=> array(
		1 => 'Derzeit %d Download.',
		2 => 'Derzeit %d Downloads.',
	),
	'CBP_RESET_SETTINGS'				=> 'Standardeinstellungen wiederherstellen',
	'CBP_RESET_SETTINGS_EXPLAIN'		=> 'Alle Optionen dieser Seite werden auf ihren Standardwert zurückgesetzt.',
	'CBP_SETTINGS_SAVED'				=> 'Die Einstellungen von Codebox Plus wurden gespeichert.',
	'CBP_ERR_RANGE'					=> '„%1$s“ muss zwischen %2$d und %3$d liegen.',
	'CBP_ERR_FAVORITES'				=> 'Unbekannte Sprachen in der Liste der beliebten Sprachen: %s',
	'CBP_ERR_NO_CAPTCHA'				=> 'Kein CAPTCHA-Plugin eingestellt: Wähle zuerst eines unter „Spambot-Abwehr“.',
	'CBP_CONFIRM_PURGE'				=> 'Möchtest du den Hervorhebungs-Cache wirklich leeren?',
	'CBP_CONFIRM_RESET_COUNTER'		=> 'Möchtest du den Download-Zähler wirklich zurücksetzen?',
	'CBP_CONFIRM_RESET_SETTINGS'		=> 'Möchtest du die Standardeinstellungen von Codebox Plus wirklich wiederherstellen?',
	'CBP_CONFIRM_REMOVE_OLD_BBCODE'	=> 'Möchtest du den alten BBCode [Codebox=] wirklich aus der BBCode-Tabelle entfernen? Bestehende Beiträge werden nicht verändert.',
	'CBP_CACHE_PURGED'					=> 'Der Hervorhebungs-Cache wurde geleert.',
	'CBP_COUNTER_RESET'				=> 'Der Download-Zähler wurde zurückgesetzt.',
	'CBP_SETTINGS_RESET'				=> 'Die Standardeinstellungen wurden wiederhergestellt.',
	'CBP_OLD_BBCODE_REMOVED'			=> 'Der alte BBCode wurde entfernt.',
	'CBP_CHECKUP_ALL_OK'				=> 'Alles funktioniert korrekt',
	'CBP_CHECKUP_HAS_ERRORS'			=> 'Einige Probleme erfordern deine Aufmerksamkeit',
	'CBP_CHECKUP_HAS_WARNINGS'			=> 'Funktioniert, mit einigen Warnungen',
	'CBP_CHECKUP_OK'					=> array(
		1 => '%d bestanden',
		2 => '%d bestanden',
	),
	'CBP_CHECKUP_WARNINGS'				=> array(
		1 => '%d Warnung',
		2 => '%d Warnungen',
	),
	'CBP_CHECKUP_ERRORS'				=> array(
		1 => '%d Fehler',
		2 => '%d Fehler',
	),
	'CBP_CHECKUP_INFOS'				=> array(
		1 => '%d Hinweis',
		2 => '%d Hinweise',
	),
	'CBP_CHECKUP_RUN_AT'				=> 'Ausgeführt am %s',
	'CBP_CHECKUP_RERUN'				=> 'Erneut ausführen',
	'CBP_CHECKUP_STATUS'				=> 'Status',
	'CBP_CHECKUP_TEST'					=> 'Test',
	'CBP_CHECKUP_RESULT'				=> 'Ergebnis',
	'CBP_STATUS_OK'					=> 'OK',
	'CBP_STATUS_WARNING'				=> 'Warnung',
	'CBP_STATUS_ERROR'					=> 'Fehler',
	'CBP_STATUS_INFO'					=> 'Info',
	'CBP_CHK_PHP'						=> 'PHP-Version',
	'CBP_CHK_PHP_DETAIL'				=> 'PHP %s (7.2 oder neuer erforderlich).',
	'CBP_CHK_PHPBB'					=> 'phpBB-Version',
	'CBP_CHK_PHPBB_DETAIL'				=> 'phpBB %s (3.3.0 oder neuer erforderlich).',
	'CBP_CHK_PHP_EXT'					=> 'PHP-Module',
	'CBP_CHK_PHP_EXT_OK'				=> 'dom, libxml und mbstring sind verfügbar.',
	'CBP_CHK_PHP_EXT_MISSING'			=> 'Fehlende PHP-Module: %s',
	'CBP_CHK_GESHI'					=> 'Hervorhebungs-Engine GeSHi',
	'CBP_CHK_GESHI_OK'					=> 'GeSHi %1$s mit allen %2$d Sprachdateien.',
	'CBP_CHK_GESHI_MISSING'			=> 'Fehlende Sprachdateien: %s. Lade die Erweiterung erneut hoch.',
	'CBP_CHK_HIGHLIGHT'				=> 'Hervorhebungstest',
	'CBP_CHK_HIGHLIGHT_OFF'			=> 'Die Syntaxhervorhebung ist in den Einstellungen deaktiviert.',
	'CBP_CHK_HIGHLIGHT_OK'				=> 'Ein PHP-Beispielcode mit %d Zeilen wurde korrekt hervorgehoben.',
	'CBP_CHK_HIGHLIGHT_FAIL'			=> 'Hervorhebung fehlgeschlagen: %s',
	'CBP_CHK_PARSER'					=> 'BBCode [codebox]',
	'CBP_CHK_PARSER_OK'				=> 'Der BBCode ist registriert und wird vom Textformatierer erkannt.',
	'CBP_CHK_PARSER_FAIL'				=> 'Der BBCode wird nicht erkannt: Leere den Cache des Forums (Allgemein → Cache leeren) und versuche es erneut.',
	'CBP_CHK_RENDER'					=> 'Anzeige der Code-Box',
	'CBP_CHK_RENDER_OK'				=> 'Die Code-Box mit Werkzeugleiste und Zeilennummern wird korrekt erzeugt.',
	'CBP_CHK_RENDER_FAIL'				=> 'Die Code-Box wird nicht erzeugt: Leere den Cache des Forums und prüfe, dass keine andere Erweiterung denselben BBCode verwendet.',
	'CBP_CHK_ROUNDTRIP'				=> 'Download-Links',
	'CBP_CHK_ROUNDTRIP_OK'				=> 'Der Fingerabdruck des angezeigten Codes stimmt mit dem gespeicherten Code überein: Downloads funktionieren und versteckter Code kann nicht heruntergeladen werden.',
	'CBP_CHK_ROUNDTRIP_FAIL'			=> 'Der Fingerabdruck des angezeigten Codes stimmt nicht mit dem gespeicherten Code überein: Downloads aus Themen würden fehlschlagen.',
	'CBP_CHK_ROUTE'					=> 'Download-Seite',
	'CBP_CHK_ROUTE_OK'					=> 'Die Download-Adresse wird korrekt erzeugt.',
	'CBP_CHK_ROUTE_OFF'				=> 'Der Download ist in den Einstellungen deaktiviert.',
	'CBP_CHK_ROUTE_FAIL'				=> 'Die Download-Adresse kann nicht erzeugt werden: %s',
	'CBP_CHK_OLD_BBCODE'				=> 'Alter BBCode [Codebox=]',
	'CBP_CHK_OLD_BBCODE_OK'			=> 'Kein kollidierender BBCode in der BBCode-Tabelle.',
	'CBP_CHK_OLD_BBCODE_FOUND'			=> 'Die BBCode-Tabelle enthält noch den BBCode [Codebox=] der ursprünglichen Erweiterung. Er wird ignoriert, sollte aber besser entfernt werden.',
	'CBP_FIX_REMOVE_OLD_BBCODE'		=> 'Jetzt entfernen',
	'CBP_CHK_OLD_EXT'					=> 'Ursprüngliche Erweiterung',
	'CBP_CHK_OLD_EXT_OK'				=> 'Die ursprüngliche Erweiterung o0johntam0o/codeboxplus ist nicht installiert.',
	'CBP_CHK_OLD_EXT_ENABLED'			=> 'Die ursprüngliche Erweiterung o0johntam0o/codeboxplus ist aktiviert: Deaktiviere sie unter „Erweiterungen verwalten“.',
	'CBP_CHK_OLD_EXT_FILES'			=> 'Der Ordner ext/o0johntam0o/codeboxplus ist noch auf dem Server: Nachdem du sie deaktiviert und ihre Daten gelöscht hast, kannst du ihn entfernen.',
	'CBP_CHK_CACHE'					=> 'Cache',
	'CBP_CHK_CACHE_OK'					=> 'Der Cache funktioniert (%s).',
	'CBP_CHK_CACHE_FAIL'				=> 'In den Cache kann nicht geschrieben werden: Prüfe die Rechte des Ordners cache/.',
	'CBP_CACHE_ON'						=> 'Hervorhebungs-Cache aktiv, %d Sekunden',
	'CBP_CACHE_OFF'					=> 'Hervorhebungs-Cache deaktiviert',
	'CBP_CHK_CAPTCHA'					=> 'Anti-Spambot-Bestätigung',
	'CBP_CHK_CAPTCHA_OK'				=> 'CAPTCHA-Plugin „%s“ verfügbar.',
	'CBP_CHK_CAPTCHA_FAIL'				=> 'Das CAPTCHA-Plugin „%s“ ist nicht verfügbar: Prüfe die „Spambot-Abwehr“.',
	'CBP_CHK_CAPTCHA_OFF'				=> 'Für den Download nicht aktiviert.',
	'CBP_CHK_LANG'						=> 'Sprachdateien',
	'CBP_CHK_LANG_OK'					=> 'Vollständige Übersetzung für die installierten Sprachen: %s.',
	'CBP_CHK_LANG_FALLBACK'			=> 'Sprachen ohne Übersetzung (Englisch wird verwendet): %s.',
	'CBP_CHK_ASSETS'					=> 'Style-Dateien',
	'CBP_CHK_ASSETS_OK'				=> 'CSS, JavaScript und Templates sind vorhanden (styles/all: gültig für prosilver, ForumUS und jeden anderen Style).',
	'CBP_CHK_ASSETS_MISSING'			=> 'Fehlende Dateien: %s',
	'CBP_CHK_POSTS'					=> 'Beiträge mit Code',
	'CBP_CHK_POSTS_DETAIL'				=> array(
		0 => 'Noch kein Beitrag enthält Code-Boxen.',
		1 => '%d Beitrag enthält Code-Boxen.',
		2 => '%d Beiträge enthalten Code-Boxen.',
	),
	'CBP_CHK_LEGACY'					=> 'Beiträge im alten Format',
	'CBP_CHK_LEGACY_OK'				=> 'Kein Beitrag im alten Format (phpBB 3.0/3.1) gespeichert.',
	'CBP_CHK_LEGACY_FOUND'				=> array(
		1 => '%d Beitrag ist noch im alten Format gespeichert: Führe <code>php bin/phpbbcli.php reparser:reparse post_text</code> aus, um ihn umzuwandeln.',
		2 => '%d Beiträge sind noch im alten Format gespeichert: Führe <code>php bin/phpbbcli.php reparser:reparse post_text</code> aus, um sie umzuwandeln.',
	),
	'CBP_CREDITS'						=> 'Codebox Plus &middot; entwickelt von <a href="https://github.com/o0johntam0o" target="_blank" rel="noopener">Huynh Buu Tam (o0johntam0o)</a> &middot; für phpBB 3.3 neu geschrieben und erweitert von <a href="https://www.netshadows.de/ombra/" target="_blank" rel="noopener">Salvo Cortesiano</a> &middot; Hervorhebungs-Engine <a href="https://github.com/GeSHi/geshi-1.0" target="_blank" rel="noopener">GeSHi</a> von Nigel McNie &amp; Benny Baumann',
	'CBP_DOWNLOAD_GROUPS'				=> 'Gruppen mit Download-Berechtigung',
	'CBP_DOWNLOAD_GROUPS_EXPLAIN'		=> 'Nur Mitglieder der ausgewählten Gruppen können den Code herunterladen (Strg/Cmd + Klick für mehrere Gruppen). Ist keine Gruppe ausgewählt, dürfen alle herunterladen. Nicht berechtigte Gäste werden zur Anmeldung aufgefordert.',
	'CBP_DOWNLOAD_GROUPS_ALL'			=> 'Keine Gruppe ausgewählt: alle Gruppen dürfen herunterladen.',
	'CBP_DOWNLOAD_GROUPS_SOME'			=> 'Nur die ausgewählten Gruppen dürfen herunterladen.',
	'CBP_DOWNLOAD_GROUPS_CLEAR'		=> 'Auswahl aufheben (alle Gruppen)',
	'CBP_LEGEND_CREDITS'				=> 'Credits',
	'CBP_SHOW_CREDITS'					=> 'Credits anzeigen',
	'CBP_SHOW_CREDITS_EXPLAIN'			=> 'Zeigt unter jeder Code-Box das Copyright des ursprünglichen Autors und der phpBB-3.3-Version mit Links zu Repositorys und Website. Namen und Adressen stehen in den Sprachdateien (CBP_CREDITS_*).',
	'CBP_REPO_URL'						=> 'Adresse des GitHub-Repositorys',
	'CBP_REPO_URL_EXPLAIN'				=> 'Adresse deines Repositorys in den Credits. Leer lassen, um die aus den Sprachdateien zu verwenden (CBP_CREDITS_REPO_URL).',
	'CBP_ERR_REPO_URL'					=> 'Die Repository-Adresse muss eine gültige http://- oder https://-Adresse sein (max. 255 Zeichen).',
	'CBP_CHK_GROUPS'					=> 'Gruppen mit Download-Berechtigung',
	'CBP_CHK_GROUPS_ALL'				=> 'Alle Gruppen dürfen herunterladen.',
	'CBP_CHK_GROUPS_LIST'				=> 'Nur diese Gruppen dürfen herunterladen: %s.',
	'CBP_WINDOW_BUTTONS'				=> 'Fensterschaltflächen',
	'CBP_WINDOW_BUTTONS_EXPLAIN'		=> 'Die drei farbigen Punkte der Titelleiste funktionieren wie Fensterschaltflächen: Rot klappt die Box auf die Titelleiste ein, Gelb zeigt den gesamten Code / weniger, Grün öffnet das Vollbild. Wähle „Nein“, um sie auszublenden.',
	'CBP_GROUP_AI_CRAWLERS'			=> 'KI-Crawler',
));
