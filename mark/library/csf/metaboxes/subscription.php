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
} else if ( $section_meta['section-type'] != 'subscription' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_subscription';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Subscription Settings', 'mark' ),
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
				'title'   => __( 'Subscription Heading', 'mark' ),
				'default' => __( 'Subscribe Now', 'mark' )
			),
			array(
				'id'    => 'url',
				'type'  => 'textarea',
				'title' => __( 'Mailchimp Form URL', 'mark' ),
			),
			array(
				'id'      => 'btn_label',
				'type'    => 'text',
				'title'   => __( 'Button Label', 'mark' ),
				'default' => __( 'Subscribe', 'mark' ),
			),

		)
	) );

}

