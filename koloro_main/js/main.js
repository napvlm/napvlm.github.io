// function fadeOutEffect() {
//         var fadeTarget = document.getElementById("preloader");
//         var fadeEffect = setInterval(function() {
//           if (!fadeTarget.style.opacity) {
//             fadeTarget.style.opacity = 1;
//           }
//           if (fadeTarget.style.opacity > 0) {
//             fadeTarget.style.opacity -= 0.1;
//           } else {
//             clearInterval(fadeEffect);
//             fadeTarget.style.display = "none";
//           }
//         }, 50);
//       }
//       window.onload = function() {
//         setTimeout(fadeOutEffect, 1500);
//       };

// modals toggle
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

// modal validation of phone number input
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
	} 

// gsap for fade-in text's animtaion


// wait until DOM is ready
$(document).ready(function(){
  
  // wait until window is loaded - all images, styles-sheets, fonts, links, and other media assets
  $(window).on("load", function(){
    
      // OPTIONAL - waits til next tick render to run code (prevents running in the middle of render tick)
      window.requestAnimationFrame(function() {
        
        // GSAP custom code goes here
        // headphrase reveal on-load
          var head = $('.header__text');

          TweenMax.from(head, 1, {autoAlpha: 0, y:'+=90', ease:Power2.easeOut});


       // Init ScrollMagic 
        var controller = new ScrollMagic.Controller();

        // loop through all elements
        $('.fadein').each(function() {
          
          // build a tween
          var tween = TweenMax.from($(this), 1, {autoAlpha: 0, y:'+=30', ease:Power2.easeOut});

          // build a scene
          var scene = new ScrollMagic.Scene({
            triggerElement: this,
            reverse: false
          })
          .setTween(tween) // trigger a TweenMax.to tween
          .addTo(controller);
        });
      });
    
  });  
  
});


// Sticky navbar 

$(document).ready(function () {
  
  'use strict';
  
   var c, currentScrollTop = 0,
       navbar = $('nav');

   $(window).scroll(function () {
      var a = $(window).scrollTop();
      var b = navbar.height();
     
      currentScrollTop = a;
     
      if (c < currentScrollTop && a > b + b) {
        navbar.addClass("scrollUp");
      } else if (c > currentScrollTop && !(a <= b)) {
        navbar.removeClass("scrollUp");
      }
      c = currentScrollTop;
  });
  
});


// slider 
var slideIndex = 1;
showSlides(slideIndex);

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slide");
  var dots = document.getElementsByClassName("control");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "flex"; 
  dots[slideIndex-1].className += " active";
}


      