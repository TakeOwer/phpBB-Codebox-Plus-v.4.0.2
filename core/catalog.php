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
 * Catalogue of the supported languages.
 *
 * Every entry maps the identifier used inside the BBCode
 * ([codebox=IDENTIFIER]) to the GeSHi language file used to highlight it
 * and to the default file extension used when downloading the code.
 * Display names live in the language files (CBP_LANG_*).
 */
class catalog
{
	/** @var array id => array(geshi_file, extension) */
	protected static $languages = array(
		'4cs'             => array('4cs', 'txt'),
		'6502acme'        => array('6502acme', 'txt'),
		'6502kickass'     => array('6502kickass', 'txt'),
		'6502tasm'        => array('6502tasm', 'txt'),
		'68000devpac'     => array('68000devpac', 'txt'),
		'abap'            => array('abap', 'txt'),
		'actionscript'    => array('actionscript', 'as'),
		'actionscript3'   => array('actionscript3', 'as'),
		'ada'             => array('ada', 'ada'),
		'aimms'           => array('aimms', 'ams'),
		'algol68'         => array('algol68', 'txt'),
		'apache'          => array('apache', 'htaccess'),
		'applescript'     => array('applescript', 'scpt'),
		'apt_sources'     => array('apt_sources', 'txt'),
		'arm'             => array('arm', 'txt'),
		'asm'             => array('asm', 'asm'),
		'asp'             => array('asp', 'asp'),
		'asymptote'       => array('asymptote', 'txt'),
		'autoconf'        => array('autoconf', 'txt'),
		'autohotkey'      => array('autohotkey', 'ahk'),
		'autoit'          => array('autoit', 'au3'),
		'avisynth'        => array('avisynth', 'txt'),
		'awk'             => array('awk', 'txt'),
		'bascomavr'       => array('bascomavr', 'txt'),
		'bash'            => array('bash', 'bsh'),
		'basic4gl'        => array('basic4gl', 'txt'),
		'batch'           => array('batch', 'bat'),
		'bf'              => array('bf', 'txt'),
		'biblatex'        => array('biblatex', 'bib'),
		'bibtex'          => array('bibtex', 'txt'),
		'blitzbasic'      => array('blitzbasic', 'txt'),
		'bnf'             => array('bnf', 'txt'),
		'boo'             => array('boo', 'txt'),
		'c'               => array('c', 'c'),
		'c_loadrunner'    => array('c_loadrunner', 'txt'),
		'c_mac'           => array('c_mac', 'txt'),
		'c_winapi'        => array('c_winapi', 'c'),
		'caddcl'          => array('caddcl', 'txt'),
		'cadlisp'         => array('cadlisp', 'txt'),
		'cfdg'            => array('cfdg', 'txt'),
		'cfm'             => array('cfm', 'txt'),
		'chaiscript'      => array('chaiscript', 'txt'),
		'chapel'          => array('chapel', 'chpl'),
		'cil'             => array('cil', 'txt'),
		'clojure'         => array('clojure', 'txt'),
		'cmake'           => array('cmake', 'cmake'),
		'cobol'           => array('cobol', 'cbl'),
		'coffeescript'    => array('coffeescript', 'coffee'),
		'cpp'             => array('cpp', 'cpp'),
		'cpp-qt'          => array('cpp-qt', 'txt'),
		'cpp-winapi'      => array('cpp-winapi', 'cpp'),
		'csharp'          => array('csharp', 'cs'),
		'css'             => array('css', 'css'),
		'cuesheet'        => array('cuesheet', 'txt'),
		'd'               => array('d', 'd'),
		'dart'            => array('dart', 'dart'),
		'dcl'             => array('dcl', 'txt'),
		'dcpu16'          => array('dcpu16', 'txt'),
		'dcs'             => array('dcs', 'txt'),
		'delphi'          => array('delphi', 'pas'),
		'diff'            => array('diff', 'diff'),
		'div'             => array('div', 'txt'),
		'dos'             => array('dos', 'bat'),
		'dot'             => array('dot', 'txt'),
		'e'               => array('e', 'e'),
		'ecmascript'      => array('ecmascript', 'txt'),
		'eiffel'          => array('eiffel', 'txt'),
		'email'           => array('email', 'txt'),
		'epc'             => array('epc', 'txt'),
		'erlang'          => array('erlang', 'txt'),
		'euphoria'        => array('euphoria', 'txt'),
		'ezt'             => array('ezt', 'ezt'),
		'f1'              => array('f1', 'txt'),
		'falcon'          => array('falcon', 'txt'),
		'fo'              => array('fo', 'txt'),
		'fortran'         => array('fortran', 'f'),
		'freebasic'       => array('freebasic', 'txt'),
		'freeswitch'      => array('freeswitch', 'txt'),
		'fsharp'          => array('fsharp', 'fs'),
		'gambas'          => array('gambas', 'txt'),
		'gdb'             => array('gdb', 'txt'),
		'genero'          => array('genero', 'txt'),
		'genie'           => array('genie', 'txt'),
		'gettext'         => array('gettext', 'txt'),
		'glsl'            => array('glsl', 'txt'),
		'gml'             => array('gml', 'txt'),
		'gnuplot'         => array('gnuplot', 'txt'),
		'go'              => array('go', 'txt'),
		'groovy'          => array('groovy', 'txt'),
		'gwbasic'         => array('gwbasic', 'txt'),
		'haskell'         => array('haskell', 'hs'),
		'haxe'            => array('haxe', 'txt'),
		'hicest'          => array('hicest', 'txt'),
		'hlsl'            => array('hlsl', 'hlsl'),
		'hq9plus'         => array('hq9plus', 'txt'),
		'html4strict'     => array('html4strict', 'html'),
		'html5'           => array('html5', 'html'),
		'icon'            => array('icon', 'txt'),
		'idl'             => array('idl', 'txt'),
		'ini'             => array('ini', 'ini'),
		'inno'            => array('inno', 'iss'),
		'intercal'        => array('intercal', 'i'),
		'io'              => array('io', 'txt'),
		'ispfpanel'       => array('ispfpanel', 'txt'),
		'j'               => array('j', 'txt'),
		'java'            => array('java', 'java'),
		'java5'           => array('java5', 'java'),
		'javascript'      => array('javascript', 'js'),
		'jquery'          => array('jquery', 'js'),
		'json'            => array('javascript', 'json'),
		'julia'           => array('julia', 'jl'),
		'kixtart'         => array('kixtart', 'kix'),
		'klonec'          => array('klonec', 'txt'),
		'klonecpp'        => array('klonecpp', 'txt'),
		'kotlin'          => array('kotlin', 'kt'),
		'latex'           => array('latex', 'tex'),
		'lb'              => array('lb', 'txt'),
		'ldif'            => array('ldif', 'txt'),
		'lisp'            => array('lisp', 'txt'),
		'llvm'            => array('llvm', 'txt'),
		'locobasic'       => array('locobasic', 'txt'),
		'logtalk'         => array('logtalk', 'txt'),
		'lolcode'         => array('lolcode', 'txt'),
		'lotusformulas'   => array('lotusformulas', 'txt'),
		'lotusscript'     => array('lotusscript', 'txt'),
		'lscript'         => array('lscript', 'txt'),
		'lsl2'            => array('lsl2', 'txt'),
		'lua'             => array('lua', 'lua'),
		'm68k'            => array('m68k', 'txt'),
		'magiksf'         => array('magiksf', 'txt'),
		'make'            => array('make', 'make'),
		'mapbasic'        => array('mapbasic', 'txt'),
		'matlab'          => array('matlab', 'm'),
		'mercury'         => array('mercury', 'm'),
		'metapost'        => array('metapost', 'mp'),
		'mirc'            => array('mirc', 'txt'),
		'mk-61'           => array('mk-61', 'txt'),
		'mmix'            => array('mmix', 'txt'),
		'modula2'         => array('modula2', 'txt'),
		'modula3'         => array('modula3', 'txt'),
		'mpasm'           => array('mpasm', 'txt'),
		'mxml'            => array('mxml', 'txt'),
		'mysql'           => array('mysql', 'sql'),
		'nagios'          => array('nagios', 'txt'),
		'netrexx'         => array('netrexx', 'txt'),
		'newlisp'         => array('newlisp', 'txt'),
		'nginx'           => array('nginx', 'conf'),
		'nim'             => array('nim', 'nim'),
		'nsis'            => array('nsis', 'nsi'),
		'oberon2'         => array('oberon2', 'txt'),
		'objc'            => array('objc', 'txt'),
		'objeck'          => array('objeck', 'txt'),
		'ocaml'           => array('ocaml', 'txt'),
		'ocaml-brief'     => array('ocaml-brief', 'txt'),
		'octave'          => array('octave', 'txt'),
		'oobas'           => array('oobas', 'txt'),
		'oorexx'          => array('oorexx', 'txt'),
		'oracle11'        => array('oracle11', 'sql'),
		'oracle8'         => array('oracle8', 'sql'),
		'oxygene'         => array('oxygene', 'txt'),
		'oz'              => array('oz', 'txt'),
		'parasail'        => array('parasail', 'txt'),
		'parigp'          => array('parigp', 'txt'),
		'pascal'          => array('pascal', 'pas'),
		'pcre'            => array('pcre', 'pl'),
		'per'             => array('per', 'txt'),
		'perl'            => array('perl', 'pl'),
		'perl6'           => array('perl6', 'pl'),
		'pf'              => array('pf', 'txt'),
		'phix'            => array('phix', 'exw'),
		'php'             => array('php', 'php'),
		'php-brief'       => array('php-brief', 'php'),
		'pic16'           => array('pic16', 'txt'),
		'pike'            => array('pike', 'txt'),
		'pixelbender'     => array('pixelbender', 'txt'),
		'pli'             => array('pli', 'txt'),
		'plsql'           => array('plsql', 'txt'),
		'postgresql'      => array('postgresql', 'sql'),
		'postscript'      => array('postscript', 'ps'),
		'povray'          => array('povray', 'txt'),
		'powerbuilder'    => array('powerbuilder', 'txt'),
		'powershell'      => array('powershell', 'ps1'),
		'proftpd'         => array('proftpd', 'txt'),
		'progress'        => array('progress', 'txt'),
		'prolog'          => array('prolog', 'txt'),
		'properties'      => array('properties', 'properties'),
		'providex'        => array('providex', 'txt'),
		'purebasic'       => array('purebasic', 'txt'),
		'pycon'           => array('pycon', 'txt'),
		'pys60'           => array('pys60', 'txt'),
		'python'          => array('python', 'py'),
		'q'               => array('q', 'txt'),
		'qbasic'          => array('qbasic', 'txt'),
		'racket'          => array('racket', 'rkt'),
		'rails'           => array('rails', 'txt'),
		'rbs'             => array('rbs', 'rbs'),
		'rebol'           => array('rebol', 'txt'),
		'reg'             => array('reg', 'reg'),
		'rexx'            => array('rexx', 'txt'),
		'robots'          => array('robots', 'txt'),
		'roff'            => array('roff', 'roff'),
		'rpmspec'         => array('rpmspec', 'txt'),
		'rsplus'          => array('rsplus', 'txt'),
		'ruby'            => array('ruby', 'rb'),
		'rust'            => array('rust', 'rs'),
		'sas'             => array('sas', 'txt'),
		'sass'            => array('sass', 'sass'),
		'scala'           => array('scala', 'txt'),
		'scheme'          => array('scheme', 'scm'),
		'scilab'          => array('scilab', 'txt'),
		'scl'             => array('scl', 'scl'),
		'sdlbasic'        => array('sdlbasic', 'txt'),
		'smalltalk'       => array('smalltalk', 'st'),
		'smarty'          => array('smarty', 'txt'),
		'spark'           => array('spark', 'txt'),
		'sparql'          => array('sparql', 'txt'),
		'sql'             => array('sql', 'sql'),
		'sshconfig'       => array('sshconfig', 'config'),
		'standardml'      => array('standardml', 'sml'),
		'stonescript'     => array('stonescript', 'txt'),
		'swift'           => array('swift', 'swift'),
		'systemverilog'   => array('systemverilog', 'txt'),
		'tcl'             => array('tcl', 'txt'),
		'tclegg'          => array('tclegg', 'tcl'),
		'teraterm'        => array('teraterm', 'txt'),
		'texgraph'        => array('texgraph', 'txt'),
		'text'            => array('text', 'txt'),
		'thinbasic'       => array('thinbasic', 'txt'),
		'tsql'            => array('tsql', 'txt'),
		'twig'            => array('twig', 'twig'),
		'typescript'      => array('javascript', 'ts'),
		'typoscript'      => array('typoscript', 'txt'),
		'unicon'          => array('unicon', 'txt'),
		'upc'             => array('upc', 'txt'),
		'urbi'            => array('urbi', 'txt'),
		'uscript'         => array('uscript', 'txt'),
		'usd'             => array('usd', 'usda'),
		'vala'            => array('vala', 'txt'),
		'vb'              => array('vb', 'vb'),
		'vbnet'           => array('vbnet', 'vb'),
		'vbscript'        => array('vbscript', 'vbs'),
		'vedit'           => array('vedit', 'txt'),
		'verilog'         => array('verilog', 'v'),
		'vhdl'            => array('vhdl', 'vhdl'),
		'vim'             => array('vim', 'txt'),
		'visualfoxpro'    => array('visualfoxpro', 'txt'),
		'visualprolog'    => array('visualprolog', 'txt'),
		'whitespace'      => array('whitespace', 'txt'),
		'whois'           => array('whois', 'txt'),
		'winbatch'        => array('winbatch', 'txt'),
		'wolfram'         => array('wolfram', 'wl'),
		'xbasic'          => array('xbasic', 'txt'),
		'xml'             => array('xml', 'xml'),
		'xojo'            => array('xojo', 'xojo_code'),
		'xorg_conf'       => array('xorg_conf', 'txt'),
		'xpp'             => array('xpp', 'txt'),
		'yaml'            => array('yaml', 'yml'),
		'z80'             => array('z80', 'txt'),
		'zxbasic'         => array('zxbasic', 'txt'),
	);

