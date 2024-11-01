<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

///////////////////////////////////////////// Enqueue Styles Admin /////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class woocl_Styles {

	public function init() {
	    add_action('admin_enqueue_scripts', array($this, 'woocl_admin_style'));
	}

	public function woocl_admin_style($hook){
		if (
        (isset($GLOBALS['woocommerce_classement']) && $GLOBALS['woocommerce_classement'] === $hook) 
        || (isset($GLOBALS['statistics']) && $GLOBALS['statistics'] === $hook) 
        || (isset($GLOBALS['customers']) && $GLOBALS['customers'] === $hook) 
        || (isset($GLOBALS['orders']) && $GLOBALS['orders'] === $hook) 
        || (isset($GLOBALS['products']) && $GLOBALS['products'] === $hook) 
        || (isset($GLOBALS['coupons']) && $GLOBALS['coupons'] === $hook)
        || (isset($GLOBALS['shipping']) && $GLOBALS['shipping'] === $hook)
        || (isset($GLOBALS['paiements']) && $GLOBALS['paiements'] === $hook)
        || (isset($GLOBALS['vendors']) && $GLOBALS['vendors'] === $hook)
        || (isset($GLOBALS['options']) && $GLOBALS['options'] === $hook)
        || (isset($GLOBALS['help']) && $GLOBALS['help'] === $hook)
        || (isset($GLOBALS['dokan']) && $GLOBALS['dokan'] === $hook)
        || (isset($GLOBALS['importexport']) && $GLOBALS['importexport'] === $hook)
        || (isset($GLOBALS['conversions']) && $GLOBALS['conversions'] === $hook)
        || (isset($GLOBALS['viaplugins']) && $GLOBALS['viaplugins'] === $hook)
        ) {
		// CSS for tables
		wp_enqueue_style( 'jquerydataTablesmin', WOOCL_URL . '/framework/assets/datatables/jquery.dataTables.min.css', false, '1.0.0', 'all' );
		wp_enqueue_style( 'buttonsbootstrapmin', WOOCL_URL . '/framework/assets/datatables/buttons.bootstrap.min.css', false, '1.0.0', 'all' );
		wp_enqueue_style( 'fixedHeaderbootstrapmin', WOOCL_URL . '/framework/assets/datatables/fixedHeader.bootstrap.min.css', false, '1.0.0', 'all' );
		wp_enqueue_style( 'responsivebootstrapmin', WOOCL_URL . '/framework/assets/datatables/responsive.bootstrap.min.css', false, '1.0.0', 'all' );
		wp_enqueue_style( 'scrollerbootstrapmin', WOOCL_URL . '/framework/assets/datatables/scroller.bootstrap.min.css', false, '1.0.0', 'all' );
		wp_enqueue_style( 'datatables', WOOCL_URL . '/framework/assets/datatables/jquery.dataTables.min.css', false, '1.0.0', 'all' );

		
		
		// Enqueue style framework
		wp_enqueue_style( 'bootstrapmin', WOOCL_URL . '/framework/css/bootstrap.min.css', false, '1.0.0', 'all' );
		wp_enqueue_style( 'bootstrapreset', WOOCL_URL . '/framework/css/bootstrap-reset.css', false, '1.0.0', 'all' );
		wp_enqueue_style( 'animate', WOOCL_URL . '/framework/css/animate.css', false, '1.0.0', 'all' );
		wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css', false, '1.0.0', 'all' );
		wp_enqueue_style( 'ioniconsmin', WOOCL_URL . '/framework/assets/ionicon/css/ionicons.min.css', false, '1.0.0', 'all' );
		wp_enqueue_style( 'materialdesigniconicfontmincss', WOOCL_URL . '/framework/assets/material-design-iconic-font/css/material-design-iconic-font.min.css', false, '1.0.0', 'all' );
		//wp_enqueue_style( 'assetsmoris', WOOCL_URL . '/framework/assets/morris/morris.css', false, '1.0.0', 'all' );
		//wp_enqueue_style( 'sweetalertmincss', WOOCL_URL . '/framework/assets/sweet-alert/sweet-alert.min.css', false, '1.0.0', 'all' );
		//wp_enqueue_style( 'ionrangeSlider', WOOCL_URL . '/framework/assets/ion-rangeslider/ion.rangeSlider.css', false, '1.0.0', 'all' );
		//wp_enqueue_style( 'skinFlat', WOOCL_URL . '/framework/assets/ion-rangeslider/ion.rangeSlider.skinFlat.css', false, '1.0.0', 'all' );
		
		// C3 Charts
		wp_enqueue_style( 'modaleffect', WOOCL_URL . '/framework/assets/modal-effect/css/component.css', false, '1.0.0', 'all' );
		
		// Modal
		//wp_enqueue_style( 'c3chart', WOOCL_URL . '/framework/assets/c3-chart/c3.css', false, '1.0.0', 'all' );
		
		wp_enqueue_style( 'styleframework', WOOCL_URL . '/framework/css/style.css', false, '1.0.0', 'all' );
		
		wp_enqueue_style( 'styledatatable', WOOCL_URL . '/css/style.css', false, '1.0.0', 'all' );
		
		// Helpers
		wp_enqueue_style( 'helper', WOOCL_URL . '/framework/css/helper.css', false, '1.0.0', 'all' );
		
		// Graphs
		wp_enqueue_style( 'graphscss', WOOCL_URL . '/css/graphs.css', false, '1.0.0', 'all' );
		
		// Search Filter
		wp_enqueue_style('viauserslog-searchBuilderdataTablesmin','https://cdn.datatables.net/searchbuilder/1.4.2/css/searchBuilder.dataTables.min.css', false, '1.0.0');
		wp_enqueue_style( 'viauserslog-dataTablesdateTimemin', 'https://cdn.datatables.net/datetime/1.4.0/css/dataTables.dateTime.min.css', false, '1.0.0');	
		
		//wp_enqueue_style( 'woocl-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', false, '1.0.0');
		//wp_enqueue_style( 'woocl-slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css', false, '1.0.0');
	    }
	}
}

