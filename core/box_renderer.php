<?php
/**
 *
 * Codebox Plus. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2014 o0johntam0o (Huynh Buu Tam) - original author
 * @copyright (c) 2026 Salvo Cortesiano - phpBB 3.3 rewrite
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 *
 */

namespace salvocortesiano\codeboxplus\core;

/**
 * Turns the raw markup produced by the [codebox] BBCode into the final,
 * highlighted, responsive code box with its toolbar.
 */
class box_renderer
{
	/** Pattern of the raw markup produced by the BBCode template */
	const RAW_PATTERN = '#<div class="cbp-raw" data-cbp-lang="([^"]*)" data-cbp-file="([^"]*)"><pre class="cbp-raw-pre"><code>(.*?)</code></pre><span class="cbp-raw-end"></span></div>#s';

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\user */
	protected $user;

	/** @var catalog */
	protected $catalog;

	/** @var highlighter */
	protected $highlighter;

	/** @var code_helper */
	protected $code_helper;

	/** @var access */
	protected $access;

	/** @var string */
	protected $php_ext;

	/** @var array SVG icons */
	protected static $icons = array(
		'copy'		=> '<path d="M8 4v12h12V4H8zm10 10h-8V6h8v8zM4 8v12h12v-2H6V8H4z"/>',
		'select'	=> '<path d="M3 5h2V3a2 2 0 0 0-2 2zm0 8h2v-2H3v2zm4 8h2v-2H7v2zM3 9h2V7H3v2zm10-6h-2v2h2V3zm6 0v2h2a2 2 0 0 0-2-2zM5 21v-2H3a2 2 0 0 0 2 2zm-2-4h2v-2H3v2zM9 3H7v2h2V3zm2 18h2v-2h-2v2zm8-8h2v-2h-2v2zm0 8a2 2 0 0 0 2-2h-2v2zm0-12h2V7h-2v2zm0 8h2v-2h-2v2zm-4 4h2v-2h-2v2zm0-16h2V3h-2v2zM7 17h10V7H7v10zm2-8h6v6H9V9z"/>',
		'wrap'		=> '<path d="M4 19h6v-2H4v2zM20 5H4v2h16V5zm-3 6H4v2h13.25c1.1 0 2 .9 2 2s-.9 2-2 2H15v-2l-3 3 3 3v-2h2a4 4 0 0 0 0-8z"/>',
		'lines'		=> '<path d="M2 17h2v.5H3v1h1v.5H2v1h3v-4H2v1zm1-9h1V4H2v1h1v3zm-1 3h1.8L2 13.1v.9h3v-1H3.2L5 10.9V10H2v1zm5-6v2h14V5H7zm0 14h14v-2H7v2zm0-6h14v-2H7v2z"/>',
		'expand'	=> '<path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/>',
		'download'	=> '<path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/>',
	);

	/**
	 * @param \phpbb\config\config     $config
	 * @param \phpbb\language\language $language
	 * @param \phpbb\user              $user
	 * @param catalog                  $catalog
	 * @param highlighter              $highlighter
	 * @param code_helper              $code_helper
	 * @param access                   $access
	 * @param string                   $php_ext
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\language\language $language, \phpbb\user $user, catalog $catalog, highlighter $highlighter, code_helper $code_helper, access $access, $php_ext)
	{
		$this->config = $config;
		$this->language = $language;
		$this->user = $user;
		$this->catalog = $catalog;
		$this->highlighter = $highlighter;
		$this->code_helper = $code_helper;
		$this->access = $access;
		$this->php_ext = $php_ext;
	}

	/**
	 * Does the HTML contain raw code boxes?
	 *
	 * @param string $html
	 * @return bool
	 */
	public function has_boxes($html)
	{
		return strpos((string) $html, 'class="cbp-raw"') !== false;
	}

