<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'],'mark_section_type_banner', true );
//print_r($mark_section_meta);
?>

<!--hero section start-->
<div id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
    <section class="hero js_full_height base-gradient " style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/banner.jpg');">
        <div class="arrow-bottom-shape"> </div>
        <div class="hero-content light-txt text-center">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-10" data-wow-duration="2s" data-wow-delay="1s">
                        <h1 class="hero-title"><?php echo esc_html($mark_section_meta['heading']) ?></h1>
                        <div class="hero-sub-title"><?php echo esc_html($mark_section_meta['sub-heading']) ?></div>
                        <div class="hero-action">
                            <!--<a href="#" class="btn btn-primary-solid">our uniqueness</a>-->
                            <a href="<?php echo esc_url($mark_section_meta['button_one_url']['url']); ?>" class="btn btn-light-solid"><?php echo esc_html($mark_section_meta['button_one_label']) ?></a>
                            <a href="<?php echo esc_url($mark_section_meta['button_two_url']['url']); ?>" class="btn btn-light-border"><?php echo esc_html($mark_section_meta['button_two_label']) ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--hero section end-->