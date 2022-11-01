<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<?php wp_head(); ?>

    <!--favicon and touch icon-->


</head>
<body class="woocommerce">
<!--header start-->
<header class="app-header <?php if ( ! is_front_page() ) {
	echo 'nav-header';
} ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg" id="mainNav">
                    <!--logo-->
                    <a class="navbar-brand mr-5 text-dark" href="javascript:;">
						<?php
						if ( function_exists( 'the_custom_logo' ) ) {
							the_custom_logo();
						}
						?>
                        <!-- <img class="" src="assets/img/logo.png" srcset="assets/img/logo@2x.png 2x" alt=""/> -->
                    </a>
                    <!--logo-->

                    <!--responsive toggle icon-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class="fa fa-bars"> </i>
                            </span>
                    </button>
                    <!--responsive toggle icon-->

                    <!--nav link-->
					<?php
					$args          = array(
						'theme_location'  => 'top_menu',
						'container_id'    => 'navbarsExampleDefault',
						'container_class' => 'collapse navbar-collapse',
						'menu_class'      => 'navbar-nav ml-auto',
						'menu_id'         => '',
						'echo'            => false,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'item_spacing'    => 'preserve',
						'depth'           => 0,
						'walker'          => '',
						'add_li_class'    => 'nav-item',
					);
					$mark_top_menu = wp_nav_menu( $args );
					$mark_top_menu = str_replace( '<a', '<a class="nav-link scroll_to"', $mark_top_menu );
					echo $mark_top_menu;
					?>

                </nav>


            </div>
        </div>
    </div>

</header>
<!--header end-->