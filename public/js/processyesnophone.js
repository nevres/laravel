function processyesno(){

	var myVar = $('#data').val();
	$('#data').hide();

	var parsedResult = $.parseJSON($('#products').text());
	
	if('isItNew' in parsedResult){
	if(parsedResult.isItNew == "1")
		$("#glyphiconRemove").hide();
	else
		$("#glyphiconOK").hide();

	}if('flash' in parsedResult){
		if(parsedResult.flash == "1")
			$("#glyphiconFlashRemove").hide();
		else
			$("#glyphiconFlashOK").hide();
	}if('wireless' in parsedResult){
		if(parsedResult.wireless == "1")
			$("#glyphiconWirelessRemove").hide();
		else
			$("#glyphiconWirelessOK").hide();
	}if('bluetooth' in parsedResult){
		if(parsedResult.bluetooth == "1")
			$("#glyphiconBluetoothRemove").hide();
		else
			$("#glyphiconBluetoothOK").hide();
	}if('headset' in parsedResult){
		if(parsedResult.headset == "1")
			$("#glyphiconHeadsetRemove").hide();
		else
			$("#glyphiconHeadsetOK").hide();
	}
}