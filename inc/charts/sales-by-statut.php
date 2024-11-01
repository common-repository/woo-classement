<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
 
//create array variable
$values = [];
$wccompleted = woocl_total_sells_statut_chart('wc-completed');
$wcprocessing = woocl_total_sells_statut_chart('wc-processing');
$wcpending = woocl_total_sells_statut_chart('wc-pending');
$wcrefunded = woocl_total_sells_statut_chart('wc-refunded');
$wcfailed = woocl_total_sells_statut_chart('wc-failed');
$wccancelled = woocl_total_sells_statut_chart('wc-cancelled');

//pushing some variables to the array so we can output something in this example.
$values[] = array("statut" => "Completed", "orders" => $wccompleted);
$values[] = array("statut" => "Processing", "orders" => $wcprocessing);
$values[] = array("statut" => "Pending", "orders" => $wcpending);
$values[] = array("statut" => "Refunded", "orders" => $wcrefunded);
$values[] = array("statut" => "Failed", "orders" => $wcfailed);
$values[] = array("statut" => "Cancelled", "orders" => $wccancelled);


//counting the length of the array
$countArrayLength = count($values);

?>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartstatut);

function drawChartstatut() {

var data = new google.visualization.DataTable();
data.addColumn('string', 'Statut');
data.addColumn('number', 'Orders');

data.addRows([

<?php
for($i=0;$i<$countArrayLength;$i++){
echo "['" . $values[$i]['statut'] . "'," . $values[$i]['orders'] . "],";
} 
?>
]);

var options = {
  title: 'Orders -> Statut',
};

var chart = new google.visualization.PieChart(document.getElementById('piechartstatut'));
chart.draw(data, options);
}

$(window).resize(function(){
  drawChartstatut();
});
</script>