$wooclstyles = new woocl_Styles();
$wooclstyles->init();



class woocl_Slick_Scripts_Styles {
    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'woocl_enqueue_scripts_styles' ) );
		//add_action( 'admin_footer', array( $this, 'custom_slick_slider_script' ) ); 
    }

    public function woocl_enqueue_scripts_styles($hook) {
		if (
			(isset($GLOBALS['woocommerce_classement']) && $GLOBALS['woocommerce_classement'] === $hook) 
			|| (isset($GLOBALS['statistics']) && $GLOBALS['statistics'] === $hook) 
			|| (isset($GLOBALS['customers']) && $GLOBALS['customers'] === $hook) 
			|| (isset($GLOBALS['orders']) && $GLOBALS['orders'] === $hook) 
			|| (isset($GLOBALS['products']) && $GLOBALS['products'] === $hook) 
			|| (isset($GLOBALS['coupons']) && $GLOBALS['coupons'] === $hook)
			|| (isset($GLOBALS['shipping']) && $GLOBALS['shipping'] === $hook)
			|| (isset($GLOBALS['paiements']) && $GLOBALS['paiements'] === $hook)
			|| (isset($GLOBALS['vendors']) && $GLOBALS['vendors'] === $hook)
			|| (isset($GLOBALS['options']) && $GLOBALS['options'] === $hook)
			|| (isset($GLOBALS['help']) && $GLOBALS['help'] === $hook)
			|| (isset($GLOBALS['dokan']) && $GLOBALS['dokan'] === $hook)
			|| (isset($GLOBALS['importexport']) && $GLOBALS['importexport'] === $hook)
			|| (isset($GLOBALS['conversions']) && $GLOBALS['conversions'] === $hook)
			|| (isset($GLOBALS['viaplugins']) && $GLOBALS['viaplugins'] === $hook)
		) {
			// Adds Slick Slider CSS from CDN
			wp_enqueue_style( 'woocl-slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css' );
			wp_enqueue_style( 'woocl-slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css' );
		}
    }
}

$wooclSlickScriptsStyles = new woocl_Slick_Scripts_Styles();
