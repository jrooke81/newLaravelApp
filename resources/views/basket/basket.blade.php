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
            <table class="table">
                <thead>
                    <td>Cover</td>
                    <td>Book Details</td>
                    <td>Quantity</td>
                    <td>Unit Price</td>
                    <td>Price</td>
                </thead>
                <tbody>
                    @foreach($user->basket_items as $basket_item)
                    <tr>
                        <td>
                            <a href="{{route('book_details',['book_id'=>$basket_item->book_id])}}">
                                <img height="200" width="132" src="{{$basket_item->book->book_cover_url}}" alt="Cover Image">
                            </a>
                        </td>
                        <td>
                            <a href="{{route('book_details',['book_id'=>$basket_item->book_id])}}">
                                <h4 class="text-dark">{{$basket_item->book->book_title}}</h4>
                            </a>

                            <h5 class="text-secondary">by {{$basket_item->book->author}}</h5>
                            @foreach($basket_item->book->catagories as $catagory)
                            <span class="text-info">{{$catagory->catagory_name}} · </span>
                            @endforeach
                            @if($basket_item->book->stock_quantity > 1)
                            <h6 class="text-success">{{$basket_item->book->stock_quantity}} in stock</h6>
                            @elseif($basket_item->book->stock_quantity == 1)
                            <h6 class="text-warning">Only 1 left in stock!</h6>
                            @else
                            <h6 class="text-danger">Out of stock!</h6>
                            @endif
                            <form method="post" action="{{route('remove_book', ['basket_item_id'=>$basket_item->id])}}">
                                @csrf
                                <input type="submit" value="Remove">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="{{route('alter_quantity', ['basket_item_id'=>$basket_item->id])}}">
                                @csrf
                                @if($basket_item->book->stock_quantity > 0)
                                <select name="quantity" onchange="this.form.submit();">
                                    @for($i=1;$i<=$basket_item->book->stock_quantity;$i++) <option value="{{$i}}" <?php if ($i == $basket_item->quantity) : ?> selected="selected" <?php endif; ?>>
                                            {{$i}}</option>
                                        @endfor
                                </select>
                                @else
                                <h4 class="text-danger">Out of stock</h4>
                                @endif
                            </form>
                        </td>
                        <td>
                            £{{$basket_item->book->price}}
                        </td>
                        <td>£{{$basket_item->price_subtotal()}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h5 class="text-right">Total:</h5>
                        </td>
                        <td><strong>£{{$user->basket_total()}}</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <form method="post" action="{{route('order_confirmed',['user_id'=>$user->id])}}">
                                @csrf
                                <input type="submit" class="btn btn-primary" value="Confirm Order" <?php if ($user->basket_items->count() === 0) : ?> disabled <?php endif; ?>>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection