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