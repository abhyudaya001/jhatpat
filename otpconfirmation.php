<?php
session_start();
if (!isset($_SESSION['uid']) || !isset($_SESSION['otp']) || !isset($_SESSION['phno'])) {
    // Redirect the user back to the login page
    header('Location: login.php');
    exit();
}

$uid = $_SESSION['uid'];
$otp = $_SESSION['otp'];
$phno = $_SESSION['phno'];

if (isset($_POST['verify'])) {
    $entered_otp = $_POST['otp'];

    if ($entered_otp == $otp) {
        $_SESSION['id'] = $uid;
        // Redirect the user to the desired page after successful OTP verification
        header('Location: index.php?uid=' . $uid);
        exit();
    } else {
        ?>
        <script>
            alert("Invalid OTP");
            window.open('otpconfirmation.php', '_self');
        </script>
        <?php
    }
}

$fields = array(
    "variables_values" => $otp,
    "route" => "otp",
    "numbers" => $phno,
);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($fields),
    CURLOPT_HTTPHEADER => array(
        "authorization: api-key",
        "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
		body{
			margin: 0;
			padding: 0;
			background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('images/pizza.jpg');
			background-repeat: no-repeat;    
			background-size: cover;
			box-sizing: border-box;
			z-index: -9999;
			height: 100vh;
		}
		a{
			text-decoration: none;
		}
		a:hover{
			text-decoration: none;
		}
		.wrap{
			top: 25%;
			position: relative;
			max-width: 350px;
			border-radius: 20px;
			margin: auto;
			background: rgba(0,0,0,0.8);
			padding: 20px 40px;
			color: #fff;
			box-sizing: border-box;
			z-index: 999;		
		}
		h2{
			text-align: center;
		}
		h6{
			text-align: center;
			padding: 5px 1px;
		}
		input[type=text], input[type=number], input[type=email], input[type=text], textarea, input[type=password]{
			width: 100%;
			box-sizing: border-box;
			padding: 12px 5px;
			background: rgba(0,0,0,0.10);
			outline: none;
			border: none;
			border-bottom: 1px solid #fff;
			color: #fff;
			border-radius: 5px;
			margin: 5px;
			font-weight: bold;
		}
		input[type=submit]{
			width: 100%;
			box-sizing: border-box;
			padding: 10px 0;
			margin-top: 30px;
			outline: none;
			border: none;
			background: linear-gradient(to right, #ff105f, #ffad06);
			border-radius: 20px;
			font-size: 20px;
			color: #fff;
		}
		input[type=submit]:hover{
			background: linear-gradient(to left, #ff105f, #ffad06);
		}
		a{
			color:white;
			text-decoration: none;
		}
	</style>
        <title>OTP</title>
    </head>
    <body>
        <div class="wrap">
            <h2>OTP</h2>
            <form action="otpconfirmation.php" method="post">
                <input class="" type="number" name="otp" placeholder="OTP" value="" required>
                <input type="submit" name="verify" value="Verify" class="">
                <p><a href='otpconfirmation.php'>Resend otp</a></p>
            </form>
        </div>
    </body>
    </html>
<?php
}
?>