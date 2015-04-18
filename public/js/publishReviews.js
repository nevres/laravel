function publishReview(){

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

		var content = $('#reviewMessage').val();
		var parsedUser = $.parseJSON($('#user').text());
		var userId = parsedUser.id;
		var rating = $('#input-21d').val();

		alert("here");
		console.log("here");
		if(content.length > 0){
			$.post('http://laravel2.dev/addReview', {content: content, userId: userId, rating : rating}, function(result){
				$('.addSomeText').html(result);
			});
		}else{
			$('#addSomeText').html('');
		}
		
	}
	
function listReviews(){
	var parsedReviews = $.parseJSON($('#reviews').text());
	$(document).ready(function() {
		console.log(parsedReviews);
		if(parsedReviews.length == 0)
			$('.defaultAddComment').append("<p style = 'margin-top:5px;'>There is no reviews for this user</br></p><button type='button' id = 'buttondefault' class='btn btn-primary' data-toggle='modal' data-target='#modal-1'>Create New Comment</button>");
		for (var i = 0; i < parsedReviews.length; i++) {	
			$('#mainListGroup').append("<li class='list-group-item'><h4 class='list-group-item-heading'><small> Created by: "+parsedReviews[i].first_name+" "+parsedReviews[i].second_name+" Creation Date: "+parsedReviews[i].date+"</small></h4><p class='list-group-item-text'>"+parsedReviews[i].content+"</p> <ul class= 'list-group' id = 'groupOf"+parsedReviews[i].id+"'></ul></li>");
		};
	});
}