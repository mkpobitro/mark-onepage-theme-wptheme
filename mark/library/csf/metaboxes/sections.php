<?php
//if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Section Type', 'mark' ),
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
			// Select field
			array(
				'id'          => 'section-type',
				'type'        => 'select',
				'title'       => __( 'Select Section Type', 'mark' ),
				'placeholder' => 'Select a Section',
				'options'     => array(
					'banner'       => __( 'Banner', 'mark' ),
					'mission'      => __( 'Mission', 'mark' ),
					'features'     => __( 'Features', 'mark' ),
					'about'        => __( 'About', 'mark' ),
					'services'     => __( 'Services', 'mark' ),
					'benefits'     => __( 'Benefits', 'mark' ),
					'testimonials' => __( 'Testimonials', 'mark' ),
					'image_info'   => __( 'Image Info', 'mark' ),
					'counter'      => __( 'Counter', 'mark' ),
					'cta'          => __( 'CTA', 'mark' ),
					'team'         => __( 'Team', 'mark' ),
					'portfolio'    => __( 'Portfolio', 'mark' ),
					'pricing'      => __( 'Pricing Plan', 'mark' ),
					'shop'         => __( 'Shop', 'mark' ),
					'blog'         => __( 'Blog', 'mark' ),
					'clients'      => __( 'Clients', 'mark' ),
					'subscription' => __( 'Subscription', 'mark' ),
					'contact'      => __( 'Contact', 'mark' ),
				),
				'default'     => '',
			),

		)
	) );


}