(function($){
    $(window).load(function(){
        
        //variables for draggable map
        var $mapWin = $('#map-window');
        var $mapOv = $mapWin.find('#overlay');
        var $mapImg = $('#map').find('img');
        var mapImgHt = $mapImg.height();
        var mapImgWd = $mapImg.width();
        var mapImgOffset = $mapImg.offset().top;
        var holding = false;
        var moved = false;
        var scrHt = $(window).height();
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
        var sidebarWd = $sidebar.outerWidth();
        var sidebarOn = true;
        var $toggleBtn = $('#toggle');
        
        /*-------------------------------------------------------------
            Making map draggable
        -------------------------------------------------------------*/
        
        $mapWin.height(scrHt);
        
        $mapOv.mousedown(function(e){
           holding = true;
           moved = true;
           clickX = e.pageX;
           clickY = Number(e.pageY - mapImgOffset);
        });
        
        $mapOv.mouseup(function(){
           holding = false;
           currentTop = parseInt($mapImg.css('top'));
           currentLeft = parseInt($mapImg.css('left'));
        });
        
        $mapOv.mousemove(function(e){
            if ( holding ) {
                var xCo = e.pageX;
                var yCo = e.pageY;
                newTop = currentTop + yCo - mapImgOffset - clickY;
                newLeft = currentLeft + xCo - clickX;
                
                if (($mapWin.height() - mapImgHt) <= newTop && newTop <= 0) {
                    $mapImg.css({ 'top' : newTop });
                    $pins.css({ 'top' : newTop });
                } 
                
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
            
            // if clicked info is visible, just make sure the sidebar is visible
            // else update info
            if ($(thisHref).css('display') != 'none') {
                if (!sidebarOn) {
                    $sidebar.animate({'right': 0}, 300);
                    $toggleBtn.animate({'right': sidebarWd}, 300);
                    $toggleBtn.find('img').attr('src', 'http://localhost/agenes/wp-content/themes/agenes/images/right-w.png');
                    sidebarOn = true;
                }
                return;
            } else {
                $sidebar.children('div').fadeOut(300);
                $sidebar.find(thisHref).fadeIn(300);
            }
            
            if (!sidebarOn) {
                $sidebar.animate({'right': 0}, 300);
                $toggleBtn.animate({'right': sidebarWd}, 300);
                $toggleBtn.find('img').attr('src', 'http://localhost/agenes/wp-content/themes/agenes/images/right-w.png');
                sidebarOn = true;
            }
        }); // end click pin
        
        $toggleBtn.click(function(e){
            e.preventDefault();
            
           if (sidebarOn) {
               $sidebar.animate({'right': -sidebarWd}, 300);
               $(this).animate({'right': 0}, 300);
               $(this).find('img').attr('src', 'http://localhost/agenes/wp-content/themes/agenes/images/left-w.png');
               sidebarOn = false;
           } else {
               $sidebar.animate({'right': 0}, 300);
               $(this).animate({'right': sidebarWd}, 300);
               $(this).find('img').attr('src', 'http://localhost/agenes/wp-content/themes/agenes/images/right-w.png');
               sidebarOn = true;
           }
        }); // end click button
        
    });
}(jQuery));