<?php

add_filter( 'allowed_block_types_all', 'al_allowed_block_types' );

function al_allowed_block_types( $allowed_blocks ) {
    return array(
        'core/image',
        'core/paragraph',
        'core/heading',
        'core/list',
        'acf/testeur',
        'acf/gallery'
    );
}