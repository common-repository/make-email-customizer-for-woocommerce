<?php
/**
 * Email Styles
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load our settings.
 */

// Background Styling
$back_bg_color	= get_option( 'ec_yellow_all_background_color' ); //"#f7f7f5";

// Email Sizing
$email_width  				= get_option( 'ec_yellow_all_email_width' ); //700px
$email_border_radius		= get_option( 'ec_yellow_all_border_radius' ); //5px

// Header Styling
$header_bg_color				= get_option( 'ec_yellow_all_header_color' );  //"#fdfdfd";
$header_text_color				= wc_light_or_dark( $header_bg_color, wc_hex_darker( $header_bg_color, 55 ), wc_hex_lighter( $header_bg_color, 85 ) );
$header_border_bottom_color		= wc_hex_darker( $header_bg_color, 5 );
$header_logo_alignment			= get_option( 'ec_yellow_all_logo_position' );

// Main Body Styling
$body_bg_color			= get_option( 'ec_yellow_all_page_color' ); //"#ffffff";
$body_color				= get_option( 'ec_yellow_all_text_color' );
$body_accent_color		= get_option( 'ec_yellow_all_text_accent_color' ); //#988255
$body_text_color		= get_option( 'ec_yellow_all_text_color' ); // "#3d3d3d";
$body_text_size 		= 14; //px
$body_letter_spacing	= 0.1; //em
$body_line_height		= get_option( 'ec_yellow_all_line_height' ); //1.3em
$body_border_color		= wc_hex_darker( $back_bg_color, 6 );

$top_nav_bg_color		= wc_hex_darker( $body_bg_color, 2 );
$top_nav_border_color	= wc_hex_darker( $body_bg_color, 4 );

$heading_1_size			= get_option( 'ec_yellow_all_heading_1_size' ); //px

$body_h2_color 			= $body_text_color; //"3d3d3d"
$body_h2_size 			= get_option( 'ec_yellow_all_heading_2_size' ); //px
$body_h2_decoration 	= "none";
$body_h2_style			= "none";
$body_h2_weight			= "normal";
$body_h2_transform		= "uppercase";
$body_h2_border_width	= get_option( 'ec_yellow_all_heading_2_line_width' ); //2px
$body_h2_border_color	= get_option( 'ec_yellow_all_heading_2_line_color' ); //"#000000";

$body_a_color 			= $body_accent_color;
$body_a_decoration 		= "underline";
$body_a_style			= "none";

$body_important_a_color 	= $body_accent_color;
$body_important_a_decoration	= "underline";
$body_important_a_style		= "none";
$body_important_a_size		= "17";
$body_important_a_weight	= "bold";

$body_highlight_color		= $body_accent_color;
$body_highlight_decoration	= "none";
$body_highlight_style		= "none";

// Order Items Table
$order_items_table_outer_border_style		= get_option( 'ec_yellow_all_order_item_table_style' ); //none, dotted, etc;
$order_items_table_outer_border_width		= get_option( 'ec_yellow_all_order_item_table_outer_border_width' ); //0 px
$order_items_table_outer_border_color		= get_option( 'ec_yellow_all_table_outer_border_color' ); //red";

$order_items_table_bg_color					= ( $order_items_table_outer_border_style != 'none' ) ? get_option( 'ec_yellow_all_order_item_table_bg_color' ) : 'none' ; //red";
$order_items_table_text_color				= ( $order_items_table_outer_border_style != 'none' ) ? wc_light_or_dark( $order_items_table_bg_color, 'black', 'white' ) : $body_text_color ;
$order_items_table_outer_border_radius		= ( $order_items_table_outer_border_style != 'none' ) ? get_option( 'ec_yellow_all_order_item_table_radius' ) : '0' ; //3px

$order_items_table_inner_border_width		= 1; //px
$order_items_table_inner_border_style		= get_option( 'ec_yellow_all_border_style' ); //"dotted";
$order_items_table_inner_border_color		= get_option( 'ec_yellow_all_border_color' ); //"#d4d4d4";

// Footer Styling
$footer_bg_color			= $top_nav_bg_color; // get_option( 'ec_yellow_all_footer_color' ); // "#F9F9F5";
$footer_text_color			= wc_light_or_dark( $footer_bg_color, wc_hex_darker( $footer_bg_color, 70 ), wc_hex_lighter( $footer_bg_color, 70 ) );
$footer_border_bottom_color	= wc_hex_darker( $footer_bg_color, 5 );
$footer_a_color				= "#3C3C3C";
$footer_a_decoration		= "none";
$footer_a_style				= "none";


/**
 * Generate CSS.
 */

?>

/* GENERAL STYLES */
body { margin: 0; padding: 0; font-family: Arial, sans-serif; line-height: <?php echo $body_line_height ?>em; }
table, td, tr { font-family: Arial, sans-serif; line-height: <?php echo $body_line_height ?>em; }
table { color: <?php echo $body_text_color ?>; }
p { margin: .6em 0; }
ul { padding-left: 18px; }
li { padding-bottom: 3px; }
h1, h2, h3, h4, h5, h6 { font-family: Arial, sans-serif; color: $body_text_color; }
h2 { font-size: <?php echo $heading_1_size; ?>px; font-weight: bold; }
/* img { vertical-align: text-bottom; } */

a { color: <?php echo $body_text_color ?>; font-style: <?php echo $body_a_style ?>; text-decoration: <?php echo $body_a_decoration ?>; }

.wrapper { font-family: Arial, sans-serif; font-size: <?php echo $body_text_size ?>px; color: <?php echo $body_text_color ?>; background-color: <?php echo esc_attr( $back_bg_color ) ?>; width:100%; -webkit-text-size-adjust:none !important; margin:0; padding: 50px 0 50px 0; }
.wrapper-td { padding: 0 20px 20px; }

