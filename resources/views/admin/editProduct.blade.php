@extends('admin.master')
@section('title', 'Admin')

@section('content')

<script>
  $(document).ready(function(){
    $("#msg").hide();
    $("#btn_clear").click(function(){
      $('input[name=product_name').val('');
      $('input[name=product_code').val('');
      $('input[name=product_price').val('');
      $('textarea[name=product_description').val('');
    });
    $("#btn_submit").click(function(){
      $("#msg").show();

      var product_name = $("#product_name").val();
      var product_code = $("#product_code").val();
      var product_price = $("#product_price").val();
      var product_description = $("#product_description").val();
      var token = $("#token").val();
      var id = $("#id").val();

      $.ajax({
        type: "post",
        data: "id=" + id + "&product_name=" + product_name + "&product_code=" + product_code + "&product_price=" + product_price + "&product_description=" + product_description + "&_token=" + token,
        url: "<?php echo url('/saveproduct') ?>",
        success: function(data){
          $("#msg").html("Product has been updated");
          $("#msg").fadeOut(2000);
        }
      });
    });

    var auto_refresh = setInterval(
    function(){
      $('#products').load('<?php echo url('products');?>').fadeIn("slow");
    },100);
  });
</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                         
                            <div class="content">
                            <h2>Product Image</h2>
                            @if($data[0]->product_img == "img.jpg")
                            <img src="/upload/img/img.jpg" width="100%">
                            @else
                            <img src="{{url('/upload/prod_img')}}/{{$data[0]->product_img}}" width="100%"/>
                            @endif
                                <div class="footer">
                                <a href="{{url('/changeimage')}}/{{$data[0]->id}}" class="btn btn-fill btn-sm btn-primary">Change Product Image</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            
                            <div class="content">
                            <p id="msg" class="alert alert-success"></p>
                            <input type="hidden" name="id" id="id" value="{{$data[0]->id}}"/>
                            <input type="hidden" value="{{csrf_token()}}" id="token"/>
                              <label>Product Name:</label>
                              <input type="text" id="product_name" name="product_name" value="{{$data[0]->product_name}}" class="form-control"/>
                              <br>

                              <label>Product Code:</label>
                              <input type="text" id="product_code" name="product_code" value="{{$data[0]->product_code}}" class="form-control"/>
                              <br>

                              <label>Product Price:</label>
                              <input type="text" id="product_price" name="product_price" value="{{$data[0]->product_price}}" class="form-control"/>
                              <br>

                              <label>Product Description</label>
                              <textarea id="product_description" name="product_description" class="form-control">{{$data[0]->product_description}}</textarea>
                              <br>

                              <input type="submit" class="btn btn-success" value="Submit" id="btn_submit" />
                                <div class="footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>


@endsection