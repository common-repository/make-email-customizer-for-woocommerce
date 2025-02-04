<?php
/**
 * Email Order Items
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text_align = is_rtl() ? 'right' : 'left';

foreach ( $items as $item_id => $item ) :
	$product = $item->get_product();
	$sku           = '';
	$purchase_note = '';
	$image         = '';
	
	if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
		continue;
	}
	
	if ( is_object( $product ) ) {
		$sku           = $product->get_sku();
		$purchase_note = $product->get_purchase_note();
		$image         = $product->get_image( $image_size );
	}
	
	?>
	<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
		<td class="order_items_table_td_product">
			
			<table class="order_items_table_product_details_inner" cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<?php
					// yellow title/image etc.
					$yellow_image = ( 'yes' == get_option( 'ec_yellow_all_order_item_table_thumbnail' ) );
					if ( $yellow_image && is_object( $product ) && $product->get_image_id() ) {
						?>
						<td class="order_items_table_product_details_inner_td_image">
							<?php echo wp_kses_post( apply_filters( 'woocommerce_order_item_thumbnail', $image, $item ) ); ?>
						</td>
						<?php
					}
					?>
					<td class="order_items_table_product_details_inner_td_text" width="100%">
						
						<div class="order_items_table_product_details_inner_title">
							<?php
							// Product name.
							echo wp_kses_post( apply_filters( 'woocommerce_order_item_name', $item->get_name(), $item, false ) );
							
							// SKU.
							if ( $yellow_sku && $sku ) {
								echo wp_kses_post( ' (#' . $sku . ')' );
							}
							?>
						</div>
						
						<?php
						// allow other plugins to add additional product information here.
						do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order, $plain_text );
						
						// Variation/Meta
						echo wc_display_item_meta(
							$item,
							array(
							    'before'    => '<div class="wc-item-meta"><div>',
							    'separator'	=> '</div><div>',
							    'after'		=> '</div></div>',
							    'echo'		=> false,
							    'autop'		=> false,
						    )
						);
			
						// File URLs
						// WC 3.2.0 does this by hooking the `email-downloads.php` template to `woocommerce_email_order_details`.
						if ( version_compare( WC()->version, '3.2.0', '<' ) ) {
							if ( $yellow_download_links ) {
								wc_display_item_downloads( $item );
							}
						}
						
						// allow other plugins to add additional product information here
						// plain_text check is required as was only passed as an arg to `order-items` since WC2.5.4
						do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order, $plain_text );
						?>
						
					</td>
				</tr>
			</table>
			
		</td>
		<td class="order_items_table_td_product">
			<?php echo wp_kses_post( apply_filters( 'woocommerce_email_order_item_quantity', $item->get_quantity(), $item ) ); ?>
		</td>
		<td class="order_items_table_td_product" style="text-align:right">
			<?php echo wp_kses_post( $order->get_formatted_line_subtotal( $item ) ); ?>
		</td>
	</tr>
	<?php

	if ( $yellow_purchase_note && $purchase_note ) {
		?>
		<tr>
			<td colspan="3" class="order_items_table_td_product">
				<?php
				echo wp_kses_post( wpautop( do_shortcode( $purchase_note ) ) );
				?>
			</td>
		</tr>
		<?php
	}
	?>

<?php endforeach; ?>
