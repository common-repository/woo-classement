<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$resultscountorderscountdays = wp_cache_get( 'orders_days_count_print' );
if ( false === $resultscountorderscountdays ) {
	//create array variable
	$resultscountorderscountdays = [];
	
	$firstdaycountorders = date('Y-m-d'); 
	$onedaycountorders = date('Y-m-d',strtotime('-1 days'));
	$thirddaycountorders = date('Y-m-d',strtotime('-2 days'));
	$fourdaycountorders = date('Y-m-d',strtotime('-3 days'));
	$fivedaycountorders = date('Y-m-d',strtotime('-4 days'));
	$sixdaycountorders = date('Y-m-d',strtotime('-5 days'));
	$sevendaycountorders = date('Y-m-d',strtotime('-6 days'));
	$heightdaycountorders = date('Y-m-d',strtotime('-7 days'));
	
	$heightedaycountorders = woocl_count_orders_stats($heightdaycountorders,$heightdaycountorders);
	$sevenedaycountorders = woocl_count_orders_stats($sevendaycountorders,$sevendaycountorders);
	$sixedaycountorders = woocl_count_orders_stats($sixdaycountorders,$sixdaycountorders);
	$fiveedaycountorders = woocl_count_orders_stats($fivedaycountorders,$fivedaycountorders);
	$fouredaycountorders = woocl_count_orders_stats($fourdaycountorders,$fourdaycountorders);
	$thirdedaycountorders = woocl_count_orders_stats($thirddaycountorders,$thirddaycountorders);
	$twoedaycountorders = woocl_count_orders_stats($onedaycountorders,$onedaycountorders);
	$todayecountorders = woocl_count_orders_stats($firstdaycountorders,$firstdaycountorders);
	
	
	//pushing some variables to the array so we can output something in this example.
	$resultscountorderscountdays[] = array("countordersdays" => $heightedaycountorders);
	$resultscountorderscountdays[] = array("countordersdays" => $sevenedaycountorders);
	$resultscountorderscountdays[] = array("countordersdays" => $sixedaycountorders);
	$resultscountorderscountdays[] = array("countordersdays" => $fiveedaycountorders);
	$resultscountorderscountdays[] = array("countordersdays" => $fouredaycountorders);
	$resultscountorderscountdays[] = array("countordersdays" => $thirdedaycountorders);
	$resultscountorderscountdays[] = array("countordersdays" => $twoedaycountorders);
	$resultscountorderscountdays[] = array("countordersdays" => $todayecountorders);
	

	wp_cache_set( 'orders_days_count_print', $resultscountorderscountdays );
} 

//counting the length of the array
$countArrayLengthcountordersdays = count($resultscountorderscountdays);

?>

<span data-plugin="peity-bar" data-colors="#6e8cd7,#ebeff2" data-width="200" data-height="40">
<?php
    $resultssalesorderscountdays = "";
    for($i=0;$i<$countArrayLengthcountordersdays;$i++){
	$resultssalesorderscountdays .= $resultscountorderscountdays[$i]['countordersdays'] . ",";
	}
	echo rtrim($resultssalesorderscountdays, ', ');
	?>
</span>