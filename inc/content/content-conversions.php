<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} 

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results plugin /////////////////////////////////////////////

function woocl_tab_content_conversions() { ?>
	
	<!--Widget-2 -->
	<div id="bestitemseelledproducts" class="row text-center">
	    
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10">
						<i style="color:#3960d1" class="fa fa-shopping-cart"></i>
						<span class='counter' style='display: inline-block;'>
						    <?php echo woocl_statistiques_count_rows_all_section('2015-01-01'); ?>
						</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Number of views for articles, pages, all', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Number of views for articles, pages, all (Since the Woocommerce Classement version 2.6.3 - 2022-10-24)', 'woo-classement'); ?></p>
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
						<span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">
						PRO	VERSION									
					    </span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Number of views for articles, pages, for today', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Number of views for articles pages (Since the Woocommerce Classement version 2.6.3 - 2022-10-24)', 'woo-classement'); ?></p>
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
					<span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">
						PRO	VERSION									
					</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Number of views for articles, pages, for this month', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Number of views for articles, pages, for this month (Since the Woocommerce Classement version 2.6.3 - 2022-10-24)', 'woo-classement'); ?></p>
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
					<span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">
						PRO	VERSION									
					</span>
					</div>
					<p class="text-muted m-b-10"><?php _e('Number of views for articles, pages, for this year', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Number of views for articles, pages, for this year (Since the version Woocommerce Ranking 2.6.3 - 2022-10-24)', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
		<!--Widget-2 -->
	<div id="bestviewsproducts" class="row text-center">
	    <div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><i style="color:#3960d1" class="fa fa-eye"></i> 
					<?php if( woocl_version_number() > '2.6.1.1' ) { ?>
					<?php echo woocl_statistiques_count_rows_today_section(); ?>
					<?php } else { ?>
					<?php 
					global $wpdb;
					$prefix = date('Ymd');
					// On définit le Meta Key a utiliser et on le place dans une variable.
					$metakeyday = $prefix.'_woocommerce_classement_product_count';
					// On questionne la Base de données et on fait le Compte.
					$daycount = $wpdb->get_var( $wpdb->prepare( 
					"SELECT sum(meta_value) FROM $wpdb->postmeta WHERE meta_key = %s", 
					$metakeyday));
					echo "<span class='counter' style='display: inline-block;'>{$daycount}</span>";
					?>
					<?php } ?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Today Views', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Daily views statistics for products are available since version 2.6.1 (Since 2022-03-02). If you updated your plugin after Oct 12, 2022, it will display the new statistics.', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
					<?php include( WOOCL_PATH . 'inc/charts/products-charts-mini.php'); ?>
					<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">7 days -> Today</span>
				</div>
			</div>
		</div>
	
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><i style="color:#fc5d93" class="fa fa-eye"></i>
						<?php 
						global $wpdb;
						$prefix = date('Ym');
						// On définit le Meta Key a utiliser et on le place dans une variable.
						$metakeymonth = $prefix.'_woocommerce_classement_product_count';
						// On questionne la Base de données et on fait le Compte.
						$monthcount = $wpdb->get_var( $wpdb->prepare( 
						"SELECT sum(meta_value) FROM $wpdb->postmeta WHERE meta_key = %s", 
						$metakeymonth));
						echo "<span class='counter' style='display: inline-block;'>{$monthcount}</span>";
						?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Monthly Views', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Monthly views statistics for products are available since version 2.6.1 (Since 2022-03-02)', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
					<?php include( WOOCL_PATH . 'inc/charts/products-charts-months-mini.php'); ?>
					<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">5 months -> This month</span>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><i style="color:#f7c836" class="fa fa-eye"></i>
						<?php 
						global $wpdb;
						$prefix = date('Y');
						// On définit le Meta Key a utiliser et on le place dans une variable.
						$metakeyyear = $prefix.'_woocommerce_classement_product_count';
						// On questionne la Base de données et on fait le Compte.
						$yearcount = $wpdb->get_var( $wpdb->prepare( 
						"SELECT sum(meta_value) 
						FROM $wpdb->postmeta 
						WHERE meta_key = %s", 
						$metakeyyear));
						echo "<span class='counter' style='display: inline-block;'>{$yearcount}</span>";
						?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Yearly Views', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('Yearly views statistics for products are available since version 2.6.1 (Since 2022-03-02)', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div>
					<?php include( WOOCL_PATH . 'inc/charts/products-charts-years-mini.php'); ?>
					<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">2 years -> This Year</span>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-3">
			<div class="panel">
				<div class="panel-body">
					<div class="h2 text-black m-t-10"><i style="color:#34c73b" class="fa fa-eye"></i>
						<?php 
						global $wpdb;
						// On définit le Meta Key a utiliser et on le place dans une variable.
						$metakey = 'woocommerce_classement_product_count';
						// On questionne la Base de données et on fait le Compte.
						$likescount = $wpdb->get_var( $wpdb->prepare( 
						"SELECT sum(meta_value) FROM $wpdb->postmeta WHERE meta_key = %s", 
						$metakey));
						echo "<span class='counter' style='display: inline-block;'>{$likescount}</span>";
						?>
					</div>
					<p class="text-muted m-b-10"><?php _e('Visits on Shop', 'woo-classement'); ?></p>
					<div class="woocltooltip">
						<i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
						</i>
						<div class="top">
						<p><?php _e('The total count is available since your first plugin activation', 'woo-classement'); ?></p>
						<i></i>
						</div>
					</div> 
					<span data-plugin="peity-bar" data-colors="#6e8cd7,#ebeff2" data-width="200" data-height="40">
					<?php 
						global $wpdb;
						// On définit le Meta Key a utiliser et on le place dans une variable.
						$metakey = 'woocommerce_classement_product_count';
						// On questionne la Base de données et on fait le Compte.
						$likescount = $wpdb->get_var( $wpdb->prepare( 
						"SELECT sum(meta_value) FROM $wpdb->postmeta WHERE meta_key = %s", 
						$metakey));
						echo "{$likescount}";
						?>
					</span>
					<br /><span style="font-size:12px" class="text-muted wooc-span-views-stats">All the time</span>
					<?php //include( WOOCL_PATH . 'inc/charts/products-charts-years-mini.php'); ?>
				</div>
			</div>
		</div>
		
	</div>
	
	<div id="lastviewsothers" class="row text-center"> <!-- Start of Row -->
	    <span style="display:inline-block;color:white;background:#ea7024;padding:8px 30px">
		    <?php _e('LAST VIEWS STATISTICS (PRO VERSION)', 'woo-classement'); ?>
		</span>
		<div class="col-lg-12">
			<div class="portlet" style="overflow-y: scroll;height:500px"><!-- /primary heading -->
				<div class="portlet-heading" id="bestsellersproducts">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Others -> Last visits', 'woo-classement'); ?>
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
					     <img src="https://themespress.ca/wp-content/uploads/2022/10/Statistics-Others-Pro-Version-Conversion-modified1.png" alt=""> 
				    </div>
				</div>
			</div>
		</div>
	</div> <!-- End of Row -->
	
	<div class="via-woocommerce-classement-clear"></div>
		
<?php }