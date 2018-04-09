<table style="width:100%">
  <tr >
<td colspan="4" align="right"><b>Total:</b> {{App\Category::count()}}</td>
  </tr>
  <tr style="border-bottom:1px solid #ccc;">
    <th style="padding:10px">Category Name</th>

    <th>Update</th>
  </tr>
@foreach($data as $category)
  <tr  style="height:50px">
    <td style="padding:10px">{{$category->category_name}}</td>

    <td><a class="btn btn-sm btn-fill btn-primary"
      href="{{url('/editproduct')}}/{{$category->id}}">Edit</td>
  </tr>
@endforeach
</table>
