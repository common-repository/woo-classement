<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results Products Category //////////////////////////////////

function woocl_results_modal_products_category() { ?>

	<?php echo woocl_products_count_category(); ?>
	
<?php }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                             // Functions Products //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_products_count_categories() {
$product_cat_count = wp_count_terms( 'product_cat' );
echo '<span class="numberCircle">';
echo $product_cat_count;
echo '</span>';
}   

function woocl_products_count_total() {
    $args = array( 
	'post_type' => 'product', 
	'post_status' => 'publish',
	'posts_per_page' => -1 
	);
	$products = new WP_Query( $args );
	echo '<span class="numberCircle">';
	echo $products->found_posts;
	echo '</span>';
}

function woocl_products_count_total_average() {
    $args = array( 
	'post_type' => 'product', 
	'post_status' => 'publish',
	'posts_per_page' => -1 
	);
	$products = new WP_Query( $args );
	echo $products->found_posts;
}

function woocl_products_publish_week( $args = '' ) {
	global $wpdb;
	$defaults = array(
		'echo' => 1,
		'days' => 7,
		'lookahead' => 0
	);
	$the_args = wp_parse_args( $args, $defaults );
	extract( $the_args , EXTR_SKIP );
	unset( $args , $the_args , $defaults );
	$days = intval( $days );
	$operator = ( $lookahead != false ) ? '+' : '-';
	$postsindays = $wpdb->get_col( "
		SELECT COUNT(ID)
		FROM $wpdb->posts
		WHERE (1=1
		AND post_type = 'product'
		AND post_status = 'publish'
		AND post_date >= '" . date('Y-m-d', strtotime("$operator$days days")) . "')"
	);
		if($echo != false) :
			echo '<span class="numberCircle">';
			echo $postsindays[0];
			echo '</span>';
		else :
			echo '<span class="numberCircle">';
			return $postsindays[0];
			echo '</span>';
		endif;
	return;
}

function woocl_products_publish_day( $args = '' ) {
	global $wpdb;
	$defaults = array(
		'echo' => 1,
		'days' => 1,
		'lookahead' => 0
	);
	$the_args = wp_parse_args( $args, $defaults );
	extract( $the_args , EXTR_SKIP );
	unset( $args , $the_args , $defaults );
	$days = intval( $days );
	$operator = ( $lookahead != false ) ? '+' : '-';
	$postsindays = $wpdb->get_col( "
		SELECT COUNT(ID)
		FROM $wpdb->posts
		WHERE (1=1
		AND post_type = 'product'
		AND post_status = 'publish'
		AND post_date >= '" . date('Y-m-d', strtotime("$operator$days days")) . "')"
	);
		if($echo != false) :
		    echo '<span class="numberCircle">';
			echo $postsindays[0];
			echo '</span>';
		else :
		    echo '<span class="numberCircle">';
			return $postsindays[0];
			echo '</span>';
		endif;
	return;
}

function woocl_products_count_category() {
	$terms = get_terms( 'product_cat' );
		foreach( $terms as $term ) 
		{
			echo '<div class="col-md-2 woocl-category">'
				. $term->name
				. '&nbsp;-&nbsp;'
				. $term->count .'&nbsp;' 
				. __('Products', 'woo-classement')
				. '</div>';
		} 
	echo '<div class="via-woocommerce-classement-clear"></div>';
}


function woocl_list_featured_in_stock() { ?>
	<?php
	$params = array(
			'posts_per_page' => 5, 
			'post_type' => array('product', 'product_variation'),
			'meta_key' => '_featured',
			'meta_value' => 'yes',
			'meta_query' => array(
				array(
					'key' => '_stock_status',
					'value' => 'instock'
				)
			)
	);
	$wc_query = new WP_Query($params); 
	?>
	<?php if ($wc_query->have_posts()) : ?>
	<?php while ($wc_query->have_posts()) :
					$wc_query->the_post(); ?>
	<span class="span-color-results"><?php the_title(); ?></span>
	<br />
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php else:  ?>
	<p>
		 <?php _e( 'No products currently', 'woo-classement'); ?>
	</p>
	<?php endif; ?>
<?php
}


