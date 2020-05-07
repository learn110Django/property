<?php
include('includes/headers.php'); 
include('includes/navbar.php'); 
include('includes/db.php'); 
include('includes/action.php'); 

?>
  <!-- resale update -->
<div class="modal fade" id="updateresale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update resale property</h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST">

        <div class="modal-body">
            
        <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="tel"  name="resale_id" class="form-control" placeholder="Enter resale_id to update" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="tel" name="price"  class="form-control" placeholder="Update price here here">
                </div>
              </div>
              
            </div>
          </div>


        <div class="form-group">
            <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                      <input type="tel" name="pin" class="form-control" placeholder="Update pin here">
                  </div>
                </div>  

                <div class="col-md-4">
                  <div class="form-label-group">
                      <input type="tel" name="size" class="form-control" placeholder="Update size(BHK/RK) here">
                  </div>
                </div>  

                <div class="col-md-4"> 
                <div class="form-label-group">
                      <input type="tel" name="age_cons" class="form-control" placeholder="Age of construction here">
                  </div>
                </div>

          </div>
        </div>

        
        <div class="form-group">
          <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                    <input type="text" name="city" class="form-control" placeholder="Update city here...">
                </div>
              </div>  
              <div class="col-md-6">
                <div class="form-label-group">
                    <input type="text" name="state" class="form-control" placeholder="Update state here...">
                </div>
              </div>

          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                    <input type="text" name="add1" class="form-control" placeholder="Update address line 1 here">
                </div>
              </div>  
              <div class="col-md-6">
                <div class="form-label-group">
                    <input type="text" name="add2" class="form-control" placeholder="Update address line 2 here">
                </div>
              </div>

          </div>
        </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="editresale" class="btn btn-primary">Update</button>
        </div>
      </form>

    </div>
  </div>
</div>
  <!-- delete modal for resale -->
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
              <input type="tel"  name="resale_id" class="form-control" placeholder="Enter id to delete" required>
              </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="remove" class="btn btn-primary">Delete</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- modal for rent -->
<div class="modal fade" id="updaterent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update rent property</h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST">

        <div class="modal-body">
            
          <div class="form-group">
          <div class="form-label-group">
                  <input type="tel"  name="rental_id" class="form-control" placeholder="Enter rental_id to update" required>
            </div>
          </div>


        <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
              <div class="form-label-group">
                  <input type="tel" name="deposite" class="form-control" placeholder="Edit deposite  here here">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="tel" name="rent" class="form-control" placeholder="Edit rent  here here">
                </div>
              </div>
              
            </div>
          </div>


        <div class="form-group">
            <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                      <input type="tel" name="pin" class="form-control" placeholder="Update pin here">
                  </div>
                </div>  

                <div class="col-md-4">
                  <div class="form-label-group">
                      <input type="tel" name="size" class="form-control" placeholder="Update size(BHK/RK) here">
                  </div>
                </div>  

                <div class="col-md-4"> 
                <div class="form-label-group">
                      <input type="tel" name="age_cons" class="form-control" placeholder="Age of construction here">
                  </div>
                </div>

          </div>
        </div>

        
        <div class="form-group">
          <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                    <input type="text" name="city" class="form-control" placeholder="Update city here...">
                </div>
              </div>  
              <div class="col-md-6">
                <div class="form-label-group">
                    <input type="text" name="state" class="form-control" placeholder="Update state here...">
                </div>
              </div>

          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                    <input type="text" name="add1" class="form-control" placeholder="Update address line 1 here">
                </div>
              </div>  
              <div class="col-md-6">
                <div class="form-label-group">
                    <input type="text" name="add2" class="form-control" placeholder="Update address line 2 here">
                </div>
              </div>

          </div>
        </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="editrent" class="btn btn-primary">Update</button>
        </div>
      </form>

    </div>
  </div>
</div>


<!-- delete for rent  -->

<div class="modal fade bd-example1-modal-sm"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Delete rent property</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="post">

        <div class="modal-body">
            <div class="form-group">
              <div class="form-label-group">
              <input type="tel"  name="rental_id" class="form-control" placeholder="Enter id to delete" required>
              </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="remove1" class="btn btn-primary">Delete</button>
        </div>

      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<?php 
editresale();
remove_property();
editrent();
remover_property();
?>
     <tr>
     <td> <button class="btn btn-success" data-toggle="modal" data-target="#updateresale">EDIT</button></td>
     <td> <button class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm">DELETE</button></td>
     <br>
     <br>
     </tr>
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">
  Resale Property Details  
  </h6>
</div>


<div class="card-body">

  <div class="table-responsive">

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
     
        <tr>
          <th>resale_Id</th>
          <th>UserId</th>
          <th>resale_amount</th>
          <th>city</th>
          <th>state</th>
          <th>pin</th>
        </tr>
      </thead>
      <tbody>
      <?php $sql="SELECT * FROM resaleproperty";
 $result=query_r($sql);
  $conn=confirmation1($result);
  $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
  foreach($rows as $row){            
    ?>
        <tr>
          <td><?php echo $row['resale_id'];?></td>
          <td><?php echo $row['uid'];?></td>
          <td>
             <?php echo $row['resale_amount']; ?>
           </td>
          <td><?php echo $row['city'];?></td>
          <td><?php echo $row['state'];?></td>
          <td><?php echo $row['zip'];?></td>
        </tr>
  <?php }?>
      </tbody>
    </table>

  </div>
</div>
</div>

<tr>
     <td> <button class="btn btn-success" data-toggle="modal" data-target="#updaterent" >EDIT</button></td>
     <td> <button class="btn btn-danger"   data-toggle="modal" data-target=".bd-example1-modal-sm">DELETE</button></td>
     <br>
     <br>': '
     </tr>
<!-- rent -->
<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">
  Rent Property Details  
  </h6>
</div>


<div class="card-body">

  <div class="table-responsive">

    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
      <thead>
     
        <tr>
          <th>RentId</th>
          <th>UserId</th>
          <th>Deposit</th>
          <th>Rent</th>
          <th>city</th>
          <th>state</th>
          <th>pin</th>
        </tr>
      </thead>
      <tbody>
      <?php $sql="SELECT * FROM rentproperty";
 $result=query_r($sql);
  $conn=confirmation1($result);
  $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
  foreach($rows as $row){            
    ?>
        <tr>
          <td><?php echo $row['rental_id'];?></td>
          <td><?php echo $row['uid'];?></td>
          <td><?php echo $row['deposite_amount'];?></td>
          <td><?php echo $row['monthly_rent'];?></td>
          <td><?php echo $row['city'];?></td>
          <td><?php echo $row['state'];?></td>
          <td><?php echo $row['zip'];?></td>
        </tr>
  <?php }?>
      </tbody>
    </table>

  </div>
</div>

</div>
<!-- rent -->

</div>
<!-- /.container-fluid -->


<script>  
  // function readRecord(){
  //   var readrecord="readrecord";
  //   $.ajax({
  //     url:"crud1.php";
  //     type:"post",
  //     data:{readrecord:readrecord},
  //     success:function(data,status){
  //       $("#record_content").html(data);
       
  //     }

  //   });
    
  // }

  // $('#record_content').click(function(){
  //     $.ajax({
  //       url:'crud1.php',
  //       type:'post',
  //       success:function(responsedata){
  //           $('#response').html(responsedata);
  //       }
  //     }); 
  // });
</script>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>