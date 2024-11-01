<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            // Fonction calcul pourcentage //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Assurer vous que le nom de cette fonction ne soit pas utiliser
function woocl_percent_classement($num_amount, $num_total) {
	$count1 = $num_amount / $num_total;
	$count2 = $count1 * 100 * 2.5;
	// Remplacer le 2 par 0 si vous ne voulez pas de décimales
	$count = number_format($count2, 2);
	echo $count;
}

// Assurer vous que le nom de cette fonction ne soit pas utiliser
function woocl_percent_classement_year($num_amount_year, $num_total_year) {
	$count1 = $num_amount_year / $num_total_year;
	$count2 = $count1 * 100 * 2.5;
	// Remplacer le 2 par 0 si vous ne voulez pas de décimales
	$count = number_format($count2, 2); 
	echo $count;
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fonction identique pour chaque mois ( Hauteur pixel batonnet % )
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_resultspourcentmonth($year, $month) {
	$options = get_option('via_woocommerce_classement_settings');
	$getchiffreoption = $options ['via_woocommerce_classement_chiffre_affaires'];
	$num_amount = woocl_total_sells_by_month($year=$year,$month=$month, $day='1');
	$num_total = $getchiffreoption;
	$result = woocl_percent_classement ($num_amount, $num_total) .'px;';
	echo $result;
}

function woocl_resultspourcentyear($year) {
	$options = get_option('via_woocommerce_classement_settings');
	$getchiffreoption = $options ['via_woocommerce_classement_chiffre_affaires_comparatif_annuel'];
	$num_amount_year = woocl_total_sells_by_year($year=$year);
	$num_total_year = $getchiffreoption;
	$result = woocl_percent_classement_year($num_amount_year, $num_total_year) .'px;';
	echo $result;
}

function woocl_resultspourcentyearcustomers($year) {
	$options = get_option('via_woocommerce_classement_settings');
	$getchiffreoption = $options ['via_woocommerce_classement_objectifs_clients'];
	$num_amount_year = woocl_total_user_registred_graphique($year=$year);
	$num_total_year = $getchiffreoption;
	$result = woocl_percent_classement_year($num_amount_year, $num_total_year) .'px;';
	echo $result;
}

function woocl_resultspourcentyearvendors($year) {
	$options = get_option('via_woocommerce_classement_settings');
	$getchiffreoption = $options ['via_woocommerce_classement_objectifs_clients'];
	$num_amount_year = woocl_total_vendor_registred_graphique($year=$year);
	$num_total_year = $getchiffreoption;
	$result = woocl_percent_classement_year($num_amount_year, $num_total_year) .'px;';
	echo $result;
}

function woocl_resultspourcentyearrefunded($year) {
	$options = get_option('via_woocommerce_classement_settings');
	$getchiffreoption = $options ['via_woocommerce_classement_chiffre_affaires_comparatif_annuel'];
	$num_amount_year = woocl_total_sells_by_year_refunded($year=$year);
	$num_total_year = $getchiffreoption;
	$result = woocl_percent_classement_year($num_amount_year, $num_total_year) .'px;';
	echo $result;
}

function woocl_chiffre_affaire_graph($pourcent = '', $div) {
	//$substensce = 5000;
	//$num_substensce = $substensce ['via_woocommerce_classement_chiffre_affaires'] * $pourcent / $div ;
	
	$div = $div;
    $options = get_option('via_woocommerce_classement_settings');
	$num_total = $options ['via_woocommerce_classement_chiffre_affaires'] * $pourcent / $div ; 
	echo $num_total;
	 
	//if (get_option('via_woocommerce_classement_settings') ) {
	    //echo $num_total;
	//}
	//else {
		//echo $num_substensce;
	//}
}

function woocl_chiffre_affaire_graph_comparatif_annuel($pourcent = '', $div) {
	$div = 100;
    $options = get_option('via_woocommerce_classement_settings');
	$num_total_year = $options ['via_woocommerce_classement_chiffre_affaires_comparatif_annuel'] * $pourcent / $div ; 
	echo $num_total_year;
}

function woocl_users_graph_comparatif_annuel($pourcent = '', $div) {
	$div = 100;
    $options = get_option('via_woocommerce_classement_settings');
	$num_total_year = $options ['via_woocommerce_classement_objectifs_clients'] * $pourcent / $div ; 
	echo $num_total_year;
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                          // Trois fonctions permettant d'afficher le % de progres journalier//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function woocl_total_sells_by_day() {
	global $wpdb;
	$today = date('Y-m-d');
	$tomorrow  = date('Y-m-d');
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$today 00:00:00' AND '$tomorrow 23:59:59'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
}

function woocl_total_sells_by_day_growth() {
	global $wpdb;
	$today = date('Y-m-d');
	$tomorrow  = date('Y-m-d');
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$today 00:00:00' AND '$tomorrow 23:59:59'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '');
}

function woocl_total_sells_yesterday() {
	global $wpdb;
	$today = date('Y-m-d');
	$yesterday = date('Y-m-d',strtotime('-1 days'));
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$yesterday 00:00:00' AND '$today 23:59:59'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_yesterday_growth() {
	global $wpdb;
	$today = date('Y-m-d',strtotime('-1 days'));
	$yesterday = date('Y-m-d',strtotime('-1 days'));
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$yesterday 00:00:00' AND '$today 23:59:59'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', ''); 
}

