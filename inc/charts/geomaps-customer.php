<?php
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wpdb;
global $options;
$result = wp_cache_get( 'orders_result_general' );
if ( false === $result ) {
	$post_status = implode("','", array('wc-processing', 'wc-completed') );

	$result = $wpdb->get_results( "
	SELECT * FROM $wpdb->posts
	WHERE post_type = 'shop_order'
	AND post_status IN ('{$post_status}')
	ORDER BY post_date DESC
	");
	
	wp_cache_set( 'orders_result_general', $result );
} 

$feel = array(); // Initialiser $feel comme un tableau vide
foreach ($result as $value) {
    // Getting WC order object
    $order = wc_get_order($value->ID);
    $billing_address = $order->get_billing_address_1() . ' ' . $order->get_billing_city();
    $username = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
    $feel[] = array('city' => $billing_address, 'username' => $username, "color" => 'blue');
}

if (is_array($feel)) { // Vérifier si $feel est un tableau
    $countArrayLengthssss = count($feel);
} else {
    $countArrayLengthssss = 0; // Ou une valeur par défaut appropriée si $feel n'est pas un tableau
}


$options = get_option('via_woocommerce_classement_settings');
$keyGoogleAPI = $options['via_woocommerce_classement_license_key'];
?>

<script type="text/javascript">
google.charts.load('current', {
    'packages': ['map'],
    // Note: you will need to get a mapsApiKey for your project.
    // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
    'mapsApiKey': '<?php echo $keyGoogleAPI; ?>'
});
google.charts.setOnLoadCallback(drawMapsss);

function drawMapsss () {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'City');
    data.addColumn('string', 'Location');
    data.addColumn('string', 'Marker');

    data.addRows([
        <?php
        $resultsmapcustomers = "";
        for ($i = 0; $i < $countArrayLengthssss; $i++) {
            $resultsmapcustomers .= "['" . $feel[$i]['city'] . "', '" . $feel[$i]['username'] . "', '" . $feel[$i]['color'] . "' ],"; 
        }
        echo rtrim($resultsmapcustomers, ', ');
        ?>
    ]);
    var url = 'https://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/';

    var options = {
        mapType: 'styledMap',
        zoomLevel: 3,
        showTooltip: true,
        showInfoWindow: true,
        useMapTypeControl: true,
        maps: {
            // Your custom mapTypeId holding custom map styles.
            styledMap: {
                name: 'Styled Map', // This name will be displayed in the map type control.
                styles: [
                    {featureType: 'poi.attraction',
                    stylers: [{color: '#fce8b2'}]
                    },
                    {featureType: 'road.highway',
                    stylers: [{hue: '#0277bd'}, {saturation: -50}]
                    },
                    {featureType: 'road.highway',
                    elementType: 'labels.icon',
                    stylers: [{hue: '#000'}, {saturation: 100}, {lightness: 50}]
                    },
                    {featureType: 'landscape',
                    stylers: [{hue: '#259b24'}, {saturation: 10}, {lightness: -22}]
                    }
                ]
            }
        }
    };
    var map = new google.visualization.Map(document.getElementById('mapdiv2021'));

    map.draw(data, options);
}
</script>


<?php
/*foreach($result as $value) {
// Getting WC order object
$order = wc_get_order( $value->ID );
$feel[] = array( 'city' =>$order->billing_address_1 . ' ' . $order->billing_city, 'username' => $order->billing_first_name . ' ' . $order->billing_last_name, "color" => 'blue' );
}

$countArrayLengthssss = count($feel);*/
?>