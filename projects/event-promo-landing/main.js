
// ===============================
// Countdown script 
const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;

let countDown = new Date('Sep 14, 2018 00:00:00').getTime(),
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
	//about section
	$('.scrollfade').each(function(){
	var myScene = new ScrollMagic.Scene({
		triggerElement: '.scrollfade',
		reverse: false
	})
	.setClassToggle('.scrollfade', 'fade-in')
	.addTo(controller); 
	});
	//callouts
	$('.callout').each(function(){
	var myScene = new ScrollMagic.Scene({
		triggerElement: '.callout',
		reverse: false
	})
	.setClassToggle('.callout', 'fade-in')
	.addTo(controller); 
	});

	$('.callout2').each(function(){
	var myScene = new ScrollMagic.Scene({
		triggerElement: '.callout2',
		reverse: false
	})
	.setClassToggle('.callout2', 'fade-in')
	.addTo(controller); 
	});

	$('.callout3').each(function(){
	var myScene = new ScrollMagic.Scene({
		triggerElement: '.callout3',
		reverse: false
	})
	.setClassToggle('.callout3', 'fade-in')
	.addTo(controller); 
	});

});

//End Scrollmagic effects