<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wpdb;
$results = wp_cache_get( 'shipping_method_result' );
if ( false === $results ) {
	$results = $wpdb->get_results("
	SELECT sum(im.meta_value) as value,
	im.meta_key,
	i.order_item_type,
	i.order_item_name
	FROM {$wpdb->prefix}woocommerce_order_items i
	JOIN {$wpdb->prefix}woocommerce_order_itemmeta im
	ON im.order_item_id = i.order_item_id
	WHERE i.order_item_type = 'shipping'
	AND im.meta_key = 'cost'
	GROUP BY i.order_item_name
	", ARRAY_A);
	wp_cache_set( 'shipping_method_result', $results );
}
// Do something with $result;
$valuesshipping = $results;
//counting the length of the array
$countArrayLengthshipping = count($valuesshipping);	
?>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartstatutshipping);

function drawChartstatutshipping() {

var data = new google.visualization.DataTable();
data.addColumn('string', 'Shipping Methods');
data.addColumn('number', 'Total');

data.addRows([

<?php
for($i=0;$i<$countArrayLengthshipping;$i++){
echo "['" . $valuesshipping[$i]['order_item_name'] . "'," . $valuesshipping[$i]['value'] . "],";
} 
?>
]);

var options = {
  //title: 'Orders -> Statut -> Completed',
};

var chart = new google.visualization.PieChart(document.getElementById('piechartshipping'));
chart.draw(data, options);
}

</script>