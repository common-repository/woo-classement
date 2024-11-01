<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wpdb;
$results = wp_cache_get( 'country_donut' );
if ( false === $results ) {
	$results = $wpdb->get_results ("SELECT country.meta_value AS country_name,
		
		SUM(order_item_meta.meta_value) AS sale_total
		FROM {$wpdb->prefix}woocommerce_order_items AS order_items

		LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS order_item_meta
			ON order_items.order_item_id = order_item_meta.order_item_id
		LEFT JOIN {$wpdb->postmeta} AS country
			ON order_items.order_id = country.post_id
		LEFT JOIN {$wpdb->posts} AS posts
			ON order_items.order_id = posts.ID

		WHERE posts.post_type             = 'shop_order'
		AND   country.meta_key            = '_billing_country'
		AND   order_item_meta.meta_key    = '_line_total'
		AND   order_items.order_item_type = 'line_item'
		AND   posts.post_status IN ('wc-processing','wc-on-hold','wc-completed')
		GROUP BY country.meta_value", ARRAY_A);
		
	wp_cache_set( 'country_donut', $results );
} 

$values	= $results;		
//$this->print_data($data);
$countArrayLength = count($values);

?>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChartDonutsCountries);
  
  
function drawChartDonutsCountries() {
var data = new google.visualization.DataTable();
data.addColumn('string', 'Country');
data.addColumn('number', 'Total');

data.addRows([

<?php
for($i=0;$i<$countArrayLength;$i++){
echo "['" . $values[$i]['country_name'] . "'," . $values[$i]['sale_total'] . "],";
} 
?>
]);

var options = {
  vAxis : { format: 'decimal' }, 
  title: 'Sales / Countries',
  width:1000,
  height:350,
  pieHole: 0.4,
};

var chart = new google.visualization.PieChart(document.getElementById('countriesdonutchart'));
chart.draw(data, options);
}
</script>

