<?php
   require_once get_theme_file_path( 'inc/tgm.php' );
   require_once get_theme_file_path( 'inc/customizer/customizer-main.php' );
   /**
    * simpleshop functions and definitions
    *
    * @link https://developer.wordpress.org/themes/basics/theme-functions/
    *
    * @package simpleshop
    */

   if ( ! function_exists( 'simpleshop_setup' ) ):
      /**
       * Sets up theme defaults and registers support for various WordPress features.
       *
       * Note that this function is hooked into the after_setup_theme hook, which
       * runs before the init hook. The init hook is too late for some features, such
       * as indicating support for post thumbnails.
       */
      function simpleshop_setup() {
         /*
          * Make theme available for translation.
          * Translations can be filed in the /languages/ directory.
          * If you're building a theme based on simpleshop, use a find and replace
          * to change 'simpleshop' to the name of your theme in all the template files.
          */
         load_theme_textdomain( 'simpleshop', get_template_directory() . '/languages' );

         // Add default posts and comments RSS feed links to head.
         add_theme_support( 'automatic-feed-links' );

         /*
          * Let WordPress manage the document title.
          * By adding theme support, we declare that this theme does not use a
          * hard-coded <title> tag in the document head, and expect WordPress to
          * provide it for us.
          */
         add_theme_support( 'title-tag' );

         /*
          * Enable support for Post Thumbnails on posts and pages.
          *
          * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
          */
         add_theme_support( 'post-thumbnails' );


         // This theme uses wp_nav_menu() in one location.
         register_nav_menus(
            array(
               'primary_menu' => esc_html__( 'Primary', 'simpleshop' ),
            )
         );
         register_nav_menus(
            array(
               'woocommerce_menu' => esc_html__( 'Woocommerce Menu', 'simpleshop' ),
            )
         );

         /*
          * Switch default core markup for search form, comment form, and comments
          * to output valid HTML5.
          */
         add_theme_support(
            'html5',
            array(
               'search-form',
               'comment-form',
               'comment-list',
               'gallery',
               'caption',
               'style',
               'script',
            )
         );

         // Set up the WordPress core custom background feature.
         add_theme_support(
            'custom-background',
            apply_filters(
               'simpleshop_custom_background_args',
               array(
                  'default-color' => 'ffffff',
                  'default-image' => '',
               )
            )
         );

         // Add theme support for selective refresh for widgets.
         add_theme_support( 'customize-selective-refresh-widgets' );

         /**
          * Add support for core custom logo.
          *
          * @link https://codex.wordpress.org/Theme_Logo
          */
         add_theme_support(
            'custom-logo',
            array(
               'height'      => 250,
               'width'       => 250,
               'flex-width'  => true,
               'flex-height' => true,
            )
         );
      }

      add_theme_support( 'wc-product-gallery-zoom' );
      add_theme_support( 'wc-product-gallery-lightbox' );
      add_theme_support( 'wc-product-gallery-slider' );
      add_theme_support( 'post-formats', array( 'image', 'audio', 'video', 'quote', 'gallery' ) );
      add_theme_support('woocommerce');
   endif;
   add_action( 'after_setup_theme', 'simpleshop_setup' );

   /**
    * Set the content width in pixels, based on the theme's design and stylesheet.
    *
    * Priority 0 to make it available to lower priority callbacks.
    *
    * @global int $content_width
    */
   function simpleshop_content_width() {
      $GLOBALS['content_width'] = apply_filters( 'simpleshop_content_width', 640 );
   }
   add_action( 'after_setup_theme', 'simpleshop_content_width', 0 );

   function simpleshop_add_editor_style() {
      add_editor_style( 'custom-editor-style.css' );
   }
   add_action( 'admin_init', 'simpleshop_add_editor_style' );
   /**
    * Register widget area.
    *
    * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
    */
   function simpleshop_widgets_init() {
      register_sidebar(
         array(
            'name'          => esc_html__( 'Sidebar', 'simpleshop' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'simpleshop' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
         )
      );
      register_sidebar(
         array(
            'name'          => esc_html__( 'Shop Sidebar', 'simpleshop' ),
            'id'            => 'shop-sidebar',
            'description'   => esc_html__( 'Add shop widgets.', 'simpleshop' ),
            'before_widget' => '<section id="%1$s" class="widget woocommerce %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
         )
      );
   }
   add_action( 'widgets_init', 'simpleshop_widgets_init' );

   /**
    * Enqueue scripts and styles.
    */
   function simpleshop_scripts() {
      wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900' );
      wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( 'assets/vendor/bootstrap/css/bootstrap.min.css' ) );
      wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( 'assets/vendor/font-awesome/css/font-awesome.min.css' ) );
      wp_enqueue_style( 'bicon-css', get_theme_file_uri( 'assets/vendor/bicon/css/bicon.css' ) );
      wp_enqueue_style( 'main-css', get_theme_file_uri( 'assets/css/main.css' ) );
      wp_enqueue_style( 'simpleshop-css', get_stylesheet_uri() );

      wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( 'assets/vendor/bootstrap/js/bootstrap.min.js' ), array( 'jquery' ), '1.0', true );
      wp_enqueue_script( 'popper-js', get_theme_file_uri( 'assets/vendor/popper.min.js' ), array( 'jquery' ), '1.0', true );
      wp_enqueue_script( 'scripts-js', get_theme_file_uri( 'assets/js/scripts.js' ), array( 'jquery' ), time(), true );

      if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
         wp_enqueue_script( 'comment-reply' );
      }
   }
   add_action( 'wp_enqueue_scripts', 'simpleshop_scripts' );
   function simpleshop_subcategory_count_html( $text ) {
      if ( get_theme_mod( 'simpleshop_category_count_display' ) != 1 ) {
         return __return_empty_string();
      }
      return $text;
   }
   add_filter( 'woocommerce_subcategory_count_html', 'simpleshop_subcategory_count_html' );

   remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
   remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
   remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
   remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
   remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

   add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart' );

   function simpleshop_product_add_to_cart_text( $text ) {
      return '<i class="fa fa-shopping-basket"></i>';
   }
   add_filter( 'woocommerce_product_add_to_cart_text', 'simpleshop_product_add_to_cart_text' );

   function simpleshop_before_shop_loop_item() {
      echo '<div class="product-wrap">';
   }
   add_action( 'woocommerce_before_shop_loop_item', 'simpleshop_before_shop_loop_item' );

   function simpleshop_shop_loop_item_title() {
      echo '</div><div class="woocommerce-product-title-wrap">';
   }
   add_action( 'woocommerce_shop_loop_item_title', 'simpleshop_shop_loop_item_title' );
   add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

   function simpleshop_after_shop_loop_item_title() {
      echo '<a href="#" class="wish-list"><i class="fa fa-heart-o"></i></a></div>';
   }
   add_action( 'woocommerce_after_shop_loop_item_title', 'simpleshop_after_shop_loop_item_title' );

   add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
   add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

   add_action( 'woocommerce_before_shop_loop', function () {
    ?>
<div class="section-title">
    <h2 class="title d-block text-left-sm"><?php woocommerce_page_title();?></h2>
 <?php
   }, 19 );

   add_action( 'woocommerce_before_shop_loop', function () {
   ?>
   </div>
   <?php
   }, 31 );



