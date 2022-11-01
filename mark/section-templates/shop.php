<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_shop', true);

$mark_number_of_products = isset($mark_section_meta['number_of_products']) ? $mark_section_meta['number_of_products'] : 6;

$mark_products_args = array(
	'post_type'   => 'product',
	'posts_per_page' => $mark_number_of_products,
    'post_status' => 'publish',
);
//if((function_exists('woocommerce'))) :
$mark_products = new WP_Query($mark_products_args);

?>


<!--product section start-->
<section class="space-3 space-adjust" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-8">
				<div class="section-title text-center">
					<h2 class="title "><?php echo esc_html($mark_section_meta['heading']); ?></h2>
				</div>
			</div>


			<div class="col-md-12">
                <?php
                //echo do_shortcode(sprintf('[products columns="3" limit="%s" orderby ="date" order="DESC" ]', esc_attr($mark_number_of_products)));
                ?>

				<ul class="products">
					<?php
                        $mark_counter = 0;
                        while($mark_products-> have_posts()) :
                            $mark_counter ++;
	                        $mark_products-> the_post();
                            $mark_product_id = get_the_ID();
                            $mark_product = wc_get_product($mark_product_id);
                            $mark_product_class = $mark_counter % 3 ==0 ? 'last':'';
                        ?>

                            <li class="product <?php echo esc_attr($mark_product_class); ?>">
                                <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    <h2 class="woocommerce-loop-product__title"><?php the_title(); ?></h2>
                                    <span class="price">
                                    <del>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"><?php _e('$', 'mark'); ?></span>
                                            <?php echo esc_html($mark_product->get_regular_price()); ?>
                                        </span>
                                    </del>
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"><?php _e('$', 'mark'); ?></span>
                                            <?php echo esc_html($mark_product->get_sale_price()); ?>
                                        </span>
                                    </ins>
                                </span>
                                </a>
                                <a href="<?php echo esc_url($mark_product->add_to_cart_url()); ?>" class="button add_to_cart_button"><?php _e('Add to cart', 'mark'); ?></a>
                            </li>

                     <?php endwhile;
                     wp_reset_query();
                    ?>

				</ul>
				<div class="text-center">
					<a href="<?php echo esc_url($mark_section_meta['shop_link_url']); ?>" class="btn-link"><?php echo esc_html($mark_section_meta['shop_link_label']); ?></a>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- product section end-->

<?php //endif;