<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'admin_init', 'woocl_settings_init' );

function woocl_settings_init(  ) { 

	register_setting( 'viawoocommerceclassementPage', 'via_woocommerce_classement_settings' );
	register_setting( 'viawoocommerceclassementObjectifs', 'via_woocommerce_classement_settings' );
	register_setting( 'viawoocommerceclassementStatistics', 'via_woocommerce_classement_settings' );
	register_setting( 'viawoocommerceclassementUsers', 'via_woocommerce_classement_settings' );
	register_setting( 'viawoocommerceclassementProducts', 'via_woocommerce_classement_settings' );
	register_setting( 'viawoocommerceclassementVendors', 'via_woocommerce_classement_settings' );
	register_setting( 'viawoocommerceclassementLicense', 'via_woocommerce_classement_settings' );

	//////////////////////////////// Sections Options ///////////////////////////////////////////
	
	add_settings_section(
		'via_woocommerce_classement_viawoocommerceclassementPage_section', 
		__( '<i class="fa fa-pencil" aria-hidden="true"></i> Options', 'woo-classement' ), 
		'woocl_settings_section_callback', 
		'viawoocommerceclassementPage'
	);
	
	add_settings_section(
		'via_woocommerce_classement_viawoocommerceclassementObjectifs_section', 
		__( '<i class="fc_icons fa fa-google-wallet"></i> Sales Targets', 'woo-classement' ), 
		'woocl_settings_section__objectifs_callback', 
		'viawoocommerceclassementObjectifs'
	);
	
	add_settings_section(
		'via_woocommerce_classement_viawoocommerceclassementStatistics_section', 
		__( '<i class="fas fa-chart-bar"></i> Statistics', 'woo-classement' ), 
		'woocl_settings_section_statistics_callback', 
		'viawoocommerceclassementStatistics'
	);
	
	add_settings_section(
		'via_woocommerce_classement_viawoocommerceclassementUsers_section', 
		__( '<i class="fa fa-user"></i> Users', 'woo-classement' ), 
		'woocl_settings_section_users_callback', 
		'viawoocommerceclassementUsers'
	);
	
	add_settings_section(
		'via_woocommerce_classement_viawoocommerceclassementProducts_section', 
		__( '<i class="fas fa-cart-plus"></i> Products', 'woo-classement' ), 
		'woocl_settings_section_products_callback', 
		'viawoocommerceclassementProducts'
	);
	
	add_settings_section(
		'via_woocommerce_classement_viawoocommerceclassementVendors_section', 
		__( '<i class="fa fa-users"></i> Vendors', 'woo-classement' ), 
		'woocl_settings_section_vendors_callback', 
		'viawoocommerceclassementVendors'
	);
	
	add_settings_section(
		'via_woocommerce_classement_viawoocommerceclassementLicense_section', 
		__( '<i class="fab fa-google"></i> Google API', 'woo-classement' ), 
		'woocl_settings_section_license_callback', 
		'viawoocommerceclassementLicense'
	);
	
	//////////////////////////////// Settings fields Options ////////////////////////////////////
	
	/****************************** Objectifs *********************************/
	
	add_settings_field( 
		'via_woocommerce_classement_objectifs_color_graphique', 
		__( 'Color of Graphics (Objectives)', 'woo-classement' ), 
		'woocl_objectifs_color_graphique_render', 
		'viawoocommerceclassementObjectifs', 
		'via_woocommerce_classement_viawoocommerceclassementObjectifs_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_objectifs_ventes', 
		__( '
		<button type="button" style="background:none; border:0" class="tooltip-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Set a sales target per year."><i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
		</i></button>
		Sales Objectives', 'woo-classement' ), 
		'woocl_objectifs_ventes_render', 
		'viawoocommerceclassementObjectifs', 
		'via_woocommerce_classement_viawoocommerceclassementObjectifs_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_objectifs_clients', 
		__( '
		<button type="button" style="background:none; border:0" class="tooltip-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Set as target a number of new customers per year."><i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
		</i></button>
		Customer Objectives', 'woo-classement' ), 
		'woocl_objectifs_clients_render', 
		'viawoocommerceclassementObjectifs', 
		'via_woocommerce_classement_viawoocommerceclassementObjectifs_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_objectifs_commandes', 
		__( '
		<button type="button" style="background:none; border:0" class="tooltip-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Give as a target a number of orders per year."><i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
		</i></button>
		Objectives Orders', 'woo-classement' ), 
		'woocl_objectifs_commandes_render', 
		'viawoocommerceclassementObjectifs', 
		'via_woocommerce_classement_viawoocommerceclassementObjectifs_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_objectifs_coupons', 
		__( '
		<button type="button" style="background:none; border:0" class="tooltip-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Give as a target a number of new coupons per year."><i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
		</i></button>
		Coupon Targets', 'woo-classement' ), 
		'woocl_objectifs_coupons_render', 
		'viawoocommerceclassementObjectifs', 
		'via_woocommerce_classement_viawoocommerceclassementObjectifs_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_objectifs_shipping', 
		__( '
		<button type="button" style="background:none; border:0" class="tooltip-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Set a target for a delivery amount per year."><i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
		</i></button>
		Objectives Shipping', 'woo-classement' ), 
		'woocl_objectifs_shipping_render', 
		'viawoocommerceclassementObjectifs', 
		'via_woocommerce_classement_viawoocommerceclassementObjectifs_section' 
	);
	
	/****************************** Page *********************************/

    add_settings_field( 
		'via_woocommerce_classement_chiffre_affaires', 
		__( '
		<button type="button" style="background:none; border:0" class="tooltip-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Enter an estimated amount of sales per month."><i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
		</i></button>
		Monthly Sales Limit (Charts)', 'woo-classement' ), 
		'woocl_chiffre_affaires_render', 
		'viawoocommerceclassementPage', 
		'via_woocommerce_classement_viawoocommerceclassementPage_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_chiffre_affaires_comparatif_annuel', 
		__( '
		<button type="button" style="background:none; border:0" class="tooltip-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Enter an estimated amount of sales per year."><i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
		</i></button>
		Annual Sales limit (Charts)', 'woo-classement' ), 
		'woocl_chiffre_affaires_comparatif_annuel_render', 
		'viawoocommerceclassementPage', 
		'via_woocommerce_classement_viawoocommerceclassementPage_section' 
	);
    
	add_settings_field( 
		'via_woocommerce_classement_checkbox_annee_2017', 
		__( 'Chart for 2017 ?', 'woo-classement' ), 
		'woocl_checkbox_annee_deuxzerounsept_render', 
		'viawoocommerceclassementPage', 
		'via_woocommerce_classement_viawoocommerceclassementPage_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_checkbox_annee_2016', 
		__( 'Chart for 2016 ?', 'woo-classement' ), 
		'woocl_checkbox_annee_deuxzerounsix_render', 
		'viawoocommerceclassementPage', 
		'via_woocommerce_classement_viawoocommerceclassementPage_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_checkbox_annee_2015', 
		__( 'Chart for 2015 ?', 'woo-classement' ), 
		'woocl_checkbox_annee_deuxzerouncinq_render', 
		'viawoocommerceclassementPage', 
		'via_woocommerce_classement_viawoocommerceclassementPage_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_checkbox_comparatif_annuel', 
		__( 'Annual Comparisons ?', 'woo-classement' ), 
		'woocl_checkbox_comparatif_annuel_render', 
		'viawoocommerceclassementPage', 
		'via_woocommerce_classement_viawoocommerceclassementPage_section' 
	);

	add_settings_field( 
		'via_woocommerce_classement_textarea_objectifs_employes', 
		__( 'Comments for Employees', 'woo-classement' ), 
		'woocl_textarea_objectifs_employes_render', 
		'viawoocommerceclassementObjectifs', 
		'via_woocommerce_classement_viawoocommerceclassementObjectifs_section' 
	);

	add_settings_field( 
		'via_woocommerce_classement_select_couleurs_graphs', 
		__( 'Choice of color of Graphs', 'woo-classement' ), 
		'woocl_select_couleurs_graphs_render', 
		'viawoocommerceclassementPage', 
		'via_woocommerce_classement_viawoocommerceclassementPage_section' 
	);
	
	/****************************** Statistics *********************************/
	
	add_settings_field( 
		'via_woocommerce_classement_Statistics_start_year', 
		__( 'Starting year for graphic statistics (Ex: 2015)', 'woo-classement' ), 
		'woocl_Statistics_start_year_render', 
		'viawoocommerceclassementStatistics', 
		'via_woocommerce_classement_viawoocommerceclassementStatistics_section' 
	);
	
	/****************************** Users *********************************/
	
	add_settings_field( 
		'via_woocommerce_classement_users_show_compare_years', 
		__( '
		<button type="button" style="background:none; border:0" class="tooltip-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="This chart shows the number of customers and vendors registred per year."><i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
		</i></button>
		Show Customer Chart by Year ? (Top Graphs)', 'woo-classement' ), 
		'woocl_users_show_compare_years_render', 
		'viawoocommerceclassementUsers', 
		'via_woocommerce_classement_viawoocommerceclassementUsers_section' 
	);
	
	add_settings_field( 
		'woocl_users_show_customers_bought', 
		__( '
		<button type="button" style="background:none; border:0" class="tooltip-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Show customers their purchased products (Customer account)."><i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
		</i></button>
		Show customers their purchased products (Customer account)', 'woo-classement' ), 
		'woocl_users_show_customers_bought_render', 
		'viawoocommerceclassementUsers', 
		'via_woocommerce_classement_viawoocommerceclassementUsers_section' 
	);
	
	
	add_settings_field( 
		'via_woocommerce_classement_users_loyal_count', 
		__( '
		<button type="button" style="background:none; border:0" class="tooltip-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Number of orders desired to become Customer loyalty. Ex: 3. If the customer has or more than three orders, in the customer table it will be declared customer faithful."><i class="fa fa-question-circle" aria-hidden="true" style="font-size:13px;display:inline-block">
		</i></button>
		Count Orders to be a Loyal Customer ( be > 1 )', 'woo-classement' ), 
		'woocl_users_loyal_count_render', 
		'viawoocommerceclassementUsers', 
		'via_woocommerce_classement_viawoocommerceclassementUsers_section' 
	);
	
	////////////////////////////// Products ////////////////////////////////////////
	
	add_settings_field( 
		'via_woocommerce_classement_show_product_system', 
		__( 'Activate Product Views System', 'woo-classement' ), 
		'woocl_show_product_system_render', 
		'viawoocommerceclassementProducts', 
		'via_woocommerce_classement_viawoocommerceclassementProducts_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_show_product_views', 
		__( 'Show Views in Product Column', 'woo-classement' ), 
		'woocl_show_product_views_render', 
		'viawoocommerceclassementProducts', 
		'via_woocommerce_classement_viawoocommerceclassementProducts_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_active_product_duplicate', 
		__( 'Activate Duplicate Products ?', 'woo-classement' ), 
		'woocl_active_product_duplicate_render', 
		'viawoocommerceclassementProducts', 
		'via_woocommerce_classement_viawoocommerceclassementProducts_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_custom_product_views', 
		__( 'Have you a product meta key for views ?', 'woocommerce-classement' ), 
		'woocl_custom_product_views_render', 
		'viawoocommerceclassementProducts', 
		'via_woocommerce_classement_viawoocommerceclassementProducts_section' 
	);
	
	/////////////////////////// Vendors //////////////////////////////////////////
	
	add_settings_field( 
		'via_woocommerce_classement_vendors_show', 
		__( 'Show WC Vendors Statistics ?', 'woo-classement' ), 
		'woocl_vendors_show_render', 
		'viawoocommerceclassementVendors', 
		'via_woocommerce_classement_viawoocommerceclassementVendors_section' 
	);
	
	add_settings_field( 
		'via_woocommerce_classement_dokan_show', 
		__( 'Show Dokan Statistics ?', 'woo-classement' ), 
		'woocl_dokan_show_render', 
		'viawoocommerceclassementVendors', 
		'via_woocommerce_classement_viawoocommerceclassementVendors_section' 
	);
	
	/////////////////////////// License Google API //////////////////////////////////////////
	
	add_settings_field( 
		'via_woocommerce_classement_license_key', 
		__( 'Enter your Google API Key', 'woo-classement' ), 
		'woocl_license_key_render', 
		'viawoocommerceclassementLicense', 
		'via_woocommerce_classement_viawoocommerceclassementLicense_section' 
	);

}

//////////////////////////////// fonctions Options ////////////////////////////////////

function woocl_chiffre_affaires_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<input style="width:100%" type="text" name='via_woocommerce_classement_settings[via_woocommerce_classement_chiffre_affaires]' value='<?php echo $options['via_woocommerce_classement_chiffre_affaires']; ?>'>
	<?php
}

function woocl_chiffre_affaires_comparatif_annuel_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<input style="width:100%" type="text" name='via_woocommerce_classement_settings[via_woocommerce_classement_chiffre_affaires_comparatif_annuel]' value='<?php echo $options['via_woocommerce_classement_chiffre_affaires_comparatif_annuel']; ?>'>
	<?php
}

function woocl_objectifs_ventes_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<input style="width:100%" type="text" name='via_woocommerce_classement_settings[via_woocommerce_classement_objectifs_ventes]' value='<?php echo $options['via_woocommerce_classement_objectifs_ventes']; ?>'>
	<?php
}

function woocl_objectifs_clients_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<input style="width:100%" type="text" name='via_woocommerce_classement_settings[via_woocommerce_classement_objectifs_clients]' value='<?php echo $options['via_woocommerce_classement_objectifs_clients']; ?>'>
	<?php
}

function woocl_objectifs_commandes_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<input style="width:100%" type="text" name='via_woocommerce_classement_settings[via_woocommerce_classement_objectifs_commandes]' value='<?php echo $options['via_woocommerce_classement_objectifs_commandes']; ?>'>
	<?php
}

function woocl_objectifs_coupons_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<input style="width:100%" type="text" name='via_woocommerce_classement_settings[via_woocommerce_classement_objectifs_coupons]' value='<?php echo $options['via_woocommerce_classement_objectifs_coupons']; ?>'>
	<?php
}

function woocl_objectifs_shipping_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<input style="width:100%" type="text" name='via_woocommerce_classement_settings[via_woocommerce_classement_objectifs_shipping]' value='<?php echo $options['via_woocommerce_classement_objectifs_shipping']; ?>'>
	<?php
}


function woocl_checkbox_annee_deuxzerounsept_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<label class="woocommerceinputcheck">
	<input class='woocommerceinputcheck-input' type='checkbox' name='via_woocommerce_classement_settings[via_woocommerce_classement_checkbox_annee_2017]' <?php checked( $options['via_woocommerce_classement_checkbox_annee_2017'], 1 ); ?> value='1' <?php if ( 1 == $options['via_woocommerce_classement_checkbox_annee_2017'] ) echo 'checked="checked"'; ?>>
	<span class="woocommerceinputcheck-label" data-on="<?php _e('Yes'); ?>" data-off="<?php _e('No'); ?>"></span> 
	<span class="woocommerceinputcheck-handle"></span> 
	</label>
	
	<?php
}

function woocl_checkbox_annee_deuxzerounsix_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<label class="woocommerceinputcheck">
	<input class='woocommerceinputcheck-input' type='checkbox' name='via_woocommerce_classement_settings[via_woocommerce_classement_checkbox_annee_2016]' <?php checked( $options['via_woocommerce_classement_checkbox_annee_2016'], 1 ); ?> value='1' <?php if ( 1 == $options['via_woocommerce_classement_checkbox_annee_2016'] ) echo 'checked="checked"'; ?>>
	<span class="woocommerceinputcheck-label" data-on="<?php _e('Yes'); ?>" data-off="<?php _e('No'); ?>"></span> 
	<span class="woocommerceinputcheck-handle"></span> 
	</label>
	<?php
}

function woocl_checkbox_annee_deuxzerouncinq_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<label class="woocommerceinputcheck">
	<input class='woocommerceinputcheck-input' type='checkbox' name='via_woocommerce_classement_settings[via_woocommerce_classement_checkbox_annee_2015]' <?php checked( $options['via_woocommerce_classement_checkbox_annee_2015'], 1 ); ?> value='1' <?php if ( 1 == $options['via_woocommerce_classement_checkbox_annee_2015'] ) echo 'checked="checked"'; ?>>
	<span class="woocommerceinputcheck-label" data-on="<?php _e('Yes'); ?>" data-off="<?php _e('No'); ?>"></span> 
	<span class="woocommerceinputcheck-handle"></span> 
	</label>
	
	<?php
}

