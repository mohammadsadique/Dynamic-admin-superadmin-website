<?php include '../header.php'; ?>
<?php
	$tt = "SELECT * FROM `login` WHERE `user_id` = '$_SESSION[user_id]'";
	$ee = mysqli_query($conn,$tt);
    $qq = mysqli_fetch_array($ee);
    
if(isset($_POST['sub'])){   
    $login_id = $_SESSION['id'];
	$email = str_replace("'", "\'", htmlspecialchars($_POST['email']));
	$name = str_replace("'", "\'", htmlspecialchars($_POST['name']));
	$mob1 = str_replace("'", "\'", htmlspecialchars($_POST['mob1']));
    $mob2 = str_replace("'", "\'", htmlspecialchars($_POST['mob2']));
    $address = str_replace("'", "\'", htmlspecialchars($_POST['address']));
    $remark = str_replace("'", "\'", htmlspecialchars($_POST['remark']));

    $remind =  $_POST['reminder'];
    $reminder_changedate = str_replace('/', '-', $remind);
    $reminder = date('Y-m-d', strtotime($reminder_changedate));

	$your_img = $_FILES['your_img']['name'];
		$your_imgtt = time().'_'.$_FILES['your_img']['name'];
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
        $date = date('Y-m-d');
    
    
        $b = "INSERT INTO `tc_customer`(`login_id`,`name`, `email`,`mob1`, `mob2`, `address`, `remark`, `reminder`,  `date_time`, `date`) VALUES ('$login_id','$name','$email','$mob1','$mob2','$address','$remark','$reminder','$date_time','$date')";
        mysqli_query($conn,$b);
        echo "<script>alert('Customer added Successfully!');</script>";
        echo "<script>window.location.href='addcustomer.php';</script>";
      
    
	
}

if(isset($_POST['upd'])){
	$id = $_POST['upd'];
	$tt = "SELECT * FROM `tc_customer` WHERE `id` = '$id'";
	$ee = mysqli_query($conn,$tt);
	$qq = mysqli_fetch_array($ee);
}else{
	$id = '';
}

if(isset($_POST['update']))
{
	$id = $_POST['update'];
	$email = str_replace("'", "\'", htmlspecialchars($_POST['email']));
	$name = str_replace("'", "\'", htmlspecialchars($_POST['name']));
	$mob1 = str_replace("'", "\'", htmlspecialchars($_POST['mob1']));
    $mob2 = str_replace("'", "\'", htmlspecialchars($_POST['mob2']));
    $address = str_replace("'", "\'", htmlspecialchars($_POST['address']));
    $remark = str_replace("'", "\'", htmlspecialchars($_POST['remark']));

    $remind =  $_POST['reminder'];
    $reminder_changedate = str_replace('/', '-', $remind);
    $reminder = date('Y-m-d', strtotime($reminder_changedate));

		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
        $date = date('Y-m-d');
		
    $b = "UPDATE `tc_customer` SET `email`='$email',`name`='$name',`mob1`='$mob1',`mob2`='$mob2',`address`='$address',`remark`='$remark',`reminder`='$reminder',`date_time`='$date_time',`date`='$date' WHERE `id` = '$id'";
    mysqli_query($conn,$b);
    echo "<script>alert('Update successfully!');</script>";
    echo "<script>window.location.href='addcustomer.php';</script>";
   
	
}

?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Add Customer</b></h3>
					</div>
					<div class="box-body box box-info">
						<form class="" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php if($id != ''){ echo $qq['name']; } ?>" required>
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if($id != ''){ echo $qq['email']; } ?>" >
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mob1">Mobile Number 1</label>
                                    <input type="number" class="form-control" name="mob1" placeholder="Mobile Number 1" value="<?php if($id != ''){ echo $qq['mob1']; } ?>" required>
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mob2">Mobile Number 2</label>
                                    <input type="number" class="form-control" name="mob2" placeholder="Mobile Number 2" value="<?php if($id != ''){ echo $qq['mob2']; } ?>" >
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mob2">Address</label>
                                    <textarea name="address" class="form-control" rows="3" placeholder="Enter Address..."><?php if($id != ''){ echo $qq['address']; } ?></textarea>
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobremark2">Remark</label>
                                    <textarea name="remark" class="form-control" rows="3" placeholder="Enter Remark..."><?php if($id != ''){ echo $qq['remark']; } ?></textarea>
                                </div>  
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mob2">Reminder</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="reminder" value="<?php if($id != ''){ echo $qq['reminder']; } ?>" class="form-control pull-right datepicker">
                                    </div>
                                </div>  
                            </div>
							<div class="col-md-12"><hr></div>
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
			<div class="col-md-1"></div>           
		</div>
	</section>
</div>
<?php include '../footer.php'; ?>
	