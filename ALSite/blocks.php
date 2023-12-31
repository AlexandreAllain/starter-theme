<?php

/**
 * Enregistrement des blocs personnalisés
 */

// Inclure la classe parente Custom_Block
require_once 'custom_block.php';

// Inclure les fichiers de blocs personnalisés

require_once 'blocks/testeur/block.php';
require_once 'blocks/gallery/block.php';
// Ajoutez ici d'autres fichiers de blocs si nécessaire

$blocks = array(
    $testeur,
    $gallery,
);
foreach ( $blocks as $block ) {
    $block->register();
}
