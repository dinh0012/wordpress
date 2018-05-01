<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="updated easy-booking-notice">
	<p>
		<?php printf( __( 'Want more features for WooCommerce Easy Booking? %sCheck the add-ons%s!', 'easy_booking' ), '<a href="admin.php?page=easy-booking-addons">', '</a>' ); ?>
	</p>
	<button type="button" class="notice-dismiss easy-booking-notice-close" data-notice="wceb-addons"></button>
</div>