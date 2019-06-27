(function($){

$(window).load(function(){  
    // main page vars
    var $charsWin = $('#chars-window');
    var $charsInner = $('.chars-inner');
    var $trigger = $('.trigger');
    var $closeChar = $('#close-char');
    var winHt = $(window).height();
    // modal box vars
    var $prev = $('#prev-char');
    var $next = $('#next-char');
    var $navLink = $('#chars-nav').find('a');
    var ind = 0
    var charCount = 0
    
    // counting current characters
    $charsInner.each(function(){
        charCount++;
    });
    
    // forcing height of inner modal div
    $charsInner.css({ 'max-height' : (winHt - 50) });
    
    // hide inner modal
    $charsInner.hide();
    
    // display clicked character
    $trigger.click(function(e){
        e.preventDefault();
        $charsWin.fadeIn(300);
        $navLink.removeClass('disable-arrow');
        
        ind = $(this).attr('data-index');
        var $selected = $('#chars-main-' + ind);
        
        if ($selected.css('display') != 'none') {
            return;
        } else {
            $charsInner.removeClass('selected').fadeOut(400);
            $selected.addClass('selected').fadeIn(400);
        }
        
        if (ind == 0) {
            $prev.addClass('disable-arrow');
        } else if (ind == (charCount - 1)) {
            $next.addClass('disable-arrow');
        }
    }); //end click trigger
    
    $prev.click(function(e){
        e.preventDefault();
        
        if (ind != 0) {
            ind--;
            var $selected = $('#chars-main-' + ind);
            $charsInner.fadeOut(300);
            $charsInner.removeClass('selected').fadeOut(300);
            $selected.addClass('selected').fadeIn(300);
            $navLink.removeClass('disable-arrow');
            if (ind == 0) {
                $(this).addClass('disable-arrow');
            }
        } else {
            return false;
        }
        
    }); // end click prev char
    
    $next.click(function(e){
        e.preventDefault();
        
        if ( ind < (charCount - 1) ) {
            ind++;
            var $selected = $('#chars-main-' + ind);
            $charsInner.fadeOut(300);
            $charsInner.removeClass('selected').fadeOut(300);
            $selected.addClass('selected').fadeIn(300);
            $navLink.removeClass('disable-arrow');
            if (ind == (charCount - 1)) {
                $(this).addClass('disable-arrow');
            }
        } else {
            return false;
        }
        
    }); // end click prev char
    
    $closeChar.click(function(e){
       e.preventDefault(); 
       
       $charsWin.fadeOut(300);
    });

}); //end load

}(jQuery));