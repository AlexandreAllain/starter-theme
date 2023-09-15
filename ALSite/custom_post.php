<?php

function enregistrer_type_de_publication_livres() {
    $labels = array(
        'name'               => 'Livres',
        'singular_name'      => 'Livre',
        'menu_name'          => 'Livres',
        'add_new'            => 'Ajouter un livre',
        'add_new_item'       => 'Ajouter un nouveau livre',
        'edit_item'          => 'Modifier le livre',
        'new_item'           => 'Nouveau livre',
        'view_item'          => 'Voir le livre',
        'search_items'       => 'Rechercher des livres',
        'not_found'          => 'Aucun livre trouvé',
        'not_found_in_trash' => 'Aucun livre trouvé dans la corbeille',
        'parent_item_colon'  => '',
        'menu_name'          => 'Livres',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'livres' ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );

    register_post_type( 'livres', $args );
}

add_action( 'init', 'enregistrer_type_de_publication_livres' );
