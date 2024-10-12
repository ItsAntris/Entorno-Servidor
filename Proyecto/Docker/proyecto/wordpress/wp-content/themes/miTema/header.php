<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php generate_do_microdata( 'body' ); ?>>
	
	<?php
		echo "Bienvenidos a mi tienda de E-commerce, con la cual aprendere a utilizar WordPress"; 
		echo "<br>";
	?>
	
	<?php
		$nombre_producto = "Camiseta de Real Betis Balompie";
		$precio_producto = 70;

		if ($precio_producto > 30) {
			echo "Este producto tiene envío gratis.";
			echo "<br>";
		} else {
			echo "El envío tiene un coste de 2.99€.";
			echo "<br>";
		}

		if ($precio_producto > 50) {
			echo "Envío gratis.";
			echo "<br>";
		} elseif ($precio_producto > 20) {
			echo "Envío a precio reducido.";
			echo "<br>";
		} else {
			echo "Coste completo de envío.";
			echo "<br>";
		}

		$productos = array("Camiseta", "Pantalón", "Gorra");
			foreach ($productos as $producto) {
			echo $producto . "<br>";
}
	?>

	<?php
	/**
	 * wp_body_open hook.
	 *
	 * @since 2.3
	 */
	do_action( 'wp_body_open' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- core WP hook.

	/**
	 * generate_before_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked generate_do_skip_to_content_link - 2
	 * @hooked generate_top_bar - 5
	 * @hooked generate_add_navigation_before_header - 5
	 */
	do_action( 'generate_before_header' );

	/**
	 * generate_header hook.
	 *
	 * @since 1.3.42
	 *
	 * @hooked generate_construct_header - 10
	 */
	do_action( 'generate_header' );

	/**
	 * generate_after_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked generate_featured_page_header - 10
	 */
	do_action( 'generate_after_header' );
	?>

	<div <?php generate_do_attr( 'page' ); ?>>
		<?php
		/**
		 * generate_inside_site_container hook.
		 *
		 * @since 2.4
		 */
		do_action( 'generate_inside_site_container' );
		?>
		<div <?php generate_do_attr( 'site-content' ); ?>>
			<?php
			/**
			 * generate_inside_container hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_inside_container' );
