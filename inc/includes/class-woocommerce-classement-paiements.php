<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    // Show Paiements transaction results //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_get_paiements_way() {
	global $wpdb;	
	$data = wp_cache_get( 'my_result' );
	if ( false === $data ) {
	$query = "
		SELECT 
		payment_method_title.meta_value as 'payment_method_title'
		,SUM(order_total.meta_value) as 'order_total'
		,count(*) as order_count
		FROM {$wpdb->prefix}posts as posts	";		
	$query .= "	LEFT JOIN  {$wpdb->prefix}postmeta as order_total ON order_total.post_id=posts.ID ";
	$query .= "	LEFT JOIN  {$wpdb->prefix}postmeta as payment_method_title ON payment_method_title.post_id=posts.ID ";
	$query .=	"WHERE 1=1 ";
		
	$query .= " AND posts.post_type ='shop_order' ";
	$query .= " AND order_total.meta_key ='_order_total' ";
	$query .= " AND payment_method_title.meta_key ='_payment_method_title' ";
	$query .= " GROUP BY payment_method_title.meta_value";
	
	$data = $wpdb->get_results( $query );
	wp_cache_set( 'my_result', $data );
	} 

	//$this->print_data($data);
	if (count($data)>0){
	?>
	
	<div class="table-responsive">
	    <table class="table table-striped table-dark">
				<thead>
					<tr>
						<th><?php _e('Payment Methods', 'woo-classement'); ?></th>
						<th><?php _e('Number of Order(s)', 'woo-classement'); ?></th>
						<th><?php _e('Total', 'woo-classement'); ?></th>
					</tr>
				</thead>
				<?php foreach($data  as $k=>$v){ ?>
				<tbody>
					<tr>
						<td>
							<?php echo $v->payment_method_title; ?>
						</td>
						<td>
							<span class="numberCircle">
								<?php echo $v->order_count; ?>
							</span>
						</td>
						<td>
							<span class="numberCircle">
								<?php echo wc_price($v->order_total); ?>
							</span>
						</td>
					</tr>
				</tbody>
				<?php } ?>
		</table>
	</div>
	<?php	
	}else{
	echo "No record found...";	
	}
	
}



/////////////////////////// Display count item sold since Woocommerce  ///////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function woocl_count_paiements_total(){
	global $wpdb;
	$countpaiementstotal = $wpdb->prefix . 'postmeta';
	$wooclcountpaiementstotal = $wpdb->get_results( "SELECT SUM(meta_value) as order_total FROM $countpaiementstotal WHERE `meta_key`='_order_total'" );
	return number_format($wooclcountpaiementstotal[0]->order_total, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
	
	/*global $wpdb;
	$meta_key = '_order_total';
	$wooclcountpaiementstotal = $wpdb->get_var($wpdb->prepare("
	SELECT sum(meta_value) 
	FROM $wpdb->postmeta 
	WHERE meta_key = %s", $meta_key));
	return number_format($wooclcountpaiementstotal, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();*/
}


////////////////////////////////////// CLASS PHP WOOCL PAIEMENTS ///////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class WOOCL_PaymentStatistics {

    protected $wpdb;

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
    }

    public function get_first_order_date() {
        return $this->wpdb->get_var( "SELECT post_date FROM {$this->wpdb->prefix}posts WHERE post_type = 'shop_order' ORDER BY post_date ASC LIMIT 1" );
    }

    public function get_total_sales() {
        return floatval( $this->wpdb->get_var( "SELECT SUM(meta_value) FROM {$this->wpdb->prefix}postmeta WHERE meta_key = '_order_total'" ) );
    }

    public function calculate_average_sales_per_day() {
        $first_order_date = $this->get_first_order_date();

        if ( ! $first_order_date ) {
            return 'Aucune commande trouvée.';
        }

        $first_order_datetime = new DateTime( $first_order_date );
        $today = new DateTime( 'now' );
        $interval = $first_order_datetime->diff( $today );
        $days_elapsed = $interval->days;

        if ( $days_elapsed == 0 ) {
            return 'Moins d\'un jour s\'est écoulé depuis la première commande.';
        }

        $total_sales = $this->get_total_sales();
        $average_sales_per_day = $total_sales / $days_elapsed;

        return '' . number_format( $average_sales_per_day, 2 ) . ' ' . get_woocommerce_currency_symbol();
    }
}


 