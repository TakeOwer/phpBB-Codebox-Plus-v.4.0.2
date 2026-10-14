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
			window.location.href = url;
			return;
		}

		if (login) {
			window.location.href = login;
			return;
		}

		// Previews, private messages...: build the file in the browser
		var name = box.getAttribute('data-cbp-file') || 'code.txt';
		var blob = new Blob([getCode(box)], {type: 'text/plain;charset=utf-8'});
		var link = document.createElement('a');
		link.href = URL.createObjectURL(blob);
		link.download = name;
		document.body.appendChild(link);
		link.click();
		window.setTimeout(function () {
			URL.revokeObjectURL(link.href);
			document.body.removeChild(link);
		}, 500);
	}

	var fullBox = null;

	function setFullscreen(box, on) {
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
	}

	function init(root) {
		var boxes = (root || document).querySelectorAll('div.cbp:not([data-cbp-ready])');

		for (var i = 0; i < boxes.length; i++) {
			var box = boxes[i];
			box.setAttribute('data-cbp-ready', '1');

			var wrap = box.querySelector('[data-cbp-act="wrap"]');
			if (wrap) {
				wrap.classList.toggle('cbp-active', box.classList.contains('cbp-wrap'));
			}
			var lines = box.querySelector('[data-cbp-act="lines"]');
			if (lines) {
				lines.classList.toggle('cbp-active', !box.classList.contains('cbp-nolines'));
			}

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

				case 'toggle':
					toggleMore(box, actionEl);
				break;
			}
			return;
		}

		// Click on a line number: highlight the line
		var line = closest(target, '.cbp-l');
		if (line && target === line && isGutterClick(line, event)) {
			line.classList.toggle('cbp-mark');
		}
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && fullBox) {
			setFullscreen(fullBox, false);
		}
	});

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
		}
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}
})(window, document);
