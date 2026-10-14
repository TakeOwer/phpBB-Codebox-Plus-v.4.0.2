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
 * Who can download the code
 */
class access
{
	/** The user can download */
	const ALLOWED = 'allowed';

	/** The user must log in first */
	const LOGIN = 'login';

	/** The user cannot download */
	const DENIED = 'denied';

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var array|null Groups of the current user (per request) */
	protected $user_groups = null;

	/**
	 * @param \phpbb\config\config              $config
	 * @param \phpbb\user                       $user
	 * @param \phpbb\db\driver\driver_interface $db
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\user $user, \phpbb\db\driver\driver_interface $db)
	{
		$this->config = $config;
		$this->user = $user;
		$this->db = $db;
	}

	/**
	 * Groups allowed to download (empty = every group)
	 *
	 * @return array
	 */
	public function get_allowed_groups()
	{
		$groups = array();

		foreach (explode(',', (string) $this->config['cbp_download_groups']) as $group_id)
		{
			if ((int) $group_id > 0)
			{
				$groups[] = (int) $group_id;
			}
		}

		return array_values(array_unique($groups));
	}

	/**
	 * Groups the current user belongs to (approved memberships only)
	 *
	 * @return array
	 */
	public function get_user_groups()
	{
		if ($this->user_groups === null)
		{
			$this->user_groups = array();
			$user_id = isset($this->user->data['user_id']) ? (int) $this->user->data['user_id'] : ANONYMOUS;

			$sql = 'SELECT group_id
				FROM ' . USER_GROUP_TABLE . '
				WHERE user_id = ' . (int) $user_id . '
					AND user_pending = 0';
			$result = $this->db->sql_query($sql);
			while ($row = $this->db->sql_fetchrow($result))
			{
				$this->user_groups[] = (int) $row['group_id'];
			}
			$this->db->sql_freeresult($result);

			// The default group always counts
			if (!empty($this->user->data['group_id']))
			{
				$this->user_groups[] = (int) $this->user->data['group_id'];
			}

			$this->user_groups = array_values(array_unique($this->user_groups));
		}

		return $this->user_groups;
	}

	/**
	 * Can the current user download the code?
	 *
	 * @return string One of the ALLOWED, LOGIN, DENIED constants
	 */
	public function check()
	{
		if (!$this->config['cbp_download'])
		{
			return self::DENIED;
		}

		if ($this->config['cbp_prevent_bots'] && !empty($this->user->data['is_bot']))
		{
			return self::DENIED;
		}

		$registered = !empty($this->user->data['is_registered']);

		if ($this->config['cbp_login_required'] && !$registered)
		{
			return self::LOGIN;
		}

		$allowed = $this->get_allowed_groups();

		if (empty($allowed) || array_intersect($allowed, $this->get_user_groups()))
		{
			return self::ALLOWED;
		}

		// A guest may gain the permission by logging in
		return $registered ? self::DENIED : self::LOGIN;
	}
}
