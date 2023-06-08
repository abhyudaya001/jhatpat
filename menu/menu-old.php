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
	
	if(isset($_POST['add_to_cart']))
	{
		if (isset($_SESSION['cart'])) 
		{
			$product_id_array = array_column($_SESSION['cart'], 'product_id');
			if (in_array($_POST['product_id'], $product_id_array)) 
			{
				echo "<script> alert('Item Already in cart')</script>";
				echo "<script> window.location='menu.php' </script>";
			}
			else
			{
				$count = count($_SESSION['cart']);
				$product_array = array(
				'product_id' => $_POST['product_id'],
				'qty' => $_POST['qty1']
				);
				$_SESSION['cart'][$count] = $product_array;
				// echo "<script> alert('Item Added in cart');</script>";
				// echo "<script> window.location='menu.php' </script>";
			}
		}
		else
		{	
			$product_array = array(
				'product_id' => $_POST['product_id'],
				'qty' => $_POST['qty1']
			);
			$_SESSION['cart'][0] = $product_array;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login</title>
	<!-- font awesome -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/cart.css">
	<script type="text/javascript" src="../javascript/quantity_inc_dec.js"></script>
</head>
<body>

	<div class=" bg-dark pt-2 pb-1 sticky-top">
		<a href="../ulogin/index.php"><button type="button" class="btn btn-success ml-3" style="float:left;">HOME</button></a>
		<?php 
			// $count = count($_SESSION['cart']); 
		?>
		<a href="cart.php"><button type="button" class="btn btn-danger mr-3" style="float:right;">CART 
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
		</button></a>
		<h1 class="text-center text-light">MENU</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="pl-0">
				<div class="shopping-cart pt-3">
					<h6>MENU</h6>
					<hr>
		<?php 
			$query = "SELECT * FROM `menu`";
			$run = mysqli_query($conn, $query);

			if(mysqli_num_rows($run) < 1)
			{
				echo "No data found";
			}
			else
			{
				$qty = 0;

				while ($data = mysqli_fetch_assoc($run)) 
				{
					$qty++;
					?>
					<form method="post" action="menu.php">
						<div class="pt-4">
							<div class="row bg-white">
								<div class="col-md-3 text-center">
									<img src="../dataimg/<?php echo $data['image']; ?>" class="img img-fluid border rounded">
								</div>
								<div class="col-md-5 px-4">
									<div>
										<h3 class="text-uppercase pt-2"><?php echo $data['name']; ?></h3>
									</div>
							
									<div>
										<?php
											if ($data['type'] == "Veg" || $data['type'] == "veg") 
											{
												?><p class="font-weight-bold text-success"> <?php echo $data['type']; ?></p><?php
											}
											else
											{
												?><p class="font-weight-bold text-danger"><?php echo $data['type']; ?></p><?php
											}
										?>
										<p><b>Detail:</b><br>
										<?php echo $data['detail']; ?>Text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
									</div>
								</div>
								<div class="col-md-4 py-5">
									<h4 class="px-4"><?php echo "₹".$data['price']; ?></h4>

									<input type='button' name='add' onclick='javascript: document.getElementById("<?php echo $qty ?>").value++;' value='+' class="btn btn-success">

									<input type='text' name='qty1' id='<?php echo $qty ?>' size="1" value="1" class="qty form-control d-inline text-center" style="width: 12%;" readonly/>

									<input type='button' name='subtract' onclick=subtractQty(qty1); value='-' class="btn btn-danger">

									<input type="hidden" name="product_id" value="<?php echo $data['id']; ?>">
									<button class="btn btn-primary my-2 mx-3" name="add_to_cart">ADD TO CART</button>
								</div>
							</div>
						</div>
					</form>
					<?php
					}
					}
					?>
				</div>
			</div>
		</div>
	</div>
		

	<script src="../bootstrap/jss/jquery.min.js"></script>
	<script src="../bootstrap/jss/popper.min.js"></script>
	<script src="../bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>