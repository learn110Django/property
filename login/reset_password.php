<?php include('includes/header.php');?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header text-center">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <i class="fa fa-lock fa-5x"></i>
        </div>
        <?php 
        // update_password_u();
        // Reset password using username 
          //  $username=$_COOKIE['TestCookie'];
          //   if(isset($_POST['reset_btn'])){
          //       $pass=cleanHtml($_POST['new_pass']);
          //         $sql="SELECT * FROM users WHERE uname='".$username."'";
		      //     	  $result=query($sql);
          //         $count=mysqli_num_rows($result);
          //         $row=mysqli_fetch_array($result);
          //         $email=$row['email'];
          //       if($count>0){
          //         $password=password_hash($pass,PASSWORD_BCRYPT,array('cost'=>'12'));
          //         $token=md5($email . microtime());
          //         $sql="UPDATE `users` SET `token`='".$token."',`pass`='".$password."' WHERE email='".$email."' ";
          //         $result=query($sql);
          //         echo "<div class='alert alert-success'>password Updated Successfully.. 
          //         Now, <a href='login.php'>Login</a>Here</div>";
          //       }
          //     }
          // unset($_COOKIE['TestCookie']);

          //for otp reset password 
            if(isset($_POST['reset_btn'])){
              $email=$_COOKIE['c_email'];
              $pass=cleanHtml($_POST['new_pass']);
                  $sql="SELECT * FROM users WHERE email='".$email."'";
		          	  $result=query($sql);
                  $count=mysqli_num_rows($result);
                  $row=mysqli_fetch_array($result);
                  $email=$row['email'];
                if($count>0){
                  $password=md5($pass);
                 
                  $sql="UPDATE `users` SET `pass`='".$password."' WHERE email='".$email."' ";
                  $result=query($sql);
                  echo "<div class='alert alert-success'>password Updated Successfully.. 
                  Now, <a href='login.php'>Login</a>Here</div>";
                }
              unset($_COOKIE["c_email"]);
            }

        ?>  
        <form method="post" class="text-center">
          <div class="form-group">
          <label>New Password</label>
              <input type="password"  class="form-control text-center" name="new_pass" placeholder="Type your new password">
          </div>
          <button  type="submit" class="btn btn-primary btn-block" name="reset_btn">Confirm</button>
        </form>
      </div>
    </div>
  </div>

  <?php include('includes/footer.php');?>