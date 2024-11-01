<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results Products ///////////////////////////////////////////

function woocl_tab_results_products() { ?>
    
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	
	<!--Widget-1 -->
	<div id="bestviewsproducts" class="row text-center">
	    <div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30px" height="30px"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M326.3 218.8c0 20.5-16.7 37.2-37.2 37.2h-70.3v-74.4h70.3c20.5 0 37.2 16.7 37.2 37.2zM504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-128.1-37.2c0-47.9-38.9-86.8-86.8-86.8H169.2v248h49.6v-74.4h70.3c47.9 0 86.8-38.9 86.8-86.8z"/></svg>
					<?php echo woocl_products_count_total(); ?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Total Products', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30px" height="30px"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M326.3 218.8c0 20.5-16.7 37.2-37.2 37.2h-70.3v-74.4h70.3c20.5 0 37.2 16.7 37.2 37.2zM504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-128.1-37.2c0-47.9-38.9-86.8-86.8-86.8H169.2v248h49.6v-74.4h70.3c47.9 0 86.8-38.9 86.8-86.8z"/></svg>
					<?php echo woocl_products_publish_day(); ?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Published Today', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30px" height="30px"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M326.3 218.8c0 20.5-16.7 37.2-37.2 37.2h-70.3v-74.4h70.3c20.5 0 37.2 16.7 37.2 37.2zM504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-128.1-37.2c0-47.9-38.9-86.8-86.8-86.8H169.2v248h49.6v-74.4h70.3c47.9 0 86.8-38.9 86.8-86.8z"/></svg>
					<?php echo woocl_products_publish_week(); ?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Published this Week', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30px" height="30px"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M326.3 218.8c0 20.5-16.7 37.2-37.2 37.2h-70.3v-74.4h70.3c20.5 0 37.2 16.7 37.2 37.2zM504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-128.1-37.2c0-47.9-38.9-86.8-86.8-86.8H169.2v248h49.6v-74.4h70.3c47.9 0 86.8-38.9 86.8-86.8z"/></svg>
					<?php echo woocl_products_list_stock_count_statut('instock'); ?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Count Products in Stock', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30px" height="30px"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M326.3 218.8c0 20.5-16.7 37.2-37.2 37.2h-70.3v-74.4h70.3c20.5 0 37.2 16.7 37.2 37.2zM504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-128.1-37.2c0-47.9-38.9-86.8-86.8-86.8H169.2v248h49.6v-74.4h70.3c47.9 0 86.8-38.9 86.8-86.8z"/></svg>
					<?php echo woocl_products_list_stock_count_statut('outofstock'); ?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Count Products out Stock', 'woo-classement'); ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-2">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><i style="color:#3960d1" class="fa fa-folder"></i> 
					<?php echo woocl_products_count_categories(); ?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Count Categories', 'woo-classement'); ?></p>
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
						<span class="counter" style="display: inline-block;">
						<?php 
						$options = get_option('via_woocommerce_classement_settings');
					    $from = $options['via_woocommerce_classement_Statistics_start_year'];
						$starttodayalltime = date('Y-m-d'); 
						echo do_shortcode('[woocl_items_sold from="'.$from.'-01-01" to="'.$starttodayalltime.'"]'); ?>
						</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Number items sold since '.$from.'-01-01', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Since January 1, '.$from.' until today. (For processing completed orders)', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div> 
					<span data-plugin="peity-bar" data-colors="#6e8cd7,#ebeff2" data-width="200" data-height="40">
					<?php $starttodayalltime = date('Y-m-d'); echo do_shortcode('[woocl_items_sold from="'.$from.'-01-01" to="'.$starttodayalltime.'"]'); ?>
					</span>
					<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">Since January 1, <?php echo $from; ?> until today</span>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i> 
						<?php $starttoday = date('Y-m-d'); echo do_shortcode('[woocl_items_sold from="'.$starttoday.'" to="'.$starttoday.'"]'); ?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Number items sold today', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Number items sold for today. (For processing completed orders)', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
					<?php include( WOOCL_PATH . 'inc/charts/products-count-mini-days.php'); ?>
					<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">8 days -> Today</span>
				</div>
			</div>
		</div>	
		
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
                    <i style="color:#3960d1" class="fa fa-shopping-cart"></i> 
					<?php 
					$startfrommonth = date('Y-m-01'); 
					$starttomonth = date('Y-m-31');
					echo do_shortcode('[woocl_items_sold from="'.$startfrommonth.'" to="'.$starttomonth.'"]'); 
					?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Number items sold this month', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Number items sold for this month (For processing completed orders)', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
					<?php include( WOOCL_PATH . 'inc/charts/products-count-mini-months.php'); ?>
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
					$startfromyear = date('Y-01-01'); 
					$starttoyear = date('Y-12-31');
					echo do_shortcode('[woocl_items_sold from="'.$startfromyear.'" to="'.$starttoyear.'"]'); 
					?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Number items sold this year', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Total items sold for this year. (For processing completed orders)', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
					<?php include( WOOCL_PATH . 'inc/charts/products-count-mini-years.php'); ?>
					<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">5 years -> This year</span>
				</div>
			</div>
		</div>
		
	</div>
	
	<div class="row text-center" id="woocl-charts-count-customers-login">
		<div class="col-sm-12 col-md-12" id="online">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<?php _e('Count of product views by the customer (60 months)', 'woo-classement'); ?>
				    </div>
					<hr style="border-top: 2px dotted #ccc;">
					<?php
					$chartGenerator = new Woocl_Product_Chart_Generator();
					echo $chartGenerator->woocl_generate_Chart();
					?>
					</p>
				</div>
			</div>
		</div>
	</div>
	
	<div id="lastviewsproducts" class="row text-center"> <!-- Start of Row -->
	    <span style="display:inline-block;color:white;background:#ea7024;padding:8px 30px">
		    <?php _e('LAST VIEWS STATISTICS', 'woo-classement'); ?>
		</span>
		<div class="col-lg-12">
			<div class="portlet" style="overflow-y: scroll;height:500px"><!-- /primary heading -->
				<div class="portlet-heading" id="bestsellersproducts">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Products -> Last visits', 'woo-classement'); ?>
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
					    <?php echo woocl_statistiques_count_rows_views(); ?>
				    </div>
				</div>
			</div>
		</div>
	</div> <!-- End of Row -->
	
	<div class="row"><!-- start row -->
	
		<div class="col-lg-12" id="idproductdatatablebestviews">
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Products -> Best Views -> All Languages', 'woo-classement'); ?>
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
							<?php 
							$options = get_option('via_woocommerce_classement_settings'); 
							if ( isset($options['via_woocommerce_classement_show_product_system']) 
							&& ($options['via_woocommerce_classement_show_product_system'] == 1) ){ 
							?>
							<?php echo woocl_get_products_view_list(); ?>
							<?php global $pagenow; 
							if ( ( 'admin.php' === $pagenow )
							&& ( 'via-woocommerce-classement-products' === $_GET['page'] ) ) { 
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
							$('#datatable-product-count-filter').DataTable( {
							dom: 'Bfrtip',
							"order": [[ 1, 'desc' ]],
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
						<?php } else { ?>
						    <?php _e( 'Active the option system views in products tabs options', 'woo-classement'); ?> 
							<a style="background:#ea7024; padding:5px 10px;color:#ffffff" href="<?php echo get_bloginfo('url') .'/wp-admin/admin.php?page=via-woocommerce-classement-options'; ?>">
							<span>
							<?php _e( 'Options', 'woo-classement' ); ?>
							</span>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div> <!-- end col -->
		
	</div> <!-- end row -->


    <div class="row"> <!-- Start of Row -->
	
		<div class="col-lg-12">
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading" id="bestsellersproducts">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Products -> Best Sellers', 'woo-classement'); ?>
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
					    <?php include( WOOCL_PATH . 'inc/charts/bestsellers-products.php'); ?>
	                    <div id="productsbycategory" class="chart" style="width:100%; height:400px"></div>
				    </div>
				</div>
			</div>
		</div>
	
	</div> <!-- End of Row -->
	
	<div class="via-woocommerce-classement-clear"></div>

<?php } 