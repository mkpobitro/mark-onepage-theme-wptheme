<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_cta', true);
echo "<pre>";
//print_r($mark_section_meta);
echo "</pre>";
?>
<!-- parallax section start -->
<section class="space-3 parallax base-gradient" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>" style="background-image: url('<?php echo esc_attr($mark_section_meta['bg_image']) ?>');">
    <div class="arrow-bottom-shape"> </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8 text-center light-txt">
                <h2 class="mb-3">
                    <?php echo esc_html($mark_section_meta['heading']) ?>
                </h2>
                <h5 class="text-uppercase letter-space-1"><?php echo esc_html($mark_section_meta['sub-heading']) ?></h5>

                <div class="space-3 pt-4">
                    <a href="<?php echo esc_url($mark_section_meta['button_one_url']['url']) ?>" class="btn btn-light-solid"><?php echo esc_html($mark_section_meta['button_one_label']) ?></a>
                    <a href="<?php echo esc_url($mark_section_meta['button_two_url']['url']) ?>" class="btn btn-light-border"><?php echo esc_html($mark_section_meta['button_two_label']) ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- parallax section end -->