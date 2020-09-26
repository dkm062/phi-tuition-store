<?php
/**
 * The sidebar for content page
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Junko_Theme
 * @since Junko 1.0
 */
$junko_opt = get_option( 'junko_opt' );
$junko_page_sidebar_extra_class = NULl;
if($junko_opt['sidebarse_pos']=='left') {
	$junko_page_sidebar_extra_class = 'order-lg-first';
}
?>
<?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
<div id="secondary" class="col-12 col-lg-3 <?php echo esc_attr($junko_page_sidebar_extra_class);?>">
	<div class="sidebar-content">
		<?php dynamic_sidebar( 'sidebar-page' ); ?>
	</div>
</div>
<?php endif; ?>