
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php

include 'includes/controller.php';
// payment();?>
<div class="container">
<div class='login-form col-md-4 offset-md-4'>
<form method="post"  class="jumbotron" style='margin-top:20px; padding-top:20px;padding-bottom:30px;'>	
					

						<div class="form-group">
						<!-- <label for="user">User id</label> -->
						<input id="CUST_ID" type="hidden" tabindex="2" id="user" class="form-control" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST1">
						</div>
				
					<div class="form-group">	
					<label for="order">ORDER_ID</label>
					<input id="ORDER_ID" tabindex="1" maxlength="20" size="20" class="form-control"
						name="ORDER_ID" autocomplete="off"
						id="order" value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</div>
				
					<div class="form-group">
					<label>Amount</label>
					<input title="TXN_AMOUNT" tabindex="10"
					class="form-control" type="text" name="TXN_AMOUNT"
						value="" >
					</div>

					<div class="form-group">
					<label>Card no</label>
					<input title="card" tabindex="10"
					class="form-control" type="text" name="card"
						value="" >
					</div>

					

					<div class="form-row">

					<div class="form-group col-md-4">
						<label for="inputmon">CVV</label>
						<input title="" tabindex="10"
					class="form-control" type="text" name="cvv"
						value="" >
						</div>

						<div class="form-group col-md-4">
						<label for="inputy">Year</label>
						<input title="" tabindex="10"
					class="form-control" type="text" name="year"
						value="" >
						</div>

						<div class="form-group col-md-4">
						<label for="inputmon">Month</label>
						<input title="" tabindex="10"
					class="form-control" type="text" name="Month"
						value="" >
						</div>
					</div>

					<div class="form-group">					
					<input value="Pay" name="done" type="submit" onclick="" class="btn btn-outline-success">
					</div>
				
	</form>
	</div>
	</div>
</body>
</html>