function woocl_checkbox_comparatif_annuel_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<label class="woocommerceinputcheck">
	<input class='woocommerceinputcheck-input' type='checkbox' name='via_woocommerce_classement_settings[via_woocommerce_classement_checkbox_comparatif_annuel]' <?php checked( $options['via_woocommerce_classement_checkbox_comparatif_annuel'], 1 ); ?> value='1' <?php if ( 1 == $options['via_woocommerce_classement_checkbox_comparatif_annuel'] ) echo 'checked="checked"'; ?>>
	<span class="woocommerceinputcheck-label" data-on="<?php _e('Yes'); ?>" data-off="<?php _e('No'); ?>"></span> 
	<span class="woocommerceinputcheck-handle"></span> 
	</label>
	
	<?php
}


function woocl_objectifs_color_graphique_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<div class="select-style" style="width:100%">
		<select  style="width:100%" name='via_woocommerce_classement_settings[via_woocommerce_classement_objectifs_color_graphique]'>
			<option value='1' <?php selected( $options['via_woocommerce_classement_objectifs_color_graphique'], 1 ); ?>><?php _e('Green'); ?></option>
			<option value='2' <?php selected( $options['via_woocommerce_classement_objectifs_color_graphique'], 2 ); ?>><?php _e('Blue'); ?></option>
			<option value='3' <?php selected( $options['via_woocommerce_classement_objectifs_color_graphique'], 3 ); ?>><?php _e('Red'); ?></option>
		</select>
	</div>
	<?php
}

