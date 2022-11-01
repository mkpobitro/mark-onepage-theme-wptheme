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
} else if ( $section_meta['section-type'] != 'cta' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_cta';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'CTA Settings', 'mark' ),
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
				'title'   => __( 'CTA Heading', 'mark' ),
				'default' => __( 'Are You Impressed?', 'mark' )
			),
			array(
				'id'      => 'sub-heading',
				'type'    => 'text',
				'title'   => __( 'CTA Sub-heading', 'mark' ),
				'default' => __( 'OR WANT TO KNOW MORE BEFORE PURCHASE', 'mark' ),
			),
			array(
				'id'      => 'button_one_label',
				'type'    => 'text',
				'title'   => __( 'Button one Label', 'mark' ),
				'default' => __( 'Let\'s Start now', 'mark' ),
			),
			array(
				'id'         => 'button_one_url',
				'type'       => 'link',
				'title'      => __( 'Button one URL', 'mark' ),
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
				'title'      => __( 'Button Two URL', 'mark' ),
				'dependency' => array( 'button_two_label', '!=', '' ),
			),
			array(
				'id'    => 'bg_image',
				'type'  => 'upload',
				'title' => __( 'Upload Image Background', 'mark' ),
			),
		)
	) );

}

