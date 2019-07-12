<?php
global $wpdb;
$table_name = $wpdb->prefix ."time_table";
$data = $wpdb->get_results( "SELECT `qno_mcq`, `qno_reading` FROM $table_name" );

foreach ($data as $row){
  $qno_mcq = $row->qno_mcq;
  $qno_reading = $row->qno_reading;
}

session_start();
$sid = $_SESSION['id'];
echo $sid;

$table_name = $wpdb->prefix ."result_table";
$data= array();
$data_type = array();
$j = $qno_mcq + 1;
for ($i = 1; $i<=$qno_reading; $i++ )
{
  $name = "q".$i."id";
  $qid = $_POST[$name];
  $name = "question".$i;
  $submit = 0;
  if(isset($_POST[$name]))
    $submit = $_POST[$name];

  $data = array_merge($data, 
    array(
      'qid'.$j => $qid,
      'ans'.$j => $submit
    )
  );
  $j++;
  $data_type = array_merge($data_type, array("%d", "%d"));
} 


$result = $wpdb->update( $table_name, 
  $data,
  array('sid' => $sid),
  $data_type,
  array('%d')
);
wp_redirect( get_permalink(get_page_by_title( 'questions-audio' ) ) );
?>
