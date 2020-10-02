<?php include '../header.php'; ?>
<?php
	$tt = "SELECT * FROM `login` WHERE `user_id` = '$_SESSION[user_id]'";
	$ee = mysqli_query($conn,$tt);
	$qq = mysqli_fetch_array($ee);
    
    
if(isset($_POST['del'])){
    $id = $_POST['del'];

	$tt = "DELETE FROM `tc_reseller` WHERE `id` = '$id'";
	mysqli_query($conn,$tt);

	echo "<script>alert('Deleted successfully!');</script>";
	echo "<script>window.location.href='reseller.php';</script>";
}
	
?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
            <div class="col-md-12">	
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Reseller</b></h3>
					</div>
					<div class="box-body box box-info">
                        <div class="table-responsive">
						<table class="table table-bordered example1">
							<thead>
							  <tr>
								<th>S.No.</th>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Message</th>
								<th>Date-Time</th>
								<th>Delete</th>
							  </tr>
							</thead>
							<tbody>
								<?php
									$vv1 = "SELECT * FROM `tc_reseller` ORDER BY id DESC";
									$tt1 = mysqli_query($conn,$vv1);
									$i = 1;
									while($nn1 = mysqli_fetch_array($tt1)){
								?>					
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $nn1['name'];?></td>
									<td><?php echo $nn1['email'];?></td>
									<td><?php echo $nn1['mobile'];?></td>
									<td><?php echo $nn1['msg'];?></td>
									<td><?php echo $nn1['date_time'];?></td>
									<td><form method="post" action=""><button type="submit" name="del" class="btn btn-danger" value="<?php echo $nn1['id'];?>" onClick="return confirm('Are you sure, you want to delete?')">Delete</button></form></td>
								</tr>
								<?php
								$i++;
								}?>
							</tbody>
						</table>
					    </div>	
					</div>	
				</div>
			</div>
		</div>
	</section>
</div>
<?php include '../footer.php'; ?>
	