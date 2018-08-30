
//GSAP First page animation "EXPLORE" button

	function fadeOut(){

		TweenMax.to(".btn", 1, {y:'-100', opacity: 0, ease:Power3.easeInOut, delay: 0.3});
		// TweenMax.to(".screen", 1, {y:'-400', opacity: 0, ease:Power3.easeInOut, delay: 0.6});

		TweenMax.from(".overlay", 1, {ease:Power3.easeInOut});
		TweenMax.to(".overlay", 1, {top:'-110%', ease:Expo.easeInOut, delay: 0.9});

		TweenMax.to(".overlay-2", 1, {top:'-110%', ease:Expo.easeInOut, delay: 1.2});
		TweenMax.from(".container", 1, {y:30, opacity: 0, ease:Power3.easeInOut, delay: 1.5});
		TweenMax.to(".container", 1, {y:0,opacity: 1, ease:Power3.easeInOut, delay: 1.8});

	}


//Disable scroll on .overlay 

