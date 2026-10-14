/**
 * Codebox Plus - ACP live preview
 * @copyright (c) 2026 Salvo Cortesiano
 * @license GPL-2.0-only
 */
(function () {
	'use strict';

	var preview = document.querySelector('#cbp-acp-preview .cbp');
	if (!preview) {
		return;
	}

	function checked(name) {
		var el = document.querySelector('input[name="' + name + '"]:checked');
		return el ? el.value === '1' : false;
	}

	function update() {
		var theme = document.getElementById('cbp_theme');
		if (theme) {
			preview.className = preview.className.replace(/\bcbp-theme-[a-z]+\b/, 'cbp-theme-' + theme.value);
		}
		preview.classList.toggle('cbp-nolines', !checked('cbp_line_numbers'));
		preview.classList.toggle('cbp-wrap', checked('cbp_wrap'));
		var dots = preview.querySelector('.cbp-dots');
		if (dots) {
			dots.hidden = !checked('cbp_window_buttons');
		}
		var foot = preview.querySelector('.cbp-foot');
		if (foot) {
			foot.hidden = !checked('cbp_show_credits');
		}

		var height = parseInt((document.getElementById('cbp_max_height') || {}).value, 10);
		if (height >= 120) {
			preview.style.setProperty('--cbp-max', height + 'px');
		}
		var tab = parseInt((document.getElementById('cbp_tab_size') || {}).value, 10);
		if (tab >= 1 && tab <= 8) {
			preview.style.setProperty('--cbp-tab', tab);
		}
	}

	document.querySelectorAll('.cbp-acp-clear-groups').forEach(function (link) {
		link.addEventListener('click', function (event) {
			event.preventDefault();
			var select = document.getElementById('cbp_download_groups');
			if (select) {
				Array.prototype.forEach.call(select.options, function (option) {
					option.selected = false;
				});
			}
		});
	});

	document.querySelectorAll('[data-cbp-preview]').forEach(function (el) {
		el.addEventListener('change', update);
		el.addEventListener('input', update);
	});
	update();
})();
