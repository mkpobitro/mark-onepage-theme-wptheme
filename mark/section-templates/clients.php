<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_clients', true);
//echo "<pre>";
//print_r($mark_section_meta);
//echo "</pre>";

$mark_clients = $mark_section_meta['my_clients_section'];

if(count($mark_clients) > 0):
?>
<!-- clients section start -->
<section class="client-section" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="clients-logo">
                    <?php
                    foreach ( $mark_clients as $mark_client ) : ?>
					    <a href="<?php echo esc_url($mark_client['url']); ?>" class="client-item"><img src="<?php echo esc_url($mark_client['logo']); ?>" alt="<?php echo esc_attr($mark_client['title']); ?>"></a>
                    <?php endforeach;
                    ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- clients section end -->
<?php endif;