function woocl_textarea_objectifs_employes_render(  ) { 
    $options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<textarea style="width:100%" name='via_woocommerce_classement_settings[via_woocommerce_classement_textarea_objectifs_employes]'><?php echo $options['via_woocommerce_classement_textarea_objectifs_employes']; ?></textarea>
	<?php
}


function woocl_select_couleurs_graphs_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<div class="select-style" style="width:100%">
		<select  style="width:100%" name='via_woocommerce_classement_settings[via_woocommerce_classement_select_couleurs_graphs]'>
			<option value='1' <?php selected( $options['via_woocommerce_classement_select_couleurs_graphs'], 1 ); ?>><?php _e('Green'); ?></option>
			<option value='2' <?php selected( $options['via_woocommerce_classement_select_couleurs_graphs'], 2 ); ?>><?php _e('Blue'); ?></option>
			<option value='3' <?php selected( $options['via_woocommerce_classement_select_couleurs_graphs'], 3 ); ?>><?php _e('Red'); ?></option>
		</select>
	</div>
	<?php
}

function woocl_users_loyal_count_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<input style="width:100%" type="text" name='via_woocommerce_classement_settings[via_woocommerce_classement_users_loyal_count]' value='<?php echo $options['via_woocommerce_classement_users_loyal_count']; ?>'>
	<?php
}