	/** @var array Common aliases written by users => catalogue id */
	protected static $aliases = array(
		'js'			=> 'javascript',
		'ts'			=> 'typescript',
		'html'			=> 'html5',
		'htm'			=> 'html5',
		'xhtml'			=> 'xml',
		'svg'			=> 'xml',
		'py'			=> 'python',
		'python3'		=> 'python',
		'sh'			=> 'bash',
		'shell'			=> 'bash',
		'zsh'			=> 'bash',
		'yml'			=> 'yaml',
		'cs'			=> 'csharp',
		'kt'			=> 'kotlin',
		'rs'			=> 'rust',
		'golang'		=> 'go',
		'vbs'			=> 'vbscript',
		'bat'			=> 'batch',
		'cmd'			=> 'batch',
		'ps1'			=> 'powershell',
		'txt'			=> 'text',
		'plain'			=> 'text',
		'plaintext'		=> 'text',
		'none'			=> 'text',
		'c++'			=> 'cpp',
		'htaccess'		=> 'apache',
		'mariadb'		=> 'mysql',
		'scss'			=> 'css',
		'less'			=> 'css',
		'patch'			=> 'diff',
		'rb'			=> 'ruby',
		'pl'			=> 'perl',
		'md'			=> 'text',
		'markdown'		=> 'text',
	);

