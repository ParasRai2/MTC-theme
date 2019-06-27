<?php
global $wpdb;
$table_name = $wpdb->prefix ."time_table";
$data = $wpdb->get_results( "SELECT * FROM $table_name" );

foreach ($data as $row){
  $qno_mcq = $row->QNo_mcq;
  $qno_reading = $row->QNo_reading;
  $qno = $qno_mcq+$qno_reading;
  $qno_audio = $row->QNo_audio;
}

session_start();
$sid = $_SESSION['id'];
echo $sid;

$table_name = $wpdb->prefix ."result_table";
$data= array('sid' => $sid);
$data_type = array("%d");
$j = $qno;
for ($i = 1; $i<=$qno_audio; $i++ )
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
  array('sid' => 1),
  $data_type,
  array('%d')
);
wp_redirect( get_permalink(get_page_by_title( 'end' ) ) );
?>
