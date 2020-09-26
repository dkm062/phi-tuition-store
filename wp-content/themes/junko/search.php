<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Junko_Theme
 * @since Junko 1.0
 */
$junko_opt = get_option( 'junko_opt' );
get_header();
$junko_bloglayout = 'grid';
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
$junko_blog_main_extra_class = NULl;
if($junko_blogsidebar=='left') {
	$junko_blog_main_extra_class = 'order-lg-last';
}
$main_column_class = NULL;
switch($junko_bloglayout) {
	case 'nosidebar':
		$junko_blogclass = 'blog-nosidebar';
		$junko_blogcolclass = 12;
		$junko_blogsidebar = 'none';
		Junko_Class::junko_post_thumbnail_size('junko-post-thumb');
		break;
	case 'largeimage':
		$junko_blogclass = 'blog-large';
		$junko_blogcolclass = 9;
		$main_column_class = 'main-column';
		Junko_Class::junko_post_thumbnail_size('junko-post-thumbwide');
		break;
	case 'grid':
		$junko_blogclass = 'grid';
		$junko_blogcolclass = 9;
		$main_column_class = 'main-column';
		Junko_Class::junko_post_thumbnail_size('junko-post-thumbwide');
		break;
	default:
		$junko_blogclass = 'blog-sidebar';
		$junko_blogcolclass = 9;
		$main_column_class = 'main-column';
		Junko_Class::junko_post_thumbnail_size('junko-post-thumb');
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
			<div class="col-12 <?php echo 'col-lg-'.$junko_blogcolclass; ?> <?php echo ''.$main_column_class; ?> <?php echo esc_attr($junko_blog_main_extra_class);?>">
				<div class="page-content blog-page blogs <?php echo esc_attr($junko_blogclass); if($junko_blogsidebar=='left') {echo ' left-sidebar'; } if($junko_blogsidebar=='right') {echo ' right-sidebar'; } ?>">
					<header class="entry-header">
						<h1 class="entry-title"><?php printf( wp_kses(__( 'Search Results for: %s', 'junko' ), array('span'=>array())), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header>
					<?php if ( have_posts() ) : ?>
						<div class="post-container">
							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'content', get_post_format() ); ?>
							<?php endwhile; ?>
						</div>
						<?php Junko_Class::junko_pagination(); ?>
					<?php else : ?>
						<article id="post-0" class="post no-results not-found">
							<header class="entry-header">
								<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'junko' ); ?></h1>
							</header>
							<div class="entry-content">
								<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'junko' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						</article><!-- #post-0 -->
					<?php endif; ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
	<!-- brand logo -->
	<?php 
		if(isset($junko_opt['inner_brand']) && function_exists('junko_brands_shortcode') && shortcode_exists( 'ourbrands' ) ){
			if($junko_opt['inner_brand'] && isset($junko_opt['brand_logos'][0]) && $junko_opt['brand_logos'][0]['thumb']!=null) { ?>
				<div class="inner-brands">
					<div class="container">
						<?php if(isset($junko_opt['inner_brand_title']) && $junko_opt['inner_brand_title']!=''){ ?>
							<div class="heading-title style1 ">
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