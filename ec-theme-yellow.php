<?php
/**
 * Yellow - Email Theme
 * Themes allow enhanced customization and editing of WooCommerce store emails.
 */

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Instantiate plugin.
 */
$GLOBALS['WC_Email_Theme_Yellow'] = new WC_Email_Theme_Yellow();

/**
 *
 * Main Class.
 */
class WC_Email_Theme_Yellow {
	
	// Id
	public $id = 'yellow';
	
	// Name
	public $name = 'Yellow';
	
	// Description
	public $description = '';
	
	// Folder name
	public $folder_name;
	
	/*
	*  Constructor
	*
	*  Construct all the all the neccessary actions, filters and functions for the plugin
	*
	*  @date	20-08-2014
	*  @since	1.0
	*
	*/
	public function __construct() {
		
		// Set Constants.
		$folder_name = basename( __DIR__ );
		
		// Register Email Theme.
		add_action( 'register_email_theme',	array( $this, 'register_email_theme' ) );
		
		// Register template functions.
		add_action( 'ec_before_get_email_template_' . $this->id, array( $this, 'register_template_functions' ) );
	}
	
	/**
	 * Register Email Theme
	 *
	 * @date	20-08-2014
	 * @since	1.0
	 */
	public function register_email_theme() {
		
		ec_register_email_theme(
			$this->id,
			array(
				'name'                         => $this->name,
				'description'                  => $this->description,
				'template_folder'              => WC_EMAIL_CONTROL_DIR . '/templates',
				'sections'                     => $this->get_sections(),
				'settings'                     => $this->get_settings(),
				'woocoomerce_required_version' => '2.2',
			)
		);
	}
	
	public function get_sections() {
		
		$sections = array(
			array(
				"name" => __( "Text", 'make' ),
				"id"   => "text_section",
				"desc" => "",
				"tip"  => "",
			),
			array(
				"name" => __( "Appearance", 'make' ),
				"id"   => "appearance_section",
				"desc" => "",
				"tip"  => "",
			),
			array(
				"name" => __( "Header", 'make' ),
				"id"   => "header_section",
				"desc" => "",
				"tip"  => "",
			),
			array(
				"name" => __( "Links", 'make' ),
				"id"   => "links_section",
				"desc" => "",
				"tip"  => "",
			),
			array(
				"name" => __( "Section Headings", 'make' ),
				"id"   => "section_headings_section",
				"desc" => "",
				"tip"  => "",
			),
			array(
				"name" => __( "Order Items Table", 'make' ),
				"id"   => "order_items_table_section",
				"desc" => "",
				"tip"  => "",
			),
			array(
				"name" => __( "Footer", 'make' ),
				"id"   => "footer_section",
				"desc" => "",
				"tip"  => "",
			),
			array(
				"name" => __( "Custom CSS", 'make' ),
				"id"   => "custom_css_section",
				"desc" => "",
				"tip"  => "",
			),
		);
		
		return $sections;
	}
	
