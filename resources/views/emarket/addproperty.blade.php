
@extends('emarket.addproduct')

@section('address')
  /addproperty
@endsection

@section('data')
			<div class="form-group">
              <label class="col-md-4 control-label">Floor Number</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="floor">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Room Number</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="rooms">
              </div>
            </div>

            <input type = "hidden" id = "lat" name = "latitude"></input>
            <input type = "hidden" id = "long" name = "longitude"></input>

            <div class="form-group">
              <label class="col-md-4 control-label">Square Meters</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="squareMeters">
              </div>
            </div>

        <div class = "container" style = "margin-top:30px, margin-left:80px">
             <div class = "row">
       			<div class = "col-lg-3">

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value = "0" name="internet">Internet </label>
                </div>
              </div>
            </div>

             <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value = "0" name="furniture">Furniture </label>
                </div>
              </div>
            </div>

             <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value = "0" name="telephone">Telephone </label>
                </div>
              </div>
            </div>

        </div>
        
        <div class = "col-lg-3">


             <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value = "0" name="water">Drinking Water </label>
                </div>
              </div>
            </div>

             <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value = "0" name="cableTv">Cable TV </label>
                </div>
              </div>
            </div>

             <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value = "0" name="garden">Garden </label>
                </div>
              </div>
            </div>

        </div>

        <div class = "col-lg-3">

             <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value = "0" name="airConditioning">Air Conditioning </label>
                </div>
              </div>
            </div>

             <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value = "0" name="parking">Parking Place </label>
                </div>
              </div>
            </div>

             <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value = "0" name="fence">Fence </label>
                </div>
              </div>
            </div>
        </div>

     </div>
 </div>
@endsection
