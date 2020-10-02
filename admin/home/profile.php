<?php include '../header.php'; ?>
<?php
	if(isset($_POST['profile'])){
		$your_img = $_FILES['your_img']['name'];
		$your_imgtt = time().'_'.$_FILES['your_img']['name'];

			$tablename = "add_customer";
			$whereclause = "`login_id` = '$login_id'";

		if($your_img != ''){
			move_uploaded_file($_FILES['your_img']['tmp_name'],'../img/'.$your_imgtt);

			$array = array(
				'name' => secureData($_POST['name']),
				'email' => secureData($_POST['email']),
				'website' => secureData($_POST['website']),
				'mobile' => secureData($_POST['mobile']),
				'img' => secureData($your_imgtt)
			);


			$up = new updateQuery();
			$up->setUpdate($tablename,$array,$whereclause);
			$value = $up->get_updateQuery();
			mysqli_query($conn,$value);


			// $basic_detail = "UPDATE `login` SET `pass`= '$pass' ,`name` = '$name' ,`img`= '$your_imgtt' WHERE `user_id` = '$_SESSION[user_id]'";
			// mysqli_query($conn,$basic_detail);
		} else {

			$array = array(
				'name' => secureData($_POST['name']),
				'email' => secureData($_POST['email']),
				'website' => secureData($_POST['website']),
				'mobile' => secureData($_POST['mobile'])
			);

			$up = new updateQuery();
			$up->setUpdate($tablename,$array,$whereclause);
			$value = $up->get_updateQuery();
			mysqli_query($conn,$value);

			// $basic_detail = "UPDATE `login` SET `pass`= '$pass' ,`name` = '$name'  WHERE `user_id` = '$_SESSION[user_id]'";
			// mysqli_query($conn,$basic_detail);
		}

		echo "<script>alert('Your Profile Updated Successfully!');</script>";
		echo "<script>window.location.href='profile.php';</script>";
	}

	if(isset($_POST['setpass'])){
		$tablename = "login";
		$whereclause = "`id` = '$login_id'";
		$array = array(
			'password' => secureData($_POST['password'])			
		);
		$up = new updateQuery();
		$up->setUpdate($tablename,$array,$whereclause);
		$value = $up->get_updateQuery();
		mysqli_query($conn,$value);

		echo "<script>alert('Password change successfully!');</script>";
		echo "<script>window.location.href='profile.php';</script>";
	}

	$Op = "SELECT * FROM `add_customer` WHERE `login_id` = '$login_id'";
	$UL = mysqli_query($conn,$Op);
	$ki = mysqli_fetch_array($UL);
?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Manage Profile</b></h3>
					</div>
					<div class="box-body box box-info">
						<form class="" method="post" enctype="multipart/form-data">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Name</label>
									<input type="text" class="form-control" name="name" value="<?php  echo $ki['name']; ?>">
								</div>  
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">mobile</label>
									<input type="number" class="form-control" name="mobile" value="<?php  echo $ki['mobile']; ?>">
								</div>  
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Email</label>
									<input type="email" class="form-control" name="email" value="<?php  echo $ki['email']; ?>">
								</div>  
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Website</label>
									<input type="text" class="form-control" name="website" value="<?php echo $ki['website']; ?>">
								</div>  
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Image</label>
									<input type="file" class="form-control" name="your_img">
								</div>  
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<img src="../img/<?php if($ki['img'] !='') { echo $ki['img']; }else{ echo 'img_not_delete/dummy.png';}?>" style="width:100px">
								</div>  
							</div>
							<div class="col-md-12" style=""><hr></div>
							<div class="col-md-2 pull-left" style="">
								<button type="submit" value="<?php if($login_id != ''){ echo $ki['id']; } ?>" name="profile" class="btn btn-info" >Update Profile</button>
							</div>
						</form>
					</div>	
				</div>
			</div>
			<div class="col-md-4">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Login Credential</b></h3>
					</div>
					<div class="box-body box box-info">
						<form class="" method="post" enctype="multipart/form-data">
							<div class="col-md-12">
								<div class="form-group">
									<label for="exampleInputEmail1">Name</label>
									<input type="text" class="form-control" value="<?php  echo $qq['username']; ?>" readonly>
								</div>  
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="exampleInputEmail1">Change Password</label>
									<input type="text" name="password" class="form-control" value="<?php  echo $qq['password']; ?>">
								</div>  
							</div>
							<div class="col-md-2 pull-left" style="">
								<button type="submit" name="setpass" class="btn btn-info" >Change Password</button>
							</div>
						</form>
					</div>	
				</div>
			</div>
		</div>
	</section>
</div>
<?php include '../footer.php'; ?>
	