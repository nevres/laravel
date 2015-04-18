@extends('emarket.productview')

@section('extraData')
<div class = "panel panel-default panel-danger">
                <div class = "panel-body">
                <p><b>Brand:</b> {{$product->brand}}</br>
                   <b>Product Family:</b> {{$product->productFamily}}</br>
                   <b>Production Date:</b> {{$product->productionDate}}</br>
                   <b>Processor Type:</b> {{$product->processorType}}</br>
                   <b>Processor Speed:</b> {{$product->processorSpeed}}</br></br>
                   <b>Number of Cores:</b> {{$product->numberCores}}</br>
                   <b>Screen Size Type:</b> {{$product->screenSize}}</br>
                   <b>Operating System:</b> {{$product->os}}</br></br>
                   <b>Ram memory:</b> {{$product->ram}}</br>
                   <b>HDD:</b> {{$product->hdd}}</br>
                   <b>SSD:</b> {{$product->ssd}}</br></br>

                   <div class = "row">
                    <div class = "col-lg-3">
                     <b>Bluetooth:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconBluetoothOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconBluetoothRemove"></b></br>
                     <b>Wireless:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconWirelessOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconWirelessRemove"></b></br>
                     <b>CD ROM:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconCdRomOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconCdRomRemove"></b></br>
                    </div>
                    <div class = "col-lg-3"> 
                     <b>Microphone:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconMicrophoneOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconMicrophoneRemove"></b></br>
                     <b>HDMI:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconHDMIOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconHDMIRemove"></b></br>
                     <b>Bag:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconBagOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconBagRemove"></b></br>
                    </div>
                    <div class = "col-lg-3"> 
                     <b>WebCam:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconWebCamOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconWebCamRemove"></b></br>
                  </div>
                 </div>
                   </br><b>Short Description:</b> {{$product->longDesc}}</br></p>
              </div>
            </div>
@endsection
@section('scriptName')
<script src ="{{'/js/processyesnocomputer.js'}}"></script>
@endsection
