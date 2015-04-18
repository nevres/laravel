@extends('emarket.productview')

@section('extraData')
<div class = "panel panel-default panel-danger">
                <div class = "panel-body">
                <p><b>Color:</b> {{$product->color}}</br>
                   <b>Model:</b> {{$product->model}}</br>
                   <b>Screen Resolution:</b> {{$product->screenResolution}}</br>
                   <b>Camera:</b> {{$product->camera}}</br>
                   <b>Processor:</b> {{$product->processor}}</br>
                   <b>Operating System:</b> {{$product->os}}</br>
                   <b>RAM Memory:</b> {{$product->ram}}</br>
                   <b>Front Camera:</b> {{$product->frontCamera}}</br></br>

                   
                     <b>Flash:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconFlashOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconFlashRemove"></b></br>
                     <b>Furniture:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconWirelessOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconWirelessRemove"></b></br>
                     <b>Telephone:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconBluetoothOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconBluetoothRemove"></b></br>
                     <b>Drinking Water:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconHeadsetOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconHeadsetRemove"></b></br>

                      
                   </br><b>Short Description:</b> {{$product->longDesc}}</br></p>
              </div>
            </div>
@endsection

@section('scriptName')
<script src ="{{'/js/processyesnophone.js'}}"></script>
@endsection