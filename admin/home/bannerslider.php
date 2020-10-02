<?php include '../header.php'; ?>
<?php
if(isset($_POST['sub'])){    
	$altname = secureData($_POST['altname']);
	
	$your_img = $_FILES['your_img']['name'];
		$your_imgtt = time().'_'.$_FILES['your_img']['name'];
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
        $date = date('Y-m-d');
   
	if($your_img != ''){
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
        else 
        {
            move_uploaded_file($_FILES['your_img']['tmp_name'],'../../images/sliders/'.$your_imgtt);
            $b = "INSERT INTO `tc_banner`( `login_id`,`altname`, `image`, `date_time`, `date`) VALUES ('$login_id','$altname','$your_imgtt','$date_time','$date')";
            mysqli_query($conn,$b);
            echo "<script>alert('Banner added Successfully!');</script>";
	        echo "<script>window.location.href='bannerslider.php';</script>";
        }
	} else {
		$b = "INSERT INTO `tc_banner`( `login_id`,`altname`, `date_time`, `date`) VALUES ('$login_id','$altname','$date_time','$date')";
        mysqli_query($conn,$b);
        echo "<script>alert('Banner added Successfully!');</script>";
	    echo "<script>window.location.href='bannerslider.php';</script>";
	}

	
}


if(isset($_POST['upd'])){
	$id = $_POST['upd'];
	$tt = "SELECT * FROM `tc_banner` WHERE `id` = '$id' AND login_id = '$login_id' ";
	$ee = mysqli_query($conn,$tt);
	$qq = mysqli_fetch_array($ee);
} else {
	$id = '';
}

if(isset($_POST['update']))
{
	$id = $_POST['update'];
	$altname = secureData($_POST['altname']);
	$your_img = $_FILES['your_img']['name'];
		$your_imgtt = time().'_'.$_FILES['your_img']['name'];
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
        $date = date('Y-m-d');
		
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
        else 
        {
             //unlink image from server
             $tt5 = "SELECT * FROM `tc_banner` WHERE `id` = '$id' AND login_id = '$login_id'";
             $ee5 = mysqli_query($conn,$tt5);
             $qq5 = mysqli_fetch_array($ee5);
             unlink('../../images/sliders/'.$qq5['image']);
             move_uploaded_file($_FILES['your_img']['tmp_name'],'../../images/sliders/'.$your_imgtt);
             $b = "UPDATE `tc_banner` SET  `altname`='$altname',`image`='$your_imgtt',`date_time`='$date_time',`date`='$date' WHERE `id` = '$id' AND login_id = '$login_id'";
             mysqli_query($conn,$b);
             echo "<script>alert('Update successfully!');</script>";
             echo "<script>window.location.href='bannerslider.php';</script>";
        }
    } else {
        $b = "UPDATE `tc_banner` SET `altname`='$altname',`date_time`='$date_time',`date`='$date' WHERE `id` = '$id' AND login_id = '$login_id'";
        mysqli_query($conn,$b);
        echo "<script>alert('Update successfully!');</script>";
        echo "<script>window.location.href='bannerslider.php';</script>";
    }
	
}

if(isset($_POST['del'])){
    $id = $_POST['del'];
    //unlink image from server
    $tt5 = "SELECT * FROM `tc_banner` WHERE `id` = '$id' AND `login_id` = '$login_id' ";
    $ee5 = mysqli_query($conn,$tt5);
    $qq5 = mysqli_fetch_array($ee5);
    unlink('../../images/sliders/'.$qq5['image']);

	$tt = "DELETE FROM `tc_banner` WHERE `id` = '$id' AND `login_id` = '$login_id' ";
	mysqli_query($conn,$tt);

	echo "<script>alert('Deleted successfully!');</script>";
	echo "<script>window.location.href='bannerslider.php';</script>";
}
?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Banner Slider</b></h3>
					</div>
					<div class="box-body box box-info">
						<form class="" method="post" enctype="multipart/form-data">
							<div class="col-md-3" style="">	
								<input type="text" class="form-control" name="altname" placeholder="Alternate Name" value="<?php if($id != ''){ echo $qq['altname']; } ?>">
							</div>
							<div class="col-md-4" style="">	
								<input type="file" class="form-control" name="your_img">
							</div>
                            <?php if($id != '')
                            {?>
                                <div class="col-md-3" style="">	
                                    <?php 
                                        if($qq['image'] !='') 
                                        { ?>
                                            <img src="../../images/sliders/<?php echo $qq['image']; ?>" style="width:80px">
                                            <?php 
                                        } else
                                        {
                                            echo 'Image not found.';
                                        } 
                                    ?>
                                </div>
                                <?php
							}?> 
							<div class="col-md-12" style=""><br>
                                <p><strong>Note:</strong></p>
                                <p>* File must be less than 2 MB.</p>
                                <p>* Only JPG, JPEG, GIF and PNG types are accepted.</p>
                                <p>- Image dimension must be 800 * 338 pixel.</p>
                                <hr>
                            </div>
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
			<div class="col-md-12"></div>
			<div class="col-md-1"></div>
            <div class="col-md-10">	
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Manage Banner Silder</b></h3>
					</div>
					<div class="box-body box box-info">
						<div class="table-responsive">
						<table class="table table-bordered example1">
							<thead>
							  <tr>
								<th>S.No.</th>
								<th>Alternate Name</th>
								<th>Image</th>
								<th>Date-Time</th>
								<th>Update</th>
								<th>Delete</th>
							  </tr>
							</thead>
							<tbody>
								<?php
									$vv1 = "SELECT * FROM `tc_banner` WHERE `login_id` = '$login_id' ORDER BY id DESC";
									$tt1 = mysqli_query($conn,$vv1);
									$i = 1;
									while($nn1 = mysqli_fetch_array($tt1)){
								?>					
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $nn1['altname'];?></td>
									<td>
                                        <?php 
                                        if($nn1['image'] !='') 
                                        { ?>
                                            <img src="../../images/sliders/<?php echo $nn1['image']; ?>" style="width:80px">
                                            <?php 
                                        } else
                                        {
                                            echo 'Image not found.';
                                        } 
                                       ?>
                                    </td>
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
	