
<?php include('includes/header.php');?>
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <?php formValidate();?>
        <form method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="fname" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="lname" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
          <div class="col-md-6">
            <div class="form-label-group">
              <input type="text" id="inputUser" name="uname"  class="form-control" placeholder="Phone Number" required="required">
              <label for="inputUser">Username</label>
            </div>
          </div>

              <div class="col-md-6">
            <div class="form-label-group">
              <input pattren="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>

          </div>
          </div>

           <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputPhone" name="mobile"  pattern="[0-9.]*" class="form-control" placeholder="Phone Number" required="required">
              <label for="inputPhone">Phone Number</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" name="cpass" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="submit1" type="sumbit">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <?php include('includes/footer.php');?>