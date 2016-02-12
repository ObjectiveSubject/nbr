/*
 * Slideshows
 */

(function($){

    $(".home-slides").slick({
        autoplay: false,
        speed: 500,            			// Integer: Speed of the transition, in milliseconds
        autoplaySpeed: 4500,         		// Integer: Time between slide transitions, in milliseconds
        dots: true,           			// Boolean: Show pager, true or false
        fade: true,
        adaptiveHeight: true,
        responsive: [{
            breakpoint: 768,
            settings: { fade: false, infinite: true }
        }]
    });

    $(".post-slides").slick({
      autoplay: false,
      speed: 500,            			// Integer: Speed of the transition, in milliseconds
      dots: true,           			// Boolean: Show pager, true or false
      fade: true,
      adaptiveHeight: true,
      responsive: [{
          breakpoint: 768,
          settings: { fade: false, infinite: true }
      }]
    });

})(jQuery);
