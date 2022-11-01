<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_contact', true);
echo "<pre>";
//print_r($mark_section_meta);
echo "</pre>";
?>

<!--contact section start-->
<section class="contact-wrapper position-relative" id="contact">
	<div class="arrow-bottom-shape"> </div>
	<div class="space-3 parallax section-adjust" style="background-image: url('<?php echo esc_html($mark_section_meta['image']); ?>');">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="section-title text-left light-txt">
						<h2 class="title"><?php echo esc_html($mark_section_meta['heading']); ?></h2>
						<div class="sub-title"><?php echo esc_html($mark_section_meta['sub_heading']); ?></div>
					</div>
					<div class="light-txt">

						<h4><?php echo esc_html($mark_section_meta['location']); ?></h4>
						<p>
							<?php echo esc_html($mark_section_meta['address']); ?>
						</p>
						<h4><?php echo esc_html($mark_section_meta['contact']); ?></h4>
						<p>
							<?php _e('Telephone', 'mark') ?>: <?php echo esc_html($mark_section_meta['telephone']); ?><br />
							<?php _e('Fax', 'mark') ?>: <?php echo esc_html($mark_section_meta['fax']); ?> <br/>
							<?php _e('Email', 'mark') ?>: <?php echo esc_html($mark_section_meta['email']); ?>
						</p>

					</div>
				</div>
				<div class="col-md-6 offset-md-1">

                    <!-- Contact Form-->
					<?php echo do_shortcode('[contact-form-7 id="196" title="Contact form"]'); ?>

				</div>
			</div>
		</div>
	</div>

</section>
<!--contact section end-->