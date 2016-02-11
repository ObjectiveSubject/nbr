/*
 * SINGLE GALAS
 */

(function($){

    if ( $('body').hasClass('single-galas') && !Modernizr.touchevents ) {

        $(".gala-slideshow").responsiveSlides({
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
          navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
          manualControls: ".gala_slides_tabs",// Selector: Declare custom pager navigation
          namespace: "gala_slides",   			// String: Change the default namespace used
        });

        // Gala thumb slider -----------------------------------
        // wrap the list of images in a container called 'thumb-veiwport'
        $('.gala_slides_tabs').wrap('<div id="thumb-viewport"></div>');

        // give the viewport some dimensions
        $('#thumb-viewport').css({
            width: '100%',
            height: '105px',
            position: 'relative',
            overflow: 'hidden'
        });

        // setting ul position to absolute in order to run animation
        $('#thumb-viewport ul.gala_slides_tabs').css({
            position: 'absolute',
            top: '0',
            left: '0'
        });

        // create a counter and position each <li> element
        var count = 0;
        $('#thumb-viewport li').each(function(){
            $(this).css({
                position: 'absolute',
                top: '0',
                left: (count * 105) + 'px'
            });
            count++;
        });

        // create our previous and next buttons
        $('.thumb-nav').append('<a href="#" class="btn prev yellow-hover">Previous</a><a href="#" class="btn next yellow-hover">Next</a>');

        // Showing or hiding the buttons
        var currentImage = 1; 								// create a monitor for the slideshow to determine the slideshow's current position
        var numImages = $('#thumb-viewport li').length;		//create a variable to count the number of images in our slideshow
        var showButtons = function () {							// Create a function to determine the visibilty of previous and next buttons
            if(currentImage > 1) {
                $('.thumb-nav .prev').show();
            }
            else {
                $('.thumb-nav .prev').hide();
            }

            if(currentImage < numImages) {
                $('.thumb-nav .next').show();
            }
            else {
                $('.thumb-nav .next').hide();
            }
        };
        showButtons();										// Show buttons upon page load. Initially, will only show 'Next' button.

        //attaching event handlers to our buttons
        $('.thumb-nav .next').live('click', function(e) {
            e.preventDefault();
            if(currentImage < numImages) {
                    $('.gala_slides_tabs').animate({		// animate the slideshow to go 400px to the left
                        left: '-=105px' 					// go -400px and repeat upon next click
                    });
                    currentImage++;							// update your current image monitor variable
                    showButtons();							// Based on value of currentImage, decides whether to show or hide buttons.
                }
            });
        $('.thumb-nav .prev').live('click', function(e) {
            e.preventDefault();							// prevent default link behavior
            if(currentImage > 1) {						// we need a condition that will only run the animation if we are not on the first image
                $('.gala_slides_tabs').animate({		// animate the slideshow to go 400px to the right
                    left: '+=105px'
                });
                currentImage--; 						// update your current image monitor variable. subtracts 1 from the value of 'currentImage'
                showButtons();							// Based on value of currentImage, decides whether to show or hide buttons.
            }
        });

    }

})(jQuery);
