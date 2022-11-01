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
} else if ( $section_meta['section-type'] != 'mission' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_mission';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Mission Settings', 'mark' ),
		'post_type' => 'section',
		'data_type' => 'serialize',
		'context'   => 'advanced',
		'priority'  => 'default',
	) );

	//
	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => '',
		'fields' => array(
			//Heading
			array(
				'id'      => 'heading',
				'type'    => 'text',
				'title'   => __( 'Mission Heading', 'mark' ),
				'default' => __( 'Here We Are', 'mark' )
			),
			array(
				'id'      => 'sub-heading',
				'type'    => 'text',
				'title'   => __( 'Mission Sub-heading', 'mark' ),
				'default' => __( 'Our mission is very simple. we just wanna dominate our space', 'mark' ),
			),
			array(
				'id'    => 'description',
				'type'  => 'textarea',
				'title' => __( 'Mission Description', 'mark' ),
			),

		)
	) );

}

