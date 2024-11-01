<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                             // Charts //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


class Woocl_ConnexionChart {
  public function __construct() {
	add_action('admin_enqueue_scripts', array($this, 'woocl_enqueue_chart_script'));
	add_shortcode('wooclconnexionchart', array($this, 'woocl_generate_chart_shortcode'));
  }

  public function woocl_enqueue_chart_script() {
    wp_enqueue_script('chart-js', 'https://cdn.jsdelivr.net/npm/chart.js', array(), '3.7.0', false);
  }

  public function woocl_generate_chart_shortcode() {
    ob_start();
    ?>
    <canvas id="connexionTimesChart" width="400" height="130"></canvas>
    <script>
      <?php
        global $wpdb;

		$endDate = date('Y-m-d');  // Date actuelle
		$startDate = date('Y-m-d', strtotime('-12 months', strtotime($endDate)));  // 12 mois avant la date actuelle

        $tableName = $wpdb->prefix . 'viauserstatistics';

        $query = "SELECT userdate, COUNT(DISTINCT username) as userCount FROM $tableName WHERE userdate BETWEEN %s AND %s AND userstatus = 'customer' GROUP BY userdate";
        $results = $wpdb->get_results($wpdb->prepare($query, $startDate, $endDate));

        $dateLabels = [];
        $userCounts = [];

        foreach ($results as $result) {
          $dateLabels[] = $result->userdate;
          $userCounts[] = $result->userCount;
        }
      ?>

      var dateLabels = <?php echo json_encode($dateLabels); ?>;
      var userCounts = <?php echo json_encode($userCounts); ?>;

      var ctx = document.getElementById('connexionTimesChart').getContext('2d');
      var chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: dateLabels,
          datasets: [{
            label: 'Distinct Connected Customers',
            data: userCounts,
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2,
            fill: false
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'Number of Connected Customers'
              }
            },
            x: {
              title: {
                display: true,
                text: 'Date'
              }
            }
          }
        }
      });
    </script>
	<div class="graph-footer">
        <p><?php _e('Results from the last twelve months','woo-classement'); ?> </p>
    </div>
    <?php
    return ob_get_clean();
  }
}

