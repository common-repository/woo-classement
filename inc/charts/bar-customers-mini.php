<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valeurs = wp_cache_get( 'customers_years_mini' );
if ( false === $valeurs ) {
	//create array variable
	$valeurs = [];
	
	$options = get_option('via_woocommerce_classement_settings');
	$from = $options['via_woocommerce_classement_Statistics_start_year']; 
	foreach(range($from, date('Y'), -1) as $year) {
	    $customersyears = woocl_total_user_registred_graphique($year);
	    $valeurs[] = array("annees" => $year, "customersyears" => $customersyears);
	} 
	
	
	/*$customersyears2021 = woocl_total_user_registred_graphique('2021');
	$customersyears2020 = woocl_total_user_registred_graphique('2020');
	$customersyears2019 = woocl_total_user_registred_graphique('2019');
	$customersyears2018 = woocl_total_user_registred_graphique('2018');
	$customersyears2017 = woocl_total_user_registred_graphique('2017');
	$customersyears2016 = woocl_total_user_registred_graphique('2016');
	$customersyears2015 = woocl_total_user_registred_graphique('2015');
	
	//pushing some variables to the array so we can output something in this example.
	$valeurs[] = array("annees" => "2021", "customersyears" => $customersyears2021);
	$valeurs[] = array("annees" => "2020", "customersyears" => $customersyears2020);
	$valeurs[] = array("annees" => "2019", "customersyears" => $customersyears2019);
	$valeurs[] = array("annees" => "2018", "customersyears" => $customersyears2018);
	$valeurs[] = array("annees" => "2017", "customersyears" => $customersyears2017);
	$valeurs[] = array("annees" => "2016", "customersyears" => $customersyears2016);
	$valeurs[] = array("annees" => "2015", "customersyears" => $customersyears2015);*/
	wp_cache_set( 'customers_years_mini', $valeurs );
} 
//counting the length of the array
$countArrayLengths = count($valeurs);

?>
<span data-plugin="peity-line" data-fill="#34c73b" data-stroke="#169c81" data-width="150" data-height="40">
<?php
    $resultsyearscustomers ="";
    for($i=0;$i<$countArrayLengths;$i++){
	$resultsyearscustomers .= $valeurs[$i]['customersyears'] . ",";
	}
	echo rtrim($resultsyearscustomers, ', ');
	?>
</span>
