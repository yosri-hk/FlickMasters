@extends('Coupons.layout')
@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- Order Listing -->
        <div class="container">
          <h1>coupons Listing</h1>
          <div class="d-flex justify-content-end">
            <a class="btn btn-info" href="{{ route('coupons.create') }}">Create coupon</a>
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
                <th>Coupon Code</th>
                <th>Discount Amount</th>
                <th>Expiration Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($coupons as $coupon)
        <tr>
            <td>{{ $coupon->id }}</td>
            <td>{{ $coupon->code }}</td>
            <td>{{ $coupon->discount_amount }}</td>
            <td>{{ $coupon->expires_at }}</td>
            <td>
                <a href="{{ route('coupons.show', $coupon->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-primary">Edit</a>
                <form method="POST" action="{{ route('coupons.destroy', $coupon->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this coupon?')">Delete</button>
                </form>
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