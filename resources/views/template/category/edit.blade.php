@extends('layout.layout')

@section('content')
    <div class="col-md-6 offset-3">
        <form method="post" action="{{url('category-update',['id'=>$categories->id])}}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Category Name</label>
                <input type="text" name="name" class="form-control" value="{{$categories->name}}" id="exampleFormControlInput1" placeholder="Category name">
            </div>
            <div class="form-group row">
                <div class="col-md-8">
                    <label for="exampleFormControlInput1">Logo</label>
                    <input type="file" name="logo" accept="image/*" onchange="loadFile(event)" class="form-control">
                </div>
                <div class="col-md-3">
                    <img style="width: 100px" src="{{asset($categories->logo)}}" id="output"/>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Description</label>
                <input type="text" name="description" class="form-control" value="{{$categories->description}}" id="exampleFormControlInput2" placeholder="Description">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Edit data</button>
            </div>
        </form>
    </div>
@endsection