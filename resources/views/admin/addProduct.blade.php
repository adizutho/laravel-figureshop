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

      var category_id = $('#category_id').val();
      var product_name = $("#product_name").val();
      var product_code = $("#product_code").val();
      var product_price = $("#product_price").val();
      var product_description = $("#product_description").val();
      var token = $("#token").val();

      $.ajax({
        type: "post",
        data: "product_name=" + product_name + "&product_code=" + product_code + "&product_price=" + product_price + "&product_description=" + product_description + "&category_id=" + category_id + "&_token=" + token,
        url: "<?php echo url('/saveproduct') ?>",
        success: function(data){
          $("#msg").html("Product has been inserted");
          $("#msg").fadeOut(2000);
          $('input[name=product_name').val('');
          $('input[name=product_code').val('');
          $('input[name=product_price').val('');
          $('textarea[name=product_description').val('');
        }
      });
    });

    var auto_refresh = setInterval(
    function(){
      $('#products').load('<?php echo url('products');?>').fadeIn("slow");
    },100);

    $('#category_id').select2();
  });
</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                         
                            <div class="content">
                            <h2>Add Product</h2>
                            <p id="msg" class="alert alert-success"></p>
                            <input type="hidden" value="{{csrf_token()}}" id="token"/>
                              <label>Categories:</label>
                              <select id="category_id" name="category_id" class="form-control">
                                <option value="0">Choose the Product Category</option>
                              @foreach(App\Category::all() as $cdata)
                                <option value="{{$cdata->id}}">{{$cdata->category_name}}</option>
                              @endforeach
                              </select>
                              <br>
                              <br>

                              <label>Product Name:</label>
                              <input type="text" id="product_name" name="product_name" class="form-control"/>
                              <br>

                              <label>Product Code:</label>
                              <input type="text" id="product_code" name="product_code" class="form-control"/>
                              <br>

                              <label>Product Price:</label>
                              <input type="text" id="product_price" name="product_price" class="form-control"/>
                              <br>

                              <label>Product Description</label>
                              <textarea id="product_description" name="product_description" class="form-control"></textarea>
                              <br>

                              <input type="submit" class="btn btn-success" value="Submit" id="btn_submit" />
                              <button class="btn btn-success" id="btn_clear">Clear</button>
                                <div class="footer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                          <table class="table table-hover table-striped" >
                            <tr >
                              <td colspan="5" align="right"><b>Total:</b> {{App\products::count()}}</td>
                            </tr>
                            <tr style="border-bottom:1px solid #ccc;">
                              <th style="padding:10px">Product Name</th>
                              <th style="padding:10px">Product Code</th>
                              <th style="padding:10px">Category</th>
                              <th style="padding:10px">Price</th>
                              <th>Update</th>
                            </tr>
                          </table>
                            <div class="content"
                             style="height:400px; overflow-y:scroll; overflow-x:hidden">

                                <div id="products">
                                  <img src="{{url('/upload/img/loading.gif')}}"
                                  style="width:100%; text-align:center">
                                </div>

                                <div class="footer">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>


@endsection