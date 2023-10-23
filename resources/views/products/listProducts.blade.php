@extends('layouts.app')

@section('content')
<div class="container" id="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h1 class="text-center">Liste de Produits</h1>
            <hr>
            <div class="d-flex justify-content-center">
                <a href="{{ route('products.create') }}" class="btn btn-info" id="btn">Ajouter un produit</a>
            </div>
            <hr>
            @if (session("status"))
            <div class="alert alert-success">
                {{ session("status") }}
            </div>
            @endif
            <div class="row">
              @if (count($products) > 0)
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($product->image_url)
                            <img src="{{ asset($product->image_url) }}" alt="Product Image" width="100" height="100">
                            @endif
                            <div class="card-body">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('products.details', ['product' => $product]) }}" class="btn btn-primary" id="details-button">
                                        Détails
                                        <svg aria-hidden="true" fill="none" focusable="false" height="20" viewBox="0 0 20 20" width="20" id="cds-react-aria-30" class="css-0">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.793 9.5L9.646 2.354l.708-.708L18.707 10l-8.353 8.354-.708-.707 7.147-7.147H2v-1h14.793z" fill="currentColor"></path>
                                        </svg>
                                    </a>
                                </div>
                                <h5 class="card-text">Nom: {{ $product->name }}</h5>
                                <p class="card-text">Description: {{ $product->description }}</p>
                                <p class="card-text">Prix: {{ $product->price }}</p>
                                <p class="card-text">Quantité: {{ $product->quantity }}</p>
                                <p class="card-text"><small class="text-muted">Poids: {{ $product->weight }}</small></p>
                            </div>
                            <div class="card-footer">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('products.edit', ['product' => $product]) }}" class="btn btn-primary" id="btn">Modifier</a>
                                    <form method="post" action="{{ route('products.destroy', ['product' => $product]) }}">
                                        @csrf
                                        @method("delete")
                                        <input type="submit" value="Supprimer" class="btn btn-danger" id="btn">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div class="col-md-12">
                    <p>Aucun produit n'a été trouvé.</p>
                </div>
                @endif
            </div>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center">
                {{ $products->onEachSide(1)->links('pagination::bootstrap-4', ['class' => 'custom-pagination']) }}
            </div>
        </div>
    </div>
</div>
@endsection
