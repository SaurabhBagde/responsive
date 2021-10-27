<?php
/**
 * Template part for displaying the a row of the header
 *
 * @package responsive
 */

namespace Responsive\Core;

$row = get_query_var( 'row' );
?>
<div class="<?php echo esc_attr( header_row_class( $row ) ); ?>" data-section="responsive_customizer_header_<?php echo esc_attr( $row ); ?>"
<?php
/*
If ( 'main' === $row && 'main' === responsive()->option( 'header_sticky' ) ) {
	echo ' data-reveal-scroll-up="' . ( responsive()->option( 'header_reveal_scroll_up' ) ? 'true' : 'false' ) . '"';
	echo ' data-shrink="' . ( responsive()->option( 'header_sticky_shrink' ) ? 'true' : 'false' ) . '"';
	if ( responsive()->option( 'header_sticky_shrink' ) ) {
		echo ' data-shrink-height="' . esc_attr( responsive()->sub_option( 'header_sticky_main_shrink', 'size' ) ) . '"';
	}
}
*/
?>
>
	<div class="site-header-row-container-inner">
		<?php responsive()->customizer_quick_link(); ?>
		<div class="site-container">
			<div class="site-<?php echo esc_attr( $row ); ?>-header-inner-wrap site-header-row <?php echo ( responsive()->has_side_columns( $row ) ? 'site-header-row-has-sides' : 'site-header-row-only-center-column' ); ?> <?php echo ( responsive()->has_center_column( $row ) ? 'site-header-row-center-column' : 'site-header-row-no-center' ); ?>">
				<?php if ( responsive()->has_side_columns( $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-left site-header-section site-header-section-left">
						<?php
						/**
						 * Responsive Render Header Column
						 *
						 * Hooked Responsive\header_column
						 */
						do_action( 'responsive_render_header_column', $row, 'left' );

						if ( responsive()->has_center_column( $row ) ) {
							?>
							<div class="site-header-<?php echo esc_attr( $row ); ?>-section-left-center site-header-section site-header-section-left-center">
								<?php
								/**
								 * Responsive Render Header Column
								 *
								 * Hooked Responsive\header_column
								 */
								do_action( 'responsive_render_header_column', $row, 'left_center' );
								?>
							</div>
							<?php
						}
						?>
					</div>
				<?php } ?>
				<?php if ( responsive()->has_center_column( $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-center site-header-section site-header-section-center">
						<?php
						/**
						 * Responsive Render Header Column
						 *
						 * Hooked Responsive\header_column
						 */
						do_action( 'responsive_render_header_column', $row, 'center' );
						?>
					</div>
				<?php } ?>
				<?php if ( responsive()->has_side_columns( $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-right site-header-section site-header-section-right">
						<?php
						if ( responsive()->has_center_column( $row ) ) {
							?>
							<div class="site-header-<?php echo esc_attr( $row ); ?>-section-right-center site-header-section site-header-section-right-center">
								<?php
								/**
								 * Responsive Render Header Column
								 *
								 * Hooked Responsive\header_column
								 */
								do_action( 'responsive_render_header_column', $row, 'right_center' );
								?>
							</div>
							<?php
						}
						/**
							 * Responsive Render Header Column
							 *
							 * Hooked Responsive\header_column
							 */
							do_action( 'responsive_render_header_column', $row, 'right' );
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
