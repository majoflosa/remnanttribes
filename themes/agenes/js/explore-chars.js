(function($){

$(window).load(function(){  
    // main page vars
    var $charsWin = $('#chars-window'),
        $charsInner = $('.chars-inner'),
        $trigger = $('.trigger'),
        $closeChar = $('#close-char'),
        winHt = $(window).height();
        bodyHt = $('body').outerHeight();
    // modal box vars
    var $prev = $('#prev-char'),
        $next = $('#next-char'),
        $navLink = $('#chars-nav').find('a'),
        ind = 0,
        allCharsId = [],
        firstChar = false,
        lastChar = false,
        thisId;

    // store chars id's in array
    $trigger.each(function(){ allCharsId.push( $(this).attr('data-index') ); });

    // forcing height of inner modal div
    $charsInner.css({ 'max-height' : (winHt - 50) });
    
    // hide inner modal
    $charsWin.hide();
    $charsInner.hide();

    /* ==============================================================
        Functions
    ============================================================== */
    // manage arrow styles
    function is_fristChar() {
        firstChar = true;
        lastChar = false;
        $navLink.removeClass('disable-arrow');
        $prev.addClass('disable-arrow');
    } 
    function is_lastChar() {
        lastChar = true;
        firstChar = false;
        $navLink.removeClass('disable-arrow');
        $next.addClass('disable-arrow');
    }
    function is_middleChar() {
        firstChar = false;
        lastChar = false;
        $navLink.removeClass('disable-arrow');
    }
    // = = = = = = = = = = end char positions

    // load character with ajax
    function loadCharacter(char_ID) {
        $.ajax({
            url: ajaxloadchars.ajaxurl,
            type: 'GET',
            dataType: 'html',
            data: {
                action: 'load_character',
                char_ID: char_ID
            },
            success: function(response) {
                $charsInner.html('');
                $charsWin.fadeIn(300);
                $charsInner.prepend(response);
                $charsInner.fadeIn(300);
                $charsInner.focus();
            }, 
            error: function() { console.log(response); }
        });
    } // = = = = = = = = = = end loadCharacter()

    function manageArrows(){
        // manage arrows
        if (ind == 0) { 
            is_fristChar();
        } else if (ind == allCharsId.length - 1) {
            is_lastChar();
        } else {
            is_middleChar();
        }
    } // = = = = = = = = = = end manageArrows()

    function nextChar() {
        if (lastChar) {
            return false;
        } else {
            // hide any existing
            $charsInner.fadeOut(250);

            ind++;
            thisId = allCharsId[ind];
            loadCharacter(thisId);

            manageArrows();
        }
    } // = = = = = = = = = = end nextChar()

    function prevChar() {
        if (firstChar) {
            return false;
        } else {
            // hide any existing
            $charsInner.fadeOut(250);

            ind--;
            thisId = allCharsId[ind];
            loadCharacter(thisId);

            manageArrows();
        }
    } // = = = = = = = = = = end prevChar()
    
    /* ==============================================================
        Choose characters
    ============================================================== */
    $trigger.click(function(e){
        $('body').outerHeight(winHt).css({'overflow': 'hidden'});

        // hide any existing
        $charsInner.fadeOut(250);

        // set id too chosen char, and load char with ajax
        thisId = $(this).attr('data-index');
        loadCharacter(thisId);

        // loop through array to find index of item that matches clicked char
        allCharsId.forEach(function(item, index){
            if (item == thisId) { ind = index; }
        });
        manageArrows();

        e.preventDefault();
    }); //end click trigger
    
    // previous char
    $prev.click(function(e){
        prevChar();
        e.preventDefault();
    });

    $('body').keydown(function(e){
        if( e.keyCode == 37) {
            prevChar();
        }
    });
    
    // next char
    $next.click(function(e){
        nextChar();
        e.preventDefault();
    });

    $('body').keydown(function(e){
        if( e.keyCode == 39) {
            nextChar();
        }
    });
    
    // close modal
    $closeChar.click(function(e){
       $charsWin.fadeOut(300);

       $('body').outerHeight(bodyHt).css({'overflow': 'initial'});;
       e.preventDefault(); 
    });

    $('body').keydown(function(e){
        if( e.keyCode == 27) {
            $charsWin.fadeOut(300);
           $('body').outerHeight(bodyHt).css({'overflow': 'initial'});;
        }
    });

}); //end load

}(jQuery));