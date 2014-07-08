jQuery(document).ready(function () {
    jQuery('.sticky').sticky();
});

jQuery.fn.sticky = function () {
    var element = jQuery(this);
    if ( !! jQuery(element).offset()) { // make sure ".sticky" element exists
        var stickyTop = jQuery(element).offset().top; // returns number
        jQuery(window).scroll(function () { // scroll event
            var windowTop = jQuery(window).scrollTop(); // returns number
            if (windowTop > (jQuery(document).height() - (450 + jQuery(element).height()))) {
                var fix = (jQuery(document).height() - (450 + jQuery(element).height()));
                jQuery(element).css({
                    position: 'absolute',
                    top: fix + 'px'
                });
            } else {
                if (stickyTop < windowTop) {
                    jQuery(element).css({
                        position: 'fixed',
                        top: "20px",
                        left: jQuery(element).offset().left + "px"
                    });
                } else {
                    jQuery(element).css('position', 'static');
                }
            }
        });
    }
}
