$(window).on("load", function() {
  // makes sure the whole site is loaded
  jQuery("#loader-wrapper").fadeOut("slow"); // will first fade out the loading animation
  $("body")
    .delay(350)
    .css({ overflow: "visible" });
});

$(
  ".home_slider .owl-carousel, .about_us_slider .owl-carousel, .contacts_slider .owl-carousel"
).owlCarousel({
  loop: false,
  nav: true,
  items: 1,
  smartSpeed: 750,
  animateOut: "fadeOut",
  animateIn: "fadeIn" // Заменить на fadeIn или убрать полностью
});

$(".buy_one_click").on("click", function() {
  var self = $(this);

  var productId = $(self).data("id");

  $('input[name="product_id"]').val(productId);

  //console.log("productId:", productId);

  $(".buy_one_click_form").removeClass("notactive");
  $("body").addClass("no_scroll");
});

$(".callback_btn").on("click", function() {
  $(".callback_only_form").removeClass("notactive");
  $("body").addClass("no_scroll");
});

// $(".contacts .contacts_block .callback_btn, .product_block .buy_one_click").on("click", function(){
//     $(".callback_form").removeClass("notactive");
//     $("body").addClass("no_scroll");
// });

$("#callback_form .close, #buy_one_click_form .close").on("click", function() {
  closeForm();
});

$(".callback_form").on("click", function(event) {
  if ($(event.target).hasClass("callback_form")) {
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

$(".arrow").on("click", function() {
  var id = $(this).attr("href"),
    top = $(id).offset().top - 80;
  $("body,html").animate({ scrollTop: top }, 1250);
});

$(".contacts_block .market_adresses li .point").on("click", function() {
  $(".contacts_block .market_adresses li .point").each(function() {
    $(this).removeClass("active");
  });

  $(this).addClass("active");

  var index = +$(this).attr("data-index") - 1;

  $(".contacts .maps").each(function() {
    $(this).addClass("notactive");
  });

  $(".contacts .maps:eq(" + index + ")").removeClass("notactive");
});

var lastScrollTop = 0;

// bg images parallax effect on scroll
$(window).on("scroll", function() {
  var scrollFromTop = $(window).scrollTop();

  $(".small_page_images").each(function() {
    var offset = $(this).offset();

    if (scrollFromTop > lastScrollTop) {
      if (scrollFromTop + 800 > offset.top) {
        $(this).offset({ top: offset.top - 10 });
      }
    } else {
      if (scrollFromTop + 300 < offset.top) {
        $(this).offset({ top: offset.top + 20 });
      }
    }
  });

  lastScrollTop = scrollFromTop;
});
// END parallax

// play YT video

function loadYTApiScript() {
  var tag = document.createElement("script");
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName("script")[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
}

loadYTApiScript();

function loadYTApiScript() {
  var tag = document.createElement("script");
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName("script")[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
}

loadYTApiScript();

$(".playVideoButton").on("click", function(e) {
  e.preventDefault();
  var video = $("#gbar-video");
  var src = $(video).attr("src");

  $(video).attr(
    "src",
    src +
      "?autoplay=1&modestbranding=1&showinfo=0&enablejsapi=1&rel=0&controls=0"
  );

  var player;

  function onYouTubeIframeAPIReady() {
    player = new YT.Player("gbar-video", {
      events: {
        onReady: onPlayerReady,
        onStateChange: onPlayerStateChange
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

  setTimeout(function() {
    $(video).slideDown(300);
  }, 100);

  // $('.iframe-container').addClass('show');
  $(".iframe-container").removeClass("hide");
  $(".video_wrap").addClass("hide");

  setTimeout(function() {
    $(".iframe-container").addClass("hide");
    $(".video_wrap").removeClass("hide");
  }, 124000);
});

function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function makeInputRed($input) {
  $input.css("border-color", "red");
}

function closeForm() {
  $(".callback_form").addClass("notactive");
  $("body").removeClass("no_scroll");
}
/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
$("#modal_close, #overlay").click(function() {
  // лoвим клик пo крестику или пoдлoжке
  $("#modal_form").animate(
    { opacity: 0, top: "45%" },
    200, // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
    function() {
      // пoсле aнимaции
      $(this).css("display", "none"); // делaем ему display: none;
      $("#theImg").remove();
      $("#overlay").fadeOut(400); // скрывaем пoдлoжку
    }
  );
});

$(".myBtn").click(function(event) {
  var self = $(this);

  // var productId = $(self).data("id");
  var img = self[0].src;

  // лoвим клик пo ссылки с id="go"
  event.preventDefault(); // выключaем стaндaртную рoль элементa

  $("#overlay").fadeIn(
    400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
    function() {
      // пoсле выпoлнения предъидущей aнимaции
      $("#modal_form")
        .css("display", "block") // убирaем у мoдaльнoгo oкнa display: none;
        .append(`<img id='theImg' src='${img} '/>`)
        .animate({ opacity: 1, top: "50%" }, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
    }
  );
});
/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
$("#modal_close, #overlay").click(function() {
  // лoвим клик пo крестику или пoдлoжке
  $("#modal_form").animate(
    { opacity: 0, top: "45%" },
    200, // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
    function() {
      // пoсле aнимaции
      $(this).css("display", "none"); // делaем ему display: none;
      $("#theImg").remove();
      $("#overlay").fadeOut(400); // скрывaем пoдлoжку
    }
  );
});

// END PLAY YT VIDEO
