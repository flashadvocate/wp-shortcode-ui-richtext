<?php
/**
 * Adds additional features to Shortcake UI.
 *
 * @package ShortcodeUiRichtext
 */

namespace ShortcodeUiRichtext;

/**
 * Class Toggle UI.
 */
class Integration {
	/**
	 * The plugin instance.
	 *
	 * @var Plugin
	 */
	public $plugin;

	/**
	 * Constructor
	 *
	 * @param object $plugin The plugin instance.
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;

		// Enqueue scripts.
		add_action( 'wp_enqueue_editor', array( $this, 'enqueue_scripts' ), 11 );
	}

	/**
	 * Enqueue admin scripts
	 *
	 * @action admin_enqueue_scripts
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		wp_register_script( 'scui_richtext-js', plugins_url( 'js/richtext.js', dirname( __FILE__ ) ), array( 'jquery' ), 0.1, true );
		wp_enqueue_script( 'scui_richtext-js' );

		wp_register_script( 'scui_richtext-bootstrap-js', plugins_url( 'lib/bootstrap/js/bootstrap.min.js', dirname( __FILE__ ) ), array( 'jquery' ), 3.3, true );
		wp_enqueue_script( 'scui_richtext-bootstrap-js' );

		wp_register_script( 'scui_richtext-summernote-js', plugins_url( 'lib/summernote/js/summernote.min.js', dirname( __FILE__ ) ), array( 'jquery', 'scui_richtext-bootstrap-js' ), 0.8, true );
		wp_enqueue_script( 'scui_richtext-summernote-js' );

		wp_register_style( 'scui_richtext-summernote-bootstrap-css', $this->plugin->dir_url . 'lib/bootstrap/css/summernote-bootstrap.min.css' );
		wp_enqueue_style( 'scui_richtext-summernote-bootstrap-css' );

		wp_register_style( 'scui_richtext-summernote-css', $this->plugin->dir_url . 'lib/summernote/css/summernote.min.css' );
		wp_enqueue_style( 'scui_richtext-summernote-css' );
	}
}
