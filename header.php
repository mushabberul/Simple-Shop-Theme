<?php wp_head();?>

<body class="archive  woocommerce">
	<!--header start-->
	<header class="app-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-lg mainmenu">
						<!--logo-->
							<?php
							if(has_custom_logo()):
								?>
									<a class="navbar-brand mr-5 text-dark float-left" href="<?php echo home_url('/'); ?>">
								<?php
									the_custom_logo();
								?>
									</a>
								<?php
									else:
								?>
								<h2>
									<a class="bloginf-name" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
								</h2>
								<?php endif; ?>
						<!--logo-->
						<!--responsive toggle icon-->
						<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="navbar-toggler-icon">
								<i class="fa fa-bars"> </i>
							</span>
						</button>
						<!--responsive toggle icon-->
						<!--search start-->
						<div id="form-search" class="form-search">
							<div class="input-group">
								<input type="search" class="form-control" placeholder="Search for...">
								<span class="input-group-btn">
									<button id="form-search-close-btn" class="btn" type="button">
										<span class="svg svg--cross">
											<svg class="svg__icon" width="32px" height="32px" viewBox="0 0 32 32">
												<path d="M16.7,16L31.9,0.9c0.2-0.2,0.2-0.5,0-0.7s-0.5-0.2-0.7,0L16,15.3L0.9,0.1C0.7,0,0.3,0,0.1,0.1S0,0.7,0.1,0.9L15.3,16
                                            L0.1,31.1c-0.2,0.2-0.2,0.5,0,0.7C0.2,32,0.4,32,0.5,32s0.3,0,0.4-0.1L16,16.7l15.1,15.1c0.1,0.1,0.2,0.1,0.4,0.1s0.3,0,0.4-0.1
                                            c0.2-0.2,0.2-0.5,0-0.7L16.7,16z" />
											</svg>
										</span>
									</button>
								</span>
							</div>
						</div>
						<!--search end-->
						<!--nav link-->
						<div class=" coll-md-60 collapse navbar-collapse" id="navbarsExampleDefault">

						<?php
						wp_nav_menu(array(
							'theme_location'=>'primary_menu',
							'menu_id'=>'menu',
							'menu_class'=>'navbar-nav ml-auto'
						));
						?>
						</div>
						<div class="coll-md-40 collapse navbar-collapse" id="navbarsExampleDefault">

						<?php
						wp_nav_menu(array(
							'theme_location'=>'woocommerce_menu',
							'menu_id'=>'menu',
							'menu_class'=>'navbar-nav ml-auto'
						));
						?>
						</div>
						<!--nav link-->
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!--header end-->