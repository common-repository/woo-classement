<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Woocl_GeoIP {
    private $apiUrl;

    public function __construct() {
        $this->apiUrl = 'http://www.geoplugin.net/json.gp';
    }

    public function WooclgetRemoteContent($ip) {
        $url = $this->apiUrl . "?ip=$ip";
        $ch = curl_init();

        // Configuration de la requête cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        // Exécution de la requête cURL
        $response = curl_exec($ch);

        // Vérification des erreurs
        if ($response === false) {
            // Gestion des erreurs
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception("Erreur cURL : " . $error);
        }

        // Fermeture de la requête cURL
        curl_close($ch);
        return $response;
    }

    public function WooclgetCountryByIP($ip) {
        try {
            $content = $this->WooclgetRemoteContent($ip);
            $result = json_decode($content, true);

            if ($result) {
                $geoData = array(
                    'country' => $result['geoplugin_countryName'],
                    'city' => $result['geoplugin_city'],
                    'region' => $result['geoplugin_region'],
                    'latitude' => $result['geoplugin_latitude'],
                    'longitude' => $result['geoplugin_longitude'],
                    // Ajoutez d'autres champs souhaités ici
                );

                return $geoData;
            }
        } catch (Exception $e) {
            // Gestion de l'erreur
            //echo "Erreur : " . $e->getMessage();
        }

        return null;
    }

    public function WooclgetCityByIP($ip) {
        $geoData = $this->WooclgetCountryByIP($ip);
        if ($geoData && isset($geoData['city'])) {
            return $geoData['city'];
        }
        return null;
    }
}


//////////////////////////////////////////////////////////////////////
// Create statistics table database after activation plugin
//////////////////////////////////////////////////////////////////////

function woocl_create_plugin_database_wooclassementstats() {
	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'wooclassementstats';
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) { 
		$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		viewdate date DEFAULT '0000-00-00' NOT NULL,
		viewtime time DEFAULT '00:00:00' NOT NULL,
		productid int(11) NOT NULL,
		productname varchar(60) NOT NULL,
		producturl text NOT NULL,
		userip varchar(60) NOT NULL,
		username varchar(60) NOT NULL,
		userid bigint(20) NOT NULL,
		usercountry varchar(255),
		usercity varchar(255),
		userbrowser varchar(255) NOT NULL,
		userbrowserversion varchar(255) NOT NULL,
		userbrowserplateform varchar(255) NOT NULL,	
		userviews smallint(5) NOT NULL,
		userclicks smallint(5) NOT NULL,
		urlfrom text NULL,
		type varchar(60) DEFAULT 'vue' NOT NULL,
		language varchar(60) NOT NULL,
		UNIQUE KEY id (id)
		) $charset_collate;";
	} 
	else {
	// table already exist on database
	}

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}
register_activation_hook( __FILE__, 'woocl_create_plugin_database_wooclassementstats' );

	
//////////////////////////////////////////////////////////////////////
// Verify if plugin active and database table exist - Version 2.6.3
//////////////////////////////////////////////////////////////////////

