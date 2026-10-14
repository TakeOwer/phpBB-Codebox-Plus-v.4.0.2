<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * Front-end language file [Spanish]
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
	'CBP_DEFAULT_FILENAME'			=> 'codigo',
	'CBP_LINES'						=> array(
		1 => '%d línea',
		2 => '%d líneas',
	),
	'CBP_TOOLBAR'					=> 'Herramientas del código',
	'CBP_COPY'						=> 'Copiar',
	'CBP_COPIED'						=> '¡Copiado!',
	'CBP_COPY_FAILED'				=> 'No se pudo copiar',
	'CBP_SELECT_ALL'					=> 'Seleccionar todo',
	'CBP_WRAP'						=> 'Ajuste de línea',
	'CBP_LINE_NUMBERS'				=> 'Mostrar/ocultar números de línea',
	'CBP_FULLSCREEN'					=> 'Pantalla completa',
	'CBP_EXIT_FULLSCREEN'			=> 'Salir de pantalla completa (Esc)',
	'CBP_DOWNLOAD'					=> 'Descargar',
	'CBP_CODE_OF'					=> 'Código %s',
	'CBP_SHOW_ALL'					=> array(
		1 => 'Mostrar todo el código (%d línea)',
		2 => 'Mostrar todo el código (%d líneas)',
	),
	'CBP_SHOW_LESS'					=> 'Mostrar menos',
	'CBP_PICKER_TITLE'				=> 'Insertar un cuadro de código',
	'CBP_CLOSE'						=> 'Cerrar',
	'CBP_PICKER_SEARCH'				=> 'Buscar un lenguaje',
	'CBP_PICKER_SEARCH_PLACEHOLDER'	=> 'p. ej. php, python, sql, js...',
	'CBP_PICKER_FAVORITES'			=> 'Más usados',
	'CBP_PICKER_ALL'					=> 'Todos los lenguajes',
	'CBP_PICKER_NO_RESULTS'			=> 'No se encontró ningún lenguaje',
	'CBP_PICKER_FILE'				=> 'Nombre del archivo (opcional, usado para la descarga)',
	'CBP_PICKER_FILE_PLACEHOLDER'	=> 'p. ej. index.php',
	'CBP_PICKER_INSERT'				=> 'Insertar',
	'CBP_EDITOR_BUTTON_TITLE'		=> 'Insertar código con resaltado de sintaxis (Codebox Plus)',
	'CBP_EDITOR_BUTTON_SHORT'		=> 'Código',
	'CBP_DOWNLOAD_TITLE'				=> 'Descarga del código',
	'CBP_FROM_POST'					=> 'Del mensaje',
	'CBP_CONFIRM'					=> 'Se requiere confirmación',
	'CBP_CONFIRM_EXPLAIN'			=> 'Para proteger el foro de las descargas automáticas, completa la verificación siguiente.',
	'CBP_CONFIRM_SOLVED'				=> 'Verificación completada: la descarga empieza automáticamente. Si no empieza, usa el botón de abajo.',
	'CBP_DOWNLOAD_NOW'				=> 'Descargar ahora',
	'CBP_BACK_TO_POST'				=> 'Volver al mensaje',
	'CBP_ATTEMPTS_LEFT'				=> array(
		1 => 'Te queda %d intento.',
		2 => 'Te quedan %d intentos.',
	),
	'CBP_ERR_DOWNLOAD_DISABLED'		=> 'El administrador ha desactivado la descarga del código.',
	'CBP_ERR_BOTS'					=> 'Los buscadores y los bots no pueden descargar el código.',
	'CBP_ERR_LOGIN_REQUIRED'			=> 'Debes iniciar sesión para descargar el código.',
	'CBP_ERR_POST_NOT_FOUND'			=> 'El mensaje solicitado no existe o no está disponible.',
	'CBP_ERR_NO_PERMISSION'			=> 'No tienes los permisos necesarios para descargar este código.',
	'CBP_ERR_CODE_NOT_FOUND'			=> 'No se encontró el código solicitado en el mensaje. Puede que haya sido editado mientras tanto: recarga el tema e inténtalo de nuevo.',
	'CBP_ERR_FILE_EMPTY'				=> 'Este cuadro de código está vacío.',
	'CBP_ERR_CONFIRM'				=> 'Has superado el número máximo de intentos de confirmación para esta sesión. Inténtalo más tarde.',
	'CBP_ERR_GROUP'					=> 'Tu grupo de usuarios no tiene permiso para descargar el código.',
	'CBP_CREDITS_ORIGINAL'			=> 'Codebox Plus original &copy; 2014 %s',
	'CBP_CREDITS_AUTHOR'				=> 'Versión para phpBB 3.3 &copy; 2026 %s',
	'CBP_CREDITS_REPO'				=> 'Repositorio en GitHub',

	// Credits at the bottom of the code boxes: names and addresses (you can change them)
	// Crediti in fondo ai riquadri: nomi e indirizzi (puoi modificarli)
	'CBP_CREDITS_ORIGINAL_NAME'		=> 'o0johntam0o (Huynh Buu Tam)',
	'CBP_CREDITS_ORIGINAL_URL'		=> 'https://github.com/o0johntam0o/phpBB-Extension-Codebox-Plus',
	'CBP_CREDITS_AUTHOR_NAME'		=> 'Salvo Cortesiano',
	'CBP_CREDITS_AUTHOR_URL'			=> 'https://www.netshadows.de/ombra/',
	'CBP_CREDITS_REPO_URL'			=> 'https://github.com/TakeOwer/phpBB-Codebox-Plus-v.4.0.2',
));
