<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://smartarget.online
 * @since      1.1
 *
 * @package    Smartarget
 * @subpackage Smartarget/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.1
 * @package    Smartarget
 * @subpackage Smartarget/includes
 * @author     Erez <erezson@gmail.com >
 */
class SmartargetFlashCards_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'smartarget_flash_cards',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
