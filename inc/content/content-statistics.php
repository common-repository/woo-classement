<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Results Orders /////////////////////////////////////////////

function woocl_tab_results_statistics() { ?>
	
	<!-- Tabs-style-1 -->
	<div class="row"> 
		<div class="col-lg-12"> 
			<ul class="nav nav-tabs"> 
				<li class="active"> 
					<a href="#statistics" data-toggle="tab" aria-expanded="false"> 
						<span class="visible-xs"><i class="fa fa-home"></i></span> 
						<span class="hidden-xs">
						<?php _e('General', 'woo-classement'); ?>
						</span> 
					</a> 
				</li>			
			</ul> 
			<div class="tab-content"> 
				<div class="tab-pane active" id="statistics"> 
					<?php woocl_tab_results_statistics_general(); ?>
				</div>
			</div> 
		</div> 

	</div> <!-- End row -->
	
<?php } 

