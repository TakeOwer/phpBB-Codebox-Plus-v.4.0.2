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

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * Download of a code block as a file
 */
class download
{
	/** Captcha type used in the confirm table (does not collide with the core types 1-4) */
	const CONFIRM_TYPE = 9;

	/** Life time of a solved captcha (seconds) */
	const SOLVED_TTL = 1800;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\request\request_interface */
	protected $request;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\cache\driver\driver_interface */
	protected $cache;

	/** @var \phpbb\captcha\factory */
	protected $captcha_factory;

	/** @var \salvocortesiano\codeboxplus\core\catalog */
	protected $catalog;

	/** @var \salvocortesiano\codeboxplus\core\code_helper */
	protected $code_helper;

	/** @var \salvocortesiano\codeboxplus\core\access */
	protected $access;

	/** @var string */
	protected $root_path;

	/** @var string */
	protected $php_ext;

	/**
	 * Constructor
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\language\language $language, \phpbb\user $user, \phpbb\auth\auth $auth, \phpbb\request\request_interface $request, \phpbb\db\driver\driver_interface $db, \phpbb\cache\driver\driver_interface $cache, \phpbb\captcha\factory $captcha_factory, \salvocortesiano\codeboxplus\core\catalog $catalog, \salvocortesiano\codeboxplus\core\code_helper $code_helper, \salvocortesiano\codeboxplus\core\access $access, $root_path, $php_ext)
	{
		$this->config = $config;
		$this->helper = $helper;
		$this->template = $template;
		$this->language = $language;
		$this->user = $user;
		$this->auth = $auth;
		$this->request = $request;
		$this->db = $db;
		$this->cache = $cache;
		$this->captcha_factory = $captcha_factory;
		$this->catalog = $catalog;
		$this->code_helper = $code_helper;
		$this->access = $access;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
	}

	/**
	 * Download a code block
	 *
	 * @param int    $post_id
	 * @param string $hash Fingerprint of the code block
	 * @return Response
	 */
	public function handle($post_id, $hash)
	{
		$this->language->add_lang(array('common', 'syntax'), 'salvocortesiano/codeboxplus');

		$post_id = (int) $post_id;
		$hash = strtolower((string) $hash);

		if (!$this->config['cbp_download'])
		{
			return $this->error('CBP_ERR_DOWNLOAD_DISABLED', 403);
		}

		if ($this->config['cbp_prevent_bots'] && !empty($this->user->data['is_bot']))
		{
			return $this->error('CBP_ERR_BOTS', 403);
		}

		// Login required / groups allowed to download (ACP settings)
		$access = $this->access->check();

		if ($access === \salvocortesiano\codeboxplus\core\access::LOGIN)
		{
			login_box('', $this->language->lang('CBP_ERR_LOGIN_REQUIRED'));
		}

		if ($access === \salvocortesiano\codeboxplus\core\access::DENIED)
		{
			return $this->error('CBP_ERR_GROUP', 403);
		}

		$post = $this->get_post($post_id);

		if ($post === false)
		{
			return $this->error('CBP_ERR_POST_NOT_FOUND', 404);
		}

		$forum_id = (int) $post['forum_id'];

		if (!$this->auth->acl_get('f_read', $forum_id) || ($this->config['cbp_require_fdownload'] && !$this->auth->acl_get('f_download', $forum_id)))
		{
			return $this->error('CBP_ERR_NO_PERMISSION', 403);
		}

		// Unapproved / deleted posts are only available to moderators
		if (((int) $post['post_visibility'] !== ITEM_APPROVED || (int) $post['topic_visibility'] !== ITEM_APPROVED) && !$this->auth->acl_get('m_approve', $forum_id))
		{
			return $this->error('CBP_ERR_POST_NOT_FOUND', 404);
		}

		$block = $this->find_block($post['post_text'], $hash);

		if ($block === false)
		{
			return $this->error('CBP_ERR_CODE_NOT_FOUND', 404);
		}

		if ($block['code'] === '')
		{
			return $this->error('CBP_ERR_FILE_EMPTY', 404);
		}

		$lang = $this->catalog->resolve($block['lang']);
		$filename = $this->code_helper->safe_filename($block['file'], $this->language->lang('CBP_DEFAULT_FILENAME'), $this->catalog->get_extension($lang));

		// Anti-spambot confirmation
		if ($this->captcha_required())
		{
			$response = $this->handle_captcha($post_id, $hash, $post, $block, $filename);

			if ($response !== true)
			{
				return $response;
			}
		}

		return $this->send_file($block['code'], $filename);
	}

	/**
	 * Load the post
	 *
	 * @param int $post_id
	 * @return array|false
	 */
	protected function get_post($post_id)
	{
		if ($post_id <= 0)
		{
			return false;
		}

		$sql = 'SELECT p.post_id, p.forum_id, p.topic_id, p.post_visibility, p.post_text, p.bbcode_uid, p.post_subject, t.topic_visibility
			FROM ' . POSTS_TABLE . ' p, ' . TOPICS_TABLE . ' t
			WHERE p.post_id = ' . (int) $post_id . '
				AND t.topic_id = p.topic_id';
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		return $row;
	}

