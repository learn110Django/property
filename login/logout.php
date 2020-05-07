<?php include("includes/header.php");
session_destroy();

if(isset($_COOKIE['Email'])){
    unset($_COOKIE['Email']);
    setcookie("Email",'',time() - 86400);
}

redirect("login.php");

?>

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
           <div class="alert alert-success text-center mt-4">You're successfully Logged out.</div> 
        </div>
    </div>
</div>

<?php include("includes/footer.php");?>