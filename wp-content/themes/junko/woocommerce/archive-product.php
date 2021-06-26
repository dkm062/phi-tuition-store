<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header('shop');
$is_books_category_class="";
if (strpos($_SERVER[REQUEST_URI],"store/product-category/books")>-1){
	$is_books_category='books_cat';
}
global $wp_query, $woocommerce_loop;
$junko_opt = get_option( 'junko_opt' );
$shoplayout = 'sidebar';
if(isset($junko_opt['shop_layout']) && $junko_opt['shop_layout']!=''){
	$shoplayout = $junko_opt['shop_layout'];
}
if(isset($_GET['layout']) && $_GET['layout']!=''){
	$shoplayout = $_GET['layout'];
}
$shopsidebar = 'left';
if(isset($junko_opt['sidebarshop_pos']) && $junko_opt['sidebarshop_pos']!=''){
	$shopsidebar = $junko_opt['sidebarshop_pos'];
}
if(isset($_GET['sidebar']) && $_GET['sidebar']!=''){
	$shopsidebar = $_GET['sidebar'];
}
if ( !is_active_sidebar( 'sidebar-shop' ) )  {
	$shoplayout = 'fullwidth';
}
$junko_shop_main_extra_class = NULl;
if($shopsidebar=='left') {
	$junko_shop_main_extra_class = 'order-lg-last';
}
$main_column_class = NULL;
switch($shoplayout) {
	case 'fullwidth':
		Junko_Class::junko_shop_class('shop-fullwidth');
		$shopcolclass = 12;
		$shopsidebar = 'none';
		$productcols = 4;
		break;
	default:
		Junko_Class::junko_shop_class('shop-sidebar');
		$shopcolclass = 9;
		$productcols = 3;
		$main_column_class = 'main-column';
}
$junko_viewmode = Junko_Class::junko_show_view_mode();
?>
<div class="main-container">
	<div class="breadcrumb-container">
		<div class="container">
			<?php
				/**
				 * Hook: woocommerce_before_main_content.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 * @hooked WC_Structured_Data::generate_website_data() - 30
				 */
				do_action( 'woocommerce_before_main_content' );
			?>
		</div>
	</div>
	<div class="shop_content">
		<div class="container shop_content-inner">
			<div class="row">
				<div id="archive-product" class="page-content col-12 <?php echo 'col-lg-'.$shopcolclass; ?> <?php echo esc_attr($junko_viewmode);?> <?php echo ''.$main_column_class; ?> <?php echo esc_attr($junko_shop_main_extra_class);?>">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<header class="entry-header shop-title">
							<h2 class="entry-title"><?php woocommerce_page_title(); ?></h2>
						</header>
					<?php endif; ?>
					<div class="archive-border">
						<!-- shop banner -->
						<?php if( is_shop()){ ?>
							<?php if(isset($junko_opt['shop_banner']['url']) && ($junko_opt['shop_banner']['url'])!=''){ ?>
								<div class="shop-banner">
									<img src="<?php echo esc_url($junko_opt['shop_banner']['url']); ?>" alt="<?php esc_attr_e('Shop banner','junko') ?>" />
								</div>
							<?php } ?>
						<?php } ?>
						<?php if (is_product_category()) {
							if(isset($junko_opt['show_category_image']) && $junko_opt['show_category_image'] == true)  {
								global $wp_query;
								$cat = $wp_query->get_queried_object();
								$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
								$image = wp_get_attachment_url( $thumbnail_id );
								if ( $image ) {
									echo '<div class="shop-banner"><img src="' . esc_url($image) . '" alt=" ' . esc_attr( $cat->name ) . ' " /></div>';
								}
							} else { ?>
								<?php if(isset($junko_opt['shop_banner']['url']) && ($junko_opt['shop_banner']['url'])!=''){ ?>
									<div class="shop-banner">
										<img src="<?php echo esc_url($junko_opt['shop_banner']['url']); ?>" alt="<?php esc_attr_e('Shop banner','junko') ?>" />
									</div>
								<?php } ?>
							<?php } ?>
						<?php } ?>
						<!-- end shop banner -->
						<?php
						/**
						 * Hook: woocommerce_archive_description.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action( 'woocommerce_archive_description' );
						?>

						<?php if( is_shop()){ ?>

							<?php if ( woocommerce_product_subcategories() ) { ?>
								<div class="shop_tabs"> 
									<?php
									$cargs = array(
										'taxonomy'     => 'product_cat',
										'child_of'     => 0,
										'parent'       => 0,
										'orderby'      => 'name',
										'show_count'   => 0,
										'pad_counts'   => 0,
										'hierarchical' => 0,
										'title_li'     => '',
										'hide_empty'   => 0
									);
									$pcategories = get_categories( $cargs );
									if($pcategories){ 
										$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
									?>
										<div class="row">
											<?php
											foreach($pcategories as $pcategoy) { ?>
												<div class="category-tab col-12 col-sm-6 col-xl-3">
													<?php 
														$thumbnail_id = get_term_meta($pcategoy->term_id, 'thumbnail_id', true);
											            // get the image URL for child category
											            $image = wp_get_attachment_url($thumbnail_id);
											            // print the IMG HTML for child category
											            if ($image) {
											            	echo '<a href=" ' . get_term_link($pcategoy->slug, 'product_cat') . '"> <img src="' . esc_url($image) . '" width = "400" height = "400" alt=" ' . esc_attr( $pcategoy->name ) . '" /> </a>';
											            }
													 ?>
													<a href="<?php echo get_term_link($pcategoy->slug, 'product_cat'); ?>"><?php echo esc_attr($pcategoy->name); ?></a>
												</div>
											 <?php } ?>
										</div>
										<?php
									} ?> 
								</div>
							<?php } ?>
							
						<?php } ?>

						<?php if ( woocommerce_products_will_display() ) { ?>
							<div class="toolbar">
								<div class="toolbar-inner">
									<div class="view-mode">
										<label><?php esc_html_e('View on', 'junko');?></label>
										<a href="#" class="grid <?php if($junko_viewmode=='grid-view'){ echo ' active';} ?>" title="<?php esc_attr_e( 'Grid', 'junko' ); ?>"><?php esc_html_e('Grid', 'junko');?></a>
										<a href="#" class="list <?php if($junko_viewmode=='list-view'){ echo ' active';} ?>" title="<?php esc_attr_e( 'List', 'junko' ); ?>"><?php esc_html_e('List', 'junko');?></a>
									</div>
									<?php
										/**
										 * Hook: woocommerce_before_shop_loop.
										 *
										 * @hooked wc_print_notices - 10
										 * @hooked woocommerce_result_count - 20
										 * @hooked woocommerce_catalog_ordering - 30
										 */
										do_action( 'woocommerce_before_shop_loop' );
									?>
									<div class="clearfix"></div>
								</div>
							</div>
						<?php } ?>
						<?php
							/**
							* remove message from 'woocommerce_before_shop_loop' and show here
							*/
							do_action( 'woocommerce_show_message' );
						?>
						<ul class="product_list bullet_points <?php echo $is_books_category; ?>" >
							<li>Fees are payable monthly. </li>
							<!-- <li>A 10% discount is applied to the below mentioned fees if you select to attend our classes online. Apply voucher “ONLINE10” at check-out.</li> -->
							<li>A final discount will be applied at checkout if 2 or more classes are selected.</li>
							<li>A fixed registration fee of £25.00 is required upon registration. </li>
							<li>A payment for the first month is required upon registration. </li>
							<li>Subsequent payments should be made on the same date each month. </li>
							<li>There is one-month cancelation policy. </li>
							<li>Fees already paid will not be refunded. </li>
							<li>Phi Tuition reserves the right to alter the fees, without prior notification.</li>							
						</ul>
						<style type="text/css">
							.about_author{
								display: flex;
							}
							@media only screen and (max-width: 768px) {
								.about_author{
									display:block;
								}
								.about_author .img{
									margin: 20px auto;
									text-align: center;
								}
							}
							.about_author .img{
								min-width:300px ;
							}
							.about_author img{
							    width: 300px;
							    height: 450px !important;
							}
							.description{
								margin-right: 20px;
							}
							.notBook{
								display: none !important;
							}
							.sampleDownload.button {
							    background: #F0B903 !important;
							    border: none;
							    color: #fff;
							    font-family: Montserrat, Arial, Helvetica, sans-serif;
							    font-size: .857em;
							    font-weight: 500;
							    height: 50px;
							    letter-spacing: 0;
							    line-height: 50px;
							    margin: 0 0 10px 0;
							    min-width: 240px;
							    padding: 0 30px;
							    text-transform: uppercase;
							    -webkit-border-radius: 4px;
							    -moz-border-radius: 4px;
							    border-radius: 4px;
							    margin-bottom: 20px !important;
							}
							.abtauth{
							    margin-top: 30px !important;
							}
							.shop-products .gridview:hover {
							    border: 2px solid #F0B903;
							}
							.shop-products .gridview {
							    border: 2px solid #ebebeb;
							}
							.shop-products.grid-view .gridview {
							    margin-right: 10px;
							}
							.shop-products.grid-view .item-col{
							    margin-bottom: 10px;
							}
						</style>
						
						<?php if ( have_posts() ) : ?>	
							<a download  class="button sampleDownload notBook<?php echo $is_books_category; ?>" href="http://phi-tuition.co.uk/store/wp-content/uploads/2021/06/Excelling-in-A-Level-Physics_Sample.pdf">Download a FREE Sample</a>
							<div class="shop-products products <?php echo esc_attr($junko_viewmode);?> <?php echo esc_attr($shoplayout);?>">
								<?php $woocommerce_loop['columns'] = $productcols; ?>
								<?php woocommerce_product_subcategories();
								//reset loop
								$woocommerce_loop['loop'] = 0; ?>
								<div class="shop-products-inner">
									<div class="row">
										<?php while ( have_posts() ) : the_post(); ?>
											<?php wc_get_template_part( 'content', 'product-archive' ); ?>
										<?php endwhile; // end of the loop. ?>
									</div>
								</div>
							</div>
							<div class="abtauth notBook<?php echo $is_books_category; ?>">
								<hr>
								<div class="about_book">
									<h5>About the Books:</h5>
									<p>This series of books covers the requirements for the A-level exams.</p> 

									<p>The theory is presented in a structured way in the form of Questions and Answers. Using simple steps, explanations, practice exercises, mind-maps, and tests, you will be supported to develop the understanding of each thematic unit.</p>

									<p>Each book includes plenty of</p>
									<ul>
										<li>Solved problems</li>
										<li>Multiple choice questions</li>
										<li>Conceptual questions</li>
										<li>Fill in the gaps</li>
										<li>True or False statements</li>
										<li>Practice Problems</li>
									</ul>
								</div>
								<hr>
								<div class="about_author">
									<div class="description" >
										<h5>About the Author:</h5>
										<p>
										Dr Stefanidis read Physics at the Aristotle University of Thessaloniki, Greece. He received his MSc in Nuclear and Particle Physics from the University of Athens, Greece and he pursued his PhD in Particle Physics at University College London, UK. Since the early years of his studies, he worked on the ATLAS detector and the LHC accelerator at CERN, Geneva. His research focused mainly on studying the properties of the Standard Model Higgs and he developed algorithms for improving the performance of the ATLAS detector. He is the founder of Phi Tuition, a leading specialist STEM tuition centre in London. His passion for teaching Physics to young people has made him a valuable member of the Physics community. He is an active member of the Institute of Physics and often gives lectures related to teaching Physics. His students say that his knowledge is infectious. With over twenty years experience in teaching Physics to young people in the public and private sector, Dr Stefanidis has inspired many of his students to go on to study STEM subjects at prestigious universities like Oxford, Cambridge, Imperial and UCL.</p> 

										<p>Dr Stefanidis remains driven to see even more young people become confident and excited about Physics as they develop a deeper understanding of its key concepts.</p>
									</div>
									<div class="img">
										<img src="http://phi-tuition.co.uk/store/wp-content/uploads/2021/06/DrStathis.jpeg" height="450" width="300" alt="Dr Stathis">
									</div>
								</div>
							</div>
							<?php if ( woocommerce_products_will_display() ) { ?>
							<?php
								/**
								 * woocommerce_before_shop_loop hook
								 *
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action( 'woocommerce_after_shop_loop' );
							?>
							<div class="clearfix"></div>
							<?php } ?>
						<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
							<?php wc_get_template( 'loop/no-products-found.php' ); ?>
						<?php endif; ?>
					<?php
						/**
						 * woocommerce_after_main_content hook
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						do_action( 'woocommerce_after_main_content' );
					?>
					</div>
				</div>
				<?php if($shoplayout!='fullwidth' && is_active_sidebar('sidebar-shop')): ?>
					<?php get_sidebar('shop'); ?>
				<?php endif; ?>
			</div>
		</div> 
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
<?php get_footer( 'shop' ); ?>
<?php if( is_shop()){ ?>
	<style type="text/css">
		.product_cat-books{
			display: none;
		}
	</style>
<?php }?>
<style type="text/css">
	.books_cat{
		display: none;
	}
</style>
<?php if($is_books_category){ ?>
	<style type="text/css">
		#secondary .sidebar-content{
			display: none;
		}
	</style>
<?php }?>
