@section('content_modal')
    <div class="col-md-12" style="padding: 20px;background-color: #2d3748; color: #ffffff">
        <div  style="padding-top: 20px" class="text-center"><h3>Create New Categories</h3></div>
        <form method="post" action="{{url('category-create-store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Category Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Category name">
            </div>
            <div class="form-group row">
               <div class="col-md-8">
                   <label for="exampleFormControlInput1">Logo</label>
                   <input type="file" name="logo" accept="image/*" onchange="loadFile(event)" class="form-control">
               </div>
                <div class="col-md-3">
                    <img style="width: 100px" id="output"/>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Description</label>
                <input type="text" name="description" class="form-control" id="exampleFormControlInput2" placeholder="Description">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit data</button>
            </div>
        </form>
    </div>
@endsection