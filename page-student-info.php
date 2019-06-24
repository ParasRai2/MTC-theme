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
	<title>Welcome | Candidate Info</title>
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
			<img src="<?php echo get_bloginfo("template_url"); ?>/assets/images/mercury_logo.svg" height="120"><br>
			STUDENT INFORMATION
	</div>
	<div class="container-fluid mt-3 mb-5">
		<div class="col-10 offset-1">
			<div class="card student-info">
					<h4 class="card-header purple-bg white-text text-center py-4">
						<strong>Candidate Info</strong>
					</h4>
					<!--Card content-->
					<div class="card-body px-5 mt-1">
						<div class="container-fluid row mb-0">
						    <div class="col-7 text-center px-5">
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
					          	<div class="container-fluid row form-text-color text-left">
					          		<div class="col-5 text-right">Date of Birth : </div>
					          		<div class="col-7"><?php echo date_format(date_create($dob) , "F d, Y (D)"); ?></div>
					          		<div class="col-5 text-right">Contact : </div>
					          		<div class="col-7"><?php echo $contact; ?></div>
					          		<div class="col-5 text-right">Email : </div>
					          		<div class="col-7"><?php echo $email; ?></div>
					          	</div>
						    </div>

							<div class="col-5 container-fluid text-center pt-5">
								<span class="form-text-color h5 mt-3">
									Test Status
								</span>
								<div class="container-fluid text-center mb-2">
									<?php 
										if ($status):
										?>
									<span class="status ml-1 mr-1 pl-2 pr-2 active" onclick="clicked()"> Available </span>
									<?php 
										else:
									?>
									<span class="status ml-1 mr-1 pl-2 pr-2 inactive" onclick="clicked()"> Unavailable</span>
									<?php 
										endif
									?>
								</div>
								<div class="col-12 text-success h6" style="font-size: 12px;" id="mess">
										<?php 
											if($status)
												echo 'Check your detail and click Start to start examination';
											else
												echo "<span class='text-danger'>You're not allow to take test. Please contact your consultancy</span>";
										?>
								</div>
								<div class="col-12 form-text-color row container-fluid text-left mt-3">
									<div class="col-8 text-right">Time Duration :</div> 
									<div class="col-4"> 1 hour </div>
									<div class="col-8 text-right">No. of Questions :</div> 
									<div class="col-4">50</div>
								</div>
							</div>
						</div>

						<div class="container-fluid mt-0">
							<form action="<?php echo theme_get_permalink_by_title( 'timer' ); ?>">
								<button class="float-right btn btn-purple-color btn-rounded z-depth-0 my-4 waves-effect" type="submit"
								<?php 
									if(!$status)
										echo 'disabled';
								?>

								>Start</button>
							</form>
						</div>
						
					</div>

				</div>
		</div>

	</div>




	<!-- JQuery -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/jquery-3.3.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?php echo get_bloginfo("template_url"); ?>/assets/js/mdb.min.js"></script>


	<script src="<?php echo get_bloginfo("template_url"); ?>/assets/js/fullScreen.js" type="text/javascript"></script>
	<script type="text/javascript">
		function clicked()
		{
			$("#mess").css("font-size", "14px");
			window.setTimeout(function(){ 
				$("#mess").css("font-size", "12px");
			}, 1200);
		}
	</script>


</body>
</html>