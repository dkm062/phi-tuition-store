<?php
/**
 * The sidebar for shop page
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Junko_Theme
 * @since Junko 1.0
 */
$junko_opt = get_option( 'junko_opt' );
$shopsidebar = 'left';
if(isset($junko_opt['sidebarshop_pos']) && $junko_opt['sidebarshop_pos']!=''){
	$shopsidebar = $junko_opt['sidebarshop_pos'];
}
if(isset($_GET['sidebar']) && $_GET['sidebar']!=''){
	$shopsidebar = $_GET['sidebar'];
}
$junko_shop_sidebar_extra_class = NULl;
if($shopsidebar=='left') {
	$junko_shop_sidebar_extra_class = 'order-lg-first';
}
?>
<?php if ( is_active_sidebar( 'sidebar-shop' ) ) : ?>
	<div id="secondary" class="col-12 col-lg-3 sidebar-shop <?php echo esc_attr($junko_shop_sidebar_extra_class);?>">
		<div class="sidebar-content">
			<?php dynamic_sidebar( 'sidebar-shop' ); ?>
		</div>
	</div>
<?php endif; ?>