@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h5>Browse by Catagory</h4>
    </div>
    <div class="row justify-content-center">
        <a href="{{route('home')}}" class="col-auto">All</a>
        @foreach($catagories as $catagory)
            <a href="{{route('browse_catagory',['catagory_name'=>$catagory->catagory_name])}}" class="col-auto">{{$catagory->catagory_name}}</a>
        @endforeach
    </div>
    <div class="row">
        @foreach($books as $book)
        <div class="col-3 d-flex align-items-stretch">
            @include('includes.book',array('book'=>$book))
        </div>
        @endforeach
    </div>
</div>
@endsection