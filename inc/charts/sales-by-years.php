<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//create array variable
$values = [];

$options = get_option('via_woocommerce_classement_settings');
$from = $options['via_woocommerce_classement_Statistics_start_year']; 
foreach(range($from, date('Y'), -1) as $year) {
	$salesyears = woocl_total_sells_by_year_chart($year);
	$values[] = array("years" => $year, "sales" => $salesyears);
}


/*$sales2013 = woocl_total_sells_by_year_chart('2013');
$sales2014 = woocl_total_sells_by_year_chart('2014');
$sales2015 = woocl_total_sells_by_year_chart('2015');
$sales2016 = woocl_total_sells_by_year_chart('2016');
$sales2017 = woocl_total_sells_by_year_chart('2017');
$sales2018 = woocl_total_sells_by_year_chart('2018');
$sales2019 = woocl_total_sells_by_year_chart('2019');
$sales2020 = woocl_total_sells_by_year_chart('2020');
$sales2021 = woocl_total_sells_by_year_chart('2021');
$sales2022 = woocl_total_sells_by_year_chart('2022');

//pushing some variables to the array so we can output something in this example.
$values[] = array("years" => "2013", "sales" => $sales2013);
$values[] = array("years" => "2014", "sales" => $sales2014);
$values[] = array("years" => "2015", "sales" => $sales2015);
$values[] = array("years" => "2016", "sales" => $sales2016);
$values[] = array("years" => "2017", "sales" => $sales2017);
$values[] = array("years" => "2018", "sales" => $sales2018);
$values[] = array("years" => "2019", "sales" => $sales2019);
$values[] = array("years" => "2020", "sales" => $sales2020);
$values[] = array("years" => "2021", "sales" => $sales2021);
$values[] = array("years" => "2022", "sales" => $sales2022);*/

//counting the length of the array
$countArrayLength = count($values);

?>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChartyear);
google.setOnLoadCallback(drawChartyeardeux);

function drawChartyear() {

var data = new google.visualization.DataTable();
data.addColumn('string', 'Year');
data.addColumn('number', 'Sales');

data.addRows([

<?php
for($i=0;$i<$countArrayLength;$i++){
	echo "['" . $values[$i]['years'] . "'," . $values[$i]['sales'] . "],";
} 
?>
]);

var options = {
	title: 'Sales -> Year',
	width:1000,
	height:400,	
	curveType: 'function',
	vAxis: {format:'# $'},
	legend: { position: 'bottom' }
};

var chart = new google.visualization.LineChart(document.getElementById('orders_chart'));
chart.draw(data, options);
}


function drawChartyeardeux() {

var data = new google.visualization.DataTable();
data.addColumn('string', 'Year');
data.addColumn('number', 'Sales');

data.addRows([

<?php
for($i=0;$i<$countArrayLength;$i++){
	echo "['" . $values[$i]['years'] . "'," . $values[$i]['sales'] . "],";
} 
?>
]);

var options = {
	title: 'Sales -> Year',
	curveType: 'function',
	vAxis: {format:'# $'},
	legend: { position: 'bottom' } 
};

var chart = new google.visualization.LineChart(document.getElementById('orders_chart_2018'));
chart.draw(data, options);
}

$(window).resize(function(){
  drawChartyear();
  drawChartyeardeux();
});
</script>
