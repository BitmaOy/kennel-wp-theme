<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', '_s' ),
				'social' => esc_html__( 'Social', '_s' ),
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
				'_s_custom_background_args',
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
endif;
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( '_s-style', 'rtl', 'replace' );

	wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Registering ACF fields
 */
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_6045fa819893a',
		'title' => 'Koira',
		'fields' => array(
			array(
				'key' => 'field_6045ffe01531f',
				'label' => 'Kutsumanimi',
				'name' => 'koira_kutsumanimi',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => 'dog-name',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_604a4e57c9a71',
				'label' => 'Linkki KoiraNettiin',
				'name' => 'koira_linkki_koiranet',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
			array(
				'key' => 'field_6045fac0a7ae5',
				'label' => 'Rekisterinumero',
				'name' => 'koira_rekisterinumero',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => 'reg-number',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6045fb6ca7ae7',
				'label' => 'Tittelit',
				'name' => 'koira_tittelit',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => 'titles',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6045fb3da7ae6',
				'label' => 'Kennel nimi',
				'name' => 'koira_kennelnimi',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => 'kennel-name',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6045fbb4a7ae8',
				'label' => 'Kuva',
				'name' => 'koira_kuva',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => 'dog-profile-pic',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_6045fc9da7ae9',
				'label' => 'Terveystulokset',
				'name' => 'koira_terveystulokset',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => 'health-info',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_6045fe4ca7aea',
				'label' => 'Kuvaus',
				'name' => 'koira_kuvaus',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => 'dog-description',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_6046033ac057c',
				'label' => 'Kategoria',
				'name' => 'koira_kategoria',
				'type' => 'checkbox',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'Oma' => 'Oma',
					'Sijoitusnarttu' => 'Sijoitusnarttu',
					'Sijoitusuros' => 'Sijoitusuros',
					'Muu' => 'Muu',
				),
				'allow_custom' => 0,
				'default_value' => array(
				),
				'layout' => 'vertical',
				'toggle' => 0,
				'return_format' => 'value',
				'save_custom' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'dogs',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array(
			0 => 'permalink',
			1 => 'the_content',
			2 => 'excerpt',
			3 => 'discussion',
			4 => 'comments',
			5 => 'revisions',
			6 => 'slug',
			7 => 'author',
			8 => 'format',
			9 => 'page_attributes',
			10 => 'featured_image',
			11 => 'categories',
			12 => 'tags',
			13 => 'send-trackbacks',
		),
		'active' => true,
		'description' => '',
	));
	
	acf_add_local_field_group(array(
		'key' => 'group_60460573db8e7',
		'title' => 'Yhdistelmä',
		'fields' => array(
			array(
				'key' => 'field_604607d365d43',
				'label' => 'Otsikko',
				'name' => 'yhdistelma_otsikko',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6046057ce804b',
				'label' => 'Uros',
				'name' => 'yhdistelma_uros',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => 'dogs',
				),
				'taxonomy' => '',
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'object',
				'ui' => 1,
			),
			array(
				'key' => 'field_60460675e804c',
				'label' => 'Narttu',
				'name' => 'yhdistelma_narttu',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => 'dogs',
				),
				'taxonomy' => '',
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'object',
				'ui' => 1,
			),
			array(
				'key' => 'field_6046073e65d41',
				'label' => 'Kuvaus',
				'name' => 'yhdistelma_kuvaus',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_6046077465d42',
				'label' => 'Yhteiskuva',
				'name' => 'yhdistelma_yhteiskuva',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_60460697e804d',
				'label' => 'Pennut',
				'name' => 'yhdistelma_pennut',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => 'dogs',
				),
				'taxonomy' => '',
				'allow_null' => 0,
				'multiple' => 1,
				'return_format' => 'object',
				'ui' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'combinations',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array(
			0 => 'permalink',
			1 => 'the_content',
			2 => 'excerpt',
			3 => 'discussion',
			4 => 'comments',
			5 => 'revisions',
			6 => 'slug',
			7 => 'author',
			8 => 'format',
			9 => 'page_attributes',
			10 => 'featured_image',
			11 => 'categories',
			12 => 'tags',
			13 => 'send-trackbacks',
		),
		'active' => true,
		'description' => '',
	));
	
	endif;

