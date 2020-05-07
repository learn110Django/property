<?php

include('includes/db.php');
function query_r($query)
{
	global $connection;
	return mysqli_query($connection,$query);
}

function escaped($string)
{
	global $connection;
	return mysqli_real_escape_string($connection,$string);
}

function cleanHtml1($string)
{
	return htmlentities($string);
}



function confirmation1($result){
	global $connection;
	if(!$result){
		die("Query Error".mysqli_error($connection));
	}
}


// checking for email address OR username
function already_exists_mail($email){

	$sql="SELECT * FROM registeradmin WHERE email='$email'";
	$result=query_r($sql);
	if(mysqli_num_rows($result)==1){
		return true;
	}else{
		return false;
	}		
}


// username
function already_exists_uname($uname){

	$sql="SELECT * FROM registeradmin WHERE username='$uname'";
	$result=query_r($sql);
	if(mysqli_num_rows($result)==1){
		return true;
	}else{
		return false;
	}		
}


function already_exists_email($email){

	$sql="SELECT * FROM users WHERE email='$email'";
	$result=query_r($sql);
	if(mysqli_num_rows($result)==1){
		return true;
	}else{
		return false;
	}		
}


// username
function already_exists_username($uname){

	$sql="SELECT * FROM users WHERE uname='$uname'";
	$result=query_r($sql);
	if(mysqli_num_rows($result)==1){
		return true;
	}else{
		return false;
	}		
}

function Validate()
{
	$min_val=3;
	$passlen=8;
	$max_val=15;
	$error_messages=[];

			if($_SERVER['REQUEST_METHOD'] == "POST"){

				$uname = $_POST['username'];
			    $email = $_POST['email'];
			    $pass = $_POST['password'];
			    $cpass = $_POST['confirmpassword'];
						
			if(strlen($uname) <$min_val){
				$error_messages[]="user name has to be at least {$min_val} chareacters";
				}

			if(strlen($uname) >$max_val){
				$error_messages[]="User name has not more than {$max_val} chareacters";
				}
			
				if(strlen($pass) <$passlen){
					$error_messages[]="Password should minimum  {$passlen} chareacters";
					}
			
			if($pass != $cpass){
					$error_messages[]="Confirm password not match.";
				 }
			if(already_exists_uname($uname)){
					$error_messages[]="Username is already taken";
						}


					//email validation
			if(already_exists_mail($email)){
				$error_messages[]="Email address is already taken";
				}
			
			

			 if(!empty($error_messages)){
				foreach ($error_messages as $error) {
					echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
		  <strong>warning:</strong>$error
		    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		    <span aria-hidden='true'>&times;</span>
		  </button>
		</div>";
				}

			}
		else{
			registeradmin($uname,$email,$pass);
			echo "<div class='alert alert-success'>You've successfully registered Now <a href='login.php'>Login</a></div>";
		}
	}
}

// registration here

function registeradmin($uname,$email,$pass){
		
		$uname=escaped($uname);
		$email=escaped($email);
		$pass=escaped($pass);
		
		if(already_exists_uname($uname)){
			return false;
		}
		if(already_exists_mail($email)){
			return false;
		}
		else{
			$pass=password_hash($pass,PASSWORD_BCRYPT,array('cost'=>12));
			$sql="INSERT INTO `registeradmin`(`admin_id`, `username`, `email`, `password`) VALUES (NULL,'$uname','$email','$pass')";
			$result=query_r($sql);
			confirmation1($result);
			return true;
		}
}


// Login validation Function.
function login_validate(){
	$error_messages=[];

	if($_SERVER['REQUEST_METHOD']=="POST"){

		$email=cleanHtml1($_POST['email']);
		$pass=cleanHtml1($_POST['password']);


		if(empty($email)){
			$error_messages[]="Email field can't be empty";
		}
		if(empty($pass)){
			$error_messages[]="password field can't be empty";
		}
		if(!empty($error_messages)){
			foreach($error_messages as $error){
				echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
				<strong>warning:</strong>$error
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				  <span aria-hidden='true'>&times;</span>
				</button>
			  </div>"; 
			}
		}else{
			if(loginadmin($email,$pass)){
				echo "<div class='alert alert-success'>You have successfully Logged in</div> 
				<script> location.href='index.php'</script>
				";
			}
			else{
				echo "<div class='alert alert-danger'>Please check your password & email</div>";
			}
		}
	}
}

//  login function
function loginadmin($email,$pass){
 $sql="SELECT * FROM registeradmin WHERE email='".escaped($email)."'";
	$result=query_r($sql);
	if(mysqli_num_rows($result) == 1){
		$row=mysqli_fetch_assoc($result);
		$db_password=$row['password'];
		if(password_verify($pass,$db_password)){
			$_SESSION['email']=$email;
			
			return true;
		}else{
			return false;
		}
	}
}


