var timer;

function up(){

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	timer = setTimeout(function(){
		var keywords = $('#searchInput').val();

		if(keywords.length>0){
			$.post('http://laravel2.dev/executeSearch', {keywords: keywords}, function(result){
				$('#searchResult').html(result);
			});
		}else
			$('#searchResult').html('');
	}, 150);
}
function down(){
	clearTimeout(timer);
}