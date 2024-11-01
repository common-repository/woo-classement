<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                             // Functions Vendors //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_total_vendors_registred() {
	global $wpdb;
	$user_query = new WP_User_Query( array( 
	'role' => 'vendor',	
	) );
	$users_count = (int) $user_query->get_total();
	// Echo a string and the value
	echo '' . $users_count;
}

 
function woocl_total_vendors_pending() {
	global $wpdb;
	$user_query = new WP_User_Query( array( 'role' => 'pending_vendor' ) );
	$users_count = (int) $user_query->get_total();
	// Echo a string and the value
	echo '' . $users_count;
}

function woocl_total_vendor_registred_year() {
	global $wpdb;
	$year = date('Y');
	// Get all users with role Author.
	$user_query = new WP_User_Query( array( 
	'role' => 'Vendor',
		'date_query' => array( 
		array( 'year' => date( $year )  
	))	
	) );
	// Get the total number of users for the current query. I use (int) only for sanitize.
	$users_count = (int) $user_query->get_total();
	// Echo a string and the value
	return $users_count;
	
	//global $wpdb;
	//$year = date('Y');
	//$usersyears = $wpdb->prefix.'users';
	//$useresult = $wpdb->get_results('
	//SELECT count(*) as sum
	//FROM `' . $usersyears .'`
	//WHERE `user_registered`
	//LIKE "%' . $year . mysqli_real_escape_string() . '%" 
	//'); 
	
	// Echo a string and the value
	//echo '<span class="numberCircle">';
	//echo $useresult[0]->sum;
    //echo '</span>';	
}

function woocl_total_vendor_registred_graphique($year) {
	
	global $wpdb;
	// Get all users with role Author.
	$user_query = new WP_User_Query( array( 
	'role' => 'Vendor',
		'date_query' => array( 
		array( 'year' => date( $year )  
	))	
	) );
	// Get the total number of users for the current query. I use (int) only for sanitize.
	$users_count = (int) $user_query->get_total();
	// Echo a string and the value
	return $users_count;	
}

function woocl_total_vendor_registred_month() {
	global $wpdb;
	$month = date('m');
	// Get all users with role Author.
	$user_query = new WP_User_Query( array( 
	'role' => 'Vendor',
		'date_query' => array( 
		array( 'month' => date( $month )  
	))	
	) );
	// Get the total number of users for the current query. I use (int) only for sanitize.
	$users_count = (int) $user_query->get_total();
	// Echo a string and the value
	return $users_count;
	
	//global $wpdb;
	//$month = date('Y');
	//$usersyears = $wpdb->prefix.'users';
	//$userrole = $wpdb->prefix.'usermeta';
	
	//$useresult = $wpdb->get_results
	//("
		//SELECT * FROM '" . $usersyears . "' 
		//INNER JOIN '" . $userrole . "' 
		//ON (wp_users.ID = wp_usermeta.user_id) 
		//WHERE 1=1 
		//AND wp_users.user_registered > '2016-11-01 00:00:00' 
		//AND wp_users.user_registered < '2016-11-30 00:00:00'
		//AND ( (wp_usermeta.meta_key = 'wp_capabilities' 
		//AND CAST(wp_usermeta.meta_value AS CHAR) 
		//LIKE '%\"customer\"%') ) 
		//ORDER BY user_registered ASC ;
	    //) ) 
	//"); 
	
	//SELECT count(*)
	//FROM `' . $usersyears .'`
	//WHERE `user_registered`
	//LIKE "%' . $month . mysqli_real_escape_string() . '%"

    //JOIN `' . $userrole . '`
	//WHERE meta_key = `prefix_capabilities` 
	//AND meta_value LIKE `%vendor%`	 
	
	//'); 
	
	// Echo a string and the value
	//echo '<span class="numberCircle">';
	//echo $useresult[0]->sum;
    //echo '</span>';	
}

