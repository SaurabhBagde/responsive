<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Builder_Bottom_row' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Builder_Bottom_Row {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Customizer options
		 *
		 * @since 0.2
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {

			/**
			 * Header Builder options
			 */

			$wp_customize->add_section(
				'responsive_customizer_header_bottom',
				array(
					'title'    => esc_html__( 'Bottom Rows', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 110,
				)
			);

			// Bottom Row Desktop Layout.
			$bottom_row_desktop_layout         = esc_html__( 'Bottom Row Desktop Layout', 'responsive' );
			$bottom_row_desktop_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_bottom_layout', $bottom_row_desktop_layout, 'responsive_customizer_header_bottom', 15, $bottom_row_desktop_layout_choices, 'standard', null );

			// Bottom Row Tablet Layout.
			$bottom_row_tablet_layout         = esc_html__( 'Bottom Row Tablet Layout', 'responsive' );
			$bottom_row_tablet_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_tablet_bottom_layout', $bottom_row_tablet_layout, 'responsive_customizer_header_bottom', 20, $bottom_row_tablet_layout_choices, 'standard', null );

			// Bottom Row Mobile Layout.
			$bottom_row_mobile_layout         = esc_html__( 'Bottom Row Mobile Layout', 'responsive' );
			$bottom_row_mobile_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_mobile_bottom_layout', $bottom_row_mobile_layout, 'responsive_customizer_header_bottom', 25, $bottom_row_mobile_layout_choices, 'standard', null );

		}

	}

endif;

return new Responsive_Builder_Bottom_Row();
