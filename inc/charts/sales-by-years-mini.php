<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valu = wp_cache_get( 'sales_years_mini' );
if ( false === $valu ) {
	//create array variable
	$valu = [];
    
	$options = get_option('via_woocommerce_classement_settings');
	$from = $options['via_woocommerce_classement_Statistics_start_year']; 
	foreach(range($from, date('Y'), -1) as $year) {
	    $sales = woocl_total_sells_by_year_chart($year);
	    $valu[] = array("years" => $year, "sales" => $sales);
	} 
	
	
	/*$sales2021 = woocl_total_sells_by_year_chart('2021');
    $sales2020 = woocl_total_sells_by_year_chart('2020');
    $sales2019 = woocl_total_sells_by_year_chart('2019');
	$sales2018 = woocl_total_sells_by_year_chart('2018');
	$sales2017 = woocl_total_sells_by_year_chart('2017');
	$sales2016 = woocl_total_sells_by_year_chart('2016');
	$sales2015 = woocl_total_sells_by_year_chart('2015');
	
	//pushing some variables to the array so we can output something in this example
	$valu[] = array("years" => "2021", "sales" => $sales2021);
	$valu[] = array("years" => "2020", "sales" => $sales2020);
	$valu[] = array("years" => "2019", "sales" => $sales2019);
	$valu[] = array("years" => "2018", "sales" => $sales2018);
	$valu[] = array("years" => "2017", "sales" => $sales2017);
	$valu[] = array("years" => "2016", "sales" => $sales2016);
	$valu[] = array("years" => "2015", "sales" => $sales2015);*/
	
	wp_cache_set( 'sales_years_mini', $valu );
} 

//counting the length of the array
$countArrayLength = count($valu);

?>

<span data-plugin="peity-line" data-fill="#3fb7ee" data-stroke="#169c81" data-width="150" data-height="40">
<?php
    $resultssalesyears = "";
    for($i=0;$i<$countArrayLength;$i++){
	$resultssalesyears .= $valu[$i]['sales'] . ",";
	}
	echo rtrim($resultssalesyears, ', ');
	?>
</span>
