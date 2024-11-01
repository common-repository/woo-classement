<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                             // Functions Coupons //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_total_coupons() {
	?>
	<?php
	$semaine = new WP_Query( array( 
	'post_type' => 'shop_coupon', 
	'post_status' => array ('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash')
	));
	$num = $semaine->post_count; 
	echo $num;
}

function woocl_total_coupons_year($year) {
	?>
	<?php
	$semaine = new WP_Query( array( 
	'post_type' => 'shop_coupon', 
	'post_status' => 'publish',
	'posts_per_page'  => -1,			
	'orderby' => 'date', 
	'order' => 'DESC', 
	   'date_query' => array( 
		array( 'year' => date( $year )  
	))	
	));
	echo '<span class="numberCircle">';
	$num = $semaine->post_count; 
	echo $num;
	echo '</span>';
}


function woocl_total_coupons_graphique($year) {
	?>
	<?php
	$semaine = new WP_Query( array( 
	'post_type' => 'shop_coupon', 
	'post_status' => 'publish',
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

function woocl_total_coupons_semaine() { ?>
	<?php
	$couponsemaine = new WP_Query( array( 
	'post_type' => 'shop_coupon', 
	'post_status' => 'publish',
	'posts_per_page'  => -1,			
	'orderby' => 'date', 
	'order' => 'DESC', 
	   'date_query'     => array(
		   array(
		   'after' => '1 week ago'
		   )
	)
	));
	$num = $couponsemaine->post_count; 
	echo $num;
}

function woocl_total_coupons_jour() { ?>
	<?php
	$couponjour = new WP_Query( array( 
	'post_type' => 'shop_coupon', 
	'post_status' => 'publish',
	'posts_per_page'  => -1,			
	'orderby' => 'date', 
	'order' => 'DESC', 
	   'date_query'     => array(
		   array(
		   'day' => date( 'd' )
		   )
	)
	));
	$num = $couponjour->post_count;
	echo $num;
}

function woocl_total_coupons_en_ligne($statut) { ?>
	<?php
	$args = new WP_Query( array( 
	'post_type' => 'shop_coupon',
	'post_status' => $statut,
	));
	$num = $args->post_count; 
	echo $num;
}

function woocl_total_coupons_by_title($statut) {
	$i = 1;
	$args = array(
		'posts_per_page'   => 5,
		'orderby'          => 'title',
		'order'            => 'asc',
		'post_type'        => 'shop_coupon',
		'post_status'      => $statut,
	);
		
	$coupons = get_posts( $args );
	$coupon_names = array();
	foreach ( $coupons as $coupon ) {
		// Get the name for each coupon post
		$coupon_name = $coupon->post_title;
		array_push( $coupon_names, $coupon_name );
		echo '<span class="span-color-results">';
		echo $i . '&nbsp;-&nbsp;' . $coupon_name;
		echo '</span>';
		echo '<br />';
	$i++;
	}
}


function woocl_total_coupons_used() {
	global $wpdb;
	$tablename = $wpdb->prefix . 'postmeta';
	$myquery = $wpdb->get_results( "SELECT * FROM $tablename WHERE meta_key = 'usage_count' AND meta_value > '0'", OBJECT );
	$numrows = count($myquery); //PHP count()
	if ($numrows == '0') {
	    return '0';
	}
	else {
	    return $numrows;
	}
}


function woocl_list_coupons() {
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
			
			echo'<table class="table table-striped table-dark">';
				
				echo'<thead>';
				
					echo'<tr>';
						echo'<th>'; _e('Expiration Date', 'woo-classement'); '</th>';
						echo'<th>'; _e('Code', 'woo-classement'); '</th>';
						echo'<th>'; _e('Title', 'woo-classement'); '</th>';
						echo'<th>'; _e('Description', 'woo-classement'); '</th>';
						echo'<th>'; _e('Coupon Amount', 'woo-classement'); '</th>';
						echo'<th>'; _e('Discount Type', 'woo-classement'); '</th>';
						echo'<th>'; _e('Minimun Amount', 'woo-classement'); '</th>';
						echo'<th>'; _e('Usage Limit', 'woo-classement'); '</th>';
						echo'<th>'; _e('Usage Count', 'woo-classement'); '</th>';
					echo'</tr>';
				
				echo'</thead>';
				
				echo'<tbody>';
				
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
						echo'<td>'; _e( $coupon->post_name ); '</td>';
						echo'<td>'; _e(  ucfirst ( $coupon->post_title ) ); '</td>';
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
						
						echo'<td>'; 
                            
							if ($coupon->usage_count == 0)  {
								 echo 'N/A';
							}
							else {
								echo $coupon->usage_count;
							}

						'</td>';
						
					echo'</tr>'; 
				}
				
				echo'</tbody>';
				
				echo'</table>';
				
			echo'</div>';
		
	echo'<div class="via-woocommerce-classement-clear"></div>';
}

