<?php
	
	global $wpdb;
	$table_name1 = $wpdb->prefix ."result_table";
	$table_name2 = $wpdb->prefix ."student_table";

	$sid = $_POST['id'];
	
	$data = $wpdb->get_row( "SELECT * FROM $table_name1, $table_name2 WHERE $table_name1.`sid` = $table_name2.`id` && $table_name2.`id` = $sid" );
	$name = $data->Name;
	$roll = $data->Roll_no;
	
	$table_data = array();	

	$submit = 0;
	$correct = 0;
	for($j=1;$j<=25;$j++)
	{
		$s = "qid".$j;
		$qid = $data->$s;
		$s = "ans".$j;
		$ans = $data->$s;

		$table_name = $wpdb->prefix."question_table";
		$row = $wpdb->get_row( "SELECT * FROM $table_name WHERE `ID` = $qid " );
		$question = $row->Question;
		$s = "Opt".$ans;
		$submittedAns = $row->$s;
		$cno = $row->Ans;
		$s = "Opt".$cno;
		$correctAns = $row->$s;
		if($ans != 0)
		{
			$submit++;
			if($row->Ans == $ans)
			{
				$correct++;
			}
		}
		else
		{
			$submitted = 'NaN';
		}

		$qna = array($question, $submittedAns, $correctAns);
		$table_data[$j-1] = $qna;

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Result | Publish Result</title>
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
<body class="container-fluid" id="Page">

	<div class="container-fluid text-center Information">
			<img src="<?php echo get_bloginfo("template_url"); ?>/assets/images/mercury_logo.svg" height="120">
	</div>
	<div class="container-fluid mt-3 mb-5">
		<div class="col-10 offset-1">
			<div class="card student-info">
					<h4 class="card-header purple-bg white-text text-center py-4"><strong>Result</strong></h4>
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
					          	<div class="container-fluid row form-text-color text-left">
					          		
									<table class="table table-bordered bg-white">
										<thead class="purple-bg white-text">
										    <tr>
										      <th class="h6" scope="col">SN</th>
										      <th class="h6" scope="col">Question</th>
										      <th class="h6" scope="col">Submitted Ans</th>
										      <th class="h6" scope="col">Correct Ans</th>
										    </tr>
										</thead>
										<tbody>
											<?php
												for ($i=1; $i<=25; $i++)
												{

											?>
										    <tr class="form-text-color">
											      <td class="form-text-color h6" scope="col"><?php echo $i;  ?></td>
											      <td class="form-text-color h6" scope="col"><?php echo $table_data[$i-1][0]; ?></td>
											      <td class="form-text-color h6" scope="col"><?php echo $table_data[$i-1][1]; ?></td>
											      <td class="form-text-color h6" scope="col"><?php echo $table_data[$i-1][2]; ?></td>
										    </tr>
										   
											<?php
											
												}
												
											?>
										</tbody>
									</table>

					          	</div>
						    </div>
						</div>

						<div class="container-fluid mt-0">
							<form action="<?php echo theme_get_permalink_by_title( 'timer' ); ?>">
								<button class="float-right btn btn-purple-color btn-rounded z-depth-0 my-4 waves-effect" type="submit">Start</button>
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