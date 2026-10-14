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

namespace salvocortesiano\codeboxplus\controller;

/**
 * ACP controller: settings and check-up
 */
class acp_controller
{
	const EXT_NAME = 'salvocortesiano/codeboxplus';

	/** Available colour themes */
	const THEMES = array('auto', 'light', 'dark', 'monokai', 'dracula', 'nord');

	/** Sample used by the live preview and by the check-up */
	const SAMPLE_CODE = "<?php\n/**\n * Codebox Plus - anteprima\n */\nnamespace salvocortesiano\\codeboxplus;\n\nfunction greet(string \$name, int \$times = 2): array\n{\n\t\$out = [];\n\tfor (\$i = 0; \$i < \$times; \$i++)\n\t{\n\t\t\$out[] = sprintf('Ciao %s #%d', \$name, \$i + 1); // commento\n\t}\n\n\treturn \$out;\n}\n\necho implode(PHP_EOL, greet(\"Le Ombre della Rete\", 3));";

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\request\request_interface */
	protected $request;

	/** @var \phpbb\log\log_interface */
	protected $log;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\cache\driver\driver_interface */
	protected $cache;

	/** @var \phpbb\extension\manager */
	protected $ext_manager;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\captcha\factory */
	protected $captcha_factory;

	/** @var \phpbb\textformatter\parser_interface */
	protected $parser;

	/** @var \phpbb\textformatter\renderer_interface */
	protected $renderer;

	/** @var \salvocortesiano\codeboxplus\core\catalog */
	protected $catalog;

	/** @var \salvocortesiano\codeboxplus\core\highlighter */
	protected $highlighter;

	/** @var \salvocortesiano\codeboxplus\core\code_helper */
	protected $code_helper;

	/** @var \salvocortesiano\codeboxplus\core\box_renderer */
	protected $box_renderer;

	/** @var \salvocortesiano\codeboxplus\core\access */
	protected $access;

	/** @var \phpbb\group\helper */
	protected $group_helper;

	/** @var \salvocortesiano\codeboxplus\core\counter */
	protected $counter;

	/** @var string */
	protected $root_path;

	/** @var string */
	protected $php_ext;

	/** @var string */
	protected $table_prefix;

	/** @var string */
	protected $u_action;

