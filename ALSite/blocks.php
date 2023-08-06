<?php

/**
 * Enregistrement des blocs personnalisés
 */

// Inclure la classe parente Custom_Block
require_once 'custom_block.php';

// Inclure les fichiers de blocs personnalisés
//require_once 'blocks/plugin/block.php';
require_once 'blocks/testeur/block.php';
// Ajoutez ici d'autres fichiers de blocs si nécessaire

$blocks = array(
    //$plugin,
    $testeur,
);
foreach ( $blocks as $block ) {
    $block->register();
}
