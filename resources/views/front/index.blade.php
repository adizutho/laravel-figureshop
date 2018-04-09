@extends('front.master')
  @section('content')

<div class="container-fluid">

	<div class="home-content">
		<div class="row">
		    <div class="banner">
          <img src="/theme/images/banner1.jpg" alt="" /></div>
	    </div>
	    <br>
        <div class="container hidden-xs">
            <div class="topSell">
   				<h3>New Products</h3>
   			</div>
       		<div class="row">
	       		@foreach($data as $prods)
	       			<div class="col-xs-6 col-sm-4">
		    			<div class="itemBox bdr">
		    				<div class="prod"><img src="/upload/prod_img/{{$prods->product_img}}" alt="" /></div>
		    				<label>{{$prods->product_name}}</label>
		    				<span class="hidden-xs">{{$prods->product_description}}</span>
		    				<div class="addcart">
		    					<div class="price">Rp {{$prods->product_price}}</div>
		    					<div class="cartIco hidden-xs"><a href="/"></a></div>
		    				</div>
		    			</div>
		    		</div>
		    	@endforeach
		    	<div align="center"><a href="{{url('/product-list')}}"><button class="btn btn-success">See More</button></a></div>
       		</div>
       		<br>
        </div>
    </div>
</div>
@endsection