function woocl_users_show_compare_years_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<label class="woocommerceinputcheck">
	<input class='woocommerceinputcheck-input' type='checkbox' name='via_woocommerce_classement_settings[via_woocommerce_classement_users_show_compare_years]' <?php checked( $options['via_woocommerce_classement_users_show_compare_years'], 1 ); ?> value='1' <?php if ( 1 == $options['via_woocommerce_classement_users_show_compare_years'] ) echo 'checked="checked"'; ?>>
	<span class="woocommerceinputcheck-label" data-on="<?php _e('Yes'); ?>" data-off="<?php _e('No'); ?>"></span> 
	<span class="woocommerceinputcheck-handle"></span> 
	</label>
	
	<?php
}


function woocl_users_show_customers_bought_render() { 
    $options = get_option('via_woocommerce_classement_settings');
    $checked = isset($options['woocl_users_show_customers_bought']) ? $options['woocl_users_show_customers_bought'] : 0;
    ?>
    <label class="woocommerceinputcheck">
        <input class='woocommerceinputcheck-input' type='checkbox' name='via_woocommerce_classement_settings[woocl_users_show_customers_bought]' <?php checked($checked, 1); ?> value='1'>
        <span class="woocommerceinputcheck-label" data-on="<?php _e('Yes'); ?>" data-off="<?php _e('No'); ?>"></span> 
        <span class="woocommerceinputcheck-handle"></span> 
    </label>
    <?php
}


