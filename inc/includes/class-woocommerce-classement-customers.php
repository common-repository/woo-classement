<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                             // Functions Clients //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_last_customer_registred_tab_general($role) { 
	global $wpdb;
	$args = array(
		'role'         => $role, // authors only
		'orderby'      => 'registered', // registered date
		'order'        => 'DESC', // last registered goes first
		'number'       => 1 // limit to the last one, not required
	);

	$users = get_users( $args );
	$last_user_registered = $users[0]; // the first user from the list
	
	if($users) {
		if( $last_user_registered->billing_first_name != '' && $last_user_registered->billing_last_name != '') {
			echo '<span style="display:block; color:#ffffff;">'; 
			echo 'Last :&nbsp;'; // print user ID
			echo $last_user_registered->billing_first_name; // print user ID
			echo '&nbsp;';
			echo $last_user_registered->billing_last_name; // print user ID 
			echo '</span>';
		}

		else {
			echo '<p>';
			echo '<span style="display:block; color:#ffffff;">'; 
			echo 'Last :&nbsp;'; // print user ID
			echo _e('N / A', 'woo-classement');
			echo '</span>';
			echo '</p>';
		}
	}

}

function woocl_last_customer_registred($role) { 
	global $wpdb;
	$args = array(
		'role'         => $role, // authors only
		'orderby'      => 'registered', // registered date
		'order'        => 'DESC', // last registered goes first
		'number'       => 1, // limit to the last one, not required
	);

	$users = get_users( $args ); // the first user from the list
	
	if($users) {
		foreach ( $users as $user ) {
		echo '<span>'; 
		echo '&nbsp;'; // print user ID
		echo $user->first_name; // print user ID
		echo '&nbsp;';
		echo $user->last_name; // print user ID 
		echo '</span>';
        }
	 }
	 else {
		echo '<p>';
		echo _e('No Users', 'woo-classement');
		echo '</p>';
	 }
}

function woocl_total_user_registred() {
	global $wpdb;
	$user_query = new WP_User_Query( array( 
	'role' => 'customer',	
	) );
	$users_count = (int) $user_query->get_total();
	// Echo a string and the value
	return $users_count;
}

function woocl_total_user_registred_graphique($year) {
	global $wpdb;
	// Get all users with role Author.
	$user_query = new WP_User_Query( array( 
	'role' => 'customer',
		'date_query' => array( 
		array( 'year' => date( $year )  
	))	
	) );
	
	if($user_query) {
		// Get the total number of users for the current query. I use (int) only for sanitize.
		$users_count = (int) $user_query->get_total();
		// Echo a string and the value
		return $users_count;
	}
}

function woocl_total_user_registred_graphique_month($year, $month) {
	global $wpdb;
	// Get all users with role Author.
	$user_query = new WP_User_Query( array( 
	'role' => 'customer',
		'date_query' => array( 
		array( 
		'year' => date( $year ),
        'month' => date( $month ),		
		)
	)	
	) );
	
	if($user_query) {
		// Get the total number of users for the current query. I use (int) only for sanitize.
		$users_count = (int) $user_query->get_total();
		// Echo a string and the value
		return $users_count;
	}
	else {
		echo '<p>';
		echo _e('No results', 'woo-classement');
		echo '</p>';
	}
}

function woocl_total_user_registred_graphique_day($year, $month, $day) {
	global $wpdb;
	// Get all users with role Author.
	$user_query = new WP_User_Query( array( 
	'role' => 'customer',
		'date_query' => array( 
		array( 
		'year' => date( $year ),
        'month' => date( $month ),
        'day' => date( $day ),		
		)
	)	
	) );
	
	if($user_query) {
		// Get the total number of users for the current query. I use (int) only for sanitize.
		$users_count = (int) $user_query->get_total();
		// Echo a string and the value
		return $users_count;
	}
	else {
		echo '<p>';
		echo _e('No results', 'woo-classement');
		echo '</p>';
	}
}

function woocl_total_user_registred_graphique_objectives($year) {
	global $wpdb;
	// Get all users with role Author.
	$user_query = new WP_User_Query( array( 
	'role' => 'customer',
		'date_query' => array( 
		array( 'year' => date( $year )  
	))	
	) );
	// Get the total number of users for the current query. I use (int) only for sanitize.
	$users_count = (int) $user_query->get_total();
	echo '<span class="numberCircle">';
	echo '' . $users_count;
	echo '</span>';
}

