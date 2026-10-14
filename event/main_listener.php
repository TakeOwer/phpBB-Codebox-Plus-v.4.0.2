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

namespace salvocortesiano\codeboxplus\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Codebox Plus event listener
 */
class main_listener implements EventSubscriberInterface
{
	/** BBCode definition (compatible with the posts written with the old extension) */
	const BBCODE_USAGE = '[codebox={IDENTIFIER;optional;defaultValue=text} file={SIMPLETEXT;optional}]{TEXT}[/codebox]';

	/** BBCode template: raw markup, turned into the final box by box_renderer */
	const BBCODE_TEMPLATE = '<div class="cbp-raw" data-cbp-lang="{@codebox}" data-cbp-file="{@file}"><pre class="cbp-raw-pre"><code>{TEXT}</code></pre><span class="cbp-raw-end"></span></div>';

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \salvocortesiano\codeboxplus\core\box_renderer */
	protected $box_renderer;

	/** @var \salvocortesiano\codeboxplus\core\catalog */
	protected $catalog;

	/** @var \salvocortesiano\codeboxplus\core\code_helper */
	protected $code_helper;

	/** @var \salvocortesiano\codeboxplus\core\counter */
	protected $counter;

	/**
	 * @param \phpbb\config\config                            $config
	 * @param \phpbb\controller\helper                        $helper
	 * @param \phpbb\template\template                        $template
	 * @param \phpbb\language\language                        $language
	 * @param \salvocortesiano\codeboxplus\core\box_renderer  $box_renderer
	 * @param \salvocortesiano\codeboxplus\core\catalog       $catalog
	 * @param \salvocortesiano\codeboxplus\core\code_helper   $code_helper
	 * @param \salvocortesiano\codeboxplus\core\counter       $counter
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\language\language $language, \salvocortesiano\codeboxplus\core\box_renderer $box_renderer, \salvocortesiano\codeboxplus\core\catalog $catalog, \salvocortesiano\codeboxplus\core\code_helper $code_helper, \salvocortesiano\codeboxplus\core\counter $counter)
	{
		$this->config = $config;
		$this->helper = $helper;
		$this->template = $template;
		$this->language = $language;
		$this->box_renderer = $box_renderer;
		$this->catalog = $catalog;
		$this->code_helper = $code_helper;
		$this->counter = $counter;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getSubscribedEvents()
	{
		return array(
			'core.user_setup'							=> 'load_language_on_setup',
			'core.text_formatter_s9e_configure_after'	=> 'configure_bbcode',
			'core.text_formatter_s9e_parse_before'		=> 'protect_nested_boxes',
			'core.text_formatter_s9e_render_after'		=> 'render_boxes',
			'core.viewtopic_modify_post_data'			=> 'viewtopic_post_data',
			'core.viewtopic_modify_post_row'			=> 'viewtopic_post_row',
			'core.delete_posts_after'					=> 'delete_posts',
			'core.topic_review_modify_row'				=> 'topic_review_row',
			'core.search_modify_tpl_ary'				=> 'search_row',
			'core.page_footer'							=> 'page_footer',
		);
	}

	/**
	 * Load the front-end language file
	 *
	 * @param \phpbb\event\data $event
	 */
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name'	=> 'salvocortesiano/codeboxplus',
			'lang_set'	=> 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	 * Register the [codebox] BBCode in the text formatter
	 *
	 * @param \phpbb\event\data $event
	 */
	public function configure_bbcode($event)
	{
		/** @var \s9e\TextFormatter\Configurator $configurator */
		$configurator = $event['configurator'];

		// Remove the old BBCode created by the original extension (if still in the database)
		if (isset($configurator->BBCodes['CODEBOX']))
		{
			unset($configurator->BBCodes['CODEBOX']);
		}
		if (isset($configurator->tags['CODEBOX']))
		{
			unset($configurator->tags['CODEBOX']);
		}

		$configurator->BBCodes->addCustom(self::BBCODE_USAGE, self::BBCODE_TEMPLATE);

		// The content is code: no BBCodes, smilies, links or automatic line breaks inside
		$tag = $configurator->tags['CODEBOX'];
		$tag->rules->ignoreTags();
		$tag->rules->disableAutoLineBreaks();
		$tag->rules->preventLineBreaks();
	}

	/**
	 * Keep code containing [codebox] tags inside a single box
	 *
	 * @param \phpbb\event\data $event
	 */
	public function protect_nested_boxes($event)
	{
		$event['text'] = $this->code_helper->protect_nested($event['text']);
	}

	/**
	 * Turn the raw markup into the final code boxes
	 *
	 * @param \phpbb\event\data $event
	 */
	public function render_boxes($event)
	{
		if ($this->box_renderer->has_boxes($event['html']))
		{
			$event['html'] = $this->box_renderer->process($event['html']);
		}
	}

