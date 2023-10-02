@extends('Orders.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading"><h1>Create Order</h1></div>
  
            <div class="panel-body">
              <form method="POST" action="{{ route('orders.store') }}">
                @csrf
  
                <div class="form-group">
                  <label for="order_date">Order Date</label>
                  <input type="date" name="order_date" class="form-control" required>
                </div>
  
                <div class="form-group">
                  <label for="delivery_address">Delivery Address</label>
                  <input type="text" name="delivery_address" class="form-control" required>
                </div>
  
                <div class="form-group">
                  <label for="total_price">Total Price</label>
                  <input type="number" name="total_price" step="0.01" class="form-control" required>
                </div>
  
                <div class="form-group">
                  <label for="customer_id">Customer ID</label>
                  <input type="text" name="customer_id" class="form-control" required>
                </div>
  
                <div class="form-group">
                  <label for="product_id">Product ID</label>
                  <input type="text" name="product_id" class="form-control" required>
                </div>
  
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" name="quantity" class="form-control" required>
                </div>
  
               
  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Create Order</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection