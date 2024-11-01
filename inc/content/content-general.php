<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results General ////////////////////////////////////////////

function woocl_tab_results_general() { ?>
	
	<!--Widget-1 --> 
	<div class="row text-center">
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<?php _e('Conversion rate of successful purchases', 'woo-classement'); ?>
					<p class="text-muted m-b-10">
						<div class="woocltooltip">
							<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
							</i>
							<div class="top">
							<p><?php _e('This calculates your percentage of shopping carts converted into sales in the current month.', 'woo-classement'); ?></p>
							<i></i>
							</div>
						</div>
					</p>
					<?php
					// Crée une instance de la classe
					$cart_success_rate = new WooCommerceCartSuccessRate();

					// Déterminer les dates de début et de fin du mois en cours
					$start_date = date('Y-m-01 00:00:00');
					$end_date = date('Y-m-t 23:59:59');

					// Calculer le nombre total de paniers créés ce mois-ci
					$total_carts_created = $cart_success_rate->get_total_carts_created_or_existing($start_date, $end_date);

					// Calculer le nombre total de paniers existants dans les sessions utilisateurs
					$total_carts_existed = $cart_success_rate->get_existing_carts();

					// Appeler la méthode pour afficher la batterie avec les dates du mois en cours
					$cart_success_rate->display_success_rate_battery($start_date, $end_date);
					?>
				</div>
			</div>
		</div>
	</div>
	
	
	<?php include( WOOCL_PATH . 'inc/charts/geomaps-customer.php'); ?>
	
	<div class="woocl-whitemap">
	    <div class="woocl-customers-online">
			<?php _e( 'User Loggued', 'woo-classement' ); ?> -
			<?php woocl_display_logged_in_users(); ?>
		</div>
	    <div id="mapdiv2021"></div>
	</div>
	<div class="woocommerceclassementdix"></div>

	<!-- Tabs-style-1 -->
	<div class="row"> 
		<div class="col-lg-12">
			<div class="card-box">
				<ul class="nav nav-pills navtab-bg nav-justified">
					<li class="nav-item">
						<a href="#columnchartperformance" data-toggle="tab" aria-expanded="false" class="nav-link active"> 
							<span class="visible-xs"><i class="fa fa-home"></i></span> 
							<span class="hidden-xs">
								<?php _e('Sales Report, by Statut', 'woo-classement'); ?>
								<?php global $wpdb; echo get_woocommerce_currency_symbol(); ?>
								<?php _e('-', 'woo-classement'); ?> 
								<?php $currentyear = date('Y'); echo $currentyear;?>
							</span> 
					    </a> 
					</li>
					<li class="nav-item">
						<a href="#countriesdonutchart" data-toggle="tab" aria-expanded="false" class="nav-link"> 
							<span class="visible-xs"><i class="fa fa-user"></i></span> 
							<span class="hidden-xs">
							<?php _e('Performance -> Sales -> Countries', 'woo-classement'); ?>
							</span> 
						</a> 
					</li>
				</ul>
				<div class="tab-content" style="padding:30px;background-color: #fff;">
					<div class="tab-pane active" id="columnchartperformance"> 
					<div> 
						<?php include( WOOCL_PATH . 'inc/charts/performance-co.php'); ?>
					    <div id="columnchartperformance2018"></div>
					</div> 
				</div> 
				<div class="tab-pane" id="countriesdonutchart">
					<div>
					   <?php include( WOOCL_PATH . 'inc/charts/donuts-countries.php'); ?>
	                   <div id="countriesdonutchart"></div>
					</div>
				</div>				
				</div>
			</div>
        </div> 
	</div> <!-- End row -->
	
	<!--Widget-1 --> 
	<div class="row text-center">
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><?php echo woocl_total_orders_all(); ?></div>
					<p class="text-muted m-b-10">
						<?php _e('Orders', 'woo-classement'); ?>
						<div class="woocltooltip">
							<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
							</i>
							<div class="top">
							<p><?php _e('Completed Orders', 'woo-classement'); ?></p>
							<i></i>
							</div>
						</div>
					</p>
					<?php include( WOOCL_PATH . 'inc/charts/orders-by-years-mini.php'); ?>
					<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">
					<?php $options = get_option('via_woocommerce_classement_settings');
					$from = $options['via_woocommerce_classement_Statistics_start_year']; 
					echo $from; ?> -> <?php echo date('Y'); ?></span>
				</div>
			</div>
		</div>
				
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><?php echo woocl_total_orders_statut('wc-processing'); ?></div>
					<p class="text-muted m-b-10"><?php _e('New Orders', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Processing Orders', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
					<?php include( WOOCL_PATH . 'inc/charts/orders-charts-months-mini.php'); ?>
				    <br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">5 months -> This month</span>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><?php echo woocl_total_user_registred(); ?>
					<?php //echo via_classement_woocommerce_total_user_registred_day(); ?></div>
					<p class="text-muted m-b-10"><?php _e('Customers', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Total customers', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
					<?php include( WOOCL_PATH . 'inc/charts/bar-customers-mini.php'); ?>
					<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats"><?php $options = get_option('via_woocommerce_classement_settings');
					$from = $options['via_woocommerce_classement_Statistics_start_year']; 
					echo $from; ?> -> <?php echo date('Y'); ?></span>
				</div>
			</div>
		</div>
				
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><?php echo woocl_comparatif_pourcent_ventes_year(); ?> 
					<?php 
					$thisyear = date('Y');
	                $lastyear = date('Y', strtotime('-1 year'));
					echo '<span style="font-size:14px !important">('.$lastyear.'-'.$thisyear.')</span>';
					?>
	                </div>
					<p class="text-muted m-b-10"><?php _e('Annual Sales Growth', 'woo-classement'); ?></p>
					<?php include( WOOCL_PATH . 'inc/charts/sales-by-years-mini.php'); ?>
					<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats"><?php $options = get_option('via_woocommerce_classement_settings');
					$from = $options['via_woocommerce_classement_Statistics_start_year']; 
					echo $from; ?> -> <?php echo date('Y'); ?></span>
				</div>
			</div>
		</div>

	</div> <!-- end row -->	 	
				
	<!--Widget-2 -->
	<div class="row">
		<div class="col-md-3 col-sm-6"> 
			<div class="widget-panel widget-style-2 white-bg">
				<i class="zmdi zmdi-money text-success"></i> 
				<h2 class="m-0">
				<?php echo woocl_total_sells(); ?>
				</h2>
				<div class="text-muted">
				<?php _e('Total Revenue', 'woo-classement'); ?>
				</div>
			</div>
		</div>
		
		<div class="col-md-3 col-sm-6"> 
			<div class="widget-panel widget-style-2 white-bg">
				<i class="zmdi zmdi-equalizer text-success"></i> 
				<h2 class="m-0"><?php echo woocl_total_tax_completed() . '&nbsp;' . get_woocommerce_currency_symbol(); ?></h2>
				<div class="text-muted"><?php _e('Total Tax', 'woo-classement'); ?></div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6"> 
			<div class="widget-panel widget-style-2 white-bg">
				<i class="zmdi zmdi-shopping-cart-plus text-primary"></i> 
				<h2 class="m-0"><span class="counter"><?php echo woocl_total_orders_jour(); ?></span></h2>
				<div class="text-muted"><?php _e('Todays Sales', 'woo-classement'); ?></div>
			</div>
		</div>
		
		<div class="col-md-3 col-sm-6"> 
			<div class="widget-panel widget-style-2 white-bg">
				<i class="zmdi zmdi-eye text-primary"></i> 
				<h2 class="m-0">
				<?php 
				global $wpdb;
				// On définit le Meta Key a utiliser et on le place dans une variable.
				$meta_key = 'woocommerce_classement_product_count';
				// On questionne la Base de données et on fait le Compte.
				$likescount = $wpdb->get_var( $wpdb->prepare( 
				"SELECT sum(meta_value) FROM $wpdb->postmeta WHERE meta_key = %s", 
				$meta_key));
				echo "<span class='counter' style='display: inline-block;'>{$likescount}</span>";
				?>
		        </h2>
				<div class="text-muted"><?php _e('Visits on Shop', 'woo-classement'); ?></div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-3">
			<div class="widget-panel widget-style-1 bg-warning">
				<i class="fa fa-building"></i> 
				<h2 class="m-0 counter text-white"><?php echo woocl_products_count_total(); ?></h2>
				<div class="text-white"><?php _e('Published Products', 'woo-classement'); ?></div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-3">
			<div class="widget-panel widget-style-1 bg-pink">
				<i class="fa fa-comments-o"></i> 
				<h2 class="m-0 counter text-white">
					<?php 
					$total_comments =  woocl_product_get_all_comments_products('some_post_type');
					echo $total_comments; 
					?> 
				</h2>
				<div class="text-white">
				<?php if ($total_comments == '0') { ?>
				   <?php _e('Comment / Products', 'woo-classement'); ?>
			    <?php } else { ?>
				   <?php _e('Comments / Products', 'woo-classement'); ?>
				<?php } ?>
			</div>
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="widget-panel widget-style-1 bg-info">
				<i class="fa fa-indent"></i> 
				<h2 class="m-0 counter text-white"><?php echo woocl_total_coupons(); ?></h2>
				<div class="text-white"><?php _e('Coupons', 'woo-classement'); ?></div>
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="widget-panel widget-style-1 bg-success">
				<i class="fa fa-truck"></i> 
				<h2 class="m-0 text-white"><?php echo woocl_get_total_shipping(); ?></h2>
				<div class="text-white">  <?php _e('Total / Shipping', 'woo-classement'); ?></div>
			</div>
		</div>
		
	</div> <!-- End row -->
	
	<div style="height:30px"></div>
	
	<!-- Tabs-style-1 -->
	<div class="row"> 
		<div class="col-lg-12"> 
			<ul class="nav nav-pills navtab-bg  nav-tabs nav-justified"> 
				<li class="nav-item"> 
					<a href="#sales" data-toggle="tab" aria-expanded="false" class="nav-link active"> 
						<span class="visible-xs"><i class="fa fa-home"></i></span> 
						<span class="hidden-xs">
						<?php _e('Sales', 'woo-classement'); ?>
						</span> 
					</a> 
				</li>
				<li class="nav-item"> 
					<a href="#salesmethods" data-toggle="tab" aria-expanded="true" class="nav-link"> 
						<span class="visible-xs"><i class="fa fa-user"></i></span> 
						<span class="hidden-xs">
						<?php _e('Sales by Payment Methods', 'woo-classement'); ?> <?php _e('-', 'woo-classement'); ?> <?php $currentyear = date('Y'); echo $currentyear;  ?>
						</span> 
					</a> 
				</li>			
			</ul> 
			<div class="tab-content"> 
				<div class="tab-pane active" id="sales"> 
					<div class="portlet"><!-- /primary heading -->
						<div class="portlet-heading">
							<h3 class="portlet-title text-dark text-uppercase">
								<?php _e('Sales', 'woo-classement'); ?>
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
												<th><?php $echocurentdate = date('Y'); echo $echocurentdate; ?></th>
												<th><?php $echocurentdate = date('Y', strtotime('-1 year')); echo $echocurentdate; ?></th>
												<th><?php $echocurentdate = date('Y', strtotime('-2 year')); echo $echocurentdate; ?></th>
												<th><?php $echocurentdate = date('Y', strtotime('-3 year')); echo $echocurentdate; ?></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<?php $echocurentdate = date("Y"); echo woocl_total_sells_by_year_result_general($echocurentdate); ?>
												</td>
												<td>
													<?php $echocurentdate = date('Y', strtotime('-1 year')); echo woocl_total_sells_by_year_result_general($echocurentdate); ?>
												</td>
												<td>
													<?php $echocurentdate = date('Y', strtotime('-2 year')); echo woocl_total_sells_by_year_result_general($echocurentdate); ?>
												</td>
												<td>
													<?php $echocurentdate = date('Y', strtotime('-3 year')); echo woocl_total_sells_by_year_result_general($echocurentdate); ?>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						
						<div id="portlet7" class="panel-collapse collapse in">
							<div class="portlet-body">
								<div class="table-responsive">
									<table class="table table-striped table-dark">
										<thead>
											<tr>
												<th><?php _e('Today', 'woo-classement'); ?></th>
												<th><?php _e('Yesterday', 'woo-classement'); ?></th>
												<th><?php _e('This Month', 'woo-classement'); ?></th>
												<th><?php _e('Last Month', 'woo-classement'); ?></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<?php echo woocl_total_sells_by_day_result_general(); ?>
												</td>
												<td>
													<?php echo woocl_total_sells_yesterday_result_general(); ?>
												</td>
												<td>
													<?php echo woocl_total_sells_by_month_result_general(); ?>
												</td>
												<td>
													<?php echo woocl_total_sells_by_last_month_result_general(); ?>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="salesmethods"> 
					<div class="panel">
						<div class="panel-body">
							<div class="h2 text-black m-t-10">
								<?php _e('Sales by Payment Methods', 'woo-classement'); ?>
							</div>
							<?php echo woocl_get_paiements_way() ?>					
							<hr style="border-top: 2px dotted #ccc;">
							<p style="font-size:16px" class="text-muted m-b-10">
								<?php echo do_shortcode('[wooclsalescountrychart]'); ?>
							</p>
						</div>
					</div>
				</div>
			</div> 
		</div> 

	</div> <!-- End row -->
				
				
	<!--<div class="row">
		
		<div class="col-lg-12">

			<div class="portlet">
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php //_e('Paiements Methods', 'woo-classement'); ?>
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
						<?php //echo woocl_get_paiements_way() ?>
					</div>
				</div>
			</div>
		</div>
		
	</div>-->	
				

	<div class="row">
		
		<div class="col-lg-12">

			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Last orders', 'woo-classement'); ?>
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
						<h5 class="portlet-title text-dark text-uppercase">
							<?php _e('Search orders by date :', 'woo-classement'); ?>
							</h5>

							<div class="woocommerceclassementdix"></div>
							
							<?php echo woocl_total_orders_all_time(); ?>
							<?php global $pagenow; 
							if ( ( 'admin.php' === $pagenow )
							&& ( 'via-woocommerce-classement' === $_GET['page'] ) ) { 
						    ?>
							
							<!-- Datatables -->
							<script src="https://code.jquery.com/jquery-3.5.1.js?ver=1"></script>
							<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
							<script src="https://cdn.datatables.net/searchbuilder/1.4.2/js/dataTables.searchBuilder.min.js"></script>
							<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
							<script src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>
							<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
							<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
							<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
							<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

							<script>
							$(document).ready(function() {
							$('#datatable-buttons').DataTable( {
							dom: 'Bfrtip',
							"order": [[ 2, 'desc' ]],
							language: {
							searchBuilder: {
							title: 'Search for a user'
							}
							},
							buttons: [
							'searchBuilder',
							'copyHtml5',
							'excelHtml5',
							'csvHtml5',
							'pdfHtml5',
							],

							});
							});	
							</script>
							
							<?php } ?>

					</div>
				</div>
			</div>
		</div> <!-- end col -->
		
	</div> <!-- end row -->	

<?php } 