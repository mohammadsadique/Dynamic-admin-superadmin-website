<?php include '../header.php'; ?>
<?php
if(isset($_POST['sub']))
{
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
		$date = date('Y-m-d');
	
	$your_img = $_FILES['your_img']['name'];
	$your_imgtt = time().'_'.$_FILES['your_img']['name'];

	$tt51 = "SELECT * FROM `tc_contact` WHERE `login_id` = '$_SESSION[id]'";
	$ee51 = mysqli_query($conn,$tt51);
	$count = mysqli_num_rows($ee51);
	if($count < 1){
		if($your_img != '')
		{
			//check file size here
			$file_size = $_FILES['your_img']['size'];
			//check file type here
			$file_type = $_FILES['your_img']['type'];
			if (($file_size > 2097152)){      
				$message = 'File too large. File must be less than 2 MB.'; 
				echo '<script type="text/javascript">alert("'.$message.'");</script>'; 
			}
			elseif (  
				($file_type != "image/jpeg") &&
				($file_type != "image/jpg") &&
				($file_type != "image/gif") &&
				($file_type != "image/png")    
			){
				$message = 'Invalid file type. Only JPG, JPEG, GIF and PNG types are accepted.'; 
				echo '<script type="text/javascript">alert("'.$message.'");</script>';         
			}
			else{   
				move_uploaded_file($_FILES['your_img']['tmp_name'],'../../images/'.$your_imgtt);
				$tablename = "tc_contact";
				$array = array(
					'name' => secureData($_POST['name']),
					'email' => secureData($_POST['email']),
					'mobile' => secureData($_POST['mobile']),
					'phone' => secureData($_POST['phone']),
					'address' => secureData($_POST['address']),
					'date_time' => secureData($date_time),
					'date' => secureData($date),
					'logo' => secureData($your_imgtt),
					'login_id' => secureData($_SESSION[id])
				);
				$inst = new InsertQuery();
				$inst->setInsert($tablename,$array);
				$logins = $inst->get_insertQuery();
				mysqli_query($conn,$logins);
				
				echo "<script>alert('Change website details successfully!');</script>";
				echo "<script>window.location.href='contact.php';</script>";
			}
		} else {
			$tablename = "tc_contact";
			$array = array(
				'name' => secureData($_POST['name']),
				'email' => secureData($_POST['email']),
				'mobile' => secureData($_POST['mobile']),
				'phone' => secureData($_POST['phone']),
				'address' => secureData($_POST['address']),
				'date_time' => secureData($date_time),
				'date' => secureData($date),
				'login_id' => secureData($_SESSION['id'])
			);
			$inst = new InsertQuery();
			$inst->setInsert($tablename,$array);
			$logins = $inst->get_insertQuery();
			mysqli_query($conn,$logins);
				
			echo "<script>alert('Change website details successfully!');</script>";
			echo "<script>window.location.href='contact.php';</script>";
		}
	}else{
		$message = 'You can only insert one time.'; 
		echo '<script type="text/javascript">alert("'.$message.'");</script>';         
	}
}
if(isset($_POST['del'])){
	$id = $_POST['del'];
	//unlink image from server
    $tt5 = "SELECT * FROM `tc_contact` WHERE `id` = '$id' AND `login_id` = '$_SESSION[id]'";
    $ee5 = mysqli_query($conn,$tt5);
    $qq5 = mysqli_fetch_array($ee5);
	unlink('../../images/'.$qq5['logo']);
	
	$tt = "DELETE FROM `tc_contact` WHERE `id` = '$id' AND `login_id` = '$_SESSION[id]'";
	mysqli_query($conn,$tt);

	echo "<script>alert('Deleted successfully!');</script>";
	echo "<script>window.location.href='contact.php';</script>";
}
if(isset($_POST['upd'])){
	$id = $_POST['upd'];
	$tt = "SELECT * FROM `tc_contact` WHERE `id` = '$id' AND `login_id` = '$_SESSION[id]'";
	$ee = mysqli_query($conn,$tt);
	$qq = mysqli_fetch_array($ee);
}else{
	$id = '';
}
if(isset($_POST['update']))
{
	$id = $_POST['update'];
	$name = str_replace("'", "\'", htmlspecialchars($_POST['name']));
	$email = str_replace("'", "\'", htmlspecialchars($_POST['email']));
    $mobile = str_replace("'", "\'", htmlspecialchars($_POST['mobile']));
    $phone = str_replace("'", "\'", htmlspecialchars($_POST['phone']));
    $address = str_replace("'", "\'", htmlspecialchars($_POST['address']));
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
		$date = date('Y-m-d');

	$your_img = $_FILES['your_img']['name'];
	$your_imgtt = time().'_'.$_FILES['your_img']['name'];

	if($your_img != '')
	{
		//check file size here
		$file_size = $_FILES['your_img']['size'];
		//check file type here
		$file_type = $_FILES['your_img']['type'];
		if (($file_size > 2097152)){      
			$message = 'File too large. File must be less than 2 MB.'; 
			echo '<script type="text/javascript">alert("'.$message.'");</script>'; 
		}
		elseif (  
			($file_type != "image/jpeg") &&
			($file_type != "image/jpg") &&
			($file_type != "image/gif") &&
			($file_type != "image/png")    
		){
			$message = 'Invalid file type. Only JPG, JPEG, GIF and PNG types are accepted.'; 
			echo '<script type="text/javascript">alert("'.$message.'");</script>';         
		}
		else{   
			//unlink image from server
			$tt5 = "SELECT * FROM `tc_contact` WHERE `id` = '$id'";
			$ee5 = mysqli_query($conn,$tt5);
			$qq5 = mysqli_fetch_array($ee5);
			unlink('../../images/'.$qq5['logo']);
			move_uploaded_file($_FILES['your_img']['tmp_name'],'../../images/'.$your_imgtt);

			$tablename = "tc_contact";
			$array = array(
				'name' => secureData($_POST['name']),
				'email' => secureData($_POST['email']),
				'mobile' => secureData($_POST['mobile']),
				'phone' => secureData($_POST['phone']),
				'address' => secureData($_POST['address']),
				'youtube' => secureData($_POST['youtube']),
				'facebook' => secureData($_POST['facebook']),
				'date_time' => secureData($date_time),
				'date' => secureData($date),
				'logo' => secureData($your_imgtt)
			);
			$whereclause = "`id` = '$id' AND `login_id` = '$_SESSION[id]'";

			$up = new updateQuery();
			$up->setUpdate($tablename,$array,$whereclause);
			$value = $up->get_updateQuery();
			mysqli_query($conn,$value);
			
			echo "<script>alert('Update successfully!');</script>";
			echo "<script>window.location.href='contact.php';</script>";
		}
	}else{

		$tablename = "tc_contact";
		$array = array(
			'name' => secureData($_POST['name']),
			'email' => secureData($_POST['email']),
			'mobile' => secureData($_POST['mobile']),
			'phone' => secureData($_POST['phone']),
			'address' => secureData($_POST['address']),
			'youtube' => secureData($_POST['youtube']),
			'facebook' => secureData($_POST['facebook']),
			'date_time' => secureData($date_time),
			'date' => secureData($date)
		);
		$whereclause = "`id` = '$id' AND `login_id` = '$_SESSION[id]'";

		$up = new updateQuery();
		$up->setUpdate($tablename,$array,$whereclause);
		$value = $up->get_updateQuery();
		mysqli_query($conn,$value);
		
		echo "<script>alert('Update successfully!');</script>";
		echo "<script>window.location.href='contact.php';</script>";
	}		
}
?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Manage Basic Details</b></h3>
					</div>
					<div class="box-body box box-info">
						<form method="post" enctype="multipart/form-data">
							<div class="col-md-12">
								<div class="form-group">
									<label for="email">Name</label>
									<input type="text" class="form-control" name="name" placeholder="Name" value="<?php if($id != ''){ echo $qq['name']; } ?>" >
								</div>  
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?php if($id != ''){ echo $qq['email']; } ?>" >
								</div>  
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="mobile">Mobile Number</label>
									<input type="number" class="form-control" name="mobile" placeholder="Mobile Number" value="<?php if($id != ''){ echo $qq['mobile']; } ?>" >
								</div>  
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="number" class="form-control" name="phone" placeholder="Phone" value="<?php if($id != ''){ echo $qq['phone']; } ?>" >
								</div>  
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="yt">Youtube Links</label>
									<input type="text" class="form-control" name="youtube" placeholder="Youtube Links" value="<?php if($id != ''){ echo $qq['youtube']; } ?>" >
								</div>  
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="fb">Facebook Links</label>
									<input type="text" class="form-control" name="facebook" placeholder="Facebook Links" value="<?php if($id != ''){ echo $qq['facebook']; } ?>" >
								</div>  
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="logo">Logo</label>
									<input type="file" class="form-control" name="your_img">
								</div>
							</div>
                            <?php if($id != '')
                            {?>
                                <div class="col-md-12" style="">	
                                    <?php 
                                        if($qq['logo'] !='') 
                                        { ?>
                                            <img src="../../images/<?php echo $qq['logo']; ?>" style="width:80px">
                                            <?php 
                                        } else
                                        {
                                            echo 'Image not found.';
                                        } 
                                    ?>
                                </div>
                                <?php
							}?> 
							<div class="col-md-12">
								<div class="form-group">
									<label for="exampleInputEmail1">Address</label>
									<textarea name="address" class="form-control" rows="3" placeholder="Enter Address..."><?php if($id != ''){ echo $qq['address']; } ?></textarea>
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
			<div class="col-md-8">	
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Update - Delete</b></h3>
					</div>
					<div class="box-body box box-info">
						<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
							  <tr>
								<th>S.No.</th>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Phone</th>
								<th>Youtube</th>
								<th>Facebook</th>
								<th>Address</th>
								<th>Logo</th>
								<th>Update</th>
								<th>Delete</th>
							  </tr>
							</thead>
							<tbody>
								<?php
									$vv1 = "SELECT * FROM `tc_contact` WHERE `login_id` = '$login_id'";
									$tt1 = mysqli_query($conn,$vv1);
									$nn1 = mysqli_fetch_array($tt1);
									if($nn1['id'] != ''){
								?>								
								<tr>
									<td>1</td>
									<td><?php echo $nn1['name'];?></td>
									<td><?php echo $nn1['email'];?></td>
									<td><?php echo $nn1['mobile'];?></td>
									<td><?php echo $nn1['phone'];?></td>
									<td><?php echo $nn1['youtube'];?></td>
									<td><?php echo $nn1['facebook'];?></td>
									<td><?php echo $nn1['address'];?></td>
									<td>
                                        <?php 
                                        if($nn1['logo'] !='') 
                                        { ?>
                                            <img src="../../images/<?php echo $nn1['logo']; ?>" style="width:80px">
                                            <?php 
                                        } else
                                        {
                                            echo 'Image not found.';
                                        } 
                                       ?>
                                    </td>
									<td><form method="post" action=""><button type="submit" name="upd" class="btn btn-success" value="<?php echo $nn1['id'];?>"><i class="fa fa-edit"></i></button></form></td>
									<td><form method="post" action=""><button type="submit" name="del" class="btn btn-danger" value="<?php echo $nn1['id'];?>" onClick="return confirm('Are you sure, you want to delete?')"><i class="fa fa-trash"></i></button></form></td>
								</tr>
								<?php
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
	