	/**
	 * Constructor
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, \phpbb\language\language $language, \phpbb\user $user, \phpbb\request\request_interface $request, \phpbb\log\log_interface $log, \phpbb\db\driver\driver_interface $db, \phpbb\cache\driver\driver_interface $cache, \phpbb\extension\manager $ext_manager, \phpbb\controller\helper $helper, \phpbb\captcha\factory $captcha_factory, \phpbb\textformatter\parser_interface $parser, \phpbb\textformatter\renderer_interface $renderer, \salvocortesiano\codeboxplus\core\catalog $catalog, \salvocortesiano\codeboxplus\core\highlighter $highlighter, \salvocortesiano\codeboxplus\core\code_helper $code_helper, \salvocortesiano\codeboxplus\core\box_renderer $box_renderer, \salvocortesiano\codeboxplus\core\access $access, \phpbb\group\helper $group_helper, \salvocortesiano\codeboxplus\core\counter $counter, $root_path, $php_ext, $table_prefix)
	{
		$this->config = $config;
		$this->template = $template;
		$this->language = $language;
		$this->user = $user;
		$this->request = $request;
		$this->log = $log;
		$this->db = $db;
		$this->cache = $cache;
		$this->ext_manager = $ext_manager;
		$this->helper = $helper;
		$this->captcha_factory = $captcha_factory;
		$this->parser = $parser;
		$this->renderer = $renderer;
		$this->catalog = $catalog;
		$this->highlighter = $highlighter;
		$this->code_helper = $code_helper;
		$this->box_renderer = $box_renderer;
		$this->access = $access;
		$this->group_helper = $group_helper;
		$this->counter = $counter;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
		$this->table_prefix = $table_prefix;
	}

	/**
	 * @param string $u_action
	 */
	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}

	/**
	 * Common header data (badges, credits, assets)
	 *
	 * @param string $mode
	 */
	protected function assign_common($mode)
	{
		$this->language->add_lang(array('common', 'syntax', 'acp_codeboxplus'), self::EXT_NAME);

		$version = $this->config['cbp_version'];
		try
		{
			$meta = $this->ext_manager->create_extension_metadata_manager(self::EXT_NAME)->get_metadata('all');
			$version = isset($meta['version']) ? $meta['version'] : $version;
		}
		catch (\Exception $e)
		{
			// Keep the version stored in the configuration
		}

		$this->template->assign_vars(array(
			'CBP_MODE'				=> $mode,
			'CBP_EXT_VERSION'		=> $version,
			'CBP_PHP_VERSION'		=> PHP_VERSION,
			'CBP_PHPBB_VERSION'		=> $this->config['version'],
			'CBP_GESHI_VERSION'		=> $this->highlighter->get_geshi_version(),
			'CBP_LANG_COUNT'		=> $this->catalog->count(),
			'CBP_DOWNLOADS'			=> (int) $this->config['cbp_downloads'],
			'CBP_ASSETS_PATH'		=> $this->root_path . 'ext/' . self::EXT_NAME . '/styles/all/',
			'U_ACTION'				=> $this->u_action,
		));
	}

	/**
	 * Settings page
	 */
	public function display_settings()
	{
		$this->assign_common('settings');

		$action = $this->request->variable('action', '');
		if ($action !== '')
		{
			$this->run_action($action);
		}

		$errors = array();
		add_form_key('salvocortesiano_codeboxplus_acp');

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('salvocortesiano_codeboxplus_acp'))
			{
				$errors[] = $this->language->lang('FORM_INVALID');
			}

			$data = $this->get_posted_settings($errors);

			if (empty($errors))
			{
				foreach ($data as $name => $value)
				{
					$this->config->set($name, $value);
				}

				// Highlighted blocks depend on the settings
				$this->highlighter->purge();

				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_CBP_SETTINGS');
				trigger_error($this->language->lang('CBP_SETTINGS_SAVED') . adm_back_link($this->u_action));
			}
		}

		// Groups allowed to download
		$allowed = $this->access->get_allowed_groups();
		foreach ($this->get_groups() as $group_id => $group_name)
		{
			$this->template->assign_block_vars('cbp_groups', array(
				'ID'			=> $group_id,
				'NAME'			=> $group_name,
				'S_SELECTED'	=> in_array($group_id, $allowed, true),
			));
		}

		// Theme options
		foreach (self::THEMES as $theme)
		{
			$this->template->assign_block_vars('cbp_themes', array(
				'VALUE'		=> $theme,
				'NAME'		=> $this->language->lang('CBP_THEME_' . strtoupper($theme)),
				'S_SELECTED'	=> $this->config['cbp_theme'] === $theme,
			));
		}

		$favorites = array();
		foreach ($this->catalog->parse_list($this->config['cbp_favorites']) as $id)
		{
			$favorites[] = $this->language->lang($this->catalog->get_lang_key($id));
		}

		$this->template->assign_vars(array(
			'S_ERROR'					=> !empty($errors),
			'ERROR_MSG'					=> implode('<br />', $errors),

			'CBP_HIGHLIGHT'				=> (bool) $this->config['cbp_highlight'],
			'CBP_LINE_NUMBERS'			=> (bool) $this->config['cbp_line_numbers'],
			'CBP_WRAP'					=> (bool) $this->config['cbp_wrap'],
			'CBP_EXPANDED'				=> (bool) $this->config['cbp_expanded'],
			'CBP_MAX_HEIGHT'			=> (int) $this->config['cbp_max_height'],
			'CBP_TAB_SIZE'				=> (int) $this->config['cbp_tab_size'],
			'CBP_EDITOR_BUTTON'			=> (bool) $this->config['cbp_editor_button'],
			'CBP_FAVORITES'				=> $this->config['cbp_favorites'],
			'CBP_FAVORITES_NAMES'		=> implode(', ', $favorites),

			'CBP_DOWNLOAD'				=> (bool) $this->config['cbp_download'],
			'CBP_LOGIN_REQUIRED'		=> (bool) $this->config['cbp_login_required'],
			'CBP_PREVENT_BOTS'			=> (bool) $this->config['cbp_prevent_bots'],
			'CBP_REQUIRE_FDOWNLOAD'		=> (bool) $this->config['cbp_require_fdownload'],
			'CBP_CAPTCHA'				=> (bool) $this->config['cbp_captcha'],
			'CBP_CAPTCHA_GUESTS_ONLY'	=> (bool) $this->config['cbp_captcha_guests_only'],
			'CBP_MAX_ATTEMPTS'			=> (int) $this->config['cbp_max_attempts'],

			'CBP_MAX_HIGHLIGHT_KB'		=> (int) $this->config['cbp_max_highlight_kb'],
			'CBP_CACHE_TTL'				=> (int) $this->config['cbp_cache_ttl'],

			'CBP_SHOW_CREDITS'			=> (bool) $this->config['cbp_show_credits'],
			'CBP_WINDOW_BUTTONS'		=> (bool) $this->config['cbp_window_buttons'],
			'CBP_SHOW_DL_COUNT'			=> (bool) $this->config['cbp_show_dl_count'],
			'CBP_EDITOR_TOOLS'			=> (bool) $this->config['cbp_editor_tools'],
			'CBP_REPO_URL'				=> $this->config['cbp_repo_url'],
			'CBP_REPO_URL_DEFAULT'		=> $this->language->lang('CBP_CREDITS_REPO_URL'),
			'S_CBP_ALL_GROUPS'			=> empty($this->access->get_allowed_groups()),

			'CBP_PREVIEW'				=> $this->box_renderer->build_box('php', 'anteprima.php', self::SAMPLE_CODE, 1, true),

			'U_CBP_PURGE'				=> $this->u_action . '&amp;action=purge_cache',
			'U_CBP_RESET_COUNTER'		=> $this->u_action . '&amp;action=reset_counter',
			'U_CBP_RESET_SETTINGS'		=> $this->u_action . '&amp;action=reset_settings',
		));
	}

	/**
	 * Read and validate the submitted settings
	 *
	 * @param array $errors
	 * @return array
	 */
	protected function get_posted_settings(array &$errors)
	{
		$data = array(
			'cbp_highlight'				=> $this->request->variable('cbp_highlight', 0),
			'cbp_theme'					=> $this->request->variable('cbp_theme', 'auto'),
			'cbp_line_numbers'			=> $this->request->variable('cbp_line_numbers', 0),
			'cbp_wrap'					=> $this->request->variable('cbp_wrap', 0),
			'cbp_expanded'				=> $this->request->variable('cbp_expanded', 0),
			'cbp_max_height'			=> $this->request->variable('cbp_max_height', 420),
			'cbp_tab_size'				=> $this->request->variable('cbp_tab_size', 4),
			'cbp_editor_button'			=> $this->request->variable('cbp_editor_button', 0),
			'cbp_favorites'				=> $this->request->variable('cbp_favorites', ''),
			'cbp_download'				=> $this->request->variable('cbp_download', 0),
			'cbp_login_required'		=> $this->request->variable('cbp_login_required', 0),
			'cbp_prevent_bots'			=> $this->request->variable('cbp_prevent_bots', 0),
			'cbp_require_fdownload'		=> $this->request->variable('cbp_require_fdownload', 0),
			'cbp_captcha'				=> $this->request->variable('cbp_captcha', 0),
			'cbp_captcha_guests_only'	=> $this->request->variable('cbp_captcha_guests_only', 0),
			'cbp_max_attempts'			=> $this->request->variable('cbp_max_attempts', 3),
			'cbp_max_highlight_kb'		=> $this->request->variable('cbp_max_highlight_kb', 256),
			'cbp_cache_ttl'				=> $this->request->variable('cbp_cache_ttl', 86400),
			'cbp_show_credits'			=> $this->request->variable('cbp_show_credits', 0),
			'cbp_window_buttons'		=> $this->request->variable('cbp_window_buttons', 0),
			'cbp_show_dl_count'			=> $this->request->variable('cbp_show_dl_count', 0),
			'cbp_editor_tools'			=> $this->request->variable('cbp_editor_tools', 0),
			'cbp_repo_url'				=> trim($this->request->variable('cbp_repo_url', '')),
		);

		// Groups allowed to download: none selected = every group
		$groups = array_map('intval', $this->request->variable('cbp_download_groups', array(0)));
		$groups = array_values(array_intersect(array_unique(array_filter($groups)), array_keys($this->get_groups())));
		$data['cbp_download_groups'] = implode(',', $groups);

		foreach (array('cbp_highlight', 'cbp_line_numbers', 'cbp_wrap', 'cbp_expanded', 'cbp_editor_button', 'cbp_download', 'cbp_login_required', 'cbp_prevent_bots', 'cbp_require_fdownload', 'cbp_captcha', 'cbp_captcha_guests_only', 'cbp_show_credits', 'cbp_window_buttons', 'cbp_show_dl_count', 'cbp_editor_tools') as $name)
		{
			$data[$name] = $data[$name] ? 1 : 0;
		}

		if (!in_array($data['cbp_theme'], self::THEMES, true))
		{
			$data['cbp_theme'] = 'auto';
		}

		$ranges = array(
			'cbp_max_height'		=> array(120, 3000, 'CBP_MAX_HEIGHT'),
			'cbp_tab_size'			=> array(1, 8, 'CBP_TAB_SIZE'),
			'cbp_max_attempts'		=> array(1, 50, 'CBP_MAX_ATTEMPTS'),
			'cbp_max_highlight_kb'	=> array(8, 4096, 'CBP_MAX_HIGHLIGHT_KB'),
			'cbp_cache_ttl'			=> array(0, 2592000, 'CBP_CACHE_TTL'),
		);

		foreach ($ranges as $name => $range)
		{
			if ($data[$name] < $range[0] || $data[$name] > $range[1])
			{
				$errors[] = $this->language->lang('CBP_ERR_RANGE', $this->language->lang($range[2]), $range[0], $range[1]);
			}
		}

		// Favourite languages: keep the valid identifiers only
		$favorites = $this->catalog->parse_list($data['cbp_favorites']);
		$invalid = array();
		foreach (explode(',', $data['cbp_favorites']) as $id)
		{
			$id = strtolower(trim($id));
			if ($id !== '' && !$this->catalog->exists($id))
			{
				$invalid[] = $id;
			}
		}

		if (!empty($invalid))
		{
			$errors[] = $this->language->lang('CBP_ERR_FAVORITES', implode(', ', $invalid));
		}

		$data['cbp_favorites'] = implode(',', $favorites);

		if ($data['cbp_repo_url'] !== '' && (!preg_match('#^https?://#i', $data['cbp_repo_url']) || !filter_var($data['cbp_repo_url'], FILTER_VALIDATE_URL) || utf8_strlen($data['cbp_repo_url']) > 255))
		{
			$errors[] = $this->language->lang('CBP_ERR_REPO_URL');
		}

		if ($data['cbp_captcha'] && empty($this->config['captcha_plugin']))
		{
			$errors[] = $this->language->lang('CBP_ERR_NO_CAPTCHA');
		}

		return $data;
	}

	/**
	 * Maintenance actions (AJAX confirm box)
	 *
	 * @param string $action
	 */
	protected function run_action($action)
	{
		$actions = array(
			'purge_cache'		=> array('CBP_CONFIRM_PURGE', 'LOG_CBP_CACHE_PURGED', 'CBP_CACHE_PURGED'),
			'reset_counter'		=> array('CBP_CONFIRM_RESET_COUNTER', 'LOG_CBP_COUNTER_RESET', 'CBP_COUNTER_RESET'),
			'reset_settings'	=> array('CBP_CONFIRM_RESET_SETTINGS', 'LOG_CBP_SETTINGS_RESET', 'CBP_SETTINGS_RESET'),
			'remove_old_bbcode'	=> array('CBP_CONFIRM_REMOVE_OLD_BBCODE', 'LOG_CBP_OLD_BBCODE_REMOVED', 'CBP_OLD_BBCODE_REMOVED'),
		);

		if (!isset($actions[$action]))
		{
			return;
		}

		list($confirm_key, $log_key, $done_key) = $actions[$action];

		if (!confirm_box(true))
		{
			confirm_box(false, $this->language->lang($confirm_key), build_hidden_fields(array(
				'action'	=> $action,
			)));

			// The user said "no"
			redirect($this->u_action);
		}

		switch ($action)
		{
			case 'purge_cache':
				$this->highlighter->purge();
			break;

			case 'reset_counter':
				$this->config->set('cbp_downloads', 0, false);
				$this->counter->reset();
			break;

			case 'reset_settings':
				foreach ($this->get_default_settings() as $name => $value)
				{
					$this->config->set($name, $value);
				}
				$this->highlighter->purge();
			break;

			case 'remove_old_bbcode':
				$sql = 'DELETE FROM ' . BBCODES_TABLE . "
					WHERE LOWER(bbcode_tag) = 'codebox='";
				$this->db->sql_query($sql);
				$this->cache->destroy('_text_formatter_parser');
				$this->cache->destroy('_text_formatter_renderer');
			break;
		}

		$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, $log_key);

		$back = str_replace('mode=settings', 'mode=' . $this->request->variable('mode', 'settings'), $this->u_action);
		trigger_error($this->language->lang($done_key) . adm_back_link($back));
	}

	/**
	 * Default settings
	 *
	 * @return array
	 */
	public function get_default_settings()
	{
		return array(
			'cbp_highlight'				=> 1,
			'cbp_theme'					=> 'auto',
			'cbp_line_numbers'			=> 1,
			'cbp_wrap'					=> 0,
			'cbp_expanded'				=> 0,
			'cbp_max_height'			=> 420,
			'cbp_tab_size'				=> 4,
			'cbp_editor_button'			=> 1,
			'cbp_favorites'				=> \salvocortesiano\codeboxplus\core\catalog::DEFAULT_FAVORITES,
			'cbp_download'				=> 1,
			'cbp_login_required'		=> 0,
			'cbp_prevent_bots'			=> 1,
			'cbp_require_fdownload'		=> 0,
			'cbp_captcha'				=> 0,
			'cbp_captcha_guests_only'	=> 1,
			'cbp_max_attempts'			=> 3,
			'cbp_max_highlight_kb'		=> 256,
			'cbp_cache_ttl'				=> 86400,
			'cbp_download_groups'		=> '',
			'cbp_show_credits'			=> 1,
			'cbp_window_buttons'		=> 1,
			'cbp_show_dl_count'			=> 1,
			'cbp_editor_tools'			=> 1,
			'cbp_repo_url'				=> '',
		);
	}

	/**
	 * Check-up page
	 */
	public function display_checkup()
	{
		$this->assign_common('checkup');

		$action = $this->request->variable('action', '');
		if ($action === 'remove_old_bbcode')
		{
			$this->run_action($action);
		}

		$checks = $this->run_checkup();
		$totals = array('ok' => 0, 'warning' => 0, 'error' => 0, 'info' => 0);

		foreach ($checks as $check)
		{
			$totals[$check['status']]++;
			$this->template->assign_block_vars('cbp_checks', array(
				'STATUS'	=> $check['status'],
				'TITLE'		=> $check['title'],
				'DETAIL'	=> $check['detail'],
				'FIX'		=> isset($check['fix']) ? $check['fix'] : '',
				'U_FIX'		=> isset($check['u_fix']) ? $check['u_fix'] : '',
			));
		}

		$this->template->assign_vars(array(
			'CBP_TOTAL_OK'			=> $totals['ok'],
			'CBP_TOTAL_WARNING'		=> $totals['warning'],
			'CBP_TOTAL_ERROR'		=> $totals['error'],
			'CBP_TOTAL_INFO'		=> $totals['info'],
			'CBP_CHECKUP_TIME'		=> $this->user->format_date(time()),
			'S_CBP_ALL_OK'			=> $totals['error'] === 0 && $totals['warning'] === 0,
		));
	}

	/**
	 * Run every test
	 *
	 * @return array
	 */
	public function run_checkup()
	{
		$checks = array();
		$l = $this->language;
		$add = function ($status, $title_key, $detail, $extra = array()) use (&$checks, $l) {
			$checks[] = array_merge(array(
				'status'	=> $status,
				'title'		=> $l->lang($title_key),
				'detail'	=> $detail,
			), $extra);
		};

		// 1. PHP
		$add(version_compare(PHP_VERSION, '7.2.0', '>=') ? 'ok' : 'error', 'CBP_CHK_PHP', $l->lang('CBP_CHK_PHP_DETAIL', PHP_VERSION));

		// 2. phpBB
		$add(phpbb_version_compare($this->config['version'], '3.3.0', '>=') ? 'ok' : 'error', 'CBP_CHK_PHPBB', $l->lang('CBP_CHK_PHPBB_DETAIL', $this->config['version']));

		// 3. PHP extensions
		$missing_ext = array();
		foreach (array('dom', 'mbstring', 'libxml') as $php_ext)
		{
			if (!extension_loaded($php_ext))
			{
				$missing_ext[] = $php_ext;
			}
		}
		$add(empty($missing_ext) ? 'ok' : 'error', 'CBP_CHK_PHP_EXT', empty($missing_ext) ? $l->lang('CBP_CHK_PHP_EXT_OK') : $l->lang('CBP_CHK_PHP_EXT_MISSING', implode(', ', $missing_ext)));

		// 4. GeSHi files
		$geshi_dir = $this->root_path . 'ext/' . self::EXT_NAME . '/includes/geshi/geshi/';
		$missing = array();
		foreach ($this->catalog->get_ids() as $id)
		{
			if (!is_readable($geshi_dir . $this->catalog->get_geshi($id) . '.php'))
			{
				$missing[] = $id;
			}
		}
		$add(empty($missing) ? 'ok' : 'error', 'CBP_CHK_GESHI', empty($missing)
			? $l->lang('CBP_CHK_GESHI_OK', $this->highlighter->get_geshi_version(), $this->catalog->count())
			: $l->lang('CBP_CHK_GESHI_MISSING', implode(', ', $missing)));

		// 5. Highlighting
		$lines = $this->highlighter->highlight(self::SAMPLE_CODE, 'php', false);
		$highlighted = strpos(implode('', $lines), 'class="kw') !== false;
		if (!$this->config['cbp_highlight'])
		{
			$add('info', 'CBP_CHK_HIGHLIGHT', $l->lang('CBP_CHK_HIGHLIGHT_OFF'));
		}
		else
		{
			$add($highlighted ? 'ok' : 'error', 'CBP_CHK_HIGHLIGHT', $highlighted
				? $l->lang('CBP_CHK_HIGHLIGHT_OK', count($lines))
				: $l->lang('CBP_CHK_HIGHLIGHT_FAIL', $this->highlighter->get_last_error()));
		}

		// 6. Parser: the BBCode is registered in the text formatter
		$sample_bbcode = '[codebox=php file=checkup.php]<?php echo "Codebox Plus"; ?>[/codebox]';
		$xml = '';
		try
		{
			$xml = $this->parser->parse($sample_bbcode);
		}
		catch (\Exception $e)
		{
			$xml = '';
		}
		$parsed = strpos($xml, '<CODEBOX') !== false;
		$add($parsed ? 'ok' : 'error', 'CBP_CHK_PARSER', $parsed ? $l->lang('CBP_CHK_PARSER_OK') : $l->lang('CBP_CHK_PARSER_FAIL'));

		// 7. Renderer: the final box is produced
		$html = '';
		if ($parsed)
		{
			try
			{
				$html = $this->renderer->render($xml);
			}
			catch (\Exception $e)
			{
				$html = '';
			}
		}
		$rendered = strpos($html, 'class="cbp ') !== false && strpos($html, 'cbp-l') !== false;
		$add($rendered ? 'ok' : 'error', 'CBP_CHK_RENDER', $rendered ? $l->lang('CBP_CHK_RENDER_OK') : $l->lang('CBP_CHK_RENDER_FAIL'));

		// 8. Download fingerprint: rendered box <-> stored text
		if ($rendered)
		{
			$blocks = $this->code_helper->extract_from_xml($xml);
			$coherent = !empty($blocks) && preg_match('#data-cbp-hash="([0-9a-f]{20})"#', $html, $m) && hash_equals($this->code_helper->fingerprint($blocks[0]['code']), $m[1]);
			$add($coherent ? 'ok' : 'error', 'CBP_CHK_ROUNDTRIP', $coherent ? $l->lang('CBP_CHK_ROUNDTRIP_OK') : $l->lang('CBP_CHK_ROUNDTRIP_FAIL'));
		}

		// 9. Download route
		try
		{
			$this->helper->route('salvocortesiano_codeboxplus_download', array('post_id' => 1, 'hash' => str_repeat('a', 20)));
			$add($this->config['cbp_download'] ? 'ok' : 'info', 'CBP_CHK_ROUTE', $this->config['cbp_download'] ? $l->lang('CBP_CHK_ROUTE_OK') : $l->lang('CBP_CHK_ROUTE_OFF'));
		}
		catch (\Exception $e)
		{
			$add('error', 'CBP_CHK_ROUTE', $l->lang('CBP_CHK_ROUTE_FAIL', $e->getMessage()));
		}

		// 10. Old BBCode row
		$sql = 'SELECT bbcode_id
			FROM ' . BBCODES_TABLE . "
			WHERE LOWER(bbcode_tag) = 'codebox='";
		$result = $this->db->sql_query($sql);
		$old_row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);
		if ($old_row)
		{
			$add('warning', 'CBP_CHK_OLD_BBCODE', $l->lang('CBP_CHK_OLD_BBCODE_FOUND'), array(
				'fix'	=> $l->lang('CBP_FIX_REMOVE_OLD_BBCODE'),
				'u_fix'	=> $this->u_action . '&amp;action=remove_old_bbcode',
			));
		}
		else
		{
			$add('ok', 'CBP_CHK_OLD_BBCODE', $l->lang('CBP_CHK_OLD_BBCODE_OK'));
		}

		// 11. Original extension
		if ($this->ext_manager->is_enabled('o0johntam0o/codeboxplus'))
		{
			$add('error', 'CBP_CHK_OLD_EXT', $l->lang('CBP_CHK_OLD_EXT_ENABLED'));
		}
		else if (is_dir($this->root_path . 'ext/o0johntam0o/codeboxplus'))
		{
			$add('warning', 'CBP_CHK_OLD_EXT', $l->lang('CBP_CHK_OLD_EXT_FILES'));
		}
		else
		{
			$add('ok', 'CBP_CHK_OLD_EXT', $l->lang('CBP_CHK_OLD_EXT_OK'));
		}

		// 12. Cache
		$test_key = '_cbp_checkup_' . substr(hash('sha256', uniqid('', true)), 0, 8);
		$this->cache->put($test_key, 'ok', 60);
		$cache_ok = $this->cache->get($test_key) === 'ok';
		$this->cache->destroy($test_key);
		$add($cache_ok ? 'ok' : 'warning', 'CBP_CHK_CACHE', $cache_ok
			? $l->lang('CBP_CHK_CACHE_OK', (int) $this->config['cbp_cache_ttl'] > 0 ? $l->lang('CBP_CACHE_ON', (int) $this->config['cbp_cache_ttl']) : $l->lang('CBP_CACHE_OFF'))
			: $l->lang('CBP_CHK_CACHE_FAIL'));

		// Groups allowed to download
		if ($this->config['cbp_download'])
		{
			$names = array();
			$all_groups = $this->get_groups();
			foreach ($this->access->get_allowed_groups() as $group_id)
			{
				if (isset($all_groups[$group_id]))
				{
					$names[] = $all_groups[$group_id];
				}
			}
			$add('info', 'CBP_CHK_GROUPS', empty($names) ? $l->lang('CBP_CHK_GROUPS_ALL') : $l->lang('CBP_CHK_GROUPS_LIST', implode(', ', $names)));
		}

		// 13. Anti-spambot plugin
		if ($this->config['cbp_download'] && $this->config['cbp_captcha'])
		{
			$captcha_ok = false;
			$captcha_name = (string) $this->config['captcha_plugin'];
			try
			{
				$captcha = $this->captcha_factory->get_instance($captcha_name);
				$captcha_ok = $captcha->is_available();
			}
			catch (\Exception $e)
			{
				$captcha_ok = false;
			}
			$add($captcha_ok ? 'ok' : 'error', 'CBP_CHK_CAPTCHA', $captcha_ok ? $l->lang('CBP_CHK_CAPTCHA_OK', $captcha_name) : $l->lang('CBP_CHK_CAPTCHA_FAIL', $captcha_name));
		}
		else
		{
			$add('info', 'CBP_CHK_CAPTCHA', $l->lang('CBP_CHK_CAPTCHA_OFF'));
		}

		// 14. Language files of the installed board languages
		$lang_dir = $this->root_path . 'ext/' . self::EXT_NAME . '/language/';
		$files = array('common.php', 'syntax.php', 'info_acp_codeboxplus.php', 'acp_codeboxplus.php');
		$sql = 'SELECT lang_iso FROM ' . LANG_TABLE;
		$result = $this->db->sql_query($sql);
		$covered = $fallback = array();
		while ($row = $this->db->sql_fetchrow($result))
		{
			$complete = true;
			foreach ($files as $file)
			{
				if (!is_readable($lang_dir . $row['lang_iso'] . '/' . $file))
				{
					$complete = false;
				}
			}
			if ($complete)
			{
				$covered[] = $row['lang_iso'];
			}
			else
			{
				$fallback[] = $row['lang_iso'];
			}
		}
		$this->db->sql_freeresult($result);
		$add(empty($fallback) ? 'ok' : 'info', 'CBP_CHK_LANG', empty($fallback)
			? $l->lang('CBP_CHK_LANG_OK', implode(', ', $covered))
			: $l->lang('CBP_CHK_LANG_FALLBACK', implode(', ', $fallback)));

		// 15. Style assets
		$assets = array('theme/codeboxplus.css', 'template/js/codeboxplus.js', 'template/event/overall_header_head_append.html', 'template/event/overall_footer_after.html', 'template/codeboxplus_download.html');
		$missing_assets = array();
		foreach ($assets as $asset)
		{
			if (!is_readable($this->root_path . 'ext/' . self::EXT_NAME . '/styles/all/' . $asset))
			{
				$missing_assets[] = $asset;
			}
		}
		$add(empty($missing_assets) ? 'ok' : 'error', 'CBP_CHK_ASSETS', empty($missing_assets) ? $l->lang('CBP_CHK_ASSETS_OK') : $l->lang('CBP_CHK_ASSETS_MISSING', implode(', ', $missing_assets)));

		// 16. Posts using the BBCode
		$sql = 'SELECT COUNT(post_id) AS total
			FROM ' . POSTS_TABLE . '
			WHERE post_text ' . $this->db->sql_like_expression($this->db->get_any_char() . '<CODEBOX ' . $this->db->get_any_char());
		$result = $this->db->sql_query($sql);
		$total = (int) $this->db->sql_fetchfield('total');
		$this->db->sql_freeresult($result);
		$add('info', 'CBP_CHK_POSTS', $l->lang('CBP_CHK_POSTS_DETAIL', $total));

		// 17. Posts still stored in the legacy format
		$sql = 'SELECT COUNT(post_id) AS total
			FROM ' . POSTS_TABLE . '
			WHERE post_text ' . $this->db->sql_like_expression($this->db->get_any_char() . '[codebox=' . $this->db->get_any_char()) . '
				AND post_text ' . $this->db->sql_not_like_expression('<' . $this->db->get_any_char());
		$result = $this->db->sql_query($sql);
		$legacy = (int) $this->db->sql_fetchfield('total');
		$this->db->sql_freeresult($result);
		$add($legacy ? 'warning' : 'ok', 'CBP_CHK_LEGACY', $legacy ? $l->lang('CBP_CHK_LEGACY_FOUND', $legacy) : $l->lang('CBP_CHK_LEGACY_OK'));

		// 18. Download counter table
		$summary = $this->counter->get_summary();
		$add($summary !== false ? 'ok' : 'error', 'CBP_CHK_COUNTER', $summary !== false
			? $l->lang('CBP_CHK_COUNTER_OK', $summary['blocks'], $summary['total'])
			: $l->lang('CBP_CHK_COUNTER_FAIL'));

		return $checks;
	}

	/**
	 * Every user group of the board (id => translated name)
	 *
	 * @return array
	 */
	protected function get_groups()
	{
		$groups = array();

		$sql = 'SELECT group_id, group_name, group_type
			FROM ' . GROUPS_TABLE . '
			ORDER BY group_type DESC, group_name ASC';
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$name = $this->group_helper->get_name($row['group_name']);

			// Special groups not translated by the board language pack
			// (e.g. AI_CRAWLERS, added in phpBB 3.3.15, missing in older packs)
			if ($name === $row['group_name'] && (int) $row['group_type'] === GROUP_SPECIAL)
			{
				$key = 'CBP_GROUP_' . utf8_strtoupper($row['group_name']);
				$name = $this->language->is_set($key) ? $this->language->lang($key) : ucwords(utf8_strtolower(str_replace('_', ' ', $row['group_name'])));
			}

			$groups[(int) $row['group_id']] = $name;
		}
		$this->db->sql_freeresult($result);

		return $groups;
	}
}
