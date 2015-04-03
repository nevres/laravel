@foreach($foundProducts as $counter => $product)
 	@if($counter < 4)
 	<a href={{route('product', [$product->id])}} style = "color:inherit; text-decoration:none">{{$product->name}}</a>
 	<br>
 	@endif
@endforeach