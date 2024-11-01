<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results General ////////////////////////////////////////////

function woocl_tab_results_paiements() { ?>

	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

	<!--Widget-2 -->
	<div id="bestpaiementsstatistiques" class="row text-center">
	    
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="zmdi zmdi-card"></i>
						<?php echo woocl_count_paiements_total(); ?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Total payments (taxes included)', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Total payments (taxes included)', 'woo-classement'); ?></p>
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
						<i style="color:#3960d1" class="zmdi zmdi-card"></i>
						<?php 
						$wooclcountpaiementstotal = woocl_count_paiements_total();
						$firstalldays = date('2015-m-01');
						$today = date('Y-m-d');
						$totalorders = woocl_count_orders_stats($firstalldays, $today);

						if ($totalorders != 0) {
						$finalyresult = $wooclcountpaiementstotal / $totalorders;
						if ($finalyresult > 0) {
						echo number_format($finalyresult, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
						} else {
						echo '0' . '&nbsp;' . get_woocommerce_currency_symbol();
						}
						} else {
						echo '0' . '&nbsp;' . get_woocommerce_currency_symbol();
						}
						?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Average payments per order(taxes included)', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Average payments per order (taxes included)', 'woo-classement'); ?></p>
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
                    <i style="color:#3960d1" class="zmdi zmdi-card"></i> 
					<?php 
					$wooclcountpaiementstotaldeux = woocl_count_paiements_total();
					$firstalldays = date('2015-m-01');
					$today = date('Y-m-d');
					$totalcustomers = woocl_total_user_registred(); 
					$finalyresultcustomerspeiments = $wooclcountpaiementstotaldeux / $totalcustomers;
					if ($finalyresultcustomerspeiments > 0) {
					echo number_format($finalyresultcustomerspeiments, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
					}
					else {
					echo '0' . '&nbsp;' . get_woocommerce_currency_symbol();
					}
					?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Average payments by number of customers', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Average payments by number of customers (taxes included)', 'woo-classement'); ?></p>
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
					<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
					<?php 
						$today = date('Y-m-d');
						$args = array(
						'limit' => '1',
						'date_paid' => '$today',
						);
						$results = wc_get_orders( $args );
						foreach ($results as $result) {
							if ($result->total) {
							    echo $result->total . '&nbsp;' . get_woocommerce_currency_symbol();
							}
							else {
							   echo '0.00' . '&nbsp;' . get_woocommerce_currency_symbol();
							}
						}
					?>
					</div>
					<p class="text-muted m-b-10"><?php _e('The last payment made by a customer', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('The last payment made by a customer', 'woo-classement'); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
					<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
					<?php 
						$payment_statistics = new WOOCL_PaymentStatistics();
						echo $payment_statistics->calculate_average_sales_per_day();
					?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Average payments per day', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('This amount is calculated since the date of the first order.', 'woo-classement'); ?></p>
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
						<?php _e('Orders -> Statut -> Completed', 'woo-classement'); ?>
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
						<?php include( WOOCL_PATH . 'inc/charts/average-paiements.php'); ?>
						<div id="piechartpaiement" style="width:100%; height:auto;"></div>
				    </div>
				</div>
			</div>
		</div>
	
	</div> <!-- End of Row -->
	
	<div class="row">
		
		<div class="col-lg-12">

			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading" id="paiements-charts-methods">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Paiements Methods', 'woo-classement'); ?>
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
						<?php echo woocl_get_paiements_way() ?>
						<?php //include( WOOCL_PATH . 'inc/charts/paiements-by-statut-mini.php'); ?>
						<div class="woocommerceclassementtrente"></div>
						<?php echo do_shortcode('[wooclsalescountrychart]'); ?>
					</div>
				</div>
			</div>
		</div> <!-- end col -->
		
	</div> <!-- end row -->			
	
	<div class="via-woocommerce-classement-clear"></div>
	
<?php } 