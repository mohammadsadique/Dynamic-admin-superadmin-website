<?php include '../header.php'; ?>
<?php
	$tt = "SELECT * FROM `login` WHERE `user_id` = '$_SESSION[user_id]'";
	$ee = mysqli_query($conn,$tt);
	$qq = mysqli_fetch_array($ee);

if(isset($_POST['sub'])){    
	$name = str_replace("'", "\'", htmlspecialchars($_POST['name']));
	$user_id = str_replace("'", "\'", htmlspecialchars($_POST['user_id']));
    $pass = str_replace("'", "\'", htmlspecialchars($_POST['pass']));
    

	$your_img = $_FILES['your_img']['name'];
		$your_imgtt = time().'_'.$_FILES['your_img']['name'];
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone);
		$date_time = $date->format("M d, Y H:i:s"); 
        $date = date('Y-m-d');
    
    $tt = "SELECT * FROM `login` WHERE `user_id` = '$user_id'";
    $ee = mysqli_query($conn,$tt);
    $count = mysqli_num_rows($ee);
    if($count < 1)
    {
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
                move_uploaded_file($_FILES['your_img']['tmp_name'],'../../images/staff/'.$your_imgtt);
                $b = "INSERT INTO `login`( `role`, `name`, `user_id`, `pass`, `img`, `date_time`, `date`) VALUES ('staff','$name','$user_id','$pass','$your_imgtt','$date_time','$date')";
                mysqli_query($conn,$b);
                echo "<script>alert('Staff added Successfully!');</script>";
                echo "<script>window.location.href='addstaff.php';</script>";
            }
        }else{
            $b = "INSERT INTO `login`( `role`, `name`, `user_id`, `pass`,  `date_time`, `date`) VALUES ('staff','$name','$user_id','$pass','$date_time','$date')";
            mysqli_query($conn,$b);
            echo "<script>alert('Staff added Successfully!');</script>";
            echo "<script>window.location.href='addstaff.php';</script>";
        }
    }
    else{
        $message = 'User Id must be unique.'; 
        echo '<script type="text/javascript">alert("'.$message.'");</script>';     
    }
	
}


if(isset($_POST['upd'])){
	$id = $_POST['upd'];
	$tt = "SELECT * FROM `login` WHERE `id` = '$id'";
	$ee = mysqli_query($conn,$tt);
	$qq = mysqli_fetch_array($ee);
}else{
	$id = '';
}

if(isset($_POST['update']))
{
	$id = $_POST['update'];
	$name = str_replace("'", "\'", htmlspecialchars($_POST['name']));
	$user_id = str_replace("'", "\'", htmlspecialchars($_POST['user_id']));
    $pass = str_replace("'", "\'", htmlspecialchars($_POST['pass']));

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
             $tt5 = "SELECT * FROM `login` WHERE `id` = '$id'";
             $ee5 = mysqli_query($conn,$tt5);
             $qq5 = mysqli_fetch_array($ee5);
             unlink('../../images/staff/'.$qq5['img']);
             move_uploaded_file($_FILES['your_img']['tmp_name'],'../../images/staff/'.$your_imgtt);
             $b = "UPDATE `login` SET `name`='$name',`user_id`='$user_id',`pass`='$pass',`img`='$your_imgtt',`date_time`='$date_time',`date`='$date' WHERE `id` = '$id'";
             mysqli_query($conn,$b);
             echo "<script>alert('Update successfully!');</script>";
             echo "<script>window.location.href='addstaff.php';</script>";
        }
    }else{
        $b = "UPDATE `login` SET `name`='$name',`user_id`='$user_id',`pass`='$pass',`date_time`='$date_time',`date`='$date' WHERE `id` = '$id'";
        mysqli_query($conn,$b);
        echo "<script>alert('Update successfully!');</script>";
        echo "<script>window.location.href='addstaff.php';</script>";
    }
	
}

if(isset($_POST['del'])){
    $id = $_POST['del'];
    //unlink image from server
    $tt5 = "SELECT * FROM `login` WHERE `id` = '$id'";
    $ee5 = mysqli_query($conn,$tt5);
    $qq5 = mysqli_fetch_array($ee5);
    unlink('../../images/staff/'.$qq5['img']);

	$tt = "DELETE FROM `login` WHERE `id` = '$id'";
	mysqli_query($conn,$tt);

	echo "<script>alert('Deleted successfully!');</script>";
	echo "<script>window.location.href='addstaff.php';</script>";
}
?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Add Staff</b></h3>
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
                                <label for="exampleInputEmail1">User Id</label>
                                    <input type="text" class="form-control" name="user_id" placeholder="User Id" value="<?php if($id != ''){ echo $qq['user_id']; } ?>" <?php if($id != ''){ echo 'readonly'; } ?> required>
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control" name="pass" placeholder="Password" value="<?php if($id != ''){ echo $qq['pass']; } ?>" required>
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image</label>
                                    <input type="file" class="form-control" name="your_img">
                                </div>  
                            </div>
                            <?php if($id != '')
                            {?>
                                <div class="col-md-3" style="">	
                                    <?php 
                                        if($qq['img'] !='') 
                                        { ?>
                                            <img src="../../images/staff/<?php echo $qq['img']; ?>" style="width:120px">
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
            <div class="col-md-12">	
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Manage Staff</b></h3>
					</div>
					<div class="box-body box box-info">
                        <div class="table-responsive">
						<table class="table table-bordered example1">
							<thead>
							  <tr>
								<th>S.No.</th>
								<th>Name</th>
								<th>User Id</th>
								<th>Password</th>
								<th>Image</th>
								<th>Date-Time</th>
								<th>Update</th>
								<th>Delete</th>
							  </tr>
							</thead>
							<tbody>
								<?php
									$vv1 = "SELECT * FROM `login` WHERE `role` != 'admin' ORDER BY id DESC";
									$tt1 = mysqli_query($conn,$vv1);
									$i = 1;
									while($nn1 = mysqli_fetch_array($tt1)){
								?>					
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $nn1['name'];?></td>
									<td><?php echo $nn1['user_id'];?></td>
									<td><?php echo $nn1['pass'];?></td>
									<td>
                                        <?php 
                                        if($nn1['img'] !='') 
                                        { ?>
                                            <img src="../../images/staff/<?php echo $nn1['img']; ?>" style="width:120px">
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
	