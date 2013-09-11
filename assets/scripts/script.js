jQuery(window).ready( function($){
	var teamWidth = $('.team-pic').width();
	$('.team-pic').css('height', teamWidth);
});

$(window).resize( function(){
	var teamWidth = $('.team-pic').width();
	$('.team-pic').css('height', teamWidth);
});