/**
 * yfg-animations.js
 * Scroll-triggered animations & micro-interactions for YourFirmGrowth.
 * No dependencies — vanilla JS, works with Bootstrap already on page.
 * Enqueue this in footer via wp_enqueue_scripts (defer).
 */

(function () {
	'use strict';

	/* ============================================================
	   1. INTERSECTION OBSERVER — scroll-reveal
	   ============================================================ */

	const STAGGER_MS = 90; // delay between siblings

	/**
	 * Mark an element with animation classes and optional stagger delay.
	 * @param {Element} el
	 * @param {number}  delay  ms
	 */
	function reveal(el, delay) {
		if (delay) {
			el.style.setProperty('--yfg-delay', delay + 'ms');
		}
		el.classList.add('yfg-animated');
	}

	const observer = new IntersectionObserver(
		function (entries) {
			entries.forEach(function (entry) {
				if (!entry.isIntersecting) return;

				const el = entry.target;
				const delay = parseInt(el.dataset.yfgDelay || '0', 10);
				reveal(el, delay);
				observer.unobserve(el);
			});
		},
		{ threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
	);

	/**
	 * Register elements for scroll-reveal and auto-assign stagger delays
	 * to siblings inside a group container.
	 */
	function setupScrollReveal() {
		/* Individual elements */
		var singles = [
			'.yfg-section-title',
			'.yfg-section-sub',
			'.yfg-accent',
			'.yfg-illus-wrap',
			'.yfg-check-list',
			'.yfg-faq',
			'.yfg-final-cta__lead',
		];
		singles.forEach(function (sel) {
			document.querySelectorAll(sel).forEach(function (el) {
				el.classList.add('yfg-anim', 'yfg-anim--up');
				observer.observe(el);
			});
		});

		/* Staggered groups */
		var groups = [
			{ parent: '.yfg-services-sec .row', child: '.col-md-6.col-lg-3', variant: 'yfg-anim--up' },
			{ parent: '#why .row',               child: '.col-md-6.col-lg-4', variant: 'yfg-anim--up' },
			{ parent: '.yfg-process-sec .row',   child: '.col-md-6.col-lg-3', variant: 'yfg-anim--up' },
			{ parent: '.container .row.g-4',      child: '.col-md-6',          variant: 'yfg-anim--up' },
		];

		groups.forEach(function (group) {
			document.querySelectorAll(group.parent).forEach(function (parent) {
				parent.querySelectorAll(group.child).forEach(function (child, idx) {
					child.classList.add('yfg-anim', group.variant);
					child.dataset.yfgDelay = idx * STAGGER_MS;
					observer.observe(child);
				});
			});
		});

		/* Intro section — left / right slide */
		var introRows = document.querySelectorAll('.py-6 .row.align-items-center');
		introRows.forEach(function (row) {
			var cols = row.querySelectorAll('[class*="col-lg-"]');
			cols.forEach(function (col, idx) {
				if (col.querySelector('.yfg-anim')) return; // skip if already registered
				col.classList.add('yfg-anim');
				col.classList.add(idx % 2 === 0 ? 'yfg-anim--left' : 'yfg-anim--right');
				col.dataset.yfgDelay = idx * 120;
				observer.observe(col);
			});
		});

		/* Step number icons */
		document.querySelectorAll('.yfg-step-num').forEach(function (el, idx) {
			el.classList.add('yfg-anim', 'yfg-anim--pop');
			el.dataset.yfgDelay = idx * 100;
			observer.observe(el);
		});

		/* Accent lines */
		document.querySelectorAll('.yfg-accent').forEach(function (el) {
			el.classList.add('yfg-anim');
			observer.observe(el);
		});

		/* FAQ items */
		document.querySelectorAll('.accordion-item').forEach(function (el, idx) {
			el.classList.add('yfg-anim', 'yfg-anim--up');
			el.dataset.yfgDelay = idx * 60;
			observer.observe(el);
		});
	}

	/* ============================================================
	   2. HERO PARALLAX — subtle depth on scroll
	   ============================================================ */

	function setupParallax() {
		var hero = document.querySelector('.yfg-hero');
		if (!hero) return;

		var blobs = hero.querySelectorAll('.yfg-blob');

		var ticking = false;
		window.addEventListener('scroll', function () {
			if (ticking) return;
			window.requestAnimationFrame(function () {
				var scrollY = window.scrollY;
				var heroH   = hero.offsetHeight;
				if (scrollY > heroH) { ticking = false; return; }

				var progress = scrollY / heroH; // 0 → 1

				blobs.forEach(function (blob, i) {
					var dir   = i % 2 === 0 ? 1 : -1;
					var speed = 0.18 + i * 0.06;
					blob.style.transform = 'translateY(' + (progress * dir * speed * 80) + 'px)';
				});

				ticking = false;
			});
			ticking = true;
		}, { passive: true });
	}

	/* ============================================================
	   3. ANIMATED COUNTER — numbers count up when in view
	   ============================================================ */

	function animateCounter(el) {
		var target = parseFloat(el.dataset.yfgCount || el.textContent.replace(/[^0-9.]/g, ''));
		var suffix = el.dataset.yfgSuffix || '';
		var prefix = el.dataset.yfgPrefix || '';
		var isInt  = Number.isInteger(target);
		var duration = 1400; // ms
		var start  = null;

		function step(timestamp) {
			if (!start) start = timestamp;
			var progress = Math.min((timestamp - start) / duration, 1);
			var ease     = 1 - Math.pow(1 - progress, 3); // ease-out-cubic
			var current  = target * ease;
			el.textContent = prefix + (isInt ? Math.round(current) : current.toFixed(1)) + suffix;
			if (progress < 1) requestAnimationFrame(step);
		}
		requestAnimationFrame(step);
	}

	function setupCounters() {
		var counterObserver = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (!entry.isIntersecting) return;
				animateCounter(entry.target);
				counterObserver.unobserve(entry.target);
			});
		}, { threshold: 0.5 });

		document.querySelectorAll('[data-yfg-count]').forEach(function (el) {
			counterObserver.observe(el);
		});
	}

	/* ============================================================
	   4. HERO FORM — success / error message auto-dismiss
	   ============================================================ */

	function setupFormFeedback() {
		var alerts = document.querySelectorAll('.yfg-form-card .alert');
		alerts.forEach(function (alert) {
			setTimeout(function () {
				alert.style.transition = 'opacity 0.5s ease, max-height 0.5s ease';
				alert.style.opacity    = '0';
				alert.style.maxHeight  = '0';
				alert.style.overflow   = 'hidden';
				setTimeout(function () { alert.remove(); }, 600);
			}, 4000);
		});
	}

	/* ============================================================
	   5. NAV SMOOTH SCROLL — all anchor links
	   ============================================================ */

	function setupSmoothScroll() {
		document.querySelectorAll('a[href^="#"]').forEach(function (link) {
			link.addEventListener('click', function (e) {
				var target = document.querySelector(this.getAttribute('href'));
				if (!target) return;
				e.preventDefault();
				var offset = 80; // account for sticky nav if any
				var top    = target.getBoundingClientRect().top + window.scrollY - offset;
				window.scrollTo({ top: top, behavior: 'smooth' });
			});
		});
	}

	/* ============================================================
	   6. SERVICE CARD — tilt on mousemove (desktop only)
	   ============================================================ */

	function setupCardTilt() {
		if (window.matchMedia('(hover: none)').matches) return; // skip touch devices

		document.querySelectorAll('.yfg-service-card').forEach(function (card) {
			card.addEventListener('mousemove', function (e) {
				var rect    = card.getBoundingClientRect();
				var x       = (e.clientX - rect.left) / rect.width  - 0.5; // -0.5 → 0.5
				var y       = (e.clientY - rect.top)  / rect.height - 0.5;
				var rotateX = -(y * 8).toFixed(2);
				var rotateY =  (x * 8).toFixed(2);
				card.style.transform = 'perspective(600px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg) translateY(-6px)';
			});

			card.addEventListener('mouseleave', function () {
				card.style.transition = 'transform 0.4s cubic-bezier(0.22,1,0.36,1), box-shadow 0.3s ease';
				card.style.transform  = '';
				setTimeout(function () { card.style.transition = ''; }, 400);
			});
		});
	}

	/* ============================================================
	   7. WHY ITEMS — ripple on click
	   ============================================================ */

	function setupRipple() {
		document.querySelectorAll('.btn-brand, .btn-ghost-light').forEach(function (btn) {
			btn.style.position = 'relative';
			btn.style.overflow = 'hidden';

			btn.addEventListener('click', function (e) {
				var rect   = btn.getBoundingClientRect();
				var size   = Math.max(rect.width, rect.height) * 2;
				var ripple = document.createElement('span');
				ripple.style.cssText = [
					'position:absolute',
					'border-radius:50%',
					'background:rgba(255,255,255,0.3)',
					'width:'  + size + 'px',
					'height:' + size + 'px',
					'left:'   + (e.clientX - rect.left  - size / 2) + 'px',
					'top:'    + (e.clientY - rect.top   - size / 2) + 'px',
					'animation:yfgRipple 0.55s ease-out forwards',
					'pointer-events:none',
				].join(';');
				btn.appendChild(ripple);
				setTimeout(function () { ripple.remove(); }, 600);
			});
		});

		/* Inject ripple keyframe once */
		if (!document.getElementById('yfg-ripple-style')) {
			var s = document.createElement('style');
			s.id  = 'yfg-ripple-style';
			s.textContent = '@keyframes yfgRipple{from{transform:scale(0);opacity:1}to{transform:scale(1);opacity:0}}';
			document.head.appendChild(s);
		}
	}

	/* ============================================================
	   8. INIT
	   ============================================================ */

	function init() {
		setupScrollReveal();
		setupParallax();
		setupCounters();
		setupFormFeedback();
		setupSmoothScroll();
		setupCardTilt();
		setupRipple();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}

})();