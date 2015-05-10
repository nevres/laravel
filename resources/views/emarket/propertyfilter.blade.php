 @extends('emarket.mainfilter')

@section('specificFilter')
 <div class = "panel-body">
                       <label for="roomNumber" class="col-sm-6 control-label">Number of Rooms: </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="roomNumber">
                        </div>
                        
                        <label for="squareMeters" class="col-sm-6 control-label">Square Meters: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="squareMeters">
                        </div>
                        
                        <div class="col-md-6">
                            <input type="checkbox"  id="internet">Internet</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox"  id="furniture">Furniture</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox" id="telephone">Telephone</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox"  id="airConditioning">Air Conditioning</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox" id="garden">Garden</label>
                        </div>

                      </div>
                      @endsection
                      @section('filterscript')
                      <script src ="{{'js/filters/propertyfilter.js'}}"></script>
                      @endsection