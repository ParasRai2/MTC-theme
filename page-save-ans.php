<?php
global $wpdb;
$table_name = $wpdb->prefix ."time_table";
$data = $wpdb->get_results( "SELECT * FROM $table_name" );

foreach ($data as $row){
  $qno = $row->QNo;
}

session_start();
$sid = $_SESSION['id'];
echo $sid;

$table_name = $wpdb->prefix ."result_table";
$data= array('sid' => $sid);
$data_type = array("%d");
for ($i = 1; $i<=$qno; $i++ )
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


$result = $wpdb->insert( $table_name, 
  $data,
  $data_type
);
echo $result;

//wp_redirect( get_permalink(get_page_by_title( 'end' ) ) );
?>
