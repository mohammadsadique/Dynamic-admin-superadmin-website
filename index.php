<?php include 'head-file.php';?>
<?php
	if(isset($_POST['feedback'])){   
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
		$date = date('Y-m-d');

		$name = secureData($_POST['name']);
		$email = secureData($_POST['email']);
		$mobile = secureData($_POST['mobile']);
		$msg = secureData($_POST['msg']);

		$tablename = "tc_feedback";
		$array = array(
			'domain_id' => secureData($domain_id),
			'name' => secureData($_POST['name']),
			'email' => secureData($_POST['email']),
			'mobile' => $mobile,
			'msg' => secureData($_POST['msg']),
			'date_time' => secureData($date_time),
			'date' => secureData($date)
		);

		$mob = strlen($mobile);

		if($mob != 10){
			$message = 'Incorrect number, please fill correct mobile number.'; 
			echo '<script type="text/javascript">alert("'.$message.'");</script>';   
		
		} else {
			$inst = new InsertQuery();
			$inst->setInsert($tablename,$array);
			$logins = $inst->get_insertQuery();
			mysqli_query($conn,$logins);

			echo "<script>alert('Thank you for your feedback.');</script>";
			echo "<script>window.location.href='index.php';</script>";
		}
	}

	if(isset($_POST['enquiry'])){   
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
		$date = date('Y-m-d');

		$name = secureData($_POST['name']);
		$email = secureData($_POST['email']);
		$mobile = secureData($_POST['mobile']);
		$msg = secureData($_POST['msg']);

		$tablename = "tc_enquiry";
		$array = array(
			'domain_id' => secureData($domain_id),
			'name' => secureData($_POST['name']),
			'email' => secureData($_POST['email']),
			'mobile' => $mobile,
			'msg' => secureData($_POST['msg']),
			'date_time' => secureData($date_time),
			'date' => secureData($date)
		);

		$mob = strlen($mobile);

		if($mob != 10){
			$message = 'Incorrect number, please fill correct mobile number.'; 
			echo '<script type="text/javascript">alert("'.$message.'");</script>';   
		
		} else {
			$inst = new InsertQuery();
			$inst->setInsert($tablename,$array);
			$logins = $inst->get_insertQuery();
			mysqli_query($conn,$logins);

			echo "<script>alert('Thank you for your enquiry.');</script>";
			echo "<script>window.location.href='index.php';</script>";
		}
	}

?>




