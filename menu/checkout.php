<?php
	include('../dbcon.php');
	session_start();
	if (isset($_SESSION['uid'])) 
	{
		
	}
	else
	{
		header('location: menu_nologin.php');
	}
	$uid = $_SESSION['uid'];
	$query1 = "SELECT * FROM `user` WHERE `id` = '$uid'";
	$run1 = mysqli_query($conn, $query1);
	$data1 = mysqli_fetch_assoc($run1);

	$userId = $data1['id'];
	$name = $data1['name'];
	$address = $data1['address'];
	$email = $data1['email'];
	$mobile = $data1['mobile'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="../css/checkout.css"> -->
	<title>Checkout</title>
	<!-- font awesome -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<!-- Google Font -->
	<style>
		body{
			margin: 0px;
			padding: 0px;
			box-sizing: border-box;
			background-image: url('');
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
			margin-top: 50px;
		}
		.horizontal-line{
			margin-top: 0px!important;
		}
		.desc{
    		height: 28px;       
    		overflow: hidden;
		}
		.cart-summary{
			background: #bbb3b314;
    		box-shadow: 0 0 10px;
    		padding: 25px;
		}
		.billing{
			padding: 15px 35px;
		    background: #faf9f9;
		    box-shadow: 0 0 10px;
		    border-radius: 5px;
		    width: 350px;
		    /*float: right!important;*/
		}
		.parent-div{
			box-shadow: 0 0 10px;
			background: #232323b3;
			border-radius: 15px;
			border: 1px solid #2f2f2f!important;
			margin-bottom: 50px;
		}
		.child-left{
			text-align: right;
		}
		.checkout{
			color: #fff;
			background: linear-gradient(to left, #ff105f, #ffad06);
			padding: 15px 40px;
			font-size: 15px;
			border-radius: 5px;
			border: 1px solid #ff105f;
			font-weight: 600;
			text-decoration: none;

		}
		.checkout a{
			color: #fff;
			font-size: 15px;
			text-decoration: none;
		}
		@media screen and (min-width: 800px){
    		.main-width{
    		  width: 600px!important;
    		  padding-bottom: 40px;
    		}
  		}
  		@media screen and (max-width: 800px){
    		.parent-div{
    		  padding: 25px 0!important;
    		}
  		}
  		@media screen and (max-width: 450px){
    		.mobile-hide{
    		  display: none;
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
			<a href="cart.php" style="float: right;">CART 
			<?php
			if (isset($_SESSION['cart'])) 
			{
				$count = count($_SESSION['cart']);
				echo "<span><b>$count</b></span>";
			}
			else
			{
				echo "<span><b>0</b></span>";
			}
			?>
			</a>
		</div>
	</div>

	<div class="container main-div">
		<div class="parent-div border rounded">
			<div class="container">
				<div class="info-div">
					
					<div class="container mt-3 mb-4 main-width">
						<div class="border rounded cart-summary bg-white">
							<h5 class="text-center pt-3 ">Account Details</h5>
							<hr class="pb-4">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-3 child-left">
									<h6>Name:</h6>
								</div>
								<div class="col-lg-8 col-md-8 col-9">
									<h6><?php echo $data1['name'] ?></h6>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-3 child-left">
									<h6>Mobile No:</h6>
								</div>
								<div class="col-lg-8 col-md-8 col-9">
									<h6><?php echo $data1['mobile'] ?></h6>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-3 child-left">
									<h6>Address:</h6>
								</div>
								<div class="col-lg-8 col-md-8 col-9">
									<h6><?php echo $data1['address'] ?></h6>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-3 child-left">
									<h6>Email:</h6>
								</div>
								<div class="col-lg-8 col-md-8 col-9">
									<h6><?php echo $data1['email'] ?></h6>
								</div>
							</div>
							<div class="text-center py-4">
								<button class="btn btn-success">Change Address</button>
							</div>
						</div>
					</div>
					

					<div class="row">
							<div class="col-lg-5 col-md-5 col-12 offset-lg-1 offset-md-1 mb-4">
								<div class="border rounded cart-summary bg-white">
							
									<h5 class="text-center pt-3 ">Cart Summary</h5>
									<hr class="pb-4">
									<div class="row px-4">
										<?php
											$qty = 1;
											$total = 0;
											$total1 = 0;

											$_SESSION['cart'] = array_values($_SESSION['cart']);

											if (isset($_SESSION['cart'])) 
											{
												if ($count > 0) 
												{
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
															<div class="col-lg-8 col-md-8 col-8">
																<h6><?php echo $pro['qty']; ?> x <?php echo $data['name']; ?></h6>
																<div class="desc">
																	<p><?php echo $data['detail']; ?></p>
																</div>
															</div>
															<div class="col-lg-4 col-md-4 col-4 text-right">
																<h6><?php echo $total1 = $data['price']*$pro['qty']; ?></h6>
															</div>	
															<hr class="text-center w-75 horizontal-line">
															<?php
															}
														}
													}
												}
											}
										?>
									</div>

									<hr>
									<div>
										<div class="row">
											<div class="col-lg-7 col-md-7 col-7 text-right">
												<h5>Subtotal:</h5>
											</div>
											<div class="col-lg-5 col-md-5 col-5 text-left">
												<h5><?php echo $total.".00"; ?></h5>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-5 col-md-5 col-12 mb-4">
								<div class=" border rounded bg-white cart-summary pt-4">
									<div class="text-center">
										<div class="">
											<h4><b>PAYMENT METHOD</b></h4>
										</div>
										<div class="radio" style="padding: 15px">
					  						<label><input type="radio" name="optradio" checked> Cash On Delivery (COD)</label>
										</div>
									</div>
									<hr>
									<h6>PRICE DETAILS</h6>
									<hr>
									<div class="row">
										<div class="col-lg-8 col-md-8 col-8">
											<?php 
												if (isset($_SESSION['cart'])) {
													$count = count($_SESSION['cart']);
													echo "<h6> Total: ($count Items)</h6>";
												}
												else
												{
													echo "<h6> Price: (0 Items)</h6>";
												}
											?>
											<h6>Delivery Charges </h6>
											<hr>
											<h5>Amount Payable </h5>
										</div>
										<div class="col-lg-4 col-md-4 col-4">
											<h6><?php echo "Rs. ".$total.".00" ?></h6>
											<h6 class="text-success">FREE</h6>
											<hr>
											<h5 class="text-success font-weight-bold"><?php echo "Rs. ".$total.".00"; ?></h5>
										</div>
									</div>
									<hr>
								</div>
							</div>	
					</div>	
				</div>
			</div>

			<div class="text-center" style="padding-bottom: 40px;">
				<a href="order.php"><button class="checkout" name="ordernow"> ORDER NOW <i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></button></a>
			</div>
		</div>
	</div>
	




	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>
<?php

foreach ($_SESSION['cart'] as $pro) 
{
	$id = $pro['product_id'];
	$query = "SELECT * FROM `menu` WHERE `id` = '$id'";
	$run = mysqli_query($conn, $query);

	if (mysqli_num_rows($run)>0)
	{
		while ($data = mysqli_fetch_assoc($run)) 
		{
			$itemName = $data['name'];
			$price = $data['price'];
			$qty = $pro['qty'];
			
		}
	}
	else{
		echo "Errror";
	}
	
	$sql2 = "INSERT INTO `order`(`orderId`,`userId`, `itemName`, `price`, `qty`, `total`, `name`, `address`, `email`) VALUES ('$userId','$userId', '$itemName', '$price', '$qty', '$total', '$name', '$address', '$email')";
			$run2 = mysqli_query($conn, $sql2);
}
die();
echo $itemName;
?>