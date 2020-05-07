<?php include('includes/header.php');?>
<a href="../index.php" style="color:#87CEFA;padding:50px"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Home</a>
<?php
if(isLoggedIn()){
  permission_redirect("index.php");
}
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post">
        <?php login_validate();?>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail"  name="email" class="form-control" placeholder="Email address" pattren="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="on" name="remeber_me">
                Remember Password
              </label>
            </div>
          </div>
          
         <button type="submit" name="login_btn" class="btn btn-block btn-primary">Login</button>
        </form>
       
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

<?php include('includes/footer.php');?> 
