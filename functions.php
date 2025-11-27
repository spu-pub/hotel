<?php 
defined( 'ABSPATH' ) || exit;

function hotel_theme_assets() {
}

// Menu
function hotel_register_menus() {
    register_nav_menus( array(
        'header-menu' => 'Header-Navigation',
    ));
}
add_action('after_setup_theme','hotel_register_menus');
