	
<?php
include 'db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require './vendor/autoload.php';
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



function already_exists_uid($uname){

	$sql="SELECT * FROM users WHERE uname='$uname'";
	$result=query_r($sql);
	if(mysqli_num_rows($result)==1){
		return true;
	}else{
		return false;
	}		
}

// checking for email address and username
function already_exists_mail($email){

	$sql="SELECT * FROM users WHERE email='$email'";
	$result=query_r($sql);
	if(mysqli_num_rows($result)==1){
		return true;
	}else{
		return false;
	}		
}

//rent..
function formValidater()
{

	$min_val=10;
	$max_val=40;
	$error_messages=[];

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$D_amount=cleanHtml1($_POST['D_amount']);
				$R_month=cleanHtml1($_POST['R_month']);
				$Age_cons=cleanHtml1($_POST['Age_cons']);
				$size_=cleanHtml1($_POST['size_']);
				$add1=cleanHtml1($_POST['add1']);
				$add2=cleanHtml1($_POST['add2']);
				$city=cleanHtml1($_POST['city']);
				$state=cleanHtml1($_POST['state']);
				$zip=cleanHtml1($_POST['zip']);
				$image=$_FILES['image']['name'];
				$tmp_image=$_FILES['image']['tmp_name'];
				$size_image=$_FILES['image']['size'];

			if(strlen($add1) <$min_val){
				$error_messages[]="address line 1 has to be at least {$min_val} chareacters";
				}
			if(strlen($add2) <$min_val){
				$error_messages[]="address line 2 has to be at least {$min_val} chareacters";
				}
			
				if ($image=='') 
   			 {
    		  echo "<div class='alert alert-danger'>Please upload your profile image</div>";
    		}
    		if ($size_image>1000000) 
    		{
    		  echo "<div class='alert alert-danger'>Please upload Image less than 1 MB</div>";
   			 }
				// for max val
			if(strlen($add1) >$max_val){
				$error_messages[]="address line 1 has not more than {$max_val} chareacters";
				}
				
		    if(strlen($city) >50){
					$error_messages[]="city name has to be at least 50 chareacters";
				}
			if(strlen($state) >50){
						$error_messages[]="city name has to be at least 50 chareacters";
					}
			if(strlen($add2) >$max_val){
				$error_messages[]="address line 2 has not more than {$max_val} chareacters";
				}

				if(!empty($error_messages)){
					foreach ($error_messages as $error) {
						echo "<div class='alert alert-warning'>
			  <strong>warning:</strong>$error
			</div>";
					}
	
				}
				if(rentProperty() == false){
					echo "<div class='alert alert-info'>You account balance is zero <a href='checkout.php'>Click Here to recharge </a></div>";
				}
			else{
				echo "<div class='alert alert-success'>Uploaded successfully</div>";
				
			}
	}
}

