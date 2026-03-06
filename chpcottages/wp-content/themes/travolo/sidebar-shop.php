<?php
	// Block direct access
	if( ! defined( 'ABSPATH' ) ){
		exit( );
	}
	/**
	* @Packge 	   : Travolo
	* @Version     : 1.0
	* @Author     : Vecurosoft
    * @Author URI : https://www.vecurosoft.com/
	*
	*/

	if( ! is_active_sidebar( 'travolo-woo-sidebar' ) ){
		return;
	}
?>
<div class="col-lg-4 col-xl-3">
	<!-- Sidebar Begin -->
	<aside class="sidebar-area shop-sidebar">
		<?php
			dynamic_sidebar( 'travolo-woo-sidebar' );
		?>
	</aside>
	<!-- Sidebar End -->
</div>