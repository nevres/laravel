@extends('emarket.productview')

@section('extraData')
<div class="container">
			<ul class="nav nav-pills nav-justified" style = "padding-bottom: 20px;">
				<li><a href="#Home" data-toggle="tab">Details about product</a></li>
				<li class="active"><a href="#Comments" data-toggle="tab">Comments</a></li>
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
					 <div class="modal fade" id="modal-1">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								 <div class="modal-header">
								 	<button type="button" class="close" data-dismiss="modal">&times;</button>
								 	<h3 class="modal-title">Add New Comment</h3>
								 </div>
								 <div class="modal-body">
									<form class="form-group">
							          Comment Title: <input type="text" class="form-control" autocomplete="off" style = "width:400px" id ="commentTitle" >
							          Comment: <input type="text" class="form-control" autocomplete="off" style = "width:400px" id ="commentContent" >
							          <p id= "products" style = "font-size:0;"><?php echo json_encode($product); ?></p>
							          <p id= "comments" style = "font-size:7;"><?php echo json_encode($comments); ?></p>
							        </form>
								 </div>

								 <div class="modal-footer">
								 	<button type="submit" class="btn btn-default" onclick = "publishComment();return false;" data-toggle="tooltip" data-placement="top" title="Make a Comment">Add a Comment</button>
								 	<a href="" class="btn btn-default" data-dismiss="modal">Close</a>
								 </div>
							</div>
						</div>
					</div>
			      <div class = "addSomeText">
			      </div>

			      <div class="panel-group" id="accordion">
		            <div class="panel panel-default">
		              <div class="panel-heading">
		                <h4 class="panel-title">
		                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
		                    </span>Comments</a>
		                </h4>
		              </div>

		              <div id="collapseOne" class="panel-collapse collapse in">
		                <ul class="list-group" id = "mainListGroup">
		                  </li>
		                </ul>
		              </div>
		            </div>
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