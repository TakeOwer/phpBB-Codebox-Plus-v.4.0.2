<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * ACP language file [Swedish]
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
	'ACP_CBP_EXPLAIN'					=> 'Responsiva kodrutor med syntaxmarkering för över 250 språk, kopiering, markering, radbrytning, radnummer, helskärm och skyddad nerladdning av koden. Användning i inlägg: <code>[codebox=php file=index.php]...[/codebox]</code>.',
	'CBP_BADGE_EXT'					=> 'Tillägg',
	'CBP_BADGE_LANGUAGES'				=> 'Språk',
	'CBP_BADGE_DOWNLOADS'				=> 'Nerladdningar',
	'CBP_BADGE_LICENSE'				=> 'Licens',
	'CBP_LEGEND_DISPLAY'				=> 'Visning',
	'CBP_HIGHLIGHT'					=> 'Syntaxmarkering',
	'CBP_HIGHLIGHT_EXPLAIN'			=> 'Färglägger koden enligt det valda språket (GeSHi). Om inaktiverad visas koden som ren text.',
	'CBP_THEME'						=> 'Färgtema',
	'CBP_THEME_EXPLAIN'				=> '”Automatiskt” följer forumets stil: ljusa rutor med ljusa stilar och mörka rutor med mörka stilar (även när stilen har en ljus/mörk-växlare). Utan JavaScript följs enhetens inställning.',
	'CBP_THEME_AUTO'					=> 'Automatiskt (följer forumets stil)',
	'CBP_THEME_LIGHT'					=> 'Ljust',
	'CBP_THEME_DARK'					=> 'Mörkt',
	'CBP_THEME_MONOKAI'				=> 'Monokai',
	'CBP_THEME_DRACULA'				=> 'Dracula',
	'CBP_THEME_NORD'					=> 'Nord',
	'CBP_LINE_NUMBERS_OPT'				=> 'Radnummer',
	'CBP_LINE_NUMBERS_OPT_EXPLAIN'		=> 'Visa radnummer som standard (användarna kan dölja dem). Radnumren kopieras aldrig med koden.',
	'CBP_WRAP_OPT'						=> 'Radbrytning',
	'CBP_WRAP_OPT_EXPLAIN'				=> 'Bryt långa rader som standard i stället för att rulla horisontellt (användarna kan ändra det).',
	'CBP_EXPANDED'						=> 'Alltid utökad',
	'CBP_EXPANDED_EXPLAIN'				=> 'Visa hela koden. Om inaktiverad begränsas lång kod till maxhöjden nedan och en rad ”Visa hela koden” visas.',
	'CBP_MAX_HEIGHT'					=> 'Maxhöjd',
	'CBP_MAX_HEIGHT_EXPLAIN'			=> 'Höjd på en hopfälld kodruta (120 - 3000).',
	'CBP_PIXEL'						=> 'pixlar',
	'CBP_TAB_SIZE'						=> 'Tabbredd',
	'CBP_TAB_SIZE_EXPLAIN'				=> 'Antal mellanslag som används för att visa ett tabbtecken (1 - 8).',
	'CBP_EDITOR_BUTTON'				=> 'Knapp i redigeraren',
	'CBP_EDITOR_BUTTON_EXPLAIN'		=> 'Lägger till en knapp som öppnar språkväljaren i inläggsredigeraren, snabbsvaret och privata meddelanden.',
	'CBP_FAVORITES'					=> 'Populära språk',
	'CBP_FAVORITES_EXPLAIN'			=> 'Identifierare för språken som visas överst i väljaren, separerade med kommatecken (t.ex. <code>php,javascript,python</code>).',
	'CBP_LEGEND_DOWNLOAD'				=> 'Nerladdning',
	'CBP_ENABLE_DOWNLOAD'				=> 'Aktivera nerladdning',
	'CBP_ENABLE_DOWNLOAD_EXPLAIN'		=> 'Visar knappen ”Ladda ner” som sparar koden som en fil. I ämnen levereras filen av forumet efter behörighetskontroll; i förhandsgranskningar och privata meddelanden skapas den av webbläsaren.',
	'CBP_LOGIN_REQUIRED'				=> 'Inloggning krävs',
	'CBP_LOGIN_REQUIRED_EXPLAIN'		=> 'Gäster ombeds logga in innan de laddar ner.',
	'CBP_PREVENT_BOTS'					=> 'Spärra botar',
	'CBP_PREVENT_BOTS_EXPLAIN'			=> 'Sökmotorer och botar kan inte ladda ner koden och ser inte knappen.',
	'CBP_REQUIRE_FDOWNLOAD'			=> 'Kräv behörigheten ”Kan ladda ner filer”',
	'CBP_REQUIRE_FDOWNLOAD_EXPLAIN'	=> 'Utöver behörigheten att läsa forumet måste användaren ha forumbehörighet att ladda ner bilagor.',
	'CBP_CAPTCHA'						=> 'Anti-spambot-bekräftelse',
	'CBP_CAPTCHA_EXPLAIN'				=> 'Kräv den CAPTCHA som är inställd under ”Spambot-åtgärder” före nerladdning. När den lösts gäller den i 30 minuter.',
	'CBP_CAPTCHA_GUESTS_ONLY'			=> 'Bekräftelse endast för gäster',
	'CBP_CAPTCHA_GUESTS_ONLY_EXPLAIN'	=> 'Registrerade användare laddar ner utan bekräftelse.',
	'CBP_MAX_ATTEMPTS'					=> 'Max antal försök',
	'CBP_MAX_ATTEMPTS_EXPLAIN'			=> 'Antal felaktiga bekräftelser som tillåts per session innan nerladdningen spärras (1 - 50).',
	'CBP_LEGEND_PERFORMANCE'			=> 'Prestanda',
	'CBP_MAX_HIGHLIGHT_KB'				=> 'Gräns för syntaxmarkering',
	'CBP_MAX_HIGHLIGHT_KB_EXPLAIN'		=> 'Kod som är större än denna storlek visas utan färger för att spara resurser (8 - 4096).',
	'CBP_CACHE_TTL'					=> 'Cache för syntaxmarkering',
	'CBP_CACHE_TTL_EXPLAIN'			=> 'Hur länge markerad kod sparas i cachen. 0 inaktiverar cachen (0 - 2592000; 86400 = en dag).',
	'CBP_SECONDS'						=> 'sekunder',
	'CBP_PREVIEW'						=> 'Live-förhandsgranskning',
	'CBP_PREVIEW_EXPLAIN'				=> 'Tema, radnummer, radbrytning, höjd och tabbredd uppdateras medan du ändrar dem. Spara för att tillämpa dem på forumet.',
	'CBP_USAGE'						=> 'Användning',
	'CBP_USAGE_EXPLAIN'				=> 'Använd knappen ”Kod” i redigeraren eller skriv BBCoden för hand. Språk och filnamn är valfria.',
	'CBP_MAINTENANCE'					=> 'Underhåll',
	'CBP_PURGE_CACHE'					=> 'Töm cachen för syntaxmarkering',
	'CBP_PURGE_CACHE_EXPLAIN'			=> 'Markerad kod genereras på nytt vid nästa visning.',
	'CBP_RESET_COUNTER'				=> 'Nollställ nerladdningsräknaren',
	'CBP_RESET_COUNTER_EXPLAIN'		=> array(
		1 => 'För närvarande %d nerladdning.',
		2 => 'För närvarande %d nerladdningar.',
	),
	'CBP_RESET_SETTINGS'				=> 'Återställ standardinställningarna',
	'CBP_RESET_SETTINGS_EXPLAIN'		=> 'Alla alternativ på denna sida återgår till sitt standardvärde.',
	'CBP_SETTINGS_SAVED'				=> 'Inställningarna för Codebox Plus har sparats.',
	'CBP_ERR_RANGE'					=> '”%1$s” måste vara mellan %2$d och %3$d.',
	'CBP_ERR_FAVORITES'				=> 'Okända språk i listan över populära språk: %s',
	'CBP_ERR_NO_CAPTCHA'				=> 'Inget CAPTCHA-insticksprogram är inställt: välj ett under ”Spambot-åtgärder” först.',
	'CBP_CONFIRM_PURGE'				=> 'Vill du verkligen tömma cachen för syntaxmarkering?',
	'CBP_CONFIRM_RESET_COUNTER'		=> 'Vill du verkligen nollställa nerladdningsräknaren?',
	'CBP_CONFIRM_RESET_SETTINGS'		=> 'Vill du verkligen återställa standardinställningarna för Codebox Plus?',
	'CBP_CONFIRM_REMOVE_OLD_BBCODE'	=> 'Vill du verkligen ta bort den gamla BBCoden [Codebox=] från BBCode-tabellen? Befintliga inlägg ändras inte.',
	'CBP_CACHE_PURGED'					=> 'Cachen för syntaxmarkering har tömts.',
	'CBP_COUNTER_RESET'				=> 'Nerladdningsräknaren har nollställts.',
	'CBP_SETTINGS_RESET'				=> 'Standardinställningarna har återställts.',
	'CBP_OLD_BBCODE_REMOVED'			=> 'Den gamla BBCoden har tagits bort.',
	'CBP_CHECKUP_ALL_OK'				=> 'Allt fungerar korrekt',
	'CBP_CHECKUP_HAS_ERRORS'			=> 'Några problem behöver åtgärdas',
	'CBP_CHECKUP_HAS_WARNINGS'			=> 'Fungerar, med några varningar',
	'CBP_CHECKUP_OK'					=> array(
		1 => '%d godkänt',
		2 => '%d godkända',
	),
	'CBP_CHECKUP_WARNINGS'				=> array(
		1 => '%d varning',
		2 => '%d varningar',
	),
	'CBP_CHECKUP_ERRORS'				=> array(
		1 => '%d fel',
		2 => '%d fel',
	),
	'CBP_CHECKUP_INFOS'				=> array(
		1 => '%d information',
		2 => '%d informationer',
	),
	'CBP_CHECKUP_RUN_AT'				=> 'Kördes %s',
	'CBP_CHECKUP_RERUN'				=> 'Kör igen',
	'CBP_CHECKUP_STATUS'				=> 'Status',
	'CBP_CHECKUP_TEST'					=> 'Test',
	'CBP_CHECKUP_RESULT'				=> 'Resultat',
	'CBP_STATUS_OK'					=> 'OK',
	'CBP_STATUS_WARNING'				=> 'Varning',
	'CBP_STATUS_ERROR'					=> 'Fel',
	'CBP_STATUS_INFO'					=> 'Info',
	'CBP_CHK_PHP'						=> 'PHP-version',
	'CBP_CHK_PHP_DETAIL'				=> 'PHP %s (7.2 eller senare krävs).',
	'CBP_CHK_PHPBB'					=> 'phpBB-version',
	'CBP_CHK_PHPBB_DETAIL'				=> 'phpBB %s (3.3.0 eller senare krävs).',
	'CBP_CHK_PHP_EXT'					=> 'PHP-moduler',
	'CBP_CHK_PHP_EXT_OK'				=> 'dom, libxml och mbstring är tillgängliga.',
	'CBP_CHK_PHP_EXT_MISSING'			=> 'Saknade PHP-moduler: %s',
	'CBP_CHK_GESHI'					=> 'Markeringsmotorn GeSHi',
	'CBP_CHK_GESHI_OK'					=> 'GeSHi %1$s med alla %2$d språkfiler.',
	'CBP_CHK_GESHI_MISSING'			=> 'Saknade språkfiler: %s. Ladda upp tillägget igen.',
	'CBP_CHK_HIGHLIGHT'				=> 'Test av syntaxmarkering',
	'CBP_CHK_HIGHLIGHT_OFF'			=> 'Syntaxmarkeringen är inaktiverad i inställningarna.',
	'CBP_CHK_HIGHLIGHT_OK'				=> 'En PHP-exempelkod på %d rader har markerats korrekt.',
	'CBP_CHK_HIGHLIGHT_FAIL'			=> 'Syntaxmarkeringen misslyckades: %s',
	'CBP_CHK_PARSER'					=> 'BBCode [codebox]',
	'CBP_CHK_PARSER_OK'				=> 'BBCoden är registrerad och känns igen av textformateraren.',
	'CBP_CHK_PARSER_FAIL'				=> 'BBCoden känns inte igen: töm forumets cache (Allmänt → Töm cachen) och försök igen.',
	'CBP_CHK_RENDER'					=> 'Visning av kodrutan',
	'CBP_CHK_RENDER_OK'				=> 'Kodrutan med verktygsfält och radnummer genereras korrekt.',
	'CBP_CHK_RENDER_FAIL'				=> 'Kodrutan genereras inte: töm forumets cache och kontrollera att inget annat tillägg använder samma BBCode.',
	'CBP_CHK_ROUNDTRIP'				=> 'Nerladdningslänkar',
	'CBP_CHK_ROUNDTRIP_OK'				=> 'Fingeravtrycket för den visade koden stämmer med den sparade koden: nerladdningen fungerar och dold kod kan inte laddas ner.',
	'CBP_CHK_ROUNDTRIP_FAIL'			=> 'Fingeravtrycket för den visade koden stämmer inte med den sparade koden: nerladdningar från ämnen skulle misslyckas.',
	'CBP_CHK_ROUTE'					=> 'Nerladdningssida',
	'CBP_CHK_ROUTE_OK'					=> 'Nerladdningsadressen genereras korrekt.',
	'CBP_CHK_ROUTE_OFF'				=> 'Nerladdningen är inaktiverad i inställningarna.',
	'CBP_CHK_ROUTE_FAIL'				=> 'Nerladdningsadressen kan inte genereras: %s',
	'CBP_CHK_OLD_BBCODE'				=> 'Gammal BBCode [Codebox=]',
	'CBP_CHK_OLD_BBCODE_OK'			=> 'Ingen BBCode i konflikt i BBCode-tabellen.',
	'CBP_CHK_OLD_BBCODE_FOUND'			=> 'BBCode-tabellen innehåller fortfarande BBCoden [Codebox=] från det ursprungliga tillägget. Den ignoreras, men det är bättre att ta bort den.',
	'CBP_FIX_REMOVE_OLD_BBCODE'		=> 'Ta bort nu',
	'CBP_CHK_OLD_EXT'					=> 'Ursprungligt tillägg',
	'CBP_CHK_OLD_EXT_OK'				=> 'Det ursprungliga tillägget o0johntam0o/codeboxplus är inte installerat.',
	'CBP_CHK_OLD_EXT_ENABLED'			=> 'Det ursprungliga tillägget o0johntam0o/codeboxplus är aktiverat: inaktivera det under ”Hantera tillägg”.',
	'CBP_CHK_OLD_EXT_FILES'			=> 'Mappen ext/o0johntam0o/codeboxplus finns fortfarande på servern: när du har inaktiverat tillägget och raderat dess data kan du ta bort den.',
	'CBP_CHK_CACHE'					=> 'Cache',
	'CBP_CHK_CACHE_OK'					=> 'Cachen fungerar (%s).',
	'CBP_CHK_CACHE_FAIL'				=> 'Det går inte att skriva till cachen: kontrollera behörigheterna för mappen cache/.',
	'CBP_CACHE_ON'						=> 'cache för syntaxmarkering aktiv, %d sekunder',
	'CBP_CACHE_OFF'					=> 'cache för syntaxmarkering inaktiverad',
	'CBP_CHK_CAPTCHA'					=> 'Anti-spambot-bekräftelse',
	'CBP_CHK_CAPTCHA_OK'				=> 'CAPTCHA-insticksprogrammet ”%s” är tillgängligt.',
	'CBP_CHK_CAPTCHA_FAIL'				=> 'CAPTCHA-insticksprogrammet ”%s” är inte tillgängligt: kontrollera ”Spambot-åtgärder”.',
	'CBP_CHK_CAPTCHA_OFF'				=> 'Inte aktiverad för nerladdning.',
	'CBP_CHK_LANG'						=> 'Språkfiler',
	'CBP_CHK_LANG_OK'					=> 'Fullständig översättning för de installerade språken: %s.',
	'CBP_CHK_LANG_FALLBACK'			=> 'Språk utan översättning (engelska används): %s.',
	'CBP_CHK_ASSETS'					=> 'Stilfiler',
	'CBP_CHK_ASSETS_OK'				=> 'CSS, JavaScript och mallar finns (styles/all: gäller prosilver, ForumUS och alla andra stilar).',
	'CBP_CHK_ASSETS_MISSING'			=> 'Saknade filer: %s',
	'CBP_CHK_POSTS'					=> 'Inlägg med kod',
	'CBP_CHK_POSTS_DETAIL'				=> array(
		0 => 'Inget inlägg innehåller kodrutor ännu.',
		1 => '%d inlägg innehåller kodrutor.',
		2 => '%d inlägg innehåller kodrutor.',
	),
	'CBP_CHK_LEGACY'					=> 'Inlägg i det gamla formatet',
	'CBP_CHK_LEGACY_OK'				=> 'Inget inlägg sparat i det gamla formatet (phpBB 3.0/3.1).',
	'CBP_CHK_LEGACY_FOUND'				=> array(
		1 => '%d inlägg är fortfarande sparat i det gamla formatet: kör <code>php bin/phpbbcli.php reparser:reparse post_text</code> för att konvertera det.',
		2 => '%d inlägg är fortfarande sparade i det gamla formatet: kör <code>php bin/phpbbcli.php reparser:reparse post_text</code> för att konvertera dem.',
	),
	'CBP_CREDITS'						=> 'Codebox Plus &middot; utvecklat av <a href="https://github.com/o0johntam0o" target="_blank" rel="noopener">Huynh Buu Tam (o0johntam0o)</a> &middot; omskrivet och förbättrat för phpBB 3.3 av <a href="https://www.netshadows.de/ombra/" target="_blank" rel="noopener">Salvo Cortesiano</a> &middot; markeringsmotor <a href="https://github.com/GeSHi/geshi-1.0" target="_blank" rel="noopener">GeSHi</a> av Nigel McNie &amp; Benny Baumann',
	'CBP_DOWNLOAD_GROUPS'				=> 'Grupper som får ladda ner',
	'CBP_DOWNLOAD_GROUPS_EXPLAIN'		=> 'Endast medlemmar i de valda grupperna kan ladda ner koden (Ctrl/Cmd + klick för att välja flera). Om ingen grupp är vald kan alla ladda ner. Gäster utan behörighet ombeds logga in.',
	'CBP_DOWNLOAD_GROUPS_ALL'			=> 'Ingen grupp vald: alla grupper kan ladda ner.',
	'CBP_DOWNLOAD_GROUPS_SOME'			=> 'Endast de valda grupperna kan ladda ner.',
	'CBP_DOWNLOAD_GROUPS_CLEAR'		=> 'Avmarkera alla (alla grupper)',
	'CBP_LEGEND_CREDITS'				=> 'Erkännanden',
	'CBP_SHOW_CREDITS'					=> 'Visa erkännanden',
	'CBP_SHOW_CREDITS_EXPLAIN'			=> 'Visar längst ner i varje kodruta upphovsrätten för den ursprungliga författaren och för phpBB 3.3-versionen, med länkar till arkiv och webbplats. Namn och adresser finns i språkfilerna (CBP_CREDITS_*).',
	'CBP_REPO_URL'						=> 'Adress till GitHub-arkivet',
	'CBP_REPO_URL_EXPLAIN'				=> 'Adressen till ditt arkiv som visas i erkännandena. Lämna tomt för att använda den i språkfilerna (CBP_CREDITS_REPO_URL).',
	'CBP_ERR_REPO_URL'					=> 'Arkivets adress måste vara en giltig http://- eller https://-adress (max 255 tecken).',
	'CBP_CHK_GROUPS'					=> 'Grupper som får ladda ner',
	'CBP_CHK_GROUPS_ALL'				=> 'Alla grupper kan ladda ner.',
	'CBP_CHK_GROUPS_LIST'				=> 'Endast dessa grupper kan ladda ner: %s.',
	'CBP_WINDOW_BUTTONS'				=> 'Fönsterknappar',
	'CBP_WINDOW_BUTTONS_EXPLAIN'		=> 'De tre färgade prickarna i namnlisten fungerar som knapparna i ett fönster: röd fäller ihop rutan till namnlisten, gul visar hela koden / mindre, grön öppnar helskärm. Välj ”Nej” för att dölja dem.',
	'CBP_GROUP_AI_CRAWLERS'			=> 'AI-sökrobotar',
	'CBP_SHOW_DL_COUNT'				=> 'Visa nedladdningsräknare',
	'CBP_SHOW_DL_COUNT_EXPLAIN'		=> 'Visar i varje rutas sidhuvud hur många gånger dess fil har laddats ner. Räkningen sker per inlägg och per kodblock.',
	'CBP_EDITOR_TOOLS'					=> 'Redigeringsverktyg',
	'CBP_EDITOR_TOOLS_EXPLAIN'			=> 'Lägger till sökning (Ctrl+F), gå till rad, teckenstorlek, radmarkering, markeringar för tillagd/borttagen/överstruken rad, länkar till rader, markörens position och förekomster av ett ord, som i en kodredigerare. Markeringarna sparas i varje användares webbläsare.',
	'CBP_CHK_COUNTER'					=> 'Nedladdningsräknare',
	'CBP_CHK_COUNTER_OK'				=> 'Tabellen OK: %1$d kodblock nedladdade, totalt %2$d nedladdningar.',
	'CBP_CHK_COUNTER_FAIL'				=> 'Tabellen för nedladdningsräknaren saknas: inaktivera och aktivera tillägget igen för att köra migreringarna.',
));
