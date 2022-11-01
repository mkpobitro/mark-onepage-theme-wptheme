<?php
//Template Name: Mark Landing Page
get_header();

$mark_sections = get_post_meta(get_the_ID(), 'mark_page_section', true );

if(isset($mark_sections['mark-landing-page-sections']) && is_array($mark_sections['mark-landing-page-sections'])){
    foreach($mark_sections['mark-landing-page-sections'] as $mark_section){
        $mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type', true );
        $mark_section_type = isset($mark_section_meta['section-type']) ? $mark_section_meta['section-type'] : '';
        get_template_part("section-templates/{$mark_section_type}");
    }
}


get_footer(); ?>
