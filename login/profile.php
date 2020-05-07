<?php include 'includes/db.php';
		include 'includes/controller.php';
		//include 'includes/functions.php'
?>
<link rel="stylesheet" href="css/profile.css" > 	
<style>
	.profile-content .tabPanel{
		text-transform:capitalize;
		line-height:50px;
	}
	</style>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" alt="">
				</div>
			
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#" onclick="showPanel(0,'#f8f8ff')">
							<i class="glyphicon glyphicon-home"></i>
							About </a>
						</li>
						<li>
							<a href="#" onclick="showPanel(1,'#f8f8ff')">
							<i class="glyphicon glyphicon-user"></i>
							Your coins </a>
						</li>

						<li>
							<a href="#" onclick="showPanel(2,'#f8f8ff')">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>

						<li>
							<a href="logout.php">
							<i class="glyphicon glyphicon-log-out"></i>
							Logout </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>

		<?php 
		 $email=$_COOKIE['Email'];
		$sql="SELECT * FROM users WHERE email='".escaped($email)."'";
		$result=query_r($sql);
		$row=mysqli_fetch_assoc($result);
		?>
		<div class="col-md-9">
        <div class="profile-content">
			<div class="tabPanel jumbotron">
			<p>	Name :&nbsp;&nbsp; <?php echo $row['fname']."&nbsp;&nbsp;&nbsp;&nbsp;".$row['lname'];?>
				<br>Email Id:&nbsp; <?php  echo $row['email']?>
				<br>Mobile No: &nbsp;&nbsp;<?php echo $row['mobile']?>
			</p>
			</div>
			<div class="tabPanel jumbotron">tba 2</div>
			<div class="tabPanel jumbotron">Tab 3:Content</div>
			<div class="tabPanel jumbotron">Tab 4:Content</div>
            </div>
		</div>
	</div>
</div>







<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
