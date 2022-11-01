<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_services', true);
echo "<pre>";
//print_r($mark_section_meta);
echo "</pre>";
?>
<!--service section start-->
<section class="space-3" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2 class="title"><?php echo esc_html($mark_section_meta['section_title']) ?></h2>
                </div>
            </div>

            <?php
            foreach($mark_section_meta['my-services-section'] as $mark_service_meta): ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-gap">
                <div class="services-list text-left">
                    <div class="services-icon">
                        <i class="bi <?php echo esc_attr($mark_service_meta['icon']) ?>"></i>
                    </div>
                    <h4 class="services-title">
                        <?php echo esc_html($mark_service_meta['heading']) ?>
                    </h4>
                    <?php echo apply_filters('the_content', $mark_service_meta['description']) ?>
                </div>
            </div>
            <?php endforeach; ?>


        </div>
    </div>
</section>
<!--service section end-->