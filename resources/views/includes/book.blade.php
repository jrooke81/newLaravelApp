<div class="card mt-4">
    <a href="{{route('book_details',['book_id'=>$book->id])}}">
        <img class="card-img-top" src="{{$book->cover_image}}" alt="Cover Image">
    </a>
    <div class="card-body">
        <h4 class="card-title text-dark">{{$book->book_name}}</h4>
        <h5 class="card-subtitle text-secondary">by {{$book->author}}</h5>
        @foreach($book->catagories as $catagory)
        <span class="card-text text-info">{{$catagory->catagory_name}} · </span>
        @endforeach
        @if($book->stock_quantity > 1)
        <h6 class="text-success">{{$book->stock_quantity}} in stock</h6>
        @elseif($book->stock_quantity == 1)
        <h6 class="text-warning">Only 1 left in stock!</h6>
        @else
        <h6 class="text-danger">Out of stock!</h6>
        @endif
    </div>
    <div class="card-footer d-flex justify-content-between">
        <a href="{{route('book_details',['book_id'=>$book->id])}}" class="btn btn-primary">See details</a>
        <h4 class="my-auto">£{{$book->price}}</h4>
    </div>
</div>