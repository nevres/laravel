var timer;

function publishComment(){

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

		var title = $('#commentTitle').val();
		var content = $('#commentContent').val();
		var parsedResult = $.parseJSON($('#products').text());
		var productId = parsedResult.id;

		if(content.length > 0){
			$.post('http://laravel2.dev/addComment', {title: title, content: content, productId : productId}, function(result){
				$('.addSomeText').html(result);
			});
		}else{
			$('#addSomeText').html('');
		}
	}