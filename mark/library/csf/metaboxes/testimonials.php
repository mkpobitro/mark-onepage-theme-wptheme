<?php

$section_id = 0;
if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
	$section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
}

if ( 'section' != get_post_type( $section_id ) ) {
	return;
}

$section_meta = get_post_meta( $section_id, 'mark_section_type', true );
if ( ! $section_meta ) {
	return;
} else if ( $section_meta['section-type'] != 'testimonials' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_testimonials';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Testimonials Settings', 'mark' ),
		'post_type' => 'section',
		'data_type' => 'serialize',
		'context'   => 'advanced',
		'priority'  => 'default',
	) );

	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'Add Multiple Testimonials',
		'type'   => 'group',
		'fields' => array(
			array(
				'id'      => 'section_heading',
				'type'    => 'text',
				'title'   => __( 'Section Heading', 'mark' ),
				'default' => __( 'Testimonials', 'mark' ),
			),
			// Select field
			array(
				'id'              => 'my-testimonials-section',
				'type'            => 'group',
				'title'           => __( 'Add testimonials', 'mark' ),
				'placeholder'     => 'Select a Section',
				'button_title'    => __( 'Add Testimonials', 'mark' ),
				'accordion_title' => __( 'Add New Testimonials', 'mark' ),
				'fields'          => array(
					array(
						'id'    => 'titles',
						'type'  => 'text',
						'title' => __( 'Title', 'mark' ),
					),
					//upload
					array(
						'id'    => 'photo',
						'type'  => 'upload',
						'title' => __( 'Photo', 'mark' ),
					),
					array(
						'id'    => 'testimonial_text',
						'type'  => 'textarea',
						'title' => __( 'Testimonial Text', 'mark' ),
					),


				),
			),

		)
	) );


}

