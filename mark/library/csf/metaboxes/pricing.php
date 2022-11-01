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
} else if ( $section_meta['section-type'] != 'pricing' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_pricing';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Pricing Settings', 'mark' ),
		'post_type' => 'section',
		'data_type' => 'serialize',
		'context'   => 'advanced',
		'priority'  => 'default',
	) );

	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'Pricing Package',
		'type'   => 'group',
		'fields' => array(
			array(
				'id'      => 'heading',
				'type'    => 'text',
				'title'   => __( 'Heading', 'mark' ),
				'default' => __( 'Choose Your Plan', 'mark' ),
			),
			array(
				'id'      => 'sub_heading',
				'type'    => 'text',
				'title'   => __( 'Sub Heading', 'mark' ),
				'default' => __( 'Lorem ipsum dolor site amet', 'mark' ),
			),
			array(
				'id'    => 'background',
				'type'  => 'upload',
				'title' => __( 'Section Background', 'mark' ),
			),

			// group field
			array(
				'id'              => 'my_pricing_section',
				'type'            => 'group',
				'title'           => __( 'Add Pricing', 'mark' ),
				'placeholder'     => 'Select a Section',
				'button_title'    => __( 'New Pricing Package', 'mark' ),
				'accordion_title' => __( 'Add New Pricing', 'mark' ),
				'fields'          => array(
					//upload
					array(
						'id'    => 'title',
						'type'  => 'text',
						'title' => __( 'Package Title', 'mark' ),
					),

					array(
						'id'    => 'price',
						'type'  => 'text',
						'title' => __( 'Package Amount', 'mark' ),
					),

					array(
						'id'    => 'tenure',
						'type'  => 'text',
						'title' => __( 'Tenure', 'mark' ),
					),

					array(
						'id'    => 'options',
						'type'  => 'textarea',
						'title' => __( 'Package options', 'mark' ),
						'desc'  => __( 'Add options in a new line', 'mark' ),
					),

					array(
						'id'    => 'btn_label',
						'type'  => 'text',
						'title' => __( 'Button Label', 'mark' ),
					),

					array(
						'id'         => 'btn_url',
						'type'       => 'text',
						'title'      => __( 'Button URL', 'mark' ),
						'dependency' => array( 'btn_label', '!=', '' ),
					),

					array(
						'id'    => 'recommended',
						'type'  => 'switcher',
						'title' => __( 'Recommended', 'mark' ),
					),

					array(
						'id'         => 'recommended_label',
						'type'       => 'text',
						'title'      => __( 'Recommended Label', 'mark' ),
						'dependency' => array( 'recommended', '!=', '' ),
					),

				),
			),

		)
	) );
}

