<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valeursmonths = wp_cache_get( 'customers_months_mini' );
if ( false === $valeursmonths ) {
	//create array variable
	$valeursmonths = [];
	
	$customersjanuary2021 = woocl_total_user_registred_graphique_month('2021','01');
	$customersfebruary2021 = woocl_total_user_registred_graphique_month('2021','02');
	$customersmars2021 = woocl_total_user_registred_graphique_month('2020','03');
	$customersapril2021 = woocl_total_user_registred_graphique_month('2021','04');
	$customersmay2021 = woocl_total_user_registred_graphique_month('2021','05');
	$customersjune2021 = woocl_total_user_registred_graphique_month('2021','06');
	$customersjuly2021 = woocl_total_user_registred_graphique_month('2021','07');
	$customersaugust2021 = woocl_total_user_registred_graphique_month('2021','08');
	$customersseptember2021 = woocl_total_user_registred_graphique_month('2021','09');
	$customersoctober2021 = woocl_total_user_registred_graphique_month('2021','10');
	$customersnovember2021 = woocl_total_user_registred_graphique_month('2021','11');
	$customersdecember2021 = woocl_total_user_registred_graphique_month('2021','12');

	//pushing some variables to the array so we can output something in this example.
	$valeursmonths[] = array("annees" => "2021", "month" => "Jan", "customersyears" => $customersjanuary2021);
	$valeursmonths[] = array("annees" => "2021", "month" => "Feb", "customersyears" => $customersfebruary2021);
	$valeursmonths[] = array("annees" => "2021", "month" => "Mar", "customersyears" => $customersmars2021);
	$valeursmonths[] = array("annees" => "2021", "month" => "Apr", "customersyears" => $customersapril2021);
	$valeursmonths[] = array("annees" => "2021", "month" => "May", "customersyears" => $customersmay2021);
	$valeursmonths[] = array("annees" => "2021", "month" => "Jun", "customersyears" => $customersjune2021);
	$valeursmonths[] = array("annees" => "2021", "month" => "Jul", "customersyears" => $customersjuly2021);
	$valeursmonths[] = array("annees" => "2021", "month" => "Aug", "customersyears" => $customersaugust2021);
	$valeursmonths[] = array("annees" => "2021", "month" => "Sept", "customersyears" => $customersseptember2021);
	$valeursmonths[] = array("annees" => "2021", "month" => "Oct", "customersyears" => $customersoctober2021);
	$valeursmonths[] = array("annees" => "2021", "month" => "Nov", "customersyears" => $customersnovember2021);
	$valeursmonths[] = array("annees" => "2021", "month" => "Dec", "customersyears" => $customersdecember2021);
	wp_cache_set( 'customers_months_mini', $valeursmonths );
} 
//counting the length of the array
$countArrayLengths = count($valeursmonths);

?>
<span data-plugin="peity-line" data-fill="#34c73b" data-stroke="#169c81" data-width="150" data-height="40">
<?php
    $resultstwoyearscustomersmonths = "";
    for($i=0;$i<$countArrayLengths;$i++){
	$resultstwoyearscustomersmonths .= $valeursmonths[$i]['customersyears'] . ",";
	}
	echo rtrim($resultstwoyearscustomersmonths, ', ');
	?>
</span>