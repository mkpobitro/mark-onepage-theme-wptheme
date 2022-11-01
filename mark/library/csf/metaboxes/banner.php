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
} else if ( $section_meta['section-type'] != 'banner' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_banner';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Banner Settings', 'mark' ),
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
			// image field
			array(
				'id'    => 'image_upload',
				'type'  => 'upload',
				'title' => __( 'Banner Image', 'mark' ),
			),

			//Heading
			array(
				'id'      => 'heading',
				'type'    => 'text',
				'title'   => __( 'Banner Heading', 'mark' ),
				'default' => __( 'Gain the beautiful result', 'mark' )
			),
			array(
				'id'      => 'sub-heading',
				'type'    => 'text',
				'title'   => __( 'Banner Sub-heading', 'mark' ),
				'default' => __( 'Unlocking the next dimension in business analysis', 'mark' ),
			),
			array(
				'id'      => 'button_one_label',
				'type'    => 'text',
				'title'   => __( 'Button One Label', 'mark' ),
				'default' => __( 'Let\'s Start Now', 'mark' ),
			),

			array(
				'id'         => 'button_one_url',
				'type'       => 'link',
				'title'      => __( 'Button One URL', 'mark' ),
				'dependency' => array( 'button_one_label', '!=', '' ),
			),

			array(
				'id'      => 'button_two_label',
				'type'    => 'text',
				'title'   => __( 'Button two Label', 'mark' ),
				'default' => __( 'Purchase Now', 'mark' ),
			),

			array(
				'id'         => 'button_two_url',
				'type'       => 'link',
				'title'      => __( 'Button two URL', 'mark' ),
				'dependency' => array( 'button_two_label', '!=', '' ),
			),


		)
	) );

}

