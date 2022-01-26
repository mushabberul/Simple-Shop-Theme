<?php
get_header();
?>
<!--page title start-->
<section class="page-title">
	 <div class="container">
		  <div class="row">
				<div class="col-md-12">
					 <h2 class="font-weight-bold"><?php the_title(); ?></h2>
					 <nav class="woocommerce-breadcrumb">
						  <?php woocommerce_breadcrumb(); ?>
					 </nav>
				</div>
		  </div>
	 </div>
</section>
<!--page title end-->
<div class="site-main">
        <!--shop category start-->
        <section class="space-3">
            <div class="container">
                <div class="row">
					 	<div class="col-md-12">
						<?php
							while(have_posts()){
								the_post();
								the_content();
							}
						?>
						</div>
			</div>
      </div>
   </section>
<!--shop category end-->
</div>

<?php
get_footer();
?>