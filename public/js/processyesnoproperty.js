function processyesno(){

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
}