/*
 * SINGLE GALAS
 */

(function($){

    if ( $('body').hasClass('single-galas') && !Modernizr.touchevents ) {

        $(".gala_slides_tabs").slick({
            speed: 500,
            adaptiveHeight: true,
            asNavFor: ".gala-slideshow",
            slidesToShow: 7,
            slidesToScroll: 7,
            infinite: false,
            responsive: [{
                breakpoint: 900,
                settings: { slidesToShow: 6, slidesToScroll: 6 }
            }, {
                breakpoint: 768,
                settings: "unslick"
            }]
        });

        $(".gala-slideshow").slick({
            speed: 500,
            fade: true,
            adaptiveHeight: true,
            asNavFor: ".gala_slides_tabs",
            responsive: [{
                breakpoint: 768,
                settings: { fade: false, infinite: true }
            }]
        });

        $('.thumb-nav li a').click(function(e){
            e.preventDefault();
            var index = $(this).parent().data('slick-index');
            $(".gala-slideshow").slick("slickGoTo", index);
        });

    }

})(jQuery);
