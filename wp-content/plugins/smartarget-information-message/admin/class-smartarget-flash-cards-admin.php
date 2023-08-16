<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://smartarget.online
 * @since      1.1
 *
 * @package    Smartarget
 * @subpackage Smartarget/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Smartarget
 * @subpackage Smartarget/admin
 * @author     Erez <erezson@gmail.com >
 */
class SmartargetFlashCards_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->plugin_options = get_option($this->plugin_name);
	}

	/**
	 * Register the stylesheets for the admin area.
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

		$version = true ? random_int(0, 100000) : $this->version;



        wp_register_style( 'icons.css', 'https://unicons.iconscout.com/release/v3.0.3/css/line.css', array(), $version, 'all' );
        wp_enqueue_style( 'icons.css' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		$version = true ? random_int(0, 100000) : $this->version;

         wp_register_script('package', plugin_dir_url( __FILE__ ) . 'js/package.js', [], $version, true);
        wp_enqueue_script( 'package' );

        wp_register_script('loader', plugin_dir_url( __FILE__ ) . 'js/loader.js', [], $version, true);
        wp_enqueue_script( 'loader' );
    }

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 */

	public function add_plugin_admin_menu() {

		/*
		 * Add a settings page for this plugin to the Settings menu.
		*/
		add_options_page( 'Smartarget Information Message Settings', 'Smartarget Information Message', 'manage_options', $this -> plugin_name, array($this, 'display_plugin_setup_page'));
	}

	/**
	 * Add settings action link to the plugins page.
	 */

	public function add_action_links( $links ) {

        $settings_link = [
            '<a target="_blank" style="color:#1da867;border: 1px solid #1da867; background-color: #1da86720; border-radius: 3px; padding: 3px 5px;" href="' . 'https://app.smartarget.online/#/subscription/buy' . '">' . __('Upgrade to Pro', $this->plugin_name) . '</a>',
            '<a target="_blank" href="' . 'https://smartarget.online/page_contact.html' . '">' . __('Support', $this->plugin_name) . '</a>',
            '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
        ];
		return array_merge(  $settings_link, $links );

	}

	/**
	 * Render the settings page for this plugin.
	 */

	public function display_plugin_setup_page() {

		include_once( 'partials/smartarget-flash-cards-admin-display.php' );
	}

	/**
	 * Validate options
	 */
	public function validate($input) {
		$valid = array();
		$valid['smartarget_user_id'] = (isset($input['smartarget_user_id']) && !empty($input['smartarget_user_id'])) ? $input['smartarget_user_id'] : '';
		return $valid;
	}

	/**
	 * Update all options
	 */
	public function options_update() {
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}
}
