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
 * Codebox Plus 4.0.1
 */
class v401_update extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return isset($this->config['cbp_version']) && phpbb_version_compare($this->config['cbp_version'], '4.0.1', '>=');
	}

	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return array('\salvocortesiano\codeboxplus\migrations\v400_install');
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_data()
	{
		return array(
			array('config.update', array('cbp_version', '4.0.1')),
		);
	}
}
