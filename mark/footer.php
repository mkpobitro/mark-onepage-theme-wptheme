<!-- footer start-->
<footer class="footer space-2">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 p-right-80">

                <!-- Footer Left Column-->
				<?php
				if ( is_active_sidebar( 'ftr_left_sidebar' ) ) {
					dynamic_sidebar( 'ftr_left_sidebar' );
				}
				?>
            </div>

            <!-- Footer Middle Column-->
            <div class="col-md-4 col-sm-6 p-right-80">
                <div class="latest-post">
					<?php
					if ( is_active_sidebar( 'ftr_middle_sidebar' ) ) {
						dynamic_sidebar( 'ftr_middle_sidebar' );
					}
					?>
                </div>
            </div>

            <!-- Footer Right Column-->
            <div class="col-md-4 col-sm-6">
				<?php
				if ( is_active_sidebar( 'ftr_right_sidebar' ) ) {
					dynamic_sidebar( 'ftr_right_sidebar' );
				}
				?>

            </div>
        </div>
    </div>
    <div class="copyright-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<?php
					if ( is_active_sidebar( 'ftr_bottom_sidebar' ) ) {
						dynamic_sidebar( 'ftr_bottom_sidebar' );
					}
					?>
                </div>
            </div>
        </div>
    </div>


</footer>
<!-- footer end-->


<?php wp_footer(); ?>

</body>
</html>