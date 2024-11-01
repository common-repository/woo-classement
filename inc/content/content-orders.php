<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results Orders /////////////////////////////////////////////

function woocl_tab_results_orders() { ?>

		<script type="text/javascript" src="https://www.google.com/jsapi"></script>

		<!-- Widget-2 -->
		<div id="bestsellsamountorders" class="row text-center">
			
			<div class="col-sm-12 col-md-12">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10">
						<h2 style="background:#bd1e51;color:white;padding:10px;font-size:16px;margin-bottom:20px"><?php _e('Average frequency', 'woo-classement'); ?></h2>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 30px; height: 30px; color: #3960d1;">
						<path fill="currentColor" d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm64 192c17.7 0 32 14.3 32 32l0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-96c0-17.7 14.3-32 32-32zm64-64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 192c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-192zM320 288c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-32c0-17.7 14.3-32 32-32z"/>
						</svg>
						<?php echo do_shortcode('[woocl_order_frequency]'); ?>
						</div>
						<p class="text-muted m-b-10"><?php _e('Average frequency of online orders', 'woo-classement'); ?></p>
						<div class="woocommerceclassementtrente"></div>
						<?php //include( WOOCL_PATH . 'inc/charts/orders-amount-years-mini.php'); ?>
						<!--<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">2017 -> This year</span>-->
					</div>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10">
						<h2 style="background:#bd1e51;color:white;padding:10px;font-size:16px;margin-bottom:20px"><?php _e('This year', 'woo-classement'); ?></h2>
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<?php 
						$datedebut = date('Y-01-01');
						$datefin = date('Y-12-31');
						echo woocl_total_sells_amount_today($datedebut,$datefin) . '&nbsp;' . get_woocommerce_currency_symbol(); 
						?>
						</div>
						<p class="text-muted m-b-10"><?php _e('Total amount of sales', 'woo-classement'); ?></p>
						<div class="woocommerceclassementtrente"></div>
						<?php //include( WOOCL_PATH . 'inc/charts/orders-amount-years-mini.php'); ?>
						<!--<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">2017 -> This year</span>-->
					</div>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10">
						<h2 style="background:#bd1e51;color:white;padding:10px;font-size:16px;margin-bottom:20px"><?php _e('This month', 'woo-classement'); ?></h2>
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<?php 
						$datedebut = date('Y-m-01');
						$datefin = date('Y-m-31');
						echo woocl_total_sells_amount_today($datedebut,$datefin) . '&nbsp;' . get_woocommerce_currency_symbol(); 
						?>
						</div>
						<p class="text-muted m-b-10"><?php _e('Total amount of sales', 'woo-classement'); ?></p>
						<?php //include( WOOCL_PATH . 'inc/charts/orders-amount-months-mini.php'); ?>
						<!--<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">-5 Months -> This month</span>-->
					    <div class="woocommerceclassementtrente"></div>
					</div>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10">
						<h2 style="background:#bd1e51;color:white;padding:10px;font-size:16px;margin-bottom:20px"><?php _e('Today', 'woo-classement'); ?></h2>
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<?php 
						$datedebut = date('Y-m-d');
						$datefin = date('Y-m-d',strtotime("-1 days"));
						echo woocl_total_sells_amount_today($datedebut,$datefin) . '&nbsp;' . get_woocommerce_currency_symbol(); 
						?>
						</div>
						<p class="text-muted m-b-10"><?php _e('Total amount of sales', 'woo-classement'); ?></p>
						<div class="woocommerceclassementtrente"></div>
					</div>
				</div>
			</div>
			
	        <div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10">
						<h2 style="background:#bd1e51;color:white;padding:10px;font-size:16px;margin-bottom:20px"><?php _e('Since 2015', 'woo-classement'); ?></h2>
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<?php 
						$datedebut = date('2015-01-01');
						$datefin = date('Y-m-d');
						echo woocl_total_sells_amount_today($datedebut,$datefin) . '&nbsp;' . get_woocommerce_currency_symbol();
						?>
						</div>
						<p class="text-muted m-b-10"><?php _e('Total amount of sales', 'woo-classement'); ?></p>
						<div class="woocommerceclassementtrente"></div>
					</div>
				</div>
			</div>
			
		</div>
		
		
		<!-- Widget-2 -->
		<div id="bestsellsamountorders" class="row text-center">
			
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10">
						<h2 style="background:#bd1e51;color:white;padding:10px;font-size:16px;margin-bottom:20px"><?php _e('Highest order', 'woo-classement'); ?></h2>
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<?php 
						$statistics = new WooclStatisticsOrders();
						$highest_sales_order_info = $statistics->getHighestSalesOrder();
						if (is_array($highest_sales_order_info)) {
							$order_id = $highest_sales_order_info['ID'];
							$order_amount = $highest_sales_order_info['Amount'];
							$order_link = $highest_sales_order_info['Link'];
							$currencysymbol = $highest_sales_order_info['CurrencySymbol'];
							echo "$order_amount $currencysymbol";
						} else {
							echo $highest_sales_order_info;
						}
						?>
						</div>
						<div class="woocommerceclassementtrente"></div>
					</div>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10">
						<h2 style="background:#bd1e51;color:white;padding:10px;font-size:16px;margin-bottom:20px"><?php _e('Lowest order', 'woo-classement'); ?></h2>
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<?php 
						$statistics = new WooclStatisticsOrders();
						$lowest_non_zero_total_order_info = $statistics->getLowestNonZeroTotalOrder();

						if (is_array($lowest_non_zero_total_order_info)) {
							$order_id = $lowest_non_zero_total_order_info['ID'];
							$order_amount = $lowest_non_zero_total_order_info['Amount'];
							$currency_symbol = $lowest_non_zero_total_order_info['CurrencySymbol'];
							$order_link = $lowest_non_zero_total_order_info['Link'];
							echo "$order_amount $currency_symbol ";
						} else {
							echo $lowest_non_zero_total_order_info;
						}
						?>
						</div>
						<div class="woocommerceclassementtrente"></div>
					</div>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10">
						<h2 style="background:#bd1e51;color:white;padding:10px;font-size:16px;margin-bottom:20px"><?php _e('Average sales cart today', 'woo-classement'); ?></h2>
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<?php echo do_shortcode('[woocl_today_average_cart_value]'); ?>
						</div>
						<div class="woocommerceclassementtrente"></div>
					</div>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10">
						<h2 style="background:#bd1e51;color:white;padding:10px;font-size:16px;margin-bottom:20px"><?php _e('Average weekly sales cart', 'woo-classement'); ?></h2>
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<?php echo do_shortcode('[woocl_week_average_cart_value]'); ?>
						</div>
						<div class="woocommerceclassementtrente"></div>
					</div>
				</div>
			</div>
			
		</div>
		
		<!--Widget-2 -->
		<div id="bestitemseelledproducts" class="row text-center">
			
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<?php 
						$today = date('Y-12-31'); 
						$firstdayofyear = date('Y-01-01');
						echo woocl_count_orders_stats($firstdayofyear,$today); 
						?>
						</div>
						<p class="text-muted m-b-10"><?php _e('Number of orders for this year', 'woo-classement'); ?></p>
						<div class="woocltooltip">
							<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
							</i>
							<div class="top">
							<p><?php _e('Number of orders for this year. (All order statuses)', 'woo-classement'); ?></p>
							<i></i>
							</div>
						</div> 
						<?php include( WOOCL_PATH . 'inc/charts/orders-charts-years-mini.php'); ?>
						<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">5 years -> This Year</span>
					</div>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i> 
						<?php 
						$today = date('Y-m-d'); 
						$firstdayofmonth = date('Y-m-01');
						echo woocl_count_orders_stats($firstdayofmonth,$today); 
						?>
						</div>
						<p class="text-muted m-b-10"><?php _e('Number of orders for this month', 'woo-classement'); ?></p>
						<div class="woocltooltip">
							<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
							</i>
							<div class="top">
							<p><?php _e('Number of orders for this month. (All order statuses)', 'woo-classement'); ?></p>
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
						<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i> 
						<?php 
						$today = date('Y-m-d'); 
						echo woocl_count_orders_stats($today,$today); 
						?>
						</div>
						<p class="text-muted m-b-10"><?php _e('Number of orders for today', 'woo-classement'); ?></p>
						<div class="woocltooltip">
							<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
							</i>
							<div class="top">
							<p><?php _e('Number of orders for today. (All order statuses)', 'woo-classement'); ?></p>
							<i></i>
							</div>
						</div>
						<?php include( WOOCL_PATH . 'inc/charts/orders-charts-days-mini.php'); ?>
						<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">7 days -> Today</span>
					</div>
				</div>
			</div>
			
			
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<?php 
						$options = get_option('via_woocommerce_classement_settings');
					    $from = $options['via_woocommerce_classement_Statistics_start_year']; 
						$firstalldays = date(''.$from.'-m-01');
						$today = date('Y-m-d');
						echo woocl_count_orders_stats($firstalldays,$today); 
						?>
						</div>
						<p class="text-muted m-b-10"><?php _e('Number of orders since '.$from.'-01-01', 'woo-classement'); ?></p>
						<div class="woocltooltip">
							<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
							</i>
							<div class="top">
							<p><?php _e('Number of orders since '.$from.'-01-01. (All order statuses)', 'woo-classement'); ?></p>
							<i></i>
							</div>
						</div>
						<span data-plugin="peity-bar" data-colors="#6e8cd7,#ebeff2" data-width="200" data-height="40">
							<?php 
							$options = get_option('via_woocommerce_classement_settings');
							$from = $options['via_woocommerce_classement_Statistics_start_year']; 
							$firstalldays = date('$from-m-01');
							$today = date('Y-m-d');
							echo woocl_count_orders_stats($firstalldays,$today); 
							?>
						</span>
						<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">All the time</span>
					</div>
				</div>
			</div>
			
		</div>
		
		<div class="row">

			<div class="col-lg-12">

				<div class="portlet">
					<div class="portlet-heading">
						<h3 class="portlet-title text-dark text-uppercase">
							<?php _e('Number of orders per day - 15 Last days', 'woo-classement'); ?> 
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
						    <?php echo woocl_count_orders_stats_by_days_table(); ?>
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
							<?php _e('General Statistics', 'woo-classement'); ?>
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
											<th><?php _e('Completed', 'woo-classement'); ?></th>
											<th><?php _e('In progress', 'woo-classement'); ?></th>
											<th><?php _e('On Hold', 'woo-classement'); ?></th>
											<th><?php _e('Waiting for payment', 'woo-classement'); ?></th>
											<th><?php _e('Refunded', 'woo-classement'); ?></th>
											<th><?php _e('Failed', 'woo-classement'); ?></th>
											<th><?php _e('Cancelled', 'woo-classement'); ?></th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<?php _e('Sales :', 'woo-classement'); ?>
												<?php echo woocl_total_sells_statut('wc-completed'); ?>
												<br />
												<?php _e('Quantity :', 'woo-classement'); ?>
												<?php echo woocl_total_orders_statut('wc-completed'); ?>
											</td>
											<td>
												<?php _e('Sales :', 'woo-classement'); ?>
												<?php echo woocl_total_sells_statut('wc-processing'); ?>
												<br />
												<?php _e('Quantity :', 'woo-classement'); ?>
												<?php echo woocl_total_orders_statut('wc-processing'); ?>
											</td>
											<td>
												<?php _e('Sales :', 'woo-classement'); ?>
												<?php echo woocl_total_sells_statut('wc-on-hold'); ?>
												<br />
												<?php _e('Quantity :', 'woo-classement'); ?>
												<?php echo woocl_total_orders_statut('wc-on-hold'); ?>
											</td>
											<td>
												<?php _e('Sales :', 'woo-classement'); ?>
												<?php echo woocl_total_sells_statut('wc-pending'); ?>
												<br />
												<?php _e('Quantity :', 'woo-classement'); ?>
												<?php echo woocl_total_orders_statut('wc-pending'); ?>
											</td>
											<td>
												<?php _e('Sales :', 'woo-classement'); ?>
												<?php echo woocl_total_sells_statut('wc-refunded'); ?>
												<br />
												<?php _e('Quantity :', 'woo-classement'); ?>
												<?php echo woocl_total_orders_statut('wc-refunded'); ?>
											</td>
											<td>
												<?php _e('Sales :', 'woo-classement'); ?>
												<?php echo woocl_total_sells_statut('wc-failed'); ?>
												<br />
												<?php _e('Quantity :', 'woo-classement'); ?>
												<?php echo woocl_total_orders_statut('wc-failed'); ?>
											</td>
											<td>
												<?php _e('Sales :', 'woo-classement'); ?>
												<?php echo woocl_total_sells_statut('wc-cancelled'); ?>
												<br />
												<?php _e('Quantity :', 'woo-classement'); ?>
												<?php echo woocl_total_orders_statut('wc-cancelled'); ?>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- end col -->
			
		</div> <!-- end row -->
	
		<div class="row">
			
			<div id="lastorders-orders" class="col-lg-12">

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
							&& ( 'via-woocommerce-classement-orders' === $_GET['page'] ) ) { 
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
							
							<script>
							/*// Bootstrap datepicker
							$('.input-daterange input').each(function() {
							$(this).datepicker('clearDates');
							});

							// Set up your table
							table = $('#datatable-buttons').DataTable({

							"order": [[ 2, "desc" ]],
							dom: 'Blfrtip',
							buttons: [
							'copy', 'csv', 'excel', 'pdf', 'print'
							]

							});

							// Extend dataTables search
							$.fn.dataTable.ext.search.push(
							function(settings, data, dataIndex) {
							var min = $('#min-date').val();
							var max = $('#max-date').val();
							var createdAt = data[3] || 0; // Our date column in the table

							if (
							(min == "" || max == "") ||
							(moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
							) {
							return true;
							}
							return false;
							}
							);

							// Re-draw the table when the a date range filter changes
							$('.date-range-filter').change(function() {
							table.draw();
							});

							$('#datatable-paiement_filter').hide();		*/

							</script>
                            <?php } ?>
						</div>
					</div>
				</div>
			</div> <!-- end col -->
			
		</div> <!-- end row -->	

        <div class="via-woocommerce-classement-clear"></div>

	
<?php } 

