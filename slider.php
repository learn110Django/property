


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

<!-- rent -->

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