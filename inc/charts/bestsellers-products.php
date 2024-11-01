<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$args = array(
'post_type' => 'product',
'meta_key' => 'total_sales',
'posts_per_page' => -1,
'orderby' => '_line_total',
'order' => 'ASC',
'meta_query' => array(
'relation' => 'OR',
	array(
	'key' => 'total_sales',
	'value' => 0,
	'compare' => '>'
	),
	array(
	'key' => '_line_total',
	'value' => 0,
	'compare' => '>'
	)
));

$query = new WP_Query($args); // $query is the WP_Query Object
$products = $query->get_posts();   // $posts contains the post objects
	
$output = array();
foreach($products as $product) {    // Pluck the id and title attributes
$output[] = array('name' => $product->post_title, 'total' => $product->total_sales);
}
$countArrayLengthproductsbestviews = count($output);
?>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartproductbestsellers);

function drawChartproductbestsellers() {
const data = new google.visualization.DataTable();
data.addColumn('string', 'Year');
data.addColumn('number', 'Balance');
data.addRows([
<?php
for($i=0;$i<$countArrayLengthproductsbestviews;$i++){
echo "['" . $output[$i]['name'] . "'," . $output[$i]['total'] . "],";
} 
?>
]);
var options = {
  title: '',
  is3D: true,
};

var chart = new google.visualization.PieChart(document.getElementById('productsbycategory'));

chart.draw(data, options);
}
</script>