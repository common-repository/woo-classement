<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} 

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results plugin /////////////////////////////////////////////

function woocl_tab_content_importexport() { ?>
	
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel">
				<div class="panel-heading"> 
					<h3 class="panel-title title-plugin">
					<i class="fa fa-pen" aria-hidden="true"></i><?php _e('Import / Export', 'woo-classement'); ?></h3> 
				</div>
				<div class="panel-body">
					<div class="h3 text-black m-t-10 col-md-4 text-center">
						<h3><i class="zmdi zmdi-download"></i> <?php _e('Export', 'woo-classement'); ?></h3>
						<p><?php _e( 'Export the plugin settings for this site as a .json file. This allows you to easily import the configuration into another site.', 'woo-classement' ); ?></p>
						<div class="col-sm-12 col-md-12 text-center" style="margin:15px 0">
						<span class="woocl-updates" style="background:#ea7024;padding:10px 40px;color:white;font-size:15px">
					    <?php _e('Version PRO', 'woo-classement'); ?>										
						</span>
						</div>
					</div>
					<div class="h3 text-black m-t-10 col-md-4 text-center">
						<h3><i class="zmdi zmdi-download"></i> <?php _e('Import', 'woo-classement'); ?></h3>
						<p><?php _e( 'Import the plugin settings for this site as a .json file. This allows you to easily import the configuration', 'woo-classement' ); ?></p>
						<div class="col-sm-12 col-md-12 text-center" style="margin:15px 0">
						<span class="woocl-updates" style="background:#ea7024;padding:10px 40px;color:white;font-size:15px">
					    <?php _e('Version PRO', 'woo-classement'); ?>										
						</span>
						</div>
					</div>
					<div class="h3 text-black m-t-10 col-md-4 text-center">
						<h3><i class="zmdi zmdi-download"></i> <?php _e('Export Wooclassement Views', 'woo-classement'); ?></h3>
						<p><?php _e( 'Export Woocommerce visit results Ranking for products to CSV file. This allows you to easily export your views statistics table.', 'woo-classement' ); ?></p>
						<div class="col-sm-12 col-md-12 text-center" style="margin:15px 0">
						<span class="woocl-updates" style="background:#ea7024;padding:10px 40px;color:white;font-size:15px">
					    <?php _e('Version PRO', 'woo-classement'); ?>										
						</span>
						</div>
					</div>	
                </div>
			</div>
		</div>
	</div>
	<div class="via-woocommerce-classement-clear"></div>
		
<?php }