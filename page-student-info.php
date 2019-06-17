<?php

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
	<div class="container-fluid mt-3">
		<div class="col-10 offset-1">
			<div class="card student-info">
					<h4 class="card-header purple-bg white-text text-center py-4">
						<strong>Candidate Info</strong>
					</h4>
					<!--Card content-->
					<div class="card-body px-lg-5 mt-1">
						<div class="container-fluid row">
							<div class="col-7">
								<h5 class="form-text-color">
									Full Name : <?php echo $name; ?><br>
									Roll No. : <?php echo $roll; ?>
								</h5>
							</div>
							<div class="col-5 text-center">
								<h5 class="form-text-color">
									Test Status
								</h5>
								<div class="container-fluid text-center">
									<?php 
										if ($status):
										?>
									<span class="status ml-1 mr-1 pl-2 pr-2 active"> Available </span>
									<?php 
										else:
									?>
									<span class="status ml-1 mr-1 pl-2 pr-2 inactive"> Unavailable</span>
									<?php 
										endif
									?>
								</div>

							</div>
						</div>
						<div class="container-fluid row mt-3">
							<div class="col-7">
								<h5 class="form-text-color">
									Time Duration : 1 hour<br>
									No. of Questions: 50
								</h5>
							</div>
							<div class="col-5 text-center">
								<h5 class="form-text-color" style="font-size: 12px;">
									<?php 
										if($status)
											echo 'Check your detail and click Start to start examination';
										else
											echo "You're not allow to take test. Please contact your consultancy";
									?>
								</h5>
							</div>
						</div>
						<div class="container-fluid">
							<form action="index.php">
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

</body>
</html>