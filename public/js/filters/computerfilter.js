function processFilter(){

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		var type = "computers";
		var fromPrice = $('#fromPrice').val();
		var toPrice = $('#toPrice').val();
		var morePicturesThan = $('#morePicturesThan').val();
		var gradeBiggerThan = $('#gradeBiggerThan').val();
		var newProducts = $('#newProducts').prop('checked');
		var sortBy = $('#sortBy').val();
		var sortHow = $('#sortHow').val();

		var brand = $('#brand').val();
		var productFamily= $('#productFamily').val();
		var processorType = $('#processorType').val();
		var processorSpeed= $('#processorSpeed').val();
		var numberCores= $('#numberCores').val();
		var screenSize = $('#screenSize').val();
		var os= $('#os').val();
		var ram= $('#ram').val();
		var hdd = $('#hdd').val();
		var ssd= $('#ssd').val();

		var cdRom= $('#cdRom').prop('checked');
		var bluetooth= $('#bluetooth').prop('checked');
		var wireless= $('#wireless').prop('checked');
		var microphone= $('#microphone').prop('checked');
		var webcam= $('#webcam').prop('checked');
		var hdmi= $('#hdmi').prop('checked');

		$.post('http://laravel2.dev/processFilter', {type: type, newProducts: newProducts, sortHow: sortHow,
		 sortBy: sortBy, fromPrice: fromPrice, toPrice: toPrice,
		  morePicturesThan : morePicturesThan, gradeBiggerThan: gradeBiggerThan,
		  
		  brand: brand, productFamily: productFamily, processorType: processorType, processorSpeed: processorSpeed,
		  numberCores:numberCores, screenSize: screenSize, os: os, ram: ram, hdd:hdd, ssd: ssd, 
		  cdRom: cdRom, bluetooth: bluetooth, wireless: wireless, microphone: microphone, webcam: webcam, hdmi: hdmi
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