<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- META DATA -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
		
        <!-- TITLE OF SITE -->
        <title>FlickMasters</title>

        <!-- for title img -->
		<link rel="shortcut icon" type="image/icon" href="/assets/images/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
		
		<!--linear icon css-->
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
		
		<!--animate.css-->
        <link rel="stylesheet" href="/assets/css/animate.css">
		
		<!--hover.css-->
        <link rel="stylesheet" href="/assets/css/hover-min.css">
		
		<!--vedio player css-->
        <link rel="stylesheet" href="/assets/css/magnific-popup.css">

		<!--owl.carousel.css-->
        <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
		<link href="/assets/css/owl.theme.default.min.css" rel="stylesheet"/>


        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link href="/assets/css/bootsnav.css" rel="stylesheet"/>	
        
        <!--style.css-->
        <link rel="stylesheet" href="/assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="/assets/css/responsive.css">
		
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
							<a class="navbar-brand" href="index.html">
								<img src="assets/images/logo/logo.png" alt="logo">
							</a>
						</div><!--/.navbar-header -->

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li class="smooth-menu">
									<a href="#home">Home</a>
								</li>
								<li class="smooth-menu"><a href="#about">About</a></li>
								<li class="smooth-menu"><a href="#service">Service</a></li>
								<li class="smooth-menu"><a href="#project">Project</a></li>
								<li class="smooth-menu"><a href="#team">Team</a></li>
								<li class="smooth-menu"><a href="#blog">Blog</a></li>
								<li class="smooth-menu"><a href="#contact">Contact</a></li>
								<li>
									<a href="#">
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
		
       
		<br></br>
			   <section class="content">
    <div class="container-fluid">
        <!-- Edit product -->
		
        <div id="editProductContent">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h1 class="text-center">Update Cart</h1>
                        <hr>

                        @if (session("status"))
                            <div class="alert alert-success">
                                {{ session("status") }}
                            </div>
                        @endif

                        <div>
                            @if($errors->any())
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
						@section('content')
						<br></br>
						
                        <form action="{{ route('Cart.update', ['cart' => $cart]) }}" method="POST">
    @csrf
    @method('PUT') <!-- Use the appropriate HTTP method (PUT) for updating -->

    <div class="mb-3">
        <label for="user_id" class="form-label">User_id</label>
        <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $cart->user_id }}" required>
    </div>
	<br></br>
    <?php
// Exemple de récupération des commandes depuis une source de données
$allOrders = App\Models\Order::all();
?>

<div class="mb-3">
    <label for="orders" class="form-label">Orders</label>
    <select class="form-select" id="orders" name="orders[]" multiple>
        <?php foreach ($allOrders as $order): ?>
            <option value="<?php echo $order->id; ?>">
                Order ID: <?php echo $order->id; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
<br></br>
<div class="mb-3">
    <label for="Delivery_address" class="form-label">Delivery Address</label>
    <select class="form-select" id="Delivery_address" name="Delivery_address">
        <option value="">Select an address</option>
        <?php
        // Récupérer toutes les adresses depuis la base de données
        $addresses = App\Models\Adresse::all();
        
        // Itérer à travers les adresses
        foreach ($addresses as $address) {
            // Concaténer les attributs pour former l'adresse
            $fullAddress = $address->Deliveryaddresse . ', ' . $address->City . ', ' . $address->Postal_code;
            ?>
            <option value="<?php echo $address->id; ?>"><?php echo $fullAddress; ?></option>
            <?php
        }
        ?>
    </select>
</div>

   
                          
                            <div class="mb-3" style="display: none;">
                                <label for="subtotal" class="form-label">Subtotal</label>
                                <input type="number" class="form-control" id="subtotal" name="subtotal" value="{{ $cart->subtotal }}">
                            </div>
							<br></br>
                            <div class="mb-3">
    <label for="payment_method" class="form-label">Payment Method</label>

 
    <?php
    // Récupérer la valeur actuelle de payment_method
    $currentPaymentMethod = isset($cart) ? $cart->payment_method : '';

    // Définir les options possibles pour le bouton radio
    $paymentMethods = ['credit_card', 'paypal', 'bank_transfer'];
    ?>

    <?php foreach ($paymentMethods as $method): ?>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="payment_method_<?= $method ?>" value="<?= $method ?>" <?= ($currentPaymentMethod === $method) ? 'checked' : '' ?>>
            <label class="form-check-label" for="payment_method_<?= $method ?>">
                <?= ucfirst(str_replace('_', ' ', $method)) ?>
            </label>
        </div>
    <?php endforeach; ?>
