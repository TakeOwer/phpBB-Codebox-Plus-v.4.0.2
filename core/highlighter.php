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

use salvocortesiano\codeboxplus\includes\geshi\geshi;

/**
 * Syntax highlighter (GeSHi wrapper with cache)
 */
class highlighter
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\cache\driver\driver_interface */
	protected $cache;

	/** @var catalog */
	protected $catalog;

	/** @var array Per-request memory cache */
	protected $memory = array();

	/** @var string Last error (used by the check-up) */
	protected $last_error = '';

	/**
	 * @param \phpbb\config\config                 $config
	 * @param \phpbb\cache\driver\driver_interface $cache
	 * @param catalog                              $catalog
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\cache\driver\driver_interface $cache, catalog $catalog)
	{
		$this->config = $config;
		$this->cache = $cache;
		$this->catalog = $catalog;
	}

	/**
	 * Highlight a code block
	 *
	 * @param string $code     Plain (normalised) code
	 * @param string $lang     Catalogue identifier
	 * @param bool   $use_cache
	 * @return array List of HTML lines (already escaped)
	 */
	public function highlight($code, $lang, $use_cache = true)
	{
		$this->last_error = '';
		$lang = $this->catalog->resolve($lang);
		$max_bytes = max(1, (int) $this->config['cbp_max_highlight_kb']) * 1024;

		if (!$this->config['cbp_highlight'] || $lang === 'text' || strlen($code) > $max_bytes)
		{
			return $this->plain($code);
		}

		$key = hash('sha256', $lang . "\0" . $code);

		if (isset($this->memory[$key]))
		{
			return $this->memory[$key];
		}

		$ttl = (int) $this->config['cbp_cache_ttl'];
		$cache_key = '_cbp_hl_' . (int) $this->config['cbp_cache_gen'] . '_' . $key;

		if ($use_cache && $ttl > 0)
		{
			$cached = $this->cache->get($cache_key);

			if (is_array($cached))
			{
				return $this->memory[$key] = $cached;
			}
		}

		$lines = $this->geshi($code, $this->catalog->get_geshi($lang));

		if ($lines === false)
		{
			$lines = $this->plain($code);
		}
		else if ($use_cache && $ttl > 0)
		{
			$this->cache->put($cache_key, $lines, $ttl);
		}

		return $this->memory[$key] = $lines;
	}

	/**
	 * Plain (not highlighted) lines
	 *
	 * @param string $code
	 * @return array
	 */
	public function plain($code)
	{
		$lines = array();

		foreach (explode("\n", (string) $code) as $line)
		{
			$lines[] = utf8_htmlspecialchars($line);
		}

		return $lines;
	}

	/**
	 * Run GeSHi
	 *
	 * @param string $code
	 * @param string $geshi_lang
	 * @return array|false
	 */
	protected function geshi($code, $geshi_lang)
	{
		try
		{
			$geshi = new geshi($code, $geshi_lang);
			$geshi->set_encoding('UTF-8');
			$geshi->set_header_type(GESHI_HEADER_PRE_VALID);
			$geshi->enable_classes(true);
			$geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
			$geshi->enable_keyword_links(false);
			$geshi->set_tab_width((int) $this->config['cbp_tab_size'] ?: 4);

			$html = $geshi->parse_code();

			if ($geshi->error())
			{
				$this->last_error = strip_tags((string) $geshi->error());
				return false;
			}
		}
		catch (\Throwable $e)
		{
			$this->last_error = $e->getMessage();
			return false;
		}

		if (!preg_match_all('#<li class="li\d"><pre class="de\d">(.*?)</pre></li>#s', $html, $matches))
		{
			$this->last_error = 'GeSHi output not recognised';
			return false;
		}

		$lines = array();

		foreach ($matches[1] as $line)
		{
			$lines[] = ($line === '&nbsp;') ? '' : $line;
		}

		// GeSHi must produce exactly one entry for each line of code
		if (count($lines) !== substr_count($code, "\n") + 1)
		{
			$this->last_error = 'GeSHi line count mismatch';
			return false;
		}

		return $lines;
	}

	/**
	 * Last error raised while highlighting
	 *
	 * @return string
	 */
	public function get_last_error()
	{
		return $this->last_error;
	}

	/**
	 * Invalidate every highlighted block stored in the cache
	 *
	 * @return void
	 */
	public function purge()
	{
		$this->memory = array();
		$this->config->increment('cbp_cache_gen', 1);
	}

	/**
	 * GeSHi version string
	 *
	 * @return string
	 */
	public function get_geshi_version()
	{
		if (!defined('GESHI_VERSION'))
		{
			class_exists('\salvocortesiano\codeboxplus\includes\geshi\geshi');
		}

		return defined('GESHI_VERSION') ? GESHI_VERSION : '';
	}
}
