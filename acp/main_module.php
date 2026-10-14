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
 * Codebox Plus ACP module
 */
class main_module
{
	/** @var string */
	public $page_title;

	/** @var string */
	public $tpl_name;

	/** @var string */
	public $u_action;

	/**
	 * Main ACP module
	 *
	 * @param int    $id
	 * @param string $mode
	 */
	public function main($id, $mode)
	{
		global $phpbb_container;

		/** @var \salvocortesiano\codeboxplus\controller\acp_controller $acp_controller */
		$acp_controller = $phpbb_container->get('salvocortesiano.codeboxplus.controller.acp');

		/** @var \phpbb\language\language $language */
		$language = $phpbb_container->get('language');
		$language->add_lang('acp_codeboxplus', 'salvocortesiano/codeboxplus');

		$this->tpl_name = 'acp_codeboxplus';
		$acp_controller->set_page_url($this->u_action);

		if ($mode === 'checkup')
		{
			$this->page_title = $language->lang('ACP_CBP_CHECKUP');
			$acp_controller->display_checkup();
		}
		else
		{
			$this->page_title = $language->lang('ACP_CBP_SETTINGS');
			$acp_controller->display_settings();
		}
	}
}
