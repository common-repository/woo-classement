<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valuesordersamountyear = wp_cache_get( 'commandes_amount_years_mini' );
if ( false === $valuesordersamountyear ) {
	
	//create array variable
	$valuesordersamountyear = [];
	$orders2017 = woocl_total_sells_amount_today('2017-01-01','2017-12-31');
	$orders2018 = woocl_total_sells_amount_today('2018-01-01','2018-12-31');
	$orders2019 = woocl_total_sells_amount_today('2019-01-01','2019-12-31');
	$orders2020 = woocl_total_sells_amount_today('2020-01-01','2020-12-31');
	$orders2021 = woocl_total_sells_amount_today('2021-01-01','2021-12-31');
	$orders2022 = woocl_total_sells_amount_today('2022-01-01','2022-12-31');
	
	//pushing some variables to the array so we can output something in this example.
	array_push($valuesordersamountyear, array("years" => "2017", "ordersamountyearsmini" => $orders2017));
	array_push($valuesordersamountyear, array("years" => "2018", "ordersamountyearsmini" => $orders2018));
	array_push($valuesordersamountyear, array("years" => "2019", "ordersamountyearsmini" => $orders2019));
	array_push($valuesordersamountyear, array("years" => "2020", "ordersamountyearsmini" => $orders2020));
	array_push($valuesordersamountyear, array("years" => "2021", "ordersamountyearsmini" => $orders2021));
	array_push($valuesordersamountyear, array("years" => "2022", "ordersamountyearsmini" => $orders2022));
	
	
	wp_cache_set( 'commandes_amount_years_mini', $valuesordersamountyear );
} 

//counting the length of the array
$countArrayLengthsssssssamountordersyears = count($valuesordersamountyear);

?>


<span data-plugin="peity-line" data-fill="#3960d1" data-stroke="#169c81" data-width="150" data-height="40">
	<?php
	$resultordersyearsminiamount = "";
	for($i=0;$i<$countArrayLengthsssssssamountordersyears;$i++){
	$resultordersyearsminiamount .= $valuesordersamountyear[$i]['ordersamountyearsmini'] . ",";
	}
	echo rtrim($resultordersyearsminiamount, ', ');
	?>
</span>