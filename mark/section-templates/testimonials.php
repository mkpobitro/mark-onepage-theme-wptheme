<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_testimonials', true);
echo "<pre>";
//print_r($mark_section_meta);
echo "</pre>";
?>

<!--testimonial section start-->
<section class="space-3 space-adjust" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h2 class="title "><?php echo esc_html($mark_section_meta['section_heading']) ?></h2>
                </div>
            </div>

            <div class="col-md-8">
                <div id="js_testimonial" class="owl-carousel owl-theme text-center testimonial-wrapper">
                    <?php
                    $testimonials_meta = $mark_section_meta['my-testimonials-section'];
                    foreach ($testimonials_meta as $testimonial_meta) : ?>
                        <div class="item mb-5"
                             data-dot="<img class='testimonial-thumb' src='<?php echo esc_url($testimonial_meta['photo']) ?>'/>">
                            <img class="mb-5 quote" src="<?php echo get_template_directory_uri(); ?>/assets/img/quote.svg" alt=""/>

                            <p><?php echo apply_filters('the_content', $testimonial_meta['testimonial_text']) ?></p>
                            <h4><?php echo esc_html($testimonial_meta['titles']) ?></h4>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- testimonial section end-->