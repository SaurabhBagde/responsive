<?php
/**
 * Sitemap Template
 *
 * Template Name: Sitemap (Deprecated)
 *
 * @file           sitemap.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sitemap.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php get_header(); ?>
<?php responsive_wrapper_top(); // before wrapper content hook. ?>
<div id="wrapper" class="site-content clearfix">
	<div class="content-outer container">
		<div class="row">
			<?php responsive_in_wrapper(); // wrapper hook. ?>
			<div id="content-sitemap" class="grid col-940">

			<?php get_template_part( 'loop-header', get_post_type() ); ?>

			<?php if ( have_posts() ) : ?>

				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="post-title"><?php the_title(); ?></h1>

						<div class="post-entry">
							<div id="secondary" role="complementary">

								<div class="grid col-300">
									<div class="widget-title"><h4><?php esc_html_e( 'Categories', 'responsive' ); ?></h4></div>
									<ul><?php wp_list_categories( 'sort_column=name&optioncount=1&hierarchical=0&title_li=' ); ?></ul>
								</div><!-- end of .col-300 -->

								<div class="grid col-300">
									<div class="widget-title"><h4><?php esc_html_e( 'Latest Posts', 'responsive' ); ?></h4></div>
									<ul>
									<?php
									$responsive_archive_query = new WP_Query( 'posts_per_page=-1' );
									while ( $responsive_archive_query->have_posts() ) :
										$responsive_archive_query->the_post();
										?>
											<li>
												<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( __( 'Permanent Link to %s', 'responsive' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
											</li>
										<?php endwhile; ?>
									</ul>
								</div><!-- end of .col-300 -->

								<div class="grid col-300 fit">
									<div class="widget-title"><h4><?php esc_html_e( 'Pages', 'responsive' ); ?></h4></div>
									<ul><?php wp_list_pages( 'title_li=' ); ?></ul>
								</div><!-- end of .col-300 fit -->

							</div><!-- end of #secondary -->
							<?php
							wp_link_pages(
								array(
									'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ),
									'after'  => '</div>',
								)
							);
							?>
						</div><!-- end of .post-entry -->

						<?php edit_post_link( __( '<span class="post-edit">Edit</span>', 'responsive' ) ); ?>
					</div><!-- end of #post-<?php the_ID(); ?> -->

					<?php
				endwhile;

				get_template_part( 'loop-nav', get_post_type() );

				else :

					get_template_part( 'loop-no-posts', get_post_type() );

			endif;
				?>

		</div> <!-- end of #content-sitemap -->
		</div>
	</div>
<?php responsive_wrapper_bottom(); // after wrapper content hook. ?>
</div> <!-- end of #wrapper -->
<?php responsive_wrapper_end(); // after wrapper hook. ?>
<?php get_footer(); ?>
