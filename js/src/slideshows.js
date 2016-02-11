/*
 * Slideshows
 */

(function($){

    $(document).ready(function(){

        $(".home-slides").responsiveSlides({
          auto: true,             			// Boolean: Animate automatically, true or false
          speed: 500,            			// Integer: Speed of the transition, in milliseconds
          timeout: 4500,         		 	// Integer: Time between slide transitions, in milliseconds
          pager: true,           			// Boolean: Show pager, true or false
          nav: true,             			// Boolean: Show navigation, true or false
          random: false,          			// Boolean: Randomize the order of the slides, true or false
          pause: true,           			// Boolean: Pause on hover, true or false
          pauseControls: true,    			// Boolean: Pause when hovering controls, true or false
          prevText: "Previous",   			// String: Text for the "previous" button
          nextText: "Next",       			// String: Text for the "next" button
          maxwidth: "1000",           		// Integer: Max-width of the slideshow, in pixels
          navContainer: "",    			 	// Selector: Where controls should be appended to, default is after the 'ul'
          manualControls: "",     			// Selector: Declare custom pager navigation
          namespace: "r_slides",  	 		// String: Change the default namespace used
        });

        $(".post-slides").responsiveSlides({
          auto: false,             			// Boolean: Animate automatically, true or false
          speed: 500,            			// Integer: Speed of the transition, in milliseconds
          timeout: 1000,          			// Integer: Time between slide transitions, in milliseconds
          pager: true,           			// Boolean: Show pager, true or false
          nav: true,             			// Boolean: Show navigation, true or false
          random: false,          			// Boolean: Randomize the order of the slides, true or false
          pause: true,           			// Boolean: Pause on hover, true or false
          pauseControls: true,    			// Boolean: Pause when hovering controls, true or false
          prevText: "Previous",   			// String: Text for the "previous" button
          nextText: "Next",       			// String: Text for the "next" button
          maxwidth: "1000",           		// Integer: Max-width of the slideshow, in pixels
          navContainer: "",       			// Selector: Where controls should be appended to, default is after the 'ul'
          manualControls: "",     			// Selector: Declare custom pager navigation
          namespace: "r_slides",   			// String: Change the default namespace used
        });

    });

})(jQuery);
