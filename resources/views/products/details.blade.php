
@section('content')

<!-- Product details -->
<div class="container" id="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h1 class="text-center">Product Details</h1>
            <hr>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($product->image_url)
                        <img src="{{ asset($product->image_url) }}" alt="Product Image" width="100" height="100">
                        @endif
                        <div class="card-body">
                            <h5 class="card-text">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><small class="text-muted">Price: {{ $product->price }}</small></p>
                            <p class="card-text"><small class="text-muted">Quantity: {{ $product->quantity }}</small></p>
                            <p class="card-text"><small class="text-muted">Category: {{ $product->categorieProduct->name ?? 'N/A' }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Product details -->

@endsection
