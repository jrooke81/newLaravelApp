@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @if(Session::has('message'))
            <div class="col-12 alert alert-info">{{Session::get('message')}}</div>
        @endif
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-sm-auto col-xs-12">
            <img src="{{$book->cover_image}}" alt="Card image cap">
        </div>
        <div class="col-sm-auto col-xs-12">
            <h4 class="text-dark">{{$book->book_name}}</h4>
            <h5 class="text-secondary">by {{$book->author}}</h5>
            <h6 class="text-secondary">Published {{$book->publication_year}}</h6>
            @foreach($book->catagories as $catagory)
            <span class="text-info">{{$catagory->catagory_name}} · </span>
            @endforeach

            @if($book->stock_quantity > 1)
            <h6 class="text-success">{{$book->stock_quantity}} in stock</h6>
            @elseif($book->stock_quantity == 1)
            <h6 class="text-warning">Only 1 left in stock!</h6>
            @else
            <h6 class="text-danger">Out of stock!</h6>
            @endif

            <form method="post" action="{{route('add_to_basket', ['book_id'=>$book->id])}}">
                @csrf

                @if($book->stock_quantity >= 1)
                @auth
                <label for="quantity">Quantity:</label>
                <select id="quantity" name="quantity">
                    @for($i = 1;$i<=$book->stock_quantity;$i++) <option value="{{$i}}">{{$i}}</option>
                        @endfor
                </select>
                @endauth
                @endif
                <h4>£{{$book->price}}</h4>

                @if($book->stock_quantity >= 1)
                @auth
                <input type="submit" class="btn btn-primary" value="Add to basket">
                @endauth
                @endif
            </form>
        </div>
    </div>
</div>
@endsection