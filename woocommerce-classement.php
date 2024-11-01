<?php
/*
Plugin Name: Woocommerce Classement
Plugin URI: https://www.viamultimedia.ca/
Description: Plugin showing beautiful statistics of your Woocommerce online store.
Version: 3.7
Author: Viamultimedia
Author URI: https://www.viamultimedia.ca/
*/ 

/*  
Copyright 2011-2022 Tony Breboin (email:infos@viamultimedia.ca)
License: Single License Key
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/************************* Check if WooCommerce is ok else should install Woocommerce *****************************/

if ( ! class_exists( 'woocl_InstallCheck' ) ) {
  class woocl_InstallCheck {
		static function install() {
			/**
			* Check if WooCommerce are active
			**/
			if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
				// Deactivate the plugin
				deactivate_plugins(__FILE__);
				
           wp_die( __( 'Woocommerce Classement requires WooCommerce to run. 
		   Please install <a href="' . admin_url( 'plugin-install.php' ) . '">WooCommerce</a> and activate the plugin', 'woocommerce-classement' ) );    
		   }
       }
	}
}
register_activation_hook( __FILE__, array('woocl_InstallCheck', 'install') );


/**************************************** Load folders Language ************************************/

function  woocl_load_plugin_textdomain() {
	$domain = 'woo-classement';
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
	if ( $loaded = load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' ) ) {
		return $loaded;
	} else {
		return load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
}
add_action( 'init', 'woocl_load_plugin_textdomain' );


/************************* Check if WooCommerce is active *****************************/

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
	define( 'WOOCL_PATH', plugin_dir_path( __FILE__ ) );
	define( 'WOOCL_URL', plugin_dir_url( __FILE__ ) );
	define( 'WOOCL_PATH_URL', plugin_dir_path( 'plugins' ) );

	function woocl_version_number() {
        // If get_plugins() isn't available, require it
		if ( ! function_exists( 'get_plugins' ) )
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		
		// Create the plugins folder and file variables
		$plugin_folder = get_plugins( '/' . 'woo-classement' );
		$plugin_file = 'woocommerce-classement.php';
		
		// If the plugin version number is set, return it 
		if ( isset( $plugin_folder[$plugin_file]['Version'] ) ) {
			return $plugin_folder[$plugin_file]['Version'];

		} else {
		// Otherwise return null
			return NULL;
		}
    }
	
	function woocl_woo_version_number() {
		// If get_plugins() isn't available, require it
		if ( ! function_exists( 'get_plugins' ) )
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		
		// Create the plugins folder and file variables
		$plugin_folder = get_plugins( '/' . 'woocommerce' );
		$plugin_file = 'woocommerce.php';
		
		// If the plugin version number is set, return it 
		if ( isset( $plugin_folder[$plugin_file]['Version'] ) ) {
			return $plugin_folder[$plugin_file]['Version'];

		} else {
		// Otherwise return null
			return NULL;
		}
    }
	
	////////////////////////////  Load Settings and Site Link to plugin links presentation  ////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	add_filter( 'plugin_action_links', 'woocl_add_action_plugin', 10, 5 );
	function woocl_add_action_plugin( $actions, $plugin_file ) 
	{
	static $plugin;

	if (!isset($plugin))
		$plugin = plugin_basename(__FILE__);
	if ($plugin == $plugin_file) {

			$settings = array('settings' => '<a href="' . admin_url( 'admin.php?page=via-woocommerce-classement-options' ) . '">' . __('Settings', 'woo-classement') . '</a>');
			$site_link = array('support' => '<a href="https://themespress.ca/" target="_blank">Support</a>');
		
				$actions = array_merge($settings, $actions);
				$actions = array_merge($site_link, $actions);
			
		}
		
		return $actions;
	}
	
	///////////////////////////////////////////// Echo Menu Woocommerce Classement /////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	add_action('admin_menu', 'woocl_menu_page');
	function woocl_menu_page() {
        global $options;
        $options = get_option('via_woocommerce_classement_settings');
		$GLOBALS['woocommerce_classement'] = add_menu_page( 'Woocommerce Classement', 'Woocommerce Classement', 'manage_options', 'via-woocommerce-classement', 'woocl_submenu_page_callback', '',2);
		$GLOBALS['statistics'] = add_submenu_page('via-woocommerce-classement', 'Statistics', 'Statistics', 'manage_options', 'via-woocommerce-classement-statistics', 'woocl_submenu_page_callback');
		$GLOBALS['customers'] = add_submenu_page('via-woocommerce-classement', 'Customers', 'Customers', 'manage_options', 'via-woocommerce-classement-client', 'woocl_submenu_page_callback');
		$GLOBALS['orders'] = add_submenu_page('via-woocommerce-classement', 'Orders', 'Orders', 'manage_options', 'via-woocommerce-classement-orders', 'woocl_submenu_page_callback');
		$GLOBALS['products'] = add_submenu_page('via-woocommerce-classement', 'Products', 'Products', 'manage_options', 'via-woocommerce-classement-products', 'woocl_submenu_page_callback');
		$GLOBALS['coupons'] = add_submenu_page('via-woocommerce-classement', 'Coupons', 'Coupons', 'manage_options', 'via-woocommerce-classement-coupons', 'woocl_submenu_page_callback');
		$GLOBALS['shipping'] = add_submenu_page('via-woocommerce-classement', 'Shipping', 'Shipping', 'manage_options', 'via-woocommerce-classement-shipping', 'woocl_submenu_page_callback');
		$GLOBALS['paiements'] = add_submenu_page('via-woocommerce-classement', 'Paiements', 'Paiements', 'manage_options', 'via-woocommerce-classement-paiements', 'woocl_submenu_page_callback');
		if ( isset($options['via_woocommerce_classement_vendors_show']) && ($options['via_woocommerce_classement_vendors_show'] == 1) ){
		   $GLOBALS['vendors'] = add_submenu_page('via-woocommerce-classement', '', 'Vendors', 'manage_options', 'via-woocommerce-classement-vendors', 'woocl_submenu_page_callback');
		}
		$GLOBALS['dokan'] = add_submenu_page('via-woocommerce-classement', 'Dokan Statistics', 'Dokan Statistics', 'manage_options', 'via-woocommerce-classement-dokan', 'woocl_submenu_page_callback');
		$GLOBALS['options'] = add_submenu_page('via-woocommerce-classement', 'Options', 'Options', 'manage_options', 'via-woocommerce-classement-options', 'woocl_submenu_page_callback');
		$GLOBALS['help'] = add_submenu_page('via-woocommerce-classement', 'Help', 'Help', 'manage_options', 'via-woocommerce-classement-help', 'woocl_submenu_page_callback');
		$GLOBALS['importexport'] = add_submenu_page('via-woocommerce-classement', 'Export/Import', 'Export/Import', 'manage_options', 'via-woocommerce-classement-import-export', 'woocl_submenu_page_callback');
		$GLOBALS['conversions'] = add_submenu_page('via-woocommerce-classement', 'Conversions', 'Conversions', 'manage_options', 'via-woocommerce-classement-conversions', 'woocl_submenu_page_callback');
		$GLOBALS['viaplugins'] = add_submenu_page('via-woocommerce-classement', 'Plugins', 'Plugins', 'manage_options', 'via-woocommerce-classement-viaplugins', 'woocl_submenu_page_callback');
    }
	


	///////////////////////////////////////////// Via Woocommerce Classement includes /////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	class woocl_Includes {

		public function init()

		{
		add_action('plugins_loaded', array($this, 'woocl_plugin_includes'));
		}

		public function woocl_plugin_includes() {
		
		// Enqueues JS - Styles
		include( WOOCL_PATH . 'enqueues/woocommerce-classement-styles.php');
	    include( WOOCL_PATH . 'enqueues/woocommerce-classement-js.php');
		
		// Options 
		include( WOOCL_PATH . 'inc/options/class-woocommerce-classement-options.php');
		
		// PHP Class for exclude Bots Visits
		include( WOOCL_PATH . 'inc/views/woocommerce-classement-exclude-bots.php');
		
		// Admin functions
		include( WOOCL_PATH . 'inc/admin/class-woocommerce-classement-admin-functions.php');
		include( WOOCL_PATH . 'inc/admin/class-woocommerce-classement-admin-notices.php');
		include( WOOCL_PATH . 'inc/includes/class-woocommerce-classement-sales.php');
		include( WOOCL_PATH . 'inc/includes/class-woocommerce-classement-customers.php');
		include( WOOCL_PATH . 'inc/includes/class-woocommerce-classement-vendors.php');
		include( WOOCL_PATH . 'inc/includes/class-woocommerce-classement-products.php');
		include( WOOCL_PATH . 'inc/includes/class-woocommerce-classement-orders.php');
		include( WOOCL_PATH . 'inc/includes/class-woocommerce-classement-coupons.php');
		include( WOOCL_PATH . 'inc/includes/class-woocommerce-classement-paiements.php');
		include( WOOCL_PATH . 'inc/includes/class-woocommerce-classement-shipping.php');
		include( WOOCL_PATH . 'inc/includes/class-woocommerce-classement-queries.php');
		include( WOOCL_PATH . 'inc/includes/class-woocommerce-classement-charts.php');
		include( WOOCL_PATH . 'inc/admin/class-woocommerce-classement-plugin-functions.php');
		
		// Views + Views Online Users
		include( WOOCL_PATH . 'inc/views/woocommerce-classement-view-statistiques.php');
		include( WOOCL_PATH . 'inc/views/woocommerce-classement-meta-view-product.php');
		include( WOOCL_PATH . 'inc/views/woocommerce-classement-view-users-online.php');
		
		// Content Résults
		include( WOOCL_PATH . 'inc/content/content-graphs.php');
		include( WOOCL_PATH . 'inc/content/content-dokan.php');
		include( WOOCL_PATH . 'inc/content/content-general.php');
		include( WOOCL_PATH . 'inc/content/content-statistics.php');
		include( WOOCL_PATH . 'inc/content/content-customers.php');
		include( WOOCL_PATH . 'inc/content/content-products.php');
		include( WOOCL_PATH . 'inc/content/content-orders.php');
		include( WOOCL_PATH . 'inc/content/content-plugin.php');
		include( WOOCL_PATH . 'inc/content/content-coupons.php');
		include( WOOCL_PATH . 'inc/content/content-shipping.php');
		include( WOOCL_PATH . 'inc/content/content-paiements.php');
		include( WOOCL_PATH . 'inc/content/content-vendors.php');
		include( WOOCL_PATH . 'inc/content/content-viaplugins.php');
		include( WOOCL_PATH . 'inc/content/content-import-export.php');
		include( WOOCL_PATH . 'inc/content/content-conversions.php');
		
		// Social
		include( WOOCL_PATH . 'inc/social/content-social.php');
		
		// Dashboard
		include( WOOCL_PATH . 'inc/admin/dashboard/class-woocommerce-classement-dashboard.php');
		
		// Template all sections
		include( WOOCL_PATH . 'woocommerce-classement-template.php');
		}

	}

	$wooclincludes = new woocl_Includes();
	$wooclincludes->init();
	
	
	
	///////////////////////////////////////////// Enqueue JS ajax form /////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	function woocl_admin_scripts_form($hook) {
		if ( is_admin() ){ // for Admin Dashboard Only
		// Embed the Script on our Plugin's Option Page Only
			wp_enqueue_script('jquery');
			wp_enqueue_script( 'jquery-form' );
		}
	}
	add_action( 'admin_init', 'woocl_admin_scripts_form' );


	///////////////////////////////////////////// Enqueue script google line charts ////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    
	function woocl_enqueue_script_charts() {
	    echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>';
	}
	add_action('admin_head', 'woocl_enqueue_script_charts');
	
	
	///////////////////////////////////////////// Return function jquery + stats ///////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
	function woocl_enqueue_js_charts() {

	?>
	<?php $var1 = woocl_total_orders_all_year('2017'); ?>
	<?php }
	add_action( 'admin_head', 'woocl_enqueue_js_charts', 99 );
	
	function woocl_template_action() {
    global $pagenow;

    if ('admin.php' === $pagenow) {
        switch ($_GET['page']) {
            case 'via-woocommerce-classement':
                return woocl_tab_results_general();
            case 'via-woocommerce-classement-statistics':
                return woocl_tab_results_statistics();
            case 'via-woocommerce-classement-client':
                return woocl_tab_results_customers();
            case 'via-woocommerce-classement-orders':
                return woocl_tab_results_orders();
            case 'via-woocommerce-classement-products':
                return woocl_tab_results_products();
            case 'via-woocommerce-classement-coupons':
                return woocl_tab_results_coupons();
            case 'via-woocommerce-classement-shipping':
                return woocl_tab_results_livraison();
            case 'via-woocommerce-classement-paiements':
                return woocl_tab_results_paiements();
            case 'via-woocommerce-classement-vendors':
                return woocl_tab_results_vendors();
            case 'via-woocommerce-classement-dokan':
                return woocl_tab_content_dokan();
            case 'via-woocommerce-classement-options':
                return woocl_options_page();
            case 'via-woocommerce-classement-help':
                return woocl_tab_content_plugin();
            case 'via-woocommerce-classement-import-export':
                return woocl_tab_content_importexport();
            case 'via-woocommerce-classement-conversions':
                return woocl_tab_content_conversions();
            case 'via-woocommerce-classement-queries':
                return woocl_tab_results_queries();
            case 'via-woocommerce-classement-viaplugins':
                return woocl_tab_content_viaplugins();
        }
    }
}

