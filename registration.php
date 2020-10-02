<?php include 'head-file.php';?>
<?php
	if(isset($_POST['regist'])){   
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
		$date = date('Y-m-d');

		$name = secureData($_POST['name']);
		$email = secureData($_POST['email']);
		$mobile = secureData($_POST['mobile']);
		$password = secureData($_POST['password']);

		$tablename = "user_registration";
		$array = array(
			'domain_id' => secureData($domain_id),
			'name' => secureData($_POST['name']),
			'email' => secureData($_POST['email']),
			'mobile' => $mobile,
			'password' => secureData($_POST['password']),
			'date_time' => secureData($date_time),
			'date' => secureData($date)
		);

		$tt51 = "SELECT * FROM `user_registration` WHERE `mobile` = '$mobile'";
		$ee51 = mysqli_query($conn,$tt51);
		$count = mysqli_num_rows($ee51);

		//number check digit upto 10
		$mob = strlen($mobile);
		$pass = strlen($password);

		if($count > 0){
			$message = 'Mobile number already exist, please try again.'; 
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
			$inst = new InsertQuery();
			$inst->setInsert($tablename,$array);
			$logins = $inst->get_insertQuery();
			mysqli_query($conn,$logins);

			echo "<script>alert('Thank you for registration, please click to OK to go for login page.');</script>";
			echo "<script>window.location.href='login.php';</script>";
		}
	} else {
		$name = '';
		$mobile = '';
		$email = '';
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
					<h4 class="text-center">Registration <span> Form</span></h4>
				</div>
				<div class="choose-text">
					<form method="post">
						<div class="col-md-6 form-group">
							<label for="name">Full Name:</label>
							<input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="name" required>
						</div>
                        <div class="col-md-6 form-group">
							<label for="num">Mobile Number:</label>
							<input type="number" name="mobile" value="<?php echo $mobile; ?>" class="form-control" id="num" required>
						</div>
						<div class="col-md-6 form-group">
							<label for="email">Email address:</label>
							<input type="email" name="email" value="<?php echo $email; ?>" class="form-control" id="email">
						</div>
                        <div class="col-md-6 form-group">
							<label for="pass">Password:</label>
							<input type="password" name="password" value="<?php echo $password; ?>" class="form-control" id="pass" required>
						</div>						
						<button type="submit" name="regist" style="margin-left: 18px;" class="btn btn-primary">Registration</button>
					</form>
				</div>
			</div>		
		</div>
	</div>
</div>

</section>



<?php include 'footer.php';?>
