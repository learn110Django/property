<?php
include('includes/headers.php'); 
include('includes/navbar.php'); 
include('includes/db.php'); 
include('includes/action.php'); 
?>

<div class="modal fade" id="updateuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update  property</h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST">

        <div class="modal-body">
            
        <div class="form-group">
          <div class="form-label-group">
           <input type="text" name="user_id" class="form-control" placeholder="Enter user id" required>
          </div>
        </div>

        <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text"  name="fname" class="form-control" placeholder=" update First name here.">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="lname"  class="form-control" placeholder="Update Last name  here">
                </div>
              </div>
              
            </div>
          </div>

          <div class="form-group">
          <div class="form-label-group">
           <input type="tel" name="mob" class="form-control" placeholder="Update mobile number here">
          </div>
        </div>
        
        <div class="form-group">
          <div class="form-label-group">
           <input type="text" name="uname" class="form-control" placeholder="Update username here">
          </div>
        </div>
      
        <div class="form-group">
          <div class="form-label-group">
           <input type="text" name="email" class="form-control" placeholder="Update email here">
          </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="edituser" class="btn btn-primary">Update</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- delete -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Delete resale property</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="post">

        <div class="modal-body">
            <div class="form-group">
              <div class="form-label-group">
              <input type="tel"  name="user_id" class="form-control" placeholder="Enter user id to delete" required>
              </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="remove2" class="btn btn-primary">Delete</button>
        </div>

      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<?php 
edituser();
remove_user();
?>
<tr>
     <td> <button class="btn btn-success" data-toggle="modal" data-target="#updateuser">EDIT</button></td>
     <td> <button class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm">DELETE</button></td>
     <br>
     <br>
 </tr>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
    Manage Customer    
    </h6>
  </div>

 
  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Mobile</th>
          </tr>
        </thead>
        <tbody>
        <?php $sql="SELECT * FROM users";
   $result=query_r($sql);
    $conn=confirmation1($result);
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($rows as $row){            
      ?>
          <tr>
            <td> <?php echo $row['userId'];?> </td>
            <td><?php echo $row['uname'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['mobile'];?></td>
          </tr>
    <?php }?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>