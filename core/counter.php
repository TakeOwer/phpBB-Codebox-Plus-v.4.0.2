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
 * Download counter of every code block
 */
class counter
{
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var string */
	protected $table;

	/** @var array post_id => array(hash => count) */
	protected $loaded = array();

	/**
	 * @param \phpbb\db\driver\driver_interface $db
	 * @param string                            $table_prefix
	 */
	public function __construct(\phpbb\db\driver\driver_interface $db, $table_prefix)
	{
		$this->db = $db;
		$this->table = $table_prefix . 'cbp_downloads';
	}

	/**
	 * Name of the table
	 *
	 * @return string
	 */
	public function get_table()
	{
		return $this->table;
	}

	/**
	 * Add one download to a code block
	 *
	 * @param int    $post_id
	 * @param string $hash
	 * @return int New number of downloads
	 */
	public function increment($post_id, $hash)
	{
		$post_id = (int) $post_id;
		$hash = substr(preg_replace('/[^0-9a-f]/', '', strtolower((string) $hash)), 0, 20);

		$sql = 'UPDATE ' . $this->table . '
			SET download_count = download_count + 1,
				last_download = ' . time() . "
			WHERE post_id = " . (int) $post_id . "
				AND code_hash = '" . $this->db->sql_escape($hash) . "'";
		$this->db->sql_query($sql);

		if (!$this->db->sql_affectedrows())
		{
			$sql = 'INSERT INTO ' . $this->table . ' ' . $this->db->sql_build_array('INSERT', array(
				'post_id'			=> $post_id,
				'code_hash'			=> $hash,
				'download_count'	=> 1,
				'last_download'		=> time(),
			));
			$this->db->sql_query($sql);
		}

		unset($this->loaded[$post_id]);

		return $this->get_count($post_id, $hash);
	}

	/**
	 * Load the counters of several posts with a single query
	 *
	 * @param array $post_ids
	 */
	public function preload(array $post_ids)
	{
		$post_ids = array_values(array_diff(array_unique(array_map('intval', $post_ids)), array_keys($this->loaded), array(0)));

		if (empty($post_ids))
		{
			return;
		}

		foreach ($post_ids as $post_id)
		{
			$this->loaded[$post_id] = array();
		}

		$sql = 'SELECT post_id, code_hash, download_count
			FROM ' . $this->table . '
			WHERE ' . $this->db->sql_in_set('post_id', $post_ids);
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$this->loaded[(int) $row['post_id']][$row['code_hash']] = (int) $row['download_count'];
		}
		$this->db->sql_freeresult($result);
	}

	/**
	 * Downloads of a code block
	 *
	 * @param int    $post_id
	 * @param string $hash
	 * @return int
	 */
	public function get_count($post_id, $hash)
	{
		$post_id = (int) $post_id;
		$this->preload(array($post_id));

		return isset($this->loaded[$post_id][$hash]) ? $this->loaded[$post_id][$hash] : 0;
	}

	/**
	 * Remove the counters of deleted posts
	 *
	 * @param array $post_ids
	 */
	public function delete_posts(array $post_ids)
	{
		$post_ids = array_filter(array_map('intval', $post_ids));

		if (!empty($post_ids))
		{
			$sql = 'DELETE FROM ' . $this->table . '
				WHERE ' . $this->db->sql_in_set('post_id', $post_ids);
			$this->db->sql_query($sql);
		}
	}

	/**
	 * Reset every counter
	 */
	public function reset()
	{
		$this->db->sql_query('DELETE FROM ' . $this->table);
		$this->loaded = array();
	}

	/**
	 * Summary for the ACP: blocks downloaded and total downloads
	 *
	 * @return array|false array('blocks' => int, 'total' => int) or false if the table is missing
	 */
	public function get_summary()
	{
		try
		{
			$this->db->sql_return_on_error(true);
			$result = $this->db->sql_query('SELECT COUNT(post_id) AS blocks, SUM(download_count) AS total FROM ' . $this->table);
			$this->db->sql_return_on_error(false);

			if (!$result)
			{
				return false;
			}

			$row = $this->db->sql_fetchrow($result);
			$this->db->sql_freeresult($result);

			return array('blocks' => (int) $row['blocks'], 'total' => (int) $row['total']);
		}
		catch (\Exception $e)
		{
			$this->db->sql_return_on_error(false);
			return false;
		}
	}
}
