<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_metabox';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'              => 'Page Metabox',
		'post_type'          => 'page',
		'data_type'          => 'serialize',
		'context'            => 'advanced',
		'priority'           => 'default',
		'exclude_post_types' => array(),
		'page_templates'     => '',
		'post_formats'       => '',
		'show_restore'       => false,
		'enqueue_webfont'    => true,
		'async_webfont'      => false,
		'output_css'         => true,
		'nav'                => 'normal',
		'theme'              => 'dark',
		'class'              => '',
	) );

	//
	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'Tab Title 1',
		'fields' => array(

			//
			// A text field
			array(
				'id'    => 'opt-text',
				'type'  => 'text',
				'title' => 'Simple Text',
			),

		)
	) );

	//
	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'Tab Title 2',
		'fields' => array(

			// A textarea field
			array(
				'id'    => 'opt-textarea',
				'type'  => 'textarea',
				'title' => 'Simple Textarea',
			),

		)
	) );

}