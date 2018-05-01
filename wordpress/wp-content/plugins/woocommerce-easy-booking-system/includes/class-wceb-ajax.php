<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WCEB_Ajax' ) ) :

class WCEB_Ajax {

	public function __construct() {
        
        add_action( 'init', array( $this, 'define_ajax' ), 0 );
        add_action( 'template_redirect', array( $this, 'do_wceb_ajax' ), 0 );

		add_action( 'wp_ajax_add_new_price', array( $this, 'wceb_get_new_price' ) );
        add_action( 'wp_ajax_nopriv_add_new_price', array( $this, 'wceb_get_new_price' ) );
        add_action( 'wceb_ajax_add_new_price', array( $this, 'wceb_get_new_price' ) );
        
        add_action( 'wp_ajax_clear_booking_session', array( $this, 'wceb_clear_booking_session' ) );
        add_action( 'wp_ajax_nopriv_clear_booking_session', array( $this, 'wceb_clear_booking_session' ) );
        add_action( 'wceb_ajax_clear_booking_session', array( $this, 'wceb_clear_booking_session' ) );

        add_action( 'wp_ajax_wceb_hide_notice', array( $this, 'wceb_hide_notice' ) );
        add_action( 'wp_ajax_wceb_reports_product_id', array( $this, 'wceb_reports_product_id' ) );

	}

    /**
     * Set WC AJAX constant and headers.
     * @author Credits to WooCommerce
     */
    public static function define_ajax() {
        if ( ! empty( $_GET['wceb-ajax'] ) ) {

            if ( ! defined( 'DOING_AJAX' ) ) {
                define( 'DOING_AJAX', true );
            }

            if ( ! WP_DEBUG || ( WP_DEBUG && ! WP_DEBUG_DISPLAY ) ) {
                @ini_set( 'display_errors', 0 ); // Turn off display_errors during AJAX events to prevent malformed JSON
            }
            
            $GLOBALS['wpdb']->hide_errors();
        }
    }

    /**
     * Send headers for WC Ajax Requests.
     * @author Credits to WooCommerce
     */
    private static function wceb_ajax_headers() {
        send_origin_headers();
        @header( 'Content-Type: text/html; charset=' . get_option( 'blog_charset' ) );
        @header( 'X-Robots-Tag: noindex' );
        send_nosniff_header();
        wc_nocache_headers();
        status_header( 200 );
    }

    /**
     * Check for WC Ajax request and fire action.
     * @author Credits to WooCommerce
     */
    public static function do_wceb_ajax() {
        global $wp_query;

        if ( ! empty( $_GET['wceb-ajax'] ) ) {
            $wp_query->set( 'wceb-ajax', sanitize_text_field( $_GET['wceb-ajax'] ) );
        }

        if ( $action = $wp_query->get( 'wceb-ajax' ) ) {

            self::wceb_ajax_headers();
            do_action( 'wceb_ajax_' . sanitize_text_field( $action ) );
            wp_die();
        }
    }

