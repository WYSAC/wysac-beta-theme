jQuery(document).ready(function($){
	$('.owl-carousel').owlCarousel({
		items:1, // if you want a slider, not a carousel, specify "1" here
		nav:true, // left and right navigation
		navText:['<span class="glyphicon glyphicon-chevron-left"></span>','<span class="glyphicon glyphicon-chevron-right"></span>'],
		autoplay:false,
		dots:false,
		loop:true
	});
});