</div>


                            <button type="submit" class="btn btn-primary" style="margin-right: 20px">Update</button>
                            <a class="btn btn-warning" href="/carts/show">Revenir à la liste des paniers</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


					
                <tbody>
                   
                    <tr>
                       
                        <td class="text-center">
                            <div class="btn-group">
                                
                               
                            </div>
                        </td>
                    </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>



















	
		
<br></br>
		

		

		
		
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
											<img src="/assets/images/logo/logo.png" alt="logo" />
										</a>
									</div><!-- /.logo-->
								</div><!--/.hm-foot-title-->
								<div class="hm-foot-para">
									<p>
										Lorem ipsum dolor sit amt conetur adcing elit. Sed do eiusod tempor utslr. Ut laboris nisi ut aute irure dolor in rein velit esse.
									</p>
								</div><!--/.hm-foot-para-->
								<div class="hm-foot-icon">
									<ul>
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><!--/li-->
										<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li><!--/li-->
										<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><!--/li-->
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><!--/li-->
									</ul><!--/ul-->
								</div><!--/.hm-foot-icon-->
							</div><!--/.hm-footer-widget-->
						</div><!--/.col-->
						<div class=" col-md-2 col-sm-6 col-xs-12">
							<div class="hm-footer-widget">
								<div class="hm-foot-title">
									<h4>Useful Links</h4>
								</div><!--/.hm-foot-title-->
								<div class="footer-menu ">	  
									<ul class="">
										<li><a href="index.html" >Home</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="services.html">Service</a></li>
										<li><a href="portfolio.html">Portfolio</a></li>
										<li><a href="blog.html">Blog</a></li>
										<li><a href="contact.html">Contact us</a></li> 
									</ul>
								</div><!-- /.footer-menu-->
							</div><!--/.hm-footer-widget-->
						</div><!--/.col-->
						<div class=" col-md-3 col-sm-6 col-xs-12">
							<div class="hm-footer-widget">
								<div class="hm-foot-title">
									<h4>from the news</h4>
								</div><!--/.hm-foot-title-->
								<div class="hm-para-news">
									<a href="blog_single.html">
										The Pros and Cons of Starting an Online Business.
									</a>
									<span>12th June 2017</span>
								</div><!--/.hm-para-news-->
								<div class="footer-line">
									<div class="border-bottom"></div>
								</div>
								<div class="hm-para-news">
									<a href="blog_single.html">
										The Pros and Cons of Starting an Online Business.
									</a>
									<span>12th June 2017</span>
								</div><!--/.hm-para-news-->
							</div><!--/.hm-footer-widget-->
						</div><!--/.col-->
						<div class=" col-md-3 col-sm-6  col-xs-12">
							<div class="hm-footer-widget">
								<div class="hm-foot-title">
									<h4> Our Newsletter</h4>
								</div><!--/.hm-foot-title-->
								<div class="hm-foot-para">
									<p class="para-news">
										Subscribe to our newsletter to get the latest News and offers..
									</p>
								</div><!--/.hm-foot-para-->
								<div class="hm-foot-email">
									<div class="foot-email-box">
										<input type="text" class="form-control" placeholder="Email Address">
									</div><!--/.foot-email-box-->
									<div class="foot-email-subscribe">
										<button type="button" >go</button>
									</div><!--/.foot-email-icon-->
								</div><!--/.hm-foot-email-->
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

		<script src="/assets/js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        
        <!--modernizr.min.js-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		
		<!--bootstrap.min.js-->
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="/assets/js/bootsnav.js"></script>
		
		<!-- for manu -->
		<script src="/assets/js/jquery.hc-sticky.min.js" type="text/javascript"></script>

		
		<!-- vedio player js -->
		<script src="/assets/js/jquery.magnific-popup.min.js"></script>


		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

		<!-- isotope js -->
		<!-- <script src="assets/js/masonry.min.js"></script>
		<script src="assets/js/isotop-custom.js"></script> -->

        <!--owl.carousel.js-->
        <script type="text/javascript" src="/assets/js/owl.carousel.min.js"></script>
		
		<!-- counter js -->
		<script src="/assets/js/jquery.counterup.min.js"></script>
		<script src="/assets/js/waypoints.min.js"></script>
		
        <!--Custom JS-->
        <script type="text/javascript" src="/assets/js/jak-menusearch.js"></script>
        <script type="text/javascript" src="/assets/js/custom.js"></script>
		

    </body>
	
</html>



