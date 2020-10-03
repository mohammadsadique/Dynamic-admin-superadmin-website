<?php include '../header.php'; ?>
<?php
if(isset($_POST['sub']))
{
	$tc_news = secureData($_POST['tc_news']);
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
		$date = date('Y-m-d');
	
	$bb = "INSERT INTO `tc_officetime`( `login_id`,`tc_news`, `date_time`, `date`) VALUES ('$login_id','$tc_news','$date_time','$date')";
	mysqli_query($conn,$bb);
	
	echo "<script>alert('Office Time added successfully!');</script>";
	echo "<script>window.location.href='officetime.php';</script>";
}
if(isset($_POST['del'])){
	$id = $_POST['del'];
	$tt = "DELETE FROM `tc_officetime` WHERE `id` = '$id' AND `login_id` = '$login_id'";
	mysqli_query($conn,$tt);

	echo "<script>alert('Deleted successfully!');</script>";
	echo "<script>window.location.href='officetime.php';</script>";
}
if(isset($_POST['upd'])){
	$id = $_POST['upd'];
	$tt = "SELECT * FROM `tc_officetime` WHERE `id` = '$id' AND `login_id` = '$login_id'";
	$ee = mysqli_query($conn,$tt);
	$qq = mysqli_fetch_array($ee);
}else{
	$id = '';
}
if(isset($_POST['update']))
{
	$id = $_POST['update'];
	$tc_news = secureData($_POST['tc_news']);
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
		$date = date('Y-m-d');
		
	$bb = "UPDATE `tc_officetime` SET `tc_news`='$tc_news',`date_time`='$date_time',`date`='$date' WHERE `id` = '$id' AND `login_id` = '$login_id'";
	mysqli_query($conn,$bb);
	
	echo "<script>alert('Update successfully!');</script>";
	echo "<script>window.location.href='officetime.php';</script>";
}
?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-5">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Add Office Time</b></h3>
					</div>
					<div class="box-body box box-info">
						<form method="post" enctype="multipart/form-data">
							<div class="col-md-12">
								<div class="form-group">
									<label for="exampleInputEmail1">Type Timming</label>
									<textarea name="tc_news" class="form-control" rows="3" placeholder="Enter Here..."><?php if($id != ''){ echo $qq['tc_news']; } ?></textarea>
								</div>  
							</div>
							<div class="col-md-12"></div>
							<div class="col-md-2 pull-left" style="">
								<?php if($id != ''){?>
								<button type="submit" value="<?php if($id != ''){ echo $qq['id']; } ?>" name="update" class="btn btn-info" >Update</button>
								<?php
								}else{?>
								<button type="submit" name="sub" class="btn btn-primary" >Submit</button>
								<?php
								}?> 
							</div>
						</form>
					</div>	
				</div>
			</div>
			<div class="col-md-7">	
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Manage Office Time</b></h3>
					</div>
					<div class="box-body box box-info">
					<div class="table-responsive">
						<table class="table table-bordered example1">
							<thead>
							  <tr>
								<th>S.No.</th>
								<th>Timing</th>
								<th>Date-Time</th>
								<th>Update</th>
								<th>Delete</th>
							  </tr>
							</thead>
							<tbody>
								<?php
									$vv1 = "SELECT * FROM `tc_officetime` WHERE `login_id` = '$login_id' ORDER BY id DESC";
									$tt1 = mysqli_query($conn,$vv1);
									$i = 1;
									while($nn1 = mysqli_fetch_array($tt1)){
								?>								
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $nn1['tc_news'];?></td>
									<td><?php echo $nn1['date_time'];?></td>
									<td><form method="post" action=""><button type="submit" name="upd" class="btn btn-success" value="<?php echo $nn1['id'];?>">Update</button></form></td>
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
	








	.


	