add_filter('acf/fields/post_object/result', 'my_acf_fields_post_object_result', 10, 4);
function my_acf_fields_post_object_result( $text, $post, $field, $post_id ) {
	if ($post->post_type == "dogs"):
		$text = $post->koira_kennelnimi;
	endif;	
	return $text;
}

/**
 * Create post type for dogs
 */
function create_dog_posttype() {
	$labels = array(
		'name' => __('Koirat'),
		'singular_name' => __('Koira'),
		'add_new_item' => __('Lisää uusi koira'),
        'add_new' => __('Lisää uusi'),
        'edit_item' => __('Muokkaa koiraa'),
        'update_item' => __('Päivitä koira'),
        'search_items' => __('Etsi koiria'),
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'supports' => array( 'custom-fields' )
	);

	register_post_type('dogs', $args);
}

function my_page_columns($columns)
{
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'kennelnimi' => 'Kennelnimi',
		'kuva' => 'Kuva'

    );
    return $columns;
}

function my_custom_columns($column)
{
    global $post;
    
    if ($column == 'kennelnimi') {
        echo get_field( "koira_kennelnimi", $post->ID );
    }
    else {
         echo '';
    }
	if ($column == 'kuva') {
		$image = get_field( "koira_kuva", $post->ID );
		$image_url = esc_url($image['url']);
		echo '<img src="' . $image_url . '" width="100" />';
    }
    else {
         echo '';
    }
}

add_action("manage_dogs_posts_custom_column", "my_custom_columns");
add_filter("manage_dogs_posts_columns", "my_page_columns");

/**
 * Hooking up our function to theme setup
 */
add_action( 'init', 'create_dog_posttype' );

/**
 * Create post type for combinations
 */
function create_combination_posttype() {
	$labels = array(
		'name' => __('Yhdistelmät'),
		'singular_name' => __('Yhdistelmä'),
		'add_new_item' => __('Lisää uusi yhdistelmä'),
        'add_new' => __('Lisää uusi'),
        'edit_item' => __('Muokkaa yhdistelmää'),
        'update_item' => __('Päivitä yhdistelmä'),
        'search_items' => __('Etsi yhdistelmiä'),
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'supports' => array( 'custom-fields' )
	);

	register_post_type('combinations', $args);
}

/**
 * Hooking up our function to theme setup
 */
add_action( 'init', 'create_combination_posttype' );


function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

function addHomeMenuLink($menuItems, $args)
{
	if('menu-1' == $args->theme_location)
    {
		$homeMenuItem = '<li class="menu-item-logo">' . get_custom_logo() . '</li>';
    	$menuItems = $homeMenuItem . $menuItems;
	}
    return $menuItems;
}
add_filter( 'wp_nav_menu_items', 'addHomeMenuLink', 10, 2 );

function add_theme_scripts() {
	wp_enqueue_script( 'js-file', get_template_directory_uri() . '/js/script.js');
  }
  add_action('wp_enqueue_scripts','add_theme_scripts');

function get_dog($atts) {
	$a = shortcode_atts(
        array (
            'kennelnimi'   => false,
        ), $atts );

    $kennelnimi   = $a [ 'kennelnimi' ];

	$posts = get_posts(array(
		'numberposts'	=> 1,
		'post_type'		=> 'dogs',
		'meta_key'		=> 'koira_kennelnimi',
		'meta_value'	=> $kennelnimi
	));

	if ($posts) {
		global $post;
		$post = $posts[0];	
		setup_postdata($post);
		ob_start();
		get_template_part('template-parts/content', 'dogs');
		$output =  ob_get_clean();
		wp_reset_postdata();
		return $output;
	}
}
add_shortcode('koira', 'get_dog');

function get_combination($atts) {
	$a = shortcode_atts(
        array (
            'otsikko'   => false,
        ), $atts );

    $otsikko   = $a [ 'otsikko' ];

	$posts = get_posts(array(
		'numberposts'	=> 1,
		'post_type'		=> 'combinations',
		'meta_key'		=> 'yhdistelma_otsikko',
		'meta_value'	=> $otsikko
	));

	if ($posts) {
		global $post;
		$post = $posts[0];	
		setup_postdata($post);
		ob_start();
		get_template_part('template-parts/content', 'combinations');
		$output =  ob_get_clean();
		wp_reset_postdata();
		return $output;
	}
}
add_shortcode('yhdistelmä', 'get_combination');