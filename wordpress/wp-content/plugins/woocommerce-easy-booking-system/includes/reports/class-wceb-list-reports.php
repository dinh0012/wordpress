<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Easy_Booking_List_Reports extends WP_List_Table {

	protected $max_items;

	public function __construct() {

		parent::__construct( array(
			'singular'  => __( 'Report', 'woocommerce' ),
			'plural'    => __( 'Reports', 'woocommerce' ),
			'ajax'		=> true
		) );

	}

	/**
	 * Display filters and pagination
	 *
	 */
	protected function display_tablenav( $which ) {

		$filter_status     = isset( $_GET['wceb_report_status'] ) ? stripslashes( $_GET['wceb_report_status'] ) : '';
		$filter_id         = isset( $_GET['wceb_report_product_ids'] ) ? stripslashes( $_GET['wceb_report_product_ids'] ) : '';
		$filter_start_date = isset( $_GET['wceb_report_start_date_submit'] ) ? stripslashes( $_GET['wceb_report_start_date_submit'] ) : '';
		$filter_end_date   = isset( $_GET['wceb_report_end_date_submit'] ) ? stripslashes( $_GET['wceb_report_end_date_submit'] ) : '';
		
		if ( ! empty( $filter_id ) ) {
			$_product = wc_get_product( $filter_id );
		}

		$product = isset( $_product ) && is_object( $_product ) ? $_product->get_formatted_name() : '';

		include_once( 'views/html-wceb-reports-filters.php' );
	}

	/**
	 * Set reports columns
	 *
	 */
	public function get_columns() {

		$columns = apply_filters( 'easy_booking_reports_columns', array(
			'booking_status' => esc_html__( 'Status', 'woocommerce' ),
			'order_id'       => esc_html__( 'Order', 'woocommerce' ),
			'product'        => esc_html__( 'Product', 'woocommerce' ),
			'start_date'     => esc_html__( apply_filters( 'easy_booking_start_text', __( 'Start', 'easy_booking' ) ) ),
			'end_date'       => esc_html( apply_filters( 'easy_booking_end_text', __( 'End', 'easy_booking' ) ) ),
			'qty_booked'     => esc_html__( 'Quantity booked', 'easy_booking' )
		) );

		$custom_columns = apply_filters( 'easy_booking_reports_custom_columns', array() );

		if ( $custom_columns ) foreach ( $custom_columns as $custom_column ) {

			// Sanitize
			$id = sanitize_html_class( $custom_column['id'] );
			$custom_column['content'][$id] = esc_html( $custom_column['name'] );

			// Insert custom column at the right place
			$columns = $this->array_insert( $columns, absint( $custom_column['position'] ), $custom_column['content'] );
		}

		return $columns;
	}

	/**
	 * Insert given element at given position in an array
	 *
	 */
	private function array_insert( &$array, $position, $insert_array ) {

		$first_array = array_splice( $array, 0, $position );
		$array = array_merge( $first_array, $insert_array, $array );

		return $array;

	}

	/**
	 * Set reports sortable columns
	 *
	 */
	protected function get_sortable_columns() {

		$sortable_columns = apply_filters( 'easy_booking_reports_sortable_columns', array(
			'booking_status' => array( 'booking_status', true ),
			'order_id'       => array( 'order_id', true ),
			'product'        => array( 'product_id', true ),
			'start_date'     => array( 'start_date', false ),
			'end_date'       => array( 'end_date', false )
		) );

		return $sortable_columns;
	}

	/**
	 * Reports columns content
	 *
	 */
	public function column_default( $item, $column_name ) {
		global $post;

		if ( ! empty( $item['order_id'] ) ) {
			$order = wc_get_order( $item['order_id'] );
		} else {
			$order = false;
		}

		$product = wc_get_product( $item['product_id'] );

		if ( ! $product ) {
			return;
		}

		switch ( $column_name ) {

			case 'booking_status' :

			if ( isset( $item['status'] ) ) {

				$display_status = str_replace( 'wceb-', '', $item['status'] );
				$display_status = apply_filters( 'easy_booking_display_status_' . $display_status, ucfirst( $display_status ) );

				if ( version_compare( WC_VERSION, '3.3', '<' ) ) {

					printf( '<mark class="%s tips" data-tip="%s">%s</mark>', esc_attr( sanitize_html_class( $item['status'] ) ), esc_attr( $display_status ), esc_html( $display_status ) );

				} else {

					printf( '<mark class="order-status %s tips" data-tip="%s">%s</mark>', esc_attr( sanitize_html_class( $item['status'] ) ), esc_attr( $display_status ), '<span>' . esc_html( $display_status ) . '</span>' );
					
				}
				
			}

			break;

			case 'order_id' :

				if ( $order ) {

					$buyer = '';

					if ( $order->get_billing_first_name() || $order->get_billing_last_name() ) {
						/* translators: 1: first name 2: last name */
						$buyer = trim( sprintf( _x( '%1$s %2$s', 'full name', 'woocommerce' ), $order->get_billing_first_name(), $order->get_billing_last_name() ) );
					} elseif ( $order->get_billing_company() ) {
						$buyer = trim( $order->get_billing_company() );
					} elseif ( $order->get_customer_id() ) {
						$user  = get_user_by( 'id', $order->get_customer_id() );
						$buyer = ucwords( $user->display_name );
					}

					echo '<a href="' . esc_url( admin_url( 'post.php?post=' . absint( $order->get_id() ) ) . '&action=edit' ) . '" class="order-view"><strong>#' . esc_attr( $order->get_order_number() ) . ' ' . esc_html( $buyer ) . '</strong></a>';

				} else {
					echo __( 'Imported booking', 'easy_booking' );
				}

			break;

			case 'product' :
				$product_name = $product->get_formatted_name();
				echo wp_kses_post( $product_name );
			break;

			case 'start_date' :
				echo date_i18n( get_option( 'date_format' ), strtotime( $item['start'] ) );
			break;

			case 'end_date' :

				if ( isset( $item['end'] ) ) {
					echo date_i18n( get_option( 'date_format' ), strtotime( $item['end'] ) );
				}

			break;

			case 'qty_booked' :
				echo esc_html( $item['qty'] );
			break;

			default :

				echo apply_filters(
					'easy_booking_reports_display_custom_column',
					isset( $item[$column_name] ) ? esc_html( $item[$column_name] ) : '',
					$column_name,
					$item
				);

			break;

		}
		
	}

	/**
	 * Sort reports
	 *
	 */
	function usort_reorder( $a, $b ) {

		// If no sort, default to order ID
		$orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'order_id';

		// If no order, default to asc
		$order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';

		// Determine sort order
		switch ( $orderby ) {

			case 'booking_status' :
				$result = ( $a['status'] > $b['status'] ) ? -1 : 1;
			break;

			case 'order_id' :

				if ( isset( $a['order_id'] ) && isset( $b['order_id'] ) ) {
					$result = ( $a['order_id'] > $b['order_id'] ) ? -1 : 1;
				} else {
					$result = -1;
				}

			break;

			case 'product_id' :
				$result = ( $a['product_id'] > $b['product_id'] ) ? -1 : 1;
			break;

			case 'start_date' :
				$a_start_date = strtotime( $a['start'] );
				$b_start_date = strtotime( $b['start'] );

				$result = ( $a_start_date > $b_start_date ) ? -1 : 1;
			break;

			case 'end_date' :
				$a_end_date = strtotime( $a['end'] );
				$b_end_date = strtotime( $b['end'] );

				$result = ( $a_end_date > $b_end_date ) ? -1 : 1;
			break;

			default:
				$result = apply_filters( 'easy_booking_sort_reports_columns', -1, $orderby, $a, $b);
			break;

		}
		
		// Send final sort direction to usort
		return ( $order === 'asc' ) ? $result : -$result;
	}

	/**
	 * Prepare items
	 *
	 */
	public function prepare_items() {

		$this->_column_headers = array( $this->get_columns(), array(), $this->get_sortable_columns() );
		$current_page          = absint( $this->get_pagenum() );
		$per_page              = 20;

		$this->get_items( $current_page, $per_page );

		/**
		 * Pagination
		 */
		$this->set_pagination_args( array(
			'total_items' => $this->max_items,
			'per_page'    => $per_page,
			'total_pages' => ceil( $this->max_items / $per_page )
		) );
	}

	/**
	 * Get items
	 *
	 */
	public function get_items( $current_page, $per_page ) {
		global $wpdb;

		$this->max_items = 0;
		$this->items     = array();

		$filter_status = isset( $_GET['wceb_report_status'] ) ? stripslashes( $_GET['wceb_report_status'] ) : '';

		$past = ( $filter_status !== 'completed' ) ? false : true;

		// Get all booked items from orders
		$booked_products = apply_filters( 'wceb_reports_booked_products', wceb_get_booked_items_from_orders( $past ) );

		$filter_id         = isset( $_GET['wceb_report_product_ids'] ) ? stripslashes( $_GET['wceb_report_product_ids'] ) : '';
		$filter_start_date = isset( $_GET['wceb_report_start_date_submit'] ) ? stripslashes( $_GET['wceb_report_start_date_submit'] ) : '';
		$filter_end_date   = isset( $_GET['wceb_report_end_date_submit'] ) ? stripslashes( $_GET['wceb_report_end_date_submit'] ) : '';

		$filters = array(
			'start' => $filter_start_date,
			'end'   => $filter_end_date
		);

		// If is filtered by booking status
		if ( ! empty( $filter_status ) ) {

			foreach ( $booked_products as $index => $booked_date ) {

				if ( $booked_date['status'] != 'wceb-' . $filter_status ) {
					unset( $booked_products[$index] ); // Remove unfiltered booking statuses
					continue;
				}

			}

		} else {

			foreach ( $booked_products as $index => $booked_date ) {

				if ( isset( $booked_date['status'] ) && $booked_date['status'] === 'wceb-completed' ) {
					unset( $booked_products[$index] ); // Remove unfiltered IDs
					continue;
				}

			}
		}

		// If is filtered by ID
		if ( ! empty( $filter_id ) ) {

			foreach ( $booked_products as $index => $booked_date ) {

				if ( $booked_date['product_id'] != $filter_id ) {
					unset( $booked_products[$index] ); // Remove unfiltered IDs
					continue;
				}

			}

		}

		// If is filtered by start and end date
		if ( ! empty( $filter_start_date ) && ! empty( $filter_end_date ) ) {

			foreach ( $booked_products as $index => $booked_date ) {

				$start = strtotime( $booked_date['start'] );
				$end   = isset( $booked_date['end'] ) ? strtotime( $booked_date['end'] ) : $start;

				$start_filter = strtotime( $filter_start_date );
				$end_filter   = strtotime( $filter_end_date );

				if ( $start < $start_filter || $end > $end_filter ) {
					unset( $booked_products[$index] );
					continue;
				}
			}

		} else { // If is filter by one date only

			foreach ( $filters as $filter => $filtered ) {

				if ( ! empty( $filtered ) ) {

					foreach ( $booked_products as $index => $booked_date ) {

						if ( $booked_date[$filter] != $filtered ) {
							unset( $booked_products[$index] );
							continue;
						}

					}

				}

			}

		}

		$booked_products = apply_filters( 'easy_booking_filter_reports', $booked_products );

		// Sort results
		usort( $booked_products, array( $this, 'usort_reorder' ) );

		$total_items = count( $booked_products );
		$min         = ( $current_page - 1 ) * $per_page;
		$max         = $min + $per_page;

		$set_max = $total_items < $max ? $total_items : $max;

		$items = array();
		for ( $i = $min; $i < $set_max; $i++ ) {
			$items[] = $booked_products[$i];
		}

		$this->items     = $items;
		$this->max_items = $total_items;
	}

}