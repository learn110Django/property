<?php 
include 'includes/controller.php';
$sqlcheck="SELECT coin FROM coinrecord WHERE username='suraj45'";
		$res=query_r($sqlcheck);
		confirmation1($res);
		$data=mysqli_fetch_assoc($res);
		if($data['coin']>0){
            echo "hello done";
		}else{
            echo "....";
        }
?>