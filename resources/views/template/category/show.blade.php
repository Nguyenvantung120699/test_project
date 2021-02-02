<div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$c->id}}">
  <a class="dropdown-item" href="#"><b>Name : </b> {{$c->name}}</a>
  <a class="dropdown-item" href="#"><b>Logo : </b><img src="{{asset($c->logo)}}" style="width: 100px"></a>
  <a class="dropdown-item" href="#"><b>Description : </b> <textarea name="description" id="" style="height: 200px" cols="30" rows="10">{{$c->description}}</textarea></a>
  <a class="dropdown-item" href="#"><b>Create time : </b>{{$c->created_at}}</a>
  <a class="dropdown-item" href="#"><b>Update time : </b>{{$c->updated_at}}</a>
</div>