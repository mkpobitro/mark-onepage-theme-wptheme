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
} else if ( $section_meta['section-type'] != 'benefits' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_benefits';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Benefits Settings', 'mark' ),
		'post_type' => 'section',
		'data_type' => 'serialize',
		'context'   => 'advanced',
		'priority'  => 'default',
	) );

	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'Add Multiple Benefits',
		'type'   => 'group',
		'fields' => array(
			array(
				'id'      => 'section_title',
				'type'    => 'text',
				'title'   => __( 'Section Title', 'mark' ),
				'default' => __( 'Benefits', 'mark' ),
			),
			array(
				'id'    => 'benefits_image',
				'type'  => 'upload',
				'title' => __( 'Benefits Image', 'mark' ),
			),
			array(
				'id'    => 'description',
				'type'  => 'textarea',
				'title' => __( 'Benefits Description', 'mark' ),
			),
			// Select field
			array(
				'id'              => 'my-benefits-section',
				'type'            => 'group',
				'title'           => __( 'Add benefits', 'mark' ),
				'placeholder'     => 'Select a Section',
				'button_title'    => __( 'Add Benefits List', 'mark' ),
				'accordion_title' => __( 'Add New Benefits', 'mark' ),
				'fields'          => array(
					array(
						'id'    => 'icon',
						'type'  => 'text',
						'title' => __( 'Benefits Icon class', 'mark' ),
					),
					//upload
					array(
						'id'    => 'list',
						'type'  => 'text',
						'title' => __( 'Benefits Text', 'mark' ),
					),


				),
			),

		)
	) );


}

