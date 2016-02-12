/*
 * Slideshows
 */

(function($){

    $(".home-slides").slick({
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

    $(".post-slides").slick({
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

})(jQuery);
