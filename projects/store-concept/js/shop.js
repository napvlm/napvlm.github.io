
//GSAP 

(function($){
	var navbar = $('.navbar'),
		content = $('#one');

	TweenLite.from(navbar, 1, {x:-500, ease:Power3.easeOut});
	TweenLite.from(navbar, 1, {autoAlpha:0, delay: 0.3});

	TweenLite.from(content, 1, {y:500, ease:Power3.easeOut});
	TweenLite.from(content, 1, {autoAlpha:0, delay: 0.3});

	 // Init ScrollMagic
    var ctrl = new ScrollMagic.Controller({
        globalSceneOptions: {
            triggerHook: 'onLeave'
        }
    });

    // pinned section
	$("section").each(function() {
 
    new ScrollMagic.Scene({
        triggerElement: this
    })
    .setPin(this)
    .addTo(ctrl);
 
	});
	//fade in for section
	$('.slideTwo').each(function(){
	var myScene = new ScrollMagic.Scene({
		triggerElement: '.slideTwo',
		reverse: true
	})
	.setClassToggle('.slideTwo', 'fade-in')
	.addTo(ctrl); 
	});

	$('.slideThree').each(function(){
	var myScene = new ScrollMagic.Scene({
		triggerElement: '.slideThree',
		reverse: true
	})
	.setClassToggle('.slideThree', 'fade-in')
	.addTo(ctrl); 
	});

	$('.slideFour').each(function(){
	var myScene = new ScrollMagic.Scene({
		triggerElement: '.slideFour',
		reverse: true
	})
	.setClassToggle('.slideFour', 'fade-in')
	.addTo(ctrl); 
	});

})(jQuery);



