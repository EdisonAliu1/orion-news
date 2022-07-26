<?php

get_header(); ?>

<?php 


$banner_count = get_theme_mod( 'newspaper_x_show_banner_after' );
global $wp_query;
?>
	<div class="row">
		<header class="col-xs-12">
			<h3 class="page-title">
				<span><?php printf( esc_html__( 'Search Results for: %s', 'newspaper-x' ), '<span>' . get_search_query() . '</span>' ); ?></span>
			</h3>
		</header><!-- .page-header -->
	</div>

	<div class="row">
		<div id="primary" class="newspaper-x-content newspaper-x-archive-page col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<main id="main" class="site-main" role="main">
				<?php
				

				$enable_banner = get_theme_mod( 'newspaper_x_show_banner_on_archive_pages', true );
				$banner        = get_theme_mod( 'newspaper_x_banner_type', 'image' );
				if ( $enable_banner ) {
					?>
					<div class="row">
						<div class="col-xs-12 newspaper-x-image-banner">
							<?php
							get_template_part( 'template-parts/banner/banner', $banner );
							?>
						</div>
					</div>
					<?php
				}
				?>

				<?php
				if ( have_posts() ) : ?>
					<div class="row">
						<?php
					
						$count              = 1;
						$banner_count_index = 0;
						while ( have_posts() ) : the_post();
							$count ++;
							if ( $count <= 2 ) {
								$banner_count_index = 0;
							}

							if ( fmod( $banner_count_index, $banner_count ) == 0 && $banner_count_index != 0 ) {
								?>
								<div class="col-xs-12 newspaper-x-image-banner">
									<?php
									get_template_part( 'template-parts/banner/banner', $banner );
									?>
								</div>
								<?php
							}

							$banner_count_index ++;
						
							?>
							<div class="col-md-6">
								<?php
								get_template_part( 'template-parts/content', get_post_format() );
								?>
							</div>
							<?php
							if ( fmod( ( $count - 1 ), 2 ) == 0 && ( $count - 1 ) != (int) $wp_query->post_count ) {
								echo '</div><div class="row">';
							} elseif ( ( $count - 1 ) == (int) $wp_query->post_count ) {
								continue;
							}
						endwhile;
						?>
					</div>
					<?php
					the_post_navigation();
				else :
					echo '<div class="row">';
					get_template_part( 'template-parts/content', 'none' );
					echo '</div>';
				endif;
				?>
			</main>
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php
get_footer();
