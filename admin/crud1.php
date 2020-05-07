<?php 
include('includes/navbar.php'); 
include('includes/db.php'); 
include('includes/action.php'); 

$sql="SELECT * FROM rentproperty";
 $result=query_r($sql);
  $conn=confirmation1($result);
  if(mysqli_num_rows()>0){
      while($row=mysqli_fetch_array($result)){
            ?>
     <tr>
          <td><?php echo $row['rental_id'];?></td>
          <td><?php echo $row['uid'];?></td>
          <td><?php echo $row['deposite_amount'];?></td>
          <td><?php echo $row['monthly_rent'];?></td>
          <td><?php echo $row['city'];?></td>
          <td><?php echo $row['state'];?></td>
          <td><?php echo $row['zip'];?></td>
          <td>
                <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
          </td>
        </tr>
     <?php       
      }
  }

?>


