<?php

class PJ_SGCE_Changelog {

	function __construct() {}

	/**
	 * The transient name
	 */
	static $transient_name = '_pj_sgce_activation';

	/**
	 * The admin page slug
	 */
	static $page_slug = 'pj-sgce-changelog';

	/**
	 * The hooks for this class
	 */
	public static function hooks() {

		register_activation_hook( plugin_dir_path( dirname( __FILE__ ) ) . 'simple-google-content-experiments.php', array( __CLASS__, 'welcome_transient' ) );
		add_action( 'admin_init', array( __CLASS__, 'welcome_redirect' ) );
		add_action( 'admin_menu', array( __CLASS__, 'admin_page' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_style' ), 10, 1 );
		add_filter( 'plugin_action_links_simple-google-content-experiments/simple-google-content-experiments.php', array( __CLASS__, 'plugin_link' ), 10, 1 );

	}

	/**
	 * Set a transient when this plugin is activated
	 */
	public static function welcome_transient() {

		set_transient( self::$transient_name, true, 30 );

	}

	/**
	 * Redirect to changelog when plugin is activated
	 */
	public static function welcome_redirect() {

		// If no transient set, return
		if ( ! get_transient( self::$transient_name ) ) {
			return;
		}

		// Delete the transient to prevent multiple redirects
		delete_transient( self::$transient_name );

		// Do not redirect on network activate or bulk activate
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
			return;
		}

		// Redirect to the changelog
		wp_safe_redirect(
			add_query_arg( 'page', self::$page_slug, admin_url() )
		);

	}

	/**
	 * Adds admin page
	 */
	public static function admin_page() {

		add_submenu_page(
			null,
			__( 'Simple Google Content Experiments Changelog', 'pj-sgce' ),
			__( 'Simple Google Content Experiments Changelog', 'pj-sgce' ),
			'manage_options',
			self::$page_slug,
			array( __CLASS__, 'render_admin_page' )
		);

	}

	/**
	 * Renders admin page
	 */
	public static function render_admin_page() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'views/changelog.php';

	}

	/**
	 * Enqueue style to changelog page
	 */
	public static function enqueue_style( $hook ) {

		if ( 'dashboard_page_pj-sgce-changelog' !== $hook ) {
			return;
		}

		wp_enqueue_style(
			'simple-google-content-experiments-changelog',
			PJ_SGCE_ASSETS . 'css/changelog.css',
			array(),
			PJ_SGCE_VERSION,
			'all'
		);

	}

	/**
	 * Add Changelog link to plugins page
	 */
	public static function plugin_link( $links ) {

		$links['changelog'] = sprintf(
			'<a href="%s" aria-label="%s">%s</a>',
			add_query_arg( 'page', self::$page_slug, admin_url() ),
			esc_attr__( 'Simple Google Content Experiments Changelog', 'pj-sgce' ),
			esc_html__( 'Changelog', 'pj-sgce' )
		);
		return $links;

	}

}

PJ_SGCE_Changelog::hooks();
