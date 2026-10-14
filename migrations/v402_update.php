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
 * Codebox Plus 4.0.2: download groups, credits footer
 */
class v402_update extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return isset($this->config['cbp_version']) && phpbb_version_compare($this->config['cbp_version'], '4.0.2', '>=');
	}

	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return array('\salvocortesiano\codeboxplus\migrations\v401_update');
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_data()
	{
		return array(
			array('config.add', array('cbp_download_groups', '')),
			array('config.add', array('cbp_show_credits', 1)),
			array('config.add', array('cbp_repo_url', '')),
			array('config.update', array('cbp_version', '4.0.2')),
		);
	}
}
