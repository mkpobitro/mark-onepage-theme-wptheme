<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'],'mark_section_type_features', true );

?>

<!--feature section start-->
<section class="space-3 section-gray" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
    <div class="arrow-top-shape"> </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <?php
            foreach($mark_section_meta['my-features-section'] as $mark_feature_meta){

            $mark_feature_icon = $mark_feature_meta['icon'];
            $mark_feature_heading = $mark_feature_meta['heading'];
            $mark_feature_description = $mark_feature_meta['description']; ?>

            <div class="col-lg-4 col-md-6">
                <div class="feature-list text-center">

                    <!-- for img start -->
                    <div class="feature-list-img">
                        <img src="<?php echo esc_url($mark_feature_icon) ?>" alt="">
                    </div>
                    <!-- for img end -->

                    <h3 class="feature-title">
                        <?php echo esc_html($mark_feature_heading) ?>
                    </h3>
                    <div class="feature-info">
                        <?php echo apply_filters('the_content', $mark_feature_description) ?>
                    </div>
                </div>
            </div>


           <?php } ?>

        </div>
    </div>
</section>
<!--feature section end-->