function verify_database_wooclassementstats_new_verion_plugin_2_6_3() {
	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'wooclassementstats';
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) { 
		$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		viewdate date DEFAULT '0000-00-00' NOT NULL,
		viewtime time DEFAULT '00:00:00' NOT NULL,
		productid int(11) NOT NULL,
		productname varchar(60) NOT NULL,
		producturl text NOT NULL,
		userip varchar(60) NOT NULL,
		username varchar(60) NOT NULL,
		userid bigint(20) NOT NULL,
		usercountry varchar(255),
		usercity varchar(255),
		userbrowser varchar(255) NOT NULL,
		userbrowserversion varchar(255) NOT NULL,
		userbrowserplateform varchar(255) NOT NULL,	
		userviews smallint(5) NOT NULL,
		userclicks smallint(5) NOT NULL,
		urlfrom text NULL,
		type varchar(60) DEFAULT 'vue' NOT NULL,
		language varchar(60) NOT NULL,
		UNIQUE KEY id (id)
		) $charset_collate;";
	}
	else {
        $sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			viewdate date DEFAULT '0000-00-00' NOT NULL,
			viewtime time DEFAULT '00:00:00' NOT NULL,
			productid int(11) NOT NULL,
			productname varchar(60) NOT NULL,
			producturl text NOT NULL,
			userip varchar(60) NOT NULL,
			username varchar(60) NOT NULL,
			userid bigint(20) NOT NULL,
			usercountry varchar(255),
			usercity varchar(255),
			userbrowser varchar(255) NOT NULL,
			userbrowserversion varchar(255) NOT NULL,
			userbrowserplateform varchar(255) NOT NULL,	
			userviews smallint(5) NOT NULL,
			userclicks smallint(5) NOT NULL,
			urlfrom text NULL,
			type varchar(60) DEFAULT 'vue' NOT NULL,
			language varchar(60) NOT NULL,
			UNIQUE KEY id (id)
		) $charset_collate;";
	}
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}	
add_action( 'init', 'verify_database_wooclassementstats_new_verion_plugin_2_6_3');

	
//////////////////////////////////////////////////////////////////////
// Get browser statistics in table results statistics
//////////////////////////////////////////////////////////////////////

function woocl_getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
   
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }
   
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
   
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
   
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
   
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}



function woocl_statistiques_views_Function() {
    
	global $wpdb;
	
	$detector = new WooclRobotDetector();
	
	$ipserver              = $_SERVER['SERVER_ADDR'];

    $current_user          = wp_get_current_user();	
	$blogname              = get_bloginfo( 'name' );
	$ua                    = woocl_getBrowser();
	
	$productid             = get_the_ID();
    $productname           = get_the_title();
	$producturl            = get_the_permalink();
	$userip                = $_SERVER['REMOTE_ADDR'];
	$username              = $current_user->user_login;
	$userid                = $current_user->ID;
	$userbrowser           = $ua['name'];
	$userbrowserversion    = $ua['version'];
	$userbrowserplateform  = $ua['platform'];
	
	$geoIP                 = new Woocl_GeoIP();
	$ip                    = $userip; // Ou l'adresse IP que vous souhaitez géolocaliser
	$geoData               = $geoIP->WooclgetCountryByIP($ip);
	
	$userviews             = '1';
	$userclicks            = '0';
	$urlfrom               = $_SERVER['HTTP_REFERER'];
	
	if ($urlfrom) {
	   $urlfrom = $urlfrom;
	}
	else {
	   $urlfrom = 'N/A';
	}
	
	if ( is_page() && !is_checkout() && !is_cart() ) {
	   $type = 'page';
	}
	elseif ( is_product() && !is_checkout() && !is_cart() ){
	   $type = 'product';
	}
	elseif (is_shop()) {
	   $type = 'shop';
	}
	elseif (is_singular( 'post' )) {
	   $type = 'post';
	}
	elseif (is_single()) {
	   $type = 'post';
	}
	elseif (is_archive()) {
	   $type = 'post';
	}
	elseif (is_category()) {
	   $type = 'post';
	}
	elseif ( is_page_template() && !is_checkout() && !is_cart() ) {
	   $type = 'template page';
	}
	elseif (is_cart()) {
	   $type = 'cart';
	}
	elseif (is_checkout()) {
	   $type = 'checkout';
	}
	elseif (is_account_page()) {
	   $type = 'account';
	}
	else {
	   $type = 'N/A';
	}
	
	$postlanguage = apply_filters( 'wpml_current_language', null );
	if ($postlanguage) {
	    $postlanguage = apply_filters( 'wpml_current_language', null );
	}
	else  {
		$postlanguage = substr( get_bloginfo ( 'language' ), 0, 2 );
	}
	
	if ($detector->WooclisRobot()) {
		// le visiteur actuel est un robot
		// mettez ici le code que vous souhaitez exécuter pour les robots
		return;
	} 
	else {
		$table_name = $wpdb->prefix . 'wooclassementstats'; 
		if ($userip != $ipserver) {
			$wpdb->insert( 
				$table_name, 
				array( 
					'viewdate'                => current_time( 'mysql' ),
					'viewtime'                => current_time( 'mysql' ),			
					'productid'               => $productid,
					'productname'             => $productname,
					'producturl'              => $producturl,
					'userip'                  => $userip,
					'username'                => $username,
					'userid'                  => $userid,
					'usercountry'             => $geoData['country'],
					'usercity'                => $geoData['city'],
					'userbrowser'             => $userbrowser,
					'userbrowserversion'      => $userbrowserversion,
					'userbrowserplateform'    => $userbrowserplateform,
					'userviews'               => $userviews,
					'userclicks'              => $userclicks,
					'urlfrom'                 => $urlfrom,
					'type'		              => $type,	
					'language'                => $postlanguage,
				) 
			);
		}
	}
}
	

