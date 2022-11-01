<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_benefits', true);
echo "<pre>";
//print_r($mark_section_meta);
echo "</pre>";
?>

<!--block section start-->
<section class="space-3 section-gray" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="section-title mb-4">
                    <h2 class="title"><?php echo esc_html($mark_section_meta['section_title']) ?></h2>
                </div>
                <?php echo apply_filters('the_content', $mark_section_meta['description']) ?>
                <ul class="list-unstyled">
                    <?php foreach($mark_section_meta['my-benefits-section'] as $mark_benefit_list_meta): ?>
                    <li><i class="fa <?php echo esc_attr($mark_benefit_list_meta['icon']) ?> pr-2 text-purple"></i><?php echo esc_attr($mark_benefit_list_meta['list']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="col-md-6 order-md-first">
                <img class="img-fluid mb-mt-0 mt-4" src="<?php echo esc_html($mark_section_meta['benefits_image']) ?>" alt=""/>
            </div>

        </div>
    </div>
    <div class="arrow-bottom-shape pt-5"> </div>
</section>
<!--block section end-->