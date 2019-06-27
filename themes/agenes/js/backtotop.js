(function($){
    $(window).load(function(){
        
        // email link
        if ( $('#email-link') ) {
            var $email = $('#email-link');
            var address = 'contact';
            var domain = 'remnanttribes';
        }
        
        $email.click(function(){
           $(this).html('<a href="mailto:' + address + '@' + domain + '.com">' + address + '@' + domain + '.com</a>');
        });
        
        //Ignore everything if screen is small
        var scrWd = $(window).width();
        if (scrWd <= 768) { return; }
        
        // select back to top button
        var $backtotop = $('#backtotop');
        var showPoint = $('#hero-wrap').outerHeight();
        
        // $backtotop.hide();
        
        // on scroll, if top offset > ##px
        $(document).scroll(function(){
            
            if ( $('html').scrollTop() > (showPoint/2) ) {
                $backtotop.removeClass('at-top');
            } else {
                $backtotop.addClass('at-top');
            }
            
        }); // end scroll
        
        $backtotop.click(function(e){
            $('body, html').animate( { scrollTop : 0 }, 'slow' );
            
            e.preventDefault();
        });
        
    }); // end load
}(jQuery));


