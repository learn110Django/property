<?php include 'header.php';
      include 'includes/controller.php';
      formvalidateBuy1();
?>
<link rel="stylesheet" href="css/lightbox.min.css">
<link rel="stylesheet" href="css/prodbook.css">
<?php 
setcookie("resalebuy",$_GET['id']);
$id=$_GET['id'];
  $sql="SELECT * FROM resaleproperty WHERE resale_id='$id'";
  $result=query_r($sql);
  $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($row as $rows){
       $userid=$rows['uid'];
       setcookie("ownerre",$userid);      
?>
<div class="row container h_rent">

    <div class="col-lg-9 col-md-6 col-sm-12 col-xs-12 disp_area">
        <h3><?php echo $rows['property_size'];?> BHK Apartment</h3>
        <p>
        <?php echo $rows['add2'];?>&nbsp;&nbsp;<?php echo $rows['city'];?>&nbsp;&nbsp;<?php echo $rows['state'];?>&nbsp;&nbsp;
        <?php echo $rows['zip'];?>
        </p>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 disp_price">
       <span>Resale Value:</span><div class="price">&#8377;<?php echo $rows['resale_amount'];?></div> 
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contact_seller" >Book</button>
    </div>
</div>
    <?php }?>
<div class="container gallry row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="image/gallry/bedroom12.webp" data-lightbox="mygallery" data-title="bedroom"><img src="image/gallry/bedroom12.webp" alt="bedroom" class="img-fluid"></a></div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a href="image/gallry/kitchen.jpg" data-lightbox="mygallery" data-title="kitchen"><img src="image/gallry/kitchen.jpg" alt="kitchen" class="img-fluid"></a></div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="image/gallry/living_room.webp" data-lightbox="mygallery"  data-title="Living room"><img src="image/gallry/living_room.webp" alt="living room" class="img-fluid"></a></div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a href="image/gallry/bathroom.webp" data-lightbox="mygallery" data-title="bathroom"><img src="image/gallry/bathroom.webp" alt="bathroom" class="img-fluid"></a></div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="image/gallry/living_room1.webp" data-lightbox="mygallery" data-title="Living room"><img src="image/gallry/living_room1.webp" alt="living room" class="img-fluid"></a></div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a href="image/gallry/kitchen2.webp" data-lightbox="mygallery" data-title="Kitchen"><img src="image/gallry/kitchen2.webp" alt="Kitchen" class="img-fluid"></a></div>
   
</div>


<?php     
$sql="SELECT fname,lname,email,mobile FROM users WHERE  uname='$userid'";
$result=query_r($sql);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($row as  $rows){
?>
<!-- Modal -->
<div class="modal fade" id="contact_seller" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Owner Detail</h4>
          <div class="ownserinfo">
          <i class="fa fa-home"></i> <?php echo $rows['fname'];?>&nbsp;<?php echo $rows['lname'];?>
         <p> <i class="fa fa-phone" style="padding-right:10px;">  </i><?php  echo $rows['mobile'];?></p>
          </div>
        </div>
        <?php }?>
        <span style="padding-left:20px;font-weight:800">Fill Following detail</span>
            <div class="modal-body">
            
                <form method="post">

                <div class="form-group">
                        <input type="email" class="form-control" name="InputEmail" placeholder="Enter your register email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="InputName" placeholder=" Full Name" required>
                    </div>
                    
                    <div class="form-group"> 
                        <input type="tel" class="form-control" name="InputNumber" placeholder=" Mobile No" required>
                    </div>

                    <!-- <div class="form-group"> 
                        <input type="text" class="form-control" name="InputAdd1" placeholder="Apartment,floor" >
                    </div>
                    <div class="form-group"> 
                        <input type="text" class="form-control" name="InputAdd2" placeholder="road name,landmark" required>
                    </div>
                    <div class="form-group"> 
                        <input type="text" class="form-control" name="Inputcity" placeholder="City" required>
                    </div>
                    <div class="form-group"> 
                        <input type="text" class="form-control" name="Inputstate" placeholder="State" required>
                    </div>
                    <div class="form-group"> 
                        <input type="text" class="form-control" name="Inputpin" placeholder="pincode" required>
                    </div> -->
                    <button type="submit" class="btn btn-primary btn-block" name="resaleBuy">Book</button>
                </form>
            </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php';?>

<script src="js/lightbox-plus-jquery.min.js"></script>
