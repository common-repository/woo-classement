<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valumonthsorderscount = wp_cache_get( 'products_months_views_mini' );
if ( false === $valumonthsorderscount ) {
	//create array variable
	$valumonthsorderscount = [];
	
	$monthcountorders = date('Y-m');
	$monthonecountorders = date('Y-m', strtotime('-1 month'));
	$monthtwocountorders = date('Y-m', strtotime('-2 month'));
	$monththreecountorders = date('Y-m', strtotime('-3 month'));
	$monthfourcountorders = date('Y-m', strtotime('-4 month'));
	$monthfivecountorders = date('Y-m', strtotime('-5 month'));
	$monthsixcountorders = date('Y-m', strtotime('-6 month'));

	$monthsviewssixcountorders = woocl_count_orders_stats(''.$monthsixcountorders.'-01',''.$monthsixcountorders.'-31');
	$monthsviewsfivecountorders = woocl_count_orders_stats(''.$monthfivecountorders.'-01',''.$monthfivecountorders.'-31');
	$monthsviewsfourcountorders = woocl_count_orders_stats(''.$monthfourcountorders.'-01',''.$monthfourcountorders.'-31');
	$monthsviewsthreecountorders = woocl_count_orders_stats(''.$monththreecountorders.'-01',''.$monththreecountorders.'-31');
	$monthsviewstwocountorders = woocl_count_orders_stats(''.$monthtwocountorders.'-01',''.$monthtwocountorders.'-31');
	$monthsviewsonecountorders = woocl_count_orders_stats(''.$monthonecountorders.'-01',''.$monthonecountorders.'-31'); 
	$monthsviewscountorders = woocl_count_orders_stats(''.$monthcountorders.'-01',''.$monthcountorders.'-31');
	
	//pushing some variables to the array so we can output something in this example.
	$valumonthsorderscount[] = array("countordersmonths" => $monthsviewssixcountorders);
	$valumonthsorderscount[] = array("countordersmonths" => $monthsviewsfivecountorders);
	$valumonthsorderscount[] = array("countordersmonths" => $monthsviewsfourcountorders);
	$valumonthsorderscount[] = array("countordersmonths" => $monthsviewsthreecountorders);
	$valumonthsorderscount[] = array("countordersmonths" => $monthsviewstwocountorders);
	$valumonthsorderscount[] = array("countordersmonths" => $monthsviewsonecountorders);
	$valumonthsorderscount[] = array("countordersmonths" => $monthsviewscountorders);
	
	wp_cache_set( 'products_months_views_mini', $valumonthsorderscount );
} 

//counting the length of the array
$countArrayLengthmonthscountorders = count($valumonthsorderscount);

?>

<span data-plugin="peity-line" data-colors="#bd1e51,#ffba00" data-width="200" data-height="40">
	<?php
	$resultssalesmonthscountorders = "";
	for($i=0;$i<$countArrayLengthmonthscountorders;$i++){
	$resultssalesmonthscountorders .= $valumonthsorderscount[$i]['countordersmonths'] . ",";
	}
	echo rtrim($resultssalesmonthscountorders, ', ');
	?>
</span>