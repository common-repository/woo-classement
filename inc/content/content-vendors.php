<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results Products ///////////////////////////////////////////

function woocl_tab_results_vendors() { ?>
    
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	
	<div class="row">
		
		<div class="col-lg-12">

			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Vendors', 'woo-classement' ); ?>
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
						<div class="table-responsive">
							 <table class="table">
								<tr>
									<th><?php _e('Total Vendors', 'woo-classement'); ?></th>
                                    <th><?php _e('This Year', 'woo-classement'); ?></th>
                                    <th><?php _e('This Month', 'woo-classement'); ?></th>	
                                    <th><?php _e('This Day', 'woo-classement'); ?></th>
                                    <th><?php _e('Total Pending Vendors', 'woo-classement'); ?></th>										
								</tr>
								<tr>
									<td>
										<?php echo woocl_total_vendors_registred(); ?>
									</td>
									<td>
										<?php echo woocl_total_vendor_registred_year(); ?>
									</td>
									<td>
										<?php echo woocl_total_vendor_registred_month(); ?>
									</td>
									<td>
										<?php echo woocl_total_vendor_registred_day(); ?>
									</td>
									<td>
										<?php echo woocl_total_vendors_pending(); ?>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- end col -->
		
	</div> <!-- end row -->	
	
	<div class="row">
	
		<div class="col-lg-12">
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Vendors -> Line Charts', 'woo-classement'); ?>
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
					   <?php include( WOOCL_PATH . 'inc/charts/line-vendors.php'); ?>
				       <div id="vendor_chart" style="width:100%; height:auto;"></div>
				    </div>
				</div>
			</div>
		</div>
	
	</div> <!-- End of Row -->
	
	<div class="via-woocommerce-classement-clear"></div>
	
<?php } 