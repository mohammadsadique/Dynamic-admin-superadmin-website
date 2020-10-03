





<header id="header_wrapper" class="header">
<div class="container">
<div class="header_box">
<div class="logo">
	<a href="index.php"><img src="images/<?php echo $headerPTQ['logo']; ?>" alt=""/></a>         


</div>

<nav class="navbar navbar-inverse" role="navigation">
<div class="navbar-header">
<button type="button" id="nav-toggle" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
</div>


    <div id="main-nav" class="navbar-collapse navStyle collapse">
        <ul class="nav navbar-nav" id="mainNav">
            <li class=""><a href="index.php#hero_section">Home</a></li>
            <li><a href="index.php#about">About</a></li>
            <li><a href="#service">Our Product</a></li>         
            <li><a href="#contact">Contact</a></li>
            <li><a href="#enquiry">Enquiry</a></li>            
            <li><a href="#enquiry">Feedback</a></li>            
            <li><a href="registration.php" >Registration</a></li>  
            <li><a href="login.php">Login</a></li>    
            <?php
            if($userId != '')
            {   ?>
                <li><a href="#"><?php echo $webp['name']; ?></a></li>    
                <li><a href="logout.php"><i class="fa fa-sign-out"></i></a></li>    
                <?php
            }
            ?>
        </ul>
    </div>

</nav>
</div>
</div>
<div class="progress-bar" id="myBar"></div>
</header>


