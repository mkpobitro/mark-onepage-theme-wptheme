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
} else if ( $section_meta['section-type'] != 'image_info' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_image_info';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Image Info Settings', 'mark' ),
		'post_type' => 'section',
		'data_type' => 'serialize',
		'context'   => 'advanced',
		'priority'  => 'default',
	) );

	// Create a section
	CSF::createSection( $prefix, array(
		'fields' => array(
			array(
				'id'      => 'heading',
				'type'    => 'text',
				'title'   => __( 'Image Info Heading', 'mark' ),
				'default' => __( 'One small step for man, one giant leap for mankind', 'mark' ),
			),
			array(
				'id'    => 'description',
				'type'  => 'textarea',
				'title' => __( 'Image Info Description', 'mark' ),
			),
			array(
				'id'    => 'image',
				'type'  => 'upload',
				'title' => __( 'Upload Image', 'mark' ),
			),

		)
	) );


}

