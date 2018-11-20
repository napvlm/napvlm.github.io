$('.home_slider .owl-carousel, .about_us_slider .owl-carousel, .contacts_slider .owl-carousel').owlCarousel({
    loop:false,
    nav:true,
    items:1,
    smartSpeed: 750,
    animateOut: 'fadeOut',
    animateIn: 'rollIn'
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

$(window).on("scroll", function(){
    var scrollFromTop = $(window).scrollTop();

    $(".small_page_images").each(function() {
        var offset = $(this).offset();

        if (scrollFromTop > lastScrollTop) {
            if (scrollFromTop + 800 > offset.top) {
                $(this).offset({top: offset.top - 20});
            }
        } else {
            if (scrollFromTop + 300 < offset.top) {
                $(this).offset({top: offset.top + 60});
            }
        }
    })

    lastScrollTop = scrollFromTop;
})