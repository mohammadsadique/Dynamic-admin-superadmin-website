
<div class="main-footer">
	<div class="container">
	<div class="row">
        <div class="col-md-4 col-xs-12 col-sm-3">
            <h4 class="general-features">Address</h4>
            <ul class="general-features">
                <li><a href="javascript:void(0)"><?php echo $headerPTQ['address']; ?></a></li>
                <li style="font-size:20px;margin-bottom:10px;font-weight: 900;"><?php echo $headerPTQ['name']; ?> <span class="number-name"></span></li>
                <li><a href="tel:+91-79872 78970"><i class="fa fa-phone"></i> +91-<?php echo $headerPTQ['mobile']; ?> <span class="number-name"></span></a></li>
                <li><a href="mailto:<?php echo $headerPTQ['email']; ?>"><i class="fa fa-envelope"></i> <?php echo $headerPTQ['email']; ?></a> </li>
            </ul>
        </div>
        <div class="col-md-4 col-xs-12 col-sm-3">
            <h4 class="general-features">Timing</h4>
            <ul class="general-features">
                <?php
                $vv1 = "SELECT * FROM `tc_officetime`";
                $tt1 = mysqli_query($conn,$vv1);
                while($nn1 = mysqli_fetch_array($tt1)){
                    ?>		
                    <li><a href="javascript:void(0)"><?php echo $nn1['tc_news'];?></a></li>
                    <?php
                }?>
            </ul>
        </div>
        <div class="col-md-4 col-xs-12 col-sm-3">
            <h4 class="social-link">Contact</h4>
            <ul class="social-network social-links">
                <li><a href="#index.php" target="_blank"><i class="fa fa-facebook"></i>Facebook</a></li>
                <li><a href="#https://www.youtube.com/channel/UCbnmxY6AQajXMr8yaKEOT5g" target="_blank"><i class="fa fa-youtube-play"></i>Youtube</a></li>
            </ul>
        </div>
</div>
</div>
</div>



<div id="WAButton"></div>
<div class="copy_fotter"> © <?php echo date('Y'); ?>. All rights reserved. </div>







<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- Wow animation -->
<script type="text/javascript" src="js/wow.min.js"></script> 
<script>
new WOW().init();
</script>


<!-- auto counter -->
<script type="text/javascript" src="js/autocounter.js"></script> 

<!-- testimonial -->
<script type="text/javascript" src="js/testimonial.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js'></script>


<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="js/revolutionslider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="js/revolutionslider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- REVOLUTION SLIDER -->
<script type="text/javascript">

	var revapi;

	jQuery(document).ready(function() {

		   revapi = jQuery('.tp-banner').revolution(
			{
				delay:9000,
				startwidth:1170,
				startheight:500,
				hideThumbs:10,
				fullWidth:"on",
				forceFullWidth:"on"
			});

	});	//ready

</script>

<!-- Header Fixed Js -->
<script src="js/jquery-scrolltofixed.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner.
        // This is the default behavior.

        $('.header').scrollToFixed();
        // Dock each summary as it arrives just below the docked header, pushing the
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header').outerHeight(true) + 10,
                limit: function() {
                    var limit = 0;
                    if (next) {
                        limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                    } else {
                        limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: 999
            });
        });
    });
</script>
    <script  src="js/popup.js"></script>



<!-- Scroll Indicator -->
<script>
// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}
</script>

<!-- //Scroll Indicator -->

<script>
	$(document).ready(function(){
		$(document).on('click','#sendEnquiry',function(e){
            e.preventDefault();
			var proid = $(this).siblings('.proid').val();
			$('.productid').val(proid);
			$('#submitproductenquiry').submit();
            
		});
	});

</script>





    
</body>

</html>