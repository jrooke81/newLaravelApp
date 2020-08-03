@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-primary">Manage Stock</h3>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>
                            <a href="{{route('book_details',['book_id'=>$book->id])}}">
                                <img height="200" width="132" src="{{$book->book_cover_url}}" alt="Cover Image">
                            </a>
                        </td>
                        <td>
                            <a href="{{route('book_details',['book_id'=>$book->id])}}">{{$book->book_title}}</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('alter_stock_quantity', ['book_id'=>$book->id])}}">
                                @csrf
                                <input type="number" min="0" max="32766" name="stock_quantity" value="{{$book->stock_quantity}}" required>
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