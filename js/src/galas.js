/*
 * SINGLE GALAS
 */

(function($){

    if ( $('body').hasClass('single-galas') ) {

        var $thumbNav = $('.thumb-nav'),
            $entryMedia = $('.entry-media.gala'),
            $tabs = $(".gala_slides_tabs"),
            $slides = $(".gala-slideshow"),
            tabsSettings = {
                speed: 500,
                lazyLoad: 'ondemand',
                adaptiveHeight: true,
                asNavFor: ".gala-slideshow",
                slidesToShow: 9,
                slidesToScroll: 9,
                infinite: true,
                responsive: [{
                    breakpoint: 900,
                    settings: { slidesToShow: 6, slidesToScroll: 6 }
                }]
            },
            slidesSettings = {
                speed: 500,
                lazyLoad: 'ondemand',
                fade: true,
                // adaptiveHeight: true,
                asNavFor: ".gala_slides_tabs",
                infinite: true,
                responsive: [{
                    breakpoint: 768,
                    settings: { fade: false }
                }]
            };

        $tabs.slick(tabsSettings);
        $slides.slick(slidesSettings);
        $slides.on("afterChange", function(e, slick, current){
            $('.current-slide').text(current + 1);
        });

        $('.thumb-nav li a').click(function(e){
            e.preventDefault();
            var index = $(this).parent().data('slick-index');
            $slides.slick("slickGoTo", index);
        });

        $('.toggle_images').click(function(e){
            e.preventDefault();
            var $toggle = $(this);

            if ( $entryMedia.hasClass('slide-view') ){
                $slides.slick("unslick");
                $slides.find("img[data-lazy]").each(function(){
                    addSrc(this);
                });
                $entryMedia.addClass("grid-view").removeClass("slide-view");
                $thumbNav.addClass("hide");
                $toggle.text('Back to slideshow');
            } else {
                $slides.slick(slidesSettings);
                $entryMedia.addClass("slide-view").removeClass("grid-view");
                $thumbNav.removeClass("hide");
                $toggle.text('See all photos');
            }

            $('html, body').animate({scrollTop: $entryMedia.offset().top + 'px'});

        });

    }

    function addSrc(elem) {
        var src = $(elem).data('lazy');
        $(elem).attr('src', src);
    }

})(jQuery);
