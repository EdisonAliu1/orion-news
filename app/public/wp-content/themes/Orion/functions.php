<?php


if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}


require_once dirname( __FILE__ ) . '/inc/class-newspaper-x-autoloader.php';

$newspaper_x = new Newspaper_X();

require_once dirname( __FILE__ ) . '/inc/newspaper-x-deprecated.php';