	/**
	 * Get Settings
	 *
	 * @date	20-08-2014
	 * @since	1.0
	 */
	public function get_settings() {
		
		// Types
		// title, sectionend, text, email, number, color, password,
		// textarea, select, multiselect, radio, checkbox, image_width,
		// single_select_page, single_select_country, multi_select_countries
		
		$settings = array(
			
			
			
			// New Order (new_order, admin-new-order.php)
			array(
				"name"    => __( "Heading", 'make' ),
				"id"      => "heading",
				"type"    => "textarea",
				"default" => __( "New order received!", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "new_order",
				"css"     => "height:47px;",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text",
				"type"    => "textarea",
				"default" => __( "You have received an order from [ec_firstname] [ec_lastname].\n\nTheir order is as follows: [ec_order]", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "new_order",
				"section" => "text_section",
			),
			
			
			
			
			// Cancelled Order (cancelled_order, admin-cancelled-order.php)
			array(
				"name"    => __( "Heading", 'make' ),
				"id"      => "heading",
				"type"    => "textarea",
				"default" => __( "Cancelled order", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "cancelled_order",
				"css"     => "height:47px;",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text",
				"type"    => "textarea",
				"default" => __( "The order [ec_order] for [ec_firstname] [ec_lastname] has been cancelled.", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "cancelled_order",
				"section" => "text_section",
			),
			
			
			
			
			// Failed Order (failed_order, admin-failed-order.php)
			array(
				"name"    => __( "Heading", 'make' ),
				"id"      => "heading",
				"type"    => "textarea",
				"default" => __( "Failed order", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "failed_order",
				"css"     => "height:47px;",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text",
				"type"    => "textarea",
				"default" => __( "Payment for order [ec_order] from [ec_firstname] [ec_lastname] has failed.", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "failed_order",
				"section" => "text_section",
			),
			
			
			
			
			// On-hold Order (customer_on_hold_order, customer-on-hold-order.php)
			array(
				"name"    => __( "Heading", 'make' ),
				"id"      => "heading",
				"type"    => "textarea",
				"default" => __( "Thank you for your order", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_on_hold_order",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text",
				"type"    => "textarea",
				"default" => __( "Your order is on-hold until we confirm payment has been received. Your order details are shown below for your reference:", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_on_hold_order",
				"section" => "text_section",
			),
			
			
			
			
			// Processing Order (customer_processing_order, customer-processing-order.php)
			array(
				"name"    => __( "Heading", 'make' ),
				"id"      => "heading",
				"type"    => "textarea",
				"default" => __( "Your order is being processed", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_processing_order",
				"css"     => "height:47px;",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text",
				"type"    => "textarea",
				"default" => __( "Your order [ec_order] has been received and is now being processed.", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_processing_order",
				"section" => "text_section",
			),
			
			
			
			
			// Completed Order (customer_completed_order, customer-completed-order.php)
			array(
				"name"    => __( "Heading", 'make' ),
				"id"      => "heading",
				"type"    => "textarea",
				"default" => __( "Your order is complete", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_completed_order",
				"css"     => "height:47px;",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text",
				"type"    => "textarea",
				"default" => __( "Your order [ec_order] at [ec_site_name] has been completed.\n\nWe're just letting you know. No further action is required.", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_completed_order",
				"section" => "text_section",
			),
			
			
			
			
			// Refunded Order - full (customer_refunded_order, customer-refunded-order.php)
			array(
				"name"    => __( "Heading (full)", 'make' ),
				"id"      => "heading_full",
				"type"    => "textarea",
				"default" => __( "Your order has been refunded", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_refunded_order",
				"css"     => "height:47px;",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text_full",
				"type"    => "textarea",
				"default" => __( "Your order [ec_order] has been refunded. Thanks", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_refunded_order",
				"section" => "text_section",
			),
			
			// Refunded Order - partial (customer_refunded_order, customer-refunded-order.php)
			array(
				"name"    => __( "Heading (partial)", 'make' ),
				"id"      => "heading_partial",
				"type"    => "textarea",
				"default" => __( "You have been partially refunded", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_refunded_order",
				"css"     => "height:47px;",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text_partial",
				"type"    => "textarea",
				"default" => __( "Your order [ec_order] has been partially refunded. Thanks", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_refunded_order",
				"section" => "text_section",
			),
			
			
			
			
			// Customer Invoice - payment pending (customer_invoice, customer-invoice.php)
			array(
				"name"    => __( "Heading (payment pending)", 'make' ),
				"id"      => "heading_pending",
				"type"    => "textarea",
				"default" => __( "Invoice for order [ec_order]", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_invoice",
				"css"     => "height:47px;",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text_pending",
				"type"    => "textarea",
				"default" => __( "Thanks for your order on [ec_site_link].\n\nTo pay for this order please use the following link: [ec_pay_link]", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_invoice",
				"section" => "text_section",
			),
			
			// Customer Invoice - payment complete (customer_invoice, customer-invoice.php)
			array(
				"name"    => __( "Heading (payment complete)", 'make' ),
				"id"      => "heading_complete",
				"type"    => "textarea",
				"default" => __( "Invoice for order [ec_order]", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_invoice",
				"css"     => "height:47px;",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text_complete",
				"type"    => "textarea",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_invoice",
				"section" => "text_section",
			),
			
			
			
			
			// Customer Note (customer_note, customer-note.php)
			array(
				"name"    => __( "Heading", 'make' ),
				"id"      => "heading",
				"type"    => "textarea",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_note",
				"css"     => "height:47px;",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text",
				"type"    => "textarea",
				"default" => __( "[ec_customer_note]", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_note",
				"section" => "text_section",
			),
			
			
			
			
			// Reset Password (customer_reset_password, customer-reset-password.php)
			array(
				"name"    => __( "Heading", 'make' ),
				"id"      => "heading",
				"type"    => "textarea",
				"default" => __( "Password Reset", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_reset_password",
				"css"     => "height:47px;",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text",
				"type"    => "textarea",
				"default" => __( "Someone requested that the password be reset for the following account:\n[ec_user_login]\n\nIf this was a mistake, just ignore this email and nothing will happen.\n\nTo reset your password, visit the following address:\n[ec_reset_password_link]", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_reset_password",
				"section" => "text_section",
			),
			
			
			
			
			// New Account (customer_new_account, customer-new-account.php)
			array(
				"name"    => __( "Heading", 'make' ),
				"id"      => "heading",
				"type"    => "textarea",
				"default" => __( "Your account has been created", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_new_account",
				"css"     => "height:47px;",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Main Text", 'make' ),
				"id"      => "main_text",
				"type"    => "textarea",
				"default" => __( "Thanks for creating an account on [ec_site_name].\nYour username is: [ec_user_login].\n\nYou can access your account area to view your orders and change your password here: [ec_account_link]", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_new_account",
				"section" => "text_section",
			),
			array(
				"name"    => __( "Password Regenerated Text", 'make' ),
				"id"      => "main_text_generate_pass",
				"type"    => "textarea",
				"default" => __( "Your password has been automatically generated: [ec_user_password]", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "customer_new_account",
				"section" => "text_section",
			),
			
			
			
			
			// all
			
			array(
				"name"    => __( "Email Width", 'make' ),
				"id"      => "email_width",
				"type"    => "number",
				"default" => "800",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "appearance_section",
			),
			
			array(
				"name"    => __( "Border Radius", 'make' ),
				"id"      => "border_radius",
				"type"    => "number",
				"default" => "5",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "appearance_section",
			),
			
			array(
				"name"    => __( "Header Color", 'make' ),
				"id"      => "header_color",
				"type"    => "color",
				"default" => "#fbda1c",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "appearance_section",
			),
			
			// array(
			// 	"name"    => __( "Footer Color", 'make' ),
			// 	"id"      => "footer_color",
			// 	"type"    => "color",
			// 	"default" => "#e9e8e6",
			// 	"desc"    => "",
			// 	"tip"     => "",
			// 	"email-type" => "all",
			// 	"class"   => "ec-half",
			// 	"section" => "appearance_section",
			// ),
			
			array(
				"name"    => __( "Page Color", 'make' ),
				"id"      => "page_color",
				"type"    => "color",
				"default" => "#ffffff",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "appearance_section",
			),
			
			array(
				"name"    => __( "Background Color", 'make' ),
				"id"      => "background_color",
				"type"    => "color",
				"default" => "#e8e8e8",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "appearance_section",
			),
			
			array(
				"name"    => __( "Text Color", 'make' ),
				"id"      => "text_color",
				"type"    => "color",
				"default" => "#666666",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "appearance_section",
			),
			
			array(
				"name"    => __( "Text Accent Color", 'make' ),
				"id"      => "text_accent_color",
				"type"    => "color",
				"default" => "#ad3400",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "appearance_section",
			),
			
			array(
				"name"    => __( "Main Heading size", 'make' ),
				"id"      => "heading_1_size",
				"type"    => "number",
				"default" => "22",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "appearance_section",
			),
			
			array(
				"name"    => __( "Text Line Height", 'make' ),
				"id"      => "line_height",
				"type"    => "number",
				"default" => "1.3",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "appearance_section",
			),
			
			
			
			
			array(
				"name"    => __( "Logo Position", 'make' ),
				"id"      => "logo_position",
				"type"    => "select",
				"options" => array(
					"left"   => "Left",
					"center" => "Center",
				),
				"default" => "left",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"size"    => "full",
				"section" => "header_section",
			),
			
			array(
				"name"    => __( "Logo", 'make' ),
				"id"      => "header_logo",
				"type"    => "image_upload",
				"default" => plugin_dir_url( __FILE__ ) . '/assets/images/logo.png',
				"desc"    => __( "Enter a URL or upload an image", 'make' ),
				"tip"     => "",
				"email-type" => "all",
				"section" => "header_section",
			),
			
			
			
			
			
			array(
				"name"    => __( "Link 1 Text", 'make' ),
				"id"      => "link_1_text",
				"type"    => "text",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			array(
				"name"    => __( "Link 1 URL", 'make' ),
				"id"      => "link_1_url",
				"type"    => "text",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			array(
				"name"    => __( "Link 1 Image", 'make' ),
				"id"      => "link_1_image",
				"type"    => "image_upload",
				"default" => "",
				"desc"    => __( "Enter a URL or upload an image", 'make' ),
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			
			
			
			array(
				"name"    => __( "Link 2 Text", 'make' ),
				"id"      => "link_2_text",
				"type"    => "text",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			array(
				"name"    => __( "Link 2 URL", 'make' ),
				"id"      => "link_2_url",
				"type"    => "text",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			array(
				"name"    => __( "Link 2 Image", 'make' ),
				"id"      => "link_2_image",
				"type"    => "image_upload",
				"default" => "",
				"desc"    => __( "Enter a URL or upload an image", 'make' ),
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			
			
			
			array(
				"name"    => __( "Link 3 Text", 'make' ),
				"id"      => "link_3_text",
				"type"    => "text",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			array(
				"name"    => __( "Link 3 URL", 'make' ),
				"id"      => "link_3_url",
				"type"    => "text",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			array(
				"name"    => __( "Link 3 Image", 'make' ),
				"id"      => "link_3_image",
				"type"    => "image_upload",
				"default" => "",
				"desc"    => __( "Enter a URL or upload an image", 'make' ),
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			
			
			
			array(
				"name"    => __( "Link 4 Text", 'make' ),
				"id"      => "link_4_text",
				"type"    => "text",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			array(
				"name"    => __( "Link 4 URL", 'make' ),
				"id"      => "link_4_url",
				"type"    => "text",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			array(
				"name"    => __( "Link 4 Image", 'make' ),
				"id"      => "link_4_image",
				"type"    => "image_upload",
				"default" => "",
				"desc"    => __( "Enter a URL or upload an image", 'make' ),
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			
			
			
			array(
				"name"    => __( "Link 5 Text", 'make' ),
				"id"      => "link_5_text",
				"type"    => "text",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			array(
				"name"    => __( "Link 5 URL", 'make' ),
				"id"      => "link_5_url",
				"type"    => "text",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			array(
				"name"    => __( "Link 5 Image", 'make' ),
				"id"      => "link_5_image",
				"type"    => "image_upload",
				"default" => "",
				"desc"    => __( "Enter a URL or upload an image", 'make' ),
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			
			
			
			array(
				"name"    => __( "Link 6 Text", 'make' ),
				"id"      => "link_6_text",
				"type"    => "text",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			array(
				"name"    => __( "Link 6 URL", 'make' ),
				"id"      => "link_6_url",
				"type"    => "text",
				"default" => "",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			array(
				"name"    => __( "Link 6 Image", 'make' ),
				"id"      => "link_6_image",
				"type"    => "image_upload",
				"default" => "",
				"desc"    => __( "Enter a URL or upload an image", 'make' ),
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-condensed",
				"section" => "links_section",
			),
			
			
			
			
			
			array(
				"name"    => __( "Font Size", 'make' ),
				"id"      => "heading_2_size",
				"type"    => "number",
				"default" => "14",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "section_headings_section",
			),
			
			array(
				"name"    => __( "Line Width", 'make' ),
				"id"      => "heading_2_line_width",
				"type"    => "number",
				"default" => "1",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "section_headings_section",
			),
			
			array(
				"name"    => __( "Line Color", 'make' ),
				"id"      => "heading_2_line_color",
				"type"    => "color",
				"default" => "#c6c6c6",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "section_headings_section",
			),
			
			
			
			
			
			array(
				"name"    => __( "Divider Style", 'make' ),
				"id"      => "border_style",
				"type"    => "select",
				"options" => array(
					"none"   => "None",
					"solid"  => "Solid",
					"dotted" => "Dotted",
					"dashed" => "Dashed",
				),
				"default" => "dotted",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"size"    => "full",
				"section" => "order_items_table_section",
			),
			
			array(
				"name"    => __( "Divider Color", 'make' ),
				"id"      => "border_color",
				"type"    => "color",
				"default" => "#c9c9c9",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "order_items_table_section",
			),
			
			array(
				"name"    => __( "Divider Width", 'make' ),
				"id"      => "border_width",
				"type"    => "number",
				"default" => "1",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "order_items_table_section",
			),
			
			array(
				"name"    => __( "Table Border Style", 'make' ),
				"id"      => "order_item_table_style",
				"type"    => "select",
				"options" => array(
					"none"   => "None",
					"solid"  => "Solid",
					"dotted" => "Dotted",
					"dashed" => "Dashed",
				),
				"default" => "none",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"size"    => "full",
				"section" => "order_items_table_section",
			),
			
			array(
				"name"    => __( "Border Color", 'make' ),
				"id"      => "table_outer_border_color",
				"type"    => "color",
				"default" => "#c9c9c9",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "order_items_table_section",
			),
			
			array(
				"name"    => __( "Border Width", 'make' ),
				"id"      => "order_item_table_outer_border_width",
				"type"    => "number",
				"default" => "1",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "order_items_table_section",
			),
			
			array(
				"name"    => __( "Border Radius", 'make' ),
				"id"      => "order_item_table_radius",
				"type"    => "number",
				"default" => "4",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "order_items_table_section",
			),
			
			array(
				"name"    => __( "Background Color", 'make' ),
				"id"      => "order_item_table_bg_color",
				"type"    => "color",
				"default" => "#ffffff",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "order_items_table_section",
			),
			
			array(
				"name"    => __( "Product Images", 'make' ),
				"id"      => "order_item_table_thumbnail",
				"type"    => 'checkbox',
				"default" => 'yes',
				"desc"    => '',
				"tip"     => '',
				"email-type" => "all",
				"class"   => "ec-half",
				"section" => "order_items_table_section",
			),
			
			
			
			
			
			
			
			
			
			array(
				"name"    => __( "Footer Left Image", 'make' ),
				"id"      => "footer_left_image",
				"type"    => "image_upload",
				"default" => plugin_dir_url( __FILE__ ) . '/assets/images/logo.png',
				"desc"    => __( "Enter a URL or upload an image", 'make' ),
				"tip"     => "",
				"email-type" => "all",
				"section" => "footer_section",
			),
			
			array(
				"name"    => __( "Footer Text", 'make' ),
				"id"      => "footer_text",
				"type"    => "textarea",
				"default" => __( "[ec_site_name] – Powered by WooCommerce", 'make' ),
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"css"     => "height:47px;",
				"section" => "footer_section",
			),
			
			
			
			array(
				"name"    => "",
				"id"      => "custom_css",
				"type"    => "textarea",
				"default" => ".example-class { color: #d11d38; }",
				"desc"    => "",
				"tip"     => "",
				"email-type" => "all",
				"css"     => "height:200px;",
				"section" => "custom_css_section",
			),
		
		
		
		);
		
		return $settings;
	}
	
	/**
	 * Register specific template functions.
	 */
	public function register_template_functions() {
		
		/**
		 * EC Special Title
		 */
		if ( ! function_exists( 'ec_special_title' ) ) :
			function ec_special_title( $pass_heading_text, $args ) {
				
				$defaults = array (
					'text_position'		=> 'left',	// text_position = center, left, right
					'border_position'	=> 'right',	// border_position = center, bottom, none
				);
				
				// Parse incoming $args into an array and merge it with $defaults
				$args = wp_parse_args( $args, $defaults );
				
				$pass_heading_text = str_replace( ' ', '&nbsp;', $pass_heading_text );
				
				ob_start();
				?>
				<table class="special-title-holder" width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td class="header_content_h2_space_before" style="font-size:0px; "></td>
								</tr>
							</table>
							
							<?php
							if ( $args['border_position'] == "center" && $args['text_position'] == "center" ) {
								?>
								<!-- Heading with lines on either side -->
								<table width="100%" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td width="50%">
											<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
												<tr height="50%" style="height:50%;" >
													<td>&nbsp;</td>
												</tr>
												<tr height="50%" style="height:50%;" >
													<td class="header_content_h2_border"></td>
												</tr>
											</table>
										</td>
										<td width="1%" style="padding-right:6px; padding-left:6px; " class="header_content_h2" >
											<?php echo $pass_heading_text; ?>
										</td>
										<td width="50%">
											<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
												<tr height="50%" style="height:50%;" >
													<td>&nbsp;</td>
												</tr>
												<tr height="50%" style="height:50%;" >
													<td class="header_content_h2_border"></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<?php
							}
							if ( $args['border_position'] == "center" && $args['text_position'] == "left" ) {
								?>
								<table width="100%" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td width="1%" style="padding-right:6px;" class="header_content_h2" >
											<?php echo $pass_heading_text; ?>
										</td>
										<td width="99%">
											<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
												<tr height="50%" style="height:50%;" >
													<td>&nbsp;</td>
												</tr>
												<tr height="50%" style="height:50%;" >
													<td class="header_content_h2_border"></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<?php
							}
							if ( $args['border_position'] == "center" && $args['text_position'] == "right" ) {
								?>
								<table width="100%" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td width="99%">
											<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
												<tr height="50%" style="height:50%;" >
													<td>&nbsp;</td>
												</tr>
												<tr height="50%" style="height:50%;" >
													<td class="header_content_h2_border"></td>
												</tr>
											</table>
										</td>
										<td width="1%" style="padding-left:6px;" class="header_content_h2" >
											<?php echo $pass_heading_text; ?>
										</td>
									</tr>
								</table>
								<?php
							}
							if ( $args['border_position'] == "bottom" || $args['border_position'] == "border-none" ) {
								?>
								
								<table width="100%" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td width="100%" style="text-align: <?php echo $args['text_position']; ?>;" class="header_content_h2" >
											<?php echo $pass_heading_text; ?>
										</td>
									</tr>
								</table>
								
								<?php if ( $args['border_position'] == "bottom" ) { ?>
									<table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top:6px; padding-bottom:6px;">
										<tr>
											<td width="100%" class="header_content_h2_border" >
											</td>
										</tr>
									</table>
								<?php } ?>
								
								<?php
							}
							?>
							
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td class="header_content_h2_space_after"></td>
								</tr>
							</table>
							
						</td>
					</tr>
				</table>
				<?php
				
				$string = ob_get_clean();
				
				return $string;
			}
		endif;

		/**
		 * EC Nav Bar
		 */
		if ( ! function_exists( 'ec_nav_bar' ) ) :
			function ec_nav_bar () {
				
				$return = false;
				
				$link_text_1	= get_option( 'ec_yellow_all_link_1_text' );
				$link_image_1	= get_option( 'ec_yellow_all_link_1_image' );
				$link_url_1		= get_option( 'ec_yellow_all_link_1_url' );
				
				$link_text_2	= get_option( 'ec_yellow_all_link_2_text' );
				$link_image_2	= get_option( 'ec_yellow_all_link_2_image' );
				$link_url_2		= get_option( 'ec_yellow_all_link_2_url' );
				
				$link_text_3	= get_option( 'ec_yellow_all_link_3_text' );
				$link_image_3	= get_option( 'ec_yellow_all_link_3_image' );
				$link_url_3		= get_option( 'ec_yellow_all_link_3_url' );
				
				$link_text_4	= get_option( 'ec_yellow_all_link_4_text' );
				$link_image_4	= get_option( 'ec_yellow_all_link_4_image' );
				$link_url_4		= get_option( 'ec_yellow_all_link_4_url' );
				
				$link_text_5	= get_option( 'ec_yellow_all_link_5_text' );
				$link_image_5	= get_option( 'ec_yellow_all_link_5_image' );
				$link_url_5		= get_option( 'ec_yellow_all_link_5_url' );
				
				$link_text_6	= get_option( 'ec_yellow_all_link_6_text' );
				$link_image_6	= get_option( 'ec_yellow_all_link_6_image' );
				$link_url_6		= get_option( 'ec_yellow_all_link_6_url' );
				
				if 	( $link_text_1 || $link_image_1 || $link_text_2 || $link_image_2 || $link_text_3 || $link_image_3 || $link_text_4 || $link_image_4 || $link_text_5 || $link_image_5 || $link_text_6 || $link_image_6 ) {
				
					ob_start();
					?>
					<table border="0" cellpadding="0" cellspacing="0" width="auto" class="top_nav">
						<tr>
							<td class="nav-spacer-block">&nbsp;
								
							</td>
							
							<?php
							if ( $link_text_1 || $link_image_1 ) {
								?>
								<?php if ( $link_image_1 ) { ?>
									<td class="nav-image-block">
										<?php if ( $link_url_1 ) { ?><a href="<?php echo esc_url_raw( $link_url_1 ); ?>"><?php } ?>
											<img src="<?php echo get_option( 'ec_yellow_all_link_1_image' ); ?>" />
										<?php if ( $link_url_1 ) { ?></a><?php } ?>
									</td>
								<?php } ?>
								<?php if ( $link_text_1 ) { ?>
									<td class="nav-text-block <?php if ( $link_image_1 ) { ?>nav-text-block-with-image<?php } ?>">
										<?php if ( $link_url_1 ) { ?><a href="<?php echo esc_url_raw( $link_url_1 ); ?>"><?php } ?>
											<?php echo get_option( 'ec_yellow_all_link_1_text' ); ?>
										<?php if ( $link_url_1 ) { ?></a><?php } ?>
									</td>
								<?php } ?>
								<?php
							}
							?>
							
							<?php
							if ( $link_text_2 || $link_image_2 ) {
								?>
								<?php if ( $link_image_2 ) { ?>
									<td class="nav-image-block">
										<?php if ( $link_url_2 ) { ?><a href="<?php echo esc_url_raw( $link_url_2 ); ?>"><?php } ?>
											<img src="<?php echo get_option( 'ec_yellow_all_link_2_image' ); ?>" />
										<?php if ( $link_url_2 ) { ?></a><?php } ?>
									</td>
								<?php } ?>
								<?php if ( $link_text_2 ) { ?>
									<td class="nav-text-block <?php if ( $link_image_2 ) { ?>nav-text-block-with-image<?php } ?>">
										<?php if ( $link_url_2 ) { ?><a href="<?php echo esc_url_raw( $link_url_2 ); ?>"><?php } ?>
											<?php echo get_option( 'ec_yellow_all_link_2_text' ); ?>
										<?php if ( $link_url_2 ) { ?></a><?php } ?>
									</td>
								<?php } ?>
								<?php
							}
							?>
							
							<?php
							if ( $link_text_3 || $link_image_3 ) {
								?>
								<?php if ( $link_image_3 ) { ?>
									<td class="nav-image-block">
										<?php if ( $link_url_3 ) { ?><a href="<?php echo esc_url_raw( $link_url_3 ); ?>"><?php } ?>
											<img src="<?php echo get_option( 'ec_yellow_all_link_3_image' ); ?>" />
										<?php if ( $link_url_3 ) { ?></a><?php } ?>
									</td>
								<?php } ?>
								<?php if ( $link_text_3 ) { ?>
									<td class="nav-text-block <?php if ( $link_image_3 ) { ?>nav-text-block-with-image<?php } ?>">
										<?php if ( $link_url_3 ) { ?><a href="<?php echo esc_url_raw( $link_url_3 ); ?>"><?php } ?>
											<?php echo get_option( 'ec_yellow_all_link_3_text' ); ?>
										<?php if ( $link_url_3 ) { ?></a><?php } ?>
									</td>
								<?php } ?>
								<?php
							}
							?>
							
							<?php
							if ( $link_text_4 || $link_image_4 ) {
								?>
								<?php if ( $link_image_4 ) { ?>
									<td class="nav-image-block">
										<?php if ( $link_url_4 ) { ?><a href="<?php echo esc_url_raw( $link_url_4 ); ?>"><?php } ?>
											<img src="<?php echo get_option( 'ec_yellow_all_link_4_image' ); ?>" />
										<?php if ( $link_url_4 ) { ?></a><?php } ?>
									</td>
								<?php } ?>
								<?php if ( $link_text_4 ) { ?>
									<td class="nav-text-block <?php if ( $link_image_4 ) { ?>nav-text-block-with-image<?php } ?>">
										<?php if ( $link_url_4 ) { ?><a href="<?php echo esc_url_raw( $link_url_4 ); ?>"><?php } ?>
											<?php echo get_option( 'ec_yellow_all_link_4_text' ); ?>
										<?php if ( $link_url_4 ) { ?></a><?php } ?>
									</td>
								<?php } ?>
								<?php
							}
							?>
							
							<?php
							if ( $link_text_5 || $link_image_5 ) {
								?>
								<?php if ( $link_image_5 ) { ?>
									<td class="nav-image-block">
										<?php if ( $link_url_5 ) { ?><a href="<?php echo esc_url_raw( $link_url_5 ); ?>"><?php } ?>
											<img src="<?php echo get_option( 'ec_yellow_all_link_5_image' ); ?>" />
										<?php if ( $link_url_5 ) { ?></a><?php } ?>
									</td>
								<?php } ?>
								<?php if ( $link_text_5 ) { ?>
									<td class="nav-text-block <?php if ( $link_image_5 ) { ?>nav-text-block-with-image<?php } ?>">
										<?php if ( $link_url_5 ) { ?><a href="<?php echo esc_url_raw( $link_url_5 ); ?>"><?php } ?>
											<?php echo get_option( 'ec_yellow_all_link_5_text' ); ?>
										<?php if ( $link_url_5 ) { ?></a><?php } ?>
									</td>
								<?php } ?>
								<?php
							}
							?>
							
							<?php
							if ( $link_text_6 || $link_image_6 ) {
								?>
								<?php if ( $link_image_6 ) { ?>
									<td class="nav-image-block">
										<?php if ( $link_url_6 ) { ?><a href="<?php echo esc_url_raw( $link_url_6 ); ?>"><?php } ?>
											<img src="<?php echo get_option( 'ec_yellow_all_link_6_image' ); ?>" />
										<?php if ( $link_url_6 ) { ?></a><?php } ?>
									</td>
								<?php } ?>
								<?php if ( $link_text_6 ) { ?>
									<td class="nav-text-block <?php if ( $link_image_6 ) { ?>nav-text-block-with-image<?php } ?>">
										<?php if ( $link_url_6 ) { ?><a href="<?php echo esc_url_raw( $link_url_6 ); ?>"><?php } ?>
											<?php echo get_option( 'ec_yellow_all_link_6_text' ); ?>
										<?php if ( $link_url_6 ) { ?></a><?php } ?>
									</td>
								<?php } ?>
								<?php
							}
							?>
							
							<td class="nav-spacer-block">&nbsp;
								
							</td>
						</tr>
					</table>
					<?php
					$return = ob_get_clean();
				
				}
				
				return $return;
			}
		endif;
	}
}
