<?php include 'includes/db.php';
?>


<?php 
    // $sql="SELECT * FROM rentproperty";
    // $result=query($sql);
    // $row=mysqli_fetch_assoc($result);
    // echo "<pre>";
    // print_r($row);
    // echo "</pre>";

    // $sql="SELECT * FROM rentproperty";
    // $result=query($sql);
    // $conn=confirmation($result);
    
    //     while($row=mysqli_fetch_assoc($result)){
    //         echo "<pre>";
    //         echo $row['rental_id'];
    //         echo $row['deposite_amount'];
    //         echo $row['monthly_rent'];
    //         echo $row['property_size'];
    //         echo $row['age_cons'];
    //         echo $row['property_size'];
    //         echo $row['add1'];
    //         echo $row['add2'];
    //         echo $row['city'];
    //         echo $row['state'];
    //         echo $row['zip'];
    //         echo $row['picture'];
    //         echo "</pre>";
    //     }
   
?>
<!-- <div class="container">
    <div class="row sold_property" style="margin-left:10px">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
                <div class="sold">Rent</div>
                        <div class="card">
                        <img class="card-img-top" src="image/mulund_west-mumbai.webp" alt="" width="286" height="180">
                        <div class="card-body">
                        <div class="property-price">&#8377;30,000</div>   
                                    <div class="property-detail">2 BHK Apartment</div>
                                    <div class="property-title">
                                        Geras Song Of Joy, Kharadi, Pune</div> 
                                    <div class="property-area"> 1200 sq.ft</div>
                            
                        </div>
                        </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
                <div class="sold">Rent</div>
                        <div class="card">
                        <img class="card-img-top" src="image/mulund_west-mumbai.webp" alt="" width="286" height="180">
                        <div class="card-body">
                        <div class="property-price">&#8377;30,000</div>   
                                <div class="property-detail">2 BHK Apartment</div>
                                <div class="property-title">
                                    Geras Song Of Joy, Kharadi, Pune</div> 
                                <div class="property-area"> 1200 sq.ft</div>
                            
                        </div>
                </div> 
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
                <div class="sold">Rent</div>
                    <div class="card">
                        <img class="card-img-top" src="image/mulund_west-mumbai.webp" alt="" width="286" height="180">
                            <div class="card-body">
                                <div class="property-price">&#8377;30,000</div>   
                                <div class="property-detail">2 BHK Apartment</div>
                                <div class="property-title">
                                    Geras Song Of Joy, Kharadi, Pune</div> 
                                <div class="property-area"> 1200 sq.ft</div>
                            </div>
                        </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
            <div class="sold">Rent</div>
                <div class="card">
                    <img class="card-img-top" src="image/mulund_west-mumbai.webp" alt="" width="286" height="180">
                        <div class="card-body">
                            <div class="property-price">&#8377;30,000</div>   
                            <div class="property-detail">2 BHK Apartment</div>
                            <div class="property-title">
                                Geras Song Of Joy, Kharadi, Pune</div> 
                            <div class="property-area"> 1200 sq.ft</div>
                        </div>
                    </div>    
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
            <div class="sold">Rent</div>
                <div class="card">
                    <img class="card-img-top" src="image/mulund_west-mumbai.webp" alt="" width="286" height="180">
                        <div class="card-body">
                            <div class="property-price">&#8377;30,000</div>   
                            <div class="property-detail">2 BHK Apartment</div>
                            <div class="property-title">
                                Geras Song Of Joy, Kharadi, Pune</div> 
                            <div class="property-area"> 1200 sq.ft</div>
                        </div>
                    </div>    
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
            <div class="sold">Rent</div>
                <div class="card">
                    <img class="card-img-top" src="image/mulund_west-mumbai.webp" alt="" width="286" height="180">
                        <div class="card-body">
                            <div class="property-price">&#8377;30,000</div>   
                            <div class="property-detail">2 BHK Apartment</div>
                            <div class="property-title">
                                Geras Song Of Joy, Kharadi, Pune</div> 
                            <div class="property-area"> 1200 sq.ft</div>
                        </div>
                    </div>    
            </div>    
    </div>
</div>

 -->
 <?php include 'includes/db.php';
 include 'includes/controller.php';
 include 'header.php';
 ?>

<link rel="stylesheet" href="css/rr.css">
<style>
.p{
    margin-top:20px;
}
</style>
<?php include 'banner.php';?>
<?php formValidate();?>
   <?php include 'rentCarousel.php';?>
<div class="container">

