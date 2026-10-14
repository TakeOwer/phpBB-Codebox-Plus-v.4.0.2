/**
 * Codebox Plus - front-end script
 *
 * @copyright (c) 2014 o0johntam0o (Huynh Buu Tam) - original author
 * @copyright (c) 2026 Salvo Cortesiano - phpBB 3.3 rewrite
 * @license GPL-2.0-only
 */
(function (window, document) {
	'use strict';

	if (window.cbpLoaded) {
		return;
	}
	window.cbpLoaded = true;

	var config = window.cbpConfig || {};
	var lang = config.lang || {};

	function t(key, fallback) {
		return (lang[key] !== undefined && lang[key] !== '') ? lang[key] : (fallback || key);
	}

	function closest(el, selector) {
		while (el && el.nodeType === 1) {
			if (el.matches(selector)) {
				return el;
			}
			el = el.parentNode;
		}
		return null;
	}

	/* ------------------------------------------------------------ */
	/* Code boxes                                                    */
	/* ------------------------------------------------------------ */

	function getCode(box) {
		var lines = box.querySelectorAll('.cbp-l');
		var out = [];
		for (var i = 0; i < lines.length; i++) {
			out.push(lines[i].textContent.replace(/ /g, ' '));
		}
		return out.join('\n');
	}

	function flash(button, className, label) {
		var txt = button.querySelector('.cbp-btn-txt');
		var old = txt ? txt.textContent : null;

		button.classList.add(className);
		if (txt && label) {
			txt.textContent = label;
		}
		button.setAttribute('title', label || button.getAttribute('title'));

		window.clearTimeout(button.cbpTimer);
		button.cbpTimer = window.setTimeout(function () {
			button.classList.remove(className);
			if (txt && old !== null) {
				txt.textContent = old;
			}
			button.setAttribute('title', button.getAttribute('aria-label'));
		}, 1800);
	}

	function fallbackCopy(text) {
		var area = document.createElement('textarea');
		area.value = text;
		area.setAttribute('readonly', '');
		area.style.position = 'fixed';
		area.style.top = '-1000px';
		area.style.opacity = '0';
		document.body.appendChild(area);
		area.select();
		var ok = false;
		try {
			ok = document.execCommand('copy');
		} catch (e) {
			ok = false;
		}
		document.body.removeChild(area);
		return ok;
	}

	function copy(box, button) {
		var text = getCode(box);

		var done = function () {
			flash(button, 'cbp-done', t('copied', 'Copied!'));
		};
		var fail = function () {
			if (fallbackCopy(text)) {
				done();
			} else {
				flash(button, 'cbp-fail', t('copyFailed', 'Copy failed'));
			}
		};

		if (navigator.clipboard && window.isSecureContext) {
			navigator.clipboard.writeText(text).then(done, fail);
		} else {
			fail();
		}
	}

	function select(box) {
		var code = box.querySelector('.cbp-code');
		if (!code || !window.getSelection) {
			return;
		}
		var range = document.createRange();
		range.selectNodeContents(code);
		var sel = window.getSelection();
		sel.removeAllRanges();
		sel.addRange(range);
	}

	function download(box) {
		var url = box.getAttribute('data-cbp-dl');
		var login = box.getAttribute('data-cbp-login');

		// Server download: permissions, bots, captcha and counter are checked there
		if (url) {
			serverDownload(box, url);
			return;
		}

		if (login) {
			window.location.href = login;
			return;
		}

		// Previews, private messages...: build the file in the browser
		localDownload(box);
	}

	/* Light/dark detection: follow the colours of the forum style */

	function parseColor(value) {
		var m = /rgba?\(\s*([\d.]+)[\s,]+([\d.]+)[\s,]+([\d.]+)(?:[\s,\/]+([\d.]+%?))?\s*\)/.exec(value || '');
		if (!m) {
			return null;
		}
		var a = m[4] === undefined ? 1 : (m[4].indexOf('%') > -1 ? parseFloat(m[4]) / 100 : parseFloat(m[4]));
		return {r: +m[1], g: +m[2], b: +m[3], a: a};
	}

	function isDarkAt(el) {
		while (el && el.nodeType === 1) {
			var c = parseColor(window.getComputedStyle(el).backgroundColor);
			if (c && c.a >= 0.5) {
				return (0.299 * c.r + 0.587 * c.g + 0.114 * c.b) / 255 < 0.5;
			}
			el = el.parentElement;
		}
		return false;
	}

	function applyScheme(box) {
		if (!box.classList.contains('cbp-theme-auto')) {
			return;
		}
		var dark = isDarkAt(box.parentElement);
		box.classList.toggle('cbp-scheme-dark', dark);
		box.classList.toggle('cbp-scheme-light', !dark);
	}

	var fullBox = null;

	function setFullscreen(box, on) {
		if (on && box.classList.contains('cbp-folded')) {
			toggleFold(box, box.querySelector('[data-cbp-act="fold"]'));
		}
		var button = box.querySelector('[data-cbp-act="expand"]');

		box.classList.toggle('cbp-full', on);
		document.documentElement.classList.toggle('cbp-noscroll', on);

		if (button) {
			var label = on ? t('exitFullscreen', 'Exit full screen') : t('fullscreen', 'Full screen');
			button.classList.toggle('cbp-active', on);
			button.setAttribute('title', label);
			button.setAttribute('aria-label', label);
		}

		fullBox = on ? box : null;

		if (on) {
			var body = box.querySelector('.cbp-body');
			if (body) {
				body.focus({preventScroll: true});
			}
		}
	}

	/* Folded boxes are remembered in the browser (per post and code block) */

	var FOLD_KEY = 'cbp_folded';
	var FOLD_MAX = 500;

	function foldId(box) {
		var hash = box.getAttribute('data-cbp-hash');
		if (!hash) {
			return null;
		}
		var post = closest(box, '[id^="p"].post, .post[id^="p"], [data-post-id]');
		var postId = post ? (post.getAttribute('data-post-id') || post.id) : '';
		return (postId ? postId + ':' : '') + hash;
	}

	function readFolded() {
		try {
			var data = JSON.parse(window.localStorage.getItem(FOLD_KEY) || '{}');
			return (data && typeof data === 'object') ? data : {};
		} catch (e) {
			return {};
		}
	}

	function saveFolded(box, folded) {
		var id = foldId(box);
		if (!id) {
			return;
		}
		try {
			var data = readFolded();
			if (folded) {
				data[id] = Date.now();
				// Keep only the most recent entries
				var keys = Object.keys(data);
				if (keys.length > FOLD_MAX) {
					keys.sort(function (a, b) {
						return data[a] - data[b];
					});
					for (var i = 0; i < keys.length - FOLD_MAX; i++) {
						delete data[keys[i]];
					}
				}
			} else {
				delete data[id];
			}
			window.localStorage.setItem(FOLD_KEY, JSON.stringify(data));
		} catch (e) {
			// Storage not available (private mode...): the choice lasts until the page is reloaded
		}
	}

	function toggleFold(box, dot, skipSave) {
		var folded = !box.classList.contains('cbp-folded');
		var label = folded ? t('unfold', 'Restore the box') : t('fold', 'Fold the box');

		if (folded && box.classList.contains('cbp-full')) {
			setFullscreen(box, false);
		}

		box.classList.toggle('cbp-folded', folded);
		if (!skipSave) {
			saveFolded(box, folded);
		}
		if (dot) {
			dot.setAttribute('title', label);
			dot.setAttribute('aria-label', label);
			dot.setAttribute('aria-expanded', folded ? 'false' : 'true');
		}
		refresh(box);
	}

	function toggleMore(box, button) {
		var open = !box.classList.contains('cbp-open');
		var txt = button.querySelector('.cbp-btn-txt');
		var icon = button.querySelector('.fa');

		if (!button.hasAttribute('data-cbp-label')) {
			button.setAttribute('data-cbp-label', button.getAttribute('aria-label') || (txt ? txt.textContent : ''));
		}

		var label = open ? t('showLess', 'Show less') : button.getAttribute('data-cbp-label');

		box.classList.toggle('cbp-open', open);
		if (txt) {
			txt.textContent = label;
		}
		if (icon) {
			icon.classList.toggle('fa-angle-double-down', !open);
			icon.classList.toggle('fa-angle-double-up', open);
		}
		button.setAttribute('title', label);
		button.setAttribute('aria-label', label);
		button.setAttribute('aria-expanded', open ? 'true' : 'false');
		button.classList.toggle('cbp-active', open);

		if (!open) {
			var rect = box.getBoundingClientRect();
			if (rect.top < 0) {
				box.scrollIntoView({block: 'start'});
			}
		}
		refresh(box);
	}

	function refresh(box) {
		var body = box.querySelector('.cbp-body');
		var more = box.querySelector('[data-cbp-act="toggle"]');

		if (!body) {
			return;
		}

		var overflow = box.classList.contains('cbp-collapsible') && !box.classList.contains('cbp-open') && body.scrollHeight > body.clientHeight + 2;
		body.classList.toggle('cbp-overflow', overflow);

		if (more) {
			more.hidden = !(overflow || box.classList.contains('cbp-open'));
		}

		var dot = box.querySelector('.cbp-dot[data-cbp-act="more"]');
		if (dot) {
			var usable = !!more && !more.hidden && !box.classList.contains('cbp-folded');
			var label = usable ? (more.getAttribute('aria-label') || t('more', 'Show the whole code')) : t('moreNa', 'The whole code is already visible');
			dot.disabled = !usable;
			dot.setAttribute('title', label);
			dot.setAttribute('aria-label', label);
		}
	}

	function init(root) {
		var boxes = (root || document).querySelectorAll('div.cbp:not([data-cbp-ready])');
		var folded = boxes.length ? readFolded() : {};
		var marks = boxes.length ? readMarks() : {};

		for (var i = 0; i < boxes.length; i++) {
			var box = boxes[i];
			box.setAttribute('data-cbp-ready', '1');
			applyScheme(box);

			// Restore the folded state chosen by the user
			var foldDot = box.querySelector('[data-cbp-act="fold"]');
			if (foldDot && folded[foldId(box)]) {
				toggleFold(box, foldDot, true);
			}

			var wrap = box.querySelector('[data-cbp-act="wrap"]');
			if (wrap) {
				wrap.classList.toggle('cbp-active', box.classList.contains('cbp-wrap'));
			}
			var lines = box.querySelector('[data-cbp-act="lines"]');
			if (lines) {
				lines.classList.toggle('cbp-active', !box.classList.contains('cbp-nolines'));
			}

			toolsInit(box, marks);
			refresh(box);
		}
	}

	function isGutterClick(line, event) {
		if (closest(line, '.cbp').classList.contains('cbp-nolines')) {
			return false;
		}
		var before = window.getComputedStyle(line, '::before');
		var width = parseFloat(before.width) || 0;
		var body = closest(line, '.cbp-body');
		var left = body ? body.getBoundingClientRect().left : line.getBoundingClientRect().left;

		return event.clientX - left <= width;
	}

	document.addEventListener('click', function (event) {
		var target = event.target;
		var actionEl = closest(target, '[data-cbp-act]');
		var box = closest(target, 'div.cbp');

		if (!box) {
			return;
		}

		if (actionEl) {
			event.preventDefault();

			switch (actionEl.getAttribute('data-cbp-act')) {
				case 'copy':
					copy(box, actionEl);
				break;

				case 'select':
					select(box);
				break;

				case 'wrap':
					box.classList.toggle('cbp-wrap');
					actionEl.classList.toggle('cbp-active', box.classList.contains('cbp-wrap'));
					refresh(box);
				break;

				case 'lines':
					box.classList.toggle('cbp-nolines');
					actionEl.classList.toggle('cbp-active', !box.classList.contains('cbp-nolines'));
				break;

				case 'expand':
					setFullscreen(box, !box.classList.contains('cbp-full'));
				break;

				case 'download':
					download(box);
				break;

				case 'search':
					if (box.cbpFind && box.cbpFind.bar) {
						closeFind(box);
					} else {
						var selected = String(window.getSelection ? window.getSelection() : '').trim();
						openFind(box, selected && selected.indexOf('\n') === -1 && selected.length < 200 && box.contains(window.getSelection().anchorNode) ? selected : '');
					}
				break;

				case 'menu':
					// A click on the button while its menu is open only closes it
					if (!(lastClosed && lastClosed.box === box && !lastClosed.context && Date.now() - lastClosed.time < 400)) {
						openOptions(box, actionEl, event.detail === 0);
					}
					lastClosed = null;
				break;

				case 'toggle':
					toggleMore(box, actionEl);
				break;

				case 'fold':
					toggleFold(box, actionEl);
				break;

				case 'more':
					var moreButton = box.querySelector('[data-cbp-act="toggle"]');
					if (moreButton && !moreButton.hidden) {
						toggleMore(box, moreButton);
					}
				break;
			}
			return;
		}

		// Click on a line number: highlight the line
		var line = closest(target, '.cbp-l');
		if (line && target === line && isGutterClick(line, event)) {
			toggleLineMark(box, line, 'y', event.shiftKey);
		}
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && fullBox) {
			setFullscreen(fullBox, false);
		}
	});

	/* ------------------------------------------------------------ */
	/* 4.0.6: download counter and progress, editor tools            */
	/* ------------------------------------------------------------ */

	function fmt(str, a, b) {
		return String(str)
			.replace(/%1\$[sd]/g, a).replace(/%2\$[sd]/g, b)
			.replace(/%d|%s/, a)
			.replace(/%%/g, '%');
	}

	function midArea(box) {
		return box.querySelector('.cbp-mid');
	}

	/* ---------- Download counter ---------- */

	function showCount(box) {
		var el = box.querySelector('.cbp-dlcount');
		var raw = box.getAttribute('data-cbp-downloads');
		if (!el || raw === null || raw === '') {
			return;
		}
		var n = parseInt(raw, 10) || 0;
		var text = n === 0 ? t('dlCount0', 'Never downloaded') : (n === 1 ? fmt(t('dlCount1', 'Downloaded %d time'), n) : fmt(t('dlCountN', 'Downloaded %d times'), n));
		el.innerHTML = '<i class="icon fa fa-download fa-fw" aria-hidden="true"></i><span class="cbp-dl-long"></span><span class="cbp-dl-short"></span>';
		el.querySelector('.cbp-dl-long').textContent = text;
		el.querySelector('.cbp-dl-short').textContent = String(n);
		el.title = text;
		el.hidden = false;
	}

	/* ---------- Download with real progress ---------- */

	function progressStart(box) {
		var mid = midArea(box);
		if (!mid) {
			return null;
		}
		var wrap = document.createElement('span');
		wrap.className = 'cbp-progress';
		wrap.setAttribute('role', 'progressbar');
		wrap.innerHTML = '<span class="cbp-progress-bar"><i></i></span><span class="cbp-progress-txt"></span>';
		mid.appendChild(wrap);
		box.classList.add('cbp-busy');
		progressSet(wrap, 0);
		return wrap;
	}

	function progressSet(wrap, percent) {
		if (!wrap) {
			return;
		}
		percent = Math.max(0, Math.min(100, Math.round(percent)));
		wrap.querySelector('i').style.width = percent + '%';
		wrap.querySelector('.cbp-progress-txt').textContent = percent + '%';
		wrap.setAttribute('aria-valuenow', String(percent));
		wrap.title = fmt(t('dlProgress', 'Downloading %d%%'), percent);
	}

	function progressEnd(box, wrap, ok) {
		if (!wrap) {
			return;
		}
		if (ok) {
			progressSet(wrap, 100);
			wrap.querySelector('.cbp-progress-txt').textContent = '\u2713 100%';
			wrap.title = t('dlDone', 'Completed');
			wrap.classList.add('cbp-progress-ok');
		} else {
			wrap.querySelector('.cbp-progress-txt').textContent = '\u2717 ' + t('dlError', 'Download failed');
			wrap.title = t('dlError', 'Download failed');
			wrap.classList.add('cbp-progress-fail');
		}
		var live = midArea(box);
		if (live) {
			live.setAttribute('aria-label', wrap.title);
		}
		window.setTimeout(function () {
			wrap.classList.add('cbp-progress-out');
			window.setTimeout(function () {
				if (wrap.parentNode) {
					wrap.parentNode.removeChild(wrap);
				}
				box.classList.remove('cbp-busy');
			}, 400);
		}, ok ? 1400 : 2600);
	}

	function saveBlob(blob, name) {
		var link = document.createElement('a');
		link.href = URL.createObjectURL(blob);
		link.download = name;
		document.body.appendChild(link);
		link.click();
		window.setTimeout(function () {
			URL.revokeObjectURL(link.href);
			document.body.removeChild(link);
		}, 1000);
	}

	function serverDownload(box, url) {
		if (!window.fetch || !window.Blob || box.classList.contains('cbp-busy')) {
			if (!box.classList.contains('cbp-busy')) {
				window.location.href = url;
			}
			return;
		}

		var wrap = progressStart(box);
		var name = box.getAttribute('data-cbp-file') || 'code.txt';

		window.fetch(url, {credentials: 'same-origin', headers: {'X-Requested-With': 'CodeboxPlus'}}).then(function (res) {
			// Login, CAPTCHA or error page: open it normally
			if (!res.ok || res.headers.get('X-CBP-Download') !== '1') {
				if (wrap && wrap.parentNode) {
					wrap.parentNode.removeChild(wrap);
				}
				box.classList.remove('cbp-busy');
				window.location.href = url;
				return null;
			}

			var total = parseInt(res.headers.get('Content-Length'), 10) || parseInt(box.getAttribute('data-cbp-bytes'), 10) || 0;
			var count = res.headers.get('X-CBP-Count');

			var finish = function (blob) {
				saveBlob(blob, name);
				if (count !== null && box.hasAttribute('data-cbp-downloads')) {
					box.setAttribute('data-cbp-downloads', count);
					showCount(box);
				}
				progressEnd(box, wrap, true);
			};

			if (!res.body || !res.body.getReader) {
				return res.blob().then(finish);
			}

			var reader = res.body.getReader();
			var chunks = [];
			var received = 0;

			var pump = function () {
				return reader.read().then(function (step) {
					if (step.done) {
						finish(new Blob(chunks, {type: 'text/plain;charset=utf-8'}));
						return null;
					}
					chunks.push(step.value);
					received += step.value.length;
					if (total) {
						progressSet(wrap, received / total * 100);
					}
					return pump();
				});
			};

			return pump();
		}).catch(function () {
			progressEnd(box, wrap, false);
		});
	}

	function localDownload(box) {
		var wrap = progressStart(box);
		progressSet(wrap, 100);
		saveBlob(new Blob([getCode(box)], {type: 'text/plain;charset=utf-8'}), box.getAttribute('data-cbp-file') || 'code.txt');
		progressEnd(box, wrap, true);
	}

	/* ---------- Highlights (CSS Custom Highlight API, with fallback) ---------- */

	var hlSupported = !!(window.CSS && CSS.highlights && window.Highlight);
	var hlRanges = {find: [], current: [], occ: []};

	function hlApply() {
		if (!hlSupported) {
			return;
		}
		var names = {find: 'cbp-find', current: 'cbp-find-current', occ: 'cbp-occ'};
		for (var key in names) {
			if (Object.prototype.hasOwnProperty.call(names, key)) {
				var h = new Highlight();
				for (var i = 0; i < hlRanges[key].length; i++) {
					h.add(hlRanges[key][i].range);
				}
				CSS.highlights.set(names[key], h);
			}
		}
	}

	function hlClear(box, key) {
		hlRanges[key] = hlRanges[key].filter(function (r) {
			return box && r.box !== box;
		});
		var cls = key === 'occ' ? 'cbp-l-occ' : (key === 'find' ? 'cbp-l-hit' : 'cbp-l-hit-current');
		var scope = box || document;
		var lines = scope.querySelectorAll('.' + cls);
		for (var i = 0; i < lines.length; i++) {
			lines[i].classList.remove(cls);
		}
	}

	// Range between two character offsets of a line
	function lineRange(line, start, end) {
		var walker = document.createTreeWalker(line, NodeFilter.SHOW_TEXT, null);
		var pos = 0;
		var range = document.createRange();
		var node;
		var started = false;

		while ((node = walker.nextNode())) {
			var len = node.nodeValue.length;
			if (!started && start <= pos + len) {
				range.setStart(node, start - pos);
				started = true;
			}
			if (started && end <= pos + len) {
				range.setEnd(node, end - pos);
				return range;
			}
			pos += len;
		}
		return null;
	}

	function lineText(line) {
		return line.textContent.replace(/ /g, ' ');
	}

	function escapeRegExp(s) {
		return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
	}

	function buildMatcher(query, opts) {
		if (!query) {
			return null;
		}
		var source = opts.regex ? query : escapeRegExp(query);
		if (opts.word) {
			source = '\\b(?:' + source + ')\\b';
		}
		return new RegExp(source, opts.cs ? 'g' : 'gi');
	}

	function findMatches(box, re) {
		var out = [];
		var lines = box.querySelectorAll('.cbp-l');
		for (var i = 0; i < lines.length; i++) {
			var text = lineText(lines[i]);
			re.lastIndex = 0;
			var m;
			while ((m = re.exec(text)) !== null) {
				if (m[0].length === 0) {
					re.lastIndex++;
					continue;
				}
				out.push({line: lines[i], index: i, start: m.index, end: m.index + m[0].length});
				if (out.length > 5000) {
					return out;
				}
			}
		}
		return out;
	}

	/* ---------- Find bar ---------- */

	function findState(box) {
		if (!box.cbpFind) {
			box.cbpFind = {matches: [], current: -1, cs: false, word: false, regex: false, bar: null};
		}
		return box.cbpFind;
	}

	function openFind(box, preset) {
		var st = findState(box);

		if (box.classList.contains('cbp-folded')) {
			toggleFold(box, box.querySelector('[data-cbp-act="fold"]'));
		}

		if (!st.bar) {
			var bar = document.createElement('div');
			bar.className = 'cbp-find';
			bar.innerHTML =
				'<input type="search" class="cbp-find-input" spellcheck="false" autocomplete="off" />' +
				'<button type="button" class="cbp-find-opt" data-cbp-find="cs">Aa</button>' +
				'<button type="button" class="cbp-find-opt" data-cbp-find="word"><u>ab</u></button>' +
				'<button type="button" class="cbp-find-opt" data-cbp-find="regex">.*</button>' +
				'<span class="cbp-find-count"></span>' +
				'<button type="button" class="cbp-find-nav" data-cbp-find="prev">&#8593;</button>' +
				'<button type="button" class="cbp-find-nav" data-cbp-find="next">&#8595;</button>' +
				'<button type="button" class="cbp-find-nav" data-cbp-find="close">&#215;</button>';

			var labels = {cs: t('findCase', 'Match case'), word: t('findWord', 'Whole word'), regex: t('findRegex', 'Regular expression'), prev: t('findPrev', 'Previous match'), next: t('findNext', 'Next match'), close: t('findClose', 'Close')};
			var buttons = bar.querySelectorAll('[data-cbp-find]');
			for (var i = 0; i < buttons.length; i++) {
				var k = buttons[i].getAttribute('data-cbp-find');
				buttons[i].title = labels[k];
				buttons[i].setAttribute('aria-label', labels[k]);
			}

			var input = bar.querySelector('.cbp-find-input');
			input.placeholder = t('findPlaceholder', 'Find');
			input.setAttribute('aria-label', t('findPlaceholder', 'Find'));

			input.addEventListener('input', function () {
				runFind(box, true);
			});
			input.addEventListener('keydown', function (event) {
				if (event.key === 'Enter') {
					event.preventDefault();
					stepFind(box, event.shiftKey ? -1 : 1);
				} else if (event.key === 'Escape') {
					event.preventDefault();
					closeFind(box);
				}
			});
			bar.addEventListener('click', function (event) {
				var b = closest(event.target, '[data-cbp-find]');
				if (!b) {
					return;
				}
				event.preventDefault();
				var what = b.getAttribute('data-cbp-find');
				if (what === 'prev' || what === 'next') {
					stepFind(box, what === 'prev' ? -1 : 1);
				} else if (what === 'close') {
					closeFind(box);
				} else {
					st[what] = !st[what];
					b.classList.toggle('cbp-on', st[what]);
					b.setAttribute('aria-pressed', st[what] ? 'true' : 'false');
					runFind(box, true);
				}
			});

			var head = box.querySelector('.cbp-head');
			head.parentNode.insertBefore(bar, head.nextSibling);
			st.bar = bar;
		}

		box.classList.add('cbp-finding');
		var field = st.bar.querySelector('.cbp-find-input');
		if (preset) {
			field.value = preset;
		}
		field.focus();
		field.select();
		runFind(box, true);
	}

	function closeFind(box) {
		var st = findState(box);
		if (st.bar && st.bar.parentNode) {
			st.bar.parentNode.removeChild(st.bar);
		}
		st.bar = null;
		st.matches = [];
		st.current = -1;
		box.classList.remove('cbp-finding');
		hlClear(box, 'find');
		hlClear(box, 'current');
		hlApply();
		setStatus(box, '');
		var body = box.querySelector('.cbp-body');
		if (body) {
			body.focus({preventScroll: true});
		}
	}

	function runFind(box, resetCurrent) {
		var st = findState(box);
		var input = st.bar ? st.bar.querySelector('.cbp-find-input') : null;
		var countEl = st.bar ? st.bar.querySelector('.cbp-find-count') : null;
		var re = null;

		hlClear(box, 'find');
		hlClear(box, 'current');
		st.matches = [];

		if (input) {
			input.classList.remove('cbp-find-bad');
			try {
				re = buildMatcher(input.value, st);
			} catch (e) {
				input.classList.add('cbp-find-bad');
				countEl.textContent = t('findBadRegex', 'Invalid expression');
				hlApply();
				return;
			}
		}

		if (re) {
			st.matches = findMatches(box, re);
		}

		for (var i = 0; i < st.matches.length; i++) {
			var m = st.matches[i];
			if (hlSupported) {
				var r = lineRange(m.line, m.start, m.end);
				if (r) {
					m.range = r;
					hlRanges.find.push({box: box, range: r});
				}
			} else {
				m.line.classList.add('cbp-l-hit');
			}
		}

		if (resetCurrent) {
			st.current = st.matches.length ? 0 : -1;
		}
		showCurrent(box);
	}

	function stepFind(box, dir) {
		var st = findState(box);
		if (!st.matches.length) {
			return;
		}
		st.current = (st.current + dir + st.matches.length) % st.matches.length;
		showCurrent(box);
	}

	function showCurrent(box) {
		var st = findState(box);
		var countEl = st.bar ? st.bar.querySelector('.cbp-find-count') : null;
		var input = st.bar ? st.bar.querySelector('.cbp-find-input') : null;

		hlClear(box, 'current');

		if (countEl) {
			if (!input || !input.value) {
				countEl.textContent = '';
			} else if (!st.matches.length) {
				countEl.textContent = t('findNone', 'No results');
			} else {
				countEl.textContent = fmt(t('findCount', '%1$d of %2$d'), st.current + 1, st.matches.length);
			}
			countEl.classList.toggle('cbp-find-empty', !!(input && input.value && !st.matches.length));
		}

		if (st.current >= 0 && st.matches[st.current]) {
			var m = st.matches[st.current];
			if (m.range) {
				hlRanges.current.push({box: box, range: m.range});
			} else {
				m.line.classList.add('cbp-l-hit-current');
			}
			revealLine(box, m.line, m.range);
		}
		hlApply();
	}

	// Scroll the box so that a line (and the match inside it) is visible
	function revealLine(box, line, range) {
		var more = box.querySelector('[data-cbp-act="toggle"]');
		var body = box.querySelector('.cbp-body');
		if (!body) {
			return;
		}

		// Collapsed box and line outside the visible part: open it
		if (more && !more.hidden && !box.classList.contains('cbp-open') && line.offsetTop + line.offsetHeight > body.clientHeight) {
			toggleMore(box, more);
		}

		var lineTop = line.offsetTop;
		if (lineTop < body.scrollTop || lineTop + line.offsetHeight > body.scrollTop + body.clientHeight) {
			body.scrollTop = Math.max(0, lineTop - body.clientHeight / 3);
		}

		if (range) {
			var r = range.getBoundingClientRect();
			var b = body.getBoundingClientRect();
			var gutter = box.classList.contains('cbp-nolines') ? 0 : 60;
			if (r.left < b.left + gutter || r.right > b.right) {
				body.scrollLeft += r.left - b.left - gutter - 40;
			}
		}

		var boxRect = line.getBoundingClientRect();
		if (boxRect.top < 0 || boxRect.bottom > window.innerHeight) {
			line.scrollIntoView({block: 'center'});
		}
	}

	/* ---------- Occurrences of a word (double click) ---------- */

	function highlightOccurrences(box) {
		hlClear(null, 'occ');
		var sel = window.getSelection ? window.getSelection() : null;
		var word = sel ? String(sel).trim() : '';

		if (!word || word.length > 100 || /\s/.test(word)) {
			hlApply();
			return;
		}

		var re = new RegExp('(^|[^\\w])(' + escapeRegExp(word) + ')(?=[^\\w]|$)', 'g');
		var lines = box.querySelectorAll('.cbp-l');
		var count = 0;

		for (var i = 0; i < lines.length; i++) {
			var text = lineText(lines[i]);
			var m;
			re.lastIndex = 0;
			while ((m = re.exec(text)) !== null) {
				var start = m.index + m[1].length;
				count++;
				if (hlSupported) {
					var r = lineRange(lines[i], start, start + word.length);
					if (r) {
						hlRanges.occ.push({box: box, range: r});
					}
				} else {
					lines[i].classList.add('cbp-l-occ');
				}
				if (m[0].length === 0) {
					re.lastIndex++;
				}
			}
		}

		hlApply();
		box.cbpOcc = count > 1 ? {word: word, text: fmt(t('occCount', '%1$d occurrences of “%2$s”'), count, word)} : null;
		if (box.cbpOcc) {
			setStatus(box, box.cbpOcc.text);
		}
	}

	/* ---------- Status: cursor position and selection ---------- */

	function setStatus(box, text) {
		var mid = midArea(box);
		if (!mid) {
			return;
		}
		var st = mid.querySelector('.cbp-status');
		if (!st) {
			st = document.createElement('span');
			st.className = 'cbp-status';
			mid.insertBefore(st, mid.firstChild);
		}
		st.textContent = text;
		st.hidden = !text;
	}

	function caretInfo(box, sel) {
		var node = sel.focusNode;
		var line = node ? closest(node.nodeType === 1 ? node : node.parentNode, '.cbp-l') : null;
		if (!line || !box.contains(line)) {
			return null;
		}
		var lines = box.querySelectorAll('.cbp-l');
		var index = Array.prototype.indexOf.call(lines, line);
		var r = document.createRange();
		r.selectNodeContents(line);
		try {
			r.setEnd(sel.focusNode, sel.focusOffset);
		} catch (e) {
			return null;
		}
		return {line: index + 1, col: r.toString().length + 1};
	}

	var statusTimer = null;
	document.addEventListener('selectionchange', function () {
		window.clearTimeout(statusTimer);
		statusTimer = window.setTimeout(function () {
			var sel = window.getSelection ? window.getSelection() : null;
			if (!sel || !sel.rangeCount) {
				return;
			}
			var node = sel.focusNode;
			var box = node ? closest(node.nodeType === 1 ? node : node.parentNode, 'div.cbp.cbp-tools-on') : null;
			if (!box) {
				return;
			}
			var info = caretInfo(box, sel);
			if (!info) {
				return;
			}
			var text = fmt(t('statusPos', 'Ln %1$d, Col %2$d'), info.line, info.col);
			var chars = String(sel).length;
			if (chars > 0) {
				text += ' ' + fmt(t('statusSel', '(%d selected)'), chars);
				if (box.cbpOcc && String(sel).trim() === box.cbpOcc.word) {
					text += ' \u00b7 ' + box.cbpOcc.text;
				}
			}
			setStatus(box, text);
		}, 60);
	});

	/* ---------- Line marks (highlight, added, removed, strike) ---------- */

	var MARK_KEY = 'cbp_marks';
	var MARK_CLASSES = {y: 'cbp-mark', g: 'cbp-mark-add', r: 'cbp-mark-del', s: 'cbp-strike'};

	function readMarks() {
		try {
			var data = JSON.parse(window.localStorage.getItem(MARK_KEY) || '{}');
			return (data && typeof data === 'object') ? data : {};
		} catch (e) {
			return {};
		}
	}

	function saveMarks(box) {
		var id = foldId(box);
		if (!id) {
			return;
		}
		var marks = {};
		var lines = box.querySelectorAll('.cbp-l');
		for (var i = 0; i < lines.length; i++) {
			var flags = '';
			for (var f in MARK_CLASSES) {
				if (Object.prototype.hasOwnProperty.call(MARK_CLASSES, f) && lines[i].classList.contains(MARK_CLASSES[f])) {
					flags += f;
				}
			}
			if (flags) {
				marks[i + 1] = flags;
			}
		}
		try {
			var data = readMarks();
			if (Object.keys(marks).length) {
				marks._t = Date.now();
				data[id] = marks;
			} else {
				delete data[id];
			}
			var keys = Object.keys(data);
			if (keys.length > 300) {
				keys.sort(function (a, b) {
					return (data[a]._t || 0) - (data[b]._t || 0);
				});
				for (var k = 0; k < keys.length - 300; k++) {
					delete data[keys[k]];
				}
			}
			window.localStorage.setItem(MARK_KEY, JSON.stringify(data));
		} catch (e) {
			// Storage not available: the marks last until the page is reloaded
		}
	}

	function restoreMarks(box, data) {
		var marks = data[foldId(box)];
		if (!marks) {
			return;
		}
		var lines = box.querySelectorAll('.cbp-l');
		for (var n in marks) {
			if (Object.prototype.hasOwnProperty.call(marks, n) && n !== '_t' && lines[n - 1]) {
				for (var i = 0; i < marks[n].length; i++) {
					if (MARK_CLASSES[marks[n][i]]) {
						lines[n - 1].classList.add(MARK_CLASSES[marks[n][i]]);
					}
				}
			}
		}
	}

	// Colour marks are exclusive, the strike-through can be combined with them
	function setLineMark(line, flag, on) {
		if (flag !== 's' && on) {
			line.classList.remove('cbp-mark', 'cbp-mark-add', 'cbp-mark-del');
		}
		line.classList.toggle(MARK_CLASSES[flag], on);
	}

	function toggleLineMark(box, line, flag, range) {
		var lines = Array.prototype.slice.call(box.querySelectorAll('.cbp-l'));
		var index = lines.indexOf(line);
		var on = !line.classList.contains(MARK_CLASSES[flag]);
		var from = index;
		var to = index;

		if (range && typeof box.cbpLastMark === 'number' && box.cbpLastMark >= 0) {
			from = Math.min(box.cbpLastMark, index);
			to = Math.max(box.cbpLastMark, index);
			on = true;
		}

		for (var i = from; i <= to; i++) {
			setLineMark(lines[i], flag, on);
		}
		box.cbpLastMark = index;
		saveMarks(box);
	}

	function clearMarks(box, line) {
		var targets = line ? [line] : box.querySelectorAll('.cbp-l');
		for (var i = 0; i < targets.length; i++) {
			for (var f in MARK_CLASSES) {
				if (Object.prototype.hasOwnProperty.call(MARK_CLASSES, f)) {
					targets[i].classList.remove(MARK_CLASSES[f]);
				}
			}
		}
		saveMarks(box);
	}

	/* ---------- Link to a line ---------- */

	function lineAnchor(box, number) {
		var id = foldId(box);
		return id ? 'cbp-' + id.replace(/[^\w]+/g, '-') + '-L' + number : '';
	}

	function lineLink(box, number) {
		var anchor = lineAnchor(box, number);
		return anchor ? window.location.href.split('#')[0] + '#' + anchor : window.location.href;
	}

	function openFromHash() {
		var hash = decodeURIComponent((window.location.hash || '').slice(1));
		var m = /^cbp-(.+)-L(\d+)$/.exec(hash);
		if (!m) {
			return;
		}
		var boxes = document.querySelectorAll('div.cbp[data-cbp-ready]');
		for (var i = 0; i < boxes.length; i++) {
			var id = foldId(boxes[i]);
			if (id && id.replace(/[^\w]+/g, '-') === m[1]) {
				var box = boxes[i];
				var line = box.querySelectorAll('.cbp-l')[parseInt(m[2], 10) - 1];
				if (!line) {
					return;
				}
				if (box.classList.contains('cbp-folded')) {
					toggleFold(box, box.querySelector('[data-cbp-act="fold"]'));
				}
				line.classList.add('cbp-flash');
				window.setTimeout(function () {
					line.classList.remove('cbp-flash');
				}, 2600);
				revealLine(box, line, null);
				line.scrollIntoView({block: 'center'});
				return;
			}
		}
	}

	/* ---------- Font size ---------- */

	var FONT_KEY = 'cbp_font_scale';

	function fontScale() {
		var v = parseFloat(storage(FONT_KEY));
		return v >= 0.7 && v <= 1.8 ? v : 1;
	}

	function applyFont(box, scale) {
		box.style.setProperty('--cbp-fs', (13 * scale).toFixed(1) + 'px');
	}

	function changeFont(delta) {
		var scale = delta === 0 ? 1 : Math.round(Math.max(0.7, Math.min(1.8, fontScale() + delta)) * 10) / 10;
		storage(FONT_KEY, String(scale));
		var boxes = document.querySelectorAll('div.cbp[data-cbp-ready]');
		for (var i = 0; i < boxes.length; i++) {
			applyFont(boxes[i], scale);
			refresh(boxes[i]);
		}
		var labels = document.querySelectorAll('.cbp-menu-font-value');
		for (var j = 0; j < labels.length; j++) {
			labels[j].textContent = Math.round(scale * 100) + '%';
		}
	}

	/* ---------- Pop-up menus (options and line context menu) ---------- */

	var popup = null;
	var lastClosed = null;

	function closePopup() {
		if (popup && popup.parentNode) {
			popup.parentNode.removeChild(popup);
		}
		popup = null;
	}

	function makeItem(label, action, extraClass) {
		var b = document.createElement('button');
		b.type = 'button';
		b.className = 'cbp-menu-item' + (extraClass ? ' ' + extraClass : '');
		b.setAttribute('data-cbp-menu', action);
		b.textContent = label;
		return b;
	}

	function placePopup(menu, x, y, focus) {
		document.body.appendChild(menu);
		var w = menu.offsetWidth;
		var h = menu.offsetHeight;
		var left = Math.min(x, window.innerWidth - w - 8);
		var top = y + h > window.innerHeight - 8 ? Math.max(8, y - h) : y;
		menu.style.left = Math.max(8, left) + 'px';
		menu.style.top = top + 'px';
		menu.cbpOpened = Date.now();
		var first = focus ? menu.querySelector('button, input') : null;
		if (first) {
			first.focus({preventScroll: true});
		}
	}

	function schemeFor(box, menu) {
		var dark = box.classList.contains('cbp-scheme-dark') || box.classList.contains('cbp-theme-dark') || box.classList.contains('cbp-theme-monokai') || box.classList.contains('cbp-theme-dracula') || box.classList.contains('cbp-theme-nord');
		if (box.classList.contains('cbp-theme-auto') && !box.classList.contains('cbp-scheme-dark') && !box.classList.contains('cbp-scheme-light')) {
			dark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
		}
		menu.classList.toggle('cbp-menu-dark', !!dark);
	}

	function openOptions(box, button, focus) {
		closePopup();
		var menu = document.createElement('div');
		menu.className = 'cbp-menu';
		menu.setAttribute('role', 'menu');
		schemeFor(box, menu);

		var fontRow = document.createElement('div');
		fontRow.className = 'cbp-menu-row';
		fontRow.innerHTML = '<span class="cbp-menu-label"></span><span class="cbp-menu-font"><button type="button" class="cbp-menu-mini" data-cbp-menu="font-down">A&#8722;</button><span class="cbp-menu-font-value"></span><button type="button" class="cbp-menu-mini" data-cbp-menu="font-up">A+</button><button type="button" class="cbp-menu-mini" data-cbp-menu="font-reset">&#8634;</button></span>';
		fontRow.querySelector('.cbp-menu-label').textContent = t('menuFont', 'Font size');
		fontRow.querySelector('[data-cbp-menu="font-down"]').title = t('menuFontDown', 'Smaller');
		fontRow.querySelector('[data-cbp-menu="font-up"]').title = t('menuFontUp', 'Bigger');
		fontRow.querySelector('[data-cbp-menu="font-reset"]').title = t('menuFontReset', 'Reset');
		fontRow.querySelector('.cbp-menu-font-value').textContent = Math.round(fontScale() * 100) + '%';
		menu.appendChild(fontRow);

		var gotoRow = document.createElement('form');
		gotoRow.className = 'cbp-menu-row cbp-menu-goto';
		gotoRow.innerHTML = '<span class="cbp-menu-label"></span><input type="number" min="1" class="cbp-menu-input" /><button type="submit" class="cbp-menu-mini"></button>';
		gotoRow.querySelector('.cbp-menu-label').textContent = t('menuGoto', 'Go to line');
		gotoRow.querySelector('button').textContent = t('menuGotoButton', 'Go');
		var total = box.querySelectorAll('.cbp-l').length;
		var gotoInput = gotoRow.querySelector('input');
		gotoInput.max = total;
		gotoInput.placeholder = '1 - ' + total;
		gotoInput.setAttribute('aria-label', t('menuGoto', 'Go to line'));
		gotoRow.addEventListener('submit', function (event) {
			event.preventDefault();
			var n = parseInt(gotoInput.value, 10);
			var line = box.querySelectorAll('.cbp-l')[n - 1];
			if (line) {
				closePopup();
				if (box.classList.contains('cbp-folded')) {
					toggleFold(box, box.querySelector('[data-cbp-act="fold"]'));
				}
				line.classList.add('cbp-flash');
				window.setTimeout(function () {
					line.classList.remove('cbp-flash');
				}, 2000);
				revealLine(box, line, null);
			}
		});
		menu.appendChild(gotoRow);

		menu.appendChild(makeItem(t('toolSearch', 'Find'), 'search'));
		menu.appendChild(makeItem(t('menuClearMarks', 'Remove all marks'), 'clear-all'));

		var help = document.createElement('div');
		help.className = 'cbp-menu-help';
		help.innerHTML = '<strong></strong><span></span>';
		help.querySelector('strong').textContent = t('menuShortcuts', 'Keyboard shortcuts');
		help.querySelector('span').textContent = t('shortcuts', '');
		menu.appendChild(help);

		menu.cbpBox = box;
		var rect = button.getBoundingClientRect();
		placePopup(menu, rect.right - 280, rect.bottom + 4, focus);
		popup = menu;
	}

	function openContext(box, line, x, y) {
		closePopup();
		var menu = document.createElement('div');
		menu.className = 'cbp-menu cbp-menu-context';
		menu.setAttribute('role', 'menu');
		schemeFor(box, menu);

		var lines = Array.prototype.slice.call(box.querySelectorAll('.cbp-l'));
		var number = lines.indexOf(line) + 1;
		var title = document.createElement('div');
		title.className = 'cbp-menu-title';
		title.textContent = fmt(t('ctxLine', 'Line %d'), number);
		menu.appendChild(title);

		var sel = window.getSelection ? String(window.getSelection()).trim() : '';

		menu.appendChild(makeItem(t('ctxMark', 'Highlight line'), 'mark-y', line.classList.contains('cbp-mark') ? 'cbp-checked' : 'cbp-swatch-y'));
		menu.appendChild(makeItem(t('ctxAdded', 'Mark as added'), 'mark-g', line.classList.contains('cbp-mark-add') ? 'cbp-checked' : 'cbp-swatch-g'));
		menu.appendChild(makeItem(t('ctxRemoved', 'Mark as removed'), 'mark-r', line.classList.contains('cbp-mark-del') ? 'cbp-checked' : 'cbp-swatch-r'));
		menu.appendChild(makeItem(t('ctxStrike', 'Strike through line'), 'mark-s', line.classList.contains('cbp-strike') ? 'cbp-checked' : 'cbp-swatch-s'));
		menu.appendChild(document.createElement('hr'));
		menu.appendChild(makeItem(t('ctxCopyLine', 'Copy line'), 'copy-line'));
		if (foldId(box)) {
			menu.appendChild(makeItem(t('ctxCopyLink', 'Copy link to line'), 'copy-link'));
		}
		if (sel && sel.length < 200 && sel.indexOf('\n') === -1) {
			menu.appendChild(makeItem(t('ctxFindSel', 'Find selected text'), 'find-sel'));
		}
		menu.appendChild(document.createElement('hr'));
		menu.appendChild(makeItem(t('ctxClear', 'Remove marks from line'), 'clear-line'));
		menu.appendChild(makeItem(t('menuClearMarks', 'Remove all marks'), 'clear-all'));

		menu.cbpBox = box;
		menu.cbpLine = line;
		menu.cbpSel = sel;
		placePopup(menu, x, y, false);
		popup = menu;
	}

	function writeClipboard(text, ok) {
		if (navigator.clipboard && window.isSecureContext) {
			navigator.clipboard.writeText(text).then(ok, function () {
				if (fallbackCopy(text)) {
					ok();
				}
			});
		} else if (fallbackCopy(text)) {
			ok();
		}
	}

	document.addEventListener('click', function (event) {
		if (!popup) {
			return;
		}
		var item = closest(event.target, '[data-cbp-menu]');
		if (!popup.contains(event.target)) {
			lastClosed = {box: popup.cbpBox, context: !!popup.cbpLine, time: Date.now()};
			closePopup();
			return;
		}
		if (!item) {
			return;
		}
		event.preventDefault();
		var box = popup.cbpBox;
		var line = popup.cbpLine;
		var action = item.getAttribute('data-cbp-menu');

		switch (action) {
			case 'font-down':
				changeFont(-0.1);
				return;
			case 'font-up':
				changeFont(0.1);
				return;
			case 'font-reset':
				changeFont(0);
				return;
			case 'search':
				closePopup();
				openFind(box);
				return;
			case 'clear-all':
				clearMarks(box);
				break;
			case 'clear-line':
				clearMarks(box, line);
				break;
			case 'mark-y':
			case 'mark-g':
			case 'mark-r':
			case 'mark-s':
				box.cbpLastMark = -1;
				toggleLineMark(box, line, action.slice(-1), false);
				break;
			case 'copy-line':
				writeClipboard(lineText(line), function () {
					setStatus(box, t('copied', 'Copied!'));
				});
				break;
			case 'copy-link':
				var number = Array.prototype.indexOf.call(box.querySelectorAll('.cbp-l'), line) + 1;
				writeClipboard(lineLink(box, number), function () {
					setStatus(box, t('linkCopied', 'Link copied'));
				});
				break;
			case 'find-sel':
				var text = popup.cbpSel;
				closePopup();
				openFind(box, text);
				return;
		}
		closePopup();
	}, true);

	document.addEventListener('contextmenu', function (event) {
		var line = closest(event.target, '.cbp-l');
		var box = line ? closest(line, 'div.cbp.cbp-tools-on') : null;
		if (!box || event.shiftKey) {
			return;
		}
		event.preventDefault();
		openContext(box, line, event.clientX, event.clientY);
	});

	document.addEventListener('dblclick', function (event) {
		var code = closest(event.target, '.cbp-code');
		var box = code ? closest(code, 'div.cbp.cbp-tools-on') : null;
		if (box) {
			window.setTimeout(function () {
				highlightOccurrences(box);
			}, 10);
		}
	});

	document.addEventListener('mousedown', function (event) {
		if (hlRanges.occ.length && event.detail === 1 && !closest(event.target, '.cbp-menu')) {
			hlClear(null, 'occ');
			hlApply();
		}
	});

	// Keyboard shortcuts inside a code box
	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && popup) {
			closePopup();
			return;
		}

		var box = closest(document.activeElement, 'div.cbp.cbp-tools-on');
		if (!box) {
			return;
		}
		var key = (event.key || '').toLowerCase();

		if ((event.ctrlKey || event.metaKey) && key === 'f') {
			event.preventDefault();
			var sel = String(window.getSelection ? window.getSelection() : '').trim();
			openFind(box, sel && sel.indexOf('\n') === -1 && sel.length < 200 ? sel : '');
		} else if ((event.ctrlKey || event.metaKey) && key === 'g') {
			event.preventDefault();
			var menuButton = box.querySelector('[data-cbp-act="menu"]');
			if (menuButton) {
				openOptions(box, menuButton);
				var input = popup ? popup.querySelector('.cbp-menu-goto input') : null;
				if (input) {
					input.focus();
				}
			}
		} else if (key === 'f3' && box.cbpFind && box.cbpFind.bar) {
			event.preventDefault();
			stepFind(box, event.shiftKey ? -1 : 1);
		} else if (key === 'escape' && box.cbpFind && box.cbpFind.bar && !fullBox) {
			closeFind(box);
		}
	});

	// Scrolling the page closes the menus (not right after they were opened)
	window.addEventListener('scroll', function (event) {
		if (popup && Date.now() - popup.cbpOpened > 300 && !popup.contains(event.target)) {
			closePopup();
		}
	}, true);

	/* ---------- Initialisation of a box ---------- */

	function toolsInit(box, marks) {
		showCount(box);

		if (box.classList.contains('cbp-tools-on')) {
			restoreMarks(box, marks);
			var scale = fontScale();
			if (scale !== 1) {
				applyFont(box, scale);
			}
		}
	}

	var resizeTimer = null;
	window.addEventListener('resize', function () {
		window.clearTimeout(resizeTimer);
		resizeTimer = window.setTimeout(function () {
			var boxes = document.querySelectorAll('div.cbp[data-cbp-ready]');
			for (var i = 0; i < boxes.length; i++) {
				refresh(boxes[i]);
			}
		}, 150);
	});

	/* ------------------------------------------------------------ */
	/* Editor: language picker                                       */
	/* ------------------------------------------------------------ */

	var editor = window.cbpEditor || null;
	var modal = null;
	var state = {textarea: null, lang: '', auto: true};
	var icon = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9.4 16.6 4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0 4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"/></svg>';

	function storage(key, value) {
		try {
			if (value === undefined) {
				return window.localStorage.getItem(key);
			}
			window.localStorage.setItem(key, value);
		} catch (e) {
			return null;
		}
		return null;
	}

	function findLanguage(id) {
		for (var i = 0; i < editor.languages.length; i++) {
			if (editor.languages[i].id === id) {
				return editor.languages[i];
			}
		}
		return null;
	}

	function cleanFile(name) {
		return (name || '').replace(/[^A-Za-z0-9\-+.,_ ]+/g, '').replace(/\s+/g, ' ').trim();
	}

	function buildTag() {
		var tag = '[codebox' + (state.lang && state.lang !== 'text' ? '=' + state.lang : '');
		var file = cleanFile(modal.file.value);
		var language = findLanguage(state.lang);
		if (file && file.indexOf('.') === -1 && language) {
			file += '.' + language.ext;
		}
		if (file) {
			if (!state.lang || state.lang === 'text') {
				tag = '[codebox=text';
			}
			tag += ' file=' + file;
		}
		return tag + ']';
	}

	function updatePreview() {
		modal.tag.textContent = buildTag() + '...[/codebox]';

		var buttons = modal.root.querySelectorAll('[data-cbp-lang]');
		for (var i = 0; i < buttons.length; i++) {
			buttons[i].classList.toggle('cbp-selected', buttons[i].getAttribute('data-cbp-lang') === state.lang);
		}
	}

	function chooseLanguage(id) {
		var language = findLanguage(id);
		state.lang = id;

		// Suggest a file extension when the name was not typed by hand
		if (language && state.auto) {
			var base = cleanFile(modal.file.value).replace(/\.[^.]*$/, '');
			if (base) {
				modal.file.value = base + '.' + language.ext;
			}
		}
		updatePreview();
	}

	function langButton(language, className) {
		var b = document.createElement('button');
		b.type = 'button';
		b.className = className;
		b.setAttribute('data-cbp-lang', language.id);
		b.title = language.name + ' (' + language.id + ')';
		b.textContent = language.name;
		return b;
	}

	function renderList(filter) {
		var list = modal.list;
		var q = (filter || '').toLowerCase().trim();
		list.innerHTML = '';

		var count = 0;
		var frag = document.createDocumentFragment();
		for (var i = 0; i < editor.languages.length; i++) {
			var l = editor.languages[i];
			if (q && l.name.toLowerCase().indexOf(q) === -1 && l.id.indexOf(q) === -1 && l.ext.toLowerCase() !== q) {
				continue;
			}
			frag.appendChild(langButton(l, 'cbp-lang'));
			count++;
		}

		if (!count) {
			var empty = document.createElement('div');
			empty.className = 'cbp-empty';
			empty.textContent = t('noResults', 'No language found');
			frag.appendChild(empty);
		}
		list.appendChild(frag);
		updatePreview();
		return count;
	}

	function buildModal() {
		var root = document.createElement('div');
		root.className = 'cbp-modal';
		root.hidden = true;
		root.innerHTML =
			'<div class="cbp-dialog" role="dialog" aria-modal="true" aria-labelledby="cbp-dialog-title">' +
				'<div class="cbp-dialog-head"><h3 id="cbp-dialog-title"></h3><button type="button" class="cbp-close">&times;</button></div>' +
				'<div class="cbp-dialog-body">' +
					'<label class="cbp-field"><span class="cbp-l-search"></span><input type="search" class="cbp-input cbp-search" autocomplete="off" /></label>' +
					'<div class="cbp-picker-section cbp-l-fav"></div><div class="cbp-chips"></div>' +
					'<div class="cbp-picker-section cbp-l-all"></div><div class="cbp-langs" role="listbox"></div>' +
					'<label class="cbp-field"><span class="cbp-l-file"></span><input type="text" class="cbp-input cbp-file-input" maxlength="100" autocomplete="off" /></label>' +
				'</div>' +
				'<div class="cbp-dialog-foot"><code class="cbp-preview-tag"></code><button type="button" class="cbp-cancel"></button><button type="button" class="cbp-insert"></button></div>' +
			'</div>';

		document.body.appendChild(root);

		modal = {
			root: root,
			search: root.querySelector('.cbp-search'),
			list: root.querySelector('.cbp-langs'),
			chips: root.querySelector('.cbp-chips'),
			file: root.querySelector('.cbp-file-input'),
			tag: root.querySelector('.cbp-preview-tag')
		};

		root.querySelector('#cbp-dialog-title').textContent = t('pickerTitle', 'Insert code');
		root.querySelector('.cbp-close').setAttribute('aria-label', t('close', 'Close'));
		root.querySelector('.cbp-l-search').textContent = t('search', 'Search language');
		modal.search.placeholder = t('searchPlaceholder', 'php, python, sql...');
		root.querySelector('.cbp-l-fav').textContent = t('favorites', 'Popular');
		root.querySelector('.cbp-l-all').textContent = t('allLanguages', 'All languages');
		root.querySelector('.cbp-l-file').textContent = t('fileName', 'File name (optional)');
		modal.file.placeholder = t('fileNamePlaceholder', 'example.php');
		root.querySelector('.cbp-cancel').textContent = t('cancel', 'Cancel');
		root.querySelector('.cbp-insert').textContent = t('insert', 'Insert');

		var fav = editor.favorites || [];
		for (var i = 0; i < fav.length; i++) {
			var language = findLanguage(fav[i]);
			if (language) {
				modal.chips.appendChild(langButton(language, 'cbp-chip'));
			}
		}
		if (!modal.chips.children.length) {
			root.querySelector('.cbp-l-fav').hidden = true;
		}

		root.addEventListener('click', function (event) {
			var b = closest(event.target, '[data-cbp-lang]');
			if (b) {
				chooseLanguage(b.getAttribute('data-cbp-lang'));
				return;
			}
			if (event.target === root || closest(event.target, '.cbp-close') || closest(event.target, '.cbp-cancel')) {
				closeModal();
				return;
			}
			if (closest(event.target, '.cbp-insert')) {
				insert();
			}
		});

		root.addEventListener('dblclick', function (event) {
			var b = closest(event.target, '[data-cbp-lang]');
			if (b) {
				chooseLanguage(b.getAttribute('data-cbp-lang'));
				insert();
			}
		});

		modal.search.addEventListener('input', function () {
			renderList(modal.search.value);
		});

		modal.file.addEventListener('input', function () {
			state.auto = false;
			updatePreview();
		});

		root.addEventListener('keydown', function (event) {
			if (event.key === 'Escape') {
				event.preventDefault();
				closeModal();
			} else if (event.key === 'Enter' && event.target.tagName === 'INPUT') {
				event.preventDefault();
				if (event.target === modal.search && modal.search.value) {
					var first = modal.list.querySelector('[data-cbp-lang]');
					if (first) {
						chooseLanguage(first.getAttribute('data-cbp-lang'));
					}
				}
				insert();
			}
		});
	}

	function openModal(textarea) {
		if (!editor) {
			return;
		}
		if (!modal) {
			buildModal();
		}

		state.textarea = textarea;
		state.lang = storage('cbp_last_lang') || (editor.favorites && editor.favorites[0]) || 'text';
		state.auto = true;
		if (!findLanguage(state.lang)) {
			state.lang = 'text';
		}

		modal.search.value = '';
		modal.file.value = '';
		renderList('');

		var dark = isDarkAt(textarea);
		modal.root.classList.toggle('cbp-ui-dark', dark);
		modal.root.classList.toggle('cbp-ui-light', !dark);

		modal.root.hidden = false;
		document.documentElement.classList.add('cbp-noscroll');
		window.setTimeout(function () {
			modal.search.focus();
		}, 30);
	}

	function closeModal() {
		if (!modal) {
			return;
		}
		modal.root.hidden = true;
		document.documentElement.classList.remove('cbp-noscroll');
		if (state.textarea) {
			state.textarea.focus();
		}
	}

	function insert() {
		var area = state.textarea;
		if (!area) {
			closeModal();
			return;
		}

		var open = buildTag();
		var close = '[/codebox]';
		var start = area.selectionStart || 0;
		var end = area.selectionEnd || 0;
		var value = area.value;
		var selected = value.substring(start, end);
		var inner = selected ? selected : '\n\n';
		var caret;

		area.value = value.substring(0, start) + open + inner + close + value.substring(end);

		if (selected) {
			caret = start + open.length + inner.length + close.length;
			area.setSelectionRange(caret, caret);
		} else {
			caret = start + open.length + 1;
			area.setSelectionRange(caret, caret);
		}

		storage('cbp_last_lang', state.lang);

		var ev;
		try {
			ev = new Event('input', {bubbles: true});
		} catch (e) {
			ev = document.createEvent('Event');
			ev.initEvent('input', true, true);
		}
		area.dispatchEvent(ev);

		closeModal();
	}

	function textareaFor(button) {
		var form = closest(button, 'form');
		var area = form ? form.querySelector('textarea[name="message"]') : null;
		return area || document.getElementById('message') || document.querySelector('textarea[name="message"]');
	}

	// A button exists in the form and is really visible (some toolbars hide the default one)
	function hasVisibleButton(form) {
		if (!form) {
			return false;
		}
		var buttons = form.querySelectorAll('.cbp-editor-btn');
		for (var i = 0; i < buttons.length; i++) {
			if (buttons[i].offsetParent !== null || buttons[i].getClientRects().length) {
				return true;
			}
		}
		return false;
	}

	function initEditor() {
		if (!editor || !editor.languages) {
			return;
		}

		document.addEventListener('click', function (event) {
			var button = closest(event.target, '.cbp-editor-btn');
			if (button) {
				event.preventDefault();
				var area = textareaFor(button);
				if (area) {
					openModal(area);
				}
			}
		});

		// Quick reply or toolbars replaced by other extensions: add our own button
		var areas = document.querySelectorAll('textarea[name="message"]');
		for (var i = 0; i < areas.length; i++) {
			var area = areas[i];
			var form = closest(area, 'form');
			if (area.getAttribute('data-cbp-tools') || hasVisibleButton(form)) {
				continue;
			}
			area.setAttribute('data-cbp-tools', '1');

			var bar = document.createElement('div');
			bar.className = 'cbp-qr-tools';
			var btn = document.createElement('button');
			btn.type = 'button';
			btn.className = 'button button-secondary cbp-editor-btn';
			btn.title = t('editorButton', 'Insert code (Codebox Plus)');
			btn.innerHTML = icon + ' ';
			btn.appendChild(document.createTextNode(t('editorButtonShort', 'Codebox')));
			bar.appendChild(btn);
			area.parentNode.insertBefore(bar, area);
		}
	}

	/* ------------------------------------------------------------ */
	/* Boot                                                          */
	/* ------------------------------------------------------------ */

	function boot() {
		init(document);
		initEditor();
		openFromHash();
		window.addEventListener('hashchange', openFromHash);

		// Boxes inserted later (AJAX previews, quick edit, infinite scroll...)
		if (window.MutationObserver) {
			var pending = false;
			new MutationObserver(function () {
				if (pending) {
					return;
				}
				pending = true;
				window.requestAnimationFrame(function () {
					pending = false;
					init(document);
				});
			}).observe(document.body, {childList: true, subtree: true});

			// Styles with a light/dark switch: follow the change
			var schemeTimer = null;
			var reapply = function () {
				window.clearTimeout(schemeTimer);
				schemeTimer = window.setTimeout(function () {
					var boxes = document.querySelectorAll('div.cbp.cbp-theme-auto[data-cbp-ready]');
					for (var i = 0; i < boxes.length; i++) {
						applyScheme(boxes[i]);
					}
				}, 60);
			};
			var schemeObserver = new MutationObserver(reapply);
			schemeObserver.observe(document.documentElement, {attributes: true, attributeFilter: ['class', 'style', 'data-theme', 'data-bs-theme', 'data-mode']});
			schemeObserver.observe(document.body, {attributes: true, attributeFilter: ['class', 'style', 'data-theme', 'data-bs-theme', 'data-mode']});
			if (window.matchMedia) {
				var mq = window.matchMedia('(prefers-color-scheme: dark)');
				if (mq.addEventListener) {
					mq.addEventListener('change', reapply);
				}
			}
		}
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}
})(window, document);
