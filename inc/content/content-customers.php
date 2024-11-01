<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results Customers //////////////////////////////////////////

function woocl_tab_results_customers() { ?>
	
	<!--Widget-1 -->
	<div class="row text-center">
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><?php echo woocl_total_user_registred(); ?></div>
					<p class="text-muted m-b-10"><?php _e('Total Customers', 'woo-classement'); ?></p>
					<?php include( WOOCL_PATH . 'inc/charts/bar-customers-mini.php'); ?>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Graph showing customers registered in the last years', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>
				
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><?php echo woocl_total_user_registred_year(); ?></div>
					<p class="text-muted m-b-10"><?php _e('Registered this Year', 'woo-classement'); ?></p>
					<?php include( WOOCL_PATH . 'inc/charts/bar-customers-mini-two-years.php'); ?>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Graph showing customers registered in the last two years', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><?php echo woocl_total_user_registred_month(); ?></div>
					<p class="text-muted m-b-10"><?php _e('Registered this Month', 'woo-classement'); ?></p>
					<?php include( WOOCL_PATH . 'inc/charts/bar-customers-mini-months.php'); ?>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Graph showing customers registered by month over the previous year', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>
				
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><?php echo woocl_total_user_registred_day(); ?></div>
					<p class="text-muted m-b-10"><?php _e('Registered today', 'woo-classement'); ?></p>
					<?php include( WOOCL_PATH . 'inc/charts/bar-customers-mini-days.php'); ?>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Graph showing customers registered for the last 7 days', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div> <!-- end row -->
	
	<!--Widget-1 -->
	<div class="row text-center">	
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><?php echo woocl_display_average_products_per_order(); ?></div>
					<p class="text-muted m-b-10"><?php _e('Average number of products purchased per customer', 'woo-classement'); ?></p>
					
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Average number of products purchased per customer', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">PRO</span></div>
					<p class="text-muted m-b-10"><?php _e('Customer retention rate - last six months', 'woo-classement'); ?></p>
					
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('This rate is calculated over the last six months', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">PRO</span></div>
					<p class="text-muted m-b-10"><?php _e('Percentage of customers who placed more than one order', 'woo-classement'); ?></p>
					
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Percentage of customers who placed more than one order', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">PRO</span></div>
					<p class="text-muted m-b-10"><?php _e('The day with the highest number of orders', 'woo-classement'); ?></p>
					
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('The day with the highest number of orders', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div> <!-- end row -->
	
	<div class="via-woocommerce-classement-clear"></div>
	
	<div style="height:30px"></div>
	
	<!-- Tabs-style-1 -->
	<div class="row"> 
		<div class="col-lg-12"> 
			<ul class="nav nav-pills navtab-bg  nav-tabs nav-justified"> 
				<li class="nav-item"> 
					<a href="#statistics" data-toggle="tab" aria-expanded="false" class="nav-link active"> 
						<span class="visible-xs"><i class="fa fa-home"></i></span> 
						<span class="hidden-xs">
						<?php _e('Online Users', 'woo-classement'); ?>
						</span> 
					</a> 
				</li>
				<li class="nav-item"> 
					<a href="#salesmonths" data-toggle="tab" aria-expanded="true" class="nav-link"> 
						<span class="visible-xs"><i class="fa fa-user"></i></span> 
						<span class="hidden-xs">
						<?php _e('Top 15 customers', 'woo-classement'); ?> <?php _e('-', 'woo-classement'); ?> <?php $currentyear = date('Y'); echo $currentyear;  ?>
						</span> 
					</a> 
				</li>			
				<li class="nav-item"> 
					<a href="#salesyears" data-toggle="tab" aria-expanded="true" class="nav-link"> 
						<span class="visible-xs"><i class="fa fa-user"></i></span> 
						<span class="hidden-xs">
						<?php _e('Search for an order by customer', 'woo-classement'); ?>
						</span> 
					</a> 
				</li>
				<li class="nav-item"> 
					<a href="#salescart" data-toggle="tab" aria-expanded="true" class="nav-link"> 
						<span class="visible-xs"><i class="fa fa-user"></i></span> 
						<span class="hidden-xs">
						<?php _e('Customers Cart', 'woo-classement'); ?>
						</span> 
					</a> 
				</li>				
			</ul> 
			<div class="tab-content"> 
				<div class="tab-pane active" id="statistics"> 
					<div class="h2 text-black m-t-10">
						<?php woocl_display_logged_in_users_table(); ?>
				    </div>
					<hr style="border-top: 2px dotted #ccc;">
					<p style="font-size:16px" class="text-muted m-b-10">
						<?php
						// Vérifier si le plugin est activé
						if (is_plugin_active('via-users-login/via-users-login.php')) {
						echo do_shortcode('[wooclconnexionchart]');
						} else {
						echo 'Please <a style="font-size:21px!important;display:inline-block;color:#ea7024;" target="_blank" href="https://themespress.ca/en/products/plugins-wordpress/via-users-login-statistics/" target="_blank"><b>download</b></a> and activate the <b>Via Users Login plugin</b> If you want to display the graph of users logged on by date.';
						}
						?>
					</p>
				</div>
				<div class="tab-pane" id="salesmonths"> 
					<span style="display:inline-block;color:white;background:#ea7024;padding:8px 30px"><?php _e('Top 15 customers based on a combination of segmentation criteria (e.g. purchase frequency, average order value)', 'woo-classement'); ?></span>
					<div class="panel">
						<div class="panel-body">
							<div class="h2 text-black m-t-10">
							<?php $segmented_customers = woocl_segment_customers(); echo display_top_segmented_customers_as_table($segmented_customers); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="salesyears"> 
					<div class="portlet">
				       <div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Search for an order by customer', 'woo-classement'); ?>
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
						<div class="container" style="width:95%">
							<div class="col-xs-12 col-sm-12 col-md-12" style="text-align:center">
							 <p style="font-size:17px" class="text-muted"><?php _e('Search filter for user orders', 'woo-classement'); ?></p>
							</div>
							
							<form class="form-horizontal" id="woocl-client-search-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
								<input type="hidden" name="action" value="woocl_client_search">
								
								<div class="col-xs-12 col-sm-6 col-md-2 form-group row" style="text-align:center">
									<label for="nomclient"><?php _e('Nom du client','woo-classement'); ?></label><br />
									<input class="form-control" type="text" name="nomclient" id="nomclient">
								</div>
								<div class="col-xs-12 col-sm-6 col-md-2" style="text-align:center">
									<div class="woocltooltipsearchform">
										<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
										</i>
										<div class="top">
										<p>Leave dates blank if there are none</p>
										<i></i>
										</div>
									</div>
									<label for="datecommande"><?php _e('Order date','woo-classement'); ?></label><br />
									<input type="date" name="datecommande" id="datecommande">
								</div>
								<div class="col-xs-12 col-sm-6 col-md-2" style="text-align:center">
									<div class="woocltooltipsearchform">
										<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
										</i>
										<div class="top">
										<p>Leave dates blank if there are none</p>
										<i></i>
										</div>
									</div>
									<label for="datepaiement"><?php _e('Payment Date','woo-classement'); ?></label><br />
									<input type="date" name="datepaiement" id="datepaiement">
								</div>
								<div class="col-xs-12 col-sm-6 col-md-2" style="text-align:center">
									<label for="methodepaiement"><?php _e('Payment method','woo-classement'); ?></label><br />
									<?php
									// Vérifier si WooCommerce est actif
									if (class_exists('WC_Payment_Gateways')) {
									$payment_gateways = WC_Payment_Gateways::instance()->get_available_payment_gateways();
									?>
									<select class="custom-select mt-3" style="display:inline-block" name="methodepaiement" id="methodepaiement">
										<option value=""><?php _e('Choose a payment method','woo-classement'); ?></option>
										<?php foreach ($payment_gateways as $gateway) : ?>
										<option value="<?php echo esc_attr($gateway->id); ?>">
										<?php echo esc_html($gateway->title); ?>
										</option>
										<?php endforeach; ?>
									</select>
									<?php
									} else {
									// WooCommerce n'est pas actif, afficher un message d'erreur ou une alternative
									echo 'WooCommerce n\'est pas activé sur ce site.';
									}
									?>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-2" style="text-align:center">
									<label for="statusorder"><?php _e('Order status','woo-classement'); ?></label><br />
									<?php
									// Vérifier si WooCommerce est actif
									if (class_exists('WC_Payment_Gateways')) {
									// Récupérer les statuts de commandes WooCommerce
									$order_statuses = wc_get_order_statuses();
									?>
									<select class="custom-select mt-3" style="display:inline-block" name="statusorder" id="statusorder">
										<option value=""><?php _e('All Statuses','woo-classement'); ?></option>
										<?php foreach ($order_statuses as $status_key => $status_name) : ?>
										<option value="<?php echo esc_attr($status_key); ?>">
										<?php echo esc_html($status_name); ?>
										</option>
										<?php endforeach; ?>
									</select>
									<?php
									} else {
									// WooCommerce n'est pas actif, afficher un message d'erreur ou une alternative
									echo 'WooCommerce n\'est pas activé sur ce site.';
									}
									?>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3" style="text-align:center; width:100%; margin:0 auto">
								<input class="btn btn-primary" type="submit" value="Search">
								</div>
							</form>
							<div class="via-woocommerce-classement-clear"></div>
							<div class="woocommerceclassementcinquante"></div> 
							
							<table id="WooclTableSearchOrders" class="table table-nowrap mb-0" style="display: none;">
								<thead>
									<tr>
									  <th>Order ID</th> 
									  <th>Name/Surname</th>
									  <th>Date</th>
									  <th>Country</th>
									  <th>City</th>
									  <th>Total Tax</th>
									  <th>Total</th>
									  <th>Shipping Cost</th>
									  <th>Shipping Method</th>
									  <th>Status</th>
									</tr>
								</thead>
							    <tbody id="woocl-result-container" style="clear: both; text-align: center; margin-top: 40px; padding: 20px;"></tbody> 
							</table>
							<div id="woocl-loading-spinner" style="display: none; text-align:center; margin-top:45px;padding:45px 0">
							    <img src="https://sitebook.ca/wp-content/uploads/2023/05/load.gif" alt="Chargement..." />
							</div>	
							<div style="clear: both;text-align:center;margin-top:40px;padding:20px;">
							    <button class="btn btn-primary" id="woocl-load-more-button" style="display: none;">Load More</button>
							</div>	
							
							
						</div>
					</div>
				</div>
			</div>
			</div>
			
			<div class="tab-pane" id="salescart"> 
					<div class="h2 text-black m-t-10">
						<?php echo do_shortcode('[woocl_customers_cart]'); ?>
				    </div>
				</div>
			</div> 
		</div> 

	</div> <!-- End row -->
	

	<!--<div class="row text-center">
		<div class="col-sm-12 col-md-12" id="online">
			<span style="display:inline-block;color:white;background:#ea7024;padding:8px 30px"><?php //_e('Online Customers', 'woo-classement'); ?></span>
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<?php //woocl_display_logged_in_users_table(); ?>
				    </div>
					<p class="text-muted m-b-10">
					<?php //$customersonline = woocl_display_logged_in_users(); if ($customersonline > 1 ) { ?> 
					<?php //_e('Customers online', 'woo-classement'); ?>
					<?php //} else { ?>
					<?php //_e('Customer online', 'woo-classement'); ?>
					<?php //} ?>
					</p>
				</div>
			</div>
		</div>
	</div> -->
	
	<div class="panel">
		<div class="panel-body" style="padding:0">
			<h3 class="text-dark text-uppercase text-center">
			<?php _e('Last registered customers', 'woo-classement'); ?>
			</h3>
			<div class="h2 text-black m-t-10">
				<?php
				$args = array(
					'role'           => 'customer',
					'number'         => -1,
				);

				// The Query
				$user_query = new WP_User_Query( $args );

				// User Loop
				if ( ! empty( $user_query->get_results() ) ) {
				?>
				<div class="woocl-slider-customers">
					<?php foreach ( $user_query->get_results() as $user ) { ?>
					<div class="col-md-2">
						<div class="profile-widget text-center" style="padding:10px">
							<div class="bg-info p-5 bg-profile"></div>
							<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" width="64" height="64" class="avatar-lg rounded-circle img-thumbnail" alt="img">
							<h4 class="mt-4" style="height:35px">
							<?php echo ucfirst(esc_html( $user->billing_first_name )); ?> 
							<?php echo ucfirst(esc_html( $user->billing_last_name )); ?>
							</h4>

							<?php if($user->billing_city !='')  { ?>
								<p class="mt-2" style="padding:0 0 10px 0">
								<i class="fa fa-map-marker"></i>
								<?php echo ucfirst(esc_html( $user->billing_city )); ?> - <?php echo ucfirst(esc_html( $user->billing_country )); ?>
								</p>
							<?php } else { ?>
								<p class="mt-2" style="padding:0 0 10px 0">
								<i class="fa fa-map-marker"></i>
								   <?php _e('N/A', 'woo-classement'); ?>
								</p>
							<?php } ?>
							
							<div class="row clearfix p-4">
								<div class="col-md-4" style="width:100%; background:#eeeeee;padding:5px 0 10px 0; margin-bottom:10px">
									<h5>
										<?php echo wc_get_customer_order_count( $user->ID ); ?>
									</h5>
									<span style="font-size: 12px;display:block">Order(s)</span>
								</div>
								<div class="col-md-4" style="width:100%; background:#eeeeee;padding:5px 0 10px 0; margin-bottom:10px">
									<h5>
									   <?php echo wc_price(wc_get_customer_total_spent( $user->ID  )); ?>
									</h5>
									<span style="font-size: 12px;display:block">Total spent</span>
								</div>
								<div class="col-md-4" style="width:100%; background:#eeeeee;padding:5px 0 10px 0; margin-bottom:10px">
									<h5>
									<?php 
									if (get_last_login( $user->ID ) != '') { 
										echo get_last_login( $user->ID );
									}
									else { 
										echo 'N/A';
									} ?>
									</h5>
									<span style="font-size: 12px;display:block">Last login</span>
								</div>
							</div> 
						</div>
					</div>				
					<?php } ?> 
				</div>
				<?php } else { ?>
				<h5 class="text-dark text-uppercase text-center" style="padding-bottom:20px;">
				    <?php _e('No users found.', 'woo-classement'); ?>
				</h5>
				<?php } ?>
				<div class="via-woocommerce-classement-clear"></div>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
				<script>
					jQuery(document).ready(function($) {
					$('.woocl-slider-customers').slick({
					slidesToShow: 6, // Nombre de diapositives à afficher à la fois
					slidesToScroll: 6,
					dots: true,
					infinite: true,
					speed: 500,
					cssEase: 'linear'
					});
					});
				</script>				
			</div>
		</div>
	</div>


	<div class="row">
		
		<div class="col-lg-12">

			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Customers List - Last orders', 'woo-classement'); ?>
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
						<?php _e('Search customers by registration date :', 'woo-classement'); ?>
						</h5>
						
						<div class="woocommerceclassementdix"></div>				
						<?php woocl_list_customers(); ?>
						
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
						$('#datatable-paiement').DataTable( {
						dom: 'Bfrtip',
						"order": [[ 0, 'desc' ]],
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
						
					</div>
				</div>
			</div>
		</div> <!-- end col -->
		
	</div> <!-- end row -->		

	<div class="via-woocommerce-classement-clear"></div>

	
<?php } 