<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valuyearscountorders = wp_cache_get( 'products_years_count_orders_mini' );
if ( false === $valuyearscountorders ) {
	//create array variable
	$valuyearscountorders = [];
	
	$countordersyear = date('Y');
	$countordersyeartwo = date('Y', strtotime('-1 year'));
	$countordersyearthree = date('Y', strtotime('-2 year'));
	$countordersyearfour = date('Y', strtotime('-3 year'));
	$countordersyearfive = date('Y', strtotime('-4 year'));
	$countordersyearsix = date('Y', strtotime('-5 year'));

    $yearviewscountorderssix = woocl_count_orders_stats(''.$countordersyearsix.'-01-01',''.$countordersyearsix.'-12-31');
	$yearviewscountordersfive = woocl_count_orders_stats(''.$countordersyearfive.'-01-01',''.$countordersyearfive.'-12-31');
	$yearviewscountordersfour = woocl_count_orders_stats(''.$countordersyearfour.'-01-01',''.$countordersyearfour.'-12-31');
	$yearviewscountordersthree = woocl_count_orders_stats(''.$countordersyearthree.'-01-01',''.$countordersyearthree.'-12-31');
	$yearviewscountorderstwo = woocl_count_orders_stats(''.$countordersyeartwo.'-01-01',''.$countordersyeartwo.'-12-31');
	$yearviewscountorders = woocl_count_orders_stats(''.$countordersyear.'-01-01',''.$countordersyear.'-12-31'); 

	//pushing some variables to the array so we can output something in this example.
	$valuyearscountorders[] = array("countordersyears" => $yearviewscountorderssix);
	$valuyearscountorders[] = array("countordersyears" => $yearviewscountordersfive);
	$valuyearscountorders[] = array("countordersyears" => $yearviewscountordersfour);
	$valuyearscountorders[] = array("countordersyears" => $yearviewscountordersthree);
	$valuyearscountorders[] = array("countordersyears" => $yearviewscountorderstwo);
	$valuyearscountorders[] = array("countordersyears" => $yearviewscountorders);
	
	wp_cache_set( 'products_years_count_orders_mini', $valuyearscountorders );
} 

//counting the length of the array
$countArrayLengthyearsviews = count($valuyearscountorders);

?>

<span data-plugin="peity-bar" data-colors="#bd1e51,#ffba00" data-width="200" data-height="40">
	<?php
	$resultssalesyearscountorders = "";
	for($i=0;$i<$countArrayLengthyearsviews;$i++){
	$resultssalesyearscountorders .= $valuyearscountorders[$i]['countordersyears'] . ",";
	}
	echo rtrim($resultssalesyearscountorders, ', ');
	?>
</span>