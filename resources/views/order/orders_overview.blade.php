@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-primary">Orders</h3>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <td>Order ID</td>
                    <td>Customer Name</td>
                    <td>Date Placed</td>
                    <td>Total Cost</td>
                    <td>Number of Books</td>
                    <td>Status</td>
                    <td>Details</td>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>£{{$order->cost()}}</td>
                        <td>{{$order->book_count()}}</td>
                        <td>{{$order->status()}}</td>
                        <td><a href="{{route('order_details',['order_id'=>$order->id])}}">{{__('See Details')}}</a>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection