<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valeurstwoyears = wp_cache_get( 'customers_two_years_mini' );
if ( false === $valeurstwoyears ) {
	//create array variable
	$valeurstwoyears = [];
	$customerstwoyears2020 = woocl_total_user_registred_graphique('2020');
	$customerstwoyears2021 = woocl_total_user_registred_graphique('2021');

	//pushing some variables to the array so we can output something in this example.
	$valeurstwoyears[] = array("annees" => "2020", "customerstwoyears" => $customerstwoyears2020);
	$valeurstwoyears[] = array("annees" => "2021", "customerstwoyears" => $customerstwoyears2021);
	wp_cache_set( 'customers_two_years_mini', $valeurstwoyears );
} 
//counting the length of the array
$countArrayLengthsTwoYears = count($valeurstwoyears);

?>
<span data-plugin="peity-line" data-fill="#34c73b" data-stroke="#169c81" data-width="150" data-height="40">
<?php
    $resultstwoyearscustomers = "";
    for($i=0;$i<$countArrayLengthsTwoYears;$i++){
	$resultstwoyearscustomers .= $valeurstwoyears[$i]['customerstwoyears'] . ",";
	}
	echo rtrim($resultstwoyearscustomers, ', ');
	?>
</span>
