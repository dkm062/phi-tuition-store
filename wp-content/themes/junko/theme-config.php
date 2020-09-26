<?php
/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */
if (!class_exists('junko_Theme_Config')) {
    class junko_Theme_Config {
        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;
        public function __construct() {
            if (!class_exists('ReduxFramework')) {
                return;
            }
            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }
        }
        public function initSettings() {
            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();
            // Set the default arguments
            $this->setArguments();
            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();
            // Create the sections and fields
            $this->setSections();
            if (!isset($this->args['opt_name'])) {
                return;
            }
            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }
        /**
          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field   set with compiler=>true is changed.
         * */
        function compiler_action($options, $css, $changed_values) {
            echo '<h1>'. esc_html__('The compiler hook has run!', 'junko').'</h1>';
            echo "<pre>";
            print_r($changed_values);
            echo "</pre>";
        }
        /**
          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.
          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons
         * */
        function dynamic_section($sections) {
            $sections[] = array(
                'title' => esc_html__('Section via hook', 'junko'),
                'desc' => '<p class="description">'. esc_html__('This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'junko').'</p>',
                'icon' => 'el-icon-paper-clip',
                'fields' => array()
            );
            return $sections;
        }
        /**
          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
         * */
        function change_arguments($args) {
            return $args;
        }
        /**
          Filter hook for filtering the default value of any given field. Very useful in development mode.
         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = esc_html__('Testing filter hook!', 'junko');
            return $defaults;
        }
        public function setSections() {
            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            ob_start();
            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';
            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'junko'), $this->theme->display('Name'));
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
                <?php if ($screenshot) : ?>
                    <?php if (current_user_can('edit_theme_options')) : ?>
                            <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                                <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'junko'); ?>" />
                            </a>
                    <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'junko'); ?>" />
                <?php endif; ?>
                <h4><?php echo ''.$this->theme->display('Name'); ?></h4>
                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'junko'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'junko'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' .__('Tags', 'junko') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo ''.$this->theme->display('Description'); ?></p>
                    <?php
                        if ($this->theme->parent()) {
                            printf(' <p class="howto">' .__('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'junko') . '</p>',__('http://codex.wordpress.org/Child_Themes', 'junko'), $this->theme->parent()->display('Name'));
                    } ?>
                </div>
            </div>
            <?php
            $item_info = ob_get_contents();
            ob_end_clean();
            $sampleHTML = '';
            // General
            $this->sections[] = array(
                'title'     => esc_html__('General', 'junko'),
                'desc'      => esc_html__('General theme options', 'junko'),
                'icon'      => 'el-icon-cog',
                'fields'    => array(
                    array(
                        'id'        => 'page_content_background',
                        'type'      => 'background',
                        'output'    => array('.page-wrapper'),
                        'title'     => esc_html__('Page content background', 'junko'),
                        'subtitle'  => esc_html__('Select background for page content.', 'junko'),
                        'default'   => array('background-color' => '#ffffff'),
                    ),
                    array( 
                        'id'       => 'border_color',
                        'type'     => 'border',
                        'title'    => esc_html__('Border Option', 'junko'),
                        'subtitle' => esc_html__('Only color validation can be done on this field type', 'junko'),
                        'default'  => array('border-color' => '#ebebeb'),
                    ), 
                    array(
                        'id'        => 'back_to_top',
                        'type'      => 'switch',
                        'title'     => esc_html__('Back To Top', 'junko'),
                        'desc'      => esc_html__('Show back to top button on all pages', 'junko'),
                        'default'   => true,
                    ),
                    array(
                        'id'            => 'row_space',
                        'type'          => 'text',
                        'title'         => esc_html__('Row space', 'junko'),
                        'desc'          => esc_html__('Space between row (example: 70px).', 'junko'),
                        "default"       => '65px',
                        'display_value' => 'text',
                    ),
                    array(
                        'id'            => 'carousel_topright_position',
                        'type'          => 'text',
                        'title'         => esc_html__('Top position of carousel top right', 'junko'),
                        'desc'          => esc_html__('When you add more element to Heading title, you can change position of navigation top right (example: 50px).', 'junko'),
                        "default"       => '73px',
                        'display_value' => 'text',
                    ),
                ),
            );
            // Colors
            $this->sections[] = array(
                'title'     => esc_html__('Colors', 'junko'),
                'desc'      => esc_html__('Color options', 'junko'),
                'icon'      => 'el-icon-tint',
                'fields'    => array(
                    array(
                        'id'          => 'primary_color',
                        'type'        => 'color',
                        'title'       => esc_html__('Primary Color', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for primary color.', 'junko'),
                        'transparent' => false,
                        'default'     => '#0063d1',
                        'validate'    => 'color',
                    ),
                    
                    array(
                        'id'          => 'sale_color',
                        'type'        => 'color',
                        'title'       => esc_html__('Sale Label BG Color', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for bg sale label.', 'junko'),
                        'transparent' => true,
                        'default'     => '#62ab00',
                        'validate'    => 'color',
                    ),
                    
                    array(
                        'id'          => 'saletext_color',
                        'type'        => 'color',
                        'title'       => esc_html__('Sale Label Text Color', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for sale label text.', 'junko'),
                        'transparent' => false,
                        'default'     => '#ffffff',
                        'validate'    => 'color',
                    ),
                    
                    array(
                        'id'          => 'rate_color',
                        'type'        => 'color',
                        'title'       => esc_html__('Rating Star Color', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for star of rating.', 'junko'),
                        'transparent' => false,
                        'default'     => '#0063d1',
                        'validate'    => 'color',
                    ),
                    array(
                        'id'          => 'link_color',
                        'type'        => 'link_color',
                        'title'       => esc_html__('Link Color', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for link.', 'junko'),
                        'default'     => array(
                            'regular'  => '#a43d21',
                            'hover'    => '#0063d1',
                            'active'   => '#0063d1',
                            'visited'  => '#0063d1',
                        )
                    ),
                    array(
                        'id'          => 'text_selected_bg',
                        'type'        => 'color',
                        'title'       => esc_html__('Text selected background', 'junko'),
                        'subtitle'    => esc_html__('Select background for selected text.', 'junko'),
                        'transparent' => false,
                        'default'     => '#91b2c3',
                        'validate'    => 'color',
                    ),
                    array(
                        'id'          => 'text_selected_color',
                        'type'        => 'color',
                        'title'       => esc_html__('Text selected color', 'junko'),
                        'subtitle'    => esc_html__('Select color for selected text.', 'junko'),
                        'transparent' => false,
                        'default'     => '#ffffff',
                        'validate'    => 'color',
                    ),
                ),
            );
            //Header
            $header_layouts = array();
            $header_mobile_layouts = array();
            $header_sticky_layouts = array();
            $header_default = '';
            $header_mobile_default = '';
            $header_sticky_default = '';
            $jscomposer_templates_args = array(
                'orderby'          => 'title',
                'order'            => 'ASC',
                'post_type'        => 'templatera',
                'post_status'      => 'publish',
                'posts_per_page'   => 30,
            );
            $jscomposer_templates = get_posts( $jscomposer_templates_args );
            if(count($jscomposer_templates) > 0) {
                foreach($jscomposer_templates as $jscomposer_template){
                    $header_layouts[$jscomposer_template->post_title] = $jscomposer_template->post_title;
                    $header_mobile_layouts[$jscomposer_template->post_title] = $jscomposer_template->post_title;
                    $header_sticky_layouts[$jscomposer_template->post_title] = $jscomposer_template->post_title;
                }
                $header_default = 'Header 1';
                $header_mobile_default = 'Header 1 Mobile';
                $header_sticky_default = 'Header 1 Sticky';
            }
            $this->sections[] = array(
                'title'     => esc_html__('Header', 'junko'),
                'desc'      => esc_html__('Header options', 'junko'),
                'icon'      => 'el-icon-tasks',
                'fields'    => array(

                    array(
                        'id'                => 'header_layout',
                        'type'              => 'select',
                        'title'             => esc_html__('Header Layout', 'junko'),
                        'customizer_only'   => false,
                        'desc'              => esc_html__('Go to WPBakery Page Builder => Templates to create/edit layout', 'junko'),
                        'options'           => $header_layouts,
                        'default'           => $header_default,
                    ),
                    array(
                        'id'        => 'header_mobile_layout',
                        'type'      => 'select',
                        'title'     => esc_html__('Header Mobile Layout', 'junko'),
                        'customizer_only'   => false,
                        'desc'      => esc_html__('Go to WPBakery Page Builder => Templates to create/edit layout', 'junko'),
                        'options'   => $header_mobile_layouts,
                        'default'   => $header_mobile_default,
                    ),
                    array(
                        'id'        => 'header_bg',
                        'type'      => 'color',
                        'title'     => esc_html__('Header background', 'junko'),
                        'subtitle'  => esc_html__('Pick a color for header background.', 'junko'), 
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
                    array(
                        'id'          => 'header_color',
                        'type'        => 'color',
                        'title'       => esc_html__('Header text color', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for header color.', 'junko'),
                        'transparent' => false,
                        'default'     => '#292929',
                        'validate'    => 'color',
                    ),
                    array(
                        'id'        => 'header_link_color',
                        'type'      => 'link_color',
                        'title'     => esc_html__('Header link color', 'junko'),
                        'subtitle'  => esc_html__('Pick a color for header link color.', 'junko'),
                        'default'   => array(
                            'regular'  => '#292929',
                            'hover'    => '#0063d1',
                            'active'   => '#0063d1',
                            'visited'  => '#0063d1',
                        )
                    ),
                    array(
                        'id'          => 'dropdown_bg',
                        'type'        => 'color',
                        'title'       => esc_html__('Dropdown menu background', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for dropdown menu background.', 'junko'),
                        'transparent' => false,
                        'default'     => '#ffffff',
                        'validate'    => 'color',
                    ),
                ),
            );
            $this->sections[] = array(
                'icon'       => 'el-icon-website',
                'title'      => esc_html__( 'Sticky header', 'junko' ),
                'subsection' => true,
                'fields'     => array(
                    array(
                        'id'        => 'sticky_header',
                        'type'      => 'switch',
                        'title'     => esc_html__('Use sticky header', 'junko'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'header_sticky_bg',
                        'type'      => 'color_rgba',
                        'title'     => esc_html__('Header sticky background', 'junko'),
                        'subtitle'  => esc_html__('Set color and alpha channel', 'junko'),
                        'default'   => array(
                            'color'     => '#ffffff',
                            'alpha'     => 0.95,
                        ),
                        'options'       => array(
                            'show_input'                => true,
                            'show_initial'              => true,
                            'show_alpha'                => true,
                            'show_palette'              => true,
                            'show_palette_only'         => false,
                            'show_selection_palette'    => true,
                            'max_palette_size'          => 10,
                            'allow_empty'               => true,
                            'clickout_fires_change'     => false,
                            'choose_text'               => 'Choose',
                            'cancel_text'               => 'Cancel',
                            'show_buttons'              => true,
                            'use_extended_classes'      => true,
                            'palette'                   => null,
                            'input_text'                => 'Select Color'
                        ),                        
                    ),
                    array(
                        'id'                => 'header_sticky_layout',
                        'type'              => 'select',
                        'title'             => esc_html__('Header Sticky Layout', 'junko'),
                        'customizer_only'   => false,
                        'desc'              => esc_html__('Go to Visual Composer => Templates to create/edit layout', 'junko'),
                        'options'           => $header_sticky_layouts,
                        'default'           => $header_sticky_default,
                    ),
                )
            );
            $this->sections[] = array(
                'icon'       => 'el-icon-website',
                'title'      => esc_html__( 'Top Bar', 'junko' ),
                'subsection' => true,
                'fields'     => array(
                    
                    array(
                        'id'          => 'topbar_color',
                        'type'        => 'color',
                        'title'       => esc_html__('Top bar text color', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for top bar text color.', 'junko'),
                        'transparent' => false,
                        'default'     => '#929292',
                        'validate'    => 'color',
                    ),
                    array(
                        'id'        => 'topbar_link_color',
                        'type'      => 'link_color',
                        'title'     => esc_html__('Top bar link color', 'junko'),
                        'subtitle'  => esc_html__('Pick a color for top bar link color .', 'junko'),
                        'default'   => array(
                            'regular'  => '#929292',
                            'hover'    => '#0063d1',
                            'active'   => '#0063d1',
                            'visited'  => '#0063d1',
                        )
                    ), 
                )
            );
            $this->sections[] = array(
                'icon'       => 'el-icon-website',
                'title'      => esc_html__( 'Main Menu', 'junko' ),
                'fields'     => array(
                    array(
                        'id'        => 'mobile_menu_label',
                        'type'      => 'text',
                        'title'     => esc_html__('Mobile menu label', 'junko'),
                        'subtitle'  => esc_html__('The label for mobile menu (example: Menu, Go to...', 'junko'),
                        'default'   => esc_html__('Menu', 'junko'),
                    ), 
                    array(
                        'id'          => 'sub_menu_bg',
                        'type'        => 'color',
                        'title'       => esc_html__('Submenu background', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for sub menu bg .', 'junko'),
                        'transparent' => false,
                        'default'     => '#ffffff',
                        'validate'    => 'color',
                    ),
                )
            ); 
            $this->sections[] = array(
                'icon'       => 'el-icon-website',
                'title'      => esc_html__( 'Categories Menu', 'junko' ),
                'fields'     => array(
                    array(
                        'id'        => 'categories_menu_label',
                        'type'      => 'text',
                        'title'     => esc_html__('Category menu label', 'junko'),
                        'subtitle'  => esc_html__('The label for category menu', 'junko'),
                        'default'   => esc_html__('ALL CATEGORIES', 'junko'),
                    ),
                    array(
                        'id'          => 'categories_menu_label_bg',
                        'type'        => 'color',
                        'title'       => esc_html__('Category menu label background', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for category menu label background.', 'junko'),
                        'transparent' => false,
                        'default'     => '#1953b4',
                        'validate'    => 'color',
                    ),
                    array(
                        'id'          => 'categories_menu_bg',
                        'type'        => 'color',
                        'title'       => esc_html__('Category menu background', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for category menu background.', 'junko'),
                        'transparent' => false,
                        'default'     => '#ffffff',
                        'validate'    => 'color',
                    ),
                    array(
                        'id'          => 'categories_sub_menu_bg',
                        'type'        => 'color',
                        'title'       => esc_html__('Sub category menu background', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for category sub menu background.', 'junko'),
                        'transparent' => false,
                        'default'     => '#ffffff',
                        'validate'    => 'color',
                    ),
                    array(
                        'id'            => 'categories_menu_items',
                        'type'          => 'slider',
                        'title'         => esc_html__('Number of items', 'junko'),
                        'desc'          => esc_html__('Number of menu items level 1 to show.', 'junko'),
                        "default"       => 9,
                        "min"           => 1,
                        "step"          => 1,
                        "max"           => 15,
                        'display_value' => 'text'
                    ),
                    array(
                        'id'        => 'categories_more_label',
                        'type'      => 'text',
                        'title'     => esc_html__('More items label', 'junko'),
                        'subtitle'  => esc_html__('The label for more items button', 'junko'),
                        'default'   => esc_html__('More Categories', 'junko'),
                    ),
                    array(
                        'id'        => 'categories_less_label',
                        'type'      => 'text',
                        'title'     => esc_html__('Less items label', 'junko'),
                        'subtitle'  => esc_html__('The label for less items button', 'junko'),
                        'default'   => esc_html__('Less Categories', 'junko'),
                    ),
                )
            );
            //Footer
            $footer_layouts = array();
            $footer_default = '';
            $jscomposer_templates_args = array(
                'orderby'          => 'title',
                'order'            => 'ASC',
                'post_type'        => 'templatera',
                'post_status'      => 'publish',
                'posts_per_page'   => 30,
            );
            $jscomposer_templates = get_posts( $jscomposer_templates_args );
            if(count($jscomposer_templates) > 0) {
                foreach($jscomposer_templates as $jscomposer_template){
                    $footer_layouts[$jscomposer_template->post_title] = $jscomposer_template->post_title;
                }
                $footer_default = 'Footer 1';
            }
            $this->sections[] = array(
                'title'     => esc_html__('Footer', 'junko'),
                'desc'      => esc_html__('Footer options', 'junko'),
                'icon'      => 'el-icon-cog',
                'fields'    => array(

                    array(
                        'id'                => 'footer_layout',
                        'type'              => 'select',
                        'title'             => esc_html__('Footer Layout', 'junko'),
                        'customizer_only'   => false,
                        'desc'              => esc_html__('Go to Visual Composer => Templates to create/edit layout', 'junko'),
                        'options'           => $footer_layouts,
                        'default'           => $footer_default
                    ),
                    array(
                        'id'        => 'footer_bg',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer background', 'junko'),
                        'subtitle'  => esc_html__('Upload image or select color.', 'junko'), 
                        'default'   => '#f6f6f6',
                    ), 
                    array(
                        'id'          => 'footer_color',
                        'type'        => 'color',
                        'title'       => esc_html__('Footer text color', 'junko'),
                        'subtitle'    => esc_html__('Pick a color for footer color.', 'junko'),
                        'transparent' => false,
                        'default'     => '#242424',
                        'validate'    => 'color',
                    ),
                    array(
                        'id'        => 'footer_link_color',
                        'type'      => 'link_color',
                        'title'     => esc_html__('Footer link color', 'junko'),
                        'subtitle'  => esc_html__('Pick a color for footer link color.', 'junko'),
                        'default'   => array(
                            'regular'  => '#242424',
                            'hover'    => '#0063d1',
                            'active'   => '#0063d1',
                            'visited'  => '#0063d1',
                        )
                    ),
                ),
            );
            $this->sections[] = array(
                'title'     => esc_html__('Social Icons', 'junko'),
                'icon'      => 'el-icon-website',
                'fields'     => array(
                    array(
                        'id'       => 'social_icons',
                        'type'     => 'sortable',
                        'title'    => esc_html__('Social Icons', 'junko'),
                        'subtitle' => esc_html__('Enter social links', 'junko'),
                        'desc'     => esc_html__('Drag/drop to re-arrange', 'junko'),
                        'mode'     => 'text',
                        'label'    => true,
                        'options'  => array(
                            'facebook'     => 'Facebook',
                            'twitter'      => 'Twitter',
                            'instagram'    => 'Instagram',
                            'tumblr'       => 'Tumblr',
                            'pinterest'    => 'Pinterest',
                            'google-plus'  => 'Google+',
                            'linkedin'     => 'LinkedIn',
                            'behance'      => 'Behance',
                            'dribbble'     => 'Dribbble',
                            'youtube'      => 'Youtube',
                            'vimeo'        => 'Vimeo',
                            'rss'          => 'Rss',
                        ),
                        'default' => array(
                            'facebook'    => 'www.facebook.com/roadthemes/',
                            'twitter'     => 'www.twitter.com/roadthemes',
                            'instagram'   => 'www.instagram.com',
                            'tumblr'      => '',
                            'pinterest'   => '',
                            'google-plus' => '',
                            'linkedin'    => 'www.linkedin.com/in/kevin-sobo-082878b6',
                            'behance'     => '',
                            'dribbble'    => '',
                            'youtube'     => '',
                            'vimeo'       => '',
                            'rss'         => 'www.rss.com',
                        ),
                    ),
                )
            );
            //Fonts
            $this->sections[] = array(
                'title'     => esc_html__('Fonts', 'junko'),
                'desc'      => esc_html__('Fonts options', 'junko'),
                'icon'      => 'el-icon-font',
                'fields'    => array(

                    array(
                        'id'              => 'bodyfont',
                        'type'            => 'typography',
                        'title'           => esc_html__('Body font', 'junko'),
                        'google'          => true,
                        'font-backup'     => true, 
                        'subsets'         => false,
                        'text-align'      => false,
                        'all_styles'      => true, 
                        'units'           => 'px',
                        'subtitle'        => esc_html__('Main body font.', 'junko'),
                        'default'         => array(
                            'color'         => '#777777',
                            'font-weight'   => '400',
                            'font-family'   => 'Rubik',
                            'google'        => true,
                            'font-size'     => '14px',
                        ),
                    ),
                    array(
                        'id'              => 'headingfont',
                        'type'            => 'typography',
                        'title'           => esc_html__('Heading font', 'junko'),
                        'google'          => true,
                        'font-backup'     => false,
                        'subsets'         => false,
                        'font-size'       => false,
                        'line-height'     => false,
                        'text-align'      => false,
                        'all_styles'      => true,
                        'units'           => 'px',
                        'subtitle'        => esc_html__('Heading font.', 'junko'),
                        'default'         => array(
                            'color'         => '#242424',
                            'font-weight'   => '500',
                            'font-family'   => 'Rubik',
                            'google'        => true,
                        ),
                    ),
                    array(
                        'id'              => 'menufont',
                        'type'            => 'typography',
                        'title'           => esc_html__('Menu font', 'junko'),
                        'google'          => true,
                        'font-backup'     => false,
                        'subsets'         => false,
                        'font-size'       => true,
                        'line-height'     => false,
                        'text-align'      => false,
                        'all_styles'      => true, 
                        'units'           => 'px',
                        'subtitle'        => esc_html__('Menu font.', 'junko'),
                        'default'         => array(
                            'color'         => '#ffffff',
                            'font-weight'   => '500',
                            'font-family'   => 'Rubik',
                            'font-size'     => '14px',
                            'google'        => true,
                        ),
                    ),
                    array(
                        'id'              => 'submenufont',
                        'type'            => 'typography',
                        'title'           => esc_html__('Sub menu font', 'junko'),
                        'google'          => true,
                        'font-backup'     => false,
                        'subsets'         => false,
                        'font-size'       => true,
                        'line-height'     => false,
                        'text-align'      => false,
                        'all_styles'      => true,
                        'units'           => 'px',
                        'subtitle'        => esc_html__('sub menu font.', 'junko'),
                        'default'         => array(
                            'color'         => '#777777',
                            'font-weight'   => '400',
                            'font-family'   => 'Rubik',
                            'font-size'     => '14px',
                            'google'        => true,
                        ),
                    ),
                    array(
                        'id'              => 'dropdownfont',
                        'type'            => 'typography',
                        'title'           => esc_html__('Dropdown menu font', 'junko'),
                        'google'          => true,
                        'font-backup'     => false,
                        'subsets'         => false,
                        'font-size'       => true,
                        'line-height'     => false,
                        'text-align'      => false,
                        'all_styles'      => true,
                        'units'           => 'px',
                        'subtitle'        => esc_html__('Dropdown menu font.', 'junko'),
                        'default'         => array(
                            'color'         => '#777777',
                            'font-weight'   => '400',
                            'font-family'   => 'Rubik',
                            'font-size'     => '13px',
                            'google'        => true,
                        ),
                    ),
                    array(
                        'id'              => 'categoriesfont',
                        'type'            => 'typography',
                        'title'           => esc_html__('Category menu font', 'junko'),
                        'google'          => true,
                        'font-backup'     => false,
                        'subsets'         => false,
                        'font-size'       => true,
                        'line-height'     => false,
                        'text-align'      => false,
                        'all_styles'      => true,
                        'units'           => 'px',
                        'subtitle'        => esc_html__('Category menu font.', 'junko'),
                        'default'         => array(
                            'color'         => '#222222',
                            'font-weight'   => '400',
                            'font-family'   => 'Rubik',
                            'font-size'     => '14px',
                            'google'        => true,
                        ),
                    ),
                    array(
                        'id'              => 'categoriessubmenufont',
                        'type'            => 'typography',
                        'title'           => esc_html__('Category sub menu font', 'junko'),
                        'google'          => true,
                        'font-backup'     => false,
                        'subsets'         => false,
                        'font-size'       => true,
                        'line-height'     => false,
                        'text-align'      => false,
                        'all_styles'      => true,
                        'units'           => 'px',
                        'subtitle'        => esc_html__('Category sub menu font.', 'junko'),
                        'default'         => array(
                            'color'         => '#4c4c4c',
                            'font-weight'   => '400',
                            'font-family'   => 'Rubik',
                            'font-size'     => '14px',
                            'google'        => true,
                        ),
                    ),
                    array(
                        'id'              => 'pricefont',
                        'type'            => 'typography',
                        'title'           => esc_html__('Price font', 'junko'),
                        'google'          => true,
                        'font-backup'     => false,
                        'subsets'         => false,
                        'font-size'       => true,
                        'line-height'     => false,
                        'text-align'      => false,
                        'all_styles'      => true,
                        'units'           => 'px',
                        'subtitle'        => esc_html__('Price font.', 'junko'),
                        'default'         => array(
                            'color'         => '#0063d1',
                            'font-weight'   => '500',
                            'font-family'   => 'Rubik', 
                            'font-size'     => '16px', 
                            'google'        => true,
                        ),
                    ),
                ),
            );
            //Image slider
            $this->sections[] = array(
                'title'     => esc_html__('Image slider', 'junko'),
                'desc'      => esc_html__('Upload images and links', 'junko'),
                'icon'      => 'el-icon-website',
                'fields'    => array(
                    array(
                        'id'          => 'image_slider',
                        'type'        => 'slides',
                        'title'       => esc_html__('Images', 'junko'),
                        'desc'        => esc_html__('Upload images and enter links.', 'junko'),
                        'placeholder' => array(
                            'title'           => esc_html__('Title', 'junko'),
                            'description'     => esc_html__('Description', 'junko'),
                            'url'             => esc_html__('Link', 'junko'),
                        ),
                    ),
                ),
            );
            //Brand logos
            $this->sections[] = array(
                'title'     => esc_html__('Brand Logos', 'junko'),
                'desc'      => esc_html__('Upload brand logos and links', 'junko'),
                'icon'      => 'el-icon-briefcase',
                'fields'    => array(
                    array(
                        'id'          => 'brand_logos',
                        'type'        => 'slides',
                        'title'       => esc_html__('Logos', 'junko'),
                        'desc'        => esc_html__('Upload logo image and enter logo link.', 'junko'),
                        'placeholder' => array(
                            'title'           => esc_html__('Title', 'junko'),
                            'description'     => esc_html__('Description', 'junko'),
                            'url'             => esc_html__('Link', 'junko'),
                        ),
                    ),
                ),
            );
            //Inner brand logos
            $this->sections[] = array(
                'title'     => esc_html__('Inner Brand Logos', 'junko'),
                'subsection'=> true,
                'icon'      => 'el-icon-website',
                'fields'    => array(
                    array(
                        'id'        => 'inner_brand',
                        'type'      => 'switch',
                        'title'     => esc_html__('Brand carousel in inner pages', 'junko'),
                        'subtitle'  => esc_html__('Show brand carousel in inner pages', 'junko'),
                        'default'   => false,
                    ),
                    array(
                        'id'       => 'brandscroll',
                        'type'     => 'switch',
                        'title'    => esc_html__('Auto scroll', 'junko'),
                        'default'  => true,
                    ),
                    array(
                        'id'            => 'brandscrollnumber',
                        'type'          => 'slider',
                        'title'         => esc_html__('Scroll amount', 'junko'),
                        'desc'          => esc_html__('Number of logos to scroll one time, default value: 1', 'junko'),
                        "default"       => 1,
                        "min"           => 1,
                        "step"          => 1,
                        "max"           => 12,
                        'display_value' => 'text'
                    ),
                    array(
                        'id'            => 'brandpause',
                        'type'          => 'slider',
                        'title'         => esc_html__('Pause in (seconds)', 'junko'),
                        'desc'          => esc_html__('Pause time, default value: 3000', 'junko'),
                        "default"       => 3000,
                        "min"           => 1000,
                        "step"          => 500,
                        "max"           => 10000,
                        'display_value' => 'text'
                    ),
                    array(
                        'id'            => 'brandanimate',
                        'type'          => 'slider',
                        'title'         => esc_html__('Animate in (seconds)', 'junko'),
                        'desc'          => esc_html__('Animate time, default value: 2000', 'junko'),
                        "default"       => 2000,
                        "min"           => 300,
                        "step"          => 100,
                        "max"           => 5000,
                        'display_value' => 'text'
                    ),
                ),
            );
            // Sidebar
            $this->sections[] = array(
                'title'     => esc_html__('Sidebar', 'junko'),
                'desc'      => esc_html__('Sidebar options. Shop/Product sidebar and Blog sidebar are in Product and Blog sections', 'junko'),
                'icon'      => 'el-icon-cog',
                'fields'    => array(
                    array(
                        'id'       => 'sidebarse_pos',
                        'type'     => 'radio',
                        'title'    => esc_html__('Inner Pages Sidebar Position', 'junko'),
                        'subtitle' => esc_html__('Sidebar Position on pages (default pages). If there is no widget in this sidebar, the layout will be nosidebar', 'junko'),
                        'options'  => array(
                            'left' => esc_html__('Left', 'junko'),
                            'right'=> esc_html__('Right', 'junko'),
                        ),
                        'default'  => 'left'
                    ),
                    array(
                        'id'       =>'custom-sidebars',
                        'type'     => 'multi_text',
                        'title'    => esc_html__('Custom Sidebars', 'junko'),
                        'subtitle' => esc_html__('Add more sidebars', 'junko'),
                        'desc'     => esc_html__('Enter sidebar name (Only allow digits and letters). click Add more to add more sidebar. Edit your page to select a sidebar ', 'junko')
                    ),
                ),
            );
            // Product
            $this->sections[] = array(
                'title'     => esc_html__('Product', 'junko'),
                'desc'      => esc_html__('Use this section to select options for product', 'junko'),
                'icon'      => 'el-icon-tags',
                'fields'    => array(
                    array(
                        'id'        => 'shop_banner',
                        'type'      => 'media',
                        'title'     => esc_html__('Banner image in shop pages', 'junko'),
                        'compiler'  => 'true',
                        'mode'      => false,
                        'desc'      => esc_html__('Upload image here.', 'junko'),
                    ),
                    array(
                        'id'        => 'show_category_image',
                        'type'      => 'switch',
                        'title'     => esc_html__('Show individual category thumbnail', 'junko'),
                        'subtitle'  => esc_html__('Show individual category thumbnail in product shop/product category pages. ', 'junko'),
                        'desc'      => esc_html__('If yes, product shop/product category page will display the thumbnail as banner. If no, product shop/product category page will display the shop banner (image uploaded above)', 'junko'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'shop_layout',
                        'type'      => 'select',
                        'title'     => esc_html__('Shop Layout', 'junko'),
                        'subtitle'  => esc_html__('If there is no widget in this sidebar, the layout will be nosidebar', 'junko'),
                        'options'   => array(
                            'sidebar'   => esc_html__('Sidebar', 'junko'),
                            'fullwidth' => esc_html__('Full Width', 'junko'),
                        ),
                        'default'   => 'sidebar',
                    ),
                    array(
                        'id'       => 'sidebarshop_pos',
                        'type'     => 'radio',
                        'title'    => esc_html__('Shop Sidebar Position', 'junko'),
                        'subtitle' => esc_html__('Sidebar Position on shop page.', 'junko'),
                        'options'  => array(
                            'left' => esc_html__('Left', 'junko'),
                            'right'=> esc_html__('Right', 'junko'),
                        ),
                        'default'  => 'left'
                    ),
                    array(
                        'id'        => 'default_view',
                        'type'      => 'select',
                        'title'     => esc_html__('Shop default view', 'junko'),
                        'default'   => 'grid-view',
                        'options'   => array(
                            'grid-view' => esc_html__('Grid View', 'junko'),
                            'list-view' => esc_html__('List View', 'junko'),
                        ),
                    ),
                    array(
                        'id'          => 'product_bg',
                        'type'        => 'color',
                        'title'       => esc_html__('Product background color', 'junko'),
                        'subtitle'    => esc_html__('Upload image or select color', 'junko'),
                        'transparent' => false,
                        'default'     => '#ffffff',
                        'validate'    => 'color',
                    ),
                    array(
                        'id'       => 'second_image',
                        'type'     => 'switch',
                        'title'    => esc_html__('Use secondary product image', 'junko'),
                        'desc'     => esc_html__('Show the secondary image when hover on product.', 'junko'),
                        'default'  => true,
                    ),
                    array(
                        'id'            => 'product_per_page',
                        'type'          => 'slider',
                        'title'         => esc_html__('Products per page', 'junko'),
                        'subtitle'      => esc_html__('Amount of products per page in category page', 'junko'),
                        "default"       => 16,
                        "min"           => 4,
                        "step"          => 1,
                        "max"           => 20,
                        'display_value' => 'text',
                    ),
                    array(
                        'id'            => 'product_per_row',
                        'type'          => 'slider',
                        'title'         => esc_html__('Product columns', 'junko'),
                        'subtitle'      => esc_html__('Amount of product columns in category page', 'junko'),
                        'desc'          => esc_html__('Only works with: 1, 2, 3, 4, 6', 'junko'),
                        "default"       => 4,
                        "min"           => 1,
                        "step"          => 1,
                        "max"           => 6,
                        'display_value' => 'text',
                    ),
                    array(
                        'id'            => 'product_per_row_fw',
                        'type'          => 'slider',
                        'title'         => esc_html__('Product columns on full width shop', 'junko'),
                        'subtitle'      => esc_html__('Amount of product columns in full width category page', 'junko'),
                        'desc'          => esc_html__('Only works with: 1, 2, 3, 4, 6', 'junko'),
                        "default"       => 4,
                        "min"           => 1,
                        "step"          => 1,
                        "max"           => 6,
                        'display_value' => 'text',
                    ),
                ),
            );
            $this->sections[] = array(
                'icon'       => 'el-icon-website',
                'title'      => esc_html__( 'Product page', 'junko' ),
                'subsection' => true,
                'fields'     => array(
                    array(
                        'id'        => 'single_product_layout',
                        'type'      => 'select',
                        'title'     => esc_html__('Single Product Layout', 'junko'),
                        'subtitle'  => esc_html__('If there is no widget in this sidebar, the layout will be nosidebar', 'junko'),
                        'default'   => 'fullwidth',
                        'options'   => array(
                            'sidebar'   => esc_html__('Sidebar', 'junko'),
                            'fullwidth' => esc_html__('Full Width', 'junko'),
                        ),
                    ),
                    array(
                        'id'       => 'sidebarsingleproduct_pos',
                        'type'     => 'radio',
                        'title'    => esc_html__('Single Product Sidebar Position', 'junko'),
                        'subtitle' => esc_html__('Sidebar Position on single product page.', 'junko'),
                        'options'  => array(
                            'left' => esc_html__('Left', 'junko'),
                            'right'=> esc_html__('Right', 'junko'),
                        ),
                        'default'  => 'left'
                    ),
                    array(
                        'id'        => 'product_banner',
                        'type'      => 'media',
                        'title'     => esc_html__('Banner image for single product pages', 'junko'),
                        'compiler'  => 'true',
                        'mode'      => false,
                        'desc'      => esc_html__('Upload image here.', 'junko'),
                    ),
                    array(
                        'id'        => 'single_product_header_text',
                        'type'      => 'text',
                        'title'     => esc_html__('Single Product header text', 'junko'),
                        'default'   => esc_html__('Product Details', 'junko'),
                    ), 
                    array(
                        'id'        => 'related_product_title',
                        'type'      => 'text',
                        'title'     => esc_html__('Related product title', 'junko'),
                        'default'   => esc_html__('Related Products', 'junko'),
                    ),
                    array(
                        'id'        => 'upsell_product_title',
                        'type'      => 'text',
                        'title'     => esc_html__('Upsell product title', 'junko'),
                        'default'   => esc_html__('Upsell Products', 'junko'),
                    ),
                    array(
                        'id'        => 'cross_sell_product_title',
                        'type'      => 'text',
                        'title'     => esc_html__('Cross sell product title', 'junko'),
                        'default'   => esc_html__('You may be interested in ... ', 'junko'),
                    ),
                    array(
                        'id'            => 'related_amount',
                        'type'          => 'slider',
                        'title'         => esc_html__('Number of related products', 'junko'),
                        "default"       => 10,
                        "min"           => 1,
                        "step"          => 1,
                        "max"           => 16,
                        'display_value' => 'text',
                    ),
                    array(
                        'id'        => 'product_share_title',
                        'type'      => 'text',
                        'title'     => esc_html__('Product share title', 'junko'),
                        'default'   => esc_html__('Share this product', 'junko'),
                    ),
                )
            );
            $this->sections[] = array(
                'icon'       => 'el-icon-website',
                'title'      => esc_html__( 'Quick View', 'junko' ),
                'subsection' => true,
                'fields'     => array(
                    array(
                        'id'        => 'detail_link_text',
                        'type'      => 'text',
                        'title'     => esc_html__('View details text', 'junko'),
                        'default'   => esc_html__('Quick View', 'junko'),
                    ),
                    array(
                        'id'        => 'quickview_link_text',
                        'type'      => 'text',
                        'title'     => esc_html__('View all features text', 'junko'),
                        'desc'      => esc_html__('This is the text on quick view box', 'junko'),
                        'default'   => esc_html__('See all features', 'junko'),
                    ),
                    array(
                        'id'        => 'quickview',
                        'type'      => 'switch',
                        'title'     => esc_html__('Quick View', 'junko'),
                        'desc'      => esc_html__('Show quick view button on all pages', 'junko'),
                        'default'   => true,
                    ),
                )
            );
            // Blog options
            $this->sections[] = array(
                'title'     => esc_html__('Blog', 'junko'),
                'desc'      => esc_html__('Use this section to select options for blog', 'junko'),
                'icon'      => 'el-icon-file',
                'fields'    => array(
                    array(
                        'id'        => 'blog_header_text',
                        'type'      => 'text',
                        'title'     => esc_html__('Blog header text', 'junko'),
                        'default'   => esc_html__('Blog', 'junko'),
                    ), 
                    array(
                        'id'        => 'blog_layout',
                        'type'      => 'select',
                        'title'     => esc_html__('Blog Layout', 'junko'),
                        'subtitle'  => esc_html__('If there is no widget in this sidebar, the layout will be nosidebar', 'junko'),
                        'options'   => array(
                            'sidebar'       => esc_html__('Sidebar', 'junko'),
                            'nosidebar'     => esc_html__('No Sidebar', 'junko'),
                            'largeimage'    => esc_html__('Large Image', 'junko'),
                            'grid'          => esc_html__('Grid', 'junko'),
                        ),
                        'default'   => 'sidebar',
                    ),
                    array(
                        'id'       => 'sidebarblog_pos',
                        'type'     => 'radio',
                        'title'    => esc_html__('Blog Sidebar Position', 'junko'),
                        'subtitle' => esc_html__('Sidebar Position on Blog pages.', 'junko'),
                        'options'  => array(
                            'left' => esc_html__('Left', 'junko'),
                            'right'=> esc_html__('Right', 'junko'),
                        ),
                        'default'  => 'right',
                    ),
                    array(
                        'id'        => 'readmore_text',
                        'type'      => 'text',
                        'title'     => esc_html__('Read more text', 'junko'),
                        'default'   => esc_html__('Read more', 'junko'),
                    ),
                    array(
                        'id'        => 'blog_share_title',
                        'type'      => 'text',
                        'title'     => esc_html__('Blog share title', 'junko'),
                        'default'   => esc_html__('Share this post', 'junko'),
                    ),
                ),
            );
            // Testimonials options
            $this->sections[] = array(
                'title'     => esc_html__('Testimonials', 'junko'),
                'desc'      => esc_html__('Use this section to select options for Testimonials', 'junko'),
                'icon'      => 'el-icon-comment',
                'fields'    => array(
                    array(
                        'id'       => 'testiscroll',
                        'type'     => 'switch',
                        'title'    => esc_html__('Auto scroll', 'junko'),
                        'default'  => false,
                    ),
                    array(
                        'id'            => 'testipause',
                        'type'          => 'slider',
                        'title'         => esc_html__('Pause in (seconds)', 'junko'),
                        'desc'          => esc_html__('Pause time, default value: 3000', 'junko'),
                        "default"       => 3000,
                        "min"           => 1000,
                        "step"          => 500,
                        "max"           => 10000,
                        'display_value' => 'text'
                    ),
                    array(
                        'id'            => 'testianimate',
                        'type'          => 'slider',
                        'title'         => esc_html__('Animate in (seconds)', 'junko'),
                        'desc'          => esc_html__('Animate time, default value: 2000', 'junko'),
                        "default"       => 2000,
                        "min"           => 300,
                        "step"          => 100,
                        "max"           => 5000,
                        'display_value' => 'text'
                    ),
                ),
            );
            // Error 404 page
            $this->sections[] = array(
                'title'     => esc_html__('Error 404 Page', 'junko'),
                'desc'      => esc_html__('Error 404 page options', 'junko'),
                'icon'      => 'el-icon-cog',
                'fields'    => array(
                    array(
                        'id'        => 'background_error',
                        'type'      => 'background',
                        'output'    => array('body.error404'),
                        'title'     => esc_html__('Error 404 background', 'junko'),
                        'subtitle'  => esc_html__('Upload image or select color.', 'junko'),
                        'default'   => array('background-color' => '#ffffff'),
                    ),
                ),
            );
            // Less Compiler
            $this->sections[] = array(
                'title'     => esc_html__('Less Compiler', 'junko'),
                'desc'      => esc_html__('Turn on this option to apply all theme options. Turn of when you have finished changing theme options and your site is ready.', 'junko'),
                'icon'      => 'el-icon-wrench',
                'fields'    => array(
                    array(
                        'id'        => 'enable_less',
                        'type'      => 'switch',
                        'title'     => esc_html__('Enable Less Compiler', 'junko'),
                        'default'   => true,
                    ),
                ),
            );
            $theme_info  = '<div class="redux-framework-section-desc">';
            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . esc_html__('<strong>Theme URL:</strong> ', 'junko') . '<a href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . esc_html__('<strong>Author:</strong> ', 'junko') . $this->theme->get('Author') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . esc_html__('<strong>Version:</strong> ', 'junko') . $this->theme->get('Version') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';
            $tabs = $this->theme->get('Tags');
            if (!empty($tabs)) {
                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . esc_html__('<strong>Tags:</strong> ', 'junko') . implode(', ', $tabs) . '</p>';
            }
            $theme_info .= '</div>';
            $this->sections[] = array(
                'title'     => esc_html__('Import / Export', 'junko'),
                'desc'      => esc_html__('Import and Export your Redux Framework settings from file, text or URL.', 'junko'),
                'icon'      => 'el-icon-refresh',
                'fields'    => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'title'         => esc_html__('Import Export', 'junko'),
                        'subtitle'      => esc_html__('Save and restore your Redux options', 'junko'),
                        'full_width'    => false,
                    ),
                ),
            );
            $this->sections[] = array(
                'icon'      => 'el-icon-info-sign',
                'title'     => esc_html__('Theme Information', 'junko'),
                'fields'    => array(
                    array(
                        'id'        => 'opt-raw-info',
                        'type'      => 'raw',
                        'content'   => $item_info,
                    )
                ),
            );
        }
        public function setHelpTabs() {
            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => esc_html__('Theme Information 1', 'junko'),
                'content'   => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'junko')
            );
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => esc_html__('Theme Information 2', 'junko'),
                'content'   => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'junko')
            );
            // Set the help sidebar
            $this->args['help_sidebar'] = esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'junko');
        }
        /**
          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
         * */
        public function setArguments() {
            $theme = wp_get_theme();
            $this->args = array(
                'opt_name'          => 'junko_opt', 
                'display_name'      => $theme->get('Name'),
                'display_version'   => $theme->get('Version'),
                'menu_type'         => 'menu',
                'allow_sub_menu'    => true,
                'menu_title'        => esc_html__('Theme Options', 'junko'),
                'page_title'        => esc_html__('Theme Options', 'junko'),
                'google_api_key'    => '',
                'async_typography'  => true,
                'admin_bar'         => false,
                'global_variable'   => '',
                'dev_mode'          => false,
                'customizer'        => true,
                'page_priority'     => null,
                'page_parent'       => 'themes.php',
                'page_permissions'  => 'manage_options',
                'menu_icon'         => '',
                'last_tab'          => '',
                'page_icon'         => 'icon-themes',
                'page_slug'         => '_options',
                'save_defaults'     => true,
                'default_show'      => false,
                'default_mark'      => '',
                'show_import_export' => true,
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,
                'output_tag'        => true,
                'database'           => '',
                'system_info'        => false,
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );
            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
                'title' => esc_html__('Visit us on GitHub', 'junko'),
                'icon'  => 'el-icon-github'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => esc_html__('Like us on Facebook', 'junko'),
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://twitter.com/reduxframework',
                'title' => esc_html__('Follow us on Twitter', 'junko'),
                'icon'  => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://www.linkedin.com/company/redux-framework',
                'title' => esc_html__('Find us on LinkedIn', 'junko'),
                'icon'  => 'el-icon-linkedin'
            );
            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace('-', '_', $this->args['opt_name']);
                }
              } else {
            }
        }
    }
    global $reduxConfig;
    $reduxConfig = new junko_Theme_Config();
}
/**
  Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')):
    function redux_my_custom_field($field, $value) {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
endif;
/**
  Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')):
    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = esc_html__('just testing', 'junko');
        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }
endif;