<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**************************** Get Views results in admin products columns ********************************/
function woocl_get_product_views($postID){
    $count_key = 'woocommerce_classement_product_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0 Views';
    }
    return $count . ' Views';
}
function woocl_get_product_views_products($postID){
    $count_key = 'woocommerce_classement_product_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}
function woocl_get_product_views_date($postID){
    $prefix = date('Ymd');
	$count_key = $prefix . '_woocommerce_classement_product_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}

function woocl_get_product_views_month($postID){
    $prefix = date('Ym');
	$count_key = $prefix . '_woocommerce_classement_product_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}

function woocl_get_product_views_year($postID){
    $prefix = date('Y');
	$count_key = $prefix . '_woocommerce_classement_product_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}

/**************************** Get Views results in products plugin section datatable ********************************/
function woocl_get_product_views_products_bydate($viewdate){
    $prefix = date('' . $viewdate . '');
	$postID = get_the_ID();
	$count_key = $prefix . '_woocommerce_classement_product_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}
function woocl_get_product_views_products_bymonth($viewmonth){
    $prefixmonth = date('' . $viewmonth . '');
	$postID = get_the_ID();
	$count_key = $prefixmonth . '_woocommerce_classement_product_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}
function woocl_get_product_views_products_byyear($viewyear){
    $prefixyear = date('' . $viewyear . '');
	$postID = get_the_ID();
	$count_key = $prefixyear . '_woocommerce_classement_product_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}


///////////////////// Set post meta add 1 /////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

function woocl_set_post_views($postID) {
    $count_key = 'woocommerce_classement_product_count';
    $count = get_post_meta($postID, $count_key, true);
	if($count == ''){
        $count = 0;
        delete_post_meta($postID, $count_key); 
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);		
    }
	woocl_statistiques_views_Function();
}

///////////////////// Set post meta add 1 /////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

function woocl_set_post_views_others($postID) {
    $count_key = 'woocommerce_classement_product_count_others';
    $count = get_post_meta($postID, $count_key, true);
	if($count == ''){
        $count = 0;
        delete_post_meta($postID, $count_key); 
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);		
    }
	woocl_statistiques_views_Function();
}

function woocl_set_post_view_by_date($postID) {
    $prefix = date('Ymd'); // 122019
    $countkey = $prefix . '_woocommerce_classement_product_count'; // `122019_post_views_count`
	$countdate = get_post_meta($postID, $countkey, true);
	if($countdate == ''){
        $countdate = 0;
        delete_post_meta($postID, $countkey); 
        add_post_meta($postID, $countkey, '0');
    }
	else{
        $countdate++;
        update_post_meta($postID, $countkey, $countdate);
    }
}
function woocl_set_post_view_by_month($postID) {
    $prefix = date('Ym'); // 122019
    $countkeymonth = $prefix . '_woocommerce_classement_product_count'; // `122019_post_views_count`
	$countmonth = get_post_meta($postID, $countkeymonth, true);
	if($countmonth == ''){
        $countmonth = 0;
        delete_post_meta($postID, $countkeymonth); 
        add_post_meta($postID, $countkeymonth, '0');
    }
	else{
        $countmonth++;
        update_post_meta($postID, $countkeymonth, $countmonth);
    }
}
function woocl_set_post_view_by_year($postID) {
    $prefixyear = date('Y'); // 2022
    $countkeyyear = $prefixyear . '_woocommerce_classement_product_count'; // `122019_post_views_count`
	$countyear = get_post_meta($postID, $countkeyyear, true);
	if($countyear == ''){
        $countyear = 0;
        delete_post_meta($postID, $countkeyyear); 
        add_post_meta($postID, $countkeyyear, '0');
    }
	else{
        $countyear++;
        update_post_meta($postID, $countkeyyear, $countyear);
    }
}

///////////////////// Get Products Views in Peity Charts //////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
function woocl_get_product_views_products_bydate_peitycharts($date) {
	global $wpdb;
	$meta_key = $date.'_woocommerce_classement_product_count';
	$totalviews = $wpdb->get_var($wpdb->prepare("
	SELECT sum(meta_value) 
	FROM $wpdb->postmeta 
	WHERE meta_key = %s", $meta_key)
	);
    return number_format_i18n( $totalviews );	
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                             // Add st post views product in the single product.
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//To keep the count accurate, lets get rid of prefetching
//remove_action( 'wp_head', 'woocl_count_views_products', 10, 0);

///////////////////////////////////////
// Tracks Views
///////////////////////////////////////
function woocl_count_views_products() {
	if (is_product() && !is_checkout() && !is_cart() && !is_account_page() ){
		woocl_set_post_views(get_the_ID());
		woocl_set_post_view_by_date(get_the_ID());
		woocl_set_post_view_by_month(get_the_ID());
		woocl_set_post_view_by_year(get_the_ID());
	}
	if (is_singular('post') && !is_checkout() && !is_cart() && !is_account_page() ) {
		woocl_set_post_views_others(get_the_ID());
	}
	if (is_page() && !is_checkout() && !is_cart() && !is_account_page() ) {	
	    woocl_set_post_views_others(get_the_ID());
	}
	if ( is_page_template() && !is_checkout() && !is_cart() && !is_account_page() ) {	
	    woocl_set_post_views_others(get_the_ID());
	}
	if ( is_cart() ) {	
	    woocl_set_post_views_others(get_the_ID());
	}
	if ( is_account_page()) {	
	    woocl_set_post_views_others(get_the_ID());
	}
}
add_action( 'wp_head', 'woocl_count_views_products');

/*remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function woocl_count_views_products() { 
	echo woocl_set_post_views(get_the_ID());  
    echo woocl_set_post_view_by_date(get_the_ID());
    echo woocl_set_post_view_by_month(get_the_ID());
    echo woocl_set_post_view_by_year(get_the_ID());
}     
add_action( 'woocommerce_single_product_summary', 'woocl_count_views_products', 15 );*/



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                             // Admin Columns display products Views
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$options = get_option('via_woocommerce_classement_settings'); 
if ( isset($options['via_woocommerce_classement_show_product_views']) && ($options['via_woocommerce_classement_show_product_views'] == 1) ){ 
	add_filter('manage_product_posts_columns', 'woocl_count_views');
	add_action('manage_product_posts_custom_column', 'woocl_column_products_count',5,2);
	function woocl_count_views($defaults){
		$defaults['woocommerce_classement_product_count'] = __('Views', 'woo-classement');
		$defaults['woocommerce_classement_product_count_date'] = __('Today <span style="font-size:11px"><br />(Since 2022-03-02)</span>', 'woo-classement');
		$defaults['woocommerce_classement_product_count_month'] = __('This Month <span style="font-size:11px"><br />(Since 2022-03-02)</span>', 'woo-classement');
		$defaults['woocommerce_classement_product_count_year'] = __('This Year <span style="font-size:11px"><br />(Since 2022-03-02)</span>', 'woo-classement');
		return $defaults;
	}
	function woocl_column_products_count($column_name, $id){
		if($column_name === 'woocommerce_classement_product_count'){
			echo woocl_get_product_views(get_the_ID());
		}
		if($column_name === 'woocommerce_classement_product_count_date'){
			echo woocl_get_product_views_date(get_the_ID());
		}
		if($column_name === 'woocommerce_classement_product_count_month'){
			echo woocl_get_product_views_month(get_the_ID());
		}
		if($column_name === 'woocommerce_classement_product_count_year'){
			echo woocl_get_product_views_year(get_the_ID());
		}
	}
} 
else {
}  