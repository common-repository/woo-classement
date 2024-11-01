<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//create array variable
$values = [];

$options = get_option('via_woocommerce_classement_settings');
$from = $options['via_woocommerce_classement_Statistics_start_year']; 
foreach(range($from, date('Y'), -1) as $year) { 
	$salesyearsvendors = woocl_total_vendor_registred_graphique($year);
	$values[] = array("year" => $year, "vendors" => $salesyearsvendors);
}

/*$vendors2013 = woocl_total_vendor_registred_graphique('2013');
$vendors2014 = woocl_total_vendor_registred_graphique('2014');
$vendors2015 = woocl_total_vendor_registred_graphique('2015');
$vendors2016 = woocl_total_vendor_registred_graphique('2016');
$vendors2017 = woocl_total_vendor_registred_graphique('2017');
$vendors2018 = woocl_total_vendor_registred_graphique('2018');
$vendors2019 = woocl_total_vendor_registred_graphique('2019');
$vendors2020 = woocl_total_vendor_registred_graphique('2020');
$vendors2021 = woocl_total_vendor_registred_graphique('2021');
$vendors2022 = woocl_total_vendor_registred_graphique('2022');

//pushing some variables to the array so we can output something in this example.
$values[] = array("year" => "2013", "vendors" => $vendors2013);
$values[] = array("year" => "2014", "vendors" => $vendors2014);
$values[] = array("year" => "2015", "vendors" => $vendors2015);
$values[] = array("year" => "2016", "vendors" => $vendors2016);
$values[] = array("year" => "2017", "vendors" => $vendors2017);
$values[] = array("year" => "2018", "vendors" => $vendors2018);
$values[] = array("year" => "2019", "vendors" => $vendors2019);
$values[] = array("year" => "2020", "vendors" => $vendors2020);
$values[] = array("year" => "2021", "vendors" => $vendors2021);
$values[] = array("year" => "2022", "vendors" => $vendors2022);*/

//counting the length of the array
$countArrayLength = count($values);

?>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChartvendors);

function drawChartvendors() {

var data = new google.visualization.DataTable();
data.addColumn('string', 'Year');
data.addColumn('number', 'Vendors');

data.addRows([

<?php
for($i=0;$i<$countArrayLength;$i++){
	echo "['" . $values[$i]['year'] . "'," . $values[$i]['vendors'] . "],";
} 
?>
]);

var options = {
	title: 'Vendors',
	curveType: 'function',
	legend: { position: 'bottom' } 
};

var chart = new google.visualization.LineChart(document.getElementById('vendor_chart'));
chart.draw(data, options);
}

</script>