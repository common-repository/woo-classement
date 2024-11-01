<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//create array variable
global $wpdb;	
$results = wp_cache_get( 'payment_method_result' );
if ( false === $results ) {
	$results = $wpdb->get_results( "SELECT payment_method_title.meta_value as payment_method_title,
	SUM(order_total.meta_value) as order_total,
	count(*) as order_count
	FROM {$wpdb->prefix}posts as posts		
	LEFT JOIN  {$wpdb->prefix}postmeta as order_total ON order_total.post_id=posts.ID
	LEFT JOIN  {$wpdb->prefix}postmeta as payment_method_title ON payment_method_title.post_id=posts.ID
	WHERE 1=1
	AND posts.post_type                  ='shop_order'
	AND order_total.meta_key             ='_order_total'
	AND payment_method_title.meta_key    ='_payment_method_title'
	GROUP BY payment_method_title.meta_value", ARRAY_A);
	wp_cache_set( 'payment_method_result', $results );
} 
// Do something with $result;
$valuespaiements = $results;
//counting the length of the array
$countArrayLengthpaiements = count($valuespaiements);	
?>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartstatutpaiements);

function drawChartstatutpaiements() {

var data = new google.visualization.DataTable();
data.addColumn('string', 'Payment Methods');
data.addColumn('number', 'Total');

data.addRows([

<?php
for($i=0;$i<$countArrayLengthpaiements;$i++){
echo "['" . $valuespaiements[$i]['payment_method_title'] . "'," . $valuespaiements[$i]['order_total'] . "],";
} 
?>
]);

var options = {
  //title: 'Orders -> Statut -> Completed',
};

var chart = new google.visualization.PieChart(document.getElementById('piechartpaiement'));
chart.draw(data, options);
}

</script>