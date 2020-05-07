
<?php include 'includes/controller.php';

 include 'header.php';
 ?>
<link rel="stylesheet" href="css/rr.css">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<?php include 'topNavbar.php';?>
<?php  formvalidate1();

?>
 <style>
 .p{
    margin-top:20px;
}
.property-price{
  font-size:12px!important;
}
 </style>
 
    <?php include 'resaleCarousel.php';?>
 
 

<div class="container">
<div class="row upload_property">
                <div class="col-lg-8 col-md-3 col-sm-6 col-xs-4">
                   <span class="heading_"> Resale: Upload your property details </span>
                </div>
                <div class="col-lg-4 col-md-9 col-sm-6 col-xs-8">
                      <!-- <a href="index.php"><img src="image/gallry/prev.png"></a> &nbsp;&nbsp;  -->
                    <button  name="rent" class="btn btn-success" data-toggle="modal" data-target="#resaleUploadProperty">Uploads  Property Detail</button>
                </div>
            </div>
        </div>   

        <!-- Modal -->
<div id="resaleUploadProperty" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Property Detail</h4>
      </div>
      <div class="modal-body">
        
<form method="post" enctype="multipart/form-data">

<div class="form-row">
  <div class="form-group col-md-12">
    <label for="inputReSale">Resale Amount</label>
    <input type="tel" class="form-control" id="inputReSale" placeholder="Resale Amount"  name="resale_amount" required>
  </div>
</div>


<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAgeCons">Age of Construction</label>
    <input type="tel" class="form-control" id="inputAgeCons" placeholder="Age of Construction"  name="Age_cons" required>
  </div>

  <div class="form-group col-md-6">
    <label for="inputSizeP">Size of Property</label>
    <input type="tel" class="form-control" id="inputSizeP" placeholder="Size of Property(RK/BHK)"  name="size_" required>
  </div>
</div>

<div class="form-group">
  <label for="inputAddress">Address</label>
  <input type="text" class="form-control" id="inputAddress" placeholder="Apartment,or floor"  name="add1" required>
</div>
<div class="form-group">
  <label for="inputAddress2">Address 2</label>
  <input type="text" class="form-control" id="inputAddress2" placeholder="landmark,road name"  name="add2" required>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputCity">City</label>
    <input type="text" class="form-control" id="inputCity" name="city" required>
  </div>

  <div class="form-group col-md-4">
      <label for="inputState"> state</label>
      <input type="text" class="form-control" name="state" id="inputCity" required>
    </div>

  <div class="form-group col-md-2">
    <label for="inputZip">Zip</label>
    <input type="text" class="form-control" id="inputZip" name="zip" required>
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

<button type="submit" class="btn btn-primary" name="resale_">Upload</button>
</form> 
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="row sold_property" style="margin-left:10px">
    <?php 
    $sql="SELECT * FROM resaleproperty";
    $result=query_r($sql);
    confirmation1($result);
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($rows as $row){    
    ?>
          <a  href="gallryresale.php?id=<?php echo $row['resale_id'];?>" target="_blank" name="buy_property">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
        <div class="sold" style=" background-color: #fd784f;">For Resale</div>
                <div class="card">
                
                <img src='uploadResale/<?php echo $row['picture'];?>' width="286" height="180">              
                <div class="card-body">
           
                <div class="property-price">&#8377;<?php echo $row['resale_amount'];?></div>   
                            <div class="property-detail" style="padding-top:5px;color:rgba(0,0,0,0.7)!important;overflow:hidden;"><?php echo $row['property_size'];?> BHK Apartment</div>
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
    <?php } ?>
</div>
</div>   
<!-- slider -->
<div class="page-wrapper">
    <div class="post-slider">
            <div class="prev_btn"><i class="fa fa-chevron-left prev"></i></div>
            <div class="next_btn"><i class="fa fa-chevron-right next"></i></div>
          
            <div class="post-wrapper">
            <?php 
            $sql="SELECT * FROM resaleproperty";
            $result=query_r($sql);
            confirmation1($result);
            $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach($rows as $row){    
             ?>
              <a  href="gallryresale.php?id=<?php echo $row['resale_id'];?>" target="_blank" name="buy_property1"> 
            <div class="post">
            <div class="card cas">
            <div class="sold" style=" background-color: #fd784f;">For Resale</div>
                <img class="card-img-top" src="uploadResale/<?php echo $row['picture'];?>" alt="" width="332" height="180">
                <div class="card-body">
                <div class="property-price">&#8377;<?php echo $row['resale_amount'];?></div>   
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


<script>
        //  $(document).ready(function()
        //  {
        //      $('.card').hover(
        //       function() {
        //            $(this).animate({
        //               marginTop: "-=10%"
        //               },200);

                   
        //        },

        //        function()
        //        {
        //            $(this).animate({
        //                marginTop: "0%"
        //            },200);
                   
        //        }
               
        //        );
        //  });

     </script>