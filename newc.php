<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require './vendor/autoload.php';
   
    $msg10='';
    $pass='';
    
        if(isset($_POST['search']))
             {
                 $item=$_POST['searchbox'];
                  if($item==truck)
                   {
                       header('location:truck.php');
                   }
                   elseif($item==bungalow)
                    {
                        header("location:bungalows.php");
                    }
                    
                   elseif($item==banquet)
                   {
                       header("location:banquet.php");
                   }
                   
                   elseif($item==flat)
                    {
                        header("location:flat.php");
                    }
                }



    if(isset($_POST['submit']))
     {

         $name=$_POST['fname'];
         $mobile=$_POST['mob'];
         $email=$_POST['mail'];
         $pass=$_POST['pass'];
         $message=$_POST['sms'];
         

      // send email function 

	$mail=new PHPMailer();
	$mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $email;                    // SMTP username
    $mail->Password   = $pass;                               // SMTP password
	// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
	$mail->SMTPSecure='tls';
	$mail->Port =587;                                    // TCP port to connect to

	$mail->setFrom($email,$name);
	$mail->addAddress('sufiyanshamim337@gmail.com');

    $mail->isHTML(true);
    $mail->header=$name;
	$mail->subject='Feedback from customer';
    $mail->Body="
                 Mobile No: $mobile<br><br>
                 Message :           $message<br>";
	$mail->AltBody =$message;




       $secretkey ="6LfTqN8UAAAAAIuDgXpi3AlSe5Ob2GVETZplTZV6";
       $responsekey = $_POST['g-recaptcha-response'];
       $userip = $_SERVER['REMOTE_ADDR'];
       $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responsekey&remoteip=$userip";

       if(!$mail->send())
        {
             $msg10="<div class='error'>Message could not be sent !</div>";

        }
        else
         {
            $msg10="<div class='success'>Message has been sent !</div>";
            
         }
   }

        //  for customer image

        if(isset($_COOKIE['ename'])) 
        {
         $email=$_COOKIE['ename'];
       $result=mysqli_query($con,"SELECT id,first_name,last_name,image FROM users WHERE mail='$email'");
       $retrive=mysqli_fetch_array($result);
       $id=$retrive['id'];
       $firstname=$retrive['first_name'];
       $image=$retrive['image'];
        }
         elseif(isset($_SESSION['mail']))
         {
         $email=$_SESSION['mail'];
         $result=mysqli_query($con,"SELECT id,first_name,last_name,image FROM users WHERE mail='$email'");
         $retrive=mysqli_fetch_array($result);
         $id=$retrive['id'];
         $firstname=$retrive['first_name'];
         $image=$retrive['image'];
         }
?>




<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel="stylesheet" href="jqueryui/jquery-ui.css">
    <link rel="stylesheet" href="jqueryui/jquery-ui.structure.css">
    <link rel="stylesheet" href="jqueryui/jquery-ui.theme.css">
<link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<title>Contact Us</title>
<style type='text/css'>
#body-bg{
          background:url('') center no-repeat fixed; 

         }
.error{
         color:red;
         
       }
.success
        {
          color:green;
          font-weight:bold;
        }       

        .dropdown:hover>.dropdown-menu
{
  display:block;
  
}
.dropdown-item:hover
{
    background-color:#566573;
}

</style>
</head>
<body id='body-bg'>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      
        <a href="#" class="navbar-brand" style="font-size: 35px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
             <img src="working_image\company_logo.jpg"   width="60" > rental.<span style="font-size: 25px;">in</span>
       </a>
       <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
             <span class="navbar-toggler-icon"></span> 
             </button>
 
        <div class="collapse navbar-collapse" id="menu">
        <?php if(isset($_SESSION['mail']) || isset($_SESSION['mail']))
              {
                     ?>
                <img src='users_image/<?php echo $image ?>'  width="50" height="50" class="rounded" style="margin-left:100px; margin-right:10px; border:2px solid white;">
                <h5 style="color:white;  margin-top:10px;">Hello,&nbsp<?php echo ucfirst($firstname);?></h5>
<?php              }
       
       ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle"data-toggle="dropdown">Services</a>
             <div class="dropdown-menu navbar-dark bg-dark">
             <a href="bungalows.php" class="dropdown-item" style="color:white;">Bungalow</a>
             <a href="flat.php" class="dropdown-item" style="color:white;">Flat</a>
             <a href="banquet.php" class="dropdown-item" style="color:white;">Banquet Hall</a>
             <a href="truck.php" class="dropdown-item" style="color:white;">Truck</a> 
            </div>
            </li> 
            <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li> 
            <li class="nav-item"><a href="help.php" class="nav-link">Help</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li> 
            <?php
      if(isset($_SESSION['ename']) || isset($_SESSION['mail']))
      {
        
     ?>
           <li class="nav-item"><a href="change-password.php?id=<?php echo $id;?>" class="nav-link">Change Password</a></li> 
     <?php
      }
       else
             {
                 ?>
                <li class="nav-item"><a href="login.php" class="nav-link">Sign In&nbsp&nbsp&nbsp&nbsp</a></li> 
             <?php
             }
             ?>
        </ul>
        </div>
        <form class="form-inline my-2 my-lg-0" method="post">
            <input  type="text"  id="item" class="form-control mr-sm-2"   name="searchbox" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" name="search">Search</button>
    </form>
      </nav>
 
