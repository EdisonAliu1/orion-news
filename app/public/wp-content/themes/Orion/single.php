<?php


get_header(); ?>
    <div class="row">
    <div id="primary" class="content-area col-md-8 col-sm-8 col-xs-12 newspaper-x-sidebar">
    <main id="main" class="site-main" role="main">

<?php
while ( have_posts() ) : the_post();
    $post_id = get_the_ID();
    get_template_part( 'template-parts/content', get_post_format() );  
    ?>

    </main>
    </div>
    <?php get_sidebar(); ?>
    </div>
    </div>

    <?php
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>
    <div id="content" class="container">
    <?php
endwhile; 
get_footer();
