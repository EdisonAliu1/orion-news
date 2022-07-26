<?php
/**
 * The template for displaying 404 pages (not found).

 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1><?php echo esc_html__( 'Oops! That page can&rsquo;t be found.', 'newspaper-x' ); ?></h1>
					</header>

					<div class="page-content">
						<p><?php echo esc_html__( 'It looks like nothing was found at this location. Maybe try a better search?', 'newspaper-x' ); ?></p>

						<?php get_search_form(); ?>

					</div>
				</section>

			</main>
		</div>
	</div>
</div>
<?php get_footer(); ?>

