

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- META DATA -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">





        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
		
        <!-- TITLE OF SITE -->
        <title>FlickMasters</title>

        <!-- for title img -->
		<link rel="shortcut icon" type="image/icon" href="../assets/images/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!--linear icon css-->
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
		
		<!--animate.css-->
        <link rel="stylesheet" href="../assets/css/animate.css">
		
		<!--hover.css-->
        <link rel="stylesheet" href="../assets/css/hover-min.css">
		
		<!--vedio player css-->
        <link rel="stylesheet" href="../assets/css/magnific-popup.css">

		<!--owl.carousel.css-->
        <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
		<link href="assets/css/owl.theme.default.min.css" rel="stylesheet"/>


        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link href="../assets/css/bootsnav.css" rel="stylesheet"/>	
        
        <!--style.css-->
        <link rel="stylesheet" href="../assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="../assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

		
		
		<!--menu start-->
		<section id="menu">
			<div class="container">
				<div class="menubar">
					<nav class="navbar navbar-default">
					
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="/admin">
								<img src="../assets/images/logo/logo.png" alt="logo">
							</a>
						</div><!--/.navbar-header -->

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li class="nav-item d-none d-sm-inline-block">
									<a href="/">Home</a>
								</li>
								<li class="nav-item d-none d-sm-inline-block"><a href="/articlelist">Article</a></li>
								<li ><a  href="{{ route('participations.create') }}">Participer</a></li>
								<li class="smooth-menu"><a href="#project">Project</a></li>
								<li class="smooth-menu"><a href="#team">Team</a></li>
								<li class="smooth-menu"><a href="#blog">Blog</a></li>
								<li class="smooth-menu"><a href="#contact">Contact</a></li>
								<li>
									<a href="/">
                                       <i class="fas fa-sign-out-alt custom-icon"></i>
									</a>
								</li>
								<li>
									<a href="/Cart">
										<span class="lnr lnr-cart"></span>
									</a>
								</li>
								<li class="search">
									<form action="">
										<input type="text" name="search" placeholder="Search....">
										<a href="#">
											<span class="lnr lnr-magnifier"></span>
										</a>
									</form>
								</li>
							</ul><!-- / ul -->
						</div><!-- /.navbar-collapse -->
					</nav><!--/nav -->
				</div><!--/.menubar -->
			</div><!-- /.container -->

		</section><!--/#menu-->
		<!--menu end-->
		
		<!-- header-slider-area start -->
		<section class="header-slider-area">
			<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
			
			  <!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				</ol>


				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="lnr lnr-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="lnr lnr-chevron-right"></span>
				</a>
			</div><!-- /.carousel-->

		</section><!-- /.header-slider-area-->
		<!-- header-slider-area end -->
		
		

                

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
                                <br><br><br>
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
                                       
                                        <input type="hidden"  name="product_id" value="<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; ?>">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                      <label for="quantity">Quantity</label>
                                      <input type="number" name="quantity" class="form-control" required>
                                  </div>
                                  <br>

                                  <div class="form-group">
                                      <label for="order_date">Order Date</label>
                                      <input type="date" name="order_date" class="form-control" required>
                                  </div>
                                  <br>

                                  <div class="form-group">
                                      <label for="delivery_address">Delivery Address</label>
                                      <input type="text" name="delivery_address" class="form-control" required>
                                  </div>
                                  <br>

                                  

                                  <!-- Include Coupon ID field in the form -->
                                  <div class="form-group">
                                      <label for="code">Code</label>
                                      <input type="text" name="code" class="form-control">
                                  </div>
                                  <br>
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

	

	

		

		

		
		
		<!--hm-footer start-->
		<section class="hm-footer">
			<div class="container">
				<div class="hm-footer-details">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="hm-footer-widget">
								<div class="hm-foot-title ">
									<div class="logo">
										<a href="index.html">
											<img src="../assets/images/logo/logo.png" alt="logo" />
										</a>
									</div><!-- /.logo-->
								</div><!--/.hm-foot-title-->
								<div class="hm-foot-para">
									
								</div><!--/.hm-foot-para-->
							
							</div><!--/.hm-footer-widget-->
						</div><!--/.col-->
						<div class=" col-md-2 col-sm-6 col-xs-12">
							
					
						<div class=" col-md-3 col-sm-6  col-xs-12">
							<div class="hm-footer-widget">
								
								
								
							</div><!--/.hm-footer-widget-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.hm-footer-details-->
			</div><!--/.container-->

		</section><!--/.hm-footer-details-->
		<!--hm-footer end-->
		
		<!-- footer-copyright start -->
		<footer class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="foot-copyright pull-left">
							
						</div><!--/.foot-copyright-->
					</div><!--/.col-->
					
				</div><!--/.row-->
				
			</div><!-- /.container-->

		</footer><!-- /.footer-copyright-->
		<!-- footer-copyright end -->



		<!-- jaquery link -->

		<script src="../assets/js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        
        <!--modernizr.min.js-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		
		<!--bootstrap.min.js-->
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="../assets/js/bootsnav.js"></script>
		
		<!-- for manu -->
		<script src="../assets/js/jquery.hc-sticky.min.js" type="text/javascript"></script>

		
		<!-- vedio player js -->
		<script src="../assets/js/jquery.magnific-popup.min.js"></script>


		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

		<!-- isotope js -->
		<!-- <script src="assets/js/masonry.min.js"></script>
		<script src="assets/js/isotop-custom.js"></script> -->

        <!--owl.carousel.js-->
        <script type="text/javascript" src="../assets/js/owl.carousel.min.js"></script>
		
		<!-- counter js -->
		<script src="../assets/js/jquery.counterup.min.js"></script>
		<script src="../assets/js/waypoints.min.js"></script>
		
        <!--Custom JS-->
        <script type="text/javascript" src="../assets/js/jak-menusearch.js"></script>
        <script type="text/javascript" src="../assets/js/custom.js"></script>

		
		

    </body>
	
</html>



	