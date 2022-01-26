<?php
define( 'SIMPLESHOP_CUSTOMIZER_CONFIG_ID', 'simpleshop_customizer_config_id' );
define( 'SIMPLESHOP_CUSTOMIZER_PANEL_ID', 'simpleshop_customizer_config_id' );

if ( class_exists( 'Kirki' ) ) {
   Kirki::add_config( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, array(
      'capability'  => 'edit_theme_options',
      'option_type' => 'theme_mod',
   ) );
   Kirki::add_panel( SIMPLESHOP_CUSTOMIZER_PANEL_ID, array(
      'priority' => 210,
      'title'    => esc_html__( 'Simple Shop Theme Setting', 'simpleshop' ),

   ) );
   Kirki::add_section( 'simpleshop_customizer_section_id', array(
      'title'           => esc_html__( 'Home Page Setting', 'simpleshop' ),
      'description'     => esc_html__( 'Home page setting.', 'simpleshop' ),
      'panel'           => SIMPLESHOP_CUSTOMIZER_PANEL_ID,
      'priority'        => 160,
      'active_callback' => function () {
         return is_page_template( 'page-templates/homepage.php' );
      },
   ) );

   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'     => 'switch',
      'settings' => 'simpleshop_category_display',
      'label'    => esc_html__( 'Category Section Display', 'simpleshop' ),
      'section'  => 'simpleshop_customizer_section_id',
      'default'  => 'on',
      'priority' => 10,
      'choices'  => [
         'on'  => esc_html__( 'Display', 'simpleshop' ),
         'off' => esc_html__( 'Hide', 'simpleshop' ),
      ],
   ] );
   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'            => 'text',
      'settings'        => 'simpleshop_category_title',
      'label'           => esc_html__( 'Category Section Title', 'simpleshop' ),
      'section'         => 'simpleshop_customizer_section_id',
      'default'         => esc_html__( 'Shop By Category', 'simpleshop' ),
      'priority'        => 10,
      'active_callback' => [
         [
            'setting'  => 'simpleshop_category_display',
            'operator' => '==',
            'value'    => true,
         ],
      ],
   ] );
   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'            => 'text',
      'settings'        => 'simpleshop_category_col',
      'label'           => esc_html__( 'Category Section Column', 'simpleshop' ),
      'section'         => 'simpleshop_customizer_section_id',
      'default'         => 3,
      'priority'        => 10,
      'active_callback' => [
         [
            'setting'  => 'simpleshop_category_display',
            'operator' => '==',
            'value'    => true,
         ],
      ],
   ] );
   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'     => 'switch',
      'settings' => 'simpleshop_category_count_display',
      'label'    => esc_html__( 'Category Beside Count Section Display', 'simpleshop' ),
      'section'  => 'simpleshop_customizer_section_id',
      'default'  => 1,
      'priority' => 10,
      'choices'  => [
         'on'  => esc_html__( 'Display', 'simpleshop' ),
         'off' => esc_html__( 'Hide', 'simpleshop' ),
      ],
   ] );

   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'     => 'switch',
      'settings' => 'simpleshop_products_display',
      'label'    => esc_html__( 'Products Section Display', 'simpleshop' ),
      'section'  => 'simpleshop_customizer_section_id',
      'default'  => 'on',
      'priority' => 10,
      'choices'  => [
         'on'  => esc_html__( 'Display', 'simpleshop' ),
         'off' => esc_html__( 'Hide', 'simpleshop' ),
      ],
   ] );
   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'            => 'text',
      'settings'        => 'simpleshop_products_title',
      'label'           => esc_html__( 'Products Section Title', 'simpleshop' ),
      'section'         => 'simpleshop_customizer_section_id',
      'default'         => esc_html__( 'New Arrival', 'simpleshop' ),
      'priority'        => 10,
      'active_callback' => [
         [
            'setting'  => 'simpleshop_products_display',
            'operator' => '==',
            'value'    => true,
         ],
      ],
   ] );
   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'            => 'text',
      'settings'        => 'simpleshop_products_sub_title',
      'label'           => esc_html__( 'Products Section Sub-Title', 'simpleshop' ),
      'section'         => 'simpleshop_customizer_section_id',
      'default'         => esc_html__( '37 New fashion products arrived recently in our showroom for this winter', 'simpleshop' ),
      'priority'        => 10,
      'active_callback' => [
         [
            'setting'  => 'simpleshop_products_display',
            'operator' => '==',
            'value'    => true,
         ],
      ],
   ] );

   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'     => 'switch',
      'settings' => 'simpleshop_promo_display',
      'label'    => esc_html__( 'Promo Section Display', 'simpleshop' ),
      'section'  => 'simpleshop_customizer_section_id',
      'default'  => 'on',
      'priority' => 10,
      'choices'  => [
         'on'  => esc_html__( 'Display', 'simpleshop' ),
         'off' => esc_html__( 'Hide', 'simpleshop' ),
      ],
   ] );

   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'     => 'switch',
      'settings' => 'simpleshop_popular_products_display',
      'label'    => esc_html__( 'Popular Products Section Display', 'simpleshop' ),
      'section'  => 'simpleshop_customizer_section_id',
      'default'  => 'on',
      'priority' => 10,
      'choices'  => [
         'on'  => esc_html__( 'Display', 'simpleshop' ),
         'off' => esc_html__( 'Hide', 'simpleshop' ),
      ],
   ] );
   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'            => 'text',
      'settings'        => 'simpleshop_popular_products_title',
      'label'           => esc_html__( 'Popular Products Section Title', 'simpleshop' ),
      'section'         => 'simpleshop_customizer_section_id',
      'default'         => esc_html__( 'Pulular Products', 'simpleshop' ),
      'priority'        => 10,
      'active_callback' => [
         [
            'setting'  => 'simpleshop_products_display',
            'operator' => '==',
            'value'    => true,
         ],
      ],
   ] );

   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'     => 'switch',
      'settings' => 'simpleshop_offer_display',
      'label'    => esc_html__( 'Offer Section Display', 'simpleshop' ),
      'section'  => 'simpleshop_customizer_section_id',
      'default'  => 'on',
      'priority' => 10,
      'choices'  => [
         'on'  => esc_html__( 'Display', 'simpleshop' ),
         'off' => esc_html__( 'Hide', 'simpleshop' ),
      ],
   ] );

   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'     => 'switch',
      'settings' => 'simpleshop_flickr_display',
      'label'    => esc_html__( 'Flickr Section Display', 'simpleshop' ),
      'section'  => 'simpleshop_customizer_section_id',
      'default'  => 'on',
      'priority' => 10,
      'choices'  => [
         'on'  => esc_html__( 'Display', 'simpleshop' ),
         'off' => esc_html__( 'Hide', 'simpleshop' ),
      ],
   ] );
   Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
      'type'            => 'text',
      'settings'        => 'simpleshop_flickr_title',
      'label'           => esc_html__( 'Flickr Section Title', 'simpleshop' ),
      'section'         => 'simpleshop_customizer_section_id',
      'default'         => esc_html__( 'Simple Shop on Flickr', 'simpleshop' ),
      'priority'        => 10,
      'active_callback' => [
         [
            'setting'  => 'simpleshop_products_display',
            'operator' => '==',
            'value'    => true,
         ],
      ],
   ] );

}