add_action('woocltemplate', 'woocl_template_action');


	
}


/************************* Ajax Oders Search - Customers Section ******************************/

function woocl_client_enqueue_ajax_script() {
    wp_enqueue_script('woocl-ajax-script', plugin_dir_url(__FILE__) . 'js/ajax-scripts.js', array('jquery'), '1.0', true);
    wp_localize_script('woocl-ajax-script', 'woocl_client_ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('admin_enqueue_scripts', 'woocl_client_enqueue_ajax_script');

// Appel AJAX pour la recherche
add_action('wp_ajax_woocl_client_search', 'woocl_client_search');
add_action('wp_ajax_nopriv_woocl_client_search', 'woocl_client_search');

function woocl_client_search() {
    global $woocommerce;
	
	// Récupérer les paramètres du formulaire
	$nomclient        = $_POST['nomclient'];
    $datecommande     = $_POST['datecommande'];
    $datepaiement     = $_POST['datepaiement'];
    $methodepaiement  = $_POST['methodepaiement'];
    $statusorder      = isset($_POST['statusorder']) ? $_POST['statusorder'] : '';

	// Si aucun statut n'est sélectionné, définir le statut sur "terminée"
	if (empty($statusorder)) {
	    $statusorder = 'completed';
	}
	
	// Si aucune méthode de paiement n'est sélectionnée, récupérer toutes les méthodes de paiement disponibles
    /*if (empty($methodepaiement)) {
        $available_gateways = WC()->payment_gateways->get_available_payment_gateways();
        $methodepaiement = array_keys($available_gateways);
    }*/

	/*if (empty($methodepaiement)) {	
		$wc_gateways      = new WC_Payment_Gateways();
		$available_gateways = $wc_gateways->get_available_payment_gateways();
		$methodepaiement = array_keys($available_gateways);
	}*/

	// Récupérer le numéro de page à partir de la demande AJAX
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;

    // Calculer l'offset en fonction du numéro de page et du nombre de résultats par page
    $offset = ($page - 1) * 20; // Modifier le nombre 10 selon votre besoin

    // Rechercher les utilisateurs WooCommerce avec le nom de facturation correspondant
    $user_query = new WP_User_Query(array(
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key'     => 'billing_first_name',
                'value'   => $nomclient,
                'compare' => 'LIKE'
            ),
            array(
                'key'     => 'billing_last_name',
                'value'   => $nomclient,
                'compare' => 'LIKE'
            )
        )
    ));

    // Vérifier si des utilisateurs ont été trouvés
    if (empty($user_query->results)) {
        echo 'Aucun résultat trouvé.';
        wp_die();
    }
	
    // Récupérer les IDs des utilisateurs trouvés
    $customer_ids = wp_list_pluck($user_query->results, 'ID');

    // Arguments de requête pour récupérer les commandes
    $args = array(
        'customer'       => $customer_ids,
        'date_created'   => $datecommande,
        'date_paid'      => $datepaiement,
        'payment_method' => $methodepaiement,
        'status'         => $statusorder,
        'limit'          => 10,
        'offset'         => $offset, // Ajouter l'offset à la requête
    );

    // Récupérer les commandes correspondantes aux critères de recherche
    $orders = wc_get_orders($args);
	
	$output = '';
    // Vérifier s'il y a des commandes trouvées
    if ($orders) {
        foreach ($orders as $order) {
            $output .= '<tr class="woocl-result-item">';
            $output .= '<td>' . $order->get_id() . '</td>';
            $output .= '<td>' . $order->get_billing_last_name() . '&nbsp;' . $order->get_billing_first_name() . '</td>';
            $output .= '<td>' . $order->get_date_created()->format('Y-m-d H:i:s') . '</td>';
            $output .= '<td>' . $order->get_billing_country() . '</td>';
            $output .= '<td>' . $order->get_shipping_city() . '</td>';
            $output .= '<td>' . number_format((float) $order->get_total_tax(), 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol() . '</td>';
            $output .= '<td>' . $order->get_total() . '&nbsp;' . get_woocommerce_currency_symbol() . '</td>';
            $output .= '<td>' . number_format((float) $order->get_shipping_total(), 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol() . '</td>';
            $output .= '<td>' . woocl_get_shipping_method_title($order->get_id()) . '</td>';
		    $output .= '<td>' . ucfirst($order->get_status()) . '</td>';
            $output .= '</tr>';
        }
    echo $output;
    } else {
        echo '<div class="text-align:center;margin:40px"><p>' . 'Aucun résultat trouvé.' . '</p></div>';
    }
    wp_die();
}



/************************* Show customers their purchased products (Customer account) ******************************/
function initialize_woocl_customers_products_statistics() {
    $options = get_option('via_woocommerce_classement_settings');
    if (!empty($options['woocl_users_show_customers_bought']) && $options['woocl_users_show_customers_bought'] == 1) {
        new Woocl_Customers_Products_Statistics();
    }
}

add_action('plugins_loaded', 'initialize_woocl_customers_products_statistics');



