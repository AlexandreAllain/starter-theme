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
                    'key' => 'field_64ce1sdfsdfcca30fba',
                    'label' => 'name',
                    'name' => 'name',
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
                    'key' => 'field_64sdfdfce1cqsdqca30fba',
                    'label' => 'title',
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
                    'key' => 'field_64cfb88d13f41',
                    'label' => 'groupe',
                    'name' => 'groupe',
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
                            'key' => 'field_64cfb8b013f42',
                            'label' => 'Le test',
                            'name' => 'le_test',
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
                            'parent_repeater' => 'field_64cfb88d13f41',
                        ),
                        array(
                            'key' => 'field_64cfb95c121d0',
                            'label' => 'texte',
                            'name' => 'texte',
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
                            'parent_repeater' => 'field_64cfb88d13f41',
                        ),
                    ),
                ),
                // Ajoutez d'autres champs ACF ici si nécessaire
            );

            // Ajouter les champs ACF pour le bloc personnalisé
            acf_add_local_field_group( array(
                'key' => 'group_64ce1ccsdfsdfa3ed18',
                'title' => 'Testeur',
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
$testeur = new Testeur();