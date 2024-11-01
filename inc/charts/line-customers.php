<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//create array variable
$values = [];

$options = get_option('via_woocommerce_classement_settings');
$from = $options['via_woocommerce_classement_Statistics_start_year']; 
foreach(range($from, date('Y'), -1) as $year) { 
	$salesyearscustomers = woocl_total_user_registred_graphique($year);
	$values[] = array("year" => $year, "customers" => $salesyearscustomers);
}

/*$sales2013 = woocl_total_user_registred_graphique('2013');
$sales2014 = woocl_total_user_registred_graphique('2014');
$sales2015 = woocl_total_user_registred_graphique('2015');
$sales2016 = woocl_total_user_registred_graphique('2016');
$sales2017 = woocl_total_user_registred_graphique('2017');
$sales2018 = woocl_total_user_registred_graphique('2018');
$sales2019 = woocl_total_user_registred_graphique('2019');
$sales2020 = woocl_total_user_registred_graphique('2020');
$sales2021 = woocl_total_user_registred_graphique('2021');
$sales2022 = woocl_total_user_registred_graphique('2022');

//pushing some variables to the array so we can output something in this example.
$values[] = array("year" => "2013", "customers" => $sales2013);
$values[] = array("year" => "2014", "customers" => $sales2014);
$values[] = array("year" => "2015", "customers" => $sales2015);
$values[] = array("year" => "2016", "customers" => $sales2016);
$values[] = array("year" => "2017", "customers" => $sales2017);
$values[] = array("year" => "2018", "customers" => $sales2018);
$values[] = array("year" => "2019", "customers" => $sales2019);
$values[] = array("year" => "2020", "customers" => $sales2020);
$values[] = array("year" => "2022", "customers" => $sales2022);*/

//counting the length of the array
$countArrayLength = count($values);

?>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChartlinecustomers);

function drawChartlinecustomers() {

var data = new google.visualization.DataTable();
data.addColumn('string', 'Year');
data.addColumn('number', 'Customers');

data.addRows([

<?php
for($i=0;$i<$countArrayLength;$i++){
	echo "['" . $values[$i]['year'] . "'," . $values[$i]['customers'] . "],";
} 
?>
]);

var options = {
	title: 'Count Customers -> Year',
	curveType: 'function',
	legend: { position: 'bottom' }
};

var chart = new google.visualization.LineChart(document.getElementById('customer_chart'));
chart.draw(data, options);
}

$(window).resize(function(){
drawChartlinecustomers();
});

</script>