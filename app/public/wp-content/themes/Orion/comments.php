<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
    <div class="comments-form">
        <div class="container">
            <div class="col-md-12">

				<?php
				// You can start editing here -- including this comment!
				if ( have_comments() ) : ?>
                    <h3 class="comments-title">
			<span>
				<?php echo __( 'Comments', 'newspaper-x' ) ?>
			</span>
                    </h3>

					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                        <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                            <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'newspaper-x' ); ?></h2>
                            <div class="nav-links">

                                <div
                                        class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'newspaper-x' ) ); ?></div>
                                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'newspaper-x' ) ); ?></div>

                            </div>
                        </nav>
					<?php endif;  ?>

                    <ol class="comment-list">
						<?php
						wp_list_comments( array(
							                  'style'       => 'ol',
							                  'short_ping'  => true,
							                  'avatar_size' => 64,
						                  ) );
						?>
                    </ol>

					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                        <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                            <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'newspaper-x' ); ?></h2>
                            <div class="nav-links">

                                <div
                                        class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'newspaper-x' ) ); ?></div>
                                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'newspaper-x' ) ); ?></div>

                            </div>
                        </nav>
						<?php
					endif; 

				endif; 

				if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

                    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'newspaper-x' ); ?></p>
					<?php
				endif;

				comment_form();
				?>
            </div>
        </div>
    </div>
</div>
