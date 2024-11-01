<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Show list last orders content //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function woocl_get_list_products_orders_last_version() {
		global $woocommerce;
		// 0 today
		$filters = array(
		'post_type' => 'shop_order',
		'posts_per_page' => -1, // or -1 for all
		);

		$loop = new WP_Query($filters);

		
		echo'<div class="table-responsive">';
			
			echo'<table class="table">';
				
				echo'<tr>';
				echo'<th>'; _e('Date', 'woo-classement'); '</th>';
				echo'<th>'; _e('Product ID', 'woo-classement'); '</th>';
				echo'<th>'; _e('Product Name', 'woo-classement'); '</th>';
				echo'<th>'; _e('Product Type', 'woo-classement');'</th>';
				//echo'<th>'; _e('Shipping Cost', 'woocommerce-classement');'</th>';
				echo'</tr>';
		
		
		        while ($loop->have_posts()) {
				$loop->the_post();
				$order = new WC_Order($loop->post->ID);
			   
					foreach ($order->get_items() as $key => $lineItem) {

						echo'<tr>';
			            echo'<td>'; echo the_time('d/m/Y'); '</td>';
						echo'<td>' . '' . $lineItem['product_id'] . '</td>';
						echo'<td>' . '' . $lineItem['name'] . '</td>';
						echo'<td>'; if ($lineItem['variation_id']) {
						_e ('Variable Product', 'woo-classement') . '<br>';
						} 
						else {
						_e ('Simple Product', 'woo-classement') . '<br>';
						}; '</td>';
						
						//echo'<td>';
				        // echo $order->calculate_shipping() . '&nbsp;' . get_woocommerce_currency_symbol();
						//'</td>';

						echo'</tr>'; 
			
					}
				}
				
                echo'</table>';
		   
		echo'</div>';
		
		echo'<div class="via-woocommerce-classement-clear"></div>';
}


