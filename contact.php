<?php 
 include 'includes/controller.php';
include 'header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require './vendor/autoload.php';

$msg10='';
$pass='';

if(isset($_POST['send']))
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
$mail->addAddress('satishta038635@gmail.com');

$mail->isHTML(true);
$mail->header=$name;
$mail->subject='Feedback from customer';
$mail->Body="
             Mobile No: $mobile<br><br>
             Message :  $message<br>";
$mail->AltBody =$message;




//    $secretkey ="6LfTqN8UAAAAAIuDgXpi3AlSe5Ob2GVETZplTZV6";
//    $responsekey = $_POST['g-recaptcha-response'];
//    $userip = $_SERVER['REMOTE_ADDR'];
//    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responsekey&remoteip=$userip";

   if(!$mail->send())
    {
         $msg10="<div class='error'>Message could not be sent !</div>";

    }
    else
     {
        $msg10="<div class='success'>Message has been sent !</div>";
        
     }
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
<!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
<title>Contact Us</title>
<style type='text/css'>
body{
    line-height: 24px;
    font-size: 15px;
    font-family: Poppins, "Open Sans", sans-serif;
    
}
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
#cHeading{
    font-size: 35px;
    font-weight: 700;
    line-height: 1.2em;
    margin-bottom: 25px;
    color: #898989;
    margin-left:45%;
}
#sinfo{
    font-size: 20px;
    margin-bottom: 25px;
    color: rgba(0,0,0,0.60);
    color: #898989;
    margin-left:40%;
}
#timing{
    font-size: 20px;
    margin-bottom: 25px;
    color: rgba(0,0,0,0.60);
    color: #898989;
    margin-left:40%;
}

.contact-detail
{
    /* background-color:#ffb016; */
    margin-top: 50px;
    padding-top:40px;
    padding-bottom:20px;
}
.cd{
    margin-left:40px;
}
.some-info
{
    display: inline-block;
}
.contact-icon img{
    margin-right: 20px;
    margin-top: 5px;
}
.some-info .contact-text h6 {
    margin-bottom: 5px;
    font-weight: 600;
    font-size: 18px;
}
.some-info .contact-text p
{
color: #252525;;
font-size: 14px;
line-height: 2;
font-weight: 400;
}

@media only screen and (max-width:824px){
    .some-info .contact-icon img{
       margin-top: 5px;
    }
}
@media only screen and (max-device-width:320px){
    

.ca h4
{
    font-size: 49px;
}
}
 
#map {
        width: 100%;
        height: 400px;
      }
</style>
</head>
<body id='body-bg'>
<?php include 'topNavbar.php';?>
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
    <!-- <div class="g-recaptcha" data-sitekey="6LfTqN8UAAAAAObAuW2BC2z7aNjAnmSufANykfjW" style="margin:30px -13px;">
    </div> -->
    <center><button type='submit' name='send' class='btn btn-outline-primary' style='width: 200px;'>Send Message</button></center></br></br>
    <center><button class='btn btn-link' ><a href='index.php' class="text-success" style="font-weight:bold;"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Back to Home</a></button></center>
</form>  
 </div>
 </div>

<div class="col-md-8 offset-md-4">


           <!-- contact-detail -->
           <div class="contact-detail jumbotron" id="contact">
        <div class="row cd">
                <div class="col-lg-4">
                    <div class="some-info d-flex ">
                        <div class="contact-icon">
                        <img src="image/logo/pin.png" alt="" width="50" height="50">
                        </div>
                        <div class="contact-text">
                       <h6> Address:</h6> 
                       <p> Santosh Bhuvan,Valai pada road, <br>
                        Nallasopra (E),401209.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="some-info d-flex ">
                        <div class="contact-icon">
                        <img src="image/logo/phone1.png" alt="" width="50" height="50">
                        </div>
                        <div class="contact-text">
                       <h6> Phone:</h6>
                       <p> +91 7021067824</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="some-info d-flex ">
                        <div class="contact-icon">
                        <img src="image/logo/email.png" alt="" width="50" height="50"> 
                        </div>
                        <div class="contact-text">
                       <h6> Email:</h6>
                        <p> satish70210@gmail.com</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
<div style="margin-top:400px;">
<h3 id="cHeading">Have You Any Question About Us?</h3>
<p id="sinfo">Any kind of business solution and consultion don't hesitate to contact with us for imiditate customer support. 
We are love to hear from you</p>
<p id="timing">We are always open except Saturday and Sunday from 10:00 AM to 8:00 PM</p>
</div>   
</div>
</div>

<div class="container jumbotron">
<!-- location map -->
  <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
 
  var location = {lat: 19.2920848, lng: 72.854278};

  var map = new google.maps.Map(
      document.getElementById('map'),
      {zoom: 4, 
      center: location
      });
    //   api key..
    //   AIzaSyCUPMPx1bpUEW3bvH4w_KUur9IRhGGdU1E
    //   AIzaSyCp4KZtK7qSYxC6FkkI3ia0GdXm85B_Mzs
  var marker = new google.maps.Marker(
      {
    position: location, 
      map: map
      });
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCp4KZtK7qSYxC6FkkI3ia0GdXm85B_Mzs&callback=initMap">
    </script>

 </div> 


<!-- <p>footer starts from here</p> -->

    <?php include 'footer.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- slick   -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- slick carousel -->
<script src="js/slick_carousel.js"></script>
<!-- sidebar js -->
<script src="js/sidepane.js"></script>


 </html>

