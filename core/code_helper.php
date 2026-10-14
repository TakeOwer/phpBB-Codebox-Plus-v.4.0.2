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
 * Helpers shared by the renderer and the download controller.
 *
 * The very same normalisation is applied to the code read from the rendered
 * HTML and to the code read from the stored XML, so both produce the same
 * fingerprint: the download link carries that fingerprint, which means only
 * code that the user has actually seen can be downloaded (hidden BBCodes
 * such as [hide] cannot be bypassed).
 */
class code_helper
{
	/**
	 * Normalise line endings and remove the first/last empty line
	 *
	 * @param string $code
	 * @return string
	 */
	public function normalize($code)
	{
		$code = str_replace(array("\r\n", "\r"), "\n", (string) $code);

		// Remove a single leading new line ([codebox]\ncode)
		if (strpos($code, "\n") === 0)
		{
			$code = substr($code, 1);
		}

		// Remove trailing new lines / blanks at the very end
		return rtrim($code, "\n\t ");
	}

	/**
	 * Convert the HTML produced by the text formatter back into plain text
	 *
	 * @param string $html
	 * @return string
	 */
	public function html_to_text($html)
	{
		// Line breaks: the new line character is kept after <br>
		$html = preg_replace('#<br\s*/?>#i', '', $html);

		// Smilies / emoji: keep their textual code
		$html = preg_replace_callback('#<img\b[^>]*?\balt="([^"]*)"[^>]*>#i', function ($m) {
			return $m[1];
		}, $html);

		$html = strip_tags($html);

		return $this->normalize(html_entity_decode($html, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
	}

	/**
	 * Extract every code block from a stored (s9e XML) post text
	 *
	 * @param string $xml Stored post_text
	 * @return array List of array('lang' => string, 'file' => string, 'code' => string)
	 */
	public function extract_from_xml($xml)
	{
		$blocks = array();
		$xml = (string) $xml;

		if (stripos($xml, 'codebox') === false)
		{
			return $blocks;
		}

		// Legacy (phpBB 3.0/3.1, not yet reparsed) storage format
		if (!preg_match('#^<[rt][ >/]#', $xml))
		{
			return $this->extract_from_legacy($xml);
		}

		$dom = new \DOMDocument('1.0', 'UTF-8');
		$previous = libxml_use_internal_errors(true);
		$loaded = $dom->loadXML($xml, LIBXML_NONET);
		libxml_clear_errors();
		libxml_use_internal_errors($previous);

		if (!$loaded)
		{
			return $blocks;
		}

		foreach ($dom->getElementsByTagName('CODEBOX') as $node)
		{
			$blocks[] = array(
				'lang'	=> $node->getAttribute('codebox'),
				'file'	=> $node->getAttribute('file'),
				'code'	=> $this->normalize($this->node_text($node, true)),
			);
		}

		return $blocks;
	}

	/**
	 * Text content of a node, without the BBCode markup and the ignored text
	 *
	 * @param \DOMNode $node
	 * @param bool     $root
	 * @return string
	 */
	protected function node_text(\DOMNode $node, $root = false)
	{
		$text = '';

		foreach ($node->childNodes as $child)
		{
			if ($child->nodeType === XML_TEXT_NODE || $child->nodeType === XML_CDATA_SECTION_NODE)
			{
				$text .= $child->nodeValue;
			}
			else if ($child->nodeType === XML_ELEMENT_NODE)
			{
				// BBCode markup (<s>/<e>) and ignored text (<i>) are not displayed
				if ($child->nodeName === 's' || $child->nodeName === 'e' || $child->nodeName === 'i')
				{
					continue;
				}

				$text .= $this->node_text($child);
			}
		}

		return $text;
	}

	/**
	 * Extract code blocks from a legacy (pre s9e) post text
	 *
	 * @param string $text
	 * @return array
	 */
	protected function extract_from_legacy($text)
	{
		$blocks = array();

		if (preg_match_all('#\[codebox=([a-z0-9_+-]*) file=(.*?):[a-z0-9]{5,8}\](.*?)\[/codebox:[a-z0-9]{5,8}\]#msi', $text, $matches, PREG_SET_ORDER))
		{
			foreach ($matches as $m)
			{
				$blocks[] = array(
					'lang'	=> $m[1],
					'file'	=> $m[2],
					'code'	=> $this->html_to_text($m[3]),
				);
			}
		}

		return $blocks;
	}

	/**
	 * Fingerprint of a code block (used in the download links)
	 *
	 * @param string $code Normalised code
	 * @return string 20 hex chars
	 */
	public function fingerprint($code)
	{
		return substr(hash('sha256', (string) $code), 0, 20);
	}

	/**
	 * Build a safe file name for a download
	 *
	 * @param string $file      File name written by the author (may be empty)
	 * @param string $default   Default base name (from the language files)
	 * @param string $extension Default extension for the language
	 * @return string
	 */
	public function safe_filename($file, $default, $extension)
	{
		$file = trim((string) $file);
		$file = preg_replace('#[^\p{L}\p{N}._+\- ]+#u', '', $file);
		$file = trim(preg_replace('#\s+#', '_', $file), '._ ');

		if ($file === '')
		{
			$default = preg_replace('#[^\p{L}\p{N}_\-]+#u', '_', (string) $default);
			$file = ($default !== '' ? $default : 'code') . '.' . $extension;
		}
		else if (strpos($file, '.') === false)
		{
			$file .= '.' . $extension;
		}

		return utf8_substr($file, 0, 120);
	}

	/**
	 * Protect code boxes whose content contains [codebox] tags (e.g. the
	 * source code of a BBCode or of this very extension).
	 *
	 * The outer box receives a unique suffix ([codebox:101=php]...[/codebox:101])
	 * so the text formatter closes it at the right tag and the content is
	 * kept exactly as written. Boxes already using a suffix are left alone.
	 *
	 * @param string $text Text written by the user
	 * @return string
	 */
	public function protect_nested($text)
	{
		$text = (string) $text;

		if (stripos($text, '[/codebox]') === false || stripos($text, '[codebox') === false)
		{
			return $text;
		}

		// Areas already protected by a suffix are opaque
		$skip = array();
		if (preg_match_all('#\[codebox:(\w+)[^\]]*\].*?\[/codebox:\1\]#is', $text, $m, PREG_OFFSET_CAPTURE))
		{
			foreach ($m[0] as $match)
			{
				$skip[] = array($match[1], $match[1] + strlen($match[0]));
			}
		}

		if (!preg_match_all('#\[codebox(?:[=\s][^\[\]\n]*)?\]|\[/codebox\]#i', $text, $m, PREG_OFFSET_CAPTURE))
		{
			return $text;
		}

		$tokens = array();
		foreach ($m[0] as $match)
		{
			foreach ($skip as $range)
			{
				if ($match[1] >= $range[0] && $match[1] < $range[1])
				{
					continue 2;
				}
			}

			$tokens[] = array(
				'pos'	=> $match[1],
				'len'	=> strlen($match[0]),
				'open'	=> $match[0][1] !== '/',
			);
		}

		$count = count($tokens);
		$replace = array();
		$suffix = 100;
		$i = 0;

		while ($i < $count)
		{
			if (!$tokens[$i]['open'])
			{
				$i++;
				continue;
			}

			// Balanced closing tag...
			$close = -1;
			$depth = 0;
			for ($j = $i; $j < $count; $j++)
			{
				$depth += $tokens[$j]['open'] ? 1 : -1;
				if ($depth === 0)
				{
					$close = $j;
					break;
				}
			}

			// ...or, with unbalanced tags inside the code, the last closing tag
			if ($close === -1)
			{
				for ($j = $count - 1; $j > $i; $j--)
				{
					if (!$tokens[$j]['open'])
					{
						$close = $j;
						break;
					}
				}
			}

			if ($close === -1)
			{
				break;
			}

			// Extra closing tags written in the code ("[/codebox]" inside a string):
			// the box ends at the last closing tag before the next opening tag
			while ($close + 1 < $count && !$tokens[$close + 1]['open'])
			{
				$close++;
			}

			// Only boxes with [codebox] tags inside need the suffix
			if ($close - $i > 1)
			{
				// The suffix must not already be used inside the text
				do
				{
					$suffix++;
				}
				while (stripos($text, ':' . $suffix . ']') !== false || stripos($text, ':' . $suffix . '=') !== false || stripos($text, ':' . $suffix . ' ') !== false);

				$replace[] = array($tokens[$i]['pos'] + 8, 0, ':' . $suffix);
				$replace[] = array($tokens[$close]['pos'], $tokens[$close]['len'], '[/codebox:' . $suffix . ']');
			}

			$i = $close + 1;
		}

		// Apply from the end so that the offsets stay valid
		usort($replace, function ($a, $b) {
			return $b[0] - $a[0];
		});

		foreach ($replace as $r)
		{
			$text = substr_replace($text, $r[2], $r[0], $r[1]);
		}

		return $text;
	}
}
