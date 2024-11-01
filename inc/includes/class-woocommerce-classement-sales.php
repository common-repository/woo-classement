<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                             // Chiffres d'affaires / Functions Total Sells //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_total_sells_amount_today($datedepart,$datefin) {
	global $wpdb;
	$totalcost = $wpdb->get_col("SELECT SUM(pm.meta_value) FROM {$wpdb->postmeta} pm
	INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
	WHERE pm.meta_key = '_order_total' 
	AND p.post_type = 'shop_order'
	AND p.post_status IN ( '" . implode( "','", array( 'wc-completed' ) ) . "' )
	AND p.post_date BETWEEN '$datedepart 00:00:00' AND '$datefin 00:00:00'");
	return array_sum($totalcost); 
}



function woocl_total_sells_completed() {
	global $wpdb; 
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed' ) ) . "' )
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_completed_average() {
	global $wpdb; 
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed' ) ) . "' )
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_tax_completed() {
	global $wpdb;
	$meta_key = '_order_tax';
	$toataltax = $wpdb->get_var($wpdb->prepare("
	SELECT sum(meta_value) 
	FROM $wpdb->postmeta 
	WHERE meta_key = %s", $meta_key)
	);
    return number_format((float) $toataltax, 2, '.', '' );	
}

function woocl_total_shipping_tax_completed() {
	global $wpdb;
	$meta_key = '_order_shipping_tax';
	$toataltax = $wpdb->get_var($wpdb->prepare("
	SELECT sum(meta_value) 
	FROM $wpdb->postmeta 
	WHERE meta_key = %s", $meta_key
	)
	);	
	return number_format((float) $toataltax, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
}

function woocl_total_sells() {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	" ) );
	$total = $order_totals->total_sales;
	return number_format((float) $total, 2, '.', '' ) . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_progress() {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', ''); 
	
}

function woocl_total_sells_by_month($year, $month, $day) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-$month-$day 00:00:00' AND '$year-$month-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_by_month_chart($year, $month, $day) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-$month-$day 00:00:00' AND '$year-$month-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', ''); 
}

function woocl_total_sells_refunded_by_years_chart($year) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-refunded' ) ) . "' )
	AND posts.post_date BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', ''); 
}

function woocl_total_sells_cancelled_by_years_chart($year) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-cancelled' ) ) . "' )
	AND posts.post_date BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', ''); 
}

function woocl_total_sells_by_month_result_general() {
	global $wpdb;
	$year = date('Y');
	$month = date('m');
	$day = date('d');
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-$month-01 00:00:00' AND '$year-$month-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_by_last_month_result_general() {
	global $wpdb;
	$year = date('Y');
	$month = date('m', strtotime('-30 days'));
	$day = date('d');
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-$month-01 00:00:00' AND '$year-$month-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_by_day_result_general() {
	global $wpdb;
	$today = date('Y-m-d');
	$tomorrow  = date('Y-m-d', strtotime('+24 hours'));
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$today 00:00:00' AND '$tomorrow 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
}

function woocl_total_sells_yesterday_result_general() {
	global $wpdb;
	$today = date('Y-m-d');
	$yesterday = date('Y-m-d',strtotime("-1 days"));
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$yesterday 00:00:00' AND '$today 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_by_year_result_general($year) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_by_year_result_general_progress($year) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', ''); 
   
}

function woocl_total_sells_by_year($year) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_by_year_chart($year) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', ''); 
}

function woocl_total_sells_by_year_refunded($year) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-refunded' ) ) . "' )
	AND posts.post_date BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_by_year_refunded_graphique($year) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-refunded' ) ) . "' )
	AND posts.post_date BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', ''); 
}



function woocl_total_sells_statut($statut) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( $statut ) ) . "' )
	" ) );
	echo '&nbsp;';
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_statut_chart($statut) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( $statut ) ) . "' )
	" ) );
	echo '&nbsp;';
	return number_format((float) $order_totals->total_sales, 2, '.', ''); 
}

