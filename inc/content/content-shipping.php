<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results General ////////////////////////////////////////////

function woocl_tab_results_livraison() { ?>
	
	<!--Widget-2 -->
	<div id="shippingresultsscores" class="row text-center">
	   
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i class="zmdi zmdi-truck"></i>
						<?php echo woocl_get_total_shipping(); ?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Total customer shipping costs', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Total Amount of Delivery Charges Paid by Customers', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>	
		
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
                    <i class="zmdi zmdi-truck"></i>
						<?php // Pour utiliser une des méthodes :
						$shipping_stats = new WooCommerceShippingStatistics(); 
						$average_shipping_cost = $shipping_stats->woocl_calculate_average_shipping_cost();
						echo number_format($average_shipping_cost, 2) . '&nbsp;' . get_woocommerce_currency_symbol();
						?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Average shipping cost on orders', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('The average shipping cost is calculated only for orders that have shipping charges.', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
					<i class="zmdi zmdi-truck"></i>
					<span class="counter" style="display: inline-block;">
						<?php $shipping_stats = new WooCommerceShippingStatistics();
						$successful_delivery_percentage = $shipping_stats->woocl_calculate_successful_delivery_percentage(); 
						echo number_format($successful_delivery_percentage, 2) . '&nbsp;' . '%'; ?>
					</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Percentage Deliveries with Shipping Charges', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i class="zmdi zmdi-truck"></i>
						<span class="counter" style="display: inline-block;">
						<?php 
						$shipping_stats = new WooCommerceShippingStatistics(); 
						$total_shipping_tax = $shipping_stats->woocl_calculate_total_shipping_tax(); 
						echo wc_price($total_shipping_tax) . '&nbsp;' . get_woocommerce_currency_symbol(); ?>
						</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Total shipping taxes', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i class="zmdi zmdi-truck"></i>
						<span class="counter" style="display: inline-block;">
						<?php 
						$shipping_stats = new WooCommerceShippingStatistics();
						$average_shipping_tax = $shipping_stats->woocl_calculate_average_shipping_tax(); 
						echo number_format($average_shipping_tax, 2) . '&nbsp;' . get_woocommerce_currency_symbol(); ?>
						</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Average of Shipping Taxes', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Average of Delivery Taxes Corresponding to the Number of Orders Including Delivery Taxes', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i class="zmdi zmdi-truck"></i>
						<span class="counter" style="display: inline-block;">
						<?php 
						$shipping_stats = new WooCommerceShippingStatistics();
						$average_shipping_cost_per_order = $shipping_stats->woocl_calculate_average_shipping_cost_per_order_all_orders(); 
						echo number_format($average_shipping_cost_per_order, 2) . '&nbsp;' . get_woocommerce_currency_symbol(); ?>
						</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Average shipping cost per order (All Orders)', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Average shipping cost per order (All Orders)', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
	<div class="row">
	
		<div class="col-lg-12">
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Shipping Zones -> Statut', 'woo-classement'); ?>
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
						<?php include( WOOCL_PATH . 'inc/charts/average-shipping-zones.php'); ?>
						<div id="piechartshipping" style="height:350px"></div>
				    </div>
				</div>
			</div>
		</div>
	
	</div> <!-- End of Row -->
	
	
	<div class="row">
		
		<div class="col-lg-12">

			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Total Shipping', 'woo-classement' ); ?>
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
							<table class="table table-striped table-dark">
								<thead>
									<tr>
										<th><?php _e('Total', 'woo-classement'); ?></th>
										<th><?php _e('Total Shipping Tax', 'woo-classement'); ?></th>
										<th><?php _e('This Year', 'woo-classement'); ?></th>
										<th><?php _e('This Month', 'woo-classement'); ?></th>
										<th><?php _e('Last Year', 'woo-classement'); ?></th>
									</tr>
								</thead>
								<tbody>	
									<tr>	
										<td>
											<?php echo woocl_get_total_shipping(); ?>
										</td>
										<td>
											<span class="numberCircle">
											<?php echo woocl_total_shipping_tax_completed(); ?>
											<span class="numberCircle">
										</td>
										<td>
											<span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">
												<?php _e('PRO', 'woo-classement'); ?>
											</span><?php //echo woocl_get_total_shipping_this_year(); ?>
										</td>
										<td>
											<span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">
												<?php _e('PRO', 'woo-classement'); ?>
											</span>
											<?php //echo woocl_get_total_shipping_this_month(); ?>
										</td>
										<td>
											<span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">
												<?php _e('PRO', 'woo-classement'); ?>
											</span>
											<?php //echo woocl_get_total_shipping_last_year(); ?>
										</td>
									</tr>
								</tbody>	
							</table>
						</div>
					</div>
				</div>
			</div>
			
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Shipping Zones', 'woo-classement'); ?>
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
						<?php echo woocl_get_shipping_zones(); ?> 
					</div>
				</div>
			</div>	
			
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('List of shipping methods', 'woo-classement'); ?>
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
						<?php echo woocl_get_shipping_methods(); ?>
					</div>
				</div>
			</div>	
				
		</div> <!-- end col -->
		
	</div> <!-- end row -->	

	<div class="via-woocommerce-classement-clear"></div>  
	
<?php }




						
					