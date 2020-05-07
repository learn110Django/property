<?php include('includes/functions.php');?>

<?php
if(!isLoggedIn()){
  permission_redirect("login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/profie.css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

   
<!-- 
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button> -->
    <a href="../index.php" style="color:#fff";><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Home</a>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto">

        
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle">
        
      <?php 
      if(isset($_COOKIE['useremail'])){
        $email=$_COOKIE['useremail'];
          $sql="SELECT uname FROM  users WHERE email='$email'";
          $result=query($sql);
          $row=mysqli_fetch_assoc($result);
           $uname=$row['uname'];
           $sql1="SELECT coin FROM  coinrecord WHERE username='$uname'";
           $result1=query($sql1);
           $row1=mysqli_fetch_assoc($result1);
        
        ?>
        <i class="fas fa-coins"></i> &nbsp;<span style="color:#fff"><?php echo $row1['coin'];?></span>
        </a>
      </li>
<?php 
}
?>

      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <?php if(isLoggedIn()):?>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
        <?php endif;?>
      </li>
     
    </ul>

  </nav>

    <!-- Sidebar -->
    <!-- <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-user"></i>
          <span>Here user name comes</span>
        </a>
        
      </li>
    </ul> -->

    <div id="content-wrapper" style="background:url('images/bg_1.jpg');background-size:cover;  background-size: 100% 100%;height:500px;margin-bottom:0px;">

      <div class="container-fluid">        

      <?php viewMessage();?>        
      <?php if(isLoggedIn()):
        
        $sql="SELECT fname,lname FROM  users WHERE email='$email'";
          $result=query($sql);
          $row=mysqli_fetch_assoc($result);
        ?>
        <div class="alert alert-success">Welcome <?php echo $row['fname']?>&nbsp;<?php echo $row['lname'];?>, You are logged In</div>
      <?php endif; ?>

      <!-- conetent profile -->
     <?php profile();?>
   <div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				
        <form action="" method="post" enctype="multipart/form-data">
        <?php 
        $sql="SELECT profile_pic FROM `users` WHERE email='$email'";
        $res=query($sql);
        $rows=mysqli_fetch_all($res,MYSQLI_ASSOC);
        foreach($rows as $row){ 
        ?>
        <div class="profile-userpic">
					<img src="usersImage/<?php echo $row['profile_pic'];?>" class="img-responsive" alt="" height="220" width="220" style="border-radius: 50%;">
				</div>
        <?php }?>
        <input type="file" id="real-file" hidden="hidden" name="image" />
        <button type="button" id="custom-button" name="image" style="margin-left:15px;margin-top:10px;">Update Profile</button>
         <button type="submit">Upload</button>
        </form>
			</div>
		</div>

		<?php
		$sql="SELECT * FROM users WHERE email='$email'";
		$result=query($sql);
		$row=mysqli_fetch_assoc($result);
		?>
		<div class="col-md-9">
        <div class="profile-content">
			<div class="tabPanel" style="padding-top:20px;font-size:20px;line-height:2">
			<p>	Name :&nbsp;&nbsp; <?php echo $row['fname']."&nbsp;&nbsp;".$row['lname'];?>
				<br>Email Id:&nbsp; <?php  echo $row['email']?>
				<br>Mobile No: &nbsp;&nbsp;<?php echo $row['mobile']?>
			</p>
      </div>
      
      </div>
		</div>
	</div>
</div> 
      <!-- conetent profile -->
      </div>
      <!-- /.container-fluid -->

       

    </div>
    <!-- /.content-wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/profile.js"></script>

  <script>
  const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function() {
  realFileBtn.click();
});

realFileBtn.addEventListener("change", function() {
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});

  </script>
<?php include('footer.php');?>
</body>

</html>