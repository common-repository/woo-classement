<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//create array variable
global $wpdb;	
$resultspaiementsmini = wp_cache_get( 'payment_method_result_mini' );
if ( false === $resultspaiementsmini ) {
$resultspaiementsmini = $wpdb->get_results( "SELECT payment_method_title.meta_value as payment_method_title,
SUM(order_total.meta_value) as order_total,
count(*) as order_count
FROM {$wpdb->prefix}posts as posts		
LEFT JOIN  {$wpdb->prefix}postmeta as order_total ON order_total.post_id=posts.ID
LEFT JOIN  {$wpdb->prefix}postmeta as payment_method_title ON payment_method_title.post_id=posts.ID
WHERE 1=1
AND posts.post_type                  ='shop_order'
AND order_total.meta_key             ='_order_total'
AND payment_method_title.meta_key    ='_payment_method_title'
GROUP BY payment_method_title.meta_value", ARRAY_A);
wp_cache_set( 'payment_method_result_mini', $resultspaiementsmini );
} 
// Do something with $result;
$values = $resultspaiementsmini;
//counting the length of the array
$countArrayLength = count($values);	
?>
<span data-plugin="peity-line" data-fill="#3960d1" data-stroke="#169c81" data-width="100%" data-height="150">
	<?php
    $resulstordersyears = "";
    for($i=0;$i<$countArrayLength;$i++){
	$resulstordersyears .= $values[$i]['order_total'] . ",";
	}
	echo rtrim($resulstordersyears, ', ');
	?>
</span>