<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function woocl_submenu_page_callback() { ?>
	
	<!-- Depart de la div Wrap --> 
	<div class="wrap">
			
			
			<!-- Begin wrap div -->
			<div class="options-via-woocommerce-classement-wrap" style="position:relative">
			
			<!-- Aside Start-->
			<aside class="left-panel">

				<?php include_once( 'includes/logo.php' ); ?>
			
				<?php include_once( 'includes/navigation.php' ); ?>
					
			</aside>
			<!-- Aside Ends-->
			
			
			<!--Main Content Start -->
			<section class="content">
			
				<?php include_once( 'includes/nav-header.php' ); ?>

				<!-- Page Content Start -->
				<!-- ================== -->

				<div class="wraper container-fluid">
					
					<?php include_once( 'includes/title.php' ); ?>

					<?php do_action( 'woocltemplate' ); ?>
					
					<?php echo woocl_content_social(); ?>
				
				</div>
				
				<!-- Page Content Ends -->
				

			</section>
			<!-- Main Content Ends -->
			
			
			</div>
			<!-- End wrap div -->
							
			<div class="via-woocommerce-classement-clear"></div>
			
	</div>
	<!-- End wrap div -->
	
	<div class="via-woocommerce-classement-clear"></div>

<?php } ?>