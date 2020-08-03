@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <img src="{{$book->cover_image}}" alt="Card image cap">
        </div>
        <div class="col-sm-6 col-xs-12">
            <h4 class="text-dark">{{$book->book_name}}</h4>
            <h5 class="text-secondary">by {{$book->author}}</h5>
            @foreach($book->catagories as $catagory)
            <span class="text-info">{{$catagory->catagory_name}} · </span>
            @endforeach
            <h6 class="text-success">{{$book->stock_quantity}} in stock</h6>
            <form method="post" action="{{route('add_to_basket', ['book_id'=>$book->id])}}">
                @csrf
                @auth
                <label for="quantity">Quantity:</label>
                <select id="quantity" name="quantity">
                    @for($i = 1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                        @endfor
                </select>
                @endauth
                <h4>£{{$book->price}}</h4>
                
                @auth
                <input type="submit" class="btn btn-primary" value="Add to basket">
                @endauth
            </form>
        </div>
    </div>
</div>
@endsection