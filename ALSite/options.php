<?php

if( function_exists( 'acf_add_options_page' ) ) {
	
	acf_add_options_page( array(
		'page_title' 	=> 'Options du thème',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
        'position'    	=> 2
	) );
	
	acf_add_options_sub_page( array(
		'page_title' 	=> 'Options avancée',
		'menu_title'	=> 'Options avancée',
		'parent_slug'	=> 'theme-general-settings',
	) );
	
}