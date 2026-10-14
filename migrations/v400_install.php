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

namespace salvocortesiano\codeboxplus\migrations;

/**
 * Installation of Codebox Plus 4.0.0
 */
class v400_install extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return isset($this->config['cbp_version']) && phpbb_version_compare($this->config['cbp_version'], '4.0.0', '>=');
	}

	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return array('\phpbb\db\migration\data\v330\v330');
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_data()
	{
		// Settings of the original extension are imported when they exist
		$old = function ($name, $default) {
			return isset($this->config[$name]) ? (int) $this->config[$name] : $default;
		};

		return array(
			array('config.add', array('cbp_version', '4.0.0')),

			// Display
			array('config.add', array('cbp_highlight', $old('codebox_plus_syntax_highlighting', 1))),
			array('config.add', array('cbp_theme', 'auto')),
			array('config.add', array('cbp_line_numbers', 1)),
			array('config.add', array('cbp_wrap', 0)),
			array('config.add', array('cbp_expanded', $old('codebox_plus_expanded', 0))),
			array('config.add', array('cbp_max_height', 420)),
			array('config.add', array('cbp_tab_size', 4)),
			array('config.add', array('cbp_editor_button', 1)),
			array('config.add', array('cbp_favorites', 'php,javascript,html5,css,sql,mysql,python,bash,json,xml,cpp,csharp,java,ini,apache,text')),

			// Download
			array('config.add', array('cbp_download', $old('codebox_plus_download', 1))),
			array('config.add', array('cbp_login_required', $old('codebox_plus_login_required', 0))),
			array('config.add', array('cbp_prevent_bots', $old('codebox_plus_prevent_bots', 1))),
			array('config.add', array('cbp_captcha', 0)),
			array('config.add', array('cbp_captcha_guests_only', 1)),
			array('config.add', array('cbp_max_attempts', max(1, $old('codebox_plus_max_attempt', 3)))),
			array('config.add', array('cbp_require_fdownload', 0)),
			array('config.add', array('cbp_downloads', 0, true)),

			// Performance
			array('config.add', array('cbp_max_highlight_kb', 256)),
			array('config.add', array('cbp_cache_ttl', 86400)),
			array('config.add', array('cbp_cache_gen', 1, true)),

			// ACP modules
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_CBP_TITLE',
			)),
			array('module.add', array(
				'acp',
				'ACP_CBP_TITLE',
				array(
					'module_basename'	=> '\salvocortesiano\codeboxplus\acp\main_module',
					'modes'				=> array('settings', 'checkup'),
				),
			)),

			array('custom', array(array($this, 'remove_old_bbcode'))),
			array('custom', array(array($this, 'remove_old_leftovers'))),
		);
	}

	/**
	 * The [Codebox=] BBCode is now registered by the extension itself:
	 * the row created in the BBCodes table by the original extension
	 * would conflict with it and is removed (existing posts keep working).
	 */
	public function remove_old_bbcode()
	{
		$sql = 'DELETE FROM ' . $this->table_prefix . "bbcodes
			WHERE LOWER(bbcode_tag) = 'codebox='";
		$this->db->sql_query($sql);
	}

	/**
	 * Remove the settings left by the original extension, but only when
	 * it is no longer installed (its hidden ACP modules are harmless).
	 */
	public function remove_old_leftovers()
	{
		$sql = 'SELECT ext_name
			FROM ' . $this->table_prefix . "ext
			WHERE ext_name = 'o0johntam0o/codeboxplus'";
		$result = $this->db->sql_query($sql);
		$installed = (bool) $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		if ($installed)
		{
			return;
		}

		$old_settings = array(
			'codebox_plus_version',
			'codebox_plus_syntax_highlighting',
			'codebox_plus_expanded',
			'codebox_plus_download',
			'codebox_plus_login_required',
			'codebox_plus_prevent_bots',
			'codebox_plus_captcha',
			'codebox_plus_max_attempt',
		);

		foreach ($old_settings as $name)
		{
			if (isset($this->config[$name]))
			{
				$this->config->delete($name);
			}
		}
	}
}
