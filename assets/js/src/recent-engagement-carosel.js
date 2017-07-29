/*
*   Enables the image carosel for Recent Engagements.
*/

;(function($) {

    'use strict';
    var ACTIVE_CLASS = 'gallery-image-active';

    $(document).ready(function() {

        //  Checks for presence of gallery
        var $gallery = $('.recent-engagement .photo-gallery');
        if (!$gallery) {
            return;
        }

        var $images = $gallery.find('.gallery-image');

        //  Sets the first image as active.
        $images.first().addClass(ACTIVE_CLASS);

        //  Enables gallery navigation buttons, if there are multiple images.
        if ($images.length > 1) {

            var $previousLink = $gallery.find('.fa-angle-left');
            $previousLink.show();
            $previousLink.click(function() {
                var $active = $gallery.find('.' + ACTIVE_CLASS);
                $active.removeClass(ACTIVE_CLASS);
                var $previousImage = $active.prev();
                if ($previousImage.length) {
                    $previousImage.addClass(ACTIVE_CLASS);
                } else {
                    $images.last().addClass(ACTIVE_CLASS);
                }
            });
            
            var $nextLink = $gallery.find('.fa-angle-right');
            $nextLink.show();
            $nextLink.click(function() {
                var $active = $gallery.find('.' + ACTIVE_CLASS);
                $active.removeClass(ACTIVE_CLASS);
                var $nextImage = $active.next();
                if ($nextImage.length) {
                    $nextImage.addClass(ACTIVE_CLASS);
                } else {
                    $images.first().addClass(ACTIVE_CLASS);
                }
            });

        }

    });

})(jQuery);
