@extends('Orders.layout')
@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- Order Listing -->
        <div class="container">
          <h1>Order Listing</h1>
          <div class="d-flex justify-content-end">
            <a class="btn btn-info" href="{{ route('orders.create') }}">Create Order</a>
          </div>
          <hr>
          @if (session("status"))
          <div class="alert alert-success">
            {{session("status")}}
          </div>
          @endif
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Order Date</th>
                <th>Delivery Address</th>
                <th>Total Price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->delivery_address }}</td>
                <td>{{ $order->total_price }}</td>
                
                <td>
                  <div class="btn-group">
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ route('orders.destroy', $order->id) }}" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- Order Listing -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  
@endsection