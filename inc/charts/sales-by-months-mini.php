<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//create array variable
$valus = [];
$orders2013 = woocl_total_orders_year_count_sales_by_years('2013');
$orders2014 = woocl_total_orders_year_count_sales_by_years('2014');
$orders2015 = woocl_total_orders_year_count_sales_by_years('2015');
$orders2016 = woocl_total_orders_year_count_sales_by_years('2016');
$orders2017 = woocl_total_orders_year_count_sales_by_years('2017');
$orders2018 = woocl_total_orders_year_count_sales_by_years('2018');

//pushing some variables to the array so we can output something in this example.
array_push($valus, array("years" => "2013", "orders" => $orders2013));
array_push($valus, array("years" => "2014", "orders" => $orders2014));
array_push($valus, array("years" => "2015", "orders" => $orders2015));
array_push($valus, array("years" => "2016", "orders" => $orders2016));
array_push($valus, array("years" => "2017", "orders" => $orders2017));
array_push($valus, array("years" => "2018", "orders" => $orders2018));

//counting the length of the array
$countArrayLengthss = count($values);

?>
<span data-plugin="peity-line" data-fill="#3960d1" data-stroke="#169c81" data-width="100" data-height="40">
	<?php
	$resulstordersyears = "";
	for($i=0;$i<$countArrayLengthss;$i++){
	$resulstordersyears .= $valus[$i]['orders'] . ",";
	}
	echo rtrim($resulstordersyears, ', ');
	?>
</span>
