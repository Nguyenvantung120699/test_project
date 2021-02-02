@extends('layout.layout')

@section('content')
    <div>
        <a href="{{url('/')}}" type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-home"></i> Home Page</a>
        <a type="button" data-toggle="modal" data-target="#modalCreate" style="color: #ffffff" class="btn btn-danger btn-lg btn-block"><i class="fa fa-plus-circle"></i> Add new Product</a>
    </div>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name Product</th>
            <th scope="col">Gallery</th>
            <th scope="col">Category</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $p)
            <tr>
                <th scope="row">{{$p->id}}</th>
                <td>{{$p->name}}</td>
                <td>
                    <div style="width: 100px" id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($gallery = explode(",", $p->gallery) as $g)
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{asset($g)}}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </td>
                <td>{{$p->Category_Foregin->name}}</td>
                <td>{{$p->quantity}}</td>
                <td>{{$p->price}}</td>
                <td>{{$p->description}}</td>
                <td>
                    <a type="button" id="dropdownMenuButton{{$p->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-success btn-small dropdown-toggle"><i class="fa fa-eye"></i> show</a>
                    @include('template.product.show')
                    <a type="button" data-toggle="modal" data-target="#exampleModalCenter{{$p->id}}" class="btn btn-warning btn-small"><i class="fas fa-pen"></i> edit</a>
                    <a href="{{url('product-destroy-'.$p->id)}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-small"><i class="fas fa-trash-alt"></i> destroy</a>
                </td>
            </tr>
            <div class="modal fade" id="exampleModalCenter{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="col-md-12" style="padding: 20px;background-color: #2d3748; color: #ffffff">
                                <div style="padding-top: 20px" class="text-center"><h3>Edit Product</h3></div>
                                <form style="padding: 5px;margin-bottom: 20px" method="post" action="{{url('product-update',['id'=>$p->id])}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Product Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$p->name}}" id="exampleFormControlInput1" placeholder="Product name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Category</label>
                                        <select name="category_id" class="form-select form-control" aria-label="Default select example">
                                            <option value="{{$p->category_id}}" selected>{{$p->Category_Foregin->name}}</option>
                                            @foreach(\App\Models\Category::all() as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">Quantity</label>
                                        <input type="number" name="quantity" class="form-control" value="{{$p->quantity}}" id="exampleFormControlInput2" placeholder="Quantity">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput3">Price</label>
                                        <input type="number" name="price" class="form-control" value="{{$p->price}}" id="exampleFormControlInput3" placeholder="Price">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">Submit data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </tbody>
    </table>
@endsection
@section('content_modal')
    <div class="col-md-12" style="background-color: #2d3748; color: #ffffff">
        <div  style="padding-top: 20px" class="text-center"><h3>Create New Product</h3></div>
        <form style="padding: 20px" method="post" action="{{url('product-create-store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Product Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Product name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput">Gallery</label>
                <input type="file" name="gallery[]" class="form-control" multiple id="gallery-photo-add">
                <div class="gallery"></div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Category</label>
                <select name="category_id" multiple class="form-control" id="exampleFormControlSelect2">
                    @foreach(\App\Models\Category::all() as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="exampleFormControlInput2" placeholder="Quantity">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">Price</label>
                <input type="number" name="price" class="form-control" id="exampleFormControlInput3" placeholder="Price">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlInput3" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block">Submit data</button>
            </div>
        </form>
    </div>
@endsection