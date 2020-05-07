<?php include('includes/header.php');

// update_password_u();
otp_generate();
?>

  <div class="container">
  <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form  method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputuname" name="enter_username" class="form-control" placeholder="Enter username address">
              <label for="inputuname">Enter Username address</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="reset_pass">Reset Password</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="login.php">Login Page</a>
        </div> 
      </div>
    </div>
  </div>


  <?php include('includes/footer.php');?>