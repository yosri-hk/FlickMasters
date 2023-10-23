@extends('Orders.layout')
@section('content')
<div class="container">
    <h1>Order Details</h1>
    <div class="card">
        <div class="card-header">
            Order #{{ $order->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Order Date: {{ $order->order_date }}</h5>
            <p class="card-text">Delivery Address: {{ $order->delivery_address }}</p>
            <p class="card-text">Total Price: ${{ $order->total_price }}</p>
            {{-- Add more order details here --}}
        </div>
    </div>
    <a href="{{ route('orders.index') }}" class="btn btn-primary mt-3">Back to Orders</a>
</div>
@endsection