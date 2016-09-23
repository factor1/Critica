/* Nifty Nav
* Author: Eric Stout / Factor1
* http://factor1studios.com
* Repo: https://github.com/factor1/nifty-nav
* Version: 2.2.0
*/

var niftyNav = function(options){
  $nifty_toggle = $('#nifty-nav-toggle');
  $nifty_panel = $('.nifty-panel');
  $nifty_nav_item = $('.nifty-nav-item');
  $nifty_parent = $('.nifty-panel ul li');

  var settings = $.extend({
    // These are the defaults.
    subMenus: false,
    mask: true,
    itemClickClose: true,
    panelPosition:  'absolute',
    subMenuParentLink:  false
  }, options );

  subMenus          = settings.subMenus;
  mask              = settings.mask;
  itemClickClose    = settings.itemClickClose;
  panelPosition     = settings.panelPosition;
  subMenuParentLink = settings.subMenuParentLink;


  // Core Nifty Nav Functions
  niftyRemove = function(){
    $('.nifty-mask').remove();
  };

  niftyUnmask = function(){
    $('.nifty-mask').animate({opacity: 0.0});
    setTimeout(niftyRemove, 800);
  };

  // on nifty nav toggle click
  $nifty_toggle.click(function(){
    var $this = $(this);
    $this.toggleClass('nifty-active');
    $nifty_panel.slideToggle(500).css('position',panelPosition);

    // if panelPosition is fixed
    if( panelPosition == 'fixed' ){
      $('body').toggleClass('nifty-lock');
    }

    if( mask === true){
      // if a mask exists
      if( $('.nifty-mask').length > 0 ){
        niftyUnmask();
      } else{
        // if no mask exists
        $('body').append('<div class="nifty-mask"></div>');
        $('.nifty-mask').animate({opacity: 1.0});

        // if a user clicks on the mask
        $('.nifty-mask').click(function(){
          $nifty_panel.slideUp(500);
          niftyUnmask();
          $nifty_toggle.removeClass('nifty-active');

          // if panelPosition is fixed
          if( panelPosition == 'fixed' ){
            $('body').removeClass('nifty-lock');
          }
        });
      }
    }
  });

  // close nifty nav on nav item click
  if( itemClickClose === true ){
    $nifty_nav_item.click(function(){
      $nifty_panel.slideUp(500);
      niftyUnmask();
      $nifty_toggle.removeClass('nifty-active');

      // if panelPosition is fixed
      if( panelPosition == 'fixed' ){
        $('body').removeClass('nifty-lock');
      }

    });
  }

  // if sub menus are enabled
  if( subMenus === true ){
    var $nifty_parent_active;
    // if subMenuParentLink is false
    if( subMenuParentLink === false ){
      $('.nifty-panel .menu-item-has-children > a').click(function(event){
        event.preventDefault();
      });
    }

    $nifty_parent.click(function(){
      $nifty_parent_active = $(this);
      $nifty_parent_active.find('.sub-menu').slideToggle();
      $nifty_parent_active.find('a').toggleClass('nifty-menu-opened');
    });
  }

};

/* Ginger JS
* Author: Eric Stout <ericwstout.com>
* GitHub: https://github.com/erwstout/ginger
*/

$("[class^=flex-basis-]").each(function(){
  $this = $(this);
  var flexyFlex = $this.attr('class');
  var flexbasis = flexyFlex.match(/\d+/)[0];
  $this.css({
    '-webkit-flex-basis': flexbasis + 'px',
    '-ms-flex-preferred-size': flexbasis + 'px',
    'flex-basis': flexbasis + 'px'
  });
});

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
