<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Laravel</title>

  <link href="/css/app.css" rel="stylesheet">

  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb6SpL1HaxqNtEkzL39GUhdZq5udws7HY&sensor=false">
  </script>



  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>

  .col-lg-2 > img {
      display: block;
      max-width:230px;
      max-height:95px;
      width: auto;
      height: auto;
  }


   ul {         
          padding:0 0 0 0;
          margin:0 0 0 0;
  }
  ul li {     
          list-style:none;
          margin-bottom:25px;           
      }
  ul li img {
          cursor: pointer;
      }

  #search_container
  {
    margin-bottom: 15px;

  }
  a{
    color: inherit;
  }

  #mainPhoto{
    width : auto;
    height: auto;
    max-width:300px;
    max-height:270px;
  }

  .img-responsive{
    width : auto;
    height: auto;
    
    max-height:800px;
  }

  #map-canvas {
      width:80%;
      height:350px;
      margin-bottom: 25px;
      float:center;
  }

  #map-canvas img{
    max-width: none;
  }

  </style>

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
  google.maps.event.trigger(map, 'resize');

  document.getElementById("lat").value = event.latLng.lat();
  document.getElementById("long").value = event.latLng.lng();
  });
  
  }

  
  function onLoadFunction(){
    processBooleans();
    initialize();
  }

</script>


</head>

<body onload="onLoadFunction()" >
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

  <div class = "container" id = "search_container">
    <div class="navbar-form navbar-left" role="search">
        <form class="form-group">
          <input type="text" class="form-control" autocomplete="off"  placeholder="Search for product. Example: iPhone 6" style = "width:400px" onkeyup = "up()" onkeydown= "down()" id ="searchInput" >
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </form>
    <a href="/addproduct"><button type="submit" class="btn btn-primary" style = "margin-left:35px">Add a Product</button></a>
    <p id = "searchResult"></p>
    </div>
  </div>

<div class = "row">
  <div class = "container">
  <div class = "col-lg-3">
      <img id = "mainPhoto" src= "/img/{{basename($product->pictures)}}"/>
  </div>


  <div class = "col-lg-9" style = "padding-left: 40px; padding-bottom : 30px;">
    <div class = "panel panel-default panel-danger">
      <div class = "panel-heading">
       <h4>{{$product->name}}</br><small>Poseted on {{substr($product->date, 0, 10)}}</small></h4>
      </div>
    <div class = "panel-body">
      <p><b>Price:</b> {{$product->price}}</br>
         <b>Views:</b> {{$product->views}}</br>
         <b>UserId:</b> {{$product->userId}}</br>
         <b>Is It New:</b> <b class="glyphicon glyphicon-ok" id = "glyphiconOK"></b><b class="glyphicon glyphicon-remove" id = "glyphiconRemove"></b>
         </br><b>Short Description:</b> {{$product->shortDesc}}
         <p id= "products" style = "font-size:0;"><?php echo json_encode($product); ?></p>
        </br>
       </p>
    </div>
  </div>
</div>
</div>
</div>

<div class="container">
  <ul class="row">
    <div class="panel panel-default">
      <div class="panel-heading"><h3 class="panel-title">Images for an item</h3></div>
      <div class="panel-body">
        <div class = "pictureContainer"></div>
      </div> 
    </div>
  </ul>
</div>

<div class = "container">
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">         
            <div class="modal-body">                
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>

@yield('extraData')

  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src ="{{'/js/processBooleans.js'}}"></script>
  <script src ="{{'/js/processResult.js'}}"></script> 
  <script src ="{{'/js/publishComment.js'}}"></script>

</body>
</html>
