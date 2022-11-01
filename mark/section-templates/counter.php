<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_counter', true);
echo "<pre>";
//print_r($mark_section_meta);
echo "</pre>";
?>

<!-- fun factor section start -->
<section class="space-3" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
    <div class="container">
        <div class="row">
            <?php
            foreach($mark_section_meta['counter-section'] as $counter_meta):
            ?>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="fun-box text-center fun-separator">
                    <div class="value" data-target="<?php echo esc_html($counter_meta['counter_number']) ?>">0</div>
                    <div class="title"><?php echo esc_html($counter_meta['counter_title']) ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- fun factor section end -->