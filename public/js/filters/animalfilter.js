function processFilter(){

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		var type = "animals";
		var fromPrice = $('#fromPrice').val();
		var toPrice = $('#toPrice').val();
		var morePicturesThan = $('#morePicturesThan').val();
		var gradeBiggerThan = $('#gradeBiggerThan').val();
		var newProducts = $('#newProducts').prop('checked');
		var sortBy = $('#sortBy').val();
		var sortHow = $('#sortHow').val();

		var gender = $('#gender').val();
		var breed = $('#breed').val();
		var age= $('#age').val();
		var vaccine= $('#vaccine').prop('checked');
		var pedigree= $('#pedigree').prop('checked');
		var pureblood= $('#pureblood').prop('checked');
		var puppy= $('#puppy').prop('checked');
		

		$.post('http://laravel2.dev/processFilter', {type: type, newProducts: newProducts, sortHow: sortHow,
		 sortBy: sortBy, fromPrice: fromPrice, toPrice: toPrice,
		  morePicturesThan : morePicturesThan, gradeBiggerThan: gradeBiggerThan,
		  breed: breed, age: age, vaccine: vaccine, pedigree: pedigree,
		  pureblood:pureblood, gender:gender, puppy:puppy
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