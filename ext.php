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

namespace salvocortesiano\codeboxplus;

/**
 * Codebox Plus extension base
 */
class ext extends \phpbb\extension\base
{
	/** Minimum requirements */
	const PHPBB_MIN = '3.3.0';
	const PHP_MIN = '7.2.0';

	/**
	 * {@inheritdoc}
	 */
	public function is_enableable()
	{
		$config = $this->container->get('config');

		if (phpbb_version_compare($config['version'], self::PHPBB_MIN, '<') || version_compare(PHP_VERSION, self::PHP_MIN, '<'))
		{
			$language = $this->container->get('language');
			$language->add_lang('info_acp_codeboxplus', 'salvocortesiano/codeboxplus');

			return array($language->lang('CBP_REQUIREMENTS', self::PHPBB_MIN, self::PHP_MIN));
		}

		// The original extension uses the same BBCode: both cannot be enabled together
		$ext_manager = $this->container->get('ext.manager');
		if ($ext_manager->is_enabled('o0johntam0o/codeboxplus'))
		{
			$language = $this->container->get('language');
			$language->add_lang('info_acp_codeboxplus', 'salvocortesiano/codeboxplus');

			return array($language->lang('CBP_OLD_EXT_ENABLED'));
		}

		return true;
	}

	/**
	 * Rebuild the text formatter cache so that the [codebox] BBCode is
	 * immediately available (or removed)
	 *
	 * @return void
	 */
	protected function purge_text_formatter()
	{
		$cache = $this->container->get('cache.driver');
		$cache->destroy('_text_formatter_parser');
		$cache->destroy('_text_formatter_renderer');
	}

	/**
	 * {@inheritdoc}
	 */
	public function enable_step($old_state)
	{
		if ($old_state === false)
		{
			$this->purge_text_formatter();
		}

		return parent::enable_step($old_state);
	}

	/**
	 * {@inheritdoc}
	 */
	public function disable_step($old_state)
	{
		if ($old_state === false)
		{
			$this->purge_text_formatter();
		}

		return parent::disable_step($old_state);
	}
}
