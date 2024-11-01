<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Get shipping total for an order //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function woocl_calculate_shipping() {

	global $woocommerce;
	$shipping_total = 0;

	foreach ( $this->get_shipping_methods() as $shipping ) {
		$shipping_total += $shipping['cost'];
	}

	$this->set_total( $shipping_total, 'shipping' );

	return $this->get_total_shipping();
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Get shipping total for all orders //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
function woocl_get_total_shipping() {
	global $wpdb;
	$meta_key = '_order_shipping';
	$all_downloads = $wpdb->get_var($wpdb->prepare("
	SELECT sum(meta_value) 
	FROM $wpdb->postmeta 
	WHERE meta_key = %s", $meta_key
	)
	);
    echo '<span class="numberCircle">';
	echo '&nbsp;';		
	return number_format((float) $all_downloads, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
	echo '</span>';
	
	//$wootableorders = $wpdb->prefix.'woo_sr_orders';
	//$result = $wpdb->get_results('
	//SELECT sum(shipping) as shipping 
	//FROM `' . $wootableorders .'`
	//WHERE `created_date`
	//LIKE "%' . $year . mysqli_real_escape_string() . '%" 
	//'); 
    //echo '<span class="numberCircle">';
	//echo '&nbsp;';		
	//echo $result[0]->shipping . '&nbsp;' . get_woocommerce_currency_symbol();
	//echo '</span>';
}

function woocl_get_total_shipping_average() {
	global $wpdb;
	$meta_key = '_order_shipping';
	$all_downloads = $wpdb->get_var($wpdb->prepare("
	SELECT sum(meta_value) 
	FROM $wpdb->postmeta 
	WHERE meta_key = %s", $meta_key
	)
	);	
	return $all_downloads;
	
	//$wootableorders = $wpdb->prefix.'woo_sr_orders';
	//$result = $wpdb->get_results('
	//SELECT sum(shipping) as shipping 
	//FROM `' . $wootableorders .'`
	//WHERE `created_date`
	//LIKE "%' . $year . mysqli_real_escape_string() . '%" 
	//'); 
    //echo '<span class="numberCircle">';
	//echo '&nbsp;';		
	//echo $result[0]->shipping . '&nbsp;' . get_woocommerce_currency_symbol();
	//echo '</span>';
}

function woocl_get_total_shipping_annuel($year) {
	global $wpdb;
	//LIKE YEAR(wp_posts.post_date) = YEAR(CURRENT_DATE)
	//GROUP BY wp_postmeta.meta_value
	
	$meta_key = '_order_shipping';
	$all_downloads = $wpdb->get_var($wpdb->prepare("
	SELECT sum(meta_value) 
	FROM $wpdb->postmeta
	WHERE meta_key = %s
	", $meta_key
	
	)
	);		
	echo number_format((float) $all_downloads, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
	
} 




////////////////////////////// EN TRAVAIL ///////////////////////////////////////////////////
function woocl_get_total_shipping_this_year() {
	global $wpdb; 
	$year = date('Y');
	$meta_key = '_order_shipping';
	$all_downloads = $wpdb->get_var($wpdb->prepare("
	SELECT sum(meta_value) 
	FROM $wpdb->postmeta
	WHERE meta_key = %s
	", $meta_key 
	)
	);		
	return number_format((float) $all_downloads, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
}
////////////////////////////// EN TRAVAIL ///////////////////////////////////////////////////

////////////////////////////// EN TRAVAIL ///////////////////////////////////////////////////
function woocl_get_total_shipping_last_year() {
	global $wpdb; 
	$shipping_table = $wpdb->prefix;
	$year = date('Y', strtotime('-1 year'));
	$result = $wpdb->get_results('
	SELECT sum(shipping) as shipping 
	FROM `' . $shipping_table . 'woo_sr_orders`
	WHERE `created_date`
	LIKE "%' . $year . mysqli_real_escape_string() . '%" 
	'); 		
	return $result[0]->shipping . '&nbsp;' . get_woocommerce_currency_symbol();
}
////////////////////////////// EN TRAVAIL ///////////////////////////////////////////////////

////////////////////////////// EN TRAVAIL ///////////////////////////////////////////////////
function woocl_get_total_shipping_this_month() { 
    global $wpdb; 
	$shipping_table = $wpdb->prefix;
	$month = date('m');
	$result = $wpdb->get_results('
	SELECT sum(shipping) as shipping 
	FROM `' . $shipping_table . 'woo_sr_orders`
	WHERE `created_date`
	LIKE "%' . $month . mysqli_real_escape_string() . '%" 
	'); 	
	return $result[0]->shipping . '&nbsp;' . get_woocommerce_currency_symbol();
}
////////////////////////////// EN TRAVAIL ///////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Get shipping zone //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_get_shipping_zones() {
	global $wpdb; 
	$shipping_table = $wpdb->prefix;
	$results = $wpdb->get_results('
    SELECT * FROM `' . $shipping_table . 'woocommerce_shipping_zones`
	JOIN `' . $shipping_table . 'woocommerce_shipping_zone_locations`
    JOIN `' . $shipping_table . 'woocommerce_shipping_zone_methods` 	
	'); 
		
		if($results) {
			
		echo'<div class="table-responsive">';
			
			echo'<table class="table">';
				
				echo'<tr>';
				echo'<th>'; _e('Zone', 'woo-classement'); '</th>';
				echo'<th>'; _e('Name', 'woo-classement'); '</th>';
				echo'<th>'; _e('Code Location', 'woo-classement'); '</th>';
				echo'<th>'; _e('Location Type', 'woo-classement'); '</th>';
				echo'</tr>';
					foreach ( $results as $result ) {
						echo'<tr>';
						echo'<td>' . $result->zone_id . '</td>';
						echo'<td>' . $result->zone_name . '</td>';
						echo'<td>' . $result->location_code . '</td>';
						echo'<td>' . ucfirst($result->location_type) . '</td>';
						echo'</tr>';
					}						
	        echo'</table>';
		
		echo'</div>';
		
		}
		else {
			echo '<p>';
			echo _e('No results', 'woo-classement');
			echo '</p>';
		}
		
		echo'<div class="via-woocommerce-classement-clear"></div>';
}  


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Get shipping method for order //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_get_shipping_method_title($orderid) {
	global $wpdb; 
	$tablename = $wpdb->prefix . 'woocommerce_order_items';
	$results = $wpdb->get_results("SELECT order_item_name FROM $tablename WHERE order_id = $orderid AND order_item_type = 'shipping'"); 	
	if ($results){
	   return $results[0]->order_item_name;
	}
	else {
	   return 'N/A';
	}
} 


/*function woocl_get_shipping_tax_total_tax_amount_currency() {
    global $wpdb; 
	$tablename = $wpdb->prefix . 'woocommerce_order_itemmeta';	
	$resultshippingtax = $wpdb->get_var("SELECT sum(meta_value) FROM `wpne_woocommerce_order_itemmeta` WHERE `meta_key` = 'shipping_tax_amount'");
    return number_format($resultshippingtax, 2, '.', '')  . get_woocommerce_currency_symbol();
}


function woocl_get_shipping_tax_total_tax_amount() {
    global $wpdb; 
	$tablename = $wpdb->prefix . 'woocommerce_order_itemmeta';	
	$resultshippingtax = $wpdb->get_var("SELECT sum(meta_value) FROM `wpne_woocommerce_order_itemmeta` WHERE `meta_key` = 'shipping_tax_amount'");
    return $resultshippingtax;
}*/

function woocl_get_shipping_total_tax_total() {
    global $wpdb;
	$tablename = $wpdb->prefix . 'woocommerce_order_itemmeta';	
    $resultshippingtotaltax = $wpdb->get_var("SELECT sum(meta_value) FROM $tablename WHERE meta_key LIKE '_order_shipping_tax'");
	if ($resultshippingtotaltax != 0) { 
	   return '<span class="counter" style="display: inline-block;">' . number_format($resultshippingtotaltax, 2, '.', '') . '</span>' . '&nbsp;' . get_woocommerce_currency_symbol(); 
    }
	else {
	   return '0.00';
	}	
}

function woocl_get_average_shipping_cost() {
    $firstalldays = date('2015-m-01');
    $today = date('Y-m-d');
    $totalamountshipping = woocl_get_total_shipping();
    $orderscount = woocl_count_orders_stats_all();

    // Vérifier si $totalamountshipping et $orderscount sont des nombres valides
    if (is_numeric($totalamountshipping) && is_numeric($orderscount) && $orderscount != 0) {
        $total = $totalamountshipping / $orderscount;
        return '<span class="counter" style="display: inline-block;">' . number_format((float) $total, 2, '.', '') . '</span>' . '&nbsp;' . get_woocommerce_currency_symbol();
    } else {
        return 'N/A'; // Remplacez par la valeur par défaut que vous souhaitez afficher en cas d'erreur.
    }
}


/*function woocl_get_average_shipping_cost() {
	$firstalldays = date('2015-m-01');
	$today = date('Y-m-d');
	$totalamountshipping = woocl_get_total_shipping();
	$orderscount = woocl_count_orders_stats_all(); 
	$total = $totalamountshipping / $orderscount;
	if (is_numeric($total)) {
		return '<span class="counter" style="display: inline-block;">' . number_format((float) $total, 2, '.', '') . '</span>' . '&nbsp;' . get_woocommerce_currency_symbol(); 
    }
}*/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Get shipping zone and shipping method list //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_get_all_shipping_zones() {
	$data_store = WC_Data_Store::load( 'shipping-zone' );
	$raw_zones = $data_store->get_zones();
	foreach ( $raw_zones as $raw_zone ) {
	   $zones[] = new WC_Shipping_Zone( $raw_zone );
	}
	$zones[] = new WC_Shipping_Zone( 0 ); // ADD ZONE "0" MANUALLY
	return $zones;
}

function woocl_get_shipping_methods() {
	foreach ( woocl_get_all_shipping_zones() as $zone ) {
		$zone_shipping_methods = $zone->get_shipping_methods();
		if ($zone_shipping_methods){
			echo '<ul>';
			foreach ($zone_shipping_methods as $result => $singlepost) {
				echo '<li>';
				echo $singlepost->get_title();
				echo '</li>';
			}
			echo '</ul>';
		}
	}
}

/////////////////////////////////////////// Class PHP Statistics Shipping ////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

class WooCommerceShippingStatistics {

	public function woocl_calculate_successful_delivery_percentage() {
		// Fetch all orders that have been shipped
		$args = array(
			'status' => array('wc-completed', 'wc-shipped'),
			'limit' => -1, // Fetch all orders
			'return' => 'ids', // Return only the IDs for better performance
		);
		$shipped_orders = wc_get_orders($args);

		$successful_deliveries = 0;
		$shipped_with_shipping_cost = 0;

		foreach ($shipped_orders as $order_id) {
			$order = wc_get_order($order_id);
			$shipping_total = $order->get_shipping_total();

			// Check if the order has shipping costs
			if ($shipping_total > 0) {
				$shipped_with_shipping_cost++;

				// Check if the order is marked as completed
				if ($order->has_status('wc-completed')) {
					$successful_deliveries++;
				}
			}
		}

		// Calculate the percentage of successful deliveries
		if ($shipped_with_shipping_cost > 0) {
			$percentage = ($successful_deliveries / $shipped_with_shipping_cost) * 100;
		} else {
			$percentage = 0;
		}

		return $percentage;
	}


	public function woocl_calculate_average_shipping_cost() {
		// Récupérer toutes les commandes expédiées
		$args = array(
			'status' => array('wc-completed', 'wc-shipped'),
			'limit' => -1,
			'return' => 'ids',
		);
		$shipped_orders = wc_get_orders($args);

		$total_shipping_cost = 0;
		$orders_with_shipping_cost = 0;

		foreach ($shipped_orders as $order_id) {
			$order = wc_get_order($order_id);
			$shipping_total = (float) $order->get_shipping_total();

			if ($shipping_total > 0) {
				$total_shipping_cost += $shipping_total;
				$orders_with_shipping_cost++;
			}
		}

		// Calculer le coût moyen d'expédition
		if ($orders_with_shipping_cost > 0) {
			$average_shipping_cost = $total_shipping_cost / $orders_with_shipping_cost;
		} else {
			$average_shipping_cost = 0;
		}

		return $average_shipping_cost;
	}


	public function woocl_calculate_total_shipping_tax() {
		// Récupérer toutes les commandes
		$args = array(
			'limit' => -1, // Récupérer toutes les commandes
			'return' => 'ids', // Retourner seulement les IDs pour optimiser la performance
		);
		$orders = wc_get_orders($args);

		$total_shipping_tax = 0;

		foreach ($orders as $order_id) {
			$order = wc_get_order($order_id);
			$shipping_tax = (float) $order->get_shipping_tax();
			$total_shipping_tax += $shipping_tax;
		}

		return $total_shipping_tax;
	}

	public function woocl_calculate_average_shipping_tax() {
		// Récupérer toutes les commandes
		$args = array(
			'limit' => -1, // Récupérer toutes les commandes
			'return' => 'ids', // Retourner seulement les IDs pour optimiser la performance
		);
		$orders = wc_get_orders($args);

		$total_shipping_tax = 0;
		$orders_with_shipping_tax = 0;

		foreach ($orders as $order_id) {
			$order = wc_get_order($order_id);
			$shipping_tax = (float) $order->get_shipping_tax();

			if ($shipping_tax > 0) {
				$total_shipping_tax += $shipping_tax;
				$orders_with_shipping_tax++;
			}
		}

		// Calculer la moyenne des taxes d'expédition
		if ($orders_with_shipping_tax > 0) {
			$average_shipping_tax = $total_shipping_tax / $orders_with_shipping_tax;
		} else {
			$average_shipping_tax = 0;
		}

		return $average_shipping_tax;
	}

	public function woocl_calculate_average_shipping_cost_per_order_all_orders() {
		$args = array(
			'status' => array('wc-completed', 'wc-shipped'),
			'limit' => -1,
			'return' => 'ids',
		);
		$shipped_orders = wc_get_orders($args);

		$total_shipping_cost = 0;
		$total_orders = count($shipped_orders);

		foreach ($shipped_orders as $order_id) {
			$order = wc_get_order($order_id);
			$shipping_total = (float) $order->get_shipping_total();
			$total_shipping_cost += $shipping_total;
		}

		if ($total_orders > 0) {
			$average_shipping_cost_per_order = $total_shipping_cost / $total_orders;
		} else {
			$average_shipping_cost_per_order = 0;
		}

		return $average_shipping_cost_per_order;
	}

	public function woocl_calculate_average_shipping_cost_per_item() {
		$args = array(
			'status' => array('wc-completed', 'wc-shipped'),
			'limit' => -1,
			'return' => 'ids',
		);
		$shipped_orders = wc_get_orders($args);

		$total_shipping_cost = 0;
		$total_items = 0;

		foreach ($shipped_orders as $order_id) {
			$order = wc_get_order($order_id);
			$shipping_total = (float) $order->get_shipping_total();
			$items_count = $order->get_item_count();

			if ($shipping_total > 0 && $items_count > 0) {
				$total_shipping_cost += $shipping_total;
				$total_items += $items_count;
			}
		}

		if ($total_items > 0) {
			$average_shipping_cost_per_item = $total_shipping_cost / $total_items;
		} else {
			$average_shipping_cost_per_item = 0;
		}

		return $average_shipping_cost_per_item;
	}

}