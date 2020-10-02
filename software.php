<?php
	if(isset($_POST['productid'])){   
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
		$date = date('Y-m-d');


		$productid = secureData($_POST['productid']);

		$tablename = "tc_productenquery";
		$array = array(
			'domain_id' => secureData($domain_id),
			'userId' => secureData($userId),
			'productid' => secureData($productid),
			'date_time' => secureData($date_time),
			'date' => secureData($date)
		);


		$tt51 = "SELECT * FROM `tc_productenquery` WHERE `userId` = '$userId' AND `productid` = '$productid' AND `domain_id` = '$domain_id'";
		$ee51 = mysqli_query($conn,$tt51);
		$count = mysqli_num_rows($ee51);

		if($count > 0){
			$message = 'You already send enquiry for these product.'; 
			echo '<script type="text/javascript">alert("'.$message.'");</script>';  
		} else if($productid == '' && $domain_id == '' && $userId == ''){
			$message = 'Something got wrong, please you are login or not!'; 
			echo '<script type="text/javascript">alert("'.$message.'");</script>';  
		} else {
			$inst = new InsertQuery();
			$inst->setInsert($tablename,$array);
			$logins = $inst->get_insertQuery();
			mysqli_query($conn,$logins);

			$message = 'Thank you enquiry our product we will contact you soon!'; 
			echo '<script type="text/javascript">alert("'.$message.'");</script>';  
		}
	}

?>

<!--Service-->
<section id="service" class="services">
    <div class="container">
        <div class="heading-block" style="margin: 31px 0px 80px;">
            <h4>Our <span>Products</span></h4>
        </div>
        <?php
		

		$vv1 = "SELECT * FROM `tc_product` WHERE `login_id` = '$domain_id' ORDER BY id DESC";
		$tt1 = mysqli_query($conn,$vv1);
		$count = mysqli_num_rows($tt1);
		$i = 1;
		$mm ='';
		while($nn1 = mysqli_fetch_array($tt1))
		{
			if($i == 1){
				echo '<ul class="row list">';
				//echo $i;
			}
			if($i % 3 == 0){
				$mm = $i+1;
			}
			if($i == $mm){
				echo '<div class="clearfix"></div></ul><ul class="row list">';
				//echo $mm;
			}
?>
        <li class="col-md-4 wow bounceIn animated" style="visibility: visible; animation-delay: 0.1s;">
            <article class="thumb">
				<?php
				if($userId != ''){
					?>
					<a class="button colio-link" href="#">
						<i class=""><img src="images/product/<?php echo $nn1['image']; ?>" alt="TCSoftware"> </i>
						<h5><?php echo $nn1['title'];?></h5>
						<p><?php echo $nn1['description'];?></p>
						<span id="sendEnquiry">Send Enquiry</span>
						<input type="hidden" class="proid" value="<?php echo $nn1['id'];?>">
					</a>					
					<?php
					} else {
						?>
						<a class="button colio-link" href="login.php">
							<i class=""><img src="images/product/<?php echo $nn1['image']; ?>" alt="TCSoftware"> </i>
							<h5><?php echo $nn1['title'];?></h5>
							<p><?php echo $nn1['description'];?></p>
							<span>Enquiry</span>
						</a>
						<?php
					} ?>
            </article>
        </li>

        <?php

			
			if($i == $count){
				echo '<div class="clearfix"></div></ul>';
				// echo $i;
			}
			
			
			
			
			$i++;
		} ?>

    </div>
</section>
<form method="post" id="submitproductenquiry">
	<input type="hidden" class="productid" name="productid">
</form>

