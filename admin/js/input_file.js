$('document').ready(function(){
	$('#image').change(function(){
		var img = $('#image').val();
		$('label input[type=text]').val(img);
	});
});