
<?php include ('header.php' );
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
 ?>

<?php

?>
<head>
							<script>
								function myFunction() {
								  var x = document.getElementById('opt').value;
									//alert(x);
								  document.getElementById('amt').value ="Rs. "+(x*40);
								  document.getElementById('amount').value =x*40;
								}
							</script>
</head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="reg.css" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <div class="container">
	<div class="box1">
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
				
					<form method="POST" action="process_booking.php?id=amount" name="frm" role="form">
					
					<div class="form-group">
						<label for="Duration">Duration(hr)</label>
						<select class="mdb-select md-form" id="opt" required onchange="myFunction()">
						  <option value="" disabled selected>Select option</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						</select>
					</div>
					
					
						
						
						<div class="form-group">
							<label for="Vehicle">Vehicle ID</label> 
							<input type="text" class="form-control" name="vehicle"  required>
						</div>
						<div class="form-group">
							<label for="Vehicle">Amount</label> 
							<input class="form-control"  id="amt" type="text" readonly >
						</div>
						
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-info btn-block" value="Proceed">
						</div>
						 <input type="hidden" id="amount" name="amount">

							
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


