function processFilter(){

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		var type = "phones";
		var fromPrice = $('#fromPrice').val();
		var toPrice = $('#toPrice').val();
		var morePicturesThan = $('#morePicturesThan').val();
		var gradeBiggerThan = $('#gradeBiggerThan').val();
		var newProducts = $('#newProducts').prop('checked');
		var sortBy = $('#sortBy').val();
		var sortHow = $('#sortHow').val();

		var screenResolution = $('#screenResolution').val();
		var camera= $('#camera').val();
		var processor = $('#processor').val();
		var ram= $('#ram').val();
		var flash= $('#flash').prop('checked');
		var bluetooth= $('#bluetooth').prop('checked');
		var wireless= $('#wireless').prop('checked');
		var headset= $('#headset').prop('checked');

		$.post('http://laravel2.dev/processFilter', {type: type, newProducts: newProducts, sortHow: sortHow,
		 sortBy: sortBy, fromPrice: fromPrice, toPrice: toPrice,
		  morePicturesThan : morePicturesThan, gradeBiggerThan: gradeBiggerThan,
		  
		  screenResolution: screenResolution, camera: camera, processor: processor, ram: ram,
		  flash:flash, bluetooth: bluetooth, wireless: wireless, headset: headset
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