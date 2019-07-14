<?php

  $table_name = $wpdb->prefix ."student_table";
  $student = $wpdb->get_row( "SELECT `name`, `roll_no`, `photo` FROM $table_name WHERE Id = $id" );

  $name = $student -> name;
  $roll = $student -> roll_no;
  if( !empty( $student->photo ) )
    $photo = wp_upload_dir()['baseurl'] . $student->photo;
	else
		$photo = get_bloginfo("template_url")."/assets/default.jpg";

?>
<!-- navigation bar start-->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark secondary-color sticky-top lighten-1 purple-gradient">
    <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo_square.png" alt="" style="height:50px; padding-right:20px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-5" aria-controls="navbarSupportedContent-5" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-5">
      <ul class="navbar-nav mr-auto">
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
          <button type="button" class="btn btn-success btn-md waves-effect waves-light"  id="subbtn">Submit</button>
          </a>
        </li>
        <li class="nav-item avatar dropdown">
          <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo $photo; ?>" class="rounded-circle z-depth-0" alt="<?php echo $name; ?>">
          </a>
          <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
            <a class="dropdown-item"><?php echo $name; ?></a>
            <a class="dropdown-item"><?php echo $roll; ?></a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
<!-- NavBar ends -->