/////////////////////////////////////////// Products /////////////////////////////////////////////

function woocl_show_product_system_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<label class="woocommerceinputcheck">
	<input class='woocommerceinputcheck-input' type='checkbox' name='via_woocommerce_classement_settings[via_woocommerce_classement_show_product_system]' <?php checked( $options['via_woocommerce_classement_show_product_system'], 1 ); ?> value='1' <?php if ( 1 == $options['via_woocommerce_classement_show_product_system'] ) echo 'checked="checked"'; ?>>
	<span class="woocommerceinputcheck-label" data-on="<?php _e('Yes'); ?>" data-off="<?php _e('No'); ?>"></span> 
	<span class="woocommerceinputcheck-handle"></span> 
	</label>
	<?php
}

function woocl_show_product_views_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<label class="woocommerceinputcheck">
	<input class='woocommerceinputcheck-input' type='checkbox' name='via_woocommerce_classement_settings[via_woocommerce_classement_show_product_views]' <?php checked( $options['via_woocommerce_classement_show_product_views'], 1 ); ?> value='1' <?php if ( 1 == $options['via_woocommerce_classement_show_product_views'] ) echo 'checked="checked"'; ?>>
	<span class="woocommerceinputcheck-label" data-on="<?php _e('Yes'); ?>" data-off="<?php _e('No'); ?>"></span> 
	<span class="woocommerceinputcheck-handle"></span> 
	</label>
	<?php
}

