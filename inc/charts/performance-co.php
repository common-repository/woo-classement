<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$values = wp_cache_get( 'performance_statut_commandes' );
if ( false === $values ) {
	
	//create array variable
	$values = [];
	
	$options = get_option('via_woocommerce_classement_settings');
	$from = $options['via_woocommerce_classement_Statistics_start_year']; 
	
	foreach(range($from, date('Y'), -1) as $yearco) {
	    $salesco = woocl_total_sells_by_year_chart($yearco);
		$customersco = woocl_total_sells_refunded_by_years_chart($yearco);
		$ordersco = woocl_total_sells_cancelled_by_years_chart($yearco);
		$values[] = array("years" => $yearco, "sales" => $salesco, "refunded" => $customersco, "orders" => $ordersco);
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

	$customers2013 = woocl_total_sells_refunded_by_years_chart('2013');
	$customers2014 = woocl_total_sells_refunded_by_years_chart('2014');
	$customers2015 = woocl_total_sells_refunded_by_years_chart('2015');
	$customers2016 = woocl_total_sells_refunded_by_years_chart('2016');
	$customers2017 = woocl_total_sells_refunded_by_years_chart('2017');
	$customers2018 = woocl_total_sells_refunded_by_years_chart('2018');
	$customers2019 = woocl_total_sells_refunded_by_years_chart('2019');
	$customers2020 = woocl_total_sells_refunded_by_years_chart('2020');
	$customers2021 = woocl_total_sells_refunded_by_years_chart('2021');
	$customers2022 = woocl_total_sells_refunded_by_years_chart('2022');

	$orders2013 = woocl_total_sells_cancelled_by_years_chart('2013');
	$orders2014 = woocl_total_sells_cancelled_by_years_chart('2014');
	$orders2015 = woocl_total_sells_cancelled_by_years_chart('2015');
	$orders2016 = woocl_total_sells_cancelled_by_years_chart('2016');
	$orders2017 = woocl_total_sells_cancelled_by_years_chart('2017');
	$orders2018 = woocl_total_sells_cancelled_by_years_chart('2018');
	$orders2019 = woocl_total_sells_cancelled_by_years_chart('2019');
	$orders2020 = woocl_total_sells_cancelled_by_years_chart('2020');
	$orders2021 = woocl_total_sells_cancelled_by_years_chart('2021');
	$orders2022 = woocl_total_sells_cancelled_by_years_chart('2022');

	//pushing some variables to the array so we can output something in this example.
	$values[] = array("years" => "2013", "sales" => $sales2013, "refunded" => $customers2013, "orders" => $orders2013);
	$values[] = array("years" => "2014", "sales" => $sales2014, "refunded" => $customers2014, "orders" => $orders2014);
	$values[] = array("years" => "2015", "sales" => $sales2015, "refunded" => $customers2015, "orders" => $orders2015);
	$values[] = array("years" => "2016", "sales" => $sales2016, "refunded" => $customers2016, "orders" => $orders2016);
	$values[] = array("years" => "2017", "sales" => $sales2017, "refunded" => $customers2017, "orders" => $orders2017);
	$values[] = array("years" => "2018", "sales" => $sales2018, "refunded" => $customers2018, "orders" => $orders2018);
	$values[] = array("years" => "2019", "sales" => $sales2019, "refunded" => $customers2019, "orders" => $orders2019);
	$values[] = array("years" => "2020", "sales" => $sales2020, "refunded" => $customers2020, "orders" => $orders2020);
	$values[] = array("years" => "2021", "sales" => $sales2021, "refunded" => $customers2021, "orders" => $orders2021);
	$values[] = array("years" => "2022", "sales" => $sales2022, "refunded" => $customers2022, "orders" => $orders2022);*/
	
wp_cache_set( 'performance_statut_commandes', $values );
} 

//counting the length of the array
$countArrayLength = count($values);

?>

<?php

$value = wp_cache_get( 'performance_month_statut' );
if ( false === $value ) {
		//create array variable
	$value = [];
	
	$salesJanuary2023 = woocl_total_sells_by_month_chart($year='2023', $month='01', $day='1');
	$salesfebruary2023 = woocl_total_sells_by_month_chart($year='2023', $month='02', $day='1');
	$salesmarch2023 = woocl_total_sells_by_month_chart($year='2023', $month='03', $day='1');
	$salesapril2023 = woocl_total_sells_by_month_chart($year='2023', $month='04', $day='1');
	$salesmai2023 = woocl_total_sells_by_month_chart($year='2023', $month='05', $day='1');
	$salesJune2023 = woocl_total_sells_by_month_chart($year='2023', $month='06', $day='1');
	$salesJuly2023 = woocl_total_sells_by_month_chart($year='2023', $month='07', $day='1');
	$salesaugust2023 = woocl_total_sells_by_month_chart($year='2023', $month='08', $day='1');
	$salesseptember2023 = woocl_total_sells_by_month_chart($year='2023', $month='09', $day='1');
	$salesoctober2023 = woocl_total_sells_by_month_chart($year='2023', $month='10', $day='1');
	$salesnovember2023 = woocl_total_sells_by_month_chart($year='2023', $month='11', $day='1');
	$salesdecember2023 = woocl_total_sells_by_month_chart($year='2023', $month='12', $day='1');
		
	$salesJanuary2022 = woocl_total_sells_by_month_chart($year='2022', $month='01', $day='1');
	$salesfebruary2022 = woocl_total_sells_by_month_chart($year='2022', $month='02', $day='1');
	$salesmarch2022 = woocl_total_sells_by_month_chart($year='2022', $month='03', $day='1');
	$salesapril2022 = woocl_total_sells_by_month_chart($year='2022', $month='04', $day='1');
	$salesmai2022 = woocl_total_sells_by_month_chart($year='2022', $month='05', $day='1');
	$salesJune2022 = woocl_total_sells_by_month_chart($year='2022', $month='06', $day='1');
	$salesJuly2022 = woocl_total_sells_by_month_chart($year='2022', $month='07', $day='1');
	$salesaugust2022 = woocl_total_sells_by_month_chart($year='2022', $month='08', $day='1');
	$salesseptember2022 = woocl_total_sells_by_month_chart($year='2022', $month='09', $day='1');
	$salesoctober2022 = woocl_total_sells_by_month_chart($year='2022', $month='10', $day='1');
	$salesnovember2022 = woocl_total_sells_by_month_chart($year='2022', $month='11', $day='1');
	$salesdecember2022 = woocl_total_sells_by_month_chart($year='2022', $month='12', $day='1');
	
	$salesJanuary2021 = woocl_total_sells_by_month_chart($year='2021', $month='01', $day='1');
	$salesfebruary2021 = woocl_total_sells_by_month_chart($year='2021', $month='02', $day='1');
	$salesmarch2021 = woocl_total_sells_by_month_chart($year='2021', $month='03', $day='1');
	$salesapril2021 = woocl_total_sells_by_month_chart($year='2021', $month='04', $day='1');
	$salesmai2021 = woocl_total_sells_by_month_chart($year='2021', $month='05', $day='1');
	$salesJune2021 = woocl_total_sells_by_month_chart($year='2021', $month='06', $day='1');
	$salesJuly2021 = woocl_total_sells_by_month_chart($year='2021', $month='07', $day='1');
	$salesaugust2021 = woocl_total_sells_by_month_chart($year='2021', $month='08', $day='1');
	$salesseptember2021 = woocl_total_sells_by_month_chart($year='2021', $month='09', $day='1');
	$salesoctober2021 = woocl_total_sells_by_month_chart($year='2021', $month='10', $day='1');
	$salesnovember2021 = woocl_total_sells_by_month_chart($year='2021', $month='11', $day='1');
	$salesdecember2021 = woocl_total_sells_by_month_chart($year='2021', $month='12', $day='1');
	
	$salesJanuary2020 = woocl_total_sells_by_month_chart($year='2020', $month='01', $day='1');
	$salesfebruary2020 = woocl_total_sells_by_month_chart($year='2020', $month='02', $day='1');
	$salesmarch2020 = woocl_total_sells_by_month_chart($year='2020', $month='03', $day='1');
	$salesapril2020 = woocl_total_sells_by_month_chart($year='2020', $month='04', $day='1');
	$salesmai2020 = woocl_total_sells_by_month_chart($year='2020', $month='05', $day='1');
	$salesJune2020 = woocl_total_sells_by_month_chart($year='2020', $month='06', $day='1');
	$salesJuly2020 = woocl_total_sells_by_month_chart($year='2020', $month='07', $day='1');
	$salesaugust2020 = woocl_total_sells_by_month_chart($year='2020', $month='08', $day='1');
	$salesseptember2020 = woocl_total_sells_by_month_chart($year='2020', $month='09', $day='1');
	$salesoctober2020 = woocl_total_sells_by_month_chart($year='2020', $month='10', $day='1');
	$salesnovember2020 = woocl_total_sells_by_month_chart($year='2020', $month='11', $day='1');
	$salesdecember2020 = woocl_total_sells_by_month_chart($year='2020', $month='12', $day='1');
	
	$salesJanuary2019 = woocl_total_sells_by_month_chart($year='2019', $month='01', $day='1');
	$salesfebruary2019 = woocl_total_sells_by_month_chart($year='2019', $month='02', $day='1');
	$salesmarch2019 = woocl_total_sells_by_month_chart($year='2019', $month='03', $day='1');
	$salesapril2019 = woocl_total_sells_by_month_chart($year='2019', $month='04', $day='1');
	$salesmai2019 = woocl_total_sells_by_month_chart($year='2019', $month='05', $day='1');
	$salesJune2019 = woocl_total_sells_by_month_chart($year='2019', $month='06', $day='1');
	$salesJuly2019 = woocl_total_sells_by_month_chart($year='2019', $month='07', $day='1');
	$salesaugust2019 = woocl_total_sells_by_month_chart($year='2019', $month='08', $day='1');
	$salesseptember2019 = woocl_total_sells_by_month_chart($year='2019', $month='09', $day='1');
	$salesoctober2019 = woocl_total_sells_by_month_chart($year='2019', $month='10', $day='1');
	$salesnovember2019 = woocl_total_sells_by_month_chart($year='2019', $month='11', $day='1');
	$salesdecember2019 = woocl_total_sells_by_month_chart($year='2019', $month='12', $day='1');
	
	$salesJanuary = woocl_total_sells_by_month_chart($year='2018', $month='01', $day='1');
	$salesfebruary = woocl_total_sells_by_month_chart($year='2018', $month='02', $day='1');
	$salesmarch = woocl_total_sells_by_month_chart($year='2018', $month='03', $day='1');
	$salesapril = woocl_total_sells_by_month_chart($year='2018', $month='04', $day='1');
	$salesmai = woocl_total_sells_by_month_chart($year='2018', $month='05', $day='1');
	$salesJune = woocl_total_sells_by_month_chart($year='2018', $month='06', $day='1');
	$salesJuly = woocl_total_sells_by_month_chart($year='2018', $month='07', $day='1');
	$salesaugust = woocl_total_sells_by_month_chart($year='2018', $month='08', $day='1');
	$salesseptember = woocl_total_sells_by_month_chart($year='2018', $month='09', $day='1');
	$salesoctober = woocl_total_sells_by_month_chart($year='2018', $month='10', $day='1');
	$salesnovember = woocl_total_sells_by_month_chart($year='2018', $month='11', $day='1');
	$salesdecember = woocl_total_sells_by_month_chart($year='2018', $month='12', $day='1');

	$salesJanuary2017 = woocl_total_sells_by_month_chart($year='2017', $month='01', $day='1');
	$salesfebruary2017 = woocl_total_sells_by_month_chart($year='2017', $month='02', $day='1');
	$salesmarch2017 = woocl_total_sells_by_month_chart($year='2017', $month='03', $day='1');
	$salesapril2017 = woocl_total_sells_by_month_chart($year='2017', $month='04', $day='1');
	$salesmai2017 = woocl_total_sells_by_month_chart($year='2017', $month='05', $day='1');
	$salesJune2017 = woocl_total_sells_by_month_chart($year='2017', $month='06', $day='1');
	$salesJuly2017 = woocl_total_sells_by_month_chart($year='2017', $month='07', $day='1');
	$salesaugust2017 = woocl_total_sells_by_month_chart($year='2017', $month='08', $day='1');
	$salesseptember2017 = woocl_total_sells_by_month_chart($year='2017', $month='09', $day='1');
	$salesoctober2017 = woocl_total_sells_by_month_chart($year='2017', $month='10', $day='1');
	$salesnovember2017 = woocl_total_sells_by_month_chart($year='2017', $month='11', $day='1');
	$salesdecember2017 = woocl_total_sells_by_month_chart($year='2017', $month='12', $day='1');

	//pushing some variables to the array so we can output something in this example.
	$value[] = array("months" => "January", "sales2023" => $salesJanuary2023, "sales2022" => $salesJanuary2022, "sales2021" => $salesJanuary2021, "sales2020" => $salesJanuary2020, "sales2019" => $salesJanuary2019, "sales2018" => $salesJanuary, "sales2017" => $salesJanuary2017);
	$value[] = array("months" => "February", "sales2023" => $salesfebruary2023, "sales2022" => $salesfebruary2022, "sales2021" => $salesfebruary2021, "sales2020" => $salesfebruary2020, "sales2019" => $salesfebruary2019, "sales2018" => $salesfebruary, "sales2017" => $salesfebruary2017);
	$value[] = array("months" => "March", "sales2023" => $salesmarch2023, "sales2022" => $salesmarch2022, "sales2021" => $salesmarch2021, "sales2020" => $salesmarch2020, "sales2019" => $salesmarch2019, "sales2018" => $salesmarch, "sales2017" => $salesmarch2017);
	$value[] = array("months" => "April", "sales2023" => $salesapril2023, "sales2022" => $salesapril2022, "sales2021" => $salesapril2021, "sales2020" => $salesapril2020, "sales2019" => $salesapril2019, "sales2018" => $salesapril, "sales2017" => $salesapril2017);
	$value[] = array("months" => "May", "sales2023" => $salesmai2023, "sales2022" => $salesmai2022, "sales2021" => $salesmai2021, "sales2020" => $salesmai2020, "sales2019" => $salesmai2019, "sales2018" => $salesmai, "sales2017" => $salesmai2017);
	$value[] = array("months" => "June", "sales2023" => $salesJune2023, "sales2022" => $salesJune2022, "June", "sales2021" => $salesJune2021, "sales2020" => $salesJune2020, "sales2019" => $salesJune2019, "sales2018" => $salesJune, "sales2017" => $salesJune2017);
	$value[] = array("months" => "July", "sales2023" => $salesJuly2023, "sales2022" => $salesJuly2022, "sales2021" => $salesJuly2021, "sales2020" => $salesJuly2020, "sales2019" => $salesJuly2019, "sales2018" => $salesJuly, "sales2017" => $salesJuly2017);
	$value[] = array("months" => "August", "sales2023" => $salesJuly2023, "sales2022" => $salesJuly2022, "sales2021" => $salesJuly2021, "sales2020" => $salesJuly2020, "sales2019" => $salesJuly2019, "sales2018" => $salesaugust, "sales2017" => $salesaugust2017);
	$value[] = array("months" => "September", "sales2023" => $salesseptember2023, "sales2022" => $salesseptember2022, "sales2021" => $salesseptember2021, "sales2020" => $salesseptember2020, "sales2019" => $salesseptember2019, "sales2018" => $salesseptember, "sales2017" => $salesseptember2017);
	$value[] = array("months" => "October", "sales2023" => $salesoctober2023, "sales2022" => $salesoctober2022, "sales2021" => $salesoctober2021, "sales2020" => $salesoctober2020, "sales2019" => $salesoctober2019, "sales2018" => $salesoctober, "sales2017" => $salesoctober2017);
	$value[] = array("months" => "November", "sales2023" => $salesnovember2023, "sales2022" => $salesnovember2022, "sales2021" => $salesnovember2021, "sales2020" => $salesnovember2020, "sales2019" => $salesnovember2019, "sales2018" => $salesnovember, "sales2017" => $salesnovember2017);
	$value[] = array("months" => "December", "sales2023" => $salesdecember2023, "sales2022" => $salesdecember2022, "sales2021" => $salesdecember2021, "sales2020" => $salesdecember2020, "sales2019" => $salesdecember2019, "sales2018" => $salesdecember, "sales2017" => $salesdecember2017);
	wp_cache_set( 'performance_month_statut', $value );
} 

//counting the length of the array
$countArrayLengths = count($value);

?>

<?php

$valuescustomersvendors = wp_cache_get( 'performance_customers_vendors' );
if ( false === $valuescustomersvendors ) {
	
	//create array variable
	$valuescustomersvendors = [];
	
	$customers2023 = woocl_total_user_registred_graphique('2023');
	$customers2022 = woocl_total_user_registred_graphique('2022');
	$customers2021 = woocl_total_user_registred_graphique('2021');
	$customers2020 = woocl_total_user_registred_graphique('2020');
	$customers2019 = woocl_total_user_registred_graphique('2019');
	$customers2018 = woocl_total_user_registred_graphique('2018');
	$customers2017 = woocl_total_user_registred_graphique('2017');
	$customers2016 = woocl_total_user_registred_graphique('2016');
	$customers2015 = woocl_total_user_registred_graphique('2015');
	$customers2014 = woocl_total_user_registred_graphique('2014');
    
	
	$vendors2023 = woocl_total_vendor_registred_graphique('2023');
	$vendors2022 = woocl_total_vendor_registred_graphique('2022');
	$vendors2021 = woocl_total_vendor_registred_graphique('2021');
	$vendors2020 = woocl_total_vendor_registred_graphique('2020');
	$vendors2019 = woocl_total_vendor_registred_graphique('2019');
	$vendors2018 = woocl_total_vendor_registred_graphique('2018');
	$vendors2017 = woocl_total_vendor_registred_graphique('2017');
	$vendors2016 = woocl_total_vendor_registred_graphique('2016');
	$vendors2015 = woocl_total_vendor_registred_graphique('2015');
	$vendors2014 = woocl_total_vendor_registred_graphique('2014');

	//pushing some variables to the array so we can output something in this example.
	array_push($valuescustomersvendors, array("year" => "2014", "customersyears" => $customers2014, "vendorsyears" => $vendors2014));
	array_push($valuescustomersvendors, array("year" => "2015", "customersyears" => $customers2015, "vendorsyears" => $vendors2015));
	array_push($valuescustomersvendors, array("year" => "2016", "customersyears" => $customers2016, "vendorsyears" => $vendors2016));
	array_push($valuescustomersvendors, array("year" => "2017", "customersyears" => $customers2017, "vendorsyears" => $vendors2017));
	array_push($valuescustomersvendors, array("year" => "2018", "customersyears" => $customers2018, "vendorsyears" => $vendors2018));
	array_push($valuescustomersvendors, array("year" => "2019", "customersyears" => $customers2019, "vendorsyears" => $vendors2019));
	array_push($valuescustomersvendors, array("year" => "2020", "customersyears" => $customers2020, "vendorsyears" => $vendors2020));
	array_push($valuescustomersvendors, array("year" => "2021", "customersyears" => $customers2021, "vendorsyears" => $vendors2021));
	array_push($valuescustomersvendors, array("year" => "2022", "customersyears" => $customers2022, "vendorsyears" => $vendors2022));
	array_push($valuescustomersvendors, array("year" => "2023", "customersyears" => $customers2023, "vendorsyears" => $vendors2023));
wp_cache_set( 'performance_customers_vendors', $valuescustomersvendors );
} 
//counting the length of the array
$countArrayLengthscustomersvendors = count($valuescustomersvendors);

?>


<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    
	google.charts.setOnLoadCallback(drawChartyearsales);
    google.charts.setOnLoadCallback(drawChartmonthsalesdeux);
	google.charts.setOnLoadCallback(drawChartcustomersvendorsbars);

	function drawChartyearsales() {

		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Year');
		data.addColumn('number', 'Completed Sales');
		data.addColumn('number', 'Refunded Sales');
		data.addColumn('number', 'Cancelled Sales');
		data.addRows([

		<?php
		for($i=0;$i<$countArrayLength;$i++){
		echo "['" . $values[$i]['years'] . "'," . $values[$i]['sales'] . ", " . $values[$i]['refunded'] . ", " . $values[$i]['orders'] . "],";
		} 
		?>
		]);

		var options = {
		  vAxis : { format: 'decimal' },
		  chart: {
			title: 'Company Performance',
			subtitle: '2013-2021',
		  }
		};

		var chart = new google.charts.Bar(document.getElementById('columnchartperformance2018'));
		chart.draw(data, google.charts.Bar.convertOptions(options));

	}
	
	
	

	function drawChartmonthsalesdeux() {

		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Months');
		data.addColumn('number', 'Sales 2022');
		data.addColumn('number', 'Sales 2021');
		data.addColumn('number', 'Sales 2020');
		data.addColumn('number', 'Sales 2019');
		data.addColumn('number', 'Sales 2018');
		data.addColumn('number', 'Sales 2017');
		data.addRows([

		<?php
		for($i=0;$i<$countArrayLengths;$i++){
		echo "['" . $value[$i]['months'] . "'," . $value[$i]['sales2022'] . "," . $value[$i]['sales2021'] . ", " . $value[$i]['sales2020'] . ", " . $value[$i]['sales2019'] . ", " . $value[$i]['sales2018'] . ", " . $value[$i]['sales2017'] . "],";
		} 
		?>
		]);

		var options = {
		vAxis : { format: 'decimal' },
		chart: {
		title: 'Total Sales Performance',
		subtitle: '2017-2019',
		}
		};

		var chart = new google.charts.Bar(document.getElementById('monthsperformance2018'));
		chart.draw(data, google.charts.Bar.convertOptions(options));
	}
	
	
	
	function drawChartcustomersvendorsbars() {

		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Years');
		data.addColumn('number', 'Customers');
		data.addColumn('number', 'Vendors');
		data.addRows([

		<?php
		for($i=0;$i<$countArrayLengthscustomersvendors;$i++){
		echo "['" . $valuescustomersvendors[$i]['year'] . "'," . $valuescustomersvendors[$i]['customersyears'] . ", " . $valuescustomersvendors[$i]['vendorsyears'] . "],";
		} 
		?>
		]);

		var options = {
			chart: {
			title: 'Total',
			subtitle: 'Customers - Vendors',
			},
		};

		var chart = new google.charts.Bar(document.getElementById('chartscustomersvendorsdeux'));
		chart.draw(data, google.charts.Bar.convertOptions(options));
	}
		
		
</script>