function woocl_total_vendor_registred_day() {
	global $wpdb;
	$day = date('d');
	// Get all users with role Author.
	$user_query = new WP_User_Query( array( 
	'role' => 'Vendor',
		'date_query' => array( 
		array( 'day' => date( $day )  
	))	
	) );
	// Get the total number of users for the current query. I use (int) only for sanitize.
	$users_count = (int) $user_query->get_total();
	// Echo a string and the value
	return $users_count;
	
	//global $wpdb;
	//$year = date('Y');
	//$usersyears = $wpdb->prefix.'users';
	//$useresult = $wpdb->get_results('
	//SELECT count(*) as sum
	//FROM `' . $usersyears .'`
	//WHERE `user_registered`
	//LIKE "%' . $year . mysqli_real_escape_string() . '%" 
	//'); 
	
	// Echo a string and the value
	//echo '<span class="numberCircle">';
	//echo $useresult[0]->sum;
    //echo '</span>';	
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                              // Get list vendors //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
function woocl_list_vendors() { 
        global $wpdb;
		$args = array(
			'role'       => 'vendor',
			'orderby'    => 'ID',
			'order'      => 'DESC',
		);

        $blogusers = get_users( $args );
		
		echo'<div class="table-responsive">';
			
			echo'<table class="table">';
				
				echo'<tr>';
				echo'<th>'; _e('Vendor since', 'woo-classement'); '</th>'; 
				echo'<th>'; _e('Name', 'woo-classement'); '</th>';
				echo'<th>'; _e('Surname', 'woo-classement');'</th>';
				echo'<th>'; _e('City', 'woo-classement'); '</th>';
				echo'<th>'; _e('Phone Number', 'woo-classement'); '</th>';
				echo'<th>'; _e('Email', 'woo-classement'); '</th>';
				echo'</tr>';
				
				// Array of WP_User objects.
				foreach ( $blogusers as $user ) {
				$countcustomer = wc_get_customer_order_count( $user->ID );
				
				echo'<tr>';
					echo'<td>'; 
						$udata = get_userdata( $user->ID );
						$registered = $udata->user_registered;
						$message = '' . date( 'd M Y', strtotime( $registered ) );
						echo $message; 
					'</td>';
					echo'<td>'; _e( $user->billing_last_name ); '</td>';
					echo'<td>'; _e( $user->billing_first_name ); '</td>';
					echo'<td>'; _e( $user->billing_city );'</td>';
					echo'<td>';  _e( $user->billing_phone ); '</td>';
					echo'<td>'; _e( $user->user_email ); '</td>';
					
				echo'</tr>'; 
		
				} 
				echo'</table>';
				
			echo'</div>';
		
		echo'<div class="via-woocommerce-classement-clear"></div>';
	
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                              // Get list vendors //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
function woocl_list_vendors_pending() { 
        global $wpdb;
		$args = array(
			'role'       => 'pending_vendor',
			'orderby'    => 'ID',
			'order'      => 'DESC',
		);

        $blogusers = get_users( $args );
		
		echo'<div class="table-responsive">';
			
			echo'<table class="table">';
				
				echo'<tr>';
				echo'<th>'; _e('Pending Vendor since', 'woo-classement'); '</th>'; 
				echo'<th>'; _e('Name', 'woo-classement'); '</th>';
				echo'<th>'; _e('Surname', 'woo-classement');'</th>';
				echo'<th>'; _e('City', 'woo-classement'); '</th>';
				echo'<th>'; _e('Phone Number', 'woo-classement'); '</th>';
				echo'<th>'; _e('Email', 'woo-classement'); '</th>';
				echo'</tr>';
				
				// Array of WP_User objects.
				foreach ( $blogusers as $user ) {
				$countcustomer = wc_get_customer_order_count( $user->ID );
				
				echo'<tr>';
					echo'<td>'; 
						$udata = get_userdata( $user->ID );
						$registered = $udata->user_registered;
						$message = '' . date( 'd M Y', strtotime( $registered ) );
						echo $message; 
					'</td>';
					echo'<td>'; _e( $user->billing_last_name ); '</td>';
					echo'<td>'; _e( $user->billing_first_name ); '</td>';
					echo'<td>'; _e( $user->billing_city );'</td>';
					echo'<td>';  _e( $user->billing_phone ); '</td>';
					echo'<td>'; _e( $user->user_email ); '</td>';
					
				echo'</tr>'; 
		
				} 
				echo'</table>';
		
		echo'</div>';
		
		echo'<div class="via-woocommerce-classement-clear"></div>';
	
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                              // Get informations vendor by ID //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_get_vendor_informations($vendor_id) { // <- how get the id ?
	global $wpdb;
	$vendor_data = get_userdata( $vendor_id );
	$vendor_email = $vendor_data->user_email;
	$vendor_name = WCV_Vendors::is_vendor( $vendor_id ) ? sprintf( WCV_Vendors::get_vendor_sold_by( $vendor_id ) ): get_bloginfo( 'name' );
	$vendor_phone =  get_user_meta($vendor_id, 'billing_phone', true);
	$vendor_details = $vendor_name . '<br> Email: ' . $vendor_email . '<br> Teléfono: ' .$vendor_phone;
	return $vendor_details;
}