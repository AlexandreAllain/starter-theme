<?php
/**
 * Nom: Testeur
 * Description: Sert principalement à tester que la logique des blocs ACF fonctionne
 */

// Enregistrement du bloc personnalisé avec des champs ACF
class Testeur {
    public function __construct() {
        add_action( 'acf/init', array( $this, 'register_acf_block_types' ) );
    }

    public function register_acf_block_types() {
        acf_register_block_type( array(
            'name'              => 'Testeur',
            'title'             => 'Testeur',
            'description'       => "Présentation d'une extension WordPress",
            'render_template'   => 'template.twig', // Modèle Twig pour le rendu du bloc
            'category'          => 'formatting', 
            'icon'              => 'admin-plugins', 
            'keywords'          => array( 'Testeur', 'extension', 'add-on' ),
            'supports'          => array( 'align' => true ), // Ajoutez les options de personnalisation du bloc ici
            'render_callback'   => array( $this, 'render_custom_block' ), // Fonction de rappel pour rendre le contenu du bloc
        ) );

        // Ajouter les champs ACF pour le bloc personnalisé
        $this->add_custom_acf_fields();
    }

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
                            'value' => 'acf/testeur', // Remplacez 'acf/plugin' par la valeur du champ 'name' de votre bloc personnalisé
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

    public function register() {
        add_action( 'acf/init', array( $this, 'register_acf_block_types' ) );
    }
}

// Instancier la classe Plugin
$testeur = new Testeur();