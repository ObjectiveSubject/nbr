/*
 * Menus
 */

(function($){

    $('.menu-toggle').click(function(){
    	if($('.navigation-main ul').hasClass('open')) {
    		$('.navigation-main, .navigation-main ul').removeClass('open');
    	} else {
    		$('.navigation-main, .navigation-main ul').addClass('open');
    	}
    });

})(jQuery);
