@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-primary">Basket</h3>
    <div class="row">
        <div class="col-12">
            @if($user->basket_items->count() === 0)
            <h5 class="text-secondary">Your basket is empty</h5>
            @endif
            @if(Session::has('message'))
                <div class="alert alert-info">{{Session::get('message')}}</div>
            @endif
            <table class="table table-image">
                <tbody>
                    @foreach($user->basket_items as $basket_item)
                    <tr>
                        <td>
                            <a href="{{route('book_details',['book_id'=>$basket_item->id])}}">
                                <img height="200" width="132" src="{{$basket_item->cover_image}}" alt="Cover Image">
                            </a>
                        </td>
                        <td>
                            <a href="{{route('book_details',['book_id'=>$basket_item->id])}}">{{$basket_item->book_name}}</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('alter_quantity', ['basket_item_id'=>$basket_item->basket_items->id])}}">
                                @csrf
                                @if($basket_item->stock_quantity >0)
                                <select name="quantity" onchange="this.form.submit();">
                                    @for($i=1;$i<=$basket_item->stock_quantity;$i++) <option value="{{$i}}" <?php if ($i == $basket_item->basket_items->quantity) : ?> selected="selected" <?php endif; ?>>
                                        {{$i}}</option>
                                        @endfor
                                </select>
                                @else
                                <h4 class="text-danger">Out of stock</h4>
                                @endif
                            </form>
                        </td>
                        <td>
                            <form method="post" action="{{route('remove_book', ['basket_item_id'=>$basket_item->basket_items->id])}}">
                                @csrf
                                <input type="submit" value="Remove">
                            </form>
                        </td>
                        <td>£{{$basket_item->price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection