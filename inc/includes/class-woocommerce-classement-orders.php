<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                             // Functions Orders //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////// Get order statut ///////////////////////
///////////////////////////////////////////////////////////////

function woocl_get_order_statuses($product_id) {
	global $wpdb;

    $table_posts = $wpdb->prefix . "posts";
    $table_items = $wpdb->prefix . "woocommerce_order_items";
    $table_itemmeta = $wpdb->prefix . "woocommerce_order_itemmeta";

    // Define HERE the orders status to include in  <==  <==  <==  <==  <==  <==  <==
    $orders_statuses = "'wc-completed', 'wc-processing', 'wc-on-hold'";

    # Requesting All defined statuses Orders IDs for a defined product ID
    $orders_ids =  $wpdb->get_results( $wpdb->prepare ("
        SELECT DISTINCT $table_items.order_id
        FROM $table_itemmeta, $table_items, $table_posts
        WHERE  $table_items.order_item_id = $table_itemmeta.order_item_id
        AND $table_items.order_id = $table_posts.ID
        AND $table_posts.post_status IN ( $orders_statuses )
        AND $table_itemmeta.meta_key LIKE '_product_id'
        AND $table_itemmeta.meta_value LIKE '$product_id'
        ORDER BY $table_items.order_item_id DESC", ARRAY_A
    ));
	foreach ($orders_ids as $singlepost) { 
		 echo '<p>' . $singlepost->order_id . '</p>';
	}
}


////////////////////// General orders width variable statut ///////////////////////
///////////////////////////////////////////////////////////////////////////////////

function woocl_total_orders_statut($statut) {
	$args = ( array(
		'status' => $statut,
	));
	$statuses    = array_map( 'trim', explode( ',', $args['status'] ) );
	$order_count = 0;
	foreach ( $statuses as $status ) {
		// if we didn't get a wc- prefix, add one
		if ( 0 !== strpos( $status, 'wc-completed' ) ) {
			$status = str_replace( $status, $statut, $status, $status );
		}
		$total_orders = wp_count_posts( 'shop_order' )->$status;
		$order_count += $total_orders;
	}
	ob_start();
	echo number_format( $order_count );
	return ob_get_clean();
}

function woocl_total_orders_completed() {
	$args = ( array(
		'status' => 'wc-completed',
	));
	$statuses    = array_map( 'trim', explode( ',', $args['status'] ) );
	$order_count = 0;
	foreach ( $statuses as $status ) {
		// if we didn't get a wc- prefix, add one
		if ( 0 !== strpos( $status, 'wc-completed' ) ) {
			$status = str_replace( $status, 'wc-completed' . $status, $status );
		}
		$total_orders = wp_count_posts( 'shop_order' )->$status;
		$order_count += $total_orders;
	}
	ob_start();
	echo '<span class="numberCircle">';
	echo number_format( $order_count );
	echo '</span>';
	return ob_get_clean();
}

function woocl_total_orders_paiement() {
	$args = ( array(
		'status' => 'wc-pending',
	));
	$statuses    = array_map( 'trim', explode( ',', $args['status'] ) );
	$order_count = 0;
	foreach ( $statuses as $status ) {
		// if we didn't get a wc- prefix, add one
		if ( 0 !== strpos( $status, 'wc-pending' ) ) {
			$status = str_replace( $status, 'wc-pending' . $status, $status );
		}
		$total_orders = wp_count_posts( 'shop_order' )->$status;
		$order_count += $total_orders;
	}
	ob_start();
	echo '<span class="numberCircle">';
	echo number_format( $order_count );
	echo '</span>';
	return ob_get_clean();
}

function woocl_total_orders_attente() {
	$args = ( array(
		'status' => 'wc-processing',
	));
	$statuses    = array_map( 'trim', explode( ',', $args['status'] ) );
	$order_count = 0;
	foreach ( $statuses as $status ) {
		// if we didn't get a wc- prefix, add one
		if ( 0 !== strpos( $status, 'wc-processing' ) ) {
			$status = str_replace( $status, 'wc-processing' . $status, $status );
		}
		$total_orders = wp_count_posts( 'shop_order' )->$status;
		$order_count += $total_orders;
	}
	ob_start();
	echo '<span class="numberCircle">';
	echo number_format( $order_count );
	echo '</span>';
	return ob_get_clean();
}

function woocl_total_orders_all() {
	$args = ( array(
		'status' => 'wc-completed',
	));
	$statuses    = array_map( 'trim', explode( ',', $args['status'] ) );
	$order_count = 0;
	foreach ( $statuses as $status ) {
		// if we didn't get a wc- prefix, add one
		if ( 0 !== strpos( $status, 'wc-completed' ) ) {
			$status = str_replace( $status, 'wc-completed' . $status, $status );
		}
		$total_orders = wp_count_posts( 'shop_order' )->$status;
		$order_count += $total_orders;
	}
	ob_start();
	echo '<span class="numberCircle">';
	echo number_format( $order_count );
	echo '</span>';
	return ob_get_clean();
}

function woocl_total_orders_all_average() {
	$args = ( array(
		'status' => 'wc-completed',
	));
	$statuses    = array_map( 'trim', explode( ',', $args['status'] ) );
	$order_count = 0;
	foreach ( $statuses as $status ) {
		// if we didn't get a wc- prefix, add one
		if ( 0 !== strpos( $status, 'wc-completed' ) ) {
			$status = str_replace( $status, 'wc-completed' . $status, $status );
		}
		$total_orders = wp_count_posts( 'shop_order' )->$status;
		$order_count += $total_orders;
	}
	ob_start();
	echo number_format( $order_count );
	return ob_get_clean();
}

function woocl_total_orders_all_year($year) { ?>
	<?php
	$semaine = new WP_Query( 
	array ( 
		'post_type'   => array( 'shop_order' ),
		'post_status' => array( 'wc-completed' ),
		'posts_per_page'  => -1,			
		'orderby' => 'date', 
		'order' => 'DESC', 
			'date_query' => array( 
			array( 'year' => date( $year )  
			),	
	)	
	));
	ob_start();
	$num = $semaine->post_count; 
	echo'<span class="numberCircle">';
	echo $num;
	echo'</span>'; 
	return ob_get_clean();
}

function woocl_total_orders_all_week_general($weekend) { ?>
	<?php
	$weeks = new WP_Query( array( 
    'post_type'   => array( 'shop_order' ),
    'post_status' => array( 'wc-completed' ),
	'posts_per_page'  => -1,			
	'orderby' => 'date', 
	'order' => 'DESC', 
		'date_query' => array( 
		array( 'week' => date( $weekend )  
		),	
	)	
	));
	ob_start();
	$num = $weeks->post_count; 
	echo'<span class="numberCircle">'; 
	echo $num;
	echo'</span>'; 
	return ob_get_clean();
}


function woocl_total_orders_all_graphique($year) { ?>
	<?php
	$semaine = new WP_Query( array( 
	'post_type' => 'shop_order', 
	'post_status' => 'wc-completed',
	'posts_per_page'  => -1,			
	'orderby' => 'date', 
	'order' => 'DESC', 
	   'date_query' => array( 
		array( 'year' => date( $year )  
	))	
	));
	$num = $semaine->post_count; 
	return $num;
}

function woocl_total_orders_cours() {
	$args = ( array(
		'status' => 'wc-on-hold',
	));
	$statuses    = array_map( 'trim', explode( ',', $args['status'] ) );
	$order_count = 0;
	foreach ( $statuses as $status ) {
		// if we didn't get a wc- prefix, add one
		if ( 0 !== strpos( $status, 'wc-on-hold' ) ) {
			$status = str_replace( $status, 'wc-on-hold' . $status, $status );
		}
		$total_orders = wp_count_posts( 'shop_order' )->$status;
		$order_count += $total_orders;
	}
	ob_start();
	echo '<span class="numberCircle">';
	echo number_format( $order_count );
	echo '</span>';
	return ob_get_clean();
}