	/** @var array Default "popular" languages shown on top of the picker */
	const DEFAULT_FAVORITES = 'php,javascript,html5,css,sql,mysql,python,bash,json,xml,cpp,csharp,java,ini,apache,text';

	/**
	 * Normalise an identifier and resolve aliases
	 *
	 * @param string $id Identifier written in the BBCode
	 * @return string A valid catalogue identifier ("text" when unknown)
	 */
	public function resolve($id)
	{
		$id = strtolower(trim((string) $id));

		if (isset(self::$languages[$id]))
		{
			return $id;
		}

		if (isset(self::$aliases[$id]))
		{
			return self::$aliases[$id];
		}

		return 'text';
	}

	/**
	 * @param string $id
	 * @return bool
	 */
	public function exists($id)
	{
		$id = strtolower(trim((string) $id));

		return isset(self::$languages[$id]) || isset(self::$aliases[$id]);
	}

	/**
	 * GeSHi language file for an identifier
	 *
	 * @param string $id
	 * @return string
	 */
	public function get_geshi($id)
	{
		$id = $this->resolve($id);

		return self::$languages[$id][0];
	}

	/**
	 * Default file extension for an identifier
	 *
	 * @param string $id
	 * @return string
	 */
	public function get_extension($id)
	{
		$id = $this->resolve($id);

		return self::$languages[$id][1];
	}

	/**
	 * Language key holding the display name of an identifier
	 *
	 * @param string $id
	 * @return string
	 */
	public function get_lang_key($id)
	{
		return 'CBP_LANG_' . preg_replace('/[^A-Z0-9]/', '_', strtoupper($this->resolve($id)));
	}

	/**
	 * All catalogue identifiers
	 *
	 * @return array
	 */
	public function get_ids()
	{
		return array_keys(self::$languages);
	}

	/**
	 * Number of supported languages
	 *
	 * @return int
	 */
	public function count()
	{
		return count(self::$languages);
	}

	/**
	 * Parse a comma separated list of identifiers, keeping only valid ones
	 *
	 * @param string $list
	 * @return array
	 */
	public function parse_list($list)
	{
		$ids = array();

		foreach (explode(',', (string) $list) as $id)
		{
			$id = strtolower(trim($id));

			if ($id !== '' && $this->exists($id))
			{
				$ids[] = $this->resolve($id);
			}
		}

		return array_values(array_unique($ids));
	}
}
