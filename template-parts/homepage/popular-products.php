<!--product section start-->
<?php if ( get_theme_mod( 'simpleshop_popular_products_display', true ) ): ?>
<section class="space-3">
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-md-8">
						<div class="section-title text-center">
							<h2 class="title ">
								<?php echo get_theme_mod( 'simpleshop_popular_products_title', 'Popular Product' ); ?>
							</h2>

						</div>
					</div>
					<div class="col-md-12">
						<?php
							echo do_shortcode('[top_rated_products limit="3" columns="3"]')
						?>

					</div>
				</div>
			</div>
		</section>
		<?php endif;?>
		<!-- product section end-->