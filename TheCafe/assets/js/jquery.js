
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
       if (scrollOffset >= (introH -50)) {
        header.addClass("fixed");
       } else {
        header.removeClass("fixed");
       }

    }


    /* smooth scroll */
    $("[data-scroll]").on("click", function(event) {
        event.preventDefault();

        var $this = $(this),
            blockId = $this.data('scroll'),
            blockOffset = $(blockId).offset().top;

        $("#nav a").removeClass("active");
        $this.addClass("active");

        $("html, body").animate({
            scrollTop: blockOffset
        }, 500);


    });



    /*menu nav toggle*/
    $("#nav_toggle").on("click", function(event) {
        event.preventDefault();

        
        $("#nav").toggleClass("active");
    });

    /*collaps*/
    $("[data-collapse]").on("click", function(event) {
        event.preventDefault();

        var $this = $(this),
            blockId = $this.data('collapse');

        // $this.toggleClass("active");
        $(blockId).slideToggle();
        $this.toggleClass("active");

    });

    /*slider*/
    $("[data-slider]").slick({
        infinite: true,
        // fade: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    // $("#onabout").one("mouseover", function() {
    //     $("#onabout").addClass('permahover');
    // });

    // $(#intro).onmouseover().css("display","block");




});


