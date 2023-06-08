<?php
	session_start();
	include('../dbcon.php');

 
	if (isset($_POST['remove'])) 
	{
		if ($_GET['action'] == 'remove') 
		{
			foreach ($_SESSION['cart'] as $key => $value) 
			{
				if ($value['product_id'] == $_GET['id']) 
				{
					unset($_SESSION['cart'][$key]);
					echo "<script> alert('Item Removed from cart')</script>";
					echo "<script> window.location = 'cart.php' </script>";
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/cart.css">
	<title>Your Cart</title>
	<!-- font awesome -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
	<!-- Increament & Decreament JS -->
	<script type="text/javascript" src="../javascript/quantity_inc_dec.js"></script>
	<style>
		body{
			margin: 0px;
			padding: 0px;
			box-sizing: border-box;
			/*background: #0000007a;*/
		}
		img{
  			-webkit-user-drag: none;
  			-khtml-user-drag: none;
  			-moz-user-drag: none;
  			-o-user-drag: none;
  			user-drag: none;
		}
		.main-menu{
			width: 100%;
			position: relative;
		}
		.inner-menu{
			padding: 25px 15px;
			background: #000000b0;
			color: #fff;
			height: 80px;
			background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('../images/navbar-bg.jpg');
			background-repeat: no-repeat;    
			background-size: cover;
			z-index: -9999;
		}
		.logo{
			position: absolute;
			left: 50%;
			top: 25%;
			content: "";
			-webkit-transform: translate(-50%);
		}
		.logo img{
			height: 50px;
		}
		.inner-menu a{
			color: #fff;
			padding: 5px 10px;
			border-radius: 5px;
			border: 1px solid #fff;
			font-weight: 600;
			text-decoration: none;
		}
		.inner-menu a:hover{
			color: #000;
			background-color: #4CAF50;;
			text-decoration: none;	
		}
		.main-div{
			border: 1px solid #bbb;
			box-shadow: 0 0 30px #404040;
			margin-bottom: 50px;
		}
		.top-heading{
			margin: 40px 50px 0px 50px;
		}
		.top-heading h4 {
		   width: 100%; 
		   color: #3F51B5;
		   font-family: 'Concert One', cursive;
		   border-bottom: 1px solid #3F51B5; 
		   line-height: 0.1em;
		   margin: 10px 0 20px; 
		} 

		.top-heading h4 span { 
		    background:#fff; 
		    padding:0 10px; 
		}
		.fa{
			line-height: 0!important;
		}
		.upper-div{
			background:#e4dede;
			padding: 10px;
			font-weight: 600;
		}
		.inner-div{
			padding: 14px 10px;
		}
		.inner-div img{
			height: 100px;
		}
		.lower-div{
			background:#e4dede;
			padding: 13px;
			font-weight: 600;
		}
		.inner-parent{
			display: flex; 
			margin: auto;
			text-align: center;
		}
		.inner-child{
			margin: auto; 
			text-align: center;
		}
		.bottom-total{
			font-weight: bold; 
			color: #482376; 
			/*padding-left: 7px;*/
		}
		.checkout{
			color: #fff;
			background: linear-gradient(to left, #ff105f, #ffad06);
			padding: 15px 40px;
			font-size: 15px;
			border-radius: 5px;
			border: 1px solid #fff;
			font-weight: 600;
			text-decoration: none;
		}
		.checkout a{
			color: #fff;
			font-size: 15px;
			text-decoration: none;
		}
		.svg-img{
			position: absolute;
			top: 40%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 50%;
			height: 35%;
		}
		.empty-cart-div h2{
			width: 200px;
			position: absolute;
			top: 63%;
			left: 50%;
			color: #000000b8;;
			font-weight: 700;
			transform: translate(-50%, -50%);
		}
		.empty-cart-div h6{
			position: absolute;
			top: 70%;
			left: 50%;
			color: #0000008c;
			font-weight: 500;
			transform: translate(-50%, -50%);
		}
		.empty-cart-div a{
			position: absolute;
			top: 80%;
			left: 50%;
			transform: translate(-50%, -50%);
			color: #fff;
			background: #675ef3;
			padding: 15px 26px;
			font-size: 15px;
			border-radius: 5px;
			border: 1px solid #fff;
			font-weight: 600;
			text-decoration: none;
		}
		.empty-cart-div a:hover{
			color: #fff;
			background: linear-gradient(to left, #01eab5, #675ef3);
			font-size: 15px;
			text-decoration: none;
		}
		@media (max-width: 992px){
			.upper-div{
				display: none!important;
			}
			.remove-btn{
				margin-top: 30px;
			}
		}
		@media (max-width: 602px){
		    .top-heading{
				margin: 40px 20px 0px 0px!important;
			}
		}
		@media (max-width: 400px){
		    .empty-cart-div h2{
				top: 56%!important;
			}
			.empty-cart-div h6{
				top: 64%!important;
				width: 250px;
			}
			.empty-cart-div a{
				top: 75%;
			}
		}
		@media screen and (max-width: 480px) and (min-width: 350px){
    		.logo img{
    		  height: 40px;
    		}
  		}
  		@media screen and (max-width: 350px){
    		.logo img{
    		  height: 35px;
    		}
  		}
	</style>
</head>
<body>
	<div class="main-menu sticky-top">
		<div class="logo">
			<img src="../images/logo.png" alt="site logo" class="img-fluid">
		</div>
		<div class="inner-menu sticky-top">
			<a href="index.php" style="float: left;">MENU</a>
		</div>
	</div>
	
	<?php
	$_SESSION['cart'] = array_values($_SESSION['cart']);

	if (isset($_SESSION['cart'])) 
	{
		$count = count($_SESSION['cart']);
		if ($count > 0) 
		{
	?>
	<div class="top-heading">
		<h4><span><i class="fa fa-shopping-cart"></i> CART</span></h4>
	</div>
	<div class="container pt-4">
		<div class="main-div">
			<div class="upper-div text-center"> 
				<div class="row px-3">
					<div class="col-lg-3 col-md-3 col-12">
						<p>Image</p>
					</div>
	
					<div class="col-lg-4 col-md-5 col-12">
						<p>Item</p>
					</div>
	
					<div class="col-lg-1 col-md- col-4">
						<p>Price</p>
					</div>
	
					<div class="col-lg-1 col-md- col-4">
						<p>Quantity</p>
					</div>
	
					<div class="col-lg-1 col-md- col-4">
						<p>Ammount</p>
					</div>
	
					<div class="col-lg-2 col-md- col-12">
						<p>Remove</p>
					</div>
				</div>
			</div>	

			<div class="inner-div">
				<?php

					$qty = 1;
					$total = 0;
					$ammount = 0;

					$product_id = array_column($_SESSION['cart'], 'product_id');
					// foreach ($product_id as $id) 
					foreach ($_SESSION['cart'] as $pro) 
					{
						$id = $pro['product_id'];
						$query = "SELECT * FROM `menu` WHERE `id` = '$id'";
						$run = mysqli_query($conn, $query);
						if (mysqli_num_rows($run)>0) 
						{
							while ($data = mysqli_fetch_assoc($run)) 
							{
								$qty++;
								$total = $total + ( (int)$data['price']*(int)$pro['qty']);
								?>
				<form  method="post" action="cart.php?action=remove&id=<?php echo $data['id'] ?>"> 
					<div class="row px-3">

						<div class="col-lg-3 col-md-3 col-12 inner-parent">
							<img src="../dataimg/<?php echo $data['image']; ?>" class="img-fluid img-thumbnail inner-child">
						</div>
		
						<div class="col-lg-4 col-md-12 col-12">
								<div class="row">
									<div class="col-lg-9 col-md-9 col-9 col-sm-9" style="margin-top: 20px">
										<h5 class="text-uppercase"><?php echo $data['name']; ?></h5>
									</div>

									<div class="col-lg-3 col-md-3 col-3 col-sm-3" style="margin-top: 20px">
										<?php
											if ($data['type'] == "Veg" || $data['type'] == "veg") 
											{
												?>
													<div><img src="../images/veg.jpg" style="height: 18px;"></div>
												<?php
											}
											else
											{
												?><div><img src="../images/non-veg.jpg" style="height: 18px;"></div>
												<?php
											}
										?>
									</div>
								</div>
								<p class="pt-3"><?php echo $data['detail']; ?></p>
						</div>
		
						<div class="col-lg-1 col-md-4 col-4 inner-parent">
							<h6 class="inner-child"><?php echo $data['price']; ?></h6>
						</div>
		
						<div class="col-lg-1 col-md-4 col-4 inner-parent">
							<h6 class="inner-child"><small>x</small><?php echo $pro['qty']; ?></h6>
						</div>
		
						<div class="col-lg-1 col-md-44 col-4 inner-parent">
							<h6 class="inner-child"><?php echo $ammount = $data['price']*$pro['qty']; ?></h6>
						</div>
						
						<input type="hidden" name="product_id" value="<?php echo $data['id']; ?>">

						<div class="col-lg-2 col-md-12 col-12 inner-parent">
							<button class="btn btn-danger inner-child remove-btn" name="remove">REMOVE</button>
						</div>
					</div>
					<hr style="margin: 15px 10px">
				</form>
				<?php
							}
						}
					}
               	?>
			</div>

			<div class="lower-div">
				<div class="row px-3">

					<div class="col-lg-9 col-md-9 col-9">
						<h5 style="float: right; color: #482376">Subtotal</h5>
					</div>
	
					<div class="col-lg-3 col-md-3 col-3">
						<h5 class="bottom-total"><?php echo $total.".00"; ?></h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="text-center" style="padding-bottom: 40px;">
		<a href="checkout.php"><button class="checkout"> CHECKOUT <i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></button></a>
	</div>
	<?php
		}
		else
		{
			?>

			<div class="container">
				<div class="empty-cart-div text-center">
					<img class="svg-img" src="../images/empty-cart.svg" alt="Empty Cart Svg">
					<h2>Empty Cart</h2>
					<h6 class="text-center">Looks Like you haven't made your choice yet...</h6>
					<a href="menu.php">Back To Menu</a>
				</div>
			</div>

			<?php
		}	
	}
	?>
	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>

