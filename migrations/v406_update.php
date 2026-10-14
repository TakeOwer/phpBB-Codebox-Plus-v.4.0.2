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
 * Codebox Plus 4.0.6: download counter per code block, editor tools
 */
class v406_update extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return $this->db_tools->sql_table_exists($this->table_prefix . 'cbp_downloads')
			&& isset($this->config['cbp_version']) && phpbb_version_compare($this->config['cbp_version'], '4.0.6', '>=');
	}

	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return array('\salvocortesiano\codeboxplus\migrations\v405_update');
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_schema()
	{
		return array(
			'add_tables'	=> array(
				$this->table_prefix . 'cbp_downloads'	=> array(
					'COLUMNS'		=> array(
						'post_id'			=> array('ULINT', 0),
						'code_hash'			=> array('VCHAR:20', ''),
						'download_count'	=> array('UINT', 0),
						'last_download'		=> array('TIMESTAMP', 0),
					),
					'PRIMARY_KEY'	=> array('post_id', 'code_hash'),
				),
			),
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function revert_schema()
	{
		return array(
			'drop_tables'	=> array(
				$this->table_prefix . 'cbp_downloads',
			),
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_data()
	{
		return array(
			array('config.add', array('cbp_show_dl_count', 1)),
			array('config.add', array('cbp_editor_tools', 1)),
			array('config.update', array('cbp_version', '4.0.6')),
		);
	}
}
