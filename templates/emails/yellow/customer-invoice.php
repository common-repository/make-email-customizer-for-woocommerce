<?php
/**
 * Customer invoice email
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php if ( $order->has_status( 'pending' ) || isset( $_REQUEST['ec_render_email'] ) ) { ?>

	<div class="top_heading">
		<?php echo get_option( 'ec_yellow_customer_invoice_heading_pending' ); ?>
	</div>
	
	<?php echo get_option( 'ec_yellow_customer_invoice_main_text_pending' ); ?>
	
	<?php if ( isset( $_REQUEST['ec_render_email'] ) ) { ?>
		<p class="state-guide">
			▲ <?php _e( "Payment Pending", 'make' ) ?>
		<p>
	<?php } ?>
	
<?php } ?>

<?php if ( ! $order->has_status( 'pending' ) || isset( $_REQUEST['ec_render_email'] ) ) { ?>
	
	<div class="top_heading">
		<?php echo get_option( 'ec_yellow_customer_invoice_heading_complete' ); ?>
	</div>
	
	<?php echo get_option( 'ec_yellow_customer_invoice_main_text_complete' ); ?>
	
	<?php if ( isset( $_REQUEST['ec_render_email'] ) ) { ?>
		<p class="state-guide">
			▲ <?php _e( "Payment Complete", 'make' ) ?>
		<p>
	<?php } ?>

<?php } ?>

<?php
/**
 * @hooked WC_Emails::order_details() yellows the order details table.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::order_meta() yellows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::customer_details() yellows customer details
 * @hooked WC_Emails::email_address() yellows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
