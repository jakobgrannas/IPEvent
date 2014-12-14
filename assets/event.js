/**
 * Frontend stuff
 */

(function ($) {
	$(document).ready(init);

	var readMoreText = '';
	function init () {
		$(document).on('click', '.event__read-more', expandCollapseText);
	}

	/**
	 * Toggles expanding/collapsing of event box text.
	 * Also toggles the read more text
	 * @param e {event}
	 */
	function expandCollapseText (e) {
		e.preventDefault();

		var thisEl = $(this),
			readLessText = thisEl.data('read-less'),
			closestTextBox = thisEl.siblings('.bullet__text--secondary');

		closestTextBox.toggleClass('expanded');

		if(closestTextBox.hasClass('expanded')) {
			if(!readMoreText) readMoreText = thisEl.text();
			thisEl.text(readLessText);
		}
		else {
			thisEl.text(readMoreText);
		}
	}
})(jQuery);