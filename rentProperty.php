<?php 
 include 'includes/controller.php';
 include 'header.php';
 ?>

<link rel="stylesheet" href="css/rr.css">
<style>
.p{
    margin-top:20px;
}
.property-price{
  font-size:12px!important;
}
</style>
<?php include 'topNavbar.php';?>
<?php 

formValidater();

?>
   <?php include 'rentCarousel.php';?>



<!-- upload form -->

<div class="container">
<div class="row upload_property">
                <div class="col-lg-8 col-md-3 col-sm-6 col-xs-4">
                   <span class="heading_"> Rent : Upload your property details </span>
                </div>
                <div class="col-lg-4 col-md-9 col-sm-6 col-xs-8">
                      <!-- <a href="index.php"><img src="image/gallry/prev.png"></a> &nbsp;&nbsp;  -->
                    <button  name="rent" class="btn btn-success" data-toggle="modal" data-target="#rentUploadProperty">Uploads  Property Detail</button>
                </div>
            </div>
        </div>   

       
        <!-- Modal -->
        <div id="rentUploadProperty" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Property Detail</h4>
      </div>
      <div class="modal-body">
           
        <!-- upload property details -->
<form method="post"  enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputDamt">Deposite Amount</label>
      <input type="tel" class="form-control" id="inputDamt" name="D_amount" placeholder="Deposite Amount" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputMonthlyRent">Monthly Rent </label>
      <input type="tel"  class="form-control" id="inputMonthlyRent" name="R_month" placeholder="Monthly Rent Amount" required>
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAgeCons">Age of Construction</label>
      <input type="tel" class="form-control" id="inputAgeCons" name="Age_cons" placeholder="Age of Construction" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputSizeP">Size of Property</label>
      <input type="tel" class="form-control" id="inputSizeP" name="size_" placeholder="Size of Property(RK/BHK)" required>
    </div>
  </div>

  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="add1" placeholder="Apartment,or floor" required>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" name="add2" placeholder="landmark,road name" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name="city" id="inputCity" required>
    </div>

    <div class="form-group col-md-4">
      <label for="inputState"> state</label>
      <input type="text" class="form-control" name="state" id="inputCity" required>
    </div>

    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control"  name="zip" id="inputZip" required>
    </div>
  </div>


  <div class="form-group">
    <label for="exampleFormControlFile1">Upload property image</label>
    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" multiple >
  </div>

  <div class="form-group">
  <label for="inputUserId">UserId</label>
  <input type="text" class="form-control" id="inputUserId" placeholder="Enter your Registerd user id"  name="uid" required>
</div>

  <button type="submit" class="btn btn-primary" name="r_upload">Upload</button>
  
</form> 
 </div>
    </div>
  </div>
</div>
  
<!-- rent area -->

<div class="container">
    <div class="row sold_property" style="margin-left:10px">
            
<?php $sql="SELECT * FROM rentproperty";
   $result=query_r($sql);
    $conn=confirmation1($result);
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($rows as $row){            
      ?>
       <a href="gallryrent.php?id=<?php echo $row['rental_id'];?>" target="_blank" name="rent_property">
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
                <div class="sold" style=" background-color: #fd784f;">Rent</div>
                        <div class="card">
                        <img src='uploadRent/<?php echo $row['picture'];?>' width="286" height="180">
                        <div class="card-body">
                        <div class="property-price">
                        &#8377;<?php echo $row['monthly_rent'];?>
                          </div>   
                          
                                    <div class="property-detail" style="padding-top:5px;color:rgba(0,0,0,0.7)!important;overflow:hidden;">
                                      <?php echo $row['property_size']; ?> BHK Apartment
                                    </div>
                                    <div class="property-title">
                                      <?php
                                     echo $row['add1'];
                                     echo $row['add2'];
                                     ?>
                                    </div> 
                                   
                            
                        </div>
                        </div>
            
    </div>
    </a>
<?php
} ?>

        </div>
</div>



<!-- slider -->
<div class="page-wrapper">
    <div class="post-slider">
            <div class="prev_btn"><i class="fa fa-chevron-left prev"></i></div>
            <div class="next_btn"><i class="fa fa-chevron-right next"></i></div>
          
            <div class="post-wrapper">
            <?php 
            $sql="SELECT * FROM rentproperty";
            $result=query_r($sql);
            confirmation1($result);
            $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach($rows as $row){    
             ?>
              <a href="gallryrent.php?id=<?php echo $row['rental_id'];?>" target="_blank" name="rent_property1">
            <div class="post">
            <div class="card cas">
            <div class="sold" style=" background-color: #fd784f;">Rent </div>
                <img class="card-img-top" src="uploadRent/<?php echo $row['picture'];?>" alt="" width="332" height="180">
                <div class="card-body">
                <div class="property-price">&#8377; &#8377;<?php echo $row['monthly_rent'];?></div>   
                            <div class="property-detail"><?php echo $row['property_size'];?> BHK Apartment</div>
                            <div class="property-title">
                            <?php
                                     echo $row['add1'];
                                     echo $row['add2'];
                                ?>
                            </div> 
                            <!-- <div class="property-area"> 1200 sq.ft</div> -->
                    
                </div>
                </div>
                </a>
            </div>
            <?php } ?>

            </div>
    </div>
</div>
<!-- footer -->
<div id="contact"><?php include 'footer.php';?></div>
