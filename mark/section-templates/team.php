<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_team', true);
echo "<pre>";
//print_r($mark_section_meta);
echo "</pre>";
?>

<!--team section start-->
<section class="space-3 space-adjust" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h2 class="title "><?php echo esc_html($mark_section_meta['section_title']) ?></h2>
                    <div class="sub-title">
                        <?php echo apply_filters('the_content', $mark_section_meta['section_description']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $mark_team = $mark_section_meta['my-team-section'];
        if (count($mark_team) > 0):
            ?>
            <div class="row">
                <?php
                //            $mark_team_meta_profiles = $mark_section_meta['my-team-section'];
                foreach ($mark_team as $mark_tm_meta):
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 team-member">
                        <div class="thumb">
                            <img src="<?php echo esc_html($mark_tm_meta['member_image']) ?>" alt="">
                        </div>
                        <h3 class="team-title"><?php echo esc_html($mark_tm_meta['name']) ?></h3>
                        <div class="team-designation">
                            <?php echo esc_html($mark_tm_meta['title']) ?>
                        </div>
                        <div class="team-socail-links">

                            <?php
                            foreach ($mark_tm_meta['team_social_profiles'] as $mark_social_key => $team_social_field):
                                if ($team_social_field != ''): ?>

                                    <a href="<?php echo esc_url($team_social_field) ?>"><i class="fa fa-<?php echo esc_attr($mark_social_key) ?>"></i></a>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- team section end-->