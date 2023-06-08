<?php
session_start();
$uid = $_SESSION['aid'];
$otp = $_SESSION['otp'];
$phno = $_SESSION['phno'];

if (isset($_POST['verify'])) {
    $entered_otp = $_POST['otp'];

    if ($entered_otp == $otp) {
        $_SESSION['id'] = $uid;
        ?>
        <script>
            window.open('admindash.php?uid=<?php echo $uid ?>', '_self');
        </script>
        <?php
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
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <title>OTP</title>
        <style>
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
        </style>
    </head>
    <body>
    <div class=" bg-dark pt-3 pb-3">
		<a href="../index.php"><button type="button" class="btn btn-success ml-3" style="float:right;">HOME</button></a>
		<a href="../login.php"><button type="button" class="btn btn-danger mr-3" style="float:left;"><< Back</button></a>
		<h1 class="text-center text-light">JHATPAT FOODS</h1>
	</div>
	<div class="mt-5 bg-info container text-center text-white">
		<h1>ADMIN LOGIN</h1>
	</div>
    <div class="wrap">
            <h2>OTP</h2>
            <table align="center">
            <form action="otpconfirmation.php" method="post">
                <input class="" type="number" name="otp" placeholder="OTP" value="" required>
                <input type="submit" name="verify" value="Verify" class="">
            </form>
        </div>
    </body>
    </html>
<?php
}
?>
