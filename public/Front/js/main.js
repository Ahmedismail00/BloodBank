//articles-carousel
$(document).ready(function(){
    $('.articles-carousel').owlCarousel({
        loop:false,
        margin:10,
        rtl:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:3,
                nav:true,
                loop:false
            }
        }
    });
    function toogleFavourite(heart){
        var currentClass = $(heart).attr('class');
        if(currentClass.includes('first')){
            $(heart).removeClass('first-heart').addClass('second-heart');
        } else {
            $(heart).removeClass('second-heart').addClass('first-heart');
        }
    }

});

