<?php
/**
 * Dynamic CSS used for transparent header.
 *
 * @package     Astra
 * @subpackage  Class
 * @author      Astra
 * @copyright   Copyright (c) 2018, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Dynamic CSS
 */
if ( ! class_exists( 'Astra_Transparent_Header_Dynamic_CSS' ) ) {

	/**
	 * Dynamic CSS
	 */
	class Astra_Transparent_Header_Dynamic_CSS {

		/**
		 * Class Constructor.
		 */
		public function __construct() {
			add_filter( 'wp_enqueue_scripts', array( $this, 'dynamic_css' ) );
		}

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css          Astra Dynamic CSS.
		 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
		 * @return void
		 */
		public function dynamic_css( $dynamic_css, $dynamic_css_filtered = '' ) {

			if ( false === Astra_Ext_Transparent_Header_Markup::is_transparent_header() ) {
				return;
			}

			/**
			 * Set colors
			 *
			 * If colors extension is_active then get color from it.
			 * Else set theme default colors.
			 */
			$transparent_header_separator       = astra_get_option( 'transparent-header-main-sep' );
			$transparent_header_separator_color = astra_get_option( 'transparent-header-main-sep-color' );

			$transparent_header_logo_width = astra_get_option( 'transparent-header-logo-width' );

			$transparent_header_inherit = astra_get_option( 'different-transparent-logo' );
			$transparent_header_logo    = astra_get_option( 'transparent-header-logo' );

			$transparent_bg_color           = astra_get_option( 'transparent-header-bg-color-responsive' );
			$transparent_color_site_title   = astra_get_option( 'transparent-header-color-site-title-responsive' );
			$transparent_color_h_site_title = astra_get_option( 'transparent-header-color-h-site-title-responsive' );
			$transparent_menu_bg_color      = astra_get_option( 'transparent-menu-bg-color-responsive' );
			$transparent_menu_color         = astra_get_option( 'transparent-menu-color-responsive' );
			$transparent_menu_h_color       = astra_get_option( 'transparent-menu-h-color-responsive' );
			$transparent_sub_menu_color     = astra_get_option( 'transparent-submenu-color-responsive' );
			$transparent_sub_menu_h_color   = astra_get_option( 'transparent-submenu-h-color-responsive' );
			$transparent_sub_menu_bg_color  = astra_get_option( 'transparent-submenu-bg-color-responsive' );

			$transparent_content_section_text_color   = astra_get_option( 'transparent-content-section-text-color-responsive' );
			$transparent_content_section_link_color   = astra_get_option( 'transparent-content-section-link-color-responsive' );
			$transparent_content_section_link_h_color = astra_get_option( 'transparent-content-section-link-h-color-responsive' );

			$transparent_header_devices = astra_get_option( 'transparent-header-on-devices' );

			/**
			 * Generate Dynamic CSS
			 */

			$css = '';

			if ( '0' === $transparent_header_inherit && '' != $transparent_header_logo ) {
				$css_output = array(
					'.ast-theme-transparent-header .site-logo-img .custom-logo' => array(
						'display' => 'none',
					),
				);
				$css       .= astra_parse_css( $css_output );
			}

			// Desktop Transparent Heder Logo Width.
			$css_output = array(
				'.ast-theme-transparent-header #masthead .site-logo-img .transparent-custom-logo .astra-logo-svg' => array(
					'width' => astra_get_css_value( $transparent_header_logo_width['desktop'], 'px' ),
				),

				'.ast-theme-transparent-header #masthead .site-logo-img .transparent-custom-logo img' => array(
					' max-width' => astra_get_css_value( $transparent_header_logo_width['desktop'], 'px' ),
				),
			);
			$css .= astra_parse_css( $css_output );

			// Tablet Transparent Heder Logo Width.
			$tablet_css_output = array(
				'.ast-theme-transparent-header #masthead .site-logo-img .transparent-custom-logo .astra-logo-svg' => array(
					'width' => astra_get_css_value( $transparent_header_logo_width['tablet'], 'px' ),
				),

				'.ast-theme-transparent-header #masthead .site-logo-img .transparent-custom-logo img' => array(
					' max-width' => astra_get_css_value( $transparent_header_logo_width['tablet'], 'px' ),
				),
			);
			$css .= astra_parse_css( $tablet_css_output, '', '768' );

			// Mobile Transparent Heder Logo Width.
			$mobile_css_output = array(
				'.ast-theme-transparent-header #masthead .site-logo-img .transparent-custom-logo .astra-logo-svg' => array(
					'width' => astra_get_css_value( $transparent_header_logo_width['mobile'], 'px' ),
				),

				'.ast-theme-transparent-header #masthead .site-logo-img .transparent-custom-logo img' => array(
					' max-width' => astra_get_css_value( $transparent_header_logo_width['mobile'], 'px' ),
				),
			);
			$css .= astra_parse_css( $mobile_css_output, '', '543' );

			$transparent_heder_base = array(
				'.ast-theme-transparent-header #masthead' => array(
					'position' => 'absolute',
					'left'     => '0',
					'right'    => '0',
				),

				'.ast-theme-transparent-header .main-header-bar, .ast-theme-transparent-header.ast-header-break-point .main-header-bar' => array(
					'background' => 'none',
				),

				'body.elementor-editor-active.ast-theme-transparent-header #masthead, .fl-builder-edit .ast-theme-transparent-header #masthead, body.vc_editor.ast-theme-transparent-header #masthead' => array(
					'z-index' => '0',
				),

				'.ast-header-break-point.ast-replace-site-logo-transparent.ast-theme-transparent-header .ast-mobile-header-logo' => array(
					'display' => 'none',
				),

				'.ast-header-break-point.ast-replace-site-logo-transparent.ast-theme-transparent-header .transparent-custom-logo .custom-logo' => array(
					'display' => 'inline-block',
				),

				'.ast-theme-transparent-header .ast-above-header' => array(
					'background-image' => 'none',
					'background-color' => 'transparent',
				),

				'.ast-theme-transparent-header .ast-below-header' => array(
					'background-image' => 'none',
					'background-color' => 'transparent',
				),
			);

			/**
			 * Transparent Header Colors
			 */
			$transparent_header_desktop = array(

				'.ast-theme-transparent-header .main-header-bar, .ast-theme-transparent-header.ast-header-break-point .main-header-menu, .ast-theme-transparent-header.ast-header-break-point .main-header-bar' => array(
					'background-color' => esc_attr( $transparent_bg_color['desktop'] ),
				),

				'.ast-theme-transparent-header .main-header-bar .ast-search-menu-icon form' => array(
					'background-color' => esc_attr( $transparent_bg_color['desktop'] ),
				),

				'.ast-theme-transparent-header .ast-above-header, .ast-theme-transparent-header .ast-below-header' => array(
					'background-color' => esc_attr( $transparent_bg_color['desktop'] ),
				),

				'.ast-theme-transparent-header .site-title a, .ast-theme-transparent-header .site-title a:focus, .ast-theme-transparent-header .site-title a:hover, .ast-theme-transparent-header .site-title a:visited' => array(
					'color' => esc_attr( $transparent_color_site_title['desktop'] ),
				),

				'.ast-theme-transparent-header .site-header .site-title a:hover' => array(
					'color' => esc_attr( $transparent_color_h_site_title['desktop'] ),
				),

				'.ast-theme-transparent-header .site-header .site-description' => array(
					'color' => esc_attr( $transparent_color_site_title['desktop'] ),
				),

				'.ast-theme-transparent-header .main-header-menu, .ast-theme-transparent-header.ast-header-break-point .main-header-menu' => array(
					'background-color' => esc_attr( $transparent_menu_bg_color['desktop'] ),
				),

				'.ast-theme-transparent-header .main-header-menu ul.sub-menu' => array(
					'background-color' => esc_attr( $transparent_sub_menu_bg_color['desktop'] ),
				),

				'.ast-theme-transparent-header .main-header-menu ul.sub-menu li a,.ast-theme-transparent-header .main-header-menu ul.sub-menu li > .ast-menu-toggle' => array(
					'color' => esc_attr( $transparent_sub_menu_color['desktop'] ),
				),

				'.ast-theme-transparent-header .main-header-menu ul.sub-menu a:hover,.ast-theme-transparent-header .main-header-menu ul.sub-menu li:hover > a, .ast-theme-transparent-header .main-header-menu ul.sub-menu li.focus > a,.ast-theme-transparent-header .main-header-menu ul.sub-menu li.current-menu-item > a, .ast-theme-transparent-header .main-header-menu ul.sub-menu li.current-menu-item > .ast-menu-toggle,.ast-theme-transparent-header .main-header-menu ul.sub-menu li:hover > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu ul.sub-menu li.focus > .ast-menu-toggle' => array(
					'color' => esc_attr( $transparent_sub_menu_h_color['desktop'] ),
				),

				'.ast-theme-transparent-header .main-header-menu, .ast-theme-transparent-header .main-header-menu a, .ast-theme-transparent-header .ast-masthead-custom-menu-items, .ast-theme-transparent-header .ast-masthead-custom-menu-items a,.ast-theme-transparent-header .main-header-menu li > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu li > .ast-menu-toggle' => array(
					'color' => esc_attr( $transparent_menu_color['desktop'] ),
				),

				'.ast-theme-transparent-header .main-header-menu li:hover > a, .ast-theme-transparent-header .main-header-menu li:hover > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu .ast-masthead-custom-menu-items a:hover, .ast-theme-transparent-header .main-header-menu .focus > a, .ast-theme-transparent-header .main-header-menu .focus > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu .current-menu-item > a, .ast-theme-transparent-header .main-header-menu .current-menu-ancestor > a, .ast-theme-transparent-header .main-header-menu .current_page_item > a, .ast-theme-transparent-header .main-header-menu .current-menu-item > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu .current-menu-ancestor > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu .current_page_item > .ast-menu-toggle' => array(
					'color' => esc_attr( $transparent_menu_h_color['desktop'] ),
				),

				// Content Section text color.
				'.ast-theme-transparent-header div.ast-masthead-custom-menu-items, .ast-theme-transparent-header div.ast-masthead-custom-menu-items .widget, .ast-theme-transparent-header div.ast-masthead-custom-menu-items .widget-title' => array(
					'color' => esc_attr( $transparent_content_section_text_color['desktop'] ),
				),

				// Content Section link color.
				'.ast-theme-transparent-header div.ast-masthead-custom-menu-items a, .ast-theme-transparent-header div.ast-masthead-custom-menu-items .widget a' => array(
					'color' => esc_attr( $transparent_content_section_link_color['desktop'] ),
				),
				// Content Section link hover color.
				'.ast-theme-transparent-header div.ast-masthead-custom-menu-items a:hover, .ast-theme-transparent-header div.ast-masthead-custom-menu-items .widget a:hover' => array(
					'color' => esc_attr( $transparent_content_section_link_h_color['desktop'] ),
				),
			);

			$transparent_header_tablet = array(

				'.ast-theme-transparent-header .main-header-bar, .ast-theme-transparent-header.ast-header-break-point .main-header-menu, .ast-theme-transparent-header.ast-header-break-point .main-header-bar' => array(
					'background-color' => esc_attr( $transparent_bg_color['tablet'] ),
				),

				'.ast-theme-transparent-header .main-header-bar .ast-search-menu-icon form' => array(
					'background-color' => esc_attr( $transparent_bg_color['tablet'] ),
				),

				'.ast-theme-transparent-header .ast-above-header, .ast-theme-transparent-header .ast-below-header' => array(
					'background-color' => esc_attr( $transparent_bg_color['tablet'] ),
				),

				'.ast-theme-transparent-header .site-title a, .ast-theme-transparent-header .site-title a:focus, .ast-theme-transparent-header .site-title a:hover, .ast-theme-transparent-header .site-title a:visited' => array(
					'color' => esc_attr( $transparent_color_site_title['tablet'] ),
				),

				'.ast-theme-transparent-header .site-header .site-title a:hover' => array(
					'color' => esc_attr( $transparent_color_h_site_title['tablet'] ),
				),

				'.ast-theme-transparent-header .site-header .site-description' => array(
					'color' => esc_attr( $transparent_color_site_title['tablet'] ),
				),

				'.ast-theme-transparent-header .main-header-menu, .ast-theme-transparent-header.ast-header-break-point .main-header-menu' => array(
					'background-color' => esc_attr( $transparent_menu_bg_color['tablet'] ),
				),

				'.ast-theme-transparent-header .main-header-menu ul.sub-menu' => array(
					'background-color' => esc_attr( $transparent_sub_menu_bg_color['tablet'] ),
				),

				'.ast-theme-transparent-header .main-header-menu ul.sub-menu li a,.ast-theme-transparent-header .main-header-menu ul.sub-menu li > .ast-menu-toggle' => array(
					'color' => esc_attr( $transparent_sub_menu_color['tablet'] ),
				),

				'.ast-theme-transparent-header .main-header-menu ul.sub-menu a:hover,.ast-theme-transparent-header .main-header-menu ul.sub-menu li:hover > a, .ast-theme-transparent-header .main-header-menu ul.sub-menu li.focus > a,.ast-theme-transparent-header .main-header-menu ul.sub-menu li.current-menu-item > a,.ast-theme-transparent-header .main-header-menu ul.sub-menu li.current-menu-item > .ast-menu-toggle,.ast-theme-transparent-header .main-header-menu ul.sub-menu li:hover > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu ul.sub-menu li.focus > .ast-menu-toggle' => array(
					'color' => esc_attr( $transparent_sub_menu_h_color['tablet'] ),
				),

				'.ast-theme-transparent-header .main-header-menu, .ast-theme-transparent-header .main-header-menu a, .ast-theme-transparent-header .ast-masthead-custom-menu-items, .ast-theme-transparent-header .ast-masthead-custom-menu-items a,.ast-theme-transparent-header .main-header-menu li > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu li > .ast-menu-toggle' => array(
					'color' => esc_attr( $transparent_menu_color['tablet'] ),
				),

				'.ast-theme-transparent-header .main-header-menu li:hover > a, .ast-theme-transparent-header .main-header-menu li:hover > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu .ast-masthead-custom-menu-items a:hover, .ast-theme-transparent-header .main-header-menu .focus > a, .ast-theme-transparent-header .main-header-menu .focus > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu .current-menu-item > a, .ast-theme-transparent-header .main-header-menu .current-menu-ancestor > a, .ast-theme-transparent-header .main-header-menu .current_page_item > a, .ast-theme-transparent-header .main-header-menu .current-menu-item > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu .current-menu-ancestor > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu .current_page_item > .ast-menu-toggle' => array(
					'color' => esc_attr( $transparent_menu_h_color['tablet'] ),
				),
				// Content Section text color.
				'.ast-theme-transparent-header div.ast-masthead-custom-menu-items, .ast-theme-transparent-header div.ast-masthead-custom-menu-items .widget, .ast-theme-transparent-header div.ast-masthead-custom-menu-items .widget-title' => array(
					'color' => esc_attr( $transparent_content_section_text_color['tablet'] ),
				),

				// Content Section link color.
				'.ast-theme-transparent-header div.ast-masthead-custom-menu-items a, .ast-theme-transparent-header div.ast-masthead-custom-menu-items .widget a' => array(
					'color' => esc_attr( $transparent_content_section_link_color['tablet'] ),
				),

				// Content Section link hover color.
				'.ast-theme-transparent-header div.ast-masthead-custom-menu-items a:hover, .ast-theme-transparent-header div.ast-masthead-custom-menu-items .widget a:hover' => array(
					'color' => esc_attr( $transparent_content_section_link_h_color['tablet'] ),
				),
			);

			$transparent_header_mobile = array(

				'.ast-theme-transparent-header .main-header-bar, .ast-theme-transparent-header.ast-header-break-point .main-header-menu, .ast-theme-transparent-header.ast-header-break-point .main-header-bar' => array(
					'background-color' => esc_attr( $transparent_bg_color['mobile'] ),
				),

				'.ast-theme-transparent-header .main-header-bar .ast-search-menu-icon form' => array(
					'background-color' => esc_attr( $transparent_bg_color['mobile'] ),
				),

				'.ast-theme-transparent-header .ast-above-header, .ast-theme-transparent-header .ast-below-header' => array(
					'background-color' => esc_attr( $transparent_bg_color['mobile'] ),
				),

				'.ast-theme-transparent-header .site-title a, .ast-theme-transparent-header .site-title a:focus, .ast-theme-transparent-header .site-title a:hover, .ast-theme-transparent-header .site-title a:visited' => array(
					'color' => esc_attr( $transparent_color_site_title['mobile'] ),
				),

				'.ast-theme-transparent-header .site-header .site-title a:hover' => array(
					'color' => esc_attr( $transparent_color_h_site_title['mobile'] ),
				),

				'.ast-theme-transparent-header .site-header .site-description' => array(
					'color' => esc_attr( $transparent_color_site_title['mobile'] ),
				),

				'.ast-theme-transparent-header .main-header-menu, .ast-theme-transparent-header.ast-header-break-point .main-header-menu' => array(
					'background-color' => esc_attr( $transparent_menu_bg_color['mobile'] ),
				),

				'.ast-theme-transparent-header .main-header-menu ul.sub-menu' => array(
					'background-color' => esc_attr( $transparent_sub_menu_bg_color['mobile'] ),
				),

				'.ast-theme-transparent-header .main-header-menu ul.sub-menu li a,.ast-theme-transparent-header .main-header-menu ul.sub-menu li > .ast-menu-toggle' => array(
					'color' => esc_attr( $transparent_sub_menu_color['mobile'] ),
				),

				'.ast-theme-transparent-header .main-header-menu ul.sub-menu a:hover,.ast-theme-transparent-header .main-header-menu ul.sub-menu li:hover > a, .ast-theme-transparent-header .main-header-menu ul.sub-menu li.focus > a,.ast-theme-transparent-header .main-header-menu ul.sub-menu li.current-menu-item > a,.ast-theme-transparent-header .main-header-menu ul.sub-menu li.current-menu-item > .ast-menu-toggle,.ast-theme-transparent-header .main-header-menu ul.sub-menu li:hover > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu ul.sub-menu li.focus > .ast-menu-toggle,.ast-theme-transparent-header .main-header-menu ul.sub-menu li.focus > .ast-menu-toggle' => array(
					'color' => esc_attr( $transparent_sub_menu_h_color['mobile'] ),
				),

				'.ast-theme-transparent-header .main-header-menu, .ast-theme-transparent-header .main-header-menu a, .ast-theme-transparent-header .ast-masthead-custom-menu-items, .ast-theme-transparent-header .ast-masthead-custom-menu-items a,.ast-theme-transparent-header .main-header-menu li > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu li > .ast-menu-toggle' => array(
					'color' => esc_attr( $transparent_menu_color['mobile'] ),
				),

				'.ast-theme-transparent-header .main-header-menu li:hover > a, .ast-theme-transparent-header .main-header-menu li:hover > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu .ast-masthead-custom-menu-items a:hover, .ast-theme-transparent-header .main-header-menu .focus > a, .ast-theme-transparent-header .main-header-menu .focus > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu .current-menu-item > a, .ast-theme-transparent-header .main-header-menu .current-menu-ancestor > a, .ast-theme-transparent-header .main-header-menu .current_page_item > a, .ast-theme-transparent-header .main-header-menu .current-menu-item > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu .current-menu-ancestor > .ast-menu-toggle, .ast-theme-transparent-header .main-header-menu .current_page_item > .ast-menu-toggle' => array(
					'color' => esc_attr( $transparent_menu_h_color['mobile'] ),
				),

				// Content Section text color.
				'.ast-theme-transparent-header div.ast-masthead-custom-menu-items, .ast-theme-transparent-header div.ast-masthead-custom-menu-items .widget, .ast-theme-transparent-header div.ast-masthead-custom-menu-items .widget-title' => array(
					'color' => esc_attr( $transparent_content_section_text_color['mobile'] ),
				),

				// Content Section link color.
				'.ast-theme-transparent-header div.ast-masthead-custom-menu-items a, .ast-theme-transparent-header div.ast-masthead-custom-menu-items .widget a' => array(
					'color' => esc_attr( $transparent_content_section_link_color['mobile'] ),
				),

				// Content Section link hover color.
				'.ast-theme-transparent-header div.ast-masthead-custom-menu-items a:hover, .ast-theme-transparent-header div.ast-masthead-custom-menu-items .widget a:hover' => array(
					'color' => esc_attr( $transparent_content_section_link_h_color['mobile'] ),
				),
			);

			if ( true === self::woo_header_cart_use_header_colors() ) {

				if ( true === astra_get_option( 'header-display-outside-menu' ) ) {
					$link_color_woo_cart   = astra_get_option( 'transparent-content-section-link-color-responsive' );
					$link_h_color_woo_cart = astra_get_option( 'transparent-content-section-link-h-color-responsive' );
				} else {
					$link_color_woo_cart   = astra_get_option( 'transparent-menu-color-responsive' );
					$link_h_color_woo_cart = astra_get_option( 'transparent-menu-h-color-responsive' );
				}

				$transparent_heder_base = $transparent_heder_base + array(
					'.ast-theme-transparent-header .ast-site-header-cart a'      => array(
						'color' => esc_attr( $link_color_woo_cart['desktop'] ),
					),

					'.ast-theme-transparent-header .ast-site-header-cart a:focus,.ast-theme-transparent-header .ast-site-header-cart a:hover, .ast-theme-transparent-header .ast-site-header-cart .current-menu-item a' => array(
						'color' => esc_attr( $link_color_woo_cart['desktop'] ),
					),

					'.ast-theme-transparent-header .ast-cart-menu-wrap .count,.ast-theme-transparent-header .ast-cart-menu-wrap .count:after' => array(
						'border-color' => esc_attr( $link_color_woo_cart['desktop'] ),
						'color'        => esc_attr( $link_color_woo_cart['desktop'] ),
					),

					'.ast-theme-transparent-header .ast-cart-menu-wrap:hover .count' => array(
						'color'            => esc_attr( astra_get_foreground_color( $link_h_color_woo_cart['desktop'] ) ),
						'background-color' => esc_attr( $link_color_woo_cart['desktop'] ),
					),

					'.ast-theme-transparent-header .ast-site-header-cart .widget_shopping_cart .total .woocommerce-Price-amount' => array(
						'color' => esc_attr( $link_color_woo_cart['desktop'] ),
					),

					'.ast-theme-transparent-header .ast-woocommerce-cart-menu .main-header-menu .woocommerce-custom-menu-item li:hover > a.remove:hover' => array(
						'color'            => esc_attr( $link_color_woo_cart['desktop'] ),
						'border-color'     => esc_attr( $link_color_woo_cart['desktop'] ),
						'background-color' => esc_attr( '#ffffff' ),
					),
				);

				$transparent_header_tablet = $transparent_header_tablet + array(
					'.ast-theme-transparent-header .ast-site-header-cart a' => array(
						'color' => esc_attr( $link_color_woo_cart['tablet'] ),
					),

					'.ast-theme-transparent-header .ast-site-header-cart a:focus,.ast-theme-transparent-header .ast-site-header-cart a:hover, .ast-theme-transparent-header .ast-site-header-cart .current-menu-item a' => array(
						'color' => esc_attr( $link_color_woo_cart['tablet'] ),
					),

					'.ast-theme-transparent-header .ast-cart-menu-wrap .count,.ast-theme-transparent-header .ast-cart-menu-wrap .count:after' => array(
						'border-color' => esc_attr( $link_color_woo_cart['tablet'] ),
						'color'        => esc_attr( $link_color_woo_cart['tablet'] ),
					),

					'.ast-theme-transparent-header .ast-cart-menu-wrap:hover .count' => array(
						'color'            => esc_attr( astra_get_foreground_color( $link_h_color_woo_cart['tablet'] ) ),
						'background-color' => esc_attr( $link_color_woo_cart['tablet'] ),
					),

					'.ast-theme-transparent-header .ast-site-header-cart .widget_shopping_cart .total .woocommerce-Price-amount' => array(
						'color' => esc_attr( $link_color_woo_cart['tablet'] ),
					),

					'.ast-theme-transparent-header .ast-woocommerce-cart-menu .main-header-menu .woocommerce-custom-menu-item li:hover > a.remove:hover' => array(
						'color'            => esc_attr( $link_color_woo_cart['tablet'] ),
						'border-color'     => esc_attr( $link_color_woo_cart['tablet'] ),
						'background-color' => esc_attr( '#ffffff' ),
					),
				);

				$transparent_header_mobile = $transparent_header_mobile + array(
					'.ast-theme-transparent-header .ast-site-header-cart a' => array(
						'color' => esc_attr( $link_color_woo_cart['mobile'] ),
					),

					'.ast-theme-transparent-header .ast-site-header-cart a:focus,.ast-theme-transparent-header .ast-site-header-cart a:hover, .ast-theme-transparent-header .ast-site-header-cart .current-menu-item a' => array(
						'color' => esc_attr( $link_color_woo_cart['mobile'] ),
					),

					'.ast-theme-transparent-header .ast-cart-menu-wrap .count,.ast-theme-transparent-header .ast-cart-menu-wrap .count:after' => array(
						'border-color' => esc_attr( $link_color_woo_cart['mobile'] ),
						'color'        => esc_attr( $link_color_woo_cart['mobile'] ),
					),

					'.ast-theme-transparent-header .ast-cart-menu-wrap:hover .count' => array(
						'color'            => esc_attr( astra_get_foreground_color( $link_h_color_woo_cart['mobile'] ) ),
						'background-color' => esc_attr( $link_color_woo_cart['mobile'] ),
					),

					'.ast-theme-transparent-header .ast-site-header-cart .widget_shopping_cart .total .woocommerce-Price-amount' => array(
						'color' => esc_attr( $link_color_woo_cart['mobile'] ),
					),

					'.ast-theme-transparent-header .ast-woocommerce-cart-menu .main-header-menu .woocommerce-custom-menu-item li:hover > a.remove:hover' => array(
						'color'            => esc_attr( $link_color_woo_cart['mobile'] ),
						'border-color'     => esc_attr( $link_color_woo_cart['mobile'] ),
						'background-color' => esc_attr( '#ffffff' ),
					),
				);
			}

			/* Parse CSS from array() */
			if ( 'both' === $transparent_header_devices || 'desktop' === $transparent_header_devices ) {
				$css .= astra_parse_css( $transparent_heder_base, '769' );

				// If Trnsparent header is active on mobile + desktop, enqueue CSS without media queeries.
				// If only for desktop add media query for the transparent header.
				if ( 'both' === $transparent_header_devices ) {
					$css .= astra_parse_css( $transparent_header_desktop );
				} else {
					$css .= astra_parse_css( $transparent_header_desktop, '769' );
				}
			}

			if ( 'mobile' === $transparent_header_devices ) {
				$css .= astra_parse_css(
					array(
						'.transparent-custom-logo' => array(
							'display' => 'none',
						),
					),
					'768'
				);

				$css .= astra_parse_css(
					array(
						'.ast-transparent-desktop-logo' => array(
							'display' => 'none',
						),
					),
					'',
					'768'
				);
			}

			if ( 'desktop' === $transparent_header_devices ) {
				$css .= astra_parse_css(
					array(
						'.transparent-custom-logo' => array(
							'display' => 'none',
						),
					),
					'',
					'768'
				);

				$css .= astra_parse_css(
					array(
						'.ast-transparent-mobile-logo' => array(
							'display' => 'none',
						),
					),
					'768'
				);
			}

			if ( 'both' === $transparent_header_devices || 'mobile' === $transparent_header_devices ) {
				$css .= astra_parse_css( $transparent_heder_base, '', '768' );
				$css .= astra_parse_css( $transparent_header_tablet, '', '768' );
				$css .= astra_parse_css( $transparent_header_mobile, '', '544' );
			}

			if ( 'both' === $transparent_header_devices ) {
				$css .= astra_parse_css(
					array(
						'.ast-theme-transparent-header .main-header-bar, .ast-theme-transparent-header .site-header' => array(
							'border-bottom-width' => astra_get_css_value( $transparent_header_separator, 'px' ),
							'border-bottom-color' => esc_attr( $transparent_header_separator_color ),
						),
					)
				);
			}

			if ( 'mobile' === $transparent_header_devices ) {
				$css .= astra_parse_css(
					array(
						'.ast-theme-transparent-header .site-header' => array(
							'border-bottom-width' => astra_get_css_value( $transparent_header_separator, 'px' ),
							'border-bottom-color' => esc_attr( $transparent_header_separator_color ),
						),
					),
					'',
					'768'
				);
			}

			if ( 'desktop' === $transparent_header_devices ) {
				$css .= astra_parse_css(
					array(
						'.ast-theme-transparent-header .main-header-bar' => array(
							'border-bottom-width' => astra_get_css_value( $transparent_header_separator, 'px' ),
							'border-bottom-color' => esc_attr( $transparent_header_separator_color ),
						),
					),
					'768'
				);
			}

			$dynamic_css .= $css;

			wp_add_inline_style( 'astra-theme-css', $dynamic_css );
		}

		/**
		 * Check backwards compatibility CSS for loading submenu below the header needs to be added.
		 *
		 * @since 1.5.0
		 * @return boolean true if CSS should be included, False if not.
		 */
		private static function woo_header_cart_use_header_colors() {
			if ( false == astra_get_option( 'wc-header-cart-header-colors', true ) &&
				false === apply_filters(
					'astra_woo_header_cart_use_header_colors',
					false
				) ) {

				return false;
			} else {

				return true;
			}

		}
	}
}

new Astra_Transparent_Header_Dynamic_CSS();