<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://smartarget.online
 * @since      1.1
 *
 * @package    Smartarget
 * @subpackage Smartarget/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Smartarget
 * @subpackage Smartarget/public
 * @author     Erez <erezson@gmail.com >
 */
class SmartargetFlashCards_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->plugin_options = get_option($this->plugin_name);
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in SmartargetFlashCards_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The SmartargetFlashCards_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/smartarget-flash-cards-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in SmartargetFlashCards_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The SmartargetFlashCards_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        $site = preg_replace("/www\.|https?:\/\/|\/$|\/?\?.+|\/.+|^\./", '', get_home_url());
        $hash = sha1(sha1("wordpress_flash_cards_" . $site) . "_script");

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/smartarget-flash-cards-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'smartarget_flash_cards_params', ['hash' => $hash] );
	}
}
