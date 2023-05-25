<?php 
// Crear un widget personalizado
class Custom_Widget extends WP_Widget {
    // Constructor del widget
    public function __construct() {
        parent::__construct(
            'custom_widget', // ID único del widget
            'Widget Personalizado', // Nombre del widget
            array( 'description' => 'Widget personalizado para bloques de páginas' ) // Descripción del widget
        );
    }

    // Renderizar el widget en el front-end
    public function widget( $args, $instance ) {
        // Obtener los datos del widget
        $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
        $image_url = ! empty( $instance['image_url'] ) ? $instance['image_url'] : '';

        // Mostrar el texto y la imagen del widget
        echo $args['before_widget'];
        echo '<p>' . $text . '</p>';
        echo '<img src="' . $image_url . '" alt="Imagen" />';
        echo $args['after_widget'];
    }

    // Mostrar el formulario de configuración del widget en el back-end
    public function form( $instance ) {
        $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
        $image_url = ! empty( $instance['image_url'] ) ? $instance['image_url'] : '';

        // Mostrar los campos de texto e imagen en el formulario
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'text' ); ?>">Texto:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image_url' ); ?>">URL de la imagen:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" type="text" value="<?php echo esc_attr( $image_url ); ?>">
        </p>
        <?php
    }

    // Guardar los datos actualizados del widget
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['text'] = ! empty( $new_instance['text'] ) ? sanitize_text_field( $new_instance['text'] ) : '';
        $instance['image_url'] = ! empty( $new_instance['image_url'] ) ? esc_url_raw( $new_instance['image_url'] ) : '';
        return $instance;
    }
}

// Registrar el widget personalizado
function register_custom_widget() {
    register_widget( 'Custom_Widget' );
}
add_action( 'widgets_init', 'register_custom_widget' );

