<?php
$nombre_producto = "Camiseta Roja";
$precio_producto = 35;
?>

<?php
if ($precio_producto > 50) {
    echo 'Envío gratis disponible.';
} else {
    echo 'Coste de envío: $5.';
}
?>

<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        echo '<h1>' . get_the_title() . '</h1>';
        the_content();
    }
}
?>

<?php
if ($precio_producto > 50) {
echo "Envío gratis.";
} elseif ($precio_producto > 20) {
echo "Envío a precio reducido.";
} else {
echo "Coste completo de envío.";
}
?>

<?php
$productos = array("Camiseta", "Pantalón", "Gorra");
foreach ($productos as $producto) {
    echo $producto . '<br>';
}
?>


