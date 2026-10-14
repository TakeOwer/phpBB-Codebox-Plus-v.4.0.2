<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * ACP language file [Estonian]
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
	'ACP_CBP_EXPLAIN'					=> 'Kohanduvad koodikastid süntaksiesiletusega enam kui 250 keele jaoks, kopeerimine, valimine, reamurdmine, reanumbrid, täisekraan ja koodi kaitstud allalaadimine. Kasutamine postitustes: <code>[codebox=php file=index.php]...[/codebox]</code>.',
	'CBP_BADGE_EXT'					=> 'Laiendus',
	'CBP_BADGE_LANGUAGES'				=> 'Keeled',
	'CBP_BADGE_DOWNLOADS'				=> 'Allalaadimised',
	'CBP_BADGE_LICENSE'				=> 'Litsents',
	'CBP_LEGEND_DISPLAY'				=> 'Kuvamine',
	'CBP_HIGHLIGHT'					=> 'Süntaksiesiletus',
	'CBP_HIGHLIGHT_EXPLAIN'			=> 'Värvib koodi vastavalt valitud keelele (GeSHi). Kui see on keelatud, kuvatakse kood lihttekstina.',
	'CBP_THEME'						=> 'Värviteema',
	'CBP_THEME_EXPLAIN'				=> '„Automaatne” järgib foorumi stiili: heledad kastid heledate stiilidega ja tumedad kastid tumedate stiilidega (ka siis, kui stiilil on hele/tume lüliti). Ilma JavaScriptita järgib seadme seadet.',
	'CBP_THEME_AUTO'					=> 'Automaatne (järgib foorumi stiili)',
	'CBP_THEME_LIGHT'					=> 'Hele',
	'CBP_THEME_DARK'					=> 'Tume',
	'CBP_THEME_MONOKAI'				=> 'Monokai',
	'CBP_THEME_DRACULA'				=> 'Dracula',
	'CBP_THEME_NORD'					=> 'Nord',
	'CBP_LINE_NUMBERS_OPT'				=> 'Reanumbrid',
	'CBP_LINE_NUMBERS_OPT_EXPLAIN'		=> 'Näita reanumbreid vaikimisi (kasutajad saavad need peita). Reanumbreid ei kopeerita kunagi koos koodiga.',
	'CBP_WRAP_OPT'						=> 'Reamurdmine',
	'CBP_WRAP_OPT_EXPLAIN'				=> 'Murra pikad read vaikimisi, selle asemel et kerida horisontaalselt (kasutajad saavad seda muuta).',
	'CBP_EXPANDED'						=> 'Alati laiendatud',
	'CBP_EXPANDED_EXPLAIN'				=> 'Näita kogu koodi. Kui see on keelatud, piiratakse pikk kood allpool oleva maksimaalse kõrgusega ja kuvatakse riba „Näita kogu koodi”.',
	'CBP_MAX_HEIGHT'					=> 'Maksimaalne kõrgus',
	'CBP_MAX_HEIGHT_EXPLAIN'			=> 'Ahendatud koodikasti kõrgus (120 - 3000).',
	'CBP_PIXEL'						=> 'pikslit',
	'CBP_TAB_SIZE'						=> 'Tabulaatori laius',
	'CBP_TAB_SIZE_EXPLAIN'				=> 'Tühikute arv tabulaatorimärgi kuvamiseks (1 - 8).',
	'CBP_EDITOR_BUTTON'				=> 'Redaktori nupp',
	'CBP_EDITOR_BUTTON_EXPLAIN'		=> 'Lisab postituse redaktorisse, kiirvastusesse ja privaatsõnumitesse nupu, mis avab keelevaliku.',
	'CBP_FAVORITES'					=> 'Populaarsed keeled',
	'CBP_FAVORITES_EXPLAIN'			=> 'Valiku ülaosas näidatavate keelte tunnused, komadega eraldatud (nt <code>php,javascript,python</code>).',
	'CBP_LEGEND_DOWNLOAD'				=> 'Allalaadimine',
	'CBP_ENABLE_DOWNLOAD'				=> 'Luba allalaadimine',
	'CBP_ENABLE_DOWNLOAD_EXPLAIN'		=> 'Näitab nuppu „Laadi alla”, mis salvestab koodi failina. Teemades väljastab faili foorum pärast õiguste kontrolli; eelvaadetes ja privaatsõnumites loob selle brauser.',
	'CBP_LOGIN_REQUIRED'				=> 'Sisselogimine on nõutud',
	'CBP_LOGIN_REQUIRED_EXPLAIN'		=> 'Külalistel palutakse enne allalaadimist sisse logida.',
	'CBP_PREVENT_BOTS'					=> 'Tõkesta botte',
	'CBP_PREVENT_BOTS_EXPLAIN'			=> 'Otsingumootorid ja botid ei saa koodi alla laadida ega näe nuppu.',
	'CBP_REQUIRE_FDOWNLOAD'			=> 'Nõua õigust „Saab faile alla laadida”',
	'CBP_REQUIRE_FDOWNLOAD_EXPLAIN'	=> 'Lisaks foorumi lugemise õigusele peab kasutajal olema foorumi õigus manuseid alla laadida.',
	'CBP_CAPTCHA'						=> 'Robotitevastane kinnitus',
	'CBP_CAPTCHA_EXPLAIN'				=> 'Nõua enne allalaadimist jaotises „Robotitevastased meetmed” seadistatud CAPTCHA lahendamist. Pärast lahendamist kehtib see 30 minutit.',
	'CBP_CAPTCHA_GUESTS_ONLY'			=> 'Kinnitus ainult külalistele',
	'CBP_CAPTCHA_GUESTS_ONLY_EXPLAIN'	=> 'Registreeritud kasutajad laadivad alla ilma kinnituseta.',
	'CBP_MAX_ATTEMPTS'					=> 'Maksimaalselt katseid',
	'CBP_MAX_ATTEMPTS_EXPLAIN'			=> 'Lubatud valede kinnituste arv sessioonis enne allalaadimise blokeerimist (1 - 50).',
	'CBP_LEGEND_PERFORMANCE'			=> 'Jõudlus',
	'CBP_MAX_HIGHLIGHT_KB'				=> 'Esiletõstmise piir',
	'CBP_MAX_HIGHLIGHT_KB_EXPLAIN'		=> 'Sellest suuremat koodi näidatakse ressursside säästmiseks ilma värvideta (8 - 4096).',
	'CBP_CACHE_TTL'					=> 'Esiletõstmise vahemälu',
	'CBP_CACHE_TTL_EXPLAIN'			=> 'Kui kaua esiletõstetud koodi vahemälus hoitakse. 0 keelab vahemälu (0 - 2592000; 86400 = üks päev).',
	'CBP_SECONDS'						=> 'sekundit',
	'CBP_PREVIEW'						=> 'Reaalajas eelvaade',
	'CBP_PREVIEW_EXPLAIN'				=> 'Teema, reanumbrid, reamurdmine, kõrgus ja tabulaator uuenevad muutmise ajal. Salvesta, et rakendada neid foorumis.',
	'CBP_USAGE'						=> 'Kuidas kasutada',
	'CBP_USAGE_EXPLAIN'				=> 'Kasuta redaktori nuppu „Kood” või kirjuta BBkood käsitsi. Keel ja faili nimi on valikulised.',
	'CBP_MAINTENANCE'					=> 'Hooldus',
	'CBP_PURGE_CACHE'					=> 'Tühjenda esiletõstmise vahemälu',
	'CBP_PURGE_CACHE_EXPLAIN'			=> 'Esiletõstetud kood luuakse järgmisel kuvamisel uuesti.',
	'CBP_RESET_COUNTER'				=> 'Nulli allalaadimiste loendur',
	'CBP_RESET_COUNTER_EXPLAIN'		=> array(
		1 => 'Praegu %d allalaadimine.',
		2 => 'Praegu %d allalaadimist.',
	),
	'CBP_RESET_SETTINGS'				=> 'Taasta vaikeseaded',
	'CBP_RESET_SETTINGS_EXPLAIN'		=> 'Kõik selle lehe valikud saavad tagasi vaikeväärtuse.',
	'CBP_SETTINGS_SAVED'				=> 'Codebox Plusi seaded on salvestatud.',
	'CBP_ERR_RANGE'					=> '„%1$s” peab olema vahemikus %2$d kuni %3$d.',
	'CBP_ERR_FAVORITES'				=> 'Tundmatud keeled populaarsete loendis: %s',
	'CBP_ERR_NO_CAPTCHA'				=> 'Ühtegi CAPTCHA pistikprogrammi pole seadistatud: vali see esmalt jaotises „Robotitevastased meetmed”.',
	'CBP_CONFIRM_PURGE'				=> 'Kas soovid tõesti esiletõstmise vahemälu tühjendada?',
	'CBP_CONFIRM_RESET_COUNTER'		=> 'Kas soovid tõesti allalaadimiste loenduri nullida?',
	'CBP_CONFIRM_RESET_SETTINGS'		=> 'Kas soovid tõesti taastada Codebox Plusi vaikeseaded?',
	'CBP_CONFIRM_REMOVE_OLD_BBCODE'	=> 'Kas soovid tõesti eemaldada vana BBkoodi [Codebox=] BBkoodide tabelist? Olemasolevaid postitusi ei muudeta.',
	'CBP_CACHE_PURGED'					=> 'Esiletõstmise vahemälu on tühjendatud.',
	'CBP_COUNTER_RESET'				=> 'Allalaadimiste loendur on nullitud.',
	'CBP_SETTINGS_RESET'				=> 'Vaikeseaded on taastatud.',
	'CBP_OLD_BBCODE_REMOVED'			=> 'Vana BBkood on eemaldatud.',
	'CBP_CHECKUP_ALL_OK'				=> 'Kõik töötab korrektselt',
	'CBP_CHECKUP_HAS_ERRORS'			=> 'Mõned probleemid vajavad tähelepanu',
	'CBP_CHECKUP_HAS_WARNINGS'			=> 'Töötab, mõne hoiatusega',
	'CBP_CHECKUP_OK'					=> array(
		1 => '%d läbitud',
		2 => '%d läbitud',
	),
	'CBP_CHECKUP_WARNINGS'				=> array(
		1 => '%d hoiatus',
		2 => '%d hoiatust',
	),
	'CBP_CHECKUP_ERRORS'				=> array(
		1 => '%d viga',
		2 => '%d viga',
	),
	'CBP_CHECKUP_INFOS'				=> array(
		1 => '%d teave',
		2 => '%d teavet',
	),
	'CBP_CHECKUP_RUN_AT'				=> 'Käivitatud %s',
	'CBP_CHECKUP_RERUN'				=> 'Käivita uuesti',
	'CBP_CHECKUP_STATUS'				=> 'Olek',
	'CBP_CHECKUP_TEST'					=> 'Test',
	'CBP_CHECKUP_RESULT'				=> 'Tulemus',
	'CBP_STATUS_OK'					=> 'OK',
	'CBP_STATUS_WARNING'				=> 'Hoiatus',
	'CBP_STATUS_ERROR'					=> 'Viga',
	'CBP_STATUS_INFO'					=> 'Info',
	'CBP_CHK_PHP'						=> 'PHP versioon',
	'CBP_CHK_PHP_DETAIL'				=> 'PHP %s (nõutud 7.2 või uuem).',
	'CBP_CHK_PHPBB'					=> 'phpBB versioon',
	'CBP_CHK_PHPBB_DETAIL'				=> 'phpBB %s (nõutud 3.3.0 või uuem).',
	'CBP_CHK_PHP_EXT'					=> 'PHP moodulid',
	'CBP_CHK_PHP_EXT_OK'				=> 'dom, libxml ja mbstring on saadaval.',
	'CBP_CHK_PHP_EXT_MISSING'			=> 'Puuduvad PHP moodulid: %s',
	'CBP_CHK_GESHI'					=> 'Esiletõstmise mootor GeSHi',
	'CBP_CHK_GESHI_OK'					=> 'GeSHi %1$s kõigi %2$d keelefailiga.',
	'CBP_CHK_GESHI_MISSING'			=> 'Puuduvad keelefailid: %s. Laadi laiendus uuesti üles.',
	'CBP_CHK_HIGHLIGHT'				=> 'Esiletõstmise test',
	'CBP_CHK_HIGHLIGHT_OFF'			=> 'Süntaksiesiletus on seadetes keelatud.',
	'CBP_CHK_HIGHLIGHT_OK'				=> '%d-realine PHP näidiskood tõsteti korrektselt esile.',
	'CBP_CHK_HIGHLIGHT_FAIL'			=> 'Esiletõstmine ebaõnnestus: %s',
	'CBP_CHK_PARSER'					=> 'BBkood [codebox]',
	'CBP_CHK_PARSER_OK'				=> 'BBkood on registreeritud ja tekstivormindaja tunneb selle ära.',
	'CBP_CHK_PARSER_FAIL'				=> 'BBkoodi ei tunta ära: tühjenda foorumi vahemälu (Üldine → Tühjenda vahemälu) ja proovi uuesti.',
	'CBP_CHK_RENDER'					=> 'Koodikasti kuvamine',
	'CBP_CHK_RENDER_OK'				=> 'Tööriistariba ja reanumbritega koodikast luuakse korrektselt.',
	'CBP_CHK_RENDER_FAIL'				=> 'Koodikasti ei looda: tühjenda foorumi vahemälu ja kontrolli, et ükski teine laiendus ei kasutaks sama BBkoodi.',
	'CBP_CHK_ROUNDTRIP'				=> 'Allalaadimislingid',
	'CBP_CHK_ROUNDTRIP_OK'				=> 'Kuvatud koodi sõrmejälg vastab salvestatud koodile: allalaadimine töötab ja peidetud koodi ei saa alla laadida.',
	'CBP_CHK_ROUNDTRIP_FAIL'			=> 'Kuvatud koodi sõrmejälg ei vasta salvestatud koodile: teemadest allalaadimine ebaõnnestuks.',
	'CBP_CHK_ROUTE'					=> 'Allalaadimise leht',
	'CBP_CHK_ROUTE_OK'					=> 'Allalaadimise aadress luuakse korrektselt.',
	'CBP_CHK_ROUTE_OFF'				=> 'Allalaadimine on seadetes keelatud.',
	'CBP_CHK_ROUTE_FAIL'				=> 'Allalaadimise aadressi ei saa luua: %s',
	'CBP_CHK_OLD_BBCODE'				=> 'Vana BBkood [Codebox=]',
	'CBP_CHK_OLD_BBCODE_OK'			=> 'BBkoodide tabelis pole vastuolus olevat BBkoodi.',
	'CBP_CHK_OLD_BBCODE_FOUND'			=> 'BBkoodide tabel sisaldab endiselt algse laienduse BBkoodi [Codebox=]. Seda eiratakse, kuid parem on see eemaldada.',
	'CBP_FIX_REMOVE_OLD_BBCODE'		=> 'Eemalda kohe',
	'CBP_CHK_OLD_EXT'					=> 'Algne laiendus',
	'CBP_CHK_OLD_EXT_OK'				=> 'Algset laiendust o0johntam0o/codeboxplus pole paigaldatud.',
	'CBP_CHK_OLD_EXT_ENABLED'			=> 'Algne laiendus o0johntam0o/codeboxplus on lubatud: keela see jaotises „Halda laiendusi”.',
	'CBP_CHK_OLD_EXT_FILES'			=> 'Kaust ext/o0johntam0o/codeboxplus on endiselt serveris: pärast laienduse keelamist ja selle andmete kustutamist võid selle eemaldada.',
	'CBP_CHK_CACHE'					=> 'Vahemälu',
	'CBP_CHK_CACHE_OK'					=> 'Vahemälu töötab (%s).',
	'CBP_CHK_CACHE_FAIL'				=> 'Vahemällu ei saa kirjutada: kontrolli kausta cache/ õigusi.',
	'CBP_CACHE_ON'						=> 'esiletõstmise vahemälu aktiivne, %d sekundit',
	'CBP_CACHE_OFF'					=> 'esiletõstmise vahemälu keelatud',
	'CBP_CHK_CAPTCHA'					=> 'Robotitevastane kinnitus',
	'CBP_CHK_CAPTCHA_OK'				=> 'CAPTCHA pistikprogramm „%s” on saadaval.',
	'CBP_CHK_CAPTCHA_FAIL'				=> 'CAPTCHA pistikprogramm „%s” pole saadaval: kontrolli „Robotitevastaseid meetmeid”.',
	'CBP_CHK_CAPTCHA_OFF'				=> 'Allalaadimisel pole lubatud.',
	'CBP_CHK_LANG'						=> 'Keelefailid',
	'CBP_CHK_LANG_OK'					=> 'Täielik tõlge paigaldatud keelte jaoks: %s.',
	'CBP_CHK_LANG_FALLBACK'			=> 'Tõlketa keeled (kasutatakse inglise keelt): %s.',
	'CBP_CHK_ASSETS'					=> 'Stiili failid',
	'CBP_CHK_ASSETS_OK'				=> 'CSS, JavaScript ja mallid on olemas (styles/all: kehtivad prosilverile, ForumUS-ile ja igale teisele stiilile).',
	'CBP_CHK_ASSETS_MISSING'			=> 'Puuduvad failid: %s',
	'CBP_CHK_POSTS'					=> 'Koodiga postitused',
	'CBP_CHK_POSTS_DETAIL'				=> array(
		0 => 'Ükski postitus ei sisalda veel koodikaste.',
		1 => '%d postitus sisaldab koodikaste.',
		2 => '%d postitust sisaldab koodikaste.',
	),
	'CBP_CHK_LEGACY'					=> 'Vanas vormingus postitused',
	'CBP_CHK_LEGACY_OK'				=> 'Ühtegi postitust pole salvestatud vanas vormingus (phpBB 3.0/3.1).',
	'CBP_CHK_LEGACY_FOUND'				=> array(
		1 => '%d postitus on endiselt salvestatud vanas vormingus: käivita <code>php bin/phpbbcli.php reparser:reparse post_text</code>, et see teisendada.',
		2 => '%d postitust on endiselt salvestatud vanas vormingus: käivita <code>php bin/phpbbcli.php reparser:reparse post_text</code>, et need teisendada.',
	),
	'CBP_CREDITS'						=> 'Codebox Plus &middot; arendaja <a href="https://github.com/o0johntam0o" target="_blank" rel="noopener">Huynh Buu Tam (o0johntam0o)</a> &middot; phpBB 3.3 jaoks ümber kirjutanud ja täiustanud <a href="https://www.netshadows.de/ombra/" target="_blank" rel="noopener">Salvo Cortesiano</a> &middot; esiletõstmise mootor <a href="https://github.com/GeSHi/geshi-1.0" target="_blank" rel="noopener">GeSHi</a>, autorid Nigel McNie &amp; Benny Baumann',
	'CBP_DOWNLOAD_GROUPS'				=> 'Allalaadimiseks lubatud grupid',
	'CBP_DOWNLOAD_GROUPS_EXPLAIN'		=> 'Koodi saavad alla laadida ainult valitud gruppide liikmed (mitme valimiseks Ctrl/Cmd + klõps). Kui ühtegi gruppi pole valitud, saavad kõik alla laadida. Lubamata külalistel palutakse sisse logida.',
	'CBP_DOWNLOAD_GROUPS_ALL'			=> 'Ühtegi gruppi pole valitud: kõik grupid saavad alla laadida.',
	'CBP_DOWNLOAD_GROUPS_SOME'			=> 'Alla laadida saavad ainult valitud grupid.',
	'CBP_DOWNLOAD_GROUPS_CLEAR'		=> 'Tühista kõik valikud (kõik grupid)',
	'CBP_LEGEND_CREDITS'				=> 'Tänuavaldused',
	'CBP_SHOW_CREDITS'					=> 'Näita tänuavaldusi',
	'CBP_SHOW_CREDITS_EXPLAIN'			=> 'Näitab iga koodikasti all algse autori ja phpBB 3.3 versiooni autoriõigust koos linkidega hoidlatele ja veebisaidile. Nimed ja aadressid on keelefailides (CBP_CREDITS_*).',
	'CBP_REPO_URL'						=> 'GitHubi hoidla aadress',
	'CBP_REPO_URL_EXPLAIN'				=> 'Sinu hoidla aadress tänuavaldustes. Jäta tühjaks, et kasutada keelefailides olevat (CBP_CREDITS_REPO_URL).',
	'CBP_ERR_REPO_URL'					=> 'Hoidla aadress peab olema kehtiv http:// või https:// aadress (kuni 255 märki).',
	'CBP_CHK_GROUPS'					=> 'Allalaadimiseks lubatud grupid',
	'CBP_CHK_GROUPS_ALL'				=> 'Kõik grupid saavad alla laadida.',
	'CBP_CHK_GROUPS_LIST'				=> 'Alla laadida saavad ainult need grupid: %s.',
	'CBP_WINDOW_BUTTONS'				=> 'Akna nupud',
	'CBP_WINDOW_BUTTONS_EXPLAIN'		=> 'Tiitliriba kolm värvilist täppi töötavad nagu akna nupud: punane ahendab kasti tiitliribaks, kollane näitab kogu koodi / vähem, roheline avab täisekraani. Vali „Ei”, et need peita.',
	'CBP_GROUP_AI_CRAWLERS'			=> 'Tehisintellekti robotid',
));
