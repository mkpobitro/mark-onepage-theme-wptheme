<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_blog', true);

$args = array(
        'post_type'        => 'post',
        'posts_per_page'   => 1,
        'orderby'          => 'date',
        'order'            => 'ASC'
);
$_posts = get_posts($args);

if(count($_posts) > 0):
    $mark_post_thumbnail = get_the_post_thumbnail_url($_posts[0], 'mark_landscape_one');
?>
<!--blog section start-->
<section class="blog-block" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
	<!--<div class="">-->
	<div class="row">
		<div class="col-md-6 align-self-center">

			<div class="img-block-txt">
				<div class="section-title">
					<h2 class="title "><?php echo esc_html($mark_section_meta['heading']) ?></h2>
				</div>
				<h2 class="mb-1"><a href="<?php the_permalink($_posts[0]); ?>"><?php echo esc_html($_posts[0]->post_title) ?></a></h2>
				<div class="meta mb-4">
					<a href="<?php the_permalink($_posts[0]); ?>" class="date"><?php echo get_the_date('', $_posts[0]) ?></a>
					<?php  _e('By', 'mark') ?>
					<a href="<?php the_permalink($_posts[0]); ?>"> <?php the_author(); ?></a>
				</div>
				<p><?php echo apply_filters('the_content', $_posts[0]->post_excerpt); ?></p>
				<a href="<?php the_permalink(get_option('page_for_posts')); ?>" class="btn-link"><?php _e('View All Blog Post', 'mark'); ?></a>
			</div>
		</div>
		<div class="col-md-6 base-gradient blog-bg-height" style="background: url('assets/img/b-img.jpg') center center / cover no-repeat; ">
			<img src="<?php if($mark_post_thumbnail) echo esc_url($mark_post_thumbnail);  ?>" alt=""/>
		</div>
	</div>
	<!--</div>-->
</section>
<?php endif; ?>
<!--blog section end-->
