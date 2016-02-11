/*
 * DRAWERS
 */

(function($){

    if ($('.drawer').index() > -1) {

        $('.drawer').each(function(){
            var drawer = $(this);
            var drawerHt = drawer.height();
            var viewAll = drawer.siblings('a.view-all-drawer');
            var viewAllText = viewAll.text();
            var closedHt;
            if ( drawer.hasClass('w-preview') ) { closedHt = '95px'; } else { closedHt = '0'; }
            drawer.height(closedHt);
            viewAll.click(function(e){
                if ( drawer.hasClass('open') ) {
                    drawer.animate({height: closedHt}).removeClass('open');
                    viewAll.text(viewAllText);
                } else {
                    if (drawerHt > 250) {
                        drawer.animate({height: '250px'}).addClass('open');
                    } else {
                        drawer.animate({height: drawerHt + 'px'}).addClass('open');
                    }
                    viewAll.text('Close');
                }
                e.preventDefault();
            });
        });

    }

})(jQuery);
