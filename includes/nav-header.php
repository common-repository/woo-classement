<!-- Header -->
<header class="top-head container-fluid">
	<button type="button" class="navbar-toggle pull-left">
		<span class="sr-only"><?php _e( 'Toggle navigation', 'woo-classement' ); ?></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	
	<!-- 
	<form role="search" class="navbar-left app-search pull-left hidden-xs">
	  <input type="text" placeholder="Search..." class="form-control">
	  <a href=""><i class="fa fa-search"></i></a>
	</form>-->
	
	<!-- Left navbar -->
	<nav class=" navbar-default" role="navigation">
		<ul class="nav navbar-nav hidden-xs">
			<li class="dropdown">
			  <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php _e( 'Woocommerce', 'woo-classement' ); ?> <span class="caret"></span></a>
				<ul role="menu" class="dropdown-menu">
					<li><?php echo '<a href="'. admin_url( 'edit.php?post_type=shop_order') . '">Orders</a>';?></li>
					<li><?php echo '<a href="'. admin_url( 'edit.php?post_type=product') . '">Products</a>';?></li>
					<li><?php echo '<a href="'. admin_url( 'edit.php?post_type=shop_coupon') . '">Coupons</a>';?></li>
				</ul>
			</li>
			<li>
				<a href="#">
				<?php _e( 'Woocommerce', 'woo-classement' ); ?> 
				<?php $version = woocl_woo_version_number(); echo $version; ?>
				</a>
			</li>
			<li>
				<a target="_blank" href="https://wordpress.org/plugins/woo-classement/">
					<?php _e( 'Version', 'woo-classement' ); ?> 
					<?php $version = woocl_version_number(); echo $version; ?> 
					<?php _e( ' - FREE', 'woo-classement' ); ?> 
				</a>
			</li>
			<li>
				<a target="_blank" style="display:inline-block" href="https://themespress.ca/produits/extensions-wordpress/woocommerce-classement/">
					<span style="display:inline-block" class="label label-success">
						<?php _e( 'BUY PRO VERSION', 'woo-classement' ); ?>
					</span>
				</a>
			</li>
		</ul>

	    <!-- Right navbar -->
		<ul class="nav navbar-nav navbar-right top-menu top-right-menu">  
			<!-- Notification -->
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<i class='far fa-comment-dots'></i>
				</a>
				<ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5003">
					<li class="noti-header">
						<p><?php _e( 'Need informations ?', 'woo-classement' ); ?></p>
					</li>
					<li>
						<a target="_blanck" href="https://themespress.ca/">
							<span><?php _e( 'Chat with us', 'woo-classement' ); ?> <br></span>
						</a>
					</li>
				</ul>
			</li>
			<!-- /Notification -->
			
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<?php
					global $current_user;
					wp_get_current_user(); // wordpress global variable to fetch logged in user info
					$userID = $current_user->ID;		
					$havemeta = get_user_meta($userID, 'woocl268_notice', false);
					if ($havemeta) { 
					?>
                    <i class="zmdi zmdi-notifications"></i>
					<span class="badge badge-sm up bg-pink count">0</span>
					<?php } else { ?>
					<i class="zmdi zmdi-notifications-active"></i>
					<span class="badge badge-sm up bg-pink count">1</span>
				    <?php } ?>
				</a>
				<ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5002">
					<li class="noti-header">
						 <p><?php _e( 'Notifications', 'woo-classement' ); ?></p>
					</li>
					<li>
						<?php
						global $current_user;
						wp_get_current_user(); // wordpress global variable to fetch logged in user info
						$userID = $current_user->ID;		
						$havemeta = get_user_meta($userID, 'woocl268_notice', false);
						if ($havemeta) { 
						?>
						<p style="font-weight:400;"><?php _e( 'No notifications', 'woo-classement' ); ?></p>
						<?php } else { ?>
						<a href="<?php echo get_bloginfo('url') .'/wp-admin/admin.php?page=via-woocommerce-classement-orders#lastorders-orders&woocl268_notice=0'; ?>">
							<span class="pull-left"><i class="fa fa-user-plus fa-2x text-info"></i></span>
							<span><?php _e( 'You can use the search filter to search for products, customers or orders in a very easy way. Thank you.', 'woo-classement' ); ?> 
							<br><small class="text-muted"><?php _e( 'Read More', 'woo-classement' ); ?></small>
							</span>
						</a>
						<?php } ?>
					</li>	
				</ul>
			</li>
			
			<!-- Chat -->
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<i class="zmdi zmdi-account"></i>
					<span class="badge badge-sm up bg-pink count"><?php woocl_display_logged_in_users(); ?></span>
				</a>
				<ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5003">
					<li class="noti-header">
						<p><?php _e( 'Notifications', 'woo-classement' ); ?></p>
					</li>
					<li>
						<a href="<?php echo get_bloginfo('url') .'/wp-admin/admin.php?page=via-woocommerce-classement-client#online'; ?>">
							<span class="pull-left"><i class="fa fa-user-plus fa-2x text-info"></i></span>
							<span><?php _e( 'User Loggued', 'woo-classement' ); ?> - <?php woocl_display_logged_in_users(); ?><br><small class="text-muted">Users connected</small></span>
						</a>
					</li>
				</ul>
			</li>
			<!-- Chat -->

			<!-- user login dropdown start-->
			<li class="dropdown text-center">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<!--<img alt="" src="img/avatar-2.jpg" class="img-circle profile-img thumb-sm">-->
					<span class="username"><?php $user_info = get_userdata(1); $username = $user_info->display_name; echo "$username"; ?></span> <span class="caret"></span>
				</a>
				<ul class="dropdown-menu pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
					<li><?php echo '<a href="'. admin_url( 'users.php') .'"><i class="fa fa-briefcase"></i>Profile</a>';?></li>
					<li><?php echo '<a href="'. admin_url( 'admin.php?page=wc-settings') .'"><i class="fa fa-cog"></i>Settings</a>';?></li>
					<!--<li><a href="#"><i class="fa fa-bell"></i> Friends <span class="label label-info pull-right mail-info">5</span></a></li>-->
					<li><a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="fa fa-sign-out"></i> <?php _e( 'Log Out', 'woocommerce-classement' ); ?></a></li>
				</ul>
			</li>
			<!-- user login dropdown end -->       
		</ul>
		<!-- End right navbar -->
	</nav>
	
</header>
<!-- Header Ends -->