<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valuyearsviews = wp_cache_get( 'products_years_views_mini' );
if ( false === $valuyearsviews ) {
	//create array variable
	$valuyearsviews = [];
	
	$year = date('Y');
	$yearone = date('Y', strtotime('-1 year'));
	$yeartwo = date('Y', strtotime('-2 year'));
	
	$yearviewstwo = woocl_get_product_views_products_bydate_peitycharts($yeartwo);
    $yearviewsone = woocl_get_product_views_products_bydate_peitycharts($yearone);
	$yearviews = woocl_get_product_views_products_bydate_peitycharts($year);

	//pushing some variables to the array so we can output something in this example.
	
	$valuyearsviews[] = array("years" => $yearviewstwo);
	$valuyearsviews[] = array("years" => $yearviewsone);
	$valuyearsviews[] = array("years" => $yearviews);
	
	wp_cache_set( 'products_years_views_mini', $valuyearsviews );
} 

//counting the length of the array
$countArrayLengthyearsviews = count($valuyearsviews);

?>

<span data-plugin="peity-bar" data-colors="#bd1e51,#ffba00" data-width="200" data-height="40">
	<?php
    $resultssalesyearsviews = "";
    for($i=0;$i<$countArrayLengthyearsviews;$i++){
	$resultssalesyearsviews .= $valuyearsviews[$i]['years'] . ",";
	}
	echo rtrim($resultssalesyearsviews, ', ');
	?>
</span>