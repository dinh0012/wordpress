<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'WCEB_Order' ) ) :

class WCEB_Order {

    public function __construct() {

        $this->options = get_option( 'easy_booking_settings' );

        add_action( 'woocommerce_before_order_itemmeta', array( $this, 'easy_booking_order_display_product_dates' ), 10, 3 );

    }
    /**
    *
    * Displays booked dates and a picker form on the order page
    *
    * @param int $item_id
    * @param object $item
    * @param WC_Product $_product
    *
    **/
    public function easy_booking_order_display_product_dates( $item_id, $item, $_product ) {
        global $wpdb;

        if ( ! isset( $item['product_id'] ) ) {
            return;
        }
        
        $product_id   = $item['product_id'];
        $variation_id = $item['variation_id'];

        $start_date_set = wc_get_order_item_meta( $item_id, '_ebs_start_format' );
        $end_date_set   = wc_get_order_item_meta( $item_id, '_ebs_end_format' );

        $start_date_text = apply_filters( 'easy_booking_start_text', __( 'Start', 'easy_booking' ), $_product );
        $end_date_text   = apply_filters( 'easy_booking_end_text', __( 'End', 'easy_booking' ), $_product );

        $booking_status = wc_get_order_item_meta( $item_id, '_booking_status' );

        $item_order_meta_table = $wpdb->prefix . 'woocommerce_order_itemmeta';
        
        if ( ! empty( $start_date_set ) ) {

            // Get meta ids from the database
            $start_meta_id = $wpdb->get_var( $wpdb->prepare(
                "SELECT `meta_id` FROM $item_order_meta_table WHERE `order_item_id` = %d AND `meta_key` LIKE %s",
                $item_id, '_ebs_start_format'
            ));

            if ( ! empty( $end_date_set ) ) {

                $end_meta_id = $wpdb->get_var( $wpdb->prepare(
                    "SELECT `meta_id` FROM $item_order_meta_table WHERE `order_item_id` = %d AND `meta_key` LIKE %s",
                    $item_id, '_ebs_end_format'
                ));

            }

            if ( ! empty( $booking_status ) ) {
                
                $booking_status_meta_id = $wpdb->get_var( $wpdb->prepare(
                    "SELECT `meta_id` FROM $item_order_meta_table WHERE `order_item_id` = %d AND `meta_key` LIKE %s",
                    $item_id, '_booking_status'
                ));
                
            }

            // Product or variation ID
            $id      = empty( $variation_id ) ? $product_id : $variation_id;
            $product = wc_get_product( $id );

            // Formatted start date
            $start_date = date_i18n( get_option( 'date_format' ), strtotime( $start_date_set ) );

            // Formatted end date
            if ( ! empty( $end_date_set ) ) {
                $end_date = date_i18n( get_option( 'date_format' ), strtotime( $end_date_set ) );
            }

            include( 'views/html-wceb-order-item-meta.php' );

            include( 'views/html-wceb-edit-order-item-meta.php' );

        } else if ( wceb_is_bookable( $_product ) ) {

            $meta_array = array(
                'start_meta_id'          => '_ebs_start_format',
                'end_meta_id'            => '_ebs_end_format',
                'booking_status_meta_id' => '_booking_status'
            );

            // If meta key is not already in database, create it
            foreach ( $meta_array as $var => $meta_name ) {

                ${$var} = $wpdb->get_var( $wpdb->prepare(
                    "SELECT `meta_id` FROM $item_order_meta_table WHERE `order_item_id` = %d AND `meta_key` LIKE %s",
                    $item_id, $meta_name
                ));

                if ( is_null( ${$var} ) ) {
                    ${$var} = wc_add_order_item_meta( $item_id, $meta_name, '' );
                }

            }

            include( 'views/html-wceb-add-order-item-meta.php' );

        }

    }

}

return new WCEB_Order();

endif;