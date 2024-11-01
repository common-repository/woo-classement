<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valuesordersamountmonthsmini = wp_cache_get( 'commandes_amount_months_mini' );
if ( false === $valuesordersamountmonthsmini ) {
	
	//create array variable
	$valuesordersamountmonthsmini = [];
	
	$yearamount = date('Y');
	$month = date('Ym');
	$monthone = date('Ym', strtotime('-1 month'));
	$monthtwo = date('Ym', strtotime('-2 month'));
	$monththree = date('Ym', strtotime('-3 month'));
	$monthfour = date('Ym', strtotime('-4 month'));
	$monthfive = date('Ym', strtotime('-5 month'));	
	
	$ordersmonthssix = woocl_total_sells_amount_today(''.$yearamount.'-'.$monthfive.'-01',''.$yearamount.'-'.$monthfiv.'-31');
	$ordersmonthsfive = woocl_total_sells_amount_today(''.$yearamount.'-'.$monthfour.'-01',''.$yearamount.'-'.$monthfour.'-31');
	$ordersmonthsfour = woocl_total_sells_amount_today(''.$yearamount.'-'.$monththree.'-01',''.$yearamount.'-'.$monththree.'-31');
	$ordersmonthsthree = woocl_total_sells_amount_today(''.$yearamount.'-'.$monthtwo.'-01',''.$yearamount.'-'.$monthtwo.'-31');
	$ordersmonthstwo = woocl_total_sells_amount_today(''.$yearamount.'-'.$monthone.'-01',''.$yearamount.'-'.$monthone.'-31');
	$ordersmonthsone = woocl_total_sells_amount_today(''.$yearamount.'-'.$month.'-01',''.$yearamount.'-'.$month.'-31');
	
	//pushing some variables to the array so we can output something in this example.
    $valuesordersamountmonthsmini[] = array("month" => $monthfive, "ordersamountyearsmini" => $ordersmonthssix);
    $valuesordersamountmonthsmini[] = array("month" => $monthfour, "ordersamountyearsmini" => $ordersmonthsfive);
    $valuesordersamountmonthsmini[] = array("month" => $monththree, "ordersamountyearsmini" => $ordersmonthsfour);
    $valuesordersamountmonthsmini[] = array("month" => $monthtwo, "ordersamountyearsmini" => $ordersmonthsthree);
    $valuesordersamountmonthsmini[] = array("month" => $monthone, "ordersamountyearsmini" => $ordersmonthstwo);
	$valuesordersamountmonthsmini[] = array("month" => $month, "ordersamountyearsmini" => $ordersmonthsone);
	
	wp_cache_set( 'commandes_amount_months_mini', $valuesordersamountmonthsmini );
} 

//counting the length of the array
$countArrayLengthsssssssamountordersmonths = count($valuesordersamountmonthsmini);

?>


<span data-plugin="peity-line" data-colors="#bd1e51,#ffba00" data-width="200" data-height="40">
	<?php
	$resultordersmonthsminiamount = "";
    for($i=0;$i<$countArrayLengthsssssssamountordersmonths;$i++){
	$resultordersmonthsminiamount .= $valuesordersamountmonthsmini[$i]['ordersamountyearsmini'] . ",";
	}
	echo rtrim($resultordersmonthsminiamount, ', ');
	?>
</span>