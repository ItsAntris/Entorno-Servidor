<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?> <!-- Importante: añadir wp_head() para los scripts -->
</head>
<body <?php body_class(); ?>>
    <header>
        <nav>
            <a href="#" class="logo">E-Commerce</a>
            <div class="nav-links">
                <a href="#" class="active">Inicio</a>
                <a href="#">Productos</a>
                <a href="../wordpress/wp-content/themes/TemaHito3/paginas/formulario.php">Contacto</a>
            </div>
        </nav>
    </header>

    <h1><?php echo 'Hola Mundo'; ?></h1>

</body>
</html>