	/**
	 * Viewtopic: load the download counters of the page with one query
	 *
	 * @param \phpbb\event\data $event
	 */
	public function viewtopic_post_data($event)
	{
		if ($this->config['cbp_download'] && $this->config['cbp_show_dl_count'] && !empty($event['post_list']))
		{
			$this->counter->preload($event['post_list']);
		}
	}

	/**
	 * Deleted posts: remove their download counters
	 *
	 * @param \phpbb\event\data $event
	 */
	public function delete_posts($event)
	{
		if (!empty($event['post_ids']))
		{
			$this->counter->delete_posts((array) $event['post_ids']);
		}
	}

	/**
	 * Viewtopic: add the download links
	 *
	 * @param \phpbb\event\data $event
	 */
	public function viewtopic_post_row($event)
	{
		$post_row = $event['post_row'];

		if (isset($post_row['MESSAGE']))
		{
			$post_row['MESSAGE'] = $this->inject_download_links($post_row['MESSAGE'], (int) $event['row']['post_id']);
			$event['post_row'] = $post_row;
		}
	}

	/**
	 * Topic review (posting page): add the download links
	 *
	 * @param \phpbb\event\data $event
	 */
	public function topic_review_row($event)
	{
		$post_row = $event['post_row'];

		if (isset($post_row['MESSAGE']))
		{
			$post_row['MESSAGE'] = $this->inject_download_links($post_row['MESSAGE'], (int) $event['row']['post_id']);
			$event['post_row'] = $post_row;
		}
	}

	/**
	 * Search results: add the download links
	 *
	 * @param \phpbb\event\data $event
	 */
	public function search_row($event)
	{
		$tpl_ary = $event['tpl_ary'];

		if ($event['show_results'] === 'posts' && isset($tpl_ary['MESSAGE']) && !empty($event['row']['post_id']))
		{
			$tpl_ary['MESSAGE'] = $this->inject_download_links($tpl_ary['MESSAGE'], (int) $event['row']['post_id']);
			$event['tpl_ary'] = $tpl_ary;
		}
	}

	/**
	 * Fill the download link of every code box of a post
	 *
	 * @param string $html
	 * @param int    $post_id
	 * @return string
	 */
	public function inject_download_links($html, $post_id)
	{
		if (!$this->config['cbp_download'] || $post_id <= 0 || strpos($html, 'data-cbp-dl=""') === false)
		{
			return $html;
		}

		$html = preg_replace_callback('#data-cbp-hash="([0-9a-f]{20})" data-cbp-dl=""#', function ($m) use ($post_id) {
			$url = $this->helper->route('salvocortesiano_codeboxplus_download', array(
				'post_id'	=> $post_id,
				'hash'		=> $m[1],
			));

			$attr = 'data-cbp-hash="' . $m[1] . '" data-cbp-dl="' . utf8_htmlspecialchars($url) . '"';

			if ($this->config['cbp_show_dl_count'])
			{
				$attr .= ' data-cbp-downloads="' . (int) $this->counter->get_count($post_id, $m[1]) . '"';
			}

			return $attr;
		}, $html);

		return $html;
	}

	/**
	 * Template variables used by the CSS/JavaScript
	 */
	public function page_footer()
	{
		$editor = (bool) $this->config['cbp_editor_button'] && ($this->template->retrieve_var('S_BBCODE_ALLOWED') || $this->template->retrieve_var('S_QUICK_REPLY'));

		$this->template->assign_vars(array(
			'S_CBP_EDITOR'			=> $editor,
			'S_CBP_EDITOR_BUTTON'	=> $editor,
			'CBP_EDITOR_JSON'	=> $editor ? $this->get_editor_json() : '',
		));
	}

	/**
	 * Data used by the language picker of the editor
	 *
	 * @return string JSON (safe to be printed inside a <script> element)
	 */
	public function get_editor_json()
	{
		$this->language->add_lang('syntax', 'salvocortesiano/codeboxplus');

		$languages = array();
		foreach ($this->catalog->get_ids() as $id)
		{
			$languages[] = array(
				'id'	=> $id,
				'name'	=> $this->language->lang($this->catalog->get_lang_key($id)),
				'ext'	=> $this->catalog->get_extension($id),
			);
		}

		usort($languages, function ($a, $b) {
			return strnatcasecmp($a['name'], $b['name']);
		});

		$favorites = $this->catalog->parse_list($this->config['cbp_favorites']);

		return json_encode(array(
			'languages'	=> $languages,
			'favorites'	=> $favorites,
		), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
	}
}
