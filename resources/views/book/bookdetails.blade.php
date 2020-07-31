@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <img class="float-left" src="{{$book->cover_image}}" alt="Card image cap">
        </div>
        <div class="col-6">
            <h4>{{$book->book_name}}</h4>
            <h5>by {{$book->author}}</h5>
            <form>
                <label for="quantity">Quantity:</label>
                <select id="quantity" name="quantity">
                    @for($i = 1;$i<=30;$i++) <option value="{{$i}}">{{$i}}</option>
                        @endfor
                </select>
            </form>
            <a href="#" class="btn btn-primary">Add to basket</a>
            <h4>£{{$book->price}}</h4>
        </div>
    </div>
</div>
@endsection