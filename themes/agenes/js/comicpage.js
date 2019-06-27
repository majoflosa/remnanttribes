(function($){

$(window).load(function(){
    
    //Ignore everything if screen is small
    var scrWd = $(window).width();
    if (scrWd <= 768) { 
        $('#controls').hide();
        return; 
    }

    var $trigger = $('#controls');
    var $fullPage = $('#full-page');
    var $fullWidth = $('#full-width');
    var $modal = $('#modal');
    var $modalImg = $('#modal').find('img');
    var winHt = $(window).outerHeight();
    var toggle = false;
    var hidePoint = ($('.cp-page').height())/1.25;
    
   // alert(hidePoint);
    
    $modalImg.css({
        'height': winHt - 50 + 'px',
        'margin-top': '25px',
        'width': 'auto'
    });
    
    $trigger.fadeTo(0, 0.3);
    
    $(document).scroll(function(){
        // console.log($('html').scrollTop() + ' - ' + hidePoint);
        if ($('html').scrollTop() > hidePoint) {
            $trigger.fadeOut(300);
        } else {
            $trigger.fadeIn(300);
        }
    });
    
    $trigger.hover(function(){
        $trigger.fadeTo(300, 1);
    }, function(){
        $trigger.fadeTo(300, 0.3);
    });
    
    $trigger.click(function(e){
        e.preventDefault();
//        alert($('body').scrollTop());
        
        if (toggle == false) {
            $fullPage.hide();
            $fullWidth.show();
            $modal.fadeIn(300);
            toggle = true;
        } else {
            $fullWidth.hide();
            $fullPage.show();
            $modal.fadeOut(300);
            toggle = false;
        }
    });
    
    $modal.click(function(e){
        console.log(e);
        if (e.target.tagName == "IMG") {
            return false;
        }
        if (toggle == true) {
            $fullWidth.hide();
            $fullPage.show();
            $modal.fadeOut(300);
            toggle = false;
        }
    });

    // $modalImg.click(function(e){
    //     e.stopPropagation();
    //     e.cancelbubble = true;
    // });

}); //end load

}(jQuery));