function woocl_total_user_registred_year() {
	global $wpdb;
	$year = date('Y');
	// Get all users with role Author.
	$user_query = new WP_User_Query( array( 
	'role' => 'customer',
		'date_query' => array( 
		array( 'year' => date( $year )  
	))	
	));
	
	// Get the total number of users for the current query. I use (int) only for sanitize.
	$users_count = (int) $user_query->get_total();
	// Echo a string and the value
	return $users_count;	
}

function woocl_total_user_registred_year_charts($year) {
	global $wpdb;
	$year = $year;
	// Get all users with role Author.
	$user_query = new WP_User_Query( array( 
	'role' => 'customer',
		'date_query' => array( 
		array( 'year' => date( $year )  
	))	
	));
	
	// Get the total number of users for the current query. I use (int) only for sanitize.
	$users_count = (int) $user_query->get_total();
	// Echo a string and the value
	return $users_count;	
}

function woocl_total_user_registred_month() {
	global $wpdb;
    $date = getdate();
    $users_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->users WHERE MONTH(user_registered) = $date[mon] AND YEAR(user_registered) = $date[year]" );
	return $users_count;
}

function woocl_total_user_registred_day() {
    global $wpdb;
	$day = date('d');
	// Get all users with role Author.
	$user_query = new WP_User_Query( array( 
	'role' => 'customer',
		 'date_query' => array(
        //set date ranges with strings!
        'after' => 'today',
        //allow exact matches to be returned
        'inclusive'         => true,
        ),
		
		//'date_query' => array( 
		//array( 'day' => date( $day )  
	//))	
	) );
	// Get the total number of users for the current query. I use (int) only for sanitize.
	$users_count = (int) $user_query->get_total();
	// Echo a string and the value
	echo $users_count;
}

function woocl_count_all_connections() {
	global $wpdb;
	$usercountconnectionskey = 'user_count_connections';
	$totalconnections = $wpdb->get_var($wpdb->prepare("
	SELECT sum(meta_value) 
	FROM $wpdb->usermeta 
	WHERE meta_key = %s", $usercountconnectionskey
	)
	);
    if ( $totalconnections == 0 ) {
	    echo '0';
	}
	else {
		echo $totalconnections;	
	}
	
}

function woocl_last_customer_connection($role) { 
	$args = array(
		'role'         => $role, // authors only
		'orderby'      => 'user_count_connections', // registered date
		'order'        => 'DESC', // last registered goes first
		'number'       => 1,
		'meta_query' => array(
			array(
				'key'           => 'user_count_connections',
				'value'         => 1,
				'compare'       => '>=',
			),
			array(
				'key'           => 'billing_first_name',
				'value'         => '',
				'compare'       => '!=',
			)
		),
	);

	// The Query
	$user_query = new WP_User_Query( $args );

	// User Loop
	if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {
		echo $user->billing_first_name . '&nbsp;' . $user->billing_last_name;
		echo '<br>';
	}
	} else {
	echo 'No users found.';
	}

}


//////////////////////////////////// En travail //////////////////////////////////////
function woocl_connection_count_total_customer() { 
	global $wpdb;
	$year = date('Y');
	$args = array( 
		'role' => 'customer',
		'meta_query' => array(
			array(
				'key'           => 'user_count_connections',
				'meta_value'    => 1,
				'compare'       => '>=',
			)
		),
		'date_query' => 
			array( 
			  'year' => date( $year )
		)
	);

	$users = new WP_User_Query($args);
	print_r( '<span class="numberCircle">' );
	print_r( $users->get_total() );
    print_r( '</span>' );
}

function woocl_connection_count_total_vendor() { 
	global $wpdb;
	$year = date('Y');
	$args = array( 
	    
		'role' => 'vendor',
		'relation' => 'AND',
	   
		'meta_query' => array(
			array(
				'key' => 'user_count_connections',
				'compare' => '=',
			)
       ),
	   
	   'date_query' => 
			array( 
			  'year' => date( $year )
	   )
	   
	);

	$users = new WP_User_Query($args);
	print_r( '<span class="numberCircle">' );
	print_r( $users->get_total() );
    print_r( '</span>' );
}

