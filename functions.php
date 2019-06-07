<?php
function entrance_styles(){
  wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', false );
  wp_enqueue_style( 'mdb', get_template_directory_uri().'/assets/css/mdb.min.css', false );
  wp_enqueue_style( 'style', get_template_directory_uri().'/assets/css/style.min.css', false );
  wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.7.0/css/all.css', false );
  wp_enqueue_style( 'datatables', get_template_directory_uri().'/assets/css/addons/datatables.min.css', false );
  wp_enqueue_style( 'hover', get_template_directory_uri().'/assets/css/hover.css', false );
  wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css', false );
  wp_enqueue_style( 'owl-theme', get_template_directory_uri().'/assets/css/owl.theme.default.min.css', false );
  wp_enqueue_style( 'flip-clock', get_template_directory_uri().'/compiled/flipclock.css', false );
  wp_enqueue_style( 'custom', get_template_directory_uri().'/assets/css/custom.css', false );
  wp_enqueue_style( 'magnum-custom', get_template_directory_uri().'/assets/css/magnum-custom.css', false );
  // scripts

}

add_action( 'wp_enqueue_scripts','entrance_styles' );
include(get_template_directory().'/function/anish_function.php');

 ?>
