<?php
global $wpdb;
$table_name = $wpdb->prefix ."time_table";
$data = $wpdb->get_results( "SELECT * FROM $table_name" );

foreach ($data as $row){
	$date = $row->date; 
	$time = $row->time;
	$duration = $row->duration;
	$qno_mcq = $row->qno_mcq;
	$qno_reading = $row->qno_reading;
	$qno_audio = $row->qno_audio;
	$pass= $row->passmark;
}
$qno = $qno_mcq + $qno_reading + $qno_audio;

global $wpdb;
$table_name1 = $wpdb->prefix ."result_table";
$table_name2 = $wpdb->prefix ."student_table";

$sid = $_POST['id'];

$data = $wpdb->get_row( "SELECT * FROM $table_name1, $table_name2 WHERE $table_name1.`sid` = $table_name2.`id` && $table_name2.`id` = $sid" );
$name = $data->name;
$roll = $data->roll_no;
if(!empty($data->photo))
	$photo = wp_upload_dir()['baseurl'].$data->photo;
else
	$photo = get_bloginfo("template_url"). "/assets/default.jpg";


$table_data = array();	

$table_name = $wpdb->prefix."mcq_question_table";
$mcq = $wpdb->get_results( "SELECT * FROM $table_name" );
$table_name = $wpdb->prefix."reading_question_table";
$reading = $wpdb->get_results( "SELECT * FROM $table_name" );
$table_name = $wpdb->prefix."audio_question_table";
$audio = $wpdb->get_results( "SELECT * FROM $table_name" );
$submit = 0;
$correct = 0;
for($j=1;$j<=$qno;$j++)
{
	$s = "qid".$j;
	$qid = $data->$s;
	$s = "ans".$j;
	$ans = $data->$s;
	if($j<=$qno_mcq){
		$position = array_search(12, array_column($mcq, 'id'));
		$row = $mcq[$position];
	}
	elseif($j>$qno_mcq && $j<=($qno_reading+$qno_mcq)){
		$position = array_search(12, array_column($reading, 'id'));
		$row = $reading[$position];
	}
	else{
		$position = array_search(12, array_column($audio, 'id'));
		$row = $audio[$position];
	}
	$question = $row->question;
	$s = "opt".$ans;
	$submittedAns = $row->$s;
	$cno = $row->ans;
	$s = "opt".$cno;
	$correctAns = $row->$s;
	$remark = 'Wrong';
	if($ans != 0)
	{
		$submit++;
		if($row->ans == $ans)
		{
			$correct++;
			$remark = 'Correct';
		}
	}
	else
	{
		$submitted = 'NaN';
	}

	$qna = array($question, $submittedAns, $correctAns, $remark);
	$table_data[$j-1] = $qna;

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Result | Publish Result</title>
	<?php include get_template_directory() . '/styles.php'; ?>
</head>
<body class="container-fluid w-100 h-100" id="Login-Page">

	<div class="container-fluid text-center Information">
		<img src="<?php echo get_bloginfo("template_url"); ?>/assets/images/mercury_logo.svg" height="120"><br>
		<button class="float-center btn btn-success btn-rounded z-depth-0 waves-effect" onclick="printDiv()">Print</button>
	</div>
	
	<div class="container-fluid mt-3 mb-5">
		<div class="col-12" id="result">
			<div class="card student-info">
				<h4 class="card-header container-fluid purple-bg white-text text-center py-4">
					<strong>Result</strong>
				</h4>
				<!--Card content-->
				<div class="card-body px-1 mt-1">
					<div class="container-fluid row mb-0">
						<div class="col-12 text-center px-5">
							<div class="overlay zoom rounded-circle" style="cursor: pointer;">
								<img src="<?php echo $photo; ?>" class="rounded-circle img-fluid " alt="Default" style="max-height: 120px;">
							</div>
							<div class="form-text-color mt-1 h6">
								<b><?php echo $name; ?></b><br>
								<?php echo $roll; ?><br>
								<span class="h6">
									<?php 
										echo "Submitted : ".$submit. " | Correct : ".$correct. " | Score : " .$correct."/".$qno." | Result : " ;
								  		if($correct>=$pass)
								  			echo "<span class='text-success'>Passed</span>";
								  		else
								  			echo "<span class='text-danger'>Failed</span>";
								  	?>
								  	
								</span>
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
											<th class="h6" scope="col">Remark</th>
										</tr>
									</thead>
									<tbody>
										<?php
										for ($i=1; $i<=$qno; $i++)
										{

											?>
											<tr class="form-text-color">
												<td class="form-text-color" scope="col"><?php echo $i; ?></td>
												<td class="form-text-color" scope="col"><?php echo $table_data[$i-1][0]; ?></td>
												<td class="form-text-color" scope="col"><?php echo $table_data[$i-1][1]; ?></td>
												<td class="form-text-color" scope="col"><?php echo $table_data[$i-1][2]; ?></td>
												<td class="form-text-color" scope="col"><?php echo $table_data[$i-1][3]; ?></td>
											</tr>

											<?php
											
										}

										?>
									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php include get_template_directory() . '/scripts.php'; ?>
	<script type="text/javascript">
		function printDiv()
		{
			alert("Printing Starts");
			printData();
		}	
		function printData()
		{
			var printContents = document.getElementById("result").innerHTML;
		    var originalContents = document.body.innerHTML;
		    document.body.innerHTML = printContents;
		    window.print();
		    document.body.innerHTML = originalContents;
				   
		}

	</script>

</body>
</html>