function woocl_has_bought() {
    global $wpdb;
    $count = 0;
    $bought = false;

    // Get all customer orders
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'post_type'   => 'shop_order', // WC orders post type
        'post_status' => 'wc-completed', // Only orders with status "completed"
		
			'meta_query' => array(
			// meta query takes an array of arrays, watch out for this!
				array(
				'key'     => '_customer_user',
				'value'   => '0',
				'compare' => '!='
				)
			)
    ) );

    // Going through each current customer orders
    foreach ( $customer_orders as $customer_order ) {
        $count++;
    }

    // return "true" when customer has already one order
    if ( $count > 0 ) {
        $bought = true;
    }
    return $bought;
}

//////////////////////////////////// En travail //////////////////////////////////////
function woocl_woocommerce_get_users_registered_today( $date='' ){
global $wpdb;

if( empty($date) )
	$date = date('Y-m-d');

$morning = new DateTime($date. ' 00:00:00');
$night = new DateTime($date.' 23:59:59'); 
$m = $morning->format('Y-m-d H:i:s');
$n = $night->format('Y-m-d H:i:s');

$sql = $wpdb->prepare("SELECT wp_users.* FROM wp_users WHERE 1=1 AND CAST(user_registered AS DATE) BETWEEN %s AND %s ORDER BY user_login ASC",$m,$n);

$users = $wpdb->get_results($sql);
echo count_users( $users );
}


//////////////////////////////////// En travail //////////////////////////////////////
 
function bbloomer_echo_product_ids() {
	$all_ids = get_posts( array(
		'post_type' => 'product',
		'numberposts' => -1,
		'post_status' => 'publish',
		'fields' => 'ids',
	) );
	foreach ( $all_ids as $id ) {
		return $id;
	}
}


add_shortcode( 'product_purchases', 'woocl_woocommerce_user_logged_in_product_bought' );
function woocl_woocommerce_user_logged_in_product_bought( $atts ) {
    
	// GET PRODUCT ID FROM SHORTCODE
	$atts = shortcode_atts( array(
	'id' => ''
	), $atts );
    
   // GET CURRENT USER ORDERS
   $current_user = wp_get_current_user();   
   $customer_orders = wc_get_orders(
		array(
			'limit'    => -1,
			'status'   => array('completed'),
			'customer' => get_current_user_id(),
		)
   );
    
   // LOOP THROUGH ORDERS AND SUM QUANTITIES PURCHASED
   $count = 0;
   foreach ( $customer_orders as $customer_order ) {
      $order = wc_get_order( $customer_order->get_id() );
      $items = $order->get_items();
      foreach ( $items as $item ) {
         $product_id = $item->get_product_id();
         if ( $product_id == $atts['id'] ) {
            $count = $count + absint( $item['qty'] ); 
         }
      }
   }
    
   // RETURN HTML
   return '' . $count . '';
    
}

//////////////////////////////////////////////////////////////////////////////////////////////////
// Average number of products purchased per customer
//////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_display_average_products_per_order() {
    global $wpdb;

    // Requête pour récupérer la somme de toutes les quantités et le nombre total de commandes
    $query = "
        SELECT SUM(meta.meta_value) as total_quantity, COUNT(distinct items.order_id) as total_orders
        FROM {$wpdb->prefix}woocommerce_order_itemmeta as meta
        JOIN {$wpdb->prefix}woocommerce_order_items as items ON meta.order_item_id = items.order_item_id
        WHERE meta.meta_key = '_qty'
        AND items.order_item_type = 'line_item'
    ";

    $results = $wpdb->get_row($query);

    if (!is_null($results->total_orders) && $results->total_orders > 0) {
        $average = $results->total_quantity / $results->total_orders;
        echo '' . round($average, 2);
    } else {
        echo '0';
    }
}


//////////////////////////////////////////////////////////////////////////////////
// Tableau Customer Segment
//////////////////////////////////////////////////////////////////////////////////

