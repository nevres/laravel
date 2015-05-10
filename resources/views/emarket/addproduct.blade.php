<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel</title>

  <link href="/css/app.css" rel="stylesheet">

  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>


  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb6SpL1HaxqNtEkzL39GUhdZq5udws7HY&sensor=false"></script>

<script>
  $(window).resize(function () {
    var h = $(window).height(),
        offsetTop = 60; // Calculate the top offset

    $('#map-canvas').css('height', (h - offsetTop));
}).resize();
</script>

<script>

var map = null;
var marker = null;

var infowindow = new google.maps.InfoWindow(
  { 
    size: new google.maps.Size(150,50)
  });


function createMarker(latlng, name, html) {
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
        });
    google.maps.event.trigger(marker, 'click');    
    return marker;
}


function initialize() {
 
var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(43.8551771, 18.4138047),
    mapTypeControl: true,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP

  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);


google.maps.event.addListener(map, 'click', function(event) {
  //call function to create marker
         if (marker) {
            marker.setMap(null);
            marker = null;
         }
  marker = createMarker(event.latLng, "name", "<b>Location</b><br>"+event.latLng);

  /*document.getElementById("lat").value = event.latLng.lat();
  document.getElementById("long").value = event.latLng.lng();*/
  });
   }



</script>


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>

  #search_container
  {
    margin-bottom: 15px;

  }

  #map-canvas {
    width:80%;
    height:350px;
    margin-bottom: 25px;
    float:center;
}

/* Create a medium height at 40px */
.navbar-md {min-height:40px}
.navbar-md .navbar-brand,
.navbar-md .navbar-nav>li>a {padding-top:10px; padding-bottom:10px}
.navbar-md .navbar-brand {height: 40px}  
.navbar-md .navbar-toggle {margin: 6px 12px 6px 0px; padding: 6px 7px 6px 7px;}
.navbar-md .navbar-toggle .icon-bar {width: 19px;}

</style>

</head>
<body onload="initialize()">



 <nav class="navbar navbar-default navbar-fixed-top navbar-md">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="laravel2.dev">Home</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
            <li><a href="/auth/login">Login</a></li>
            <li><a href="/auth/register">Register</a></li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/auth/logout">Logout</a></li>
                <li><a href = "/user/{{Auth::user()->id}}">My Profile</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-expanded = "false">@lang('indextranslation.Language')<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                <li><a href="{{route('language', ['en'])}}">English</a></li>
                <li><a href="{{route('language', ['tr'])}}">Turkish</a></li>
              </ul>
            </li>

          @endif
        </ul>
      </div>
    </div>
  </nav>


<div class = "container">

@if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
@endif

 <div class = "row">
      <div class = "col-lg-12">
          <form class="form-horizontal" role="form" method="POST" id = "mainForm" action = "addproduct" enctype="multipart/form-data">
            
          <ul class="nav nav-pills nav-justified" style = "margin-bottom:25px; padding-top:55px;">
            <li class="active"><a href="#mainInformation" data-toggle="tab">Main Information</a></li>
            <li><a href="#detailedInformation" >Detailed Information</a></li>
            <li><a href="#imagesAndMap">Images and Map</a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade in active"  id="mainInformation">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
              <label class="col-md-4 control-label">Product Name</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Price</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="price">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Stock</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="stock">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value = "0" name="isItNew">Is It New ? </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value= "0"  name="moneyRetreive">Money Retrieve ? </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Short Description</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="shortDescription">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Long Description</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="longDescription">
              </div>
            </div>
            
            <div class="form-group">
            <label class="col-md-4 control-label">Choose product type: </label>
            <div class = "col-md-6">
            <div class="dropdown" style = "margin-bottom:30px;">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                Product Type
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation"><a role="menuitem" id = "propertyitem" tabindex="-1" onclick = "managedropdowns()">Property</a></li>
                <li role="presentation"><a role="menuitem" id = "phoneitem"tabindex="-1" onclick = "managedropdowns()">Phone</a></li>
                <li role="presentation"><a role="menuitem" id = "computeritem" tabindex="-1" onclick = "managedropdowns()">Computer</a></li>
              </ul>
            </div>
          </div>
        </div>

                </div>
                 <div class="tab-pane fade"  id="detailedInformation">
                <div id = "mydiv">
                  </div>
                  @yield('data')
              </div>

              <div class = "tab-pane fade" id = "imagesAndMap">

                <div class = "col-lg-12">
                  <label class="control-label" style = "margin-bottom: 25px">Please mark location of property</label>
                  <div id="map-canvas"></div>
                </div>

                <div class="form-group" style = "margin-top: 15px;">
                  <label class="col-md-4 control-label">Choose image for an item </label>
                  <div class="col-md-6">
                    <input type="file" multiple name = "pictures[]" >
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                      Add Product
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>


          </form>
        </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
   <script src ="{{'/js/managedropdowns.js'}}"></script>
</body>
</html>