function woocl_total_orders_cancelled() {
	$args = ( array(
		'status' => 'wc-cancelled',
	));
	$statuses    = array_map( 'trim', explode( ',', $args['status'] ) );
	$order_count = 0;
	foreach ( $statuses as $status ) {
		// if we didn't get a wc- prefix, add one
		if ( 0 !== strpos( $status, 'wc-cancelled' ) ) {
			$status = str_replace( $status, 'wc-cancelled' . $status, $status );
		}
		$total_orders = wp_count_posts( 'shop_order' )->$status;
		$order_count += $total_orders;
	}
	ob_start();
	echo '<span class="numberCircle">';
	echo number_format( $order_count );
	echo '</span>';
	return ob_get_clean();
}

function woocl_total_orders_refunded() {
	$args = ( array(
		'status' => 'wc-refunded',
	));
	$statuses    = array_map( 'trim', explode( ',', $args['status'] ) );
	$order_count = 0;
	foreach ( $statuses as $status ) {
		// if we didn't get a wc- prefix, add one
		if ( 0 !== strpos( $status, 'wc-refunded' ) ) {
			$status = str_replace( $status, 'wc-refunded' . $status, $status );
		}
		$total_orders = wp_count_posts( 'shop_order' )->$status;
		$order_count += $total_orders;
	}
	ob_start();
	echo '<span class="numberCircle">';
	echo number_format( $order_count );
	echo '</span>';
	return ob_get_clean();
}


function woocl_total_orders_failed() {
	$args = ( array(
		'status' => 'wc-failed',
	));
	$statuses    = array_map( 'trim', explode( ',', $args['status'] ) );
	$order_count = 0;
	foreach ( $statuses as $status ) {
		// if we didn't get a wc- prefix, add one
		if ( 0 !== strpos( $status, 'wc-failed' ) ) {
			$status = str_replace( $status, 'wc-failed' . $status, $status );
		}
		$total_orders = wp_count_posts( 'shop_order' )->$status;
		$order_count += $total_orders;
	}
	ob_start();
	echo '<span class="numberCircle">';
	echo number_format( $order_count );
	echo '</span>';
	return ob_get_clean();
}

