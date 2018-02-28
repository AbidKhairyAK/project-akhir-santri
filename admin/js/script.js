$('document').ready(function(){
	
	$('#search .fa').click(function(){
		if($('.search').hasClass('scale')){
			$('.fa-search').removeClass('show');
			$('.search').removeClass('scale');
		} else {
			$('.fa-search').addClass('show');
			$('.search').addClass('scale');
		}
	});
	
	$('.nav').click(function(){
		if($('.nav').hasClass('show')){
			$('.nav').removeClass('show');
			$('.lay').removeClass('show');
		} else {
			$('.nav').addClass('show');						
			$('.lay').addClass('show');						
		}
	});
	
	$('.trigger').click(function(){
		$('.trigger').hide();
		$('.cmnt_bio').slideDown('slow');
	});
	
});