@extends('users.layout')

@section('content')
    <div class="container">
        <h1>Products for {{ $store->name }}</h1>
        <div class="row">
            @foreach ($store->products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset($product->image_url) }}" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            @if($store->promotions->isNotEmpty())
                            @php
                                    $latestPromotion = $store->promotions->sortByDesc('start_date')->first();
                            @endphp
                                <span class="badge badge-success">Discount {{ $latestPromotion->code_percentage }} % <br>{{ $latestPromotion->name }}</span>
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Buy</button>
                                </div>
                                <small class="text-muted">{{ $product->price }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
