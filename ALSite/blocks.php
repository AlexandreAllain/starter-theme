<?php
/**
 * Enregistrement des blocs personnalisés
 */

require_once 'blocks/plugin/block.php';
require_once 'blocks/testeur/block.php';

$plugin = new Plugin();
$plugin->register();
$testeur = new Testeur();
$testeur->register();

$blocks = array(
    $plugin,
    $testeur,
);

foreach ( $blocks as $block ) {
    $block->register();
}
