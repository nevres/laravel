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
          <input type="text" class="form-control" placeholder="Search for product. Example: iPhone 6" style = "width:400px" onkeyup = "up()" onkeydown= "down()" id ="searchInput" >
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
          <p id = "searchResult"></p>
      </form>
    <a href="/addproduct"><button type="submit" class="btn btn-primary" style = "margin-left:35px">Add a Product</button></a>
    </div>
  </div>

 <div class = "container">
	<div class = "col-lg-3">
         <div class = "panel panel-default">
            <div class = "panel-body" style = "height:450">
              <div class = "page-header">
                <h4>House in Ilidza </br><small>Poseted on July 26th</small></h4>
              </div>
                <img class = "featuredImg" src="img/house.jpg">
                <p>Nunc nec nulla non tellus interdum auctor eu eu orci. Donec vel interdum ante. Ut elementum mollis lacus, et accumsan eros accumsan ac. Nam vel vestibulum ipsum. Praesent id erat id mi consequat sollicitudin. Aliquam eu mi vitae odio interdum tincidunt at nec ex. Cras quis pulvinar leo.</p>
          </div>
        </div>
      </div>

      <div class = "col-lg-3">
         <div class = "panel panel-default" style = "height:450">
            <div class = "panel-body">
              <div class = "page-header">
                <h4> Iphone 6 </br><small>Poseted on July 26th</small></h4>
              </div>
                <img class = "featuredImg" src="img/iphone.jpg">
                <p>Nunc nec nulla non tellus interdum auctor eu eu orci. 
                	Donec vel interdum ante. Ut elementum mollis lacus, 
                	et accumsan eros accumsan ac. Nam vel vestibulum ipsum. 
                	Praesent id erat id mi consequat sollicitudin. Aliquam 
                	eu mi vitae odio interdum tincidunt at nec ex. Cras quis pulvinar leo.</p>
          </div>
        </div>
      </div>

    <div class = "col-lg-3">
         <div class = "panel panel-default">
            <div class = "panel-body" style = "height:450">
              <div class = "page-header">
                <h4>New HP laptop </br><small>Poseted on July 26th</small></h4>
              </div>
                <img class = "featuredImg" src="img/laptop.jpg">
                <p>Nunc nec nulla non tellus interdum auctor eu eu orci. Donec vel interdum ante. Ut elementum mollis lacus, et accumsan eros accumsan ac. Nam vel vestibulum ipsum. Praesent id erat id mi consequat sollicitudin. Aliquam eu mi vitae odio interdum tincidunt at nec ex. Cras quis pulvinar leo.</p>
          </div>
        </div>
      </div>

<div class = "col-lg-3">
      <div class = "list-group">
        <a href="#" class = "list-group-item active">Popular</a>
        <!--for popular implement as home page to drag most popular from all categories from database-->
        <a href="#" class = "list-group-item ">Properties</a>
        <a href="#" class = "list-group-item">Mobile Phones</a>
        <a href="#" class = "list-group-item">Computers</a>
        <a href="#" class = "list-group-item">Clothes</a>
        <a href="#" class = "list-group-item">Electronics</a>
        <a href="#" class = "list-group-item">Sport Equipement</a>
        <a href="#" class = "list-group-item">Art</a>
        <a href="#" class = "list-group-item">Animals</a>
        <a href="#" class = "list-group-item">My Home and Gardenn</a>
        <a href="#" class = "list-group-item">Jewerly and Watches</a>
      </div>
    </div>
</div>

  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src ="{{'js/processResult.js'}}"></script>
</body>
</html>
