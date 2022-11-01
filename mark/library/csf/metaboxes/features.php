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
} else if ( $section_meta['section-type'] != 'features' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_features';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Features Settings', 'mark' ),
		'post_type' => 'section',
		'data_type' => 'serialize',
		'context'   => 'advanced',
		'priority'  => 'default',
	) );

	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'Add Multiple Features',
		'type'   => 'group',
		'fields' => array(
			// Select field
			array(
				'id'              => 'my-features-section',
				'type'            => 'group',
				'title'           => __( 'Add Features', 'mark' ),
				'placeholder'     => 'Select a Section',
				'button_title'    => __( 'New Section', 'mark' ),
				'accordion_title' => __( 'Add New Section', 'mark' ),
				'fields'          => array(
					//upload
					array(
						'id'      => 'heading',
						'type'    => 'text',
						'title'   => __( 'Features Heading', 'mark' ),
						'default' => __( 'Reliability', 'mark' ),
					),
					array(
						'id'    => 'icon',
						'type'  => 'upload',
						'title' => __( 'Features Icon', 'mark' ),
					),
					array(
						'id'    => 'description',
						'type'  => 'textarea',
						'title' => __( 'Features Description', 'mark' ),
					),


				),
			),

		)
	) );


}

