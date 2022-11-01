<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mark
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
		<?php if ( has_post_thumbnail( the_post_thumbnail( 'large' ) ) ) ?>
		<?php the_title( '<h1 class="entry-title mt-4 mb-4">', '</h1>' ); ?>
    </header><!-- .entry-header -->

	<?php //mark_post_thumbnail(); ?>

    <div class="entry-content">
		<?php the_content(); ?>
    </div>


</article><!-- #post-<?php the_ID(); ?> -->
