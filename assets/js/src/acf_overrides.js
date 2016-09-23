;(function($) {

    'use strict';

    // Override Google API calls to use API Key
    $.getScript('https://www.google.com/jsapi', function(){

        var googleLoad = window.google.load || {};

        window.google.load = function(lib,version,options) {

            // Target only calls to maps api
            if(lib !== 'maps') {
                return googleLoad(lib,version,options);
            }

            // Detect key
            var key$ = $('div[data-maps-api-key]');

            // No key, bail
            if(!key$.length) {
                return googleLoad(lib,version,options);
            }

            // Adjust the call params
            /* jshint ignore:start */
            options.other_params = 'key='+key$.data('maps-api-key')+'&libraries=places';
            /* jshint ignore:end */

            return googleLoad(lib,version,options);

        };

    });

})(jQuery);