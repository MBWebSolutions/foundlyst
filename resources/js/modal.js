$(window).on('resize', function() {
    $('.modal1').stop()
               .animate({
                 'top': $(window).scrollTop()
               }, "fast");
});