	/**
	 * Find the code block matching the fingerprint
	 *
	 * @param string $post_text
	 * @param string $hash
	 * @return array|false
	 */
	protected function find_block($post_text, $hash)
	{
		foreach ($this->code_helper->extract_from_xml($post_text) as $block)
		{
			if (hash_equals($this->code_helper->fingerprint($block['code']), $hash))
			{
				return $block;
			}

			// The code may be displayed with the word censor applied
			$censored = censor_text($block['code']);
			if ($censored !== $block['code'] && hash_equals($this->code_helper->fingerprint($censored), $hash))
			{
				$block['code'] = $censored;
				return $block;
			}
		}

		return false;
	}

	/**
	 * Is the anti-spambot confirmation required for the current user?
	 *
	 * @return bool
	 */
	protected function captcha_required()
	{
		if (!$this->config['cbp_captcha'])
		{
			return false;
		}

		if ($this->config['cbp_captcha_guests_only'] && !empty($this->user->data['is_registered']))
		{
			return false;
		}

		return !$this->cache->get($this->session_key('ok'));
	}

	/**
	 * Show / validate the anti-spambot confirmation
	 *
	 * @return Response|true True when the confirmation has been solved
	 */
	protected function handle_captcha($post_id, $hash, array $post, array $block, $filename)
	{
		$attempts_key = $this->session_key('att');
		$attempts = (int) $this->cache->get($attempts_key);
		$max_attempts = max(1, (int) $this->config['cbp_max_attempts']);

		if ($attempts >= $max_attempts)
		{
			return $this->error('CBP_ERR_CONFIRM', 429);
		}

		$captcha = $this->captcha_factory->get_instance($this->config['captcha_plugin']);
		$captcha->init(self::CONFIRM_TYPE);

		$form_key = 'salvocortesiano_codeboxplus_download';
		add_form_key($form_key);

		$error = '';
		$download_url = $this->helper->route('salvocortesiano_codeboxplus_download', array('post_id' => $post_id, 'hash' => $hash));

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key($form_key))
			{
				$error = $this->language->lang('FORM_INVALID');
			}
			else
			{
				$captcha_error = $captcha->validate();

				if ($captcha_error === false && $captcha->is_solved())
				{
					$captcha->reset();
					$this->cache->destroy($attempts_key);
					$this->cache->put($this->session_key('ok'), 1, self::SOLVED_TTL);

					// Start the download from a clean GET request
					meta_refresh(1, $download_url);
					$this->template->assign_vars(array(
						'S_CBP_SOLVED'		=> true,
					));
				}
				else
				{
					$attempts++;
					$this->cache->put($attempts_key, $attempts, self::SOLVED_TTL);
					$error = is_string($captcha_error) ? $captcha_error : $this->language->lang('CONFIRM_CODE_WRONG');

					if ($attempts >= $max_attempts)
					{
						return $this->error('CBP_ERR_CONFIRM', 429);
					}
				}
			}
		}

		$lang = $this->catalog->resolve($block['lang']);

		$this->template->assign_vars(array(
			'CBP_ERROR'				=> $error,
			'CBP_FILENAME'			=> $filename,
			'CBP_LANGUAGE'			=> $this->language->lang($this->catalog->get_lang_key($lang)),
			'CBP_LINES'				=> $this->language->lang('CBP_LINES', substr_count($block['code'], "\n") + 1),
			'CBP_SIZE'				=> get_formatted_filesize(strlen($block['code'])),
			'CBP_POST_SUBJECT'		=> censor_text($post['post_subject']),
			'CBP_ATTEMPTS_LEFT'		=> $max_attempts - $attempts,
			'U_CBP_ACTION'			=> $download_url,
			'U_CBP_DOWNLOAD'		=> $download_url,
			'U_CBP_POST'			=> append_sid(generate_board_url() . '/viewtopic.' . $this->php_ext, 'p=' . (int) $post_id) . '#p' . (int) $post_id,
			'S_CBP_CONFIRM'			=> true,
			'CAPTCHA_TEMPLATE'		=> $captcha->get_template(),
			'S_HIDDEN_FIELDS'		=> build_hidden_fields($captcha->get_hidden_fields()),
		));

		return $this->helper->render('@salvocortesiano_codeboxplus/codeboxplus_download.html', $this->language->lang('CBP_DOWNLOAD_TITLE'));
	}

	/**
	 * Send the code as a file
	 *
	 * @param string $code
	 * @param string $filename
	 * @return Response
	 */
	protected function send_file($code, $filename)
	{
		$this->config->increment('cbp_downloads', 1, false);

		$fallback = preg_replace('/[^A-Za-z0-9._-]+/', '_', $filename);
		$fallback = trim($fallback, '._') !== '' ? $fallback : 'code.txt';

		$response = new Response($code);
		$response->headers->set('Content-Type', 'text/plain; charset=UTF-8');
		$response->headers->set('Content-Disposition', $response->headers->makeDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $filename, $fallback));
		$response->headers->set('X-Content-Type-Options', 'nosniff');
		$response->headers->set('Cache-Control', 'private, no-store, max-age=0');
		$response->headers->set('X-Robots-Tag', 'noindex, nofollow');

		return $response;
	}

	/**
	 * Error page
	 *
	 * @param string $lang_key
	 * @param int    $status
	 * @return Response
	 */
	protected function error($lang_key, $status)
	{
		return $this->helper->message($lang_key, array(), 'CBP_DOWNLOAD_TITLE', $status);
	}

	/**
	 * Cache key bound to the current session
	 *
	 * @param string $type
	 * @return string
	 */
	protected function session_key($type)
	{
		return '_cbp_' . $type . '_' . hash('sha256', (string) $this->user->session_id);
	}
}