function woocl_products_list_featured_out_stock() { ?>
		<?php
		$params = array(
				'posts_per_page' => 5, 
				'post_type' => array('product', 'product_variation'),
				'meta_key' => '_featured',
				'meta_value' => 'yes',
				'meta_query' => array(
					array(
						'key' => '_stock_status',
						'value' => 'outofstock'
					)
				)
		);
		$wc_query = new WP_Query($params); 
		?>
		<?php if ($wc_query->have_posts()) : ?>
			
			<?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
				<span class="span-color-results">
				    <?php the_title(); ?>
				</span>
				<br />
			<?php endwhile; ?>
			
			<?php wp_reset_postdata(); ?>
			
			<?php else:  ?>
				<p>
					 <?php _e( 'No products currently', 'woo-classement'); ?>
				</p>
		<?php endif; ?>
	<?php
	}


function woocl_products_list_in_stock() { ?>
		<?php
		$params = array(
				'posts_per_page' => -1, 
				'post_type' => array('product', 'product_variation'),
				'meta_query' => array(
					array(
						'key' => '_price',
						'type' => 'NUMERIC'
					),
					array(
						'key' => '_stock_status',
						'value' => 'instock'
					)
				)
		);
		$wc_query = new WP_Query($params);
		?>
		<?php if ($wc_query->have_posts()) : ?>
			
			<?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
				<span class="span-color-results">
					<?php the_title(); ?>
				</span>
				<br />
			<?php endwhile; ?>
			
			<?php wp_reset_postdata(); ?>
			
			<?php else:  ?>
				<p>
					 <?php _e( 'No products currently', 'woo-classement'); ?>
				</p>
		<?php endif; ?>

<?php
}

