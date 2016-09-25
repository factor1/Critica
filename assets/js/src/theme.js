;(function($) {

    'use strict';

    $(document).ready(function() {

        // Initialize hero sliders
        $('section.hero-slider .slider').slick({
            arrows: false,
            dots: true
        });

        /*
        $('section.hero-slider .slider').slick({
            draggable: false,
            arrow: false,
            dots: true
        });
        */

        // Handle accordian clicks
        $(document).on('click','.accordion--title',function() {

            var fa$ = $(this).find('.fa');
            var accordian$ = $(this).find('.accordion--content');

            if(!fa$.length || !accordian$.length) {
                return;
            }

            $(this).toggleClass('active');
            fa$.toggleClass('fa-chevron-down').toggleClass('fa-chevron-up');
            accordian$.slideToggle();

        });

        // Make any grid block with links clickable
        $(document).on('click','section.block[data-href]',function() {
            var href = $(this).data('href');
            if(!href) {
                return;
            }
            window.location.href = href;
        });

    });

})(jQuery);