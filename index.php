<?php
/**
 * Plugin Name: Dokan Custom - Show Vendor Info In Product Summery
 * Description: Instead of showing in a tab, this plugin will show the info in product summery
 * Version: 1.0.0
 * Author: Edi Amin
 * Author URI: https://github.com/ediamin
 * Text Domain: dokan-custom
 * Domain Path: /i18n/languages/
 */

class DokanCustomShowVendorInfoInProductSummery {

    /**
     * Class instance
     *
     * @since 1.0.0
     *
     * @return void
     */
    public static function instance() {
        static $instance;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Class constructor
     *
     * @since 1.0.0
     */
    public function __construct() {
        add_filter( 'woocommerce_product_tabs', [ self::class, 'remove_dokan_seller_product_tab' ], 11 );
        add_action( 'woocommerce_single_product_summary', [ self::class, 'add_vendor_info_in_product_summery' ], 99 );
    }

    /**
     * Remove the vendor info tab in single product page
     *
     * @since 1.0.0
     *
     * @param array $tabs
     *
     * @return array
     */
    public static function remove_dokan_seller_product_tab( $tabs ) {
        if ( isset( $tabs['seller'] ) ) {
            unset( $tabs['seller'] );
        }

        return $tabs;
    }

    /**
     * Add the vendor info in product summery
     *
     * @since 1.0.0
     *
     * @return void
     */
    public static function add_vendor_info_in_product_summery() {
        include_once dirname( __FILE__ ) . '/templates/vendor-info.php';
    }
}

DokanCustomShowVendorInfoInProductSummery::instance();

