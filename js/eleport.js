/**
 * Eleport jQuery plugin
 *
 * Creates a copy of the DOM element and (optionally) adds a custom class to that
 * copy.
 *
 * @param	copyInto	Target DOM node (required)
 * @param	addClass	Custom class name to be added to the copied element
 * @param	removeClass	Class name to be removed from the copied element
 *
 * @author	Andrew (reff) Reva
 * @version	1.1§
 */
(function($) {
    $.fn.eleport = function(options) {

        var options = jQuery.extend({
            copyInto: '',
            copyIntroEnd: '',
            addClass: '',
            removeClass: ''
        }, options);

        return this.each(function() {
            if (options.copyInto)
                jQuery(this)
                        .clone()
                        .prependTo(options.copyInto)
                        .addClass(options.addClass)
                        .removeClass(options.removeClass);
            if (options.copyIntroEnd)
                jQuery(this)
                        .clone()
                        .appendTo(options.copyIntroEnd)
                        .addClass(options.addClass)
                        .removeClass(options.removeClass);
        });
    };
})(jQuery);