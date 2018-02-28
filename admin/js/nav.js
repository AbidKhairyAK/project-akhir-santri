$('document').ready(function(){
	$('.fa-cog').click(function(){
		if($('.fa-cog').hasClass('log')){
			$('.fa-cog').removeClass('log');
			$('#header a').removeClass('log');
		} else {
			$('.fa-cog').addClass('log');
			$('#header a').addClass('log');
		}
	});
});