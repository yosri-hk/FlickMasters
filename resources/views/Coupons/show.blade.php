@extends('Coupons.layout')
@section('content')
<div class="container">
    <h1>Coupon Details</h1>
    <div class="card">
        <div class="card-header">
            Coupon Code: {{ $coupon->code }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Discount Amount: ${{ $coupon->discount_amount }}</h5>
            <p class="card-text">Expiration Date: {{ $coupon->expires_at }}</p>
            {{-- Add more coupon details here --}}
        </div>
    </div>
    <a href="{{ route('coupons.index') }}" class="btn btn-primary mt-3">Back to Coupons</a>
</div>
@endsection