<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

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
</head>
<body>

	<div class=" bg-dark pt-2 pb-1 sticky-top">
		<a href="../ulogin/index.php"><button type="button" class="btn btn-success ml-3" style="float:left;">HOME</button></a>
		<a href="user.php"><button type="button" class="btn btn-danger mr-3" style="float:right;">CART</button></a>
		<h1 class="text-center text-light">MENU</h1>
	</div>
	<div >
		<?php 

			include('../../dbcon.php');

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
					<table cellpadding="5" border="0" align="center" class="pt-5 mt-5">
						<form action="menu3.php" method="post">
							<tr>
								<td>
									<img src="../dataimg/<?php echo $data['image']; ?>" width="300" height="200" border="5">
								</td>
								<td width="500">
									<div>
										<h1><?php echo $data['name']; ?></h1>
									</div>
									
									<div>
										<h5>Type: <?php echo $data['type']; ?></h5>
										<h5>Detail:</h5>
										<p><?php echo $data['detail']; ?>text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
									</div>
									
									<td width="200" align="center">
										
										<input type='button' name='add' onclick='javascript: document.getElementById("<?php echo $qty ?>").value++;' value='+' class="btn btn-success">
										<input type='text' name='qty1' id='<?php echo $qty ?>' size="1" maxlength="2" class="qty" style="width: 25px; text-align: center;" readonly/>
										<input type='button' name='subtract' onclick='javascript: subtractQty(qty1);' value='-' class="btn btn-danger">
									</td>
									<td width="100" align="center">
										<h4>Rs. <?php echo $data['price']; ?></h4>
									</td>
									
								</td>
							</tr>
						</form>
					</table>
					<?php
				}
			}


		?>
		
	</div>



	<script src="../bootstrap/jss/jquery.min.js"></script>
	<script src="../bootstrap/jss/popper.min.js"></script>
	<script src="../bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>