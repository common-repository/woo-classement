<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<!-- Navbar Start -->
<nav class="navigation">
	<ul class="list-unstyled">
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement')){echo 'active';} ?>">
			<a href="<?php echo admin_url( "admin.php?page=via-woocommerce-classement" ); ?>">
			<i class="zmdi zmdi-view-dashboard"></i> <span class="nav-label"><?php _e('Dashboard', 'woo-classement'); ?></span>
			</a>
		</li>
		
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-statistics')){ echo 'active';} ?>">
			<a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-statistics' ); ?>">
			<i class="zmdi zmdi-chart"></i> 
			<span class="nav-label"><?php _e('Statistics', 'woo-classement'); ?></span>
			<span class="badge bg-success"></span>
			</a>
		</li>
		
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-conversions')){ echo 'active';} ?>">
			<a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-conversions' ); ?>">
			<i class="zmdi zmdi-devices"></i>
			<span class="nav-label"><?php _e('Conversions', 'woo-classement'); ?></span>
			<span class="badge bg-success"></span>
			</a>
		</li>
		
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-client')){echo 'active';} ?>">
			<a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-client' ); ?>">
			<i class="zmdi zmdi-male-female"></i> 
			<span class="nav-label"><?php _e('Customers', 'woo-classement'); ?></span>
			<span class="badge bg-success"><?php echo woocl_total_user_registred_day(); ?></span>
			</a>
		</li>
		
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-orders')){ echo 'active';} ?>"><a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-orders' ); ?>">
		<i class="zmdi zmdi-camera-add"></i> 
		<span class="nav-label"><?php _e('Orders', 'woo-classement'); ?></span>
		<span class="badge bg-success"><?php echo woocl_total_orders_statut('wc-processing'); ?></span></a>
		</li>
		
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-products')){ echo 'active';} ?>"><a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-products' ); ?>">
		<i class="zmdi zmdi-shopping-cart-plus"></i> 
		<span class="nav-label"><?php _e('Products', 'woo-classement'); ?></span>
	    </a>
		</li>
		
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-coupons')){ echo 'active';} ?>"><a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-coupons' ); ?>">
		<i class="zmdi zmdi-arrow-right-top"></i> 
		<span class="nav-label"><?php _e('Coupons', 'woo-classement'); ?></span>
		</a>
		</li>
		
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-shipping')){ echo 'active';} ?>">
		    <a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-shipping' ); ?>">
			<i class="zmdi zmdi-pin"></i> 
			<span class="nav-label"><?php _e('Shipping', 'woo-classement'); ?></span>
			</a>
		</li>
		
        <li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-paiements')){ echo 'active';} ?>">
		    <a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-paiements' ); ?>">
			<i class="zmdi zmdi-card"></i> 
			<span class="nav-label"><?php _e('Payments', 'woo-classement'); ?></span>
			</a>
		</li>
		
		<?php $options = get_option('via_woocommerce_classement_settings'); if ( isset($options['via_woocommerce_classement_dokan_show']) && ($options['via_woocommerce_classement_dokan_show'] == 1) ){ ?>
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-dokan')){ echo 'active';} ?>"><a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-dokan' ); ?>">
			<i class="zmdi zmdi-accounts-alt"></i> 
			<span class="nav-label"><?php _e('Dokan Statistics', 'woo-classement'); ?></span>
			</a>
		</li>
		<?php } else { ?>
		<?php } ?>
		
		<?php $options = get_option('via_woocommerce_classement_settings'); if ( isset($options['via_woocommerce_classement_vendors_show']) && ($options['via_woocommerce_classement_vendors_show'] == 1) ){ ?>
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-vendors')){ echo 'active';} ?>"><a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-vendors' ); ?>">
		<i class="zmdi zmdi-accounts-alt"></i> 
		<span class="nav-label"><?php _e('WC Vendors', 'woo-classement'); ?></span>
		<span class="badge bg-success"><?php echo woocl_total_vendor_registred_day(); ?></span>
		</a>
		</li>
		<?php } else { ?>
		<?php } ?>
		
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-options')){ echo 'active';} ?>">
			<a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-options' ); ?>">
			<i class="zmdi zmdi-desktop-windows"></i> 
			<span class="nav-label"><?php _e('Options', 'woo-classement'); ?></span>
			</a>
		</li>
		
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-import-export')){ echo 'active';} ?>">
			<a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-import-export' ); ?>">
				<i class="zmdi zmdi-download"></i>
				<span class="nav-label"><?php _e('Export/Import', 'woo-classement'); ?></span>
			</a>
		</li>

		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-help')){ echo 'active';} ?>"><a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-help' ); ?>">
		<i class="zmdi zmdi-email"></i> 
		<span class="nav-label"><?php _e('Help / Updates', 'woo-classement'); ?></span>
		</a>
		</li>
	
		<li class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'via-woocommerce-classement-viaplugins')){ echo 'active';} ?>"><a href="<?php echo admin_url( 'admin.php?page=via-woocommerce-classement-viaplugins' ); ?>">
			<i class="zmdi zmdi-dot-circle"></i>
			<span class="nav-label"><?php _e('Via Plugins', 'woo-classement'); ?></span>
			</a>
		</li>
	</ul>
</nav>