function woocl_products_list_stock_count_statut($statut) { ?>
		<?php
		$params = array(
				'posts_per_page' => -1,
				'post_type' => array('product', 'product_variation'),
				'meta_query' => array(
					array(
						'key' => '_price',
						'type' => 'NUMERIC'
					),
					array(
						'key' => '_stock_status',
						'value' => $statut,
					)
				)
		);
		$wc_query = new WP_Query($params);
		?>
		<?php
		echo '<span class="numberCircle">';
			echo '&nbsp;';
			$num = $wc_query->post_count; 
			echo $num;
		echo '</span>';
		?>

<?php
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Get star Rating 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function get_star_rating() {
    global $woocommerce, $product;  
    $average         = $product->get_average_rating();
    $review_count    = $product->get_review_count();
	return '<div class="star-rating">
		<span style="width:'.( ( $average / 5 ) * 100 ) . '%" title="'. 
		  $average.'">
			<strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).                              
		'</span>                    
	</div>';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Get star Rating Count
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function get_star_rating_count() {
    global $woocommerce, $product;  
    $average         = $product->get_average_rating();
    $review_count    = $product->get_review_count();
    return '<a href="#reviews" class="woocommerce-review-link" rel="nofollow">' . $review_count .'</a>';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Get list products by views popularity
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function woocl_get_products_view_list() { 
	global $post;
	$today = date('Ymd');
	$month = date('Ym');
	$year = date('Y');
	$currentmonth = date('F');
	$currentyear = date('Y');
	$popularpost = new WP_Query( 
	array( 
	'post_type'          => 'product',
	'posts_per_page'     => -1,
	'meta_key'           => 'woocommerce_classement_product_count',
    'suppress_filters'   => true	
	) 
	);
	echo'<div class="table-responsive">';
			echo'<table id="datatable-product-count-filter" class="table table-striped">';
				echo'<thead>';
					echo'<tr>';
					echo'<th>'; _e('Product name', 'woo-classement'); '</th>';
					echo'<th>'; _e('Visits count', 'woo-classement'); '</th>';
					echo'<th>'; _e('Product Comments count', 'woo-classement'); '</th>';
					echo'<th>'; _e('Product Reviews count', 'woo-classement'); '</th>';
					echo'<th>'; _e('Product Reviews average', 'woo-classement'); '</th>';
					echo'<th>'; _e('Count View Today', 'woo-classement'); '</th>';
					echo'<th>'; _e('Count View - '. $currentmonth . '', 'woo-classement'); '</th>';
					echo'<th>'; _e('Count View - '. $currentyear . '', 'woo-classement'); '</th>';
					echo'</tr>';
				echo'</thead>';
				echo'<tbody>';
					while ( $popularpost->have_posts() ) : $popularpost->the_post(); 
					global $product;
					$product = wc_get_product( $post->ID );
						echo'<tr class="blogBox moreBox">';
							echo'<td>'; the_title(); '</td>';
							echo'<td>'; echo woocl_get_product_views_products($post->ID);'</td>';
							echo'<td>'; echo $post->comment_count;'</td>';
							echo'<td>'; echo get_star_rating_count();'</td>';
							echo'<td>'; echo get_star_rating();'</td>';
							echo'<td>'; echo woocl_get_product_views_products_bydate($today) . '</td>';
							echo'<td>'; echo woocl_get_product_views_products_bymonth($month) . '</td>';
							echo'<td>'; echo woocl_get_product_views_products_byyear($year) . '</td>';
							//antall_deltakere_mnd();
						echo'</tr>';
					endwhile;
				echo'</tbody>';
	echo'</table>';
	echo'</div>';
	echo'<div class="via-woocommerce-classement-clear"></div>';
}


//////////////////// en travail /////////////////////////////////////
function woocl_products_list_out_stock() { ?>
	<?php
	$params = array(
			'posts_per_page' => 5, 
			'post_type' => array('product', 'product_variation'),
			'meta_query' => array(
				array(
					'key' => '_price',
					'type' => 'NUMERIC'
				),
				array(
					'key' => '_stock_status',
					'value' => 'outofstock'
				)
			)
	);
	$wc_query = new WP_Query($params); 
	?>
	
	<?php if ($wc_query->have_posts()) : ?>
		<?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
			<span class="span-color-results">
			    <?php the_title(); ?>
			</span>
			<br />
		<?php endwhile; ?>
		
	<?php wp_reset_postdata(); ?>
	
	<?php else:  ?>
	    <p style="font-size:20px !important;"><?php _e( 'No products', 'woo-classement'); ?></p>
	<?php endif; ?>
	
<?php
}



//////////////////// en travail /////////////////////////////////////

function woocl_products_classement_total_sells() { ?>
	
	<?php
	$i = 1;
	$semaine = new WP_Query( array( 
	'post_type' => array('product', 'product_variation'),
	'post_status' => 'publish',
	'meta_key' => 'total_sales',
	'orderby' => 'meta_value_num',
	'showposts'  => '5',		
	'order' => 'DESC', 
	));
	while ( $semaine->have_posts() ) : $semaine->the_post();
	?>
	 <span class="span-color-results"> <?php echo $i; ?> <?php _e('-'); ?> <?php the_title(); ?></span>
	<br />
	<?php $i++; ?>
	<?php wp_reset_query(); ?>
	<?php endwhile; ?>
	<?php //echo '<a href="#">+</a>'; ?>
<?php        
}


//////////////////// en travail /////////////////////////////////////

function woocl_products_classement_total_rating() { ?>
	
	<?php
	$i = 1;
	$semaine = new WP_Query( array( 
	'post_type' => array('product', 'product_variation'),
	'post_status' => 'publish',
	'meta_key' => '_rating',
	'orderby' => 'meta_value_num',
	'showposts'  => '5',		
	'order' => 'DESC', 
	));
	while ( $semaine->have_posts() ) : $semaine->the_post();
	?>
		<?php echo $i; ?> <?php _e('-'); ?> <span class="span-color-results"><?php the_title(); ?></span>
		<br />
	<?php $i++; ?>
	<?php wp_reset_query(); ?>
	<?php endwhile; ?>
	<a href="#">+</a> 
<?php        
}


////////////////////////////// EN TRAVAIL ///////////////////////////////////////////////////
function woocl_product_by_year($year) { ?> 
	 
	 <?php
	 
     $productbyyear = new WP_Query(
		array(
			'post_type' => array('product', 'product_variation'),
			'posts_per_page' => -1,
			'orderby' => 'date',
			'order' => 'DESC',
		
			'date_query'   => array(
				array(
				'year'  => $year,
				)
			)
		));

	?>
	
	<?php if ( $productbyyear->have_posts() ) : ?>
	
	<div class="table-responsive">
			
			<table class="table">

				<tr>
					<th><?php _e('Product Date', 'woo-classement'); ?></th>
					<th><?php _e('Product Title', 'woo-classement'); ?></th>
					<th><?php _e('Category', 'woo-classement'); ?></th>
					<th><?php _e('Units Sold', 'woo-classement'); ?></th>
					<th><?php _e('Total Sales', 'woo-classement'); ?></th>
				</tr>
					
				
				<tbody>		
					
				<?php
				while (  $productbyyear->have_posts() ) :  $productbyyear->the_post();
				global $product;
				?>
					<tr>
						
						<td>
							<?php the_date(); ?>
						</td>
						
						<td>
							<?php the_title(); ?>
						</td>
						
						<td>
							<?php echo $product->get_categories(); ?>
						</td>
						
						<td>
							<?php  
								$units_sold = get_post_meta( $product->id, 'total_sales', true ); 
								if ($units_sold > 1) {
								echo '' . sprintf( __( '%s', 'woo-classement' ), $units_sold ) . ''; 
								}
								else { 
								echo '' . sprintf( __( '%s', 'woo-classement' ), $units_sold ) . '';
								}
							?>
						</td>
						
						<td>
							<?php  
								if ( via_classement_woocommerce_version_check('3.0') ) { 
								$units_sold = $product->get_total_sales();
								}
								else {
								$units_sold = get_post_meta( $product->id, 'total_sales', true ); 
								}

								$price_sold = $product->get_price();

								$totalsold = $units_sold * $price_sold;
								echo number_format((float) $totalsold, 2, '.', '') . '&nbsp;' . get_woocommerce_currency_symbol();
							?>
						</td>
						
					</tr> 
					
				<?php wp_reset_query(); ?>
				
				<?php endwhile; ?>
			
				</tbody>
								
		</table>

	</div>
    
	<?php else : ?>
		
		<p>
		    <?php _e( 'No products currently', 'woo-classement'); ?>
		</p>
		
	<?php endif; ?>

	
<?php        
}
////////////////////////////// EN TRAVAIL ///////////////////////////////////////////////////


function woocl_product_get_all_comments_products($post_type){
  global $wpdb;
  $countcomments = $wpdb->get_var("SELECT COUNT(comment_ID)
    FROM $wpdb->comments
    WHERE comment_post_ID in (
      SELECT ID 
      FROM $wpdb->posts 
      WHERE post_type = '$post_type' 
      AND post_status = 'publish')
    AND comment_approved = '1'
  ");
  return $countcomments;
}



/////////////////////////// Display count item sold since Woocommerce  ///////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function woocl_items_sold_count(){
	global $wpdb;
	$tablename = $wpdb->prefix . 'woocommerce_order_items';
	$myquery = $wpdb->get_results( "SELECT * FROM $tablename WHERE `order_item_type` LIKE 'line_item'" );
	$numrows = count($myquery); //PHP count()
	if ($numrows == '0') {
	    return '0';
	}
	else {
	    return $numrows;
	}
}


/////////////////////////// Display count item sold by date Woocommerce  /////////////////
//////////////////////////////////////////////////////////////////////////////////////////

add_shortcode( 'woocl_items_sold', 'woocl_display_num_items_sold' );
function woocl_display_num_items_sold( $atts ) {
    // Set the defaullt timezone (see: https://www.php.net/manual/en/timezones.php)
    date_default_timezone_set( 'America/Toronto' );

    $now = date( 'Y-m-d H:i:s', strtotime("now") ); // get now formated datetime

    // Shortcode attribute (or argument)
    extract( shortcode_atts( array(
        'from'   => '', // Date from (is required)
        'to'     => $now, // Date to (optional: default is "now" value)
    ), $atts, 'num_items_sold' ) );

    // Formating dates
    $date_from = date('Y-m-d H:i:s', strtotime($from) );
    $date_to   = date('Y-m-d H:i:s', strtotime($to) );

    if ( ! empty($date_from) ) {
        global $wpdb;

        // Custom SQL query
        $num_items_sold = $wpdb->get_var( $wpdb->prepare("
            SELECT     SUM(oim.meta_value)
            FROM       {$wpdb->prefix}woocommerce_order_itemmeta as oim
            INNER JOIN {$wpdb->prefix}woocommerce_order_items as oi
                ON     oim.order_item_id = oi.order_item_id
            INNER JOIN {$wpdb->prefix}posts as o
                ON     oi.order_id = o.ID
            WHERE      oim.meta_key = '_qty'
                AND    o.post_status IN ('wc-processing','wc-completed')
                AND    o.post_date >= '%s'
                AND    o.post_date <= '%s'
        ", $date_from, $date_to ) );
        if ($num_items_sold) {
           return $num_items_sold;
		}
		else {
			return '0';
		}
    }
}
