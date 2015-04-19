function publishReview(){

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

		var content = $('#reviewMessage').val();
		var parsedUser = $.parseJSON($('#user').text());
		var toUser = parsedUser.id;
		var grade = $('#input-21d').val();

		console.log(content+toUser+grade);
		if(content.length > 0){
			$.post('http://laravel2.dev/addReview', {content: content, toUser: toUser, grade : grade}, function(result){
				$('.addSomeText').html(result);
			});
		}else{
			$('#addSomeText').html('');
		}
		
	}
	
function listReviews(){
	$.getScript("/js/star-rating.js");
	var parsedReviews = $.parseJSON($('#reviews').text());
	$(document).ready(function() {
		var parsedUser = $.parseJSON($('#user').text());
		for (var i = 0; i < parsedReviews.length; i++) {	
			$('#mainListGroup').append("<li class='list-group-item'><h4 class='list-group-item-heading'><small> Created by: <a href = '/user/"+parsedReviews[i].id+"''>"+parsedReviews[i].first_name+" "+parsedReviews[i].second_name+"</a> Creation Date: "+parsedReviews[i].date+"</small></h4><p class='list-group-item-text'>"+parsedReviews[i].content+
				"<input id='input-21d' value='"+parsedReviews[i].grade+"' type='number' class='rating' min=0 max=5 step=0.5 data-size='xs' readonly= true showClear= false showCaption = false></p><ul class= 'list-group' id = 'groupOf"+parsedReviews[i].id+"'></ul></li>");
			};
	});
}