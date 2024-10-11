<?php
function miTema_style(){
    wp_enqueue_style('emart-shop',
        get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'miTema_style');

?>