// rent upload property 
function rentProperty(){
	
	if(isset($_POST['r_upload'])){
		

		$uid=$_POST['uid'];
		$sql="SELECT uname FROM users WHERE uname='$uid'";
		$result=query_r($sql);
		$row=mysqli_fetch_assoc($result);
		 $userid=$row['uname'];
		if(already_exists_uid($uid)){
		$D_amount=$_POST['D_amount'];
		$R_month=$_POST['R_month'];
		$Age_cons=$_POST['Age_cons'];
		$size_=$_POST['size_'];
		$add1=$_POST['add1'];
		$add2=$_POST['add2'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$zip=$_POST['zip'];
		
		$image=$_FILES['image']['name'];
		$tmp_image=$_FILES['image']['tmp_name'];
		$size_image=$_FILES['image']['size'];
		$img_ext=explode(".",$image);
        $image_ext=$img_ext['1'];
        $image=rand(1,100).rand(1,100).time().".".$image_ext;
        if($image_ext=='jpg' || $image_ext=='png' || $image_ext=='jpeg' || $image_ext=='JPG' || $image_ext=='PNG' || $image_ext=='JPEG')
         { 
		move_uploaded_file($tmp_image,"uploadRent/$image");
		$sqlcheck="SELECT coin FROM coinrecord WHERE username='$uid'";
		$res=query_r($sqlcheck);
		confirmation1($res);
		$data=mysqli_fetch_assoc($res);
		
		if($data['coin']>0){
		$sql="INSERT INTO `rentproperty`(`rental_id`, `deposite_amount`, `monthly_rent`, `age_cons`, `property_size`, `add1`, `add2`, `city`, `state`, `zip`,`picture`,`uid`) 
		VALUES(NULL,'$D_amount','$R_month','$Age_cons','$size_','$add1','$add2','$city','$state','$zip','$image','$userid')";
		$result=query_r($sql);
		confirmation1($result);

		$sqlcoin="UPDATE `coinrecord` SET `coin`=coin-20 WHERE username='$uid'";
		$resultcoin=query_r($sqlcoin);
		confirmation1($resultcoin);
		return true;
		
		}
		

		 }else{
			 echo "<div class='alert alert-danger'>Please Upload a Image file</div>";
		 }

	}
	else{
		echo "
			<div class='alert alert-warning'>Enter a valid userId</div>
			<div class='alert alert-info'>New user <a href='login/register.php'>register here</a></div>
		";
	}
}
	return false;
}

//resale

function formvalidate1(){
	$min_val=10;
	$max_val=40;
	$error_messages=[];

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				
				$resale_amount=cleanHtml1($_POST['resale_amount']);
				$Age_cons=cleanHtml1($_POST['Age_cons']);
				$size_=cleanHtml1($_POST['size_']);
				$add1=cleanHtml1($_POST['add1']);
				$add2=cleanHtml1($_POST['add2']);
				$city=cleanHtml1($_POST['city']);
				$state=cleanHtml1($_POST['state']);
				$zip=cleanHtml1($_POST['zip']);
				$image=$_FILES['image']['name'];
				$tmp_image=$_FILES['image']['tmp_name'];
				$size_image=$_FILES['image']['size'];
			

			if(strlen($add1) <$min_val){
				$error_messages[]="address line 1 has to be at least {$min_val} chareacters";
				}
			if(strlen($add2) <$min_val){
				$error_messages[]="address line 2 has to be at least {$min_val} chareacters";
				}
				if ($image=='') 
   			 {
    		  echo "<div class='alert alert-danger'>Please upload your profile image</div>";
    		}
    		if ($size_image>1000000) 
    		{
    		  echo "<div class='alert alert-danger'>Please upload Image less than 1 MB</div>";
   			 }

				// for max val
			if(strlen($add1) >$max_val){
				$error_messages[]="address line 1 has not more than {$max_val} chareacters";
				}
				
		    if(strlen($city) >50){
					$error_messages[]="city name has to be at least 50 chareacters";
				}
			if(strlen($state) >50){
						$error_messages[]="city name has to be at least 50 chareacters";
					}
			if(strlen($add2) >$max_val){
				$error_messages[]="address line 2 has not more than {$max_val} chareacters";
				}

				if(!empty($error_messages)){
					foreach ($error_messages as $error) {
						echo "<div class='alert alert-warning'>
			  <strong>warning:</strong>$error
			</div>";
					}
	
				}
			
				if(resaleProperty() == false){
					echo "<div class='alert alert-info'>You account balance is zero <a href='book.php'>Click Here to recharge </a></div>";

				}
				else{
				echo "<div class='alert alert-success'>Uploaded successfully</div>";
			}
	}
}



