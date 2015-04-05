@extends('emarket.productview')

@section('extraData')
<div class="container">
			<ul class="nav nav-pills nav-justified" style = "padding-bottom: 20px;">
				<li class="active"><a href="#Home" data-toggle="tab">Details about product</a></li>
				<li><a href="#Comments" data-toggle="tab">Comments</a></li>
				<li><a href="#Map" data-toggle="tab">Map</a></li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane fade"  id="Home">
					<div class = "panel panel-default panel-danger">
	      				<div class = "panel-body">
					      <p><b>Square Meters:</b> {{$product->squareMeters}}</br>
					         <b>Floor:</b> {{$product->floor}}</br>
					         <b>Rooms:</b> {{$product->rooms}}</br>
					         <b>Floor:</b> {{$product->floor}}</br>
					         <b>Rooms:</b> {{$product->rooms}}</br></br>

					         <div class = "row">
					         	<div class = "col-lg-3">
						         <b>Internet:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconInternetOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconInternetRemove"></b></br>
						         <b>Furniture:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconFurnitureOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconFurnitureRemove"></b></br>
						         <b>Telephone:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconTelephoneOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconTelephoneRemove"></b></br>
						        </div>
						        <div class = "col-lg-3"> 
						         <b>Drinking Water:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconWaterOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconWaterRemove"></b></br>
						         <b>Cable TV:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconCableTvOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconCableTvRemove"></b></br>
						         <b>Garden:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconGardenOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconGardenRemove"></b></br>
						        </div>
						        <div class = "col-lg-3"> 
						         <b>Air Conditioning:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconAirCondOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconAirCondRemove"></b></br>
						         <b>Parking slot:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconParkingOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconParkingRemove"></b></br>
						         <b>Fence:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconFenceOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconFenceRemove"></b></br>
						     	</div>
						     </div>
					         </br><b>Short Description:</b> {{$product->shortDesc}}</br></p>
	    				</div>
	  				</div>
	  			</div>
				<div class="tab-pane fade in active"  id="Comments">
					 <form class="form-group">
			          Comment Title: <input type="text" class="form-control" autocomplete="off" style = "width:400px" id ="commentTitle" >
			          Comment: <input type="text" class="form-control" autocomplete="off" style = "width:400px" id ="commentContent" >
			          <p id= "products" style = "font-size:0;"><?php echo json_encode($product); ?></p>
			          <button type="submit" style = "margin-top: 10px" class="btn btn-default" onclick = "publishComment();return false;">Add Comment</button>
			      </form>

			      <div class = "addSomeText">
			      </div>
			  </div>

				<div class="tab-pane fade"  id="Map">
					<div id="map-canvas"></div>
					<script>
						google.maps.event.trigger(map, 'resize');
						map.setZoom( map.getZoom());
					    createMarker(new google.maps.LatLng(43.25720566,20.846557617),
					    "name", "<b>Location</b><br>"+new google.maps.LatLng(43.25720566,20.846557617));
					</script>
				</div>
			</div>
		</div>
@endsection