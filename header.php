<?php
  session_start();
  $id = $_SESSION['id']; 

  $table_name = $wpdb->prefix ."student_table";
  $student = $wpdb->get_row( "SELECT * FROM $table_name WHERE Id = $id" );

  $table_name = $wpdb->prefix ."time_table";
  $data = $wpdb->get_results( "SELECT * FROM $table_name" );

  foreach ($data as $row){
    $qno = $row->QNo;
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" style="margin-top:0px !important;">
<head>
  <meta charset="utf-8">
  <title></title>
  <?php wp_head(); ?>
</head>
<body>
  <!-- navigation bar start-->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark secondary-color sticky-top lighten-1 purple-gradient">
    <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo_square.png" alt="" style="height:50px; padding-right:20px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-5" aria-controls="navbarSupportedContent-5" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-5">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <span class="nav-link waves-effect waves-light">Attempted: <spab id="attempted">0/<?php echo $qno; ?></spab></span>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item">
          <div id="nav-clock" class="clock"></div>
        	<div class="message"></div>
          </a>
        </li>
        <li class="nav-item">
          <button type="button" class="btn btn-success btn-md waves-effect waves-light"  onclick="submitAns()">Submit</button>
          </a>
        </li>
        <li class="nav-item avatar dropdown">
          <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0" alt="avatar image">
          </a>
          <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
            <a class="dropdown-item"><?php echo $student->Name; ?></a>
            <a class="dropdown-item"><?php echo $student->Roll_no; ?></a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
