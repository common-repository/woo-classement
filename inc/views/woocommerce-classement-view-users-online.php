<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/////////////////////////////////////////////////////////////////////////////////
// Get Last login date Woocommerce Customers
/////////////////////////////////////////////////////////////////////////////////

add_action('wp_login', 'set_last_login');
//function for setting the last login
function set_last_login($login) {
	$user = get_userdatabylogin($login);
	$curent_login_time = get_user_meta(	$user->ID , 'current_login', true);
	//add or update the last login value for logged in user
	if(!empty($curent_login_time)){
		update_usermeta( $user->ID, 'last_login', $curent_login_time );
		update_usermeta( $user->ID, 'current_login', current_time('mysql') );
	}else {
		update_usermeta( $user->ID, 'current_login', current_time('mysql') );
		update_usermeta( $user->ID, 'last_login', current_time('mysql') );
	}
}


function get_last_login($user_id) {
    $last_login = get_user_meta($user_id, 'last_login', true);
    $date_format = get_option('date_format') . ' ' . get_option('time_format');
	if(wp_is_mobile()) {
	$the_last_login = date("M j, y, g:i a", strtotime($last_login));  
	}
	else {
	$the_last_login = mysql2date($date_format, $last_login, false);
	}
	return $the_last_login;
}


/////////////////////////////////////////////////////////////////////////////////
// Get login system Woocommerce Customers
/////////////////////////////////////////////////////////////////////////////////

function woocl_user_online_update(){
	if ( is_user_logged_in()) {

		// get the user activity the list
		$logged_in_users = get_transient('online_status');

		// get current user ID
		$user = wp_get_current_user();

		// check if the current user needs to update his online status;
		// he does if he doesn't exist in the list
		$no_need_to_update = isset($logged_in_users[$user->ID])

		    // and if his "last activity" was less than let's say ...1 minutes ago
		    && $logged_in_users[$user->ID] >  (time() - (1 * 60));

		// update the list if needed
		if(!$no_need_to_update){
		  $logged_in_users[$user->ID] = time();
		  set_transient('online_status', $logged_in_users, (5*60)); // 2 mins
		}
	}
}
add_action( 'wp', 'woocl_user_online_update' );

function woocl_display_logged_in_users(){
	
	$logged_in_users = get_transient('online_status');

	$count = 0;
	if ( ! empty( $logged_in_users ) ) {
		$count = count( $logged_in_users );
	}

	echo $count;
	
	// get the user activity the list
	/*$logged_in_users = get_transient('online_status');
    
	$count = 0;
	if ( !empty( $logged_in_users ) ) {
		foreach ( $logged_in_users as $key => $value) {
			$user = get_user_by( 'id', $key );
			$count += $user->ID;
	    }
		echo $count;
	} 
	else{
		echo '0';
	}*/
}

/////////////////////////////////////////////////////////////////////////////////
// Get cart customers Woocommerce results
/////////////////////////////////////////////////////////////////////////////////

function woocl_display_cart_in_users($user_id) {
    // Get an instance of the WC_Session_Handler Object
    $session_handler = new WC_Session_Handler();
    // Get the user session from its user ID:
    $session = $session_handler->get_session($user_id);
    // Get cart items array
    $cart_items = maybe_unserialize($session['cart']);
    
    // Initialize variables
    $quantity = 0;
    $total = 0;

    // Loop through cart items and get cart items details
    if (!empty($cart_items)) {
        foreach( $cart_items as $cart_item ) {
            $product_id   = $cart_item['product_id'];
            $variation_id = $cart_item['variation_id'];
            $quantity     = $cart_item['quantity'];
            $attributes   = $cart_item['variation'];
            $item_taxes   = $cart_item['line_tax_data'];
            $subtotal_tax = $cart_item['line_subtotal_tax'];
            $total_tax    = $cart_item['line_tax'];
            $subtotal     = $cart_item['line_subtotal'];
            $total        = $cart_item['line_total'];
        }
    }

    if ($quantity > 0) {
        return $quantity . '&nbsp;-&nbsp;' . $total . '&nbsp;' . get_woocommerce_currency_symbol();
    } else {
        return 'N/A';
    }
}


/////////////////////////////////////////////////////////////////////////////////
// Customers online table results
/////////////////////////////////////////////////////////////////////////////////

function woocl_display_logged_in_users_table(){
	// get the user activity the list
	$logged_in_users = get_transient('online_status');
	echo'<div class="table-responsive">';
			
			echo '<table class="table">';
				
				if ( !empty( $logged_in_users ) ) {
					
						echo'<tr>';
						echo'<th>'; _e('ID', 'woo-classement'); '</th>'; 
						echo'<th>'; _e('First Name', 'woo-classement'); '</th>'; 
						echo'<th>'; _e('Last Name', 'woo-classement'); '</th>';
						echo'<th>'; _e('City', 'woo-classement'); '</th>';
						echo'<th>'; _e('Billing Country', 'woo-classement'); '</th>';
						echo'<th>'; _e('Total sales', 'woo-classement'); '</th>';
						echo'<th>'; _e('Count orders by customer', 'woo-classement'); '</th>';
						echo'<th>'; _e('Navigator', 'woo-classement'); '</th>';
						echo'<th>'; _e('Last login Date', 'woo-classement'); '</th>';
						echo'<th>'; _e('Live Cart Items </br><span style="font-size:11px">(QTY-PRICE)</span>', 'woo-classement'); '</th>';
						echo'</tr>';
						foreach ( $logged_in_users as $key => $value) {
								$user = get_user_by( 'id', $key );
								echo'<tr>';
								   echo'<td>' . $user->ID . '</td>';
								   echo'<td>' . $user->get_billing_first_name() . '</td>';
								   echo'<td>' . $user->billing_last_name . '</td>';
								   echo'<td>' . $user->billing_city . '</td>';
								   echo'<td>' . $user->billing_country . '</td>';
								   echo'<td>' . wc_get_customer_total_spent( $user->ID ) . '&nbsp;' . get_woocommerce_currency_symbol() . '</td>'; 
								   echo'<td>' . wc_get_customer_order_count( $user->ID ) . '</td>';
									   /*echo do_shortcode( '[product_purchases id="$allids"]' );*/
								   echo'<td>' . $_SERVER['HTTP_USER_AGENT'] . '</td>';
								   echo'<td>' . get_last_login( $user->ID ) . '</td>';
								   echo'<td>' . woocl_display_cart_in_users($user->ID) . '</td>';
								echo'</tr>';
						}
				} 
	
			else{
				echo '<br/>'; _e('No user is logged in.', 'woo-classement'); '';
			}
	        
			echo'</table>';
		
	echo'</div>';

    echo'<div class="via-woocommerce-classement-clear"></div>';

}

function woocl_clear_transient_on_logout() {

	$user_id = get_current_user_id();

	$users_transient_id = get_transient('online_status');

	if(is_array($users_transient_id)){
		foreach($users_transient_id as $id => $value ){
			if ( $id == $user_id ) {
				unset($users_transient_id[$user_id]);
				set_transient('online_status', $users_transient_id, (2*60)); // 2 mins
				break;
			}
		}
	}else{
		delete_transient('online_status');
	}
}
add_action('clear_auth_cookie', 'woocl_clear_transient_on_logout');


