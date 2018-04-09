<script>
	$(document).ready(function(){
		@foreach(App\Category::all() as $catList)
		$("#cat{{$catList->id}}").click(function(){
			var cats_id = $("#cat{{$catList->id}}").val();
			var price = $("#price_id").val();
			$('input[name=categ_id').val(cats_id);
			$.ajax({
				type: 'get',
				dataType: 'html',
				url: '{{url('/product-category')}}',
				data: 'category_id=' + cats_id + '&price=' + price,
				success: function(response){
					$("#productData").html(response);
				}
			});
		});
		@endforeach

		@for ($i = 1; $i < 3; $i++)
			$("#prc{{$i}}").click(function(){
				var cats_id = $("#categ_id").val();
				@if($i == 1)
					var price = "asc";
				@else
					var price = "desc";
				@endif
				
				$('input[name=price_id').val(price);
				$.ajax({
					type: 'get',
					dataType: 'html',
					url: '{{url('/product-category')}}',
					data: 'category_id=' + cats_id + '&price=' + price,
					success: function(response){
						$("#productData").html(response);
					}
				});
			});
		@endfor
	});
</script>