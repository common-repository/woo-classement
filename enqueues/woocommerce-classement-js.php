<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

///////////////////////////////////////////// Enqueue JS Admin /////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


class woocl_admin_Scripts {

	public function init()

	{
	add_action('admin_enqueue_scripts', array($this, 'woocl_register_script'));
	add_action('admin_footer', array($this, 'woocl_enqueue_scripts'));
	add_action('admin_head', array($this, 'woocl_enqueue_header_scripts'));
	}

	public function woocl_register_script($hook){
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
		wp_register_script( 'bootstrapmin', WOOCL_URL . 'framework/js/bootstrap.min.js', true ); 
		//wp_register_script( 'modernizrmin', WOOCL_URL . 'framework/js/modernizr.min.js', true );
		wp_register_script( 'pacemin', WOOCL_URL . 'framework/js/pace.min.js', true ); 
		wp_register_script( 'wowmin', WOOCL_URL . 'framework/js/wow.min.js', true ); 
		
		//wp_register_script( 'jqueryscrollTomin', 'https://cdn.jsdelivr.net/npm/jquery.scrollto@2.1.3/jquery.scrollTo.min.js'); 
		wp_register_script( 'jquerynicescroll', WOOCL_URL . 'framework/js/jquerynicescroll.js', true ); 
		
		/// Counter-up 
		wp_register_script( 'waypointsmin', WOOCL_URL . 'framework/js/waypoints.min.js', true ); 
		wp_register_script( 'jquerycounterup', WOOCL_URL . 'framework/js/jquery.counterup.min.js', true ); 			
	
		
		// Sparkline
		wp_register_script( 'jquerysparkline', WOOCL_URL . 'framework/assets/sparkline-chart/jquery.sparkline.min.js', true ); 
		wp_register_script( 'chartsparkline', WOOCL_URL . 'framework/assets/sparkline-chart/chart-sparkline.js', true ); 			
		
		
		// Skycons
		wp_register_script( 'skycons', WOOCL_URL . 'framework/js/skycons.min.js', true );
		
		
		// Caroussel
		wp_register_script( 'jqueryknob', WOOCL_URL . 'framework/assets/jquery-knob/jquery.knob.js', true );
		//wp_register_script( 'owlcarousel', WOOCL_URL . 'framework/assets/owl-carousel/owl.carousel.js', true );
		
		wp_register_script( 'classie', WOOCL_URL . 'framework/assets/modal-effect/js/classie.js', true );
		wp_register_script( 'modaleffect', WOOCL_URL . 'framework/assets/modal-effect/js/modalEffects.js', true );
		
		wp_register_script( 'jqueryapp', WOOCL_URL . 'framework/js/jquery.app.js', true );
		//wp_register_script( 'jquerydashboard', WOOCL_URL . 'framework/js/jquery.dashboard.js', true );
		
		wp_register_script( 'ionrangeSlidermin', WOOCL_URL . 'framework/assets/ion-rangeslider/ion.rangeSlider.min.js', true );
		wp_register_script( 'uisliders', WOOCL_URL . 'framework/assets/ion-rangeslider/ui-sliders.js', true );
		
		wp_register_script( 'jquerypeitymin', WOOCL_URL . 'framework/assets/peity-chart/jquery.peity.min.js', true );
		wp_register_script( 'jquerypeityinit', WOOCL_URL . 'framework/assets/peity-chart/jquery.peity.init.js', true );
		
		// Custom js hors framework
		wp_register_script( 'custom', WOOCL_URL . 'js/custom.js', true );
		//wp_enqueue_script( 'googleapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCgz6rx_ts_IOuTxuGRAEhZXV9vYHma-7s&callback=initMap');
		
		// Ajoute jQuery depuis un CDN, charge dans le footer - Bug with Datatables
		//wp_enqueue_script('woocl-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true);

		// Ajoute les scripts Slick Slider depuis un CDN, charge dans le footer
		//wp_enqueue_script('woocl-slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('woocl-jquery'), null, true);

	   }
	}
	
	public function woocl_enqueue_scripts()
	{
		wp_enqueue_script('bootstrapmin');
		//wp_enqueue_script('modernizrmin');
		wp_enqueue_script('pacemin');
		wp_enqueue_script('wowmin');
		//wp_enqueue_script('jqueryscrollTomin');
		wp_enqueue_script('jquerynicescroll');
		wp_enqueue_script('waypointsmin');
		wp_enqueue_script('jquerycounterup');
		wp_enqueue_script('jquerysparkline');
		wp_enqueue_script('chartsparkline');
		wp_enqueue_script('skycons');
		
		wp_enqueue_script('jqueryknob');
		//wp_enqueue_script('owlcarousel');
		
		wp_enqueue_script('classie');
		wp_enqueue_script('modaleffect');
	
		wp_enqueue_script('jqueryapp');
		//wp_enqueue_script('jquerydashboard');
		
		//wp_enqueue_script('ionrangeSlidermin');
		//wp_enqueue_script('uisliders');
	   
		wp_enqueue_script('jquerypeitymin');
		wp_enqueue_script('jquerypeityinit');
		
		wp_enqueue_script('custom');
	   
	}
	
	public function woocl_enqueue_header_scripts() {
		//wp_enqueue_script('custom');
	}
	
}

$wooclscripts = new woocl_admin_Scripts();
$wooclscripts->init();



