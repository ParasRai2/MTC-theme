<?php
	get_header();
	session_start();
	$id = $_SESSION['id']; 
	global $wpdb;
	$table_name = $wpdb->prefix . "student_table";
	$row = $wpdb->get_row( "SELECT `name`, `status`, `roll_no`, `contact`, `dob`, `email`, `photo` FROM $table_name WHERE Id = $id" );
	if(!empty($row))
	{ 
		$name = $row->name;
		$status = $row->status;
		$roll = $row->roll_no;
		$contact = $row->contact;
		$dob = $row->dob;
		$email = $row->email;
		if(!empty($row->photo))
			$photo = wp_upload_dir()['baseurl'] ."/". $row->photo;
		else
			$photo = get_bloginfo("template_url")."/assets/default.jpg";
	}
?>

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
									<img src="<?php echo $photo; ?>" class="rounded-circle img-fluid  border border-success" alt="Default" style="height: 150px; width:150px;">
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
</body>
</html>