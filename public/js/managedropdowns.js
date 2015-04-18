function managedropdowns(){

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	var tabId = $(event.target).attr('id');
	console.log(tabId);
	
		if(tabId == "propertyitem"){
			$.get("addproperty", function(data){
		    	$("#mydiv").html(data);
			});
			$("#mainForm").attr("action","/addproperty");
			$('#dropdownMenu1').text($(event.target).text());
			$('ul li a').attr('data-toggle','tab');
		}

		else if (tabId == "phoneitem"){ 
			$.get("addphone", function(data){
				$("#mydiv").html(data);
			});
			$("#mainForm").attr("action","/addphone");
			$('#dropdownMenu1').text($(event.target).text());
			$('ul li a').attr('data-toggle','tab');
		}
		else if (tabId == "computeritem"){ 
			$.get("addcomputer", function(data){
				$("#mydiv").html(data);
			});
			$("#mainForm").attr("action","/addcomputer");
			$('#dropdownMenu1').text($(event.target).text());
			$('ul li a').attr('data-toggle','tab');
		}
}