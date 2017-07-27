var $ = jQuery;
$(document).ready(function(){

    var movementStrength = 10;
    var height = movementStrength / $(window).height();
    var width = movementStrength / $(window).width();
    $(window).mousemove(function(e){
        var pageX = e.pageX - ($(window).width() / 2);
        var pageY = e.pageY - ($(window).height() / 2);
        var newvalueX = width * pageX * -1 - 25;
        var newvalueY = height * pageY * -1 - 50;
        $('.image-move').css("background-position", newvalueX+"px     "+newvalueY+"px");
    });
    $('.header-image-loader').css('opacity', 0);

    /**
     * Menu scroll
     */
    $(window).scroll(function(){
        if($(window).scrollTop() > $('.header-content').height())
            $('.navigation-top').addClass('to-top');
        else
            $('.navigation-top').removeClass('to-top');
    });

    /**
     * Menu toggler
     */
    var open = false;
    $('.mobile-toggler').click(function(){

        if(!open)
        {
            $('.navigation-top').addClass('opened');
            open = true;
        }
        else
        {
            $('.navigation-top').removeClass('opened');
            open = false;
        }
    });

});