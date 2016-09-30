/**
*   Handles ajax loading of the archive grid when post
*   filters are used
*/
;(function($) {

    'use strict';

    $(document).ready(function() {

        var filters$ = $('section.post-filters');
        var dropdowns$ = filters$.find('.dropdown');
        var grid$ = $('.archive-grid');

        // No filters on page, skip
        if(!filters$.length || !dropdowns$.length) {
            return;
        }

        // Handle UI changes on selection
        dropdowns$.on('click','a[data-value]',function(e) {
            e.preventDefault();

            var select$ = $(this).closest('.dropdown');
            var submenu$ = select$.children('ul');

            // Mark the selection active
            select$.find('a').not($(this)).toggleClass('active',false);
            $(this).toggleClass('active',true);

            // Close the drop down
            submenu$.slideUp(400,function() {
                setTimeout(function() { submenu$.attr('style',''); },1000);
            });

            // Set the dropdown label to the selected
            select$.children('span').html(
                select$.find('a.active').html()
            );

            // Trigger posts reload
            select$.trigger('filter-select');
        });

        // Handle scrolling to filters
        var scrollToFilters = function() {

            var y = filters$.offset().top - $('header').outerHeight();

            if($('#wpadminbar').length) {
                y -= $('#wpadminbar').outerHeight();
            }

            window.scrollTo(0,y);
        };

        // Handle loading/reloading posts
        dropdowns$.on('filter-select',function() {

            var query = [];

            dropdowns$.each(function() {

                var active$ = $(this).find('a.active');
                var k = $(this).data('query-var') || '';
                var v = (active$.length) ? active$.data('value') : '';

                query.push(k+'='+v);

            });

            query = '?'+query.join('&');

            grid$.load(query+' .archive-grid > *');
            scrollToFilters();
        });

        // Handle pagination links
        grid$.on('click','section.pagination a[href]',function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            grid$.load($(this).attr('href')+' .archive-grid > *');
            scrollToFilters();
        });

    });

})(jQuery);