/////////////////////////// Afficher View dans le Dashbord Partenaire  ///////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function woocl_statistiques_count_rows_today_peity(){
	global $wpdb;
	$today = date('Y-m-d');
	$tablename = $wpdb->prefix . 'wooclassementstats';
	$myquery = $wpdb->get_results( "SELECT * FROM $tablename WHERE viewdate = '$today'" );
	$numrows = count($myquery); //PHP count()
	if ($numrows == '0') {
	    return '0';
	}
	else {
	    return $numrows;
	}
}

/////////////////////////// Afficher View dans le Dashbord Partenaire  ///////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function woocl_statistiques_count_rows_today_section(){
	global $wpdb;
	$today = date('Y-m-d');
	$tablename = $wpdb->prefix . 'wooclassementstats';
	$myquery = $wpdb->get_results( "SELECT * FROM $tablename WHERE viewdate = '$today' AND type IN ('vue','product')" );
	$numrows = count($myquery); //PHP count()
	if ($numrows == '0') {
	    return '0';
	}
	else {
	    return $numrows;
	}
}


/////////////////////////// Afficher View dans le Dashbord Partenaire  ///////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function woocl_statistiques_count_rows_all_section($startdate){
	global $wpdb;
	$today = date('Y-m-d');
	$tablename = $wpdb->prefix . 'wooclassementstats';
	$myquery = $wpdb->get_results( "SELECT * FROM $tablename WHERE viewdate BETWEEN '$startdate' AND '$today' AND type NOT IN ('vue','product')" );
	$numrows = count($myquery); //PHP count()
	if ($numrows == '0') {
	    return '0';
	}
	else {
	    return $numrows;
	}
}


/////////////////////////// Afficher View dans le Dashbord Partenaire  ///////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function woocl_statistiques_count_rows_products(){
	global $wpdb;
    $week = date('Y-m-d',strtotime('-7 days'));
	$today = date('Y-m-d');
	$tablename = $wpdb->prefix . 'wooclassementstats';
	$myquery = $wpdb->get_results( "SELECT * FROM $tablename WHERE viewdate BETWEEN '$week' AND '$today' AND type IN ('vue','product')" );
	$numrows = count($myquery); //PHP count()
	if ($numrows == '0') {
	    return '0';
	}
	else {
	    return $numrows . '&nbsp;views';
	}
}


/////////////////////////// Afficher View dans le Dashbord Partenaire  ///////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function woocl_statistiques_count_rows_others(){
	global $wpdb;
    $week = date('Y-m-d',strtotime('-7 days'));
	$today = date('Y-m-d');
	$tablename = $wpdb->prefix . 'wooclassementstats';
	$myquery = $wpdb->get_results( "SELECT * FROM $tablename WHERE viewdate BETWEEN '$week' AND '$today' AND type NOT IN ('vue','product')" );
	$numrows = count($myquery); //PHP count()
	if ($numrows == '0') {
	    return '0';
	}
	else {
	    return $numrows . '&nbsp;views';
	}
}


