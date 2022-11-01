<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_image_info', true);
echo "<pre>";
//print_r($mark_section_meta);
echo "</pre>";
?>

<!--block section start-->
<section class="bg-dark light-txt" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
    <!--<div class="">-->
    <div class="row">
        <div class="col-md-6 align-self-center">
            <div class="img-block-txt">
                <h2 class="mb-3"><?php echo esc_html($mark_section_meta['heading']) ?></h2>
                <p><?php echo apply_filters('the_content', $mark_section_meta['description']) ?></p>
            </div>
        </div>
        <div class="col-md-6 block-bg-height" style="background: url('<?php echo esc_url($mark_section_meta['image']) ?>') center center / cover no-repeat; "> </div>
    </div>
    <!--</div>-->
</section>
<!--block section end-->