<div class="row upload_property">
                <div class="col-lg-8 col-md-3 col-sm-6 col-xs-4">
                   <span class="heading_"> Rent : Upload your property details </span>
                </div>
                <div class="col-lg-4 col-md-9 col-sm-6 col-xs-8">
                      <a href="index.php"><img src="image/gallry/prev.png"></a> &nbsp;&nbsp; 
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
      <input type="number" class="form-control" id="inputDamt" name="D_amount" placeholder="Deposite Amount" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputMonthlyRent">Monthly Rent </label>
      <input type="number"  class="form-control" id="inputMonthlyRent" name="R_month" placeholder="Monthly Rent Amount" required>
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAgeCons">Age of Construction</label>
      <input type="number" class="form-control" id="inputAgeCons" name="Age_cons" placeholder="Age of Construction" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputSizeP">Size of Property</label>
      <input type="number" class="form-control" id="inputSizeP" name="size_" placeholder="Size of Property(RK/BHK)" required>
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
    <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1" multiple >
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
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
<?php $sql="SELECT * FROM rentproperty";
   $result=query($sql);
    $conn=confirmation($result);
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($rows as $row){            
   ?>

                <div class="sold">Rent</div>
                        <div class="card">
                        <img class="card-img-top" src="image/mulund_west-mumbai.webp" alt="" width="286" height="180">
                        <div class="card-body">
                        <div class="property-price">&#8377;30,000</div>   
                                    <div class="property-detail">2 BHK Apartment</div>
                                    <div class="property-title">
                                      <?php
                                     echo $row['add1'];
                                     echo $row['add2'];
                                   echo $row['city'];
                                  echo $row['state'];
                                    echo $row['zip'];?>
                                    </div> 
                                    <div class="property-area"> 1200 sq.ft</div>
                            
<!--         
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
                <div class="sold">Rent</div>
                        <div class="card">
                        <img class="card-img-top" src="image/mulund_west-mumbai.webp" alt="" width="286" height="180">
                        <div class="card-body">
                        <div class="property-price">&#8377;30,000</div>   
                                <div class="property-detail">2 BHK Apartment</div>
                                <div class="property-title">
                                <?php
                                  //    echo $row['add1'];
                                  //    echo $row['add2'];
                                  //  echo $row['city'];
                                  // echo $row['state'];
                                  //   echo $row['zip'];?>    
                              </div> 
                                <div class="property-area"> 1200 sq.ft</div>
                            
                        </div>
                </div> 
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
                <div class="sold">Rent</div>
                    <div class="card">
                        <img class="card-img-top" src="image/mulund_west-mumbai.webp" alt="" width="286" height="180">
                            <div class="card-body">
                                <div class="property-price">&#8377;30,000</div>   
                                <div class="property-detail">2 BHK Apartment</div>
                                <div class="property-title">     
                              </div> 
                                <div class="property-area"> 1200 sq.ft</div>
                            </div>
                        </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
            <div class="sold">Rent</div>
                <div class="card">
                    <img class="card-img-top" src="image/mulund_west-mumbai.webp" alt="" width="286" height="180">
                        <div class="card-body">
                            <div class="property-price">&#8377;30,000</div>   
                            <div class="property-detail">2 BHK Apartment</div>
                            <div class="property-title">      
                          </div> 
                            <div class="property-area"> 1200 sq.ft</div>
                        </div>
                    </div>    
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
            <div class="sold">Rent</div>
                <div class="card">
                    <img class="card-img-top" src="image/mulund_west-mumbai.webp" alt="" width="286" height="180">
                        <div class="card-body">
                            <div class="property-price">&#8377;30,000</div>   
                            <div class="property-detail">2 BHK Apartment</div>
                            <div class="property-title">
                          </div> 
                            <div class="property-area"> 1200 sq.ft</div>
                        </div>
                    </div>    
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
            <div class="sold">Rent</div>
                <div class="card">
                    <img class="card-img-top" src="image/mulund_west-mumbai.webp" alt="" width="286" height="180">
                        <div class="card-body">
                            <div class="property-price">&#8377;30,000</div>   
                            <div class="property-detail">2 BHK Apartment</div>
                            <div class="property-title">
                          </div> 
                            <div class="property-area"> 1200 sq.ft</div>
                        </div>
                    </div>    
            </div>     -->
    <!-- </div>
</div> -->


<?php
} ?>

</div>
                        </div>
            </div>

<!-- slider -->
<?php include 'slider.php';?>
<!-- footer -->
<div id="contact"><?php include 'footer.php';?></div>
