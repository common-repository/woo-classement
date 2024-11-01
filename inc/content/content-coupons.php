<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results Coupons ////////////////////////////////////////////

function woocl_tab_results_coupons() { ?>
    
	
	<!--Widget-2 -->
	<div id="wooclcouponsproducts" class="row text-center">
	    
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<span class="counter" style="display: inline-block;">
						<?php echo woocl_total_coupons(); ?>
						</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Total Coupons', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<span class="counter" style="display: inline-block;">
						<?php echo woocl_total_coupons_semaine(); ?> 
						</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('This week', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<span class="counter" style="display: inline-block;">
						<?php echo woocl_total_coupons_jour(); ?>
						</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Today', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<span class="counter" style="display: inline-block;">
						<?php echo woocl_total_coupons_en_ligne($statut = 'publish'); ?>
						</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Published', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<span class="counter" style="display: inline-block;">
						<?php echo woocl_total_coupons_en_ligne($statut = 'draft'); ?>
						</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Pending', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<span class="counter" style="display: inline-block;">
						<?php echo woocl_total_coupons_used(); ?>
						</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Count Used Coupons', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Coupons List', 'woo-classement'); ?>
					</h3>
					<div class="portlet-widgets">
						<a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
						<span class="divider"></span>
						<a data-toggle="collapse" data-parent="#accordion1" href="#portlet7"><i class="ion-minus-round"></i></a>
						<span class="divider"></span>
						<a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div id="portlet7" class="panel-collapse collapse in">
					<div class="portlet-body">
						<?php echo woocl_list_coupons(); ?> 
					</div>
				</div>
			</div>
		</div> <!-- end col -->
	</div> <!-- end row -->		

    <div class="via-woocommerce-classement-clear"></div>	
	
<?php } 