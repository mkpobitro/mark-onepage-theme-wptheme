<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'],'mark_section_type_mission', true );
//print_r($mark_section_meta);
?>

<!--about section start-->
<section class="space-3 space-adjust" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
    <div class="container sm-center">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2 class="title"> <?php echo esc_html($mark_section_meta['heading']) ?></h2>
                </div>
            </div>

            <div class="col-lg-6 col-12 align-self-center">
                <div class="quotatoin-wrap">
                    <div class="quotation-txt pr-md-5">
                        <?php echo esc_html($mark_section_meta['sub-heading']) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <?php echo apply_filters('the_content', $mark_section_meta['description']) ?>
            </div>
        </div>

    </div>
</section>
<!--about section end-->