function woocl_total_orders_month() { 
	global $wpdb;
	$date_from = date('Y-m-01');
	$date_to = date('Y-m-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from} 00:00:00' AND '{$date_to} 23:59:59'
	" );
	
	echo'<span class="numberCircle">';
	echo $wpdb->num_rows;
	echo'</span>'; 
}

function woocl_total_orders_month_graphique_zeroun() { 
	global $wpdb;
	$date_from = date('Y-01-01');
	$date_to = date('Y-01-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_month_graphique_zerodeux() { 
	global $wpdb;
	$date_from = date('Y-02-01');
	$date_to = date('Y-02-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_month_graphique_zerotrois() { 
	global $wpdb;
	$date_from = date('Y-03-01');
	$date_to = date('Y-03-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_month_graphique_zeroquatre() { 
	global $wpdb;
	$date_from = date('Y-04-01');
	$date_to = date('Y-04-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_month_graphique_zerocinq() { 
	global $wpdb;
	$date_from = date('Y-05-01');
	$date_to = date('Y-05-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_month_graphique_zerosix() { 
	global $wpdb;
	$date_from = date('Y-06-01');
	$date_to = date('Y-06-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_month_graphique_zerosept() { 
	global $wpdb;
	$date_from = date('Y-07-01');
	$date_to = date('Y-07-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_month_graphique_zerohuit() { 
	global $wpdb;
	$date_from = date('Y-08-01');
	$date_to = date('Y-08-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_month_graphique_zeroneuf() { 
	global $wpdb;
	$date_from = date('Y-09-01');
	$date_to = date('Y-09-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_month_graphique_zerounzero() { 
	global $wpdb;
	$date_from = date('Y-10-01');
	$date_to = date('Y-10-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_month_graphique_zerounun() { 
	global $wpdb;
	$date_from = date('Y-11-01');
	$date_to = date('Y-11-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_month_graphique_zeroundeux() { 
	global $wpdb;
	$date_from = date('Y-12-01');
	$date_to = date('Y-12-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_year() { 
	global $wpdb;
	$date_from = date('Y-01-01');
	$date_to = date('Y-12-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	
	echo'<span class="numberCircle">';
	echo $wpdb->num_rows;
	echo'</span>'; 
}

/*function woocl_total_orders_year_count_sales_by_years($year) { 
	global $wpdb;
	$date_from = date('$year-01-01');
	$date_to = date('$year-12-31');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}*/

function woocl_total_orders_year_total_completed($year) { 
	global $wpdb;
	$date_from = date(''.$year.'-01-01');
	$date_to = date(''.$year.'-12-31');
	$post_status = implode("','", array('wc-completed') );
	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	return $wpdb->num_rows;
}

function woocl_total_orders_semaine() { 
	global $wpdb;
	
	$date_from = date('Y-m-d', strtotime('-7 days'));
	$date_to = date("Y-m-d");
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	
	echo'<span class="numberCircle">';
	echo $wpdb->num_rows;
	echo'</span>'; 
}


function woocl_total_orders_jour() {
    global $wpdb;
	
	$date_from = date('Y-m-d');
	$date_to = date('Y-m-d');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	
	echo'<span class="numberCircle">';
	echo $wpdb->num_rows;
	echo'</span>'; 
	
}

function woocl_total_orders_jour_growth() {
    global $wpdb;
	
	$date_from = date('Y-m-d');
	$date_to = date('Y-m-d');
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	
	return $wpdb->num_rows;
}

function woocl_total_orders_yesterday() {
    global $wpdb;
	
	$date_from = date('Y-m-d', strtotime('-1 days'));
	$date_to = date('Y-m-d', strtotime('-1 days'));
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$results = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	" );
	
	return $wpdb->num_rows;
	
}



////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// List Orders by the current month //////////////////////////////

function woocl_total_orders_by_date_month() {

    global $wpdb;

	$date_from = date('Y-m-d', strtotime('-30 days'));
	$date_to = date("Y-m-d");
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$result = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	ORDER BY post_date DESC
	" );

	echo '<div class="table-responsive">';
	
				echo'<table style="width:100%">';
				
				echo'<tr>';
				echo'<th>'; _e('Customer ID', 'woo-classement'); '</th>';
				echo'<th>'; _e('Customer', 'woo-classement'); '</th>';
				echo'<th>'; _e('Order ID', 'woo-classement'); '</th>';
				echo'<th>'; _e('Order Date', 'woo-classement'); '</th>';
				echo'<th>'; _e('Order Statut', 'woo-classement');'</th>';
				echo'<th>'; _e('Shipping Cost', 'woo-classement');'</th>';
				echo'<th>'; _e('Total Tax', 'woo-classement');'</th>';
				echo'<th>'; _e('Total', 'woo-classement');'</th>';
				echo'</tr>';
		
		
		        foreach($result as $value) {

						// Getting WC order object
						$order = wc_get_order( $value->ID );

						echo'<tr>';
							echo '<td>' . $order->customer_id . '</td>';	
                            echo '<td>' . $order->billing_first_name . '&nbsp;' . $order->billing_last_name . '</td>';								
							echo '<td>' . '<a href="'. esc_url( home_url('/' ) ) . 'wp-admin/post.php?post='. $order->id .'&action=edit" target="_blank">' . $order->id . '</a>' .'</td>';
							echo '<td>' . $order->order_date .'</td>';
							echo '<td>' . ucfirst($order->get_status()) .'</td>';
							echo '<td>' . number_format((float) $order->shipping_total, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol() .'</td>';
							echo '<td>' . number_format((float) $order->total_tax, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol() .'</td>';
							echo '<td>' . $order->get_total() . '&nbsp;' . get_woocommerce_currency_symbol() .'</td>';
						echo'</tr>'; 
				}
				
                echo'</table>';
				
	echo'</div>';
	
	echo'<div class="via-woocommerce-classement-clear"></div>';

}

////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// List Orders by the current month //////////////////////////////

function woocl_total_orders_all_time() {

    global $wpdb;
	
	$result = wp_cache_get( 'orders_result_general' );
	if ( false === $result ) {
		$post_status = implode("','", array('wc-processing', 'wc-completed') );

		$result = $wpdb->get_results( "
		SELECT * FROM $wpdb->posts
		WHERE post_type = 'shop_order'
		AND post_status IN ('{$post_status}')
		ORDER BY post_date DESC
		");
		
		wp_cache_set( 'orders_result_general', $result );
	} 
	$i=1;

	echo '<div class="table-responsive">';
			
			echo'<table id="datatable-buttons" class="table table-striped table-bordered">';
				
               echo'<thead>';
					echo'<tr>';
						echo'<th>'; _e('Classement', 'woo-classement'); '</th>';
						echo'<th>'; _e('Customer', 'woo-classement'); '</th>';
						echo'<th>'; _e('Order ID', 'woo-classement'); '</th>';
						echo'<th>'; _e('Order Date', 'woo-classement'); '</th>';
						echo'<th>'; _e('Order Statut', 'woo-classement');'</th>';
						echo'<th>'; _e('Shipping Cost', 'woo-classement');'</th>';
						echo'<th>'; _e('Total Tax', 'woo-classement');'</th>';
						echo'<th>'; _e('Total', 'woo-classement');'</th>';
						echo'<th>'; _e('Shipping Method', 'woo-classement');'</th>';
					echo'</tr>';
		        echo'</thead>';
		        
				echo'<tbody>';
		        foreach($result as $value) {

						// Getting WC order object
						$order = wc_get_order( $value->ID );
						$date_completed = $order->get_date_completed();

						echo'<tr>';
						    echo '<td>' . $i .'</td>';
                            echo '<td>' . $order->get_billing_first_name() . '&nbsp;' . $order->get_billing_last_name() . '</td>';								
							echo '<td>' . '<a href="'. esc_url( home_url('/' ) ) . 'wp-admin/post.php?post='. $order->get_id() .'&action=edit" target="_blank">' . $order->get_id() . '</a>' . '</td>';
							//echo '<td>' . date( 'Y-m-d', strtotime( $order->get_date_completed() ) ) .'</td>';

							if ($date_completed) {
							echo '<td>' . date( 'Y-m-d', strtotime( $date_completed ) ) . '</td>';
							} else {
							echo '<td>N/A</td>'; // Or any other placeholder you want to show when the date is not available
							}

							echo '<td><span class="label label-warning">' . ucfirst($order->get_status()) .'</span></td>';
							echo '<td>' . number_format((float) $order->get_shipping_total(), 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol() .'</td>';
							echo '<td>' . number_format((float) $order->get_total_tax(), 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol() .'</td>';
							echo '<td>' . $order->get_total() . '&nbsp;' . get_woocommerce_currency_symbol() .'</td>';
							echo '<td>' . woocl_get_shipping_method_title($order->get_id()) .'</td>';
						echo'</tr>'; 
				$i++;
				}
				echo'</tbody>';
            
			echo'</table>';
	
	echo'</div>';

}


////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// List Orders by the current month //////////////////////////////

function woocl_total_orders_by_date_week() {

    global $wpdb;

	$date_from = date('Y-m-d', strtotime('-7 days'));
	$date_to = date("Y-m-d");
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$result = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	AND post_date BETWEEN '{$date_from}  00:00:00' AND '{$date_to} 23:59:59'
	ORDER BY post_date DESC
	" );

	echo '<div class="cutomers-by-sales">';
			echo '<div  style="overflow:auto">';
				echo'<table style="width:100%">';
				
				echo'<tr>';
				echo'<th>'; _e('Customer ID', 'woo-classement'); '</th>';
				echo'<th>'; _e('Customer', 'woo-classement'); '</th>';
				echo'<th>'; _e('Order ID', 'woo-classement'); '</th>';
				echo'<th>'; _e('Order Date', 'woo-classement'); '</th>';
				echo'<th>'; _e('Order Statut', 'woo-classement');'</th>';
				echo'<th>'; _e('Shipping Cost', 'woo-classement');'</th>';
				echo'<th>'; _e('Total Tax', 'woo-classement');'</th>';
				echo'<th>'; _e('Total', 'woo-classement');'</th>';
				echo'</tr>';
		
		
		        foreach($result as $value) {

						// Getting WC order object
						$order = wc_get_order( $value->ID );

						echo'<tr>';
							echo '<td>' . $order->customer_id .'</td>';
							echo '<td>' . $order->billing_first_name . '&nbsp;' . $order->billing_last_name . '</td>';
							echo '<td>' . '<a href="'. esc_url( home_url('/' ) ) . 'wp-admin/post.php?post='. $order->id .'&action=edit" target="_blank">' . $order->id . '</a>' .'</td>';
							echo '<td>' . $order->order_date .'</td>';
							echo '<td>' . ucfirst($order->get_status()) .'</td>';
							echo '<td>' . number_format((float) $order->shipping_total, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol() .'</td>';
							echo '<td>' . number_format((float) $order->total_tax, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol() .'</td>';
							echo '<td>' . $order->get_total() . '&nbsp;' . get_woocommerce_currency_symbol() .'</td>';
						echo'</tr>'; 
				}
				
                echo'</table>';
		    echo'</div>';
		echo'</div>';
		echo'<div class="via-woocommerce-classement-clear"></div>';
}

////////////////////////////////// En travail //////////////////////////////////////////
function woocl_order_weight() {
	global $post, $woocommerce, $the_order;
	if ( empty( $the_order ) || $the_order->id != $post->ID )
		$the_order = new WC_Order( $post->ID );
	if ( $column == 'total_weight' ) {
		$weight = 0;
		if ( sizeof( $the_order->get_items() ) > 0 ) {
			foreach( $the_order->get_items() as $item ) {
				if ( $item['product_id'] > 0 ) {
					$_product = $the_order->get_product_from_item( $item );
					if ( ! $_product->is_virtual() ) {
						$weight += $_product->get_weight() * $item['qty'];
					}
				}
			}
		}
		if ( $weight > 0 )
			print $weight . ' ' . esc_attr( get_option('woocommerce_weight_unit' ) );
		else print 'N/A';
	}
}

////////////////////////////////////////// En travail ////////////////////////////////////////////
function woocl_total_orders_by_country() { ?>
  <?php
  
  $args = array(
        'limit' => -1,
        'status' => array($status),
        'type' => array( 'shop_order' ),
		
		'meta_query' => array(
        'relation' => 'AND',
			array(
				'key' => 'shipping_country',
				'value' => 'CA',
			),
        ),
  );

  $orders = wc_get_orders( $args );

  ob_start(); 
  
  ?>

   <?php if( $orders ){ ?>

    <div class="cutomers-by-sales">
		
	<div style="overflow:auto; height:300px">
	
		<table>
		
			<thead>
			
				<tr>
                    <th><?php _e('Order ID', 'woo-classement'); ?></th>
					<th><?php _e('Date', 'woo-classement'); ?></th>
					<th><?php _e('Country', 'woo-classement'); ?></th>
				</tr>
				
			</thead>
			
			<tbody>     

            <?php foreach( $orders as $order ){ ?>

			<tr>
				
	            <td>
						<a href="<?php echo esc_url( home_url('/' ) ); ?>wp-admin/post.php?post=<?php echo $order->id; ?>&action=edit" target="_blank">
						<?php echo $order->id; ?></a>
				</td>
				
				<td>
				
					<?php if ($order->order_date) : ?><?php echo $order->order_date; ?><?php endif; ?> 
					
				</td> 
				
				<td>
				
					<?php if ($order->get_shipping_country()) : ?><?php echo $order->get_shipping_country(); ?><?php endif; ?> 
					
				</td> 
				
			</tr> 
	  
	  <?php } ?>
	  
	  </tbody>
					
	  </table>

	</div>

</div>

<div class="via-woocommerce-classement-clear"></div>
   
  <?php }

}


//////////////////////////////////  Get the date of the first date of orders woocommerce ///////////////////////////////////


function woocl_first_post_date_order($format = "Y-m-d") {
	 global $wpdb;
	 // Setup get_posts arguments
	 $ax_args = array(
	 'numberposts' => '1',
	 'post_type' => 'shop_order',
	 'post_status' => 'wc-completed',
	 'order' => 'ASC'
	 );

	 // Get all posts in order of first to last
	 $ax_get_all = get_posts($ax_args);

	 // Extract first post from array
	 $ax_first_post = $ax_get_all[0];

	 // Assign first post date to var
	 $ax_first_post_date = $ax_first_post->post_date;

	 // return date in required format
	 $output = date($format, strtotime($ax_first_post_date));

	 return $output;
}

function woocl_last_post_date_order($format = "Y-m-d") {
	 global $wpdb;
	 // Setup get_posts arguments
	 $ax_args = array(
	 'numberposts' => '1',
	 'post_type' => 'shop_order',
	 'post_status' => 'wc-completed',
	 'order' => 'DESC'
	 );

	 // Get all posts in order of first to last
	 $ax_get_all = get_posts($ax_args);

	 // Extract first post from array
	 $ax_first_post = $ax_get_all[0];

	 // Assign first post date to var
	 $ax_first_post_date = $ax_first_post->post_date;

	 // return date in required format
	 $output = date($format, strtotime($ax_first_post_date));

	 return $output;
}

function woocl_count_days_post_date_order() { 
	global $wpdb;
	$datefirst = woocl_first_post_date_order();
	$datelast = woocl_last_post_date_order();
	
	$date1=date_create($datefirst);
	$date2=date_create($datelast);
	$diff=date_diff($date1,$date2);
	return $diff->format("%a%");
}

function woocl_count_orders_stats($thefirstdate,$thelastdate) { 
	$args = array(
		'paginate'            => true,
		'date_created'        => ''. $thefirstdate . '...'. $thelastdate . '',
	);
	$results = wc_get_orders( $args );
	return $results->total;
}

function woocl_count_orders_stats_all() { 
	$firstalldays = date('2015-m-01');
	$today = date('Y-m-d');
	$args = array(
		'paginate'            => true,
		'date_created'        => ''. $firstalldays . '...'. $today . '',
	);
	$results = wc_get_orders( $args );
	return $results->total;
}


/*function woocl_count_orders_tax_stats($taxe) { 
	$args = array(
		'paginate'            => true,
		'date_created'        => ''. $thefirstdate . '...'. $thelastdate . '',
	);
	$results = wc_get_orders( $args );
	return $results->total;
}*/


//////////////////////////////////  Table to display the count of orders per day ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_count_orders_stats_by_days_table() { 
global $wpdb;
$tablename = $wpdb->prefix . 'posts';	
$results = $wpdb->get_results("SELECT DATE(post_date) AS date, COUNT(ID) AS count FROM $tablename WHERE post_type = 'shop_order' GROUP BY DATE(post_date) ORDER BY DATE(post_date) DESC LIMIT 15");
	
	echo '<table class="table table-dark">';
	echo '<thead>';
	echo '<tr>';
    echo '<th scope="col">Date</th>';
	echo '<th scope="col">Order count</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
		foreach ($results as $row) {
		   echo '<tr>';
		   echo '<th scope="row">' . $row->date . '</th>';
		   echo '<th scope="row">' . $row->count . '</th>';
		   echo '</tr>';
		}
	echo '</tbody>';
	echo '</table>';
}

//////////////////////////////////  PHP Class Statistics Orders ////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class WooclStatisticsOrders {
    public function getHighestSalesOrder() {
        // Récupérer toutes les commandes triées par montant total décroissant
        $args = array(
            'post_type' => 'shop_order',
            'posts_per_page' => -1,
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'meta_key' => '_order_total', // Clé méta contenant le montant total de la commande
        );

        $orders = wc_get_orders($args);

        if (!empty($orders)) {
            $highest_sales_order = current($orders); // Obtenir la première commande (la plus élevée)
            $highest_sales_order_id = $highest_sales_order->get_id();
            $highest_sales_order_amount = $highest_sales_order->get_total();
            $highest_sales_order_link = get_edit_post_link($highest_sales_order_id);
            $currency_symbol = get_woocommerce_currency_symbol();
			
            $result = array(
                'ID' => $highest_sales_order_id,
                'Amount' => $highest_sales_order_amount,
                'Link' => $highest_sales_order_link,
				'CurrencySymbol' => $currency_symbol,
            );

            return $result;
        } else {
            return "Aucune commande trouvée.";
        }
    }

    public function getLowestNonZeroTotalOrder() {
        // Récupérer toutes les commandes triées par montant total croissant
        $args = array(
            'post_type' => 'shop_order',
            'posts_per_page' => -1,
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_key' => '_order_total', // Clé méta contenant le montant total de la commande
            'meta_query' => array(
                array(
                    'key' => '_order_total',
                    'value' => 0,
                    'compare' => '>',
                    'type' => 'NUMERIC',
                ),
            ),
        );

        $orders = wc_get_orders($args);

        if (!empty($orders)) {
            $lowest_non_zero_total_order = current($orders); // Obtenir la première commande (la plus basse)
            $lowest_non_zero_total_order_id = $lowest_non_zero_total_order->get_id();
            $lowest_non_zero_total_order_amount = $lowest_non_zero_total_order->get_total();
            $currency_symbol = get_woocommerce_currency_symbol();
            $lowest_non_zero_total_order_link = get_edit_post_link($lowest_non_zero_total_order_id);
            
            $result = array(
                'ID' => $lowest_non_zero_total_order_id,
                'Amount' => $lowest_non_zero_total_order_amount,
                'CurrencySymbol' => $currency_symbol,
                'Link' => $lowest_non_zero_total_order_link,
            );

            return $result;
        } else {
            return "Aucune commande trouvée avec un total différent de zéro.";
        }
    }

}

//////////////////////////////////  Average frequency of online orders /////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class WooCL_OrderFrequency {
    public function __construct() {
        add_shortcode('woocl_order_frequency', array($this, 'display_order_frequency'));
    }

    public function get_order_frequency() {
        $args = array(
            'limit'    => -1,
            'status'   => array('wc-completed', 'wc-processing', 'wc-on-hold'),
            'orderby'  => 'date',
            'order'    => 'ASC',
        );

        $orders = wc_get_orders($args);

        if (empty($orders) || count($orders) < 2) {
            return 0; // Not enough data to calculate frequency
        }

        $time_diffs = array();

        $previous_order_date = null;
        foreach ($orders as $order) {
            $order_date = strtotime($order->get_date_created());

            if ($previous_order_date !== null) {
                $time_diff = $order_date - $previous_order_date;
                $time_diffs[] = $time_diff;
            }

            $previous_order_date = $order_date;
        }

        if (empty($time_diffs)) {
            return 0; // No intervals to calculate
        }

        $average_time_diff = array_sum($time_diffs) / count($time_diffs);

        // Convert the average time difference to days and hours
        $average_time_diff_days = floor($average_time_diff / (60 * 60 * 24));
        $average_time_diff_hours = floor(($average_time_diff % (60 * 60 * 24)) / (60 * 60));
        $average_time_diff_minutes = floor(($average_time_diff % (60 * 60)) / 60);

        return array(
            'days' => $average_time_diff_days,
            'hours' => $average_time_diff_hours,
            'minutes' => $average_time_diff_minutes,
        );
    }

    public function display_order_frequency() {
        $average_order_frequency = $this->get_order_frequency();

        if ($average_order_frequency === 0) {
            return 'Not enough data to calculate order frequency.';
        }

        $days = $average_order_frequency['days'];
        $hours = $average_order_frequency['hours'];
        $minutes = $average_order_frequency['minutes'];

        return "$days days, $hours hours and $minutes minutes.";
    }
}

// Initialize the class
new WooCL_OrderFrequency();
