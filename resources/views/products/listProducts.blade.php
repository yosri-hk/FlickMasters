<style>
    .product-card {
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        margin: 10px;
    }

    .product-image {
        max-width: 100%;
        height: auto;
    }

    .product-buttons {
        margin-top: 10px;
    }

    .product-buttons a {
        margin-right: 5px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FlickMasters</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->


  <!-- bootstrap mta3i -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- bootstrap mta3i -->  
  <link href="{{ asset('ArticleCss/article.css') }}" rel="stylesheet">



  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="FlickMasters" height="60" width="60">
  </div>
<div class="container" id="container">
    <h1 class="text-center">Liste de Produits</h1>
    <hr>
    <input type="text" id="product-filter" placeholder="Filter by Product Name" class="form-control" style="margin-bottom: 10px;">

    <div class="row">
        @if (count($products) > 0)
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="product-card">
                        @if ($product->image_url)
                            <img src="{{ $product->image_url }}" alt="Product Image" class="product-image">
                        @endif
                        <div style="margin-top: 10px;">
                            <h5>Nom: {{ $product->name }}</h5>
                            <p>Description: {{ $product->description }}</p>
                            <p>Prix: {{ $product->price }}</p>
                            <p>Quantité: {{ $product->quantity }}</p>
                            <p><small>Poids: {{ $product->weight }}</small></p>
                        </div>
      <div class="product-buttons" style="margin-top: 10px;">
        <div class="btn-group" role="group">
            <a href="{{ route('products.details', ['id' => $product->id]) }}" class="btn btn-primary">Détails</a>
            <a href="{{ route('products.edit', ['product' => $product]) }}" class="btn btn-primary">Modifier</a>
            <a href="{{ route('orders.create', ['id' => $product->id]) }}" class="btn btn-success">Commander</a>
        </div>
  <div class="mb-3">
</br>
    <form method="post" action="{{ route('products.destroy', ['product' => $product]) }}">
        @csrf
        @method("delete")
        <input type="submit" value="Supprimer" class="btn btn-danger">
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
</div>
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="/plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<script src="/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#product-filter').on('input', function () {
        var filter = $(this).val().toLowerCase();
        $('.product-card').each(function () {
            var productName = $(this).find('h5').text().toLowerCase();
            if (productName.includes(filter)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
</script>



