@extends('emarket.productview')

@section('extraData')
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
                   </br><b>Short Description:</b> {{$product->longDesc}}</br></p>
              </div>
            </div>
@endsection
@section('scriptName')
<script src ="{{'/js/processyesnoproperty.js'}}"></script>
@endsection
