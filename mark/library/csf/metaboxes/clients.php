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
} else if ( $section_meta['section-type'] != 'clients' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_clients';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Clients Settings', 'mark' ),
		'post_type' => 'section',
		'data_type' => 'serialize',
		'context'   => 'advanced',
		'priority'  => 'default',
	) );

// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'Add Multiple clients',
		'type'   => 'group',
		'fields' => array(
			// Select field
			array(
				'id'              => 'my_clients_section',
				'type'            => 'group',
				'title'           => __( 'Add Clients Logo', 'mark' ),
				'placeholder'     => 'Select a Section',
				'button_title'    => __( 'Add New Client', 'mark' ),
				'accordion_title' => __( 'Add New Section', 'mark' ),
				'fields'          => array(
					//upload
					array(
						'id'    => 'title',
						'type'  => 'text',
						'title' => __( 'Clients Title', 'mark' ),
					),
					array(
						'id'    => 'logo',
						'type'  => 'upload',
						'title' => __( 'Client Logo', 'mark' ),
					),
					array(
						'id'    => 'url',
						'type'  => 'text',
						'title' => __( 'Logo URL', 'mark' ),
					),
				),
			),
		)
	) );

}

