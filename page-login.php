<?php


    function theme_get_permalink_by_title( $title ) {

	    // Initialize the permalink value
	    $permalink = null;

	    // Try to get the page by the incoming title
	    $page = get_page_by_title( strtolower( $title ) );

	    // If the page exists, then let's get its permalink
	    if( null != $page ) {
	        $permalink = get_permalink( $page->ID );
	    } // end if

	    return $permalink;

	} // end theme_get_permalink_by_title

	$roll = $_POST['roll'];
	$pass = $_POST['pass'];

	global $wpdb;

	$table_name = $wpdb->prefix . "student_table";

	$data = $wpdb->get_results( "SELECT * FROM $table_name" );

	if(!empty($roll))
	{ 
		foreach($data as $row){
			if( $row->Roll_no == $roll && $row->Password == $pass )
			{	
				session_start();
				$_SESSION['id'] = $row->Id;
				wp_redirect( theme_get_permalink_by_title( 'student-info' ) );
				die;
			}
		}
			
		echo "<script> alert('Wrong Roll Number Or Password'); </script>";
	}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Login | Login to your user name</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href=" <?php echo get_bloginfo("template_url"); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href=" <?php echo get_bloginfo("template_url"); ?>/assets/css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href=" <?php echo get_bloginfo("template_url"); ?>/assets/css/style.min.css" rel="stylesheet">
	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href=" <?php echo get_bloginfo("template_url"); ?>/assets/css/addons/datatables.min.css">
	<!-- hover.css -->
	<link href=" <?php echo get_bloginfo("template_url"); ?>/assets/css/hover.css" rel="stylesheet">
	<!-- owl Carousel -->
	<link href=" <?php echo get_bloginfo("template_url"); ?>/assets/css/owl.carousel.min.css" rel="stylesheet">
	<link href=" <?php echo get_bloginfo("template_url"); ?>/assets/css/owl.theme.default.min.css" rel="stylesheet">
	<link href=" <?php echo get_bloginfo("template_url"); ?>/assets/css/custom.css" rel="stylesheet">
	<link href=" <?php echo get_bloginfo("template_url"); ?>/assets/css/magnum-custom.css" rel="stylesheet">

	<!-- My Css -->

	<link href=" <?php echo get_bloginfo("template_url"); ?>/assets/css/par-css/par.css" rel="stylesheet">

	
	<link href=" <?php echo get_bloginfo("template_url"); ?>/assets/css/magnum-custom.css" rel="stylesheet">




</head>
<body class="container-fluid" id="Login-Page">

	<div class="row mt-3" id="logo">
		<div class="container-fluid text-center">
			<img src="<?php echo get_bloginfo("template_url"); ?>/assets/images/mercury_logo.svg" height="120">
			
		</div>
	</div>
	<div class="row mt-2">
		<div class="container-fluid text-center" id="Login-Info">
			ENTRANCE EXAMINATION
		</div>
	</div>

	<div class="row mt-2">
		<div class="container-fluid text-center">
			<div class="col-4 offset-4">
				<!-- Material form contact -->
				<div class="card">

					<h5 class="card-header purple-bg white-text text-center py-4">
						<strong>Log In</strong>
					</h5>

					<!--Card content-->
					<div class="card-body px-lg-5 pt-0">

						<!-- Form -->
						<form class="text-center" action="" method="post">
							<!-- Name -->
				            <div class="md-form mt-4">
				                <input type="text" id="materialSubscriptionFormName" class="form-control form-text-color" name="roll" required>
				                <label class="form-text-color" for="materialSubscriptionFormName">Roll Number</label>
				            </div>

				            <!-- E-mai -->
				            <div class="md-form">
				                <input type="password" id="materialSubscriptionFormPasswords" class="form-control form-text-color" name="pass" required>
				                <label class="form-text-color" for="materialSubscriptionFormPasswords">Password</label>
				            </div>

							<!-- Send button -->
							<button class="btn btn-purple-color btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="submit">Login</button>

						</form>
						<!-- Form -->

					</div>

				</div>
				<!-- Material form contact -->
			</div>
		</div>
	</div>

	<!-- JQuery -->
	<script type="text/javascript" src=" <?php echo get_bloginfo("template_url"); ?>/assets/js/jquery-3.3.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src=" <?php echo get_bloginfo("template_url"); ?>/assets/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src=" <?php echo get_bloginfo("template_url"); ?>/assets/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src=" <?php echo get_bloginfo("template_url"); ?>/assets/js/mdb.min.js"></script>
	<!-- Initializations -->
	<script type="text/javascript" src=" <?php echo get_bloginfo("template_url"); ?>/assets/js/custom.js"></script>
	<!-- data-table -->
	<script type="text/javascript" src=" <?php echo get_bloginfo("template_url"); ?>/assets/js/addons/datatables.min.js"></script>
	<!-- owl Carousel -->
	<script type="text/javascript" src=" <?php echo get_bloginfo("template_url"); ?>/assets/js/owl.carousel.min.js"></script>

	<script src="<?php echo get_template_directory_uri(); ?>/compiled/flipclock.js"></script>	

	<script src=" <?php echo get_bloginfo("template_url"); ?>/assets/js/fullScreen.js" type="text/javascript"></script>
	<script src=" <?php echo get_bloginfo("template_url"); ?>/assets/js/par-js/par-js.js"></script>

<script type="text/javascript">
	var elem =  document.documentElement;
	if (elem.requestFullscreen) {
	  elem.requestFullscreen();
	} else if (elem.msRequestFullscreen) {
	  elem.msRequestFullscreen();
	} else if (elem.mozRequestFullScreen) {
	  elem.mozRequestFullScreen();
	} else if (elem.webkitRequestFullscreen) {
	  elem.webkitRequestFullscreen();
	}
</script>
</body>
</html>