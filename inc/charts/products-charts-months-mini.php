<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Initialize array
$valumonthsviews = [];

// Get current and past months in 'Ym' format
$month = date('Ym');
$monthone = date('Ym', strtotime('-1 month'));
$monthtwo = date('Ym', strtotime('-2 month'));
$monththree = date('Ym', strtotime('-3 month'));
$monthfour = date('Ym', strtotime('-4 month'));
$monthfive = date('Ym', strtotime('-5 month'));

// Get product views for each month
$monthsviewsfive = woocl_get_product_views_products_bydate_peitycharts($monthfive);
$monthsviewsfour = woocl_get_product_views_products_bydate_peitycharts($monthfour);
$monthsviewsthree = woocl_get_product_views_products_bydate_peitycharts($monththree);
$monthsviewstwo = woocl_get_product_views_products_bydate_peitycharts($monthtwo);
$monthsviewsone = woocl_get_product_views_products_bydate_peitycharts($monthone);
$monthsviews = woocl_get_product_views_products_bydate_peitycharts($month);

// Push data to the array
array_push($valumonthsviews, ["months" => $monthsviewsfive]);
array_push($valumonthsviews, ["months" => $monthsviewsfour]);
array_push($valumonthsviews, ["months" => $monthsviewsthree]);
array_push($valumonthsviews, ["months" => $monthsviewstwo]);
array_push($valumonthsviews, ["months" => $monthsviewsone]);
array_push($valumonthsviews, ["months" => $monthsviews]);

// Counting the length of the array
$countArrayLengthmonthsviews = count($valumonthsviews);

?>

<span data-plugin="peity-bar" data-colors="#bd1e51,#ffba00" data-width="200" data-height="40">
    <?php
    $resultssalesmonthsviews = "";
    for ($i = 0; $i < $countArrayLengthmonthsviews; $i++) {
        if (isset($valumonthsviews[$i]['months'])) {
            $resultssalesmonthsviews .= $valumonthsviews[$i]['months'] . ",";
        }
    }
    echo rtrim($resultssalesmonthsviews, ', ');

    ?>
</span>
