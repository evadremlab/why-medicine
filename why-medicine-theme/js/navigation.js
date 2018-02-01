/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function($) {
	var container$, button$;
	// container = document.getElementById( 'site-navigation' );
	container$ = $('#site-navigation');
	if (!container$) {
		return;
	}

	button$ = container$.find('button');
	if (!button$) {
		return;
	}

	button$.click(function() {
		$('#primary-menu').hide();
		$('#slide-nav').toggleClass('expanded');
	});
})(jQuery);