    /**
    *
    * Calculates new price, update product meta and refresh fragments
    *
    **/
    public static function wceb_get_new_price() {

        check_ajax_referer( 'set-dates', 'security' );

        $wceb_settings = get_option('easy_booking_settings');

        $product_id   = isset( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : ''; // Product ID
        $variation_id = isset( $_POST['variation_id'] ) ? absint( $_POST['variation_id'] ) : ''; // Variation ID
        $children     = isset( $_POST['children'] ) ? array_map( 'absint', $_POST['children'] ) : array(); // Product children for grouped and variable products

        $id = ! empty( $variation_id ) ? $variation_id : $product_id; // Product or variation id

        $calc_mode = $wceb_settings['easy_booking_calc_mode']; // Calculation mode (Days or Nights)

        $start = isset( $_POST['start_format'] ) ? sanitize_text_field( $_POST['start_format'] ) : ''; // Booking start date 'yyyy-mm-dd'
        $end   = isset( $_POST['end_format'] ) ? sanitize_text_field( $_POST['end_format'] ) : ''; // Booking end date 'yyyy-mm-dd'

        $product  = wc_get_product( $product_id ); // Product object
        $_product = ( $product_id !== $id ) ? wc_get_product( $id ) : $product; // Product or variation object

        if ( ! $_product ) {
            return;
        }

        // If product is variable and no variation was selected
        if ( $product->is_type( 'variable' ) && empty( $variation_id ) ) {
            self::wceb_throw_error( 3 );
        }

        // If product is grouped and no quantity was selected for grouped products
        if ( $product->is_type( 'grouped' ) && empty( $children ) ) {
            self::wceb_throw_error( 4 );
        }

        $number_of_dates = wceb_get_product_booking_dates( $_product );

        // If date format is "one", check only one date is set
        if ( $number_of_dates === 'one' ) {
            
            $dates = 'one_date';
            $duration = 1;

            // If end date is set
            if ( ! empty( $end ) ) {
                self::wceb_throw_error( 5 );
            }

            // If date is empty
            if ( empty( $start ) ) {
                self::wceb_throw_error( 6 );
            }

        } else { // "Two" dates check

            $dates = 'two_dates';

            // If one date is empty
            if ( empty( $start ) || empty( $end ) ) {
                self::wceb_throw_error( 2 );
            }

            $start_time = strtotime( $start );
            $end_time   = strtotime( $end );

            // If end date is before start date
            if ( $end_time < $start_time ) {
                self::wceb_throw_error( 1 );
            }

            // Get booking duration in days
            $duration = absint( ( $start_time - $end_time ) / 86400 );

            if ( $duration == 0 ) {
                $duration = 1;
            }

            // If booking mode is days and calculation mode is set to "Days", add one day
            if ( $calc_mode === 'days' && ( $start != $end ) ) {
                $duration += 1 ;
            }

            $booking_duration = wceb_get_product_booking_duration( $_product );

            // If booking mode is weeks and duration is a multiple of 7
            if ( $booking_duration === 'weeks' ) {

                if ( $calc_mode === 'nights' && $duration % 7 === 0 ) { // If in weeks mode, check that the duration is a multiple of 7
                    $duration /= 7;
                } else if ( $calc_mode === 'days' && $duration % 6 === 0 ) { // Or 6 in "Days" mode
                    $duration /= 6;
                } else { // Otherwise throw an error
                    self::wceb_throw_error( 1 );
                }
                
            } else if ( $booking_duration === 'custom' ) {

                $custom_booking_duration = wceb_get_product_custom_booking_duration( $_product );

                if ( $duration % $custom_booking_duration === 0 ) {
                    $duration /= $custom_booking_duration;
                } else {
                    self::wceb_throw_error( 1 );
                }

            }

            // If number of days is inferior to 0
            if ( $duration <= 0 ) {
                self::wceb_throw_error( 1 );
            }

        }

        // Get additional costs (for WooCommerce Product Addons)
        $additional_cost = self::wceb_get_additional_costs( $_product, $duration );

        // Store data in array
        $data = array(
            'start' => $start
        );

        if ( isset( $duration ) && ! empty( $duration ) ) {
            $data['duration'] = $duration;
        }

        if ( isset( $end ) && ! empty( $end ) ) {
            $data['end'] = $end;
        }

        $booking_data = array();

        $new_price = 0;
        $new_regular_price = 0;

        // Grouped or Bundle product types
        if ( $product->is_type( 'grouped' ) || $product->is_type( 'bundle' ) ) {

            if ( ! empty( $children ) ) foreach ( $children as $child_id => $quantity ) {

                if ( $quantity <= 0 || ( $child_id === $id ) ) {
                    continue;
                }

                $child = wc_get_product( $child_id );

                $children_prices[$child_id] = wceb_get_product_price( $product, $child, false, 'array' );

                // Multiply price by duration only if children is bookable
                if ( $children_prices[$child_id] ) {
                    
                    if ( wceb_is_bookable( $child ) ) {

                        if ( $children_prices[$child_id] ) foreach ( $children_prices[$child_id] as $price_type => $price ) {

                            if ( $price === "" ) {
                                continue;
                            }

                            if ( $number_of_dates === 'two' ) {
                                $price *= $duration;
                            }

                            ${'child_new_' . $price_type} = apply_filters(
                                'easy_booking_' . $dates . '_price',
                                wc_format_decimal( $price ), // Regular or sale price for x days
                                $product, $child, $data, $price_type
                            );

                        }

                    } else {

                        $child_new_price = wc_format_decimal( $children_price[$child_id]['price'] );

                        if ( isset( $children_price[$child_id]['regular_price'] ) ) {
                            $child_new_regular_price = wc_format_decimal( $children_price[$child_id]['regular_price'] );
                        }

                    }

                } else {

                    // Tweak for not individually sold bundled products
                    $child_new_price = 0;
                    $child_new_regular_price = 0;

                }

                // Maybe add additional costs
                if ( isset( $additional_cost[$child_id] ) ) {

                    $child_new_price = self::wceb_add_additional_costs( $child_new_price, $additional_cost, $child_id );

                    if ( isset( $child_new_regular_price ) ) {
                        $child_new_regular_price = self::wceb_add_additional_costs( $child_new_regular_price, $additional_cost, $child_id );
                    }
                    
                }

                $data['new_price'] = $child_new_price;

                if ( isset( $child_new_regular_price ) && ! empty( $child_new_regular_price ) ) {
                    $data['new_regular_price'] = $child_new_regular_price;
                }

                // Store parent produt for bundled items
                if ( $product->is_type( 'bundle' ) ) {
                    $data['grouped_by'] = $product;
                }

                $booking_data[$child_id] = $data;

                if ( $product->is_type( 'grouped' ) ) {
                    $new_price += wc_format_decimal( $child_new_price * $quantity );

                    if ( isset( $child_new_regular_price ) ) {
                        $new_regular_price += wc_format_decimal( $child_new_regular_price * $quantity );
                    }
                }

            }

            // Maybe add additional costs
            if ( $product->is_type( 'grouped' ) ) {

                if ( isset( $additional_cost[$id] ) ) {

                    $new_price = self::wceb_add_additional_costs( $new_price, $additional_cost, $id );

                    if ( isset( $child_new_regular_price ) ) {
                        $new_regular_price = self::wceb_add_additional_costs( $new_regular_price, $additional_cost, $id );
                    }
                    
                }
            }

            if ( $product->is_type( 'bundle' ) ) {

                $prices = (array) wceb_get_product_price( $product, false, false, 'array' );

                if ( $prices ) foreach ( $prices as $price_type => $price ) {

                    if ( $price === "" ) {
                        continue;
                    }

                    if ( $number_of_dates === 'two' ) {
                        $price *= $duration;
                    }

                    ${'new_' . $price_type} = apply_filters(
                        'easy_booking_' . $dates . '_price',
                        wc_format_decimal( $price ), // Regular or sale price for x days
                        $product, $_product, $data, $price_type
                    );

                    ${'new_' . $price_type} = self::wceb_add_additional_costs( ${'new_' . $price_type}, $additional_cost, $id );

                }
                
            }

        } else {

            // Get product price and (if on sale) regular price
            $prices = (array) wceb_get_product_price( $_product, false, false, 'array' );

            if ( $prices ) foreach ( $prices as $price_type => $price ) {

                if ( $price === "" ) {
                    continue;
                }

                if ( $number_of_dates === 'two' ) {
                    $price *= $duration;
                }

                ${'new_' . $price_type} = apply_filters(
                    'easy_booking_' . $dates . '_price',
                    wc_format_decimal( $price ), // Regular or sale price for x days
                    $product, $_product, $data, $price_type
                );
                
                ${'new_' . $price_type} = self::wceb_add_additional_costs( ${'new_' . $price_type}, $additional_cost, $product_id );

            }
            
        }

        $data['new_price'] = $new_price;

        if ( isset( $new_regular_price ) && ! empty( $new_regular_price ) && ( $new_regular_price !== $new_price ) ) {
            $data['new_regular_price'] = $new_regular_price;
        } else {
            unset( $data['new_regular_price'] ); // Unset value in case it was set for a child product
        }

        $booking_data[$id] = $data;

        // Update session data
        if ( ! WC()->session->has_session() ) {
            WC()->session->set_customer_session_cookie( true );
        }

        WC()->session->set( 'booking', $booking_data );

        // Return fragments
        self::wceb_new_price_fragment( $id, $children, $booking_data );

        die();

    }

    /**
    *
    * Adds additional costs (compatibility with WooCommerce Product Addons)
    * @param int - $price - Product price
    * @param array - $additional_cost
    * @param int - $id
    * @return int - $price
    *
    **/
    private static function wceb_add_additional_costs( $price, $additional_cost, $id ) {

        if ( isset( $additional_cost[$id] ) && $additional_cost[$id] > 0 ) {
            $price += $additional_cost[$id];
        }

        return apply_filters( 'easy_booking_additional_costs', $price, $additional_cost, $id );

    }

    /**
    *
    * Return whether product addon is multiplied by booking duration (compatibility with WooCommerce Product Addons)
    * @param WC_Product - $product
    * @return array|bool - $addons
    *
    **/
    private static function wceb_get_product_addons( $product_id ) {

        // Make sure Product Addons function exists
        if ( function_exists( 'get_product_addons' ) ) {
            $product_addons = get_product_addons( $product_id );
        } else {
            return false;
        }

        $addons = array();

        if ( ! empty( $product_addons ) ) foreach ( $product_addons as $index => $addon ) {

            $field_name = $addon['field-name'];
            $addons[$field_name] = array_key_exists( 'multiply_by_booking_duration', $addon ) ? absint( $addon['multiply_by_booking_duration'] ) : 0;

        }

        return $addons;
    }

    /**
    *
    * Calculates and formats additional costs (compatibility with WooCommerce Product Addons)
    * @param WC_Product - $_product - Product or variation object
    * @param int - $duration
    * @return array - $additional_cost
    *
    **/
    private static function wceb_get_additional_costs( $_product, $duration ) {

        // Get additional costs
        $additional_costs = isset( $_POST['additional_cost'] ) ? $_POST['additional_cost'] : array();     

        $additional_cost = array();
        foreach ( $additional_costs as $addon_field_name => $addon ) {

            if ( ! is_array( $addon ) ) {
                continue;
            }

            // Get product ID
            $explode_addon_name = explode( '-', $addon_field_name );
            $product_id = absint( $explode_addon_name[0] );

            if ( ! is_numeric( $product_id ) || empty( $product_id ) ) {
                continue;
            }

            // Get product addons
            $product_addons = self::wceb_get_product_addons( $product_id );

            if ( ! $product_addons || empty( $product_addons ) ) {
                return false;
            }

            // Maybe init product additional costs
            if ( ! array_key_exists( $product_id, $additional_cost ) ) {
                $additional_cost[$product_id] = 0;
            }

            // Sanitize
            $addon = array_map( 'absint', $addon );

            foreach ( $addon as $index => $cost ) {

                if ( isset( $product_addons[$addon_field_name] ) ) {

                    // Multiply addon cost by booking duration?
                    $maybe_multiply = isset( $product_addons[$addon_field_name] ) ? absint( $product_addons[$addon_field_name] ) : 0;

                    // Backward compatibility - Pass true to filter to multiply additional costs by booking duration (default: false)
                    if ( ! $maybe_multiply && true === apply_filters( 'easy_booking_multiply_additional_costs', false ) ) {
                        $maybe_multiply = 1;
                    }

                    if ( $maybe_multiply ) {
                        $cost *= $duration;
                    }

                    // Store total addons costs for each product ID
                    $additional_cost[$product_id] += $cost;
                }

            }

        }

        $prices_include_tax = get_option( 'woocommerce_prices_include_tax' );
        $tax_display_mode   = get_option( 'woocommerce_tax_display_shop' );
        
        // Get additional costs including or excluding taxes (for WooCommerce Product Addons)
        if ( ! empty( $additional_cost ) ) {

            foreach ( $additional_cost as $ac_id => $ac_amount ) {

                if ( $_product->is_taxable() ) {

                    $rates = WC_Tax::get_base_tax_rates( $_product->get_tax_class() );

                    if ( $prices_include_tax === 'yes' && $tax_display_mode === 'excl' ) {

                        $taxes = WC_Tax::calc_exclusive_tax( $ac_amount, $rates );

                        if ( $taxes ) foreach ( $taxes as $tax ) {
                            $additional_cost[$ac_id] += $tax;
                        }

                    } else if ( $prices_include_tax === 'no' && $tax_display_mode === 'incl' ) {

                       $taxes = WC_Tax::calc_inclusive_tax( $ac_amount, $rates );

                       if ( $taxes ) foreach ( $taxes as $tax ) {
                            $additional_cost[$ac_id] -= $tax;
                        }

                    }

                }

            }
            
        }

        return $additional_cost;
    }

    /**
    *
    * Clears session if "Clear" button is clicked on the calendar
    *
    **/
    public static function wceb_clear_booking_session() {

        check_ajax_referer( 'set-dates', 'security' );

        $session = WC()->session->get( 'booking' );

        if ( ! empty( $session ) ) {
            WC()->session->set( 'booking', '' );
        }

        $session_set = false;

        die( $session_set );
    }

    /**
    *
    * Throws an error message
    * @param int $error_code
    *
    **/
    private static function wceb_throw_error( $error_code ) {
        $error_message = self::wceb_get_date_error( $error_code );

        self::wceb_error_fragment( $error_message );
        self::wceb_clear_booking_session();
        die();
    }

    /**
    *
    * Gets error messages
    *
    * @param int $error_code
    * @return str $err - Error message
    *
    **/
    private static function wceb_get_date_error( $error_code ) {

        switch ( $error_code ) {
            case 1:
                $err = __( 'Please choose valid dates', 'easy_booking' );
            break;
            case 2:
                $err = __( 'Please choose two dates', 'easy_booking' );
            break;
            case 3:
                $err = __( 'Please select product option', 'easy_booking' );
            break;
            case 4:
                $err = __( 'Please choose the quantity of items you wish to add to your cart&hellip;', 'woocommerce' );
            break;
            case 5:
                $err = __( 'You can only select one date', 'easy_booking' );
            break;
            case 6:
                $err = __( 'Please choose a date', 'easy_booking' );
            break;
            default:
                $err = '';
            break;
        }

        return $err;
    }

    /**
    *
    * Updates error messages with Ajax
    *
    * @param str $error_message
    *
    **/
    public static function wceb_error_fragment( $error_message ) {

        $fragments = array(
            'error' => esc_html( $error_message )
        );

        wp_send_json( $fragments );

        die();

    }

    /**
    *
    * Updates price fragment
    * @param int - $id - Product or variation ID
    * @param array - $children - Product chilren (for grouped and bundled products)
    * @param array - $booking_data
    *
    **/
    public static function wceb_new_price_fragment( $id, $children, $booking_data ) {

        $wceb_settings = get_option('easy_booking_settings');

        $session = false;
        $product = wc_get_product( $id );
        
        if ( ! $product ) {
            self::wceb_error_fragment( __( 'Sorry there was a problem. Please try again.', 'easy_booking' ) );
        }

        if ( ! isset( $booking_data[$id] ) ) {
            self::wceb_error_fragment( __( 'Sorry there was a problem. Please try again.', 'easy_booking' ) );
        }

        $new_price = $booking_data[$id]['new_price']; // New booking price
        $new_regular_price = isset( $booking_data[$id]['new_regular_price'] ) ? $booking_data[$id]['new_regular_price'] : $new_price;

        // If it is a bundle product, add children's prices to the final booking price
        if ( $product->is_type( 'bundle')  && ! empty( $children ) ) {

            foreach ( $children as $child_id => $qty ) {

                if ( isset( $booking_data[$child_id] ) && $child_id !== $id ) {
                    $new_price += ( $booking_data[$child_id]['new_price'] * $qty );

                    if ( isset( $booking_data[$child_id]['new_regular_price'] ) ) {
                        $new_regular_price += ( $booking_data[$child_id]['new_regular_price'] * $qty );
                    } else {
                        $new_regular_price += ( $booking_data[$child_id]['new_price'] * $qty );
                    }
                }

            }

        }

        $tax_display_mode = get_option( 'woocommerce_tax_display_shop' );

        // Regular price is product is on sale
        if ( isset( $new_regular_price ) && ( $new_regular_price != $new_price ) ) {

            $args = array( 'price' => $new_regular_price );

            if ( $tax_display_mode === 'incl' ) {

                $new_regular_price = function_exists( 'wc_get_price_including_tax' ) ? wc_get_price_including_tax( $product, $args ) : $product->get_price_including_tax( 1, $new_regular_price );

            } else {

                $new_regular_price = function_exists( 'wc_get_price_excluding_tax' ) ? wc_get_price_excluding_tax( $product, $args ) : $product->get_price_excluding_tax( 1, $new_regular_price );

            }

        } else {
            $new_regular_price = '';
        }

        $args = array( 'price' => $new_price );

        if ( $tax_display_mode === 'incl' ) {

            $new_price = function_exists( 'wc_get_price_including_tax' ) ? wc_get_price_including_tax( $product, $args ) : $product->get_price_including_tax( 1, $new_price );

        } else {

            $new_price = function_exists( 'wc_get_price_excluding_tax' ) ? wc_get_price_excluding_tax( $product, $args ) : $product->get_price_excluding_tax( 1, $new_price );

        }

        if ( wceb_get_product_booking_dates( $product ) === 'two' ) {

            $duration = $booking_data[$id]['duration'];
            $average_price = floatval( $new_price / $duration );

            $calc_mode = $wceb_settings['easy_booking_calc_mode']; // Calculation mode (Days or Nights)

            $booking_duration = wceb_get_product_booking_duration( $product );
            
            if ( $booking_duration === 'custom' ) {
                $custom_duration = wceb_get_product_custom_booking_duration( $product );
                $duration *= $custom_duration;
            }

            if ( $booking_duration === 'weeks' ) {
                $unit = _n( 'week', 'weeks', $duration, 'easy_booking' );
            } else {
                $unit = $calc_mode === 'nights' ? _n( 'night', 'nights', $duration, 'easy_booking' ) : _n( 'day', 'days', $duration, 'easy_booking' );
            }

            $details = sprintf(
                __( 'Total booking duration: %s %s', 'easy_booking' ),
                absint( $duration ),
                esc_html( $unit )
            );

            // Maybe display average price (if there are price variations. E.g Duration discounts or custom pricing)
            if ( true === apply_filters( 'easy_booking_display_average_price', false, $id ) ) {
                $details .= '<br />';
                $details .= sprintf(
                    __( 'Average price %s: %s', 'easy_booking' ),
                    wceb_get_price_html( $product ),
                    wc_price( $average_price )
                );
            }
            
            $details = apply_filters(
                'easy_booking_booking_price_details',
                $details,
                $product,
                $booking_data[$id]
            );
        }

        ob_start();
        $data = ob_get_clean();

            $data = array(
                'fragments' => apply_filters( 'easy_booking_fragments', array(
                    'session'               => true,
                    'booking_price'         => esc_attr( $new_price ),
                    'booking_regular_price' => isset( $new_regular_price ) ? esc_attr( $new_regular_price ) : '',
                    'input.wceb_nonce'      => '<input type="hidden" name="_wceb_nonce" class="wceb_nonce" value="' . wp_create_nonce( 'set-dates' ) . '">'
                    )
                )
            );

        if ( isset( $details ) ) {
            $data['fragments']['p.booking_details'] = '<p class="booking_details">' . wp_kses_post( $details ) . '</p>';
        }

        wp_send_json( $data );
        die();

    }

    /**
    *
    * Hide notices after clicking on the "close" button
    *
    **/
    public static function wceb_hide_notice() {

        check_ajax_referer( 'hide-notice', 'security' );

        $notice = isset( $_POST['notice'] ) ? sanitize_text_field( $_POST['notice'] ) : '';

        if ( get_option( 'easy_booking_display_notice_' . $notice ) !== '1' ) {
            update_option( 'easy_booking_display_notice_' . $notice, '1' );
        }

        die();
    }

    /**
    *
    * Gets filtered products on the reports page
    *
    **/
    public static function wceb_reports_product_id() {
        
        ob_start();

        check_ajax_referer( 'search-products', 'security' );

        $term = (string) wc_clean( stripslashes( $_GET['term'] ) );

        $booked_products = wceb_get_booked_items_from_orders();

        $found_products = array();
        if ( $booked_products ) foreach ( $booked_products as $booked_product ) {
            $product_id   = $booked_product['product_id'];
            $product      = wc_get_product( $product_id );
            $product_name = get_the_title( $product_id );

            if ( ! $product ) {
                continue;
            }
            
            if ( stristr( $product_name, $term ) !== FALSE) {
                $found_products[ $product_id ] = $product->get_formatted_name();
            }
        }

        wp_send_json( $found_products );
        die();

    }
}

return new WCEB_Ajax();

endif;