<?php
/**
 * Plugin Name: fliper-plugin-enhancement
 * Plugin URI: http://company.flipermag.com
 * Description: Wordpress plugin for FLiPER used, it customize other Wordpress plugins to make things easier.
 * Version: 0.1.1
 * Author: Rasiel
 * Author URI: http://company.flipermag.com
 */


class FliperPluginEnhancement {

	function FliperPluginEnhancement() {
		add_action( 'admin_init', array( $this, 'init' ) );
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

$fliper_plugin_enhancement = & new FliperPluginEnhancement();


?>