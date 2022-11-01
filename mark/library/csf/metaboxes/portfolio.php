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
} else if ( $section_meta['section-type'] != 'portfolio' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_portfolio';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Portfolio Settings', 'mark' ),
		'post_type' => 'section',
		'data_type' => 'serialize',
		'context'   => 'advanced',
		'priority'  => 'default',
	) );

	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'Add Portfolios',
		'type'   => 'group',
		'fields' => array(

			array(
				'id'      => 'heading',
				'type'    => 'text',
				'title'   => __( 'Portfolio Section Heading', 'mark' ),
				'default' => __( 'Our Works', 'mark' ),
			),

			// Select field
			array(
				'id'              => 'my_portfolio_section',
				'type'            => 'group',
				'title'           => __( 'Add Portfolio', 'mark' ),
				'placeholder'     => 'Select a Section',
				'button_title'    => __( 'New Portfolio', 'mark' ),
				'accordion_title' => __( 'Add New Section', 'mark' ),
				'fields'          => array(
					//upload
					array(
						'id'    => 'title',
						'type'  => 'text',
						'title' => __( 'Image Title', 'mark' ),
					),

					array(
						'id'    => 'filter',
						'type'  => 'text',
						'title' => __( 'Filters', 'mark' ),
						'desc'  => __( 'Comma Separated Texts', 'mark' ),
					),

					array(
						'id'    => 'image',
						'type'  => 'upload',
						'title' => __( 'Portfolio Image', 'mark' ),
					),

				),
			),

		)
	) );


}

