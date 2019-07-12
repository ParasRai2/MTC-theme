<?php
	$roll = $_POST['roll'];
	$pass = $_POST['pass'];
	global $wpdb;
	$table_name = $wpdb->prefix . "student_table";
	if(!empty($roll)){
		$row = $wpdb->get_row( "SELECT `id`, `password` FROM $table_name WHERE roll_no = '$roll'" );
		if( $row->password == $pass )
		{	
			
			session_start();
			$_SESSION['id'] = $row->id;
			wp_redirect( get_permalink(get_page_by_title( 'student-info' ) )  );
			die;
		}
		echo "<script> alert('Wrong Roll Number Or Password ".$roll." '); </script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login | Login to your user name</title>
	<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		echo $image; 
	?>
	<?php include get_template_directory() . '/styles.php'; ?>
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

	<?php include get_template_directory() . '/scripts.php'; ?>

	<script type="text/javascript">
		$(window).ready( function(){
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
		});
	</script>
</body>
</html>