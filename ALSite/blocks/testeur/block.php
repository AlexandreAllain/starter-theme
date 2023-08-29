<?php

/**
 * Nom: Testeur
 * Description: Sert principalement à tester que la logique des blocs ACF fonctionne
 */

class Testeur extends Custom_Block  {
    protected $block_name = 'testeur';
    protected $block_title = 'Testeur';
    protected $block_description = 'Block de test sur Wordpress';
    protected $block_category = 'formatting';
    protected $block_icon = 'admin-plugins';
    protected $block_keywords = array( 'Testeur', 'extension', 'add-on' );

    // Fonction pour ajouter les champs ACF pour le bloc personnalisé
    public function add_custom_acf_fields() {
        if ( function_exists( 'acf_add_local_field_group' ) ) {
            $fields = array(
                array(
                    'key' => 'field_64da47491f4fa',
                    'label' => 'Titre',
                    'name' => 'title',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ),
                array(
                    'key' => 'field_64da47691f4fb',
                    'label' => 'Texte',
                    'name' => 'text',
                    'aria-label' => '',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                    'delay' => 0,
                ),
                array(
                    'key' => 'field_64da47f21f4fc',
                    'label' => 'Liste',
                    'name' => 'list',
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
                            'key' => 'field_64da48011f4fd',
                            'label' => 'Puce',
                            'name' => 'item',
                            'aria-label' => '',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'maxlength' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'parent_repeater' => 'field_64da47f21f4fc',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_64da48181f4fe',
                    'label' => 'Image',
                    'name' => 'image',
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
                ),
                // Ajoutez d'autres champs ACF ici si nécessaire
            );

            // Ajouter les champs ACF pour le bloc personnalisé
            acf_add_local_field_group( array(
                'key' => 'group_64ce1ccsdfsdfa3ed18',
                'title' => 'Testeur', // Nom du bloc
                'fields' => $fields,
                'location' => array(
                    array(
                        array(
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/testeur', // Remplacez 'acf/testeur' par la valeur du champ 'name' de votre bloc personnalisé
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
$testeur = new Testeur(); // nom du bloc