<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

register_setting(
	'easy_booking_emails_settings',
	'easy_booking_settings', 
	array( $this, 'sanitize_values' )
);

add_settings_section(
	'easy_booking_start_notifications_settings',
	__( '"Start" status settings', 'easy_booking' ),
	array( $this, 'easy_booking_start_section_emails' ),
	'easy_booking_emails_settings'
);

add_settings_field(
	'easy_booking_start_status',
	__( 'Change item start booking status:', 'easy_booking' ),
	array( $this, 'easy_booking_start_status' ),
	'easy_booking_emails_settings',
	'easy_booking_start_notifications_settings'
);

add_settings_field(
	'easy_booking_start_status_change',
	__( 'If automatically, change item start booking status:', 'easy_booking' ),
	array( $this, 'easy_booking_start_status_change' ),
	'easy_booking_emails_settings',
	'easy_booking_start_notifications_settings'
);

add_settings_section(
	'easy_booking_processing_status_settings',
	__( '"Processing" status settings', 'easy_booking' ),
	array( $this, 'easy_booking_processing_status_settings' ),
	'easy_booking_emails_settings'
);

add_settings_field(
	'easy_booking_processing_status',
	__( 'Change item processing booking status:', 'easy_booking' ),
	array( $this, 'easy_booking_processing_status' ),
	'easy_booking_emails_settings',
	'easy_booking_processing_status_settings'
);

add_settings_section(
	'easy_booking_end_status_settings',
	__( '"End" status settings', 'easy_booking' ),
	array( $this, 'easy_booking_end_status_settings' ),
	'easy_booking_emails_settings'
);

add_settings_section(
	'easy_booking_completed_status_settings',
	__( '"Completed" status settings', 'easy_booking' ),
	array( $this, 'easy_booking_completed_status_settings' ),
	'easy_booking_emails_settings'
);

add_settings_field(
	'easy_booking_completed_status',
	__( 'Change item completed booking status:', 'easy_booking' ),
	array( $this, 'easy_booking_completed_status' ),
	'easy_booking_emails_settings',
	'easy_booking_completed_status_settings'
);

add_settings_field(
	'easy_booking_completed_status_change',
	__( 'If automatically, change item completed booking status:', 'easy_booking' ),
	array( $this, 'easy_booking_completed_status_change' ),
	'easy_booking_emails_settings',
	'easy_booking_completed_status_settings'
);