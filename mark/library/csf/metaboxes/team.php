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
} else if ( $section_meta['section-type'] != 'team' ) {
	return;
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'mark_section_type_team';

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => __( 'Team Settings', 'mark' ),
		'post_type' => 'section',
		'data_type' => 'serialize',
		'context'   => 'advanced',
		'priority'  => 'default',
	) );

	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'Add Multiple Team Members',
		'type'   => 'group',
		'fields' => array(
			array(
				'id'      => 'section_title',
				'type'    => 'text',
				'title'   => __( 'Section Title', 'mark' ),
				'default' => __( 'Team', 'mark' ),
			),
			array(
				'id'    => 'section_description',
				'type'  => 'textarea',
				'title' => __( 'Section Description', 'mark' ),
			),
			// group field
			array(
				'id'              => 'my-team-section',
				'type'            => 'group',
				'title'           => __( 'Add Team', 'mark' ),
				'placeholder'     => 'Select a Section',
				'button_title'    => __( 'Add New Member', 'mark' ),
				'accordion_title' => __( 'Add New', 'mark' ),
				'fields'          => array(
					//upload
					array(
						'id'      => 'name',
						'type'    => 'text',
						'title'   => __( 'Name', 'mark' ),
						'default' => __( 'John Doe', 'mark' ),
					),
					array(
						'id'    => 'member_image',
						'type'  => 'upload',
						'title' => __( 'Upload member photo', 'mark' ),
					),

					array(
						'id'    => 'title',
						'type'  => 'text',
						'title' => __( 'Title', 'mark' ),
					),
					array(
						'id'     => 'team_social_profiles',
						'type'   => 'fieldset',
						'title'  => __( 'Social Profiles', 'mark' ),
						'fields' => mark_get_social_fields(),

					),


				),
			),

		)
	) );


}

