<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results plugin /////////////////////////////////////////////

function woocl_tab_results_graphs() { ?>

<div class="row">

	<div class="col-lg-12">
		<div class="portlet"><!-- /primary heading -->
			<div class="portlet-heading">
				<h3 class="portlet-title text-dark text-uppercase">
					<?php _e('Customers -> Line Charts', 'woo-classement'); ?>
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
			<?php $options = get_option('via_woocommerce_classement_settings'); if ( isset($options['via_woocommerce_classement_checkbox_annee_2017']) && ($options['via_woocommerce_classement_checkbox_annee_2017'] == 1) ){ ?>
			<div id="portlet7" class="panel-collapse collapse in">
				<div class="portlet-body">
				   <?php include( WOOCL_PATH . 'inc/charts/sales-by-months.php'); ?>
				   <div id="orders_months_chart_last_year" style="width:100% !important; height:400px;"></div>
				</div>
			</div>
			<?php } else { ?>
			    <p style="text-align:center; font-size:17px">
					<?php _e( 'Active the option to show Sales charts', 'woo-classement'); ?> 
					- 
					<?php $yearlessone = date('Y',strtotime('-1 year')); echo $yearlessone; ?>
					<a style="background:#ea7024; padding:5px 10px;color:#ffffff" href="<?php echo get_bloginfo('url') .'/wp-admin/admin.php?page=via-woocommerce-classement-options'; ?>">
					<span>
					<?php _e( 'Options', 'woo-classement' ); ?>
					</span>
					</a>
				</p>
			<?php } ?>
			<?php $options = get_option('via_woocommerce_classement_settings'); if ( isset($options['via_woocommerce_classement_checkbox_annee_2016']) && ($options['via_woocommerce_classement_checkbox_annee_2016'] == 1) ){ ?>
			<div id="portlet7" class="panel-collapse collapse in">
				<div class="portlet-body">
				   <?php include( WOOCL_PATH . 'inc/charts/sales-by-months.php'); ?>
				   <div id="orders_months_chart_two_years" style="width:100% !important; height:400px;"></div>
				</div>
			</div>
			<?php } else { ?>
				<p style="text-align:center; font-size:17px">
					<?php _e( 'Active the option to show Sales charts', 'woo-classement'); ?> 
					- 
					<?php $yearlessone = date('Y',strtotime('-2 year')); echo $yearlessone; ?>
					<a style="background:#ea7024; padding:5px 10px;color:#ffffff" href="<?php echo get_bloginfo('url') .'/wp-admin/admin.php?page=via-woocommerce-classement-options'; ?>">
					<span>
					<?php _e( 'Options', 'woo-classement' ); ?>
					</span>
					</a>
				</p>
			<?php } ?>
			<?php $options = get_option('via_woocommerce_classement_settings'); if ( isset($options['via_woocommerce_classement_checkbox_annee_2015']) && ($options['via_woocommerce_classement_checkbox_annee_2015'] == 1) ){ ?>
			<div id="portlet7" class="panel-collapse collapse in">
				<div class="portlet-body">
				   <?php include( WOOCL_PATH . 'inc/charts/sales-by-months.php'); ?>
				   <div id="orders_months_chart_three_years" style="width:100% !important; height:400px;"></div>
				</div>
			</div>
			<?php } else { ?>
				<p style="text-align:center; font-size:17px">
					<?php _e( 'Active the option to show Sales charts', 'woo-classement'); ?> 
					- 
					<?php $yearlessone = date('Y',strtotime('-3 year')); echo $yearlessone; ?>
					<a style="background:#ea7024; padding:5px 10px;color:#ffffff" href="<?php echo get_bloginfo('url') .'/wp-admin/admin.php?page=via-woocommerce-classement-options'; ?>">
					<span>
					<?php _e( 'Options', 'woo-classement' ); ?>
					</span>
					</a>
				</p>
			<?php } ?>
		</div>
	</div>

</div> <!-- End of Row -->


<?php } 


