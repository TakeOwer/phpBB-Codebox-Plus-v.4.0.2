<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * ACP module language file [Italian]
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
	'ACP_CBP_TITLE'				=> 'Codebox Plus',
	'ACP_CBP_SETTINGS'			=> 'Impostazioni',
	'ACP_CBP_CHECKUP'				=> 'Check-up',
	'LOG_CBP_SETTINGS'			=> '<strong>Impostazioni di Codebox Plus aggiornate</strong>',
	'LOG_CBP_CACHE_PURGED'		=> '<strong>Codebox Plus: cache dell’evidenziazione svuotata</strong>',
	'LOG_CBP_COUNTER_RESET'		=> '<strong>Codebox Plus: contatore degli scaricamenti azzerato</strong>',
	'LOG_CBP_SETTINGS_RESET'		=> '<strong>Codebox Plus: ripristinate le impostazioni predefinite</strong>',
	'LOG_CBP_OLD_BBCODE_REMOVED'	=> '<strong>Codebox Plus: rimosso il vecchio BBCode [Codebox=]</strong>',
	'CBP_REQUIREMENTS'			=> 'Codebox Plus richiede phpBB %1$s o successivo e PHP %2$s o successivo.',
	'CBP_OLD_EXT_ENABLED'			=> 'L’estensione originale “Codebox Plus” (o0johntam0o/codeboxplus) è attiva: disattivala prima di attivare questa versione. I messaggi già scritti vengono mantenuti e funzioneranno con la nuova versione.',
));
