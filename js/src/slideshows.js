/*
 * Slideshows
 */

(function($){

    $(".home-slides").each(function(){

        if ( $(this).find('li').length > 1 ) {

            $(this).slick({
                autoplay: true,
                speed: 500,
                autoplaySpeed: 4500,
                dots: true,
                fade: true,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 768,
                    settings: { fade: false, infinite: true }
                }]
            });

        }

    })

    $(".post-slides").each(function(){

        if ( $(this).find('li').length > 1 ) {

            $(this).slick({
              autoplay: false,
              speed: 500,
              dots: true,
              fade: true,
              adaptiveHeight: true,
              responsive: [{
                  breakpoint: 768,
                  settings: { fade: false, infinite: true }
              }]
            });

        }

    });

})(jQuery);
