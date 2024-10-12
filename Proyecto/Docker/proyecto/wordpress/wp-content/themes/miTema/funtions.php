<?php
function miTema_style(){
    wp_enqueue_style('generatepress', get_template_directory_uri() . '/style.css');

    wp_enqueue_style('miTema', get_stylesheet_directory_uri() . '/style.css', array('miTema'));
}
add_action('wp_enqueue_scripts', 'miTema_styles');

function miTema_woocommerce_soporte() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mi_tema_woocommerce_soporte' );
?>
