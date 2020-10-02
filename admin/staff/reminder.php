<?php include '../header.php'; ?>
<?php
	$tt = "SELECT * FROM `login` WHERE `user_id` = '$_SESSION[user_id]'";
	$ee = mysqli_query($conn,$tt);
	$qq = mysqli_fetch_array($ee);

    
    
?>
<style>
    .fromdt{
        color: white;
        background: #8f4ebf;
        padding: 5px;
        border-radius: 16px;
    }
</style>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
            <div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><b>Filter Reminder</b></h3>
					</div>
					<div class="box-body box box-info">
						<form class="" method="post" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mob2">From Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="from_dt" class="form-control pull-right datepicker" autocomplete="off">
                                    </div>
                                </div>  
                            </div>      
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mob2">To Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="to_dt" class="form-control pull-right datepicker" autocomplete="off">
                                    </div>
                                </div>  
                            </div>                           
							<div class="col-md-2 pull-left" style="margin-top: 4vh;">
                                <button type="submit" name="sub" class="btn btn-primary" >Submit</button>
							</div>
						</form>
					</div>	
				</div>
			</div>
            <?php
            if(isset($_POST['sub']))
            {  
                $dt1p =  $_POST['from_dt'];
                $dt1op = str_replace('/', '-', $dt1p);
                $from_dt = date('Y-m-d', strtotime($dt1op));
        
                $dt2p =  $_POST['to_dt'];
                $dt2op = str_replace('/', '-', $dt2p);
                $to_dt = date('Y-m-d', strtotime($dt2op));
        
               ?>
            
                <div class="col-md-12">	
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><b>Check Reminder [ From: <span class="fromdt"><?php echo $from_dt; ?></span> To: <span class="fromdt"><?php echo $to_dt; ?></span> ]</b></h3>
                        </div>
                        <div class="box-body box box-info">
                            <div class="table-responsive">
                            <table class="table table-bordered example1">
                                <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <?php
                                    if($qq['role'] == 'admin')
                                    {
                                        echo '<th>Staff Name</th>';
                                    }?>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Mobile Number 1</th>
                                    <th>Mobile Number 2</th>
                                    <th>Address</th>
                                    <th>Remark</th>
                                    <th>Reminder Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($qq['role'] == 'admin')
                                        {
                                            $a = "SELECT * FROM `tc_customer` WHERE `reminder` BETWEEN '$from_dt' and '$to_dt'";
                                            $tt1 = mysqli_query($conn,$a);
                                        }
                                        else
                                        {
                                            $a = "SELECT * FROM `tc_customer` WHERE `login_id` = '$qq[id]' AND `reminder` BETWEEN '$from_dt' and '$to_dt'";
                                            $tt1 = mysqli_query($conn,$a);
                                        }
                                        $i = 1;
                                        while($nn1 = mysqli_fetch_array($tt1)){

                                            if($qq['role'] == 'admin')
                                            {
                                                $m = "SELECT * FROM `login` WHERE `id` = '$nn1[login_id]'";
                                                $mj = mysqli_query($conn,$m);
                                                $pp = mysqli_fetch_array($mj);
                                                
                                                $checkstaff = mysqli_num_rows($mj);
                                            }
                                    ?>					
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <?php
                                        if($qq['role'] == 'admin')
                                        {
                                            if($checkstaff > 0){
    										echo "<td>".$pp['name']."</td>";
    									    }else{ echo "<td style='color:red'>".'Staff is deleted'."</td>";}
                                        }?>
                                        <td><?php echo $nn1['name'];?></td>
                                        <td><?php echo $nn1['email'];?></td>
                                        <td><?php echo $nn1['mob1'];?></td>
                                        <td><?php echo $nn1['mob2'];?></td>
                                        <td><?php echo $nn1['address'];?></td>
                                        <td><?php echo $nn1['remark'];?></td>
                                        <td><?php echo $nn1['reminder'];?></td>
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
                <?php
            } ?>
		</div>
	</section>
</div>
<?php include '../footer.php'; ?>
	