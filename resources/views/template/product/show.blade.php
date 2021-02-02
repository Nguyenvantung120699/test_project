<div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$p->id}}">
    <a class="dropdown-item" href="#"><b>Name : </b> {{$p->name}}</a>
    <a class="dropdown-item" href="#"><b>Category : </b>{{$p->Category_Foregin->name}}</a>
    <a class="dropdown-item" href="#"><b>Quantity : </b>{{$p->quantity}}</a>
    <a class="dropdown-item" href="#"><b>Price : </b>{{$p->price}}</a>
    <a class="dropdown-item" href="#"><b>Create time : </b>{{$p->created_at}}</a>
    <a class="dropdown-item" href="#"><b>Update time : </b>{{$p->updated_at}}</a>
</div>