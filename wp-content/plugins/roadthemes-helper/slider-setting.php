<?php 

if( ! function_exists( 'road_get_slider_setting' ) ) {
	function road_get_slider_setting() {
		return array(
			array(
				'type'        => 'dropdown',
				'holder'      => 'div',
				'heading'     => esc_html__( 'Style', 'junko' ),
				'param_name'  => 'style',
				'value'       => array(
					__( 'Grid view (default)', 'junko' )                    => 'product-grid',
					__( 'Grid view 2 (product bg 2 (Demo 2))', 'junko' )=> 'product-grid-2',
					__( 'List view 1', 'junko' )                  => 'product-list',
					__( 'Grid view with countdown', 'junko' )     => 'product-grid-countdown',
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => __( 'Enable slider', 'junko' ),
				'description' => __( 'If slider is enabled, the "column" ins General group is the number of rows ', 'junko' ),
				'param_name'  => 'enable_slider',
				'value'       => true,
				'save_always' => true, 
				'group'       => __( 'Slider Options', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'heading'    => __( 'Number of columns (screen: over 1500px)', 'junko' ),
				'param_name' => 'items_1500up',
				'group'      => __( 'Slider Options', 'junko' ),
				'value'      => esc_html__( '4', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => __( 'Number of columns (screen: 1200px - 1499px)', 'junko' ),
				'param_name' => 'items_1200_1499',
				'group'      => __( 'Slider Options', 'junko' ),
				'value'      => esc_html__( '4', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => __( 'Number of columns (screen: 992px - 1199px)', 'junko' ),
				'param_name' => 'items_992_1199',
				'group'      => __( 'Slider Options', 'junko' ),
				'value'      => esc_html__( '4', 'junko' ),
			), 
			array(
				'type'       => 'textfield',
				'heading'    => __( 'Number of columns (screen: 768px - 991px)', 'junko' ),
				'param_name' => 'items_768_991',
				'group'      => __( 'Slider Options', 'junko' ),
				'value'      => esc_html__( '3', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => __( 'Number of columns (screen: 640px - 767px)', 'junko' ),
				'param_name' => 'items_640_767',
				'group'      => __( 'Slider Options', 'junko' ),
				'value'      => esc_html__( '2', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => __( 'Number of columns (screen: 480px - 639px)', 'junko' ),
				'param_name' => 'items_480_639',
				'group'      => __( 'Slider Options', 'junko' ),
				'value'      => esc_html__( '2', 'junko' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => __( 'Number of columns (screen: under 479px)', 'junko' ),
				'param_name' => 'items_0_479',
				'group'      => __( 'Slider Options', 'junko' ),
				'value'      => esc_html__( '1', 'junko' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Navigation', 'junko' ),
				'param_name'  => 'navigation',
				'save_always' => true,
				'group'       => __( 'Slider Options', 'junko' ),
				'value'       => array(
					__( 'Yes', 'junko' ) => true,
					__( 'No', 'junko' )  => false,
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Pagination', 'junko' ),
				'param_name'  => 'pagination',
				'save_always' => true,
				'group'       => __( 'Slider Options', 'junko' ),
				'value'       => array(
					__( 'No', 'junko' )  => false,
					__( 'Yes', 'junko' ) => true,
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Item Margin (unit: pixel)', 'junko' ),
				'param_name'  => 'item_margin',
				'value'       => 30,
				'save_always' => true,
				'group'       => __( 'Slider Options', 'junko' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Slider speed number (unit: second)', 'junko' ),
				'param_name'  => 'speed',
				'value'       => '500',
				'save_always' => true,
				'group'       => __( 'Slider Options', 'junko' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => __( 'Slider loop', 'junko' ),
				'param_name'  => 'loop',
				'value'       => true,
				'group'       => __( 'Slider Options', 'junko' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => __( 'Slider Auto', 'junko' ),
				'param_name'  => 'auto',
				'value'       => true,
				'group'       => __( 'Slider Options', 'junko' ),
			),
			array(
				'type'        => 'dropdown',
				'holder'      => 'div',
				'heading'     => esc_html__( 'Navigation style', 'junko' ),
				'param_name'  => 'navigation_style',
				'group'       => __( 'Slider Options', 'junko' ),
				'value'       => array(
					'Navigation center horizontal'	=> 'navigation-style1',
					'Navigation top right'	        => 'navigation-style2',
					'Navigation left bottom (demo3)'=> 'navigation-style3',
				),
			),
		);
	}
}