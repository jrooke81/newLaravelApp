@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-primary">Order Details: {{$order->id}}</h3>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <td>Cover</td>
                    <td>Book Details</td>
                    <td>Quantity</td>
                    <td>Unit Price</td>
                    <td>Price</td>
                </thead>
                <tbody>
                    @foreach($order->order_items as $order_item)
                    <tr>
                        <td>
                            <a href="{{route('book_details',['book_id'=>$order_item->book_id])}}">
                                <img height="200" width="132" src="{{$order_item->book->book_cover_url}}" alt="Cover Image">
                            </a>
                        </td>
                        <td>
                            <a href="{{route('book_details',['book_id'=>$order_item->book_id])}}">
                                <h5 class="text-dark">{{$order_item->book->book_title}}</h5>
                            </a>

                            <h5 class="text-secondary">by {{$order_item->book->author}}</h5>
                            @foreach($order_item->book->catagories as $catagory)
                            <span class="text-info">{{$catagory->catagory_name}} · </span>
                            @endforeach
                            @if($order_item->book->stock_quantity > 1)
                            <h6 class="text-success">{{$order_item->book->stock_quantity}} in stock</h6>
                            @elseif($order_item->book->stock_quantity == 1)
                            <h6 class="text-warning">Only 1 left in stock!</h6>
                            @else
                            <h6 class="text-danger">Out of stock!</h6>
                            @endif
                        </td>
                        <td>
                            {{$order_item->quantity}}
                        </td>
                        <td>
                            £{{$order_item->book->price}}
                        </td>
                        <td>£{{$order_item->price_subtotal()}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h5 class="text-right">Order Total:</h5>
                        </td>
                        <td><strong>£{{$order->cost()}}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection