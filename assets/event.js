/**
 * Frontend stuff
 */

(function ($) {
	$(document).ready(init);

	function init () {
		$(document).on('click', '.event__read-more', toggleText);
	}

	function toggleText (e) {
		e.preventDefault();
		$(this).siblings('.bullet__text--secondary').toggleClass('expanded');
	}
})(jQuery);