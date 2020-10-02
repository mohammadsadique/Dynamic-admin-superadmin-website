<?php include 'head-file.php';?>
<?php 
	if(isset($_POST['signin']))
	{
		$mobile = secureData($_POST['mobile']);
		$password = secureData($_POST['password']);
		
		$tt51 = "SELECT * FROM `user_registration` WHERE `mobile` = '$mobile' AND  `password` = '$password'";
		$ee51 = mysqli_query($conn,$tt51);
		$count = mysqli_num_rows($ee51);
		$mob = strlen($mobile);
		$pass = strlen($password);

		if($count == 0){
			$message = 'User not exist, please goto registration form.'; 
			echo '<script type="text/javascript">alert("'.$message.'");</script>';  
		}
		else if($mob != 10){
			$message = 'Incorrect number, please fill correct mobile number.'; 
			echo '<script type="text/javascript">alert("'.$message.'");</script>';   
		}
		else if($pass != 6){
			$message = 'Password must be in 6 digit.'; 
			echo '<script type="text/javascript">alert("'.$message.'");</script>';   
		} else {
			$query_ad1 = "SELECT * FROM `user_registration` WHERE mobile = '$mobile' AND  password = '$password' ";
			$run_ad1 = mysqli_query($conn,$query_ad1);
			$get1 = mysqli_fetch_assoc($run_ad1);
			$num_ad1 = mysqli_num_rows($run_ad1);
						
			$_SESSION['id'] = $get1['id'];

			$userId = $_SESSION['id']; 
			if($num_ad1 > '0')
			{

				echo "<script>window.location.href='index.php'</script>";
			}else{
				echo "<script>alert('Wrong username or password! Retry');</script>";
			}
		}
	} else {
		$mobile = '';
		$password = '';
	}	
?>



<body onload="loadermyFunction()">
<?php include 'header.php';?>



<section id="enquiry" class="choose-sec" >
	<div class="container">
		<div class="row">
			<div class="col-md-3 "></div>
			<div class="col-md-6 col-sm-12 " style="background: whitesmoke;">
				<div class="heading-block text-center" style="margin: 17px 0px 80px;">
					<h4 class="text-center">Login <span> Form</span></h4>
				</div>
				<div class="choose-text">
					<form action="" method="post">
						<div class="col-md-12 form-group">
							<label for="username">Mobile Number:</label>
							<input type="text" name="mobile" value="<?php echo $mobile; ?>" class="form-control" id="username" required>
						</div>
                        <div class="col-md-12 form-group">
							<label for="password">Password:</label>
							<input type="password" name="password" class="form-control" id="password" required>
						</div>						
						<button type="submit" name="signin" style="margin-left: 18px;" class="btn btn-success">Login</button>
					</form>
				</div>
			</div>		
		</div>
	</div>
</div>

</section>



<?php include 'footer.php';?>
