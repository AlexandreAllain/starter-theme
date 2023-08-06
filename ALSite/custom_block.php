<?php

class Custom_Block {
    protected $block_name;
    protected $block_title;
    protected $block_description;
    protected $block_category;
    protected $block_icon;
    protected $block_keywords;

    public function __construct() {
        add_action( 'acf/init', array( $this, 'register_acf_block_type' ) );
    }

    public function register_acf_block_type() {
        acf_register_block_type( array(
            'name'              => $this->block_name,
            'title'             => $this->block_title,
            'description'       => $this->block_description,
            'render_template'   => 'template.twig',
            'category'          => $this->block_category,
            'icon'              => $this->block_icon,
            'keywords'          => $this->block_keywords,
            'supports'          => array( 'align' => true ),
            'render_callback'   => array( $this, 'render_custom_block' ), // Fonction de rappel pour rendre le contenu du bloc
        ) );

        $this->add_custom_acf_fields();
    }

    public function register() {
        add_action( 'acf/init', array( $this, 'register_acf_block_type' ) );
    }
}
