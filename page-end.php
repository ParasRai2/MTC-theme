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

	session_start();
	$id = $_SESSION['id']; 

	global $wpdb;

	$table_name = $wpdb->prefix . "student_table";

	$data = $wpdb->get_results( "SELECT * FROM $table_name WHERE Id = $id" );

	if(!empty($data))
	{ 
		foreach($data as $row){
			$name = $row->Name;
			$status = $row->Status;
			$roll = $row->Roll_no;
			$contact = $row->Contact;
			$dob = $row->dob;
			$email = $row->EMAIL;
		}
			
	}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Thank You | <?php echo $name; ?></title>
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
</head>
<body class="container-fluid" id="Login-Page">

	<div class="container-fluid text-center Information">
			<img src="<?php echo get_bloginfo("template_url"); ?>/assets/images/mercury_logo.svg" height="120">
	</div>
	<div class="container-fluid mt-3 mb-5">
		<div class="col-10 offset-1">
			<div class="card student-info">
					<h4 class="card-header purple-bg white-text text-center py-4">
						<strong>Thank you <?php echo $name; ?>!</strong>
					</h4>
					<!--Card content-->
					<div class="card-body px-5 mt-1">
						<div class="container-fluid row mb-0">
						    <div class="col-12 text-center px-5">
							    <div class="overlay zoom rounded-circle" style="cursor: pointer;">
									<img src="<?php echo get_bloginfo("template_url"); ?>/assets/default.jpg" class="rounded-circle img-fluid " alt="Default" style="max-height: 150px;">
									<div class="mask flex-center waves-effect waves-light">
									    <p class="white-text">Zoom effect</p>
									</div>
								</div>
						        <div class="form-text-color mt-1 h5">
					          		<?php echo $name; ?><br>
									<?php echo $roll; ?>
								</div>
						        <hr>
					          	<!--Detail-->
					          	<div class="container-fluid form-text-color text-center">
					          		Thank You for Choosing Mercury Consultancy
					          	</div>
						    </div>
							
						</div>
						
					</div>

				</div>
		</div>

	</div>



	<?php 
	 	unset($_SESSION['id']);
 		session_destroy();
 	?>
	<!-- JQuery -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/jquery-3.3.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/mdb.min.js"></script>


	<script src="<?php echo get_bloginfo("template_url"); ?>/assets/js/fullScreen.js" type="text/javascript"></script>
	


</body>
</html>