function woocl_active_product_duplicate_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<label class="woocommerceinputcheck">
	<input class='woocommerceinputcheck-input' type='checkbox' name='via_woocommerce_classement_settings[via_woocommerce_classement_active_product_duplicate]' <?php checked( $options['via_woocommerce_classement_active_product_duplicate'], 1 ); ?> value='1' <?php if ( 1 == $options['via_woocommerce_classement_active_product_duplicate'] ) echo 'checked="checked"'; ?>>
	<span class="woocommerceinputcheck-label" data-on="<?php _e('Yes'); ?>" data-off="<?php _e('No'); ?>"></span> 
	<span class="woocommerceinputcheck-handle"></span> 
	</label>
	<?php
}

function woocl_custom_product_views_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<input style="width:100%" type="text" name='via_woocommerce_classement_settings[via_woocommerce_classement_custom_product_views]' value='<?php echo $options['via_woocommerce_classement_custom_product_views']; ?>'>
	<?php
}

///////////////////////////////////////// Statistics ////////////////////////////////////////////////

function woocl_Statistics_start_year_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<input style="width:100%" type="text" name='via_woocommerce_classement_settings[via_woocommerce_classement_Statistics_start_year]' value='<?php if (!empty($options['via_woocommerce_classement_Statistics_start_year'])) { echo $options['via_woocommerce_classement_Statistics_start_year']; } else { echo get_option( 'via_woocommerce_classement_Statistics_start_year', '2015'); }?>'>
	<?php
}


