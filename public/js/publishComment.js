function publishComment(){

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

		var title = $('#commentTitle').val();
		var content = $('#commentContent').val();
		var parsedProdcut = $.parseJSON($('#products').text());
		var productId = parsedProdcut.id;

		if(content.length > 0){
			$.post('http://laravel2.dev/addComment', {title: title, content: content, productId : productId}, function(result){
				$('.addSomeText').html(result);
			});
		}else{
			$('#addSomeText').html('');
		}
	}
	
function listComments(){
	var parsedComments = $.parseJSON($('#comments').text());
	$( document ).ready(function() {
		for (var i = 0; i < parsedComments.length; i++) {
			if(parsedComments[i].parentPost != null){
				$('#groupOf'+parsedComments[i].parentPost).append("<li class='list-group-item'><h4 class='list-group-item-heading'>"+parsedComments[i].title+"<small> Created by: "+parsedComments[i].name+" Creation Date: "+parsedComments[i].date+"</small></h4><p class='list-group-item-text' style = 'padding-bottom:15px;'>"+parsedComments[i].content+"<button type='button' id = 'button"+parsedComments[i].id+"' class='btn btn-primary' style = 'float:right;' data-toggle='modal' data-target='#modal-1'><span class='glyphicon glyphicon-pencil'></span></button></p><ul class= 'list-group' id = 'groupOf"+parsedComments[i].id+"'></ul></li>");
			}else{
            	$('#mainListGroup').append("<li class='list-group-item'><h4 class='list-group-item-heading'>"+parsedComments[i].title+"<small> Created by: "+parsedComments[i].name+" Creation Date: "+parsedComments[i].date+"</small></h4><p class='list-group-item-text'>"+parsedComments[i].content+"<button type='button' id = 'button"+parsedComments[i].id+"' class='btn btn-primary' style = 'float:right;' data-toggle='modal' data-target='#modal-1'><span class='glyphicon glyphicon-pencil'></span></button></p> <ul class= 'list-group' id = 'groupOf"+parsedComments[i].id+"'></ul></li>");
           
			}
		};
	});
}