//resale
function resaleProperty(){
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$uid=$_POST['uid'];
		setcookie("userPay",$uid);
		$sql="SELECT uname FROM users WHERE uname='$uid'";
		$result=query_r($sql);
		$row=mysqli_fetch_assoc($result);
		 $userid=$row['uname'];
		if(already_exists_uid($uid)){
		$resale_amount=$_POST['resale_amount'];
		$Age_cons=$_POST['Age_cons'];
		$size_=$_POST['size_'];
		$add1=$_POST['add1'];
		$add2=$_POST['add2'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$zip=$_POST['zip'];
		
		$image=$_FILES['image']['name'];
		$tmp_image=$_FILES['image']['tmp_name'];
		$size_image=$_FILES['image']['size'];
		$img_ext=explode(".",$image);
        $image_ext=$img_ext['1'];
		$image=rand(1,100).rand(1,100).time().".".$image_ext;
		
			

        if($image_ext=='jpg' || $image_ext=='png' || $image_ext=='jpeg' || $image_ext=='JPG' || $image_ext=='PNG' || $image_ext=='JPEG')
         { 
		move_uploaded_file($tmp_image,"uploadResale/$image");
		$sqlcheck="SELECT coin FROM coinrecord WHERE username='$uid'";
		$res=query_r($sqlcheck);
		confirmation1($res);
		$data=mysqli_fetch_assoc($res);
		
		if($data['coin']>0){
		$sql="INSERT INTO `resaleproperty`(`resale_id`, `resale_amount`, `age_cons`, `property_size`, `add1`, `add2`, `city`, `state`, `zip`,`picture`,`uid`) 
		VALUES(NULL,'$resale_amount','$Age_cons','$size_','$add1','$add2','$city','$state','$zip','$image','$userid')";
		$result=query_r($sql);
		confirmation1($result);
		
		$sqlcoin="UPDATE `coinrecord` SET `coin`=coin-20 WHERE username='$uid'";
		$resultcoin=query_r($sqlcoin);
		confirmation1($resultcoin);

		
		return true;
		}
		}else{
			echo "<div class='alert alert-danger'>Please Upload a Image file</div>";
		}
	}else{
			echo "
				<div class='alert alert-warning'>Enter a valid userId</div>
				<div class='alert alert-info'>New user <a href='register.php'>register here</a></div>
			";
	}
 }
return false;
}


function sendinvoice($email=null,$subject=null,$message=null,$header=null){
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

		echo "<div class='alert alert-success'>property detail send on your registerd email</div>";
	}
		
}

//Booking section 


function formvalidateBuy(){
	$min_val=3;
	$max_val=40;
	$error_messages=[];
			if($_SERVER['REQUEST_METHOD'] == "POST"){

				$name=$_POST['InputName'];
				$email=$_POST['InputEmail'];
				$number=$_POST['InputNumber'];

			if(strlen($name) <$min_val){
				$error_messages[]="Name minimum  {$min_val} chareacters";
				}
			if(strlen($name) >$max_val){
				$error_messages[]="Maximum {$max_val} chareacters allow in name area";
				}
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$error_messages[]= "$email is not a valid email address";
				  }
				if(!empty($error_messages)){
					foreach ($error_messages as $error) {
						echo "<div class='alert alert-warning'>
			  <strong>warning:</strong>$error
			</div>";
					}
	
				}
				if(rentBuyer() == false){
					echo "<div class='alert alert-info text-center' style='color:#000;font-size:20px;'>Email not register&nbsp;<a href='login/register.php' style='color:#000;font-size:20px;'>Click to </a></div>";
				}
	}
}
function rentBuyer(){
	if(isset($_POST['buyerData'])){
		$name=$_POST['InputName'];
		$email=$_POST['InputEmail'];
		$mobile=$_POST['InputNumber'];
		$resaleId=$_COOKIE['resale'];

		$sql="SELECT resale_id FROM `buyerdetail` WHERE resale_id='$resaleId'";
		$res=query_r($sql);
		$rec=mysqli_fetch_assoc($res);
		if($rec>0)
 			 {?>
            <script>
             alert('Sorry, This product already booked !');
			 window.open('index.php','_self');
             </script>
			<?php  }
			else{
		if(already_exists_mail($email))
		{
		$sql="INSERT INTO `buyerdetail`(`buyerId`, `email`, `Name`, `phone`,`resale_id`)
		 VALUES (NULL,'$email','$name','$mobile','$resaleId')";
		$result=query_r($sql);
		confirmation1($result);
			$subject="Invoice of proeperty rent";
			$message="<table>
		<h2></h2>
		";
			$userid=$_COOKIE['ownerrent'];
			$sql="SELECT fname,lname,email,mobile FROM users WHERE  uname='$userid'";
			$result=query_r($sql);
			$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
			foreach($row as  $rows){
					 $message.="<tr>";
					$message.="<th>Name</th>
					<th></th>
				<th>Mobile No</th>
				<th>Email</th>
			</tr>";

			$message.="<tr>";
			$message .= "<td>".$rows['fname']."</td>";
			$message .= "<td>".$rows['lname']."</td>";
			 $message .= "<td>".$rows['mobile']."</td>";
			$message .= "<td>".$rows['email']."</td>";
			$message.="</tr>";
			}
		 $message.="</table>";

			$header="FROM:easyrenthome.com";
			sendinvoice($email,$subject,$message,$header);
		}
			$sql="UPDATE `rentproperty` SET `flag`='booked' WHERE rental_id='$resaleId'";
			$result=query_r($sql);
		
	
		unset($_COOKIE['ownerrent']);
		
		return true;
		}
	}
	return false;
}



