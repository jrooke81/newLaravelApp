<div class="card mt-4">
    <img class="card-img-top" src="{{$book->cover_image}}" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title">{{$book->book_name}}</h4>
        <h5 class="card-subtitle">by {{$book->author}}</h5>
    </div>
    <div class="card-footer">
        <a href="/book/{{$book->id}}" class="btn btn-primary">See details</a>
        <h4 class="card-text text-right">£{{$book->price}}</h4>
    </div>
</div>