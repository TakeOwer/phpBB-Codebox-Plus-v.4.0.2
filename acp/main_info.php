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

namespace salvocortesiano\codeboxplus\acp;

/**
 * Codebox Plus ACP module info
 */
class main_info
{
	public function module()
	{
		return array(
			'filename'	=> '\salvocortesiano\codeboxplus\acp\main_module',
			'title'		=> 'ACP_CBP_TITLE',
			'modes'		=> array(
				'settings'	=> array(
					'title'	=> 'ACP_CBP_SETTINGS',
					'auth'	=> 'ext_salvocortesiano/codeboxplus && acl_a_board',
					'cat'	=> array('ACP_CBP_TITLE'),
				),
				'checkup'	=> array(
					'title'	=> 'ACP_CBP_CHECKUP',
					'auth'	=> 'ext_salvocortesiano/codeboxplus && acl_a_board',
					'cat'	=> array('ACP_CBP_TITLE'),
				),
			),
		);
	}
}
