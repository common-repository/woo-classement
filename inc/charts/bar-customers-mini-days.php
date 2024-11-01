<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valeursdays = wp_cache_get( 'customers_days_mini' );
if ( false === $valeursdays ) {
	//create array variable
	$valeursdays = [];
	
	$today = date('Y-m-d');
	$years = date('Y');
	$months = date('m');
	$day = date('d');
	
	$todaylesssix = woocl_total_user_registred_graphique_day($years,$months,$day-6);
	$todaylessfive = woocl_total_user_registred_graphique_day($years,$months,$day-5);
	$todaylessfour = woocl_total_user_registred_graphique_day($years,$months,$day-4);
	$todaylessthree = woocl_total_user_registred_graphique_day($years,$months,$day-3);
	$todaylesstwo = woocl_total_user_registred_graphique_day($years,$months,$day-2);
	$todaylessone = woocl_total_user_registred_graphique_day($years,$months,$day-1);
	$today = woocl_total_user_registred_graphique_day($years,$months,$day);

	//pushing some variables to the array so we can output something in this example.
	$valeursdays[] = array("annees" => $years, "month" => $months, "customersyears" => $todaylesssix);
	$valeursdays[] = array("annees" => $years, "month" => $months, "customersyears" => $todaylessfive);
	$valeursdays[] = array("annees" => $years, "month" => $months, "customersyears" => $todaylessfour);
	$valeursdays[] = array("annees" => $years, "month" => $months, "customersyears" => $todaylessthree);
	$valeursdays[] = array("annees" => $years, "month" => $months, "customersyears" => $todaylesstwo);
	$valeursdays[] = array("annees" => $years, "month" => $months, "customersyears" => $todaylessone);
	$valeursdays[] = array("annees" => $years, "month" => $months, "customersyears" => $today);
	wp_cache_set( 'customers_days_mini', $valeursdays );
} 
//counting the length of the array
$countArrayLengthsdaysmini = count($valeursdays);

?>
<span data-plugin="peity-line" data-fill="#34c73b" data-stroke="#169c81" data-width="150" data-height="40">
<?php
    $resultsregistredcustomersdays ="";
    for($i=0;$i<$countArrayLengthsdaysmini;$i++){
	$resultsregistredcustomersdays .= $valeursdays[$i]['customersyears'] . ",";
	}
	echo rtrim($resultsregistredcustomersdays, ', ');
	?>
</span>