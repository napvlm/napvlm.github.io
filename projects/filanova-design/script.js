//to make sure that header will takes up all the screen

$(document).ready(function(){
 $('.header').height($(window).height());
});


// scroll 
$(".navbar a").click(function(){
	$("body,html").animate({
		scrollTop:$("#" +
$(this).data('value')).offset().top
	},1000)

	});

//Scrollspy
$('body').scrollspy({target: ".navbar"})