function woocl_segment_customers() {
    global $wpdb;

    // Préparation des requêtes pour récupérer les données combinées des clients
    $query = "
        SELECT 
            u.ID AS customer_id,
            COUNT(o.ID) AS frequency,
            AVG(om.meta_value) AS average_order_value,
            MAX(o.post_date) AS last_order_date,
            MAX(CASE WHEN um.meta_key = 'billing_first_name' THEN um.meta_value END) AS first_name,
            MAX(CASE WHEN um.meta_key = 'billing_last_name' THEN um.meta_value END) AS last_name,
            MAX(CASE WHEN um.meta_key = 'billing_city' THEN um.meta_value END) AS city
        FROM 
            {$wpdb->users} u
        JOIN 
            {$wpdb->postmeta} pm ON u.ID = pm.meta_value
        JOIN 
            {$wpdb->posts} o ON pm.post_id = o.ID AND o.post_type = 'shop_order'
        JOIN 
            {$wpdb->postmeta} om ON o.ID = om.post_id AND om.meta_key = '_order_total'
        JOIN 
            {$wpdb->usermeta} um ON u.ID = um.user_id
        WHERE 
            pm.meta_key = '_customer_user' AND pm.meta_value > '0'
            AND (um.meta_key IN ('billing_first_name', 'billing_last_name', 'billing_city'))
        GROUP BY 
            u.ID
    ";

    $results = $wpdb->get_results($query);

    // Préparation du tableau des clients segmentés
    $segmented_customers = array_map(function($result) {
        return [
            'customer_id' => $result->customer_id,
            'frequency' => $result->frequency,
            'average_order_value' => floatval($result->average_order_value),
            'last_order_date' => $result->last_order_date,
            'first_name' => $result->first_name,
            'last_name' => $result->last_name,
            'city' => $result->city,
        ];
    }, $results);

    return $segmented_customers;
}




//////////////////////////////////////////////////////////////////////////////////
// Top 15 customers based on a combination of segmentation criteria (e.g. purchase frequency, average order value)
//////////////////////////////////////////////////////////////////////////////////

function display_top_segmented_customers_as_table($segmented_customers) {
    // Tri des clients par fréquence puis par valeur moyenne des commandes
    usort($segmented_customers, function($a, $b) {
        if ($a['frequency'] == $b['frequency']) {
            return $b['average_order_value'] <=> $a['average_order_value'];
        }
        return $b['frequency'] <=> $a['frequency'];
    });

    // Limiter l'affichage aux 15 premiers clients
    $top_customers = array_slice($segmented_customers, 0, 15);

     // Début du tableau HTML avec styles inline ajoutés
    $html = '<table border="1" style="width: 100%; border-collapse: collapse; border: 1px solid #ddd; font-family: Arial, sans-serif;">';
    $html .= '<thead>';
    $html .= '<tr style="background-color: #f2f2f2;">';
    $html .= '<th style="padding: 8px; border: 1px solid #ddd;text-align:center;font-size:15px;">Client ID</th>';
    $html .= '<th style="padding: 8px; border: 1px solid #ddd;text-align:center;font-size:15px;">Nom</th>';
    $html .= '<th style="padding: 8px; border: 1px solid #ddd;text-align:center;font-size:15px;">Prénom</th>';
    $html .= '<th style="padding: 8px; border: 1px solid #ddd;text-align:center;font-size:15px;">Ville</th>';
    $html .= '<th style="padding: 8px; border: 1px solid #ddd;text-align:center;font-size:15px;">Fréquence d\'achat</th>';
    $html .= '<th style="padding: 8px; border: 1px solid #ddd;text-align:center;font-size:15px;">Valeur Moyenne des Commandes</th>';
    $html .= '<th style="padding: 8px; border: 1px solid #ddd;text-align:center;font-size:15px;">Date du Dernier Achat</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';
	
    // Parcourir chaque client segmenté et ajouter les données au tableau
   foreach ($top_customers as $customer_id => $data) {
		// Supposant que $customer_id est l'ID de l'utilisateur
		$user_info = get_userdata($customer_id);

		$html .= '<tr>';
        $html .= '<td style="padding: 8px; border: 1px solid #ddd;font-size:15px;">' . htmlspecialchars ($data['customer_id']) . '</td>';
        $html .= '<td style="padding: 8px; border: 1px solid #ddd;font-size:15px;">' . htmlspecialchars($data['last_name']) . '</td>';
        $html .= '<td style="padding: 8px; border: 1px solid #ddd;font-size:15px;">' . htmlspecialchars($data['first_name']) . '</td>';
        $html .= '<td style="padding: 8px; border: 1px solid #ddd;font-size:15px;">' . htmlspecialchars($data['city']) . '</td>';
        $html .= '<td style="padding: 8px; border: 1px solid #ddd;font-size:15px;">' . htmlspecialchars($data['frequency']) . '</td>';
        $html .= '<td style="padding: 8px; border: 1px solid #ddd;font-size:15px;">' . htmlspecialchars(number_format($data['average_order_value'], 2)) . '</td>';
        $html .= '<td style="padding: 8px; border: 1px solid #ddd;font-size:15px;">' . htmlspecialchars($data['last_order_date']) . '</td>';
        $html .= '</tr>';
    }

    $html .= '</tbody>';
    $html .= '</table>';

    echo $html;
}


