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
} else if ( $section_meta['section-type'] != 'blog' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_blog';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Blog Settings', 'mark' ),
		'post_type' => 'section',
		'data_type' => 'serialize',
		'context'   => 'advanced',
		'priority'  => 'default',
	) );

	//
	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'BLOG',
		'fields' => array(
			//Heading
			array(
				'id'      => 'heading',
				'type'    => 'text',
				'title'   => __( 'Blog Heading', 'mark' ),
				'default' => __( 'Our blog', 'mark' )
			),
		)
	) );

}

