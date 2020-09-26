<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Junko_Theme
 * @since Junko 1.0
 */
$junko_opt = get_option( 'junko_opt' );
get_header();
$junko_bloglayout = 'blog-large';
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
				<div class="page-content blog-page blogs <?php echo esc_attr($junko_blogclass); ?>">
					<header class="entry-header">
						<h1 class="entry-title"><?php if(isset($junko_opt['blog_header_text']) && ($junko_opt['blog_header_text'] !='')) { echo esc_html($junko_opt['blog_header_text']); } else { esc_html_e('Blog', 'junko');}  ?></h1>
					</header>
					<div class="blog-wrapper">
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
							<?php if ( current_user_can( 'edit_posts' ) ) :
								// Show a different message to a logged-in user who can add posts.
							?>
								<header class="entry-header">
									<h1 class="entry-title"><?php esc_html_e( 'No posts to display', 'junko' ); ?></h1>
								</header>
								<div class="entry-content">
									<p><?php printf( wp_kses(__( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'junko' ), array('a'=>array('href'=>array()))), admin_url( 'post-new.php' ) ); ?></p>
								</div><!-- .entry-content -->
							<?php else :
								// Show the default message to everyone else.
							?>
								<header class="entry-header">
									<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'junko' ); ?></h1>
								</header>
								<div class="entry-content">
									<p><?php esc_html_e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'junko' ); ?></p>
									<?php get_search_form(); ?>
								</div><!-- .entry-content -->
							<?php endif; // end current_user_can() check ?>
							</article><!-- #post-0 -->
						<?php endif; // end have_posts() check ?>
					</div>
				</div>
			</div>
			<?php if($junko_bloglayout!='nosidebar' && is_active_sidebar('sidebar-1')): ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
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