<div class='container'>
<div class='login-form col-md-4 offset-md-4'>
 <div class='jumbotron' style='margin-top:20px; padding-top:20px;padding-bottom:30px;'>
 <h3 align='center'>Contact Us</h3></br>
 <center><?php echo $msg10; ?></center></br>
 <form method='post' enctype='multipart/form-data'>
    <div class='form-group'> 
    <label>Full Name :</label>
    <input type='text' name='fname' placeholder='Enter Your Full Name' class='form-control' required>
    </div>
    <div class='form-group'> 
    <label>Mobile No :</label>
    <input type='text' name='mob' placeholder='Enter Your Mobile No.' class='form-control' required>
    </div>
    <div class='form-group'> 
    <label>Email Address :</label>
    <input type='email' name='mail' placeholder='Enter Your Email Address' class='form-control' required>
    </div>
    <div class='form-group'> 
    <label>Password :</label>
    <input type='password' name='pass' placeholder='Enter Your Email Password' class='form-control' required>
    </div>
    <div class='form-group'> 
    <textarea name='sms' placeholder='Enter Your Message' class='form-control' style='height:80px;' required></textarea>
    </div>
    <div class="g-recaptcha" data-sitekey="6LfTqN8UAAAAAObAuW2BC2z7aNjAnmSufANykfjW" style="margin:30px -13px;">
    </div>
    <center><button type='submit' name='submit' class='btn btn-outline-primary' style='width: 200px;'>Send Message</button></center></br></br>
    <center><button class='btn btn-link' ><a href='index.php' style="font-weight:bold; color:red;">Back to Home</a></button></center>
</form>  
 </div>
 </div>
 </div>
<!-- <p>footer starts from here</p> -->

<footer class="footer-property" style="background: black;">
    <div class="footer-left">
    <img src="working_image/company_logo.jpg" style="width: 60px;">
        <h3>About<span>rental.</span><span style="font-size: 30px;">in</span></h3>
    
        <p class="footer-links">
            <a href="index.php">Home</a>
            |
            <a href="#">Blog</a>
            |
            <a href="about.php">About</a>
            |
            <a href="contact.php">Contact</a>
        </p>
    
        <p class="footer-company-name">© 2020 rental.in Pvt. Ltd.</p>
    </div>
    
    <div class="footer-center">
        <div>
            <i class="fa fa-map-marker"></i>
              <p><span></span>
                SaltLake, Kolkata - 700 007</p>
        </div>
    
        <div>
            <i class="fa fa-phone"></i>
            <p>022-022-7070</p>
        </div>
        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="https://sabkuchbhadese.000webhostapp.com">sabkuchbhadese.com</a></p>
        </div>
    </div>
    <div class="footer-right">
        <p class="footer-company-about">
            <span style='margin-top:20px;'>About the company</span>
            We provide things on rent service through online to the direct customer at affordable price.</p>
        <div class="footer-icons">
        <a href="https://www.facebook.com/sufiyan.shimim" class="eff"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/SufiyanShamim?s=09" class="eff"><i class="fa fa-twitter"></i></a>
            <a href="https://www.instagram.com/iamsufiyan007/" class="eff"><i class="fa fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/sufiyan-shamim-b9652018b" class="eff"><i class="fa fa-linkedin"></i></a>
            <a href="https://youtu.be/9Y6H0quRfew" class="eff"><i class="fa fa-youtube"></i></a>
        </div>
    </div>
    <?php
         if(isset($_SESSION['mail']) || isset($_SESSION['ename']))
          {
              ?>
            <center><a href="logout.php"> <button class="btn btn-outline-primary" style="width:300px;">Sign Out</button></a></center>
         <?php }

?>
    </footer>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
 </body>
 <script src="js/jquery.js"></script>
<script src="jqueryui/jquery-ui.js"></script>

    <script>
var items = ["truck","bungalow","banquet","flat"];

$("#item").autocomplete(
    { 
      source: items
    },{
        autoFocus:true,
        delay:0,
        minLength:1
    });


   </script>
 </html>