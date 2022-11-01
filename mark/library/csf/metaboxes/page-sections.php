<?php
$page_id = 0;
if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
	$page_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
}

$current_page_template = get_post_meta( $page_id, '_wp_page_template', true );
if ( 'page-templates/landing.php' != $current_page_template ) {
	return;
}

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_page_section';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Landing Page Sections', 'mark' ),
		'post_type' => 'page',
		'data_type' => 'serialize',
		'context'   => 'advanced',
		'priority'  => 'default',
	) );

	//
	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'Group Section',
		'type'   => 'group',
		'fields' => array(
			// Select field
			array(
				'id'              => 'mark-landing-page-sections',
				'type'            => 'group',
				'title'           => __( 'Select Landing Page Sections', 'mark' ),
				'placeholder'     => 'Select a Section',
				'button_title'    => __( 'New Section', 'mark' ),
				'accordion_title' => __( 'Add New Section', 'mark' ),
				'fields'          => array(
					array(
						'id'    => 'title',
						'type'  => 'text',
						'title' => __( 'Section Name', 'mark' ),
					),
					array(
						'id'         => 'section',
						'type'       => 'select',
						'title'      => __( 'Select Section', 'mark' ),
						'options'    => 'post',
						'query_args' => array(
							'post_type'      => 'section',
							'posts_per_page' => - 1,
						),
					),


				),
			),

		)
	) );


}