// resale property
function editresale(){
	if(isset($_POST['editresale'])){

		$rid=$_POST['resale_id'];
		$ramount=$_POST['price'];
		$age_cons=$_POST['age_cons'];
		$psize=$_POST['size'];
		$add1=$_POST['add1'];
		$add2=$_POST['add2'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$pin=$_POST['pin'];

		
		$sql1="SELECT * FROM resaleproperty WHERE resale_id='$rid'";
		$res=query_r($sql1);
		confirmation1($res);
		$row=mysqli_fetch_all($res,MYSQLI_ASSOC);
		foreach($row as $rows){

		if(empty($ramount)){
		$ramount=$rows['resale_amount'];
		}
		if(empty($age_cons)){
		$age_cons=$rows['age_cons'];
		}
		if(empty($size)){
		$psize=$rows['property_size'];
		}
		if(empty($add1)){
		$add1=$rows['add1'];
		}
		if(empty($add2)){
		$add2=$rows['add2'];
		}
		if(empty($city)){
		$city=$rows['city'];
		}
		if(empty($state)){
		$state=$rows['state'];
		}
		if(empty($pin)){
		$pin=$rows['zip'];
		}
	}
	
		$sql="UPDATE `resaleproperty` SET  `resale_amount`='$ramount' , `age_cons`='$age_cons', `property_size`='$psize' , `add1`='$add1', `add2`='$add2' , `city`='$city',`state`='$state',`zip`='$pin' WHERE `resale_id`='$rid'";
		$result=query_r($sql);
		confirmation1($result);
		echo "<div class='alert alert-success'>Updated successfully</div>";
	}
}


function remove_property(){
	if(isset($_POST['remove'])){
		$rid=$_POST['resale_id'];
		$sql="DELETE FROM `resaleproperty` WHERE resale_id='$rid' ";
		$result=query_r($sql);
		confirmation1($result);
		echo "<div class='alert alert-success'>Deleted successfully</div>";
	}
}


function editrent(){
	if(isset($_POST['editrent'])){

		$rid=$_POST['rental_id'];
		$damount=$_POST['deposite'];
		$mothly_rent=$_POST['rent'];
		$age_cons=$_POST['age_cons'];
		$psize=$_POST['size'];
		$add1=$_POST['add1'];
		$add2=$_POST['add2'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$pin=$_POST['pin'];

		
		$sql1="SELECT * FROM rentproperty WHERE rental_id='$rid'";
		$res=query_r($sql1);
		confirmation1($res);
		$row=mysqli_fetch_all($res,MYSQLI_ASSOC);
		foreach($row as $rows){

		if(empty($damount)){
		$damount=$rows['deposite_amount'];
		}
		if(empty($mothly_rent)){
			$mothly_rent=$rows['monthly_rent'];
			}
		if(empty($age_cons)){
		$age_cons=$rows['age_cons'];
		}
		if(empty($size)){
		$psize=$rows['property_size'];
		}
		if(empty($add1)){
		$add1=$rows['add1'];
		}
		if(empty($add2)){
		$add2=$rows['add2'];
		}
		if(empty($city)){
		$city=$rows['city'];
		}
		if(empty($state)){
		$state=$rows['state'];
		}
		if(empty($pin)){
		$pin=$rows['zip'];
		}
	}
	
		$sql="UPDATE `rentproperty` SET  `deposite_amount`='$damount',`monthly_rent`='$mothly_rent' , `age_cons`='$age_cons', `property_size`='$psize' , `add1`='$add1', `add2`='$add2' , `city`='$city',`state`='$state',`zip`='$pin' WHERE `rental_id`='$rid'";
		$result=query_r($sql);
		confirmation1($result);
		echo "<div class='alert alert-success'>Updated successfully</div>";
	}
}

function remover_property(){
	if(isset($_POST['remove1'])){
		$rid=$_POST['rental_id'];
		$sql="DELETE FROM `rentproperty` WHERE rental_id='$rid' ";
		$result=query_r($sql);
		confirmation1($result);
		echo "<div class='alert alert-success'>Deleted successfully</div>";
	}
}


// update users table

function edituser(){
	if(isset($_POST['edituser'])){

		$uid=$_POST['user_id'];
		$uname=$_POST['uname'];
		$lname=$_POST['lname'];
		$fname=$_POST['fname'];
		$email=$_POST['email'];
		$mob=$_POST['mob'];
		
		$sql1="SELECT * FROM users WHERE userId='$uid'";
		$res=query_r($sql1);
		confirmation1($res);
		$row=mysqli_fetch_all($res,MYSQLI_ASSOC);
		foreach($row as $rows){

		if(empty($uname)){
		$uname=$rows['uname'];
		}
		if(empty($fname)){
			$fname=$rows['fname'];
			}
		if(empty($lname)){
		$lname=$rows['lname'];
		}
		if(empty($email)){
		$email=$rows['email'];
		}
		if(empty($mob)){
			$mob=$rows['mobile'];
			}
	}
	
	if(already_exists_email($email)){
		echo "<div class='alert alert-warning'>Email not updated</div>";
	}
	if(already_exists_uname($uname)){
		echo "<div class='alert alert-warning'>username not updated </div>";
	}
		$sql="UPDATE `users` SET `uname`='$uname',`fname`='$fname',`lname`='$lname',`email`='$email',`mobile`='$mob' WHERE `userId`='$uid'";
		$result=query_r($sql);
		confirmation1($result);
		$sql1="UPDATE `coinrecord` SET `username`='$uname'";
		$result1=query_r($sql1);
		confirmation1($result1);
	}

}

function remove_user(){
	if(isset($_POST['remove2'])){
		$uid=$_POST['user_id'];

		$sql2="SELECT uname FROM users WHERE userId='$uid'";
		$result2=query_r($sql2);
		confirmation1($result2);
		$row=mysqli_fetch_assoc($result2);
		$username=$row['uname'];

		$sql="DELETE FROM `users` WHERE userId='$uid' ";
		$result=query_r($sql);
		confirmation1($result);
		// echo "<div class='alert alert-danger'> $username</div>";
		
		$sql1="DELETE FROM `coinrecord` WHERE username='$username'";
		$result1=query_r($sql1);
		confirmation1($result1);
		echo "<div class='alert alert-success'>Deleted successfully</div>";
	}
}
?>

