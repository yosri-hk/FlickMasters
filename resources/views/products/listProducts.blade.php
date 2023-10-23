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
<!doctype html>
<html class="no-js" lang="en">


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
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/articles" class="nav-link">Article</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/categories" class="nav-link">Categorie</a>
      </li>
    </ul>

          </a>
        
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
<div class="container" id="container">
    <h1 class="text-center">Liste de Produits</h1>
    <hr>
    <input type="text" id="product-filter" placeholder="Filter by Product Name" class="form-control" style="margin-bottom: 10px;">

    <div class="row"><select id="category-filter" class="form-control" style="margin-bottom: 10px;">
    <option value="">All Categories</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>
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
                            @if ($product->category_id)
    <p><span class="badge bg-warning">Catégorie: {{ $product->categorieProduct->name }}</span></p>
@endif


                        </div>
      <div class="product-buttons" style="margin-top: 10px;">
    <a href="{{ route('products.details', ['id' => $product->id]) }}" class="btn btn-primary" style="margin-right: 20px;">Détails</a>
    <a href="{{ route('products.edit', ['product' => $product]) }}" class="btn btn-primary" style="margin-right: 20px;">Modifier</a>
    <a href="{{ route('orders.create', ['id' => $product->id]) }}" class="btn btn-primary" style="margin-right: 20px;">commander</a>
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
<!-- footer-copyright start -->
<footer class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="foot-copyright pull-left">
							<p>
								&copy; All Rights Reserve
							 	<a href="https://www.themesine.com">ThemeSINE</a>
							</p>
						</div><!--/.foot-copyright-->
					</div><!--/.col-->
					<div class="col-sm-5">
						<div class="foot-menu pull-right
						">	  
							<ul>
								<li ><a href="#">legal</a></li>
								<li ><a href="#">sitemap</a></li>
								<li ><a href="#">privacy policy</a></li>
							</ul>
						</div><!-- /.foot-menu-->
					</div><!--/.col-->
				</div><!--/.row-->
				<div id="scroll-Top">
					<i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div><!--/.scroll-Top-->
			</div><!-- /.container-->

		</footer><!-- /.footer-copyright-->
		<!-- footer-copyright end -->



		<!-- jaquery link -->

		<script src="assets/js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        
        <!--modernizr.min.js-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		
		<!--bootstrap.min.js-->
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>
		
		<!-- for manu -->
		<script src="assets/js/jquery.hc-sticky.min.js" type="text/javascript"></script>

		
		<!-- vedio player js -->
		<script src="assets/js/jquery.magnific-popup.min.js"></script>


		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

		<!-- isotope js -->
		<!-- <script src="assets/js/masonry.min.js"></script>
		<script src="assets/js/isotop-custom.js"></script> -->

        <!--owl.carousel.js-->
        <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
		
		<!-- counter js -->
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>
		
        <!--Custom JS-->
        <script type="text/javascript" src="assets/js/jak-menusearch.js"></script>
        <script type="text/javascript" src="assets/js/custom.js"></script>

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
<script>
$(document).ready(function () {
    $('#product-filter').on('input', filterProducts);
    $('#category-filter').on('change', filterProducts);
    
    function filterProducts() {
        var nameFilter = $('#product-filter').val().toLowerCase();
        var categoryFilter = $('#category-filter').val();
        
        $('.product-card').each(function () {
            var productName = $(this).find('h5').text().toLowerCase();
            var productCategoryId = $(this).data('category_id');
            
            if ((nameFilter === '' || productName.includes(nameFilter)) &&
                (categoryFilter === '' || productCategoryId === categoryFilter)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    
    filterProducts(); 
});
</script>