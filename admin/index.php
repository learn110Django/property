<?php
session_start();
include('includes/headers.php'); 
include('includes/navbar.php'); 
include('includes/db.php');
include('includes/action.php');

if(!isset($_SESSION['email']))
{
  echo "<script> location.href='login.php'</script>";
    exit();
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row"> 
  <?php 
		$sql="SELECT COUNT(*) as total FROM resaleproperty";
    $result=query_r($sql);
    $data=mysqli_fetch_assoc($result);
		?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Resale </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['total'];?></div>
            </div>
            <div class="col-auto">
            <i class="far fa-building fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php 
		$sql="SELECT COUNT(*) as total FROM rentproperty";
    $result=query_r($sql);
    $data=mysqli_fetch_assoc($result);
		?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rent</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data['total'];?></div>
                </div>
                
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php 
		$sql="SELECT COUNT(*) as total FROM users";
    $result=query_r($sql);
    $data=mysqli_fetch_assoc($result);
		?>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total registered user</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['total'];?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->





<!-- count according to city -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">   Apartment for rent in following Cities</h1>
</div>

<div class="row"> 
    <?php 
		$sql="SELECT COUNT(*) as total ,city FROM rentproperty GROUP BY city";
    $result=query_r($sql);
    $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($data as $row){
		?>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">In <?php echo $row['city'];?> total rent property </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['total'];?></div>
            </div>
            <div class="col-auto">
            <i class="far fa-building fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php }?>
  </div>
<!-- end  count according to city-->


<!-- available for resale -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Apartment for resale in following Cities</h1>
</div>

<div class="row">
<?php 
		$sql="SELECT COUNT(*) as total ,city FROM resaleproperty GROUP BY city";
    $result=query_r($sql);
    $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($data as $row){
		?>
<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">In <?php echo $row['city'];?> total resale property</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row['total'];?></div>
                </div>
                
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
</div>

<!-- Buyer detail.. -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Buyer detail</h1>
</div>

<div class="row">
<?php 
		$sql="SELECT * FROM buyerdetail";
    $result=query_r($sql);
    $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($data as $row){
		?>
<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Name:<?php echo $row['Name'];?></div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Email:<?php echo $row['email'];?></div>
                </div>
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Mobile:<?php echo $row['phone'];?></div>
                </div>
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">RentalId:<?php echo $row['resale_id'];?></div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
</div>


  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>