/////////////////////////// Afficher View dans le Dashbord Partenaire  ///////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function woocl_statistiques_count_rows_views(){
	global $wpdb;
	
	$tablename = $wpdb->prefix . 'wooclassementstats';
	$ipserver = $_SERVER['SERVER_ADDR'];
	$views = $wpdb->get_results( "SELECT * FROM $tablename WHERE userip != '$ipserver' AND type IN ('vue','product') ORDER BY id DESC" );
	
	if ($views) {
		$viewresult  = '<h2>' . 'Last visited products (The last 7 days)' . '&nbsp;->&nbsp;' . woocl_statistiques_count_rows_products() . '</h2>';
		$viewresult .= '<table id="idproductdatatablebestviews" class="table table-striped table-dark">';
		$viewresult .= '<thead>';
			$viewresult .= '<tr>';
				$viewresult .= '<th scope="col">Date</th>';
				$viewresult .= '<th scope="col">Heure</th>';
				$viewresult .= '<th scope="col">Product ID</th>';
				$viewresult .= '<th scope="col">Product Name</th>';
				$viewresult .= '<th scope="col">Product URL</th>';
				$viewresult .= '<th scope="col">User IP</th>';
				$viewresult .= '<th scope="col">User Country</th>';
				$viewresult .= '<th scope="col">User City</th>';
				$viewresult .= '<th scope="col">User Browser</th>';
				$viewresult .= '<th scope="col">User Browser Version</th>';
				$viewresult .= '<th scope="col">Referrer URL</th>';
				$viewresult .= '<th scope="col">Type</th>';
				$viewresult .= '<th scope="col">Language</th>';
				$viewresult .= '<th scope="col">View/Click</th>';
			$viewresult .= '</tr>';
		$viewresult .= '</thead>';
			$viewresult .= '<tbody>';
				foreach ($views as $view) {
				
				$url = $view->urlfrom;
				$urlhome = get_home_url();
				
				$viewresult .= '<tr>';
				$viewresult .= '<td>' . $view->viewdate . '</td>';
				$viewresult .= '<td>' . $view->viewtime . '</td>';
				$viewresult .= '<td>' . $view->productid . '</td>';
				$viewresult .= '<td>' . $view->productname . '</td>';
				$viewresult .= '<td>' . '<a target="_blank" href="' . $view->producturl . '">' . '<i class="zmdi zmdi-8tracks"></i>' . '</a>' . '</td>';
				$viewresult .= '<td>' . $view->userip . '</td>';
				$viewresult .= '<td>' . $view->usercountry . '</td>';
				$viewresult .= '<td>' . $view->usercity . '</td>';
				$viewresult .= '<td>' . $view->userbrowser . '</td>';
				$viewresult .= '<td>' . $view->userbrowserversion . '</td>';
				$viewresult .= '<td><span class="woocl-updates" style="display:block;background:#ea7024;padding:5px 15px;color:white;font-size:10px">Pro Version</span></td>'; 	
				$viewresult .= '<td><span class="woocl-updates" style="display:block;background:#ea7024;padding:5px 15px;color:white;font-size:10px">Pro Version</span></td>'; 	
                
				$language = $view->language;
				if ($language) {
				   $viewresult .= '<td>' . ucfirst($view->language) . '</td>';
				}
				else {
				    $viewresult .= '<td>N/A</td>';
				}
				
				if ($view->userviews == '1') {
				   $viewresult .= '<td>View</td>';
				}
				elseif ($view->usercliks == '0') {
				   $viewresult .= '<td>Click</td>';
				}
				else { 
				   $viewresult .= '<td>N/A</td>';
				}
				$viewresult .= '</tr>';
				}
			$viewresult .= '</tbody>';
		$viewresult .= '</table>';
	}
	else {
        $viewresult .= 'No results for the moment.';
	}
	return $viewresult;	
	  
	//$num_rows = count($my_query); //PHP count()
	//return $num_rows;
}

