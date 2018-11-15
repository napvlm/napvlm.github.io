$(document).ready(function(){
  $('.bars').click(function(){
    $('#nav').toggleClass('open');
    $('.nav_container').toggleClass('menu-open');
  });
});

$(function () {
  $(document).scroll(function () {
	  var $nav = $(".fixed-top");
	  $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	});
});
