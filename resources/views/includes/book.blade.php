<div class="card mt-4">
    <a href="/book/{{$book->id}}">
        <img class="card-img-top" src="{{$book->cover_image}}" alt="Card image cap">
    </a>
    <div class="card-body">
        <h4 class="card-title">{{$book->book_name}}</h4>
        <h5 class="card-subtitle">by {{$book->author}}</h5>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <a href="/book/{{$book->id}}" class="btn btn-primary">See details</a>
        <h4 class="my-auto">£{{$book->price}}</h4>
    </div>
</div>