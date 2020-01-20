<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
	?>
	
<style>
   
   .box1{
	padding-left:20px;
	margin-top:150px;
	border-width:6px;
	border-radius:15px;
}
   
   </style>
	
	<div class="box1">

<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3>BOOKINGS</h3>
						<?php include('msgbox.php');?>
						<?php
				$bk=mysqli_query($connection,"select * from bookings where userid='".$_SESSION['user']."'");
				if(mysqli_num_rows($bk))
				{
					?>
					<table class="table table-bordered">
						<thead>
						<th>Booking Id</th>
						<th>Ticket Id</th>
						<th>Amount</th>
						<th>Status</th>
						<th>Date</th>
						</thead>
						<tbody>
						<?php
						while($bkg=mysqli_fetch_assoc($bk))
						{
							
							?>
							<tr>
								<td>
									<?php echo $bkg['bookid'];?>
								</td>
								<td>
									<?php echo $bkg['tid'];?>
								</td>
								<td>
									<?php echo $bkg['amount'];?>
								</td>
								<td>
									<?php echo $bkg['status'];?>
								</td>
								<td>
									<?php echo $bkg['date'];?>
								</td>
								<td>
									<?php  if($bkg['date']<date('Y-m-d'))
									{
										?>
										<i class="glyphicon glyphicon-ok"></i>
										<?php
									}
									else
									{?>
									<a href="cancel.php?id=<?php echo $bkg['bookid'];?>">Cancel</a>
									<?php
									}
									?>
								</td>
							</tr>
							<?php
						}
						?></tbody>
					</table>
					<?php
				}
				else
				{
					?>
					<h3>No Previous Bookings</h3>
					<?php
				}
				?>
					</div>			
				
				
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
</div>
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['charge'];?>;
		amount=charge*$(this).val();
		$('#amount').html("Rs "+amount);
		$('#hm').val(amount);
	});
</script>