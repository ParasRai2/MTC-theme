<?php
//Styles
function my_styles(){
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
  wp_enqueue_style( 'parascss', get_template_directory_uri().'/assets/css/par-css/par.css', false );
}

//Scripts
function my_scripts() {
  wp_enqueue_script( 'jquery3.3', get_template_directory_uri().'/assets/js/jquery-3.3.1.min.js', array(), false, false );
  wp_enqueue_script( 'bootstrapjs', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), false, false );
  wp_enqueue_script( 'mdbjs', get_template_directory_uri().'/assets/js/mdb.min.js', array(), false, false );
  wp_enqueue_script( 'pooperjs', get_template_directory_uri().'/assets/js/popper.min.js', array(), false, false );
  wp_enqueue_script( 'datatablesjs', get_template_directory_uri().'/assets/js/addons/datatables.min.js', array(), false, false );
  wp_enqueue_script( 'owl-carouseljs', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array(), false, false );

  wp_enqueue_script( 'flipclockjs', get_template_directory_uri().'/compiled/flipclock.js', array(), false, false );
  wp_enqueue_script( 'fullscreenjs', get_template_directory_uri().'/assets/js/fullScreen.js', array(), false, false );
  wp_enqueue_script( 'customjs', get_template_directory_uri().'/assets/js/custom.js', array(), '1.1', false );

  wp_enqueue_script( 'parasjs', get_template_directory_uri().'/assets/js/par-js/par-js.js', array(), false, false );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );
add_action( 'wp_enqueue_scripts','my_styles' );

function reading_question(){
  register_post_type('paragraphs', array(
      'labels'                => array(
          'name'              => __('Paragraphs'),
          'singular_name'     => __('Paragraph')
        ),
      
      'has_archive'           => true,
      'public'                => true,
      'rewrite'               => array(
          'slug'              => 'paragraphs'
        ),

      'show_in_rest'          => true,
      'supports'              => array(
          'editor', 'title', 'excerpt', 'thumbnail'
        ),
      
      'taxonomies'            => array(
          'post_tag', 'category'
        )
  ));
}
add_action('init', 'reading_question');


 
?>
