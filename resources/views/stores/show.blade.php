@extends('users.layout')

@section('content')
    <div class="text-center">
        <div class="row mt-5 justify-content-center">
            @foreach($stores as $store)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $store->name }}</h5>
                            <p class="card-text">{{ $store->description }}</p>
                            @if($store->promotions->isNotEmpty())
                                @php
                                    $latestPromotion = $store->promotions->sortByDesc('start_date')->first();
                                @endphp
                                <span class="badge badge-success">Promotion {{ $latestPromotion->code_percentage }}</span>
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('stores.products', $store->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
