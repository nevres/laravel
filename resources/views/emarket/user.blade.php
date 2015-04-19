<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Laravel</title>

  <link href="/css/app.css" rel="stylesheet">
  <link href= "/css/listgroup.css" rel = "stylesheet">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb6SpL1HaxqNtEkzL39GUhdZq5udws7HY&sensor=false">
  </script>

  <link href="/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
  <script src="/js/star-rating.js" type="text/javascript"></script>

<style>

  img {
      display: block;
      max-width:120px;
      max-height:95px;
      width: auto;
      height: auto;
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
     listReviews();
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

  <p id= "reviews" style = "font-size:0;"><?php echo json_encode($reviews); ?></p>

  <div class = "row">
  <div class = "container">

  <div class = "col-lg-3">
      <img id = "mainPhoto" src= "/img/{{basename($user->profilePicture)}}"/>
  </div>

<div class = "col-lg-9" style = "padding-left: 40px; padding-bottom : 20px;">
    <div class = "panel panel-default panel-danger">
      <div class = "panel-heading">
       <h4>{{$user->first_name." ".$user->second_name}}</br></h4>
      </div>
    <div class = "panel-body">
      <p><b>Name:</b> {{$user->first_name}}</br>
        <b>Surname:</b> {{$user->second_name}}</br>
        <b>Profile Created Before:</b>
          <?php
          $myDate = substr($user->created_at, 0, 10);
          $myMonth = mb_substr($user->created_at, 5, 2);
          $myYear = substr($myDate, 0, 4);
          $myDay = substr($myDate, 8, 11);
          $todayMonth = date('n');
          $todayDay = date('j');
          $todayYear = date('Y');

          $monthDifference = abs($myMonth-$todayMonth);
          $dayDifference = abs($myDay - $todayDay);
          $yearDifference = abs($myYear - $todayYear);
          
          if($yearDifference > 0)
            echo $yearDifference." years and ".$monthDifference." months.";
          else if($monthDifference > 0)
            if($monthDifference == 1)
              echo $monthDifference." month and ".$dayDifference." days.";
            else
              echo $monthDifference." months and ".$dayDifference." days.";
          else
            echo $dayDifference." days ";
          
        ?>
      </br>
        <b>Email:</b> {{$user->email}}</br>
         <p id= "user" style = "font-size:0;"><?php echo json_encode($user); ?></p>
        </br>
       </p>
    </div>

  </div>
</div>

</div>
</div>

<div class="container">
      <ul class="nav nav-pills nav-justified" style = "padding-bottom: 20px;">
        <li class="active"><a href="#activeProductsTab" data-toggle="tab">Active Products</a></li>
        <li><a href="#inactiveProductsTab" data-toggle="tab">Previous-Inactive Products</a></li>
        <li><a href="#Comments" data-toggle="tab">User Reviews</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade in active"  id="activeProductsTab">
             <div class = "col-lg-9">
              @foreach($activeProducts as $activeProduct)
                <a href="{{route('product', [$activeProduct->id])}}">
                  <div class = "col-lg-3" style = "position:relative; ">
                         <div class = "panel panel-default">
                            <div class = "panel-heading">
                                <h4>{{$activeProduct->name}}</br><small>Poseted on {{substr($activeProduct->date, 0, 10)}}</small></h4>
                            </div>
                            <div class = "panel-body">
                                <p><b>Price:</b> {{$activeProduct->price}}</br>
                                   <b>Views:</b> {{$activeProduct->views}}
                                </p>
                                
                                <img class = "featuredImg" src= "/img/{{basename($activeProduct->pictures)}}">
                                {{basename($activeProduct->pictures)}}
                                <p>{{$activeProduct->shortDesc}}</p>
                              </div>
                          </div>
                      </div>
                  </a>
              @endforeach
            </div>
          </div>

        <div class="tab-pane fade"  id="Comments">


           <div class="modal fade" id="modal-1">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                 <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h3 class="modal-title">Add New Review</h3>
                 </div>
                 <div class="modal-body">
                  <form class="form-group">
                        Review Message: <input type="text" class="form-control" autocomplete="off" style = "width:400px" id ="reviewMessage" >
                        <input id="input-21d" value="2" type="number" class="rating" min=0 max=5 step=0.5 data-size="sm">
                  </form>
                 </div>

                 <div class="modal-footer">
                  <button type="submit" class="btn btn-default" onclick = "publishReview();return false;" data-toggle="tooltip" data-placement="top" title="Make a Comment">Add a Review</button>
                  <a href="" class="btn btn-default" data-dismiss="modal">Close</a>
                 </div>
              </div>
            </div>
          </div>

          

            <div class = "addSomeText">
            </div>

            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                        </span>Reviews</a>
                    </h4>
                    <div class = "defaultAddComment">
                        <p style = 'margin-top:5px;'></p><button type='button' id = 'buttondefault' class='btn btn-primary' data-toggle='modal' data-target='#modal-1'>Create New Review</button>
                    </div>
                  </div>

                  <div id="collapseOne" class="panel-collapse collapse in">
                    <ul class="list-group" id = "mainListGroup">
                     </ul>
                  </div>
                </div>
              </div>
        </div>

        <div class="tab-pane fade"  id="inactiveProductsTab">
             <div class = "col-lg-9">
              @foreach($inactiveProducts as $inactiveProduct)
                <a href="{{route('product', [$inactiveProduct->id])}}">
                  <div class = "col-lg-3" style = "position:relative; ">
                         <div class = "panel panel-default">
                            <div class = "panel-heading">
                                <h4>{{$inactiveProduct->name}}</br><small>Poseted on {{substr($inactiveProduct->date, 0, 10)}}</small></h4>
                            </div>
                            <div class = "panel-body">
                                <p><b>Price:</b> {{$inactiveProduct->price}}</br>
                                   <b>Views:</b> {{$inactiveProduct->views}}
                                </p>
                                
                                <img class = "featuredImg" src= "/img/{{basename($inactiveProduct->pictures)}}">
                                {{basename($inactiveProduct->pictures)}}
                                <p>{{$inactiveProduct->shortDesc}}</p>
                              </div>
                          </div>
                      </div>
                  </a>
              @endforeach
            </div>
          </div>
      </div>
    </div>


  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src ="{{'/js/publishReviews.js'}}"></script>
</body>
</html>