@extends('emarket.productview')

@section('extraData')
<div class = "panel panel-default panel-danger">
                <div class = "panel-body">
                <p><b>Breed:</b> {{$product->breed}}</br>
                   <b>Age:</b> {{$product->age}}</br>
                   <b>Gender:</b><div class = "genderDiv"></div></br>

                   <div class = "row">
                    <div class = "col-lg-3">
                     <b>Vaccine:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconVaccineOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconVaccineRemove"></b></br>
                     <b>Pedigree:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconPedigreeOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconPedigreeRemove"></b></br>
                     <b>Puppy:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconPuppyOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconPuppyRemove"></b></br>
                     <b>Pure Blood:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconPureBloodOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconPureBloodRemove"></b></br>
                    </div>
                 </div>
                   </br><b>Short Description:</b> {{$product->longDesc}}</br></p>
              </div>
            </div>
@endsection
@section('scriptName')
<script src ="{{'/js/processyesnoanimal.js'}}"></script>
@endsection