function woocl_items_sold() {
	global $wpdb;
	$result = $wpdb->get_row("
	SELECT SUM(pm.meta_value) AS total_sales
	FROM $wpdb->posts AS p
	LEFT JOIN $wpdb->postmeta AS pm ON (p.ID = pm.post_id AND pm.meta_key = 'total_sales') 
	WHERE p.post_type = 'product'
	"); 
	
	$resultat = $result->total_sales;	
	echo '<span class="numberCircle">';
	if ( $resultat != 0 ) {
	   echo $resultat;
	}
	else  {
		echo '0';
	}
	echo '</span>';
}

function woocl_items_sold_today() {
	global $wpdb;
	$date_from = date('Y-m-d');
	$date_to = date('Y-m-d');
	$result = $wpdb->get_row("
	SELECT SUM(pm.meta_value) AS total_sales
	FROM $wpdb->posts AS p
	LEFT JOIN $wpdb->postmeta AS pm ON (p.ID = pm.post_id AND pm.meta_key = 'total_sales') 
	WHERE p.post_type = 'product'
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	"); 
	
	$resultat = $result->total_sales;	
	echo '<span class="numberCircle">';
	if ( $resultat != 0 ) {
	   echo $resultat;
	}
	else  {
		echo '0';
	}
	echo '</span>';
}

function woocl_items_sold_thisweek() {
	global $wpdb;
	$date_from = date('Y-m-d', strtotime('-7 days'));
	$date_to = date('Y-m-d');
	$result = $wpdb->get_row("
	SELECT SUM(pm.meta_value) AS total_sales
	FROM $wpdb->posts AS p
	LEFT JOIN $wpdb->postmeta AS pm ON (p.ID = pm.post_id AND pm.meta_key = 'total_sales') 
	WHERE p.post_type = 'product'
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	"); 
	
	$resultat = $result->total_sales;	
	echo '<span class="numberCircle">';
	if ( $resultat != 0 ) {
	   echo $resultat;
	}
	else  {
		echo '0';
	}
	echo '</span>';
}


function woocl_items_sold_thismonth() {
	global $wpdb;
	$date_from = date('Y-m-d', strtotime('-30 days'));
	$date_to = date('Y-m-d');
	$result = $wpdb->get_row("
	SELECT SUM(pm.meta_value) AS total_sales
	FROM $wpdb->posts AS p
	LEFT JOIN $wpdb->postmeta AS pm ON (p.ID = pm.post_id AND pm.meta_key = 'total_sales') 
	WHERE p.post_type = 'product'
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	"); 
	
	$resultat = $result->total_sales;	
	echo '<span class="numberCircle">';
	if ( $resultat != 0 ) {
	   echo $resultat;
	}
	else  {
		echo '0';
	}
	echo '</span>';
}


function woocl_items_sold_average() {
	global $wpdb;
	$result = $wpdb->get_row("
	SELECT SUM(pm.meta_value) AS total_sales
	FROM $wpdb->posts AS p
	LEFT JOIN $wpdb->postmeta AS pm ON (p.ID = pm.post_id AND pm.meta_key = 'total_sales') 
	WHERE p.post_type = 'product'
	"); 
	$resultat = $result->total_sales;	
	return $resultat;
	
}

/************************ Function to calculate the average cart for the day's sales ********************/ 

function woocl_get_today_average_cart_value() {
    // Définir le début et la fin de la journée actuelle
    $start_of_day = date('Y-m-d 00:00:00');
    $end_of_day = date('Y-m-d 23:59:59');

    // Requête pour obtenir les commandes WooCommerce du jour
    $args = array(
        'limit'        => -1, // Pas de limite sur le nombre de commandes récupérées
        'status'       => array('wc-completed', 'wc-processing', 'wc-on-hold'), // Statuts des commandes à inclure
        'date_query'   => array(
            'after'     => $start_of_day,
            'before'    => $end_of_day,
            'inclusive' => true,
        ),
    );

    // Récupérer les commandes du jour
    $orders = wc_get_orders($args);

    // Initialiser les variables pour calculer les ventes totales et le nombre de commandes
    $total_sales = 0;
    $total_orders = 0;

    // Itérer sur chaque commande pour calculer le total des ventes et le nombre de commandes
    foreach ($orders as $order) {
        $total_sales += $order->get_total(); // Ajouter le total de la commande aux ventes totales
        $total_orders++; // Incrémenter le nombre de commandes
    }

    // Calculer la valeur moyenne du panier
    $average_cart_value = $total_orders > 0 ? $total_sales / $total_orders : 0;

    // Retourner la valeur moyenne du panier
    return $average_cart_value;
}

// Shortcode pour afficher la valeur moyenne du panier des ventes du jour
function woocl_display_today_average_cart_value() {
    // Obtenir la valeur moyenne du panier
    $average_cart_value = woocl_get_today_average_cart_value();
    
    // Retourner la valeur moyenne du panier formatée en prix WooCommerce
    return '' . wc_price($average_cart_value);
}
add_shortcode('woocl_today_average_cart_value', 'woocl_display_today_average_cart_value');




function woocl_get_week_average_cart_value() {
    // Définir le début et la fin de la semaine actuelle
    $start_of_week = date('Y-m-d 00:00:00', strtotime('monday this week'));
    $end_of_week = date('Y-m-d 23:59:59', strtotime('sunday this week'));

    // Requête pour obtenir les commandes WooCommerce de la semaine
    $args = array(
        'limit'        => -1, // Pas de limite sur le nombre de commandes récupérées
        'status'       => array('wc-completed', 'wc-processing', 'wc-on-hold'), // Statuts des commandes à inclure
        'date_query'   => array(
            'after'     => $start_of_week,
            'before'    => $end_of_week,
            'inclusive' => true,
        ),
    );

    // Récupérer les commandes de la semaine
    $orders = wc_get_orders($args);

    // Initialiser les variables pour calculer les ventes totales et le nombre de commandes
    $total_sales = 0;
    $total_orders = 0;

    // Itérer sur chaque commande pour calculer le total des ventes et le nombre de commandes
    foreach ($orders as $order) {
        $total_sales += $order->get_total(); // Ajouter le total de la commande aux ventes totales
        $total_orders++; // Incrémenter le nombre de commandes
    }

    // Calculer la valeur moyenne du panier
    $average_cart_value = $total_orders > 0 ? $total_sales / $total_orders : 0;

    // Retourner la valeur moyenne du panier
    return $average_cart_value;
}

// Shortcode pour afficher la valeur moyenne du panier des ventes de la semaine
function woocl_display_week_average_cart_value() {
    // Obtenir la valeur moyenne du panier
    $average_cart_value = woocl_get_week_average_cart_value();
    
    // Retourner la valeur moyenne du panier formatée en prix WooCommerce
    return '' . wc_price($average_cart_value);
}
add_shortcode('woocl_week_average_cart_value', 'woocl_display_week_average_cart_value');



function woocl_get_country_sales() { ?>
	
        <?php 
		global $wpdb;
        $result = $wpdb->get_results ("SELECT country.meta_value AS country_name,
                SUM(order_item_meta.meta_value) AS sale_total
                FROM {$wpdb->prefix}woocommerce_order_items AS order_items

                LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS order_item_meta
                    ON order_items.order_item_id = order_item_meta.order_item_id
                LEFT JOIN {$wpdb->postmeta} AS country
                    ON order_items.order_id = country.post_id
                LEFT JOIN {$wpdb->posts} AS posts
                    ON order_items.order_id = posts.ID

                WHERE posts.post_type             = 'shop_order'
                AND   country.meta_key            = '_billing_country'
                AND   order_item_meta.meta_key    = '_line_total'
                AND   order_items.order_item_type = 'line_item'
                AND   posts.post_status IN ('wc-processing','wc-on-hold','wc-completed')
                GROUP BY country.meta_value");
	
	    ?>
				
		<div class="table-responsive">
							
				<table id="datatable-getcountrysales" class="table table-striped table-bordered">
				
					<thead>
					
						<tr>
							<th><?php _e('Country', 'woo-classement'); ?></th>
							<th><?php _e('Total Sales by Country', 'woo-classement'); ?></th> 
							<th><?php _e('Total Sales all Countries', 'woo-classement'); ?></th> 
							<th><?php _e('Avg Total Sales -> Country', 'woo-classement'); ?></th> 
							
						</tr>
						
					</thead>
						
					<tbody> 
						
						<?php foreach($result as $row) : ?>
						
						<tr>
						
							<td>
								 <?php echo WC()->countries->countries[$row->country_name]; ?>
							</td> 
							
							<td>
								 <?php echo number_format((float) $row->sale_total, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); ?>
							</td>
							
							<td>
									<?php echo via_classement_woocommerce_total_sells(); ?>
							</td>
							
							<td>
								 <?php 
								 $totlasalesallcountries = via_classement_woocommerce_total_sells();
								 $totalsalescountry = number_format((float) $row->sale_total, 2, '.', ''); 
								 
								 $result = $totalsalescountry * 100 / $totlasalesallcountries;
								 //echo number_format((float) $totlasalesallcountries, 2, '.', ''); 
								 //echo '-';
								 //echo number_format((float)  $totalsalescountry, 2, '.', ''); 
								 //echo '-';
								 echo number_format((float)  $result, 2, '.', ''). '%';							 
								 ?>
							</td>
							
					   </tr>
					   
					   <?php endforeach; ?>

				</tbody>
					
	        </table>
			
      </div>					
	  
	  <?php //return $wpdb->get_results( $sql ); ?>
		
<?php }


////////////////////////////////////////////////////////////////////////////////////////////
/// Conversion rate of successful purchases 
////////////////////////////////////////////////////////////////////////////////////////////


class WooCommerceCartSuccessRate {

	// Fonction pour récupérer le nombre total de paniers créés ou existants ce mois-ci
	public function get_total_carts_created_or_existing($start_date, $end_date) {
		global $wpdb;

		$query = $wpdb->prepare("
			SELECT COUNT(DISTINCT session_key)
			FROM {$wpdb->prefix}woocommerce_sessions
			WHERE session_value LIKE %s
			AND session_expiry BETWEEN UNIX_TIMESTAMP(%s) AND UNIX_TIMESTAMP(%s)
		", '%cart%', $start_date, $end_date);

		return $wpdb->get_var($query);
	}

    // Fonction pour récupérer le nombre total de ventes ce mois-ci
    private function get_total_sales($start_date, $end_date) {
        global $wpdb;

        $query = $wpdb->prepare("
            SELECT COUNT(*)
            FROM {$wpdb->prefix}posts
            WHERE post_type = 'shop_order'
            AND post_status IN ('wc-completed', 'wc-processing', 'wc-on-hold')
            AND post_date BETWEEN %s AND %s
        ", $start_date, $end_date);

        return $wpdb->get_var($query);
    }
	
	public function get_existing_carts() {
        global $wpdb;

        $current_time = time(); // Récupère l'heure actuelle

        $query = $wpdb->prepare("
            SELECT COUNT(*)
            FROM {$wpdb->prefix}woocommerce_sessions
            WHERE session_expiry > %d
        ", $current_time);

        return $wpdb->get_var($query);
    }

    // Fonction pour calculer le taux de conversion des paniers en ventes
    public function calculate_success_rate($start_date, $end_date) {
        $total_carts_created_or_existing = $this->get_total_carts_created_or_existing($start_date, $end_date);
        $total_sales = $this->get_total_sales($start_date, $end_date);

        if ($total_carts_created_or_existing == 0) {
            return 0; // Pour éviter la division par zéro
        }

        $success_rate = ($total_sales / $total_carts_created_or_existing) * 100;

        return round($success_rate, 2); // Arrondir à 2 décimales
    }

    // Fonction pour afficher la batterie avec le taux de succès
    public function display_success_rate_battery($start_date, $end_date) {
        $success_rate = $this->calculate_success_rate($start_date, $end_date);
        $total_carts_created_or_existing = $this->get_total_carts_created_or_existing($start_date, $end_date);
        $total_sales = $this->get_total_sales($start_date, $end_date);

        // Déterminer la couleur en fonction du pourcentage de succès
        $color_class = '';
        if ($success_rate <= 30) {
            $color_class = 'data-success-rate="30"';
        } elseif ($success_rate <= 50) {
            $color_class = 'data-success-rate="50"';
        } else {
            $color_class = 'data-success-rate="70"';
        }
		echo '
		<style>
			.woocl_battery-container {
				display: flex;
				justify-content: center; /* Centre horizontalement */
				align-items: center; /* Centre verticalement */
				position: relative; /* Ajout pour position absolue */
			}

			.woocl_battery {
				width: 200px;
				height: 100px;
				border: 5px solid #333;
				border-radius: 10px;
				position: relative;
				overflow: hidden;
				background-color: #fff;
			}

			.woocl_battery-level {
				height: 100%;
				width: 0; /* Démarre vide */
				animation: woocl_fillBattery 3s forwards; /* Animation de remplissage */
			}

			.woocl_battery-head {
				width: 20px;
				height: 40px;
				background-color: #333;
				margin-left: -5px;
				border-radius: 5px 5px 0 0;
			}

			@keyframes woocl_fillBattery {
				to {
					width: '.$success_rate.'%; /* Le pourcentage à atteindre */
				}
			}

			.woocl_battery-level[data-success-rate="30"] {
				background-color: #ff4c4c; /* Rouge pour 30% */
			}

			.woocl_battery-level[data-success-rate="50"] {
				background-color: #ffeb3b; /* Jaune pour 50% */
			}

			.woocl_battery-level[data-success-rate="70"] {
				background-color: #4caf50; /* Vert pour 70% */
			}

			/* Styles pour le rectangle de pourcentage */
			.percentage-rectangle {
				position: absolute;
				top: 5px; /* Position sous la batterie */
				width: 40px;
				height: 20px;
				background-color: #333;
				color: #fff;
				font-size: 12px;
				display: flex;
				justify-content: center;
				align-items: center;
				border-radius: 0px;
				padding:3px 5px
			}
		</style>
		<div class="woocl_battery-container">
			<div class="woocl_battery">
				<div class="woocl_battery-level" '.$color_class.'></div>
			</div>
			<div class="woocl_battery-head"></div>
			<div class="percentage-rectangle">'.$success_rate.'%</div> <!-- Rectangle pour afficher le pourcentage -->
		</div>
		<div style="display: flex; justify-content: center; align-items: center;margin-top:10px">
			<div style="text-align: center;">
				<p>'.__('Total of carts created or existing this month', 'woo-classement').' : '.$total_carts_created_or_existing.'</p>
				<p style="margin:0">'.__('Total of successful sales this month', 'woo-classement').' : '.$total_sales.'</p>
			</div>
		</div>';

    }
}
