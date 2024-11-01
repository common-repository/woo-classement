<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////        Link upload Woocommerce 3.0 if not the good version              //////////

function woocl_version_check( $version = '3.0' ) {
	if ( class_exists( 'WooCommerce' ) ) {
		global $woocommerce;
		if ( version_compare( $woocommerce->version, $version, ">=" ) ) {
			return true;
		}
	}
	return false;
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fonction calcul pourcentage de count - Page Statistiques)
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Assurer vous que le nom de cette fonction ne soit pas utiliser
function woocl_woocommerceclassementpercent($num_amount, $num_total) {
$count1 = $num_amount / $num_total;
$count2 = $count1 * 100;
// Remplacer le 2 par 0 si vous ne voulez pas de décimales
$count = number_format($count2, 2);
echo $count;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fonction get count user connections
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_users_login($username, $user) {
	$login_count = intval(get_user_meta($user->ID, 'user_count_connections', true));
    $login_count++;
    update_user_meta($user->ID, 'user_count_connections', $login_count);
}
add_action('wp_login', 'woocl_users_login', 10, 2);

function woocl_user_table( $column ) {
    $column['connections'] = 'Connections';
    return $column;
}
add_filter( 'manage_users_columns', 'woocl_user_table' );

function woocl_user_table_row( $value, $column_name, $user_id ) {
	$user = get_userdata( $user_id );
    switch ($column_name) {
        case 'connections' :
            $user_connection = get_the_author_meta( 'user_count_connections', $user_id );
			if ($user_connection == 0) {
				return '0';
			}
			else {
				return get_the_author_meta( 'user_count_connections', $user_id );
			}
            break;
        default:
    }
    return $value;
}
add_filter( 'manage_users_custom_column', 'woocl_user_table_row', 10, 3 );

// Display User IP in WordPress

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Get user IP for results queries 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_get_the_user_ip() {
	if ( !empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
	//check ip from share internet
	$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif ( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
	//to check ip is pass from proxy
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
	$ip = $_SERVER['REMOTE_ADDR'];
	}
	return apply_filters( 'wpb_get_ip', $ip );
}
add_shortcode('show_ip', 'woocommerc_classement_get_the_user_ip');



add_action('woocommerce_email_customer_details', 'woocl_ip_adress', 10, 4);
function woocl_ip_adress($order, $sent_to_admin, $plain_text, $email){
    // Just for admin new order notification
    if( 'new_order' == $email->id ){
        // WC3+ compatibility
        $order_id = method_exists( $order, 'get_id' ) ? $order->get_id() : $order->id;

        echo '<br><p><strong>Customer IP address:</strong> '. get_post_meta( $order_id, '_customer_ip_address', true ).'</p>';
    }
} 


//////////////////////////////////////////////////////////// wp_remote_get  ////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
// Get Data User Viamultimedia plugin are Active or Not
/////////////////////////////////////////////////////////////////////////////////

function woocl_plugin_active($pluginPath) {
	if ( is_plugin_active( $pluginPath ) ) {
	   return 'Activated';
	} else {
	   return 'Not activated';
	}
}




add_shortcode('wooclviamultiextensions', 'woocl_callback_viamultiextensions');
function woocl_callback_viamultiextensions( $atts ) {  ?>

    <?php 
	$defaults = [
      'title'  => ''
    ];
      
    $atts = shortcode_atts(
        $defaults,
        $atts,
        'extensions'
    );          

    $url = 'https://viamultimedia.ca/wp-json/wp/v2/viamulti-extensions';
    
    $arguments = array(
        'method' => 'GET' 
    );

    $response = wp_remote_get($url, $arguments);

    if (is_wp_error($response) ) {
        $error_message = $response->get_error_message();
        return "Something went wrong: $error_message";
    } 
    
    $results = json_decode( wp_remote_retrieve_body($response) );
        
    foreach( $results as $result => $data ) { 
		if ($data->wpscanextension = 'Oui') {
			$data->wpscanextension = '<i style="font-size:20px" class="fa fa-check" aria-hidden="true"></i>';
		} ?>
		<div class="col-sm-6 col-md-6">
		    <div class="wooclplugins-card">
				<h3><?php echo $data->title->rendered; ?></h3>   
				<div class="wooclplugins-20"></div>
				<p><?php echo $data->content->rendered; ?></p>
				<div class="wooclplugins-20"></div>
				<div class="row"> 
					<div class="col-md-12">
						<span class="wooclplugins-span" style="margin-right:20px"><?php echo $data->versionextension . '&nbsp;-&nbsp;' . woocl_plugin_active('' . $data->pluginpathextension . ''); ?></span>
						<span class="wooclplugins-span"><?php echo 'WP Scan : ' . $data->wpscanextension . ''; ?></span>
					</div>
					<div class="col-md-12" style="margin-top:20px">
						<div class="rouge-bouton">
						<a href="<?php echo $data->lienextension; ?>" title="<?php echo $data->title->rendered; ?>" target="_blank">Download</a>
						</div>
					</div>
					<div class="wooclplugins-image">
						<img src="<?php echo $data->fimgurl; ?>" width="50" height="50">
					</div>
						<?php 
						/*require_once( ABSPATH . 'wp-load.php' );
						$plugin_slug = 'woo-classement'; // Remplacez par le slug de votre plugin
						$api_url = "https://api.wordpress.org/stats/plugin/1.0/$plugin_slug";

						$response = wp_remote_get($api_url);

						if (is_array($response) && !is_wp_error($response)) {
						$body = wp_remote_retrieve_body($response);
						$data = json_decode($body);

						if ($data && isset($data->active_installs)) {
						$active_installs = $data->active_installs;
						echo "Nombre d'installations actives : $active_installs";
						} else {
						echo "Impossible d'obtenir les informations du plugin.";
						}
						} else {
						echo "Erreur lors de la requête.";
						}*/
						?>
				</div>
			</div>
		</div>
	<?php }
}  


//////////////////////////////////////////////////////////// Admin Menu  ///////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class woocl_MyPluginAdminBarMenu {
    public function __construct() {
        add_action('admin_bar_menu', array($this, 'add_admin_bar_menu'), 100);
    }

    public function add_admin_bar_menu($admin_bar) {
        $admin_bar->add_menu(array(
            'id'    => 'woocl-admin-menu',
            'title' => 'WC-Classement',
            'href'  => '#',
            'meta'  => array(
                'title' => __('Woocommerce Classement'),
            ),
        ));

        $admin_bar->add_menu(array(
            'id'    => 'via-woocommerce-classement-statistics',
            'parent'=> 'woocl-admin-menu',
            'title' => 'Statistics',
            'href'  => admin_url('admin.php?page=via-woocommerce-classement-statistics'),
            'meta'  => array(
                'title' => __('Statistics'),
            ),
        ));

        $admin_bar->add_menu(array(
            'id'    => 'via-woocommerce-classement-client',
            'parent'=> 'woocl-admin-menu',
            'title' => 'Clients',
            'href'  => admin_url('admin.php?page=via-woocommerce-classement-client'),
            'meta'  => array(
                'title' => __('	Clients'),
            ),
        ));

        $admin_bar->add_menu(array(
            'id'    => 'via-woocommerce-classement-orders',
            'parent'=> 'woocl-admin-menu',
            'title' => 'Orders',
            'href'  => admin_url('admin.php?page=via-woocommerce-classement-orders'),
            'meta'  => array(
                'title' => __('Orders'),
            ),
        ));

        $admin_bar->add_menu(array(
            'id'    => 'via-woocommerce-classement-products',
            'parent'=> 'woocl-admin-menu',
            'title' => 'Products',
            'href'  => admin_url('admin.php?page=via-woocommerce-classement-products'),
            'meta'  => array(
                'title' => __('Products'),
            ),
        ));

        $admin_bar->add_menu(array(
            'id'    => 'via-woocommerce-classement-shipping',
            'parent'=> 'woocl-admin-menu',
            'title' => 'Shipping',
            'href'  => admin_url('admin.php?page=via-woocommerce-classement-shipping'),
            'meta'  => array(
                'title' => __('Shipping'),
            ),
        ));

        $admin_bar->add_menu(array(
            'id'    => 'via-woocommerce-classement-paiements',
            'parent'=> 'woocl-admin-menu',
            'title' => 'Paiements',
            'href'  => admin_url('admin.php?page=via-woocommerce-classement-paiements'),
            'meta'  => array(
                'title' => __('Paiements'),
            ),
        ));

    }

    public function display_link_page($link_number) {
        echo '<div class="wrap"><h1>Link ' . $link_number . '</h1><p>Content for Link ' . $link_number . '</p></div>';
    }
}

// Initialize the class
new woocl_MyPluginAdminBarMenu();
