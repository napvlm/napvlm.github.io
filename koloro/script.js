
var object = $('.back');

var layer = $('.container');

layer.mousemove(function(e){
	var valueX = (e.pageX * -1 / 25);
	var vlaueY = (e.pageY * -1 / 30);

	object.css({
		'transform':'translate3d('+valueX+'px,'+vlaueY+'px,0)'
	});
});