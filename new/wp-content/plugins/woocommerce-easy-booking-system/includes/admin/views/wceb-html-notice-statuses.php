<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="updated easy-booking-notice">
	<p>
		<?php printf( __( 'Welcome to Easy Booking 2.1.6, please configure and initialize booking statuses %shere%s.', 'easy_booking' ), '<a href="admin.php?page=easy-booking&tab=emails">', '</a>' ); ?>
	</p>
	<button type="button" class="notice-dismiss easy-booking-notice-close" data-notice="wceb-statuses"></button>
</div>