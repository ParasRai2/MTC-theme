<?php
function student_post_type(){
  $args = array(
    'name'    => __('Students'),
    'singular_name' => __('Student')
  );
  $post_cust = array(
    'labels'    => $args,
    'has_archive' => true,
    'public'      => true,
    'rewrite'     => array('slug' => 'student'),
    'show_in_rest' => true,
    'supports'    => array(
      'editor','title','excerpt', 'thumbnail'
    ),
    'taxonomies' => array(
      'post_tag','category'
    )
  );
  register_post_type( 'student', $post_cust );
}
add_action( 'init','student_post_type' );


function question_set_post_type(){
  $args = array(
    'name'    => __('Questions'),
    'singular_name' => __('Question')
  );
  $post_cust = array(
    'labels'    => $args,
    'has_archive' => true,
    'public'      => true,
    'rewrite'     => array('slug' => 'question'),
    'show_in_rest' => true,
    'supports'    => array(
      'editor','title','excerpt', 'thumbnail'
    ),
    'taxonomies' => array(
      'post_tag','category'
    )
  );
  register_post_type( 'question', $post_cust );
}
add_action( 'init','question_set_post_type' );
function mcq( $meta_boxes ) {
	$prefix = 'mcq-';

	$meta_boxes[] = array(
		'id' => 'mcq',
		'title' => esc_html__( 'Questions', 'mcq-questions' ),
		'post_types' => array('question' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'title',
				'type' => 'text',
				'name' => esc_html__( 'Exam TItle', 'mcq-questions' ),
			),
			array(
				'id' => $prefix . 'option1',
				'type' => 'text',
				'name' => esc_html__( 'Option 1', 'mcq-questions' ),
			),
			array(
				'id' => $prefix . 'question',
				'type' => 'text',
				'name' => esc_html__( 'Questions', 'mcq-questions' ),
			),
			array(
				'id' => $prefix . 'option2',
				'type' => 'text',
				'name' => esc_html__( 'Option 2', 'mcq-questions' ),
			),
			array(
				'id' => $prefix . 'option3',
				'type' => 'text',
				'name' => esc_html__( 'Option 3', 'mcq-questions' ),
			),
			array(
				'id' => $prefix . 'option4',
				'type' => 'text',
				'name' => esc_html__( 'Option 4', 'mcq-questions' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'mcq' );
// add_filter( 'rwmb_meta_boxes', 'meta_box_group_demo_register' );
// function meta_box_group_demo_register( $meta_boxes ) {
//   $meta_boxes[] = array(
//       'title' => 'Car Details',
//       'post_types' => array('question' ),
//       'context' => 'side',
//       'fields' => array(
//           array(
//               'id' => 'car',
//               'type' => 'group',
//
//               'fields' => array(
//                   array(
//                       'name' => 'Brand',
//                       'id' => 'brand',
//                       'type' => 'text',
//                   ),
//                   array(
//                       'name' => 'Date Release',
//                       'id' => 'date',
//                       'type' => 'date',
//                   ),
//                   array(
//                       'name' => 'Color',
//                       'id' => 'color',
//                       'type' => 'color',
//                   ),
//               ),
//           ),
//       ),
//   );
//   return $meta_boxes;
// }
 ?>
