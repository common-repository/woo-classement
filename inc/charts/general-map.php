<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wpdb;
$results = $wpdb->get_results( "SELECT country.meta_value AS country_name,
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
AND   posts.post_status IN ('wc-completed')
GROUP BY country.meta_value", ARRAY_A );

$values = $results;
//counting the length of the array
$countArrayLength = count($values);

$options = get_option('via_woocommerce_classement_settings');
$keyGoogleAPI = $options ['via_woocommerce_classement_license_key'];
?>
<script type="text/javascript">
//Handles differences in load functions
google.load = google.load || google.charts.load;
google.setOnLoadCallback = google.setOnLoadCallback || google.charts.setOnLoadCallback;

//Loads the google analytics API
(function (w, d, s, g, js, fs) {
		//if ($('#googleCache').length > 0) return;
		g = w.gapi || (w.gapi = {});
		g.analytics = {
			q: [],
			ready: function (f) {
				this.q.push(f);
			}
		};
		js = d.createElement(s);
		fs = d.getElementsByTagName(s)[0];
		js.src = 'https://apis.google.com/js/platform.js';
		js.id = "googleCache";
		fs.parentNode.insertBefore(js, fs);
		js.onload = function () {
			g.load('analytics');
		};
}(window, document, 'script'));

google.charts.load('current', { packages: ['corechart', 'table', 'line', 'geochart']});


google.charts.load('current', {
'packages':['geochart'],
// Note: you will need to get a mapsApiKey for your project.
// See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
'mapsApiKey': ''
});
google.charts.setOnLoadCallback(drawRegionsMap);

function drawRegionsMap() {
var data = new google.visualization.DataTable();
data.addColumn('string', 'Country');
data.addColumn('number', 'Sales');
data.addRows([
<?php
for($i=0;$i<$countArrayLength;$i++){
echo "['" . $values[$i]['country_name'] . "'," . $values[$i]['sale_total'] . "],";
} 
?>
]);
var options = {
	title: 'Total sales by Country',
};

var chart = new google.visualization.GeoChart(document.getElementById('regionsdiv'));

chart.draw(data, options);
}

$(window).resize(function(){
  drawRegionsMap();
});
</script>
