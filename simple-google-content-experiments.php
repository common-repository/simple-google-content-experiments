<?php
/*
Plugin Name: Simple Google Content Experiments
Description: This plugin adds a metabox to all post types so that you can easily place Google Content Experiments code on a page by page basis.
Plugin URI: https://wordpress.org/plugins/simple-google-content-experiments/
Author: Team Forleo
Author URI: http://www.marieforleo.com
Version: 1.1
License: GPL2
Text Domain: pj-sgce
Domain Path: /lang

    Copyright (C) Feb 21, 2016  Pixel Jar  info@pixeljar.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define( 'PJ_SGCE_VERSION', '1.1' );
define( 'PJ_SGCE_ASSETS', plugin_dir_url( __FILE__ ) . 'assets/' );

class PJ_SGCE {

	public static $meta_key = 'google_content_experiment_code';

	/**
	 * Hook into WordPress to register the meta field and output the content experiment code
	 */
	public static function hooks() {

		add_action( 'init', array( __CLASS__, 'register_meta_field' ), 100 );
		add_action( 'wp_head', array( __CLASS__, 'inject_content_experiment' ), 0 );

	}

	/**
	 * Registers the meta field for all post types
	 */
	public static function register_meta_field() {

		$post_types = get_post_types();
		foreach ( $post_types as $slug => $name ) {

			register_meta( $slug, self::$meta_key, array( __CLASS__, 'sanitize_meta' ) );

		}
	}

	/**
	 * Sanitizes the input from the meta field
	 * @param  string $dirty the raw value from the custom field submission
	 * @return string        the sanitized value to be stored in the database
	 */
	public static function sanitize_meta( $dirty = '' ) {

		return $dirty;

	}

	/**
	 * Injects the google content experiment code into the wp_head as early as possible.
	 */
	public static function inject_content_experiment() {

		global $post;

		if ( $sgce_code = get_post_meta( get_queried_object_id(), self::$meta_key, true ) ) {

			echo $sgce_code;

		}

	}
}

// Kicks off the plugin functionality
PJ_SGCE::hooks();

if ( ! class_exists( 'PJ_SGCE_Changelog' ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'lib/changelog.php';
}
