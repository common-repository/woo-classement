<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valudaysviews = wp_cache_get( 'products_days_views_mini' );
if ( false === $valudaysviews ) {
	//create array variable
	$valudaysviews = [];
	
	$today = date('Ymd');
	$yesterday = date('Ymd',strtotime("-1 days"));
	$yesterdayone = date('Ymd',strtotime("-2 days"));
	$yesterdaytwo = date('Ymd',strtotime("-3 days"));
	$yesterdaythree = date('Ymd',strtotime("-4 days"));
	$yesterdayfour = date('Ymd',strtotime("-5 days"));
	$yesterdayfive = date('Ymd',strtotime("-6 days"));
	$yesterdaysix = date('Ymd',strtotime("-7 days"));
	
	
	$yesterdaysixviews = woocl_get_product_views_products_bydate_peitycharts($yesterdaysix);
	$yesterdayfiveviews = woocl_get_product_views_products_bydate_peitycharts($yesterdayfive);
	$yesterdayfourviews = woocl_get_product_views_products_bydate_peitycharts($yesterdayfour);
	$yesterdaythreeviews = woocl_get_product_views_products_bydate_peitycharts($yesterdaythree);
	$yesterdaytwoviews = woocl_get_product_views_products_bydate_peitycharts($yesterdaytwo);
	$yesterdayoneviews = woocl_get_product_views_products_bydate_peitycharts($yesterdayone);
	$yesterdayviews = woocl_get_product_views_products_bydate_peitycharts($yesterday);
	$todayviews = woocl_get_product_views_products_bydate_peitycharts($today);
	

	//pushing some variables to the array so we can output something in this example.
	$valudaysviews[] = array("days" => $yesterdaysixviews);
	$valudaysviews[] = array("days" => $yesterdayfiveviews);
	$valudaysviews[] = array("days" => $yesterdayfourviews);
	$valudaysviews[] = array("days" => $yesterdaythreeviews);
	$valudaysviews[] = array("days" => $yesterdaytwoviews);
	$valudaysviews[] = array("days" => $yesterdayoneviews);
	$valudaysviews[] = array("days" => $yesterdayviews);
	$valudaysviews[] = array("days" => $todayviews);
	
	wp_cache_set( 'products_days_views_mini', $valudaysviews );
} 

//counting the length of the array
$countArrayLengthdaysviews = count($valudaysviews);

?>

<span data-plugin="peity-bar" data-colors="#6e8cd7,#ebeff2" data-width="200" data-height="40">
<?php
    $resultssalesdaysviews = "";
    for($i=0;$i<$countArrayLengthdaysviews;$i++){
	     $resultssalesdaysviews .= $valudaysviews[$i]['days'] . ",";
	}
	echo rtrim($resultssalesdaysviews, ', ');
	?>
</span>