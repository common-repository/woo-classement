<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} 

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results plugin /////////////////////////////////////////////

function woocl_tab_content_dokan() { ?>
	
	<div class="row">
		
		<div class="col-lg-12">

			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Vendors', 'woo-classement' ); ?>
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
						<div class="table-responsive">
							 <table class="table">
								<tr>
									<th><?php _e('Total Vendors', 'woo-classement'); ?></th>
                                    <th><?php _e('This Year', 'woo-classement'); ?></th>
                                    <th><?php _e('This Month', 'woo-classement'); ?></th>	
                                    <th><?php _e('This Day', 'woo-classement'); ?></th>
                                    <th><?php _e('Total Pending Vendors', 'woo-classement'); ?></th>										
								</tr>
								<tr>
									<td>
										<span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">
										<?php _e('PRO', 'woo-classement'); ?>
										</span>
										<?php //echo woocl_total_vendors_registred(); ?>
									</td>
									<td>
										<span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">
										<?php _e('PRO', 'woo-classement'); ?>
										</span>
										<?php //echo woocl_total_vendor_registred_year(); ?>
									</td>
									<td>
										<span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">
										<?php _e('PRO', 'woo-classement'); ?>
										</span>
										<?php //echo woocl_total_vendor_registred_month(); ?>
									</td>
									<td>
										<span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">
										<?php _e('PRO', 'woo-classement'); ?>
										</span>
										<?php //echo woocl_total_vendor_registred_day(); ?>
									</td>
									<td>
										<span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">
										<?php _e('PRO', 'woo-classement'); ?>
										</span>
										<?php //echo woocl_total_vendors_pending(); ?>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- end col -->
		
	</div> <!-- end row -->	
	
	<div class="row">
	
		<div class="col-lg-12">
			<div class="portlet"><!-- /primary heading -->
				<div class="portlet-heading">
					<h3 class="portlet-title text-dark text-uppercase">
						<?php _e('Dokan Vendors -> Line Charts', 'woo-classement'); ?>
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
						<img style="max-width:100%" src="https://themespress.ca/wp-content/uploads/2022/03/Dokan-Vendors-Line-Charts.jpg" alt="Products Reviews">
						<span class="woocl-updates" style="background:#ea7024;padding:5px 15px;color:white;font-size:15px">
						    <?php _e('PRO', 'woo-classement'); ?>
						</span>
				    </div>
				</div>
			</div>
		</div>
	
	</div> <!-- End of Row -->
	
	<div class="via-woocommerce-classement-clear"></div>
		
<?php }