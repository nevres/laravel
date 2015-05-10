                        @extends('emarket.mainfilter')

                        @section('specificFilter')

                        <div class = "panel-body">

                       <label for="brand" class="col-sm-6 control-label">Brand: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="brand">
                        </div>  

                        <label for="productFamily" class="col-sm-6 control-label">Product Family: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="productFamily">
                        </div>

                        <label for="processorType" class="col-sm-6 control-label">Processor Type: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="processorType">
                        </div>

                        <label for="processorSpeed" class="col-sm-6 control-label">Processor Speed: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="processorSpeed">
                        </div>

                        <label for="numberCores" class="col-sm-6 control-label">Number Cores: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="numberCores">
                        </div>

                        <label for="screenSize" class="col-sm-6 control-label">Screen Size: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="screenSize">
                        </div>

                        <label for="os" class="col-sm-6 control-label">Operating System: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="os">
                        </div>

                        <label for="ram" class="col-sm-6 control-label">Ram Memory: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="ram">
                        </div>

                        <label for="hdd" class="col-sm-6 control-label">Hdd memory: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="hdd">
                        </div>
                        
                        <div class="col-md-6">
                            <input type="checkbox"  id="cdRom">Cd Rom</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox"  id="bluetooth">BLuetooth</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox" id="wireless">Wireless</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox"  id="webcam">Webcam</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox"  id="hdmi">HDMI</label>
                        </div>


                      </div>
                      @endsection

                      @section('filterscript')
                      <script src ="{{'js/filters/computerfilter.js'}}"></script>
                      @endsection