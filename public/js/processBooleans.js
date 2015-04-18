function processBooleans(){


var myPictures = addslashes($.parseJSON($('#products').text()).pictures);
console.log(addslashes($.parseJSON($('#products').text()).pictures));

var index = 0;
var notcancel = true;
var picturesArray = [];

while(notcancel){ 
    if(myPictures.indexOf("C:\\", index+1) != -1){
    var baseName =  (myPictures.substring(index, myPictures.indexOf("C:\\", index+1))).split('/').reverse()[0];
    picturesArray.push(baseName);
    $('.pictureContainer').append("<li class='col-lg-2 col-md-2 col-sm-3 col-xs-4'><img src= '/img/"+ baseName+ "'class = 'thumbnail'/></li>"); 
        index = myPictures.indexOf("C:\\", index+1);}
    else{
        var baseName =  (myPictures.substring(index, myPictures.length)).split('/').reverse()[0];
    	picturesArray.push(baseName);
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
	$('#myModal').on('keydown', function(evt) {
		console.log('on click function called');
    	evt.stopPropagation();
    	switch(evt.which) {
        case 37:

        if((picturesArray.indexOf(src.split('/').reverse()[0]))==0){
        	src = picturesArray[picturesArray.length-1].split('/').reverse()[0];
        	var newSrc = picturesArray[picturesArray.indexOf(src.split('/').reverse()[0])];
	        $('#myModal .modal-body').html('<img src="' + "/img/"+newSrc + '" class="img-responsive"/>');
	        src = newSrc;
        }else{
			var newSrc = picturesArray[picturesArray.indexOf(src.split('/').reverse()[0])-1];
	        $('#myModal .modal-body').html('<img src="' + "/img/"+newSrc + '" class="img-responsive"/>');
	        src = newSrc;}
        break;

        case 39:

        if((picturesArray.indexOf(src.split('/').reverse()[0]))>=picturesArray.length-1){
        	src = picturesArray[0].split('/').reverse()[0];
        	var newSrc = picturesArray[picturesArray.indexOf(src.split('/').reverse()[0])];
        	$('#myModal .modal-body').html('<img src="' + "/img/"+newSrc + '" class="img-responsive"/>');
        	src = newSrc;
        }else{
	        console.log(picturesArray.indexOf(src.split('/').reverse()[0]));
	        var newSrc = picturesArray[picturesArray.indexOf(src.split('/').reverse()[0]) + 1];
	        $('#myModal .modal-body').html('<img src="' + "/img/"+newSrc + '" class="img-responsive"/>');
	        src = newSrc;}
        break;

        default: return; // exit this handler for other keys
    }
    evt.preventDefault(); // prevent the default action (scroll / move caret)
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