function woocl_tab_results_statistics_general() { ?>

	<!--Widget-1 -->
	<div class="row text-center">
		<div class="col-sm-6 col-md-3">
			<div class="panel"> 
				<div class="panel-body" style="background:#a91700">
					<div class="h2 text-black m-t-10" style="color:white"><?php echo woocl_comparatif_pourcent_ventes_year(); ?></div>
					<p class="text-muted m-b-10" style="color:white"><?php _e('Annual Sales Growth', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
				
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body" style="background: #00a2a9">
					<div class="h2 text-black m-t-10" style="color:white"><?php echo woocl_comparatif_pourcent_ventes_mensuel(); ?></div>
					<p class="text-muted m-b-10" style="color:white"><?php _e('Monthly Sales Growth', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body" style="background: #ff2d00">
					<div class="h2 text-black m-t-10" style="color:white"><?php echo woocl_comparatif_pourcent_ventes_jour(); ?>
					<?php //echo woocl_total_user_registred_day(); ?></div>
					<p class="text-muted m-b-10" style="color:white"><?php _e('Daily Sales Growth', 'woo-classement'); ?></p> 
				</div>
			</div>
		</div>
				
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body" style="background: #8fa900">
					<div class="h2 text-black m-t-10" style="color:white"><?php echo woocl_comparatif_pourcent_orders_daily(); ?></div>
					<p class="text-muted m-b-10" style="color:white"><?php _e('Daily Orders Growth', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>

	</div> <!-- end row -->
	
	<div class="row">
		
		<div class="col-lg-12">
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Averages', 'woo-classement'); ?>
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
				        <table class="table table-striped">
							<thead>
								<tr>
									<th><?php _e('Avg Price -> Order', 'woo-classement'); ?></th>
									<th><?php _e('Avg Products -> Customer', 'woo-classement'); ?></th>
									<th><?php _e('Avg Products -> Order', 'woo-classement'); ?></th>
									<th><?php _e('Avg Shipping -> Order', 'woo-classement'); ?></th>
									<th><?php _e('Avg Order -> Day', 'woo-classement'); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<?php 
										// On questionne la Base de données et on fait le Compte.
										$num_amount = woocl_get_sales_net(); 
										$num_total = woocl_total_orders_all_average();
										$resultat = $num_amount / $num_total;
										echo number_format((float) $resultat, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
										?>
									</td>
									<td>
										<?php 
										// On questionne la Base de données et on fait le Compte.
										$numamount = woocl_items_sold_average();
										$numtotal = woocl_total_user_registred();
										$resultat = $numamount / $numtotal;
										echo number_format((float) $resultat, 2, '.', '')  . '&nbsp;' . get_woocommerce_currency_symbol();

										//echo via_classement_woocommerce_has_bought();
										?>
									</td>
									<td>
										<?php 
										// On questionne la Base de données et on fait le Compte.
										$numamount = woocl_items_sold_average();
										$numtotal = woocl_total_orders_all_average();
										$resultat = $numamount / $numtotal;
										echo number_format((float) $resultat, 2, '.', '')  . '&nbsp;' . get_woocommerce_currency_symbol();
										?>
									</td>
									<td>
										<?php 
										// On questionne la Base de données et on fait le Compte.
										$amount = woocl_get_total_shipping_average(); 
										$total = woocl_total_orders_all_average();
										$resultat = $amount / $total;
										echo number_format((float) $resultat, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
										?>
									</td>
									<td>
										<?php 
										// On questionne la Base de données et on fait le Compte.
										$amount = woocl_total_orders_all_average(); 
										$total = woocl_count_days_post_date_order();
										$resultat = $amount / $total;
										echo number_format((float) $resultat, 2, '.', '')  . '&nbsp;' . get_woocommerce_currency_symbol();
										?>
									</td>
								</tr>	
                            </tbody>							
						</table>
					    </div>
					</div>
				</div>
			</div>
			
		</div>

	</div> <!-- End of Row -->
	
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php _e('Sales -> Years', 'woo-classement'); ?> (<?php echo get_woocommerce_currency_symbol(); ?>)</h3>
				</div>
				<div class="panel-body">
					<?php include( WOOCL_PATH . 'inc/charts/sales-by-years.php'); ?>
					<div id="orders_chart_2018"></div>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php _e('Sales -> Country', 'woo-classement'); ?> (<?php echo get_woocommerce_currency_symbol(); ?>)</h3>
				</div>
				<div class="panel-body">
					<?php include( WOOCL_PATH . 'inc/charts/general-map.php'); ?>
					<div id="regionsdiv" class="chart" style="width:100%!important; height:155px;"></div>
				</div>
			</div>
		</div>

	</div> <!-- End of Row -->
	
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php _e('Customers -> Line Charts', 'woo-classement'); ?></h3>
				</div>
				<div class="panel-body">
					<?php include( WOOCL_PATH . 'inc/charts/line-customers.php'); ?>
				    <div id="customer_chart"></div>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php _e('Vendors -> Line Charts', 'woo-classement'); ?></h3>
				</div>
				<div class="panel-body">
					<?php include( WOOCL_PATH . 'inc/charts/line-vendors.php'); ?>
				    <div id="vendor_chart"></div>
				</div>
			</div>
		</div>

	</div> <!-- End of Row -->
	
	<div class="row">
	
		<div class="col-lg-12">
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Orders -> Repartition', 'woo-classement'); ?>
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
					   <?php include( WOOCL_PATH . 'inc/charts/sales-by-statut.php'); ?>
					   <div id="piechartstatut" style="width:100%; height:auto;"></div>
				    </div>
				</div>
			</div>
		</div>
	
	</div> <!-- End of Row -->


<?php } 




function woocl_tab_results_sales_years() { ?>

<div class="row">

	<div class="col-lg-12">
		<div class="portlet"><!-- /primary heading -->
			<div class="portlet-heading">
				<h3 class="portlet-title text-dark text-uppercase">
					<?php _e('Sales -> Repartition', 'woo-classement'); ?>
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
					<?php include( WOOCL_PATH . 'inc/charts/sales-by-years.php'); ?>
					<div id="orders_chart" style="width:100% !important; height:400px;"></div>
				</div>
			</div>
		</div>
	</div>

</div> <!-- End of Row -->

	
<?php }



function woocl_tab_results_comparatives_customers_vendors() { ?>

<div class="row">
	
		<div class="col-lg-12">
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Customers - Vendors -> Line Charts', 'woo-classement'); ?>
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
					     
				    </div>
				</div>
			</div>
		</div>
	
	</div> <!-- End of Row -->

<?php }


function woocl_tab_results_sales_months() { ?>

	<div class="row">
	
		<div class="col-lg-12">
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Customers -> Line Charts', 'woo-classement'); ?>
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
					   <?php include( WOOCL_PATH . 'inc/charts/sales-by-months.php'); ?>
					   <div id="orders_months_chart" style="width:100% !important; height:400px;"></div>
				    </div>
				</div>
			</div>
		</div>
	
	</div> <!-- End of Row -->
		
<?php }
