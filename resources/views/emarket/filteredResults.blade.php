@foreach($products as $product)
    <a href="{{route('product', [$product->id])}}">
      <div class = "col-lg-3" style = "position:relative; ">
             <div class = "panel panel-default">
                <div class = "panel-heading">
                    <!--
                    To use later to put a link to every item
                    <a href = "/{{$product->id}}"-->
                    <h4>{{$product->name}}</br><small>{{trans('indextranslation.Posted on')}} {{substr($product->date, 0, 10)}}</small></h4>
                </div>
                <div class = "panel-body">
                    <p><b>{{trans('indextranslation.Price')}}:</b> {{$product->price}}</br>
                       <b>{{trans('indextranslation.Views')}}:</b> {{$product->views}}
                    </p>
                    
                    <img class = "featuredImg" src= "img/{{basename($product->pictures)}}">
                    <p>{{substr($product->shortDesc, 0, 25)}}...</p>
                  </div>
              </div>
          </div>
      </a>
  @endforeach