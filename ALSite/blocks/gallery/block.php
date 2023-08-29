<?php

/**
 * Nom: gallery
 * Description: Sert principalement à tester que la logique des blocs ACF fonctionne
 */

class Gallery extends Custom_Block  {
    protected $block_name = 'gallery';
    protected $block_title = 'gallery';
    protected $block_description = 'Block de test sur Wordpress';
    protected $block_category = 'formatting';
    protected $block_icon = 'admin-plugins';
    protected $block_keywords = array( 'gallery', 'extension', 'add-on' );

    // Fonction pour ajouter les champs ACF pour le bloc personnalisé
    public function add_custom_acf_fields() {
        if ( function_exists( 'acf_add_local_field_group' ) ) {
            $fields = array(
                array(
                    'key' => 'field_64ecbdd54f135',
                    'label' => 'Gallerie',
                    'name' => 'gallerie',
                    'aria-label' => '',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'layout' => 'table',
                    'pagination' => 0,
                    'min' => 0,
                    'max' => 0,
                    'collapsed' => '',
                    'button_label' => 'Ajouter un élément',
                    'rows_per_page' => 20,
                    'sub_fields' => array(
                        array(
                            'key' => 'field_64ecbdff4f136',
                            'label' => 'img',
                            'name' => 'img',
                            'aria-label' => '',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'array',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                            'preview_size' => 'medium',
                            'parent_repeater' => 'field_64ecbdd54f135',
                        ),
                    ),
                ),
            );

            // Ajouter les champs ACF pour le bloc personnalisé
            acf_add_local_field_group( array(
                'key' => 'al_gallery',
                'title' => 'Gallerie', // Nom du bloc
                'fields' => $fields,
                'location' => array(
                    array(
                        array(
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/gallery', // Remplacez 'acf/gallery' par la valeur du champ 'name' de votre bloc personnalisé
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => 0,
            ) );
        }
    }

    // Fonction de rappel pour rendre le contenu du bloc
    public function render_custom_block( $block ) {
        // Charger les champs ACF pour le bloc
        $fields = get_fields( $block['id'] );

        // Charger le modèle Twig avec les champs ACF
        $context = Timber::context();
        foreach ( $fields as $field_name => $field_value ) {
            $context[ $field_name ] = $field_value;
        }

        // Rendre le modèle Twig et le retourner comme contenu du composant
        Timber::render( 'template.twig', $context );
    }

}

// Instancier la classe Plugin
$gallery = new Gallery(); // nom du bloc