$wooclconnexionchart = new Woocl_ConnexionChart();


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                // Chart Count of product views by the customer (60 months) //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Woocl_Product_Chart_Generator {

    public function woocl_generate_Chart() {
		global $wpdb;

		$twelveMonthsAgo = date('Y-m-d', strtotime('-60 months'));
		$today = date('Y-m-d');

		$query = "SELECT username, DATE_FORMAT(viewdate, '%Y-%m') AS month, COUNT(DISTINCT productname) AS product_count
		  FROM {$wpdb->prefix}wooclassementstats
		  WHERE (type = 'Product' OR type = 'product')
		  AND viewdate >= '$twelveMonthsAgo' AND viewdate <= '$today'
		  GROUP BY username, month
		  HAVING product_count > 0
		  ORDER BY product_count DESC";

		$results = $wpdb->get_results($query, ARRAY_A);


        $data = array();
        foreach ($results as $row) {
            $username = $row['username'];
            $month = $row['month'];
            $productCount = $row['product_count'];

            if (!isset($data[$username])) {
                $data[$username] = array();
            }
            $data[$username][$month] = $productCount;
        }

        $labels = array_keys(reset($data));
        $datasets = array();

        foreach ($data as $username => $productCounts) {
            $color = $this->getRandomColor();
            $datasets[] = array(
                'label' => $username,
                'data' => array_values($productCounts),
                'backgroundColor' => $color,
                'borderColor' => $color,
                'fill' => false
            );
        }

        ob_start();
        ?>
        <canvas style ="max-height:400px;margin: 0 auto;width:100% " id="productChart"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var labels = <?php echo json_encode($labels); ?>;
            var datasets = <?php echo json_encode($datasets); ?>;
            
            var ctx = document.getElementById('productChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Nombre de produits consultés par utilisateur et par mois'
                    }
                }
            });
        </script>
		<div class="graph-footer">
		    <p><?php _e('The count of products viewed by logged-in users.','woo-classement'); ?> </p>
		</div>
        <?php
        return ob_get_clean();
    }

    private function getRandomColor() {
        $letters = '0123456789ABCDEF';
        $color = '#';
        for ($i = 0; $i < 6; $i++) {
            $color .= $letters[rand(0, 15)];
        }
        return $color;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                             // Chart Sales by Paiements methods //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Woocl_SalesChartShortcode {
    private $sales_data;

    public function __construct() {
        add_shortcode('wooclsalescountrychart', array($this, 'woocl_generate_chart_shortcode'));
        add_action('wp_enqueue_scripts', array($this, 'woocl_enqueue_scripts'));
    }

    public function woocl_enqueue_scripts() {
        wp_enqueue_script('chartjs', 'https://cdn.jsdelivr.net/npm/chart.js');
    }

    public function woocl_generate_chart_shortcode($atts) {
        global $wpdb;

        $data = wp_cache_get('my_result');
        if (false === $data) {
            $query = "
                SELECT 
                    payment_method_title.meta_value as 'payment_method_title',
                    SUM(order_total.meta_value) as 'order_total',
                    count(*) as order_count
                FROM {$wpdb->prefix}posts as posts	";		
            $query .= " LEFT JOIN  {$wpdb->prefix}postmeta as order_total ON order_total.post_id=posts.ID ";
            $query .= " LEFT JOIN  {$wpdb->prefix}postmeta as payment_method_title ON payment_method_title.post_id=posts.ID ";
            $query .= " WHERE 1=1 ";
            $query .= " AND posts.post_type ='shop_order' ";
            $query .= " AND order_total.meta_key ='_order_total' ";
            $query .= " AND payment_method_title.meta_key ='_payment_method_title' ";
            $query .= " GROUP BY payment_method_title.meta_value";

            $data = $wpdb->get_results($query); // Removed ARRAY_A parameter
            wp_cache_set('my_result', $data);
        }

        $this->sales_data = array();
        foreach ($data as $row) {
            $payment_method = $row->payment_method_title; // Use object property
            $this->sales_data[$payment_method] = array(
                'sales' => $row->order_total, // Use object property
                'orders' => $row->order_count, // Use object property
            );
        }

        ob_start();
        ?>
        <div style="width: 80%; margin: auto;">
            <canvas id="salesChart"></canvas>
        </div>

        <script>
            const salesData = <?php echo json_encode($this->sales_data); ?>;
            const ctx = document.getElementById('salesChart').getContext('2d');
            new Chart(ctx, <?php echo json_encode($this->woocl_get_chart_config()); ?>);
        </script>
        <?php
        return ob_get_clean();
    }

    private function woocl_get_chart_config() {
        return array(
            'type' => 'bar',
            'data' => array(
                'labels' => array_keys($this->sales_data),
                'datasets' => array(
                    array(
                        'label' => 'Sales by Payment Method',
                        'backgroundColor' => 'rgba(0, 123, 255, 0.5)', // Blue color
                        'borderColor' => 'rgba(0, 123, 255, 1)',
                        'borderWidth' => 1,
                        'data' => array_map(function($method) {
                            return $this->sales_data[$method]['sales'];
                        }, array_keys($this->sales_data)),
                    ),
                ),
            ),
            'options' => array(
                'scales' => array(
                    'y' => array(
                        'beginAtZero' => true,
                        'title' => array(
                            'display' => true,
                            'text' => 'Sales',
                        ),
                    ),
                ),
                'plugins' => array(
                    'tooltip' => array(
                        'callbacks' => array(
                            'label' => 'function(context) {
                                const method = context.label;
                                const sales = salesData[method].sales;
                                const orders = salesData[method].orders;
                                return `Sales: $${sales}, Orders: ${orders}`;
                            }',
                        ),
                    ),
                ),
            ),
        );
    }
}

new Woocl_SalesChartShortcode();
