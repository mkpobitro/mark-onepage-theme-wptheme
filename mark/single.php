<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mark
 */

get_header();
?>

<div id="primary" class="content-area col-md-8 offset-md-2 mt-5">
    <main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );


		endwhile; // End of the loop.
		?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();