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
} else if ( $section_meta['section-type'] != 'counter' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_counter';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Counter Settings', 'mark' ),
		'post_type' => 'section',
		'data_type' => 'serialize',
		'context'   => 'advanced',
		'priority'  => 'default',
	) );

	// Create a section
	CSF::createSection( $prefix, array(
		'fields' => array(
			array(
				'id'              => 'counter-section',
				'type'            => 'group',
				'title'           => __( 'Add Counter', 'mark' ),
				'placeholder'     => 'Select a Section',
				'button_title'    => __( 'Add New Counter Box', 'mark' ),
				'accordion_title' => __( 'Add New', 'mark' ),
				'fields'          => array(
					array(
						'id'      => 'counter_title',
						'type'    => 'text',
						'title'   => __( 'Counter Title', 'mark' ),
						'default' => __( 'Cups of Coffees', 'mark' ),
					),
					array(
						'id'      => 'counter_number',
						'type'    => 'text',
						'title'   => __( 'Counter Number', 'mark' ),
						'default' => __( '3110', 'mark' ),
					),

				),
			),

		)
	) );


}

