<?php include('includes/header.php');
// otp verification
    $otp=$_COOKIE['otp_val'];
    if(isset($_POST['submit_otp'])){
        $otp_enter=$_POST['otp_entry'];
        if($otp == $otp_enter){
          redirect("reset_password.php");
        }else{
          echo "<div class='alert alert-danger'>OTP not matched</div>";
        }
    }
    unset($_COOKIE["otp_val"]);

?>

  <div class="container">
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
              <input type="text" id="inputotp" name="otp_entry" class="form-control" placeholder="Type 4 Digit code">
              <label for="inputotp">Enter OTP here</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="submit_otp">Submit OTP</button>
        </form>
      </div>
    </div>
  </div>

  <?php include('includes/footer.php');?>