<?php include('superadmin/dbconnect.php');  session_start(); require('function/function.php');
    $domain_id = '29';
   
    $headerP = "SELECT * FROM `tc_contact` WHERE `login_id` = '$domain_id'";
    $headerPT = mysqli_query($conn,$headerP);
    $headerPTQ = mysqli_fetch_array($headerPT);
    

    $wep = "SELECT * FROM `user_registration` WHERE `id` = '$_SESSION[id]'";
	$we2p = mysqli_query($conn,$wep);
    $webp = mysqli_fetch_array($we2p);
    
    $userId = $_SESSION['id'];

    
    $qw = "SELECT * FROM `add_customer` WHERE `login_id` = '$domain_id'";
	$er = mysqli_query($conn,$qw);
    $tty = mysqli_fetch_array($er);
   
   
?>

<!DOCTYPE html>

<html class="csstransforms csstransforms3d csstransitions">
<head>
<title><?php echo $tty['website']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<meta name="description" content="" />
<meta name="keywords" content="" />
    

<!-- <link rel="shortcut icon" type="images/x-icon" href="images/favicon1.ico"> -->

<link rel="icon" type="image/ico" href="images/small-logo.png" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Animate css -->
<link href="css/animate.css" rel="stylesheet" type="text/css">
<!-- REVOLUTION SLIDER -->
<link rel="stylesheet" type="text/css" href="js/revolutionslider/rs-plugin/css/settings.css" media="screen" />
<link rel="stylesheet" type="text/css" href="js/revolutionslider/css/slider_main.css" media="screen" />

<!-- BUTTON Hover color -->
<link href="css/hover.css" rel="stylesheet" media="all">

<link href="css/responsive.css" rel="stylesheet">

<!-- Price css -->
 <link rel="stylesheet" href="css/price.css">
<!--  -->


<!-- testimonial css -->
 <link rel="stylesheet" href="css/testimonial.css">
 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.css'>
<!--  -->

<!-- Google fonts - witch you want to use - (rest you can just remove) -->
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700italic,700,600italic,600,400italic,300italic,300|Roboto:100,300,400,500,700&amp;subset=latin,latin-ext' type='text/css' />




<style>
    .social-links li a{
        width:100%;
    }
</style>

</head>



<!-- disable Ctrl+u -->
<script>
document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
};
$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});
</script>
<!-- //Disable Ctrl+U -->


