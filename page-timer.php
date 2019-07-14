<!DOCTYPE html>
<?php
	get_header();
	global $wpdb;
	$table_name = $wpdb->prefix ."time_table";
	$data = $wpdb->get_results( "SELECT `date`, `time` FROM $table_name" );

	foreach ($data as $row){
		$date = $row->date; 
		$time = $row->time;
	}
?>


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
	




	
	<?php include get_template_directory() . '/scripts.php'; ?>

	<script type="text/javascript">
		var clock;
		var currentTime;
		var startTime;
		var diff;
		$(window).ready( function(){
			currentTime = new Date();
			startTime = new Date("<?php echo $date . ' '. $time; ?>");
			diff = (startTime - currentTime)/1000;
			if(diff<0)
			{
				$("#Login-Info").html("You're Late");
				alert("Direct going into Question Section");
				var url = <?php echo "'".get_page_link(get_page_by_title( "questions-mcq")) ."'"; ?>;
				$(location).prop('href',url);
			}
			else
			{
				clock = $('.clock').FlipClock( parseInt(diff), {
					clockFace: 'MinuteCounter',
					countdown: true,
					callbacks: {
						stop: function() {
							var url = <?php echo "'".get_page_link(get_page_by_title( "questions-mcq" )) ."'"; ?>;
							$(location).prop('href',url);
						}
					}
				});
			}
		});
	</script>


</body>
</html>