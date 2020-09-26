<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Junko_Theme
 * @since Junko 1.0
 */
$junko_opt = get_option( 'junko_opt' );
$junko_blogsidebar = 'right';
if(isset($junko_opt['sidebarblog_pos']) && $junko_opt['sidebarblog_pos']!=''){
	$junko_blogsidebar = $junko_opt['sidebarblog_pos'];
}
if(isset($_GET['sidebar']) && $_GET['sidebar']!=''){
	$junko_blogsidebar = $_GET['sidebar'];
}
$junko_blog_sidebar_extra_class = NULl;
if($junko_blogsidebar=='left') {
	$junko_blog_sidebar_extra_class = 'order-lg-first';
}
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="secondary" class="col-12 col-lg-3 <?php echo esc_attr($junko_blog_sidebar_extra_class);?>">
		<div class="sidebar-content">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</div><!-- #secondary -->
<?php endif; ?>