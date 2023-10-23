@extends('Orders.layout')
@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading"><h1>Edit Order</h1></div>
  
            <div class="panel-body">
              <form method="POST" action="{{ route('orders.update', $order->id) }}">
                @csrf
                @method('PUT')
  
                
  
  
                <div class="form-group">
                  <label for="delivery_address">Delivery Address</label>
                  <input type="text" name="delivery_address" class="form-control" value="{{ $order->delivery_address }}" required>
                </div>
  
               
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" name="quantity" class="form-control" value="{{ $order->quantity }}" required>
                </div>

                <div class="form-group">
                  <label for="order_date">Order Date</label>
                  <input type="date" name="order_date" class="form-control" value="{{ $order->order_date }}" required>
                </div>
  
                <div class="form-group">
                  <label for="total_price">Total Price</label>
                  <input type="number" name="total_price" step="0.01" class="form-control" value="{{ $order->total_price }}" required readonly>
                </div>
  
                {{-- Add more fields as needed for customer_id and item_subtotal --}}
  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Update Order</button>
                </div>
              </form>
              <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection