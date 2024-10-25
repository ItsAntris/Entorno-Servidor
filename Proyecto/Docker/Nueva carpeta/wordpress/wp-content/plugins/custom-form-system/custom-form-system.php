<?php
/**
 * Plugin Name: Sistema Avanzado de Formularios
 * Description: Sistema personalizado de formularios con validación
 * Version: 1.0
 * Author: Tu Nombre
 */

// Evitar acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// 1. Clase principal para manejar formularios
class CustomFormHandler {
    private static $instance = null;
    
    public static function get_instance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        add_action('init', array($this, 'init'));
        add_shortcode('custom_form', array($this, 'render_form'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    public function init() {
        // Registrar punto final para procesar formulario via AJAX
        add_action('wp_ajax_process_custom_form', array($this, 'process_form'));
        add_action('wp_ajax_nopriv_process_custom_form', array($this, 'process_form'));
    }

    // 2. Función para validar datos
    public function validate_form_data($data) {
        $errors = array();
        
        // Validar nombre
        if (empty($data['nombre'])) {
            $errors['nombre'] = 'El nombre es requerido';
        }
        
        // Validar email
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email inválido';
        }
        
        // Validar mensaje
        if (empty($data['mensaje']) || strlen($data['mensaje']) < 10) {
            $errors['mensaje'] = 'El mensaje debe tener al menos 10 caracteres';
        }
        
        return $errors;
    }

    // 3. Función para procesar el formulario
    public function process_form() {
        check_ajax_referer('custom_form_nonce', 'nonce');
        
        $data = array(
            'nombre' => sanitize_text_field($_POST['nombre']),
            'email' => sanitize_email($_POST['email']),
            'mensaje' => sanitize_textarea_field($_POST['mensaje'])
        );
        
        $errors = $this->validate_form_data($data);
        
        if (empty($errors)) {
            // Guardar en la base de datos
            global $wpdb;
            $table_name = $wpdb->prefix . 'custom_form_submissions';
            
            $wpdb->insert(
                $table_name,
                array(
                    'nombre' => $data['nombre'],
                    'email' => $data['email'],
                    'mensaje' => $data['mensaje'],
                    'fecha' => current_time('mysql')
                ),
                array('%s', '%s', '%s', '%s')
            );
            
            wp_send_json_success('Formulario enviado correctamente');
        } else {
            wp_send_json_error($errors);
        }
    }

    // 4. Función para renderizar el formulario
    public function render_form() {
        ob_start();
        ?>
        <form id="custom-form" class="custom-form">
            <?php wp_nonce_field('custom_form_nonce', 'custom_form_nonce'); ?>
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                <span class="error-message" data-error="nombre"></span>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <span class="error-message" data-error="email"></span>
            </div>
            
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" required></textarea>
                <span class="error-message" data-error="mensaje"></span>
            </div>
            
            <button type="submit">Enviar</button>
        </form>
        <?php
        return ob_get_clean();
    }

    // 5. Función para encolar scripts y estilos
    public function enqueue_scripts() {
        wp_enqueue_style(
            'custom-form-styles',
            plugins_url('css/custom-form.css', __FILE__)
        );
        
        wp_enqueue_script(
            'custom-form-script',
            plugins_url('js/custom-form.js', __FILE__),
            array('jquery'),
            '1.0',
            true
        );
        
        wp_localize_script(
            'custom-form-script',
            'customForm',
            array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('custom_form_nonce')
            )
        );
    }
}

// Inicializar el plugin
CustomFormHandler::get_instance();

// 6. Función para crear la tabla en la base de datos
function create_custom_form_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_form_submissions';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        nombre varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        mensaje text NOT NULL,
        fecha datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'create_custom_form_table');