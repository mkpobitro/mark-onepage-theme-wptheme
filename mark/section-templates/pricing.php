<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_pricing', true);

$mark_pricing_packages = $mark_section_meta['my_pricing_section'];


?>

<!-- pricing section start -->
<section class="price-table-section" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
	<div class="space-3 parallax price-bg-height" style="background-image: url('<?php echo esc_url($mark_section_meta['background']); ?>');">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-md-8">
					<div class="section-title text-center light-txt">
						<h2 class="title "><?php echo esc_html($mark_section_meta['heading']); ?></h2>
						<div class="sub-title"><?php echo esc_html($mark_section_meta['sub_heading']); ?></div>
					</div>
				</div>
			</div>
            <?php
            if(count($mark_pricing_packages) > 0 ): ?>

                <div class="row">
                    <?php
                        $package_recommended = false;
                        foreach($mark_pricing_packages as $mark_pricing_package):
                            $package_recommended = $mark_pricing_package['recommended'];

                            ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="price-list text-center <?php if($package_recommended){ echo 'featured-price'; } ?>">

                                    <?php if($package_recommended): ?>
                                        <!--only for featured price-->
                                        <div class="ribbon">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ribbon.png" srcset="assets/img/ribbon@2x.png 2x" alt="">
                                        </div>
                                        <div class="recommanded"><?php echo esc_html($mark_pricing_package['recommended_label']); ?></div>
                                        <!--only for featured price-->
                                    <?php endif; ?>


                                    <h2 class="price-title"><?php echo esc_html($mark_pricing_package['title']); ?></h2>
                                    <div class="price-value">
                                        <sup>$</sup> <?php echo esc_html($mark_pricing_package['price']); ?>
                                        <div class="price-duration"><?php _e('Per', 'mark') ?> <?php echo esc_html($mark_pricing_package['tenure']); ?></div>
                                    </div>

                                    <ul class="list-unstyled price-info-list">
                                        <?php
                                        $pricing_options = explode("\n", $mark_pricing_package['options']);
                                        foreach($pricing_options as $pricing_option): ?>
                                            <li>- <?php echo esc_html($pricing_option); ?> </li>
                                        <?php endforeach;
                                        ?>
                                    </ul>
                                    <a href="<?php echo esc_url($mark_pricing_package['btn_url']); ?>" class="btn <?php if($package_recommended){
                                        echo 'btn-primary-solid';
                                    }else{
                                        echo 'btn-gray-border';
                                    }
                                    ?>"><?php echo esc_html($mark_pricing_package['btn_label']); ?></a>
                                </div>
                            </div>
                        <?php endforeach;
                    ?>
                </div>

            <?php endif;
            ?>

		</div>
	</div>
</section>
<!-- pricing section end -->