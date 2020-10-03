<?php session_start(); include('../../dbconnect.php');
	require('../../function/function.php');
if(!empty($_SESSION['id'])){}
else
{
	header('location:../login.php');
}
?>
<?php
	$tt = "SELECT * FROM `login` WHERE `id` = '$_SESSION[id]'";
	$ee = mysqli_query($conn,$tt);
	$qq = mysqli_fetch_array($ee);

	$we = "SELECT * FROM `tc_contact` WHERE `login_id` = '$_SESSION[id]'";
	$we2 = mysqli_query($conn,$we);
	$web = mysqli_fetch_array($we2);


	$wep = "SELECT * FROM `add_customer` WHERE `login_id` = '$_SESSION[id]'";
	$we2p = mysqli_query($conn,$wep);
	$webp = mysqli_fetch_array($we2p);

	$login_id = secureData($_SESSION['id']);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="icon" type="image/ico" href="../../images/small-logo.png" />
		<title>Management Desk</title>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
		<link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
		<link rel="stylesheet" href="../plugins/iCheck/all.css">
		<link rel="stylesheet" href="../plugins/select2/select2.min.css">
		<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="../multiselect/dist/css/bootstrap-multiselect.css" type="text/css"/>
		<link href="../sweetalert2/sweetalert.css" rel="stylesheet" />
		<link rel="icon" type="image/png" href="img/durga logo.png">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			li_bgclr {
				background-color:rgba(243, 174, 18, 0.56);
			}
		</style>
	</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
	<header class="main-header">
		<a href="" class="logo">
			<span class="logo-mini"><b>MP</b></span>
			<span class="logo-lg" style="font-size: 90%;"><b>Manage Panel</b></span>
		</a>
		<nav class="navbar navbar-static-top">
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<ul class="nav navbar-nav" style="margin-top: 3px;font-size: 26px;color: white;">
				<li class="user-header">
					<div class="pull-left">
						<a href="#" style="color: white;font-weight: bold;">
							<?php
								if($login_id != ''){ echo $web['name']; }
							?>
						</a>
					</div>
				</li>
			</ul>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="../img/<?php if($webp['img'] !=''){ echo $webp['img']; }else{ echo 'img_not_delete/dummy.png';}?>" class="user-image" >
							<span class="hidden-xs"><?php if($login_id != ''){ echo $web['name']; } ?></span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<img src="../img/<?php if($webp['img'] !='') { echo $webp['img']; } else { echo 'img_not_delete/dummy.png';} ?>" class="img-circle">
								<p>
									<?php if($login_id != ''){ echo 'Name : '.$web['name']; } ?>
									<small><?php if($login_id != ''){ echo 'Mobile : '.$web['mobile']; } ?></small>
								</p>
							</li>
							<li class="user-footer">
								<div class="pull-left">
									<a href="../home/profile.php" class="btn btn-default btn-flat bg-green">Profile</a>
								</div>
								<div class="pull-right">
									<a href="../logout.php" class="btn btn-default btn-flat bg-blue" style="">Sign out</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div> 
		</nav>
	</header>
	<aside class="main-sidebar">
		<section class="sidebar">
			<div class="user-panel">
				<div class="pull-left image">
					<img src="../img/<?php if($webp['img'] !='') { echo $webp['img']; }else{ echo 'img_not_delete/dummy.png';}?>" class="img-circle" alt="User Image" style="max-width: ;height:;">
				</div>
				<div class="pull-left info">
					<p><?php echo $webp['name'];?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			  </div>
			<ul class="sidebar-menu">
				<li class="header">MAIN NAVIGATION</li>
				<?php
				$a = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
				$b = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
				$c = $_SERVER['SERVER_NAME'];
				 ?>
					<li <?php if( $a == $b.'/dashboard.php' ){ echo "class='active'"; }?>>
						<a href="../home/dashboard.php">
							<i class="fa fa-tachometer" aria-hidden="true"></i> <span>Dashboard</span>
							<span class="pull-right-container">
								<small class="label pull-right bg-green"></small>
							</span>
						</a>
					</li>
					<li <?php if( $a == $b.'/contact.php' ){ echo "class='active'"; }?>>
						<a href="../home/contact.php">
							<i class="fa fa-address-card" aria-hidden="true"></i> <span>Manage Basic Details</span>
							<span class="pull-right-container">
								<small class="label pull-right bg-green"></small>
							</span>
						</a>
					</li>
					<li <?php if( $a == $b.'/bannerslider.php' ){ echo "class='active'"; }?>>
						<a href="../home/bannerslider.php">
							<i class="fa fa-sliders" aria-hidden="true"></i> <span>Banner Slider</span>
							<span class="pull-right-container">
								<small class="label pull-right bg-green"></small>
							</span>
						</a>
					</li>
					<li <?php if( $a == $b.'/about.php' ){ echo "class='active'"; }?>>
						<a href="../home/about.php">
							<i class="fa fa-shield" aria-hidden="true"></i> <span>About US</span>
							<span class="pull-right-container">
								<small class="label pull-right bg-green"></small>
							</span>
						</a>
					</li>					
					<li <?php if( $a == $b.'/ourproduct.php' ){ echo "class='active'"; }?>>
						<a href="../product/ourproduct.php">
							<i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Our Product</span>
							<span class="pull-right-container">
								<small class="label pull-right bg-green"></small>
							</span>
						</a>
					</li>
					<li <?php if( $a == $b.'/feedback.php' ){ echo "class='active'"; }?>>
						<a href="../home/feedback.php">
							<i class="fa fa-comments-o" aria-hidden="true"></i> <span>Feedback</span>
							<span class="pull-right-container">
								<small class="label pull-right bg-green"></small>
							</span>
						</a>
					</li>
					<li <?php if( $a == $b.'/enquiry.php' ){ echo "class='active'"; }?>>
						<a href="../home/enquiry.php">
							<i class="fa fa-question-circle" aria-hidden="true"></i> <span>Enquiry</span>
							<span class="pull-right-container">
								<small class="label pull-right bg-green"></small>
							</span>
						</a>
					</li>
					<li <?php if( $a == $b.'/userregistration.php' ){ echo "class='active'"; }?>>
						<a href="../home/userregistration.php">
							<i class="fa fa-users" aria-hidden="true"></i> <span>User Registration</span>
							<span class="pull-right-container">
								<small class="label pull-right bg-green"></small>
							</span>
						</a>
					</li>
					<li <?php if( $a == $b.'/productenquiry.php' ){ echo "class='active'"; }?>>
						<a href="../product/productenquiry.php">
							<i class="fa fa-product-hunt" aria-hidden="true"></i> <span>User Product Enquiry</span>
							<span class="pull-right-container">
								<small class="label pull-right bg-green"></small>
							</span>
						</a>
					</li>
					<li <?php if( $a == $b.'/officetime.php' ){ echo "class='active'"; }?>>
						<a href="../home/officetime.php">
							<i class="fa fa-building-o" aria-hidden="true"></i> <span>Office Timing</span>
							<span class="pull-right-container">
								<small class="label pull-right bg-green"></small>
							</span>
						</a>
					</li>
					<li <?php if( $a == $b.'/profile.php' ){ echo "class='active'"; }?>>
						<a href="../home/profile.php">
							<i class="fa fa-user" aria-hidden="true"></i> <span>Profile</span>
							<span class="pull-right-container">
								<small class="label pull-right bg-green"></small>
							</span>
						</a>
					</li>
					
					<li>
						<a href="../logout.php">	
							<i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span>
							<span class="pull-right-container">
								<small class="label pull-right bg-green"></small>
							</span>
						</a>
					</li>
				
			</ul>
		</section>
	</aside>
 