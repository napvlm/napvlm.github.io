
$('.home_slider .owl-carousel, .about_us_slider .owl-carousel, .contacts_slider .owl-carousel').owlCarousel({
    loop:false,
    nav:true,
    items:1,
    smartSpeed: 750,
    // animateOut: 'fadeOut',
    animateIn: 'fadeIn'
});

$(".contacts .contacts_block .callback_btn, .product_block .buy_one_click").on("click", function(){
    $(".callback_form").removeClass("notactive");
    $("body").addClass("no_scroll");
});

$("#callback_form .close, #buy_one_click_form .close").on("click", function(){
    $(".callback_form").addClass("notactive");
    $("body").removeClass("no_scroll");
});



$(".callback_form").on("click", function(event){
    if($(event.target).hasClass("callback_form")) {
        $(".callback_form").addClass("notactive");
        $("body").removeClass("no_scroll"); 
    } else {
        return false;
    }
});

$("header .burger_btn").on("click", function() {
    $(".mobile_menu").addClass("active");
});

$(".mobile_menu .close").on("click", function() {
    $(".mobile_menu").removeClass("active");
});

$(".arrow").on("click", function () {
    var id  = $(this).attr('href'),
    top = $(id).offset().top - 80;
    $('body,html').animate({scrollTop: top}, 1250);
});
    
$(".contacts_block .market_adresses li .point").on("click", function() {
    $(".contacts_block .market_adresses li .point").each(function(){
        $(this).removeClass("active");
    });

    $(this).addClass("active");

    var index = +$(this).attr("data-index") - 1;

    $(".contacts .maps").each(function() {
        $(this).addClass("notactive");
    });

    $(".contacts .maps:eq("+ index +")").removeClass("notactive");
});

var lastScrollTop = 0;

// bg images parallax effect on scroll
$(window).on("scroll", function(){
    var scrollFromTop = $(window).scrollTop();

    $(".small_page_images").each(function() {
        var offset = $(this).offset();

        if (scrollFromTop > lastScrollTop) {
            if (scrollFromTop + 800 > offset.top) {
                $(this).offset({top: offset.top - 10});
            }
        } else {
            if (scrollFromTop + 300 < offset.top) {
                $(this).offset({top: offset.top + 20});
            }
        }
    })

    lastScrollTop = scrollFromTop;
});

// play YT video

function loadYTApiScript() {
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    }

    loadYTApiScript();

    $('.playVideoButton').on('click', function (e) {
        e.preventDefault();
        var video = $('#gbar-video');
        var src = $(video).attr('src');

        $(video).attr('src', src + '?autoplay=1&modestbranding=1&showinfo=0&enablejsapi=1&rel=0&controls=0');

        var player;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('gbar-video', {
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerReady(event) {
            // event.target.playVideo();
        }

        function onPlayerStateChange(event) {

            if (event.data == YT.PlayerState.ENDED) {
                $(video).slideUp(300);
            }
        }

        onYouTubeIframeAPIReady();

        setTimeout(function () {
            $(video).slideDown(300);
        }, 100);

        // $('.iframe-container').addClass('show');
        $('.iframe-container').removeClass('hide');
        $('.video_wrap').addClass('hide');
    });