<body onload="loadermyFunction()">
<?php include 'header.php';?>
	<!--Slider_Section-->
	<section id="hero_section" class="top_cont_outer">
		<div class="container_full">
			<div class="tp-banner-container">
				<div class="tp-banner" >
					<ul>
						<?php
						$vv1 = "SELECT * FROM `tc_banner` WHERE `login_id` = '$domain_id' ORDER BY id DESC";
						$tt1 = mysqli_query($conn,$vv1);
						while($nn1 = mysqli_fetch_array($tt1))
						{ ?>		
							<li data-transition="fade" data-slotamount="7" data-masterspeed="100" >
								<img src="images/sliders/<?php echo $nn1['image']; ?>" alt="<?php echo $nn1['altname'];?>"  data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" background="(126, 140, 152) none repeat scroll 0% 0%)">
							</li>
							<?php
						} ?>
					</ul>
					<div class="tp-bannertimer"></div>
				</div>
			</div>
		</div>  
	</section>
	<div id="about" class="middle_section" >
		<div class="container">
			<h2><strong>About Us</strong></h2>
		
			<?php
			$aq = "SELECT * FROM `tc_about` WHERE `login_id` = '$domain_id' ORDER BY id DESC";
			$sw = mysqli_query($conn,$aq);
			$i = 1;
			while($de = mysqli_fetch_array($sw)){
				?>		
				<div class="row" style="margin: 65px 0px 80px;">
					<div class="col-md-8 col-sm-8 col-xs-12 wow bounceInLeft animated"style="visibility: visible; animation-delay: 0.1s;">
						<div class="content_left" >
							
							<p><?php echo $de['description']; ?> </p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<ul class="fullimage_box last">
							<li><img src="images/about/<?php echo $de['image']; ?> " alt="About Phelix Info"></li>
						</ul>
					</div>
				</div>
				<?php
				$i++;
			}?>


		</div>	
	</div>
	<?php include 'software.php'; ?>
	<section id="contact" class="top_cont_outer" style="margin: 17px 0px 80px;">
	<!-- contact-section -->
    <div  class="contact-section wow bounceInLeft animated" style="visibility: visible; animation-delay: 0.1s;">
        <div class="container"> 
            <div class="contact-inner">
                <div class="row">
				<div class="heading-block text-center" style="margin: 17px 0px 80px;">
					<h4 class="text-center">Contact <span> Us</span></h4>
				</div>
                    <div class="col-md-4 col-xs-6">
                        <div class="contact" data-aos="zoom-in">
                            <i class="fa fa-envelope"></i>
                            <h4 class="email">Email</h4>
                            <a href="mailto:<?php echo $headerPTQ['emaill']; ?>"><?php echo $headerPTQ['email']; ?></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <div class="contact" data-aos="zoom-in">
                            <i class="fa fa-phone"></i>
                            <h4 class="phone">Mobile Number</h4>
                            <a href="tel:+91<?php echo $headerPTQ['mobile']; ?>">+91 <?php echo $headerPTQ['mobile']; ?></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <div class="contact" data-aos="zoom-in">
                            <i class="fa fa-phone"></i>
                            <h4 class="phone">Phone</h4>
                            <a href="tel:+<?php echo $headerPTQ['phone']; ?>"><?php echo $headerPTQ['phone']; ?></a>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>

	</section>
<!-- choose Section Section ---->
<section id="enquiry" class="choose-sec" style="margin: 17px 0px 80px;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12 " style="background: whitesmoke;">
				<div class="heading-block text-center" style="margin: 17px 0px 80px;">
					<h4 class="text-center">FeedBack <span> Form</span></h4>
				</div>
				<div class="choose-text">
					<form method="post">
						<div class="col-md-12 form-group">
							<label for="name">Full Name:</label>
							<input type="text" name="name" class="form-control" id="name">
						</div>
						<div class="col-md-6 form-group">
							<label for="email">Email address:</label>
							<input type="email" name="email" class="form-control" id="email">
						</div>
						<div class="col-md-6 form-group">
							<label for="num">Mobile Number:</label>
							<input type="number" name="mobile" class="form-control" id="num">
						</div>
						<div class="col-md-12 form-group">
							<label for="comment">Enter Message:</label>
							<textarea  name="msg" class="form-control" rows="5" id="comment"></textarea>
						</div>
						<button type="submit" name="feedback" style="margin-left: 18px;" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>			
			<div class="col-md-6 col-sm-12 ">
				<div class="heading-block text-center" style="margin: 17px 0px 80px;">
					<h4 class="text-center">Enquiry <span> Form</span></h4>
				</div>
				<div class="choose-text">
				<form method="post">
						<div class="col-md-12 form-group">
							<label for="name">Full Name:</label>
							<input type="text" name="name" class="form-control" id="name">
						</div>
						<div class="col-md-6 form-group">
							<label for="email">Email address:</label>
							<input type="email" name="email" class="form-control" id="email">
						</div>
						<div class="col-md-6 form-group">
							<label for="num">Mobile Number:</label>
							<input type="number" name="mobile" class="form-control" id="num">
						</div>
						<div class="col-md-12 form-group">
							<label for="comment">Enter Message:</label>
							<textarea  name="msg" class="form-control" rows="5" id="comment"></textarea>
						</div>
						<button type="submit" name="enquiry" style="margin-left: 18px;" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

</section>






<?php include 'footer.php';?>