///////////////////////////////////////// Vendors ////////////////////////////////////////////////

function woocl_vendors_show_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<label class="woocommerceinputcheck">
	<input class='woocommerceinputcheck-input' type='checkbox' name='via_woocommerce_classement_settings[via_woocommerce_classement_vendors_show]' <?php checked( $options['via_woocommerce_classement_vendors_show'], 1 ); ?> value='1' <?php if ( 1 == $options['via_woocommerce_classement_vendors_show'] ) echo 'checked="checked"'; ?>>
	<span class="woocommerceinputcheck-label" data-on="<?php _e('Yes'); ?>" data-off="<?php _e('No'); ?>"></span> 
	<span class="woocommerceinputcheck-handle"></span> 
	</label>
	<?php
}

function woocl_dokan_show_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<label class="woocommerceinputcheck">
	<input class='woocommerceinputcheck-input' type='checkbox' name='via_woocommerce_classement_settings[via_woocommerce_classement_dokan_show]' <?php checked( $options['via_woocommerce_classement_dokan_show'], 1 ); ?> value='1' <?php if ( 1 == $options['via_woocommerce_classement_dokan_show'] ) echo 'checked="checked"'; ?>>
	<span class="woocommerceinputcheck-label" data-on="<?php _e('Yes'); ?>" data-off="<?php _e('No'); ?>"></span> 
	<span class="woocommerceinputcheck-handle"></span> 
	</label>
	<?php
}

function woocl_license_key_render(  ) { 
	$options = get_option( 'via_woocommerce_classement_settings' );
	?>
	<input style="width:100%" type="text" name='via_woocommerce_classement_settings[via_woocommerce_classement_license_key]' value='<?php echo $options['via_woocommerce_classement_license_key']; ?>'>
	<?php
}


function woocl_settings_section_statistics_callback () { 
	echo __( 'Configure statistical options Woocommerce Classement', 'woo-classement' );
}

function woocl_settings_section_callback(  ) { 
echo __( 'Configure statistical options Via Woocommerce Classement', 'woo-classement' );
}

function woocl_settings_section__objectifs_callback(  ) { 
echo __( 'Configure the objectives of your Company', 'woo-classement' );
}

function woocl_settings_section_users_callback(  ) { 
echo __( '<div class="comingsoon">');
echo __( 'Configure options for Customers - Coming Soon', 'woo-classement' );
echo __( '</div>');
}

function woocl_settings_section_products_callback(  ) { 
echo __( 'Configuration of Products Settings', 'woo-classement' );
}

function woocl_settings_section_vendors_callback(  ) { 
echo __( 'Configure yours Vendors Settings', 'woo-classement' );
}

function woocl_settings_section_license_callback(  ) { 
echo __( 'Configure Google API for Woocommerce Classement => Google Map. <br /><a style="color:#bf0d0d;font-weight:bold" href="https://support.google.com/googleapi/answer/6158862?hl=en">Setting up API keys</a> (<i>Please note that you must activate the following APIs in the API of your project: Geocoding API, Geolocation API, Maps Embed API, Maps JavaScript API</i>)', 'woo-classement' );
}

