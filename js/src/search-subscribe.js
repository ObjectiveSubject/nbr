/*
 * SEARCH & SUBSCRIBE FORM
 */

(function($){

    $(document).ready(function(){

        // Add a close button to forms
        $('form').append('<div class="closebtn"></div>');

        $('.closebtn').click(function(){
            var closeObject = $(this).closest('[data-selector]');
            $(closeObject).animate({opacity: '0'}, 250);
            $('#main').removeClass('faded');
            $(closeObject).slideUp(250);
        });

        var aLinks = $('nav li a:contains("Search"), nav li a:contains("Stay In Touch")');
        $(aLinks).click(function(e){
            var aLinksText = $(this).text().toLowerCase().replace(/ /g, '-');
            var aObject = $('[data-selector=' + aLinksText + ']');
            $(aObject).slideDown(250);
            $(aObject).animate({opacity: '1'}, 250);
            $('#main').addClass('faded');
            setTimeout(function(){
                $(aObject).find('input:first').focus();
            }, 500);
            e.preventDefault();
        });

    });

})(jQuery);
