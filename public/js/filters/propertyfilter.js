function processFilter(){

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		var type = "properties";
		var fromPrice = $('#fromPrice').val();
		var toPrice = $('#toPrice').val();
		var morePicturesThan = $('#morePicturesThan').val();
		var gradeBiggerThan = $('#gradeBiggerThan').val();
		var newProducts = $('#newProducts').prop('checked');
		var sortBy = $('#sortBy').val();
		var sortHow = $('#sortHow').val();

		var roomNumber = $('#roomNumber').val();
		var squareMeters= $('#squareMeters').val();
		var internet= $('#internet').prop('checked');
		var furniture= $('#furniture').prop('checked');
		var telephone= $('#telephone').prop('checked');
		var airConditioning= $('#airConditioning').prop('checked');
		var garden= $('#garden').prop('checked');

		$.post('http://laravel2.dev/processFilter', {type: type, newProducts: newProducts, sortHow: sortHow,
		 sortBy: sortBy, fromPrice: fromPrice, toPrice: toPrice,
		  morePicturesThan : morePicturesThan, gradeBiggerThan: gradeBiggerThan,
		  roomNumber: roomNumber, squareMeters: squareMeters, internet: internet, furniture: furniture,
		  telephone:telephone, airConditioning: airConditioning, garden: garden
		}, function(result){
			$('#filteredResults').html(result);
		});
}

function setCookie(){
	$(document).ready(function(){
	$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
	});
}