function woocl_options_page(  ) { ?>
	
	
<div class="wrap">
	
	<div id="wooclsaveresults"></div>
	
	<div id="wooclshowmessage"></div>
	
	<form action='options.php' method='post' id="woocommerceclassementFormoptions">
		
		<!-- Tabs-style-1 -->
		<div class="row"> 
			
			<div class="col-lg-12">
				<div class="card-box">
			
					<ul class="nav nav-tabs nav-pills navtab-bg nav-justified">
						<li class="nav-item">
							<a href="#statistics" data-toggle="tab" aria-expanded="false" class="nav-link active">
								<span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
							    <span class="hidden-xs"><?php _e('Statistics', 'woo-classement' ); ?></span> 
							</a>
						</li>
						<li class="nav-item">
							<a href="#customers" data-toggle="tab" aria-expanded="false" class="nav-link">
								<span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
							    <span class="hidden-xs"><?php _e('Customers', 'woo-classement' ); ?></span> 
							</a>
						</li>
						<li class="nav-item">
							<a href="#products" data-toggle="tab" aria-expanded="true" class="nav-link">
								<span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
							    <span class="hidden-xs"><?php _e('Products', 'woo-classement' ); ?></span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#vendors" data-toggle="tab" aria-expanded="false" class="nav-link">
								<span class="visible-xs"><i class="fa fa-cog"></i></span> 
							    <span class="hidden-xs"><?php _e('Vendors', 'woo-classement' ); ?></span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#googleapi" data-toggle="tab" aria-expanded="false" class="nav-link">
								<span class="visible-xs"><i class="fa fa-cog"></i></span> 
							    <span class="hidden-xs"><?php _e('Google API', 'woo-classement' ); ?></span>
							</a>
						</li>
					</ul>
					<div class="tab-content" style="padding:30px;background-color: #fff;">
						<div class="tab-pane active" id="statistics">
							<?php
							settings_fields( 'viawoocommerceclassementStatistics' );
							do_settings_sections( 'viawoocommerceclassementStatistics' );
							submit_button();
							?>
						</div>
						<div class="tab-pane" id="customers">
							<?php
							settings_fields( 'viawoocommerceclassementUsers' );
							do_settings_sections( 'viawoocommerceclassementUsers' );
							submit_button();
							?>
						</div>
						<div class="tab-pane" id="products">
							<?php
							settings_fields( 'viawoocommerceclassementProducts' );
							do_settings_sections( 'viawoocommerceclassementProducts' );
							submit_button();
							?>
						</div>
						<div class="tab-pane" id="vendors">
							<?php
							settings_fields( 'viawoocommerceclassementVendors' );
							do_settings_sections( 'viawoocommerceclassementVendors' );
							submit_button();
							?>
						</div>
						<div class="tab-pane" id="googleapi">
							<?php
							settings_fields( 'viawoocommerceclassementLicense' );
							do_settings_sections( 'viawoocommerceclassementLicense' );
							submit_button();
							?>
						</div>
					</div>
				</div>
            </div>               

		</div> <!-- End row -->
		
	</form>	

</div> 

<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#woocommerceclassementFormoptions').submit(function() { 
	jQuery(this).ajaxSubmit({
	success: function(){
	jQuery('#wooclsaveresults').html("<div id='wooclshowmessage' class='successModal'></div>");
	jQuery('#wooclshowmessage').append("<p><?php echo htmlentities(__('Settings Saved Successfully', 'woo-classement'),ENT_QUOTES); ?></p>").show();
	}, 
	timeout: 5000
	}); 
	setTimeout("jQuery('#wooclshowmessage').hide('slow');", 5000);
	return false; 
	});
});
</script>
	
<?php
}