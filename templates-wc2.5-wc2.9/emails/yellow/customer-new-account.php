<?php
/**
 * Customer new account email
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<div class="top_heading">
    <?php echo get_option( 'ec_yellow_customer_new_account_heading' ); ?>
</div>
    
<?php echo get_option( 'ec_yellow_customer_new_account_main_text' ); ?>

<?php if ( ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) || isset( $_REQUEST['ec_render_email'] ) ) : ?>
    
    <?php echo get_option( 'ec_yellow_customer_new_account_main_text_generate_pass' ); ?>
    
    <?php if ( isset( $_REQUEST['ec_render_email'] ) ) { ?>
        <p class="state-guide">
            ▲ <?php _e( "If admin sets auto generated passwords", 'make' ) ?>
        <p>
    <?php } ?>
        
<?php endif; ?>

<?php do_action( 'woocommerce_email_footer', $email ); ?>
