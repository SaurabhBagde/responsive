<?php
/**
 * Blog Template
 *
 * @since   1.0.0
 * @package Responsive
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blog Template
 *
 * @file           home.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/home.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header();
responsive_wrapper_top(); // before wrapper content hook.
?>

<div id="wrapper" class="site-content clearfix">
	<div class="content-outer container">
		<div class="row">

			<?php
			responsive_in_wrapper(); // wrapper hook.
			get_template_part( 'wp-admin/includes', 'plugin' );
			global $responsive_options;
			$responsive_options = responsive_get_options();
			global $responsive_blog_layout_columns;
			$responsive_category_id = get_query_var( 'cat' );

			if ( isset( $responsive_options['blog_posts_index_layout_default'] ) && ( in_array( $responsive_options['blog_posts_index_layout_default'], $responsive_blog_layout_columns, true ) ) ) {
				?>
				<main id="primary" class="content-area grid col-940 <?php echo $responsive_options['blog_posts_index_layout_default']; ?>">
					<?php get_template_part( 'loop-header', get_post_type() ); ?>

					<?php if ( have_posts() ) : ?>
							<?php
							while ( have_posts() ) :
								the_post();
								?>

								<div class="section-<?php echo $responsive_options['blog_posts_index_layout_default']; ?> grid">
									<?php responsive_entry_before(); ?>
									<?php get_template_part( 'partials/entry/layout', get_post_type() ); ?>
									<?php responsive_entry_after(); ?>
								</div>

								<?php
							endwhile;

							?>
						<?php
						$blog_pagination = get_theme_mod( 'blog_pagination', 'default' );

						if ( $wp_query->max_num_pages > 1 ) :
							if ( 'infinite' === $blog_pagination ) :
								ob_start();
								do_action( 'responsive_pagination_infinite_enqueue_script' );
								?>
								<nav class="responsive-pagination-infinite">
									<div class="responsive-loader">
										<div class="responsive-loader-1"></div>
										<div class="responsive-loader-2"></div>
										<div class="responsive-loader-3"></div>
									</div>
								</nav>
								<?php
							else :
								the_posts_pagination(
									array(
										'mid_size'  => 2,
										'prev_text' => __( 'Previous', 'responsive' ),
										'next_text' => __( 'Next', 'responsive' ),
									)
								);
							endif;
						endif;

						else :

							get_template_part( 'loop-no-posts' );
					endif;
						?>
				</main><!-- end of #primary -->

				<?php } else { ?>

				<main id="primary" class="content-area <?php echo esc_attr( implode( ' ', responsive_get_content_classes() ) ); ?>">

					<?php get_template_part( 'loop-header', get_post_type() ); ?>

						<?php if ( have_posts() ) : ?>

							<?php
							while ( have_posts() ) :
								the_post();
								?>

								<?php responsive_entry_before(); ?>
								<?php get_template_part( 'partials/entry/layout', get_post_type() ); ?>
								<?php responsive_entry_after(); ?>

								<?php
						endwhile;

							$blog_pagination = get_theme_mod( 'blog_pagination', 'default' );

							?>
							<?php
							if ( $wp_query->max_num_pages > 1 ) :
								if ( 'infinite' === $blog_pagination ) :
									ob_start();

									do_action( 'responsive_pagination_infinite_enqueue_script' );
									?>
							<nav class="responsive-pagination-infinite">
								<div class="responsive-loader">
									<div class="responsive-loader-1"></div>
									<div class="responsive-loader-2"></div>
									<div class="responsive-loader-3"></div>
								</div>
							</nav>
									<?php
								else :
									the_posts_pagination(
										array(
											'mid_size'  => 2,
											'prev_text' => __( 'Previous', 'responsive' ),
											'next_text' => __( 'Next', 'responsive' ),
										)
									);
								endif;

							endif;

							else :
								get_template_part( 'loop-no-posts', get_post_type() );
							endif;
							?>

				</main><!-- end of #primary -->

				<?php get_sidebar(); ?>
			<?php } ?>
		</div>
	</div>
<?php responsive_wrapper_bottom(); // after wrapper content hook. ?>
</div> <!-- end of #wrapper -->
<?php responsive_wrapper_end(); // after wrapper hook. ?>
<?php get_footer(); ?>
