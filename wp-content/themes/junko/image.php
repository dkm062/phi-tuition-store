<?php
/**
 * The template for displaying image attachments
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
$junko_mainextraclass = NULl;
if($junko_blogsidebar=='left') {
	$junko_mainextraclass = 'order-lg-last';
}
switch($junko_bloglayout) {
	case 'nosidebar':
		$junko_blogclass = 'blog-nosidebar';
		$junko_blogcolclass = 12;
		$junko_blogsidebar = 'none';
		Junko_Class::junko_post_thumbnail_size('junko-post-thumb');
		break;
	default:
		$junko_blogclass = 'blog-sidebar';
		$junko_blogcolclass = 9;
		Junko_Class::junko_post_thumbnail_size('junko-category-thumb');
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
			<div class="col-12 <?php echo 'col-lg-'.$junko_blogcolclass; ?> <?php echo esc_attr($junko_mainextraclass);?>">
				<div class="page-content blog-page single <?php echo esc_attr($junko_blogclass); if($junko_blogsidebar=='left') {echo ' left-sidebar'; } if($junko_blogsidebar=='right') {echo ' right-sidebar'; } ?>">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_archive_title(); ?></h1>
					</header>
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
							<div class="entry-content">
								<div class="post-thumbnail">
									<div class="entry-attachment">
										<div class="attachment">
											<?php
											/*
											 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
											 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
											 */
											$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
											foreach ( $attachments as $k => $attachment ) :
												if ( $attachment->ID == $post->ID )
													break;
											endforeach;
											$k++;
											// If there is more than 1 attachment in a gallery
											if ( count( $attachments ) > 1 ) :
												if ( isset( $attachments[ $k ] ) ) :
													// get the URL of the next image attachment
													$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
												else :
													// or get the URL of the first image attachment
													$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
												endif;
											else :
												// or, if there's only 1 image, get the URL of the image
												$next_attachment_url = wp_get_attachment_url();
											endif;
											?>
											<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
											/**
											 * Filter the image attachment size to use.
											 *
											 * @since Junko 1.0
											 *
											 * @param array $size {
											 *     @type int The attachment height in pixels.
											 *     @type int The attachment width in pixels.
											 * }
											 */
											$attachment_size = apply_filters( 'junko_attachment_size', array( 960, 960 ) );
											echo wp_get_attachment_image( $post->ID, $attachment_size );
											?></a>
											<?php if ( ! empty( $post->post_excerpt ) ) : ?>
											<div class="entry-caption">
												<?php the_excerpt(); ?>
											</div>
											<?php endif; ?>
										</div><!-- .attachment -->
									</div><!-- .entry-attachment -->
								</div>
								<div class="entry-description">
									<?php the_content(); ?>
									<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'junko' ), 'after' => '</div>' ) ); ?>
								</div><!-- .entry-description -->
							</div><!-- .entry-content -->
							<div class="postinfo-wrapper">
								<div class="post-date">
									<?php echo '<span class="day">'.get_the_date('d,', $post->ID).'</span><span class="month"><span class="separator">/</span>'.get_the_date('M', $post->ID).'</span>' ;?>
								</div>
								<div class="post-info">
									<h2><?php the_title(); ?></h2>
									<footer class="entry-meta">
										<?php
											$metadata = wp_get_attachment_metadata();
											printf( wp_kses(__( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%8$s</a>.', 'junko' ), array('span'=>array('class'=>array()), 'a'=>array('href'=>array(), 'title'=>array(), 'rel'=>array()), 'time'=>array('class'=>array(), 'datetime'=>array()))),
												esc_attr( get_the_date( 'c' ) ),
												esc_html( get_the_date() ),
												esc_url( wp_get_attachment_url() ),
												$metadata['width'],
												$metadata['height'],
												esc_url( get_permalink( $post->post_parent ) ),
												esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
												get_the_title( $post->post_parent )
											);
										?>
										<?php edit_post_link( esc_html__( 'Edit', 'junko' ), '<span class="edit-link">', '</span>' ); ?>
									</footer><!-- .entry-meta -->
								</div>
							</div>
						</article><!-- #post -->
						<?php comments_template(); ?>
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>