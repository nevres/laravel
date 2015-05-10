function processyesno(){

	var myVar = $('#data').val();
	$('#data').hide();

	var parsedResult = $.parseJSON($('#products').text());
	
	if('isItNew' in parsedResult){
	if(parsedResult.isItNew == "1")
		$("#glyphiconRemove").hide();
	else
		$("#glyphiconOK").hide();

	}if('vaccine' in parsedResult){
		if(parsedResult.vaccine == "1")
			$("#glyphiconVaccineRemove").hide();
		else
			$("#glyphiconVaccineOK").hide();
	}if('pedigree' in parsedResult){
		if(parsedResult.pedigree == "1")
			$("#glyphiconPedigreeRemove").hide();
		else
			$("#glyphiconPedigreeOK").hide();
	}if('puppy' in parsedResult){
		if(parsedResult.puppy == "1")
			$("#glyphiconPuppyRemove").hide();
		else
			$("#glyphiconPuppyOK").hide();
	}if('pureblood' in parsedResult){
		if(parsedResult.pureblood == "1")
			$("#glyphiconPureBloodRemove").hide();
		else
			$("#glyphiconPureBloodOK").hide();
	}if('gender' in parsedResult){
		if(parsedResult.gender == "1")
			$(".genderDiv").text("Male");
		else
			$(".genderDiv").text("Female");
	}
}