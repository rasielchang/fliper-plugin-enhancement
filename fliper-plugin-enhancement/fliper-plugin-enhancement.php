<?php
/**
 * Plugin Name: fliper-plugin-enhancement
 * Plugin URI: http://company.flipermag.com
 * Description: Wordpress plugin for FLiPER used, it customize other Wordpress plugins to make things easier.
 * Version: 0.9.0
 * Author: Rasiel
 * Author URI: http://company.flipermag.com
 */


class FliperPluginEnhancement {

	/**
     * A Unique Identifier
     */
    protected $plugin_slug;

    /**
     * The array of templates that this plugin tracks.
     */
    protected $templates;

    /**
     * A reference to an instance of this class.
     */
    private static $instance;

    /**
     * Returns an instance of this class.
     */
	public static function get_instance() {

        if ( null == self::$instance ) {
            self::$instance = new FliperPluginEnhancement();
        }
 
        return self::$instance;

    }

    /**
     * Initializes the plugin by setting filters and administration functions.
     */
    private function __construct() {

        $this->templates = array();
 
        // Add a filter to the attributes metabox to inject template into the cache.
        add_filter( 'page_attributes_dropdown_pages_args', array( $this, 'register_fliper_templates' ) );
 
        // Add a filter to the save post to inject out template into the page cache
        add_filter( 'wp_insert_post_data', array( $this, 'register_fliper_templates' ) );
 
        // Add a filter to the template include to determine if the page has our template assigned and return it's path
        add_filter( 'template_include', array( $this, 'view_fliper_template') );

        // Add fliper templates data.
		$this->templates = array(
            'template-login.php' => 'FLiPER Login Template',
            'template-registration.php' => 'FLiPER Registration Template'
        );

        add_action( 'admin_init', array( $this, 'init' ) );

    }

    /**
     * Adds our template to the pages cache in order to trick WordPress into thinking the template file exists where it doens't really exist.
     */
    public function register_fliper_templates( $atts ) {

        // Create the key used for the themes cache
        $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

        // Retrieve the cache list.
        // If it doesn't exist, or it's empty prepare an array
        $templates = wp_get_theme()->get_page_templates();
        if ( empty( $templates ) ) {
            $templates = array();
        }
 
        // New cache, therefore remove the old one
        wp_cache_delete( $cache_key , 'themes');

        // Now add our template to the list of templates by merging our templates with the existing templates array from the cache.
        $templates = array_merge( $templates, $this->templates );

        // Add the modified cache to allow WordPress to pick it up for listing available templates
        wp_cache_add( $cache_key, $templates, 'themes', 1800 );
 
		return $atts;

    }

	/**
      * Checks if the template is assigned to the page
      */
    public function view_fliper_template( $template ) {

        global $post;

        if ( ! isset( $this->templates[ get_post_meta( $post->ID, '_wp_page_template', true ) ] ) ) {
            return $template;
		}

        $file = plugin_dir_path( __FILE__ ) . get_post_meta( $post->ID, '_wp_page_template', true );

        // Just to be safe, we check if the file exist first
        if( file_exists( $file ) ) {
            return $file;
        } else {
        	echo $file; 
        }

        return $template;

    }

	function init() {
		if ( is_plugin_active( 'seo-ultimate/seo-ultimate.php' ) ) {
  			$this->seo_ultimate();
		} 
	}

	function seo_ultimate() {
		add_action( 'save_post', array( $this, 'seo_ultimate_auto_fill' ) );	
	}
	
	/**
 	 * Set SEO meta when creating or updating POST.
 	 */
	function seo_ultimate_auto_fill( $post_id ) {

		// Check post type, if it's not post then return
		if ( 'post' != get_post_type( $post_id ) )
			return false;

		// Get post data
		$post_title = get_post_field( 'post_title', $post_id, 'raw' ) . ' | ' . get_bloginfo();
		$post_content = get_post_field('post_content', $post_id );
		$post_content = strip_shortcodes( $post_content );
		$post_excerpt = html_entity_decode( wp_trim_words( $post_content, 140, '...' ) );

		if ( '' == get_post_meta( $post_id, '_su_title', true ) ) {
			add_post_meta( $post_id, '_su_title', $post_title, true );
		} else {
			update_post_meta( $post_id, '_su_title', $post_title );
		}

		if ( '' == get_post_meta( $post_id, '_su_og_title' ) ) {
			add_post_meta( $post_id, '_su_og_title', $post_title, true );
		} else {
			update_post_meta( $post_id, '_su_og_title', $post_title );
		}

		if ( '' == get_post_meta( $post_id, '_su_description' ) ) {
			add_post_meta( $post_id, '_su_description', $post_excerpt, true );	
		} else {
			update_post_meta( $post_id, '_su_description', $post_excerpt );
		}

		if ( '' == get_post_meta( $post_id, '_su_og_description' ) ) {
			add_post_meta( $post_id, '_su_og_description', $post_excerpt, true );	
		} else {
			update_post_meta( $post_id, '_su_og_description', $post_excerpt );	
		}

    	return true;

	}

}

add_action( 'plugins_loaded', array( 'FliperPluginEnhancement', 'get_instance' ) );


function switch_to_fliper_theme( $false ) {

	// Hack is_user_logged_in function cause it's a pluggable function, which would be load after this function exec.
	$user = wp_get_current_user();
	if ( ! $user->exists() ) {
		return $false;
	}

    // If viewing admin pages, don't do anything
    if ( is_admin() ) {
    	return $false;
    }

    $flipermag = wp_get_theme( 'flipermag' );
	if ( $flipermag->exists() )
		return 'flipermag';

    return $false;

}
add_filter( 'pre_option_stylesheet', 'switch_to_fliper_theme' );
add_filter( 'pre_option_template', 'switch_to_fliper_theme' );


?>