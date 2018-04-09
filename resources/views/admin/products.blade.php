<table style="width:100%" class="table table-hover table-striped" >

@foreach($data as $product)
  <tr  style="height:50px">
    <td style="padding:10px">{{$product->product_name}}</td>
    <td style="padding:10px">{{$product->product_code}}</td>
    <td style="padding:10px">{{$product->category->category_name}}</td>
    <td style="padding:10px">{{$product->product_price}}</td>
    <td><a class="btn btn-sm btn-fill btn-primary" href="{{url('/editproduct')}}/{{$product->id}}">Edit</td>
  </tr>
@endforeach
</table>
