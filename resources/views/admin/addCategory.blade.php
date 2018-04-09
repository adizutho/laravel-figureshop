@extends('admin.master')
@section('title', 'Admin')

@section('content')
<script>
$(document).ready(function(){
  $("#msg").hide();
  $("#btn_submit").click(function(){
    $("#msg").show();

    var category_name = $("#cat_name").val();
    var token = $("#token").val();

    $.ajax({
      type: "post",
      data: "category_name=" + category_name + "&_token=" + token,
      url: "<?php echo url('/savecategory') ?>",
      success:function(data){
        $("#msg").html("Category has been Created");
        $("#msg").fadeOut(2000);
        $('input[name=cat_name').val('');
      }
    });
  });

  var auto_refresh = setInterval(
    function(){
      $('#category').load('<?php echo url('category');?>').fadeIn("slow");
    },100);
});
</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">

                            <div class="content">
                            <h2>Add Category</h2>
                            <p id="msg" class="alert alert-success"></p>

                          <input type="hidden" value="{{csrf_token()}}" id="token"/>
                              <label>Category Name</label>
                              <input type="text" id="cat_name" name="cat_name" class="form-control"/>
                              <br>

                              <input type="submit" class="btn btn-success btn-fill" value="Submit" id="btn_submit"/>


                              <div class="footer">

                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">

                            <div class="content" id="category">
                              <img src="{{url('/upload/img/loading.gif')}}" style="width:100%; text-align:center">
                            </div>
                            <div class="footer">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


@endsection
