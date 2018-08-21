
// ===============================
// Countdown script 
const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;

let countDown = new Date('Sep 08, 2018 00:00:00').getTime(),
    x = setInterval(function() {

      let now = new Date().getTime(),
          distance = countDown - now;

      document.getElementById('days').innerText = Math.floor(distance / (day)),
        document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
        document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
        document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
    }, second)

// End Countdown script

// ===============================

// Scrolldown 

$('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({
            scrollTop: target.offset().top
        }, 1000);
    }
});

//End Scrolldown 

// ===============================

//Scrollmagic effects 

$(document).ready(function(){

 // Init ScrollMagic 
	var controller = new ScrollMagic.Controller();
	// build a scene
	var ourScene = new ScrollMagic.Scene({
		triggerElement: '#appear'
	})
	.setClassToggle('#appear', 'fade-in')
	// .addIndicators({
	// 	name: 'fade scene',
	// 	colorTrigger: 'black',
	// 	indent:200,
	// 	colorStart: '#75C695'
	})
	.addTo(controller); 

});