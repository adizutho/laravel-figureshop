@extends('admin.master')
@section('title', 'Admin')

@section('content')

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">

                            <div class="content">
                            @if(\Session::has('alert'))
                                <div class="alert alert-danger">
                                    <div>{{Session::get('alert')}}</div>
                                </div>
                            @endif
                            <h2>Change Image</h2>
                            <h4>{{$data[0]->product_name}}</h4>
                            <form action="{{url('/uploadPP')}}" enctype="multipart/form-data" method="post">
                              {{csrf_field()}}
                              <input type="hidden" value="{{request()->route('id')}}" name="id"/>
                              <input type="file" name="product_img"/>
                              <br>
                              <input type="submit" value="upload" class="btn btn-fill btn-success"/>


                            </form>
                                <div class="footer">
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>


            </div>
        </div>


@endsection
