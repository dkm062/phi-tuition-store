<?php
//Shortcodes for Visual Composer
add_action( 'vc_before_init', 'junko_vc_shortcodes' );
function junko_vc_shortcodes() { 
	//Site logo
	vc_map( array(
		'name' => esc_html__( 'Logo', 'junko'),
		'description' => esc_html__( 'Insert logo image', 'junko' ),
		'base' => 'roadlogo',
		'class' => '',
		'category' => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params' => array(
			array(
				'type'       => 'attach_image',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Upload logo image', 'junko' ),
				'description'=> esc_html__( 'Note: For retina screen, logo image size is at least twice as width and height (width is set below) to display clearly', 'junko' ),
				'param_name' => 'logo_image',
				'value'      => '',
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Insert logo link or not', 'junko' ),
				'param_name' => 'logo_link',
				'value'      => array(
					esc_html__( 'Yes', 'junko' )	=> 'yes',
					esc_html__( 'No', 'junko' )	=> 'no',
				),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Logo width (unit: px)', 'junko' ),
				'description'=> esc_html__( 'Insert number. Leave blank if you want to use original image size', 'junko' ),
				'param_name' => 'logo_width',
				'value'      => esc_html__( '150', 'junko' ),
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'junko' )                  => 'style1',
					esc_html__( 'Style 2 (footer)', 'junko' )         => 'style2',
				),
			),
		)
	) );
	//Main Menu
	vc_map( array(
		'name'        => esc_html__( 'Main Menu', 'junko'),
		'description' => esc_html__( 'Set Primary Menu in Apperance - Menus - Manage Locations', 'junko' ),
		'base'        => 'roadmainmenu',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'        => '',
				'holder'      => 'div',
				'class'       => '',
				'heading'     => esc_html__( 'Set Primary Menu in Apperance - Menus - Manage Locations', 'junko' ),
				'description' => esc_html__( 'More settings in Theme Options - Main Menu', 'junko' ),
				'param_name'  => 'no_settings',
				'value'       => '',
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1 (Default)', 'junko' )        => 'style1',
					esc_html__( 'Style 2 (Demo 2+3)', 'junko' )         => 'style2',
					esc_html__( 'Style 3 (Demo 2+3 sticky)', 'junko' )  => 'style3',
				),
			),
		),
	) );
	//Sticky Menu
	vc_map( array(
		'name'        => esc_html__( 'Sticky Menu', 'junko'),
		'description' => esc_html__( 'Set Sticky Menu in Apperance - Menus - Manage Locations', 'junko' ),
		'base'        => 'roadstickymenu',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'        => '',
				'holder'      => 'div',
				'class'       => '',
				'heading'     => esc_html__( 'Set Sticky Menu in Apperance - Menus - Manage Locations', 'junko' ),
				'description' => esc_html__( 'More settings in Theme Options - Main Menu', 'junko' ),
				'param_name'  => 'no_settings',
				'value'       => '',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'junko' )  => 'style1',
					esc_html__( 'Style 2', 'junko' )  => 'style2',
				),
			),
		),
	) );
	//Mobile Menu
	vc_map( array(
		'name'        => esc_html__( 'Mobile Menu', 'junko'),
		'description' => esc_html__( 'Set Mobile Menu in Apperance - Menus - Manage Locations', 'junko' ),
		'base'        => 'roadmobilemenu',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'        => '',
				'holder'      => 'div',
				'class'       => '',
				'heading'     => esc_html__( 'Set Mobile Menu in Apperance - Menus - Manage Locations', 'junko' ),
				'description' => esc_html__( 'More settings in Theme Options - Main Menu', 'junko' ),
				'param_name'  => 'no_settings',
				'value'       => '',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'junko' )  => 'style1',
					esc_html__( 'Style 2', 'junko' )  => 'style2',
				),
			),
		),
	) );
	//Categories Menu
	vc_map( array(
		'name'        => esc_html__( 'Categories Menu', 'junko'),
		'description' => esc_html__( 'Set Categories Menu in Apperance - Menus - Manage Locations', 'junko' ),
		'base'        => 'roadcategoriesmenu',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'        => '',
				'holder'      => 'div',
				'class'       => '',
				'heading'     => esc_html__( 'Set Categories Menu in Apperance - Menus - Manage Locations', 'junko' ),
				'description' => esc_html__( 'More settings in Theme Options - Categories Menu', 'junko' ),
				'param_name'  => 'no_settings',
				'value'       => '',
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Show full Categories in home page ?', 'junko' ),
				'description' => esc_html__( 'In inner pages, it only shows the toogle', 'junko' ),
				'param_name' => 'categories_show_home',
				'value'      => array(
					esc_html__( 'No', 'junko' )  => 'false',
					esc_html__( 'Yes', 'junko' ) => 'true',
				),
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'junko' )          => 'style1',
					esc_html__( 'Style 2 (Demo 2)', 'junko' ) => 'style2',
				),
			),
		),
	) );
	//Social Icons
	vc_map( array(
		'name'        => esc_html__( 'Social Icons', 'junko'),
		'description' => esc_html__( 'Configure icons and links in Theme Options', 'junko' ),
		'base'        => 'roadsocialicons',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'       => '',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Configure icons and links in Theme Options > Social Icons', 'junko' ),
				'param_name' => 'no_settings',
				'value'      => '',
			),
			array(
				'type'       => 'textarea',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Social title element', 'junko' ),
				'param_name' => 'social_title',
				'value'      => 'Title',
			),
			array(
				'type'       => 'textarea',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Social sub-title element', 'junko' ),
				'param_name' => 'sub_social_title',
				'value'      => '',
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1 (header)', 'junko' ) => 'style1',
					esc_html__( 'Style 2 (footer)', 'junko' ) => 'style2',
				),
			),
		),
	) );
	//Mini Cart
	vc_map( array(
		'name'        => esc_html__( 'Mini Cart', 'junko'),
		'description' => esc_html__( 'Mini Cart', 'junko' ),
		'base'        => 'roadminicart',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'       => '',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'This widget does not have settings', 'junko' ),
				'param_name' => 'no_settings',
				'value'      => '',
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'junko' )              => 'style1',
					esc_html__( 'Style 2 (demo 3)', 'junko' )     => 'style2',
				),
			),
		),
	) );
	//Wishlist
	vc_map( array(
		'name'        => esc_html__( 'Wishlist', 'junko'),
		'description' => esc_html__( 'Wishlist', 'junko' ),
		'base'        => 'roadwishlist',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'junko' )           => 'style1',
					esc_html__( 'Style 2 (demo 3)', 'junko' )  => 'style2',
				),
			),
		),
	) );
	//Products Search without dropdown
	vc_map( array(
		'name'        => esc_html__( 'Product Search (No dropdown)', 'junko'),
		'description' => esc_html__( 'Product Search (No dropdown)', 'junko' ),
		'base'        => 'roadproductssearch',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'junko' )           => 'style1',
				),
			),
		),
	) );
	//Products Search with dropdown
	vc_map( array(
		'name'        => esc_html__( 'Product Search (Dropdown)', 'junko'),
		'description' => esc_html__( 'Product Search (Dropdown)', 'junko' ),
		'base'        => 'roadproductssearchdropdown',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'       => '',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'This widget does not have settings', 'junko' ),
				'param_name' => 'no_settings',
				'value'      => '',
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'junko' )               => 'style1',
				),
			),
		),
	) );
	//Image slider
	vc_map( array(
		'name'        => esc_html__( 'Image slider', 'junko' ),
		'description' => esc_html__( 'Upload images and links in Theme Options', 'junko' ),
		'base'        => 'image_slider',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Number of rows', 'junko' ),
				'param_name' => 'rows',
				'value'      => array(
					'1'	=> '1',
					'2'	=> '2',
					'3'	=> '3',
					'4'	=> '4',
					'5'	=> '5',
					'6'	=> '6',
				),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'heading'    => esc_html__( 'Number of columns (screen: over 1500px)', 'junko' ),
				'param_name' => 'items_1500up',
				'value'      => esc_html__( '4', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'heading'    => esc_html__( 'Number of columns (screen: 1200px - 1499px)', 'junko' ),
				'param_name' => 'items_1200_1499',
				'value'      => esc_html__( '4', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Number of columns (screen: 992px - 1199px)', 'junko' ),
				'param_name' => 'items_992_1199',
				'value'      => esc_html__( '4', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Number of columns (screen: 768px - 991px)', 'junko' ),
				'param_name' => 'items_768_991',
				'value'      => esc_html__( '3', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Number of columns (screen: 640px - 767px)', 'junko' ),
				'param_name' => 'items_640_767',
				'value'      => esc_html__( '2', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Number of columns (screen: 480px - 639px)', 'junko' ),
				'param_name' => 'items_480_639',
				'value'      => esc_html__( '2', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Number of columns (screen: under 479px)', 'junko' ),
				'param_name' => 'items_0_479',
				'value'      => esc_html__( '1', 'junko' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Navigation', 'junko' ),
				'param_name' => 'navigation',
				'value'      => array(
					esc_html__( 'Yes', 'junko' ) => true,
					esc_html__( 'No', 'junko' )  => false,
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Pagination', 'junko' ),
				'param_name' => 'pagination',
				'value'      => array(
					esc_html__( 'No', 'junko' )  => false,
					esc_html__( 'Yes', 'junko' ) => true,
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Item Margin (unit: pixel)', 'junko' ),
				'param_name' => 'item_margin',
				'value'      => 30,
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Slider speed number (unit: second)', 'junko' ),
				'param_name' => 'speed',
				'value'      => '500',
			),
			array(
				'type'       => 'checkbox',
				'value'      => true,
				'heading'    => esc_html__( 'Slider loop', 'junko' ),
				'param_name' => 'loop',
			),
			array(
				'type'       => 'checkbox',
				'value'      => true,
				'heading'    => esc_html__( 'Slider Auto', 'junko' ),
				'param_name' => 'auto',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'junko' )  => 'style1',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Navigation style', 'junko' ),
				'param_name'  => 'navigation_style',
				'value'       => array(
					esc_html__( 'Navigation top-right', 'junko' )          => 'navigation-style1',
					esc_html__( 'Navigation center horizontal', 'junko' )  => 'navigation-style2',
				),
			),
		),
	) );
	//Brand logos
	vc_map( array(
		'name'        => esc_html__( 'Brand Logos', 'junko' ),
		'description' => esc_html__( 'Upload images and links in Theme Options', 'junko' ),
		'base'        => 'ourbrands',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Number of rows', 'junko' ),
				'param_name' => 'rows',
				'value'      => array(
					'1'	=> '1',
					'2'	=> '2',
					'3'	=> '3',
					'4'	=> '4',
				),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'heading'    => esc_html__( 'Number of columns (screen: over 1500px)', 'junko' ),
				'param_name' => 'items_1500up',
				'value'      => esc_html__( '5', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Number of columns (screen: 1200px - 1499px)', 'junko' ),
				'param_name' => 'items_1200_1499',
				'value'      => esc_html__( '5', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Number of columns (screen: 992px - 1199px)', 'junko' ),
				'param_name' => 'items_992_1199',
				'value'      => esc_html__( '5', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Number of columns (screen: 768px - 991px)', 'junko' ),
				'param_name' => 'items_768_991',
				'value'      => esc_html__( '4', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Number of columns (screen: 640px - 767px)', 'junko' ),
				'param_name' => 'items_640_767',
				'value'      => esc_html__( '3', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Number of columns (screen: 480px - 639px)', 'junko' ),
				'param_name' => 'items_480_639',
				'value'      => esc_html__( '2', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Number of columns (screen: under 479px)', 'junko' ),
				'param_name' => 'items_0_479',
				'value'      => esc_html__( '1', 'junko' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Navigation', 'junko' ),
				'param_name' => 'navigation',
				'value'      => array(
					esc_html__( 'Yes', 'junko' ) => true,
					esc_html__( 'No', 'junko' )  => false,
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Pagination', 'junko' ),
				'param_name' => 'pagination',
				'value'      => array(
					esc_html__( 'No', 'junko' )  => false,
					esc_html__( 'Yes', 'junko' ) => true,
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Item Margin (unit: pixel)', 'junko' ),
				'param_name' => 'item_margin',
				'value'      => 0,
			),
			array(
				'type'       => 'textfield',
				'heading'    =>  esc_html__( 'Slider speed number (unit: second)', 'junko' ),
				'param_name' => 'speed',
				'value'      => '500',
			),
			array(
				'type'       => 'checkbox',
				'value'      => true,
				'heading'    => esc_html__( 'Slider loop', 'junko' ),
				'param_name' => 'loop',
			),
			array(
				'type'       => 'checkbox',
				'value'      => true,
				'heading'    => esc_html__( 'Slider Auto', 'junko' ),
				'param_name' => 'auto',
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'junko' )       => 'style1',
				),
			),
			array(
				'type'        => 'dropdown',
				'holder'     => 'div',
				'heading'     => esc_html__( 'Navigation style', 'junko' ),
				'param_name'  => 'navigation_style',
				'value'       => array(
					esc_html__( 'Navigation center horizontal', 'junko' )  => 'navigation-style1',
					esc_html__( 'Navigation top-right', 'junko' )          => 'navigation-style2',
				),
			),
		),
	) );
	//Latest posts
	vc_map( array(
		'name'        => esc_html__( 'Latest posts', 'junko' ),
		'description' => esc_html__( 'List posts', 'junko' ),
		'base'        => 'latestposts',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"        => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Number of posts', 'junko' ),
				'param_name' => 'posts_per_page',
				'value'      => esc_html__( '10', 'junko' ),
			),
			array(
				'type'        => 'textfield',
				'holder'      => 'div',
				'class'       => '',
				'heading'     => esc_html__( 'Category', 'junko' ),
				'param_name'  => 'category',
				'value'       => esc_html__( '0', 'junko' ),
				'description' => esc_html__( 'Slug of the category (example: slug-1, slug-2). Default is 0 : show all posts', 'junko' ),
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Image scale', 'junko' ),
				'param_name' => 'image',
				'value'      => array(
					'Wide'	=> 'wide',
					'Square'=> 'square',
				),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Excerpt length', 'junko' ),
				'param_name' => 'length',
				'value'      => esc_html__( '20', 'junko' ),
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Number of columns', 'junko' ),
				'param_name' => 'colsnumber',
				'value'      => array(
					'1'	=> '1',
					'2'	=> '2',
					'3'	=> '3',
					'4'	=> '4',
					'5'	=> '5',
					'6'	=> '6',
				),
			),
			array(
				'type'        => 'dropdown',
				'holder'     => 'div',
				'heading'     => esc_html__( 'Style', 'junko' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1', 'junko' )           => 'style1',
					esc_html__( 'Style 2 (demo 4)', 'junko' )  => 'style2',
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Enable slider', 'junko' ),
				'param_name'  => 'enable_slider',
				'value'       => true,
				'save_always' => true, 
				'group'       => esc_html__( 'Slider Options', 'junko' ),
			),
			array(
				'type'       => 'dropdown',
				'class'      => '',
				'heading'    => esc_html__( 'Number of rows', 'junko' ),
				'param_name' => 'rowsnumber',
				'group'      => esc_html__( 'Slider Options', 'junko' ),
				'value'      => array(
						'1'	=> '1',
						'2'	=> '2',
						'3'	=> '3',
						'4'	=> '4',
					),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Number of columns (screen: 1200px - 1499px)', 'junko' ),
				'param_name' => 'items_1200_1499',
				'group'      => esc_html__( 'Slider Options', 'junko' ),
				'value'      => esc_html__( '3', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'class'      => '',
				'heading'    => esc_html__( 'Number of columns (screen: 992px - 1199px)', 'junko' ),
				'param_name' => 'items_992_1199',
				'value'      => esc_html__( '3', 'junko' ),
				'group'      => esc_html__( 'Slider Options', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'class'      => '',
				'heading'    => esc_html__( 'Number of columns (screen: 768px - 991px)', 'junko' ),
				'param_name' => 'items_768_991',
				'value'      => esc_html__( '3', 'junko' ),
				'group'      => esc_html__( 'Slider Options', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'class'      => '',
				'heading'    => esc_html__( 'Number of columns (screen: 640px - 767px)', 'junko' ),
				'param_name' => 'items_640_767',
				'value'      => esc_html__( '2', 'junko' ),
				'group'      => esc_html__( 'Slider Options', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'class'      => '',
				'heading'    => esc_html__( 'Number of columns (screen: 480px - 639px)', 'junko' ),
				'param_name' => 'items_480_639',
				'value'      => esc_html__( '2', 'junko' ),
				'group'      => esc_html__( 'Slider Options', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'class'      => '',
				'heading'    => esc_html__( 'Number of columns (screen: under 479px)', 'junko' ),
				'param_name' => 'items_0_479',
				'value'      => esc_html__( '1', 'junko' ),
				'group'      => esc_html__( 'Slider Options', 'junko' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Navigation', 'junko' ),
				'param_name'  => 'navigation',
				'save_always' => true,
				'group'       => esc_html__( 'Slider Options', 'junko' ),
				'value'       => array(
					esc_html__( 'Yes', 'junko' ) => true,
					esc_html__( 'No', 'junko' )  => false,
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Pagination', 'junko' ),
				'param_name'  => 'pagination',
				'save_always' => true,
				'group'       => esc_html__( 'Slider Options', 'junko' ),
				'value'       => array(
					esc_html__( 'No', 'junko' )  => false,
					esc_html__( 'Yes', 'junko' ) => true,
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Item Margin (unit: pixel)', 'junko' ),
				'param_name'  => 'item_margin',
				'value'       => 30,
				'save_always' => true,
				'group'       => esc_html__( 'Slider Options', 'junko' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Slider speed number (unit: second)', 'junko' ),
				'param_name'  => 'speed',
				'value'       => '500',
				'save_always' => true,
				'group'       => esc_html__( 'Slider Options', 'junko' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Slider loop', 'junko' ),
				'param_name'  => 'loop',
				'value'       => true,
				'group'       => esc_html__( 'Slider Options', 'junko' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Slider Auto', 'junko' ),
				'param_name'  => 'auto',
				'value'       => true,
				'group'       => esc_html__( 'Slider Options', 'junko' ),
			),
			array(
				'type'        => 'dropdown',
				'holder'      => 'div',
				'heading'     => esc_html__( 'Navigation style', 'junko' ),
				'param_name'  => 'navigation_style',
				'group'       => esc_html__( 'Slider Options', 'junko' ),
				'value'       => array(
					esc_html__( 'Navigation center horizontal', 'junko' )  => 'navigation-style1',
					esc_html__( 'Navigation top-right', 'junko' )          => 'navigation-style2',
				),
			),
		),
	) );
	//Testimonials
	vc_map( array(
		'name'        => esc_html__( 'Testimonials', 'junko' ),
		'description' => esc_html__( 'Testimonial slider', 'junko' ),
		'base'        => 'testimonials',
		'class'       => '',
		'category'    => esc_html__( 'Theme', 'junko'),
		"icon"     	  => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'      => array(
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Number of testimonial', 'junko' ),
				'param_name' => 'limit',
				'value'      => esc_html__( '10', 'junko' ),
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Display Author', 'junko' ),
				'param_name' => 'display_author',
				'value'      => array(
					esc_html__( 'Yes', 'junko' ) => '1',
					esc_html__( 'No', 'junko' )	 => '0',
				),
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Display Avatar', 'junko' ),
				'param_name' => 'display_avatar',
				'value'      => array(
					esc_html__( 'Yes', 'junko' ) => '1',
					esc_html__( 'No', 'junko' )  => '0',
				),
			),
			array(
				'type'        => 'textfield',
				'holder'      => 'div',
				'class'       => '',
				'heading'     => esc_html__( 'Avatar image size', 'junko' ),
				'param_name'  => 'size',
				'value'       => '150',
				'description' => esc_html__( 'Avatar image size in pixels. Default is 150', 'junko' ),
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Display URL', 'junko' ),
				'param_name' => 'display_url',
				'value'      => array(
					esc_html__( 'Yes', 'junko' ) => '1',
					esc_html__( 'No', 'junko' )	 => '0',
				),
			),
			array(
				'type'        => 'textfield',
				'holder'      => 'div',
				'class'       => '',
				'heading'     => esc_html__( 'Category', 'junko' ),
				'param_name'  => 'category',
				'value'       => esc_html__( '0', 'junko' ),
				'description' => esc_html__( 'Slug of the category. Default is 0 : show all testimonials', 'junko' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Navigation', 'junko' ),
				'param_name' => 'navigation',
				'value'      => array(
					esc_html__( 'No', 'junko' )  => false,
					esc_html__( 'Yes', 'junko' ) => true,
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Pagination', 'junko' ),
				'param_name' => 'pagination',
				'value'      => array(
					esc_html__( 'Yes', 'junko' ) => true,
					esc_html__( 'No', 'junko' )  => false,
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    =>  esc_html__( 'Slider speed number (unit: second)', 'junko' ),
				'param_name' => 'speed',
				'value'      => '500',
			),
			array(
				'type'       => 'checkbox',
				'value'      => true,
				'heading'    => esc_html__( 'Slider loop', 'junko' ),
				'param_name' => 'loop',
			),
			array(
				'type'       => 'checkbox',
				'value'      => true,
				'heading'    => esc_html__( 'Slider Auto', 'junko' ),
				'param_name' => 'auto',
			),
			array(
				'type'        => 'dropdown',
				'holder'      => 'div',
				'heading'     => esc_html__( 'Style', 'junko' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1', 'junko' )                => 'style1',
					esc_html__( 'Style 2 (about page)', 'junko' )   => 'style-about-page',
				),
			),
			array(
				'type'        => 'dropdown',
				'holder'      => 'div',
				'heading'     => esc_html__( 'Navigation style', 'junko' ),
				'param_name'  => 'navigation_style',
				'value'       => array(
					esc_html__( 'Navigation top-right', 'junko' )          => 'navigation-style1',
					esc_html__( 'Navigation center horizontal', 'junko' )  => 'navigation-style2',
				),
			),
		),
	) );
	//Counter
	vc_map( array(
		'name'     => esc_html__( 'Counter', 'junko' ),
		'description' => esc_html__( 'Counter', 'junko' ),
		'base'     => 'junko_counter',
		'class'    => '',
		'category' => esc_html__( 'Theme', 'junko'),
		"icon"     => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'   => array(
			array(
				'type'        => 'attach_image',
				'holder'      => 'div',
				'class'       => '',
				'heading'     => esc_html__( 'Image icon', 'junko' ),
				'param_name'  => 'image',
				'value'       => '',
				'description' => esc_html__( 'Upload icon image', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Number', 'junko' ),
				'param_name' => 'number',
				'value'      => '',
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Text', 'junko' ),
				'param_name' => 'text',
				'value'      => '',
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'junko' )  => 'style1',
				),
			),
		),
	) );
	//Heading title
	vc_map( array(
		'name'     => esc_html__( 'Heading Title', 'junko' ),
		'description' => esc_html__( 'Heading Title', 'junko' ),
		'base'     => 'roadthemes_title',
		'class'    => '',
		'category' => esc_html__( 'Theme', 'junko'),
		"icon"     => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'   => array(
			array(
				'type'       => 'textarea',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Heading title element', 'junko' ),
				'param_name' => 'heading_title',
				'value'      => 'Title',
			),
			array(
				'type'       => 'textarea',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Heading sub-title element', 'junko' ),
				'param_name' => 'sub_heading_title',
				'value'      => '',
			),
			array(
				'type'        => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'     => esc_html__( 'Style', 'junko' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1 (Default)', 'junko' )             => 'style1',
					esc_html__( 'Style 2 (Footer title)', 'junko' )        => 'style2',
					esc_html__( 'Style 3 (Demo 3 style2)', 'junko' )       => 'style3',
				),
			),
		),
	) );
	//Countdown
	vc_map( array(
		'name'     => esc_html__( 'Countdown', 'junko' ),
		'description' => esc_html__( 'Countdown', 'junko' ),
		'base'     => 'roadthemes_countdown',
		'class'    => '',
		'category' => esc_html__( 'Theme', 'junko'),
		"icon"     => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'   => array(
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'End date (day)', 'junko' ),
				'param_name' => 'countdown_day',
				'value'      => '1',
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'End date (month)', 'junko' ),
				'param_name' => 'countdown_month',
				'value'      => '1',
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'End date (year)', 'junko' ),
				'param_name' => 'countdown_year',
				'value'      => '2020',
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Style', 'junko' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'junko' )  => 'style1',
				),
			),
		),
	) );
	//Mailchimp newsletter
	vc_map( array(
		'name'     => esc_html__( 'Mailchimp Newsletter', 'junko' ),
		'description' => esc_html__( 'Mailchimp Newsletter ', 'junko' ),
		'base'     => 'roadthemes_newsletter',
		'class'    => '',
		'category' => esc_html__( 'Theme', 'junko'),
		"icon"     => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'   => array(
			array(
				'type'        => 'textarea',
				'holder'      => 'div',
				'class'       => '',
				'heading'     => esc_html__( 'Newsletter title', 'junko' ),
				'param_name'  => 'newsletter_title',
				'value'       => '',
			),
			array(
				'type'        => 'textarea',
				'holder'      => 'div',
				'class'       => '',
				'heading'     => esc_html__( 'Newsletter sub-title', 'junko' ),
				'param_name'  => 'newsletter_sub_title',
				'value'       => '',
			),
			array(
				'type'        => 'attach_image',
				'holder'      => 'div',
				'class'       => '',
				'heading'     => esc_html__( 'Upload newsletter title image', 'junko' ),
				'param_name'  => 'newsletter_image',
				'value'       => '',
			),
			array(
				'type'        => 'textfield',
				'holder'      => 'div',
				'class'       => '',
				'heading'     => esc_html__( 'Insert id of Mailchimp Form', 'junko' ),
				'description' => esc_html__( 'See id in admin -> MailChimp for WP -> Form, under the form title', 'junko' ),
				'param_name'  => 'newsletter_form_id',
				'value'       => '',
			),
			array(
				'type'       => 'dropdown',
				'holder'     => 'div',
				'class'      => '',
				'heading'     => esc_html__( 'Style', 'junko' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1 (Default)', 'junko' )    => 'style1',
					esc_html__( 'Style 2', 'junko' )              => 'style2',
				),
			),
		),
	) );
	//Custom Menu
	$custom_menus = array();
	if ( 'vc_edit_form' === vc_post_param( 'action' ) && vc_verify_admin_nonce() ) {
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
		if ( is_array( $menus ) && ! empty( $menus ) ) {
			foreach ( $menus as $single_menu ) {
				if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->term_id ) ) {
					$custom_menus[ $single_menu->name ] = $single_menu->term_id;
				}
			}
		}
	}
	vc_map( array(
		'name'     => esc_html__( 'Custom Menu', 'junko' ),
		'description' => esc_html__( 'Custom Menu', 'junko' ),
		'base'     => 'roadthemes_menu',
		'class'    => '',
		'category' => esc_html__( 'Theme', 'junko'),
		"icon"     => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'   => array(
			array(
				'type'       => 'attach_image',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Upload menu image', 'junko' ),
				'param_name' => 'menu_image',
				'value'      => '',
			),
			array(
				'type'       => 'textarea',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Menu title', 'junko' ),
				'param_name' => 'menu_title',
				'value'      => 'Title',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Choose Menu', 'junko' ),
				'param_name'  => 'nav_menu',
				'value'       => $custom_menus,
				'description' => empty( $custom_menus ) ? esc_html__( 'Custom menus not found. Please visit <b>Appearance > Menus</b> page to create new menu.', 'junko' ) : esc_html__( 'Select menu to display.', 'junko' ),
				'admin_label' => true,
				'save_always' => true,
			),
			array(
				'type'       => 'textarea',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Menu text', 'junko' ),
				'param_name' => 'menu_text',
				'value'      => '',
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Menu link text', 'junko' ),
				'param_name' => 'menu_link_text',
				'value'      => '',
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Menu link url', 'junko' ),
				'param_name' => 'menu_link_url',
				'value'      => '',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'junko' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1 (Default)', 'junko' )    => 'style1',
				),
			),
		),
	) );
	//Policy
	vc_map( array(
		'name'     => esc_html__( 'Policy', 'junko' ),
		'description' => esc_html__( 'Policy content', 'junko' ),
		'base'     => 'roadthemes_policy',
		'class'    => '',
		'category' => esc_html__( 'Theme', 'junko'),
		"icon"     => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'   => array(
			array(
				'type'       => 'attach_image',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Upload Policy icon', 'junko' ),
				'param_name' => 'policy_icon',
				'value'      => '',
			),
			array(
				'type'       => 'textarea',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Policy title', 'junko' ),
				'param_name' => 'policy_title',
				'value'      => 'Title',
			),
			array(
				'type'       => 'textarea',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Policy text', 'junko' ),
				'param_name' => 'policy_text',
				'value'      => '',
			),
			array(
				'type'        => 'dropdown',
				'holder'     => 'div',
				'heading'     => esc_html__( 'Style', 'junko' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1 (Default)', 'junko' )    => 'style1',
					esc_html__( 'Style 2 (Demo 4)', 'junko' )     => 'style2',
				),
			),
		),
	) );
	//Static block
	vc_map( array(
		'name'     => esc_html__( 'Static block 1', 'junko' ),
		'description' => esc_html__( 'Static block with link text', 'junko' ),
		'base'     => 'roadthemes_static_1',
		'class'    => '',
		'category' => esc_html__( 'Theme', 'junko'),
		"icon"     => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'   => array(
			array(
				'type'       => 'attach_image',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Upload Static image', 'junko' ),
				'param_name' => 'static_image',
				'value'      => '',
			),
			array(
				'type'       => 'textarea',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Static title', 'junko' ),
				'param_name' => 'static_title',
				'value'      => 'Title',
			),
			array(
				'type'       => 'textarea',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Static text', 'junko' ),
				'param_name' => 'static_text',
				'value'      => '',
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Static link text', 'junko' ),
				'param_name' => 'static_link_text',
				'value'      => '',
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Static link url', 'junko' ),
				'param_name' => 'static_link_url',
				'value'      => '',
			),
			array(
				'type'        => 'dropdown',
				'holder'     => 'div',
				'heading'     => esc_html__( 'Style', 'junko' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1 (demo 1 style 1)', 'junko' )    => 'style1',
					esc_html__( 'Style 2 (demo 1 style 2)', 'junko' )    => 'style2',
				),
			),
		),
	) );
	vc_map( array(
		'name'     => esc_html__( 'Static block 2', 'junko' ),
		'description' => esc_html__( 'Static block without link text', 'junko' ),
		'base'     => 'roadthemes_static_2',
		'class'    => '',
		'category' => esc_html__( 'Theme', 'junko'),
		"icon"     => get_template_directory_uri() . "/images/road-icon.jpg",
		'params'   => array(
			array(
				'type'       => 'attach_image',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Upload Static image', 'junko' ),
				'param_name' => 'static_image',
				'value'      => '',
			),
			array(
				'type'       => 'textarea',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Static title', 'junko' ),
				'param_name' => 'static_title',
				'value'      => 'Title',
			),
			array(
				'type'       => 'textarea',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Static text', 'junko' ),
				'param_name' => 'static_text',
				'value'      => '',
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Static link url', 'junko' ),
				'param_name' => 'static_link_url',
				'value'      => '',
			),
			array(
				'type'        => 'dropdown',
				'holder'     => 'div',
				'heading'     => esc_html__( 'Style', 'junko' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1 (demo 3 style 1)', 'junko' )    => 'style1',
				),
			),
		),
	) );
}
?>