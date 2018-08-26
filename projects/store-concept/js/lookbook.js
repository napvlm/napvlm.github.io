
(function($){
	var logowrap = $('.logowrap'),
		list = $('.list');

	TweenLite.from(logowrap, 1, {x:-200, ease:Power3.easeOut});
	TweenLite.from(logowrap, 1, {autoAlpha:0, delay: 0.3});

	TweenLite.from(list, 1, {y:200, ease:Power3.easeOut});
	TweenLite.from(list, 1, {autoAlpha:0, delay: 0.3});
})(jQuery);