<?php

	/*session_start();

	if (isset($_SESSION['uid'])) 
	{
		echo "";
	}
	else
	{
		header('location:../login.php');
	}
<?php
	
	include('../dbcon.php');

	$uid = $_GET['uid'];

	$query = "SELECT * FROM `user` WHERE `id` = '$uid'";
	$run = mysqli_query($conn, $query);
	$data = mysqli_fetch_assoc($run);3
	<?php echo $data['name'] ?>
 */
?>

<!DOCTYPE html>
<html>
<head>
	<title> Menu </title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

	<style>
		body
		{
			background-image: url('./images/background.jpeg');
			background-repeat: no-repeat;    
			background-attachment: fixed;
   		 	background-position: center;
    	}
    	.qty{
    		border: 1px solid #ced4da;
    		border-radius: 5px;
    	}
    	img{
    		border-radius: 15px;
    		border-style: solid;
    	}
	</style>

	<script>
		function subtractQty(qty)
		{
			if(qty.value - 1 < 0)
			{
				return;
			}
			else
			{
				qty.value--;
			}	
		}
	</script>

</head>
<body>
	<div class=" bg-dark pt-3 pb-3	">
		<a href="../ulogin/index.php"><button type="button" class="btn btn-success ml-3" style="float:left;">HOME</button></a>
		<a href="../log-reg.php"><button type="button" class="btn btn-danger mr-3" style="float:right;">Login/Register</button></a>
		<h1 class="text-center text-light">MENU</h1>
	</div>

	<div class="mt-5">
		<table cellpadding="20" align="center" >
			<form action="menu.php" method="post">
				<tr>
					<td>
						<img src="gulab_jamun.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Gulab Jamun</h4>
						</div>
						<div class="text-center">
							<input type='text' name='qty1' id='qty1' size="1" maxlength="2" class="qty" style="width: 25px;" readonly/>
							<input type='button' name='add' onclick='javascript: document.getElementById("qty1").value++;' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty1);' value='-' class="btn btn-danger">
							<h5>Rs. 30</h5>
						</div>
					</td>
					<td>
						<img src="samosa.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Samosa</h4>
						</div>
						<div class="text-center">
							<input type='text' name='qty2' id='qty2' size="1" maxlength="2" class="qty" style="width: 25px;" readonly/>
							<input type='button' name='add' onclick='javascript: document.getElementById("qty2").value++;' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty2);' value='-' class="btn btn-danger">
							<h5>Rs. 15</h5>
						</div>
					</td>
					<td>
						<img src="naan.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Plain Naan</h4>
						</div>
						<div class="text-center">
							<input type='text' name='qty3' id='qty3' size="1" maxlength="2" class="qty" style="width: 25px;" readonly/>
							<input type='button' name='add' onclick='javascript: document.getElementById("qty3").value++;' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty3);' value='-' class="btn btn-danger">
							<h5>Rs. 20</h5>
						</div>
					</td>
				</tr>	
				<tr>
					<td>
						<img src="pulav.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Pulav</h4>
						</div>
						<div class="text-center">
							<input type='text' name='qty4' id='qty4' size="1" maxlength="2" class="qty" style="width: 25px;" readonly/>
							<input type='button' name='add' onclick='javascript: document.getElementById("qty4").value++;' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty4);' value='-' class="btn btn-danger">
							<h5>Rs. 50</h5>
						</div>
					</td>
					<td>
						<img src="paneer-bhurji.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Paneer Bhurji</h4>
						</div>
						<div class="text-center">
							<input type='text' name='qty5' id='qty5' size="1" maxlength="2" class="qty" style="width: 25px;" readonly />
							<input type='button' name='add' onclick='javascript: document.getElementById("qty5").value++;' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty5);' value='-' class="btn btn-danger">
							<h5>Rs. 60</h5>
						</div>
					</td>
					<td>
						<img src="pizza.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Pizza</h4>
						</div>
						<div class="text-center">
							<input type='text' name='qty6' id='qty6' size="1" maxlength="2" class="qty" style="width: 25px;" />
							<input type='button' name='add' onclick='javascript: document.getElementById("qty6").value++;' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty6);' value='-' class="btn btn-danger">
							<h5>Rs. 200</h5>
						</div>
					</td>
				</tr>			
			</form>
		</table>
	</div>





	<script src="../bootstrap/jss/jquery.min.js"></script>
	<script src="../bootstrap/jss/popper.min.js"></script>
	<script src="../bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>

