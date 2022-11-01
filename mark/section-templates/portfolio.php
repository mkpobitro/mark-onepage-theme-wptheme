<?php
global $mark_section;
$mark_section_meta = get_post_meta($mark_section['section'], 'mark_section_type_portfolio', true);
//echo "<pre>";
//print_r($mark_section_meta);
//echo "</pre>";

$mark_portfolios = $mark_section_meta['my_portfolio_section'];
$portfolio_filters = array();
if(count($mark_portfolios) > 0){

	foreach($mark_portfolios as $mark_portfolio){
		$portfolio_temp_filters = explode(',', $mark_portfolio['filter']);
		foreach($portfolio_temp_filters as $portfolio_temp_filter){
			$portfolio_filters[strtolower(trim($portfolio_temp_filter))] = $portfolio_temp_filter;
        }
    }
}

?>


<!--portfolio section start-->
<section class="space-3 space-adjust" id="<?php echo get_post_field('post_name', $mark_section['section']); ?>">
    <div class="section-title text-center">
        <h2 class="title"><?php echo esc_html($mark_section_meta['heading']) ?></h2>
    </div>
    <!--portfolio-->
    <div class="container">

        <div class="text-center">
            <ul class="portfolio-filter">
                <li class="active"><a href="#" data-filter="*"> All</a></li>
                <?php
                foreach($portfolio_filters as $portfolio_filter){ ?>
                    <li><a href="#" data-filter=".<?php echo esc_attr(strtolower(trim($portfolio_filter))); ?>"><?php echo esc_html($portfolio_filter); ?></a></li>
                <?php }
                ?>

            </ul>
        </div>

        <div class="row portfolio portfolio-gallery column-3 gutter "><!--portfolio grid option col-2 - col-6 -->
            <?php
            if(count($mark_portfolios) > 0){
                foreach($mark_portfolios as $mark_portfolio):
                    $portfolio_img_src_large = $mark_portfolio['image'];
//                    $portfolio_img_src_medium = $mark_portfolio['image'];
                    ?>

                    <div class="portfolio-item <?php echo esc_attr(strtolower(str_replace(',', '', $mark_portfolio['filter']))) ?>">
                        <a href="<?php echo esc_url($portfolio_img_src_large); ?>" class="thumb popup-gallery" title="We are creative">
                            <img src="<?php echo esc_url($portfolio_img_src_large); ?>" alt="<?php echo esc_html($mark_portfolio['title']) ?>">
                            <div class="portfolio-hover">
                                <div class="portfolio-description">
                                    <h4 class="mb-1"><?php echo esc_html($mark_portfolio['title']) ?></h4>
                                    <p><?php echo esc_html($mark_portfolio['filter']) ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach;
                ?>

            <?php }
            ?>

        </div>

    </div>
    <!--portfolio-->
</section>
<!--portfolio section end-->