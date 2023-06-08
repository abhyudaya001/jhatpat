
<!DOCTYPE html>
<html>
<head>
	<title> Menu </title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

	<style>
		body
		{
			//background-image: url('../images/background.jpeg');
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

	<script type="text/javascript" src="js/total.js"></script>
	<script type="text/javascript" src="js/check.js"></script>
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
	<div class=" bg-dark pt-2 pb-1 sticky-top">

		<a href="../ulogin/index.php"><button type="button" class="btn btn-success ml-3" style="float:left;">HOME</button></a>
		<h3 class="text-light" style="float: right;">Rs. <span id="total"></span></h3>;
		<a href="user.php"><button type="button" class="btn btn-danger mr-3" style="float:right;">CART</button></a>
		<h1 class="text-center text-light">MENU</h1>
		<button onclick="add()" style="float: right;" class="btn btn-primary">TOTAL</button>
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

							<input type='button' name='add' onclick='javascript: document.getElementById("qty1").value++; add()' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty1); add()' value='-' class="btn btn-danger">
							
							<h5>Rs. 5 </h5>
						</div>
					</td>
					<td>
						<img src="jalebi.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Jalebi</h4>
						</div>

						<div class="text-center">
							<input type='text' name='qty7' id='qty7' size="1" maxlength="2" class="qty" style="width: 25px;" />

							<input type='button' name='add' onclick='javascript: document.getElementById("qty7").value++; add()' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty7); add()' value='-' class="btn btn-danger">
							
							<h5>Rs. 100</h5>
						</div>
					</td>
					<td>
						<img src="samosa.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Samosa</h4>
						</div>

						<div class="text-center">
							<input type='text' name='qty2' id='qty2' size="1" maxlength="2" class="qty" style="width: 25px;" readonly/>

							<input type='button' name='add' onclick='javascript: document.getElementById("qty2").value++; add()' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty2); add()' value='-' class="btn btn-danger">
							
							<h5>Rs. 15</h5>
						</div>
					</td>
				</tr>	
				<tr>
					<td>
						<img src="naan.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Plain Naan</h4>
						</div>
						<div class="text-center">
							<input type='text' name='qty3' id='qty3' size="1" maxlength="2" class="qty" style="width: 25px;" readonly/>

							<input type='button' name='add' onclick='javascript: document.getElementById("qty3").value++; add()' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty3); add()' value='-' class="btn btn-danger">

							<h5>Rs. 20</h5>
						</div>
					</td>
					<td>
						<img src="pulav.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Pulav</h4>
						</div>
						<div class="text-center">
							<input type='text' name='qty4' id='qty4' size="1" maxlength="2" class="qty" style="width: 25px;" readonly/>

							<input type='button' name='add' onclick='javascript: document.getElementById("qty4").value++; add()' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty4); add()' value='-' class="btn btn-danger">

							<h5>Rs. 50</h5>
						</div>
					</td>
					<td>
						<img src="pizza.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Pizza</h4>
						</div>

						<div class="text-center">
							<input type='text' name='qty6' id='qty6' size="1" maxlength="2" class="qty" style="width: 25px;" />

							<input type='button' name='add' onclick='javascript: document.getElementById("qty6").value++; add()' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty6); add()' value='-' class="btn btn-danger">

							<h5>Rs. 200</h5>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<img src="paneer-bhurji.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Paneer Bhurji</h4>
						</div>
						<div class="text-center">
							<input type='text' name='qty5' id='qty5' size="1" maxlength="2" class="qty" style="width: 25px;" readonly="" />

							<input type='button' name='add' onclick='javascript: document.getElementById("qty5").value++; add()' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty5); add()' value='-' class="btn btn-danger">

							<h5>Rs. 60</h5>
						</div>
					</td>
					<td>
						<img src="fish.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Pomfret Fish</h4>
						</div>
						<div class="text-center">
							<input type='text' name='qty8' id='qty8' size="1" maxlength="2" class="qty" style="width: 25px;" />

							<input type='button' name='add' onclick='javascript: document.getElementById("qty8").value++; add()' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty8); add()' value='-' class="btn btn-danger">

							<h5>Rs. 150</h5>
						</div>
					</td>
					<td>
						<img src="biryani.jpg" width="300" height="200" border="5"><br>
						<div class="text-center">
							<h4>Biryani</h4>
						</div>
						<div class="text-center">
							<input type='text' name='qty9' id='qty9' size="1" maxlength="2" class="qty" style="width: 25px;" />

							<input type='button' name='add' onclick='javascript: document.getElementById("qty9").value++; add()' value='+' class="btn btn-success">
							<input type='button' name='subtract' onclick='javascript: subtractQty(qty9); add()' value='-' class="btn btn-danger">

							<h5>Rs. 80</h5>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center pt-5">
						<button onclick="return chk()" class="btn btn-warning" style="font-weight: bold; width: 200px; height: 50px; font-size: 25px;"><a href="order1.php">ORDER NOW</a></button>
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

