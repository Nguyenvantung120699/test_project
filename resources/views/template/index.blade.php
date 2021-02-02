@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="col-md-12 row">
            <div class="col-md-6 text-center" style="background-color: #2d3748; height: 400px;margin-top: 10%;border:1px solid seagreen;">
                <a style="margin-top: 35%" href="{{url('product-index')}}" type="button" class="btn btn-outline-success btn-lg">Product Manager</a>
            </div>
            <div class="col-md-6 text-center" style="background-color: #2d3748; height: 400px;margin-top: 10%;border:1px solid yellow;">
                <a style="margin-top: 35%" href="{{url('category-index')}}" type="button" class="btn btn-outline-warning btn-lg">Category Manager</a>
            </div>
        </div>
    </div>
@endsection