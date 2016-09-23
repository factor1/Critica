/**
*   Renders map using the Google Maps API with provided key
*/
;(function($) {

    'use strict';

    $(document).ready(function() {

        var onReady = function() {

            var maps = window.google.maps || {};

            if(!maps) {
                return;
            }

            var maps$ = $('div.google-map[data-lat][data-lng]');

            if(!maps$.length) {
                return;
            }

            var options = {
                zoom: 8,
                mapTypeId: maps.MapTypeId.ROADMAP
            };

            maps$.each(function() {
                options.center = new maps.LatLng(
                    $(this).data('lat'),
                    $(this).data('lng')
                );
                return new maps.Map( $(this).get(0), options );
            });

        };

        if(!window.google || !window.google.maps) {

            // Detect key
            var key$ = $('div[data-maps-api-key]');

            // No key, bail
            if(!key$.length) {
                return;
            }

            $.getScript('https://www.google.com/jsapi', function() {

                window.google.load('maps','3',{
                    /* jshint ignore:start */
                    other_params: 'key='+key$.data('maps-api-key')+'&libraries=places',
                    /* jshint ignore:end */
                    callback: onReady
                });

            });

            return;
        }

        onReady();

    });

})(jQuery);