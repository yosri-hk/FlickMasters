@extends('Coupons.layout')
@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading"><h1>Edit Coupon</h1></div>

          <div class="panel-body">
            <form method="POST" action="{{ route('coupons.update', $coupon->id) }}">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="code">Coupon Code</label>
                <input type="text" name="code" class="form-control" value="{{ $coupon->code }}" required>
              </div>

              <div class="form-group">
                <label for="discount_amount">Discount Amount</label>
                <input type="number" name="discount_amount" step="0.01" class="form-control" value="{{ $coupon->discount_amount }}" required>
              </div>

              <div class="form-group">
                <label for="expires_at">Expiration Date</label>
                <input type="date" name="expires_at" class="form-control" value="{{ $coupon->expires_at }}">
              </div>

              {{-- Add more fields as needed for other coupon details --}}

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Coupon</button>
              </div>
            </form>
            <a href="{{ route('coupons.index') }}" class="btn btn-secondary">Back to Coupons</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  
@endsection