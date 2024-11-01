<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valuyearsviewscount = wp_cache_get( 'products_years_views_mini_count' );
if ( false === $valuyearsviewscount ) {
	//create array variable
	$valuyearsviewscount = [];
	
	$firsdayyear = date('Y-01-01');
	$firsdayyeartwo = date('Y-01-01', strtotime('-1 year'));
	$firsdayyearthree = date('Y-01-01', strtotime('-2 year'));
	$firsdayyearfour = date('Y-01-01', strtotime('-3 year'));
	$firsdayyearfive = date('Y-01-01', strtotime('-4 year'));
	$firsdayyearsix = date('Y-01-01', strtotime('-5 year'));
	
	$yearcountitemsold = date('Y-12-31');
	$yearonecountitemsold = date('Y-12-31', strtotime('-1 year'));
	$yeartwocountitemsold = date('Y-12-31', strtotime('-2 year'));
	$yearthreecountitemsold = date('Y-12-31', strtotime('-3 year'));
	$yearfourcountitemsold = date('Y-12-31', strtotime('-4 year'));
	$yearfivecountitemsold = date('Y-12-31', strtotime('-5 year'));
	
	$monthsviewsfivecountitemsold = do_shortcode('[woocl_items_sold from="' . $firsdayyearsix . '" to="' . $yearfivecountitemsold . '"]');
    $monthsviewsfourcountitemsold = do_shortcode('[woocl_items_sold from="' . $firsdayyearfive . '" to="' . $yearfourcountitemsold . '"]');
    $monthsviewsthreecountitemsold = do_shortcode('[woocl_items_sold from="' . $firsdayyearfour . '" to="' . $yearthreecountitemsold . '"]'); 
    $monthsviewstwocountitemsold = do_shortcode('[woocl_items_sold from="' . $firsdayyearthree . '" to="' . $yeartwocountitemsold . '"]');
    $monthsviewsonecountitemsold = do_shortcode('[woocl_items_sold from="' . $firsdayyeartwo . '" to="' . $yearonecountitemsold . '"]');
    $monthsviewscountitemsold = do_shortcode('[woocl_items_sold from="' . $firsdayyear . '" to="' . $yearcountitemsold . '"]');

	//pushing some variables to the array so we can output something in this example.
	$valuyearsviewscount[] = array("months" => $monthsviewsfivecountitemsold);
	$valuyearsviewscount[] = array("months" => $monthsviewsfourcountitemsold);
	$valuyearsviewscount[] = array("months" => $monthsviewsthreecountitemsold);
	$valuyearsviewscount[] = array("months" => $monthsviewstwocountitemsold);
	$valuyearsviewscount[] = array("months" => $monthsviewsonecountitemsold);
	$valuyearsviewscount[] = array("months" => $monthsviewscountitemsold);
	
	wp_cache_set( 'products_years_views_mini_count', $valuyearsviewscount );
} 

//counting the length of the array
$countArrayLengthyearsitemssold = count($valuyearsviewscount);

?>

<span data-plugin="peity-bar" data-colors="#bd1e51,#ffba00" data-width="200" data-height="40">
	<?php
    $resultssalesyearscountitemssold = "";
    for($i=0;$i<$countArrayLengthyearsitemssold;$i++){
	$resultssalesyearscountitemssold .= $valuyearsviewscount[$i]['months'] . ",";
	}
	echo rtrim($resultssalesyearscountitemssold, ', ');
	?>
</span>