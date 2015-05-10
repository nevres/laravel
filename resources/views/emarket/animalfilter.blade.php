 @extends('emarket.mainfilter')

@section('specificFilter')
 <div class = "panel-body">
                       <label for="breed" class="col-sm-6 control-label">Breed: </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="breed">
                        </div>
                        
                        <label for="age" class="col-sm-6 control-label">Age: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="age">
                        </div>
                        
                        <div class="col-md-6">
                            <input type="checkbox"  id="vaccine">Vaccine</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox"  id="pedigree">Pedigree</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox" id="puppy">Puppy</label>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox"  id="pureblood">Pure Blood</label>
                        </div>

                        <div class = "col-md-6">
                          <label for="gender" class="control-label">Gender: </label>
                          <select class = "form-control" id = "gender">
                            <option value = "-1">Choose</option>
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                          </select>
                        </div>

                      </div>
                      @endsection
                      @section('filterscript')
                      <script src ="{{'js/filters/animalfilter.js'}}"></script>
                      @endsection