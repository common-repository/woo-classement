<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} 

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results plugin /////////////////////////////////////////////

function woocl_tab_content_plugin() { ?>
	 
	 <div class="col-md-6">
		<div class="row text-center">
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10"><span class="numberCircle"><?php $version = woocl_version_number(); echo $version; ?></span></div>
						<p><?php _e('Plugin Version', 'woo-classement' ); ?></p>
						<div class="woocltooltip">
							<?php if( woocl_version_number('2.5.8') ) { ?>
							<i class="fa fa-check" aria-hidden="true" style="font-size:13px;display:inline-block"></i>
							<?php } else { ?>
							<i class="fa fa-exclamation" aria-hidden="true" style="font-size:13px;display:inline-block"></i>
							<?php } ?>
							<div class="top">
								<p>
									<?php 
									if( woocl_version_number('2.5.8') ) { 
									echo 'It&#39;s perfect. You have the last version of the plugin.'; 
									} 
									else { 
									echo 'You should update your plugin version'; 
									} 
									?>
								</p>
							<i></i>
							</div>
						</div>					
					</div>
				</div>
			</div>
					
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10"><span class="numberCircle"><?php echo phpversion(); ?></span></div>
						<p><?php _e('PHP Version', 'woo-classement' ); ?></p> 
						<div class="woocltooltip">
							<?php if (version_compare(PHP_VERSION, '7.3', '>=')) { ?>
							<i class="fa fa-check" aria-hidden="true" style="font-size:13px;display:inline-block"></i>
							<?php } else { ?>
							<i class="fa fa-exclamation" aria-hidden="true" style="font-size:13px;display:inline-block"></i>
							<?php } ?>
							<div class="top">
								<p>
									<?php 
									if (version_compare(PHP_VERSION, '7.3', '>=')) {
									echo 'Your PHP version meets plugin requirements.'; 
									} 
									else { 
									echo 'You should change your PHP version to 7.4 minimum. Please check with your administrator or developer to see if this is possible with your website.'; 
									} 
									?>
								</p>
							<i></i>
							</div>
						</div>				
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10"><span class="numberCircle"><?php $woocommerceversion = woocl_woo_version_number(); echo $woocommerceversion; ?></span></div>
						<p><?php _e('WC Version', 'woo-classement' ); ?></p> 
						<div class="woocltooltip">
							<?php if( woocl_version_check('5.0') ) { ?>
							<i class="fa fa-check" aria-hidden="true" style="font-size:13px;display:inline-block"></i>
							<?php } else { ?>
							<i class="fa fa-exclamation" aria-hidden="true" style="font-size:13px;display:inline-block"></i>
							<?php } ?>
							<div class="top">
								<p>
									<?php 
									if( woocl_version_check('5.0') ) { 
									echo 'It&#39;s correct. This plugin version is compatible for Woocommerce 5.0 +'; 
									} 
									else { 
									echo 'You should have the Woocommerce 5.0 for this version plugin. Thank You !'; 
									} 
									?>
								</p>
							<i></i>
							</div>
						</div>				
					</div>
				</div>
			</div>
					
			<div class="col-sm-6 col-md-3">
				<div class="panel">
					<div class="panel-body">
						<div class="h2 text-black m-t-10"><span class="numberCircle"><?php global $wp_version; echo $wp_version; ?></span></div>
						<p><?php _e('WordPress Version', 'woo-classement' ); ?></p> 
						<div class="woocltooltip">
							<?php global $wp_version; if( $wp_version >= '5.6') { ?>
							<i class="fa fa-check" aria-hidden="true" style="font-size:13px;display:inline-block"></i>
							<?php } else { ?>
							<i class="fa fa-exclamation" aria-hidden="true" style="font-size:13px;display:inline-block"></i>
							<?php } ?>
							<div class="top">
								<p>
									<?php 
									global $wp_version; if( $wp_version >= '5.6') { 
									echo 'It&#39;s correct. This WordPress version is compatible with Woocommerce Classement.'; 
									} 
									else { 
									echo 'You should update your WordPress Version. Please check with your administrator or developer to see if this is possible with your website.'; 
									} 
									?>
								</p>
							<i></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> 
						<h3 class="panel-title title-plugin">
							<?php _e('Coming soon', 'woo-classement'); ?>
						</h3> 
					</div>
					<div class="panel-body">
						<p class="wooclassement-paragraphe">
							<?php _e('New charts for products, orders, etc ...', 'woo-classement' ); ?><br/>
							<?php _e('Future Version : 3.7.1', 'woo-classement' ); ?>
						</p>
						
					</div> 
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> 
						<h3 class="panel-title title-plugin">
							<i class="fa fa-envelope" aria-hidden="true"></i> <?php _e('The Plugin', 'woo-classement'); ?>
						</h3> 
					</div>
					<div id="wooclcontentnews" class="panel-body" style="overflow-y: scroll;height:650px">
						= 3.7 =<br />
						NEW : Add online chat link for information requests<br />
						NEW : Display the average basket for the day's sales - Orders section<br />
						NEW : Average frequency of online orders
						<br /><br />
						= 3.6 =<br />
						NEW : Conversion rate of successful purchases (Dashboard section)
						<br /><br />
						= 3.5 =<br />
                        NEW : New statistics in the orders section
						<br /><br />
						= 3.4 =<br />
                        NEW : New option to show customers (new tab in customer account) the latest products purchased in your store.<br />
                        NEW : Visually enhanced statistics in the Customers/Dashboard tabs.<br />
						NEW : New statistics such as the list of customer carts.
						<br /><br />
						= 3.3 =<br />
						NEW : New customers statistics (3)<br />
						FIX : Various corrections such as Division Zero in dashboard statistics.
						<br /><br />
						= 3.2 =<br />
						NEW : Adding statistics for Woocommerce payments.<br />
						NEW : Adding statistical results related to shipping charges<br />
						FIX : Major corrections to query monitor errors. Plugin optimization and performance.
						<br /><br />
						= 3.1 =<br />
						NEW : Sales chart by payment type<br />
						FIX : jQuery conflict with Datatables
						<br /><br />
						= 3.0 =<br />
						NEW : Graph showing the number of connected customers filtered by date. (Customers section)<br />
						NEW : Graph showing  the count of product views by the customer (Products section)<br />
						NEW : Slick carousel to show registered users. (Customers section)
						<br /><br />
						= 2.9 =<br />
						NEW : Add a user geolocation class with the Geoplugin API<br />
                        NEW : Search ajax form by customer - List of orders by customer first / last name, order date, payment date, payment method, order status.
						<br /><br />
						= 2.8 =<br />
						FIX : Exclude Bots from visits entries<br />
						FIX : Correction of view entries - Statistics<br />
						fix : Correction of percentage calculations. Division errors 0
						<br /><br />
						= 2.7 =<br />
						FIX : Correction of the plugin structure
						<br /><br />
						= 2.6.9 =<br />
						FIX : Major correction - Template foundation<br />
						FIX : Notification corrections<br />
						FIX : Statistics correction Annual Sales Growth<br />
						NEW : Coupons Statistics numbers<br />
						NEW : Complete list of coupons and their data
						<br /><br />
						= 2.6.8 =<br />
						NEW : Custom Search Builder - Search filter for Products, Orders, Customers Datatables<br />
						FIX : Correction of values insertions in view database
						<br /><br />
						= 2.6.7 =<br />
						NEW : Added an option to define the starting year of the graphic statistics by years<br />
						NEW : Graphics Update - 2023<br />
						FIX : Currency correction
						<br /><br />
						= 2.6.6 =<br />
						FIX : Uniformity of decimals (prices)<br />
						FIX : Query correction - Last registered customer - Customers section
						<br /><br />
						= 2.6.5 =<br />
						FIX : Visual correction of bootstrap tables - General Section<br />
						FIX : Correction of mini status graphics. Reverse order. Ex : 2015 to today<br />
						FIX : Code optimization for charts.<br />
						FIX : Correction of undefined variables - Graphics<br />
						FIX : Correction functions statistics tab<br />
						NEW : Pie Chart of Amounts by Shipping Zone - Shipping Section<br />
						NEW : Adaptation to the php 8.0 version<br />
						NEW : Visual Improvements - Statistics Section<br />
						NEW : New Statistics - Sales amounts sorted by day, month, year and since 2015. Orders section
						<br /><br />
						
						= 2.6.4 =<br />
						FIX : Several corrections and conditions of the statistical table.<br />
						NEW : Shipping Method column - Show type of shipping method - Order section datatable<br />
						NEW : Table to display the number of orders sorted by day
						<br /><br />
						
						= 2.6.3 =<br />
						FIX : Correction of payment results => Payment section.<br />
						FIX : Correction about notification system for users.<br />
						NEW : Creation of the conversions tab and addition of visit conversions for products, articles and pages.<br />
						NEW : Automatic update - Create statistics table - After update plugin version FREE-PRO.
						<br /><br />
						
						= 2.6.2 =<br />
						FIX : Check after activation if the table Woocommerce classement Statistics exists, otherwise create it. Get the statistics.<br />
						NEW : Creation of payment results => Payment section<br />
						NEW : Added a notification system for users.

						<br /><br />
						
						= 2.6.1.2 =<br />
						FIX : Query correction language filter (woocl_get_products_view_list)<br />
						FIX : Condition of the views per day if different from the new statistics since version 2.6.1.2<br />
						NEW : Charts - Résults Total views, Today Views, Monthly Views, Yearly Views<br />
						NEW : New view system added + last Views statistics for last 7 days<br />
						NEW : Charts - Résults Total count for orders, Today, Monthly, Yearly Views<br />
						NEW : Customers - Last customers list + Customers datas, Last login, money spent, orders qty
						<br /><br />
						= 2.6.1.1 = <br />
						FIX : URL settings plugin changed<br />
						NEW : Function correction orders peity charts by years. 2022 added<br />
						NEW : Tooltips added general section<br />
						NEW : Preity chart paiements amount<br />
						NEW : Years added for Bar Chart performance compagny<br />
						NEW : Coming soon section added in updates section
						<br /><br />
						= 2.6.1 =<br />
						NEW : Daily, weekly and yearly views functions and results statistics for products
						<br /><br />
						= 2.6 =<br />
						NEW : Admin notices for différents plugins versions<br />
						NEW : woocl_display_cart_in_users function<br />
						FIX : Best sellers products chart
						<br /><br />
						= 2.5.9 =<br />
						NEW : Count and average reviews added product datatable results – Product section<br />
						NEW : Section updates added
						<br /><br />
						= 2.5.8 =<br />
						NEW : Contact support form added<br />
						NEW : Styles CSS corrections<br /> 
						NEW : Charts Customer Section - Total customers<br />
						NEW : Charts Customer Section - Total customers registred two year<br />
						NEW : Charts Customer Section - Total customers registred by month last year<br />
						NEW : Charts Customer Section - Total customers registred last 7 days<br />
						FIX : Charts bar customers Peity Line - Results variable<br />
						FIX : Charts sales by Peity Line - Results variable
						<br /><br />
						= 2.5.7 =<br />
						FIX : woocl_list_customers<br />
						FIX : woocl_display_logged_in_users_table<br />
						FIX : woocl_last_customer_list_connection<br />
						FIX : Correction Tooltips
						<br /><br />
						= 2.5.6 =<br />
						FIX : Changes in Help section<br />
						FIX : Correction fonctions statistics grows four blocks<br />
						NEW : Growth statistics statistics section<br />
						NEW : Sales by Years graph + years added<br />
						NEW : Général map graph + years added<br />
						NEW : Customers Line Charts + years added<br />
						NEW : Vendors Line Charts + years added
						<br /><br />
						= 2.5.5.1 =<br />
						* FIX: Query correction Customer registred<br />
						* FIX: Query correction last customer loggued<br />
						* NEW: Query total sales by shipping zone.<br />
						* NEW: Link to the Pro Version 
						<br /><br />
						= 2.5.5 =<br />
						* NEW: Query of products visited in list - Products tabs + datatable<br />
						* NEW: Adding logged in user data - Customers tab
					</div> 
				</div>
			</div>
		</div>
		<div class="via-woocommerce-classement-clear"></div>
	</div>
	
    <div class="col-md-6">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"> 
						<h3 class="panel-title title-plugin">
							<i class="fa fa-pencil" aria-hidden="true"></i> 
							<?php _e('Contact Us', 'woo-classement'); ?>
						</h3> 
					</div> 
					<div class="panel-body"> 
						<div id="frmapi-17" class="frmapi-form formulaire-wooclassement" data-url="https://themespress.ca/wp-json/frm/v2/forms/17?return=html"></div>
						<script type="text/javascript">
						jQuery(document).ready(function($){
						var frmapi=$('.frmapi-form');
						if(frmapi.length){
							for(var frmi=0,frmlen=frmapi.length;frmi<frmlen;frmi++){
								frmapiGetData($(frmapi[frmi]));
							}
						}
						});
						function frmapiGetData(frmcont){
							jQuery.ajax({
								dataType:'json',
								url:frmcont.data('url'),
								success:function(json){
									frmcont.html(json.renderedHtml);
								}
							});
						}
						</script>
					</div> 
				</div>
			</div>
			
			<!--<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading"> 
						<h3 class="panel-title"><i class="fa fa-envelope" aria-hidden="true"></i> <?php _e('Contact Us', 'woo-classement'); ?></h3> 
					</div> 
					<div class="panel-body"> 
						<p>
						<?php //_e('Want to contact us ?', 'woo-classement' ); ?>
						<a href="mailto:infos@viamultimedia.ca" target="_top"><?php _e('Email', 'woo-classement'); ?></a>
						</p> 
					</div> 
				</div>
			</div>-->	
		</div> <!-- End row -->
	</div> <!-- End row -->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default title-plugin">
				<div class="panel-heading"> 
					<h3 class="panel-title title-plugin">
						<i class="fa fa-envelope" aria-hidden="true"></i> 
						<?php _e('Author', 'woo-classement'); ?>
					</h3> 
				</div> 
				<div class="panel-body"> 
					<p>
					   &copy; Copyright <a style="color:#ea7024;font-weight:bold" href="https://viamultimedia.ca/"><?php _e('Viamultimedia Hébergement Web', 'woo-classement'); ?></a>
					   - 2012 - <?php echo date('Y');?> - <?php _e('All Rights Reserved', 'woo-classement'); ?>
					</p> 
				</div> 
			</div>
		</div>
	</div> <!-- End row -->
	
	<div class="via-woocommerce-classement-clear"></div>
		
<?php }