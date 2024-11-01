<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////                   Admin Notices new informations                        //////////

/************************************** Version news 2.6.8 ***********************************/
/*add_action('admin_notices', 'woocl_admin_notice_last');
function woocl_admin_notice_last() {
	global $pagenow; 
	if ( 'via-woocommerce-classement' != $_GET['page'] ) {return;}
	elseif ( ( 'admin.php' === $pagenow ) &&  ( 'via-woocommerce-classement' === $_GET['page'] )){	
		global $current_user;
		$user_id = $current_user->ID;
		if ( ! get_user_meta($user_id, 'woocl268_notice') ) {
			echo '<div class="notice-error" style="background:white;border-left:5px solid #d63638;position:aboslute;top:20px;margin:20px 0;padding:10px 10px 3px 10px"><p>';
            printf(__('NEW : 
			You can use the search filter to search for products, customers or orders in a very easy way. <a style="color:#bf0d0d;font-weight:bold" href="' . admin_url( '/admin.php?page=via-woocommerce-classement-orders#lastorders-orders') . '">See</a>
			- <a href="' . admin_url( '/admin.php?page=via-woocommerce-classement&woocl268_notice=0') . '">Hide Notice</a>'));
			echo "</p></div>";
		}
	}
}*/


/************************************** Version news 2.6.8 ***********************************/
/*add_action('admin_init', 'woocl_admin_notice_last_ignore');
function woocl_admin_notice_last_ignore() {
	global $pagenow; 	
	if ( 'via-woocommerce-classement' != $_GET['page'] ) {return;}
	elseif ( ( 'admin.php' === $pagenow ) &&  ( 'via-woocommerce-classement' === $_GET['page'] )){
		global $current_user;
		$user_id = $current_user->ID;
		if ( isset($_GET['woocl268_notice']) && '0' == $_GET['woocl268_notice'] ) {
			add_user_meta($user_id, 'woocl268_notice', true);
		}
    }
}*/
