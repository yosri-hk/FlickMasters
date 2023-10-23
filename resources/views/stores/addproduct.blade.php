@extends('stores.layout')

@section('content')
    <div class="container">
        <h1>Add product to store</h1>

        <form action="{{ route('stores.addProducttoStore', ['store' => $store->id]) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="product">Product:</label>
                <select name="product_id" id="product" class="form-control">
                    @if (!is_null($products) && count($products) > 0)
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    @else
                        <option value="">No products available</option>
                    @endif
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>

        <hr>

        <h2>Products in store</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($store->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        
@endsection
