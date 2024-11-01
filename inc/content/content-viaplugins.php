<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results Coupons ////////////////////////////////////////////

function woocl_tab_content_viaplugins() { ?>
  
	<div class="row">
		<div class="col-lg-12">
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Via Plugins', 'woo-classement'); ?>
					</h3>
					<div class="portlet-widgets">
						<a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
						<span class="divider"></span>
						<a data-toggle="collapse" data-parent="#accordion1" href="#portlet7"><i class="ion-minus-round"></i></a>
						<span class="divider"></span>
						<a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div id="portlet7" class="panel-collapse collapse in">
					<div class="portlet-body">
						<div class="col-sm-6 col-md-9">
							<div class="row text-center">	
								<?php echo do_shortcode( '[wooclviamultiextensions]' ); ?>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="wooclplugins-sidebar">
								<h3><?php _e('Our Plugins', 'via-users-login'); ?></h3>
								<div class="wooclplugins-20"></div>
								<p><?php _e('Our products are developed in Quebec.', 'via-users-login'); ?></p>
								<img src="https://sitebook.ca/wp-content/uploads/2021/03/Produit-100-Local.png" alt="Viamultimedia Plugins" width="200" height="200">
								<div class="wooclplugins-20"></div>
								<p style="margin:0"><?php _e('Would you like to buy me a beer or a coffee? ', 'via-users-login'); ?></p>
								<p><?php _e('Thank you so much.', 'via-users-login'); ?></p>
								<form action="https://www.paypal.com/donate" method="post" target="_blank">
									<input type="hidden" name="hosted_button_id" value="TUL73PRDLQ776" />
									<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
									<img border="0" src="https://www.paypal.com/en_CA/i/scr/pixel.gif" width="1" height="1" />
								</form>
							</div>
						</div>
						<div class="via-woocommerce-classement-clear"></div>	
					</div>
				</div>
			</div>
		</div> <!-- end col -->
	</div> <!-- end row -->		

    <div class="via-woocommerce-classement-clear"></div>	
	
<?php } 