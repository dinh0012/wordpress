<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<div class="edit" style="display: none;">

    <table class="meta" cellspacing="0">

        <tbody class="meta_items">

            <tr data-meta_id="<?php echo esc_attr( $start_meta_id ); ?>">

                <td>

                    <label for="start_date" style="font-weight: bold;"><?php echo esc_html( $start_date_text ); ?>: </label>
                    <input type="hidden" name="meta_key[<?php echo esc_attr( $item_id ); ?>][<?php echo esc_attr( $start_meta_id ); ?>]" value="_ebs_start_format">
                    <input type="text"  name="meta_value[<?php echo esc_attr( $item_id ); ?>][<?php echo esc_attr( $start_meta_id ); ?>]" id="start_date" class="datepicker datepicker_start--<?php echo absint( $item_id ); ?>" value="<?php echo esc_attr( $start_date_set ); ?>" data-value="<?php echo esc_attr( $start_date_set ); ?>">

                </td>

            </tr>

            <?php if ( ! empty( $end_date_set ) ) : ?>

                <tr data-meta_id="<?php echo esc_attr( $end_meta_id ); ?>">

                    <td>

                        <label for="end_date" style="font-weight: bold;"><?php echo esc_html( $end_date_text ); ?>: </label>
                        <input type="hidden" name="meta_key[<?php echo esc_attr( $item_id ); ?>][<?php echo esc_attr( $end_meta_id ); ?>]" value="_ebs_end_format">
                        <input type="text" name="meta_value[<?php echo esc_attr( $item_id ); ?>][<?php echo esc_attr( $end_meta_id ); ?>]" id="end_date" class="datepicker datepicker_end--<?php echo absint( $item_id ); ?>" value="<?php echo esc_attr( $end_date_set ); ?>" data-value="<?php echo esc_attr( $end_date_set ); ?>">
                        
                    </td>

                </tr>

            <?php endif; ?>

            <?php if ( ! empty( $booking_status ) ) : ?>
                
                <tr data-meta_id="<?php echo esc_attr( $booking_status_meta_id ); ?>">

                    <td>
                        <label for="booking_status" style="font-weight: bold;"><?php _e( 'Booking status', 'easy_booking' ); ?>: </label>
                        <input type="hidden" name="meta_key[<?php echo esc_attr( $item_id ); ?>][<?php echo esc_attr( $booking_status_meta_id ); ?>]" value="_booking_status">
                        <?php wceb_settings_select( array(
                            'id'          => 'booking_status',
                            'name'        => 'meta_value[' . esc_attr( $item_id ) . '][' . esc_attr( $booking_status_meta_id ) . ']',
                            'value'       => isset( $booking_status ) ? $booking_status : 'wceb-pending',
                            'options'     => array(
                                'wceb-pending'    => apply_filters( 'easy_booking_display_status_pending', __( 'Pending', 'easy_booking' ) ),
                                'wceb-start'      => apply_filters( 'easy_booking_display_status_start', __( 'Start', 'easy_booking' ) ),
                                'wceb-processing' => apply_filters( 'easy_booking_display_status_processing', __( 'Processing', 'easy_booking' ) ),
                                'wceb-end'        => apply_filters( 'easy_booking_display_status_end', __( 'End', 'easy_booking' ) ),
                                'wceb-completed'  => apply_filters( 'easy_booking_display_status_completed', __( 'Completed', 'easy_booking' ) )
                            )
                        )); ?>
                    </td>

                </tr>

            <?php endif; ?>

            <input type="hidden" class="variation_id" name="variation_id" data-item_id="<?php echo absint( $item_id ); ?>" data-product_id="<?php echo absint( $product_id ); ?>" value="">

        </tbody>

    </table>

</div>