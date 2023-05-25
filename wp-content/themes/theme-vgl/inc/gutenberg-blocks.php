<?php
//ACF Blocks
function my_acf_blocks_init() {
    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'			    => 'venfilter-video',
            'title'				=> __('Video', 'venfilter'),
            'description'		=> 'lorem ipsum',
            'category'			=> 'venfilter-blocks',
            'mode'			    => 'preview',
            'icon'              => 'format-video',
            'render_template' 	=> 'template-parts/gutenberg/block-video.php',
        ));

        acf_register_block_type(array(
            'name'			    => 'venfilter-column',
            'title'				=> __('Section Container', 'venfilter'),
            'description'		=> 'lorem ipsum',
            'category'			=> 'venfilter-blocks',
            'mode'			    => 'preview',
            'icon'              => 'columns',
            'supports'			=> array( //INNER BLOCK
				'align' => true,
				'jsx' => true
			),
            'render_template' 	=> 'template-parts/gutenberg/block-column.php',
        ));

        acf_register_block_type(array(
            'name'			    => 'venfilter-htext',
            'title'				=> __('Título + Texto', 'venfilter'),
            'description'		=> 'lorem ipsum',
            'category'			=> 'venfilter-blocks',
            'mode'			    => 'text',
            'render_template' 	=> 'template-parts/gutenberg/block-htext.php',
        ));

        acf_register_block_type(array(
            'name'			    => 'venfilter-valores',
            'title'				=> __('Nuestros Valores', 'venfilter'),
            'description'		=> 'lorem ipsum',
            'category'			=> 'venfilter-blocks',
            'mode'			    => 'preview',
            'render_template' 	=> 'template-parts/gutenberg/block-valores.php',
        ));

        acf_register_block_type(array(
            'name'			    => 'venfilter-slider',
            'title'				=> __('Slider', 'venfilter'),
            'description'		=> 'lorem ipsum',
            'category'			=> 'venfilter-blocks',
            'mode'			    => 'preview',
            'render_template' 	=> 'template-parts/gutenberg/block-slider.php',
        ));

        acf_register_block_type(array(
            'name'			    => 'venfilter-link',
            'title'				=> __('Enlace', 'venfilter'),
            'description'		=> 'lorem ipsum',
            'category'			=> 'venfilter-blocks',
            'mode'			    => 'preview',
            'render_template' 	=> 'template-parts/gutenberg/block-link.php',
        ));

        acf_register_block_type(array(
            'name'			    => 'venfilter-products',
            'title'				=> __('Grid Productos', 'venfilter'),
            'description'		=> 'lorem ipsum',
            'category'			=> 'venfilter-blocks',
            'mode'			    => 'preview',
            'render_template' 	=> 'template-parts/gutenberg/block-products.php',
        ));

    }
}
add_action('acf/init', 'my_acf_blocks_init');