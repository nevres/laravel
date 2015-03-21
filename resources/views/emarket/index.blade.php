@extends('app')

@section('content')

	<div class = "col-lg-3">
         <div class = "panel panel-default">
            <div class = "panel-body" style = "height:450">
              <div class = "page-header">
                <h4>House in Ilidza </br><small>Poseted on July 26th</small></h4>
              </div>
                <img class = "featuredImg" src="img/house.jpg">
                <p>Nunc nec nulla non tellus interdum auctor eu eu orci. Donec vel interdum ante. Ut elementum mollis lacus, et accumsan eros accumsan ac. Nam vel vestibulum ipsum. Praesent id erat id mi consequat sollicitudin. Aliquam eu mi vitae odio interdum tincidunt at nec ex. Cras quis pulvinar leo.</p>
          </div>
        </div>
      </div>

      <div class = "col-lg-3">
         <div class = "panel panel-default" style = "height:450">
            <div class = "panel-body">
              <div class = "page-header">
                <h4> Iphone 6 </br><small>Poseted on July 26th</small></h4>
              </div>
                <img class = "featuredImg" src="img/iphone.jpg">
                <p>Nunc nec nulla non tellus interdum auctor eu eu orci. 
                	Donec vel interdum ante. Ut elementum mollis lacus, 
                	et accumsan eros accumsan ac. Nam vel vestibulum ipsum. 
                	Praesent id erat id mi consequat sollicitudin. Aliquam 
                	eu mi vitae odio interdum tincidunt at nec ex. Cras quis pulvinar leo.</p>
          </div>
        </div>
      </div>

    <div class = "col-lg-3">
         <div class = "panel panel-default">
            <div class = "panel-body" style = "height:450">
              <div class = "page-header">
                <h4>New HP laptop </br><small>Poseted on July 26th</small></h4>
              </div>
                <img class = "featuredImg" src="img/laptop.jpg">
                <p>Nunc nec nulla non tellus interdum auctor eu eu orci. Donec vel interdum ante. Ut elementum mollis lacus, et accumsan eros accumsan ac. Nam vel vestibulum ipsum. Praesent id erat id mi consequat sollicitudin. Aliquam eu mi vitae odio interdum tincidunt at nec ex. Cras quis pulvinar leo.</p>
          </div>
        </div>
      </div>
	

@endsection

@section('menu')
<div class = "col-lg-3">
      <div class = "list-group">
        <a href="#" class = "list-group-item active">Popular</a>
        <!--for popular implement as home page to drag most popular from all categories from database-->
        <a href="#" class = "list-group-item ">Properties</a>
        <a href="#" class = "list-group-item">Mobile Phones</a>
        <a href="#" class = "list-group-item">Computers</a>
        <a href="#" class = "list-group-item">Clothes</a>
        <a href="#" class = "list-group-item">Electronics</a>
        <a href="#" class = "list-group-item">Sport Equipement</a>
        <a href="#" class = "list-group-item">Art</a>
        <a href="#" class = "list-group-item">Animals</a>
        <a href="#" class = "list-group-item">My Home and Gardenn</a>
        <a href="#" class = "list-group-item">Jewerly and Watches</a>
        <a href="#" class = "list-group-item">Computers</a>
        
      </div>
    </div>
@endsection