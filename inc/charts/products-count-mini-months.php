<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$valumonthsviewscount = wp_cache_get( 'products_months_views_mini_count' );
if ( false === $valumonthsviewscount ) {
	//create array variable
	$valumonthsviewscount = [];
	
	$firsdaymonth = date('Y-m-01');
	$firsdaymonthtwo = date('Y-m-01', strtotime('-1 month'));
	$firsdaymonththree = date('Y-m-01', strtotime('-2 month'));
	$firsdaymonthfour = date('Y-m-01', strtotime('-3 month'));
	$firsdaymonthfive = date('Y-m-01', strtotime('-4 month'));
	$firsdaymonthsix = date('Y-m-01', strtotime('-5 month'));
	
	$monthcountitemsold = date('Y-m');
	$monthonecountitemsold = date('Y-m-31', strtotime('-1 month'));
	$monthtwocountitemsold = date('Y-m-31', strtotime('-2 month'));
	$monththreecountitemsold = date('Y-m-31', strtotime('-3 month'));
	$monthfourcountitemsold = date('Y-m-31', strtotime('-4 month'));
	$monthfivecountitemsold = date('Y-m-31', strtotime('-5 month'));
	
	
	$monthsviewsfivecountitemsold = do_shortcode('[woocl_items_sold from="' . $firsdaymonthsix . '" to="' . $monthfivecountitemsold . '"]');
	$monthsviewsfourcountitemsold = do_shortcode('[woocl_items_sold from="' . $firsdaymonthfive . '" to="' . $monthfourcountitemsold . '"]');
	$monthsviewsthreecountitemsold = do_shortcode('[woocl_items_sold from="' . $firsdaymonthfour . '" to="' . $monththreecountitemsold . '"]'); 
	$monthsviewstwocountitemsold = do_shortcode('[woocl_items_sold from="' . $firsdaymonththree . '" to="' . $monthtwocountitemsold . '"]');
	$monthsviewsonecountitemsold = do_shortcode('[woocl_items_sold from="' . $firsdaymonthtwo . '" to="' . $monthonecountitemsold . '"]');
	$monthsviewscountitemsold = do_shortcode('[woocl_items_sold from="' . $firsdaymonth . '" to="' . $monthcountitemsold . '"]');

	//pushing some variables to the array so we can output something in this example.
	$valumonthsviewscount[] = array("months" => $monthsviewsfivecountitemsold);
	$valumonthsviewscount[] = array("months" => $monthsviewsfourcountitemsold);
	$valumonthsviewscount[] = array("months" => $monthsviewsthreecountitemsold);
	$valumonthsviewscount[] = array("months" => $monthsviewstwocountitemsold);
	$valumonthsviewscount[] = array("months" => $monthsviewsonecountitemsold);
	$valumonthsviewscount[] = array("months" => $monthsviewscountitemsold);
	
	wp_cache_set( 'products_months_views_mini_count', $valumonthsviewscount );
} 

//counting the length of the array
$countArrayLengthmonthsitemssold = count($valumonthsviewscount);

?>

<span data-plugin="peity-line" data-colors="#bd1e51,#ffba00" data-width="200" data-height="40">
	<?php
    $resultssalesmonthscountitemssold = "";
    for($i=0;$i<$countArrayLengthmonthsitemssold;$i++){
	$resultssalesmonthscountitemssold .= $valumonthsviewscount[$i]['months'] . ",";
	}
	echo rtrim($resultssalesmonthscountitemssold, ', ');
	?>
</span>