// Supposons que $segmented_customers contient déjà les données segmentées des clients
// display_segmented_customers_as_table($segmented_customers);


//////////////////////////////////////////////////////////////////////////////////
// Customer Account show all products bought + statistics
//////////////////////////////////////////////////////////////////////////////////

class Woocl_Customers_Products_Statistics {
    // Constructeur
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
		add_filter('woocommerce_account_menu_items', [$this, 'themespress_account_menu_items'], 10, 1);
        add_action('init', [$this, 'themespress_add_my_account_endpoint']);
        add_action('woocommerce_account_products_endpoint', [$this, 'themespress_products_endpoint_content']);
        add_filter('woocommerce_account_menu_items', [$this, 'themespress_account_order']);
    }
	
	public function enqueue_scripts() {
		wp_enqueue_script('simple-load-more', WOOCL_URL . 'framework/js/jquery.simpleLoadMore.min.js', array('jquery'), '1.0', true);
		wp_add_inline_script('simple-load-more', "
			jQuery(document).ready(function($) {
				$('.table').simpleLoadMore({
					item: 'tr',
					count: 6
				});
			});
		");
	}
	
	public function show_product_customer() {
		// Obtient le chemin complet du dossier du thème actif
		$theme_path = get_stylesheet_directory();

		// Utilise basename pour obtenir le nom du dossier du thème à partir du chemin
		$theme_name = basename($theme_path);
		?>
		
		<style>
			.load-more__btn-wrap {
				display: inline-block; /* Nécessaire pour appliquer padding et margin */
				padding: 10px 20px; /* Taille du bouton */
				background-color: #f95b26; /* Couleur de fond principale */
				text-decoration: none; /* Aucun soulignement du texte */
				border-radius: 5px; /* Bords arrondis du bouton */
				transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Transition pour hover */
				border: none; /* Pas de bordure */
				cursor: pointer; /* Curseur pointeur pour indiquer qu'il est cliquable */
				box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Ombre pour un effet de profondeur */
			}
			.load-more__btn-wrap a.load-more__btn,
			.load-more__btn-wrap a.load-more__btn:hover,
			.load-more__btn-wrap a.load-more__btn:active,
			.load-more__btn-wrap a.load-more__btn:focus {
				color:white
			}
			.load-more__btn-wrap {
				text-align: center; /* Centrer le bouton dans le div */
				margin: 20px 0; /* Espacement autour du div pour séparation visuelle */
			}
		</style>
	   
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th><?php _e('Product Name', $theme_name); ?></th>
						<th><?php _e('Price', $theme_name); ?></th>
						<th><?php _e('Purchase Date', $theme_name); ?></th>
						<th><?php _e('Order Number', $theme_name); ?></th>
						<th><?php _e('Quantity Purchased', $theme_name); ?></th>
						<th><?php _e('Stock', $theme_name); ?></th> <!-- Nouvelle colonne Stock -->
						<th><?php _e('Action', $theme_name); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$user_id = get_current_user_id();
					$customer_orders = wc_get_orders(array(
						'customer_id' => $user_id,
						'status' => 'completed',
						'limit' => -1,
					));

					if (!empty($customer_orders)) {
						foreach ($customer_orders as $customer_order) {
							$order_date = $customer_order->get_date_created()->date('Y-m-d');
							$order_number = $customer_order->get_order_number();

							foreach ($customer_order->get_items() as $item_id => $item) {
								$product_id = $item->get_product_id();
								$product = $item->get_product();
								if ($product && $product->is_type('simple')) {
									$in_stock = $product->is_in_stock() ? __('Yes', 'your-text-domain') : __('No', 'your-text-domain');
									$cart_item_key = WC()->cart->generate_cart_id($product_id);
									$in_cart = WC()->cart->find_product_in_cart($cart_item_key);
									$reorder_url = wc_get_cart_url() . '?add-to-cart=' . $product_id;
									?>
									<tr>
										<td><?php echo esc_html($product->get_name()); ?></td>
										<td><?php echo $product->get_price_html(); ?></td>
										<td><?php echo esc_html($order_date); ?></td>
										<td><?php echo esc_html($order_number); ?></td>
										<td><?php echo esc_html($item->get_quantity()); ?></td>
										<td><?php echo esc_html($in_stock); ?></td> <!-- Affiche si le produit est en stock -->
										<td>
											<?php if ($product->is_in_stock()): // Condition pour afficher les actions si le produit est en stock ?>
												<?php if (!$in_cart): ?>
													<a href="<?php echo esc_url($reorder_url); ?>" class="btn btn-primary"><?php _e('Reorder', 'your-text-domain'); ?></a>
												<?php else: ?>
													<?php _e('Already in your cart', 'your-text-domain'); ?>
												<?php endif; ?>
											<?php endif; ?>
										</td>
									</tr>
									<?php
								}
							}
						}
					} else {
						?>
						<tr>
							<td colspan="7"><?php _e('No products found or ordered products no longer exist', $theme_name); ?></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
		<?php
	}


    // Ajoute un onglet au menu du compte client
    public function themespress_account_menu_items($items) {
        $items['products'] = __('Products', 'woocommerce');
        return $items;
    }

    // Initialise un nouvel endpoint pour WooCommerce
    public function themespress_add_my_account_endpoint() {
        add_rewrite_endpoint('products', EP_PAGES);
    }

    // Affiche le contenu de l'endpoint
    public function themespress_products_endpoint_content() {
        echo '<h3><i class="fab fa-product-hunt"></i> My ordered products</h3>';
        $this->show_product_customer();
    }

    // Vérifie si un certain endpoint est actif
    public function themespress_is_endpoint($endpoint = false) {
        global $wp_query;
        if (!$wp_query) {
            return false;
        }
        return isset($wp_query->query[$endpoint]);
    }

    // Personnalise l'ordre des éléments du menu du compte client
    public function themespress_account_order() {
        $themespressorder = array(
            'dashboard' => __('Dashboard', 'woocommerce'),
            'orders' => __('Orders', 'woocommerce'),
            'products' => __('Products', 'woocommerce'),
            'downloads' => __('Downloads', 'woocommerce'),
            'edit-address' => __('Addresses', 'woocommerce'),
            'payment-methods' => __('Payment Methods', 'woocommerce'),
            'edit-account' => __('Account Details', 'woocommerce'),
            'customer-logout' => __('Logout', 'woocommerce'),
        );
        return $themespressorder;
    }
}

/////////////////////////////////// Customers Cart /////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

class woocl_customers_cart {
    public function __construct() {
        add_shortcode('woocl_customers_cart', array($this, 'display_customers_cart'));
    }

    public function get_customers_cart() {
        global $wpdb;

        // Query to get all users with session data
        $query = "
            SELECT user_id, meta_value as session_data
            FROM {$wpdb->prefix}usermeta
            WHERE meta_key = '_woocommerce_persistent_cart_" . get_current_blog_id() . "'
            AND meta_value != ''
        ";

        $results = $wpdb->get_results($query, ARRAY_A);

        $customers_cart = array();

        foreach ($results as $result) {
            $user_id = $result['user_id'];
            $session_data = maybe_unserialize($result['session_data']);
            if (!empty($session_data) && isset($session_data['cart'])) {
                $cart_items = $session_data['cart'];
                foreach ($cart_items as $cart_item) {
                    $product_id = $cart_item['product_id'];
                    $quantity = $cart_item['quantity'];

                    if (!isset($customers_cart[$user_id])) {
                        $customers_cart[$user_id] = array();
                    }

                    if (!isset($customers_cart[$user_id][$product_id])) {
                        $customers_cart[$user_id][$product_id] = 0;
                    }

                    $customers_cart[$user_id][$product_id] += $quantity;
                }
            }
        }

        return $customers_cart;
    }

    public function display_customers_cart() {
        $customers_cart = $this->get_customers_cart();

        ob_start();
        ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Produits dans le panier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($customers_cart)): ?>
                        <?php foreach ($customers_cart as $user_id => $cart_items): ?>
                            <?php
                            $user_info = get_userdata($user_id);
                            $user_name = $user_info->display_name;
                            ?>
                            <tr>
                                <td><?php echo esc_html($user_name); ?></td>
                                <td>
                                    <ul>
                                        <?php foreach ($cart_items as $product_id => $quantity): ?>
                                            <?php
                                            $product = wc_get_product($product_id);
                                            if ($product) {
                                                $product_name = $product->get_name();
                                            ?>
                                                <li><?php echo esc_html($product_name); ?> (<?php echo esc_html($quantity); ?>)</li>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">Aucun client n'a de produits dans son panier.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php
        return ob_get_clean();
    }
}

// Initialize the class
new woocl_customers_cart();