function woocl_get_list_products_orders_new_version() {
	
  $args = array(
  'limit' => -1,
  'type' => array( 'shop_order' )
  );

  $orders = wc_get_orders( $args );

  ob_start();

  if( $orders ){ ?>

    <div class="table-responsive">
							
		<table id="datatable-getlistproductsordersnewversion" class="table table-striped table-bordered">
		
			<thead>
			
				<tr>
					<th><?php _e('Date', 'woo-classement'); ?></th>
					<th><?php _e('Product ID', 'woo-classement'); ?></th> 
					<th><?php _e('Product Name', 'woo-classement'); ?></th>
					<th><?php _e('Product Type', 'woo-classement'); ?></th>
				</tr>
				
			</thead>
			
			<tbody>     

			  <?php 
				global $product;
				foreach( $orders as $order ) {
					
				$order_id = $order->ID;
				$order = new WC_Order($order_id);
				$products = $order->get_items();

				foreach($products as $product){
			
			  ?>
		 

				<tr>
					
					<td>
						 <?php echo $order->order_date; ?>
					</td> 
					
					<td>
						 <?php echo $product['product_id']; ?>
					</td>
					
					<td>
						 <?php echo $product['name']; ?> 
					</td>
					
					<td>
						 <?php 
						if ($product['variation_id']) {
						_e ('Variable Product', 'woo-classement');
						} 
						else {
						_e ('Simple Product', 'woo-classement') . '<br>';
						} 
						?>
					</td>
										
					
					
				</tr> 

				<?php } } ?>
			
			</tbody>
					
	  </table>

</div>

<div class="via-woocommerce-classement-clear"></div>
   
  <?php }

  return ob_get_clean();
		

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                              // Get all orders list //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		
	
function woocl_list_orders_all($status) { 

  $args = array(
        'limit' => -1,
        'status' => array($status),
        'type' => array( 'shop_order' )
  );

  $orders = wc_get_orders( $args );

  ob_start(); 
  
  ?>

   <?php if( $orders ){ ?>

   <div class="table-responsive">
		
		<table id="datatable-listordersall" class="table table-striped table-bordered">
		
			<thead>
			
				<tr>
                    <th><?php _e('Order ID', 'woo-classement'); ?></th>
					<th><?php _e('Date', 'woo-classement'); ?></th>
					<th><?php _e('E-mail / Tel', 'woo-classement'); ?></th>
					<th><?php _e('Product', 'woo-classement'); ?></th>
					<th><?php _e('Weight', 'woo-classement'); ?></th>
					<th><?php _e('Shipping Cost', 'woo-classement'); ?></th>
					<th><?php _e('Total Tax', 'woo-classement'); ?></th>
					<th><?php _e('Price', 'woo-classement'); ?></th>
					<th><?php _e('Payment Method / Status', 'woo-classement'); ?></th>
				</tr>
				
			</thead>
			
			<tbody>     

            <?php foreach( $orders as $order ) { ?>

			<tr>
				
	            <td>
						<a href="<?php echo esc_url( home_url('/' ) ); ?>wp-admin/post.php?post=<?php echo $order->id; ?>&action=edit" target="_blank">
						<?php echo $order->id; ?></a>
				</td>
				
				<td>
				
					<?php if ($order->order_date) : ?><?php echo $order->order_date; ?><?php endif; ?> 
					
				</td> 
				
				<td>
					<?php if ($order->billing_email) : ?><?php echo $order->billing_email; ?>
					<?php endif; ?>
					<?php 
					 // Tel
					 if ($order->billing_phone) : ?><?php echo $order->billing_phone; ?>
					 <?php endif; ?>
				</td> 
				
				<td>
					<?php
						// Product Name
					   if (sizeof($order->get_items())>0)   { foreach($order->get_items() as $item) 
					   { $_product = get_product( $item['product_id'] ); echo '' . $item['name'] . '';  } }
					?>
				</td>                   
				
				<td>
					<?php echo via_classement_woocommerce_order_weight(); ?>
				</td>
				
				<td>
				    <?php 
					// The purchase value + the price format
					if ($order->total_shipping): $totalshipping=($order->total_shipping);?>
					<?php echo $finaltotaltax=number_format($totalshipping, 2, '.', '.'); ?>
					<?php echo get_woocommerce_currency_symbol(); ?>
					<?php endif; ?> 
				</td>
				
				<td>
					<?php 
					// The purchase value + the price format
					if ($order->total_tax): $totaltax=($order->total_tax);?>
					<?php echo $finaltotaltax=number_format($totaltax, 2, '.', '.'); ?>
					<?php echo get_woocommerce_currency_symbol(); ?>
					<?php endif; ?>
				</td>
				
				<td>
					<?php 
					// The purchase value + the price format
					if ($order->order_total): $priceformat=($order->order_total);?>
					<?php echo $finalprice=number_format($priceformat, 2, '.', '.'); ?>
					<?php echo get_woocommerce_currency_symbol(); ?>
					<?php endif; ?>
				</td>
				
				<td>
					<?php // Displays the status of the client request
					if ($order->status) : ?>
					 <?php echo ucfirst($order->payment_method); ?>
					 <?php endif; ?>
					 <?php // Displays the status of the client request
					 if ($order->status) : ?><?php echo ucfirst($order->status); ?>
					 <?php endif; ?>
				</td>
				
			</tr> 
	  
	  <?php } ?>
	  
	  </tbody>
					
	  </table>
	  
</div>

<div class="via-woocommerce-classement-clear"></div>
   
  <?php }

  return ob_get_clean();

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                              // Get customer list results orders //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
function woocl_list_customers_results() { 
        global $wpdb;
		$args = array(
		'role'       => 'customer',
		);

		$blogusers = get_users( $args );
		
		$options = get_option('via_woocommerce_classement_settings');
	    $number_of_orders = $options ['via_woocommerce_classement_users_loyal_count'];;
		
		echo'<div class="table-responsive">';
			
			echo'<table id="datatable-listcustomersresults" class="table table-striped table-bordered">';
			
			echo'<thead>';
				echo'<tr>';
					echo'<th>'; _e('Customer since', 'woo-classement'); '</th>';
					echo'<th>'; _e('Name', 'woo-classement'); '</th>';
					echo'<th>'; _e('Surname', 'woo-classement');'</th>';
					//echo'<th>'; _e('Country', 'woo-classement'); '</th>';
					echo'<th>'; _e('City', 'woo-classement'); '</th>';
					echo'<th>'; _e('Phone Number', 'woo-classement'); '</th>';
					echo'<th>'; _e('Email', 'woo-classement'); '</th>';
					echo'<th>'; _e('Count Orders', 'woo-classement'); '</th>';
					echo'<th>'; _e('Total Spent', 'woo-classement'); '</th>';
					echo'<th>'; _e('Loyal Customer', 'woo-classement'); '</th>';
				echo'</tr>';
			echo'</thead>';
			 
			echo'<tbody>';
			
				// Array of WP_User objects.
				foreach ( $blogusers as $user ) {
				$countcustomer = wc_get_customer_order_count( $user->ID );
				
				echo'<tr>';
					echo'<td>'; 
						$udata = get_userdata( $user->ID );
						$registered = $udata->user_registered;
						$message = '' . date( 'Y-m-d', strtotime( $registered ) );
						echo $message; 
					'</td>';
					echo'<td>' . $user->billing_last_name . '</td>';
					echo'<td>' . $user->billing_first_name . '</td>';
					//echo'<td>' . $user->billing_country . '</td>';
					echo'<td>' . $user->billing_city . '</td>';
					echo'<td>' . $user->billing_phone . '</td>';
					echo'<td>' . $user->user_email . '</td>';
					echo'<td>' . wc_get_customer_order_count($user->ID) . '</td>';
					echo'<td>' . wc_price(wc_get_customer_total_spent($user->ID)) . '</td>';
					echo'<td>'; if ($number_of_orders <= $countcustomer) {
					_e('Loyal Customer','woo-classement');
					}
					else {
					_e('Not again','woo-classement');
					} '</td>'; 
				echo'</tr>'; 
		
				}
				
			echo'<tbody>';
			
			echo'</table>';
				
		echo'</div>';
	
}

function woocl_list_customers() { 
		
		global $wpdb;
		
		$blogusers = get_users( 'role=customer' );
		
		echo '<div class="table-responsive">';
				
				echo'<table id="datatable-paiement" class="table table-striped table-bordered">';
			
				echo'<thead>';
					echo'<tr>';
						echo'<th>'; _e('Customer since', 'woo-classement'); '</th>'; 
						echo'<th>'; _e('Surname', 'woo-classement');'</th>';
						echo'<th>'; _e('Name', 'woo-classement'); '</th>';
						echo'<th>'; _e('City', 'woo-classement'); '</th>';
						echo'<th>'; _e('Phone Number', 'woo-classement'); '</th>';
						echo'<th>'; _e('Email', 'woo-classement'); '</th>';
						echo'<th>'; _e('Customer Bought', 'woo-classement'); '</th>';
						echo'<th>'; _e('Orders Count', 'woo-classement'); '</th>';
						echo'<th>'; _e('Money Spent', 'woo-classement'); '</th>';
						echo'<th>'; _e('Count Logins', 'woo-classement'); '</th>';
						//echo'<th>'; _e('Customer IP', 'woo-classement'); '</th>';
					echo'</tr>';
				echo'</thead>';
				
				echo'<tbody>';
				
				// Array of WP_User objects.
				foreach ( $blogusers as $user ) {
				$countcustomer = wc_get_customer_order_count( $user->ID );
					echo'<tr>';
						echo'<td>'; 
							$udata = get_userdata( $user->ID );
							$registered = $udata->user_registered;
							$message = '' . date( 'Y-m-d', strtotime( $registered ) );
							echo $message; 
						'</td>';
						echo'<td>' . $user->billing_last_name . '</td>';
						echo'<td>' . $user->billing_first_name . '</td>';
						echo'<td>' . $user->billing_city . '</td>';
						echo'<td>' . $user->billing_phone . '</td>';
						echo'<td>' . $user->user_email . '</td>';
						echo'<td>';
						if ( $user->paying_customer == 1 ) {
							echo 'Yes';
						} 
						else {
							echo 'No';
						}
						echo '</td>';
						echo'<td>' . $user->_order_count . '</td>';
						echo'<td>' . wc_get_customer_total_spent( $user->ID ) . '&nbsp;' . get_woocommerce_currency_symbol() . '</td>';
						echo'<td>';
							if ($user->user_count_connections == 0) { 
							echo '0';
							}
							else { 
							echo $user->user_count_connections;
							}
					   '</td>';
					   
					echo'</tr>'; 
				} 
				
				echo'</tbody>';
				
				echo'</table>';
				
			echo'</div>';
	
}


function woocl_list_coupons_by_title() {
	global $wpdb;
	$args = array(
		'posts_per_page'   => -1,
		'orderby'          => 'title',
		'order'            => 'ASC',
		'post_type'             => 'shop_coupon',
		'post_status'           => 'any'
	);
		
	$coupons = get_posts( $args );
	
    echo'<div class="table-responsive">';
			
			echo'<table class="table">';
				
				echo'<tr>';
					echo'<th>'; _e('Expiration Date', 'woo-classement'); '</th>';
					echo'<th>'; _e('Code', 'woo-classement'); '</th>';
					echo'<th>'; _e('Title', 'woo-classement'); '</th>';
					echo'<th>'; _e('Description', 'woo-classement'); '</th>';
					echo'<th>'; _e('Coupon Amount', 'woo-classement'); '</th>';
					echo'<th>'; _e('Discount Type', 'woo-classement'); '</th>';
					echo'<th>'; _e('Minimun Amount', 'woo-classement'); '</th>';
					echo'<th>'; _e('Usage Limit', 'woo-classement'); '</th>';
				echo'</tr>';
				
				foreach ( $coupons as $coupon ) {
					echo'<tr>';
						
						echo'<td>'; 
							
							if( $coupon->expiry_date == ''){
							    echo 'N/A';
							}
							else {
							    echo $coupon->expiry_date;
							} 
						
						'</td>';
						echo'<td>' . $coupon->post_name . '</td>';
						echo'<td>' . ucfirst ( $coupon->post_title ) . '</td>';
						echo'<td>';
						    
							if( $coupon->post_excerpt == ''){
								 echo 'N/A';
							}
							else {
								echo $coupon->post_excerpt;
							}
						
						'</td>';
						echo'<td>'; _e( $coupon->coupon_amount ); '</td>';
						echo'<td>'; 
						
							if($coupon->discount_type == 'percent') {
								echo '%';
							}
							elseif($coupon->discount_type == 'fixed_cart') {
								echo 'Fixed Cart';
							}
							else {
								echo 'Fixed Product';
                            }
						
						'</td>';
						echo'<td>'; 
						
							if ($coupon->minimum_amount == 0)  {
								 echo 'N/A';
							}
							else {
								echo $coupon->minimum_amount;
							}
						
					    '</td>';
						echo'<td>'; 
                            
							if ($coupon->usage_limit == 0)  {
								 echo 'N/A';
							}
							else {
								echo $coupon->usage_limit;
							}

						'</td>';
						
					echo'</tr>'; 
				}
				
				echo'</table>';
				
			echo'</div>';
		
	echo'<div class="via-woocommerce-classement-clear"></div>';
}


function woocl_last_customer_list_connection($role) { 
	global $wpdb;
	$args = array(
		'role'         => $role,
		'meta_key' => 'user_count_connections',
		'orderby'      => 'meta_value_num', // registered date
		'order'        => 'DESC', // last registered goes first
		'number'       => 5 // limit to the last one, not required
	);

	$blogusers = get_users( $args );
		
		echo'<div class="table-responsive">';
			
			echo'<table id="datatable-customerlistconnection" class="table table-striped table-bordered">';
				
				echo'<thead>';
					echo'<tr>';
						echo'<th>'; _e('Name', 'woo-classement'); '</th>';
						echo'<th>'; _e('Surname', 'woo-classement');'</th>';
						echo'<th>'; _e('City', 'woo-classement'); '</th>';
						echo'<th>'; _e('Email', 'woo-classement'); '</th>';
						echo'<th>'; _e('Count Logins', 'woo-classement'); '</th>';
					echo'</tr>';
				echo'</thead>';
				
				echo'<tbody>';
				
					// Array of WP_User objects.
					foreach ( $blogusers as $user ) {
					$countcustomer = wc_get_customer_order_count( $user->ID );
					
					echo'<tr>';
						echo'<td>' . $user->billing_last_name . '</td>';
						echo'<td>' . $user->billing_first_name . '</td>';
						echo'<td>' . $user->billing_city . '</td>';
						echo'<td>' . $user->user_email . '</td>';
						echo'<td>'; 
							if ($user->user_count_connections == 0) { 
							echo '0';
							}
							else { 
							echo $user->user_count_connections;
							}
						'</td>';
						
					echo'</tr>'; 
			
					}
                echo'</tbody>';					
				
				echo'</table>';
				
		echo'</div>';
		
		echo'<div class="via-woocommerce-classement-clear"></div>';

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                              // Best sellers Count sales //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	

function woocl_list_best_sellers_count($key) { ?>
			
			<?php
			global $wpdb;
			$i = 1;
			$args = array(
			'post_type' => 'product',
			'meta_key' => 'total_sales',
			'posts_per_page' => -1,
			'orderby' => 'meta_value_num',
				'meta_query' => array(
				'relation' => 'OR',
					array(
						'key' => $key,
						'value' => 0,
						'compare' => '>'
					),
					array(
						'key' => '_line_total',
						'value' => 0,
						'compare' => '>'
					)
				)
			);

			$loop = new WP_Query( $args );
			?>
			
			
			<div class="table-responsive">
				
			<table class="table">
							
			<thead>

				<tr>
					<th><?php _e('Product Name', 'woo-classement'); ?></th>
					<th><?php _e('Units Sold', 'woo-classement'); ?></th>
					<th><?php _e('Total Sales', 'woo-classement'); ?></th>
					<th><?php _e('URL Shop Product', 'woo-classement'); ?></th>
					<th><?php _e('URL Admin Product', 'woo-classement'); ?></th>
				</tr>
				
			</thead>

			<tbody>     
			
			<?php
			while ( $loop->have_posts() ) : $loop->the_post(); 
			global $product;
            $id = $product->id;			
			$url = home_url();
			?>
			
			<tr>
				
				<td>
					<?php echo $i; ?><?php _e('&nbsp;-&nbsp;'); ?><?php the_title(); ?>
				</td>
				
				<td>
					<?php  
					$units_sold = get_post_meta( $product->id, 'total_sales', true ); 
						if ($units_sold > 1) {
						echo '' . sprintf( __( '%s', 'woo-classement' ), $units_sold ) . ''; 
						}
						else { 
						echo '' . sprintf( __( '%s', 'woo-classement' ), $units_sold ) . '';
					}
					?>
				</td> 
				
				<td>
					<?php  
					if ( woocl_version_check('3.0') ) { 
					$units_sold = $product->get_total_sales();
					}
					else {
					$units_sold = get_post_meta( $product->id, 'total_sales', true ); 
					}
					
					$price_sold = $product->get_price();
					
					$totalsold = $units_sold * $price_sold;
					echo number_format((float) $totalsold, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
					?>
				
				</td>
				
				<td>
					<a style="text-decoration:none" id="id-<?php the_id(); ?>" target="_blank" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('See', 'woo-classement'); ?></a>
				</td> 
				
				<td>
					<a style="text-decoration:none" id="id-<?php the_id(); ?>" target="_blank" href="<?php echo esc_url( $url ); ?>/wp-admin/post.php?post=<?php the_id(); ?>&action=edit" title="<?php the_title(); ?>"><?php _e('Edit', 'woo-classement'); ?></a>
				</td>
				
				
			</tr> 
			
			<?php $i++; endwhile; ?>
			
			<?php wp_reset_query(); ?>
			
			
			</tbody>
							
		    </table>

			</div>

<?php }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                              // Best sellers //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	

function woocl_list_best_sellers_line_total($key) { ?>
			
			<?php
			global $wpdb;
			$i = 1;
			$args = array(
			'post_type' => 'product',
			'meta_key' => 'total_sales',
			'posts_per_page' => -1,
			'orderby' => '_line_total',
			'order' => 'ASC',
				'meta_query' => array(
				'relation' => 'OR',
					array(
						'key' => 'total_sales',
						'value' => 0,
						'compare' => '>'
					),
					array(
						'key' => $key,
						'value' => 0,
						'compare' => '>'
					)
				)
			);

			$loop = new WP_Query( $args );
			?>
			
			
			<div class="table-responsive">
			
			<table class="table">

			<thead>

				<tr>
					<th><?php _e('Product Name', 'woo-classement'); ?></th>
					<th><?php _e('Units Sold', 'woo-classement'); ?></th>
					<th><?php _e('Total Sales', 'woo-classement'); ?></th>
					<th><?php _e('URL Shop Product', 'woo-classement'); ?></th>
					<th><?php _e('URL Admin Product', 'woo-classement'); ?></th>
				</tr>
				
			</thead>

			<tbody>     
			
			<?php
			while ( $loop->have_posts() ) : $loop->the_post(); 
			global $product;
            $id = $product->id;			
			$url = home_url();
			?>
			
			<tr>
				
				<td>
					<?php echo $i; ?><?php _e('&nbsp;-&nbsp;'); ?><?php the_title(); ?>
				</td>
				
				<td>
					<?php  
					$units_sold = get_post_meta( $product->id, 'total_sales', true ); 
						if ($units_sold > 1) {
						echo '' . sprintf( __( '%s', 'woo-classement' ), $units_sold ) . ''; 
						}
						else { 
						echo '' . sprintf( __( '%s', 'woo-classement' ), $units_sold ) . '';
					}
					?>
				</td> 
				
				<td>
					<?php  
					if ( woocl_version_check('3.0') ) { 
					$units_sold = $product->get_total_sales();
					}
					else {
					$units_sold = get_post_meta( $product->id, 'total_sales', true ); 
					}
					
					$price_sold = $product->get_price();
					
					$totalsold = $units_sold * $price_sold;
					echo number_format((float) $totalsold, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
					?>
				
				</td>
				
				<td>
					<a style="text-decoration:none" id="id-<?php the_id(); ?>" target="_blank" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('See', 'woo-classement'); ?></a>
				</td> 
				
				<td>
					<a style="text-decoration:none" id="id-<?php the_id(); ?>" target="_blank" href="<?php echo esc_url( $url ); ?>/wp-admin/post.php?post=<?php the_id(); ?>&action=edit" title="<?php the_title(); ?>"><?php _e('Edit', 'woo-classement'); ?></a>
				</td>
				
			</tr> 
			
			<?php $i++; endwhile; ?>
			
			<?php wp_reset_query(); ?>
			
			
			</tbody>
							
		    </table>

			</div>

<?php }



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                              // Enqueue script wp footer for accordeon jquery //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
function woocl_products_get_accordeon_script() { 
?>	
<script>
var acc = document.getElementsByClassName("woocommerceclassementaccordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  }
}
</script>
<?php
}
add_action( 'admin_footer', 'woocl_products_get_accordeon_script', 99 );