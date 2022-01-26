<?php
	/**
	 * The Template for displaying all single products
	 *
	 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
	 *
	 * HOWEVER, on occasion WooCommerce will need to update template files and you
	 * (the theme developer) will need to copy the new files to your theme to
	 * maintain compatibility. We try to do this as little as possible, but it does
	 * happen. When this occurs the version of the template file will be bumped and
	 * the readme will list any important changes.
	 *
	 * @see         https://docs.woocommerce.com/document/template-structure/
	 * @package     WooCommerce\Templates
	 * @version     1.6.4
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}
	get_header( 'shop' );
	get_template_part( 'template-parts/shop/banner' );
?>

<div class="site-main">
    <!--shop category start-->
    <section class="space-3">
        <div class="container sm-center">
            <div class="row">
                <div class="col-md-12">
                    <div id="product-14" class="post-14 product type-product status-publish has-post-thumbnail product_cat-accessories first instock sale shipping-taxable purchasable product-type-simple">

							<?php while ( have_posts() ): ?>
								<?php the_post();?>

								<?php wc_get_template_part( 'content', 'single-product' );?>

							<?php endwhile; // end of the loop. ?>

						<?php
							/**
							 * woocommerce_after_main_content hook.
							 *
							 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
							 */
							do_action( 'woocommerce_after_main_content' );
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php
	get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
