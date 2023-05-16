
//jquery

$(function() {

    let header = $("#header"),
    introH = $("#intro").innerHeight(),
    scrollOffset = $(window).scrollTop();


    /* fixed header */
    checkScroll(scrollOffset);


    $(window).on("scroll", function(){
        scrollOffset = $(this).scrollTop();
        checkScroll(scrollOffset);
    });

    function checkScroll(scrollOffset) {
       if (scrollOffset >= introH) {
        header.addClass("fixed");
       } else {
        header.removeClass("fixed");
       }

    }


    /* smooth scroll */

});