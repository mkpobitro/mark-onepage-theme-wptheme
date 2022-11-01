<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mark_One_Page_Theme
 */

get_header();
?>

    <main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
			<?php
			endif;


			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				if ( is_shop() ) { ?>
                    <section class="container shop-page">
                        <!--<div class="">-->
                        <div class="row">
                            <div class="col-md-10 m-auto">

                                <div class="container">
                                    <h2 class="mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php echo do_shortcode( '[products columns="3" orderby ="date" order="DESC" ]' ); ?>
                                </div>
                            </div>

                        </div>
                        <!--</div>-->
                    </section>

				<?php } else { ?>
                    <section class="blog-block">
                        <!--<div class="">-->
                        <div class="row">
                            <div class="col-md-6 align-self-center">

                                <div class="img-block-txt">

                                    <h2 class="mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="meta mb-4">
                                        <a href="<?php the_permalink(); ?>"
                                           class="date"><?php echo get_the_date(); ?></a>
										<?php _e( 'By', 'mark' ) ?>
                                        <a href="<?php the_permalink(); ?>"> <?php the_author(); ?></a>
                                    </div>
									<?php apply_filters( 'the_content', the_excerpt() ); ?>
                                </div>
                            </div>
                            <div class="col-md-6 base-gradient blog-bg-height">
								<?php the_post_thumbnail( 'mark_landscape_one' ); ?>
                            </div>
                        </div>
                        <!--</div>-->
                    </section>

				<?php }

				?>


			<?php endwhile;

			the_posts_navigation();


		endif;
		?>

    </main><!-- #main -->

    <!--blog section start-->


<?php
get_footer();
