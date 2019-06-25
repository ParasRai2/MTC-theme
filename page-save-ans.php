<?php
session_start();
$sid = $_SESSION['id'];

global $wpdb;
$table_name = $wpdb->prefix ."result_table";
$data= array('sid' => $sid);
$data_type = array("%d");
for ($i = 1; $i<=25; $i++ )
{
  $name = "q".$i."id";
  $qid = $_POST[$name];
  $name = "question".$i;
  $submit = 0;
  if(isset($_POST[$name]))
    $submit = $_POST[$name];

  $data = array_merge($data, 
    array(
      'qid'.$i => $qid,
      'ans'.$i => $submit
    )
  );
  $data_type = array_merge($data_type, array("%d", "%d"));
} 


$wpdb->insert( $table_name, 
  $data,
  $data_type
);
wp_redirect( get_permalink(get_page_by_title( 'end' ) ) );
?>
