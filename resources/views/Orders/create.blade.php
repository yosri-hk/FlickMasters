@extends('Orders.layout')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="{{ asset('ArticleCss/Ajout.css') }}" rel="stylesheet">
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div id="ajouterContent">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                <h1 class="text-center">Formulaire ajout d'ordre</h1>
                                <hr>

                                <!-- Display success message -->
                                @if (session("status"))
                                <div class="alert alert-success">
                                    {{ session("status") }}
                                </div>
                                @endif

                                <!-- Display validation errors -->
                                @if($errors->any())
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @endif

                                <!-- Display coupon error -->
                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif

                                <form method="POST" action="{{ route('orders.store') }}">
                                    @csrf

                                    

                                    <div class="form-group">
                                        <label for "product_id">Product ID</label>
                                        <input type="text" name="product_id" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                      <label for="quantity">Quantity</label>
                                      <input type="number" name="quantity" class="form-control" required>
                                  </div>

                                  <div class="form-group">
                                      <label for="order_date">Order Date</label>
                                      <input type="date" name="order_date" class="form-control" required>
                                  </div>

                                  <div class="form-group">
                                      <label for="delivery_address">Delivery Address</label>
                                      <input type="text" name="delivery_address" class="form-control" required>
                                  </div>

                                  

                                  <!-- Include Coupon ID field in the form -->
                                  <div class="form-group">
                                      <label for="code">Code</label>
                                      <input type="text" name="code" class="form-control">
                                  </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Create Order</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JavaScript to display the coupon error message -->
<script>
    @if (session('error'))
        // Show the coupon error message
        $('#coupon-error').text('{{ session('error') }}').show();
    @endif
</script>

@endsection
