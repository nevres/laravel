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

</style>

</head>
<body onload="initialize()">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Laravel</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="/">Home</a></li>
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
      <div class = "col-lg-6">
          <form class="form-horizontal" role="form" method="POST" action= @yield('address') enctype="multipart/form-data">
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

            @yield('data')

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

          </form>
        </div>

         <div class = "col-lg-6">
          <label class="control-label" style = "margin-bottom: 25px">Please mark location of property</label>
      <div id="map-canvas"></div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
