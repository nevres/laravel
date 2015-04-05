function processBooleans(){

	var myVar = $('#data').val();
	$('#data').hide();

	var parsedResult = $.parseJSON($('#products').text());
	
	if('isItNew' in parsedResult){
	if(parsedResult.isItNew == "1")
		$("#glyphiconRemove").hide();
	else
		$("#glyphiconOK").hide();

	}if('internet' in parsedResult){
		if(parsedResult.internet == "1")
			$("#glyphiconInternetRemove").hide();
		else
			$("#glyphiconInternetOK").hide();
	}if('furniture' in parsedResult){
		if(parsedResult.furniture == "1")
			$("#glyphiconFurnitureRemove").hide();
		else
			$("#glyphiconFurnitureOK").hide();
	}if('telephone' in parsedResult){
		if(parsedResult.telephone == "1")
			$("#glyphiconTelephoneRemove").hide();
		else
			$("#glyphiconTelephoneOK").hide();
	}if('water' in parsedResult){
		if(parsedResult.water == "1")
			$("#glyphiconWaterRemove").hide();
		else
			$("#glyphiconWaterOK").hide();
	}if('cableTv' in parsedResult){
		if(parsedResult.cableTv == "1")
			$("#glyphiconCableTvRemove").hide();
		else
			$("#glyphiconCableTvOK").hide();
	}if('garden' in parsedResult){
		if(parsedResult.garden == "1")
			$("#glyphiconGardenRemove").hide();
		else
			$("#glyphiconGardenOK").hide();
	}if('airConditioning' in parsedResult){
		if(parsedResult.airConditioning == "1")
			$("#glyphiconAirCondRemove").hide();
		else
			$("#glyphiconAirCondOK").hide();
	}if('parking' in parsedResult){
		if(parsedResult.parking == "1")
			$("#glyphiconParkingRemove").hide();
		else
			$("#glyphiconParkingOK").hide();
	}if('fence' in parsedResult){
		if(parsedResult.fence == "1")
			$("#glyphiconFenceRemove").hide();
		else
			$("#glyphiconFenceOK").hide();
	}



var myPictures = addslashes($.parseJSON($('#products').text()).pictures);
console.log(addslashes($.parseJSON($('#products').text()).pictures));

var index = 0;
var notcancel = true;

while(notcancel){ 
    if(myPictures.indexOf("C:\\", index+1) != -1){
    var baseName =  (myPictures.substring(index, myPictures.indexOf("C:\\", index+1))).split('/').reverse()[0];
    $('.pictureContainer').append("<li class='col-lg-2 col-md-2 col-sm-3 col-xs-4'><img src= '/img/"+ baseName+ "'class = 'thumbnail'/></li>"); 
        index = myPictures.indexOf("C:\\", index+1);}
    else{
        var baseName =  (myPictures.substring(index, myPictures.length)).split('/').reverse()[0];
    $('.pictureContainer').append("<li class='col-lg-2 col-md-2 col-sm-3 col-xs-4'><img src= '/img/"+ baseName+ "'class = 'thumbnail'/></li>"); 
         break;
    }
}


 $(document).ready(function(){
 	$('li img').on('click',function(){
	var src = $(this).attr('src');
	var img = '<img src="' + src + '" class="img-responsive"/>';
	$('#myModal').modal();
	$('#myModal').on('shown.bs.modal', function(){
		$('#myModal .modal-body').html(img);
	});
	$('#myModal').on('hidden.bs.modal', function(){
		$('#myModal .modal-body').html('');
	});
});  
})

}
function addslashes(str) {
str=str.replace(/\\/g,'\\\\');
str=str.replace(/\'/g,'\\\'');
str=str.replace(/\"/g,'\\"');
str=str.replace(/\0/g,'\\0');
return str;
}