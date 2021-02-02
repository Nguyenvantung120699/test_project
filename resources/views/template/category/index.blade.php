@extends('layout.layout')

@section('content')
    <a href="{{url('/')}}" type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-home"></i> Home Page</a>
    <a  type="button" data-toggle="modal" data-target="#modalCreate" style="color: #ffffff" class="btn btn-danger btn-lg btn-block">Create Categories</a>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category Name</th>
            <th scope="col">Logo</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $c)
            <tr>
                <th scope="row">{{$c->id}}</th>
                <td>{{$c->name}}</td>
                <td><img style="width: 50px;" src="{{asset($c->logo)}}"></td>
                <td>
                      <textarea style="height: 50px" name="description" id="" cols="30" rows="10">{{$c->description}}</textarea>
                </td>
                <td>
                    <a class="btn btn-success btn-small  dropdown-toggle" type="button" id="dropdownMenuButton{{$c->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">show</a>
                    @include('template.category.show')
                    <a type="button" data-toggle="modal" data-target="#exampleModalCenter{{$c->id}}" class="btn btn-warning btn-small"><i class="fas fa-pen"></i> edit</a>
                    <a href="{{url('category-destroy-'.$c->id)}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-small">destroy</a>
                </td>
            </tr>
            <div class="modal fade" id="exampleModalCenter{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="col-md-12" style="padding: 20px;background-color: #2d3748; color: #ffffff">
                                <div style="padding-top: 20px" class="text-center"><h3>Edit Categories</h3></div>
                                <form method="post" action="{{url('category-update',['id'=>$c->id])}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Category Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$c->name}}" id="exampleFormControlInput1" placeholder="Category name">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <label for="exampleFormControlInput1">Logo</label>
                                            <input type="file" name="logo" accept="image/*" value="{{$c->logo}}" onchange="loadFile(event)" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <img style="width: 100px" src="{{asset($c->logo)}}" id="output"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">Description</label>
                                        <textarea name="description" class="form-control" id="exampleFormControlInput2" placeholder="Description">{{$c->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Submit data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </tbody>
    </table>
    @include('template.category.create')
@endsection