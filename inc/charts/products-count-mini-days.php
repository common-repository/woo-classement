<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$resultscountproductssold = wp_cache_get( 'products_days_views_count_sold' );
if ( false === $resultscountproductssold ) {
	//create array variable
	$resultscountproductssold = [];
	
	$firstday = date('Y-m-d');
	$oneday = date('Y-m-d',strtotime('-1 days'));
	$thirdday = date('Y-m-d',strtotime('-2 days'));
	$fourday = date('Y-m-d',strtotime('-3 days'));
	$fiveday = date('Y-m-d',strtotime('-4 days'));
	$sixday = date('Y-m-d',strtotime('-5 days'));
	$sevenday = date('Y-m-d',strtotime('-6 days'));
	$heightday = date('Y-m-d',strtotime('-7 days'));
	$nineday = date('Y-m-d',strtotime('-8 days'));
	
	$yesterdaysevencountproductssold = do_shortcode('[woocl_items_sold from="'. $nineday .'" to="' . $nineday . '"]');
	$yesterdaysixcountproductssold = do_shortcode('[woocl_items_sold from="'. $heightday .'" to="' . $heightday . '"]');
	$yesterdayfivecountproductssold = do_shortcode('[woocl_items_sold from="'. $sevenday .'" to="' . $sevenday . '"]');
	$yesterdayfourcountproductssold = do_shortcode('[woocl_items_sold from="'. $sixday .'" to="' . $sixday . '"]');
	$yesterdaythreecountproductssold = do_shortcode('[woocl_items_sold from="'. $fiveday .'" to="' . $fiveday . '"]');
	$yesterdaytwocountproductssold = do_shortcode('[woocl_items_sold from="'. $fourday .'" to="' . $fourday . '"]'); 
	$yesterdayonecountproductssold = do_shortcode('[woocl_items_sold from="' . $thirdday . '" to="' . $thirdday . '"]');
	$yesterdaycountproductssold = do_shortcode('[woocl_items_sold from="'. $oneday . '" to="' . $oneday . '"]'); 
	$todaycountproductssold = do_shortcode('[woocl_items_sold from="' . $firstday . '" to="' . $firstday . '"]'); 
	
	//pushing some variables to the array so we can output something in this example.
    
	$resultscountproductssold[] = array("countsolddays" => $yesterdaysevencountproductssold);
	$resultscountproductssold[] = array("countsolddays" => $yesterdaysixcountproductssold);
	$resultscountproductssold[] = array("countsolddays" => $yesterdayfivecountproductssold);
	$resultscountproductssold[] = array("countsolddays" => $yesterdayfourcountproductssold);
	$resultscountproductssold[] = array("countsolddays" => $yesterdaythreecountproductssold);
	$resultscountproductssold[] = array("countsolddays" => $yesterdaytwocountproductssold);
	$resultscountproductssold[] = array("countsolddays" => $yesterdayonecountproductssold);
	$resultscountproductssold[] = array("countsolddays" => $yesterdaycountproductssold);
	$resultscountproductssold[] = array("countsolddays" => $todaycountproductssold);
	
	wp_cache_set( 'products_days_views_count_sold', $resultscountproductssold );
} 

//counting the length of the array
$countArrayLengthcountsoldproducts = count($resultscountproductssold);

?>

<span data-plugin="peity-bar" data-colors="#6e8cd7,#ebeff2" data-width="200" data-height="40">
<?php
    $resultssalesproductscount = "";
    for($i=0;$i<$countArrayLengthcountsoldproducts;$i++){
	$resultssalesproductscount .= $resultscountproductssold[$i]['countsolddays'] . ",";
	}
	echo rtrim($resultssalesproductscount, ', ');
	?>
</span>