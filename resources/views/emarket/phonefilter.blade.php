@extends('emarket.mainfilter')

@section('specificFilter')
 <div class = "panel-body">

                       <label for="screenResolution" class="col-sm-6 control-label">Screen Resolution: </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="screenResolution">
                        </div>  
                        
                        <label for="camera" class="col-sm-6 control-label">Camera (Mpx): </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="camera">
                        </div>

                        <label for="processor" class="col-sm-6 control-label">Processor: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="processor">
                        </div>

                        <label for="ram" class="col-sm-6 control-label">Ram memory: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="ram">
                        </div>
                        
                        <div class="col-md-6">
                            <input type="checkbox"  id="flash">Flash</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox"  id="bluetooth">BLuetooth</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox" id="wireless">Wireless</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox"  id="headset">Headset</label>
                        </div>

                      </div>
                      @endsection

                      @section('filterscript')
                      <script src ="{{'js/filters/phonefilter.js'}}"></script>
                      @endsection