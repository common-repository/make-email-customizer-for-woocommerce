<?php
/**
 * Additional Customer Details
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<?php if ( ! empty( $fields ) ) : ?>
	<?php echo ec_special_title( __( "Customer details", 'make'), array("border_position" => "center", "text_position" => "center") ); ?>
	
	<?php foreach ( $fields as $field ) : ?>
		<p><strong><?php echo wp_kses_post( $field['label'] ); ?>:</strong> <span class="text"><?php echo wp_kses_post( $field['value'] ); ?></span></p>
	<?php endforeach; ?>
<?php endif; ?>