/////////////////////////// Afficher View dans le Dashbord Partenaire  ///////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function woocl_statistiques_count_rows_views_others(){
	global $wpdb;
	$tablename = $wpdb->prefix . 'wooclassementstats';
	
	$ipserver = $_SERVER['SERVER_ADDR'];
	$views = $wpdb->get_results( "SELECT * FROM $tablename WHERE userip != '$ipserver' AND type NOT IN ('vue','product') ORDER BY id DESC" );
	
	if ($views) {
		$viewresulttwo  = '<h2>' . 'Last visited Posts, Pages, Template Page (The last 7 days)' . '&nbsp;->&nbsp;' . woocl_statistiques_count_rows_others() . '</h2>';
		$viewresulttwo .= '<table id="idproductdatatablebestviews" class="table table-striped table-dark">';
		$viewresulttwo .= '<thead>';
			$viewresulttwo .= '<tr>';
				$viewresulttwo .= '<th scope="col">Date</th>';
				$viewresulttwo .= '<th scope="col">Heure</th>';
				$viewresulttwo .= '<th scope="col">Product ID</th>';
				$viewresulttwo .= '<th scope="col">Product Name</th>';
				$viewresulttwo .= '<th scope="col">Product URL</th>';
				$viewresulttwo .= '<th scope="col">User IP</th>';
				$viewresulttwo .= '<th scope="col">User Country</th>';
				$viewresulttwo .= '<th scope="col">User City</th>';
				$viewresulttwo .= '<th scope="col">User Browser</th>';
				$viewresulttwo .= '<th scope="col">User Browser Version</th>';
				$viewresulttwo .= '<th scope="col">Referrer URL</th>';
				$viewresulttwo .= '<th scope="col">Type</th>';
				$viewresulttwo .= '<th scope="col">Language</th>';
			$viewresulttwo .= '</tr>';
		$viewresulttwo .= '</thead>';
			$viewresulttwo .= '<tbody>';
				foreach ($views as $view) {
				
				$url = $view->urlfrom;
				$urlhome = get_home_url();
				
				$viewresulttwo .= '<tr>';
				$viewresulttwo .= '<td>' . $view->viewdate . '</td>';
				$viewresulttwo .= '<td>' . $view->viewtime . '</td>';
				$viewresulttwo .= '<td>' . $view->productid . '</td>';
				$viewresulttwo .= '<td>' . $view->productname . '</td>';
				$viewresulttwo .= '<td>' . '<a target="_blank" href="' . $view->producturl . '">' . '<i class="zmdi zmdi-8tracks"></i>' . '</a>' . '</td>';
				$viewresulttwo .= '<td>' . $view->userip . '</td>';
				$viewresulttwo .= '<td>' . $view->usercountry . '</td>';
				$viewresulttwo .= '<td>' . $view->usercity . '</td>';
				$viewresulttwo .= '<td>' . $view->userbrowser . '</td>';
				$viewresulttwo .= '<td>' . $view->userbrowserversion . '</td>';
				$viewresulttwo .= '<td><span class="woocl-updates" style="display:block;background:#ea7024;padding:5px 15px;color:white;font-size:10px">Pro Version</span></td>'; 	
				$viewresulttwo .= '<td><span class="woocl-updates" style="display:block;background:#ea7024;padding:5px 15px;color:white;font-size:10px">Pro Version</span></td>'; 	
				
				$language = $view->language;
				if ($language) {
				    $viewresulttwo .= '<td>' . ucfirst($view->language) . '</td>';
				}
				else {
				    $viewresulttwo .= '<td>N/A</td>';
				}
				
				$viewresulttwo .= '</tr>';
				}
			$viewresulttwo .= '</tbody>';
		$viewresulttwo .= '</table>';
	}
	else {
        $viewresulttwo .= 'No results for the moment.';
	}
	return $viewresulttwo;	
	  
	//$num_rows = count($my_query); //PHP count()
	//return $num_rows;
}
