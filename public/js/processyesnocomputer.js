function processyesno(){

	var myVar = $('#data').val();
	$('#data').hide();

	var parsedResult = $.parseJSON($('#products').text());
	
	if('isItNew' in parsedResult){
	if(parsedResult.isItNew == "1")
		$("#glyphiconRemove").hide();
	else
		$("#glyphiconOK").hide();

	}if('bluetooth' in parsedResult){
		if(parsedResult.bluetooth == "1")
			$("#glyphiconBluetoothRemove").hide();
		else
			$("#glyphiconBluetoothOK").hide();
	}if('wireless' in parsedResult){
		if(parsedResult.wireless == "1")
			$("#glyphiconWirelessRemove").hide();
		else
			$("#glyphiconWirelessOK").hide();

	}if('cdRom' in parsedResult){
		if(parsedResult.bluetooth == "1")
			$("#glyphiconCdRomRemove").hide();
		else
			$("#glyphiconCdRomOK").hide();

	}if('microphone' in parsedResult){
		if(parsedResult.microphone == "1")
			$("#glyphiconMicrophoneRemove").hide();
		else
			$("#glyphiconMicrophoneOK").hide();
	}if('hdmi' in parsedResult){
		if(parsedResult.hdmi == "1")
			$("#glyphiconHDMIRemove").hide();
		else
			$("#glyphiconHDMIOK").hide();
	}if('bag' in parsedResult){
		if(parsedResult.bag == "1")
			$("#glyphiconBagRemove").hide();
		else
			$("#glyphiconBagOK").hide();
	}if('webcam' in parsedResult){
		if(parsedResult.webcam == "1")
			$("#glyphiconWebCamRemove").hide();
		else
			$("#glyphiconWebCamOK").hide();
	}
}