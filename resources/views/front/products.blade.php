@extends('front.master')
@section('content')
@include('front.ourJs')
<div class="greyBg">
    <div class="container">
		<div class="wrapper">
		
			<div class="row">
				<div class="col-sm-12">
				<div class="breadcrumbs">
			        <ul>
			          <li><a href="{{url('/')}}">Home</a></li>
			          <li><span class="dot">/</span> <a href="{{url('/product-list')}}">Products</a> </li>
			          @if(count($data) == "0")
			          <li><span class="dot">/</span> <b>{{$category_name}}</b> </li>
			          @else
			          	@if($category_name == "All Products")
			          	<!-- <li><span class="dot">/</span> <b>{{$category_name}}</b> </li> -->
			          	@else
			          		@if($search == "true")
			          		<li><span class="dot">/</span> <b>Search Products</b> </li>
			          		@else
			          		<li><span class="dot">/</span> <a href="{{url('/product-list')}}/{{$category_name}}">{{ucwords($category_name)}}</a> </li>
			          		@endif
			          		
			          	@endif
			          @endif
			        </ul>
                </div>
                </div>
		    </div>
		    @if(count($data) != "0")
		    <h1 class="text-center">Figure List</h1>
		    <div class="row">
	    		<div class="col-xs-6 col-sm-3">
			    	<div class="nice-select">
			    	<span class="current">Figures Categories</span>
			    	<ul class="list">
					    @foreach(App\Category::all() as $cList)
					    <li class="option" id="cat{{$cList->id}}" value="{{$cList->id}}">{{$cList->category_name}}</li>
					    @endforeach
					</ul>
					</div>
					<input type="hidden" name="categ_id" id="categ_id" value="null" />
			    </div>
			    <div class="col-xs-6 col-sm-3">
			    	<div class="nice-select">
			    	<span class="current">Sort by Price</span>
			    	<ul class="list">
			    		<li class="option" id="prc1">Lowest First</li>
			    		<li class="option" id="prc2">Highest First</li>
			    	</ul>
			    	</div>
					<!-- <select id="price">
					    <option value="">Sort by Price</option>
					    <option value="asc">Lowest First</option>
					    <option value="desc">Highest First</option>
					</select> -->
					<input type="hidden" name="price_id" id="price_id" value="null" />
			    </div>
			    <div class="col-xs-6 col-sm-3">
			    	<!-- <button id="findBtn" class="btn btn-success">Find</button> -->
			    </div>
			
				<!-- <div class="col-sm-6 hidden-xs">
					<div class="row">

						<div class="col-sm-4 pull-right">
							
						</div>
						<div class="styleNm">16 style(s)</div>
					</div>	
				</div> -->
		    </div>
		    @endif
	    	<div class="row top25">
	    	@if(count($data) == "0")
	    		<div class="col-md-12" align="center">
	    			<h1 align="center" style="margin: 20px;">No Products <b style="color: red;">{{$category_name}}</b> is found!</h1>
	    		</div>
	    	@else
	    	<div id="productData">
	    		@foreach($data as $prods)
	    		<div class="col-xs-6 col-sm-4">
	    			<div class="itemBox">
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
	    	</div>
	    	@endif
	    	</div>
	    
		</div>
	</div>		
</div>
@endsection