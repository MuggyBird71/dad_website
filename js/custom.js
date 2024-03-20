jQuery(document).ready(function($) {
	$("#toggle").click(function(){
		$('#nav-icon').toggleClass('open');
		var $target = $('.nav')
		$target.fadeToggle();
		});
	$(window).resize(function(){
		if($(window).width() > 900) {
			$('.nav').css({'display':'grid'});
		}
		else {
			$('.nav').css({'display':'none'});
			$('#nav-icon').removeClass('open');
		}
		});
		if ($(window).width() < 901) {
			$(window).scroll(function() {
				$('.nav').fadeOut();
				$('#nav-icon').removeClass('open');
			});
		}
		$(".close").click(function(){
			$('.alert').fadeOut();
		});
});