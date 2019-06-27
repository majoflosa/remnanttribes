(function($){
    $(window).load(function(){
        /* ==========================================================================
            Full Maps View
        ========================================================================== */
        var scrHt = $(window).height();
        var $fullMaps = $('#full-map');
        var $fullModalOuter = $('#full-map-modal-outer');
        var $fullModal = $('#full-map-modal');
        var $changeMap = $('.maps-menu').find('a');
        var $closeFullMaps = $('#close-full-maps');

        // show only selected map
        $fullModal.find('img.full-map').hide();
        $fullModal.find('img.selected-map').show();

        // set map height according to screen height
        $fullModal.outerHeight(scrHt - 50).css({ 'margin' : '10px auto 25px' });

        // show full map modal
        $fullMaps.click(function(e){
            e.preventDefault();

            $fullModalOuter.fadeIn(300);
        });

        // choose map
        $changeMap.click(function(e){
            e.preventDefault();

            $('.maps-menu').find('a.selected').removeClass('selected');
            $(this).addClass('selected');

            var thisText = $(this).text().toLowerCase();

            $('.selected-map').fadeOut(300).removeClass('selected-map');
            $('#' + thisText).fadeIn(300).addClass('selected-map');
        });

        // close full map modal
        $closeFullMaps.click(function(e){
            e.preventDefault();

            $fullModalOuter.fadeOut(300);
        });


        /*-------------------------------------------------------------
            Making map draggable
        -------------------------------------------------------------*/
        //variables for draggable map
        var $mapWin = $('#map-window');
        var $mapOv = $mapWin.find('#overlay');
        var $mapImg = $('#map').find('img');
        var mapImgHt = $mapImg.height();
        var mapImgWd = $mapImg.width();
        var mapImgOffset = $mapImg.offset().top;
        var holding = false;
        var moved = false;
        var clickX;
        var clickY;
        var currentTop = parseInt($mapImg.css('top'));
        var currentLeft = parseInt($mapImg.css('left'));
        var newTop = 0;
        var newLeft = 0;
        
        //varables for sidebar
        var $pins = $('#pins-layer'); 
        var $pin = $pins.find('a');
        var $sidebar = $('#map-info-wrap');
        var $closeBtn = $('#close-map-info');
        
        //making map window suitable to screen size
        $mapWin.height(scrHt);
        
        // on click down, set coordinates. Y is relative to map window
        $mapOv.mousedown(function(e){
           holding = true;
           moved = true;
           clickX = e.pageX;
           clickY = Number(e.pageY - mapImgOffset);
        });
        
        // on release click, store map location relative to map window
        $mapOv.mouseup(function(){
           holding = false;
           currentTop = parseInt($mapImg.css('top'));
           currentLeft = parseInt($mapImg.css('left'));
        });
        
        // on moving mouse
        $mapOv.mousemove(function(e){
            if ( holding ) {
                // track mouse current location
                var xCo = e.pageX;
                var yCo = e.pageY;
                
                // set new location relative to last mouse release
                newTop = currentTop + yCo - mapImgOffset - clickY;
                newLeft = currentLeft + xCo - clickX;
                
                // only move if within vertical limts
                if (($mapWin.height() - mapImgHt) <= newTop && newTop <= 0) {
                    $mapImg.css({ 'top' : newTop });
                    $pins.css({ 'top' : newTop });
                } 
                
                // only move if within horizontal limts
                if (($mapWin.width() - mapImgWd) <= newLeft && newLeft <= 0) {
                    $mapImg.css({ 'left' : newLeft });
                    $pins.css({ 'left' : newLeft });
                }
            }
            
//            $('#map-info-wrap h3').text( clickX + ' | ' + clickY );
        });
        
        /*-------------------------------------------------------------
            Dynamic info sidebar
        -------------------------------------------------------------*/
        
        $pin.click(function(e){
            e.preventDefault();
            
            var thisHref = $(this).attr('href');
            var thisId = $(this).attr('id');
            
            if ($sidebar.css('display') == 'none') {
                $sidebar.fadeIn(300, function(){
                    $(thisHref).fadeIn(320);
                });
            } else {
                if ( $sidebar.find('#map-info-wrap > div').attr('id') == 'info-' + thisId ) {
                    return false;
                } else {
                    $('#map-info-wrap > div').fadeOut(300);
                    $('#info-' + thisId).fadeIn(300);
                }
            }
        }); // end click pin
        
        $closeBtn.click(function(e){
            e.preventDefault();
            
            $sidebar.fadeOut(300);
            $('#map-info-wrap > div').fadeOut(300);
           
        }); // end click button
        
    });
}(jQuery));