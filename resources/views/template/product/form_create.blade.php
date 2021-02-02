@section('content_modal')
<div class="col-md-6 offset-3" style="background-color: #2d3748; color: #ffffff;margin-top: 100px">
    <div  style="padding-top: 20px" class="text-center"><h3>Create New Product</h3></div>
    <form style="padding: 20px" method="post" action="{{url('product-create-store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Product name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput">Gallery</label>
            <input type="file[]" name="gallery" class="form-control" multiple id="gallery-photo-add">
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
            <button type="submit" class="btn btn-success">Submit data</button>
        </div>
    </form>
</div>
@endsection