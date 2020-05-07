
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">OTP(One Time Password)</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4> OTP </h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputotp" name="otp_num" class="form-control" placeholder="Enter your mobile number">
              <label for="inputotp">Enter your mobile number</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="send_otp">Send OTP</button>
        </form>
      </div>
    </div>
  </div>

  <?php

echo $token=md5("akumar0029@gmail.com");

  if(isset($_POST['send_otp'])){
      $mobileNumber=$_POST['otp_num'];
      $msg =rand(1000,9999);
    
	$username = "satish70210@gmail.com";
	$hash = "dd5f68d3b66591205bc324e8e842d983aa546f0c1ac7d68b4aea90d2fb6e3604";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = "$mobileNumber"; // A single number or a comma-seperated list of numbers
	$message = xbhjhtbvdcsi;lp9oi87654321;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);

  }
  ?>

  <?php include('includes/footer.php');?>