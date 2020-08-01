@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($books as $book)
        <div class="col-3 d-flex align-items-stretch">
            @include('includes.book',array('book'=>$book))
        </div>
        @endforeach
    </div>
</div>
@endsection