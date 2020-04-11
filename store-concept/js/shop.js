
(function($) {

	//GSAP animations on load (navbar and first section)
	var navbar = $('.navbar'),
		content = $('.slidesContainer');

	TweenLite.from(navbar, 1, {x:-500, ease:Power3.easeOut});
	TweenLite.from(navbar, 1, {autoAlpha:0, delay: 0.3});

	TweenLite.from(content, 1, {y:500, ease:Power3.easeOut});
	TweenLite.from(content, 1, {autoAlpha:0, delay: 0.3});

	// Variables
	var sectionFrom,
		$slide = $('.slide'),
		$slideActive = $('.slide.active'),
		$navLink = $('.side-nav a'),
		$navLi = $('.side-nav li'),
		$body = $('body');

	// Init function
	function init(){

		// Set active slide visible
		TweenLite.set($slideActive, {y: '0%'});

		// Fade slides in
		TweenLite.set($body, {className: '-=loading'});

	}
	init();

	// Navigation click
	$navLink.on('click', function(e){
		if(e.preventDefault) {
			e.preventDefault();
		} else {
			e.returnValue = false;
		}

	//Prevent animation when animating
		if(!$body.hasClass('is-animating')){

			var sectionFrom = $('.slide.active'),
				sectionToID = $(e.target).attr('href'),
				sectionTo = $('div'+sectionToID);

			if(sectionFrom.attr('id') !== sectionTo.attr('id')) {
				scrollToSection(sectionFrom, sectionTo);
			}	

		}
		

	});

	function scrollToSection(sectionFrom, sectionTo){

		var info = sectionTo.find('.info'),
			model = sectionTo.find('.model'),
			divTo = sectionTo.find('.row'),
			divFrom = sectionFrom.find('.row'),
			tlDown = new TimelineLite({onComplete: setActiveSection(sectionFrom, sectionTo)}),
			tlUp = new TimelineLite();

		if(sectionFrom.index() < sectionTo.index()) {

			tlDown
				.set($body, {className:'+=is-animating'})
				.to(sectionFrom, 1.2, {y:'-=100%', ease:Power4.easeInOut, clearProps: 'all'}, '0')
				.to(sectionTo, 1.2, {y:'0%', ease:Power4.easeInOut}, '0')
				.from(model, 1, {autoAlpha:0, delay: 0.4}, '0')
				.from(info, 1, {autoAlpha:0, delay: 0.4}, '0')
				.set($body, {className:'-=is-animating'});

		} else {

			tlUp
				.set($body, {className:'+=is-animating'})
				.set(sectionTo, {y:'-100%'})
				.to(sectionFrom, 1.2, {y:'100%', ease:Power4.easeInOut, clearProps: 'all'}, '0')
				.to(sectionTo, 1.2, {y:'0%', ease:Power4.easeInOut}, '0')
				.from(model, 1, {autoAlpha:0, delay: 0.4}, '0')
				.from(info, 1, {autoAlpha:0, delay: 0.4}, '0')
				.set($body, {className:'-=is-animating'});

		}
	}

	function setActiveSection(sectionFrom, sectionTo) {

		//Add active class
		sectionFrom.removeClass('active');
		sectionTo.addClass('active');

		//Add body class to hughlight current slide
		$body.removeAttr('class').addClass($(sectionTo).attr('id')+'-active');

		//Highlight current slide in side-nav
		var currentSlideIndex = parseInt($(sectionTo).attr('id').slice(-2)) -1;
		$navLi.removeAttr('class');
		$navLi.eq(currentSlideIndex).addClass('active')
	}

})(jQuery);
