<?php include '../header.php'; ?>
<?php
	$tt = "SELECT * FROM `login` WHERE `user_id` = '$_SESSION[user_id]'";
	$ee = mysqli_query($conn,$tt);
	$qq = mysqli_fetch_array($ee);


if(isset($_POST['del'])){
    $id = $_POST['del'];
   
	$tt = "DELETE FROM `tc_customer` WHERE `id` = '$id'";
	mysqli_query($conn,$tt);

	echo "<script>alert('Deleted successfully!');</script>";
	echo "<script>window.location.href='managecustomer.php';</script>";
}
?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
            <div class="col-md-12">	
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Manage Cutomer</b></h3>
					</div>
					<div class="box-body box box-info">
                        <div class="table-responsive">
						<table class="table table-bordered example1">
							<thead>
							  <tr>
								<th>S.No.</th>
								<?php
								if($qq['role'] == 'admin')
								{
									echo '<th>Staff Name</th>';
								}?>
								<th>Customer Name</th>
								<th>Customer Email</th>
								<th>Mobile Number 1</th>
								<th>Mobile Number 2</th>
								<th>Address</th>
								<th>Remark</th>
								<th>Reminder Date</th>
								<th>Update</th>
								<th>Delete</th>
							  </tr>
							</thead>
							<tbody>
								<?php
								if($qq['role'] == 'admin')
								{
									$vv1 = "SELECT * FROM `tc_customer` ORDER BY id DESC";
									$tt1 = mysqli_query($conn,$vv1);

									
								}
								else
								{
									$vv1 = "SELECT * FROM `tc_customer` WHERE `login_id` = '$qq[id]' ORDER BY id DESC";
									$tt1 = mysqli_query($conn,$vv1);
								}
									$i = 1;
									while($nn1 = mysqli_fetch_array($tt1)){
										if($qq['role'] == 'admin')
										{
											$m = "SELECT * FROM `login` WHERE `id` = '$nn1[login_id]'";
											$mj = mysqli_query($conn,$m);
											$pp = mysqli_fetch_array($mj);
											
											$checkstaff = mysqli_num_rows($mj);
										}
								?>					
								<tr>
									<td><?php echo $i; ?></td>
									<?php
									if($qq['role'] == 'admin')
									{
									    if($checkstaff > 0){
										echo "<td>".$pp['name']."</td>";
									    }else{ echo "<td style='color:red'>".'Staff is deleted'."</td>";}
									}?>
									<td><?php echo $nn1['name'];?></td>
									<td><?php echo $nn1['email'];?></td>
									<td><?php echo $nn1['mob1'];?></td>
									<td><?php echo $nn1['mob2'];?></td>
									<td><?php echo $nn1['address'];?></td>
									<td><?php echo $nn1['remark'];?></td>
									<td><?php echo $nn1['reminder'];?></td>									
									<td><form method="post" action="addcustomer.php"><button type="submit" name="upd" class="btn btn-success" value="<?php echo $nn1['id'];?>"><i class="fa fa-edit"></i></button></form></td>
									<td><form method="post" action=""><button type="submit" name="del" class="btn btn-danger" value="<?php echo $nn1['id'];?>" onClick="return confirm('Are you sure, you want to delete?')"><i class="fa fa-trash"></i></button></form></td>
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
	