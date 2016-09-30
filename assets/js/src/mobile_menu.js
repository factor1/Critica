;(function($) {

    'use strict';

    $(document).ready(function() {

        // Initialize mobile menu
        (window.niftyNav || (function() {}))();
        var mobileBars$ = $('header .fa-bars');

        // Trigger mobile menu from primary menu
        mobileBars$.click(function() {
            $(this).closest('header').toggleClass('mobile');
            $(this).toggleClass('active');

            window.scrollTo(0,0);

            var headerHeight = $('header').offset().top+$('header').outerHeight();

            $('body > .nifty-panel').css({
                top: headerHeight + 'px'
            });

            $('#nifty-nav-toggle').click();

            $('body > .nifty-mask').css({
                marginTop: headerHeight + 'px'
            });
        });

        // On mask click
        $(document).on('click','.nifty-mask',function() {
            mobileBars$.removeClass('active');
        });

        // Handle mobile menu toggles
        $('.nifty-panel').on('click','ul.menu > li.menu-item-has-children > a',function(e) {
            e.preventDefault();
            $(this).closest('li').toggleClass('active');
        });

    });

})(jQuery);