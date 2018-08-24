//to make sure that header will takes up all the screen

$(document).ready(function(){
 $('.bcg').height($(window).height());
});


// scroll to anchor
$(".navbar a").click(function(){
	$("body,html").animate({
		scrollTop:$("#" +
$(this).data('value')).offset().top
	},1000)

	});

//Scrollspy
$('body').scrollspy({target: ".navbar"})

//ScrollMagic magic begin here :D 
// Just a simple parallax

$(document).ready(function(){

	//init Scrollmagic

	var controller = new ScrollMagic.Controller();

	var parallaxScene = new ScrollMagic.Scene({
		triggerElement: '.parallax',
		trigerHook: 1,
		duration: '200%'
	})
	.setTween(TweenMax.from('.bcg',1 , {y: '-30%', ease:Power0.easeNone}))
	.addTo(controller);
});