function formvalidateBuy1(){
	$min_val=3;
	$max_val=40;
	$error_messages=[];
			if($_SERVER['REQUEST_METHOD'] == "POST"){

				$name=$_POST['InputName'];
				$email=$_POST['InputEmail'];
				$number=$_POST['InputNumber'];

			if(strlen($name) <$min_val){
				$error_messages[]="Name minimum  {$min_val} chareacters";
				}
			if(strlen($name) >$max_val){
				$error_messages[]="Maximum {$max_val} chareacters allow in name area";
				}
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$error_messages[]= "$email is not a valid email address";
				  }
				if(!empty($error_messages)){
					foreach ($error_messages as $error) {
						echo "<div class='alert alert-warning'>
			  <strong>warning:</strong>$error
			</div>";
					}
	
				}
				if(resaleBuyer() == false){
					echo "<div class='alert alert-info text-center' style='color:#000;font-size:20px;'>Email not register&nbsp;<a href='login/register.php' style='color:#000;font-size:20px;'>Click to register</a></div>";
				}
	}
}
function resaleBuyer(){
	if(isset($_POST['resaleBuy'])){
		$name=$_POST['InputName'];
		$email=$_POST['InputEmail'];
		$mobile=$_POST['InputNumber'];
		$resaleId=$_COOKIE['resalebuy'];
	
		$sql="SELECT resale_id FROM `buyeresale` WHERE resale_id='$resaleId'";
		$res=query_r($sql);
		$rec=mysqli_fetch_assoc($res);
		if($rec>0)
 			 {?>
            <script>
             alert('Sorry, This product already booked !');
			 window.open('index.php','_self');
             </script>
			<?php  }
			else{
		if(already_exists_mail($email)){
		$sql="INSERT INTO `buyeresale`(`buyerId`, `email`, `name`, `phone`,`resale_id`)
		 VALUES (NULL,'$email','$name','$mobile','$resaleId')";
		$result=query_r($sql);
		confirmation1($result);
		$subject="Rent property detail";

	 $message="<table>
		<h2></h2>
		";
		$userid=$_COOKIE['ownerre'];
			$sql="SELECT fname,lname,email,mobile FROM users WHERE  uname='$userid'";
			$result=query_r($sql);
			$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
			foreach($row as  $rows){
					 $message.="<tr>";
					$message.="<th>Name</th>
					<th></th>
				<th>Mobile No</th>
				<th>Email</th>
			</tr>";

			$message.="<tr>";
			$message .= "<td>".$rows['fname']."</td>";
			$message .= "<td>".$rows['lname']."</td>";
			 $message .= "<td>".$rows['mobile']."</td>";
			$message .= "<td>".$rows['email']."</td>";
			$message.="</tr>";
			}
		 $message.="</table>";

			$header="FROM:easyrenthome.com";
			sendinvoice($email,$subject,$message,$header);
		}
			$sql="UPDATE `resaleproperty` SET `flag`='booked' WHERE resale_id='$resaleId'";
			$result=query_r($sql);
		
		unset($_COOKIE['resalebuy']);
		unset($_COOKIE['ownerre']);
		
		return true;
		}
	}
	return false;
}

function payment(){
	$check='';$recharge='';
if(isset($_COOKIE['userPay'])){
	if(isset($_POST['done'])){
		$user=$_COOKIE['userPay'].'<br>';
		$card=$_POST['card'];
	    $amt=$_POST['TXN_AMOUNT'].'<br>';
		$year=$_POST['year'].'<br>';
		$month=$_POST['Month'].'<br>';
		 $cvv=$_POST['cvv'].'<br>';
			
		 if($card == 7896321445211254 and $cvv == 887 and $year == 26 and $month == 2)
		 {
			 $recharge=(int)$amt/100;
			 $add=(int)$recharge*60;
			 $sql="UPDATE `coinrecord` SET `coin`='$add' WHERE username='".$_COOKIE['userPay']."'";
			 $res=query_r($sql);

		 }
	}
}else{
	echo "<script>location.href='index.php'</script>";
}
unset($_COOKIE['userPay']);
}



?>

