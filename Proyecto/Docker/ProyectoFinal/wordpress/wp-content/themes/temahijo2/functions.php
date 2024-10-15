<?php
function mi_tema_hijo_estilos() {
    // Cargar el estilo del tema padre
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // Cargar el estilo del tema hijo
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}
add_action('wp_enqueue_scripts', 'mi_tema_hijo_estilos');
?>

<?php 
    echo "Aqui aprenderé a usar el gran temido WordPress"; 
    echo "<br>";
?>

<?php
$precio_producto = 100; // Precio del producto
$impuesto = 0.21; // 21% de IVA
$precio_total = $precio_producto * (1 + $impuesto);

echo 'El precio total con impuestos es: ' . $precio_total;
echo "<br>";
?>

<?php
$precio_producto = 50;
$precio_oferta = 30;

if ($precio_oferta < $precio_producto) {
    echo '¡Este producto está en oferta!';
}
?>

<?php
function mi_tema_woocommerce_soporte() {
add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mi_tema_woocommerce_soporte' );
?>