	/**
	 * Replace every raw code box in a rendered text
	 *
	 * @param string $html
	 * @return string
	 */
	public function process($html)
	{
		if (!$this->has_boxes($html))
		{
			return $html;
		}

		$this->language->add_lang(array('common', 'syntax'), 'salvocortesiano/codeboxplus');

		$part = 0;

		return preg_replace_callback(self::RAW_PATTERN, function ($m) use (&$part) {
			$part++;

			return $this->build_box(
				html_entity_decode($m[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
				html_entity_decode($m[2], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
				$this->code_helper->html_to_text($m[3]),
				$part
			);
		}, $html);
	}

	/**
	 * Build the final code box
	 *
	 * @param string $lang Identifier written by the author
	 * @param string $file File name written by the author
	 * @param string $code Plain code
	 * @param int    $part Position of the box inside the text
	 * @param bool   $force_credits Always add the credits (ACP preview)
	 * @return string
	 */
	public function build_box($lang, $file, $code, $part = 1, $force_credits = false)
	{
		$id = $this->catalog->resolve($lang);
		$lines = $this->highlighter->highlight($code, $id);
		$count = count($lines);
		$name = $this->language->lang($this->catalog->get_lang_key($id));
		$file = trim($file);
		$download_name = $this->code_helper->safe_filename($file, $this->language->lang('CBP_DEFAULT_FILENAME'), $this->catalog->get_extension($id));

		$theme = preg_replace('/[^a-z]/', '', (string) $this->config['cbp_theme']) ?: 'auto';

		$classes = array('cbp', 'cbp-theme-' . $theme);
		if (!$this->config['cbp_line_numbers'])
		{
			$classes[] = 'cbp-nolines';
		}
		if ($this->config['cbp_wrap'])
		{
			$classes[] = 'cbp-wrap';
		}
		if (!$this->config['cbp_expanded'])
		{
			$classes[] = 'cbp-collapsible';
		}

		$max_height = max(120, (int) $this->config['cbp_max_height']);
		$tab_size = max(1, min(8, (int) $this->config['cbp_tab_size']));

		$e = function ($s) {
			return utf8_htmlspecialchars((string) $s);
		};

		$access = $this->access->check();
		$login_attr = '';
		if ($access === access::LOGIN)
		{
			$login_attr = ' data-cbp-login="' . $e(generate_board_url() . '/ucp.' . $this->php_ext . '?mode=login') . '"';
		}

		$html = '<div class="' . implode(' ', $classes) . '" data-cbp-lang="' . $e($id) . '" data-cbp-file="' . $e($download_name) . '" data-cbp-part="' . (int) $part . '" data-cbp-hash="' . $this->code_helper->fingerprint($code) . '" data-cbp-dl=""' . $login_attr . ' style="--cbp-max:' . $max_height . 'px;--cbp-tab:' . $tab_size . ';--cbp-gutter:calc(' . max(2, strlen((string) $count)) . 'ch + 22px)">';

		// Header
		$html .= '<div class="cbp-head">';
		$html .= '<span class="cbp-dots" aria-hidden="true"><i></i><i></i><i></i></span>';
		$html .= '<span class="cbp-title"><span class="cbp-badge">' . $e($name) . '</span>';
		if ($file !== '')
		{
			$html .= '<span class="cbp-file" title="' . $e($file) . '">' . $e($file) . '</span>';
		}
		$html .= '<span class="cbp-count">' . $e($this->language->lang('CBP_LINES', $count)) . '</span></span>';

		$html .= '<span class="cbp-tools" role="toolbar" aria-label="' . $e($this->language->lang('CBP_TOOLBAR')) . '">';

		// "Show the whole code" (displayed by the JavaScript only when the code overflows)
		if (!$this->config['cbp_expanded'])
		{
			$more = $e($this->language->lang('CBP_SHOW_ALL', $count));
			$html .= '<button type="button" class="cbp-btn cbp-btn-more" data-cbp-act="toggle" title="' . $more . '" aria-label="' . $more . '" aria-expanded="false" hidden="hidden">'
				. '<i class="icon fa fa-angle-double-down fa-fw" aria-hidden="true"></i>'
				. '<span class="cbp-btn-txt">' . $more . '</span></button>';
		}

		$html .= $this->button('copy', 'CBP_COPY', true);
		$html .= $this->button('select', 'CBP_SELECT_ALL');
		$html .= $this->button('wrap', 'CBP_WRAP');
		$html .= $this->button('lines', 'CBP_LINE_NUMBERS');
		$html .= $this->button('expand', 'CBP_FULLSCREEN');

		if ($access !== access::DENIED)
		{
			$html .= $this->button('download', 'CBP_DOWNLOAD', true);
		}

		$html .= '</span></div>';

		// Body
		$html .= '<div class="cbp-body" tabindex="0" aria-label="' . $e($this->language->lang('CBP_CODE_OF', $name)) . '"><pre class="cbp-pre"><code class="cbp-code">';
		foreach ($lines as $line)
		{
			$html .= '<span class="cbp-l">' . $line . '</span>';
		}
		$html .= '</code></pre></div>';

		// Credits
		if ($this->config['cbp_show_credits'] || $force_credits)
		{
			$html .= $this->credits();
		}

		$html .= '</div>';

		return $html;
	}

	/**
	 * Toolbar button
	 *
	 * @param string $action
	 * @param string $lang_key
	 * @param bool   $with_label Show the text label on wide screens
	 * @return string
	 */
	protected function button($action, $lang_key, $with_label = false)
	{
		$label = utf8_htmlspecialchars($this->language->lang($lang_key));

		return '<button type="button" class="cbp-btn cbp-btn-' . $action . '" data-cbp-act="' . $action . '" title="' . $label . '" aria-label="' . $label . '">'
			. '<svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true" focusable="false">' . self::$icons[$action] . '</svg>'
			. ($with_label ? '<span class="cbp-btn-txt">' . $label . '</span>' : '')
			. '</button>';
	}

	/**
	 * Credits shown at the bottom of every code box
	 *
	 * The addresses come from the language files (CBP_CREDITS_*_URL); the
	 * repository address can also be set in the ACP.
	 *
	 * @return string
	 */
	protected function credits()
	{
		$e = function ($s) {
			return utf8_htmlspecialchars((string) $s);
		};

		$link = function ($url, $text, $icon) use ($e) {
			return '<a href="' . $e($url) . '" target="_blank" rel="noopener">'
				. '<i class="icon fa ' . $icon . ' fa-fw" aria-hidden="true"></i>' . $e($text) . '</a>';
		};

		$repo_url = trim((string) $this->config['cbp_repo_url']);
		if ($repo_url === '')
		{
			$repo_url = $this->language->lang('CBP_CREDITS_REPO_URL');
		}

		return '<div class="cbp-foot">'
			. '<span class="cbp-foot-item">' . $this->language->lang('CBP_CREDITS_ORIGINAL', $link($this->language->lang('CBP_CREDITS_ORIGINAL_URL'), $this->language->lang('CBP_CREDITS_ORIGINAL_NAME'), 'fa-github')) . '</span>'
			. '<span class="cbp-foot-item">' . $this->language->lang('CBP_CREDITS_AUTHOR', $link($this->language->lang('CBP_CREDITS_AUTHOR_URL'), $this->language->lang('CBP_CREDITS_AUTHOR_NAME'), 'fa-globe')) . '</span>'
			. '<span class="cbp-foot-item">' . $link($repo_url, $this->language->lang('CBP_CREDITS_REPO'), 'fa-github') . '</span>'
			. '</div>';
	}
}
