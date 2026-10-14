<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 * ACP language file [Spanish]
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
	'ACP_CBP_EXPLAIN'					=> 'Cuadros de código adaptables con resaltado de sintaxis para más de 250 lenguajes, copia, selección, ajuste de línea, números de línea, pantalla completa y descarga protegida del código. Uso en los mensajes: <code>[codebox=php file=index.php]...[/codebox]</code>.',
	'CBP_BADGE_EXT'					=> 'Extensión',
	'CBP_BADGE_LANGUAGES'				=> 'Lenguajes',
	'CBP_BADGE_DOWNLOADS'				=> 'Descargas',
	'CBP_BADGE_LICENSE'				=> 'Licencia',
	'CBP_LEGEND_DISPLAY'				=> 'Visualización',
	'CBP_HIGHLIGHT'					=> 'Resaltado de sintaxis',
	'CBP_HIGHLIGHT_EXPLAIN'			=> 'Colorea el código según el lenguaje elegido (GeSHi). Si se desactiva, el código se muestra como texto plano.',
	'CBP_THEME'						=> 'Tema de colores',
	'CBP_THEME_EXPLAIN'				=> '«Automático» sigue el estilo del foro: cuadros claros con estilos claros y oscuros con estilos oscuros (también cuando el estilo tiene un interruptor claro/oscuro). Sin JavaScript sigue la configuración del dispositivo.',
	'CBP_THEME_AUTO'					=> 'Automático (sigue el estilo del foro)',
	'CBP_THEME_LIGHT'					=> 'Claro',
	'CBP_THEME_DARK'					=> 'Oscuro',
	'CBP_THEME_MONOKAI'				=> 'Monokai',
	'CBP_THEME_DRACULA'				=> 'Dracula',
	'CBP_THEME_NORD'					=> 'Nord',
	'CBP_LINE_NUMBERS_OPT'				=> 'Números de línea',
	'CBP_LINE_NUMBERS_OPT_EXPLAIN'		=> 'Mostrar los números de línea por defecto (los usuarios pueden ocultarlos). Los números de línea nunca se copian con el código.',
	'CBP_WRAP_OPT'						=> 'Ajuste de línea',
	'CBP_WRAP_OPT_EXPLAIN'				=> 'Ajustar las líneas largas por defecto en lugar de desplazarse horizontalmente (los usuarios pueden cambiarlo).',
	'CBP_EXPANDED'						=> 'Siempre expandido',
	'CBP_EXPANDED_EXPLAIN'				=> 'Mostrar todo el código. Si se desactiva, el código largo se limita a la altura máxima indicada abajo y aparece la barra «Mostrar todo el código».',
	'CBP_MAX_HEIGHT'					=> 'Altura máxima',
	'CBP_MAX_HEIGHT_EXPLAIN'			=> 'Altura de un cuadro de código contraído (120 - 3000).',
	'CBP_PIXEL'						=> 'píxeles',
	'CBP_TAB_SIZE'						=> 'Ancho de tabulación',
	'CBP_TAB_SIZE_EXPLAIN'				=> 'Número de espacios usados para mostrar un tabulador (1 - 8).',
	'CBP_EDITOR_BUTTON'				=> 'Botón en el editor',
	'CBP_EDITOR_BUTTON_EXPLAIN'		=> 'Añade al editor de mensajes, a la respuesta rápida y a los mensajes privados un botón que abre el selector de lenguaje.',
	'CBP_FAVORITES'					=> 'Lenguajes más usados',
	'CBP_FAVORITES_EXPLAIN'			=> 'Identificadores de los lenguajes mostrados arriba en el selector, separados por comas (p. ej. <code>php,javascript,python</code>).',
	'CBP_LEGEND_DOWNLOAD'				=> 'Descarga',
	'CBP_ENABLE_DOWNLOAD'				=> 'Activar la descarga',
	'CBP_ENABLE_DOWNLOAD_EXPLAIN'		=> 'Muestra el botón «Descargar» que guarda el código como archivo. En los temas el foro entrega el archivo tras comprobar los permisos; en las vistas previas y en los mensajes privados lo crea el navegador.',
	'CBP_LOGIN_REQUIRED'				=> 'Inicio de sesión obligatorio',
	'CBP_LOGIN_REQUIRED_EXPLAIN'		=> 'Se pide a los invitados que inicien sesión antes de descargar.',
	'CBP_PREVENT_BOTS'					=> 'Bloquear bots',
	'CBP_PREVENT_BOTS_EXPLAIN'			=> 'Los buscadores y los bots no pueden descargar el código ni ven el botón.',
	'CBP_REQUIRE_FDOWNLOAD'			=> 'Requerir el permiso «Puede descargar archivos»',
	'CBP_REQUIRE_FDOWNLOAD_EXPLAIN'	=> 'Además del permiso para leer el foro, el usuario debe tener el permiso del foro para descargar adjuntos.',
	'CBP_CAPTCHA'						=> 'Confirmación anti-spambot',
	'CBP_CAPTCHA_EXPLAIN'				=> 'Pedir el CAPTCHA configurado en «Medidas contra spambots» antes de descargar. Una vez resuelto es válido durante 30 minutos.',
	'CBP_CAPTCHA_GUESTS_ONLY'			=> 'Confirmación solo para invitados',
	'CBP_CAPTCHA_GUESTS_ONLY_EXPLAIN'	=> 'Los usuarios registrados descargan sin confirmación.',
	'CBP_MAX_ATTEMPTS'					=> 'Intentos máximos',
	'CBP_MAX_ATTEMPTS_EXPLAIN'			=> 'Número de confirmaciones erróneas permitidas en una sesión antes de bloquear la descarga (1 - 50).',
	'CBP_LEGEND_PERFORMANCE'			=> 'Rendimiento',
	'CBP_MAX_HIGHLIGHT_KB'				=> 'Límite del resaltado',
	'CBP_MAX_HIGHLIGHT_KB_EXPLAIN'		=> 'El código más grande que este tamaño se muestra sin colores para ahorrar recursos (8 - 4096).',
	'CBP_CACHE_TTL'					=> 'Caché del resaltado',
	'CBP_CACHE_TTL_EXPLAIN'			=> 'Cuánto tiempo se guarda en caché el código resaltado. 0 desactiva la caché (0 - 2592000; 86400 = un día).',
	'CBP_SECONDS'						=> 'segundos',
	'CBP_PREVIEW'						=> 'Vista previa en vivo',
	'CBP_PREVIEW_EXPLAIN'				=> 'Tema, números de línea, ajuste, altura y tabulación se actualizan mientras los cambias. Guarda para aplicarlos al foro.',
	'CBP_USAGE'						=> 'Cómo se usa',
	'CBP_USAGE_EXPLAIN'				=> 'Usa el botón «Código» del editor o escribe el BBCode a mano. El lenguaje y el nombre del archivo son opcionales.',
	'CBP_MAINTENANCE'					=> 'Mantenimiento',
	'CBP_PURGE_CACHE'					=> 'Vaciar la caché del resaltado',
	'CBP_PURGE_CACHE_EXPLAIN'			=> 'El código resaltado se genera de nuevo en la siguiente visualización.',
	'CBP_RESET_COUNTER'				=> 'Reiniciar el contador de descargas',
	'CBP_RESET_COUNTER_EXPLAIN'		=> array(
		1 => 'Actualmente %d descarga.',
		2 => 'Actualmente %d descargas.',
	),
	'CBP_RESET_SETTINGS'				=> 'Restaurar la configuración predeterminada',
	'CBP_RESET_SETTINGS_EXPLAIN'		=> 'Todas las opciones de esta página vuelven a su valor predeterminado.',
	'CBP_SETTINGS_SAVED'				=> 'La configuración de Codebox Plus se ha guardado.',
	'CBP_ERR_RANGE'					=> '«%1$s» debe estar entre %2$d y %3$d.',
	'CBP_ERR_FAVORITES'				=> 'Lenguajes desconocidos en la lista de los más usados: %s',
	'CBP_ERR_NO_CAPTCHA'				=> 'No hay ningún plugin CAPTCHA configurado: elige uno primero en «Medidas contra spambots».',
	'CBP_CONFIRM_PURGE'				=> '¿Seguro que quieres vaciar la caché del resaltado?',
	'CBP_CONFIRM_RESET_COUNTER'		=> '¿Seguro que quieres reiniciar el contador de descargas?',
	'CBP_CONFIRM_RESET_SETTINGS'		=> '¿Seguro que quieres restaurar la configuración predeterminada de Codebox Plus?',
	'CBP_CONFIRM_REMOVE_OLD_BBCODE'	=> '¿Seguro que quieres eliminar el antiguo BBCode [Codebox=] de la tabla de BBCodes? Los mensajes existentes no se modifican.',
	'CBP_CACHE_PURGED'					=> 'La caché del resaltado se ha vaciado.',
	'CBP_COUNTER_RESET'				=> 'El contador de descargas se ha reiniciado.',
	'CBP_SETTINGS_RESET'				=> 'Se ha restaurado la configuración predeterminada.',
	'CBP_OLD_BBCODE_REMOVED'			=> 'Se ha eliminado el antiguo BBCode.',
	'CBP_CHECKUP_ALL_OK'				=> 'Todo funciona correctamente',
	'CBP_CHECKUP_HAS_ERRORS'			=> 'Hay problemas que requieren tu atención',
	'CBP_CHECKUP_HAS_WARNINGS'			=> 'Funciona, con algunos avisos',
	'CBP_CHECKUP_OK'					=> array(
		1 => '%d superado',
		2 => '%d superados',
	),
	'CBP_CHECKUP_WARNINGS'				=> array(
		1 => '%d aviso',
		2 => '%d avisos',
	),
	'CBP_CHECKUP_ERRORS'				=> array(
		1 => '%d error',
		2 => '%d errores',
	),
	'CBP_CHECKUP_INFOS'				=> array(
		1 => '%d información',
		2 => '%d informaciones',
	),
	'CBP_CHECKUP_RUN_AT'				=> 'Ejecutado el %s',
	'CBP_CHECKUP_RERUN'				=> 'Ejecutar de nuevo',
	'CBP_CHECKUP_STATUS'				=> 'Estado',
	'CBP_CHECKUP_TEST'					=> 'Prueba',
	'CBP_CHECKUP_RESULT'				=> 'Resultado',
	'CBP_STATUS_OK'					=> 'OK',
	'CBP_STATUS_WARNING'				=> 'Aviso',
	'CBP_STATUS_ERROR'					=> 'Error',
	'CBP_STATUS_INFO'					=> 'Info',
	'CBP_CHK_PHP'						=> 'Versión de PHP',
	'CBP_CHK_PHP_DETAIL'				=> 'PHP %s (se requiere 7.2 o posterior).',
	'CBP_CHK_PHPBB'					=> 'Versión de phpBB',
	'CBP_CHK_PHPBB_DETAIL'				=> 'phpBB %s (se requiere 3.3.0 o posterior).',
	'CBP_CHK_PHP_EXT'					=> 'Módulos de PHP',
	'CBP_CHK_PHP_EXT_OK'				=> 'dom, libxml y mbstring están disponibles.',
	'CBP_CHK_PHP_EXT_MISSING'			=> 'Módulos de PHP que faltan: %s',
	'CBP_CHK_GESHI'					=> 'Motor de resaltado GeSHi',
	'CBP_CHK_GESHI_OK'					=> 'GeSHi %1$s con los %2$d archivos de lenguaje.',
	'CBP_CHK_GESHI_MISSING'			=> 'Faltan archivos de lenguaje: %s. Sube de nuevo la extensión.',
	'CBP_CHK_HIGHLIGHT'				=> 'Prueba de resaltado',
	'CBP_CHK_HIGHLIGHT_OFF'			=> 'El resaltado de sintaxis está desactivado en la configuración.',
	'CBP_CHK_HIGHLIGHT_OK'				=> 'Un código PHP de ejemplo de %d líneas se ha resaltado correctamente.',
	'CBP_CHK_HIGHLIGHT_FAIL'			=> 'Fallo del resaltado: %s',
	'CBP_CHK_PARSER'					=> 'BBCode [codebox]',
	'CBP_CHK_PARSER_OK'				=> 'El BBCode está registrado y el formateador de texto lo reconoce.',
	'CBP_CHK_PARSER_FAIL'				=> 'El BBCode no se reconoce: vacía la caché del foro (General → Vaciar la caché) y vuelve a intentarlo.',
	'CBP_CHK_RENDER'					=> 'Visualización del cuadro',
	'CBP_CHK_RENDER_OK'				=> 'El cuadro de código con barra de herramientas y números de línea se genera correctamente.',
	'CBP_CHK_RENDER_FAIL'				=> 'El cuadro de código no se genera: vacía la caché del foro y comprueba que ninguna otra extensión use el mismo BBCode.',
	'CBP_CHK_ROUNDTRIP'				=> 'Enlaces de descarga',
	'CBP_CHK_ROUNDTRIP_OK'				=> 'La huella del código mostrado coincide con el código guardado: la descarga funciona y el código oculto no se puede descargar.',
	'CBP_CHK_ROUNDTRIP_FAIL'			=> 'La huella del código mostrado no coincide con el código guardado: las descargas desde los temas fallarían.',
	'CBP_CHK_ROUTE'					=> 'Página de descarga',
	'CBP_CHK_ROUTE_OK'					=> 'La dirección de descarga se genera correctamente.',
	'CBP_CHK_ROUTE_OFF'				=> 'La descarga está desactivada en la configuración.',
	'CBP_CHK_ROUTE_FAIL'				=> 'No se puede generar la dirección de descarga: %s',
	'CBP_CHK_OLD_BBCODE'				=> 'Antiguo BBCode [Codebox=]',
	'CBP_CHK_OLD_BBCODE_OK'			=> 'No hay ningún BBCode en conflicto en la tabla de BBCodes.',
	'CBP_CHK_OLD_BBCODE_FOUND'			=> 'La tabla de BBCodes todavía contiene el BBCode [Codebox=] de la extensión original. Se ignora, pero es mejor eliminarlo.',
	'CBP_FIX_REMOVE_OLD_BBCODE'		=> 'Eliminar ahora',
	'CBP_CHK_OLD_EXT'					=> 'Extensión original',
	'CBP_CHK_OLD_EXT_OK'				=> 'La extensión original o0johntam0o/codeboxplus no está instalada.',
	'CBP_CHK_OLD_EXT_ENABLED'			=> 'La extensión original o0johntam0o/codeboxplus está activada: desactívala en «Gestionar extensiones».',
	'CBP_CHK_OLD_EXT_FILES'			=> 'La carpeta ext/o0johntam0o/codeboxplus sigue en el servidor: después de desactivarla y borrar sus datos puedes eliminarla.',
	'CBP_CHK_CACHE'					=> 'Caché',
	'CBP_CHK_CACHE_OK'					=> 'La caché funciona (%s).',
	'CBP_CHK_CACHE_FAIL'				=> 'No se puede escribir en la caché: comprueba los permisos de la carpeta cache/.',
	'CBP_CACHE_ON'						=> 'caché del resaltado activa, %d segundos',
	'CBP_CACHE_OFF'					=> 'caché del resaltado desactivada',
	'CBP_CHK_CAPTCHA'					=> 'Confirmación anti-spambot',
	'CBP_CHK_CAPTCHA_OK'				=> 'Plugin CAPTCHA «%s» disponible.',
	'CBP_CHK_CAPTCHA_FAIL'				=> 'El plugin CAPTCHA «%s» no está disponible: revisa las «Medidas contra spambots».',
	'CBP_CHK_CAPTCHA_OFF'				=> 'No activada para la descarga.',
	'CBP_CHK_LANG'						=> 'Archivos de idioma',
	'CBP_CHK_LANG_OK'					=> 'Traducción completa para los idiomas instalados: %s.',
	'CBP_CHK_LANG_FALLBACK'			=> 'Idiomas sin traducción (se usa el inglés): %s.',
	'CBP_CHK_ASSETS'					=> 'Archivos del estilo',
	'CBP_CHK_ASSETS_OK'				=> 'CSS, JavaScript y plantillas están presentes (styles/all: válidos para prosilver, ForumUS y cualquier otro estilo).',
	'CBP_CHK_ASSETS_MISSING'			=> 'Archivos que faltan: %s',
	'CBP_CHK_POSTS'					=> 'Mensajes con código',
	'CBP_CHK_POSTS_DETAIL'				=> array(
		0 => 'Todavía ningún mensaje contiene cuadros de código.',
		1 => '%d mensaje contiene cuadros de código.',
		2 => '%d mensajes contienen cuadros de código.',
	),
	'CBP_CHK_LEGACY'					=> 'Mensajes en el formato antiguo',
	'CBP_CHK_LEGACY_OK'				=> 'Ningún mensaje guardado en el formato antiguo (phpBB 3.0/3.1).',
	'CBP_CHK_LEGACY_FOUND'				=> array(
		1 => '%d mensaje todavía está guardado en el formato antiguo: ejecuta <code>php bin/phpbbcli.php reparser:reparse post_text</code> para convertirlo.',
		2 => '%d mensajes todavía están guardados en el formato antiguo: ejecuta <code>php bin/phpbbcli.php reparser:reparse post_text</code> para convertirlos.',
	),
	'CBP_CREDITS'						=> 'Codebox Plus &middot; desarrollada por <a href="https://github.com/o0johntam0o" target="_blank" rel="noopener">Huynh Buu Tam (o0johntam0o)</a> &middot; reescrita y mejorada para phpBB 3.3 por <a href="https://www.netshadows.de/ombra/" target="_blank" rel="noopener">Salvo Cortesiano</a> &middot; motor de resaltado <a href="https://github.com/GeSHi/geshi-1.0" target="_blank" rel="noopener">GeSHi</a> de Nigel McNie &amp; Benny Baumann',
	'CBP_DOWNLOAD_GROUPS'				=> 'Grupos autorizados a descargar',
	'CBP_DOWNLOAD_GROUPS_EXPLAIN'		=> 'Solo los miembros de los grupos seleccionados pueden descargar el código (Ctrl/Cmd + clic para seleccionar varios). Si no seleccionas ningún grupo, todos pueden descargar. A los invitados no autorizados se les pide iniciar sesión.',
	'CBP_DOWNLOAD_GROUPS_ALL'			=> 'Ningún grupo seleccionado: todos los grupos pueden descargar.',
	'CBP_DOWNLOAD_GROUPS_SOME'			=> 'Solo los grupos seleccionados pueden descargar.',
	'CBP_DOWNLOAD_GROUPS_CLEAR'		=> 'Deseleccionar todos (todos los grupos)',
	'CBP_LEGEND_CREDITS'				=> 'Créditos',
	'CBP_SHOW_CREDITS'					=> 'Mostrar los créditos',
	'CBP_SHOW_CREDITS_EXPLAIN'			=> 'Muestra al pie de cada cuadro de código el copyright del autor original y de la versión para phpBB 3.3, con enlaces a los repositorios y al sitio web. Los nombres y direcciones están en los archivos de idioma (CBP_CREDITS_*).',
	'CBP_REPO_URL'						=> 'Dirección del repositorio GitHub',
	'CBP_REPO_URL_EXPLAIN'				=> 'Dirección de tu repositorio mostrada en los créditos. Déjala vacía para usar la de los archivos de idioma (CBP_CREDITS_REPO_URL).',
	'CBP_ERR_REPO_URL'					=> 'La dirección del repositorio debe ser una dirección http:// o https:// válida (máximo 255 caracteres).',
	'CBP_CHK_GROUPS'					=> 'Grupos autorizados a descargar',
	'CBP_CHK_GROUPS_ALL'				=> 'Todos los grupos pueden descargar.',
	'CBP_CHK_GROUPS_LIST'				=> 'Solo estos grupos pueden descargar: %s.',
	'CBP_WINDOW_BUTTONS'				=> 'Botones de ventana',
	'CBP_WINDOW_BUTTONS_EXPLAIN'		=> 'Los tres puntos de colores de la barra de título funcionan como los botones de una ventana: el rojo contrae el cuadro a la barra de título, el amarillo muestra todo el código / menos, el verde abre la pantalla completa. Elige «No» para ocultarlos.',
	'CBP_GROUP_AI_CRAWLERS'			=> 'Rastreadores de IA',
));
