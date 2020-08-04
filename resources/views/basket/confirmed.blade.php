@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <h5 class="card-header">Order Confirmation</h5>
                <div class="card-body">
                    <h5 class="card-title">Your order has been placed!</h5>
                    <p class="card-text">Order ID: {{$order_id}}</p>
                    <a href="{{route('home')}}" class="btn btn-primary">Go back to browse</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection