<?php 
include("db.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require './vendor/autoload.php';

date_default_timezone_set("Asia/kolkata");

$err_msg="";

// $connection=mysqli_connect("localhost","root","","realProperty");

function query($query)
{
	global $connection;
	return mysqli_query($connection,$query);
}
function redirect($location)
{
	return header("Refresh:1 url={$location}");
}

function permission_redirect($location)
{
	return header("location:{$location}");
}

function fetch_array($result)
{
	return mysqli_fetch_assoc($result);
}

function confirmation($result){
	global $connection;
	if(!$result){
		die("Query Error".mysqli_error($connection));
	}
}

function escape($string)
{
	global $connection;
	return mysqli_real_escape_string($connection,$string);
}
	

function cleanHtml($string)
{
	return htmlentities($string);
}
// new and view message
function newMessage($message){
		if(!empty($message)){
			$_SESSION['message']=$message;
		}
		else{
			$message="";
		}	
}

function viewMessage(){
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

// checking for email address and username
function already_exists_email($email){

		$sql="SELECT * FROM users WHERE email='$email'";
		$result=query($sql);
		if(mysqli_num_rows($result)==1){
			return true;
		}else{
			return false;
		}		
}


// username
function already_exists_username($uname){

		$sql="SELECT * FROM users WHERE uname='$uname'";
		$result=query($sql);
		if(mysqli_num_rows($result)==1){
			return true;
		}else{
			return false;
		}		
}


	function valid_email($str) {
		return (!preg_match_all("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
		}
	function domain_exists($email, $record = 'MX'){
		list($user, $domain) = explode('@', $email);
		return checkdnsrr($domain, $record);
	}

function formValidate()
{
	$min_val=3;
	$max_val=15;
	$error_messages=[];

			if($_SERVER['REQUEST_METHOD'] == "POST"){

				$fname=cleanHtml($_POST['fname']);
				$lname=cleanHtml($_POST['lname']);
				$uname=cleanHtml($_POST['uname']);
				$pass=cleanHtml($_POST['pass']);
				$email=cleanHtml($_POST['email']);
				$mobile=cleanHtml($_POST['mobile']);
				$cpass=cleanHtml($_POST['cpass']);
			

			if(strlen($fname) <$min_val){
				$error_messages[]="First name has to be at least {$min_val} chareacters";
				}
			if(strlen($lname) <$min_val){
				$error_messages[]="last name has to be at least {$min_val} chareacters";
				}
			if(strlen($uname) <$min_val){
				$error_messages[]="user name has to be at least {$min_val} chareacters";
				}

				// for max val
			if(strlen($fname) >$max_val){
				$error_messages[]="First name has not more than {$max_val} chareacters";
				}
			if(strlen($lname) >$max_val){
				$error_messages[]="Last name has not more than {$max_val} chareacters";
				}

			if(strlen($uname) >$max_val){
				$error_messages[]="User name has not more than {$max_val} chareacters";
				}
			
			if($pass != $cpass){
					$error_messages[]="Confirm password not match.";
				 }
			if(already_exists_username($uname)){
					$error_messages[]="Username is already taken";
						}


					//email validation
			if(already_exists_email($email)){
				$error_messages[]="Email address is already taken";
				}
			if(!domain_exists($email)){
				$error_messages[]="Invalid Email";
			}
			 if(!valid_email($email)){
				$error_messages[]="Enter valid email address";
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
			register_user($fname,$lname,$uname,$email,$mobile,$pass);
			echo "<div class='alert alert-success'>You've successfully registered</div>";
			newMessage("<div class='alert alert-success'>You've successfully registered
			.Please check your email for activation link</div>");
			redirect('index.php');
		}
	}
}

// registration here

function register_user($fname,$lname,$uname,$email,$mobile,$pass){
		$fname=escape($fname);
		$lname=escape($lname);
		$email=escape($email);
		$mobile=escape($mobile);
		$pass=escape($pass);
		// $cpass=escape($cpass);

		if(already_exists_username($uname)){
			return false;
		}
		if(already_exists_email($email)){
			return false;
		}
		else{
			$pass=password_hash($pass,PASSWORD_BCRYPT,array('cost'=>12));
			$token=escape(md5($email,microtime()));
			$sql="INSERT INTO `users`(`userId`, `uname`, `fname`, `lname`, `email`, `mobile`, `token`, `pass`) VALUES (NULL,'$uname','$fname','$lname','$email','$mobile','$token','$pass')";
			$result=query($sql);
			confirmation($result);
			// $subject="Account activation link";
			// $message="
			// Thank you for registration your activation link is below..
			// http://localhost/login/activation.php?email=$email&token=$token
			// ";
			// $header="From: satishta038635@gmail.com";
			// mail($email,$subject,$message,$header);
			return true;
		}
}

//user activation function
// function activate_the_user(){
// 	if($_SERVER['REQUEST_METHOD']=="GET"){
// 		if(isset($_GET['email'])){
// 			 $user_email=cleanHtml($_GET['email']);
// 			 $user_token=cleanHtml($_GET['token']);
// 				$sql="SELECT * FROM users WHERE email='".escape($user_email)."' AND token='".escape($user_token)."'";
// 				// $sql="SELECT * FROM users WHERE email=$user_email AND token=$user_token";
// 				$result=query($sql);
// 				confirmation($result);
// 				if(mysqli_num_rows($result)==1){	
// 					// $sql2="UPDATE users SET token=0,activation_status=1 WHERE token='".escape($user_token)."' AND email='".escape($user_email)."'";
// 					$sql2="UPDATE users SET activation_status=1 WHERE token=$user_token AND email=$user_email";
// 					$result2=query($sql2);
// 					confirmation($result2);
// 					newMessage("<div class='alert alert-success'>Your account is successfully been activted</div>");
// 					redirect("login.php");
// 				}else{
// 					return false;
// 				} 
// 		}
// 	}
// }

// Login validation Function.
function login_validate(){
	$error_messages=[];

	if($_SERVER['REQUEST_METHOD']=="POST"){

		$email=cleanHtml($_POST['email']);
		$pass=cleanHtml($_POST['pass']);
		$remeber_me=isset($_POST['remeber_me']);


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
			if(loginuser($email,$pass,$remeber_me)){
				echo "<div class='alert alert-success'>You have successfully Logged in</div>";
				redirect("index.php");
			}
			else{
				echo "<div class='alert alert-danger'>Please check your password & email</div>";
			}
		}
	}
}

//  login function
function loginuser($email,$pass,$remeber_me){
	//$sql="SELECT * FROM users WHERE email='".escape($email)."' AND activation_status=1"; //for email verification
 $sql="SELECT * FROM users WHERE email='".escape($email)."'";
	$result=query($sql);
	if(mysqli_num_rows($result) == 1){
		$row=fetch_array($result);
		$db_password=$row['pass'];

		if(password_verify($pass,$db_password)){

			if($remeber_me == "on"){
				setcookie("Email",$email,time() + 86400);
			}
			$_SESSION['email']=$email;

			return true;
		}else{
			return false;
		}
	}
}
// checking login status
function isLoggedIn(){
	if(isset($_SESSION['email']) || isset($_COOKIE['Email'])){
		return true;
	}
	else{
		return false;
	}
} 



// send email function 
function sendemail($email=null,$subject=null,$message=null,$header=null){
	$mail=new PHPMailer();
	$mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'satishta038635@gmail.com';                     // SMTP username
    $mail->Password   = 'satish@campus1';                               // SMTP password
	// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
	$mail->SMTPSecure='tls';
	$mail->Port =587;                                    // TCP port to connect to

	$mail->setFrom("satishta038635@gmail.com","Satish Mishra");
	$mail->addAddress($email,$header);

	$mail->isHTML(true);
	$mail->subject=$subject;
	$mail->Body=$message;
	$mail->AltBody =$message;
	if(!$mail->send()){
    echo "<div class='alert alert-danger'>Message has not  been sent</div>";
	}else{
		echo "<div class='alert alert-success'>Reset link has been to your email</div>";
	}
		
}
//using username reset password

// function update_password_u(){
// 	if(isset($_POST['reset_pass'])){
// 		$username=cleanHtml($_POST['enter_username']);
// 		setcookie("TestCookie", $username);
// 		if(already_exists_username($username)){
// 			redirect("reset_password.php");
// 		}else{
// 				echo "<div class='alert alert-danger'>Username not matched</div>";
// 			}
// 	}
// }

//otp generate

function  otp_generate(){
	if(isset($_POST['reset_pass'])){
		$email=cleanHtml($_POST['enter_username']);
		setcookie("c_email",$email);
		$otp=rand(100000,999999);
		setcookie("otp_val",$otp);
		if(already_exists_email($email)){
			$header="From:Satish Mishra";
			$subject="OTP verification for reset password ";
			$message="your otp verification code is <br />".$otp;
			sendemail($email,$subject,$message,$header);
			redirect("otp_enter.php");	
		}
	}
}


?>