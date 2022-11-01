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
} else if ( $section_meta['section-type'] != 'contact' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_contact';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Contact Settings', 'mark' ),
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

			//Section Heading
			array(
				'id'      => 'heading',
				'type'    => 'text',
				'title'   => __( 'Contact Heading', 'mark' ),
				'default' => __( 'Get In Touch', 'mark' )
			),
			array(
				'id'      => 'sub_heading',
				'type'    => 'textarea',
				'title'   => __( 'Contact Sub Heading', 'mark' ),
				'default' => __( 'Pellentesque eu quam sem, ac malesuada leo sem quam pellente', 'mark' ),
			),

			// Location
			array(
				'id'      => 'location',
				'type'    => 'text',
				'title'   => __( 'Address Heading', 'mark' ),
				'default' => __( 'Location', 'mark' )
			),
			array(
				'id'         => 'address',
				'type'       => 'textarea',
				'title'      => __( 'Address', 'mark' ),
				'default'    => __( '1355 Market Street, Suite 900 San Francisco, CA 94103 New York', 'mark' ),
				'dependency' => array( 'location', '!=', '' ),
			),


			//Contact
			array(
				'id'      => 'contact',
				'type'    => 'text',
				'title'   => __( 'Contact Heading', 'mark' ),
				'default' => __( 'Contact', 'mark' )
			),

			array(
				'id'    => 'contact_details',
				'type'  => 'switcher',
				'title' => __( 'Show Contact Details', 'mark' ),
			),

			array(
				'id'         => 'telephone',
				'type'       => 'text',
				'title'      => __( 'Telephone', 'mark' ),
				'default'    => '+62 500 800 123',
				'dependency' => array( 'contact_details', '!=', 0 ),
			),
			array(
				'id'         => 'fax',
				'type'       => 'text',
				'title'      => __( 'Fax', 'mark' ),
				'default'    => '+62 500 800 112',
				'dependency' => array( 'contact_details', '!=', 0 ),
			),
			array(
				'id'         => 'email',
				'type'       => 'text',
				'title'      => __( 'Email', 'mark' ),
				'default'    => 'testmail@yourdomain.com',
				'dependency' => array( 'contact_details', '!=', 0 ),
			),

			array(
				'id'    => 'image',
				'type'  => 'upload',
				'title' => __( 'Section Background Image', 'mark' ),
			),


		)
	) );

}

