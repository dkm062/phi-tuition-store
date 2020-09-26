<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Junko_Theme
 * @since Junko 1.0
 */
$junko_opt = get_option( 'junko_opt' );
get_header();
$junko_bloglayout = 'sidebar';
if(isset($junko_opt['blog_layout']) && $junko_opt['blog_layout']!=''){
	$junko_bloglayout = $junko_opt['blog_layout'];
}
if(isset($_GET['layout']) && $_GET['layout']!=''){
	$junko_bloglayout = $_GET['layout'];
}
$junko_blogsidebar = 'right';
if(isset($junko_opt['sidebarblog_pos']) && $junko_opt['sidebarblog_pos']!=''){
	$junko_blogsidebar = $junko_opt['sidebarblog_pos'];
}
if(isset($_GET['sidebar']) && $_GET['sidebar']!=''){
	$junko_blogsidebar = $_GET['sidebar'];
}
if ( !is_active_sidebar( 'sidebar-1' ) )  {
	$junko_bloglayout = 'nosidebar';
}
switch($junko_bloglayout) {
	case 'nosidebar':
		$junko_blogclass = 'blog-nosidebar';
		$junko_blogcolclass = 12;
		$junko_blogsidebar = 'none';
		break;
	default:
		$junko_blogclass = 'blog-sidebar'; 
		$junko_blogcolclass = 9;
}
?>
<div class="main-container <?php if(isset($junko_opt['blog_banner']['url']) && ($junko_opt['blog_banner']['url'])!=''){ echo 'has-image';} ?>">
	<div class="breadcrumb-container">
		<div class="container">
			<?php Junko_Class::junko_breadcrumb(); ?>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 <?php echo 'col-lg-'.$junko_blogcolclass; ?>">
				<div class="page-content blog-page single <?php echo esc_attr($junko_blogclass); if($junko_blogsidebar=='left') {echo ' left-sidebar'; } if($junko_blogsidebar=='right') {echo ' right-sidebar'; } ?> ">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
						<?php comments_template( '', true ); ?>
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>
			<?php
			$customsidebar = get_post_meta( $post->ID, '_junko_custom_sidebar', true );
			$customsidebar_pos = get_post_meta( $post->ID, '_junko_custom_sidebar_pos', true );
			if($customsidebar != ''){
				if($customsidebar_pos == 'left' && is_active_sidebar( $customsidebar ) ) {
					echo '<div id="secondary" class="col-12 col-lg-3 order-lg-last">';
						dynamic_sidebar( $customsidebar );
					echo '</div>';
				} 
			} else {
				if($junko_blogsidebar=='left') {
					get_sidebar();
				}
			} ?>
			<?php
			if($customsidebar != ''){
				if($customsidebar_pos == 'right' && is_active_sidebar( $customsidebar ) ) {
					echo '<div id="secondary" class="col-12 col-lg-3">';
						dynamic_sidebar( $customsidebar );
					echo '</div>';
				} 
			} else {
				if($junko_blogsidebar=='right') {
					get_sidebar();
				}
			} ?>
		</div>
	</div> 
	<!-- brand logo -->
	<?php 
		if(isset($junko_opt['inner_brand']) && function_exists('junko_brands_shortcode') && shortcode_exists( 'ourbrands' ) ){
			if($junko_opt['inner_brand'] && isset($junko_opt['brand_logos'][0]) && $junko_opt['brand_logos'][0]['thumb']!=null) { ?>
				<div class="inner-brands">
					<div class="container">
						<?php if(isset($junko_opt['inner_brand_title']) && $junko_opt['inner_brand_title']!=''){ ?>
							<div class="title">
								<h3><?php echo esc_html( $junko_opt['inner_brand_title'] ); ?></h3>
							</div>
						<?php } ?>
						<?php echo do_shortcode('[ourbrands]'); ?>
					</div>
				</div>
			<?php }
		}
	?>
	<!-- end brand logo --> 
</div>
<?php get_footer(); ?>