function woocl_comparatif_pourcent_ventes_jour() {
	$ventesdujour = woocl_total_sells_by_day_growth();
    $venteshier = woocl_total_sells_yesterday_growth();

    if ($venteshier != 0) {
        $c = $ventesdujour - $venteshier;
        $e = $c / $venteshier;
        $d = $e * 100;

        if ($d > 0) {
            return number_format((float) $d, 2, '.', '') . '&nbsp;%&nbsp;';
        } else {
            return 'N/A';
        }
    } else {
        return 'N/A';
    }
	/*$ventesdujour = woocl_total_sells_by_day_growth();
	$venteshier = woocl_total_sells_yesterday_growth();
	$c = $ventesdujour - $venteshier;
	$e = $c / $venteshier; 
	$d = $e * 100;
	if ($d > 0) {
	    return number_format((float) $d, 2, '.', '') . '&nbsp;%&nbsp;';
	} 
	else {
		return 'N/A';
	}*/
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                          // Trois fonctions permettant d'afficher le % de progres Mensuel //
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_total_sells_by_month_result_general_pourcent() {
	global $wpdb;
	$year = date('Y');
	$month = date('m');
	$day = date('d');
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-$month-01 00:00:00' AND '$year-$month-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_by_month_result_general_pourcent_growth() {
	global $wpdb;
	$year = date('Y');
	$month = date('m');
	$day = date('d');
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-$month-01 00:00:00' AND '$year-$month-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', ''); 
}

function woocl_total_sells_by_last_month_result_general_pourcent() {
	global $wpdb;
	$year = date('Y');
	$month = date('m', strtotime('-30 days'));
	$day = date('d');
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-$month-01 00:00:00' AND '$year-$month-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_by_last_month_result_general_pourcent_growth() {
	global $wpdb;
	$year = date('Y');
	$month = date('m', strtotime('-30 days'));
	$day = date('d');
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-$month-01 00:00:00' AND '$year-$month-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', ''); 
}


function woocl_comparatif_pourcent_ventes_mensuel() {
    $ventesdujour = woocl_total_sells_by_month_result_general_pourcent_growth();
    $venteshier = woocl_total_sells_by_last_month_result_general_pourcent_growth();

    if ($venteshier != 0) {
        $wooclcomparatifpourcentventesmensuel = ($ventesdujour - $venteshier) / $venteshier * 100;

        if ($wooclcomparatifpourcentventesmensuel > 0) {
            return number_format((float) $wooclcomparatifpourcentventesmensuel, 2, '.', '') . '&nbsp;%&nbsp;';
        } else {
            return 'N/A';
        }
    } else {
        return 'N/A';
    }	
	/*$ventesdujour = woocl_total_sells_by_month_result_general_pourcent_growth();
	$venteshier = woocl_total_sells_by_last_month_result_general_pourcent_growth();
    $wooclcomparatifpourcentventesmensuel = ($ventesdujour - $venteshier) / $venteshier * 100;
    if ($wooclcomparatifpourcentventesmensuel > 0) {
	    return number_format((float) $wooclcomparatifpourcentventesmensuel, 2, '.', '') . '&nbsp;%&nbsp;';
	} 
	else {
		return 'N/A';
	}*/
}

function woocl_comparatif_pourcent_orders_daily() {
    $ventesdujour = woocl_total_orders_jour_growth();
    $venteshier = woocl_total_orders_yesterday();

    if ($venteshier != 0) {
        $wooclcomparatifpourcentordersdaily = (($ventesdujour - $venteshier) / $venteshier) * 100;

        if ($wooclcomparatifpourcentordersdaily > 0) {
            return number_format((float) $wooclcomparatifpourcentordersdaily, 2, '.', '') . '&nbsp;%&nbsp;';
        } else {
            return 'N/A';
        }
    } else {
        return 'N/A';
    }
	/*$ventesdujour = woocl_total_orders_jour_growth();
	$venteshier = woocl_total_orders_yesterday();
    $wooclcomparatifpourcentordersdaily = (($ventesdujour - $venteshier) / $venteshier) * 100;
    if ($wooclcomparatifpourcentordersdaily > 0) {
	return number_format((float) $wooclcomparatifpourcentordersdaily, 2, '.', '') . '&nbsp;%&nbsp;';
    }
    else {
        return 'N/A';
    }*/
}

function woocl_total_sells_by_year_result_general_comparatif($year) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol(); 
}

function woocl_total_sells_by_year_result_general_comparatif_chiffre($year) {
	global $wpdb;
	$order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	WHERE meta.meta_key = '_order_total'
	AND posts.post_type = 'shop_order'
	AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
	AND posts.post_date BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 00:00:00'
	" ) );
	return number_format((float) $order_totals->total_sales, 2, '.', '');
}


function woocl_comparatif_pourcent_ventes_year() {
    $thisyear = date('Y');
    $lastyear = date('Y', strtotime('-1 year'));
    $ventesduyear = woocl_total_sells_by_year_result_general_comparatif_chiffre($thisyear);
    $ventesyearbefore = woocl_total_sells_by_year_result_general_comparatif_chiffre($lastyear);

    if ($ventesyearbefore != 0) {
        $d = (($ventesduyear - $ventesyearbefore) / $ventesyearbefore) * 100;
        return number_format($d, 2) . ' %';
    } else {
        return 'N/A';
    }
	/*$thisyear = date('Y');
	$lastyear = date('Y', strtotime('-1 year'));
	$ventesduyear = woocl_total_sells_by_year_result_general_comparatif_chiffre($thisyear);
	$ventesyearbefore = woocl_total_sells_by_year_result_general_comparatif_chiffre($lastyear);
	$d = (($ventesduyear - $ventesyearbefore) / $ventesyearbefore) * 100;
	if ($d == '0') {
       return 'N/A';
    }
	else {
		return number_format($d, 2) . ' % ';
		//number_format((float) $d, 2, '.', ''); 
	}*/
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Sales calculate % and go to objectives graphs //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_resultspourcentyearobjectifsventes($year) {
	$options = get_option('via_woocommerce_classement_settings');
	$getchiffreoption = $options ['via_woocommerce_classement_objectifs_ventes'];
	$num_amount_year = woocl_total_sells_by_year($year=$year);
	$num_total_year = $getchiffreoption;
	$result = woocl_percent_classement_year_objectifs_ventes($num_amount_year, $num_total_year) .'px;';
	echo $result;
}

// Assurer vous que le nom de cette fonction ne soit pas utiliser
function woocl_percent_classement_year_objectifs_ventes($num_amount_year, $num_total_year) {
	$count1 = $num_amount_year / $num_total_year;
	$count2 = $count1 * 100 * 2.5;
	// Remplacer le 2 par 0 si vous ne voulez pas de décimales
	$count = number_format($count2, 2); 
	echo $count;
}

function woocl_chiffre_affaire_graph_comparatif_annuel_objectifs ($pourcent = '', $div) {
	$div = 100;
    $options = get_option('via_woocommerce_classement_settings');
	$num_total_year = $options ['via_woocommerce_classement_objectifs_ventes'] * $pourcent / $div ; 
	echo $num_total_year;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Customers calculate % and go to objectives graphs //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function woocl_resultspourcentyearobjectifsclients($year) {
	$options = get_option('via_woocommerce_classement_settings');
	$getchiffreoption = $options ['via_woocommerce_classement_objectifs_clients'];
	$num_amount_year = woocl_total_user_registred_graphique($year=$year);
	$num_total_year = $getchiffreoption;
	$result = woocl_percent_classement_year_objectifs_clients($num_amount_year, $num_total_year) .'px;';
	echo $result;
}

// Assurer vous que le nom de cette fonction ne soit pas utiliser
function woocl_percent_classement_year_objectifs_clients($num_amount_year, $num_total_year) {
	$count1 = $num_amount_year / $num_total_year;
	$count2 = $count1 * 100 * 2.5;
	// Remplacer le 2 par 0 si vous ne voulez pas de décimales
	$count = number_format($count2, 2); 
	echo $count;
}

function woocl_chiffre_affaire_graph_comparatif_annuel_objectifs_clients ($pourcent = '', $div) {
	$div = 100;
    $options = get_option('via_woocommerce_classement_settings');
	$num_total_year = $options ['via_woocommerce_classement_objectifs_clients'] * $pourcent / $div ; 
	echo $num_total_year;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Orders calculate % and go to objectives graphs //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function woocl_resultspourcentyearobjectifscommandes($year) {
	$options = get_option('via_woocommerce_classement_settings');
	$getchiffreoption = $options ['via_woocommerce_classement_objectifs_commandes'];
	$num_amount_year = woocl_total_orders_all_graphique($year=$year);
	$num_total_year = $getchiffreoption;
	$result = woocl_percent_classement_year_objectifs_commandes($num_amount_year, $num_total_year) .'px;';
	echo $result;
}

// Assurer vous que le nom de cette fonction ne soit pas utiliser
function woocl_percent_classement_year_objectifs_commandes($num_amount_year, $num_total_year) {
	$count1 = $num_amount_year / $num_total_year;
	$count2 = $count1 * 100 * 2.5;
	// Remplacer le 2 par 0 si vous ne voulez pas de décimales
	$count = number_format($count2, 2); 
	echo $count;
}

function woocl_chiffre_affaire_graph_comparatif_annuel_objectifs_commandes ($pourcent = '', $div) {
	$div = 100;
    $options = get_option('via_woocommerce_classement_settings');
	$num_total_year = $options ['via_woocommerce_classement_objectifs_commandes'] * $pourcent / $div ; 
	echo $num_total_year;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Coupons calculate % and go to objectives graphs //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function woocl_resultspourcentyearobjectifscoupons($year) {
	$options = get_option('via_woocommerce_classement_settings');
	$getchiffreoption = $options ['via_woocommerce_classement_objectifs_coupons'];
	$num_amount_year = woocl_total_coupons_graphique($year=$year);
	$num_total_year = $getchiffreoption;
	$result = woocl_percent_classement_year_objectifs_coupons($num_amount_year, $num_total_year) .'px;';
	echo $result;
}

// Assurer vous que le nom de cette fonction ne soit pas utiliser
function woocl_percent_classement_year_objectifs_coupons($num_amount_year, $num_total_year) {
	$count1 = $num_amount_year / $num_total_year;
	$count2 = $count1 * 100 * 2.5;
	// Remplacer le 2 par 0 si vous ne voulez pas de décimales
	$count = number_format($count2, 2); 
	echo $count;
}

function woocl_chiffre_affaire_graph_comparatif_annuel_objectifs_coupons ($pourcent = '', $div) {
	$div = 100;
    $options = get_option('via_woocommerce_classement_settings');
	$num_total_year = $options ['via_woocommerce_classement_objectifs_coupons'] * $pourcent / $div ; 
	echo $num_total_year;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Shipping calculate % and go to objectives graphs //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_resultspourcentyearobjectifsshipping($year) {
	$options = get_option('via_woocommerce_classement_settings');
	$getchiffreoption = $options ['via_woocommerce_classement_objectifs_shipping'];
	$num_amount_year = woocl_get_total_shipping_annuel($year=$year);
	$num_total_year = $getchiffreoption;
	$results = woocl_percent_classement_year_objectifs_shipping($num_amount_year, $num_total_year) .'px;';
	echo $results;
}

// Assurer vous que le nom de cette fonction ne soit pas utiliser
function woocl_percent_classement_year_objectifs_shipping($num_amount_year, $num_total_year) {
	$count1 = $num_amount_year / $num_total_year;
	$count2 = $count1 * 100 * 2.5;
	// Remplacer le 2 par 0 si vous ne voulez pas de décimales
	$count = number_format($count2, 2); 
	echo $count;
}

function woocl_chiffre_affaire_graph_comparatif_annuel_objectifs_shipping ($pourcent = '', $div) {
	$div = 100;
    $options = get_option('via_woocommerce_classement_settings');
	$num_total_year = $options ['via_woocommerce_classement_objectifs_shipping'] * $pourcent / $div ; 
	echo $num_total_year;
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Show color of the graphics if user select the color //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function woocl_via_classement_woocommerce_get_color_graphique_regular() {
	$options = get_option('via_woocommerce_classement_settings'); 
	if ( isset($options['via_woocommerce_classement_select_couleurs_graphs']) 
		&& ($options['via_woocommerce_classement_select_couleurs_graphs'] == 1) ){
			echo 'green';
	}
	elseif ( isset($options['via_woocommerce_classement_select_couleurs_graphs']) 
		&& ($options['via_woocommerce_classement_select_couleurs_graphs'] == 2) ){
			echo 'blue';
	}
	elseif ( isset($options['via_woocommerce_classement_select_couleurs_graphs']) 
		&& ($options['via_woocommerce_classement_select_couleurs_graphs'] == 3) ){
			echo 'red';
	}
}

function woocl_get_color_graphique_objectifs() {
	$options = get_option('via_woocommerce_classement_settings'); 
	if ( isset($options['via_woocommerce_classement_objectifs_color_graphique']) 
		&& ($options['via_woocommerce_classement_objectifs_color_graphique'] == 1) ){
			echo 'green';
	}
	elseif ( isset($options['via_woocommerce_classement_objectifs_color_graphique']) 
		&& ($options['via_woocommerce_classement_objectifs_color_graphique'] == 2) ){
			echo 'blue';
	}
	elseif ( isset($options['via_woocommerce_classement_objectifs_color_graphique']) 
		&& ($options['via_woocommerce_classement_objectifs_color_graphique'] == 3) ){
			echo 'red';
	}
}

function woocl_get_sales_net() {
	// On questionne la Base de données et on fait le Compte.
    $numamount = floatval(woocl_total_sells_completed_average());
    $numtotal = floatval(woocl_total_tax_completed());
    
    if (is_numeric($numamount) && is_numeric($numtotal)) {
        $resultat = $numamount - $numtotal;
        return number_format((float) $resultat, 2, '.', '');
    } else {
        return;
    }
	
	// On questionne la Base de données et on fait le Compte. 
	/*$numamount = woocl_total_sells_completed_average();
	$numtotal = woocl_total_tax_completed();
	$resultat = $numamount - $numtotal;
	return number_format((float) $resultat, 2, '.', '');*/
}

