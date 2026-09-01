document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.crw-widget').forEach(function (widget) {
		var allCards = Array.prototype.slice.call(widget.querySelectorAll('.crw-card'));
		if (allCards.length === 0) return;

		// Slider bits (grid layout mein ye null honge — tab slider logic skip ho jata hai).
		var track = widget.querySelector('.crw-track');
		var isSlider = !!track;
		var prevBtn = widget.querySelector('.crw-prev');
		var nextBtn = widget.querySelector('.crw-next');
		var dotsWrap = widget.querySelector('.crw-dots');
		var wrapper = widget.querySelector('.crw-track-wrapper');

		var filter = 'all';
		var page = 0;
		var perView = 1;
		var totalPages = 1;

		var stats = {};
		try { stats = JSON.parse(widget.getAttribute('data-stats') || '{}'); } catch (e) {}

		function matches(card) {
			return filter === 'all' || card.classList.contains('source-' + filter);
		}
		function visibleCards() {
			return allCards.filter(matches);
		}
		function applyFilter() {
			allCards.forEach(function (c) { c.style.display = matches(c) ? '' : 'none'; });
		}

		// ===== Slider-only helpers =====
		function getPerView() {
			var w = wrapper.offsetWidth;
			if (w < 600) return 1;
			if (w < 900) return 2;
			return 3;
		}
		function buildDots() {
			dotsWrap.innerHTML = '';
			for (var i = 0; i < totalPages; i++) {
				var dot = document.createElement('span');
				dot.className = 'crw-dot' + (i === page ? ' active' : '');
				dot.addEventListener('click', (function (idx) {
					return function () { page = idx; render(); };
				})(i));
				dotsWrap.appendChild(dot);
			}
		}
		function render() {
			var vcards = visibleCards();
			var cardWidth = vcards.length ? vcards[0].getBoundingClientRect().width : 0;
			var gap = 16;
			var offset = page * perView * (cardWidth + gap);
			track.style.transform = 'translateX(-' + offset + 'px)';

			if (prevBtn) prevBtn.disabled = page === 0;
			if (nextBtn) nextBtn.disabled = page >= totalPages - 1;

			dotsWrap.querySelectorAll('.crw-dot').forEach(function (d, i) {
				d.classList.toggle('active', i === page);
			});
		}
		function recompute() {
			if (!isSlider) { applyFilter(); return; } // grid: bas show/hide, koi slider math nahi.
			perView = getPerView();
			totalPages = Math.max(1, Math.ceil(visibleCards().length / perView));
			if (page > totalPages - 1) page = totalPages - 1;
			buildDots();
			render();
		}

		if (isSlider) {
			if (prevBtn) prevBtn.addEventListener('click', function () { if (page > 0) { page--; render(); } });
			if (nextBtn) nextBtn.addEventListener('click', function () { if (page < totalPages - 1) { page++; render(); } });
			window.addEventListener('resize', function () { recompute(); });
		}

		// ===== Source tabs (All / Google / Trustindex) — dono layouts mein chalti hain =====
		var tabsWrap = widget.querySelector('.crw-tabs');
		if (tabsWrap) {
			var tabs = tabsWrap.querySelectorAll('.crw-tab');
			tabsWrap.addEventListener('click', function (e) {
				var btn = e.target.closest('.crw-tab');
				if (!btn) return;
				filter = btn.getAttribute('data-tab');
				for (var i = 0; i < tabs.length; i++) tabs[i].classList.remove('is-active');
				btn.classList.add('is-active');

				applyFilter();

				var s = stats[filter];
				if (s) {
					var rEl = widget.querySelector('.crw-header-rating');
					var cEl = widget.querySelector('.crw-header-count');
					if (rEl) rEl.textContent = s.avg;
					if (cEl) cEl.textContent = s.count + ' reviews';
				}

				page = 0;
				recompute();
			});
		}

		applyFilter();
		recompute();

		// ===== "Read more" lightbox popup (dono layouts) =====
		var overlay = widget.parentElement.querySelector('.crw-lightbox-overlay');
		if (!overlay) return;

		var lightboxContent = overlay.querySelector('.crw-lightbox-content');
		var closeBtn = overlay.querySelector('.crw-lightbox-close');
		var icons = (typeof crwIcons !== 'undefined') ? crwIcons : {};

		function starsHtml(rating, source) {
			var set = (source === 'google') ? 'Google' : 'Ti';
			var full = icons['star' + set + 'Full'] || '';
			var empty = icons['star' + set + 'Empty'] || '';
			var html = '';
			for (var i = 1; i <= 5; i++) {
				html += '<img class="crw-star-img" src="' + (i <= rating ? full : empty) + '" alt="star">';
			}
			return html;
		}

		function platformIconHtml(source) {
			if (source === 'google') {
				return '<img src="' + (icons.google || '') + '" alt="Google">';
			}
			return '<img src="' + (icons.trustindex || '') + '" alt="Trustindex">';
		}

		function openLightbox(data) {
			var avatarHtml = data.img
				? '<img class="crw-avatar" src="' + data.img + '" alt="' + data.name + '">'
				: '<span class="crw-avatar crw-avatar-letter">' + data.name.charAt(0) + '</span>';

			var verifiedIcon = data.source === 'google' ? icons.verifiedBlue : icons.verifiedBlack;
			var verifiedHtml = data.verified ? '<span class="crw-verified"><img src="' + (verifiedIcon || '') + '" alt="Verified"></span>' : '';

			lightboxContent.innerHTML =
				'<span class="crw-platform-icon">' + platformIconHtml(data.source) + '</span>' +
				'<div class="crw-card-header">' +
					'<div class="crw-avatar-wrap">' + avatarHtml + '</div>' +
					'<div class="crw-name-block">' +
						'<div class="crw-name">' + data.name + '</div>' +
						'<div class="crw-date">' + data.date + '</div>' +
					'</div>' +
				'</div>' +
				'<div class="crw-stars-row">' + starsHtml(data.rating, data.source) + verifiedHtml + '</div>' +
				'<div class="crw-text"><p>' + data.text + '</p></div>';

			overlay.classList.remove('crw-hidden');
		}

		function closeLightbox() {
			overlay.classList.add('crw-hidden');
		}

		widget.querySelectorAll('.crw-read-more-btn').forEach(function (btn) {
			btn.addEventListener('click', function () {
				var card = btn.closest('.crw-card-inner');
				var dataEl = card.querySelector('.crw-full-data');
				if (!dataEl) return;
				var data = JSON.parse(dataEl.textContent);
				openLightbox(data);
			});
		});

		closeBtn.addEventListener('click', closeLightbox);
		overlay.addEventListener('click', function (e) {
			if (e.target === overlay) closeLightbox();
		});
	});
});
