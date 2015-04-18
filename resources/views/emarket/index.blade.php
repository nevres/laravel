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


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>
    img {
      display: block;
      max-width:230px;
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


  </style>
</head>
<body>
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
                <li><a href = "/user/{{Auth::user()->id}}">My Profile</a></li>
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


  <div class = "col-lg-9">
  @foreach($products as $product)
    <a href="{{route('product', [$product->id])}}">
      <div class = "col-lg-3" style = "position:relative; ">
             <div class = "panel panel-default">
                <div class = "panel-heading">
                    <!--
                    To use later to put a link to every item
                    <a href = "/{{$product->id}}"-->
                    <h4>{{$product->name}}</br><small>Poseted on {{substr($product->date, 0, 10)}}</small></h4>
                </div>
                <div class = "panel-body">
                    <p><b>Price:</b> {{$product->price}}</br>
                       <b>Views:</b> {{$product->views}}
                    </p>
                    
                    <img class = "featuredImg" src= "img/{{basename($product->pictures)}}">
                    <p>{{$product->shortDesc}}</p>
                  </div>
              </div>
          </div>
      </a>
  @endforeach
</div>


<div class = "col-lg-3" style = "float:right">
      <div class = "list-group">
        <a href="/" class = "list-group-item active">Popular</a>
        <a href="/0" class = "list-group-item ">Properties</a>
        <a href="/1" class = "list-group-item">Mobile Phones</a>
        <a href="/2" class = "list-group-item">Computers</a>
        <a href="/3" class = "list-group-item">Clothes</a>
        <a href="/4" class = "list-group-item">Electronics</a>
        <a href="/5" class = "list-group-item">Sport Equipement</a>
        <a href="/6" class = "list-group-item">Art</a>
        <a href="/7" class = "list-group-item">Animals</a>
        <a href="/8" class = "list-group-item">My Home and Gardenn</a>
        <a href="/9" class = "list-group-item">Jewerly and Watches</a>
      </div>
    </div>



  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src ="{{'js/processResult.js'}}"></script>
</body>
</html>
