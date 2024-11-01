<?php
/*
 * @since             1.0.0
 * @package           woo Customers Mail List wordpress plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Customers Mail List
 * Plugin URI:        
 * Description:       You can create your woocommerce store customers order mail list by this plugin.
 * Version:           1.0.0
 * Author:            Noor alam
 * Author URI:        https://profiles.wordpress.org/nalam-1/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo-customers-mail-list
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
function woo_customers_mail_list_notice_error() {
	/* translators: %s WC download URL link. */
	echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'woo Customers Mail List requires woo to be installed and active. You can download %s here.', 'woo-customers-mail-listn' ), '<a href="https://wordpress.org/plugins/woo/" target="_blank">woo</a>' ) . '</strong></p></div>';
}


/**
 * woo Customers Mail List
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'woo_customers_mail_list_init' ) ){
	function woo_customers_mail_list_init() {
		load_plugin_textdomain( 'woo-customers-mail-list', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 

		if ( ! class_exists( 'WooCommerce' ) ) {
			add_action( 'admin_notices', 'woo_customers_mail_list_notice_error' );
			return;
		}
		define( 'woo_CUSTOMERS_MAIL_LIST_URL', plugin_dir_url( __FILE__ ) );
		define( 'woo_CUSTOMERS_MAIL_LIST_PATH', plugin_dir_path( __FILE__ ) );
		define( 'woo_CUSTOMERS_MAIL_LIST_VERSION', '1.0.0' );

		
		 if ( is_admin() ) {
			     // We are in admin mode
			require_once( woo_CUSTOMERS_MAIL_LIST_PATH.'/inc/woo-submenu-page.php' );

			}
	}
}

add_action( 'plugins_loaded', 'woo_customers_mail_list_init' );