.main-body { font-family: Arial, sans-serif; box-shadow: 0 3px 9px rgba(0, 0, 0, 0.03); border-radius: <?php echo $email_border_radius ?>px !important; overflow: hidden; background-color: #ffffff; border: 1px solid <?php echo wc_hex_darker( $back_bg_color, 10 ) ?>; width: <?php echo $email_width ?>px; }

.template_header { font-family: Arial, sans-serif; background-color:<?php echo esc_attr( $header_bg_color ) ?>; color: <?php echo $header_text_color ?>; border-top-left-radius:2px !important; border-top-right-radius:2px !important; border-bottom: 1px solid <?php echo $header_border_bottom_color ?>; font-family:Arial; font-weight:bold; vertical-align:middle; text-align: <?php echo $header_logo_alignment ?>; padding: 16px 18px ; }
.template_header a { color: <?php echo $header_text_color ?> !important; font-weight: normal; text-decoration: none; font-size: 13px; margin: 0 0 0 12px; }

.nav_holder { background: <?php echo $top_nav_bg_color ?>; border-bottom: 1px solid <?php echo $top_nav_border_color ?> !important; }

.top_nav { }
.top_nav tr td { height: 38px; font-size: 14px; }
.top_nav tr td.nav-text-block { padding: 8px 12px;  }
.top_nav tr td.nav-text-block-with-image { padding-left: 0px; }
.top_nav tr td.nav-image-block { padding: 8px 6px; }
.top_nav tr td.nav-spacer-block { padding: 8px 6px; }
.top_nav a { text-decoration: none; }

.bottom-nav {  }
.bottom-nav .top_nav { }
.bottom-nav .top_nav tr td { height: 18px; font-size: 11px; }
.bottom-nav .top_nav tr td.nav-text-block { padding: 2px 6px;  }
.bottom-nav .top_nav tr td.nav-text-block-with-image { padding-left: 0px; }
.bottom-nav .top_nav tr td.nav-image-block { padding: 2px 4px; }
.bottom-nav .top_nav tr td.nav-spacer-block { padding: 2px 0; display: none; font-size: 1px; width: 1px; }
.bottom-nav .top_nav a { text-decoration: none; }

.body_content { font-family: Arial, sans-serif; color: <?php echo $body_color ?>; background-color: <?php echo esc_attr( $body_bg_color ) ?>; }
.body_content_inner { font-family: Arial, sans-serif; font-family:Arial; text-align:left; padding-left: 55px; padding-right: 55px; padding-top: 45px; padding-bottom: 45px; }

/* GENERAL HEADING, TEXT, LINKS */
/* a tags that are body colour with uderline set in the global styles */
.a_tag { color: <?php echo $body_text_color ?>; font-style: <?php echo $body_a_style ?>; text-decoration: <?php echo $body_a_decoration ?>; }
/* a tags that are body colour with no uderline forced on */
.a_tag_clean { color: <?php echo $body_text_color ?>; font-style: <?php echo $body_a_style ?>; text-decoration: none; }
/* a tags that are specific colour with uderline set in the global styles */
.a_tag_color { color: <?php echo $body_a_color ?>; text-decoration: <?php echo $body_a_decoration ?>; font-style: <?php echo $body_a_style ?>; }
/* a tags that are colour with no uderline forced on */
.a_tag_color_clean { color: <?php echo $body_a_color ?>; font-style: <?php echo $body_a_style ?>; text-decoration: none; }
.highlight { color: <?php echo $body_highlight_color ?>; text-decoration: <?php echo $body_highlight_decoration ?>; font-style: <?php echo $body_highlight_style ?>; }

/* SPECIAL TITLE FUNCTION */
.special-title-holder td { font-size: 1px; }
.special-title-holder .header_content_h2 { font-family: Arial,sans-serif; font-weight: <?php echo $body_h2_weight ?>; font-style: <?php echo $body_h2_style ?>; font-size: <?php echo $body_h2_size ?>px; color: <?php echo $body_h2_color ?>; text-decoration: <?php echo $body_h2_decoration ?>; text-transform: <?php echo $body_h2_transform ?>; margin: 0; padding: 0px 5px; white-space: nowrap; }
.special-title-holder .header_content_h2_border { border-top: <?php echo $body_h2_border_width ?>px solid <?php echo $body_h2_border_color ?>; }
.special-title-holder .header_content_h2_space_before { height: 26px; }
.special-title-holder .header_content_h2_space_after { height: 18px; }

/* ORDER TABLE */
.order-table-heading { padding: 0 0 6px; }
.order-table-heading .highlight { color: <?php echo $body_highlight_color ?>; text-decoration: <?php echo $body_highlight_decoration ?>; font-style: <?php echo $body_highlight_style ?>; }
.order-table-heading a { color: <?php echo $body_text_color ?>; font-style: <?php echo $body_a_style ?>; text-decoration: none; }

/* GENERAL COLUMNS (so that columns look nice with more width on left and right tan the gutter) ---------- */
.order_items_table_column_pading { padding-left: 55px; padding-right: 55px; }
.order_items_table_column_pading_first { padding-left: 0px; padding-right: 22.5px; }
.order_items_table_column_pading_last { padding-left: 22.5px; padding-right: 0px; }

/* INTRO CONTENT */
.top_content_container { padding: 10px 0 22px 0; }
.top_heading { font-family: Arial, sans-serif; font-size: <?php echo $heading_1_size; ?>px; text-align: left; font-weight: bold; }
.top_paragraph { font-family: Arial, sans-serif; text-align: left; margin: 9px 0; }
h2 { font-family: Arial, sans-serif; font-size: <?php echo $heading_1_size ?>px; text-align: left; font-weight: bold; }

/* PAYMENT GATEWAY OPTIONS */
.pay_link { font-size: <?php echo $body_important_a_size ?>px; font-weight: <?php echo $body_important_a_weight ?>; font-style: <?php echo $body_important_a_style ?>; color: <?php echo $body_important_a_color ?>; text-decoration: <?php echo $body_important_a_decoration ?>; }

/* ORDER ITEMS TABLE */
.order_items_table > table { margin: 15px 0; overflow: hidden; width: 100%; color: <?php echo $order_items_table_text_color; ?>; background: <?php echo $order_items_table_bg_color ?>; }
.order_items_table p { margin: 2px 0; }
.order_items_table a { color: <?php echo $order_items_table_text_color; ?>; }
.order_items_table ul { display: block; margin: 0; padding: 0; }
.order_items_table ul li { list-style: none; margin: 0; padding: 0 0 3px; }
.order_items_table table { color: <?php echo $order_items_table_text_color; ?>; }
<?php if ( isset( $order_items_table_outer_border_radius ) && $order_items_table_outer_border_radius > 0 ) { ?>
	.order_items_table > table { border-radius: <?php echo $order_items_table_outer_border_radius ?>px; }
<?php } ?>

	/* ORDER ITEMS */
	.order_items_table > table > thead > tr > th,
	.order_items_table > table > tbody > tr > td,
	.order_items_table > table > tfoot > tr > td,
	.order_items_table > table > tfoot > tr > th { font-family: Arial, sans-serif; text-align:left; vertical-align:middle; word-wrap:break-word; font-size: 14px; padding: 15px 12px; border-top:<?php echo $order_items_table_inner_border_width ?>px <?php echo $order_items_table_inner_border_style ?> <?php echo $order_items_table_inner_border_color ?>; }
	.order_items_table > table > thead > tr > th { font-family: Arial, sans-serif; text-align: left; text-transform: uppercase; font-size: 10px; font-weight: normal; padding-top:7px; padding-bottom:7px; margin:0; line-height: .8em; }

	/* ORDER ITEMS - TOTALS */
	.order_items_table > table > tfoot > tr > th,
	.order_items_table > table > tfoot > tr > td { padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif; text-align: left; text-transform: uppercase; font-size: 14px; line-height: 1em; }
	
	/* ORDER ITEMS (td's whether it has Border or not and then handle the padding) */
<?php
if ( $order_items_table_outer_border_style != 'none' && $order_items_table_outer_border_width != 0 ) {
	?>
		/* ORDER ITEMS - WITH OUTER BORDER */
		.order_items_table > table { border-bottom: <?php echo $order_items_table_outer_border_width ?>px <?php echo $order_items_table_outer_border_style ?> <?php echo $order_items_table_outer_border_color ?>; border-left: <?php echo $order_items_table_outer_border_width ?>px <?php echo $order_items_table_outer_border_style ?> <?php echo $order_items_table_outer_border_color ?>; border-right: <?php echo $order_items_table_outer_border_width ?>px <?php echo $order_items_table_outer_border_style ?> <?php echo $order_items_table_outer_border_color ?>; border-bottom: <?php echo $order_items_table_outer_border_width ?>px <?php echo $order_items_table_outer_border_style ?> <?php echo $order_items_table_outer_border_color ?>; }
		.order_items_table > table > thead > tr > th { border-top: <?php echo $order_items_table_outer_border_width ?>px <?php echo $order_items_table_outer_border_style ?> <?php echo $order_items_table_outer_border_color ?>; }
	<?php
}
else{
	?>
		/* ORDER ITEMS - WITHOUT OUTER BORDER */
		.order_items_table > table { border-bottom: <?php echo $order_items_table_inner_border_width ?>px <?php echo $order_items_table_inner_border_style ?> <?php echo $order_items_table_inner_border_color ?>; }
		.order_items_table > table > thead > tr > th:first-child,
		.order_items_table > table > tbody > tr > td:first-child,
		.order_items_table > table > tfoot > tr > th,
		.order_items_table > table > tfoot > tr > td:first-child { padding-left:0px; }
		.order_items_table > table > thead > tr > th:last-child,
		.order_items_table > table > tbody > tr > td:last-child,
		.order_items_table > table > tfoot > tr > td { padding-right:0px; }
	<?php
}
?>

	/* ORDER ITEMS - PRODUCT */
	.order_items_table > table > tbody > tr > td.order_items_table_td_product { vertical-align: top; }

		/* ORDER ITEMS TABLE - PRODUCT DETAILS */
		.order_items_table_product_details_inner {  }
		.order_items_table_product_details_inner { font-size: 13px; vertical-align: top; }
		.order_items_table_product_details_inner td.order_items_table_product_details_inner_td_image { padding-right: 15px; }
		.order_items_table_product_details_inner td.order_items_table_product_details_inner_td_text {  }
		.order_items_table_product_details_inner td.order_items_table_product_details_inner_td_text strong { font-weight: normal; }
		.order_items_table_product_details_inner img { border-radius: 3px; padding: 0; margin: 0; }
		.order_items_table_product_details_inner .order_items_table_product_details_inner_title { font-weight: bold; font-size: 15px; padding-bottom: 3px; }
		.order_items_table_product_details_inner small {  }

	/* ORDER ITEMS - NOTE */
	.order_items_table > table > tfoot > tr > td:first-child { text-align: left; width: 100%; line-height: 1.5em; padding-top: 15px; padding-bottom: 15px; text-transform: none; }

    
/* ORDER OTHER TABLES */
.order_other_table_holder > table { border: 0; margin: 15px 0; overflow: hidden; width: 100%; color: <?php echo $order_items_table_text_color; ?>; background: <?php echo $order_items_table_bg_color ?>; }
.order_other_table_holder > table a { color: <?php echo $order_items_table_text_color; ?>; }
.order_other_table_holder > table ul { 	display: block; margin: 0; padding: 0; }
.order_other_table_holder > table ul li { list-style: none; margin: 0; padding: 0 0 3px; }
.order_other_table_holder > table table { color: <?php echo $order_items_table_text_color; ?>; }
<?php if ( isset( $order_items_table_outer_border_radius ) && $order_items_table_outer_border_radius > 0 ) { ?>
	.order_other_table_holder > table { border-radius: <?php echo $order_items_table_outer_border_radius ?>px; }
<?php } ?>

	/* ORDER ITEMS */
	.order_other_table_holder > table > thead > tr > th,
	.order_other_table_holder > table > tr > th,
	.order_other_table_holder > table > tbody > tr > td,
	.order_other_table_holder > table > tr > td,
	.order_other_table_holder > table > tfoot > tr > td,
	.order_other_table_holder > table > tfoot > tr > th { font-family: Arial, sans-serif; text-align:left; vertical-align:middle; word-wrap:break-word; font-size: 14px; padding: 15px 12px; border-top:<?php echo $order_items_table_inner_border_width ?>px <?php echo $order_items_table_inner_border_style ?> <?php echo $order_items_table_inner_border_color ?>; }
	.order_other_table_holder > table > thead > tr > th,
	.order_other_table_holder > table > tr > th { font-family: Arial, sans-serif; text-align: left; text-transform: uppercase; font-size: 10px; font-weight: normal; padding-top:7px; padding-bottom:7px; margin:0; line-height: .8em; }
	
	/* ORDER ITEMS (td's whether it has Border or not and then handle the padding) */
	<?php
	if ( $order_items_table_outer_border_style != 'none' && $order_items_table_outer_border_width != 0 ) {
		?>
		/* ORDER ITEMS - WITH OUTER BORDER */
		.order_other_table_holder > table { border-bottom: <?php echo $order_items_table_outer_border_width ?>px <?php echo $order_items_table_outer_border_style ?> <?php echo $order_items_table_outer_border_color ?>; border-left: <?php echo $order_items_table_outer_border_width ?>px <?php echo $order_items_table_outer_border_style ?> <?php echo $order_items_table_outer_border_color ?>; border-right: <?php echo $order_items_table_outer_border_width ?>px <?php echo $order_items_table_outer_border_style ?> <?php echo $order_items_table_outer_border_color ?>; border-bottom: <?php echo $order_items_table_outer_border_width ?>px <?php echo $order_items_table_outer_border_style ?> <?php echo $order_items_table_outer_border_color ?>; }
		.order_other_table_holder > table > thead > tr > th,
		.order_other_table_holder > table > tr > th { border-top: <?php echo $order_items_table_outer_border_width ?>px <?php echo $order_items_table_outer_border_style ?> <?php echo $order_items_table_outer_border_color ?>; }
		<?php
	}
	else{
		?>
		/* ORDER ITEMS - WITHOUT OUTER BORDER */
		.order_other_table_holder > table { border-bottom: <?php echo $order_items_table_inner_border_width ?>px <?php echo $order_items_table_inner_border_style ?> <?php echo $order_items_table_inner_border_color ?>; }
		.order_other_table_holder > table > thead > tr > th:first-child,
		.order_other_table_holder > table > tr > th:first-child,
		.order_other_table_holder > table > tbody > tr > td:first-child,
		.order_other_table_holder > table > tr > td:first-child,
		.order_other_table_holder > table > tfoot > tr > th,
		.order_other_table_holder > table > tfoot > tr > td:first-child { padding-left:0px; }
		.order_other_table_holder > table > thead > tr > th:last-child,
		.order_other_table_holder > table > tr > th:last-child,
		.order_other_table_holder > table > tbody > tr > td:last-child,
		.order_other_table_holder > table > tr > td:last-child,
		.order_other_table_holder > table > tfoot > tr > td { padding-right:0px; }
		<?php
	}
	?>

/* ORDER OTHER TABLES - WC DOWNLOADS */
.order_other_table_holder_downloads > table td:first-child { font-weight: bold; }
.order_other_table_holder_downloads > table td:first-child a { text-decoration: none; }
.order_other_table_holder_downloads > table td:last-child a { font-style: italic; color: <?php echo $body_highlight_color ?>; }


/* ADDRESSES */
#addresses {}
#addresses address { font-style: normal; }
#addresses address p { margin: 0; }


/* FOOTER */
.footer_container { font-family: Arial,sans-serif; font-size: 12px; text-align: center; padding: 12px 22.5px 16px; border-top: 1px solid <?php echo $footer_border_bottom_color ?>; color: <?php echo $footer_text_color ?>; background-color: <?php echo $footer_bg_color ?>; }
.footer_container_inner { font-family: Arial,sans-serif; font-size: 12px; color: <?php echo $footer_text_color ?>; }
.footer_a_tag { color: <?php echo $footer_a_color ?>; text-decoration: <?php echo $footer_a_decoration ?>; }

/* CUSTOM CSS */
<?php echo wp_strip_all_tags( get_option( 'ec_yellow_all_custom_css' ) ); ?>

/* RESPONSIVE */
@media screen and ( max-width: <?php echo $email_width + 60 ?>px ) {
	
	.main-body { width: 100% !important; }
	.nav-text-block { padding-left: 6px !important; padding-right: 6px !important; }
}
@media screen and ( max-width: 640px ) {
	
	.addresses-td { display: block; width: 100%; padding: 0 0 6px 0 !important; }
}

/* ADMIN STYLES */
.testing-block { padding:8px 10px; color: rgb(59, 59, 59); box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.07) inset; font-family: sans-serif; font-size:11px; margin: 0 auto 4px; text-shadow: 0 0px 3px rgba(255, 255, 255, 0.54); display: inline-block; }
.state-guide { font-size: 10px; color: #AEAEAE; margin: 0; padding: 6px 0; text-transform: uppercase; }
.shortcode-error { color: #FFF; font-size: 12px; background-color: #545454; border-radius: 3px; padding: 2px 6px 1px; }
