function print(){

	var myVar = $('#data').val();
	$('#data').hide();

	var sth = $.parseJSON($('#products').text());


	if(myVar == "1"){
		$("#glyphiconRemove").hide();
		$("#glyphiconOK").show();
	}
	else{
		$("#glyphiconOK").hide();
		$("#glyphiconRemove").show();
	}
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

function addslashes(str) {
str=str.replace(/\\/g,'\\\\');
str=str.replace(/\'/g,'\\\'');
str=str.replace(/\"/g,'\\"');
str=str.replace(/\0/g,'\\0');
return str;
}