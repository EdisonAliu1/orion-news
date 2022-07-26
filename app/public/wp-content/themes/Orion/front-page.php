<?php


get_header();
$show_on_front = get_option( 'show_on_front' );
if ( $show_on_front == 'posts' ):
	$banner_count = get_theme_mod( 'newspaper_x_show_banner_after', 6 );
	$banner    = get_theme_mod( 'newspaper_x_banner_type', 'image' );

	?>
    <div class="row">
        <div id="primary" class="newspaper-x-content newspaper-x-archive-page col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <main id="main" class="site-main margin-top" role="main">
				<?php
				$banner_count_index = 0;
				if ( have_posts() ) :
					?>
                    <div class="row">
						<?php
						while ( have_posts() ) : the_post();

							if ( fmod( $banner_count_index, $banner_count ) == 0 && $banner_count_index != 0 ) { ?>
                                <div class="row">
                                    <div class="col-xs-12 newspaper-x-image-banner">
										<?php get_template_part( 'template-parts/banner/banner', $banner ); ?>
                                    </div>
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
							if ( fmod( $banner_count_index, 2 ) == 0 && $banner_count_index != (int) $wp_query->post_count ) {
								echo '</div><div class="row">';
							} elseif ( $banner_count_index == (int) $wp_query->post_count ) {
								continue;
							}
						endwhile;
						?>
                    </div>
					<?php
					the_posts_navigation();
				else :
					echo '<div class="row">';
					get_template_part( 'template-parts/content', 'none' );
					echo '</div>';
				endif;
				?>
            </main>
        </div>
		<?php get_sidebar( 'default-widget-area' ); ?>
    </div>
	<?php
else:
	?>
    </div>

	<?php get_template_part( 'template-parts/header-widget-area' ) ?>

    <div class="container site-content">
    <div class="row">

		<?php if ( is_active_sidebar( 'content-area' ) ) { ?>
            <div class="<?php echo is_active_sidebar( 'sidebar-homepage' ) ? 'col-md-8' : 'col-md-12' ?> newspaper-x-content newspaper-x-with-sidebar">
				<?php dynamic_sidebar( 'content-area' ); ?>
            </div>
		<?php } ?>

		<?php if ( is_active_sidebar( 'sidebar-homepage' ) ) { ?>
            <div class="col-md-4 newspaper-x-blog-sidebar">
				<?php dynamic_sidebar( 'sidebar-homepage' ); ?>
            </div>
		<?php } ?>
    </div>

    <section class="newspaper-x-after-content-area">
        <div class="row">
            <div class="col-xs-12 newspaper-x-after-content-sidebar">
				<?php
				if ( is_active_sidebar( 'after-content-area' ) ) {
					dynamic_sidebar( 'after-content-area' );
				}
				?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer();