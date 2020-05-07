<?php 
include 'includes/controller.php';
?>
<style>
.p{
    margin-top:20px;
}
</style>
<?php
$gallry="gallry.php";
?>


<div class="container">
    <div class="row sold_property">
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
                <?php echo '<img src="uploadResale/'.$row['picture'].'" width="286" height="180">';?>
                <div class="card-body">
                <div class="property-price">&#8377;<?php echo $row['resale_amount'];?></div>   
                            <div class="property-detail"><?php echo $row['property_size'];?> BHK Apartment</div>
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
    <?php }?>

    
    </div>
</div>



<div class="container">
    <div class="row sold_property">
    <?php 
    $sql="SELECT * FROM rentproperty";
    $result=query_r($sql);
    confirmation1($result);
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($rows as $row){    
    ?>
        <a href="gallryrent.php?id=<?php echo $row['rental_id'];?>" target="_blank" name="rent_property" >
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
        <div class="sold" style=" background-color: #fd784f;">Rent</div>
                <div class="card">
                <?php echo '<img src="uploadRent/'.$row['picture'].'" width="286" height="180">';?>
                <div class="card-body">
                <div class="property-price">&#8377;<?php echo $row['monthly_rent'];?></div>   
                            <div class="property-detail">2 BHK Apartment</div>
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
    <?php }?>

    
    </div>
</div>

 
