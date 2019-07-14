<?php
	get_header();
	session_start();
	$id = $_SESSION['id']; 
	global $wpdb;
	$table_name = $wpdb->prefix . "student_table";
	$row = $wpdb->get_row( "SELECT `name`, `status`, `roll_no`, `contact`, `dob`, `email`, `photo` FROM $table_name WHERE id = $id" );
	$name = $row->name;
	$status = $row->status;
	$roll = $row->roll_no;
	$contact = $row->contact;
	$dob = $row->dob;
	$email = $row->email;
	if(!empty($row->photo))
		$photo = wp_upload_dir()['baseurl'] . $row->photo;
	else
		$photo = get_bloginfo("template_url")."/assets/default.jpg";

	$table_name = $wpdb->prefix ."time_table";
	$row = $wpdb->get_row( "SELECT `duration_mcq`, `duration_reading`, `duration_audio`, qno_mcq, qno_reading, `qno_audio` FROM $table_name WHERE id=1" );
	$duration = $row->duration_mcq + $row->duration_reading + $row->duration_audio;
	$qno = $row->qno_mcq +  $row->qno_reading + $row->qno_audio;
	

?>

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
									<div class="col-4"> <?php echo $duration; ?> </div>
									<div class="col-8 text-right">No. of Questions :</div> 
									<div class="col-4"> <?php echo $qno; ?> </div>
								</div>
							</div>
						</div>
						<div class="container-fluid mt-0">
							<form action="<?php echo get_permalink(get_page_by_title( 'timer' )); ?>">
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
			function clicked()
			{
				$("#mess").css("font-size", "14px");
				window.setTimeout(function(){ 
					$("#mess").css("font-size", "12px");
				}, 1200);
			}
		});
	</script>


</body>
</html>