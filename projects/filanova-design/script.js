
//to make sure that header will takes up all the screen

$(document).ready(function(){
 $('.bcg').height($(window).height());
 $('.bcg').width($(window).width());
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

// ScrollMagis starts here
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
	//slider section
	$('.sliderSM').each(function(){
	var myScene = new ScrollMagic.Scene({
		triggerElement: '.sliderSM',
		reverse: false
	})
	.setClassToggle('.sliderSM', 'fade-in')
	.addTo(controller); 
	});
});
