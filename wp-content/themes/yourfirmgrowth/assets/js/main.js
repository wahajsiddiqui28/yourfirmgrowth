/**
 * YourFirmGrowth theme scripts.
 */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {
		// Mobile nav toggle.
		var toggle = document.querySelector( '.yfg-nav-toggle' );
		var nav    = document.querySelector( '.main-navigation' );

		if ( toggle && nav ) {
			toggle.addEventListener( 'click', function () {
				var expanded = toggle.getAttribute( 'aria-expanded' ) === 'true';
				toggle.setAttribute( 'aria-expanded', String( ! expanded ) );
				nav.classList.toggle( 'is-open' );
				document.body.classList.toggle( 'yfg-nav-open' );
			} );
		}

		// Smooth scroll for in-page anchor links.
		document.querySelectorAll( 'a[href^="#"]' ).forEach( function ( link ) {
			link.addEventListener( 'click', function ( e ) {
				var id = link.getAttribute( 'href' );
				if ( id.length > 1 ) {
					var target = document.querySelector( id );
					if ( target ) {
						e.preventDefault();
						target.scrollIntoView( { behavior: 'smooth' } );
					}
				}
			} );
		} );
	} );
} )();












// YFG Process Section — scroll animation
(function () {
	var steps   = document.querySelectorAll('.yfg-proc-step');
	var fill    = document.getElementById('yfgProcFill');
	var started = false;

	if (!steps.length) return;

	function startAnimation() {
		if (started) return;
		started = true;

		steps.forEach(function (step) {
			var delay = parseInt(step.getAttribute('data-delay') || 0, 10);
			setTimeout(function () {
				step.classList.add('yfg-visible');
			}, delay);
		});

		if (fill) {
			setTimeout(function () {
				fill.style.width = '100%';
			}, 300);
		}
	}

	// IntersectionObserver — animate when section scrolls into view
	if ('IntersectionObserver' in window) {
		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					startAnimation();
					observer.disconnect();
				}
			});
		}, { threshold: 0.2 });

		observer.observe(document.getElementById('yfgProcGrid') || steps[0]);
	} else {
		startAnimation(); // fallback for old browsers
	}
})();