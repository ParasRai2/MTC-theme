<?php
	session_start();
  $sid = $_SESSION['id'];

	global $wpdb;
	$table_name = $wpdb->prefix ."ans_sub";
	$data= array('sid' => $sid);
	$data_type = array("%d");
  	for ($i = 1; $i<3; $i=$i+1 )
  	{
  		$name = "q".$i."id";
  		$qid = $_POST[$name];
  		$name = "question".$i;
  		if(isset($_POST[$name]))
  			$submit = $_POST[$name];
  		else {
  			$submit = 0;
  		}
  		$name = "Ans".$i;
  		$ans = $_POST[$name];
  		echo $qid." ".$submit. " ". $ans." ";
      $data = array_merge($data, 
  			array('qid'.$i => $qid,
  			'sub'.$i => $submit,
  			'ans'.$i => $ans)
   		);
  		array_push($data_type, "%d", "%d", "%d");
  	} 
  	$wpdb->insert( $table_name, 
			$data,
			$data_type
		);
?>
