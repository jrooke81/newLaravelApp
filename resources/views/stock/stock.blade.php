@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-primary">Manage Stock</h3>
    <div class="row">
        <div class="col-12">
            @if(Session::has('message'))
                <div class="alert alert-info">{{Session::get('message')}}</div>
            @endif
            <table class="table">
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>
                            <a href="{{route('book_details',['book_id'=>$book->id])}}">
                                <img height="200" width="132" src="{{$book->cover_image}}" alt="Cover Image">
                            </a>
                        </td>
                        <td>
                            <a href="{{route('book_details',['book_id'=>$book->id])}}">{{$book->book_name}}</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('alter_stock_quantity', ['book_id'=>$book->id])}}">
                                @csrf
                                <input type="text" name="stock_quantity" value="{{$book->stock_quantity}}">
                                <input type="submit" value="Update Stock Level">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="{{route('remove_from_stock', ['book_id'=>$book->id])}}">
                                @csrf
                                <input type="submit" value="Remove">
                            </form>
                        </td>
                        <td>
                            £{{$book->price}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection