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

  </style>

</head>

<body onload="print()">
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

<!--
<div class = "col-lg-9">
    <a href="{{route('product', [$product->id])}}">
      <div class = "col-lg-3">
             <div class = "panel panel-default">
                <div class = "panel-heading">
                    <h4>{{$product->name}}</br><small>Poseted on {{substr($product->date, 0, 10)}}</small></h4>
                </div>
                <div class = "panel-body">
                    <p><b>Price:</b> {{$product->price}}</br>
                       <b>Views:</b> {{$product->views}}
                    </p>
                    
                    <img class = "featuredImg" src= "/img/{{basename($product->pictures)}}">
                    <?php $index = strpos($product->pictures, basename($product->pictures)) + strlen(basename($product->pictures));

                    $firstBaseName = basename(substr($product->pictures, 0, $index));
                    $secondBaseName = basename(substr($product->pictures, $index, strlen($product->pictures)));
                    #echo $firstBaseName;
                    #echo $secondBaseName;
                    ?>
                    <p>{{$product->shortDesc}}</p>
                  </div>
            </div>
          </div>
      </a>
</div>
-->

<!-- code for dynamicly adding images from database
var myPictures = "C:/wamp/www/laravel/public/img/apartmenthouse.jpgC:/wamp/www/laravel/public/img/house.jpgC:/wamp/www/laravel/public/img/housepool.jpg";

var index = 0;
var notcancel = true;

while(notcancel){ 
    if(myPictures.indexOf("C:/", index+1) != -1){
    console.log(myPictures.substring(index, myPictures.indexOf("C:/", index+1))); 
        index = myPictures.indexOf("C:/", index+1);}
    else{
        console.log(myPictures.substring(index, myPictures.length));
         break;
    }
}


var holdyDiv = $('.pictureContainer').append('img');
$(holdyDiv).attr('class', 'thumbnail');
$(holdyDiv).attr('src', myPictures.substring(0, myPictures.length));

-->

<div class = "row">
  <div class = "col-lg-3">
      <img class = "thumbnail" src= "/img/{{basename($product->pictures)}}"/>
  </div>


  <div class = "col-lg-3">
    <div class = "panel panel-default">
      <div class = "panel-heading">
       <h4>{{$product->name}}</br><small>Poseted on {{substr($product->date, 0, 10)}}</small></h4>
      </div>
    <div class = "panel-body">
      <p><b>Price:</b> {{$product->price}}</br>
         <b>Views:</b> {{$product->views}}</br>
         <b>UserId:</b> {{$product->userId}}</br>
         <b>Is It New: <p class="glyphicon glyphicon-ok" id = "glyphiconOK"></p>
         <p id="products"><?php echo json_encode($product); ?></p>
         <p class="glyphicon glyphicon-remove" id = "glyphiconRemove"></p>
         <input type="text" id="data" value = "{{$product->isItNew}}">
        </br>
       </p>
    </div>
  </div>
</div>
</div>

<div class="container">
     <ul class="row">
      <div class = "pictureContainer">
         
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

  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src ="{{'/js/processBooleans.js'}}"></script>
</body>
</html>
