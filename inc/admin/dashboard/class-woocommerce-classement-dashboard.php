<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

///////////////////////////////// Generate new Dashboard width results Woocommerce Classement /////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function woocl_dashboard_widget_function() {
	?>
	    <div id="dashboard_right_now">
			<ul>
			    <?php _e('<p>Some results of your online shop ...</p>', 'woo-classement'); ?>
				<li class="post-count" style="text-align:center; padding:10px 0">
				<h3><i class="fc_icons fa fa-bullhorn"></i> <?php _e('Sales', 'woo-classement'); ?></h3>
				    <div style="font-size:17px; font-weight:bold;text-align:center">
					<?php echo woocl_total_sells(); ?>
					</div>
				</li>
				<li class="post-count" style="text-align:center; padding:10px 0">
				<h3><i class="fc_icons fa fa-user"></i> <?php _e('Customers', 'woo-classement'); ?></h3>
				   <div style="font-size:17px; font-weight:bold;text-align:center">
				   <?php echo woocl_total_user_registred(); ?>
				   </div>
				</li>
				<li class="post-count" style="text-align:center; padding:10px 0">
				<h3><i class="fc_icons fa fa-list-ol"></i> <?php _e('Orders', 'woo-classement'); ?></h3>
				   <div style="font-size:17px; font-weight:bold;text-align:center">
				   <?php echo woocl_total_orders_all_average(); ?>
				   </div>
				</li>
				<li class="post-count" style="text-align:center; padding:10px 0">
				<h3><i class="fc_icons fa fa-user"></i> <?php _e('Customers this Year', 'woo-classement'); ?></h3>
				   <div style="font-size:17px; font-weight:bold;text-align:center">
				   <?php echo woocl_total_user_registred_year(); ?>
				   </div>
				</li>
				<li class="post-count" style="text-align:center; padding:10px 0">
				<h3><i class="fc_icons fa fa-bullhorn"></i> <?php _e('Avg Price -> Order', 'woo-classement'); ?></h3>
				   <div style="font-size:17px; font-weight:bold;text-align:center">
					<?php 
					// On questionne la Base de données et on fait le Compte.
					$num_amount = woocl_get_sales_net(); 
					$num_total = woocl_total_orders_all_average();
					$resultat = $num_amount / $num_total;
					echo number_format((float) $resultat, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
					?>
					</div>
				</li>
				<li class="post-count" style="text-align:center; padding:10px 0">
				<h3><i class="fc_icons fa fa-bullhorn"></i> <?php _e('Connections', 'woo-classement'); ?></h3>
				   <div style="font-size:17px; font-weight:bold;text-align:center">
				   <?php echo woocl_count_all_connections(); ?>
				   </div>
				</li>
				<li class="post-count" style="text-align:center; padding:10px 0">
				<h3><i class="fc_icons fa fa-bullhorn"></i> <?php _e('Products', 'woo-classement'); ?></h3>
				   <div style="font-size:17px; font-weight:bold;text-align:center">
				   <?php echo woocl_products_count_total_average(); ?>
				   </div>
				</li>
				<li class="post-count" style="text-align:center; padding:10px 0">
				<h3><i class="fc_icons fa fa-bullhorn"></i> <?php _e('Avg Products -> Order', 'woo-classement'); ?></h3>
					<div style="font-size:17px; font-weight:bold;text-align:center">
						<?php 
						// On questionne la Base de données et on fait le Compte.
						$numamount = woocl_items_sold_average();
						$numtotal = woocl_total_orders_all_average();

						// Check if $numtotal is not zero to avoid division by zero error
						if ($numtotal != 0) {
						$resultat = $numamount / $numtotal;
						echo number_format((float) $resultat, 2, '.', '');
						} else {
						// Handle the case when $numtotal is zero, perhaps display a message or a default value
						echo "0"; // Example: Display '0.00' when there are no orders to calculate the average from
						}
						?>
					</div>
				</li>
			</ul> 
		</div>
		
	<?php
}

// Create the function use in the action hook
function woocl_add_dashboard_widgets() {
    wp_add_dashboard_widget(
		'woocl_dashboard_widget', 
		'Woocommerce Classement', 
		'woocl_dashboard_widget_function'
		)
	;
}

// Hoook into the 'wp_dashboard_setup' action to register our other functions
add_action('wp_dashboard_setup', 'woocl_add_dashboard_widgets' );