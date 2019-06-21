<!DOCTYPE html>
<?php
	global $wpdb;
	$table_name = $wpdb->prefix ."time_table";
	$data = $wpdb->get_results( "SELECT * FROM $table_name" );

	foreach ($data as $row){
		$date = $row->Date; 
		$time = $row->Time;
	}
?>
<html>
<head>
	<title>Welcome | Wait for Sometime</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="<?php echo get_bloginfo("template_url"); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="<?php echo get_bloginfo("template_url"); ?>/assets/css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="<?php echo get_bloginfo("template_url"); ?>/assets/css/style.min.css" rel="stylesheet">
	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo("template_url"); ?>/assets/css/addons/datatables.min.css">
	<!-- hover.css -->
	<link href="<?php echo get_bloginfo("template_url"); ?>/assets/css/hover.css" rel="stylesheet">
	<!-- owl Carousel -->
	<link href="<?php echo get_bloginfo("template_url"); ?>/assets/css/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo get_bloginfo("template_url"); ?>/assets/css/owl.theme.default.min.css" rel="stylesheet">
	<link href="<?php echo get_bloginfo("template_url"); ?>/assets/css/custom.css" rel="stylesheet">
	<link href="<?php echo get_bloginfo("template_url"); ?>/assets/css/magnum-custom.css" rel="stylesheet">

	<!-- My Css -->

	<link href="<?php echo get_bloginfo("template_url"); ?>/assets/css/par-css/par.css" rel="stylesheet">

	
	<link href="<?php echo get_bloginfo("template_url"); ?>/assets/css/magnum-custom.css" rel="stylesheet">
	
	<!--Clock-->
	<link rel="stylesheet" href="<?php echo get_bloginfo("template_url"); ?>/compiled/flipclock.css">



</head>
<body class="container-fluid" id="Login-Page">

	<div class="container-fluid text-center Information">

			<img src="<?php echo get_bloginfo("template_url"); ?>/assets/images/mercury_logo.svg" height="120"><br>
			ENTRANCE EXAMINATION<br>
			Count Down
	</div>
	<div class="container" style="padding-left: 29.75%;">
		
		<div class="clock" style="margin:2em;"></div>
	</div>

	<div class="container-fluid text-center Information" id="Login-Info">
			Good Luck
	</div>

	<!-- JQuery -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/jquery-3.3.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/mdb.min.js"></script>
	<!-- Initializations -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/custom.js"></script>
	<!-- data-table -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/addons/datatables.min.js"></script>
	<!-- owl Carousel -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/owl.carousel.min.js"></script>

	<script src="<?php echo get_bloginfo("template_url"); ?>/compiled/flipclock.js"></script>	

	<script src="<?php echo get_bloginfo("template_url"); ?>/assets/js/fullScreen.js" type="text/javascript"></script>
	<script type="text/javascript">
		
		var clock;
		var currentTime;
		var startTime;
		var diff;


		$(document).ready(function() {
			currentTime = new Date();
			startTime = new Date("<?php echo $date . ' '. $time; ?>");
			diff = (startTime - currentTime)/1000;
			if(diff<0)
			{
				$("#Login-Info").html("You're Late");
				alert("Direct going into Question Section");

        		var url = <?php echo "'".get_page_link(get_page_by_title( "student-info")) ."'"; ?>;
				$(location).prop('href',url);
			}
			else
			{
				clock = $('.clock').FlipClock( parseInt(diff), {
			        clockFace: 'MinuteCounter',
			        countdown: true,
			        callbacks: {
			        	stop: function() {
			        		var url = <?php echo "'".get_page_link(get_page_by_title( "student-info")) ."'"; ?>;
							$(location).prop('href',url);
			        	}
			        }
			    });
			}
		});
	</script>


</body>
</html>