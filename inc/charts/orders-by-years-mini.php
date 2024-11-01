<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valus = wp_cache_get( 'commandes_years_mini' );
if ( false === $valus ) {
	//create array variable
	$valus = [];
	
	$options = get_option('via_woocommerce_classement_settings');
	$from = $options['via_woocommerce_classement_Statistics_start_year']; 
	foreach(range($from, date('Y'), -1) as $year) {
	   $orders = woocl_total_orders_year_total_completed($year);
	   $valus[] = array("years" => $year, "orders" => $orders);
	} 
	
	
	/*$orders2022 = woocl_total_orders_year_total_completed('2022');
	$orders2021 = woocl_total_orders_year_total_completed('2021');
	$orders2020 = woocl_total_orders_year_total_completed('2020');
	$orders2019 = woocl_total_orders_year_total_completed('2019');
	$orders2018 = woocl_total_orders_year_total_completed('2018');
	$orders2017 = woocl_total_orders_year_total_completed('2017');
	$orders2016 = woocl_total_orders_year_total_completed('2016');
	$orders2015 = woocl_total_orders_year_total_completed('2015');*/
	

	//pushing some variables to the array so we can output something in this example.
	/*$valus[] = array("years" => "2022", "orders" => $orders2022);
	$valus[] = array("years" => "2021", "orders" => $orders2021);
	$valus[] = array("years" => "2020", "orders" => $orders2020);
	$valus[] = array("years" => "2019", "orders" => $orders2019);
	$valus[] = array("years" => "2018", "orders" => $orders2018);
	$valus[] = array("years" => "2017", "orders" => $orders2017);
	$valus[] = array("years" => "2016", "orders" => $orders2016);
	$valus[] = array("years" => "2015", "orders" => $orders2015);*/
	wp_cache_set( 'commandes_years_mini', $valus );
} 

//counting the length of the array
$countArrayLengthsssssss = count($valus);

?>

<span data-plugin="peity-line" data-fill="#3960d1" data-stroke="#169c81" data-width="150" data-height="40">
	<?php
    $resultorders = "";
    for($i=0;$i<$countArrayLengthsssssss;$i++){
	$resultorders .= $valus[$i]['orders'] . ",";
	}
	echo rtrim($resultorders, ', ');
	?>
</span>
