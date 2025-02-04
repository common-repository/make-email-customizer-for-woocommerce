<?php
/**
 * Customer Reset Password email
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<div class="top_heading">
    <?php echo get_option( 'ec_yellow_customer_reset_password_heading' ); ?>
</div>

<?php echo get_option( 'ec_yellow_customer_reset_password_main_text' ); ?>

<?php do_action( 'woocommerce_email_footer', $email ); ?>
